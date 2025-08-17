@extends('dashboard.layout.master')

@section('title', 'Brands')

@section('dashboard_content')
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Brands Management</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Brands</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Success Alert -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Brands DataTable</h3>
                                    <div class="card-tools">
                                        <a href="{{ route('brands.create') }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-plus"></i> Add New Brand
                                        </a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- Buttons will be placed here by DataTables -->
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <div id="brandsTable_wrapper_buttons"></div>
                                        </div>
                                    </div>
                                    <table id="brandsTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-sort"></i> ID
                                                </th>
                                                <th>
                                                    <i class="fas fa-sort"></i> Image
                                                </th>
                                                <th>
                                                    <i class="fas fa-sort"></i> Brand Name
                                                </th>
                                                <th>
                                                    <i class="fas fa-sort"></i> Description
                                                </th>
                                                <th>
                                                    <i class="fas fa-sort"></i> Status
                                                </th>
                                                <th>
                                                    <i class="fas fa-sort"></i> Created Date
                                                </th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($brands as $brand)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>
                                                        @if ($brand->image)
                                                            <img src="{{ asset('storage/' . $brand->image) }}"
                                                                alt="{{ $brand->name }}"
                                                                class="img-thumbnail brand-image-thumbnail"
                                                                style="width: 50px; height: 50px; object-fit: cover; cursor: pointer;">
                                                        @else
                                                            <span class="badge badge-secondary">No Image</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $brand->name }}</td>
                                                    <td>{{ Str::limit($brand->description, 50) ?? 'No description' }}</td>
                                                    <td>
                                                        @if ($brand->status === 'active')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-warning">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $brand->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                        <a href="{{ route('brands.show', $brand->id) }}"
                                                            class="btn btn-sm btn-info" title="View">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('brands.edit', $brand->id) }}"
                                                            class="btn btn-sm btn-primary" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('brands.destroy', $brand->id) }}"
                                                            method="POST" style="display: inline-block;"
                                                            onsubmit="return confirm('Are you sure you want to delete this brand?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Brand Name</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <!-- Dynamic Image Modal will be created by JavaScript -->
    <!-- No need for static modal anymore -->

    @push('scripts')
        <!-- DataTables & Plugins -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                var table = $("#brandsTable").DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    "paging": true,
                    "lengthMenu": [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    "pageLength": 10,
                    "ordering": true,
                    "info": true,
                    "searching": true,
                    "order": [
                        [0, "asc"]
                    ], // Default sort by ID ascending
                    "columnDefs": [{
                            "orderable": true,
                            "targets": [0, 2, 3, 4,
                                5] // Allow sorting on ID, Brand Name, Description, Status, Created Date
                        },
                        {
                            "orderable": false,
                            "targets": [1, 6] // Disable sorting on Image and Actions column
                        }
                    ],
                    "buttons": [{
                            extend: 'copy',
                            text: '<i class="fas fa-copy"></i> Copy',
                            className: 'btn btn-secondary btn-sm',
                            exportOptions: {
                                columns: [0, 2, 3, 4, 5] // Exclude Image and Actions column from export
                            }
                        },
                        {
                            extend: 'csv',
                            text: '<i class="fas fa-file-csv"></i> CSV',
                            className: 'btn btn-success btn-sm',
                            filename: 'brands_data',
                            exportOptions: {
                                columns: [0, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: 'excel',
                            text: '<i class="fas fa-file-excel"></i> Excel',
                            className: 'btn btn-success btn-sm',
                            filename: 'brands_data',
                            title: 'Brands List',
                            exportOptions: {
                                columns: [0, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="fas fa-file-pdf"></i> PDF',
                            className: 'btn btn-danger btn-sm',
                            filename: 'brands_data',
                            title: 'Brands List',
                            orientation: 'landscape',
                            pageSize: 'A4',
                            exportOptions: {
                                columns: [0, 2, 3, 4, 5]
                            },
                            customize: function(doc) {
                                doc.content[1].table.widths = ['10%', '25%', '25%', '15%', '20%'];
                                doc.styles.tableHeader.fontSize = 12;
                                doc.styles.tableBodyEven.fontSize = 10;
                                doc.styles.tableBodyOdd.fontSize = 10;
                            }
                        },
                        {
                            extend: 'print',
                            text: '<i class="fas fa-print"></i> Print',
                            className: 'btn btn-info btn-sm',
                            title: 'Brands List',
                            exportOptions: {
                                columns: [0, 2, 3, 4, 5]
                            },
                            customize: function(win) {
                                $(win.document.body)
                                    .css('font-size', '12pt')
                                    .prepend(
                                        '<div style="text-align:center;"><h2>Brands Management Report</h2></div>'
                                    );
                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', '10pt');
                            }
                        },
                        {
                            extend: 'colvis',
                            text: '<i class="fas fa-columns"></i> Column visibility',
                            className: 'btn btn-warning btn-sm'
                        }
                    ],
                    "language": {
                        "search": "Search:",
                        "lengthMenu": "Show _MENU_ entries per page",
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                        "infoEmpty": "Showing 0 to 0 of 0 entries",
                        "infoFiltered": "(filtered from _MAX_ total entries)",
                        "paginate": {
                            "first": "First",
                            "last": "Last",
                            "next": "Next",
                            "previous": "Previous"
                        },
                        "emptyTable": "No data available in table",
                        "zeroRecords": "No matching records found",
                        "loadingRecords": "Loading...",
                        "processing": "Processing..."
                    },
                    "dom": "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
                        "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    "initComplete": function() {
                        // Move buttons to the designated container
                        var buttonsHtml = $('.dt-buttons').html();
                        if (buttonsHtml) {
                            $('#brandsTable_wrapper_buttons').html('<div class="dt-buttons btn-group">' +
                                buttonsHtml + '</div>');
                            $('.dt-buttons').first().hide();
                        }

                        // Add custom styling to buttons after initialization
                        setTimeout(function() {
                            $('#brandsTable_wrapper_buttons .dt-button').addClass('mr-2 mb-2');
                        }, 100);
                    }
                });

                // Auto-hide success alert after 5 seconds
                setTimeout(function() {
                    $('.alert-success').fadeOut('slow');
                }, 5000);

                // Simple Dynamic Image Modal (works 100%)
                $(document).on('click', '.brand-image-thumbnail', function() {
                    var src = $(this).attr('src');
                    var title = $(this).attr('alt') || 'Brand Image';

                    console.log('Image clicked:', src); // للتشخيص

                    // حذف أي مودال قديم
                    $('#dynamicImageModal').remove();

                    // إنشاء مودال جديد
                    var modalHtml = `
            <div class="modal fade" id="dynamicImageModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                        <div class="modal-header" style="background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); color: white; border: none;">
                            <h5 class="modal-title" style="font-weight: 600;">
                                <i class="fas fa-image"></i> ${title}
                            </h5>
                            <button type="button" class="close text-white" data-dismiss="modal" style="opacity: 0.8;">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center" style="background: #f8f9fa; padding: 30px;">
                            <div class="loading-spinner text-center mb-3">
                                <i class="fas fa-spinner fa-spin fa-2x text-primary"></i>
                                <p class="mt-2 text-muted">Loading image...</p>
                            </div>
                            <div class="image-container" style="display: none;">
                                <img class="img-fluid modal-main-image"
                                     style="max-height: 500px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            </div>
                            <div class="error-container" style="display: none;">
                                <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                                <p>Image could not be loaded</p>
                                <button type="button" class="btn btn-primary btn-sm" onclick="window.open('${src}', '_blank')">
                                    <i class="fas fa-external-link-alt"></i> Open in New Tab
                                </button>
                            </div>
                        </div>
                        <div class="modal-footer" style="background: #f8f9fa; border-top: 1px solid #e9ecef; justify-content: center;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="fas fa-times"></i> Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;

                    // إضافة المودال للصفحة
                    $('body').append(modalHtml);

                    // تحميل الصورة
                    var img = new Image();
                    img.onload = function() {
                        console.log('Image loaded successfully');
                        $('#dynamicImageModal .modal-main-image').attr('src', src).attr('alt', title);
                        $('#dynamicImageModal .loading-spinner').hide();
                        $('#dynamicImageModal .image-container').fadeIn(500);
                    };

                    img.onerror = function() {
                        console.error('Failed to load image:', src);
                        $('#dynamicImageModal .loading-spinner').hide();
                        $('#dynamicImageModal .error-container').fadeIn(500);
                    };

                    // إظهار المودال
                    $('#dynamicImageModal').modal('show');

                    // بدء تحميل الصورة
                    img.src = src;

                    // إزالة المودال عند الإغلاق
                    $('#dynamicImageModal').on('hidden.bs.modal', function() {
                        $(this).remove();
                    });
                });

                // Remove old modal handlers
                $('#imageModal').off();

                // Add hover effect to thumbnails
                $('.brand-image-thumbnail').hover(
                    function() {
                        $(this).css('transform', 'scale(1.1)');
                    },
                    function() {
                        $(this).css('transform', 'scale(1)');
                    }
                );
            });
        </script>
    @endpush

    @push('styles')
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

        <style>
            /* Custom DataTable Styling */
            .dataTables_wrapper .dt-buttons {
                float: none;
                margin-bottom: 15px;
                text-align: left;
            }

            #brandsTable_wrapper_buttons {
                margin-bottom: 15px;
                border-bottom: 1px solid #dee2e6;
                padding-bottom: 10px;
            }

            #brandsTable_wrapper_buttons .dt-buttons {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
            }

            .dt-button {
                margin-right: 0 !important;
                margin-bottom: 0 !important;
                border-radius: 4px;
                font-size: 14px;
                font-weight: 500;
                padding: 6px 12px;
                border: 1px solid transparent;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 5px;
            }

            /* Fix the number display in length menu */
            .dataTables_length select {
                border: 1px solid #ddd;
                border-radius: 3px;
                padding: 3px 5px;
                width: auto;
                min-width: 60px;
            }

            /* Improved sorting arrows - position them next to numbers, not inside */
            table.dataTable thead th {
                position: relative;
                padding-right: 30px;
            }

            table.dataTable thead .sorting:before,
            table.dataTable thead .sorting:after,
            table.dataTable thead .sorting_asc:before,
            table.dataTable thead .sorting_asc:after,
            table.dataTable thead .sorting_desc:before,
            table.dataTable thead .sorting_desc:after {
                position: absolute;
                right: 8px;
                display: block;
                font-family: 'Font Awesome 5 Free';
                font-weight: 900;
                line-height: 1;
                font-size: 12px;
            }

            table.dataTable thead .sorting:before {
                content: "\f0dc";
                color: #ddd;
                top: 50%;
                transform: translateY(-50%);
            }

            table.dataTable thead .sorting:after {
                content: "";
            }

            table.dataTable thead .sorting_asc:before {
                content: "\f0de";
                color: #333;
                top: 50%;
                transform: translateY(-50%);
            }

            table.dataTable thead .sorting_asc:after {
                content: "";
            }

            table.dataTable thead .sorting_desc:before {
                content: "\f0dd";
                color: #333;
                top: 50%;
                transform: translateY(-50%);
            }

            table.dataTable thead .sorting_desc:after {
                content: "";
            }

            /* Remove the default DataTables sorting arrows */
            table.dataTable thead .sorting:before,
            table.dataTable thead .sorting:after,
            table.dataTable thead .sorting_asc:before,
            table.dataTable thead .sorting_asc:after,
            table.dataTable thead .sorting_desc:before,
            table.dataTable thead .sorting_desc:after,
            table.dataTable thead .sorting_asc_disabled:before,
            table.dataTable thead .sorting_asc_disabled:after,
            table.dataTable thead .sorting_desc_disabled:before,
            table.dataTable thead .sorting_desc_disabled:after {
                bottom: auto;
                right: 8px;
                top: 50%;
                transform: translateY(-50%);
            }

            /* Hide the default second arrow */
            table.dataTable thead .sorting:after,
            table.dataTable thead .sorting_asc:after,
            table.dataTable thead .sorting_desc:after,
            table.dataTable thead .sorting_asc_disabled:after,
            table.dataTable thead .sorting_desc_disabled:after {
                display: none;
            }

            /* Enhanced Pagination Styling */
            .dataTables_wrapper .dataTables_paginate {
                float: right;
                text-align: right;
                padding-top: 0.25em;
                margin-top: 15px;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button {
                box-sizing: border-box;
                display: inline-block;
                min-width: 2.5em;
                padding: 8px 12px;
                margin-left: 4px;
                text-align: center;
                text-decoration: none;
                cursor: pointer;
                color: #333 !important;
                border: 1px solid #ddd;
                border-radius: 6px;
                background: #fff;
                font-weight: 500;
                font-size: 14px;
                transition: all 0.3s ease;
                position: relative;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                color: #495057 !important;
                border-color: #007bff;
                background-color: #f8f9fa;
                transform: translateY(-1px);
                box-shadow: 0 2px 8px rgba(0, 123, 255, 0.15);
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                color: white !important;
                border: 1px solid #007bff;
                background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
                box-shadow: 0 3px 10px rgba(0, 123, 255, 0.3);
                font-weight: 600;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
                transform: none;
                background: linear-gradient(135deg, #0056b3 0%, #004085 100%);
                box-shadow: 0 4px 12px rgba(0, 123, 255, 0.4);
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
                color: #6c757d !important;
                cursor: not-allowed;
                border-color: #e9ecef;
                background-color: #f8f9fa;
                opacity: 0.6;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
                transform: none;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                border-color: #e9ecef;
                background-color: #f8f9fa;
            }

            /* Special styling for Previous and Next buttons */
            .dataTables_wrapper .dataTables_paginate .paginate_button.previous,
            .dataTables_wrapper .dataTables_paginate .paginate_button.next {
                font-weight: 600;
                min-width: 3em;
                background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
                color: white !important;
                border-color: #6c757d;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button.previous:hover,
            .dataTables_wrapper .dataTables_paginate .paginate_button.next:hover {
                background: linear-gradient(135deg, #495057 0%, #343a40 100%);
                color: white !important;
                border-color: #495057;
            }

            /* First and Last buttons styling */
            .dataTables_wrapper .dataTables_paginate .paginate_button.first,
            .dataTables_wrapper .dataTables_paginate .paginate_button.last {
                font-weight: 600;
                background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
                color: white !important;
                border-color: #28a745;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button.first:hover,
            .dataTables_wrapper .dataTables_paginate .paginate_button.last:hover {
                background: linear-gradient(135deg, #1e7e34 0%, #155724 100%);
                color: white !important;
                border-color: #1e7e34;
            }

            /* Hide the top pagination completely, keep only bottom one */
            .dataTables_wrapper .row:nth-child(2) .dataTables_paginate {
                display: none;
            }

            /* Add separator between pagination and info */
            .dataTables_wrapper .row:last-child {
                border-top: 1px solid #e9ecef;
                padding-top: 15px;
                margin-top: 15px;
            }

            /* Info and length styling */
            .dataTables_wrapper .dataTables_info {
                padding-top: 8px;
            }

            /* Search box styling */
            .dataTables_wrapper .dataTables_filter input {
                border: 1px solid #ddd;
                border-radius: 3px;
                padding: 5px 10px;
                margin-left: 5px;
            }

            /* Action buttons styling */
            .btn-sm {
                margin-right: 2px;
                margin-bottom: 2px;
            }

            /* Image styling */
            .img-thumbnail {
                border: 1px solid #dee2e6;
                border-radius: 0.375rem;
            }

            /* Brand Image Thumbnail Styling */
            .brand-image-thumbnail {
                transition: all 0.3s ease;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .brand-image-thumbnail:hover {
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
                border-color: #007bff;
            }

            /* Loading spinner styling */
            .fa-spinner {
                animation: fa-spin 2s infinite linear;
            }

            @keyframes fa-spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }

            /* Image Modal Styling */
            #imageModal .modal-dialog {
                max-width: 800px;
            }

            /* Remove old modal CSS as we're using dynamic modal */
        </style>
    @endpush
@endsection
