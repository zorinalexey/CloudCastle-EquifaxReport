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

    use Helper;

    /**
     * Признак наличия задолженности
     * @var int
     */
    public ?int $sign = null;

    /**
     * Признак расчета по последнему платежу
     * @var int|null
     */
    public ?int $sign_calc_last_payout = 1;

    /**
     *
     * @var string|null
     */
    public ?string $calc_date = null;
    public int $first_sum = 0,
        $sum = 0,
        $op_sum = 0,
        $percent_sum = 0,
        $other_sum = 0,
        $sign_unaccepted_grace_period = 1;

    public function __construct(array $debt)
    {
        $this->setAttributes($debt);
        if (isset($debt['sign'])) {
            $this->sign = (int)((bool)$debt['sign']);
        }
        if ($this->sign) {
            $this->sign_calc_last_payout = null;
        } elseif (isset($debt['sign_calc_last_payout'])) {
            $this->sign_calc_last_payout = (int)((bool)$debt['sign_calc_last_payout']);
        }
        if (isset($debt['sign_unaccepted_grace_period']) AND (bool)$debt['sign_unaccepted_grace_period']) {
            $this->sign_unaccepted_grace_period = 0;
        }
    }

}
