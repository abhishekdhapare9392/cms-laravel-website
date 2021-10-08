@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="mb-0">Edit Here</h3>
                </div>
                <div class="card-body">

                    <form action="{{ route($action, isset($skills) ? $skills->id : '') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12 col-md-12">
                                @if(session()->has('alert'))
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="alert alert-{{ session()->get('class') }} d-flex justify-content-between"
                                            role="alert">
                                            <strong>{{ session()->get('alert') }}</strong>
                                            <span class="close">&times;</span>
                                            <?php 
                                                    echo '
                                                        <script>
                                                            document.querySelector(".close").addEventListener("click", function(e) {
                                                                e.preventDefault();
                                                                e.target.parentElement.remove();
                                                            });
                                                        </script>
                                                    ';
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                {{ session()->forget('alert') }}
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="skills">Skills</label>
                                    <input type="text" class="form-control" id="skills" name="skill_name"
                                        placeholder="Enter the skill name"
                                        value="{{ isset($skills) ? $skills->skill_name : '' }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="skills_percentage">Skills Percentage</label>
                                    <input type="text" class="form-control" id="skills_percentage"
                                        name="skill_percentage" placeholder="Enter the skill percentage"
                                        value="{{ isset($skills) ? $skills->skill_percentage : '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-12 text-center">
                                <div class="form-group text-center">
                                    <input type="submit" value="Save" class="btn btn-primary" name="submit" id="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection