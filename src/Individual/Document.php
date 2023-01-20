<?php

declare(strict_types=1);

namespace CloudCastle\EquifaxReport\Individual;

/**
 * Класс Document
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\Report
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class Document
{

    /**
     * Код страны гражданства
     * @var int
     */
    public int $country = 643;

    /**
     * Код типа документа удостоверяющего личность
     * @var int
     */
    public int $type = 21;

    /**
     * Серия документа
     * @var string|null
     */
    public ?string $serial = null;

    /**
     * Номер документа
     * @var string|null
     */
    public ?string $number = null;

    /**
     * Дата выдачи документа
     * @var string|null
     */
    public ?string $date = null;

    /**
     * Кем выдан документ
     * @var string|null
     */
    public ?string $who = null;

    /**
     * Код подразделения вадавшего документ
     * @var string|null
     */
    public ?string $department_code = null;

    /**
     * Дата истечения срока документа
     * @var string|null
     */
    public ?string $end_date = null;

    /**
     * Название страны гражданства
     * @var string|null
     */
    public ?string $country_text = null;

    /**
     * Тип документа
     * @var string|null
     */
    public ?string $type_text = null;

}
