@extends('layouts.master')

@section('content')

@include('admin.components.alert')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.customers.index') }}">Customers</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Customer</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">

            <!-- Left Column -->
            <div class="col-md-8">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-user-edit"></i>
                            Edit Customer: {{ $customer->name }}
                        </h3>
                    </div>

                    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter customer name"
                                    value="{{ old('name', $customer->name) }}" required>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter email address"
                                    value="{{ old('email', $customer->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phone Number -->
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    placeholder="Enter phone number"
                                    value="{{ old('phone_number', $customer->phone_number) }}">
                                @error('phone_number')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Leave blank to keep current password">
                                <small class="text-muted">Leave blank to keep current password</small>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control"
                                    placeholder="Confirm new password">
                            </div>

                            <!-- Address -->
                            <div class="form-group">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                <textarea name="address" id="address" rows="3"
                                    class="form-control @error('address') is-invalid @enderror"
                                    placeholder="Enter complete address">{{ old('address', $customer->address) }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Customer
                            </button>
                            <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancel
                            </a>
                        </div>

                    </form>
                </div>

            </div>

            <!-- Right Column -->
            <div class="col-md-4">

                <!-- Location & Settings -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-map-marker-alt"></i>
                            Location & Settings
                        </h3>
                    </div>

                    <div class="card-body">

                        <!-- District -->
                        <div class="form-group">
                            <label for="district_id">District <span class="text-danger">*</span></label>
                            <select name="district_id" id="district_id"
                                class="form-control @error('district_id') is-invalid @enderror" required>
                                <option value="">Select District</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}"
                                        @selected(old('district_id', $customer->district_id) == $district->id)>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('district_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Thana -->
                        <div class="form-group">
                            <label for="thana_id">Thana <span class="text-danger">*</span></label>
                            <select name="thana_id" id="thana_id"
                                class="form-control @error('thana_id') is-invalid @enderror" required>
                                <option value="">Select Thana</option>
                                @foreach($thanas as $thana)
                                    <option value="{{ $thana->id }}"
                                        @selected(old('thana_id', $customer->thana_id) == $thana->id)>
                                        {{ $thana->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('thana_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <hr>

                        <!-- Verified -->
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="is_verified" id="is_verified"
                                    class="custom-control-input" value="1"
                                    @checked(old('is_verified', $customer->is_verified))>
                                <label class="custom-control-label" for="is_verified">
                                    <strong>Verified</strong>
                                </label>
                            </div>
                            <small class="text-muted">Mark this customer as verified</small>
                        </div>

                        <!-- Active -->
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="is_active" id="is_active"
                                    class="custom-control-input" value="1"
                                    @checked(old('is_active', $customer->is_active))>
                                <label class="custom-control-label" for="is_active">
                                    <strong>Active</strong>
                                </label>
                            </div>
                            <small class="text-muted">Enable to activate this customer</small>
                        </div>

                    </div>
                </div>

                <!-- Customer Info -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-info-circle"></i>
                            Customer Info
                        </h3>
                    </div>

                    <div class="card-body">
                        <p><strong>Created:</strong> {{ $customer->created_at?->format('d M Y, h:i A') }}</p>
                        <p><strong>Last Updated:</strong> {{ $customer->updated_at?->format('d M Y, h:i A') }}</p>
                        <p><strong>Last Login:</strong> {{ $customer->last_login_at?->format('d M Y, h:i A') ?? 'Never' }}</p>
                        <p><strong>Total Orders:</strong> {{ $customer->orders()->count() }}</p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

@endsection

@push('js')
<script>
$(document).ready(function() {

    // Load Thanas based on selected District
    $('#district_id').on('change', function() {
        var districtId = $(this).val();

        if (districtId) {
            $.ajax({
                url: '{{ route("admin.customers.get-thanas") }}',
                type: 'GET',
                data: { district_id: districtId },
                success: function(data) {
                    var currentThanaId = '{{ old("thana_id", $customer->thana_id) }}';
                    $('#thana_id').empty();
                    $('#thana_id').append('<option value="">Select Thana</option>');

                    $.each(data, function(key, value) {
                        $('#thana_id').append('<option value="' + value.id + '" ' +
                            (currentThanaId == value.id ? 'selected' : '') + '>' +
                            value.name + '</option>');
                    });
                }
            });
        } else {
            $('#thana_id').empty();
            $('#thana_id').append('<option value="">Select Thana</option>');
        }
    });

});
</script>
@endpush