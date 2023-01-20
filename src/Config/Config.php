<?php

namespace CloudCastle\EquifaxReport\Config;

use RuntimeException;

class Config
{
    /**
     * Путь к JSON файлу конфигурации
     * @var string|null
     */
    public static ?string $configFile = null;
    /**
     * Текущий объект
     * @var Config|null
     */
    private static ?Config $instance = null;
    /**
     * ID партнера в системе Эквифакс
     * @var string|null
     */
    public ?string $partnerId = null;
    /**
     * Сокращенное ниаменование кредитной организации
     * @var string|null
     */
    public ?string $shortOrgName = null;
    /**
     * Полное наименование кредитной организации
     * @var string|null
     */
    public ?string $fullOrgName = null;
    /**
     * ОГРН кредитной организации
     * @var string|null
     */
    public ?string $ogrn = null;
    /**
     * ИНН кредитной организации
     * @var string|null
     */
    public ?string $inn = null;
    /**
     * Клиентский номер кредитной организации в систеле Эквифакс
     * @var string|null
     */
    public ?string $type = null;

    /**
     * Дата формирования кредитной информации
     * @var string|null
     */
    public ?string $date = null;

    /**
     * Исходящая регистрационная дата файла
     * @var string|null
     */
    public ?string $file_reg_date = null;

    /**
     * Исходящий регистрационный номер файла
     * @var string|null
     */
    public ?string $file_reg_num = null;

    /**
     * Директория формирования файлов
     * @var string|null
     */
    public ?string $path = null;
    /**
     * @var PrevFile
     */
    public ?PrevFile $prevFile = null;

    private function __construct()
    {


        if (self::$configFile) {
            $config = json_decode(file_get_contents(self::$configFile), true);
            foreach ($config as $key => $value) {
                $this->$key = $value;
            }
            $this->file_reg_date = date('d.m.Y');
        }
        if (!$this->path) {
            $this->path = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'report' . DIRECTORY_SEPARATOR . date('d.m.Y');
        } else {
            $this->path = dirname($this->path) . DIRECTORY_SEPARATOR . basename($this->path) . DIRECTORY_SEPARATOR . date('d.m.Y');
        }
        $this->prevFile = new PrevFile();
        $this->date = date('d.m.Y');
    }

    public static function instance(): self
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function numberFile()
    {
        $count = 1;
        if (!is_dir($this->path)) {
            if (!mkdir($concurrentDirectory = $this->path, 0777, true) && !is_dir($concurrentDirectory)) {
                throw new RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }
        }
        foreach (scandir($this->path) as $value) {
            if ($value !== '.' and $value !== '..') {
                $count++;
            }
        }
        if ($count < 10) {
            $number = '000' . $count;
        } elseif ($count >= 10 and $count < 100) {
            $number = '00' . $count;
        } elseif ($count >= 100 and $count < 1000) {
            $number = '0' . $count;
        } else {
            $number = $count;
        }
        $this->file_reg_num = $number;
        return $this->path . DIRECTORY_SEPARATOR . strtoupper($this->partnerId . '_FCH_' . date('Ymd') . '_' . $number . '.XML');
    }

}