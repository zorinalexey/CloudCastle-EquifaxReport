<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения об участии в обязательстве, по которому формируется кредитная история
 */
class Credit
{
    /**
     * Код вида участия в сделке. По справочнику 2.1 - Виды участия в сделке.
     * @var float|null
     */
    public ?float $ratio = null;

    /**
     * Код вида займа (кредита). По справочнику 2.3 - Виды займа (кредита).
     * @var float|null
     */
    public ?float $type = null;

    /**
     * УИд сделки
     * @var string|null
     */
    public ?string $uid = null;

    /**
     * Дата передачи финансирования субъекту или возникновения обеспечения исполнения обязательства
     * @var string|null
     */
    public ?string $date = null;

    /**
     * Признак просрочки должника более 90 дней. По справочнику 3.102 - Признак просрочки должника более 90 дней.
     * @var bool|null
     */
    public ?bool $sign_90plus = null;

    /**
     * Признак прекращения обязательства. По справочнику 3.103 - Признак прекращения обязательства
     * @var int
     */
    public int $sign_stop_load = 0;
}