<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport;

use CloudCastle\Helpers\Format;
use CloudCastle\EquifaxConfig\Config;
use CloudCastle\XmlGenerator\Config AS XmlConfig;
use CloudCastle\XmlGenerator\XmlGenerator;
use CloudCastle\XmlGenerator\Xml;
use CloudCastle\FileSystem\FileSystem;
use CloudCastle\EquifaxReport\Individual\ReportGenerator AS IndividualReportGenerator;

/**
 * Класс ReportGenerator
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class Report
{

    private ?Config $config = null;
    private array $reports = [];
    private ?XmlGenerator $xml = null;

    public function __construct(Config $config, array $reports)
    {
        $this->config = $config;
        $this->reports = $reports;
        $generatorConfig = new XmlConfig();
        $generatorConfig->setFile($this->getFileName());
        $generatorConfig->setType('memory');
        $this->xml = new XmlGenerator($generatorConfig);
    }

    public function create(int $count = 0): Xml
    {
        $this->xml->startDocument();
        $this->xml->startElement('fch', ['version' => $this->config::version]);
        $this->createHead()
            ->createInfo()
            ->createFooter($count);
        $this->xml->closeElement();
        $filePatch = dirname($this->config->filesDir) . DIRECTORY_SEPARATOR .
            basename($this->config->filesDir) . DIRECTORY_SEPARATOR .
            'report' . DIRECTORY_SEPARATOR . Format::date(date('d.m.Y')) .
            DIRECTORY_SEPARATOR . $this->getFileName();
        return $this->xml->get()->save($filePatch);
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

    private function createInfo(): self
    {
        foreach ($this->reports as $report) {
            $this->xml->startElement('info');
            foreach ($report->info as $attr => $attrValue) {
                $this->xml->addAttribute($attr, $attrValue);
            }
            $this->setTitlePart($report);
            $this->xml->closeElement();
        }
        return $this;
    }

    public function setTitlePart($report)
    {
        $this->xml->startElement('title_part');
        if (isset($report->title_part->kski) AND $report->title_part->kski) {
            $this->xml->startElement('kski')
                ->addElement('code', $report->title_part->kski)
                ->closeElement();
        }
        if (isset($report->title_part->private)) {
            (new IndividualReportGenerator())->setPrivateInfo($report->title_part->private, $this->xml);
        }
        if (isset($report->title_part->commercial)) {
            $this->setCommercialInfo($report->title_part->commercial);
        }
        $this->xml->closeElement();
        new Individual\ReplyGenerator($report->title_part->base_part, $this->xml, $report->title_part->private);
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

    public function setCommercialInfo($clientInfo)
    {

    }

    private function createFooter(int $count)
    {
        $this->xml->startElement('footer')
            ->addElement('subjects_count', $count)
            ->addElement('records_count', 35)
            ->closeElement();
    }

}
