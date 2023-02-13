<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Прекращение обязательства
 */
final class ContractEnd
{

    /**
     * Код основания прекращения обязательства
     * По справочнику 3.8. Основания прекращения обязательства
     * @var int
     */
    public int $reason = 1;

    /**
     * Дата фактического прекращения обязательства
     * @var string|null
     */
    public ?string $date = null;

}