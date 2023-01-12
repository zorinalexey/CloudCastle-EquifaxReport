<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\PartitionClasses;

/**
 * Класс TitlePart
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\PartitionClasses
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
final class TitlePart
{

    /**
     * Код субъекта кредитной истории
     * @var Kski|null
     */
    public ?Kski $kski = null;

    /**
     * Титульная часть СКИ
     * @var ClientInterface|null
     */
    public ?ClientInterface $client = null;

    public function __construct(array $titlePart)
    {

    }

}
