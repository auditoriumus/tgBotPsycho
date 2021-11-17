<?php

namespace App\Http\Repositories\QuestionnaireRepository;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class QuestionnaireRepository extends BaseQuestionnaireRepository
{
    public function addNew($data)
    {
        try {
            return $this->questionnaire->create($data);
        } catch (\Exception $e) {
            Log::alert($e->getMessage());
            return false;
        }
    }
}
