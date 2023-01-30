<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения о независимой гарантии
 */
class IndieGuarantee
{
    /**
     * УИд независимой гарантии
     * @var string|null
     */
    public ?string $uid = null;
    /**
     * Сумма независимой гарантии
     * @var float|null
     */
    public ?float $sum = null;
    /**
     * Валюта независимой гарантии
     * @var string
     */
    public string $currency = 'RUB';
    /**
     * Дата выдачи независимой гарантии
     * @var string|null
     */
    public ?string $date = null;
    /**
     * Дата окончания независимой гарантии согласно ее условиям
     * @var string|null
     */
    public ?string $end_date = null;
    /**
     * Дата фактического прекращения независимой гарантии
     * @var string|null
     */
    public ?string $fact_end_date = null;
    /**
     * Код причины прекращения независимой гарантии
     * По справочнику 4.2. Причины прекращения обеспечения
     * @var int
     */
    public int $end_reason = 1;
}