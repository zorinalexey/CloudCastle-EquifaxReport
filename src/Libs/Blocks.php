<?php

namespace CloudCastle\EquifaxReport\Libs;

use CloudCastle\EquifaxReport\Report;
use CloudCastle\EquifaxReport\XmlGenerator;

class Blocks
{
    use Partitions;

    public static function partsGenerator(array $fields, Report $report, XmlGenerator $generator)
    {
        foreach ($fields as $rootPart => $itemPart) {
            if (is_array($itemPart)) {
                self::$rootPart($report, $generator, $itemPart);
            } else {
                self::$itemPart($report, $generator);
            }
        }
    }

    private static function base_part(Report $report, XmlGenerator $generator, array $itemParts)
    {

        $generator->startElement('base_part');
        foreach ($itemParts as $partName => $itemPart) {
            if (is_array($itemPart)) {
                self::$partName($report, $generator, $itemPart);
            } else {
                self::$itemPart($report, $generator);
            }
        }
        $generator->closeElement();
    }

}