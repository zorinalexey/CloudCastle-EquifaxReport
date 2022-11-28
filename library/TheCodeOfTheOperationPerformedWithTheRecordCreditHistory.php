<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxLibrary;

use CloudCastle\EquifaxLibrary\AbstractClasses\AbstractBook;

/**
 * Класс TheCodeOfTheOperationPerformedWithTheRecordCreditHistory
 * @version 0.0.1
 * @package CloudCastle\EquifaxLibrary
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class TheCodeOfTheOperationPerformedWithTheRecordCreditHistory extends AbstractBook
{

    /**
     * Значение по умолчанию
     * @var string
     */
    private string $default = 'B';

    /**
     * Коллекция возможных вариантов запроса по справочнику
     * @var array
     */
    private array $data = [
        'Источник направляет кредитную историю о субъекте или его отдельном обязательстве впервые' => 'A',
        'Кредитная история изменяется или дополняется' => 'B',
        'Исправляется ошибка в кредитной информации или представляется непринятая бюро кредитная информация' => 'C',
        'Аннулируются сведения' => 'D'
    ];

}
