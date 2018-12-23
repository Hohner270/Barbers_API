<?php

namespace App\Domains\Models\Hashes;

class Hash
{
    /**
     * JWTとは別のアプリケーションで使用するトークンの規格
     * @var string トークン
     */
    private $hash;

    /**
     * @param string トークンにする値
     */
    public function __construct(string $plainString)
    {
        $this->hash = password_hash($plainString, PASSWORD_BCRYPT);
    }

    /**
     * @return string トークン
     */
    public function value(): string
    {
        return $this->hash;
    }
}