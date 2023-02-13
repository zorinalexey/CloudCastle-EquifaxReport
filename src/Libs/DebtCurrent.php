<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения о срочной задолженности
 */
final class DebtCurrent
{
    /**
     * Дата возникновения срочной задолженности
     * @var string|null
     */
    public ?string $date = null;
    /**
     * Сумма срочной задолженности
     * @var float|int|null
     */
    public ?float $sum = 0;
    /**
     * Сумма срочной задолженности по основному долгу
     * @var float|int|null
     */
    public ?float $op_sum = 0;
    /**
     * Сумма срочной задолженности по процентам
     * @var float|int|null
     */
    public ?float $percent_sum = 0;
    /**
     * Сумма срочной задолженности по иным требованиям
     * @var float|int|null
     */
    public ?float $other_sum = 0;

    /**
     * @param string|null $date
     */
    public function __construct()
    {
        $this->date = date('d.m.Y');
    }


}