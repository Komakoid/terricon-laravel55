<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skill;

class Testcontroller extends Controller
{
    public function show ($id)
    {
        return $id;
    }

    public function getAllskills ()
    {
        $skills = Skill::all();

        return response()->json($skills);
    }


    public function GetAllSkillsCategory ($category) 
    {
        $title = "Навыки в категории $category";
    
        $skills = skill::where('category', $category)->get();
    
       
    
      
        return view('skills')
            ->with('title', $title)
            ->with('skills', $skills);
    
    
    }
    public function SkillsBe(){
        $title = 'Навыки';
    
        $skills = skill::all();
    
      
        return view('skills')
            ->with('title', $title)
            ->with('skills', $skills);
    
    
    }
}
