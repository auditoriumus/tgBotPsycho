<?php

namespace App\Http\Repositories\ClientRepository;

class ClientRepository extends BaseRepository
{
    public function getByPhone(string $phone)
    {
        return $this->model->where('phone', $phone)->first();
    }

    public function addFirstNameByPhone(string $phone, string $firstName)
    {

    }

    public function addPhone(string $phone)
    {
        $model = $this->getByPhone($phone);
        if (empty($model)) {
            $this->model->phone = $phone;
            return $this->model->save();
        }
        return null;
    }

    public function updateByPhone(string $phone, array $data)
    {
        $model = $this->getByPhone($phone);
        if (!empty($model)) {
            $model[$data['field']] = $data['value'];
            return $model->save();
        }
        return null;
    }
}
