<?php

namespace App\Http\Controllers\SiteControllers;

use App\Http\Controllers\Controller;
use App\Http\Services\OrderServices\AddNewOrderService;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function pay(Request $request)
    {
        app(AddNewOrderService::class)->createOrder($request->all());
        dd($request);
    }

    public function paymentService()
    {
        $mrh_login = "Meits";
        $mrh_pass1 = "1234567890q";

        // номер заказа
        $inv_id = 1;

        // описание заказа
        $inv_desc = "Оплата за тестовый товар";

        // сумма заказа
        $out_summ = "100";

        // артикул товара товара
        $shp_art = "05622";

        $in_curr = "WMRM";

        // язык
        $culture = "ru";

        // формирование подписи
        $crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_Art=$shp_art");
    }
}
