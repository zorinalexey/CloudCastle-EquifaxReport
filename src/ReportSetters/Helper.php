<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

/**
 * Трейт Helper
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
trait Helper
{

    private function getMethodName(string $key): string
    {
        $name = '__set';
        foreach (explode('_', $key) as $item) {
            $name .= ucfirst(strtolower($item));
        }
        return $name;
    }

}
