<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

use CloudCastle\Helpers\Format;

/**
 * Трейт Helper
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
trait Helper
{

    private function setAttributes(array $data)
    {
        foreach (array_keys((array)$this) AS $attr) {
            if (isset($data[$attr])) {
                $method = $this->getMethodName($attr);
                if (method_exists($this, $method)) {
                    $this->$method((string)$data[$attr]);
                }
            }
        }
    }

    private function getMethodName(string $key): string
    {
        $name = '__set';
        foreach (explode('_', $key) as $item) {
            $name .= ucfirst(strtolower($item));
        }
        return $name;
    }

    private function __setFirstSum(string $sum): void
    {
        if (property_exists($this, 'first_sum')) {
            $this->first_sum = (int)$sum;
        }
    }

    private function __setSum(string $sum): void
    {
        if (property_exists($this, 'sum')) {
            $this->sum = (int)$sum;
        }
    }

    private function __setOpSum(string $sum): void
    {
        if (property_exists($this, 'op_sum')) {
            $this->op_sum = (int)$sum;
        }
    }

    private function __setPercentSum(string $sum): void
    {
        if (property_exists($this, 'percent_sum')) {
            $this->percent_sum = (int)$sum;
        }
    }

    private function __setOtherSum(string $sum): void
    {
        if (property_exists($this, 'other_sum')) {
            $this->other_sum = (int)$sum;
        }
    }

    private function __setDate(string $date): void
    {
        if (property_exists($this, 'date')) {
            $this->date = Format::date($date);
        }
    }

    private function __setEndDate(string $date): void
    {
        if (property_exists($this, 'end_date')) {
            $this->end_date = Format::date($date);
        }
    }

    private function __setApplyDate(string $date): void
    {
        if (property_exists($this, 'apply_date')) {
            $this->apply_date = Format::date($date);
        }
    }

    private function __setFinishDate(string $date): void
    {
        if (property_exists($this, 'finish_date')) {
            $this->finish_date = Format::date($date);
        }
    }

    private function __setCalcDate(string $date): void
    {
        if (property_exists($this, 'calc_date')) {
            $this->calc_date = Format::date($date);
        }
    }

}
