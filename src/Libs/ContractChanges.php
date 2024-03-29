<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения об изменении договора
 */
final class ContractChanges
{
    /**
     * Дата изменения договора
     * @var string|null
     */
    public ?string $date = null;

    /**
     * Дата вступления изменения договора в силу
     * @var string|null
     */
    public ?string $apply_date = null;

    /**
     * Дата планового прекращения действия изменения договора
     * @var string|null
     */
    public ?string $end_date = null;

    /**
     * Дата фактического прекращения действия изменения договора
     * @var string|null
     */
    public ?string $finish_date = null;

    /**
     * Код причины прекращения действия изменения договора
     * @var int|null
     */
    public ?int $finish = null;

    /**
     * Курс конверсии валюты долга
     * @var float|null
     */
    public ?float $currency_price = null;

    /**
     * Код вида изменения договора
     * По справочнику 3.1. Виды изменения договора.
     * Возможные значения:
     * 1 - Льготный период - изменение договора в связи с существенным изменением
     * обстоятельств или по законному требованию заемщика
     * 2 - Урегулирование проблемной задолженности
     * 3 - Прочие изменения
     * @var int|null
     */
    public ?int $type = null;

    /**
     * Код специального изменения договора.
     * Если contract_changes.type = 1 – По справочнику 3.2. Виды льготного периода;
     * Варианты по справочнику 3.2 :
     * 1 - Льготный период по статье 6.1-1 Федерального закона от 21 декабря 2013 года
     * N353-ФЗ "О потребительском кредите (займе)"
     * 2 - Льготный период по статьям 6, 7.2 Федерального закона от 3 апреля 2020 года N106-ФЗ
     * 3 - Льготный (переходный) период по статьям 7, 7.1
     * Федерального закона от 3 апреля 2020 года N 106-ФЗ
     * 4 - Льготный период по собственной программе кредитора в связи с пандемией
     * коронавирусной инфекции COVID-19
     * 5 - Льготный период по собственной программе кредитора в связи с иным существенным
     * изменением обстоятельств заключения договора
     * 6 - Льготный период на ином основании
     * Если contract_changes.type = 2 – По справочнику 3.3. Причины урегулирования проблемной задолженности;
     * Варианты по справочнику 3.3 :
     * 1 - Безработный
     * 2 - Инвалидность I группы
     * 3 - Инвалидность II группы
     * 4 - Нетрудоспособность более 2 месяцев подряд
     * 5 - Снижение среднемесячного дохода более чем на 30 процентов и превышение
     * платежей более чем на 50 процентов от среднемесячного дохода
     * 6 - Увеличение количества лиц на иждивении, под опекой или попечительством с
     * одновременным снижением среднемесячного дохода более чем на 20 процентов и
     * превышением среднемесячных платежей более чем на 40 процентов от дохода
     * 7 - Чрезвычайное и непредотвратимое обстоятельство, непреодолимая сила
     * 8 - Призыв на военную службу, военные сборы
     * 99 - Иная причина
     * Если contract_changes.type = 3 – По справочнику 3.4. Виды прочих изменений договора.
     * Варианты по справочнику 3.4 :
     * 1 - Изменение валюты договора
     * 2 - Увеличение расходного лимита
     * 3 - Уменьшение расходного лимита
     * 4 - Льготная процентная ставка
     * 5 - Пониженная процентная ставка при заключении договора страхования
     * 6 - Субсидированная процентная ставка
     * 7 - Увеличение процентной ставки
     * 8 - Уменьшение процентной ставки
     * 9 - Принято решение о неначислении процентов
     * 10 - Уменьшение срока
     * 11 - Увеличение срока
     * 12 - Изменение периодичности оплаты
     * 13 - Изменение даты платежа по основному долгу
     * 14 - Изменение даты платежа по процентам
     * 15 - Отсрочка платежа
     * 16 - Приостановление обязанности вносить платежи
     * 17 - Временное снижение размера платежей
     * 18 - Замена обеспечения
     * 19 - Прощение штрафов
     * 99 - Иные изменения договора
     * @var string|null
     */
    public ?string $special_type = null;

    /**
     * Описание иного изменения договора
     * @var string|null
     */
    public ?string $type_text = null;


}