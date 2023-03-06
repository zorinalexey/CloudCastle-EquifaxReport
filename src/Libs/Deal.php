<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Общие сведения о сделке
 */
final class Deal
{
    /**
     * Код вида участия в сделке
     * @var int
     */
    public int $ratio = 1;

    /**
     * Дата совершения сделки
     * @var string|null
     */
    public ?string $date = null;

    /**
     * Код типа сделки
     * @var int
     */
    public int $category = 1;

    /**
     * Код вида займа (кредита)
     * @var int
     */
    public int $type = 3;

    /**
     * Код цели займа (кредита)
     * @var float
     */
    public float $purpose = 19;

    /**
     * Признак потребительского кредита (займа)
     * @var int|null
     */
    public int $sign_credit = 1;

    /**
     * Признак использования платежной карты
     * @var int
     */
    public int $sign_credit_card = 0;

    /**
     * Признак возникновения обязательства в результате новации
     * @var int
     */
    public int $sign_renovation = 0;

    /**
     * Признак денежного обязательства источника
     * @var int
     */
    public int $sign_deal_cash_source = 1;

    /**
     *
     * Признак денежного обязательства субъекта
     * @var int
     */
    public int $sign_deal_cash_subject = 1;

    /**
     * Дата прекращения обязательства субъекта по условиям сделки
     * @var string|null
     */
    public ?string $end_date = null;

    public function __construct()
    {
        $this->end_date = date('d.m.Y', strtotime('+30 days'));
        $this->date = date('d.m.Y');
    }
}