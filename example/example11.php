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
    $event->event = '1.5';
    $event->action_reason = 'Для принудительного исполнения передано требование о взыскании долга по '.
        'алиментам, платы за жилое помещение, коммунальные услуги или услуги связи';

    $report = new Report($client, $event, $config);

    /**
     * Регистрация физического лица по месту жительства или пребывания
     */
    $report->base_part->addr_reg->reg_code = '1';
    $report->base_part->addr_reg->index = '123123';
    $report->base_part->addr_reg->country = 643;
    $report->base_part->addr_reg->country_text = 'Российская Федерация';
    $report->base_part->addr_reg->fias = '5bc8ef01-ab23-45ef-67bd-a8c5f78a0d2f';
    $report->base_part->addr_reg->okato = '45000000000';
    $report->base_part->addr_reg->street = 'Медовая';
    $report->base_part->addr_reg->house = '125';
    $report->base_part->addr_reg->domain = '15';
    $report->base_part->addr_reg->block = '1';
    $report->base_part->addr_reg->build = '2';
    $report->base_part->addr_reg->apartment = '10';
    $report->base_part->addr_reg->reg_date = '01.01.2010';
    $report->base_part->addr_reg->reg_place = 'УВД г.Москвы';
    $report->base_part->addr_reg->reg_department_code = '555-555';

    /**
     * Фактическое место жительства
     */
    $report->base_part->addr_fact->index = '123123';
    $report->base_part->addr_fact->country = 643;
    $report->base_part->addr_fact->country_text = 'Российская Федерация';
    $report->base_part->addr_fact->fias = 'abcdef01-ab23-45ef-67bd-a8c5f78a0d2e';
    $report->base_part->addr_fact->okato = '45000000000';
    $report->base_part->addr_fact->street = 'Содовая';
    $report->base_part->addr_fact->house = '111';
    $report->base_part->addr_fact->domain = '10';
    $report->base_part->addr_fact->block = '14';
    $report->base_part->addr_fact->build = '27';
    $report->base_part->addr_fact->apartment = '1053';

    // Контактные данные
    $report->base_part->contacts[] = [
        /*
         * поле обязательно
         */
        'phone' => preg_replace('~([^0-9()+])~ui', '', '+7 (999) 111-22-33'),
        /*
         * поле необязательно
         * если отсутствует то необходимо указать null или вообще не указывать элемент в массиве
         */
        'comment' => 'Комментарий',
        /*
         * поле необязательно
         * если отсутствует то необходимо указать null или вообще не указывать элемент в массиве
         */
        'email' => 'test@test.com'
    ];

    $report->base_part->incapacity;

    $report->base_part->contract->collection;

    $reports[] = $report;

}

$file = Report::generate($reports, $config);

echo $file;
