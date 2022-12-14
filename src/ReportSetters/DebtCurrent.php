<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

/**
 * Класс DebtCurrent
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class DebtCurrent
{

    use Helper;

    public ?string $date = null;
    public int $sum = 0,
        $op_sum = 0,
        $percent_sum = 0,
        $other_sum = 0;

    public function __construct(array $debtCurrent)
    {
        $this->setAttributes($debtCurrent);
    }

}
