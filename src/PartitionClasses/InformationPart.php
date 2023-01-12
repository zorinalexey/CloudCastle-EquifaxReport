<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\PartitionClasses;

/**
 * Класс InformationPart
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\PartitionClasses
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class InformationPart
{

    use DataSetter;

    public ?Application $application = null;
    public ?Credit $credit = null;
    public ?Failure $failure = null;

    public function __construct(array $informationPart)
    {
        $this->application = new Application();
        $this->credit = new Credit();
        $this->failure = new Failure();
        $this->__setData($informationPart);
    }

}
