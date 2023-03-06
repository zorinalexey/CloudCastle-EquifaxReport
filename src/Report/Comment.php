<?php

namespace CloudCastle\EquifaxReport\Report;

final class Comment
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

    /**
     * uid (Уникальный идентификатор договора (сделки))
     * @var string|null
     */
    public ?string $contract_no = null;

    public function __toString()
    {
        $data = [];
        foreach ($this AS $key => $value){
            if($value && $key !== 'application_date' && $key !== 'event_date'){
                $data[$key] = $value;
            }
            if($key === 'application_date'){
                $data[$key] = date('d.m.Y H:i:s', strtotime($value));
            }
            if($key === 'event_date'){
                $data[$key] = date('d.m.Y', strtotime($value));
            }
        }
        if($data){
            return json_encode((object)$data);
        }
        return null;
    }
}