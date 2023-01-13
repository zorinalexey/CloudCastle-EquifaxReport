<?php

namespace CloudCastle\EquifaxReport\Report;

class Comment
{
    /**
     * Дата события, вследствие которого формируется запись кредитной истории
     * @var string|null
     */
    public ?string $event_date = null;

    /**
     * Дата начала договора (сделки)
     * @var string|null
     */
    public ?string $contract_date = null;
    /**
     * Тип договора (сделки)
     * @var string|null
     */
    public ?string $contract_type = null;

    /**
     * Уникальный номер кредитной заявки
     * @var string|null
     */
    public ?string $application_num = null;

    /**
     * Дата и время подачи кредитной заявки
     * @var string|null
     */
    public ?string $application_date = null;

    public function __toString(): string
    {
        return json_encode($this);
    }
}