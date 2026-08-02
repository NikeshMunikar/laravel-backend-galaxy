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
                <a href="{{route('enquiry')}}" class="btn btn-info pull-right rounded">Back</a>
            </div>
            <div class="card-body">
                <!-- Category Create Table -->
                <div id="pay-invoice">
                    <div class="enq_details text-center">
                        <u>{{ strtoupper($enquiry->name) }} DETAILS</u>
                    </div>
                    <div class="mt-3">
                        <a class="btn btn-primary rounded" href="{{ route('enquiry.pdf', $enquiry->id) }}" target="_blank">Download PDF</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Enquiry Name</td>
                                        <td class="table-info">{{ $enquiry -> name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Enquiry Email</td>
                                        <td>{{ $enquiry -> email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Enquiry Address</td>
                                        <td>{{ $enquiry -> enq_address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Enquiry Contact No.</td>
                                        <td>{{ $enquiry -> enq_contact_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Enquiry Date</td>
                                        <td>{{ \Carbon\Carbon::parse($enquiry->enq_date)->format('F j, Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Support Hours</td>
                                        <td>{{ $enquiry -> enq_support_hour }}</td>
                                    </tr>
                                    <tr>
                                        <td>Support Description</td>
                                        <td>{{ $enquiry -> enq_support_description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Any Risk / Alert / Diagnosis</td>
                                        <td>{{ $enquiry -> enq_any_risk }}</td>
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