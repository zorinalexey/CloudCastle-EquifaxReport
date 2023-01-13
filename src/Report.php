<?php

declare(strict_types=1);

namespace CloudCastle\EquifaxReport;


use CloudCastle\EquifaxReport\Config\Config;
use CloudCastle\XmlGenerator\XmlGenerator;

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

    private static XmlGenerator $generator;
    private static Report $instance;

    public static function instance(): self
    {
        if (!self::$instance) {
            self::$instance = new self();
            self::$generator = new XmlGenerator();
        }
        return self::$instance;
    }

    public static function generate(array $reports, Config $config)
    {
    }
}