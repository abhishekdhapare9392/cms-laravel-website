<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_menu = "testimonials";
        $testimonials = testimonials::all();
        return view('testimonials.list', compact('active_menu', 'testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testimonials = 'testimonials';
        $active_menu = 'testimonials';
        $action = 'testimonials.add';
        return view('testimonials.testimonials', compact('active_menu', 'action', 'testimonials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty($request->client_names) && !empty($request->client_designation) && !empty($request->client_comment)) {
            $testimonials = new Testimonials();
            $testimonials->client_names = $request->client_names;
            $testimonials->client_designation = $request->designation;
            $testimonials->client_comment = $request->comment;

            if ($testimonials->save()) {
                session(['alert' => 'details upload Successfully', 'class' => 'alert alert-success']);
                return redirect()->route('testimonials.list');
            } else {
                session(['alert' => 'Unable to upload details please again', 'class' => 'alert alert-warning']);
                return redirect()->route('testimonials.add');
            }
        } else {

            session(['alert' => 'All fields are required', 'class' => 'alert alert-danger']);
            return redirect()->route('testimonials.add');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonials $testimonials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonials $testimonials)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonials $testimonials)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonials $testimonials)
    {
        //
    }
}
