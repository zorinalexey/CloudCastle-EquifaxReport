<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 *
 */
class Deal
{
    /**
     * @var int|null
     */
    public ?int $ratio = null;
    /**
     * @var string|null
     */
    public ?string $date = null;
    /**
     * @var string|null
     */
    public ?string $category = null;
    /**
     * @var string|null
     */
    public ?string $type = null;
    /**
     * @var string|null
     */
    public ?string $purpose = null;
    /**
     * @var string|null
     */
    public ?string $sign_credit = null;
    /**
     * @var string|null
     */
    public ?string $sign_credit_card = null;
    /**
     * @var string|null
     */
    public ?string $sign_renovation = null;
    /**
     * @var float|int
     */
    public float $sign_deal_cash_source = 1;
    /**
     * @var float|int
     */
    public float $sign_deal_cash_subject = 1;
    /**
     * @var string|null
     */
    public ?string $end_date = null;
}