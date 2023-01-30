<?php

namespace CloudCastle\EquifaxReport\Libs;

/*
 * Сведения о возмещении принципалом гаранту выплаченной суммы-
 */

class GuaranteeReturn
{
    /**
     * Сумма, подлежащая возмещению
     * @var float|int
     */
    public float $returning_sum = 0;

    /**
     * Сумма, выплаченная принципалом
     * @var float|int
     */
    public float $principal_sum = 0;

    /**
     * Признак соблюдения порядка возмещения.
     * По справочнику 4.103. Признак соблюдения порядка возмещения
     * @var int
     */
    public int $return_correct = 1;
}