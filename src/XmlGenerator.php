<?php

namespace CloudCastle\EquifaxReport;

use CloudCastle\EquifaxReport\Config\Config;
use RuntimeException;
use XMLWriter;

final class XmlGenerator
{


    private static ?XMLWriter $xml = null;
    private string $file;

    public function __construct(Config $config)
    {
        if (!self::$xml) {
            self::$xml = new XMLWriter();
        }
        $this->file = $config->numberFile();
        self::$xml->openUri($this->file);
    }

    /**
     * Запустить генерацию документа
     * @param string|null $version Версия документа
     * @param string|null $encoding Кодировка документа
     * @return self
     */
    public function startDocument(?string $version = null, ?string $encoding = null): self
    {
        $encoding ??= 'utf-8';
        $version ??= '1.0';
        self::$xml->startDocument($version, $encoding);
        return $this;
    }

    /**
     * Получить результат генерации xml
     * @return string
     */
    public function get(): string
    {
        if(!Report::$subjects_count) {
            throw new RuntimeException('Нет корректных событий для формирования xml');
        }
        self::$xml->endDocument();
        self::$xml->outputMemory(true);
        return $this->file;
    }

    /**
     * Добавить элемент с содержанием
     * @param string $name Наименование элемента
     * @param string|int|null|bool $content Содержание элемента
     * @param array $attribites Атрибуты элемента
     * @param string|null $comment Комментарий элемента
     * @return self
     */
    public function addElement(string $name, $content, array $attribites = [], $comment = null): self
    {
        if ($name && $content !== null) {
            $this->startElement($name, $attribites, $comment);
            self::$xml->text((string)$content);
            $this->closeElement();
        }
        return $this;
    }

    /**
     * Открыть элемент схемы
     * @param string $name Наименование элемента
     * @param array $attributes Атрибуты элемента
     * @param string|null $comment Комментарий к элементу
     * @return self
     */
    public function startElement(string $name, array $attributes = [], ?string $comment = null): self
    {
        self::$xml->startElement($name);
        $this->addComment($comment);
        if ($attributes) {
            foreach ($attributes as $key => $value) {
                $this->addAttribute($key, $value);
            }
        }
        return $this;
    }

    /**
     * Вставить комментарий
     * @param string|null $comment
     * @return self
     */
    public function addComment(?string $comment = null): self
    {
        if ($comment) {
            self::$xml->startComment();
            self::$xml->text((string)$comment);
            self::$xml->endComment();
        }
        return $this;
    }

    /**
     * Добавить атрибут к элементу
     * @param string $name Наименование атрибута
     * @param string|int|null $text Значение атрибута
     * @return self
     */
    public function addAttribute(string $name, $text): self
    {
        if ($name and $text) {
            self::$xml->startAttribute($name);
            self::$xml->text((string)$text);
            self::$xml->endAttribute();
        }
        return $this;
    }

    /**
     * Закрыть элемент схемы
     * @return self
     */
    public function closeElement(): self
    {
        self::$xml->endElement();
        return $this;
    }
}