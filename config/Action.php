<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxConfig;

use CloudCastle\Helpers\Format;
use CloudCastle\EquifaxLibrary\ReasonForGrantingOperationDProducedWithCreditHistoryRecord;
use CloudCastle\EquifaxLibrary\TheVolumeOfTheOperationPerformedWithTheRecordOfTheCreditHistory;
use CloudCastle\EquifaxLibrary\TheCodeOfTheOperationPerformedWithTheRecordCreditHistory;
use CloudCastle\EquifaxLibrary\ListOfEventsForTheTransferOfCreditHistory;

/**
 * Класс Action
 * @version 0.0.1
 * @package CloudCastle\EquifaxConfig
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class Action
{

    /**
     * Уникальный идентификатор записи в ФКИ
     * @var string|null
     */
    public ?string $recnumber = null;

    /**
     * Исходящая регистрационная дата файла (для ранее отбракованной записи)
     * @var string|null
     */
    public ?string $prev_file_reg_date = null;

    /**
     * Исходящий регистрационный номер файла (для ранее отбракованной записи)
     * @var string|null
     */
    public ?string $prev_file_reg_num;

    /**
     * Комментарий
     * @var Comment|null
     */
    public ?Comment $comment;

    /**
     * Номер события, вследствие которого формируется запись кредитной истории
     * @var int
     */
    public string $event = '1.1';

    /**
     * Код операции, производимой с записью кредитной истории
     * @var int
     */
    public string $action = 'B';

    /**
     * Объём выполняемой операции, производимой с записью кредитной истории
     * @var int
     */
    public int $action_volume = 1;

    /**
     * Причина предоставления операции, производимой с записью кредитной истории
     * @var int
     */
    public ?int $action_reason = null;

    /**
     * Установить значения
     * @param array $data
     * @return bool
     */
    public function set(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = $this->getMethod($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        Config::instance()->setAction($this);
    }

    /**
     * Получить наименование метода установки параметра
     * @param string $key
     * @return string
     */
    private function getMethod(string $key): string
    {
        $methodName = 'set';
        foreach (explode('_', $key) as $name) {
            $methodName .= ucfirst(strtolower($name));
        }
        return $methodName;
    }

    /**
     * Установить уникальный идентификатор записи в ФКИ
     * @param string|null $recnumber Уникальный идентификатор записи в ФКИ
     * @return void
     */
    private function setRecnumber(?string $recnumber = null): void
    {
        $this->recnumber = $recnumber;
    }

    /**
     * Установить исходящую регистрационную дату файла (для ранее отбракованной записи)
     * @param string|null $date Исходящая регистрационная дата файла (
     * @return void
     */
    private function setPrevFileRegDate(?string $date = null): void
    {
        if ($date) {
            $this->prev_file_reg_date = Format::date($date);
        }
    }

    /**
     * Установить исходящий регистрационный номер файла (для ранее отбракованной записи)
     * @param string|null $number Исходящий регистрационный номер файла
     * @return void
     */
    private function setPrevFileRegNum(?string $number = null): void
    {
        $this->prev_file_reg_num = $number;
    }

    /**
     * Задать комментарий
     * @param array $comment  Массив содержащий допустимые ключи и значения для генерации комментария
     * @return void
     */
    private function setComment(array $comment = []): void
    {
        $this->comment = Comment::set($comment);
    }

    /**
     * Установить номер события, вследствие которого формируется запись кредитной истории
     * @param string|null $event событие, вследствие которого формируется запись кредитной истории
     * @return void
     */
    private function setEvent(?string $event = null): void
    {
        $this->event = (new ListOfEventsForTheTransferOfCreditHistory($event))->code;
    }

    /**
     * Установить код операции, производимой с записью кредитной истории
     * @param string|null $action Операция, производимая с записью кредитной истории
     * @return void
     */
    private function setAction(?string $action = null): void
    {
        $this->action = (new TheCodeOfTheOperationPerformedWithTheRecordCreditHistory($action))->code;
    }

    /**
     * Установить код объёма выполняемой операции, производимой с записью кредитной истории
     * @param string $actionVolume Объём выполняемой операции, производимой с записью кредитной истории
     * @return void
     */
    private function setActionVolume(string $actionVolume = null): void
    {
        $this->action_volume = (new TheVolumeOfTheOperationPerformedWithTheRecordOfTheCreditHistory($actionVolume))->code;
    }

    /**
     * Установить причину предоставления операции, производимой с записью кредитной истории
     * @param string $actionReason Причина предоставления операции, производимой с записью кредитной истории
     * @return void
     */
    private function setActionReason(string $actionReason = null): void
    {
        $this->action_reason = (new ReasonForGrantingOperationDProducedWithCreditHistoryRecord($actionReason))->code;
    }

}
