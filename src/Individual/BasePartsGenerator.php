<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\Individual;

use CloudCastle\EquifaxReport\Libs\Address;
use CloudCastle\XmlGenerator\XmlGenerator;
use CloudCastle\EquifaxReport\Report AS R;

/**
 * Класс BasePartsGenerator
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\Individual
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class BasePartsGenerator
{

    public static function history(Client $client, XmlGenerator $generator): void
    {
        $history = $client;

        $generator->startElement('history', [], 'Предыдущее Имя (history.name); Предыдущий документ (history.doc); ИНН, ОГРНИП (inn, inn.ogrnip); СНИЛС (snils)');

        /**
         * Предыдущее имя, фамилия или отчество
         */
        $generator->startElement('name', [], 'Признак наличия предыдущего имени');
        $generator->addElement('hist_name_sign', 0);
        $generator->closeElement();

        /**
         * Предыдущий документ
         */
        $generator->startElement('doc', [], 'Документ, ранее удостоверявший личность');
        $generator->addElement('hist_doc_sign', 0);
        $generator->closeElement();

        $generator->closeElement();
    }

    private static function getOKATO(Address $addres)
    {
        $okato = 99999999999;
        if ( ! $addres->country != 643 && $addres->okato) {
            $okato = $addres->okato;
        }
        return $okato;
    }

    public static function addrReg(Address $addres, XmlGenerator $generator): void
    {
        $generator->startElement('addr_reg', [], 'Регистрация физического лица по месту жительства или пребывания')
            ->addElement('reg_code', $addres->reg_code)
            ->addElement('index', $addres->index)
            ->addElement('country', $addres->country)
            ->addElement('country_text', $addres->country_text)
            ->addElement('fias', $addres->fias)
            ->addElement('okato', self::getOKATO($addres))
            ->addElement('other_statement', $addres->other_statement)
            ->addElement('street', $addres->street)
            ->addElement('house', $addres->house)
            ->addElement('domain', $addres->domain)
            ->addElement('block', $addres->block)
            ->addElement('build', $addres->build)
            ->addElement('apartment', $addres->apartment)
            ->addElement('reg_date', $addres->reg_date)
            ->addElement('reg_place', $addres->reg_place)
            ->addElement('reg_department_code', $addres->reg_department_code)
            ->closeElement();
    }

    public static function addrFact(Address $regAddr, Address $factAddr, XmlGenerator $generator): void
    {
        $generator->startElement('addr_fact', [], 'Фактическое место жительства');
        if (md5(json_encode($regAddr)) !== md5(json_encode($factAddr))) {
            //$generator->addElement('sign', 1);
        }
        $generator->addElement('index', $factAddr->index)
            ->addElement('country', $factAddr->country)
            ->addElement('country_text', $factAddr->country_text)
            ->addElement('fias', $factAddr->fias)
            ->addElement('okato', self::getOKATO($factAddr))
            ->addElement('other_statement', $factAddr->other_statement)
            ->addElement('street', $factAddr->street)
            ->addElement('house', $factAddr->house)
            ->addElement('domain', $factAddr->domain)
            ->addElement('block', $factAddr->block)
            ->addElement('build', $factAddr->build)
            ->addElement('apartment', $factAddr->apartment)
            ->closeElement();
    }

    public static function contacts($phone, $comment, $email, XmlGenerator $generator): void
    {
        $generator->startElement('contacts', [], 'Контактные данные');
        if ($phone) {
            $generator->startElement('phone')
                ->addElement('number', $phone, [], 'Номер телефона')
                ->addElement('comment', $comment, [], 'Комментарий')
                ->closeElement();
        }
        $generator->addElement('email', $email, [], 'email');
        $generator->closeElement();
    }

    public static function incapacity($report, XmlGenerator $generator): void
    {
        $generator->startElement('incapacity', [], 'Сведения о дееспособности');
        $generator->addElement('code', 1);
        R::$numberOfRecords ++;
        $generator->closeElement();
    }

    public static function dutyTransfer($report, XmlGenerator $generator): void
    {
        $generator->startElement('duty_transfer', [], 'Сведения об основных частях кредитных историй юридического лица, от которого субъекту перешли права и обязанности');
        $generator->addElement('sign', 0);
        R::$numberOfRecords ++;

        $generator->closeElement();
    }

    public static function bankruptcy($report, XmlGenerator $generator): void
    {
        $generator->startElement('bankruptcy', [], 'Сведения по делу о несостоятельности (банкротстве)');
        $generator->addElement('sign', 0);
        R::$numberOfRecords ++;
        $generator->closeElement();
    }

    public static function bankruptcyFinish($report, XmlGenerator $generator): void
    {
        $generator->startElement('bankruptcy_finish', [], 'Сведения о завершении расчетов с кредиторами и освобождении субъекта от исполнения обязательств в связи с банкротством');
        $generator->addElement('sign', 0);
        R::$numberOfRecords ++;
        $generator->closeElement();
    }

    public static function addPart($report, $config, XmlGenerator $generator): void
    {
        $generator
            ->startElement('add_part')
            ->startElement('accounting')
            ->addElement('sign', 1)
            ->closeElement()
            ->closeElement();
    }

    public static function purchaserPrivate($report, XmlGenerator $generator)
    {

        $client = $report->title_part->private;
        $name = $client->getName();
        $document = $client->getDocument();
        $birth = $client->getBirth();
        $generator->startElement('purchaser')
            ->startElement('private')
            ->addElement('lastname', $name['last'])
            ->addElement('firstname', $name['first'])
            ->addElement('middlename', $name['middle'])
            ->addElement('birthday', $birth['date'])
            ->addElement('birthplace', $birth['place'])
            ->addElement('inn_code', $client->getInn()['code'])
            ->addElement('inn_no', $client->getInn()['inn'])
            ->addElement('snils', $client->getSnils())
            ->addElement('doc_type', $document['type'])
            ->addElement('doc_type_text', $document['type_text'])
            ->addElement('doc_serial', $document['serial'])
            ->addElement('doc_number', $document['number'])
            ->addElement('doc_date', $document['date'])
            ->addElement('doc_who', $document['who'])
            ->addElement('doc_department_code', $document['department_code'])
            ->addElement('purchase_date', date('d.m.Y'))
            ->closeElement()
            ->closeElement();
    }

}
