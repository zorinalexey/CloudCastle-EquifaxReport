<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

use CloudCastle\Helpers\Format;
use CloudCastle\EquifaxLibrary\TypesOfParticipationInTheTransaction;
use CloudCastle\EquifaxLibrary\TransactionTypes;
use CloudCastle\EquifaxLibrary\TypesOfLoan;
use CloudCastle\EquifaxLibrary\LoanPurposes;

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

    use Helper;

    /**
     * Код вида участия в сделке
     * @var string|null
     */
    public int $ratio = 1;

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
    public int $category = 1;

    /**
     * Код вида займа (кредита)
     * @var int
     */
    public int $type = 3;

    /**
     * Код цели займа (кредита)
     * @var int
     */
    public int $purpose = 15;

    /**
     * Признак потребительского кредита (займа)
     * @var int
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
     * Признак денежного обязательства субъекта
     * @var int
     */
    public int $sign_deal_cash_subject = 1;

    public function __construct(array $deal)
    {
        $this->setAttributes($deal);
        if ( ! $this->date) {
            $this->date = Format::date();
        }
    }

    private function __setSignCreditCard(string $sign_credit_card): void
    {
        $this->sign_credit_card = (int)((bool)$sign_credit_card);
    }

    private function __setSignRenovation(string $sign_renovation): void
    {
        $this->sign_renovation = (int)((bool)$sign_renovation);
    }

    private function __setSignDealCashSource(string $sign_deal_cash_source): void
    {
        $this->sign_deal_cash_source = (int)((bool)$sign_deal_cash_source);
    }

    private function __setSignDealCashSubject(string $sign_deal_cash_subject): void
    {
        $this->sign_deal_cash_subject = (int)((bool)$sign_deal_cash_subject);
    }

    private function __setRatio(string $ratio): void
    {
        $this->ratio = (int)(new TypesOfParticipationInTheTransaction($ratio))->code;
    }

    private function __setSignCredit(string $sign_credit): void
    {
        if ($sign_credit === 'null') {
            $this->sign_credit = null;
        } else {
            $this->sign_credit = (int)$sign_credit;
        }
    }

    private function __setCategory(string $category): void
    {
        $this->category = (int)(new TransactionTypes($category))->code;
    }

    private function __setType(string $type): void
    {
        $this->type = (int)(new TypesOfLoan($type))->code;
    }

    private function __setPurpose(string $purpose): void
    {
        $this->purpose = (int)(new LoanPurposes($purpose))->code;
    }

}
