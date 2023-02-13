<?php

namespace CloudCastle\EquifaxReport\Libs;

use CloudCastle\EquifaxReport\Report;
use CloudCastle\EquifaxReport\XmlGenerator;

/**
 *
 */
final class Blocks
{
    use Partitions;

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @param array $itemParts
     * @return void
     */
    public static function information_part(Report $report, XmlGenerator $generator, array $itemParts): void
    {
        if (isset($report->information_part) and $report->information_part) {
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

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @param array $itemParts
     * @return void
     */
    public static function add_part(Report $report, XmlGenerator $generator, array $itemParts): void
    {
        if (isset($report->add_part) and $report->add_part) {
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

    /**
     * @param Report $report
     * @param XmlGenerator $generator
     * @param array $itemParts
     * @return void
     */
    public static function base_part(Report $report, XmlGenerator $generator, array $itemParts): void
    {
        if (isset($report->base_part) and $report->base_part) {
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