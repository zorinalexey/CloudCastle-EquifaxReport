<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Величина среднемесячного платежа по договору займа (кредита) и дата ее расчета
 */
final class AveragePayment
{
    /**
     * Величина среднемесячного платежа
     * @var float|int
     */
    public float $sum = 0;
    /**
     * Дата расчета величины среднемесячного платежа
     * @var string|null
     */
    public ?string $date = null;

}