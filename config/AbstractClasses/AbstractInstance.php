<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxConfig\AbstractClasses;

/**
 * Класс AbstractInstance
 * @version 0.0.1
 * @package CloudCastle\EquifaxConfig\AbstractClasses
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class AbstractInstance
{

    /**
     * Хранение объектов активных классов
     * @var array
     */
    protected static array $objects = [];

    /**
     * Получить активный объект класса
     * @return self Активный объект запрошенного класса
     */
    public static function instance(): self
    {
        $class = get_called_class();
        if ( ! isset(self::$objects[$class])) {
            self::$objects[$class] = new $class();
        }
        return self::$objects[$class];
    }

}
