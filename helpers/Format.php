<?php

declare(strict_types = 1);

namespace CloudCastle\Helpers;

/**
 * Класс Format
 * @version 0.0.1
 * @package CloudCastle\Helpers
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class Format
{

    /**
     * Преобразовать дату к необходимому формату
     * @param string|null $date Дата которую необходимо преобразовать
     * @param string $format Формат к которому необходимо привести дату
     * @return string Строка даты приведенная к необходимому формату
     */
    public static function date(?string $date = null, string $format = 'd.m.Y'): string
    {
        if ( ! $date) {
            return date($format);
        }
        return date($format, strtotime($date));
    }

    /**
     * Приведение номера телефона к необходимому формату
     * Изначально метод удаляет из строки все символы кроме цыфр и разбивает ее на
     * 5 груп в $regexp группы можно использовать как переменные с номером группы.
     * В первую группу входит 1 цыфра, вторую и третью 3 цыфры и в последующие (3,4,5)
     * по 2 цыфры
     * @param string $number Номер телефона
     * @param string $regexp Формат к которому необходимо привести.
     * По умолчанию +7 (234) 567-89-01
     * @return string Номер телефона в виде строки приведенный к необходимому формату
     */
    public static function phone(string $number, string $regexp = '+7 ($2) $3-$4-$5'): string
    {
        $str = preg_replace('~([^\d]+)~ui', '', $number);
        return preg_replace('~(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})~ui', $regexp, $str);
    }

}
