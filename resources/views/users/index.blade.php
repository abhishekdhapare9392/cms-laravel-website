@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="mb-0">Users</h3>
                    <a href="{{ route('user.add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> New User</a>
                </div>
                <div class="card-body">
                    @if(session()->has('alert'))
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="alert alert-{{ session()->get('class') }}" role="alert">
                                    <strong>{{ session()->get('alert') }}</strong>
                                    <span>&times;</span>
                                </div>
                            </div>
                        </div>
                        {{ session()->forget('alert') }}
                    @endif
                    <table class="table table-hover display nowrap" id="userTable">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary"><i class="fas fa-pencil"></i></a> <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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