<?php

declare(strict_types=1);

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Класс Address
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class Address
{

    /**
     * Код адреса регистрации
     * @var string|null
     */
    public ?int $reg_code = null;
    /**
     * @var string|null
     */
    public ?string $index = null;
    /**
     * Код страны по ОКСМ
     * @var int
     */
    public int $country = 643;
    /**
     * Номер адреса в ФИАС
     * @var string|null
     */
    public ?string $fias = null;
    /**
     * Код населенного пункта по ОКАТО
     * @var string|null
     */
    public ?string $okato = null;
    /**
     * Иной населенный пункт
     * @var string|null
     */
    public ?string $other_statement = null;
    /**
     * Улица
     * @var string|null
     */
    public ?string $street = null;
    /**
     * Дом
     * @var string|null
     */
    public ?string $house = null;
    /**
     * Владение
     * @var string|null
     */
    public ?string $domain = null;
    /**
     * Корпус
     * @var string|null
     */
    public ?string $block = null;
    /**
     * Строение
     * @var string|null
     */
    public ?string $build = null;
    /**
     * @var string|null
     */
    public ?string $reg_date = null;
    /**
     * @var string|null
     */
    public ?string $reg_place = null;
    /**
     * Помещение (офис)
     * @var string|null
     */
    public ?string $apartment = null;
    /**
     * @var string|null
     */
    public ?string $reg_department_code = null;
    /**
     * Наименование иной страны
     * @var string|null
     */
    public string $country_text = 'Россия';

}
