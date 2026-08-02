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
                <a href="{{route('blog')}}" class="btn btn-info pull-right rounded">Back</a>
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
                        <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label for="blog_title">Blog Title*</label>
                                <textarea class="form-control  @error('blog_title') is-invalid @enderror" name="blog_title" id="blog_title" rows="3" placeholder="Eg.Thousand Miles">{{ old('blog_title') }}</textarea>
                                @error('blog_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="blog_desc">Blog Description*</label>
                                <textarea class="form-control @error('blog_desc') is-invalid @enderror" name="blog_desc" id="blog_desc" rows="3" placeholder="Description">{{ old('blog_desc') }}</textarea>
                                @error('blog_desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="blog_content">Blog Content*</label>
                                <textarea class="form-control ckeditor5 @error('blog_content') is-invalid @enderror" name="blog_content" id="blog_content" placeholder="Content">{{ old('blog_content') }}</textarea>
                                @error('blog_content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div class="form-group">
                                <label>Blog Cover*</label>
                                <div>
                                    <input type="radio" name="cover_option" value="upload" id="cover_upload" checked>
                                    <label for="cover_upload">Upload Image</label>
                                </div>
                                <div>
                                    <input type="radio" name="cover_option" value="url" id="cover_url">
                                    <label for="cover_url">URL</label>
                                </div>
                                <div id="cover_upload_input">
                                    <input type="file" class="form-control-file @error('blog_cover') is-invalid @enderror" name="blog_cover" id="blog_cover" placeholder="Eg.imagekit.io/imagepath?/filesname" value="{{ old('blog_cover') }}">
                                    @error('blog_cover')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div id="cover_url_input" style="display: none;">
                                    <input type="text" class="form-control @error('blog_cover') is-invalid @enderror" name="cover_option" id="blog_cover" placeholder="Eg.imagekit.io/imagepath?/filesname" value="{{ old('blog_cover') }}">
                                    @error('blog_cover')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="blog_by">Blog By*</label>
                                <input type="text" class="form-control rounded @error('blog_by') is-invalid @enderror" name="blog_by" id="blog_by" placeholder="Eg. Joyboy" value="{{ old('blog_by') }}">
                                @error('blog_by')
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