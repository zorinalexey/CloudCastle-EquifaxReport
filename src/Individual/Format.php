<?php

declare(strict_types=1);

namespace CloudCastle\EquifaxReport\Individual;

/**
 * Класс Format
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\Report
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class Format
{

    private ?Client $data = null;
    private ?XmlGenerator $generator = null;

    public function __construct(Client $data, XmlGenerator $generator, $event)
    {
        $this->data = $data;
        $this->generator = $generator;
        $this->event = $event;
        $this->generate();
    }

    public function generate()
    {

    }

}
