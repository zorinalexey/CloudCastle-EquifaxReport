<?php

declare(strict_types=1);

namespace CloudCastle\EquifaxReport\Individual;

/**
 * Класс Inn
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\Report
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class Inn
{

    /**
     * Номер ИНН
     * @var string|null
     */
    public ?string $no = null;

    /**
     * Признак резидента РФ
     * @var bool
     */
    public bool $code = true;

    /**
     * Регистрационный номер ИП
     * @var string|null
     */
    public ?string $ogrnIp = null;

}
