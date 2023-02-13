<?php

namespace CloudCastle\EquifaxReport\Libs;

final class Purchaser
{
    public ?Commercial $commercial = null;

    public function __construct()
    {
        $this->commercial = new Commercial();
    }
}