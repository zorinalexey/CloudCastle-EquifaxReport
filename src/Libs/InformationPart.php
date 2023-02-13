<?php

namespace CloudCastle\EquifaxReport\Libs;


/**
 * Информационная часть кредитной истории
 */
final class InformationPart
{
    /**
     * Сведения об обращении субъекта к источнику с предложением совершить сделку
     * @var Application|null
     */
    public ?Application $application = null;

    /**
     * Сведения об участии в обязательстве, по которому формируется кредитная история
     * @var Credit|null
     */
    public ?Credit $credit = null;

    /**
     * Сведения об отказе источника от предложения совершить сделку
     * @var Failure|null
     */
    public ?Failure $failure = null;

    public function __construct()
    {
        $this->application = new Application();
        $this->credit = new Credit();
        $this->failure = new Failure();
    }
}