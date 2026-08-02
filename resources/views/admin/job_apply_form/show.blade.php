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
                <a href="{{route('jobApply')}}" class="btn btn-info pull-right rounded">Back</a>
            </div>
            <div class="card-body">
                <!-- Category Create Table -->
                <div id="pay-invoice">
                    <div class="enq_details text-center">
                        <u>{{ strtoupper($jobApply->name) }} DETAILS</u>
                    </div>
                    <div class="mt-3">
                        <a class="btn btn-primary rounded" href="{{ route('jobApply.pdf', $jobApply->id) }}" target="_blank">Download Data</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Applicant Name</td>
                                        <td class="table-info">{{ $jobApply -> name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Applicant Location</td>
                                        <td>{{ $jobApply -> applicant_location }}</td>
                                    </tr>
                                    <tr>
                                        <td>Applicant Conatct No.</td>
                                        <td>{{ $jobApply -> applicant_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Applicant Email</td>
                                        <td>{{ $jobApply -> applicant_email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Applicant Resume</td>
                                        <td>
                                            <h5>
                                                Applicant Resume: {{ $jobApply -> applicant_resume }}
                                            </h5>
                                            @if($jobApply->applicant_resume && $jobApply->applicant_resume != 'empty')
                                                <embed src="{{ asset('pdf/' . $jobApply->applicant_resume) }}" type="application/pdf" width="100%" height="300px">
                                            @else
                                                <p>No PDF available</p>
                                            @endif

                                            @if($jobApply->applicant_resume && $jobApply->applicant_resume != 'empty')
                                                <a href="{{ asset('pdf/' . $jobApply->applicant_resume) }}" download><b>Download PDF</b></a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Applicant Cover Letter</td>
                                        <td>{{ $jobApply -> applicant_coverletter }}</td>
                                    </tr>
                                    <tr>
                                        <td>Applicant Cover Letter</td>
                                        <td>{{ $jobApply -> jobOpening->job_title  }}</td>
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