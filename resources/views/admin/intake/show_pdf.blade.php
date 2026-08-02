<html>

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
            <div class="card-body">
                <!-- Category Create Table -->
                <div id="pay-invoice">
                    <div class="intakeParts" style="text-align: center;">
                        <u>{{ strtoupper($intake->name) }} DETAILS</u>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table border="1px solid black" align="center" style="font-size: 16px; text-align: center;" id="bootstrap-data-table" class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Participant Name</th>
                                        <td class="table-info">{{ $intake -> name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Participant Address</th>
                                        <td>{{ $intake -> participant_address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Participant Email</th>
                                        <td>{{ $intake -> participant_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Participant Contact No.</th>
                                        <td>{{ $intake -> participant_contact_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Participant Date of Birth</th>
                                        <td>{{ $intake->participant_date_of_birth}}</td>
                                    </tr>
                                    <tr>
                                        <th>Participant Gender</th>
                                        <td>{{ $intake -> participant_gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Support Hours</th>
                                        <td>{{ $intake -> participant_support_hours }}</td>
                                    </tr>
                                    <tr>
                                        <th>Support Description</th>
                                        <td>{{ $intake -> participant_desc_support }}</td>
                                    </tr>
                                    <tr>
                                        <th>Any Risk / Alert / Diagnosis</th>
                                        <td>{{ $intake -> participant_any_risk }}</td>
                                    </tr>
                                    <tr>
                                        <th>Invoicing Particular Name</th>
                                        <td  class="table-info">{{ $intake -> invoicing_particular_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Invoicing Particular Email</th>
                                        <td>{{ $intake -> invoicing_particular_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Invoicing Particular Contact No.</th>
                                        <td>{{ $intake -> invoicing_particular_contact_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Invoicing Particular Plan Fund</th>
                                        <td>{{ $intake -> invoicing_plan_funding }}</td>
                                    </tr>
                                    <tr>
                                        <th>Participant Living Situation</th>
                                        <td>{{ $intake -> participant_living_situatuion }}</td>
                                    </tr>
                                    <tr>
                                        <th>Participant Current Behavioural Plan</th>
                                        <td>{{ $intake -> participant_current_behavioural_plan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Need Assistance Mobility for Participant</th>
                                        <td>{{ $intake -> participant_mobility_need_assistance }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mobility Independent for Participant</th>
                                        <td>{{ $intake -> participant_mobility_independent }}</td>
                                    </tr>
                                    <tr>
                                        <th>Participant Mobility Description</th>
                                        <td>{{ $intake -> participant_mobility_desc }}</td>
                                    </tr>
                                    <tr>
                                        <th>Need Assistance Communication for Participant</th>
                                        <td>{{ $intake -> participant_comm_need_assistance }}</td>
                                    </tr>
                                    <tr>
                                        <th>Prefer Communication for Participant</th>
                                        <td>{{ $intake -> participant_comm_perfer }}</td>
                                    </tr>
                                    <tr>
                                        <th>Participant Communication Description</th>
                                        <td>{{ $intake -> participant_comm_desc }}</td>
                                    </tr>
                                    <tr>
                                        <th>Need Assistance Personal Care for Participant</th>
                                        <td>{{ $intake -> participant_personal_care_need_assistance }}</td>
                                    </tr>
                                    <tr>
                                        <th>Need Assistance to Transfer for Participant</th>
                                        <td>{{ $intake -> participant_transfer_need_assistance }}</td>
                                    </tr>
                                    <tr>
                                        <th>Need Assistance to eat and drink for Participant</th>
                                        <td>{{ $intake -> participant_eatinganddrinking_need_assistance }}</td>
                                    </tr>
                                    <tr>
                                        <th>Need Assistance to Continence for Participant</th>
                                        <td>{{ $intake -> participant_continence_need_assistance }}</td>
                                    </tr>
                                    <tr>
                                        <th>Participant Continence Description</th>
                                        <td>{{ $intake -> participant_continence_desc }}</td>
                                    </tr>
                                    <tr>
                                        <th>Need Assistance to CALD Background for Participant</th>
                                        <td>{{ $intake -> participant_cald_background_need_assistance }}</td>
                                    </tr>
                                    <tr>
                                        <th>Participant Work Preference Description</th>
                                        <td>{{ $intake -> participant_work_preferences_desc }}</td>
                                    </tr>
                                    <tr>
                                        <th>Referrer Name</th>
                                        <td class="table-info">{{ $intake -> referrer_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Referrer Organization</th>
                                        <td>{{ $intake -> referrer_org }}</td>
                                    </tr>
                                    <tr>
                                        <th>Referrer Position</th>
                                        <td>{{ $intake -> referrer_position }}</td>
                                    </tr>
                                    <tr>
                                        <th>Referrer Contact No.</th>
                                        <td>{{ $intake -> referrer_contact_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Referrer Email</th>
                                        <td>{{ $intake -> referrer_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Referrer Remark</th>
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
</html>