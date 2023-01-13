<?php

declare(strict_types=1);

namespace CloudCastle\EquifaxReport\Libs;

use CloudCastle\EquifaxLibrary\CodesOfCountriesAccordingToOKSM;
use CloudCastle\EquifaxReport\ReportSetters\Helper;
use CloudCastle\Helpers\Format;

/**
 * Класс Address
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class Address
{

    use Helper;

    public ?string $reg_code = null;
    public ?string $index = null;
    public int $country = 643;
    public ?string $fias = null;
    public ?string $okato = null;
    public ?string $other_statement = null;
    public ?string $street = null;
    public ?string $house = null;
    public ?string $domain = null;
    public ?string $block = null;
    public ?string $build = null;
    public ?string $reg_date = null;
    public ?string $reg_place = null;
    public ?string $apartment = null;
    public ?string $reg_department_code = null;
    public ?string $country_text = null;

    public function __construct(array $addres)
    {
        foreach ($addres as $key => $value) {
            $method = $this->getMethodName($key);
            if (method_exists($this, $method)) {
                $this->$method((string)$value);
            }
        }
    }

    private function __setRegCode(string $regCode): void
    {
        $this->reg_code = $regCode;
    }

    private function __setIndex(string $index): void
    {
        $this->index = $index;
    }

    private function __setCountry(string $country): void
    {
        $this->country_text = mb_strtoupper($country);
        $this->country = (int)(new CodesOfCountriesAccordingToOKSM($country))->code;
    }

    private function __setFias(string $fias): void
    {
        $this->fias = $fias;
    }

    private function __setOkato(string $okato): void
    {
        $this->okato = $okato;
    }

    private function __setOtherStatement(string $otherStatement): void
    {
        $this->other_statement = $otherStatement;
    }

    private function __setStreet(string $street): void
    {
        $this->street = $street;
    }

    private function __setHouse(string $house): void
    {
        $this->house = $house;
    }

    private function __setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    private function __setBlock(string $block): void
    {
        $this->block = $block;
    }

    private function __setBuild(string $build): void
    {
        $this->build = $build;
    }

    private function __setRegPlace(string $regPlace): void
    {
        $this->reg_place = $regPlace;
    }

    private function __setRegDate(string $regDate): void
    {
        $this->reg_date = Format::date($regDate);
    }

    private function __setApartment(string $apartment): void
    {
        $this->apartment = $apartment;
    }

    private function __setRegDepartmentCode(string $code): void
    {
        $this->reg_department_code = $code;
    }

}
