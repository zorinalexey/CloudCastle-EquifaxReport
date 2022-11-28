<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport;

/**
 * Класс Client
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
interface ClientInterface
{

    public function setName(string $last, string $first, ?string $middle = null): self;

    public function getName(): array;

    public function setDocument(array $document): self;

    public function getDocument(): array;
}
