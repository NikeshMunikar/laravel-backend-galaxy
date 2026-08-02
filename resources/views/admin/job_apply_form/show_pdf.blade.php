<html>

<style>
    .jobApplyParts{
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
                    <div class="jobApplyParts" style="text-align: center;">
                        <u>{{ strtoupper($jobApply->name) }} DETAILS</u>
                    </div><br><br>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table border="1px solid black" align="center" style="font-size: 22px; text-align: center;" id="bootstrap-data-table" class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Applicant Name</th>
                                        <td class="table-info">{{ $jobApply -> name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Applicant Location</th>
                                        <td>{{ $jobApply -> applicant_location }}</td>
                                    </tr>
                                    <tr>
                                        <th>Applicant Conatct No.</th>
                                        <td>{{ $jobApply -> applicant_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Applicant Email</th>
                                        <td>{{ $jobApply -> applicant_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Applicant Cover Letter</th>
                                        <td>{{ $jobApply -> applicant_coverletter }}</td>
                                    </tr>
                                    <tr>
                                        <th>Applicant Cover Letter</th>
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
</html>