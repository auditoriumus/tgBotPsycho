<?php

namespace App\Http\Controllers\SiteControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionnaireRequest;
use App\Http\Services\QuestionnaireServices\AddNewQuestionnaireService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class QuestionnaireController extends Controller
{
    public function addQuestionnaire(QuestionnaireRequest $request)
    {
        if (app(AddNewQuestionnaireService::class)->addNew($request->all())) {
            return redirect('/')->with('success', 'Спасибо, анкета добавлена');
        }
    }
}
