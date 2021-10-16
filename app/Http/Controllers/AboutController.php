<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Skills;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skills::all();
        $testimonials = Testimonials::all();
        $active_menu = 'abouts';
        $about = About::first();

        // var_dump(($testimonials));
        // exit();

        $skillsArray = [];
        if (!empty($about)) {
            $skills_list = explode(',', $about->skills);
            $i = 0;
            foreach ($skills_list as $key => $value) {
                if (!empty($value)) {
                    $skillsArray[$i] = Skills::where('id', $value)->first();
                }
                $i++;
            };
        }

        $testsArray = [];
        if (!empty($about)) {
            $testis = explode(',', $about->testimonials);
            $i = 0;
            foreach ($testis as $key => $value) {
                if (!empty($value)) {
                    $testsArray[$i] = Testimonials::where('id', $value)->first();
                }
                $i++;
            }
            
        }

        return view('about.about', compact('about', 'active_menu', 'testimonials', 'testsArray', 'skillsArray', 'skills'));
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
        if (!empty($request->id)) {
            
            if (!empty($request->title) && !empty($request->mission) && !empty($request->vision)) {
                
                $about = About::where('id', $request->id)->first();
                $about->title = $request->title;
                // $about->image = $request->image;
                $about->mission = $request->mission;
                $about->vision = $request->vision;
                $about->skills = $request->skills;
                $about->testimonials = $request->testId;

                // var_dump($request->hasFile('image'));
                // var_dump($_FILES['image']['name'] != '');
                // var_dump(filesize($request->image) < 2097152);
                $filesize = filesize($request->image);
                $max_filesize = 2097152;


                if ($filesize < $max_filesize) {

                    $filename = $_FILES['image']['name'];
                    $temp = $_FILES['image']['tmp_name'];

                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $imageName = pathinfo($filename, PATHINFO_FILENAME);

                    $aboutImage = 'images/' . $imageName . '.' . $ext;
                    move_uploaded_file($temp, $aboutImage);
                    $about->image = $aboutImage;
                    if ($about->update()) {
                        session(['alert' => 'details upload Successfully', 'class' => 'alert alert success']);
                        return redirect()->route('abouts');
                    } else {
                        session(['alert' => 'Unable to upload details please again', 'class' => 'alert alert warning']);
                        return redirect()->route('abouts');
                    }
                } else {
                    session(['alert' => 'File size exceeded. Please upload below 2MB', 'class' => 'alert alert warning']);
                    return redirect()->route('abouts');
                }
            } else {

                session(['alert' => 'All fields are required', 'class' => 'alert alert-danger']);
                return redirect()->route('abouts');
            }
        } else {
            if (!empty($request->title) && !empty($request->mission) && !empty($request->vision)) {

                $about = new About();
                $about->title = $request->title;
                // $about->image = $request->image;
                $about->mission = $request->mission;
                $about->vision = $request->vision;
                $about->skills = $request->skills;
                $about->testimonials = $request->testId;

                // var_dump($request->hasFile('image'));
                // var_dump($_FILES['image']['name'] != '');
                // var_dump(filesize($request->image) < 2097152);
                $filesize = filesize($request->image);
                $max_filesize = 2097152;


                if ($filesize < $max_filesize) {

                    $filename = $_FILES['image']['name'];
                    $temp = $_FILES['image']['tmp_name'];

                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $imageName = pathinfo($filename, PATHINFO_FILENAME);

                    $aboutImage = 'images/' . $imageName . '.' . $ext;
                    move_uploaded_file($temp, $aboutImage);
                    $about->image = $aboutImage;
                    if ($about->save()) {
                        session(['alert' => 'details upload Successfully', 'class' => 'alert alert success']);
                        return redirect()->route('abouts');
                    } else {
                        session(['alert' => 'Unable to upload details please again', 'class' => 'alert alert warning']);
                        return redirect()->route('abouts');
                    }
                } else {
                    session(['alert' => 'File size exceeded. Please upload below 2MB', 'class' => 'alert alert warning']);
                    return redirect()->route('abouts');
                }
            } else {

                session(['alert' => 'All fields are required', 'class' => 'alert alert-danger']);
                return redirect()->route('abouts');
            }
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