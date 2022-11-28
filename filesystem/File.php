<?php

declare(strict_types = 1);

namespace CloudCastle\FileSystem;

use \SplFileInfo;

/**
 * Класс File
 * @version 0.0.1
 * @package  CloudCastle\FileSystem
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class File
{

    /**
     * Время последнего доступа к файлу
     * @var int
     */
    public int $aTime = 0;

    /**
     * Базовое имя файла
     * @var string|null
     */
    public ?string $basename;

    /**
     * Время последнего изменения индексного дескриптора файла
     * @var int
     */
    public int $cTime = 0;

    /**
     * Расширение файла
     * @var string|null
     */
    public ?string $extension;

    /**
     * Имя файла
     * @var string|null
     */
    public ?string $filename;

    /**
     * Группа файла
     * @var int
     */
    public int $group = 0;

    /**
     * Индексный дескриптор для файла
     * @var int
     */
    public int $inode = 0;

    /**
     * Путь ссылки
     * @var string|null
     */
    public ?string $linkTarget = null;

    /**
     * Время последнего изменения
     * @var int
     */
    public int $mTime;

    /**
     * Владелец файла
     * @var int
     */
    public ?int $owner;

    /**
     * Путь без имени файла
     * @var string|null
     */
    public ?string $path;

    /**
     * Путь к файлу
     * @var string|null
     */
    public ?string $pathname;

    /**
     * Список разрешений
     * @var int
     */
    public int $perms = 0;

    /**
     * Абсолютный путь к файлу
     * @var string|null
     */
    public ?string $realPath;

    /**
     * Размер файла
     * @var int
     */
    public int $size = 0;

    /**
     * Тип файла
     * @var string|null
     */
    public ?string $type = null;

    /**
     * Является ли файл каталогом
     * @var bool
     */
    public bool $isDir = false;

    /**
     * Является ли файл исполняемым
     * @var bool
     */
    public bool $executable = false;

    /**
     * Ссылается ли объект на обычный файл
     * @var bool
     */
    public bool $isFile = false;

    /**
     * Является ли файл ссылкой
     * @var bool
     */
    public bool $isLink = false;

    /**
     * Является ли файл доступным для чтения
     * @var bool
     */
    public bool $isReadable = false;

    /**
     * Является ли файл доступным для записи
     * @var bool
     */
    public bool $isWritable = false;

    /**
     * Проверка существования файла
     * @param string|null $file
     * @return bool Если файл существует, то вернет true, иначе false
     */
    public static function has(?string $file = null): bool
    {
        if (is_file($file)) {
            return true;
        }
        return false;
    }

    /**
     * Удалить файл
     * @param string $file Путь к файлу
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function delete(string $file): bool
    {
        if (self::has($file) AND unlink($file)) {
            return true;
        }
        return false;
    }

    /**
     * Перезаписать файл
     * @param string $file Путь к файлу
     * @param string|null $content Новое содержание файла
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function rewrite(string $file, ?string $content = null): bool
    {
        if (self::has($file) AND self::delete($file)) {
            return self::create($file, $content);
        }
        return false;
    }

    /**
     * Создать файл
     * @param string $file Путь к файлу
     * @param string $content Содержание нового файла
     * @return self|false В случае успеха вернет true, иначе false
     */
    public static function create(string $file, ?string $content = null)
    {
        $dir = Dir::create(dirname($file), 0777, true);
        if ($dir AND ! self::has($file)) {
            $patch = $dir->realPath . DIRECTORY_SEPARATOR . basename($file);
            file_put_contents($patch, $content, LOCK_EX);
            return self::info($patch);
        }
        return false;
    }

    /**
     * Дописать в файл
     * @param string $file Путь к файлу
     * @param string $content Контен который необходимо дописать в файл
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function add(string $file, string $content): bool
    {
        if (self::has($file)) {
            if (file_put_contents($file, $content, LOCK_EX | FILE_APPEND)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Установить права на файл
     * @param string $file Путь к файлу
     * @param string $permissions Необходимые права
     * @return bool В случае успеха вернет true, иначе false
     */
    public static function permissions(string $file, int $permissions = 0777): bool
    {
        if (self::has($file) AND chmod($file, $permissions)) {
            return true;
        }
        return false;
    }

    /**
     * Получить контент файла
     * @param string $file Путь к Файлу
     * @return string|false Контент файла если файл существует и доступен для чтения, иначе false
     */
    public static function read(string $file)
    {
        if (self::has($file)) {
            return file_get_contents($file);
        }
        return false;
    }

    /**
     * Получить подробную информацию о файле
     * @param string $file Путь к файлу
     * @return self
     */
    public static function info(string $file): self
    {
        $obj = new SplFileInfo($file);
        $data = new self();
        $data->aTime = $obj->getATime();
        $data->basename = $obj->getBasename();
        $data->cTime = $obj->getCTime();
        $data->extension = $obj->getExtension();
        $data->filename = $obj->getFilename();
        $data->group = $obj->getGroup();
        $data->inode = $obj->getInode();
        $data->mTime = $obj->getMTime();
        $data->owner = $obj->getOwner();
        $data->path = $obj->getPath();
        $data->pathname = $obj->getPathname();
        $data->perms = $obj->getPerms();
        $data->realPath = $obj->getRealPath();
        $data->size = $obj->getSize();
        $data->type = $obj->getType();
        $data->isDir = $obj->isDir();
        $data->executable = $obj->isExecutable();
        $data->isFile = $obj->isFile();
        $data->isLink = $obj->isLink();
        $data->isReadable = $obj->isReadable();
        $data->isWritable = $obj->isWritable();
        return $data;
    }

}
