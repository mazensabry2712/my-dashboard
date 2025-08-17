@extends('dashboard.layout.master')

@section('title', 'Brand Details')

@section('dashboard_content')
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Brand Details: {{ $brand->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Brands</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Brand Information Card -->
                    <div class="col-md-8">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-info-circle"></i> Brand Information
                                </h3>
                                <div class="card-tools">
                                    <!-- Status Badge -->
                                    @if($brand->status === 'active')
                                        <span class="badge badge-success badge-lg">
                                            <i class="fas fa-check-circle"></i> Active
                                        </span>
                                    @else
                                        <span class="badge badge-warning badge-lg">
                                            <i class="fas fa-pause-circle"></i> Inactive
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 200px;">
                                                        <i class="fas fa-id-badge text-primary"></i> Brand ID
                                                    </th>
                                                    <td><strong>#{{ $brand->id }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <i class="fas fa-tag text-primary"></i> Brand Name
                                                    </th>
                                                    <td><strong>{{ $brand->name }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <i class="fas fa-align-left text-primary"></i> Description
                                                    </th>
                                                    <td>
                                                        @if($brand->description)
                                                            <p class="mb-0">{{ $brand->description }}</p>
                                                        @else
                                                            <em class="text-muted">No description provided</em>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <i class="fas fa-toggle-on text-primary"></i> Status
                                                    </th>
                                                    <td>
                                                        @if($brand->status === 'active')
                                                            <span class="badge badge-success">
                                                                <i class="fas fa-check-circle"></i> Active
                                                            </span>
                                                        @else
                                                            <span class="badge badge-warning">
                                                                <i class="fas fa-pause-circle"></i> Inactive
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <i class="fas fa-calendar-plus text-primary"></i> Created Date
                                                    </th>
                                                    <td>
                                                        <strong>{{ $brand->created_at->format('F d, Y') }}</strong>
                                                        <small class="text-muted">
                                                            ({{ $brand->created_at->format('h:i A') }})
                                                        </small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <i class="fas fa-calendar-edit text-primary"></i> Last Updated
                                                    </th>
                                                    <td>
                                                        <strong>{{ $brand->updated_at->format('F d, Y') }}</strong>
                                                        <small class="text-muted">
                                                            ({{ $brand->updated_at->format('h:i A') }})
                                                        </small>
                                                        @if($brand->created_at->ne($brand->updated_at))
                                                            <br><small class="text-info">
                                                                <i class="fas fa-info-circle"></i>
                                                                Modified {{ $brand->updated_at->diffForHumans() }}
                                                            </small>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Action Buttons -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i> Edit Brand
                                        </a>
                                        <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fas fa-trash"></i> Delete Brand
                                        </button>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a href="{{ route('brands.index') }}" class="btn btn-default">
                                            <i class="fas fa-arrow-left"></i> Back to List
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Brand Image Card -->
                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-image"></i> Brand Image
                                </h3>
                            </div>
                            <div class="card-body text-center">
                                @if($brand->image)
                                    <div class="brand-image-container">
                                        <img src="{{ asset('storage/' . $brand->image) }}"
                                             alt="{{ $brand->name }}"
                                             class="img-fluid brand-display-image"
                                             id="brandImage">
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-sm btn-info" onclick="viewImageFullscreen()">
                                                <i class="fas fa-expand"></i> View Full Size
                                            </button>
                                            <a href="{{ asset('storage/' . $brand->image) }}"
                                               download="{{ $brand->name }}_image"
                                               class="btn btn-sm btn-success ml-2">
                                                <i class="fas fa-download"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="no-image-placeholder">
                                        <i class="fas fa-image fa-5x text-muted mb-3"></i>
                                        <h5 class="text-muted">No Image Available</h5>
                                        <p class="text-muted">This brand doesn't have an image yet.</p>
                                        <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-plus"></i> Add Image
                                        </a>
                                    </div>
                                @endif
                            </div>
                            @if($brand->image)
                                <div class="card-footer">
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle"></i>
                                        Click "View Full Size" to see the complete image
                                    </small>
                                </div>
                            @endif
                        </div>

                        <!-- Quick Actions Card -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-bolt"></i> Quick Actions
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-block btn-warning">
                                        <i class="fas fa-edit"></i> Edit Brand
                                    </a>
                                    <a href="{{ route('brands.create') }}" class="btn btn-block btn-primary">
                                        <i class="fas fa-plus"></i> Add New Brand
                                    </a>
                                    <button type="button" class="btn btn-block btn-info" onclick="printBrandInfo()">
                                        <i class="fas fa-print"></i> Print Details
                                    </button>
                                    <button type="button" class="btn btn-block btn-success" onclick="shareBrand()">
                                        <i class="fas fa-share-alt"></i> Share Brand
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle"></i> Confirm Deletion
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-exclamation-triangle fa-3x text-danger mb-3"></i>
                    <h5>Are you sure you want to delete this brand?</h5>
                    <p class="text-muted">
                        Brand: <strong>{{ $brand->name }}</strong><br>
                        This action cannot be undone and will permanently remove all brand data.
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cancel
                </button>
                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Yes, Delete Brand
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Fullscreen Image Modal -->
@if($brand->image)
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">
                    <i class="fas fa-image"></i> {{ $brand->name }} - Full Image
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center p-0">
                <img src="{{ asset('storage/' . $brand->image) }}"
                     alt="{{ $brand->name }}"
                     class="img-fluid w-100">
            </div>
            <div class="modal-footer">
                <a href="{{ asset('storage/' . $brand->image) }}"
                   download="{{ $brand->name }}_image"
                   class="btn btn-success">
                    <i class="fas fa-download"></i> Download Image
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>
@endif

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();
});

// View image in fullscreen
function viewImageFullscreen() {
    @if($brand->image)
        $('#imageModal').modal('show');
    @endif
}

// Print brand information
function printBrandInfo() {
    const printContent = `
        <div style="padding: 20px; font-family: Arial, sans-serif;">
            <div style="text-align: center; margin-bottom: 30px;">
                <h2 style="color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px;">
                    Brand Details Report
                </h2>
            </div>
            <div style="margin-bottom: 20px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px; font-weight: bold; width: 30%;">Brand ID:</td>
                        <td style="padding: 10px;">#{{ $brand->id }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px; font-weight: bold;">Brand Name:</td>
                        <td style="padding: 10px;">{{ $brand->name }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px; font-weight: bold;">Description:</td>
                        <td style="padding: 10px;">{{ $brand->description ?: 'No description provided' }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px; font-weight: bold;">Status:</td>
                        <td style="padding: 10px;">{{ ucfirst($brand->status) }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px; font-weight: bold;">Created Date:</td>
                        <td style="padding: 10px;">{{ $brand->created_at->format('F d, Y h:i A') }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px; font-weight: bold;">Last Updated:</td>
                        <td style="padding: 10px;">{{ $brand->updated_at->format('F d, Y h:i A') }}</td>
                    </tr>
                </table>
            </div>
            <div style="text-align: center; margin-top: 30px; color: #666; font-size: 12px;">
                Generated on {{ date('F d, Y h:i A') }}
            </div>
        </div>
    `;

    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
            <head>
                <title>Brand Details - {{ $brand->name }}</title>
                <style>
                    body { margin: 0; padding: 20px; }
                    @media print {
                        body { margin: 0; }
                    }
                </style>
            </head>
            <body>
                ${printContent}
            </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}

// Share brand (copy link to clipboard)
function shareBrand() {
    const brandUrl = window.location.href;

    if (navigator.clipboard) {
        navigator.clipboard.writeText(brandUrl).then(function() {
            toastr.success('Brand link copied to clipboard!');
        }).catch(function() {
            fallbackCopyToClipboard(brandUrl);
        });
    } else {
        fallbackCopyToClipboard(brandUrl);
    }
}

// Fallback copy method for older browsers
function fallbackCopyToClipboard(text) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.position = "fixed";
    textArea.style.left = "-999999px";
    textArea.style.top = "-999999px";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();

    try {
        document.execCommand('copy');
        toastr.success('Brand link copied to clipboard!');
    } catch (err) {
        toastr.error('Unable to copy link. Please copy manually: ' + text);
    }

    document.body.removeChild(textArea);
}
</script>
@endpush

@push('styles')
<style>
.badge-lg {
    font-size: 0.9em;
    padding: 0.5em 0.8em;
}

.brand-display-image {
    max-width: 100%;
    max-height: 300px;
    border: 3px solid #28a745;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.brand-display-image:hover {
    transform: scale(1.05);
    cursor: pointer;
}

.brand-image-container {
    padding: 20px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 10px;
    margin-bottom: 10px;
}

.no-image-placeholder {
    padding: 40px 20px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 10px;
    border: 2px dashed #dee2e6;
}

.table th {
    background-color: #f8f9fa;
    border-top: none;
    vertical-align: middle;
}

.table td {
    vertical-align: middle;
}

.card-info:not(.card-outline) .card-header {
    background-color: #17a2b8;
    border-color: #17a2b8;
}

.card-success:not(.card-outline) .card-header {
    background-color: #28a745;
    border-color: #28a745;
}

.card-secondary:not(.card-outline) .card-header {
    background-color: #6c757d;
    border-color: #6c757d;
}

.d-grid {
    display: grid;
    gap: 0.5rem;
}

.btn-block {
    width: 100%;
    margin-bottom: 0.5rem;
}

.btn i {
    margin-right: 8px;
}

.modal-body img {
    max-height: 70vh;
    object-fit: contain;
}

.card-footer {
    background-color: #f8f9fa;
    border-top: 1px solid #dee2e6;
}

/* Print styles */
@media print {
    .card-tools,
    .card-footer,
    .btn,
    .breadcrumb {
        display: none !important;
    }

    .card {
        border: 1px solid #dee2e6 !important;
        box-shadow: none !important;
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card-footer .row > div {
        text-align: center !important;
        margin-bottom: 10px;
    }

    .brand-display-image {
        max-height: 200px;
    }

    .d-grid {
        gap: 0.75rem;
    }
}
</style>
@endpush
@endsection
