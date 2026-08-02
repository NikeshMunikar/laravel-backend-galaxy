<html>

<style>
    .enquiryParts{
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
                    <div class="enquiryParts" style="text-align: center;">
                        <u>{{ strtoupper($enquiry->name) }} DETAILS</u>
                    </div><br><br>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table border="1px solid black" align="center" style="font-size: 22px; text-align: center;" id="bootstrap-data-table" class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Enquiry Name</th>
                                        <td class="table-info">{{ $enquiry -> name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Enquiry Email</th>
                                        <td>{{ $enquiry -> email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Enquiry Address</th>
                                        <td>{{ $enquiry -> enq_address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Enquiry Contact No.</th>
                                        <td>{{ $enquiry -> enq_contact_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Enquiry Date</th>
                                        <td>{{ \Carbon\Carbon::parse($enquiry->enq_date)->format('F j, Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Enquiry Support hour</th>
                                        <td>{{ $enquiry -> enq_support_hour }}</td>
                                    </tr>
                                    <tr>
                                        <th>Support Description</th>
                                        <td>{{ $enquiry -> enq_support_description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Any Risk / Alert / Diagnosis</th>
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
</html>