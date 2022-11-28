<?php

declare(strict_types = 1);

namespace CloudCastle\FileSystem;

use \stdClass;

/**
 * Класс Json
 * @version 0.0.1
 * @package  CloudCastle\FileSystem
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class Json
{

    /**
     * Получить объект из json файла
     * @param string|null $jsonFile Путь к json файлу
     * @return stdClass Объект сформированый в результате декодирования содержимого json файла
     */
    public static function read(?string $jsonFile = null): stdClass
    {
        $data = new stdClass;
        if (File::has($jsonFile)) {
            $info = File::info($jsonFile);
            if ($info->extension === 'json') {
                $data = json_decode(File::read($jsonFile));
            }
        }
        return $data;
    }

    /**
     * Создать новый json файл
     * @param string $jsonFile Путь к json файлу
     * @param object|array $data Данные которые необходимо конвертирорвать в json и записать в файл
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function create(string $jsonFile, $data = false): bool
    {
        $content = false;
        if (is_object($data) OR is_array($data)) {
            $content = json_encode($data, JSON_PRETTY_PRINT);
        }
        if ( ! File::has($jsonFile) AND $content) {
            return File::create($jsonFile, $content);
        }
        return false;
    }

    /**
     * Перезаписать json файл
     * @param string $jsonFile Путь к json файлу
     * @param mixed $data Данные которые необходимо конвертирорвать в json и записать в файл
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function rewrite(string $jsonFile, $data = false): bool
    {
        if (is_array($data) OR is_object($data)) {
            if (File::has($jsonFile) AND $data AND File::delete($jsonFile)) {
                return self::create($jsonFile, $data);
            }
        }
        return self::create($jsonFile, $data);
    }

    /**
     * Удалить json файл
     * @param string $jsonFile  Путь к json файлу
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function delete(string $jsonFile): bool
    {
        if (self::has($jsonFile)) {
            return File::delete($jsonFile);
        }
        return false;
    }

    /**
     * Проверить является ли файл json файлом
     * @param string $jsonFile  Путь к json файлу
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function has(string $jsonFile): bool
    {
        $info = File::info($jsonFile);
        if ($info->extension === 'json') {
            return true;
        }
        return false;
    }

}
