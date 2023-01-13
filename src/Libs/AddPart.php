<?php

namespace CloudCastle\EquifaxReport\Libs;

class AddPart
{
    public ?Accounting $accounting = null;
    public ?ServiceOrganization $service_organization = null;

    public function __construct(){
        $this->accounting = new Accounting();
        $this->service_organization = new ServiceOrganization();
    }
}