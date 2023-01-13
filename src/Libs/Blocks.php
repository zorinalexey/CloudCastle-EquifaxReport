<?php

namespace CloudCastle\EquifaxReport\Libs;

use CloudCastle\EquifaxReport\Report;
use CloudCastle\EquifaxReport\XmlGenerator;

class Blocks
{
    use Partitions;

    protected static array $itemParts = [];

    public static function partsGenerator(array $filds, Report $report, XmlGenerator $generator)
    {
        foreach ($filds as $rootPart => $itemPart) {
            if (is_array($itemPart)) {
                $generator->startElement($rootPart);
                self::$itemParts = $itemPart;
                self::$rootPart($report, $generator);
                $generator->closeElement();
            } else {
                self::$itemPart($report, $generator);
            }
        }
    }

}