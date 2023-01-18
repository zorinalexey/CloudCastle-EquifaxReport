<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения об обращении
 * субъекта к источнику с
 * предложением
 * совершить сделку
 */
class Application
{
    /**
     * Код вида участия в сделке. По справочнику 2.1 - Виды участия в сделке
     * @var float|int
     */
    public float $ratio = 99;

    /**
     * Сумма запрошенного займа (кредита), лизинга или обеспечения
     * @var float|int|null
     */
    public ?float $sum = 0;

    /**
     * Запрошенная валюта обязательства
     * @var string|null
     */
    public ?string $currency = 'RUB';

    /**
     * УИд обращения
     * @var string|null
     */
    public ?string $uid = null;

    /**
     * Дата обращения
     * @var string|null
     */
    public ?string $date = null;

    /**
     * Код источника. По справочнику 6.1 - Виды источников
     * @var float|int
     */
    public float $source_type = 0;

    /**
     * Код способа обращения. По справочнику 6.4 - Виды обращений с предложением
     * совершить сделку
     * @var float|int
     */
    public float $way = 0;

    /**
     * Дата окончания действия одобрения обращения (оферты кредитора)
     * @var string|null
     */
    public ?string $approval_date = null;
}