@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="mb-0">Testimonials</h3>
                    <a href="{{ route('testimonials.add') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add
                        New</a>
                </div>
                <div class="card-body">
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
                    <table class="table table-hover display nowrap" id="userTable">
                        <thead>
                            <th>#</th>
                            <th>Client Names</th>
                            <th>Client Designation</th>
                            <th>Client Comment</th>
                            <th>Actions</th>

                        </thead>
                        <tbody>
                            @foreach($testimonials as $testimonial)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $testimonial->client_names }}</td>
                                <td>{{ $testimonial->client_designation }}</td>
                                <td>{{ $testimonial->client_comment }}</td>
                                <td>
                                    <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                                        class="btn btn-primary"><i class="fas fa-pencil"></i></a>
                                    <a href="{{route('testimonials.delete', $testimonial->id)}}"
                                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection