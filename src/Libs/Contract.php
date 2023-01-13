<?php

declare(strict_types=1);

namespace CloudCastle\EquifaxReport\Libs;


/**
 * Класс Contract
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\Libs
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class Contract
{

    public ?string $uid = null;
    public ?Deal $deal = null;
    public ?ContractAmount $contract_amount = null;
    public ?CredStartDebt $cred_start_debt = null;
    public ?JointDebtors $joint_debtors = null;
    public ?PaymentTerms $payment_terms = null;
    public ?FullCost $full_cost = null;
    public ?ContractChanges $contract_changes = null;
    public ?Debt $debt = null;
    public ?DebtCurrent $debt_current = null;
    public ?DebtOverdue $debt_overdue = null;
    public ?Payments $payments = null;
    public ?AveragePayment $average_payment = null;
    public ?MaterialGuaranteeSource $material_guarantee_source = null;
    public ?MaterialGuaranteeSubject $material_guarantee_subject = null;
    public ?Collaterals $collaterals = null;
    public ?Guarantees $guarantees = null;

    public function __construct()
    {
        $this->deal = new Deal();
        $this->contract_amount = new ContractAmount();
        $this->cred_start_debt = new CredStartDebt();
        $this->joint_debtors = new JointDebtors();
        $this->payment_terms = new PaymentTerms();
        $this->full_cost = new FullCost();
        $this->contract_changes = new ContractChanges();
        $this->debt = new Debt();
        $this->debt_current = new DebtCurrent();
        $this->debt_overdue = new DebtOverdue();
        $this->payments = new Payments();
        $this->average_payment = new AveragePayment();
        $this->material_guarantee_source = new MaterialGuaranteeSource();
        $this->material_guarantee_subject = new MaterialGuaranteeSubject();
        $this->collaterals = new Collaterals();
        $this->guarantees = new Guarantees();
    }
}
