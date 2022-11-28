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
use CloudCastle\EquifaxReport\ReportSetters\DebtCurrent;
use CloudCastle\EquifaxReport\ReportSetters\DebtOverdue;
use CloudCastle\EquifaxReport\ReportSetters\AveragePayment;
use CloudCastle\EquifaxReport\ReportSetters\Guarantees;
use CloudCastle\EquifaxReport\ReportSetters\Collaterals;
use CloudCastle\EquifaxReport\ReportSetters\Payments;
use CloudCastle\EquifaxReport\ReportSetters\MaterialGuaranteeSource;
use CloudCastle\EquifaxReport\ReportSetters\MaterialGuaranteeSubject;

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

    private function setContract(Report $report, XmlGenerator $generator): self
    {
        $contract = $report->getContract();
        $generator->startElement('contract')
            ->startElement('uid')
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
            ->setDebtOverdue($contract->debt_overdue, $generator)
            ->setPayments($contract->payments, $generator)
            ->setAveragePayment($contract->average_payment, $generator)
            ->setMaterialGuaranteeSource($contract->material_guarantee_source, $generator)
            ->setMaterialGuaranteeSubject($contract->material_guarantee_subject, $generator)
            ->setCollaterals($contract->collaterals, $generator)
            ->setGuarantees($contract->guarantees, $generator)
        ;
        $generator->closeElement();
        return $this;
    }

    private function setGuarantees(Guarantees $guarantees, XmlGenerator $generator): self
    {
        if ($guarantees) {
            $generator->startElement('guarantees');
            $this->setData($guarantees, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setCollaterals(Collaterals $collaterals, XmlGenerator $generator): self
    {
        if ($collaterals) {
            $generator->startElement('collaterals');
            $this->setData($collaterals, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setPayments(Payments $payments, XmlGenerator $generator): self
    {
        if ($payments) {
            $generator->startElement('payments');
            $this->setData($payments, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setMaterialGuaranteeSource(MaterialGuaranteeSource $material_guarantee_source, XmlGenerator $generator): self
    {
        if ($material_guarantee_source) {
            $generator->startElement('material_guarantee_source');
            $this->setData($material_guarantee_source, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setMaterialGuaranteeSubject(MaterialGuaranteeSubject $material_guarantee_subject, XmlGenerator $generator): self
    {
        if ($material_guarantee_subject) {
            $generator->startElement('material_guarantee_subject');
            $this->setData($material_guarantee_subject, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setAveragePayment(AveragePayment $average_payment, XmlGenerator $generator): self
    {
        if ($average_payment) {
            $generator->startElement('average_payment');
            $this->setData($average_payment, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setDebtOverdue(DebtOverdue $debt_overdue, XmlGenerator $generator): self
    {
        if ($debt_overdue) {
            $generator->startElement('debt_overdue');
            $this->setData($debt_overdue, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setDebtCurrent(DebtCurrent $debt_current, XmlGenerator $generator): self
    {
        if ($debt_current) {
            $generator->startElement('debt_current');
            $this->setData($debt_current, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setDebt(Debt $debt, XmlGenerator $generator): self
    {
        if ($debt) {
            $generator->startElement('debt');
            $this->setData($debt, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setCredStartDebt(CredStartDebt $cred_start_debt, XmlGenerator $generator): self
    {
        if ($cred_start_debt) {
            $generator->startElement('cred_start_debt');
            $this->setData($cred_start_debt, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setContractChanges(ContractChanges $contract_changes, XmlGenerator $generator): self
    {
        if ($contract_changes) {
            $generator->startElement('contract_changes');
            $this->setData($contract_changes, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setFullCost(FullCost $full_cost, XmlGenerator $generator): self
    {
        if ($full_cost) {
            $generator->startElement('full_cost');
            $this->setData($full_cost, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setPaymentTerms(PaymentTerms $payment_terms, XmlGenerator $generator): self
    {
        if ($payment_terms) {
            $generator->startElement('payment_terms');
            $this->setData($payment_terms, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setJointDebtors(JointDebtors $joint_debtors, XmlGenerator $generator): self
    {
        if ($joint_debtors) {
            $generator->startElement('joint_debtors');
            $this->setData($joint_debtors, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setDeal(Deal $deal, XmlGenerator $generator): self
    {
        if ($deal) {
            $generator->startElement('deal');
            $this->setData($deal, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setContractAmount(ContractAmount $contractAmount, XmlGenerator $generator): self
    {
        if ($contractAmount) {
            $generator->startElement('contract_amount');
            $this->setData($contractAmount, $generator);
            $generator->closeElement();
        }
        return $this;
    }

    private function setData($data, XmlGenerator $generator): self
    {
        foreach ($data as $attr => $value) {
            $generator->addElement($attr, $value);
        }
        return $this;
    }

}
