<html>

<style>
    .contactParts{
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
                    <div class="contactParts" style="text-align: center;">
                        <u>{{ strtoupper($contact->name) }} DETAILS</u>
                    </div><br><br>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table border="1px solid black" align="center" style="font-size: 22px; text-align: center;" id="bootstrap-data-table" class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Contact Name</th>
                                        <td class="table-info">{{ $contact -> name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $contact -> email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact No.</th>
                                        <td>{{ $contact -> phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Organization</th>
                                        <td>{{ $contact -> organization }}</td>
                                    </tr>
                                    <tr>
                                        <th>Remarks</th>
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
</html>