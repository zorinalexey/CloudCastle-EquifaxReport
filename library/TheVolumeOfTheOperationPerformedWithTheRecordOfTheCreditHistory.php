<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxLibrary;

use CloudCastle\EquifaxLibrary\AbstractClasses\AbstractBook;

/**
 * Класс TheVolumeOfTheOperationPerformedWithTheRecordOfTheCreditHistory
 * @version 0.0.1
 * @package CloudCastle\EquifaxLibrary
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class TheVolumeOfTheOperationPerformedWithTheRecordOfTheCreditHistory extends AbstractBook
{

    /**
     * Значение по умолчанию
     * @var string
     */
    private int $default = 1;

    /**
     * Коллекция возможных вариантов запроса по справочнику
     * @var array
     */
    private array $data = [
        'изменение отдельных показателей кредитной истории' => 1,
        'исключение/аннулирование отдельных показателей кредитной истории' => 2,
        'исключение/аннулирование записи кредитной истории' => 3,
        'исключение/аннулирование всех показателей кредитной истории' => 4,
        'представляется непринятая бюро кредитная информация' => 5
    ];

}
