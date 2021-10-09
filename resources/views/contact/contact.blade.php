@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="mb-0">Contacts</h3>
                    <a href="{{ route('contact.add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add
                        New</a>
                </div>
                <div class="card-body">

                    {{ session()->forget('alert') }}
                    <table class="table table-hover display nowrap" id="userTable">
                        <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Actions</th>

                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $contact->title }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->address }}</td>
                                <td>
                                    {{-- <a href="{{ route('contact.edit', $skill->id) }}" class="btn btn-primary"><i
                                        class="fas fa-pencil"></i></a>
                                    <a href="{{route('contact.delete', $skill->id)}}" class="btn btn-danger"><i
                                            class="fas fa-trash"></i></a> --}}
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