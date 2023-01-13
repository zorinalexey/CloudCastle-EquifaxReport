<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use CloudCastle\EquifaxReport\Config\Config;
use CloudCastle\EquifaxReport\Individual\Client;
use CloudCastle\EquifaxReport\Report;
use CloudCastle\EquifaxReport\Report\Events;

Config::$configFile = __DIR__ . DIRECTORY_SEPARATOR . 'config.json';
$config = Config::instance();

$countReports = 1;

for ($i = 0; $i < $countReports; $i++) {

    $client = new Client();
    /**
     * Опционально (при налии данной информации)
     */
    $client->kski = 'fdglskh897876';

    /**
     * Номер СНИЛС
     */
    $client->snils = '07974157113';

    /**
     * Номер ИНН
     */
    $client->inn->no = '12345678901';

    /**
     * Опционально
     */
    $client->inn->ogrnIp = '123456789012';

    /**
     * Если заемщик не является резидентом РФ
     */
    $client->inn->code = false;

    $client->last = 'Иванов';
    $client->first = 'Иван';
    $client->middle = 'Ивановович';

    $client->doc->country = '643';
    $client->doc->country_text = 'Россия';
    $client->doc->type_text = 'Паспорт';
    $client->doc->type = '21';
    $client->doc->serial = '1234';
    $client->doc->number = '12345' . $i;
    $client->doc->date = '12.12.2000';
    $client->doc->who = 'УВД г. Москвы';
    $client->doc->department_code = '123-456';

    /**
     * Опционально
     */
    $client->doc->end_date = '12.12.2040';

    /**
     * Дата рождения
     */
    $client->birthDate = '12.12.1980';

    /**
     * Страна рождения
     */
    $client->birthCountry = 'Россия';

    /**
     * Место рождения
     */
    $client->birthPlace = 'Село хорошее';

    /**
     * Предыдущее Ф.И.О
     *
     * $client->history->first = 'Петр';
     * $client->history->last = 'Петров';
     * $client->history->middle = 'Петрович';
     *
     *
     * /**
     * Предыдущий документ
     *
     * $client->history->doc->country = '643';
     * $client->history->doc->country_text = 'Россия';
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
    $event->event = '1.4';
    $event->action_reason = 'Новый договор. Передача КИ в БКИ';
    $report = new Report($client, $event, $config);

    $report->base_part->contract->uid = '1234';
    /**
     * Общие сведения о сделке
     */
    $report->base_part->contract->deal->ratio = 1;
    $report->base_part->contract->deal->date = date('m.d.Y');
    $report->base_part->contract->deal->category = '1';
    $report->base_part->contract->deal->type = '1';
    $report->base_part->contract->deal->purpose = '16.3';
    /**
     * Сведения о наличии солидарных должников
     */
    //$report->base_part->contract->joint_debtors->count = 2;





    $reports[] = $report;

}

$file = Report::generate($reports, $config);

echo $file;