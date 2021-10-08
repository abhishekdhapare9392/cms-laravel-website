@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-title">
                    <h1>Skills</h1>

                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12 col-md-12">
                        <form action="{{route('skills.store')}}" method="post">
                            @csrf
                            <div class="row mb-3">

                                <div class="col-12 col-md-6">
                                    <label for="skills" class="form-label">Skills:</label>
                                    <input type="text" name="skills" id="skills" class="form-control"
                                        placeholder="Enter the skills" aria-describedby="helpId">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="skills_percentage" class="form-label">Skills Percentage:</label>
                                    <input type="text" name="skills_percentage" id="skills_percentage"
                                        class="form-control" placeholder="Enter the skills percentage"
                                        aria-describedby="helpId">
                                </div>


                            </div>

                            <div class="col-12 col-md-12 mb-3">
                                <button type="submit" value="save" name="submit" class="btn btn-success">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection