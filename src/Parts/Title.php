<?php

declare(strict_types=1);

namespace CloudCastle\EquifaxReport\Parts;

use CloudCastle\EquifaxReport\Individual\Client;
use CloudCastle\EquifaxReport\Individual\Document;
use CloudCastle\EquifaxReport\XmlGenerator;
use CluodCastle\Check\Inn\Inn;
use CluodCastle\Check\Snils\Snils;

/**
 * Класс Title
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\Parts
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class Title
{

    private ?XmlGenerator $generator = null;
    private ?Client $client = null;

    public function __construct(Client $client, XmlGenerator $generator)
    {
        $this->client = $client;
        $this->generator = $generator;
        $this->generate();
    }

    public function generate()
    {
        $this->generator->startElement('title_part');
        $this->kski();
        $this->private();
        $this->generator->closeElement();
    }

    private function kski(): void
    {
        if ($this->client->kski) {
            $this->generator->startElement('kski')
                ->addElement('code', (string)$this->client->kski)
                ->closeElement();
        }
    }

    private function private(): void
    {
        $this->generator->startElement('private');
        $this->generator->startElement('name')
            ->addElement('last', mb_strtoupper((string)$this->client->last))
            ->addElement('first', mb_strtoupper((string)$this->client->first))
            ->addElement('middle', mb_strtoupper((string)$this->client->middle))
            ->closeElement();
        $this->setDocument($this->client->doc);
        $this->generator->startElement('birth')
            ->addElement('date', mb_strtoupper((string)$this->client->birthDate))
            ->addElement('country', mb_strtoupper((string)$this->client->birthCountry))
            ->addElement('place', mb_strtoupper((string)$this->client->birthPlace))
            ->closeElement();
        $this->setHistory();
        $this->setInn();
        $this->setSnils();
        $this->generator->closeElement();
    }

    private function setDocument(?Document $doc)
    {
        $this->generator->startElement('doc')
            ->addElement('country', mb_strtoupper((string)$doc->country))
            ->addElement('country_text', mb_strtoupper((string)$doc->country_text))
            ->addElement('type', mb_strtoupper((string)$doc->type))
            ->addElement('type_text', mb_strtoupper((string)$doc->type_text))
            ->addElement('serial', mb_strtoupper((string)$doc->serial))
            ->addElement('number', mb_strtoupper((string)$doc->number))
            ->addElement('date', $doc->date)
            ->addElement('who', mb_strtoupper((string)$doc->who))
            ->addElement('department_code', mb_strtoupper((string)$doc->department_code))
            ->addElement('end_date', $doc->end_date)
            ->closeElement();
    }

    private function setHistory(): void
    {

        $this->generator->startElement('history', [], 'Предыдущее Имя (history.name); Предыдущий документ (history.doc); ИНН, ОГРНИП (inn, inn.ogrnip); СНИЛС (snils)');
        if (!$this->client->history) {
            /**
             * Предыдущее имя, фамилия или отчество
             */
            $this->generator->startElement('name', [], 'Признак наличия предыдущего имени')
                ->addElement('hist_name_sign', 0)
                ->closeElement()
                /**
                 * Предыдущий документ
                 */
                ->startElement('doc', [], 'Документ, ранее удостоверявший личность')
                ->addElement('hist_doc_sign', 0)
                ->closeElement();
        } else {
            $this->generator->startElement('name')
                ->addElement('last', mb_strtoupper((string)$this->client->history->last))
                ->addElement('first', mb_strtoupper((string)$this->client->history->first))
                ->addElement('middle', mb_strtoupper((string)$this->client->history->middle))
                ->addElement('doc_date', mb_strtoupper((string)$this->client->doc->date))
                ->closeElement();
            $this->setDocument($this->client->history->doc);
        }
        $this->generator->closeElement();
    }

    private function setInn()
    {
        $inn = new Inn($this->client->inn->no);
        if($inn->verify()) {
            $code = 2;
            if ($this->client->inn->code) {
                $code = 1;
            }
            $this->generator->startElement('inn')
                ->addElement('code', $code)
                ->addElement('no', $this->client->inn->no)
                ->addElement('ogrnip', $this->client->inn->ogrnIp)
                ->closeElement();
        }
    }

    private function setSnils()
    {
        $snils = new Snils($this->client->snils);
        if($snils->verify()) {
            $this->generator->startElement('snils')
                ->addElement('no', preg_replace('~([^\d])~', '', $this->client->snils))
                ->closeElement();
        }
    }

}
