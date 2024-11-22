<?php

namespace App\Http\Controllers\API\V0;

use App\Http\Controllers\Controller;
use App\Http\Requests\Buyer\CreateBuyerRequest;
use Illuminate\Http\Request;
use Modules\Profile\Buyer\Data\BuyerData;
use Modules\Profile\Buyer\Services\BuyerCommandInterface;
use Modules\Profile\Buyer\Services\BuyerQueryInterface;

class BuyerController extends Controller
{
    public function create(CreateBuyerRequest $request, BuyerCommandInterface $buyerCommandInterface)
    {

        $buyerData = new BuyerData(
            name: $request->input('name'),
            email: $request->input('email'),
            password: $request->input('password'),
        );

        $result = $buyerCommandInterface->create($buyerData);

        return response()->json($result);
    }
}
