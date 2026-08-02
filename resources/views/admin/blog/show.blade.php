@extends('admin.layout.master')
@section('content')

<style>
    .enq_details{
        font-size: 30px;
    }
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
                    <div class="enq_details text-center">
                        <u>{{ strtoupper($contact->name) }} DETAILS</u>
                    </div>
                    <div class="mt-3">
                        <a class="btn btn-primary rounded" href="{{ route('contact.pdf', $contact->id) }}" target="_blank">Download PDF</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td class="table-info">{{ $contact -> name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $contact -> email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Contact No.</td>
                                        <td>{{ $contact -> phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Organization</td>
                                        <td>{{ $contact -> organization }}</td>
                                    </tr>
                                    <tr>
                                        <td>Remarks</td>
                                        <td>{{ $contact -> remark }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- .card -->
    </div>
</div>
<script src="{{ asset('admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/main.js')}}"></script>
@endsection