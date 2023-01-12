<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\PartitionClasses;

/**
 * Трейт DataSetter
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\PartitionClasses
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
trait DataSetter
{

    protected function __setData(array $data): void
    {
        $properties = (array)$this;
        foreach ($data as $key => $value) {
            if (isset($properties[$key])) {
                $class = $this->__getDataClassName($key);
                $property = $key;
                $this->$property = $class($value);
            }
        }
    }

    protected function __getDataClassName(string $key): string
    {
        $str = '';
        $data = explode('_', $key);
        foreach ($data as $value) {
            $str .= ucfirst($value);
        }
        return $str;
    }

}
