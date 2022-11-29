<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport;

/**
 * Класс Debug
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
abstract class Debug
{

    public function debug(): void
    {
        print_r($this);
    }

}
