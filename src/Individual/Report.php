<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\Individual;

use CloudCastle\EquifaxReport\Libs\Address;
use CloudCastle\EquifaxReport\Libs\Incapacity;
use CloudCastle\EquifaxReport\Libs\Contract;
use CloudCastle\EquifaxReport\Libs\Contacts;

/**
 * Класс Report
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\Individual
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class Report
{

    /**
     * Сведения о дееспособности
     * @var Incapacity|null
     */
    private ?Incapacity $incapacity;

    /**
     * Сведения об обязательстве субъекта кредитной истории
     * @var Contract|null
     */
    private ?Contract $contract;

    /**
     * Контактные данные
     * @var Contacts|null
     */
    private ?Contacts $contacts;

    /**
     * Регистрация физического лица по месту жительства или пребывания
     * @var Address|null
     */
    private $addr_reg;

    /**
     * Фактическое место жительства
     * @var Address|null
     */
    private $addr_fact;

    /**
     * Установить данные об адресе регистрации
     * @param array $addres Индексированый массив.
     * Ключ index Почтовый индекс
     * Ключ country Страна проживания
     * Ключ fias Номер адреса в ФИАС
     * Ключ okato Код населенного пункта по ОКАТО
     * Ключ other_statement Иной населенный пункт
     * Ключ street Улица
     * Ключ house Дом
     * Ключ domain Владение
     * Ключ block Корпус
     * Ключ build Строение
     * Ключ apartment Квартира
     * Ключ reg_date Дата регистрации
     * Ключ reg_place Наименование регистрирующего органа
     * Ключ reg_department_code Код подразделения, осуществившего регистрацию
     * @return self
     */
    public function setAddrReg(array $addres): self
    {
        $this->addr_reg = new Address($addres);
        return $this;
    }

    /**
     * Получить адрес регистрации
     * @return  Address|null
     */
    public function getAddrReg()
    {
        return $this->addr_reg;
    }

    /**
     * Установить данные об адресе проживания (фактический)
     * @param array $addres Индексированый массив.
     * Ключ index Почтовый индекс
     * Ключ country Страна проживания
     * Ключ fias Номер адреса в ФИАС
     * Ключ okato Код населенного пункта по ОКАТО
     * Ключ other_statement Иной населенный пункт
     * Ключ street Улица
     * Ключ house Дом
     * Ключ domain Владение
     * Ключ block Корпус
     * Ключ build Строение
     * Ключ apartment Квартира
     * Ключ reg_date Дата регистрации
     * Ключ reg_place Наименование регистрирующего органа
     * Ключ reg_department_code Код подразделения, осуществившего регистрацию
     * @return self
     */
    public function setAddrFact(array $addres): self
    {
        $this->addr_fact = new Address($addres);
        return $this;
    }

    /**
     * Получить адрес проживания (фактический)
     * @return Address|null
     */
    public function getAddrFact()
    {
        return $this->addr_fact;
    }

    /**
     * Установить контактные данные
     * @param string|null $phone Номер телефона
     * @param string|null $email Адрес электронной почты
     * @param string|null $phoneComment Коментарий к номеру телефона
     * @return self
     */
    public function setContacts(?string $phone = null, ?string $email = null, ?string $phoneComment = null): self
    {
        $this->contacts = new Contacts($phone, $email, $phoneComment);
        return $this;
    }

    /**
     * Получить контактные данные
     * @return array
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Установка сведений о дееспособности
     * @param array $incapacity
     * @return self
     */
    public function setIncapacity(array $incapacity): self
    {
        $this->incapacity = new Incapacity($incapacity);
        return $this;
    }

    /**
     * Сведения о дееспособности
     * @return Incapacity
     */
    public function getIncapacity()
    {
        return $this->incapacity;
    }

    /**
     * Установка данных о сделке
     * @param string $uid
     * @param array $contract
     * @return self
     */
    public function setContract(string $uid, array $contract): self
    {
        $this->contract = new Contract($uid, $contract);
        return $this;
    }

    /**
     * Получить данные о сделке
     * @return Contract
     */
    public function getContract()
    {
        return $this->contract;
    }

}
