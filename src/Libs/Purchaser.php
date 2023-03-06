<?php

namespace CloudCastle\EquifaxReport\Libs;
/**
 * Сведения о приобретателе прав
 */
final class Purchaser
{
    /**
     * Сведения о приобретателе прав - юридическом лице
     * @var Commercial|null
     */
    public ?Commercial $commercial = null;

    /**
     * Сведения о приобретателе прав - физическом лице
     * @var PrivatePurchaser|null
     */
    public ?PrivatePurchaser $private = null;

    public function __construct()
    {
        $this->commercial = new Commercial();
        $this->private = new PrivatePurchaser();
    }
}