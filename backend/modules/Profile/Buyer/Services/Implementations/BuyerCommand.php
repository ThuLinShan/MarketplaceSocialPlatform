<?php

namespace Modules\Profile\Buyer\Services\Implementations;

use Modules\Profile\Buyer\Data\BuyerData;
use Modules\Profile\Buyer\Model\Buyer;
use Modules\Profile\Buyer\Services\BuyerCommandInterface;

class BuyerCommand implements BuyerCommandInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(BuyerData $buyerData)
    {
        $buyer = new Buyer(['name' => $buyerData->name, 'email' => $buyerData->email, 'password' => $buyerData->password]);
        $buyer->save();
        return ['buyer' => $buyer];
    }

    public function update() {}
}
