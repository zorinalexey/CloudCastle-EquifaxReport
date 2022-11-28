<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxConfig;

use stdClass;
use CloudCastle\FileSystem\Json;
use CloudCastle\EquifaxConfig\AbstractClasses\AbstractInstance;

/**
 * Класс Config
 * @version 0.0.1
 * @package CloudCastle\EquifaxConfig
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class Config extends AbstractInstance
{

    const version = '4.0';

    /**
     * Id партнера системе equifax
     * @var string
     */
    private string $partnerId = '';

    /**
     * Наименование оргранизации
     * @var string
     */
    private string $orgName = '';

    /**
     * Дирректория для сохранения сгенерированых файлов
     * @var string
     */
    public string $filesDir = __DIR__;

    /**
     * ОГРН организации
     * @var string
     */
    private string $ogrn = '';

    /**
     * ИНН организации
     * @var string
     */
    private string $inn = '';

    /**
     * Номер type организации в системе equifax
     * @var string
     */
    private string $type = '';

    /**
     * Url адрес для скоринг запросов по клиенту
     * @var string
     */
    private string $scoringUrl = 'https://bki-b2b.scoring.ru/cr4.php';

    /**
     * Url адрес для отправки отчета по клиенту
     * @var string
     */
    private string $sendReportUrl = 'https://bki-file.equifax.ru';

    /**
     * Режим работы сервиса
     * @var bool
     */
    private bool $test = false;

    /**
     * Действие производимое с записью кредитной истории
     * @var Action|null
     */
    private $action = false;

    /**
     * Конструктор класса
     * @param string $configFile Json файл конфигурации сервиса
     */
    public function __construct(?string $configFile = null)
    {
        $data = Json::read($configFile);
        if ($data) {
            $this->setConfig($data);
        }
        $this->setUrl();
        self::$objects[__CLASS__] = $this;
    }

    /**
     * Установка параметров конфигурации сервиса
     * @param stdClass $data Объект параметров конфигурации сервиса
     * @return void
     */
    private function setConfig(stdClass $data): void
    {
        foreach ($data as $property => $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }

    /**
     * Установка Url адресов для запроса
     * @return void
     */
    private function setUrl(): void
    {
        if ($this->test) {
            $this->scoringUrl = 'https://bki-b2b-test.scoring.ru/cr4.php';
            $this->sendReportUrl = 'https://bki-file-test.equifax.ru';
        } else {
            $this->scoringUrl = 'https://bki-b2b.scoring.ru/cr4.php';
            $this->sendReportUrl = 'https://bki-file.equifax.ru';
        }
    }

    /**
     * Получить Id партнера системе equifax
     * @return string
     */
    public function getPartnerId(): string
    {
        return $this->partnerId;
    }

    /**
     * Получить Url адрес для отправки отчета по клиенту
     * @return string
     */
    public function getSendReportUrl(): string
    {
        return $this->sendReportUrl;
    }

    /**
     * Получить Url адрес для скоринг запросов по клиенту
     * @return string
     */
    public function getScoringUrl(): string
    {
        return $this->scoringUrl;
    }

    /**
     * Получить ОГРН организации
     * @return string
     */
    public function getOgrn(): string
    {
        return $this->ogrn;
    }

    /**
     * Получить Наименование оргранизации
     * @return string
     */
    public function getOrgName(): string
    {
        return $this->orgName;
    }

    /**
     * Получить ИНН организации
     * @return string
     */
    public function getInn(): string
    {
        return $this->inn;
    }

    /**
     * Установить действия производимые с записью кредитной истории
     * @param Action $action Объект действий
     * @return void
     */
    public function setAction(Action $action): void
    {
        $this->action = $action;
    }

    public function getAction(): Action
    {
        if ($this->action) {
            return $this->action;
        }
        return new Action();
    }

}
