<?php

namespace CloudCastle\EquifaxReport\Libs;
/**
 * Полная стоимость потребительского кредита (займа)
 */
final class FullCost
{
    /**
     * Полная стоимость кредита (займа) в процентах годовых
     * @var float|null
     */
    public ?float $percent = null;

    /**
     * Полная стоимость кредита (займа) в денежном выражении
     * @var float|null
     */
    public ?float $sum = null;

    /**
     * Дата расчета полной стоимости кредита (займа)
     * @var string|null
     */
    public ?string $date = null;
}