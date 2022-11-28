<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

/**
 * Класс Debt
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class Debt
{

    /**
     * Признак наличия задолженности
     * @var int
     */
    public ?int $sign = 1;

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
     * @var int|null
     */
    public ?int $first_sum = null;

    /**
     * Сумма задолженности
     * @var int|null
     */
    public ?int $sum = null;

    /**
     * Сумма задолженности по основному долгу
     * @var int|null
     */
    public ?int $op_sum = null;

    /**
     * Сумма задолженности по процентам
     * @var int|null
     */
    public ?int $percent_sum = null;

    /**
     * Сумма задолженности по иным требованиям
     * @var int|null
     */
    public ?int $other_sum = null;

    /**
     * Признак неподтвержденного льготного периода
     * @var int|null
     */
    public ?int $sign_unaccepted_grace_period = null;

    public function __construct(array $debt)
    {

    }

}
