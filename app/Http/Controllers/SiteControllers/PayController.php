<?php

namespace App\Http\Controllers\SiteControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Services\OrderServices\AddNewOrderService;

class PayController extends Controller
{
    public function pay(OrderRequest $request)
    {
        app(AddNewOrderService::class)->createOrder($request->all());
        return view('pages.pay.pay');
        return redirect('/')->with('error', 'В данный момент оплата недоступна');
    }

}
