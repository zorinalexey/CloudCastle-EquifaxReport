<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\Libs;

use CloudCastle\EquifaxReport\ReportSetters\Deal;
use CloudCastle\EquifaxReport\ReportSetters\ContractAmount;
use CloudCastle\EquifaxReport\ReportSetters\JointDebtors;
use CloudCastle\EquifaxReport\ReportSetters\CredStartDebt;
use CloudCastle\EquifaxReport\ReportSetters\PaymentTerms;
use CloudCastle\EquifaxReport\ReportSetters\FullCost;
use CloudCastle\EquifaxReport\ReportSetters\ContractChanges;
use CloudCastle\EquifaxReport\ReportSetters\Debt;
use CloudCastle\EquifaxReport\ReportSetters\DebtCurrent;
use CloudCastle\EquifaxReport\ReportSetters\DebtOverdue;
use CloudCastle\EquifaxReport\ReportSetters\Payments;
use CloudCastle\EquifaxReport\ReportSetters\AveragePayment;
use CloudCastle\EquifaxReport\ReportSetters\MaterialGuaranteeSource;
use CloudCastle\EquifaxReport\ReportSetters\MaterialGuaranteeSubject;
use CloudCastle\EquifaxReport\ReportSetters\Collaterals;
use CloudCastle\EquifaxReport\ReportSetters\Guarantees;

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
    public ?Deal $deal;
    public ?ContractAmount $contract_amount;
    public ?CredStartDebt $cred_start_debt;
    public ?JointDebtors $joint_debtors;
    public ?PaymentTerms $payment_terms;
    public ?FullCost $full_cost;
    public ?ContractChanges $contract_changes;
    public ?Debt $debt;
    public ?DebtCurrent $debt_current;
    public ?DebtOverdue $debt_overdue;
    public ?Payments $payments;
    public ?AveragePayment $average_payment;
    public ?MaterialGuaranteeSource $material_guarantee_source;
    public ?MaterialGuaranteeSubject $material_guarantee_subject;
    public ?Collaterals $collaterals;
    public ?Guarantees $guarantees;

    /**
     *
     * @param string $uid
     * @param array $contract
     */
    public function __construct(string $uid, array $contract)
    {
        $this->uid = $uid;
        $this->__setDefautValues();
        $this->__setContractInfo($contract);
    }

    private function __setContractInfo(array $contract): void
    {
        foreach ($contract as $key => $value) {
            $className = $this->__getObjName($key);
            if (class_exists($className)) {
                $this->$key = new $className($value);
            }
        }
    }

    private function __getObjName(string $key): string
    {
        $name = '\CloudCastle\EquifaxReport\ReportSetters\\';
        foreach (explode('_', $key) as $value) {
            $name .= ucfirst(strtolower($value));
        }
        return $name;
    }

    private function __setDefautValues()
    {
        $data = [
            'deal' => [],
            'contract_amount' => [],
            'cred_start_debt' => '',
            'joint_debtors' => 0,
            'payment_terms' => [],
            'full_cost' => [],
            'contract_changes' => [],
            'debt' => [],
            'debt_current' => [],
            'debt_overdue' => [],
            'payments' => [],
            'average_payment' => [],
            'average_payment' => [],
            'material_guarantee_source' => [],
            'material_guarantee_subject' => [],
            'collaterals' => [],
            'guarantees' => [],
        ];
        $this->__setContractInfo($data);
    }

}
