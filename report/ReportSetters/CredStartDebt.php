<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\ReportSetters;

use CloudCastle\Helpers\Format;

/**
 * Класс CredStartDebt
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\ReportSetters
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class CredStartDebt
{

    /**
     * Дата передачи финансирования субъекту или возникновения обеспечения исполнения обязательства
     * @var string|null
     */
    public ?string $date = null;

    public function __construct(?string $credStartDebt = null)
    {
        $this->date = Format::date($credStartDebt);
    }

}
