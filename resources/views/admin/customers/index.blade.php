@extends('layouts.master')

@push('css')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css">
@endpush

@section('content')

@include('admin.components.alert')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Customers</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Customers</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">

                    <!-- Card Header -->
                    <div class="card-header d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h3 class="card-title">All Customers</h3>
                        </div>
                        <div>
                            <a href="{{ route('admin.customers.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Add New
                            </a>
                        </div>
                    </div>

                    <!-- Search / Filter -->
                    <div class="card-body border-bottom">
                        <form method="GET" action="{{ route('admin.customers.index') }}" id="filterForm">

                            <div class="row">

                                <!-- Search -->
                                <div class="col-md-3 mb-2">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Search by name, email, phone..."
                                        value="{{ request('search') }}">
                                </div>

                                <!-- District -->
                                <div class="col-md-2 mb-2">
                                    <select name="district_id" id="district_filter" class="form-control">
                                        <option value="">All Districts</option>
                                        @foreach($districts as $district)
                                            <option value="{{ $district->id }}"
                                                @selected(request('district_id') == $district->id)>
                                                {{ $district->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Thana -->
                                <div class="col-md-2 mb-2">
                                    <select name="thana_id" id="thana_filter" class="form-control">
                                        <option value="">All Thanas</option>
                                        @foreach($thanas as $thana)
                                            <option value="{{ $thana->id }}"
                                                @selected(request('thana_id') == $thana->id)>
                                                {{ $thana->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Status -->
                                <div class="col-md-2 mb-2">
                                    <select name="is_active" class="form-control">
                                        <option value="">All Status</option>
                                        <option value="1" @selected(request('is_active') === '1')>Active</option>
                                        <option value="0" @selected(request('is_active') === '0')>Inactive</option>
                                    </select>
                                </div>

                                <!-- Verification -->
                                <div class="col-md-2 mb-2">
                                    <select name="is_verified" class="form-control">
                                        <option value="">All Verification</option>
                                        <option value="1" @selected(request('is_verified') === '1')>Verified</option>
                                        <option value="0" @selected(request('is_verified') === '0')>Unverified</option>
                                    </select>
                                </div>

                                <!-- Search Button -->
                                <div class="col-md-1 mb-2">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary btn-block">
                                        <i class="fas fa-sync"></i>
                                    </a>
                                </div>

                            </div>

                        </form>
                    </div>

                    <!-- Customer Table -->
                    <div class="card-body">

                        <div class="table-responsive">

                            <table id="customerTable" class="table table-bordered table-striped table-hover text-center">

                                <thead>
                                    <tr>
                                        <th width="50">#</th>
                                        <th width="80">Avatar</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>District</th>
                                        <th>Thana</th>
                                        <th>Verified</th>
                                        <th>Status</th>
                                        <th>Last Login</th>
                                        <th>Created At</th>
                                        <th width="150">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($customers as $customer)
                                        <tr>
                                            <td>{{ $customers->firstItem() + $loop->index }}</td>

                                            <!-- Avatar -->
                                            <td>
                                                <img src="{{ $customer->avatar_url ?? asset('assets/default-avatar.png') }}"
                                                    alt="{{ $customer->name }}"
                                                    width="40" height="40"
                                                    class="rounded-circle"
                                                    style="object-fit: cover;">
                                            </td>

                                            <!-- Name -->
                                            <td class="text-left">
                                                <strong>{{ $customer->name }}</strong>
                                            </td>

                                            <!-- Email -->
                                            <td>{{ $customer->email }}</td>

                                            <!-- Phone -->
                                            <td>{{ $customer->phone_number ?? '-' }}</td>

                                            <!-- District -->
                                            <td>{{ $customer->district?->name ?? '-' }}</td>

                                            <!-- Thana -->
                                            <td>{{ $customer->thana?->name ?? '-' }}</td>

                                            <!-- Verified -->
                                            <td>
                                                @if($customer->is_verified)
                                                    <span class="badge badge-success">Verified</span>
                                                @else
                                                    <span class="badge badge-warning">Unverified</span>
                                                @endif
                                                <br>
                                                <button onclick="toggleVerification({{ $customer->id }})"
                                                    class="btn btn-xs btn-{{ $customer->is_verified ? 'secondary' : 'success' }} mt-1">
                                                    <i class="fas fa-{{ $customer->is_verified ? 'times' : 'check' }}"></i>
                                                </button>
                                            </td>

                                            <!-- Status -->
                                            <td>
                                                @if($customer->is_active)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                                <br>
                                                <button onclick="toggleStatus({{ $customer->id }})"
                                                    class="btn btn-xs btn-{{ $customer->is_active ? 'danger' : 'success' }} mt-1">
                                                    <i class="fas fa-{{ $customer->is_active ? 'times' : 'check' }}"></i>
                                                </button>
                                            </td>

                                            <!-- Last Login -->
                                            <td>{{ $customer->last_login_at?->diffForHumans() ?? 'Never' }}</td>

                                            <!-- Created At -->
                                            <td>{{ $customer->created_at?->format('d M Y') }}</td>

                                            <!-- Action -->
                                            <td>
                                                <a href="{{ route('admin.customers.show', $customer->id) }}"
                                                    class="btn btn-info btn-sm" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.customers.edit', $customer->id) }}"
                                                    class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button onclick="confirmDelete(event, {{ $customer->id }})"
                                                    class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <form id="delete-form-{{ $customer->id }}"
                                                    action="{{ route('admin.customers.destroy', $customer->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center py-4">
                                                <strong>No customers found.</strong>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>

                        </div>

                    </div>

                    <!-- Pagination -->
                    @if($customers->hasPages())
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="text-muted">
                                        Showing <strong>{{ $customers->firstItem() }}</strong>
                                        to <strong>{{ $customers->lastItem() }}</strong>
                                        of <strong>{{ $customers->total() }}</strong> customers
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-right">
                                        {{ $customers->appends(request()->query())->onEachSide(1)->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</section>

@endsection

@push('js')

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {

    // =============================================
    // 1. Initialize DataTable
    // =============================================
    var table = $('#customerTable').DataTable({
        "paging": false,
        "info": false,
        "ordering": true,
        "searching": false,
        "lengthChange": false,
        "pageLength": 25,
        "order": [[10, 'desc']],
        "columnDefs": [
            { "orderable": false, "targets": [0, 1, 7, 8, 11] },
            { "orderable": true, "targets": [2, 3, 4, 5, 6, 9, 10] }
        ],
        "dom": 'lBfrtip',
        "buttons": [
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i> Copy',
                className: 'btn btn-sm btn-secondary',
                exportOptions: { columns: ':visible' }
            },
            {
                extend: 'csv',
                text: '<i class="fas fa-file-csv"></i> CSV',
                className: 'btn btn-sm btn-success',
                exportOptions: { columns: ':visible' }
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'btn btn-sm btn-success',
                exportOptions: { columns: ':visible' }
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-sm btn-danger',
                exportOptions: { columns: ':visible' }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Print',
                className: 'btn btn-sm btn-secondary',
                exportOptions: { columns: ':visible' }
            },
            {
                extend: 'colvis',
                text: '<i class="fas fa-columns"></i> Column visibility',
                className: 'btn btn-sm btn-primary',
                columns: ':not(:last-child)'
            }
        ]
    });

    // Style buttons
    $('.dt-buttons').addClass('float-right');
    $('.dt-buttons .btn').addClass('btn-sm');

    // =============================================
    // 2. Auto-submit filter on change (except district)
    // =============================================
    $('#filterForm select:not(#district_filter)').on('change', function() {
        $('#filterForm').submit();
    });

    // =============================================
    // 3. District Filter Change - AJAX Load Thana
    // =============================================
    let thanaRequest = null;
    let isProcessing = false;

    $('#district_filter').on('change', function() {
        // Prevent multiple simultaneous requests
        if (isProcessing) {
            return;
        }

        var districtId = $(this).val();
        var thanaDropdown = $('#thana_filter');

        // Cancel previous request
        if (thanaRequest) {
            thanaRequest.abort();
        }

        isProcessing = true;
        thanaDropdown.html('<option value="">Loading...</option>');

        if (!districtId) {
            // If no district, reload page to show all thanas
            isProcessing = false;
            $('#filterForm').submit();
            return;
        }

        // AJAX Request
        thanaRequest = $.ajax({
            url: '{{ route("admin.customers.get-thanas") }}',
            type: 'GET',
            data: {
                district_id: districtId
            },
            success: function(data) {
                thanaDropdown.html('<option value="">All Thanas</option>');

                if (data.length) {
                    $.each(data, function(index, thana) {
                        thanaDropdown.append(
                            $('<option>', {
                                value: thana.id,
                                text: thana.name
                            })
                        );
                    });
                } else {
                    thanaDropdown.html('<option value="">No Thana Found</option>');
                }

                // ✅ Only submit if district_id has changed and form is not already submitting
                isProcessing = false;
                
                // ✅ Submit the form to apply filter (but only if district_id exists in URL)
                var currentDistrict = '{{ request("district_id") }}';
                if (districtId != currentDistrict) {
                    $('#filterForm').submit();
                }
            },
            error: function(xhr) {
                console.log('Thana AJAX Error:', xhr.responseText);
                thanaDropdown.html('<option value="">Error loading Thana</option>');
                isProcessing = false;
            }
        });
    });

    // =============================================
    // 4. Preserve old thana value after page load
    // =============================================
    var oldDistrictId = '{{ request("district_id") }}';
    var oldThanaId = '{{ request("thana_id") }}';

    if (oldDistrictId) {
        // Load thanas for the selected district
        var districtId = oldDistrictId;
        var thanaDropdown = $('#thana_filter');
        
        thanaDropdown.html('<option value="">Loading...</option>');
        
        $.ajax({
            url: '{{ route("admin.customers.get-thanas") }}',
            type: 'GET',
            data: {
                district_id: districtId
            },
            success: function(data) {
                thanaDropdown.html('<option value="">All Thanas</option>');

                if (data.length) {
                    $.each(data, function(index, thana) {
                        thanaDropdown.append(
                            $('<option>', {
                                value: thana.id,
                                text: thana.name
                            })
                        );
                    });
                } else {
                    thanaDropdown.html('<option value="">No Thana Found</option>');
                }

                // Set old thana value
                if (oldThanaId) {
                    $('#thana_filter').val(oldThanaId);
                }
            },
            error: function(xhr) {
                console.log('Thana AJAX Error:', xhr.responseText);
                thanaDropdown.html('<option value="">Error loading Thana</option>');
            }
        });
    }

});

// =============================================
// Global Functions
// =============================================

// Delete confirmation
function confirmDelete(event, customerId) {
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + customerId).submit();
        }
    });
}

// Toggle Status
function toggleStatus(customerId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This will toggle the customer's active status.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, toggle it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var url = '{{ route("admin.customers.toggle-status", ":id") }}';
            url = url.replace(':id', customerId);

            var form = document.createElement('form');
            form.method = 'POST';
            form.action = url;
            form.innerHTML = '@csrf';
            document.body.appendChild(form);
            form.submit();
        }
    });
}

// Toggle Verification
function toggleVerification(customerId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This will toggle the customer's verification status.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, toggle it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var url = '{{ route("admin.customers.toggle-verification", ":id") }}';
            url = url.replace(':id', customerId);

            var form = document.createElement('form');
            form.method = 'POST';
            form.action = url;
            form.innerHTML = '@csrf';
            document.body.appendChild(form);
            form.submit();
        }
    });
}
</script>

@endpush