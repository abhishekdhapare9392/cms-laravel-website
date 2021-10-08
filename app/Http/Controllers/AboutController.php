<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_menu = 'abouts';
        return view('about.about', compact('active_menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($request->image);
        // exit();
        if (!empty($request->title) && !empty($request->image) && !empty($request->mission) && !empty($request->vision)) {

            $about = new About();
            $about->title = $request->title;
            $about->image = $request->image;
            $about->mission = $request->mission;
            $about->vision = $request->vision;

            if ($about->save()) {
                session(['alert' => 'details upload Successfully', 'class' => 'alert alert success']);
                redirect()->route('abouts');
            } else {
                session(['alert' => 'Unable to upload details please again', 'class' => 'alert alert warning']);
                return redirect()->route('abouts');
            }
        } else {

            session(['alert' => 'All fields are required', 'class' => 'alert alert-danger']);
            return redirect()->route('abouts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show($about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
