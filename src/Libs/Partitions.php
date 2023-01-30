<?php

namespace CloudCastle\EquifaxReport\Libs;

use CloudCastle\EquifaxReport\Config\Config;
use CloudCastle\EquifaxReport\Report;
use CloudCastle\EquifaxReport\XmlGenerator;
use Exception;

/**
 *
 */
trait Partitions
{
    /**
     * @param Config $config
     * @param XmlGenerator $generator
     * @return void
     */
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

    /**
     * @param XmlGenerator $generator
     * @return void
     */
    public static function footer(XmlGenerator $generator): void
    {
        $generator->startElement('footer')
            ->addElement('subjects_count', Report::$subjects_count)
            ->addElement('records_count', Report::$records_count)
            ->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function addr_reg(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('addr_reg', [], 'Регистрация физического лица по месту жительства или пребывания')
            ->addElement('reg_code', $report->base_part->addr_reg->reg_code)
            ->addElement('index', $report->base_part->addr_reg->index)
            ->addElement('country', $report->base_part->addr_reg->country)
            ->addElement('country_text', $report->base_part->addr_reg->country_text)
            ->addElement('fias', $report->base_part->addr_reg->fias)
            ->addElement('okato', $report->base_part->addr_reg->okato)
            ->addElement('street', $report->base_part->addr_reg->street)
            ->addElement('house', $report->base_part->addr_reg->house)
            ->addElement('domain', $report->base_part->addr_reg->domain)
            ->addElement('block', $report->base_part->addr_reg->block)
            ->addElement('build', $report->base_part->addr_reg->build)
            ->addElement('apartment', $report->base_part->addr_reg->apartment)
            ->addElement('reg_place', $report->base_part->addr_reg->reg_place)
            ->addElement('reg_department_code', $report->base_part->addr_reg->reg_department_code)
            ->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
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

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function contacts(Report $report, XmlGenerator $generator): void
    {
        $contacts = $report->base_part->contacts;
        if ($contacts) {
            $generator->startElement('contacts', [], 'Контактные данные');
            foreach ($contacts as $contact) {
                if (isset($contact['phone'])) {
                    $generator->startElement('phone')
                        ->addElement('number', preg_replace('~([^0-9\(\)+])~ui', '', $contact['phone']));
                    if (isset($contact['comment'])) {
                        $generator->addElement('comment', $contact['comment']);
                    }
                    $generator->closeElement();
                }
            }
            foreach ($contacts as $contact) {
                if (isset($contact['email'])) {
                    $generator->addElement('email', $contact['email']);
                }
            }
            $generator->closeElement();
        }
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function ogrnip(Report $report, XmlGenerator $generator): void
    {
        $lenght = strlen((string)$report->client->inn->ogrnIp);
        $generator->startElement('ogrnip', [], 'Государственная регистрация в качестве индивидуального предпринимателя');
        if ($report->client->inn->ogrnIp && $lenght === 15) {
            $generator->addElement('no', $report->client->inn->ogrnIp)
                ->addElement('date', $report->client->inn->ogrnIpDate);
        } else {
            $generator->addElement('sign', 0);
        }
        $generator->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function incapacity(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('incapacity', [], 'Сведения о дееспособности')
            ->addElement('code', $report->base_part->incapacity->code)
            ->addElement('court_decision_date', $report->base_part->incapacity->court_decision_date)
            ->addElement('court_decision_no', $report->base_part->incapacity->court_decision_no)
            ->addElement('court_name', $report->base_part->incapacity->court_name)
            ->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function contract(Report $report, XmlGenerator $generator, array $parts): void
    {
        Report::$records_count++;
        $generator->startElement('contract');
        foreach ($parts as $partName => $partValue) {
            if (is_string($partValue)) {
                self::$partValue($report, $generator);
            } else {
                self::$partName($report, $generator);
            }

        }
        $generator->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function uid(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('uid')
            ->addElement('id', $report->base_part->contract->uid)
            ->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function deal(Report $report, XmlGenerator $generator): void
    {
        if (isset($report->information_part->credit->type) and $report->information_part->credit->type) {
            $report->base_part->contract->deal->type = $report->information_part->credit->type;
        }
        $generator->startElement('deal', [], 'Общие сведения о сделке')
            ->addElement('ratio', $report->base_part->contract->deal->ratio);
        if ($report->base_part->contract->deal->date) {
            $generator->addElement('date', date('d.m.Y', strtotime($report->base_part->contract->deal->date)));
        } else {
            $generator->addElement('date', date('d.m.Y', time()));
        }
        $generator->addElement('category', $report->base_part->contract->deal->category)
            ->addElement('type', $report->base_part->contract->deal->type)
            ->addElement('purpose', $report->base_part->contract->deal->purpose)
            ->addElement('sign_credit', $report->base_part->contract->deal->sign_credit)
            ->addElement('sign_credit_card', $report->base_part->contract->deal->sign_credit_card)
            ->addElement('sign_renovation', $report->base_part->contract->deal->sign_renovation)
            ->addElement('sign_deal_cash_source', $report->base_part->contract->deal->sign_deal_cash_source)
            ->addElement('sign_deal_cash_subject', $report->base_part->contract->deal->sign_deal_cash_subject);
        if ($report->base_part->contract->deal->end_date) {
            $generator->addElement('end_date', date('d.m.Y', strtotime($report->base_part->contract->deal->end_date)));
        }
        $generator->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function contract_amount(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('contract_amount', [], 'Сумма и валюта обязательства')
            ->addElement('sum', $report->base_part->contract->contract_amount->sum)
            ->addElement('currency', $report->base_part->contract->contract_amount->currency)
            ->addElement('security_sum', $report->base_part->contract->contract_amount->security_sum)
            ->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function joint_debtors(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('joint_debtors', [], 'Сведения о наличии солидарных должников');
        if ($report->base_part->contract->joint_debtors->count > 0) {
            $generator->addElement('count', $report->base_part->contract->joint_debtors->count);
        } else {
            $generator->addElement('sign', 0);
        }
        $generator->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function payment_terms(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('payment_terms', [], 'Сведения об условиях платежей')
            ->addElement('op_next_payout_sum', $report->base_part->contract->payment_terms->op_next_payout_sum);
        if ($report->base_part->contract->payment_terms->op_next_payout_sum > 0 and $report->base_part->contract->payment_terms->percent_next_payout_sum > 0) {
            $generator->addElement('op_next_payout_date', $report->base_part->contract->payment_terms->op_next_payout_date);
        }
        $generator->addElement('percent_next_payout_sum', $report->base_part->contract->payment_terms->percent_next_payout_sum);
        if ($report->base_part->contract->payment_terms->op_next_payout_sum > 0 and $report->base_part->contract->payment_terms->percent_next_payout_sum > 0) {
            $generator->addElement('percent_next_payout_date', $report->base_part->contract->payment_terms->percent_next_payout_date)
                ->addElement('regularity', $report->base_part->contract->payment_terms->regularity)
                ->addElement('min_sum_pay_cc', $report->base_part->contract->payment_terms->min_sum_pay_cc)
                ->addElement('grace_date', $report->base_part->contract->payment_terms->grace_date);
            if ($report->base_part->contract->payment_terms->grace_date) {
                $generator->addElement('grace_end_date', $report->base_part->contract->payment_terms->grace_end_date);
            }
            $generator->addElement('percent_end_date', $report->base_part->contract->payment_terms->percent_end_date);

        }
        $generator->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function full_cost(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('full_cost', [], 'Полная стоимость потребительского кредита (займа)')
            ->addElement('percent', $report->base_part->contract->full_cost->percent)
            ->addElement('sum', $report->base_part->contract->full_cost->sum);
        if ($report->base_part->contract->deal->end_date) {
            $generator->addElement('date', date('d.m.Y', strtotime($report->base_part->contract->full_cost->date)));
        }
        $generator->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function cred_start_debt(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('cred_start_debt', [], 'Сведения о передаче финансирования субъекту или возникновения обеспечения исполнения обязательства')
            ->addElement('date', $report->base_part->contract->cred_start_debt->date)
            ->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function debt(Report $report, XmlGenerator $generator): void
    {
        $report->base_part->contract->debt->sum = (
            $report->base_part->contract->debt->op_sum +
            $report->base_part->contract->debt->other_sum +
            $report->base_part->contract->debt->percent_sum
        );
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

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function debt_current(Report $report, XmlGenerator $generator): void
    {
        $report->base_part->contract->debt_current->sum = (
            $report->base_part->contract->debt_current->percent_sum +
            $report->base_part->contract->debt_current->other_sum +
            $report->base_part->contract->debt_current->op_sum
        );
        $debt = $report->base_part->contract->debt_current;
        $generator->startElement('debt_current', [], 'Сведения о срочной задолженности');
        if ($debt->sum > 0) {
            $generator->addElement('date', $report->base_part->contract->debt_current->date)
                ->addElement('sum', $debt->sum)
                ->addElement('op_sum', $debt->op_sum)
                ->addElement('percent_sum', $debt->percent_sum)
                ->addElement('other_sum', $debt->other_sum);
        } else {
            $generator->addElement('sum', $debt->sum);
        }
        $generator->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function debt_overdue(Report $report, XmlGenerator $generator): void
    {
        $report->base_part->contract->debt_overdue->sum = (
            $report->base_part->contract->debt_overdue->percent_sum +
            $report->base_part->contract->debt_overdue->other_sum +
            $report->base_part->contract->debt_overdue->op_sum
        );
        $debt = $report->base_part->contract->debt_overdue;
        $generator->startElement('debt_overdue', [], 'Сведения о просроченной задолженности');
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

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function payments(Report $report, XmlGenerator $generator): void
    {
        $report->base_part->contract->payments->paid_sum = (
            $report->base_part->contract->payments->paid_percent_sum +
            $report->base_part->contract->payments->paid_other_sum +
            $report->base_part->contract->payments->paid_op_sum
        );
        $report->base_part->contract->payments->last_payout_sum = (
            $report->base_part->contract->payments->last_payout_other_sum +
            $report->base_part->contract->payments->last_payout_percent_sum +
            $report->base_part->contract->payments->last_payout_op_sum
        );
        $generator->startElement('payments', [], 'Сведения о внесении платежей');
        if ($report->base_part->contract->payments->last_payout_sum > 0) {
            $generator->addElement('last_payout_date', $report->base_part->contract->payments->last_payout_date);
        }
        $generator->addElement('last_payout_sum', $report->base_part->contract->payments->last_payout_sum);
        if ($report->base_part->contract->payments->last_payout_sum > 0) {
            $generator->addElement('last_payout_op_sum', $report->base_part->contract->payments->last_payout_op_sum)
                ->addElement('last_payout_percent_sum', $report->base_part->contract->payments->last_payout_percent_sum)
                ->addElement('last_payout_other_sum', $report->base_part->contract->payments->last_payout_other_sum);
        }

        $generator->addElement('paid_sum', $report->base_part->contract->payments->paid_sum)
            ->addElement('paid_op_sum', $report->base_part->contract->payments->paid_op_sum)
            ->addElement('paid_percent_sum', $report->base_part->contract->payments->paid_percent_sum)
            ->addElement('paid_other_sum', $report->base_part->contract->payments->paid_other_sum)
            ->addElement('size_payments_type', $report->base_part->contract->payments->size_payments_type)
            ->addElement('payments_deadline_type', $report->base_part->contract->payments->payments_deadline_type)
            ->addElement('overdue_day', $report->base_part->contract->payments->overdue_day)
            ->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function average_payment(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('average_payment', [], 'Величина среднемесячного платежа по договору займа (кредита) и дата ее расчета')
            ->addElement('sum', $report->base_part->contract->average_payment->sum)
            ->addElement('date', $report->base_part->contract->average_payment->date)
            ->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function material_guarantee_source(Report $report, XmlGenerator $generator): void
    {
        if ($report->base_part->contract->deal->sign_deal_cash_source !== 1) {
            $generator->startElement('material_guarantee_source', [], 'Сведения о неденежном обязательстве источника')
                ->addElement('material_item', $report->base_part->contract->material_guarantee_source->material_item)
                ->addElement('item_type', $report->base_part->contract->material_guarantee_source->item_type)
                ->addElement('material_object', $report->base_part->contract->material_guarantee_source->material_object)
                ->addElement('material_object_date', $report->base_part->contract->material_guarantee_source->material_object_date)
                ->closeElement();
        }
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function material_guarantee_subject(Report $report, XmlGenerator $generator): void
    {
        if ($report->base_part->contract->deal->sign_deal_cash_subject !== 1) {
            $generator->startElement('material_guarantee_subject', [], 'Сведения о неденежном обязательстве субъекта')
                ->addElement('material_item', $report->base_part->contract->material_guarantee_subject->material_item)
                ->addElement('material_object', $report->base_part->contract->material_guarantee_subject->material_object)
                ->addElement('procedure_guarantee', $report->base_part->contract->material_guarantee_subject->procedure_guarantee)
                ->addElement('procedure_guarantee_fail', $report->base_part->contract->material_guarantee_subject->procedure_guarantee_fail)
                ->closeElement();
        }
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function accounting(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('accounting', [], 'Сведения об учете обязательства')
            ->addElement('sign', $report->add_part->accounting->sign)
            ->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function application(Report $report, XmlGenerator $generator): void
    {
        if (isset($report->information_part->application)) {
            $report::$records_count++;
            $generator->startElement('application', [], 'Сведения об обращении субъекта к источнику с предложением совершить сделку')
                ->addElement('ratio', $report->information_part->application->ratio)
                ->addElement('sum', $report->information_part->application->sum)
                ->addElement('currency', $report->information_part->application->currency)
                ->addElement('uid', $report->information_part->application->uid)
                ->addElement('date', $report->information_part->application->date)
                ->addElement('source_type', $report->information_part->application->source_type)
                ->addElement('way', $report->information_part->application->way)
                ->addElement('approval_date', $report->information_part->application->approval_date)
                ->closeElement();
        }
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function credit(Report $report, XmlGenerator $generator): void
    {
        $report->base_part->contract->deal->type = $report->information_part->credit->type;
        $generator->startElement('credit', [], 'Сведения об участии в обязательстве, по которому формируется кредитная история')
            ->addElement('ratio', $report->information_part->credit->ratio)
            ->addElement('type', $report->information_part->credit->type)
            ->addElement('uid', $report->information_part->credit->uid)
            ->addElement('date', $report->information_part->credit->date)
            ->addElement('sign_90plus', $report->information_part->credit->sign_90plus)
            ->addElement('sign_stop_load', $report->information_part->credit->sign_stop_load)
            ->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function failure(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('failure', [], '')
            ->addElement('date', $report->information_part->failure->date)
            ->addElement('reason', $report->information_part->failure->reason)
            ->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     */
    public static function service_organization(Report $report, XmlGenerator $generator): void
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

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     * @throws Exception
     */
    public static function collaterals(Report $report, XmlGenerator $generator): void
    {
        $sign = true;
        $collaterals = $report->base_part->contract->collaterals;
        $generator->startElement('collaterals', [], 'Сведения о залоге');
        if ($collaterals) {
            foreach ($collaterals as $collateral) {
                if ($collateral instanceof Collateral and $collateral->sum > 0) {
                    $sign = false;
                    $generator->startElement('collateral');
                    $generator->addElement('item_type', $collateral->item_type);
                    $generator->addElement('id', $collateral->id);
                    if ($collateral->date) {
                        $generator->addElement('date', date('d.m.Y', strtotime($collateral->date)));
                    }
                    $generator->addElement('sum', $collateral->sum);
                    $generator->addElement('currency', $collateral->currency);
                    $generator->addElement('date_assessment', $collateral->date_assessment);
                    $generator->addElement('item_burden', $collateral->item_burden);
                    if ($collateral->end_date) {
                        $generator->addElement('end_date', date('d.m.Y', strtotime($collateral->end_date)));
                    }
                    if ($collateral->fact_end_date) {
                        $generator->addElement('fact_end_date', date('d.m.Y', strtotime($collateral->fact_end_date)));
                    }
                    $generator->addElement('end_reason', $collateral->end_reason);
                    $generator->closeElement();
                } else {
                    throw new Exception('Unsupported Collateral type');
                }
            }
        }
        if ($sign) {
            $generator->addElement('sign', 0);
        }
        $generator->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     * @throws Exception
     */
    public static function guarantees(Report $report, XmlGenerator $generator): void
    {
        $sign = true;
        $guarantees = $report->base_part->contract->guarantees;
        $generator->startElement('guarantees', [], 'Сведения о поручительстве');
        if ($guarantees) {
            foreach ($guarantees as $guarantee) {
                if ($guarantee instanceof Guarantee and $guarantee->sum > 0) {
                    $sign = false;
                    $generator->startElement('guarantee');
                    $generator->addElement('uid', $guarantee->uid)
                        ->addElement('sum', $guarantee->sum)
                        ->addElement('currency', $guarantee->currency)
                        ->addElement('date', date('d.m.Y', strtotime($guarantee->date)))
                        ->addElement('end_date', date('d.m.Y', strtotime($guarantee->end_date)))
                        ->addElement('fact_end_date', date('d.m.Y', strtotime($guarantee->fact_end_date)))
                        ->addElement('end_reason', $guarantee->end_reason);
                    $generator->closeElement();
                } else {
                    throw new Exception('Unsupported Guarantee type');
                }
            }
        }
        if ($sign) {
            $generator->addElement('sign', 0);
        }
        $generator->closeElement();
    }

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @return void
     * @throws Exception
     */
    public static function indie_guarantees(Report $report, XmlGenerator $generator): void
    {
        $sign = true;
        $guarantees = $report->base_part->contract->indie_guarantees;
        $generator->startElement('indie_guarantees', [], 'Сведения о независимой гарантии');
        if ($guarantees) {
            foreach ($guarantees as $guarantee) {
                if ($guarantee instanceof IndieGuarantee and $guarantee->sum > 0) {
                    $sign = false;
                    $generator->startElement('indie_guarantee');
                    $generator->addElement('uid', $guarantee->uid)
                        ->addElement('sum', $guarantee->sum)
                        ->addElement('currency', $guarantee->currency)
                        ->addElement('date', date('d.m.Y', strtotime($guarantee->date)))
                        ->addElement('end_date', date('d.m.Y', strtotime($guarantee->end_date)))
                        ->addElement('fact_end_date', date('d.m.Y', strtotime($guarantee->fact_end_date)))
                        ->addElement('end_reason', $guarantee->end_reason);
                    $generator->closeElement();
                } else {
                    throw new Exception('Unsupported IndieGuarantee type');
                }
            }
        }
        if ($sign) {
            $generator->addElement('sign', 0);
        }
        $generator->closeElement();
    }

    public static function contract_end(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('contract_end', [], 'Код основания прекращения обязательства')
            ->addElement('reason', $report->base_part->contract->contract_end->reason)
            ->addElement('date', date('d.m.Y', strtotime($report->base_part->contract->contract_end->date)))
            ->closeElement();

    }

    public static function guarantee_return(Report $report, XmlGenerator $generator): void
    {
        $guarantee = $report->base_part->contract->guarantee_return;
        $generator->startElement('guarantee_return', [], 'Сведения о возмещении принципалом гаранту выплаченной суммы');
        if ($guarantee->returning_sum > 0) {
            $generator->addElement('returning_sum', $guarantee->returning_sum)
                ->addElement('principal_sum', $guarantee->principal_sum)
                ->addElement('return_correct', $guarantee->return_correct);
        } else {
            $generator->addElement('sign', 0);
        }
        $generator->closeElement();
    }

    public static function repayment_collateral(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('repayment_collateral', [], '');
        if ($report->base_part->contract->repayment_collateral->sum > 0) {
            $generator->addElement('code', $report->base_part->contract->repayment_collateral->code)
                ->addElement('date', date('d.m.Y', strtotime($report->base_part->contract->repayment_collateral->date)))
                ->addElement('sum', $report->base_part->contract->repayment_collateral->sum);
        } else {
            $generator->addElement('sign', 0);
        }
        $generator->closeElement();
    }


    public static function collateral_insce(Report $report, XmlGenerator $generator): void
    {
        $generator->startElement('collateral_insce', [], '');
        $collateral_insce = $report->base_part->contract->collateral_insce;
        if ($collateral_insce->limit > 0) {
            $generator->addElement('limit', $collateral_insce->limit)
                ->addElement('currency', $collateral_insce->currency)
                ->addElement('franchise', $collateral_insce->franchise)
                ->addElement('date', $collateral_insce->date)
                ->addElement('end_date', $collateral_insce->end_date)
                ->addElement('fact_end_date', $collateral_insce->fact_end_date)
                ->addElement('end_reason', $collateral_insce->end_reason);
        } else {
            $generator->addElement('sign', 0);
        }
        $generator->closeElement();
    }
}