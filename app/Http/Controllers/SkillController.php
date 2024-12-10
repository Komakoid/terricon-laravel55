<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skill;

class SkillController extends Controller
{
    public function renderCreatePage()
    {

        return view('createSkill');

    }

    public function createSkill(Request $request)
    {
        $data = $request->all();

        $skill = Skill::create($data);

        return back();

    }
}