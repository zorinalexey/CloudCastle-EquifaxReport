<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения об отказе источника от предложения совершить сделку
 */
final class Failure
{
    /**
     * Дата отказа
     * @var string|null
     */
    public ?string $date = null;

    /**
     * Код причины отказа. По справочнику 6.5 - Причины отказа совершить сделку
     * @var int
     */
    public int $reason = 4;
}