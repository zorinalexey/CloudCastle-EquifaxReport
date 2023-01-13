<?php

declare(strict_types=1);

namespace CloudCastle\EquifaxReport\Individual;

/**
 * Класс History
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\Report
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class History
{

    /**
     * Фамилия
     * @var string|null
     */
    public ?string $last = null;

    /**
     * Имя
     * @var string|null
     */
    public ?string $first = null;

    /**
     * Отчество
     * @var string|null
     */
    public ?string $middle = null;

    /**
     * Предыдущий документ удостоверяющий личность
     * @var Document|null
     */
    public ?Document $doc = null;

    public function __construct()
    {
        $this->doc = new Document();
    }

}
