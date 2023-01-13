<?php

namespace CloudCastle\EquifaxReport\Libs;

class ServiceOrganization
{
    public int $reg_rus = 1;
    public ?string $fullname = null;
    public ?string $shortname  = null;
    public ?string $othername  = null;
    public ?int $ogrn_no  = null;
    public int $inn_code  = 1;
    public ?int $inn_no  = null;
    public ?string $service_start_date  = null;
    public ?string $service_end_date  = null;
    public ?string $issuer_fullname  = null;
    public ?int $issuer_ogrn_no  = null;
}