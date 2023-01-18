<?php

namespace CloudCastle\EquifaxReport\Libs;
/**
 * Сведения о задолженности
 */
class Debt
{
    /**
     * Признак расчета по последнему платежу
     * @var int|null
     */
    public ?int $sign_calc_last_payout = null;
    /**
     * Дата расчета
     * @var string|null
     */
    public ?string $calc_date = null;
    /**
     * Сумма задолженности на дату передачи финансирования субъекту или возникновения обеспечения исполнения обязательства
     * @var float|int|null
     */
    public ?float $first_sum = 0;
    /**
     * Сумма задолженности
     * @var float|int|null
     */
    public ?float $sum = 0;
    /**
     * Сумма задолженности по основному долгу
     * @var float|int|null
     */
    public ?float $op_sum = 0;
    /**Сумма задолженности по процентам
     * @var float|int|null
     */
    public ?float $percent_sum = 0;
    /**
     * Сумма задолженности по иным требованиям
     * @var float|int|null
     */
    public ?float $other_sum = 0;
    /**
     * Признак неподтвержденного льготного периода
     * @var int|null
     */
    public ?int $sign_unaccepted_grace_period = 0;
}