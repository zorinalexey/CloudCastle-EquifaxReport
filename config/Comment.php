<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxConfig;

use CloudCastle\EquifaxConfig\AbstractClasses\AbstractInstance;

/**
 * Класс Comment
 * @version 0.0.1
 * @package CloudCastle\EquifaxConfig
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class Comment extends AbstractInstance
{

    /**
     * Дата события, вследствие которого формируется запись кредитной истории
     * @var string|null
     */
    private ?string $event_date = null;

    /**
     * Уникальный номер договора (сделки)
     * @var string|null
     */
    private ?string $contract_no = null;

    /**
     * Дата начала договора (сделки)
     * @var string|null
     */
    private ?string $contract_date = null;

    /**
     * Тип договора (сделки)
     * @var string|null
     */
    private ?string $contract_type = null;

    /**
     * Уникальный номер кредитной заявки
     * @var string|null
     */
    private ?string $application_num = null;

    /**
     * Дата и время подачи кредитной заявки
     * @var string|null
     */
    private ?string $application_date = null;

    /**
     * Установить параметры коментария
     * @param array $comment
     * @return string
     */
    public static function set(array $comment = []): string
    {
        $obj = self::instance();
        foreach ($comment as $key => $value) {
            if (isset($obj->$key)) {
                $obj->$key = $value;
            }
        }
        return $obj->getJson();
    }

    /**
     * Получить сформированую строку коментария
     * @return string
     */
    private function getJson(): string
    {
        return json_encode($this);
    }

}
