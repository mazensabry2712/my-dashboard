@extends('dashboard.layout.master')

@section('title', 'Create Brand')

@section('dashboard_content')
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New Brand</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Brands</a></li>
                            <li class="breadcrumb-item active">Create</li>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-plus"></i> Brand Information
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data" id="brandForm">
                                @csrf
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
                                               value="{{ old('name') }}"
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
                                                  placeholder="Enter brand description (optional)">{{ old('description') }}</textarea>
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
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="form-group">
                                        <label for="image">
                                            <i class="fas fa-image"></i> Brand Image
                                        </label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file"
                                                       class="custom-file-input @error('image') is-invalid @enderror"
                                                       id="image"
                                                       name="image"
                                                       accept="image/*">
                                                <label class="custom-file-label" for="image">Choose image file</label>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted">
                                            <i class="fas fa-info-circle"></i> Allowed formats: JPEG, PNG, JPG, GIF. Max size: 2MB
                                        </small>
                                        @error('image')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <!-- Image Preview -->
                                        <div id="imagePreview" class="mt-3" style="display: none;">
                                            <label class="form-label">Preview:</label><br>
                                            <img id="previewImage" src="" alt="Brand Image Preview"
                                                 class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                            <button type="button" class="btn btn-sm btn-danger ml-2" id="removeImage">
                                                <i class="fas fa-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Create Brand
                                            </button>
                                            <button type="reset" class="btn btn-secondary ml-2" id="resetForm">
                                                <i class="fas fa-undo"></i> Reset
                                            </button>
                                        </div>
                                        <div class="col-md-6 text-right">
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
    // Custom file input label update
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).siblings('.custom-file-label').addClass("selected").html(fileName);

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

    // Remove image preview
    $('#removeImage').on('click', function() {
        $('#image').val('');
        $('.custom-file-label').removeClass("selected").html('Choose image file');
        $('#imagePreview').hide();
    });

    // Reset form functionality
    $('#resetForm').on('click', function() {
        $('#imagePreview').hide();
        $('.custom-file-label').removeClass("selected").html('Choose image file');
    });

    // Form validation
    $('#brandForm').on('submit', function(e) {
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
.card-primary:not(.card-outline) .card-header {
    background-color: #007bff;
    border-color: #007bff;
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

#imagePreview {
    border: 2px dashed #dee2e6;
    border-radius: 8px;
    padding: 15px;
    text-align: center;
    background-color: #f8f9fa;
}

#imagePreview img {
    border: 2px solid #dee2e6;
    border-radius: 8px;
}

.btn i {
    margin-right: 5px;
}

.card-footer {
    background-color: #f8f9fa;
    border-top: 1px solid #dee2e6;
}
</style>
@endpush
@endsection
