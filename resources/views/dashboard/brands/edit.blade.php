@extends('dashboard.layout.master')

@section('title', 'Edit Brand')

@section('dashboard_content')
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Brand: {{ $brand->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Brands</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Error Alert -->
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> Please fix the following errors:
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i> Edit Brand Information
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data" id="brandEditForm">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <!-- Brand Name -->
                                    <div class="form-group">
                                        <label for="name">
                                            <i class="fas fa-tag"></i> Brand Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               id="name"
                                               name="name"
                                               placeholder="Enter brand name"
                                               value="{{ old('name', $brand->name) }}"
                                               required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Description -->
                                    <div class="form-group">
                                        <label for="description">
                                            <i class="fas fa-align-left"></i> Description
                                        </label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                                  id="description"
                                                  name="description"
                                                  rows="4"
                                                  placeholder="Enter brand description (optional)">{{ old('description', $brand->description) }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div class="form-group">
                                        <label for="status">
                                            <i class="fas fa-toggle-on"></i> Status <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control @error('status') is-invalid @enderror"
                                                id="status"
                                                name="status"
                                                required>
                                            <option value="">Select Status</option>
                                            <option value="active" {{ old('status', $brand->status) == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status', $brand->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Current Image Display -->
                                    @if($brand->image)
                                        <div class="form-group">
                                            <label>
                                                <i class="fas fa-image"></i> Current Image
                                            </label>
                                            <div class="current-image-container">
                                                <img src="{{ asset('storage/' . $brand->image) }}"
                                                     alt="{{ $brand->name }}"
                                                     class="img-thumbnail current-brand-image">
                                                <div class="mt-2">
                                                    <button type="button" class="btn btn-sm btn-danger" id="deleteCurrentImage">
                                                        <i class="fas fa-trash"></i> Remove Current Image
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Image Upload -->
                                    <div class="form-group">
                                        <label for="image">
                                            <i class="fas fa-image"></i>
                                            @if($brand->image) Update Brand Image @else Add Brand Image @endif
                                        </label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file"
                                                       class="custom-file-input @error('image') is-invalid @enderror"
                                                       id="image"
                                                       name="image"
                                                       accept="image/*">
                                                <label class="custom-file-label" for="image">
                                                    @if($brand->image) Choose new image file @else Choose image file @endif
                                                </label>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted">
                                            <i class="fas fa-info-circle"></i> Allowed formats: JPEG, PNG, JPG, GIF. Max size: 2MB
                                            @if($brand->image) <br><i class="fas fa-warning text-warning"></i> Uploading a new image will replace the current one @endif
                                        </small>
                                        @error('image')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <!-- New Image Preview -->
                                        <div id="imagePreview" class="mt-3" style="display: none;">
                                            <label class="form-label">New Image Preview:</label><br>
                                            <img id="previewImage" src="" alt="Brand Image Preview"
                                                 class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                            <button type="button" class="btn btn-sm btn-danger ml-2" id="removeNewImage">
                                                <i class="fas fa-trash"></i> Remove Preview
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-warning">
                                                <i class="fas fa-save"></i> Update Brand
                                            </button>
                                            <button type="reset" class="btn btn-secondary ml-2" id="resetForm">
                                                <i class="fas fa-undo"></i> Reset Changes
                                            </button>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="{{ route('brands.show', $brand->id) }}" class="btn btn-info mr-2">
                                                <i class="fas fa-eye"></i> View Brand
                                            </a>
                                            <a href="{{ route('brands.index') }}" class="btn btn-default">
                                                <i class="fas fa-arrow-left"></i> Back to List
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    let originalValues = {
        name: $('#name').val(),
        description: $('#description').val(),
        status: $('#status').val()
    };

    // Custom file input label update
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).siblings('.custom-file-label').addClass("selected").html(fileName || 'Choose image file');

        // Show image preview
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
                $('#imagePreview').show();
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Remove new image preview
    $('#removeNewImage').on('click', function() {
        $('#image').val('');
        $('.custom-file-label').removeClass("selected").html(@if($brand->image) 'Choose new image file' @else 'Choose image file' @endif);
        $('#imagePreview').hide();
    });

    // Delete current image (visual only - actual deletion happens on form submit)
    $('#deleteCurrentImage').on('click', function() {
        if (confirm('Are you sure you want to remove the current image? This action cannot be undone after saving.')) {
            $('.current-image-container').fadeOut();
            // Add a hidden input to mark image for deletion
            if (!$('#delete_current_image').length) {
                $('#brandEditForm').append('<input type="hidden" name="delete_current_image" id="delete_current_image" value="1">');
            }
        }
    });

    // Reset form functionality
    $('#resetForm').on('click', function() {
        // Reset to original values
        $('#name').val(originalValues.name);
        $('#description').val(originalValues.description);
        $('#status').val(originalValues.status);

        // Reset image inputs
        $('#image').val('');
        $('.custom-file-label').removeClass("selected").html(@if($brand->image) 'Choose new image file' @else 'Choose image file' @endif);
        $('#imagePreview').hide();

        // Show current image if it was hidden
        $('.current-image-container').show();
        $('#delete_current_image').remove();

        // Remove validation classes
        $('.form-control').removeClass('is-invalid');
    });

    // Form validation and change detection
    $('#brandEditForm').on('submit', function(e) {
        let isValid = true;
        let name = $('#name').val().trim();
        let status = $('#status').val();

        if (!name) {
            isValid = false;
            $('#name').addClass('is-invalid');
        } else {
            $('#name').removeClass('is-invalid');
        }

        if (!status) {
            isValid = false;
            $('#status').addClass('is-invalid');
        } else {
            $('#status').removeClass('is-invalid');
        }

        if (!isValid) {
            e.preventDefault();
            toastr.error('Please fill in all required fields.');
            return;
        }

        // Check if anything has changed
        let currentValues = {
            name: $('#name').val(),
            description: $('#description').val(),
            status: $('#status').val()
        };

        let hasChanges = false;
        Object.keys(originalValues).forEach(key => {
            if (originalValues[key] !== currentValues[key]) {
                hasChanges = true;
            }
        });

        // Check if new image is uploaded or current image is marked for deletion
        if ($('#image').val() || $('#delete_current_image').length) {
            hasChanges = true;
        }

        if (!hasChanges) {
            e.preventDefault();
            toastr.info('No changes detected. Please make some changes before saving.');
        }
    });

    // Highlight changed fields
    $('#name, #description, #status').on('input change', function() {
        let fieldName = $(this).attr('name');
        if ($(this).val() !== originalValues[fieldName]) {
            $(this).addClass('field-changed');
        } else {
            $(this).removeClass('field-changed');
        }
    });

    // Auto-hide error alerts after 10 seconds
    setTimeout(function() {
        $('.alert-danger').fadeOut('slow');
    }, 10000);
});
</script>
@endpush

@push('styles')
<style>
.card-warning:not(.card-outline) .card-header {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #212529;
}

.form-group label {
    font-weight: 600;
    color: #495057;
}

.text-danger {
    color: #dc3545 !important;
}

.custom-file-label::after {
    content: "Browse";
}

.current-brand-image {
    max-width: 200px;
    max-height: 200px;
    border: 2px solid #dee2e6;
    border-radius: 8px;
}

.current-image-container {
    border: 2px dashed #28a745;
    border-radius: 8px;
    padding: 15px;
    text-align: center;
    background-color: #f8fff9;
}

#imagePreview {
    border: 2px dashed #007bff;
    border-radius: 8px;
    padding: 15px;
    text-align: center;
    background-color: #f0f8ff;
}

#imagePreview img {
    border: 2px solid #007bff;
    border-radius: 8px;
}

.btn i {
    margin-right: 5px;
}

.card-footer {
    background-color: #f8f9fa;
    border-top: 1px solid #dee2e6;
}

.field-changed {
    border-left: 4px solid #ffc107 !important;
    background-color: #fffbf0;
}

.field-changed:focus {
    border-left: 4px solid #ffc107 !important;
    box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
}
</style>
@endpush
@endsection
