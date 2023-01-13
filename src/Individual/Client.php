<?php

declare(strict_types=1);

namespace CloudCastle\EquifaxReport\Individual;

use CloudCastle\EquifaxReport\Libs\Address;

/**
 * Класс Client
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\Report
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class Client
{

    /**
     * Фамилия
     * @var string|null
     */
    public ?string $last = null;

    /**
     * Имя
     * @var string|null
     */
    public ?string $first = null;

    /**
     * Отчество
     * @var string|null
     */
    public ?string $middle = null;

    /**
     * Документ удостоверяющий личность
     * @var Document|null
     */
    public ?Document $doc = null;

    /**
     * Дата рождения
     * @var string|null
     */
    public ?string $birthDate = null;

    /**
     * Страна рожденияtring
     * @var string|null
     */
    public ?string $birthCountry = null;

    /**
     * Код субъекта кредитной истории
     * @var string|null
     */
    public ?string $kski = null;

    /**
     * Место рождения
     * @var string|null
     */
    public ?string $birthPlace = null;

    /**
     * Предыдущие данные клиента
     * @var History|null
     */
    public ?History $history = null;

    /**
     * Номер СНИЛС
     * @var string|null
     */
    public ?string $snils = null;

    /**
     * Инн клиента
     * @var Inn|null
     */
    public ?Inn $inn = null;

    public function __construct()
    {
        $this->doc = new Document();
        $this->inn = new Inn();
        $this->addr_reg = new Address();
    }

}
