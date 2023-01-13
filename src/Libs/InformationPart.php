<?php

namespace CloudCastle\EquifaxReport\Libs;

class InformationPart
{
    public ?Application $application = null;
    public ?Credit $credit = null;
    public ?Failure $failure = null;
    public function __construct()
    {
        $this->application = new Application();
        $this->credit = new Credit();
        $this->failure = new Failure();
    }
}