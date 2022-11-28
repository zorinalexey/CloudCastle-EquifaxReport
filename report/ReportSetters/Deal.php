<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

/**
 * Класс Deal
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class Deal
{

    /**
     * Код вида участия в сделке
     * @var string|null
     */
    public ?int $ratio = null;

    /**
     * Дата совершения сделки
     * @var string|null
     */
    public ?string $date = null;

    /**
     * Дата прекращения обязательства субъекта по условиям сделки
     * @var string|null
     */
    public ?string $end_date = null;

    /**
     * Код типа сделки
     * @var int
     */
    public ?int $category = null;

    /**
     * Код вида займа (кредита)
     * @var int
     */
    public ?int $type = null;

    /**
     * Код цели займа (кредита)
     * @var int
     */
    public ?int $purpose = null;

    /**
     * Признак потребительского кредита (займа)
     * @var int
     */
    public ?int $sign_credit = 1;

    /**
     * Признак использования платежной карты
     * @var int
     */
    public ?int $sign_credit_card = null;

    /**
     * Признак возникновения обязательства в результате новации
     * @var int
     */
    public ?int $sign_renovation = null;

    /**
     * Признак денежного обязательства источника
     * @var int
     */
    public ?int $sign_deal_cash_source = 1;

    /**
     * Признак денежного обязательства субъекта
     * @var int
     */
    public ?int $sign_deal_cash_subject = 1;

    public function __construct(array $deal)
    {

    }

}
