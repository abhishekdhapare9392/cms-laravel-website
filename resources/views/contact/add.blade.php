@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card shadow-1">
                <div class="card-title">
                    <h1>Contacts</h1>
                </div>
                <div class="card-body">
                    <form action="{{route($action,isset($contacts) ? $contacts->id : '')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
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
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Enter the title" aria-describedby="helpId">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        aria-describedby="emailHelpId" placeholder="Enter your Email Id">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" name="phone" id="phone" class="form-control"
                                        placeholder="Enter Phone No." aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <button type="submit" value="save" id="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection