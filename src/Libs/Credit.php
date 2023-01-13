<?php

namespace CloudCastle\EquifaxReport\Libs;

class Credit
{
    public ?float $ratio = null;
    public ?float $type = null;
    public ?string $uid = null;
    public ?string $date = null;
    public ?bool $sign_90plus = null;
    public int $sign_stop_load = 0;
}