<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения о приобретателе прав - юридическом лице
 */
final class Commercial
{
    /**
     * Код приобретателя прав
     * 1 - Кредитная организация
     * 2 - Некредитная финансовая организация
     * 3 - Коллекторская организация
     * 99 - Иная организация
     * @var int|null
     */
    public ?int $type = null;

    /**
     * Признак регистрации в Российской Федерации
     * @var bool|null
     */
    public ?bool $reg_rus = null;

    /**
     * Полное наименование
     * @var string|null
     */
    public ?string $fullname = null;

    /**
     * Сокращенное наименование
     * @var string|null
     */
    public ?string $shortname = null;

    /**
     * Иное наименование
     * @var string|null
     */
    public ?string $othername = null;

    /**
     * Идентификатор LEI
     * @var string|null
     */
    public ?string $lei = null;

    /**
     * Регистрационный номер
     * @var string|null
     */
    public ?string $ogrn_no = null;

    /**
     * Код номера налогоплательщика
     * 1 - Идентификационный номер налогоплательщика, присвоенный налоговым органом Российской Федерации
     * 2 - Номер налогоплательщика, присвоенный уполномоченным органом иностранного государства, или его аналог
     * @var int|null
     */
    public ?int $inn_code = null;

    /**
     * Номер налогоплательщика
     * @var string|null
     */
    public ?string $inn_no = null;

    /**
     * Дата приобретения прав
     * @var string|null
     */
    public ?string $purchase_date = null;

}