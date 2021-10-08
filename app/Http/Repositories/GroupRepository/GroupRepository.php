<?php

namespace App\Http\Repositories\GroupRepository;

use Illuminate\Support\Facades\DB;

class GroupRepository extends BaseRepository
{
    public function getBySpecialistId(int $specialistId)
    {
        return $this->model->where('specialist_id', $specialistId)->get();
    }

    public function getFreeBySpecialistId(int $specialistId)
    {
        return DB::select('SELECT g.id, inner_seleqt.count, g.date
FROM groups g
         LEFT JOIN (SELECT group_id, count(*)
                    FROM groups_clients
                    WHERE group_id IN (
                        SELECT id
                        FROM groups
                        WHERE specialist_id = 1
                    )
                    GROUP BY group_id) inner_seleqt
                   ON g.id = inner_seleqt.group_id
WHERE specialist_id = ?', [$specialistId]);
    }

    public function getFreeByDate(string $date)
    {
        return DB::select('SELECT g.id, inner_seleqt.count, g.date, g.specialist_id, s.name
FROM groups g
         LEFT JOIN (SELECT group_id, count(*)
                    FROM groups_clients
                    WHERE group_id IN (
                        SELECT id
                        FROM groups
                        WHERE specialist_id = 1
                    )
                    GROUP BY group_id) inner_seleqt
                   ON g.id = inner_seleqt.group_id
LEFT JOIN specialists s on g.specialist_id = s.id
WHERE g.date = date( ? )', [$date]);
    }


}
