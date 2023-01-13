<?php

namespace CloudCastle\EquifaxReport\Report;

class EventsList
{
    public function __construct(string $event)
    {
        $this->event = $event;
        $this->search();
    }

}