<?php

declare(strict_types = 1);

namespace CloudCastle\EquifaxReport\Libs;

/**
 * Класс Contacts
 * @version 0.0.1
 * @package CloudCastle\EquifaxReport\Libs
 * @generated Зорин Алексей, please DO NOT EDIT!
 * @author Зорин Алексей <zorinalexey59292@gmail.com>
 * @copyright 2022 разработчик Зорин Алексей Евгеньевич.
 */
class Contacts
{

    private ?string $phone = null;
    private ?string $email = null;
    private ?string $comment = null;

    public function __construct(?string $phone = null, ?string $email = null, ?string $phoneComment = null)
    {
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->setComment($phoneComment);
    }

    /**
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @return string|null
     */
    public function getComment()
    {
        return $this->comment;
    }

    private function setPhone($phone): void
    {
        if ($phone) {
            $this->phone = preg_replace('~([^\d])~ui', '', $phone);
        }
    }

    private function setEmail($email): void
    {
        if (preg_match('~^([\w\.-]+)@([\w\.-]+)\.([\w\.-]+)~ui', $email)) {
            $this->email = $email;
        }
    }

    private function setComment($phoneComment): void
    {
        if ($phoneComment) {
            $this->comment = $phoneComment;
        }
    }

}
