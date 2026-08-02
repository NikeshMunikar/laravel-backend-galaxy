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
                <a href="{{route('jobOpening')}}" class="btn btn-info pull-right rounded">Back</a>
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
                        <form action="{{route('jobOpening.store')}}" method="post">
                            @csrf

                            <div>
                                <label for="job_title">Job Title*</label>
                                <input type="text" class="form-control rounded @error('job_title') is-invalid @enderror" name="job_title" id="job_title" placeholder="Eg. Joyboy" value="{{ old('job_title') }}">
                                @error('job_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="job_operating_area">Job Operating Area*</label>
                                <input type="text" class="form-control rounded @error('job_operating_area') is-invalid @enderror" name="job_operating_area" id="job_operating_area" placeholder="Eg. Joyboy" value="{{ old('job_operating_area') }}">
                                @error('job_operating_area')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="job_desc">Job Description*</label>
                                <textarea class="form-control ckeditor5 @error('job_desc') is-invalid @enderror" name="job_desc" id="job_desc" placeholder="Content">{{ old('job_desc') }}</textarea>
                                @error('job_desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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