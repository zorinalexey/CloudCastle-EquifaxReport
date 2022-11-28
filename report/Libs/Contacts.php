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
        $this->phone = $this->setPhone($phone);
        $this->email = $this->setEmail($email);
        $this->comment = $this->setComment($phoneComment);
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getComment(): string
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
        if (filter_var($email,  FILTER_VALIDATE_EMAIL)) {
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
