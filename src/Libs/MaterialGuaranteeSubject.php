<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения о неденежном обязательстве субъекта
 */
final class MaterialGuaranteeSubject
{

    /**
     * Предмет обязательства
     * @var string|null
     */
    public ?string $material_item = null;
    /**
     * Объект предоставления
     * @var string|null
     */
    public ?string $material_object = null;
    /**
     * Порядок исполнения обязательства
     * @var string|null
     */
    public ?string $procedure_guarantee = null;
    /**
     * Признак ненадлежащего исполнения обязательства
     * @var float|null
     */
    public ?float $procedure_guarantee_fail = null;
}