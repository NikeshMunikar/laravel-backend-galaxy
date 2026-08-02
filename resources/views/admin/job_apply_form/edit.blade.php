@extends('admin.layout.master')
@section('content')

<style>
    .textareaclass{
        height:100px;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <strong class="card-title">{{$page_name}}</strong>
                <a href="{{route('jobApply')}}" class="btn btn-info pull-right rounded">Back</a>
            </div>
            <div class="card-body">
                <!-- Category Create Table -->
                <div id="pay-invoice">
                    <div class="card-body">

                    <!-- for error message displaying -->
                    <!-- @if(count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif -->
                        <!-- for form -->
                        <form action="{{route('jobApply.update',$jobApply->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="name">Applicatn Name*</label>
                                <input type="text" class="form-control rounded @error('name') is-invalid @enderror" name="name" id="name" value="{{ $jobApply->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="applicant_location">Applicant Location*</label>
                                <input type="text" class="form-control rounded @error('applicant_location') is-invalid @enderror" name="applicant_location" id="applicant_location" value="{{ $jobApply->applicant_location }}">
                                @error('applicant_location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="applicant_number">Applicant Number*</label>
                                <input type="text" class="form-control rounded @error('applicant_number') is-invalid @enderror" name="applicant_number" id="applicant_number" value="{{ $jobApply->applicant_number }}">
                                @error('applicant_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="applicant_email">Applicant Email*</label>
                                <input type="email" class="form-control rounded @error('applicant_email') is-invalid @enderror" name="applicant_email" id="applicant_email" value="{{ $jobApply->applicant_email }}">
                                @error('applicant_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="applicant_resume">Applicant Resume*</label>
                                <div>
                                    @if ($jobApply->applicant_resume)
                                        <p>Uploaded Resume: <a href="{{ asset('pdf/' . $jobApply->applicant_resume) }}" target="_blank">{{ $jobApply->applicant_resume }}</a></p>
                                    @else
                                        <p>No resume uploaded.</p>
                                    @endif
                                    <input type="file" class="form-control rounded @error('applicant_resume') is-invalid @enderror"
                                        name="applicant_resume" id="applicant_resume">
                                    @error('applicant_resume')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><br>

                            <div>
                                <label for="applicant_coverletter">Applicant Cover Letter*</label>
                                <textarea class="form-control @error('applicant_coverletter') is-invalid @enderror" name="applicant_coverletter" id="applicant_coverletter">{{ $jobApply->applicant_coverletter }}</textarea>
                                @error('applicant_coverletter')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="applicant_job_title">Job Title*</label>
                                <select name="applicant_job_title" class="form-control" data-placeholder="Select Job">
                                    @foreach($jobOpenings as $id => $jobTitle)
                                        <option value="{{ $id }}" {{ $id == $jobApply->applicant_job_title ? 'selected' : '' }}>
                                            {{ $jobTitle }}
                                        </option>
                                    @endforeach
                                </select>
                            </div><br>

                            <button type="submit" style="background-color:#339320!important;" class="btn btn-success rounded"><i class="fa fa-paper-plane" aria-hidden="true">Update</i></button>
                        </form>
                    </div>
                </div>

            </div>
        </div> <!-- .card -->
    </div>
</div>
<script src="{{ asset('admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/main.js')}}"></script>
@endsection