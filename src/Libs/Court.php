<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 *
 */
final class Court
{
    /**
     * Признак судебного спора или требования
     * @var bool
     */
    public bool $litigation = false;

    /**
     * Признак наличия судебного акта
     * @var bool
     */
    public bool $dispute_case = false;

    /**
     * Сведения о судебном акте
     * @var CourtAct|null
     */
    public ?CourtAct $court_act = null;

    public function __construct()
    {
        $this->court_act = new CourtAct();
    }

}