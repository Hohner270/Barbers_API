<?php

namespace App\Domains\Models\Token;

use App\Domains\Models\BaseToken\TimeToLive;
use App\Domains\Models\BaseToken\HashedToken;

class JsonWebToken
{
    /**
     * @var HashedToken トークン
     */
    private $hashedToken;

    /**
     * @var TimeToLive 有効期限
     */
    private $ttl;

    /**
     * @param string トークン
     */
    public function __construct(HashedToken $hashedToken, TimeToLive $ttl)
    {
        $this->hashedToken = $hashedToken;
        $this->token = $ttl;
    }

    public function token(): HashedToken
    {
        return $this->hashedToken;
    }

    public function ttl(): TimeToLive
    {
        return $this->ttl;
    }
}