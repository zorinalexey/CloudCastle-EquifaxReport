<?php

declare(strict_types=1);

namespace CloudCastle\EquifaxReport;


use CloudCastle\EquifaxReport\Config\Config;
use CloudCastle\EquifaxReport\Individual\Client;
use CloudCastle\EquifaxReport\Libs\AddPart;
use CloudCastle\EquifaxReport\Libs\BasePart;
use CloudCastle\EquifaxReport\Libs\Blocks;
use CloudCastle\EquifaxReport\Libs\InformationPart;
use CloudCastle\EquifaxReport\Parts\Title;
use CloudCastle\EquifaxReport\Report\Events;

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
    const VERSION = '4.0';
    /**
     * Количество различных субъектов, по которым выгружены записи в файле
     * @var int
     */
    public static int $subjects_count = 0;
    /**
     * Количество записей в файле
     * @var int
     */
    public static int $records_count = 0;
    public ?BasePart $base_part = null;
    public ?AddPart $add_part = null;
    public ?InformationPart $information_part = null;
    /**
     * @var Client|null
     */
    public ?Client $client = null;
    /**
     * @var Events|null
     */
    public ?Events $event = null;
    /**
     * @var Config|null
     */
    public ?Config $config = null;

    public function __construct(Client $client, Events $event, Config $config)
    {
        $this->client = $client;
        $this->event = $event;
        $this->config = $config;
        $this->add_part = new AddPart();
        $this->information_part = new InformationPart();
        $this->base_part = new BasePart();
        if ($client->inn->ogrnIp) {
            $this->base_part->ogrnip = $client->inn->ogrnIp;
        }
    }


    /**
     * @param array $reports
     * @param Config $config
     * @return void
     */
    public static function generate(array $reports, Config $config)
    {
        $generator = new XmlGenerator($config);
        $generator->startDocument();
        $generator->startElement('fch', ['version' => self::VERSION]);
        Blocks::head($config, $generator);
        foreach ($reports as $report) {
            self::$subjects_count++;
            $generator->startElement('info');
            $event = $report->event;
            foreach ($event as $key => $value) {
                $generator->addAttribute($key, (string)$value);
            }
            new Title($report->client, $generator);
            self::partsGenerate(Events::search($report->event->event), $report, $generator);
            $generator->closeElement();
        }
        Blocks::footer($generator);
        $generator->closeElement();
        return $generator->get();
    }

    private static function partsGenerate(array $parts, Report $report, XmlGenerator $generator)
    {
        foreach ($parts as $partName => $partValues) {
            $generator->startElement($partName);
            Blocks::partsGenerator($partValues, $report, $generator);
            $generator->closeElement();
        }
    }
}