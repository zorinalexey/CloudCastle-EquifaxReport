<?php

define('SEP', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__) . SEP);

date_default_timezone_set('Europe/London');

require_once ROOT . 'vendor' . SEP . 'autoload.php';

use CloudCastle\EquifaxReport\Config\Config;
use CloudCastle\EquifaxReport\Individual\Client;
use CloudCastle\EquifaxReport\Report;
use CloudCastle\EquifaxReport\Report\Events;

Config::$configFile = ROOT . 'config.json';
$config = Config::instance();

$countReports = 1;

for ($i = 0; $i < $countReports; $i++) {

    $client = new Client();
    /**
     * Опционально (при наличии данной информации)
     */
    //$client->kski = 'fdglskh897876';

    /**
     * Номер СНИЛС
     */
    $client->snils = '07974157113';

    /**
     * Номер ИНН
     */
    $client->inn->no = '165111223806';

    /**
     * Опционально
     */
    //$client->inn->ogrnIp = '123456789012';

    /**
     * Если заемщик не является резидентом РФ
     */
    //$client->inn->code = false;

    $client->last = 'Иванов';
    $client->first = 'Иван';
    $client->middle = 'Ивановович';
    /*
     * Код страны гражданства (по умолчанию 643 - Россия)
     */
    $client->doc->country = 643;
    $client->doc->country_text = 'Российская Федерация';
    $client->doc->type_text = 'Паспорт';
    /*
     * Код типа документа удостоверяющего личность (по умолчанию 21 - Паспорт гражданина РФ)
     */
    $client->doc->type = 21;
    $client->doc->serial = '1234';
    $client->doc->number = '12345' . $i;
    $client->doc->date = date('d.m.Y', strtotime('12.12.2000'));
    $client->doc->who = 'УВД г. Москвы';
    $client->doc->department_code = '123-456';

    /**
     * Опционально дата истечения срока действия документа
     */
    $client->doc->end_date = date('d.m.Y', strtotime('12.12.2040'));

    /**
     * Дата рождения
     */
    $client->birthDate = date('d.m.Y', strtotime('12.12.1980'));

    /**
     * Код страны рождения (по умолчанию 643 - Россия)
     */
    $client->birthCountry = 643;

    /**
     * Место рождения
     */
    $client->birthPlace = 'Село хорошее';

    /**
     * Предыдущий документ
     *
     * $client->history->doc->country = '643';
     * $client->history->doc->country_text = 'Российская Федерация';
     * $client->history->doc->type_text = 'Паспорт';
     * $client->history->doc->type = '21';
     * $client->history->doc->serial = '1234';
     * $client->history->doc->number = '12345'.$i;
     * $client->history->doc->date = '12.12.2000';
     * $client->history->doc->who = 'УВД г. Москвы';
     * $client->history->doc->department_code = '123-456';
     */

    /**
     * Событие для отправки отчета
     */
    $event = new Events($client);
    $event->action = 'A';
    $event->event = '2.2';
    $event->action_reason = 'Субъекту передана сумма займа (кредита) либо субъект '
    .'стал принципалом по гарантии или поручителем по сделке, кроме договора лизинга';
    $report = new Report($client, $event, $config);

    /*
     * Должен соответствовать регулярному выражению
     * [a-fA-F0-9]{8}\-[a-fA-F0-9]{4}\-1[a-fA-F0-9]{3}\-(8|9|a|A|b|B){1}[a-fA-F0-9]{3}\-[a-fA-F0-9]{12}\-[a-fA-F0-9]{1}
     */
    $uid = $report::uidGenerate();
    $report->base_part->contract->uid = $uid;

    // Общие сведения о сделке
    /*
     * Код типа сделки (по умолчанию 1 - Договор займа (кредита))
     */
    $report->base_part->contract->deal->category = 1;
    /*
     * Признак использования платежной карты
     * По умолчанию 0 - сумма займа (кредита) выдается без использования платежной карты
     * Если сумма займа (кредита) выдается с использованием платежной карты, то sign_credit_card = 1
     */
    $report->base_part->contract->deal->sign_credit_card = 0;
    /*
     * Дата совершения сделки (свойство обязательно)
     */
    $report->base_part->contract->deal->date = date('d.m.Y', strtotime('20.12.2022'));
    /*
     * Дата прекращения обязательства субъекта по условиям сделки (свойство обязательно)
     */
    $report->base_part->contract->deal->end_date = date('d.m.Y', strtotime('+90 day'));
    /*
     * Код цели займа (кредита) (по умолчанию 19 - Цель не определена)
     */
    $report->base_part->contract->deal->purpose = 19;
    /*
     * Код вида участия в сделке (по умолчанию 1 - Заемщик)
     */
    $report->base_part->contract->deal->ratio = 1;
    /*
     * Признак использования платежной карты
     * если сумма займа (кредита) выдается с использованием платежной карты,
     * то sign_credit должен быть равен 1, иначе 0
     */
    $report->base_part->contract->deal->sign_credit = 1;
    /*
     * Признак денежного обязательства источника (по умолчанию - 1)
     * если обязательство источника не являются деньги то sign_deal_cash_source должен быть равен 0
     */
    $report->base_part->contract->deal->sign_deal_cash_source = 1;
    /*
     * Признак денежного обязательства субъекта (по умолчанию - 1)
     * если обязательство субъекта не являются деньги то sign_deal_cash_subject должен быть равен 0
     */
    $report->base_part->contract->deal->sign_deal_cash_subject = 1;
    /*
     * Признак возникновения обязательства в результате новации (по умолчанию - 0)
     * если возникли обязательства в результате новации то sign_renovation должен быть равен 1
     */
    $report->base_part->contract->deal->sign_renovation = 0;
    /*
     * Код вида займа (кредита). По справочнику 2.3 - Виды займа (кредита).
     * По умолчанию 3 - Микрозаем
     * Возможные значения:
     * 1 - Заем (кредит)
     * 2 - Заем (кредит) с ипотекой
     * 3 - Микрозаем
     * 4 - Кредитная линия с лимитом выдачи
     * 5 - Кредитная линия с лимитом задолженности
     * 6 - Комбинированная кредитная линия с лимитом выдачи и лимитом задолженности
     * 7 - Кредит "овердрафт" (кредитование счета)
     * 8 - Синдицированный заем (кредит)
     * 99 - Иной заем (кредит)
     */
    $report->base_part->contract->deal->type = 3;

    // Сумма и валюта обязательства
    /*
     * Сумма обязательства
     */
    $report->base_part->contract->contract_amount->sum = 5000;
    /*
     * Валюта обязательства (по умолчанию RUB)
     */
    $report->base_part->contract->contract_amount->currency = 'RUB';
    /*
     * Сумма обеспечиваемого обязательства (по умолчанию 0)
     */
    $report->base_part->contract->contract_amount->security_sum = 0;

    // Сведения об условиях платежей
    /*
     * Сумма ближайшего следующего платежа по основному долгу
     */
    $report->base_part->contract->payment_terms->op_next_payout_sum = 1000;
    /*
     * Дата ближайшего следующего платежа по основному долгу
     */
    $report->base_part->contract->payment_terms->op_next_payout_date = date('d.m.Y', strtotime('+10 day'));
    /*
     * Сумма ближайшего следующего платежа по процентам
     */
    $report->base_part->contract->payment_terms->percent_next_payout_sum = 500;
    /*
     * Дата ближайшего следующего платежа по процентам
     */
    $report->base_part->contract->payment_terms->percent_next_payout_date = date('d.m.Y', strtotime('+10 day'));
    /*
     * Код частоты платежей (по умолчанию 2 - От двух до четырех раз в месяц)
     */
    $report->base_part->contract->payment_terms->regularity = 2;
    /*
     * Сумма минимального платежа по кредитной карте (свойство не обязательное)
     * Указывается в том случае если по данному договору выдана кредитная карта
     */
    $report->base_part->contract->payment_terms->min_sum_pay_cc = 2000;
    /*
     * Дата начала беспроцентного периода (свойство не обязательное)
     * Свойство может присутствовать при наличии в договоре займа (кредита) с расходным лимитом беспроцентного
     * периода. В данном свойстве указывается дата начала беспроцентного периода при его наступлении в соответствии
     * с условиями договора.
     */
    $report->base_part->contract->payment_terms->grace_date = date('d.m.Y', strtotime('01.01.2023'));
    /*
     * Дата окончания беспроцентного периода (свойство не обязательное)
     * Свойство может присутствовать при наличии в договоре займа (кредита) с расходным лимитом беспроцентного
     * периода. При наступлении беспроцентного периода в данном свойстве указывается плановая дата его окончания
     * в соответствии с условиями договора. По окончании беспроцентного периода в данном свойстве
     * указывается фактическая дата его окончания.
     */
    $report->base_part->contract->payment_terms->grace_date_end = date('d.m.Y', strtotime('15.01.2023'));
    /*
     * Дата окончания срока уплаты процентов
     * Значение свойства определяется датой, в которую субъект должен полностью погасить требования по
     * процентам на срочный долг. Заполняется датой самого последнего гашения всех процентов по
     * графику в соответствии с договором
     */
    $report->base_part->contract->payment_terms->percent_end_date = date('d.m.Y', strtotime('+30 days'));

    // Полная стоимость потребительского кредита (займа)
    /*
     * Дата расчета полной стоимости кредита (займа)
     */
    $report->base_part->contract->full_cost->date = date('d.m.Y', time());
    /*
     * Полная стоимость кредита (займа) в процентах годовых
     */
    $report->base_part->contract->full_cost->percent = 365;
    /*
     * Полная стоимость кредита (займа) в денежном выражении
     */
    $report->base_part->contract->full_cost->sum = 15000;

    // Сведения о передаче финансирования субъекту или возникновения обеспечения исполнения обязательства
    /*
     * Дата передачи финансирования субъекту или возникновения обеспечения исполнения обязательства
     */
    $report->base_part->contract->cred_start_debt->date = date('d.m.Y');

    //
    /*
     * Сумма задолженности по основному долгу
     */
    $report->base_part->contract->debt->op_sum = 3500;
    /*
     * Сумма задолженности по иным требованиям
     */
    $report->base_part->contract->debt->other_sum = 1000;
    /*
     * Сумма задолженности по иным требованиям
     */
    $report->base_part->contract->debt->percent_sum = 500;
    /*
     * Признак неподтвержденного льготного периода
     * По умолчанию 1 - Льготный период не установлен
     * Возможные значения:
     * 1 - Льготный период не установлен
     * 0 - Льготный период установлен
     */
    $report->base_part->contract->debt->sign_unaccepted_grace_period = 1;
    /*
     * Сумма задолженности на дату передачи финансирования
     * субъекту или возникновения обеспечения исполнения обязательства
     */
    $report->base_part->contract->debt->first_sum = 15000;
    /*
     * Дата расчета
     */
    $report->base_part->contract->debt->calc_date = date('d.m.Y');
    /*
     * Признак расчета по последнему платежу
     * По умолчанию 1 - субъект внес платеж, либо наступил срок для внесения платежа по срочному долгу
     * Возможные значения:
     * 1 - субъект внес платеж, либо наступил срок для внесения платежа по срочному долгу
     * 0 - прошло 30 календарных дней с даты последнего расчета суммы задолженности
     * по показателю 25.8 "Дата расчета" (debt.calc_date)
     */
    $report->base_part->contract->debt->sign_calc_last_payout = 1;

    // Сведения о срочной задолженности
    /*
     * Сумма срочной задолженности по процентам
     */
    $report->base_part->contract->debt_current->percent_sum = 500;
    /*
     * Сумма срочной задолженности по иным требованиям
     */
    $report->base_part->contract->debt_current->other_sum = 1000;
    /*
     * Сумма срочной задолженности по основному долгу
     */
    $report->base_part->contract->debt_current->op_sum = 3500;
    /*
     * Дата возникновения срочной задолженности
     */
    $report->base_part->contract->debt_current->date = date('d.m.Y');

    // Сведения о просроченной задолженности (Заполняется при наличии просроченной задолженности)
    /*
     * Дата возникновения просроченной задолженности
     */
    $report->base_part->contract->debt_overdue->date = date('d.m.Y');
    /*
     * Сумма просроченной задолженности по основному долгу
     */
    $report->base_part->contract->debt_overdue->op_sum = 0;
    /*
     * Сумма просроченной задолженности по иным требованиям
     */
    $report->base_part->contract->debt_overdue->other_sum = 0;
    /*
     * Сумма просроченной задолженности по иным требованиям
     */
    $report->base_part->contract->debt_overdue->percent_sum = 0 ;
    /*
     * Дата последнего пропущенного платежа по процентам
     */
    $report->base_part->contract->debt_overdue->percent_miss_payout_date = date('d.m.Y');
    /*
     * Дата последнего пропущенного платежа по основному долгу
     */
    $report->base_part->contract->debt_overdue->op_miss_payout_date = date('d.m.Y');

    // Сведения о внесении платежей
    /*
     * Продолжительность просрочки в днях
     * По умолчанию 0 дней
     */
    $report->base_part->contract->payments->overdue_day = 0;
    /*
     * Код соблюдения размера платежей
     * По умолчанию 1 - Платеж внесен в полном размере
     * Возможные значения:
     * 1 - Платеж внесен в полном размере
     * 2 - Платеж внесен не в полном размере
     * 3 - Платеж не внесен
     */
    $report->base_part->contract->payments->size_payments_type = 1;
    /*
     * Сумма внесенных платежей по процентам
     */
    $report->base_part->contract->payments->paid_percent_sum = 1500;
    /*
     * Сумма внесенных платежей по иным требованиям
     */
    $report->base_part->contract->payments->paid_other_sum = 500;
    /*
     * Сумма внесенных платежей по основному долгу
     */
    $report->base_part->contract->payments->paid_op_sum = 3500;
    /*
     * Сумма последнего внесенного платежа по иным требованиям
     */
    $report->base_part->contract->payments->last_payout_other_sum = 500;
    /*
     * Сумма последнего внесенного платежа по процентам
     */
    $report->base_part->contract->payments->last_payout_percent_sum = 1000;
    /*
     * Сумма последнего внесенного платежа по основному долгу
     */
    $report->base_part->contract->payments->last_payout_op_sum = 3500;
    /*
     * Дата последнего внесенного платежа
     */
    $report->base_part->contract->payments->last_payout_date = date('d.m.Y');
    /*
     * Код соблюдения срока внесения платежей
     * По умолчанию 1 - Срок внесения платежа не наступил (новый договор)
     * Возможные значения:
     * 1 - Срок внесения платежа не наступил (новый договор)
     * 2 - Платежи вносятся своевременно
     * 3 - Платежи вносятся несвоевременно
     */
    $report->base_part->contract->payments->payments_deadline_type = 2;

    // Величина среднемесячного платежа по договору займа (кредита) и дата ее расчета
    /*
     * Дата расчета величины среднемесячного платежа
     */
    $report->base_part->contract->average_payment->date = date('d.m.Y');
    /*
     * Величина среднемесячного платежа
     */
    $report->base_part->contract->average_payment->sum = 5000;

    // Сведения о неденежном обязательстве источника
    // (заполняется в том случае если был заключен договор на товарный кредит, лизинг, ипотека и т.п.)
    /*
     * Код предоставляемого имущества
     * По справочнику 4.1. Виды предметов залога и неденежных предоставлений по сделке
     */
    $report->base_part->contract->material_guarantee_source->item_type = 1;
    /*
     * Предмет обязательства (то что покупает)
     */
    $report->base_part->contract->material_guarantee_source->material_item = 'Квартира';
    /*
     * Объект предоставления (то что закладывает)
     */
    $report->base_part->contract->material_guarantee_source->material_object = 'Гараж';
    /*
     * Дата передачи имущества субъекту
     */
    $report->base_part->contract->material_guarantee_source->material_object_date = date('d.m.Y');

    // Сведения об участии в обязательстве, по которому формируется кредитная история
    /*
     * Дата передачи финансирования субъекту или возникновения обеспечения исполнения обязательства
     */
    $report->information_part->credit->date = date('d.m.Y', time());
    /*
     * Код вида займа (кредита). По справочнику 2.3 - Виды займа (кредита).
     * По умолчанию 3 - Микрозаем
     * Возможные значения:
     * 1 - Заем (кредит)
     * 2 - Заем (кредит) с ипотекой
     * 3 - Микрозаем
     * 4 - Кредитная линия с лимитом выдачи
     * 5 - Кредитная линия с лимитом задолженности
     * 6 - Комбинированная кредитная линия с лимитом выдачи и лимитом задолженности
     * 7 - Кредит "овердрафт" (кредитование счета)
     * 8 - Синдицированный заем (кредит)
     * 99 - Иной заем (кредит)
     */
    $report->information_part->credit->type = 3;
    /*
     * УИд сделки
     */
    $report->information_part->credit->uid = $uid;
    /*
     * Код вида участия в сделке. По справочнику 2.1 - Виды участия в сделке.
     * По умолчанию 1 - Заемщик
     * Возможные значения:
     * 1 - Заемщик
     * 2 - Поручитель
     * 3 - Принципал по гарантии
     * 4 - Лизингополучатель
     * 5 - Лицо, получающее финансирование или предоставляющее обеспечение по договору
     * с элементами займа, поручительства, гарантии или лизинга (смешанный договор)
     * 99 - Иной вид участия
     */
    $report->information_part->credit->ratio = 1;
    /*
     * Признак просрочки должника более 90 дней. По справочнику 3.102 - Признак просрочки должника более 90 дней.
     * По умолчанию - 0
     * Возможные значения:
     * 1 - должник нарушил срок платежа по займу или лизингу более чем на 90 календарных дней
     * 0 - Во всех других случаях
     */
    $report->information_part->credit->sign_90plus = 0;
    /*
     * Признак прекращения обязательства. По справочнику 3.103 - Признак прекращения обязательства
     * По умолчанию - 0
     * Возможные значения:
     * 1 - взаимные обязательства субъекта и источника прекращены (независимо от основания)
     * 0 - Во всех других случаях
     */
    $report->information_part->credit->sign_stop_load = 0;


    $reports[] = $report;

}

$file = Report::generate($reports, $config);

echo $file;
