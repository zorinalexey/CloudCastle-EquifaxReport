<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения о залогах
 */
final class Collateral
{
    /**
     * Код предмета залога
     * По справочнику 4.1. Виды предметов залога и неденежных предоставлений по сделке
     * @var float|null
     */
    public ?float $item_type = null;
    /**
     * Идентификационный код предмета залога
     * Указывается:
     * кадастровый номер - для имеющей такой номер недвижимости;
     * идентификационный номер транспортного средства (VIN) - для имеющего такой номер транспортного средства;
     * код по Общероссийскому классификатору основных фондов (далее - ОКОФ) или заводской номер - для промышленных машин и оборудования;
     * штриховой код - для имеющего такой код товара;
     * уникальный идентификатор финансового инструмента в торговой системе (тикер) - для имеющих такой идентификатор ценной бумаги или иного финансового инструмента.
     * @var string|null
     */
    public ?string $id = null;
    /**
     * Дата заключения договора залога
     * @var string|null
     */
    public ?string $date = null;
    /**
     * Стоимость предмета залога
     * @var float|int
     */
    public float $sum = 0;
    /**
     * Валюта стоимости предмета залога
     * По справочнику 106. Коды валют по ОКВ
     * @var string
     */
    public string $currency = 'RUB';
    /**
     * Дата проведения оценки предмета залога
     * @var string|null
     */
    public ?string $date_assessment = null;
    /**
     * Признак иного обременения предмета залога
     * По справочнику 4.101. Признак иного обременения предмета залога
     * @var float|int
     */
    public float $item_burden = 0;
    /**
     * Дата прекращения залога согласно договору
     * @var string|null
     */
    public ?string $end_date = null;
    /**
     * Дата фактического прекращения залога
     * @var string|null
     */
    public ?string $fact_end_date = null;
    /**
     * Код причины прекращения залога
     * По справочнику 4.2. Причины прекращения обеспечения
     * @var float|null
     */
    public ?float $end_reason = 1;

}