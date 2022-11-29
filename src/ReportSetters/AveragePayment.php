<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

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

    use Helper;

    public int $sum = 0;
    public ?string $date;

    public function __construct(array $averagePayment)
    {
        $this->setAttributes($averagePayment);
    }

}
