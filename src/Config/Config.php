<?php

namespace CloudCastle\EquifaxReport\Config;

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

    private function __construct()
    {
        if (self::$configFile) {
            $config = json_decode(file_get_contents(self::$configFile), true);
            foreach ($config as $key => $value) {
                $this->$key = $value;
            }
            $this->file_reg_date = date('d.m.Y');
            $this->file_reg_num = $this->setNumberFile();
        }
    }

    private function setNumberFile()
    {
        if ($this->path) {
            $this->path .= DIRECTORY_SEPARATOR . date('d.m.Y');
        }
        if (!is_dir($this->path)) {
            mkdir($this->path, 0777, true);
        }
        $countStr = (string)count(scandir($this->path));
        $lenght = strlen($countStr);
        if ($lenght < 10) {
            $number = '000' . $countStr;
        } elseif ($lenght >= 10 && $lenght < 100) {
            $number = '00' . $countStr;
        } else {
            $number = '0' . $countStr;
        }
        $this->file_reg_num = strtoupper($this->partnerId . '_FCH' . date('Ymd') . '_' . $number . '.XML');
    }

    public static function instance(): static
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}