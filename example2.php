<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use CloudCastle\EquifaxReport\Config\Config;
use CloudCastle\EquifaxReport\Individual\Client;
use CloudCastle\EquifaxReport\Report\Events;
use CloudCastle\EquifaxReport\Report;

Config::$configFile = __DIR__ . DIRECTORY_SEPARATOR . 'config.php';
$config = Config::instance();

$countReports = 10;

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

    $client->doc->country = 'Россия';
    $client->doc->type = 'Паспорт';
    $client->doc->serial = '1234';
    $client->doc->number = '123456';
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

    $client->history->first = 'Петр';
    $client->history->last = 'Петров';
    $client->history->middle = 'Петрович';

    /**
     * Событие для отправки отчета
     */
    $events = new Events($config);
    $events->action = 'A';
    $events->event = '1.4';
    $events->action_reason = 'Новый договор. Передача КИ в БКИ';
    $reports = new Reports($config);

    $reports[] =  Report::instance();

}

Report::generate($reports, $config);