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
                        <h1>Banner Form</h1>
                    </div>
                    <div class="col-sm-6 ">
                        <button onclick="addBanner()" class="float-sm-right btn btn-warning"><a
                                style="font-size: 30; color: white" href="#add">Add banner</a></button>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container-fluid px-5 d-none" id="add-form">
            <!-- /.content -->
            <div class="row ">
                <div class="col-md-12">
                    <form class="card card-danger" method="POST" action="{{ route('admin.banner.add') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="card-header">
                            <h3 class="card-title">Add Banner</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="add-title">Title</label>
                                <input type="text" class="form-control" id="add-title" name="title"
                                    placeholder="Enter title" required>
                            </div>
                            <div class="form-group">
                                <label for="add-content">Content</label>
                                <input type="text" class="form-control" id="add-content" name="content"
                                    placeholder="Enter content" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true"
                                            name="category" required>
                                            @foreach ($categories as $key => $value)
                                                @if ($key === 0)
                                                    <option value="{{ $value['id'] }}" selected="selected"
                                                        data-select2-id="19">{{ $value['category_name'] }}</option>
                                                @else
                                                    <option value="{{ $value['id'] }}">{{ $value['category_name'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Position</label>
                                        <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true"
                                            name="position" required>
                                            <option selected="selected" data-select2-id="19">Header</option>
                                            <option>Category</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="imgSrc">Select a file:</label>
                                <input type="file" id="imgSrc" name="imgSrc" accept="image/*" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div id="actions" class="row">
                                <div class="col-lg-6">
                                    <div class="btn-group w-100">
                                        <button type="submit" class="btn btn-success col">
                                            <span>Add banner</span>
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
                    <form class="card card-danger" method="POST" action="{{ url('admin/banner/1') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('put')

                        <div class="card-header">
                            <h3 class="card-title">Edit banner</h3>
                        </div>
                        <div class="card-body">
                            {{-- <div class="form-group">
                                <input type="text"  class="form-control" id="edit-id"  name="banner_id" value="">
                            </div> --}}
                            <div class="form-group">
                                <input type="text" class="form-control" id="edit-id" name="banner_id"
                                    placeholder="Enter title" required value="">
                            </div>
                            <div class="form-group">

                                <label for="add-title">Title</label>
                                <input type="text" class="form-control" id="edit-title" name="title"
                                    placeholder="Enter title" required value="">
                            </div>

                            <div class="form-group">
                                <label for="add-content">Content</label>
                                <input type="text" class="form-control" id="edit-content" name="content"
                                    placeholder="Enter content" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true"
                                            name="category" required>
                                            @foreach ($categories as $key => $value)
                                                @if ($key === 0)
                                                    <option value="{{ $value['id'] }}" selected="selected"
                                                        data-select2-id="19">{{ $value['category_name'] }}</option>
                                                @else
                                                    <option value="{{ $value['id'] }}">{{ $value['category_name'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Position</label>
                                        <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true"
                                            name="position" required>
                                            <option selected="selected" value="Header">Header</option>
                                            <option value="Category">Category</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="imgSrc">Select a file:</label>
                                <input type="file" id="imgSrc" name="imgSrc" accept="image/*" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div id="actions" class="row">
                                <div class="col-lg-6">
                                    <div class="btn-group w-100">
                                        <button type="reset" id="btn-edit" class="btn btn-success col" onclick="editBanner()">
                                            <span>Edit banner</span>
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
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid px-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Banner Table</h3>

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
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($banners as $key => $value)
                                            <tr>
                                                <td>{{ $value['id'] }}</td>
                                                <td>{{ $value['title'] }}</td>
                                                <td>{{ $value['content'] }}</td>
                                                <td>{{ $value['category_name'] }}</td>
                                                <td><img id="bannerImg" width="60" height="60"
                                                        src="{{ asset('/images/banners/' . $value['imgSrc']) }}" alt="">
                                                </td>
                                                <td><button class="btn btn-success"
                                                        data-banner-title="{{ $value['title'] }}"
                                                        data-position="{{ $value['position'] }}"
                                                        data-category="{{ $value['category_id'] }}"
                                                        data-content="{{ $value['content'] }}"
                                                        onclick="edit(this,{{ $value['id'] }})"><a
                                                            style="text-decoration: none">Edit</a></button></td>
                                                <td><button class="btn btn-warning">Remove</button></td>
                                            </tr>
                                        @endforeach
                                    <tbody>
                                </table>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
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
    <script src="{{ asset('css/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
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
    <script>
        const addBanner = () => {
            document.querySelector('#add-form').classList.remove('d-none');
            document.querySelector('#edit-form').classList.add('d-none');;
        }

        function edit(sender, id) {
            const add = document.querySelector('#add-form');
            const edit = document.querySelector('#edit-form');
            const title = sender.dataset.bannerTitle;
            const category = sender.dataset.category;
            const position = sender.dataset.position;
            const content = sender.dataset.content;
            add.classList.add('d-none');
            edit.classList.remove('d-none');
            edit.querySelector('input[name="banner_id"]').value = id;
            edit.querySelector('input[name="title"]').value = title;
            edit.querySelector('input[name="content"]').value = content;
            const selectCategory = edit.querySelector('select[name="category"]')
            const selectPosition = edit.querySelector('select[name="position"]')
            for (var i = 0; i < selectCategory.options.length; i++) {
                if (selectCategory.options[i].value === category) {
                    selectCategory.selectedIndex = i;
                    break;
                }
            }
            for (var i = 0; i < selectPosition.options.length; i++) {
                if (selectPosition.options[i].value === position) {
                    selectPosition.selectedIndex = i;
                    break;
                }
            }
        }

        function editBanner() {
            const edit = document.querySelector('#edit-form');
            const id = edit.querySelector('input[name="banner_id"]').value;
            const action = 
            edit.action = "{{url('admin/banner/"+id+"')}}";
            console.log(edit.action);
            edit.submit();
        }

        const cancel = () => {
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
