<?php

namespace App\Http\Repositories\QuestionnaireRepository;

use App\Http\Repositories\Repository;
use App\Models\Questionnaire;

class BaseQuestionnaireRepository extends Repository
{
    protected Questionnaire $questionnaire;

    public function __construct(Questionnaire $questionnaire)
    {
        $this->questionnaire = $questionnaire;
    }
}
