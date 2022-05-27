@extends('admin.master')
@section('main')
{{-- {{dd($categories)}} --}}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Discount</h1>
                    </div>
                    {{-- <div class="col-sm-6 ">
                        <span style="color: red">{{Session::has('msg')?Session::get('msg'): ""}}</span>
                        <button onclick="add()" class="float-sm-right btn btn-warning"><a style="font-size: 30; color: white">Add discount</a></button>
                    </div> --}}
                </div>
            </div><!-- /.container-fluid -->
        </section>
        {{-- <div class="container-fluid px-5 d-none" id="add-form">
            <!-- /.content -->
            <div class="row ">
                <div class="col-md-12">
                    <form class="card card-danger" method="POST" action="{{route('admin.user.add')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      
                        <div class="card-header">
                            <h3 class="card-title">Add User</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="add-value">Value</label>
                                <input type="number" class="form-control" id="add-value" name="value"
                                    placeholder="Enter value" required>
                            </div>
                            <div class="form-group">
                                <label for="add-content">Content</label>
                                <input type="text" class="form-control" id="add-content" name="content"
                                    placeholder="Enter content" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="add-content">Start day</label>
                                        <input type="datetime-local" name="startDay" id="startDay" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="add-content">End day</label>
                                        <input type="datetime-local" name="endDay" id="endDay" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div id="actions" class="row">
                                <div class="col-lg-6">
                                    <div class="btn-group w-100">
                                            <button type="submit" class="btn btn-success col">
                                                <span>Add discount</span>
                                            </button>
                                        <button type="reset" class="btn btn-warning col cancel" onclick="cancel()">
                                            <span>Cancel</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- /.card -->

                </div>
                <!-- /.col (right) -->
            </div>
        </div>
        <div class="container-fluid px-5 d-none" id="edit-form">
            <!-- /.content -->
            <div class="row">
                <div class="col-md-12">
                    @php
                        // $id = 
                    @endphp
                    <form class="card card-danger" method="POST" action="{{url('admin/discount/1')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method("put")
                       
                        <div class="card-header">
                            <h3 class="card-title">Edit discount</h3>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" id="id" value="" name="id" />

                            <div class="form-group">
                                <label for="add-value">Value</label>
                                <input type="number" class="form-control" id="edit-value" name="value"
                                    placeholder="Enter value" required>
                            </div>
                            <div class="form-group">
                                <label for="add-content">Content</label>
                                <input type="text" class="form-control" id="edit-content" name="content"
                                    placeholder="Enter content" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="add-content">Start day</label>
                                        <input type="datetime-local" name="startDay" id="startDay">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="add-content">End day</label>
                                        <input type="datetime-local" name="endDay" id="endDay">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div id="actions" class="row">
                                <div class="col-lg-6">
                                    <div class="btn-group w-100">
                                            <button type="reset" id="btn-edit" class="btn btn-success col">
                                                <span>Edit discount</span>
                                            </button>
                                        <button type="reset" class="btn btn-warning col cancel" onclick="cancel()">
                                            <span>Cancel Edit</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- /.card -->

                </div>
                <!-- /.col (right) -->
            </div>
        </div> --}}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid px-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User List</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Join day</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key=>$value)
                                        @@php
                                            
                                        @endphp
                                        <tr>
                                            <td>{{$value['id']}}</td>
                                            <td>{{$value['username']}}</td>
                                            <td>{{$value['full_name']}}</td>
                                            <td>{{$value['email']}}</td>
                                            <td>{{$value['phone']}}</td>
                                            <td>{{$value['join_day']}}</td>
                                            <td><button class="btn btn-warning">Report user</button></td>
                                        </tr>
                                        @endforeach
                                    <tbody>
                                </table>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
     
    </div>
    <!-- jQuery -->
    <script src="{{ asset('css/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('css/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('css/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('css/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('css/admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('css/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('css/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('css/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('css/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('css/admin/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <!-- dropzonejs -->
    <script src="{{ asset('css/admin/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('css/admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('css/admin/dist/js/demo.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('css/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- CodeMirror -->
    <script src="{{ asset('css/admin/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
@endsection
