<?php

namespace App\Http\Controllers\SiteControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionnaireRequest;
use App\Http\Services\QuestionnaireServices\AddNewQuestionnaireService;


class QuestionnaireController extends Controller
{
    public function addQuestionnaire(QuestionnaireRequest $request)
    {
        if (app(AddNewQuestionnaireService::class)->addNew($request->all())) {
            return redirect('/confirm')->with('success', 'Спасибо, анкета добавлена. Остался один шаг');
        }
    }
}
