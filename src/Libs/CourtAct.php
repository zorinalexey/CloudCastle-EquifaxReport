<?php

namespace CloudCastle\EquifaxReport\Libs;
/**
 * -Сведения о судебных актах
 */
final class CourtAct
{
    /**
     * Дата принятия судебного акта
     * @var string|null
     */
    public ?string $date = null;

    /**
     * Номер судебного акта
     * @var string|null
     */
    public ?string $no = null;

    /**
     * Резолютивная часть судебного акта
     * @var string|null
     */
    public ?string $resolution = null;

    /**
     * Признак вступления акта в законную силу
     * @var bool
     */
    public bool $accepted = false;
}