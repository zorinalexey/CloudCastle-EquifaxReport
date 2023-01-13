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
     * Страна гражданства
     * @var string|null
     */
    public ?string $country = null;

    /**
     * Тип документа удостоверяощего личность
     * @var string|null
     */
    public ?string $type = null;

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
     * дата истечения срока документа
     * @var string|null
     */
    public ?string $end_date = null;

}
