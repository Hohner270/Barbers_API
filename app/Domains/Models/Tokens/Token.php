<?php

namespace App\Domains\Models\Tokens;

class Token
{
    /**
     * JWTとは別のアプリケーションで使用するトークンの規格
     * @var string トークン
     */
    private $token;

    /**
     * @param string トークンにする値
     */
    public function __construct(string $plainString)
    {
        $this->token = password_hash($plainString, PASSWORD_BCRYPT);
    }

    /**
     * @return string トークン
     */
    public function value(): string
    {
        return $this->token;
    }
}