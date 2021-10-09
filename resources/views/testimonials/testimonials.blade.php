@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-title">
                    <h1>Testimonials</h1>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12 col-md-12">
                            <form action="{{route('testimonials.store')}}" method="post">
                                @csrf
                                <div class="col-md-6 mb-3">
                                    <label for="client_name" class="form-label">Client name:</label>
                                    <input type="text" name="client_name" id="client-name" class="form-control"
                                        placeholder="Enter the name of client" aria-describedby="helpId">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="designation" class="form-label">Client Designation:</label>
                                    <input type="text" name="designation" id="designation" class="form-control"
                                        placeholder="Enter the designation of client" aria-describedby="helpId">
                                </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="comments" class="form-label">Client Comments:</label>
                            <textarea class="form-control" name="comments" id="comments" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-12">
                            <button type="submit" class="btn btn-success" value="save" name="submit">Submit</button>
                        </div>
                    </div>



                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>


</div>



@endsection