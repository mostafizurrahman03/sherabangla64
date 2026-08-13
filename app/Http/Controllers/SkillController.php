<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skill.index', compact('skills'));
    }


    public function create()
    {
        return view('admin.skill.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'description'   => 'required',
            'icon'          => 'required',
        ]);

        $skill = new Skill();
        $skill->name = $request->name;
        $skill->description = $request->description;
        $skill->icon = $request->icon;
        $skill->save();

        return redirect()->route('skill.index')->with('sucess', 'Skill created successfully');
    }

    public function edit(Request $request, Skill $skill)
    {
        return view('admin.skill.create', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name'          => 'required',
            'description'   => 'required',
            'icon'          => 'required',
        ]);

        $skill->name = $request->name;
        $skill->description = $request->description;
        $skill->icon = $request->icon;
        $skill->save();
        return redirect()->route('skill.index')->with('sucess', 'Skill updated successfully');
    }

    public function destroy(Request $request, Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skill.index')->with('sucess', 'Skill deleted successfully');
    }
}
