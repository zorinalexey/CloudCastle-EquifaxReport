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
final class Contract
{

    /**
     * Уникальный идентификатор договора (сделки)
     * @var string|null
     */
    public ?string $uid = null;

    /**
     * Общие сведения о сделке
     * @var Deal|null
     */
    public ?Deal $deal = null;

    /**
     * Сумма и валюта обязательства
     * @var ContractAmount|null
     */
    public ?ContractAmount $contract_amount = null;

    /**
     * Сведения о передаче финансирования субъекту или возникновения обеспечения исполнения обязательства
     * @var CredStartDebt|null
     */
    public ?CredStartDebt $cred_start_debt = null;

    /**
     * Сведения о наличии солидарных должников
     * @var JointDebtors|null
     */
    public ?JointDebtors $joint_debtors = null;

    /**
     * Сведения об условиях платежей
     * @var PaymentTerms|null
     */
    public ?PaymentTerms $payment_terms = null;

    /**
     * Полная стоимость потребительского кредита (займа)
     * @var FullCost|null
     */
    public ?FullCost $full_cost = null;

    /**
     * Сведения об изменении договора
     * @var ContractChanges|null
     */
    public ?ContractChanges $contract_changes = null;

    /**
     * Сведения о задолженности
     * @var Debt|null
     */
    public ?Debt $debt = null;

    /**
     * Сведения о срочной задолженности
     * @var DebtCurrent|null
     */
    public ?DebtCurrent $debt_current = null;

    /**
     * Сведения о просроченной задолженности
     * @var DebtOverdue|null
     */
    public ?DebtOverdue $debt_overdue = null;

    /**
     * Сведения о внесении платежей
     * @var Payments|null
     */
    public ?Payments $payments = null;

    /**
     * Величина среднемесячного платежа по договору займа (кредита) и дата ее расчета
     * @var AveragePayment|null
     */
    public ?AveragePayment $average_payment = null;

    /**
     * Сведения о неденежном обязательстве источника
     * @var MaterialGuaranteeSource|null
     */
    public ?MaterialGuaranteeSource $material_guarantee_source = null;

    /**
     * Сведения о неденежном обязательстве субъекта
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
     */
    public array $guarantees = [];

    /**
     * Сведения о независимой гарантии
     * @var array
     */
    public array $indie_guarantees = [];

    /**
     * Прекращение обязательства
     * @var ContractEnd|null
     */
    public ?ContractEnd $contract_end = null;

    /**
     * Сведения о возмещении принципалом гаранту выплаченной суммы
     * @var GuaranteeReturn|null
     */
    public ?GuaranteeReturn $guarantee_return = null;

    /**
     * Сведения о погашении требований кредитора по обязательству за счет обеспечения
     * @var RepaymentCollateral|null
     */
    public ?RepaymentCollateral $repayment_collateral = null;

    /**
     * Сведения о страховании предмета залога
     * @var CollateralInsce|null
     */
    public ?CollateralInsce $collateral_insce = null;

    /**
     * Сведения о взыскании долга по алиментам, платы за жилое помещение,
     * коммунальные услуги или услуги связи
     * @var Collection|null
     */
    public ?Collection $collection = null;

    /**
     * Сведения о прекращении передачи информации по обязательству
     * @var StopLoad|null
     */
    public ?StopLoad $stop_load = null;

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
        $this->contract_end = new ContractEnd();
        $this->guarantee_return = new GuaranteeReturn();
        $this->repayment_collateral = new RepaymentCollateral();
        $this->collateral_insce = new CollateralInsce();
        $this->collection = new Collection();
        $this->stop_load = new StopLoad();
    }
}
