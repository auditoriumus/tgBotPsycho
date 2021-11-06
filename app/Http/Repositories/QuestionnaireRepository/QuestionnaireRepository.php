<?php

namespace App\Http\Repositories\QuestionnaireRepository;

class QuestionnaireRepository extends BaseQuestionnaireRepository
{
    public function addNew($data)
    {
        return $this->questionnaire->create($data);
    }
}
