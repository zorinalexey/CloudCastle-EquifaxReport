<?php

declare(strict_types=1);

namespace CloudCastle\EquifaxReport\Report;

use CloudCastle\EquifaxReport\Config\Config;

/**
 * Класс Events
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class Events
{
    /**
     * Уникальный идентификатор записи в ФКИ
     * @var string|null
     */
    public ?string $recnumber = null;

    /**
     * Номер события, вследствие которого формируется запись кредитной истории
     * @var string|null
     */
    public string $event = '1.4';

    /**
     * Код операции, производимой с записью кредитной истории
     * @var string A|B|C|D
     */
    public string $action = 'A';

    /**
     * Объём выполняемой операции, производимой с записью кредитной истории
     * @var string|null
     */
    public ?string $action_volume = null;

    /**
     * @var string|null
     */
    public ?string $action_reason = null;

    /**
     * Исходящая регистрационная дата файла (для ранее отбракованной записи)
     * @var string|null
     */
    public ?string $prev_file_reg_date = null;

    /**
     * Исходящий регистрационный номер файла (для ранее отбракованной записи)
     * @var string|null
     */
    public ?string $prev_file_reg_num = null;

    /**
     * Комментарий
     * @var Comment|null
     */
    public ?Comment $comment = null;

    public function __construct(Config $config)
    {
        $this->recnumber = md5(json_encode($config));
        $this->comment = new Comment();
    }

}
