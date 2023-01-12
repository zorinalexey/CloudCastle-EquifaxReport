<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\Individual;

use CloudCastle\XmlGenerator\XmlGenerator;

/**
 * Класс ReportGenerator
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\Client
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class ReportGenerator
{

    public function setPrivateInfo(Client $client, XmlGenerator $generator): void
    {
        $generator->startElement('private', [], 'Титульная часть СКИ ФЛ');
        $this->setIndividualName($client, $generator)
            ->setIndividualDocument($client, $generator)
            ->setIndividualBirth($client, $generator)
            ->setIndividualHistory($client, $generator)
            ->setIndividualInn($client, $generator)
            ->setIndividualSnils($client, $generator);
        $generator->closeElement();
    }

    private function setIndividualDocument(Client $client, XmlGenerator $generator, bool $history = false): self
    {
        $document = $client->getDocument();
        $generator->startElement('doc');
        if ($history) {
            $generator->addComment('Документ, ранее удостоверявший личность');
            $document = $client->history->getDocument();
        } else {
            $generator->addComment('Документ, удостоверяющий личность');
        }
        $generator->addElement('country', $document['country'])
            ->addElement('country_text', $document['country_text'])
            ->addElement('type', $document['type'])
            ->addElement('type_text', $document['type_text'])
            ->addElement('serial', $document['serial'])
            ->addElement('number', $document['number'])
            ->addElement('date', $document['date'])
            ->addElement('who', $document['who'])
            ->addElement('department_code', $document['department_code'])
            ->addElement('end_date', $document['end_date'])
            ->closeElement();
        return $this;
    }

    private function setIndividualName(Client $client, XmlGenerator $generator, bool $history = false): self
    {
        $generator->startElement('name',);
        if ($history) {
            $generator->addComment('Предыдущее Имя');
            $document = $client->getDocument();
            $client = $client->history;
            $generator->addElement('doc_date', $document['date']);
        } else {
            $generator->addComment('Имя');
        }
        $clientName = $client->getName();
        $generator->addElement('last', $clientName['last'])
            ->addElement('first', $clientName['first'])
            ->addElement('middle', $clientName['middle'])
            ->closeElement();
        return $this;
    }

    private function setIndividualBirth(Client $client, XmlGenerator $generator): self
    {
        $birth = $client->getBirth();
        $generator->startElement('birth', [], 'Дата и место рождения')
            ->addElement('date', $birth['date'])
            ->addElement('country', $birth['country'])
            ->addElement('place', $birth['place'])
            ->closeElement();
        return $this;
    }

    private function setIndividualHistory(Client $client, XmlGenerator $generator): self
    {
        BasePartsGenerator::history($client, $generator);
        return $this;
    }

    private function setIndividualInn(Client $client, XmlGenerator $generator): self
    {
        $inn = $client->getInn();
        if ($inn['inn']) {
            $generator->startElement('inn', [], 'Номер налогоплательщика и регистрационный номер')
                ->addElement('code', $inn['code'])
                ->addElement('no', $inn['inn']);
            if ($inn['ogrnip']) {
                $generator->addElement('ogrnip', $inn['ogrnip']);
            }
            $generator->closeElement();
        }
        return $this;
    }

    private function setIndividualSnils(Client $client, XmlGenerator $generator): self
    {
        $snils = $client->getSnils();
        if ($snils) {
            $generator->startElement('snils', [], 'СНИЛС')
                ->addElement('no', $snils)
                ->closeElement();
        }
        return $this;
    }

}
