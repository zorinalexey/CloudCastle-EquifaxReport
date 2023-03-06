<?php

declare(strict_types=1);

namespace CloudCastle\EquifaxReport\Libs;


/**
 * Изменились сведения о дееспособности субъекта
 */
final class Incapacity
{
    /**
     * Код дееспособности
     * @var int
     */
    public int $code = 1;

    /**
     * Дата вступления в силу решения суда: о признании недееспособным или об
     * ограничении дееспособности ИЛИ о признании дееспособным или об
     * отмене ограничения дееспособности
     * @var string|null
     */
    public ?string $court_decision_date = null;

    /**
     * Номер решения суда
     * @var string|null
     */
    public ?string $court_decision_no = null;

    /**
     * Наименование суда
     * @var string|null
     */
    public ?string $court_name = null;
}
