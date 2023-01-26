<?php

namespace CloudCastle\EquifaxReport\Libs;

use CloudCastle\EquifaxReport\Report;
use CloudCastle\EquifaxReport\XmlGenerator;

class Blocks
{
    use Partitions;

    public static function information_part(Report $report, XmlGenerator $generator, array $itemParts){
        if(isset($report->information_part) AND $report->information_part) {
            $generator->startElement('information_part');
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

    public static function add_part(Report $report, XmlGenerator $generator, array $itemParts){
        if(isset($report->add_part) AND $report->add_part) {
            $generator->startElement('add_part');
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

    public static function base_part(Report $report, XmlGenerator $generator, array $itemParts)
    {
        if(isset($report->base_part) AND $report->base_part) {
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

}