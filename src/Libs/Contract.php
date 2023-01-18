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

    /**
     * @var string|null
     */
    public ?string $uid = null;
    /**
     * @var Deal|null
     */
    public ?Deal $deal = null;
    /**
     * @var ContractAmount|null
     */
    public ?ContractAmount $contract_amount = null;
    /**
     * @var CredStartDebt|null
     */
    public ?CredStartDebt $cred_start_debt = null;
    /**
     * @var JointDebtors|null
     */
    public ?JointDebtors $joint_debtors = null;
    /**
     * @var PaymentTerms|null
     */
    public ?PaymentTerms $payment_terms = null;
    /**
     * @var FullCost|null
     */
    public ?FullCost $full_cost = null;
    /**
     * @var ContractChanges|null
     */
    public ?ContractChanges $contract_changes = null;
    /**
     * @var Debt|null
     */
    public ?Debt $debt = null;
    /**
     * @var DebtCurrent|null
     */
    public ?DebtCurrent $debt_current = null;
    /**
     * @var DebtOverdue|null
     */
    public ?DebtOverdue $debt_overdue = null;
    /**
     * @var Payments|null
     */
    public ?Payments $payments = null;
    /**
     * @var AveragePayment|null
     */
    public ?AveragePayment $average_payment = null;
    /**
     * @var MaterialGuaranteeSource|null
     */
    public ?MaterialGuaranteeSource $material_guarantee_source = null;
    /**
     * @var MaterialGuaranteeSubject|null
     */
    public ?MaterialGuaranteeSubject $material_guarantee_subject = null;
    /**
     * Сведения о залоге
     * @var array
     */
    public array $collaterals = [];
    /**
     * Сведения о поручительстве
     * @var Guarantee|null
     */
    public array $guarantees = [];

    /**
     * Сведения о независимой гарантии
     * @var array
     */
    public array $indie_guarantees = [];

    /**
     *
     */
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
    }
}
