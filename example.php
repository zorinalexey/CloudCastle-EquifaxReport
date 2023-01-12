<?php

include_once 'vendor/autoload.php';

$config = new CloudCastle\EquifaxConfig\Config('config.json');

$reports = [];

$countReports = 1;

function getStr(array $array, int $lenght)
{
    shuffle($array);
    $str = '';
    for ($i = 0; $i < $lenght; $i ++ ) {
        $numSimbol = random_int(0, (count($array) - 1));
        $str .= $array[$numSimbol];
    }
    return $str;
}

function uidGen()
{
    $charArray = ['a', 'b', 'c', 'd', 'e', 'f', 'A', 'B', 'C', 'D', 'E', 'F'];
    $intArray = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $groupArray = [8, 9, 'a', 'A', 'b', 'B'];
    $simbolsArray = array_merge($charArray, $intArray, $groupArray);
    shuffle($charArray);
    shuffle($intArray);
    shuffle($simbolsArray);
    shuffle($groupArray);
    $uuid = getStr($simbolsArray, 8);
    $uuid .= '-' . getStr($simbolsArray, 4);
    $uuid .= '-1' . getStr($simbolsArray, 3);
    $uuid .= '-' . getStr($groupArray, 1);
    $uuid .= getStr($simbolsArray, 3);
    $uuid .= '-' . getStr($simbolsArray, 12);
    $uuid .= '-' . getStr($simbolsArray, 1);
    return $uuid;
}

for ($i = 0; $i < $countReports; $i ++ ) {
    $report = new stdClass();
    $report->info = new \CloudCastle\EquifaxConfig\Info();
    $report->info->set([
        /**
         * Id клиента в системе кредитной организации
         */
        'recnumber' => md5(uidGen()),
        /*
         * Действие с кредитной историей
         * Возможные варианты :
         * 'Источник направляет кредитную историю о субъекте или его отдельном обязательстве впервые' => 'A',
         * 'Кредитная история изменяется или дополняется' => 'B',
         * 'Исправляется ошибка в кредитной информации или представляется непринятая бюро кредитная информация' => 'C',
         * 'Аннулируются сведения' => 'D'
         */
        'action' => 'A', // или B (по умолчанию)
        /*
         * события, вследствие которого формируется запись кредитной истории
         */
        'event' => '1.4', // или 1.1 (по умолчанию)
        /*
         * Объём выполняемой операции, производимой с записью кредитной истории
         */
        //'action_volume' => 9, // или 1 (по умолчанию)
        /*
         * Причина предоставления операции, производимой с записью кредитной истории
         * Указывается только при action => 'Аннулируются сведения'
         */
        //'action_reason' => '', // или 2
    ]);

    $title_part = new stdClass();

    /**
     * Установка титульных данных клиента (Физ. лицо)
     */
    $client = new CloudCastle\EquifaxReport\Individual\Client();
    $client->setName('Иванов', "Иван", "Иванович")
        /*
         * Установка СНИЛС
         */
        ->setInn([
            'inn' => '12345678901',
            #'code' => 2,
            #'ogrnip' => '123456789012345',
            #'regDateIp' => '01.01.2007'
        ])
        /*
         * Установка ИНН
         */
        ->setSnils('07974157113')
        /*
         * Установка даты рождения
         */
        ->setBirth([
            'date' => '01.01.1947',
            'birthCountry' => 'Россия',
            'birthPlace' => 'Московская область'
        ])
        /*
         * Установка данных документа
         */
        ->setDocument([
            'country' => 'Росиия',
            'type' => 'Паспорт РФ',
            'serial' => '1234',
            'number' => '567890',
            'date' => '01.01.2005',
            'who' => 'УВД г. Москва',
            'department_code' => '123-456',
            'end_date' => '31.12.2045'
        ])
    /*
     * Установка изменений данных клиента.
     * Важно!!! Указывать изменения данных клиента необходимо в последнюю очередь
     */
//        ->setHistory()
    /*
     * Указать предыдущее Ф.И.О
     */
//        ->setName('Петров', 'Петр', 'Петрович')
    /*
     * Указать информацию
     */
//        ->setDocument([
//            'country' => 'Росиия',
//            'type' => 'Паспорт РФ',
//            'serial' => '4321',
//            'number' => '098765',
//            'date' => '01.01.1965',
//            'who' => 'УВД г. Москва',
//            'department_code' => '654-321',
//            'end_date' => '31.12.2005'
//            ]
//    )
    ;

    $title_part->private = $client;
    $report->title_part = $title_part;
    /**
     * Установка информации о КИ
     */
    $report->base_part = new CloudCastle\EquifaxReport\Individual\Report();

    /*
     * Регистрация физического лица по месту жительства или пребывания
     */
    $report->base_part->setAddrReg(
            [
                /*
                 * Код адреса регистрации
                 */
                'reg_code' => 3,
            /*
             * Почтовый индекс
             */
            //'index' => 123456,
            /*
             * Код страны по ОКСМ
             */
            //'country' => 'Росиия',
            /*
             * Номер адреса в ФИАС
             */
            //'fias' => '124315-46457-45785-6574245-6576r5856-457',
            /*
             * Код населенного пункта по ОКАТО
             */
            //'okato' => '143524573k-637y390ghd09',
            /*
             * Иной населенный пункт
             */
            //'other_statement' => 'Станица Далёкая',
            /*
             * Улица
             */
            //'street' => 'новая',
            /*
             * Дом
             */
            //'house' => 4,
            /*
             * Владение
             */
            //'domain' => 3,
            /*
             * Корпус
             */
            //'block' => 2,
            /*
             * Строение
             */
            //'build' => 1,
            /*
             * Дата регистрации
             */
            //'reg_date' => date('d.m.Y', strtotime('20.02.200 ,0')),
            /*
             * Наименование регистрирующего органа
             */
            //'reg_place' => 'УМВД РФ по ст. Далёкая',
            /*
             * Квартира
             */
            //'apartment' => 5,
            /*
             * Код подразделения, осуществившего регистрацию
             */
            //'reg_department_code' => '111-222',
            ]
        )
        /*
         * Фактическое место жительства
         */
        ->setAddrFact(
            [
                /*
                 * Код адреса регистрации
                 */
                //'reg_code' => 2,
                /*
                 * Почтовый индекс
                 */
                //'index' => 123456,
                /*
                 * Код страны по ОКСМ
                 */
                'country' => 'Росиия',
                /*
                 * Номер адреса в ФИАС
                 */
                //'fias' => '124315-46457-45785-6574245-6576r5856-457',
                /*
                 * Код населенного пункта по ОКАТО
                 */
                //'okato' => '143524573k-637y390ghd09',
                /*
                 * Наименование населенного пункта
                 */
                'other_statement' => 'Станица Далёкая',
                /*
                 * Улица
                 */
                'street' => 'новая',
                /*
                 * Дом
                 */
                'house' => 1,
                /*
                 * Владение
                 */
                'domain' => 2,
                /*
                 * Корпус
                 */
                'block' => 3,
                /*
                 * Строение
                 */
                'build' => 4,
                /*
                 * Дата регистрации
                 */
                //'reg_date' => date('d.m.Y', strtotime('20.02.200 ,0')),
                /*
                 * Наименование регистрирующего органа
                 */
                //'reg_place' => 'УМВД РФ по ст. Далёкая',
                /*
                 * Квартира
                 */
                'apartment' => 5,
            /*
             * Код подразделения, осуществившего регистрацию
             */
            //'reg_department_code' => '111-222',
            ]
        )
        /*
         * Контактные данные
         */
        ->setContacts('+7123456789', 'test@test.test', 'Звонить после 17.00')
        ->setContract(
            /*
             * Уникальный идентификатор договора (сделки). Должен соответствовать регулярному выражению
             * [a-fA-F0-9]{8}\-[a-fA-F0-9]{4}\-1[a-fA-F0-9]{3}\-(8|9|a|A|b|B){1}[a-fA-F0-9]{3}\-[a-fA-F0-9]{12}\-[a-fA-F0-9]{1}
             */
            uidGen(),
            /*
             * сведения о сделке
             */
            [
                /*
                 * Общие сведения о сделке
                 */
                'deal' => [
                    /*
                     * Код вида участия в сделке
                     */
                    'ratio' => 'Заемщик',
                    /*
                     * Дата совершения сделки
                     */
                    'date' => date('d.m.Y'),
                    /*
                     * Код типа сделки
                     */
                    'category' => 'Договор займа (кредита)',
                    /*
                     * Код вида займа (кредита)
                     */
                    'type' => 'микрозаём',
                    /*
                     * Код цели займа (кредита)
                     */
                    'purpose' => '',
                    /*
                     * Признак потребительского кредита (займа)
                     */
                    'sign_credit' => 1,
                    /*
                     * Признак использования платежной карты
                     */
                    'sign_credit_card' => 1,
                    /*
                     * Признак возникновения обязательства в результате новации
                     */
                    'sign_renovation' => 0,
                    /*
                     * Признак денежного обязательства источника
                     */
                    'sign_deal_cash_source' => 1,
                    /*
                     * Признак денежного обязательства субъекта
                     */
                    'sign_deal_cash_subject' => 1,
                    /*
                     * Дата прекращения обязательства субъекта по условиям сделки
                     */
                    'end_date' => date('d.m.Y', strtotime('+30 days'))
                ],
                /*
                 * Сумма и валюта обязательства
                 */
                'contract_amount' => [
                    /*
                     * Сумма обязательства
                     */
                    'sum' => 5000,
                    /*
                     * Валюта обязательства
                     */
                    'currency' => 'Российский рубль',
                    /*
                     * Сумма обеспечиваемого обязательства
                     */
                    'security_sum' => 300,
                ],
                /*
                 * Сведения о передаче финансирования субъекту или возникновения обеспечения исполнения обязательства
                 */
                'cred_start_debt' => date('d.m.Y'),
                /*
                 * Число солидарных должников
                 */
                'joint_debtors' => 0,
                /*
                 * Сведения об условиях платежей
                 */
                'payment_terms' => [
                    /*
                     * Сумма ближайшего следующего платежа по основному долгу
                     */
                    'op_next_payout_sum' => 1000,
                    /*
                     * Дата ближайшего следующего платежа по основному долгу
                     */
                    'op_next_payout_date' => date('d.m.Y', strtotime('+14 days')),
                    /*
                     * Сумма ближайшего следующего платежа по процентам
                     */
                    'percent_next_payout_sum' => 300,
                    /**
                     * Сумма ближайшего следующего платежа по основному долгу
                     */
                    'op_next_payout_sum' => 1000,
                    /*
                     * Дата ближайшего следующего платежа по процентам
                     */
                    'percent_next_payout_date' => date('d.m.Y', strtotime('+14 days')),
                    /*
                     * Частота платежей
                     */
                    'regularity' => 'Более четырех раз в месяц',
                    /*
                     * Сумма минимального платежа по кредитной карте
                     */
                    'min_sum_pay_cc' => 1300,
                /*
                 * Дата начала беспроцентного периода
                 */
                # 'grace_date' => date('d.m.Y'),
                /*
                 * Дата окончания беспроцентного периода
                 */
                # 'grace_end_date' => date('d.m.Y', strtotime('+15 days')),
                /*
                 * Дата окончания срока уплаты процентов
                 */
                //'percent_end_date' => date('d.m.Y', strtotime('+30 days'))
                ],
                /*
                 * Полная стоимость потребительского кредита (займа)
                 */
                'full_cost' => [
                    /*
                     * Полная стоимость кредита (займа) в процентах годовых
                     */
                    'percent' => 10,
                    /*
                     * Полная стоимость кредита (займа) в денежном выражении
                     */
                    'sum' => 5500,
                    /*
                     * Дата расчета полной стоимости кредита (займа)
                     */
                    'date' => date('d.m.Y')
                ],
                /*
                 * Сведения об изменении договора
                 */
                //'contract_changes' => [
                /*
                 * Дата изменения договора
                 */
                //'date' => date('d.m.Y'),
                /*
                 * Вид изменения договора
                 * Возможные варианты :
                 * 'Льготный период - изменение договора в связи с существенным изменением обстоятельств или по законному требованию заемщика' => 1, (по умолчанию)
                 * 'Урегулирование проблемной задолженности' => 2,
                 * 'Прочие изменения' => 3
                 */
                // 'type' => 'Льготный период - изменение договора в связи с существенным изменением обстоятельств или по законному требованию заемщика',
                /*
                 * Код специального изменения договора
                 */
                //'special_type' => 99,
                /*
                 * Описание иного изменения договора
                 */
                // 'type_text' => 'Пролонгация',
                /*
                 * Дата вступления изменения договора в силу
                 */
                // 'apply_date' => date('d.m.Y'),
                /*
                 * Дата планового прекращения действия изменения договора
                 */
                //'end_date' => date('d.m.Y', strtotime('+30 days')),
                /*
                 * Дата фактического прекращения действия изменения договора
                 */
                // 'finish_date' => date('d.m.Y'),
                /*
                 * Причина прекращения действия изменения договора
                 */
                //'finish' => 'По соглашению сторон',
                /*
                 * Курс конверсии валюты долга
                 */
                // 'currency_price' => 60
                // ],
                /*
                 * Дата передачи финансирования субъекту или возникновения обеспечения исполнения обязательства
                 */
                'cred_start_debt' => date('d.m.Y'),
                /*
                 * Сведения о задолженности
                 */
                'debt' => [
                    /*
                     * Признак наличия задолженности
                     */
                    'sign' => 1,
                    /*
                     * Признак расчета по последнему платежу
                     */
                    'sign_calc_last_payout' => 1,
                    /*
                     * Дата расчета
                     */
                    'calc_date' => date('d.m.Y'),
                    /*
                     * Сумма задолженности на дату передачи финансирования субъекту или возникновения обеспечения исполнения обязательства
                     */
                    'first_sum' => 5000,
                    /*
                     * Сумма задолженности
                     */
                    'sum' => 1500,
                    /*
                     * Сумма задолженности по основному долгу
                     */
                    'op_sum' => 1000,
                    /*
                     * Сумма задолженности по процентам
                     */
                    'percent_sum' => 300,
                    /*
                     * Сумма задолженности по иным требованиям
                     */
                    'other_sum' => 200,
                    /*
                     * Признак неподтвержденного льготного периода. false - льготный период не установлен , true - льготный период установлен
                     */
                    'sign_unaccepted_grace_period' => false
                ],
                /*
                 * Сведения о срочной задолженности
                 */
                'debt_current' => [
                    /*
                     * Дата возникновения срочной задолженности
                     */
                    'date' => date('d.m.Y'),
                    /*
                     * Сумма срочной задолженности
                     */
                    'sum' => 1500,
                    /*
                     * Сумма срочной задолженности по основному долгу
                     */
                    'op_sum' => 1000,
                    /*
                     * Сумма срочной задолженности по процентам
                     */
                    'percent_sum' => 300,
                    /*
                     * Сумма срочной задолженности по иным требованиям
                     */
                    'other_sum' => 200,
                ],
                /*
                 * Сведения о просроченной задолженности
                 */
                'debt_overdue' => [
                    /*
                     * Дата возникновения просроченной задолженности
                     */
                    'date' => date('d.m.Y'),
                    /*
                     * Сумма просроченной задолженности
                     */
                    'sum' => 1500,
                    /*
                     * Сумма просроченной задолженности по основному долгу
                     */
                    'op_sum' => 1000,
                    /*
                     * Сумма просроченной задолженности по процентам
                     */
                    'percent_sum' => 300,
                    /*
                     * Сумма просроченной задолженности по иным требованиям
                     */
                    'other_sum' => 200,
                    /*
                     * Дата последнего пропущенного платежа по основному долгу
                     */
                    'op_miss_payout_date' => date('d.m.Y', strtotime('-1 days')),
                    /*
                     * Дата последнего пропущенного платежа по процентам
                     */
                    'percent_miss_payout_date' => date('d.m.Y', strtotime('-1 days')),
                ],
                /*
                 * Сведения о внесении платежей
                 */
                'payments' => [
                    /*
                     * Дата последнего внесенного платежа
                     */
                    'last_payout_date' => date('d.m.Y'),
                    /*
                     * Сумма последнего внесенного платежа
                     */
                    'last_payout_sum' => 1500,
                    /*
                     * Сумма последнего внесенного платежа по основному долгу
                     */
                    'last_payout_op_sum' => 1000,
                    /*
                     * Сумма последнего внесенного платежа по процентам
                     */
                    'last_payout_percent_sum' => 300,
                    /*
                     * Сумма последнего внесенного платежа по иным требованиям
                     */
                    'last_payout_other_sum' => 200,
                    /*
                     * Сумма всех внесенных платежей по обязательству
                     */
                    'paid_sum' => 3400,
                    /*
                     * Сумма внесенных платежей по основному долгу
                     */
                    'paid_op_sum' => 200, 0,
                    /*
                     * Сумма внесенных платежей по процентам
                     */
                    'paid_percent_sum' => 1000,
                    /*
                     * Сумма внесенных платежей по иным требованиям
                     */
                    'paid_other_sum' => 400,
                    /*
                     * Соблюдение размера платежей
                     */
                    'size_payments_type' => 'Платеж внесен в полном размере',
                    /*
                     * Соблюдение срока внесения платежей
                     */
                    'payments_deadline_type' => 'Своевременно',
                    /*
                     * Продолжительность просрочки в днях
                     */
                    'overdue_day' => 0
                ],
                /*
                 * Величина среднемесячного платежа по договору займа (кредита) и дата ее расчета
                 */
                'average_payment' => [
                    /*
                     * Величина среднемесячного платежа
                     */
                    'sum' => 1500,
                    /*
                     * Дата расчета величины среднемесячного платежа
                     */
                    'date' => date('d.m.Y')
                ],
                /*
                 * Сведения о неденежном обязательстве источника
                 */
//                'material_guarantee_source' => [
//                    /*
//                     * Предмет обязательства
//                     */
//                    'material_item' => '',
//                    /*
//                     * Код предоставляемого имущества
//                     */
//                    'item_type' => 'гараж',
//                    /*
//                     * Объект предоставления
//                     */
//                    'material_object' => '',
//                    /*
//                     * Дата передачи имущества субъекту
//                     */
//                    'material_object_date' => date('d.m.Y', strtotime('20.02.1995')),
//                ],
//                /*
//                 * Сведения о неденежном обязательстве субъекта
//                 */
//                'material_guarantee_subject' => [
//                    /*
//                     * Предмет обязательства
//                     */
//                    'material_item' => 'гараж',
//                    /*
//                     * Объект предоставления
//                     */
//                    'material_object' => '',
//                    /*
//                     * Порядок исполнения обязательства
//                     */
//                    'procedure_guarantee' => '',
//                    /*
//                     * Признак ненадлежащего исполнения обязательства
//                     */
//                    'procedure_guarantee_fail' => ''
//                ],
                /*
                 * Сведения о залоге
                 */
                'collaterals' => [
                    /*
                     * Код предмета залога
                     */
                    'item_type' => 'Недвижимость',
                    /*
                     * Идентификационный код предмета залога
                     */
                    'id' => '1234532dty-r568nhcu4678-e573',
                    /*
                     * Дата заключения договора залога
                     */
                    'date' => date('d.m.Y'),
                    /*
                     * Стоимость предмета залога
                     */
                    'sum' => 250000,
                    /*
                     * Валюта стоимости предмета залога
                     */
                    'currency' => 'Российский рубль',
                    /*
                     * Дата проведения оценки предмета залога
                     */
                    'date_assessment' => date('d.m.Y', strtotime('-10 days')),
                    /*
                     * Признак иного обременения предмета залога
                     */
                    'item_burden' => true,
                    /*
                     * Дата прекращения залога согласно договору
                     */
                    'end_date' => date('d.m.Y', strtotime('+30 days')),
                    /*
                     * Дата фактического прекращения залога
                     */
                    'fact_end_date' => date('d.m.Y'),
                    /*
                     * Код причины прекращения залога
                     */
                    'end_reason' => 'Договор исполнен'
                ],
                /*
                 * Сведения о поручительстве
                 */
                'guarantees' => [
                ],
            ]
    );

    $reports[] = $report;
}

/**
 * Передаем генератору конфигурацию и массив отчетов для формирования титульной части КИ
 */
$generator = new CloudCastle\EquifaxReport\Report($config, $reports);

/**
 * Сгенерировать xml файл передав количество клиентов по которым производится выгрузка КИ
 */
$xml = $generator->create($countReports);

var_dump($xml);
