<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Дополнительная (закрытая) часть кредитной истории
 */
final class AddPart
{
    /**
     * Сведения об учете обязательства
     * @var Accounting|null
     */
    public ?Accounting $accounting = null;

    /**
     * Сведения об обслуживающей организации
     * @var ServiceOrganization|null
     */
    public ?ServiceOrganization $service_organization = null;

    /**
     * Сведения о приобретателе прав
     * @var Purchaser|null
     */
    public ?Purchaser $purchaser = null;

    /**
     *
     */
    public function __construct()
    {
        $this->accounting = new Accounting();
        $this->service_organization = new ServiceOrganization();
        $this->purchaser = new Purchaser();
    }
}