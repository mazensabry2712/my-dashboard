@extends('dashboard.layout.master')
@section('title', 'Employee Profile')

@section('dashboard_content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-3">
                <!-- Card Header -->
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <h4 class="card-title mb-2 mb-md-0 text-white">Employee Profile</h4>
                        <div class="d-flex gap-2">
                            <button class="btn btn-light btn-sm">
                                <i class="fas fa-edit"></i>
                                <span class="d-none d-md-inline ms-1">Edit</span>
                            </button>
                            <button class="btn btn-outline-light btn-sm">
                                <i class="fas fa-arrow-left"></i>
                                <span class="d-none d-md-inline ms-1">Back</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body p-3 p-md-4">
                    <!-- Employee Header Section -->
                    <div class="row g-4 mb-4">
                        <div class="col-12 col-md-4 col-lg-3 text-center">
                            <div class="avatar-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto"
                                 style="width: 100px; height: 100px; border-radius: 50%; font-size: 36px;">
                                GW
                            </div>
                        </div>
                        <div class="col-12 col-md-8 col-lg-9">
                            <h2 class="mb-2 text-center text-md-start">Garrett Winters</h2>
                            <h5 class="text-muted mb-3 text-center text-md-start">Accountant</h5>

                            <div class="row g-2 text-center text-md-start">
                                <div class="col-12 col-sm-6">
                                    <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-2">
                                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                        <span><strong>Office:</strong> Tokyo</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-2">
                                        <i class="fas fa-calendar-alt text-primary me-2"></i>
                                        <span><strong>Start Date:</strong> July 25, 2011</span>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-2">
                                        <i class="fas fa-user text-primary me-2"></i>
                                        <span><strong>Age:</strong> 63 years</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-2">
                                        <i class="fas fa-dollar-sign text-success me-2"></i>
                                        <span><strong>Salary:</strong>
                                            <span class="text-success fw-bold">$170,750</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="row g-3 mb-4">
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="stat-card bg-gradient-primary text-white p-3 rounded-3 text-center h-100">
                                <i class="fas fa-briefcase fa-2x mb-2"></i>
                                <h4 class="mb-1">13+</h4>
                                <p class="mb-0 small">Years of Experience</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="stat-card bg-gradient-info text-white p-3 rounded-3 text-center h-100">
                                <i class="fas fa-building fa-2x mb-2"></i>
                                <h4 class="mb-1">Finance</h4>
                                <p class="mb-0 small">Department</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mx-auto mx-lg-0" style="max-width: 300px;">
                            <div class="stat-card bg-gradient-success text-white p-3 rounded-3 text-center h-100">
                                <i class="fas fa-check-circle fa-2x mb-2"></i>
                                <h4 class="mb-1">Active</h4>
                                <p class="mb-0 small">Status</p>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="card bg-light border-0 mb-4">
                        <div class="card-body p-3">
                            <h5 class="card-title mb-3">
                                <i class="fas fa-info-circle text-primary me-2"></i>
                                Additional Information
                            </h5>
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <div class="info-item mb-2">
                                        <label class="form-label text-muted mb-1 small">Employee ID</label>
                                        <div class="info-value fw-semibold">#EMP001</div>
                                    </div>
                                    <div class="info-item mb-2">
                                        <label class="form-label text-muted mb-1 small">Hire Date</label>
                                        <div class="info-value fw-semibold">July 25, 2011</div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="info-item mb-2">
                                        <label class="form-label text-muted mb-1 small">Manager</label>
                                        <div class="info-value fw-semibold">John Smith</div>
                                    </div>
                                    <div class="info-item mb-2">
                                        <label class="form-label text-muted mb-1 small">Employment Type</label>
                                        <div class="info-value">
                                            <span class="badge bg-success">Full Time</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex flex-column flex-sm-row gap-2 justify-content-center">
                        <button class="btn btn-primary">
                            <i class="fas fa-file-alt me-2"></i>
                            View Full Report
                        </button>
                        <button class="btn btn-outline-secondary">
                            <i class="fas fa-download me-2"></i>
                            Export Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Gradient backgrounds */
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.bg-gradient-info {
    background: linear-gradient(135deg, #36d1dc 0%, #5b86e5 100%);
}

.bg-gradient-success {
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
}

/* Card styling */
.stat-card {
    border: none;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    min-height: 120px;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
}

.card-header {
    border-radius: 15px 15px 0 0 !important;
    border: none;
}

/* Info styling */
.info-value {
    color: #495057;
    font-size: 0.95rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card-body {
        padding: 1rem !important;
    }

    .stat-card {
        min-height: 100px;
    }

    .stat-card h4 {
        font-size: 1.5rem;
    }

    .stat-card .fa-2x {
        font-size: 1.5em;
    }

    .avatar-circle {
        width: 80px !important;
        height: 80px !important;
        font-size: 28px !important;
    }
}

@media (max-width: 576px) {
    h2 {
        font-size: 1.5rem;
    }

    h5 {
        font-size: 1.1rem;
    }

    .btn {
        font-size: 0.875rem;
    }
}
</style>

@endsection
