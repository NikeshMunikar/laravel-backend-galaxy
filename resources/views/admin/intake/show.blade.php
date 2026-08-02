@extends('admin.layout.master')
@section('content')

<style>
    .intakeParts{
        font-size:26px;
        font-weight:bold;
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
                <a href="{{route('intake.index')}}" class="btn btn-info pull-right rounded">Back</a>
            </div>
            <div class="card-body">
                <!-- Category Create Table -->
                <div id="pay-invoice">
                    <div class="intakeParts text-center">
                        <u>{{ strtoupper($intake->name) }} DETAILS</u>
                    </div>
                    <div class="mt-3">
                        <a class="btn btn-primary rounded" href="{{ route('intake.pdf', $intake->id) }}" target="_blank">Download PDF</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Participant Name</td>
                                        <td class="table-info">{{ $intake -> name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Participant Address</td>
                                        <td>{{ $intake -> participant_address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Participant Email</td>
                                        <td>{{ $intake -> participant_email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Participant Contact No.</td>
                                        <td>{{ $intake -> participant_contact_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Participant Date of Birth</td>
                                        <td>{{ $intake->participant_date_of_birth}}</td>
                                    </tr>
                                    <tr>
                                        <td>Participant Gender</td>
                                        <td>{{ $intake -> participant_gender }}</td>
                                    </tr>
                                    <tr>
                                        <td>Support Hours</td>
                                        <td>{{ $intake -> participant_support_hours }}</td>
                                    </tr>
                                    <tr>
                                        <td>Support Description</td>
                                        <td>{{ $intake -> participant_desc_support }}</td>
                                    </tr>
                                    <tr>
                                        <td>Any Risk / Alert / Diagnosis</td>
                                        <td>{{ $intake -> participant_any_risk }}</td>
                                    </tr>
                                    <tr>
                                        <td>Invoicing Particular Name</td>
                                        <td  class="table-info">{{ $intake -> invoicing_particular_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Invoicing Particular Email</td>
                                        <td>{{ $intake -> invoicing_particular_email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Invoicing Particular Contact No.</td>
                                        <td>{{ $intake -> invoicing_particular_contact_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Invoicing Particular Plan Fund</td>
                                        <td>{{ $intake -> invoicing_plan_funding }}</td>
                                    </tr>
                                    <tr>
                                        <td>Participant Living Situation</td>
                                        <td>{{ $intake -> participant_living_situatuion }}</td>
                                    </tr>
                                    <tr>
                                        <td>Participant Current Behavioural Plan</td>
                                        <td>{{ $intake -> participant_current_behavioural_plan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Need Assistance Mobility for Participant</td>
                                        <td>{{ $intake -> participant_mobility_need_assistance }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mobility Independent for Participant</td>
                                        <td>{{ $intake -> participant_mobility_independent }}</td>
                                    </tr>
                                    <tr>
                                        <td>Participant Mobility Description</td>
                                        <td>{{ $intake -> participant_mobility_desc }}</td>
                                    </tr>
                                    <tr>
                                        <td>Need Assistance Communication for Participant</td>
                                        <td>{{ $intake -> participant_comm_need_assistance }}</td>
                                    </tr>
                                    <tr>
                                        <td>Prefer Communication for Participant</td>
                                        <td>{{ $intake -> participant_comm_perfer }}</td>
                                    </tr>
                                    <tr>
                                        <td>Participant Communication Description</td>
                                        <td>{{ $intake -> participant_comm_desc }}</td>
                                    </tr>
                                    <tr>
                                        <td>Need Assistance Personal Care for Participant</td>
                                        <td>{{ $intake -> participant_personal_care_need_assistance }}</td>
                                    </tr>
                                    <tr>
                                        <td>Need Assistance to Transfer for Participant</td>
                                        <td>{{ $intake -> participant_transfer_need_assistance }}</td>
                                    </tr>
                                    <tr>
                                        <td>Need Assistance to eat and drink for Participant</td>
                                        <td>{{ $intake -> participant_eatinganddrinking_need_assistance }}</td>
                                    </tr>
                                    <tr>
                                        <td>Need Assistance to Continence for Participant</td>
                                        <td>{{ $intake -> participant_continence_need_assistance }}</td>
                                    </tr>
                                    <tr>
                                        <td>Participant Continence Description</td>
                                        <td>{{ $intake -> participant_continence_desc }}</td>
                                    </tr>
                                    <tr>
                                        <td>Need Assistance to CALD Background for Participant</td>
                                        <td>{{ $intake -> participant_cald_background_need_assistance }}</td>
                                    </tr>
                                    <tr>
                                        <td>Participant Work Preference Description</td>
                                        <td>{{ $intake -> participant_work_preferences_desc }}</td>
                                    </tr>
                                    <tr>
                                        <td>Referrer Name</td>
                                        <td class="table-info">{{ $intake -> referrer_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Referrer Organization</td>
                                        <td>{{ $intake -> referrer_org }}</td>
                                    </tr>
                                    <tr>
                                        <td>Referrer Position</td>
                                        <td>{{ $intake -> referrer_position }}</td>
                                    </tr>
                                    <tr>
                                        <td>Referrer Contact No.</td>
                                        <td>{{ $intake -> referrer_contact_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Referrer Email</td>
                                        <td>{{ $intake -> referrer_email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Referrer Remark</td>
                                        <td>{{ $intake -> referrer_remark }}</td>
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