<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

/**
 * Класс JointDebtors
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class JointDebtors
{

    /**
     * Признак наличия солидарных должников
     * @var int
     */
    public ?int $sign = null;

    /**
     * Число солидарных должников
     * @var int
     */
    public ?int $count = null;

    public function __construct(int $jointDebtors = 0)
    {
        if ($jointDebtors) {
            $this->sign = 1;
            $this->count = $jointDebtors;
        }
    }

}
