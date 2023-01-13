<?php

namespace CloudCastle\EquifaxReport\Config;

class PrevFile
{
    /**
     * Исходящая регистрационная дата полностью отбракованного файла (вместо которого выгружается данный файл)
     * @var string|null
     */
    public ?string $file_reg_date = null;

    /**
     * Исходящий регистрационный номер ранее отбракованного файла (вместо которого выгружается данный файл)
     * @var string|null
     */
    public ?string $file_reg_num = null;

}