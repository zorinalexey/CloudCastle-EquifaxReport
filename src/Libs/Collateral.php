<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 *
 */
class Collateral
{
    /**
     * Код предмета залога
     * @var float|null
     */
    public ?float $item_type = null;
    /**
     * Идентификационный код предмета залога
     * @var string|null
     */
    public ?string $id = null;
    /**
     * Дата заключения договора залога
     * @var string|null
     */
    public ?string $date = null;
    /**
     * Стоимость предмета залога
     * @var float|int
     */
    public float $sum = 0;
    /**
     * Валюта стоимости предмета залога
     * @var string
     */
    public string $currency = 'RUB';
    /**
     * Дата проведения оценки предмета залога
     * @var string|null
     */
    public ?string $date_assessment = null;
    /**
     * Признак иного обременения предмета залога
     * @var float|int
     */
    public float $item_burden = 0;
    /**
     * Дата прекращения залога согласно договору
     * @var string|null
     */
    public ?string $end_date = null;
    /**
     * Дата фактического прекращения залога
     * @var string|null
     */
    public ?string $fact_end_date = null;
    /**
     * Код причины прекращения залога
     * @var float|null
     */
    public ?float $end_reason = null;

}