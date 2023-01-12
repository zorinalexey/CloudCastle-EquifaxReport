<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\Individual;

use CloudCastle\XmlGenerator\XmlGenerator;
use CloudCastle\EquifaxReport\ReportSetters\Deal;
use CloudCastle\EquifaxReport\ReportSetters\ContractAmount;
use CloudCastle\EquifaxReport\ReportSetters\JointDebtors;
use CloudCastle\EquifaxReport\ReportSetters\PaymentTerms;
use CloudCastle\EquifaxReport\ReportSetters\FullCost;
use CloudCastle\EquifaxReport\ReportSetters\ContractChanges;
use CloudCastle\EquifaxReport\ReportSetters\CredStartDebt;
use CloudCastle\EquifaxReport\ReportSetters\Debt;
use CloudCastle\EquifaxReport\ReportSetters\DebtOverdue;
use CloudCastle\EquifaxReport\ReportSetters\DebtCurrent;
use CloudCastle\EquifaxReport\ReportSetters\Payments;
use CloudCastle\EquifaxReport\ReportSetters\AveragePayment;
use CloudCastle\EquifaxReport\Report AS ReportGenerator;

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
    private ?Client $client;

    public function __construct($report, XmlGenerator $generator, Client $client)
    {
        $this->reply = $report;
        $this->generator = $generator;
        $this->client = $client;
        $this->generator->startElement('base_part', [], 'Основная часть кредитной истории');
        $this->setReply();
        $this->generator->closeElement();
    }

    private function setReply(): void
    {
        $this->setClientInfo($this->reply->base_part, $this->generator);
        $this->setContract($this->reply->base_part, $this->generator);
    }

    private function setOgrnIp(Client $client, XmlGenerator $generator): self
    {
        $inn = $client->getInn();
        $generator->startElement('ogrnip', [], 'Государственная регистрация в качестве индивидуального предпринимателя');
        if ($inn['ogrnip']) {
            $generator->addElement('sign', 1)
                ->addElement('no', $inn['ogrnip'])
                ->addElement('date', $inn['regDateIp']);
        } else {
            $generator->addElement('sign', 0);
        }
        $generator->closeElement();
        return $this;
    }

    private function setClientInfo(Report $report, XmlGenerator $generator)
    {
        BasePartsGenerator::addrReg($report->getAddrReg(), $generator);
        BasePartsGenerator::addrFact($report->getAddrReg(), $report->getAddrFact(), $generator);
        BasePartsGenerator::contacts(
            $report->getContacts()->getPhone(),
            $report->getContacts()->getComment(),
            $report->getContacts()->getEmail(),
            $generator
        );
        $this->setOgrnIp($this->client, $generator);
        BasePartsGenerator::incapacity($report, $generator);
    }

    private function setContract(Report $report, XmlGenerator $generator): self
    {

        ReportGenerator::$numberOfRecords ++;
        $contract = $report->getContract();
        $generator->startElement('contract', [], 'Сведения об обязательстве субъекта кредитной истории')
            ->startElement('uid', [], 'Уникальный идентификатор договора (сделки)')
            ->addElement('id', $contract->uid)
            ->closeElement();
        $this->setDeal($contract->deal, $generator)
            ->setContractAmount($contract->contract_amount, $generator)
            ->setJointDebtors($contract->joint_debtors, $generator)
            ->setPaymentTerms($contract->payment_terms, $generator)
            ->setFullCost($contract->full_cost, $generator)
            ->setContractChanges($contract->contract_changes, $generator)
            ->setCredStartDebt($contract->cred_start_debt, $generator)
            ->setDebt($contract->debt, $generator)
            ->setDebtCurrent($contract->debt_current, $generator)
            ->setDeptOverdue($contract->debt_overdue, $generator)
            ->setPayments($contract->payments, $generator)
            ->setAveragePayment($contract->average_payment, $generator);
        $generator->closeElement();
        return $this;
    }

    private function setAveragePayment(AveragePayment $average_payment, XmlGenerator $generator)
    {
        if ($average_payment) {
            $generator->startElement('average_payment', [], ' Величина среднемесячного платежа по договору займа (кредита) и дата ее расчета');
            $this->setData($average_payment, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setPayments(Payments $payments, XmlGenerator $generator)
    {
        if ($payments) {
            $generator->startElement('payments', [], 'Сведения о внесении платежей');
            $this->setData($payments, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setDeptOverdue(DebtOverdue $debt_overdue, XmlGenerator $generator)
    {
        if ($debt_overdue) {
            $generator->startElement('debt_overdue', [], 'Сведения о просроченной задолженности');
            $this->setData($debt_overdue, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setDebtCurrent(DebtCurrent $debt_current, XmlGenerator $generator)
    {
        if ($debt_current) {
            $generator->startElement('debt_current', [], 'Сведения о срочной задолженности');
            $this->setData($debt_current, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setDebt(Debt $debt, XmlGenerator $generator)
    {
        if ($debt) {
            $generator->startElement('debt', [], 'Сведения о задолженности');
            $this->setData($debt, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setCredStartDebt(CredStartDebt $cred_start_debt, XmlGenerator $generator)
    {
        if ($cred_start_debt) {
            $generator->startElement('cred_start_debt', [], 'Сведения о передаче финансирования субъекту или возникновения обеспечения исполнения обязательства');
            $this->setData($cred_start_debt, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setContractChanges(ContractChanges $contract_changes, XmlGenerator $generator)
    {
        if ($contract_changes) {
            $generator->startElement('contract_changes', [], 'Сведения об изменении договора');
            $this->setData($contract_changes, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setFullCost(FullCost $full_cost, XmlGenerator $generator): self
    {
        if ($full_cost) {
            $generator->startElement('full_cost', [], 'Полная стоимость потребительского кредита (займа)');
            $this->setData($full_cost, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setPaymentTerms(PaymentTerms $payment_terms, XmlGenerator $generator): self
    {
        if ($payment_terms) {
            $generator->startElement('payment_terms', [], 'Сведения об условиях платежей');
            $this->setData($payment_terms, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setJointDebtors(JointDebtors $joint_debtors, XmlGenerator $generator)
    {
        $generator->startElement('joint_debtors');
        if ($joint_debtors && $joint_debtors->count > 0) {
            $generator->addElement('count', $joint_debtors->count);
        } else {
            $generator->addElement('sign', 0);
        }
        $generator->closeElement();
        return $this;
    }

    private function setDeal(Deal $deal, XmlGenerator $generator): self
    {
        if ($deal) {
            $generator->startElement('deal', [], 'Общие сведения о сделке');
            $this->setData($deal, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setContractAmount(ContractAmount $contractAmount, XmlGenerator $generator): self
    {
        if ($contractAmount) {
            $generator->startElement('contract_amount', [], 'Сумма и валюта обязательства');
            $this->setData($contractAmount, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setData($data, XmlGenerator $generator)
    {
        foreach ($data as $attr => $value) {
            $generator->addElement($attr, $value);
        }
    }

}
