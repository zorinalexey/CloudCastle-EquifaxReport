<?php

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Сведения о неденежном обязательстве источника
 */
final class MaterialGuaranteeSource
{
    /**
     * Предмет обязательства
     * @var string|null
     */
    public ?string $material_item = null;
    /**
     * Код предоставляемого имущества
     * @var float|null
     */
    public ?float $item_type = null;
    /**
     * Объект предоставления
     * @var string|null
     */
    public ?string $material_object = null;
    /**
     * Дата передачи имущества субъекту
     * @var string|null
     */
    public ?string $material_object_date = null;
}