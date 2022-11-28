<?php

declare(strict_types = 1);

namespace CloudCastle\XmlGenerator;

Use CloudCastle\FileSystem\File;

/**
 * Класс Xml
 * @version 0.0.1
 * @package CloudCastle\XmlGenerator
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class Xml
{

    /**
     * Структура xml файла
     * @var string|null
     */
    public ?string $structure = null;

    /**
     * Путь до сохраненного файла
     * @var string|null
     */
    public $file = '';

    /**
     * Сохранить результат генерации в файл
     * @param string|null $file Путь к файлу для сохраения
     * @return self
     */
    public function save(?string $file = null): self
    {
        if ($infoFile = File::create($file, $this->structure)) {
            $this->file = $infoFile->realPath;
        }
        return $this;
    }

}
