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
                <a href="{{route('contact')}}" class="btn btn-info pull-right rounded">Back</a>
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
                        <form action="{{route('contact.store')}}" method="post">
                            @csrf

                            <div>
                                <label for="name">Name*</label>
                                <input type="text" class="form-control rounded @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="email">Email*</label>
                                <input type="email" class="form-control rounded @error('email') is-invalid @enderror" name="email" id="email" placeholder="E.g. abc@email.com" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="phone">Contact Number*</label>
                                <input type="text" class="form-control rounded @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Contact No." value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="organization">Organization*</label>
                                <input type="text" class="form-control rounded @error('organization') is-invalid @enderror" name="organization" id="organization" placeholder="Organization" value="{{ old('organization') }}">
                                @error('organization')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="remark">Remarks*</label>
                                <input type="text" class="form-control rounded @error('remark') is-invalid @enderror" name="remark" id="remark" placeholder="Remarks" value="{{ old('remark') }}">
                                @error('remark')
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
<script src="{{ asset('admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/main.js')}}"></script>
@endsection