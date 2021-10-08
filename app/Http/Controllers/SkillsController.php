<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_menu = 'skills';
        $skills = Skills::all();
        // var_dump($skills);
        // exit();
        return view('skills.skills_list', compact('active_menu', 'skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = new Skills;
        $active_menu = 'skills';
        $action = 'skills.store';
        return view('skills.skills_add', compact('skills', 'active_menu', 'action'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty($request->skill_name) && !empty($request->skill_percentage)) {

            $skills = new Skills();
            $skills->skill_name = $request->skill_name;
            $skills->skill_percentage = $request->skill_percentage;

            if ($skills->save()) {
                session(['alert' => 'details upload Successfully', 'class' => 'alert alert success']);
                return redirect()->route('skills_list');
            } else {
                session(['alert' => 'Unable to upload details please again', 'class' => 'alert alert warning']);
                return redirect()->route('skills_add');
            }
        } else {

            session(['alert' => 'All fields are required', 'class' => 'alert alert-danger']);
            return redirect()->route('skills_add');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function show(Skills $skills)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $skills = Skills::where('id', $id)->first();
        $active_menu = 'skills';
        $action = 'skills.update';
        return view('skills.create', compact('skills', 'active_menu', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $skills = Skills::where('id', $id)->first();
        $skills->skill_name = $request->skill_name;
        $skills->skill_percentage = $request->skill_percentage;
        if ($skills->update()) {
            session(['alert' => 'User updated successfully', 'class' => 'alert alert-success']);
            return redirect()->route('skills_list');
        } else {
            session(['alert' => 'Unable to update records this time please try again later', 'class' => 'alert alert-warning']);
            return redirect()->route('skills.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skills = Skills::where('id', $id)->first();
        if ($skills->delete()) {
            session(['alert' => 'User deleted successfully', 'class' => 'alert alert-success']);
            return redirect()->route('skills_list');
        } else {
            session(['alert' => 'Unable to delete user this time please try again later', 'class' => 'alert alert-warning']);
            return redirect()->route('users_list');
        }
    }
}
