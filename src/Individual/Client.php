<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\Individual;

use CloudCastle\Helpers\Format;
use CloudCastle\EquifaxReport\ClientInterface;
use CloudCastle\EquifaxReport\Debug;
use CloudCastle\EquifaxLibrary\CodesOfCountriesAccordingToOKSM;
use CloudCastle\EquifaxLibrary\TypesOfIdentityDocuments;

/**
 * Класс Client
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\Individual
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class Client extends Debug implements ClientInterface
{

    public ?string $kski_code = null;
    private string $last = '';
    private string $first = '';
    private ?string $middle = null;
    private array $document = [
        'country' => null,
        'country_text' => null,
        'type' => null,
        'type_text' => null,
        'serial' => null,
        'number' => null,
        'date' => null,
        'who' => null,
        'department_code' => null,
        'end_date' => null
    ];
    private ?string $birthPlace;
    private int $birthCountry;
    private ?string $birthDate;
    public $history;
    private array $inn = [
        'code' => 1,
        'inn' => false,
        'ogrnip' => false
    ];
    private ?string $snils = null;

    public function setHistory(): self
    {
        $this->history = new self();
        return $this->history;
    }

    /**
     * Установить дату и место рождения клиента
     * @param array $birth Индексированый массив ['date', 'birthCountry', 'birthPlace']
     * Ключ date Дата рождения
     * Ключ birthCountry Страна рождения
     * Ключ birthPlace Место рождения
     * @return self
     */
    public function setBirth(array $birth): self
    {
        if (isset($birth['date'])) {
            $this->birthDate = Format::date($birth['date']);
        }
        if (isset($birth['birthCountry'])) {
            $this->birthCountry = (int)(new CodesOfCountriesAccordingToOKSM($birth['birthCountry']))->code;
        }
        if (isset($birth['birthPlace'])) {
            $this->birthPlace = $birth['birthPlace'];
        }
        return $this;
    }

    /**
     * Получить информацию о дате рождения
     * @return array
     */
    public function getBirth(): array
    {
        return [
            'date' => $this->birthDate,
            'country' => $this->birthCountry,
            'place' => $this->birthPlace,
        ];
    }

    private function __setDocumentWho(string $who)
    {
        $this->document['who'] = $who;
    }

    private function __setDocumentDepartmentCode(string $department_code)
    {
        $this->document['department_code'] = $department_code;
    }

    private function __setDocumentEndDate(string $end_date)
    {
        $this->document['end_date'] = Format::date($end_date);
    }

    private function __setDocumentCountry(string $country)
    {
        $this->document['country'] = (new CodesOfCountriesAccordingToOKSM($country))->code;
        $this->document['country_text'] = mb_strtoupper($country);
    }

    private function __setDocumentType(string $type)
    {
        $this->document['type'] = (new TypesOfIdentityDocuments($type))->code;
        $this->document['type_text'] = mb_strtoupper($type);
    }

    private function __setDocumentSerial(string $serial)
    {
        $this->document['serial'] = $serial;
    }

    private function __setDocumentNumber(string $number)
    {
        $this->document['number'] = $number;
    }

    private function __setDocumentDate(string $date)
    {
        $this->document['date'] = Format::date($date);
    }

    /**
     * Получить  Ф.И.О.
     * @return array
     */
    public function getName(): array
    {
        return [
            'last' => $this->last,
            'first' => $this->first,
            'middle' => $this->middle
        ];
    }

    /**
     * Установить Ф.И.О.
     * @param string $last Фамилия
     * @param string $first Имя
     * @param string|null $middle Отчество
     * @return self
     */
    public function setName(string $last, string $first, ?string $middle = null): self
    {
        $this->last = mb_strtoupper(trim($last));
        $this->first = mb_strtoupper(trim($first));
        if ($middle) {
            $this->middle = mb_strtoupper(trim($middle));
        }
        return $this;
    }

    /**
     * Получить информацию о документе
     * @return array
     */
    public function getDocument(): array
    {
        return $this->document;
    }

    /**
     * Установить информацию о документе
     * @param array $document Индексированый массив
     * Ключ country Наименование страны гражданства
     * Ключ type Тип документа (паспорт)
     * Ключ serial Серия документа
     * Ключ number Номер Документа
     * Ключ date Дата выдачи документа
     * Ключ who Кем выдан документ
     * Ключ department_code Код подразделения
     * Ключ end_date Дата окончания срока действия документа
     * @return self
     */
    public function setDocument(array $document): self
    {
        foreach ($this->document as $key => $value) {
            if (isset($document[$key])) {
                $method = $this->setPrivateDocumentMethod($key);
                $this->$method($document[$key]);
            }
        }
        return $this;
    }

    /**
     * Установить ИНН и ОГРН ИП клиента
     * @param array $inn Индексированый массив
     * Ключ inn Номер налогоплательщика клиента
     * Ключ ogrnip Регистрационный номер ИП клиента
     * Ключ regDateIp Дата регистрации ИП клиента
     * Ключ code (Не обязательный) Признак резидента РФ. 1 - резидент, 2 - не резидент (по умолчанию 1)
     * @return self
     */
    public function setInn(array $inn): self
    {
        if (isset($inn['inn'])) {
            $this->inn['inn'] = $inn['inn'];
        }
        if (isset($inn['ogrnip'])) {
            $this->inn['ogrnip'] = $inn['ogrnip'];
        }
        if (isset($inn['regDateIp'])) {
            $this->inn['regDateIp'] = Format::date($inn['regDateIp']);
        }
        if (isset($inn['code'])) {
            $this->inn['code'] = $inn['code'];
        }
        return $this;
    }

    /**
     * Установить СНИЛС клиента
     * @param string $snils Строка с номером СНИЛС
     * @return self
     */
    public function setSnils(string $snils): self
    {
        $this->snils = preg_replace('~([^\d])~ui', '', $snils);
        return $this;
    }

    /**
     * Получить номер СНИЛС клиента
     * @return string Корректная строка номера СНИЛС клиента
     */
    public function getSnils(): string
    {
        return $this->snils;
    }

    /**
     * Получить информацию об ИНН и ОГРН ИП клиента
     * @return array Массив с ключами ['inn', 'ogrnip', 'code']
     */
    public function getInn(): array
    {
        return $this->inn;
    }

    private function setPrivateDocumentMethod(string $key): string
    {
        $str = '__setDocument';
        $data = explode('_', $key);
        foreach ($data as $value) {
            $str .= ucfirst($value);
        }
        return $str;
    }

}
