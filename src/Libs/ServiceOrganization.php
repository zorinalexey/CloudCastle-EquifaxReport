<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 *
 */
final class ServiceOrganization
{

    /**
     * @var int
     */
    public int $reg_rus = 1;

    /**
     * @var string|null
     */
    public ?string $fullname = null;
    /**
     * @var string|null
     */
    public ?string $shortname = null;

    /**
     * @var string|null
     */
    public ?string $othername = null;

    /**
     * @var int|null
     */
    public ?int $ogrn_no = null;

    /**
     * @var int
     */
    public int $inn_code = 1;

    /**
     * @var int|null
     */
    public ?int $inn_no = null;

    /**
     * @var string|null
     */
    public ?string $service_start_date = null;

    /**
     * @var string|null
     */
    public ?string $service_end_date = null;

    /**
     * @var string|null
     */
    public ?string $issuer_fullname = null;

    /**
     * @var int|null
     */
    public ?int $issuer_ogrn_no = null;
}