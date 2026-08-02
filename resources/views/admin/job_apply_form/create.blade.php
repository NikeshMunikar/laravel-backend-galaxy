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
                        <form action="{{route('jobApply.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label for="name">Applicant name*</label>
                                <input type="text" class="form-control rounded @error('name') is-invalid @enderror" name="name" id="name" placeholder="Eg. Joyboy" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="applicant_location">Applicant Location*</label>
                                <input type="text" class="form-control rounded @error('applicant_location') is-invalid @enderror" name="applicant_location" id="applicant_location" placeholder="Eg. Kathmandu" value="{{ old('applicant_location') }}">
                                @error('applicant_location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="applicant_number">Applicant Contact Number*</label>
                                <input type="text" class="form-control rounded @error('applicant_number') is-invalid @enderror" name="applicant_number" id="applicant_number" placeholder="Eg. 123456789" value="{{ old('applicant_number') }}">
                                @error('applicant_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="applicant_email">Applicant Email*</label>
                                <input type="email" class="form-control rounded @error('applicant_email') is-invalid @enderror" name="applicant_email" id="applicant_email" placeholder="Eg.example@email.com" value="{{ old('applicant_email') }}">
                                @error('applicant_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="applicant_resume">Applicant Resume*</label>
                                <input type="file" class="form-control rounded @error('applicant_resume') is-invalid @enderror" name="applicant_resume" id="applicant_resume" value="{{ old('applicant_resume') }}">
                                @error('applicant_resume')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="applicant_coverletter">Applicant Cover Letter*</label>
                                <textarea class="form-control @error('applicant_coverletter') is-invalid @enderror" name="applicant_coverletter" id="applicant_coverletter" placeholder="Content">{{ old('applicant_coverletter') }}</textarea>
                                @error('applicant_coverletter')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="applicant_job_title">Job Title*</label>
                                <select name="applicant_job_title" class="form-control" data-placeholder="Select Job">
                                    @foreach($jobOpenings as $id => $jobTitle)
                                        <option value="{{ $id }}">{{ $jobTitle }}</option>
                                    @endforeach
                                </select>
                            </div><br>

                            <button type="submit" style="background-color:#339320!important;" class="btn btn-success rounded"><i class="fa fa-paper-plane" aria-hidden="true">Create</i></button>
                        </form>
                    </div>
                </div>

            </div>
        </div> <!-- .card -->
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const coverUploadInput = document.getElementById("cover_upload_input");
        const coverUrlInput = document.getElementById("cover_url_input");
        const coverOptionRadios = document.getElementsByName("cover_option");

        coverOptionRadios.forEach(radio => {
            radio.addEventListener("change", function() {
                if (this.value === "upload") {
                    coverUploadInput.style.display = "block";
                    coverUrlInput.style.display = "none";
                } else if (this.value === "url") {
                    coverUploadInput.style.display = "none";
                    coverUrlInput.style.display = "block";
                }
            });
        });
    });
</script>
<script src="{{ asset('admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/main.js')}}"></script>
@endsection