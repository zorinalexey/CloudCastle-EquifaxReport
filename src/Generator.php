<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport;

use CloudCastle\Helpers\Format;
use CloudCastle\EquifaxConfig\Config;
use CloudCastle\XmlGenerator\Config AS XmlConfig;
use CloudCastle\XmlGenerator\XmlGenerator;
use CloudCastle\FileSystem\FileSystem;
use CloudCastle\XmlGenerator\Xml;
use CloudCastle\EquifaxReport\Individual\ReportGenerator AS IndividualReport;
use CloudCastle\EquifaxReport\Individual\ReplyGenerator AS IndividualReply;
use CloudCastle\EquifaxReport\Individual\Client AS Individual;

/**
 * Класс Create
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class Generator
{

    private Config $config;
    private ClientInterface $client;
    private XmlGenerator $xml;
    private $reply;

    public function __construct(Config $config, ClientInterface $client)
    {
        $this->config = $config;
        $this->client = $client;
        $generatorConfig = new XmlConfig();
        $generatorConfig->setFile($this->getFileName());
        $generatorConfig->setType('memory');
        $this->xml = new XmlGenerator($generatorConfig);
    }

    public function create($reply): Xml
    {
        $this->reply = $reply;
        $this->xml->startDocument();
        $this->xml->startElement('fch', ['version' => $this->config::version]);
        $this->createHead()
            ->createInfo()
            ->setTitleParts();
        $this->xml->closeElement();
        $filePatch = dirname($this->config->filesDir) . DIRECTORY_SEPARATOR .
            basename($this->config->filesDir) . DIRECTORY_SEPARATOR .
            'report' . DIRECTORY_SEPARATOR . Format::date(date('d.m.Y')) .
            DIRECTORY_SEPARATOR . $this->getFileName();
        return $this->xml->get()->save($filePatch);
    }

    public function setTitleParts(): self
    {
        $this->xml->startElement('title_part');
        if ($this->client->kski_code) {
            $this->xml->startElement('kski')
                ->addElement('code', $this->client->kski_code)
                ->closeElement();
        }
        if ($this->client instanceof Individual) {
            $this->setIndividualReport();
        } else {
            $this->setCompanyReport();
        }
        $this->xml->closeElement();
        return $this;
    }

    private function createInfo(): self
    {
        $this->xml->startElement('info');
        foreach ($this->config->getAction() as $attr => $attrValue) {
            $this->xml->addAttribute($attr, $attrValue);
        }
        $this->xml->closeElement();
        return $this;
    }

    private function createHead(): self
    {
        $this->xml->startElement('head')
            ->addElement('source_inn', $this->config->getInn())
            ->addElement('source_ogrn', $this->config->getOgrn())
            ->addElement('date', Format::date(date('d.m.Y')))
            ->addElement('file_reg_date', Format::date(date('d.m.Y')))
            ->addElement('file_reg_num', $this->getFileName());
        $action = $this->config->getAction();
        if (isset($action->file_reg_num) AND isset($action->file_reg_date)) {
            $this->xml->startElement('prev_file')
                ->addElement('file_reg_num', $action->file_reg_num)
                ->addElement('file_reg_date', Format::date($action->file_reg_date))
                ->closeElement();
        }
        $this->xml->closeElement();
        return $this;
    }

    public function getFileName(): string
    {
        $number = 1;
        $fileSystemObj = FileSystem::instance();
        $dirFiles = dirname($this->config->filesDir) . DIRECTORY_SEPARATOR .
            basename($this->config->filesDir) . DIRECTORY_SEPARATOR .
            'report' . DIRECTORY_SEPARATOR . Format::date(date('d.m.Y'));
        $fileSystemObj->dir->create($dirFiles, 0777, true);
        foreach (scandir($dirFiles) as $fileName) {
            $file = $dirFiles . DIRECTORY_SEPARATOR . $fileName;
            if ($fileSystemObj->file->has($file)) {
                $number ++;
            }
        }
        if ($number > 100 AND $number < 1000) {
            $number = '0' . $number;
        } elseif ($number > 10 AND $number < 100) {
            $number = '00' . $number;
        } elseif ($number < 10) {
            $number = '000' . $number;
        }
        $str = $this->config->getPartnerId() . '_FCH_' . date('Ymd') . '_' . $number . '.XML';
        return $str;
    }

    public function setIndividualReport(): self
    {
        $Individualreport = new IndividualReport();
        $Individualreport->setPrivateInfo($this->client, $this->xml);
        new IndividualReply($this->reply, $this->xml, $this->client);
        return $this;
    }

    public function setCompanyReport()
    {
//        $this->xml->startElement('commercial');
//        $clientName = $this->client->getName();
//        $this->xml->startElement('name')
//            ->addElement('full', $clientName['full'])
//            ->addElement('short', $clientName['short'])
//            ->addElement('other', $clientName['other'])
//            ->closeElement();
//        $this->xml->closeElement();
//        return $this;
        return $this;
    }

}
