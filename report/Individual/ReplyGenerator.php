<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\Individual;

use CloudCastle\XmlGenerator\XmlGenerator;

/**
 * Класс ReplyGenerator
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\Individual
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class ReplyGenerator
{

    private ?XmlGenerator $generator;
    private ?Report $report;
    private ?Client $client;

    public function __construct(Report $report, XmlGenerator $generator, Client $client)
    {
        $this->reply = $report;
        $this->generator = $generator;
        $this->client = $client;
        $this->generator->startElement('base_part');
        $this->setReply();
        $this->generator->closeElement();
    }

    private function setReply(): void
    {
        $this->setAddrReg($this->reply, $this->generator)
            ->setAddrFact($this->reply, $this->generator)
            ->setContacts($this->reply, $this->generator)
            ->setOgrnIp($this->client, $this->generator)
            ->setContract($this->reply, $this->generator);
    }

    private function setAddrReg(Report $report, XmlGenerator $generator): self
    {
        $addres = $report->getAddrReg();
        $generator->startElement('addr_reg')
            ->addElement('reg_code', $addres->reg_code)
            ->addElement('index', $addres->index)
            ->addElement('country', $addres->country)
            ->addElement('country_text', $addres->country_text)
            ->addElement('fias', $addres->fias)
            ->addElement('okato', $addres->okato)
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
        return $this;
    }

    private function setAddrFact(Report $report, XmlGenerator $generator): self
    {
        $regAddrres = $report->getAddrReg();
        $addres = $report->getAddrFact();
        $generator->startElement('addr_fact');
        if (md5(json_encode($regAddrres)) !== md5(json_encode($addres))) {
            $generator->addElement('sign', 1);
        }
        $generator->addElement('index', $addres->index)
            ->addElement('country', $addres->country)
            ->addElement('country_text', $addres->country_text)
            ->addElement('fias', $addres->fias)
            ->addElement('okato', $addres->okato)
            ->addElement('other_statement', $addres->other_statement)
            ->addElement('street', $addres->street)
            ->addElement('house', $addres->house)
            ->addElement('domain', $addres->domain)
            ->addElement('block', $addres->block)
            ->addElement('build', $addres->build)
            ->addElement('apartment', $addres->apartment)
            ->closeElement();
        return $this;
    }

    private function setContacts(Report $report, XmlGenerator $generator): self
    {
        $contacts = $report->getContacts();
        $phone = $contacts->getPhone();
        $generator->startElement('contacts');
        if ($phone) {
            $generator->startElement('phone')
                ->addElement('number', $phone)
                ->addElement('comment', $contacts->getComment())
                ->closeElement();
        }
        $generator->addElement('email', $contacts->getEmail());
        $generator->closeElement();
        return $this;
    }

    private function setOgrnIp(Client $client, XmlGenerator $generator): self
    {
        $inn = $client->getInn();
        if ($inn['ogrnip']) {
            $generator->startElement('ogrnip')
                ->addElement('sign', 1)
                ->addElement('no', $inn['ogrnip'])
                ->addElement('date', $inn['regDateIp'])
                ->closeElement();
        }
        return $this;
    }

    private function setContract(Report $report, XmlGenerator $generator)
    {
        var_dump($report->getContract());
    }

}
