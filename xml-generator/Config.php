<?php

declare(strict_types = 1);

namespace CloudCastle\XmlGenerator;

/**
 * Класс Config
 * @version 0.0.1
 * @package CloudCastle\XmlGenerator
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class Config
{

    /**
     * Путь файла для сохранения
     * @var string|null
     */
    private string $file = __DIR__ . DIRECTORY_SEPARATOR . 'xml-files' . DIRECTORY_SEPARATOR . 'test.xml';

    /**
     * Метод создания файла
     * @var string
     */
    private string $type = 'filesystem';

    /**
     * Освобождать память после выполнения или нет
     * @var bool
     */
    private bool $flush = true;

    /**
     * Задать путь для сохранения файла
     * @param string $file Путь к файлу для сохранения
     * @return void
     */
    public function setFile(?string $file = null): void
    {
        if ($file) {
            $this->file = $file;
        }
    }

    /**
     * Получить путь для заданного файла
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * Задать метод создания xml файла
     * @param string $type Тип метода создания xml файла. filesystem - Создать файл на диске, иначе создать в память
     * @return void
     */
    public function setType(string $type = 'filesystem'): void
    {
        if (mb_strtolower($type) != 'filesystem') {
            $this->type = 'memory';
        } else {
            $this->type = 'filesystem';
        }
    }

    /**
     * Получить метод создания файла
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Получить значение использования памяти
     * @return bool
     */
    public function getFlush(): bool
    {
        return $this->flush;
    }

    /**
     * Задать значение использования памяти
     * @param bool $flush Освобождать память после генерации или нет? true - освобождать (по умолчанию), false - не освобождать.
     * @return void
     */
    public function setFlush(bool $flush = true): void
    {
        $this->flush = $flush;
    }

}
