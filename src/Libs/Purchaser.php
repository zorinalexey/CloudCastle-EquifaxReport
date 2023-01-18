<?php

namespace CloudCastle\EquifaxReport\Libs;

class Purchaser
{
    public ?Commercial $commercial = null;

    public function __construct()
    {
        $this->commercial = new Commercial();
    }
}