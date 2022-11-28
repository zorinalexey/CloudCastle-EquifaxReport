<?php

declare(strict_types = 1);

namespace CloudCastle\XmlGenerator;

use \XMLWriter;
Use CloudCastle\FileSystem\Dir;
use CloudCastle\FileSystem\File;

/**
 * Класс XmlGenerator
 * @version 0.0.1
 * @package CloudCastle\XmlGenerator
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class XmlGenerator
{

    /**
     * Объект генерации xml
     * @var XMLWriter|null
     */
    private ?XMLWriter $obj = null;

    /**
     * Путь к файлу для сохранения
     * @var string|null
     */
    private ?string $file = null;

    /**
     * Конфигурация генратора
     * @var Config|null
     */
    private ?Config $config;

    /**
     * Конструктор класса
     * @param Config $config Параметры конфигурации
     */
    public function __construct(Config $config)
    {
        $this->obj = new XMLWriter();
        $this->config = $config;
        if ($this->config->getType() === 'filesystem') {
            $this->setFileSystemGenerator();
        } else {
            $this->setMemoryGenerator();
        }
    }

    /**
     * Создать файл на диске
     * @return void
     */
    private function setFileSystemGenerator(): void
    {
        $this->file = $this->config->getFile();
        if (Dir::create(dirname($this->file))) {
            $this->obj->openUri($this->file);
        } else {
            $this->setMemoryGenerator();
        }
    }

    /**
     * Создать файл в память
     * @return void
     */
    private function setMemoryGenerator(): void
    {
        $this->obj->openMemory();
    }

    /**
     * Запустить генерацию документа
     * @param string $version Версия документа
     * @param string $encoding Кодировка документа
     * @return self
     */
    public function startDocument(string $version = '1.0', string $encoding = 'utf-8'): self
    {
        $this->obj->startDocument($version, $encoding);
        return $this;
    }

    /**
     * Открыть элемент схемы
     * @param string $name Наименование элемента
     * @param array $attribites Атрибуты элемента
     * @param string|null $comment коментарий к элементу
     * @return self
     */
    public function startElement(string $name, array $attribites = [], ?string $comment = null): self
    {
        if ($comment) {
            $this->obj->startComment();
            $this->obj->text($comment);
            $this->obj->endComment();
        }
        $this->obj->startElement($name);
        if ($attribites) {
            foreach ($attribites AS $key => $value) {
                $this->addAttribute($key, $value);
            }
        }
        return $this;
    }

    /**
     * Закрыть элемент схемы
     * @return self
     */
    public function closeElement(): self
    {
        $this->obj->endElement();
        return $this;
    }

    /**
     * Получить резултат генерации xml
     * @return Xml
     */
    public function get(): Xml
    {
        $this->obj->endDocument();
        $response = new Xml();
        $response->file = $this->file;
        if ($this->config->getType() === 'filesystem') {
            $response->structure = File::read($this->file);
        } else {
            $response->structure = $this->obj->outputMemory($this->config->getFlush());
        }
        return $response;
    }

    /**
     * Добавить атрибут к элементу
     * @param string $name Наименование атрибута
     * @param string|int $text Значение атрибута
     * @return self
     */
    public function addAttribute(string $name, $text): self
    {
        if ($name AND $text) {
            $this->obj->startAttribute($name);
            $this->obj->text((string)$text);
            $this->obj->endAttribute();
        }
        return $this;
    }

    /**
     * Добавить элемент с содержанием
     * @param string $name Наименование элемента
     * @param string|int|null|bool $content Содержание элемента
     * @param array $attribites Атрибуты элемента
     * @param string|null $comment Коментарий элемента
     * @return self
     */
    public function addElement($name, $content, array $attribites = [], $comment = null): self
    {
        if ($name AND $content !== null) {
            $this->startElement($name, $attribites, $comment);
            $this->obj->text((string)$content);
            $this->closeElement();
        }
        return $this;
    }

}
