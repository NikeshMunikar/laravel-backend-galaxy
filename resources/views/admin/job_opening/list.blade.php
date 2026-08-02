@extends('admin.layout.master')
@section('content')

<link rel="stylesheet" href="{{ asset('admin/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
<!-- <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-select.less')}}"> -->
<link rel="stylesheet" href="{{ asset('admin/assets/scss/style.css')}}">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <!-- flash message for success  starts-->
                    @if (session('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session('success') }}
                        </div>
                    @endif
                    <!-- flash message for success  ends-->

                    <div class="card-header">
                        <strong class="card-title">{{$page_name}}</strong>
                        <a href="{{route('jobOpening.create')}}" class="btn btn-info pull-right rounded"><i class="fa fa-pencil-square" aria-hidden="true">Create</i></a>
                    </div>
                    
                    <div class="card-body table-responsive">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Job Title</th>
                                    <th>Job Operating Area</th>
                                    <th>Job Description</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobOpenings as $item)
                                <tr>
                                    <td>{{ $loop -> index+1 }}</td>
                                    <td>{{ $item -> job_title }}</td>
                                    <td>{{ $item -> job_operating_area }}</td>
                                    <td>{!! $item -> job_desc !!}</td>
                                    <td>
                                        <form action="{{ route('jobOpening.publish', $item->id) }}" method="POST" style="display:inline">
                                            @method('PUT')
                                            @csrf
                                            @if($item->job_to_be_published === 1 )
                                                <button type="submit" class="btn btn-danger btn-sm rounded" style="background-color:#d71818!important;">Click to Unpublish</button>
                                            @else
                                                <button type="submit" class="btn btn-success btn-sm rounded" style="background-color:green!important;">Click to Publish</button>
                                            @endif
                                        </form>
                                    </td>
                                    <td>
                                        <div class="updatebutton">
                                            <a href="{{route('jobOpening.edit',[$item->id])}}" class="btn btn-primary rounded"><i class="fa fa-pencil-square-o" aria-hidden="true">Edit</i></a>
                                        </div>

                                        <div>
                                            <form action="{{ route('jobOpening.delete', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background-color:#d71818!important;" class="btn btn-danger rounded" onclick="return confirm('Are you sure you want to delete this')"><i class="fa fa-trash" aria-hidden="true">Delete</i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<script src="{{ asset('admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/plugins.js')}}"></script>
<script src="{{ asset('admin/assets/js/main.js')}}"></script>

<script src="{{ asset('admin/assets/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{ asset('admin/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/lib/data-table/datatables-init.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    } );
</script>
@endsection