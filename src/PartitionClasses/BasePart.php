<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\PartitionClasses;

/**
 * Класс BasePart
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\PartitionClasses
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class BasePart
{

    use DataSetter;

    /**
     * Регистрация физического лица по месту жительства или пребывания
     * @var AddrReg|null
     */
    public ?AddrReg $addr_reg = null;

    /**
     * Фактическое место жительства
     * @var AddrFact|null
     */
    public ?AddrFact $addr_fact = null;

    /**
     * Контактные данные
     * @var Contacts|null
     */
    public ?Contacts $contacts = null;

    /**
     * Государственная регистрация в качестве индивидуального предпринимателя
     * @var Ogrnip|null
     */
    public ?Ogrnip $ogrnip = null;

    /**
     * Сведения о дееспособности
     * @var Incapacity|null
     */
    public ?Incapacity $incapacity = null;

    /**
     * Сведения об основных частях кредитных историй юридического лица, от которого субъекту перешли права и обязанности
     * @var DutyTransfer|null
     */
    public ?DutyTransfer $duty_transfer = null;

    /**
     * Сведения по делу о несостоятельности (банкротстве)
     * @var Bankruptcy|null
     */
    public ?Bankruptcy $bankruptcy = null;

    /**
     * Сведения о завершении расчетов с кредиторами и освобождении субъекта от исполнения обязательств в связи с банкротством
     * @var BankruptcyFinish|null
     */
    public ?BankruptcyFinish $bankruptcy_finish = null;

    /**
     * Сведения об обязательстве субъекта кредитной истории
     * @var Contract|null
     */
    public ?Contract $contract = null;

    public function __construct(array $basePart)
    {
        $this->addr_fact = new Address();
        $this->addr_reg = new Address();
        $this->bankruptcy = new Bankruptcy();
        $this->bankruptcy_finish = new BankruptcyFinish();
        $this->contacts = new Contacts();
        $this->contract = new Contract();
        $this->duty_transfer = new DutyTransfer();
        $this->incapacity = new Incapacity();
        $this->ogrnip = new Ogrnip();
        $this->__setData($basePart);
    }

}
