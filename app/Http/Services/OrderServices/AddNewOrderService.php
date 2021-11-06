<?php

namespace App\Http\Services\OrderServices;

class AddNewOrderService extends BaseOrderService
{
    public function createOrder($data)
    {
        $uid = time();
        $data['uid'] = $uid;
        $data['approval'] = false;
        return $this->orderRepository->addNew($data);
    }
}
