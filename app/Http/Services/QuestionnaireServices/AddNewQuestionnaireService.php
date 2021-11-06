<?php

namespace App\Http\Services\QuestionnaireServices;

class AddNewQuestionnaireService extends BaseQuestionnaireService
{
    public function addNew($data)
    {
        unset($data['_token']);
        return $this->questionnaireRepository->addNew($data);
    }
}
