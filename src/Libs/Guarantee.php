<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения о поручительстве
 */
class Guarantee
{
    /**
     * УИд договора поручительства
     * @var string|null
     */
    public ?string $uid = null;
    /**
     * Размер поручительства
     * @var string|null
     */
    public ?int $sum = null;
    /**
     * Валюта поручительства
     * @var string|null
     */
    public string $currency = 'RUB';
    /**
     * Дата заключения договора поручительства
     * @var string|null
     */
    public ?string $date = null;
    /**
     * Дата прекращения поручительства согласно договору
     * @var string|null
     */
    public ?string $end_date = null;
    /**
     * Дата фактического прекращения поручительства
     * @var string|null
     */
    public ?string $fact_end_date = null;
    /**
     * Код причины прекращения поручительства
     * @var string|null
     */
    public ?float $end_reason = null;
}