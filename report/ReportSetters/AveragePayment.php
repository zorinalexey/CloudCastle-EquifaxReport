<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

use CloudCastle\Helpers\Format;

/**
 * Класс AveragePayment
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class AveragePayment
{

    /**
     * Величина среднемесячного платежа
     * @var int|null
     */
    public ?int $sum = null;

    /**
     * Дата расчета величины среднемесячного платежа
     * @var string|null
     */
    public ?string $date = null;

    public function __construct(array $averagePayment)
    {
        if (isset($averagePayment['date'])) {
            $this->date = Format::date($averagePayment['date']);
        }
        if (isset($averagePayment['sum'])) {
            $this->sum = (int)$averagePayment['sum'];
        }
    }

}
