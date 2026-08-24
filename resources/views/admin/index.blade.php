@extends('layouts.master')

@push('css')
<style>
    /* Modern Dashboard Styling Overrides */
    .dashboard-header-title {
        font-weight: 700;
        letter-spacing: -0.5px;
        color: #1e293b;
    }

    body.dark-mode .dashboard-header-title {
        color: #f1f5f9;
    }

    .stat-card-modern {
        border-radius: 12px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        position: relative;
        background: #ffffff;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
    }

    body.dark-mode .stat-card-modern {
        background: #1e293b;
        border-color: rgba(255, 255, 255, 0.05);
    }

    .stat-card-modern:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 20px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.04);
    }

    .stat-card-body {
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        line-height: 1.2;
        color: #0f172a;
    }

    body.dark-mode .stat-value {
        color: #f8fafc;
    }

    .stat-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: #64748b;
        margin-top: 0.25rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    body.dark-mode .stat-label {
        color: #94a3b8;
    }

    .stat-icon-wrapper {
        width: 52px;
        height: 52px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    /* Icon Variations */
    .stat-primary .stat-icon-wrapper { background-color: rgba(59, 130, 246, 0.12); color: #2563eb; }
    .stat-success .stat-icon-wrapper { background-color: rgba(16, 185, 129, 0.12); color: #059669; }
    .stat-warning .stat-icon-wrapper { background-color: rgba(245, 158, 11, 0.12); color: #d97706; }
    .stat-danger .stat-icon-wrapper { background-color: rgba(239, 68, 68, 0.12); color: #dc2626; }

    .stat-card-footer {
        background-color: #f8fafc;
        padding: 0.75rem 1.5rem;
        border-top: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: #475569;
        font-weight: 600;
        font-size: 0.8125rem;
        text-decoration: none !important;
        transition: background-color 0.2s;
    }

    body.dark-mode .stat-card-footer {
        background-color: #0f172a;
        border-top-color: #334155;
        color: #94a3b8;
    }

    .stat-card-footer:hover {
        background-color: #f1f5f9;
        color: #0f172a;
    }

    body.dark-mode .stat-card-footer:hover {
        background-color: #1e293b;
        color: #f8fafc;
    }

    .stat-badge {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
        border-radius: 6px;
        font-weight: 600;
    }
    .stat-badge.bg-positive { background: #dcfce7; color: #15803d; }
    .stat-badge.bg-negative { background: #fee2e2; color: #b91c1c; }

    body.dark-mode .stat-badge.bg-positive { background: rgba(34, 197, 94, 0.2); color: #4ade80; }
    body.dark-mode .stat-badge.bg-negative { background: rgba(239, 68, 68, 0.2); color: #fca5a5; }
</style>
@endpush

@section('content')
<!-- Content Header -->
<div class="content-header pt-4 pb-2">
    <div class="container-fluid">
        <div class="row align-items-center mb-3">
            <div class="col-sm-6">
                <h1 class="m-0 dashboard-header-title">Dashboard Overview</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right bg-transparent p-0 mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-muted"><i class="fas fa-home mr-1"></i>Home</a></li>
                    <li class="breadcrumb-item active text-primary font-weight-semibold">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- New Orders Card -->
            <div class="col-xl-3 col-md-6 col-12 mb-4">
                <div class="stat-card-modern stat-primary h-100">
                    <div class="stat-card-body">
                        <div>
                            <div class="stat-value">150</div>
                            <div class="stat-label">New Orders</div>
                            <span class="stat-badge bg-positive mt-2 d-inline-block">
                                <i class="fas fa-arrow-up mr-1"></i>12% this week
                            </span>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                    <a href="#" class="stat-card-footer">
                        <span>View All Orders</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Bounce Rate Card -->
            <div class="col-xl-3 col-md-6 col-12 mb-4">
                <div class="stat-card-modern stat-success h-100">
                    <div class="stat-card-body">
                        <div>
                            <div class="stat-value">53<span style="font-size: 1.25rem;">%</span></div>
                            <div class="stat-label">Bounce Rate</div>
                            <span class="stat-badge bg-positive mt-2 d-inline-block">
                                <i class="fas fa-arrow-down mr-1"></i>2.4% improved
                            </span>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <a href="#" class="stat-card-footer">
                        <span>Analytics Details</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- User Registrations Card -->
            <div class="col-xl-3 col-md-6 col-12 mb-4">
                <div class="stat-card-modern stat-warning h-100">
                    <div class="stat-card-body">
                        <div>
                            <div class="stat-value">44</div>
                            <div class="stat-label">User Registrations</div>
                            <span class="stat-badge bg-positive mt-2 d-inline-block">
                                <i class="fas fa-arrow-up mr-1"></i>8% increase
                            </span>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                    <a href="#" class="stat-card-footer">
                        <span>User Management</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Unique Visitors Card -->
            <div class="col-xl-3 col-md-6 col-12 mb-4">
                <div class="stat-card-modern stat-danger h-100">
                    <div class="stat-card-body">
                        <div>
                            <div class="stat-value">65</div>
                            <div class="stat-label">Unique Visitors</div>
                            <span class="stat-badge bg-negative mt-2 d-inline-block">
                                <i class="fas fa-arrow-down mr-1"></i>5% drop
                            </span>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                    <a href="#" class="stat-card-footer">
                        <span>Traffic Analysis</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection