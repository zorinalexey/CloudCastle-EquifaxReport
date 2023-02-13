<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения о погашении требований кредитора по обязательству за счет обеспечения
 */
final class RepaymentCollateral
{
    /**
     * Код использованного обеспечения
     * По справочнику 4.3. Виды использованного обеспечения
     * @var int
     */
    public int $code = 0;

    /**
     * Дата погашения требований за счет обеспечения
     * @var string|null
     */
    public ?string $date = null;

    /**
     * Сумма требований, погашенных за счет обеспечения
     * @var float|int
     */
    public float $sum = 0;
}