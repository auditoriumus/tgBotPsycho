<?php

namespace App\Http\Services\QuestionnaireServices;

use App\Http\Repositories\QuestionnaireRepository\QuestionnaireRepository;
use App\Http\Services\Service;

class BaseQuestionnaireService extends Service
{
    protected QuestionnaireRepository $questionnaireRepository;

    public function __construct(QuestionnaireRepository $questionnaireRepository)
    {
        $this->questionnaireRepository = $questionnaireRepository;
    }
}
