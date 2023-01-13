<?php

namespace CloudCastle\EquifaxReport\Libs;

use CloudCastle\EquifaxReport\Config\Config;
use CloudCastle\EquifaxReport\Report;
use CloudCastle\EquifaxReport\XmlGenerator;

trait Partitions
{
    public static function head(Config $config, XmlGenerator $generator): void
    {
        $generator->startElement('head')
            ->addElement('source_inn', $config->inn)
            ->addElement('source_ogrn', $config->ogrn)
            ->addElement('date', $config->date)
            ->addElement('file_reg_date', $config->file_reg_date)
            ->addElement('file_reg_num', $config->file_reg_num);
        if ($config->prevFile->file_reg_num && $config->prevFile->file_reg_date) {
            $generator->startElement('prev_file')
                ->addElement('file_reg_num', $config->prevFile->file_reg_num)
                ->addElement('file_reg_date', $config->prevFile->file_reg_date)
                ->closeElement();
        }
        $generator->closeElement();
    }

    public static function footer(XmlGenerator $generator): void
    {
        $generator->startElement('footer')
            ->addElement('subjects_count', Report::$subjects_count)
            ->addElement('records_count', Report::$records_count)
            ->closeElement();
    }


    public static function addr_reg(Report $report, XmlGenerator $generator): void
    {

    }

    public static function addr_fact(Report $report, XmlGenerator $generator): void
    {

    }

    public static function contacts(Report $report, XmlGenerator $generator): void
    {
        $contacts = $report->base_part->contacts;
        if ($contacts) {
            $generator->startElement('contacts', [], 'Контактные данные');
            foreach ($contacts as $contact) {
                if (isset($contact['phone'])) {
                    $generator->startElement('phone');
                    $generator->addElement('number', $contact['phone']);
                    if (isset($contact['comment'])) {
                        $generator->addElement('comment', $contact['comment']);
                    }
                    $generator->closeElement();
                    if (isset($contact['email'])) {
                        $generator->addElement('email', $contact['email']);
                    }
                }
            }
            $generator->closeElement();
        }
    }

    public static function ogrnip(Report $report, XmlGenerator $generator): void
    {
        if ($report->client->inn->ogrnIp) {
            $generator->startElement('ogrnip', [], 'Государственная регистрация в качестве индивидуального предпринимателя')
                ->addElement('no', $report->client->inn->ogrnIp)
                ->addElement('date', $report->client->inn->ogrnIpDate)
                ->closeElement();
        }
    }

    public static function incapacity(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('incapacity', [], 'Сведения о дееспособности')
            ->addElement('code', $report->base_part->incapacity->code)
            ->addElement('court_decision_date', $report->base_part->incapacity->court_decision_date)
            ->addElement('court_decision_no', $report->base_part->incapacity->court_decision_no)
            ->addElement('court_name', $report->base_part->incapacity->court_name)
            ->closeElement();
    }

    public static function contract(Report $report, XmlGenerator $generator): void
    {
        foreach (self::$itemParts as $partName) {
            self::$partName($report, $generator);
        }
    }

    public static function uid(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('uid')
            ->addElement('id', $report->base_part->contract->uid)
            ->closeElement();
    }

    public static function deal(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('deal', [], 'Общие сведения о сделке')
            ->addElement('ratio', $report->base_part->contract->deal->ratio)
            ->addElement('date', $report->base_part->contract->deal->date)
            ->addElement('category', $report->base_part->contract->deal->category)
            ->addElement('type', $report->base_part->contract->deal->type)
            ->addElement('purpose', $report->base_part->contract->deal->purpose)
            ->addElement('sign_credit', $report->base_part->contract->deal->sign_credit)
            ->addElement('sign_credit_card', $report->base_part->contract->deal->sign_credit_card)
            ->addElement('sign_renovation', $report->base_part->contract->deal->sign_renovation)
            ->addElement('sign_deal_cash_source', $report->base_part->contract->deal->sign_deal_cash_source)
            ->addElement('sign_deal_cash_subject', $report->base_part->contract->deal->sign_deal_cash_subject)
            ->addElement('end_date', $report->base_part->contract->deal->end_date)
            ->closeElement();
    }

    public static function contract_amount(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('contract_amount', [], 'Сумма и валюта обязательства')
            ->addElement('amount', $report->base_part->contract->contract_amount->sum)
            ->addElement('currency', $report->base_part->contract->contract_amount->currency)
            ->closeElement();
    }

    public static function joint_debtors(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('joint_debtors', [], 'Сведения о наличии солидарных должников');
        if ($report->base_part->contract->joint_debtors->count) {
            $generator->addElement('count', $report->base_part->contract->joint_debtors->count);
        } else {
            $generator->addElement('sign', 0);
        }
        $generator->closeElement();
    }

    public static function payment_terms(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('payment_terms', [], 'Сведения об условиях платежей')
            ->addElement('op_next_payout_sum', $report->base_part->contract->payment_terms->op_next_payout_sum)
            ->addElement('op_next_payout_date', $report->base_part->contract->payment_terms->op_next_payout_date)
            ->addElement('percent_next_payout_sum', $report->base_part->contract->payment_terms->percent_next_payout_sum)
            ->addElement('percent_next_payout_date', $report->base_part->contract->payment_terms->percent_next_payout_date)
            ->addElement('regularity', $report->base_part->contract->payment_terms->regularity)
            ->addElement('min_sum_pay_cc', $report->base_part->contract->payment_terms->min_sum_pay_cc)
            ->addElement('grace_date', $report->base_part->contract->payment_terms->grace_date)
            ->addElement('grace_end_date', $report->base_part->contract->payment_terms->grace_end_date)
            ->addElement('percent_end_date', $report->base_part->contract->payment_terms->percent_end_date)
            ->closeElement();
    }

    public static function full_cost(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('full_cost', [], 'Полная стоимость потребительского кредита (займа)')
            ->addElement('percent', $report->base_part->contract->full_cost->percent)
            ->addElement('sum', $report->base_part->contract->full_cost->sum)
            ->addElement('date', $report->base_part->contract->full_cost->date)
            ->closeElement();
    }

    public static function cred_start_debt(Report $report, XmlGenerator $generator): void
    {

    }

    public static function debt(Report $report, XmlGenerator $generator): void
    {

    }

    public static function debt_current(Report $report, XmlGenerator $generator): void
    {

    }

    public static function debt_overdue(Report $report, XmlGenerator $generator): void
    {

    }

    public static function payments(Report $report, XmlGenerator $generator): void
    {

    }

    public static function average_payment(Report $report, XmlGenerator $generator): void
    {

    }

    public static function material_guarantee_source(Report $report, XmlGenerator $generator): void
    {

    }

    public static function accounting(Report $report, XmlGenerator $generator): void
    {

    }

    public static function application(Report $report, XmlGenerator $generator): void
    {

    }

    public static function credit(Report $report, XmlGenerator $generator): void
    {

    }

}