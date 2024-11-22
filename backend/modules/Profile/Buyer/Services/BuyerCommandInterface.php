<?php

namespace Modules\Profile\Buyer\Services;

use Modules\Profile\Buyer\Data\BuyerData;

interface BuyerCommandInterface
{

    public function create(BuyerData $buyerData);

}
