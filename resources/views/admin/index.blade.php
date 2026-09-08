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
    .stat-info .stat-icon-wrapper { background-color: rgba(139, 92, 246, 0.12); color: #7c3aed; }

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
        display: inline-block;
        margin-top: 0.5rem;
    }
    .stat-badge.bg-positive { background: #dcfce7; color: #15803d; }
    .stat-badge.bg-negative { background: #fee2e2; color: #b91c1c; }
    .stat-badge.bg-neutral { background: #f1f5f9; color: #475569; }

    body.dark-mode .stat-badge.bg-positive { background: rgba(34, 197, 94, 0.2); color: #4ade80; }
    body.dark-mode .stat-badge.bg-negative { background: rgba(239, 68, 68, 0.2); color: #fca5a5; }
    body.dark-mode .stat-badge.bg-neutral { background: rgba(148, 163, 184, 0.2); color: #94a3b8; }

    /* Chart Container */
    .chart-container {
        position: relative;
        height: 250px;
        width: 100%;
    }

    /* Recent Orders Table */
    .order-status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    /* Top Products */
    .product-rank {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #f1f5f9;
        color: #475569;
        font-weight: 700;
        font-size: 0.8rem;
    }
    .product-rank.rank-1 { background: #fef3c7; color: #d97706; }
    .product-rank.rank-2 { background: #e5e7eb; color: #6b7280; }
    .product-rank.rank-3 { background: #fde68a; color: #b45309; }

    /* Responsive */
    @media (max-width: 768px) {
        .stat-value {
            font-size: 1.5rem;
        }
    }
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
        <!-- ===== STATISTICS ROW ===== -->
        <div class="row">
            <!-- Total Orders -->
            <div class="col-xl-3 col-md-6 col-12 mb-4">
                <div class="stat-card-modern stat-primary h-100">
                    <div class="stat-card-body">
                        <div>
                            <div class="stat-value">{{ number_format($totalOrders) }}</div>
                            <div class="stat-label">Total Orders</div>
                            <span class="stat-badge {{ $orderGrowth >= 0 ? 'bg-positive' : 'bg-negative' }}">
                                <i class="fas fa-{{ $orderGrowth >= 0 ? 'arrow-up' : 'arrow-down' }} mr-1"></i>
                                {{ abs($orderGrowth) }}% this week
                            </span>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                    <a href="{{ route('admin.orders.index') }}" class="stat-card-footer">
                        <span>View All Orders</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Revenue -->
            <div class="col-xl-3 col-md-6 col-12 mb-4">
                <div class="stat-card-modern stat-success h-100">
                    <div class="stat-card-body">
                        <div>
                            <div class="stat-value">৳{{ number_format($totalRevenue, 0) }}</div>
                            <div class="stat-label">Total Revenue</div>
                            <span class="stat-badge {{ $revenueGrowth >= 0 ? 'bg-positive' : 'bg-negative' }}">
                                <i class="fas fa-{{ $revenueGrowth >= 0 ? 'arrow-up' : 'arrow-down' }} mr-1"></i>
                                {{ abs($revenueGrowth) }}% from last week
                            </span>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                    <a href="#" class="stat-card-footer">
                        <span>Revenue Details</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Total Users -->
            <div class="col-xl-3 col-md-6 col-12 mb-4">
                <div class="stat-card-modern stat-warning h-100">
                    <div class="stat-card-body">
                        <div>
                            <div class="stat-value">{{ number_format($totalUsers) }}</div>
                            <div class="stat-label">Total Users</div>
                            <span class="stat-badge bg-positive">
                                <i class="fas fa-arrow-up mr-1"></i>
                                {{ $newUsersThisWeek }} new this week
                            </span>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <a href="#" class="stat-card-footer">
                        <span>User Management</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Products -->
            <div class="col-xl-3 col-md-6 col-12 mb-4">
                <div class="stat-card-modern stat-danger h-100">
                    <div class="stat-card-body">
                        <div>
                            <div class="stat-value">{{ number_format($totalProducts) }}</div>
                            <div class="stat-label">Total Products</div>
                            <span class="stat-badge {{ $outOfStock > 0 ? 'bg-negative' : 'bg-positive' }}">
                                @if($outOfStock > 0)
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    {{ $outOfStock }} out of stock
                                @else
                                    <i class="fas fa-check-circle mr-1"></i>
                                    All in stock
                                @endif
                            </span>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                    <a href="#" class="stat-card-footer">
                        <span>Product Management</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- ===== SECOND ROW - Additional Stats ===== -->
        <div class="row">
            <!-- Pending Orders -->
            <div class="col-xl-2 col-md-4 col-6 mb-4">
                <div class="stat-card-modern h-100">
                    <div class="stat-card-body">
                        <div>
                            <div class="stat-value" style="font-size:1.5rem;">{{ number_format($pendingOrders) }}</div>
                            <div class="stat-label" style="font-size:0.7rem;">Pending</div>
                        </div>
                        <div class="stat-icon-wrapper" style="width:40px;height:40px;font-size:1rem;background:rgba(251,191,36,0.12);color:#d97706;">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Processing Orders -->
            <div class="col-xl-2 col-md-4 col-6 mb-4">
                <div class="stat-card-modern h-100">
                    <div class="stat-card-body">
                        <div>
                            <div class="stat-value" style="font-size:1.5rem;">{{ number_format($processingOrders) }}</div>
                            <div class="stat-label" style="font-size:0.7rem;">Processing</div>
                        </div>
                        <div class="stat-icon-wrapper" style="width:40px;height:40px;font-size:1rem;background:rgba(59,130,246,0.12);color:#2563eb;">
                            <i class="fas fa-spinner"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipped Orders -->
            <div class="col-xl-2 col-md-4 col-6 mb-4">
                <div class="stat-card-modern h-100">
                    <div class="stat-card-body">
                        <div>
                            <div class="stat-value" style="font-size:1.5rem;">{{ number_format($shippedOrders) }}</div>
                            <div class="stat-label" style="font-size:0.7rem;">Shipped</div>
                        </div>
                        <div class="stat-icon-wrapper" style="width:40px;height:40px;font-size:1rem;background:rgba(16,185,129,0.12);color:#059669;">
                            <i class="fas fa-truck"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delivered Orders -->
            <div class="col-xl-2 col-md-4 col-6 mb-4">
                <div class="stat-card-modern h-100">
                    <div class="stat-card-body">
                        <div>
                            <div class="stat-value" style="font-size:1.5rem;">{{ number_format($deliveredOrders) }}</div>
                            <div class="stat-label" style="font-size:0.7rem;">Delivered</div>
                        </div>
                        <div class="stat-icon-wrapper" style="width:40px;height:40px;font-size:1rem;background:rgba(34,197,94,0.12);color:#16a34a;">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cancelled Orders -->
            <div class="col-xl-2 col-md-4 col-6 mb-4">
                <div class="stat-card-modern h-100">
                    <div class="stat-card-body">
                        <div>
                            <div class="stat-value" style="font-size:1.5rem;">{{ number_format($cancelledOrders) }}</div>
                            <div class="stat-label" style="font-size:0.7rem;">Cancelled</div>
                        </div>
                        <div class="stat-icon-wrapper" style="width:40px;height:40px;font-size:1rem;background:rgba(239,68,68,0.12);color:#dc2626;">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categories -->
            <div class="col-xl-2 col-md-4 col-6 mb-4">
                <div class="stat-card-modern h-100">
                    <div class="stat-card-body">
                        <div>
                            <div class="stat-value" style="font-size:1.5rem;">{{ number_format($totalCategories) }}</div>
                            <div class="stat-label" style="font-size:0.7rem;">Categories</div>
                        </div>
                        <div class="stat-icon-wrapper" style="width:40px;height:40px;font-size:1rem;background:rgba(139,92,246,0.12);color:#7c3aed;">
                            <i class="fas fa-tags"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== CHARTS ROW ===== -->
        <div class="row mt-3">
            <!-- Daily Orders Chart -->
            <div class="col-lg-8 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-chart-bar text-primary mr-2"></i>
                            Daily Orders & Revenue (Last 7 Days)
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="ordersChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Status Distribution -->
            <div class="col-lg-4 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-chart-pie text-success mr-2"></i>
                            Order Status
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="statusChart"></canvas>
                        </div>
                        <div class="mt-3">
                            @foreach($statusDistribution as $status => $count)
                                @if($count > 0)
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-muted">{{ $status }}</span>
                                        <span class="font-weight-bold">{{ $count }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== TOP PRODUCTS & RECENT ORDERS ===== -->
        <div class="row mt-2">
            <!-- Top Products -->
            <div class="col-lg-6 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-fire text-danger mr-2"></i>
                            Top Selling Products
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th class="text-center">Sold</th>
                                        <th class="text-right">Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($topProducts as $index => $product)
                                        <tr>
                                            <td>
                                                <span class="product-rank rank-{{ $index + 1 }}">
                                                    {{ $index + 1 }}
                                                </span>
                                            </td>
                                            <td>
                                                <strong>{{ $product->name }}</strong>
                                                <br>
                                                <small class="text-muted">৳{{ number_format($product->sale_price ?? 0, 2) }}</small>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-primary">{{ $product->total_sold }}</span>
                                            </td>
                                            <td class="text-right font-weight-bold">
                                                ৳{{ number_format($product->total_revenue ?? 0, 2) }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-4">
                                                <i class="fas fa-inbox fa-2x d-block mb-2"></i>
                                                No products sold yet
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="col-lg-6 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-history text-warning mr-2"></i>
                            Recent Orders
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Customer</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentOrders as $order)
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.orders.show', $order->id) }}" class="text-primary font-weight-bold">
                                                    #{{ $order->order_number ?? $order->id }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $order->full_name }}
                                                <br>
                                                <small class="text-muted">{{ $order->phone }}</small>
                                            </td>
                                            <td class="text-center font-weight-bold">
                                                ৳{{ number_format($order->total, 2) }}
                                            </td>
                                            <td class="text-center">
                                                <span class="order-status-badge 
                                                    @switch($order->status)
                                                        @case('pending') bg-secondary text-white @break
                                                        @case('processing') bg-warning text-dark @break
                                                        @case('shipped') bg-primary text-white @break
                                                        @case('delivered') bg-success text-white @break
                                                        @case('cancelled') bg-danger text-white @break
                                                        @default bg-info text-white
                                                    @endswitch
                                                ">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-4">
                                                <i class="fas fa-inbox fa-2x d-block mb-2"></i>
                                                No orders found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-primary">
                            View All Orders <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== QUICK STATS ROW ===== -->
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-chart-simple text-info mr-2"></i>
                            Quick Statistics
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <div class="h4 font-weight-bold text-primary">{{ number_format($todayRevenue ?? 0, 2) }}</div>
                                    <div class="text-muted small">Today's Revenue</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <div class="h4 font-weight-bold text-success">{{ number_format($weekRevenue ?? 0, 2) }}</div>
                                    <div class="text-muted small">This Week</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <div class="h4 font-weight-bold text-warning">{{ number_format($monthRevenue ?? 0, 2) }}</div>
                                    <div class="text-muted small">This Month</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <div class="h4 font-weight-bold text-danger">{{ number_format($newUsersToday ?? 0) }}</div>
                                    <div class="text-muted small">New Users Today</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
        // ===== Daily Orders & Revenue Chart =====
        const dates = @json(array_keys($chartData));
        const orderCounts = @json(array_values($chartData));
        const revenueData = @json(array_values($chartRevenue));

        const ctx1 = document.getElementById('ordersChart').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: dates.map(d => {
                    const date = new Date(d);
                    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
                }),
                datasets: [
                    {
                        label: 'Orders',
                        data: orderCounts,
                        backgroundColor: 'rgba(59, 130, 246, 0.6)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 2,
                        borderRadius: 6,
                        order: 2,
                        yAxisID: 'y',
                    },
                    {
                        label: 'Revenue ($)',
                        data: revenueData,
                        type: 'line',
                        borderColor: 'rgba(16, 185, 129, 1)',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: 'rgba(16, 185, 129, 1)',
                        pointRadius: 4,
                        order: 1,
                        yAxisID: 'y1',
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                let value = context.raw || 0;
                                if (context.dataset.label === 'Revenue ($)') {
                                    return label + ': $' + value.toFixed(2);
                                }
                                return label + ': ' + value;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        position: 'left',
                        grid: {
                            color: 'rgba(0,0,0,0.05)',
                        },
                        ticks: {
                            stepSize: 1,
                        }
                    },
                    y1: {
                        beginAtZero: true,
                        position: 'right',
                        grid: {
                            display: false,
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                        }
                    }
                }
            }
        });

        // ===== Order Status Distribution Chart =====
        const statusLabels = @json(array_keys($statusDistribution));
        const statusCounts = @json(array_values($statusDistribution));
        const colors = ['#64748b', '#f59e0b', '#3b82f6', '#10b981', '#ef4444'];

        const ctx2 = document.getElementById('statusChart').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: statusLabels.filter((_, i) => statusCounts[i] > 0),
                datasets: [{
                    data: statusCounts.filter(c => c > 0),
                    backgroundColor: colors.filter((_, i) => statusCounts[i] > 0),
                    borderColor: '#ffffff',
                    borderWidth: 3,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 15,
                            font: {
                                size: 11,
                            }
                        }
                    }
                },
                cutout: '65%',
            }
        });
    });
</script>
@endpush