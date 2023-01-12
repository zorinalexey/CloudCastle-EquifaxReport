<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\PartitionClasses;

/**
 * Класс AddParts
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\PartitionClasses
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class AddParts
{

    use DataSetter;

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

    public function __construct(array $add_parts = [])
    {
        $this->accounting = new Accounting();
        $this->service_organization = new ServiceOrganization();
        $this->purchaser = new Purchaser;
        $this->__setData($add_parts);
    }

}
