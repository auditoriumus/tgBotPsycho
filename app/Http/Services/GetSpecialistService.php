<?php

namespace App\Http\Services;

class GetSpecialistService extends BaseService
{
    public function getAll()
    {
        return $this->specialistRepository
            ->getAll()
            ->toArray();
    }

    public function getAllForCsv()
    {
        $specialists = $this->specialistRepository
            ->getAll();
        $array = [];

        foreach ($specialists as $key => $specialist) {
            $array[$key]['name'] = $specialist->name;
            foreach ($specialist->clients as $j => $client) {
                $array[$key]['clients'][$j+1] = $client->second_name . ' ' . $client->first_name . ' ' . $client->patronymic;
            }
        }

        $resultArray = [];

        foreach ($array as $key => $item) {
            $resultArray[0][] = $item['name'];
        }

        foreach ($array as $key => $item) {
            if (isset($item['clients'])) {
                foreach ($item['clients'] as $index => $client) {
                    $resultArray[$index][] = $client;
                }
            }
        }

        return collect($resultArray);
    }
}
