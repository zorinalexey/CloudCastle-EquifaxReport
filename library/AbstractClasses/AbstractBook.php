<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxLibrary\AbstractClasses;

/**
 * Класс AbstractBook
 * @version 0.0.1
 * @package CloudCastle\EquifaxLibrary\AbstractClasses
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
abstract class AbstractBook
{

    /**
     * Код
     * @var string|int
     */
    public $code;

    /**
     * Наименование
     * @var string|null
     */
    public ?string $name = null;

    /**
     * Конструктор класса
     * @param string|int $str Запрашиваемый параметр
     */
    public function __construct($str = false)
    {
        $this->set($str);
        if ( ! $this->code OR ! $this->name AND isset($this->default)) {
            $this->set($this->default);
        }
    }

    /**
     * Поиск и установка параметров запроса по справочнику
     * @param string|int $str Запрашиваемый параметр
     * @return void
     */
    private function set($str): void
    {
        foreach ($this->data as $key => $value) {
            if (mb_strtolower($str) === mb_strtolower($key)
                OR mb_strtolower($str) === mb_strtolower($value)
            ) {
                $this->name = mb_strtolower($str);
                $this->code = $value;
            }
        }
    }

    /**
     * Получить справочник
     * @return array
     */
    public function getLirary(): array
    {
        return self::$data;
    }

}
