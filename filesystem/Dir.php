<?php

declare(strict_types = 1);

namespace CloudCastle\FileSystem;

/**
 * Класс Dir
 * @version 0.0.1
 * @package CloudCastle\FileSystem
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class Dir
{

    /**
     * Проверка наличия дирректории
     * @param string|null $dir Путь до дирректории
     * @return bool Если дирректория найдена, то вернет true, иначе false
     */
    public static function has(?string $dir = null): bool
    {
        if ($dir) {
            return is_dir($dir);
        }
        return false;
    }

    /**
     * Создать дирректорию
     * @param string|null $dir Путь дирректории которую необходимо создать
     * @param string $permissions Права на дирректорию
     * @param bool $recursive Создать рекурсивно
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function create(?string $dir = null, int $permissions = 0777, bool $recursive = true): File
    {
        if ( ! self::has($dir) AND $dir AND mkdir($dir, $permissions, $recursive)) {
            return self::info($dir);
        }
        return self::info($dir);
    }

    /**
     * Установить права на дирректорию
     * @param string $dir Путь к дирректории
     * @param string $permissions Необходимые права
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function permissions(string $dir, int $permissions = 0777): bool
    {
        if (self::has($dir) AND chmod($dir, $permissions)) {
            return true;
        }
        return false;
    }

    /**
     * Удалить дирректорию рекурсивно
     * @param string|null $dir Путь к дирректории
     * @param bool $recursive Удалить дирректорию рекурсивно
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function delete(string $dir, bool $recursive = false): bool
    {
        if ($recursive) {
            self::recursiveRemove($dir);
        }
        if ( ! is_dir($dir) OR( ! self::scan($dir) AND rmdir($dir))) {
            return true;
        }
        return false;
    }

    /**
     * Сканировать дирректорию
     * @param string $dir Путь к дирректории
     * @return array Массив с файлами и каталогами директории
     */
    public static function scan(string $dir): array
    {
        $data = [];
        if (is_dir($dir)) {
            foreach (scandir($dir) as $file) {
                if ($file !== '.' AND $file !== '..') {
                    $data[] = dirname($dir) . DIRECTORY_SEPARATOR .
                        basename($dir) . DIRECTORY_SEPARATOR .
                        $file;
                }
            }
        }
        return $data;
    }

    /**
     * Получить подробную информацию о директории
     * @param string $dir Путь к дирректории
     * @return File Объект класса File заполненый информацией об указаной директории
     */
    public static function info(string $dir): File
    {
        return File::info($dir);
    }

    /**
     * Рекурсивное удаление дирректории вместе содержимым
     * @param string $dir Путь к дирректории
     * @return void
     */
    private static function recursiveRemove(string $dir): void
    {
        $files = self::scan($dir);
        foreach ($files as $file) {
            if (File::has($file)) {
                File::delete($file);
            } elseif (self::has($file)) {
                self::delete($file, true);
            }
        }
    }

}
