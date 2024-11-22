<?php

namespace Modules\Profile\Buyer\Data;

class BuyerData
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}
}
