<?php

namespace CloudCastle\EquifaxReport\Libs;

class PaymentTerms
{
    public ?string $op_next_payout_sum = null;
    public ?string $op_next_payout_date = null;
    public ?string $percent_next_payout_sum = null;
    public ?string $percent_next_payout_date = null;
    public ?string $regularity = null;
    public ?string $min_sum_pay_cc = null;
    public ?string $grace_date = null;
    public ?string $grace_end_date = null;
    public ?string $percent_end_date = null;
}