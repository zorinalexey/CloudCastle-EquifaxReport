<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения о приобретателе прав - физическом лице
 */
final class PrivatePurchaser
{
    /**
     * Фамилия
     * @var string|null
     */
    public ?string $lastname = null;

    /**
     * Имя
     * @var string|null
     */
    public ?string $firstname = null;

    /**
     * Отчество
     * @var string|null
     */
    public ?string $middlename = null;

    /**
     * Дата рождения
     * @var string|null
     */
    public ?string $birthday = null;

    /**
     * Место рождения
     * @var string|null
     */
    public ?string $birthplace = null;

    /**
     * Код номера налогоплательщика
     * @var int|null
     */
    public ?int $inn_code = null;

    /**
     * Номер налогоплательщика
     * @var string|null
     */
    public ?string $inn_no = null;

    /**
     * СНИЛС
     * @var string|null
     */
    public ?string $snils = null;

    /**
     * Код документа
     * @var string|null
     */
    public ?string $doc_type = null;

    /**
     * Наименование иного документа
     * @var string|null
     */
    public ?string $doc_type_text = null;

    /**
     * Серия документа
     * @var string|null
     */
    public ?string $doc_serial = null;

    /**
     * Номер документа
     * @var string|null
     */
    public ?string $doc_number = null;

    /**
     * Дата выдачи документа
     * @var string|null
     */
    public ?string $doc_date = null;

    /**
     * Кем выдан документ
     * @var string|null
     */
    public ?string $doc_who = null;

    /**
     * Код подразделения
     * @var string|null
     */
    public ?string $doc_department_code = null;

    /**
     * Дата приобретения прав
     * @var string|null
     */
    public ?string $purchase_date = null;
}