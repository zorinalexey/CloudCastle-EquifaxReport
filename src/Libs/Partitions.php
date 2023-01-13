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
        $generator->startElement('addr_reg', [], 'Регистрация физического лица по месту жительства или пребывания')
            ->addElement('reg_code' , $report->base_part->addr_reg->reg_code)
            ->addElement('index' , $report->base_part->addr_reg->index)
            ->addElement('country' , $report->base_part->addr_reg->country)
            ->addElement('country_text' , $report->base_part->addr_reg->country_text)
            ->addElement('fias' , $report->base_part->addr_reg->fias)
            ->addElement('okato' , $report->base_part->addr_reg->okato)
            ->addElement('street' , $report->base_part->addr_reg->street)
            ->addElement('house' , $report->base_part->addr_reg->house)
            ->addElement('domain' , $report->base_part->addr_reg->domain)
            ->addElement('block' , $report->base_part->addr_reg->block)
            ->addElement('build' , $report->base_part->addr_reg->build)
            ->addElement('apartment' , $report->base_part->addr_reg->apartment)
            ->addElement('reg_place' , $report->base_part->addr_reg->reg_place)
            ->addElement('reg_department_code' , $report->base_part->addr_reg->reg_department_code)
            ->closeElement();
    }

    public static function addr_fact(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('addr_fact', [], 'Фактическое место жительства')
            ->addElement('index', $report->base_part->addr_fact->index)
            ->addElement('country', $report->base_part->addr_fact->country)
            ->addElement('fias', $report->base_part->addr_fact->fias)
            ->addElement('okato', $report->base_part->addr_fact->okato)
            ->addElement('street', $report->base_part->addr_fact->street)
            ->addElement('house', $report->base_part->addr_fact->house)
            ->addElement('domain', $report->base_part->addr_fact->domain)
            ->addElement('block', $report->base_part->addr_fact->block)
            ->addElement('build', $report->base_part->addr_fact->build)
            ->addElement('apartment', $report->base_part->addr_fact->apartment)
            ->closeElement();
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
        Report::$records_count++;
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
        $generator->startElement('cred_start_debt', [], 'Сведения о передаче финансирования субъекту или возникновения обеспечения исполнения обязательства')
            ->addElement('date', $report->base_part->contract->cred_start_debt->date)
            ->closeElement();
    }

    public static function debt(Report $report, XmlGenerator $generator): void
    {
        $debt = $report->base_part->contract->debt;
        $generator->startElement('debt', [], 'Сведения о задолженности');
        if ($debt->sum === 0) {
            $generator->addElement('sign', 0);
        } else {
            $generator->addElement('sign_calc_last_payout', $debt->sign_calc_last_payout);
            $generator->addElement('calc_date', $debt->calc_date);
            $generator->addElement('first_sum', $debt->first_sum);
            $generator->addElement('sum', $debt->sum);
            $generator->addElement('op_sum', $debt->op_sum);
            $generator->addElement('percent_sum', $debt->percent_sum);
            $generator->addElement('other_sum', $debt->other_sum);
            $generator->addElement('sign_unaccepted_grace_period', $debt->sign_unaccepted_grace_period);
        }
        $generator->closeElement();
    }

    public static function debt_current(Report $report, XmlGenerator $generator): void
    {
        $debt = $report->base_part->contract->debt_current;
        $generator->startElement('debt_current', [], 'Сведения о срочной задолженности')
            ->addElement('date', $report->base_part->contract->debt_current->date)
            ->addElement('sum', $debt->sum)
            ->addElement('op_sum', $debt->op_sum)
            ->addElement('percent_sum', $debt->percent_sum)
            ->addElement('other_sum', $debt->other_sum)
            ->closeElement();
    }

    public static function debt_overdue(Report $report, XmlGenerator $generator): void
    {
        $debt = $report->base_part->contract->debt_overdue;
        $generator->startElement('debt_current', [], 'Сведения о просроченной задолженности');
        if ($debt->sum > 0) {
            $generator->addElement('date', $report->base_part->contract->debt_current->date)
                ->addElement('sum', $debt->sum)
                ->addElement('op_sum', $debt->op_sum)
                ->addElement('percent_sum', $debt->percent_sum)
                ->addElement('other_sum', $debt->other_sum)
                ->addElement('op_miss_payout_date', $debt->op_miss_payout_date)
                ->addElement('percent_miss_payout_date', $debt->percent_miss_payout_date);
        } else {
            $generator->addElement('sum', $debt->sum);
        }
        $generator->closeElement();
    }

    public static function payments(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('payments', [], 'Сведения о внесении платежей')
            ->addElement('last_payout_date', $report->base_part->contract->payments->last_payout_date)
            ->addElement('last_payout_sum', $report->base_part->contract->payments->last_payout_sum)
            ->addElement('last_payout_op_sum', $report->base_part->contract->payments->last_payout_op_sum)
            ->addElement('last_payout_percent_sum', $report->base_part->contract->payments->last_payout_percent_sum)
            ->addElement('last_payout_other_sum', $report->base_part->contract->payments->last_payout_other_sum)
            ->addElement('paid_sum', $report->base_part->contract->payments->paid_sum)
            ->addElement('paid_op_sum', $report->base_part->contract->payments->paid_op_sum)
            ->addElement('paid_percent_sum', $report->base_part->contract->payments->paid_percent_sum)
            ->addElement('paid_other_sum', $report->base_part->contract->payments->paid_other_sum)
            ->addElement('size_payments_type', $report->base_part->contract->payments->size_payments_type)
            ->addElement('size_payments_type', $report->base_part->contract->payments->payments_deadline_type)
            ->addElement('size_payments_type', $report->base_part->contract->payments->overdue_day)
            ->closeElement();
    }

    public static function average_payment(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('average_payment', [], 'Величина среднемесячного платежа по договору займа (кредита) и дата ее расчета')
            ->addElement('sum', $report->base_part->contract->average_payment->sum)
            ->addElement('date', $report->base_part->contract->average_payment->date)
            ->closeElement();
    }

    public static function material_guarantee_source(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('material_guarantee_source', [], 'Сведения о неденежном обязательстве источника')
            ->addElement('material_item', $report->base_part->contract->material_guarantee_source->material_item)
            ->addElement('item_type', $report->base_part->contract->material_guarantee_source->item_type)
            ->addElement('material_object', $report->base_part->contract->material_guarantee_source->material_object)
            ->addElement('material_object_date', $report->base_part->contract->material_guarantee_source->material_object_date)
            ->closeElement();
    }

    public static function material_guarantee_subject(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('material_guarantee_subject', [], 'Сведения о неденежном обязательстве субъекта')
            ->addElement('material_item', $report->base_part->contract->material_guarantee_subject->material_item)
            ->addElement('material_object', $report->base_part->contract->material_guarantee_subject->material_object)
            ->addElement('procedure_guarantee', $report->base_part->contract->material_guarantee_subject->procedure_guarantee)
            ->addElement('procedure_guarantee_fail', $report->base_part->contract->material_guarantee_subject->procedure_guarantee_fail)
            ->closeElement();
    }

    public static function accounting(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('accounting', [], 'Сведения об учете обязательства')
            ->addElement('sign', $report->add_part->accounting->sign)
            ->closeElement();
    }

    public static function application(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('application', [], 'Сведения об обращении субъекта к источнику с предложением совершить сделку')
            ->addElement('ratio', (int) $report->information_part->application->ratio)
            ->addElement('sum', (int) $report->information_part->application->sum)
            ->addElement('currency', (int) $report->information_part->application->currency)
            ->addElement('uid', (int) $report->information_part->application->uid)
            ->addElement('date', (int) $report->information_part->application->date)
            ->addElement('source_type', (int) $report->information_part->application->source_type)
            ->addElement('way', (int) $report->information_part->application->way)
            ->addElement('approval_date', (int) $report->information_part->application->approval_date)
            ->closeElement();
    }

    public static function credit(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('credit', [], 'Сведения об участии в обязательстве, по которому формируется кредитная история')
            ->addElement('ratio', (int) $report->information_part->credit->ratio)
            ->addElement('type', (int) $report->information_part->credit->type)
            ->addElement('uid', (int) $report->information_part->credit->uid)
            ->addElement('date', (int) $report->information_part->credit->date)
            ->addElement('sign_90plus', (int) $report->information_part->credit->sign_90plus)
            ->addElement('sign_stop_load', (int) $report->information_part->credit->sign_stop_load)
            ->closeElement();
    }

    public static function failure(Report $report, XmlGenerator $generator):void
    {
        $generator->startElement('failure', [], '')
            ->addElement('date', (int) $report->information_part->failure->date)
            ->addElement('reason', (int) $report->information_part->failure->reason)
            ->closeElement();
    }

    public static function service_organization(Report $report, XmlGenerator $generator):void
    {
        $generator->startElement('service_organization', [], 'Сведения об обслуживающей организации')
            ->addElement('reg_rus', $report->add_part->service_organization->reg_rus)
            ->addElement('fullname', $report->add_part->service_organization->fullname)
            ->addElement('shortname', $report->add_part->service_organization->shortname)
            ->addElement('othername', $report->add_part->service_organization->othername)
            ->addElement('ogrn_no', $report->add_part->service_organization->ogrn_no)
            ->addElement('inn_code', $report->add_part->service_organization->inn_code)
            ->addElement('inn_no', $report->add_part->service_organization->inn_no)
            ->addElement('service_start_date', $report->add_part->service_organization->service_start_date)
            ->addElement('service_end_date', $report->add_part->service_organization->service_end_date)
            ->addElement('issuer_fullname', $report->add_part->service_organization->issuer_fullname)
            ->addElement('issuer_ogrn_no', $report->add_part->service_organization->issuer_ogrn_no)
            ->closeElement();
    }

}