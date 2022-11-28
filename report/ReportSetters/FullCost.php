<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

/**
 * Класс FullCost
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class FullCost
{

    /**
     * Полная стоимость кредита (займа) в процентах годовых
     * @var int
     */
    public ?int $percent = null;

    /**
     * Полная стоимость кредита (займа) в денежном выражении
     * @var int
     */
    public ?int $sum = null;

    /**
     * Дата расчета полной стоимости кредита (займа)
     * @var string|null
     */
    public ?string $date = null;

    public function __construct(array $fullCost)
    {

    }

}
