<?php

declare(strict_types = 1);

namespace CloudCastle\FileSystem;

/**
 * Класс FileSystem
 * @version 0.0.1
 * @package CloudCastle\FileSystem
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class FileSystem
{

    public ?File $file;
    public ?Dir $dir;
    public ?Json $json;
    protected static array $obj = [];

    /**
     * Конструктор класса
     */
    protected function __construct()
    {
        $this->dir = new Dir();
        $this->file = new File();
        $this->json = new Json();
    }

    /**
     * Получить текущий объект текущего класса
     * @return $this
     */
    public static function instance(): self
    {
        $class = get_called_class();
        if ( ! isset(self::$obj[$class])) {
            self::$obj[$class] = new self();
        }
        return self::$obj[$class];
    }

}
