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
                <a href="{{route('enquiry')}}" class="btn btn-info pull-right rounded">Back</a>
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
                        <form action="{{route('enquiry.update',$enquiry->id)}}" method="post">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="name">Name*</label>
                                <input type="text" class="form-control rounded @error('name') is-invalid @enderror" name="name" id="name" value="{{ $enquiry->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="email">Email*</label>
                                <input type="email" class="form-control rounded @error('email') is-invalid @enderror" name="email" id="email" value="{{ $enquiry->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="enq_address">Address*</label>
                                <input type="text" class="form-control rounded @error('enq_address') is-invalid @enderror" name="enq_address" id="enq_address" value="{{ $enquiry->enq_address }}">
                                @error('enq_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="enq_contact_number">Contact Number*</label>
                                <input type="text" class="form-control rounded @error('enq_contact_number') is-invalid @enderror" name="enq_contact_number" id="enq_contact_number" value="{{ $enquiry->enq_contact_number }}">
                                @error('enq_contact_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="enq_date">Enquiry Date*</label>
                                <input type="date" class="form-control rounded @error('enq_date') is-invalid @enderror" name="enq_date" id="enq_date" value="{{ $enquiry->enq_date }}">
                                @error('enq_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="enq_support_hour">Support Hours*</label>
                                <input type="text" class="form-control rounded @error('enq_support_hour') is-invalid @enderror" name="enq_support_hour" id="enq_support_hour" value="{{ $enquiry->enq_support_hour }}">
                                @error('enq_support_hour')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="enq_support_description">Support Description*</label>
                                <textarea class="form-control textareaclass rounded @error('enq_support_description') is-invalid @enderror" name="enq_support_description" id="enq_support_description">{{ $enquiry->enq_support_description }}</textarea>
                                @error('enq_support_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="enq_any_risk">Any Risk/ Alert/ Diagnosis*</label>
                                <input type="text" class="form-control rounded @error('enq_any_risk') is-invalid @enderror" name="enq_any_risk" id="enq_any_risk" value="{{ $enquiry->enq_any_risk }}">
                                @error('enq_any_risk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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