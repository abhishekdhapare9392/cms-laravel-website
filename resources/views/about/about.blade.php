@extends('layouts.app');
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-title p-3">
                    <h1>About Us</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ isset($about->id) ? $about->id : '' }}">
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" id="title" name="title"
                                                placeholder="Enter the title of about page" class="form-control" value="{{ isset($about->title) ? $about->title : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image" class="form-control" title="Upload image for hero section">
                                            @isset($about->image)
                                                <img src="{{ $about->image }}" alt="{{ $about->title }}" width="150px" height="auto">
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="mission">Mission</label>

                                            <input type="text" name="mission" id="mission" class="form-control" placeholder="Enter the mission" value="{{ isset($about->mission) ? $about->mission : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="vision">Vision</label>
                                            <input type="text" name="vision" id="vision" class="form-control" placeholder="Enter the vision" value="{{ isset($about->vision) ? $about->vision : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="skills">Skills</label>
                                            <button type="button" class="btn btn-warning rounded" id="addSkills"><i class="fas fa-plus"></i>&nbsp;Add Skills</button>
                                            <input type="hidden" name="skills" class="skillId">
                                        </div>
                                        <div class="flex-d flex-row my-2" id="skillsList">
                                            @foreach ($skillsArray as $skill)
                                            <span class="badge rounded-pill bg-info me-2">{{$skill->skill_name .' - '. $skill->skill_percentage}}%</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12 text-center">
                                        <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary" name="submit">
                                        </div>
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

<div class="modal fade" id="skillsModal" tabindex="-1" aria-labelledby="skillsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="skillsModalLabel">Skills</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($skills as $skill)
                        <div class="form-group">
                            <input type="checkbox" name="skill" id="skill-{{ $skill->id }}" data-id="{{ $skill->id }}" data-skill-name="{{ $skill->skill_name }}" data-skill-per="{{ $skill->skill_percentage }}">
                            <label for="skill-{{ $skill->id }}">{{ $skill->skill_name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary selectSkills">Select</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/about.js') }}"></script>
@endpush