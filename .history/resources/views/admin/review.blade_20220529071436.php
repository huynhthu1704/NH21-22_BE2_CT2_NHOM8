@extends('admin.master')
@section('main')
{{-- {{dd($reviews)}} --}}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            {{-- <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Review</h1>
                    </div> --}}
                    {{-- <div class="col-sm-6 ">
                        <span style="color: red">{{Session::has('msg')?Session::get('msg'): ""}}</span>
                        <button onclick="add()" class="float-sm-right btn btn-warning"><a style="font-size: 30; color: white">Add discount</a></button>
                    </div> --}}
                {{-- </div>
            </div><!-- /.container-fluid --> --}}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid px-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Review List</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body -responsive ">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">ID</th>
                                            <th style="width: 10%">Username</th>
                                            <th style="width: 50%">Content</th>
                                            <th style="width: 20%">Rating</th>
                                            <th style="width: 15%">Product</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $key=>$value)
                                        @php
                                        @endphp
                                        <tr>
                                            <td>{{$value['id']}}</td>
                                            <td>{{$value['username']}}</td>
                                            <td style="display: block"><p style="overflow-y: scroll; word-wrap: break-word; height: 100px; text-overflow: ellipsis">{{$value['content']}}</p></td>
                                            <td>
                                            @php
                                            $rating = $value['rating_value'];
                                            @endphp
                                            @for ($i = 1; $i <= 5; $i++) 
                                                @if ($i <= $rating)
                                                <i style="color: yellow" class="fas fa-solid fa-star"></i>
                                                @else
                                                <i style="color: grey"  class="fas fa-solid fa-star"></i>
                                                @endif
                                            @endfor
                                           </td>
                                            <td><a href="{{url('product/'.$value['product_name'])}}">{{$value['product_name']}}</a></td>
                                            <td><button class="btn btn-warning">View review</button></td>
                                        </tr>
                                        @endforeach
                                    <tbody>
                                </table>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body -responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">ID</th>
                                            <th style="width: 10%">Username</th>
                                            <th style="width: 50%">Content</th>
                                            <th style="width: 20%">Rating</th>
                                            <th style="width: 15%">Product</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $key=>$value)
                                        @php
                                        @endphp
                                        <tr>
                                            <td>{{$value['id']}}</td>
                                            <td>{{$value['username']}}</td>
                                            <td style="display: block"><p style="overflow-y: scroll; word-wrap: break-word; height: 100px; text-overflow: ellipsis">{{$value['content']}}</p></td>
                                            <td>
                                            @php
                                            $rating = $value['rating_value'];
                                            @endphp
                                            @for ($i = 1; $i <= 5; $i++) 
                                                @if ($i <= $rating)
                                                <i style="color: yellow" class="fas fa-solid fa-star"></i>
                                                @else
                                                <i style="color: grey"  class="fas fa-solid fa-star"></i>
                                                @endif
                                            @endfor
                                           </td>
                                            <td><a href="{{url('product/'.$value['product_name'])}}">{{$value['product_name']}}</a></td>
                                            <td><button class="btn btn-warning">View review</button></td>
                                        </tr>
                                        @endforeach
                                    <tbody>
                                    </table>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">??</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">??</a></li>
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
   
    <!-- Page specific script -->
    <script type="text/javascript">
         const add = () => {
            document.querySelector('#add-form').classList.remove('d-none');
            document.querySelector('#edit-form').classList.add('d-none');;
        }
        const edit = (id) => {
            const add = document.querySelector('#add-form');
            const edit = document.querySelector('#edit-form');
            add.classList.add('d-none')
            edit.classList.remove('d-none')
           document.querySelector('#edit-form').action;
          document.querySelector('#edit-form').querySelector('input[name="id"]').value = id;
          document.querySelector('#edit-form').querySelector('input[name="value"]').value = id;
          document.querySelector('#edit-form').querySelector('input[name="content"]').value = id;
          document.querySelector('#edit-form').querySelector('input[name="startDay"]').value = id;
          document.querySelector('#edit-form').querySelector('input[name="endDay"]').value = id;
          <?php echo "hi"?>

        }
        const cancel= () => {
            document.querySelector('#add-form').classList.add('d-none');
            document.querySelector('#edit-form').classList.add('d-none');;
        }

        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
        $(function() {
            // Summernote
            $('#summernote2').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
    </script>
@endsection
