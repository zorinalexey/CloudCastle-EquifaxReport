<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения о страховании предмета залога
 */
class CollateralInsce
{
    /**
     * Лимит страховых выплат
     * @var float|int
     */
    public float $limit = 0;

    /**
     * Валюта страховых выплат
     * По справочнику 106. Коды валют по ОКВ
     * @var string
     */
    public string $currency = 'RUB';

    /**
     * Признак наличия франшизы
     * По справочнику 4.102. Признак наличия франшизы
     * @var int
     */
    public int $franchise = 0;

    /**
     * Дата начала действия страхования
     * @var string|null
     */
    public ?string $date = null;

    /**
     * Дата окончания действия страхования согласно договору
     * @var string|null
     */
    public ?string $end_date = null;

    /**
     * Дата фактического прекращения страхования
     * @var string|null
     */
    public ?string $fact_end_date = null;

    /**
     * Код причины прекращения страхования
     * По справочнику 4.2. Причины прекращения обеспечения
     * @var int
     */
    public int $end_reason = 1;

}