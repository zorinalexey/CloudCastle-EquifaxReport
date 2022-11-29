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

    public function __construct(array $debt)
    {

    }

}
