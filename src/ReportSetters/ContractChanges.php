<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

use CloudCastle\Helpers\Format;
use CloudCastle\EquifaxLibrary\TypesOfAmendmentOfTheContract;
use CloudCastle\EquifaxLibrary\ReasonsForTerminationOfTheContractAmendment;

/**
 * Класс ContractChanges
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class ContractChanges
{

    use Helper;

    /**
     * Признак изменения договора
     * @var int
     */
    public ?int $sign = null;

    /**
     * Дата изменения договора
     * @var string|null
     */
    public ?string $date = null;

    /**
     * Код вида изменения договора
     * @var int|null
     */
    public ?int $type = null;

    /**
     * Код специального изменения договора
     * @var int|null
     */
    public ?int $special_type = null;

    /**
     * Описание иного изменения договора
     * @var string|null
     */
    public ?string $type_text = null;

    /**
     * Дата вступления изменения договора в силу
     * @var string|null
     */
    public ?string $apply_date = null;

    /**
     * Дата планового прекращения действия изменения договора
     * @var string|null
     */
    public ?string $end_date = null;

    /**
     * Дата фактического прекращения действия изменения договора
     * @var string|null
     */
    public ?string $finish_date = null;

    /**
     * Код причины прекращения действия изменения договора
     * @var int|null
     */
    public ?int $finish = null;

    /**
     * Курс конверсии валюты долга
     * @var int|null
     */
    public ?int $currency_price = null;

    public function __construct(array $contractChanges)
    {
        foreach (array_keys((array)$this) as $propperty) {
            if (isset($contractChanges[$propperty])) {
                $method = $this->getMethodName($propperty);
                if (method_exists($this, $method)) {
                    $this->$method((string)$contractChanges[$propperty]);
                }
            }
        }
        if ($this->sign === 0) {
            foreach (array_keys((array ($this))) as $key) {
                if ($key !== 'sign') {
                    $this->$key = null;
                }
            }
        }
    }

    private function __setTypeText(string $typeText): void
    {
        $this->type_text = $typeText;
    }

    private function __setType(string $type): void
    {
        $this->type = (int)(new TypesOfAmendmentOfTheContract($type))->code;
    }

    private function __setSpecialType(string $specialType): void
    {
        $this->special_type = (int)$specialType;
    }

    private function __setDate(string $date): void
    {
        $this->date = Format::date($date);
    }

    private function __setApplyDate(string $date): void
    {
        $this->apply_date = Format::date($date);
    }

    private function __setEndDate(string $date): void
    {
        $this->end_date = Format::date($date);
    }

    private function __setFinishDate(string $date): void
    {
        $this->finish_date = Format::date($date);
    }

    private function __setFinish(string $finish): void
    {
        $this->finish = (int)(new ReasonsForTerminationOfTheContractAmendment($finish))->code;
    }

}
