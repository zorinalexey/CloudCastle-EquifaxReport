<?php

namespace CloudCastle\EquifaxReport\Libs;

final class BasePart
{
    public ?Address $addr_reg = null;
    public ?Address $addr_fact = null;
    public array $contacts = [];
    public ?string $ogrnip = null;
    public ?Incapacity $incapacity = null;
    public ?Contract $contract = null;
    public ?Court $court = null;

    public function __construct()
    {
        $this->addr_reg = new Address();
        $this->addr_fact = new Address();
        $this->incapacity = new Incapacity();
        $this->contract = new Contract();
        $this->court = new Court();
    }
}