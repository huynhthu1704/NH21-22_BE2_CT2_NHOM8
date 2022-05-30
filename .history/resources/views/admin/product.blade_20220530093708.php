@extends('admin.master')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product List</h1>
                    </div>
                    <div class="col-sm-6 ">
                        <button onclick="addProduct()" class="float-sm-right btn btn-warning"><a
                                style="font-size: 30; color: white">Add Product</a></button>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        {{-- add Product --}}

        <div class="container-fluid px-5 d-none" id="add-form">
            <!-- /.content -->
            <div class="row ">
                <div class="col-md-12">
                    <form class="card card-danger" method="POST" action="{{ route('admin.product.add') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h3 class="card-title">Add products</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="add-product-name">Product name</label>
                                <input type="text" class="form-control" id="add-product-name" name="product_name"
                                    placeholder="Enter product name" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true"
                                            name="product_category" required>
                                            @foreach ($categories as $key => $value)
                                                @if ($key === 0)
                                                    <option value="{{ $value['id'] }}" selected="selected">
                                                        {{ $value['category_name'] }}</option>
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
                                        <label>Brand</label>
                                        <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true"
                                            name="product_brand" required>
                                            @foreach ($brands as $key => $value)
                                                @if ($loop->first)
                                                    <option value="{{ $value['id'] }}" selected="selected">
                                                        {{ $value['brand_name'] }}</option>
                                                @else
                                                    <option value="{{ $value['id'] }}">{{ $value['brand_name'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price (VNĐ)</label>
                                        <input type="number" min="1000" name="product_price" class="form-control" step="1"
                                            value="100000" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" min="0" name="product_quantity" class="form-control" step="1"
                                            value="1" min="1" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Colors -->
                            <div class="row">
                                <label class="form-label col-12">Colors</label>
                                @foreach ($colors as $key => $value)
                                    <div class="form-group col-12 clearfix" name="add_product_color">
                                        <div class="col-4">
                                            <div>
                                                @if ($loop->first)
                                                    <input type="checkbox" id="chkbox{{ $value->id }}"
                                                        name="product_color[]" value="{{ $value->id }}"
                                                        onclick="check(this)" checked required>
                                                @else
                                                    <input type="checkbox" id="chkbox{{ $value->id }}"
                                                        name="product_color[]" value="{{ $value->id }}"
                                                        onclick="check(this)">
                                                @endif
                                                <label for="product-color">
                                                    {{ $value->color_name }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 clearfix" name="add_product_image">
                                        @if ($loop->first)
                                            <div class="col-8"> <input type="file"
                                                    name="product_image_{{ $value->color_name }}[]"
                                                    id="{{ $value->id }}" accept="image/*" multiple required>
                                            </div>
                                        @else
                                            <div class="col-8"> <input type="file"
                                                    name="product_image_{{ $value->color_name }}[]"
                                                    id="{{ $value->id }}" accept="image/*" multiple hidden>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                                {{-- <div class="col-8"> <input type="file" name="product_image"
                                        id="product_image" accept="image/*" required> --}}
                            </div>

                            <!-- Colors -->

                            <!-- Dimensions-->
                            <div class="row">
                                <label class="form-label col-12">Dimension</label>
                                <div class="form-group col-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Width</label>
                                                <input type="number" min="10" name="product_width" class="form-control"
                                                    step="5" value="1" min="1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Height</label>
                                                <input type="number" min="10" name="product_height" class="form-control"
                                                    step="5" value="1" min="1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Weight</label>
                                                <input type="number" min="10" name="product_weight" class="form-control"
                                                    step="10" value="1" min="1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Length</label>
                                                <input type="number" min="10" name="product_length" class="form-control"
                                                    step="10" value="1" min="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Dimensions-->

                            <!--Descriptions-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea id="summernote" name="product_description" required>

                                            </textarea>
                                    </div>
                                </div>
                            </div>
                            <!--Descriptions-->
                        </div>

                        <div class="card-footer">
                            <div id="actions" class="row">
                                <div class="col-lg-6">
                                    <div class="btn-group w-100">
                                        <button type="submit" class="btn btn-success col">
                                            <span>Add Product</span>
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



        {{-- edit product --}}

        <div class="container-fluid px-5 d-none" id="edit-form">
            <!-- /.content -->
            <div class="row ">
                <div class="col-md-12">
                    <form id="form-edit" class="card card-danger" method="POST" action=""
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h3 class="card-title">Edit products</h3>
                        </div>
                        <div class="card-body">
                            <input hidden type="text" class="form-control" id="edit-id" name="banner_id"
                            placeholder="Enter title" required value="">
                            <div class="form-group">
                                <label for="add-product-name">Product name</label>
                                <input type="text" class="form-control" id="edit-product-name" name="product_name"
                                    placeholder="Enter product name" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true"
                                            name="product_category" required>
                                            @foreach ($categories as $key => $value)
                                                @if ($key === 0)
                                                    <option value="{{ $value['id'] }}" selected="selected">
                                                        {{ $value['category_name'] }}</option>
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
                                        <label>Brand</label>
                                        <select class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true"
                                            name="product_brand" required>
                                            @foreach ($brands as $key => $value)
                                                @if ($loop->first)
                                                    <option value="{{ $value['id'] }}" selected="selected">
                                                        {{ $value['brand_name'] }}</option>
                                                @else
                                                    <option value="{{ $value['id'] }}">{{ $value['brand_name'] }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price (VNĐ)</label>
                                        <input type="number" min="1000" name="product_price" class="form-control" step="1"
                                            value="100000" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" min="0" name="product_quantity" class="form-control" step="1"
                                            value="1" min="1" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Colors -->
                            <div class="row">
                                <label class="form-label col-12">Colors</label>
                                @foreach ($colors as $key => $value)
                                    <div class="form-group col-12 clearfix" name="add_product_color">
                                        <div class="col-4">
                                            <div>
                                                @if ($loop->first)
                                                    <input type="checkbox" id="chkbox{{ $value->id }}"
                                                        name="product_color[]" value="{{ $value->id }}"
                                                        onclick="check(this)" checked required>
                                                @else
                                                    <input type="checkbox" id="chkbox{{ $value->id }}"
                                                        name="product_color[]" value="{{ $value->id }}"
                                                        onclick="check(this)">
                                                @endif
                                                <label for="product-color">
                                                    {{ $value->color_name }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 clearfix" name="add_product_image">
                                        @if ($loop->first)
                                            <div class="col-8"> <input type="file"
                                                    name="product_image_{{ $value->color_name }}[]"
                                                    id="{{ $value->id }}" accept="image/*" multiple required>
                                            </div>
                                        @else
                                            <div class="col-8"> <input type="file"
                                                    name="product_image_{{ $value->color_name }}[]"
                                                    id="{{ $value->id }}" accept="image/*" multiple hidden>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <!-- Colors -->

                            <!-- Dimensions-->
                            <div class="row">
                                <label class="form-label col-12">Dimension</label>
                                <div class="form-group col-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Width</label>
                                                <input type="number" min="10" name="product_width" class="form-control"
                                                    step="5" value="1" min="1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Height</label>
                                                <input type="number" min="10" name="product_height" class="form-control"
                                                    step="5" value="1" min="1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Weight</label>
                                                <input type="number" min="10" name="product_weight" class="form-control"
                                                    step="10" value="1" min="1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Length</label>
                                                <input type="number" min="10" name="product_length" class="form-control"
                                                    step="10" value="1" min="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Dimensions-->

                            <!--Descriptions-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea id="summernote" name="product_description" required>

                                            </textarea>
                                    </div>
                                </div>
                            </div>
                            <!--Descriptions-->
                        </div>

                        <div class="card-footer">
                            <div id="actions" class="row">
                                <div class="col-lg-6">
                                    <div class="btn-group w-100">
                                        <button type="submit" class="btn btn-success col" onclick="editProduct()">
                                            <span>Edit Product</span>
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

        {{-- remove product --}}
        <div class="container-fluid px-5" id="remove-form">
            <!-- /.content -->
            <div class="row">
                <div class="col-md-12">
                    <form id="form-remove" class="card card-danger" method="POST" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('delete')
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

                            <!-- /.card-header -->
                            <div class="card-body -responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td><a
                                                        href="{{ route('detail', $product->id) }}">{{ $product->product_name }}</a>
                                                </td>
                                                <td>{{ $product->category_name }}</td>
                                                <td>{{ number_format($product->price) }}</td>
                                                <td>
                                                    <p style="height: 50%; overflow-y: scroll; text-overflow: ellipsis;">
                                                        {{ $product->description }}</p>
                                                </td>
                                                <td><button class="btn btn-success"
                                                    data-product-name={{$product->product_name}}
                                                    data-category={{$product->category_id}}
                                                    data-brand={{$product->brand_id}}
                                                    data-price={{$product->category_id}}
                                                     onclick="edit(this, {{$product->id}})">Edit</button>
                                                </td>
                                                <td><button class="btn btn-warning" onclick="remove({{ $product->id}})">Remove</button></td>
                                            </tr>
                                        @endforeach
                                    <tbody>
                                </table>
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

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('css/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('css/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Page specific script -->
    <script>
        function check(chkbox) {
            const checked = chkbox.checked;
            // chkbox.checked = !checked;
            const input = document.getElementById(chkbox.value);

            if (checked) {
                // alert(chkbox.value);
                input.hidden = false;
                input.required = true;
            } else {
                console.log("Checkbox is not checked..");
                input.hidden = true;
                input.required = false;
            }
        }


        const addProduct = () => {
            document.querySelector('#add-form').classList.remove('d-none');
            document.querySelector('#edit-form').classList.add('d-none');;
        }


        const cancel = () => {
            document.querySelector('#add-form').classList.add('d-none');
            document.querySelector('#edit-form').classList.add('d-none');;
        }

        const remove = (id) => {
            const result = confirm("Do you want to delete this product");
            if (result) {
                const removeForm = document.getElementById('form-remove');
                const action = "{{ url('admin/product') }}/" + id;
                removeForm.action = action;
                removeForm.submit();
            }
        }

        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

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
