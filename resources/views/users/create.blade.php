@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="mb-0">New User</h3>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route($action, isset($user) ? $user->id : '') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12 col-md-12">
                                @if(session()->has('alert'))
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="alert alert-{{ session()->get('class') }} d-flex justify-content-between" role="alert">
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
                                                    mb-3                                  ?>
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
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter the name" value="{{ isset($user) ? $user->name : '' }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter the email" value="{{ isset($user) ? $user->email : '' }}">
                                </div>
                            </div>
                        </div>
                        @if(!$user->password)
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter the password">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter the password confirmation">
                                    </div>
                                </div>
                            </div>
                        @endif
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
