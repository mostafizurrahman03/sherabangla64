@extends('layouts.master')

@section('content')

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Edit Thana</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">

                            <a href="{{ route('dashboard') }}">
                                Dashboard
                            </a>

                        </li>

                        <li class="breadcrumb-item">

                            <a href="{{ route('admin.thanas.index') }}">
                                Thanas
                            </a>

                        </li>

                        <li class="breadcrumb-item active">
                            Edit Thana
                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </section>


    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        Edit Thana
                    </h3>

                </div>


                <form method="POST"
                      action="{{ route('admin.thanas.update', $thana->id) }}">

                    @csrf

                    @method('PUT')


                    <div class="card-body">

                        {{-- Validation Errors --}}
                        @if($errors->any())

                            <div class="alert alert-danger">

                                <ul class="mb-0">

                                    @foreach($errors->all() as $error)

                                        <li>
                                            {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <div class="row">

                            {{-- District --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="district_id">
                                        District
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select name="district_id"
                                            id="district_id"
                                            class="form-control @error('district_id') is-invalid @enderror"
                                            required>

                                        <option value="">
                                            Select District
                                        </option>

                                        @foreach($districts as $district)

                                            <option value="{{ $district->id }}"
                                                {{ old('district_id', $thana->district_id) == $district->id ? 'selected' : '' }}>

                                                {{ $district->name }}

                                                @if($district->code)
                                                    ({{ $district->code }})
                                                @endif

                                            </option>

                                        @endforeach

                                    </select>

                                    @error('district_id')

                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>


                            {{-- Name --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="name">
                                        Thana Name
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text"
                                           name="name"
                                           id="name"
                                           value="{{ old('name', $thana->name) }}"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Enter thana name"
                                           required>

                                    @error('name')

                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>


                            {{-- Bengali Name --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="bn_name">
                                        Bengali Name
                                    </label>

                                    <input type="text"
                                           name="bn_name"
                                           id="bn_name"
                                           value="{{ old('bn_name', $thana->bn_name) }}"
                                           class="form-control @error('bn_name') is-invalid @enderror"
                                           placeholder="Enter Bengali name">

                                    @error('bn_name')

                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>


                            {{-- Code --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="code">
                                        Code
                                    </label>

                                    <input type="text"
                                           name="code"
                                           id="code"
                                           value="{{ old('code', $thana->code) }}"
                                           class="form-control @error('code') is-invalid @enderror"
                                           placeholder="Enter thana code"
                                           maxlength="10">

                                    @error('code')

                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>


                            {{-- Status --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>
                                        Status
                                    </label>

                                    <div class="custom-control custom-switch">

                                        <input type="checkbox"
                                               class="custom-control-input"
                                               id="is_active"
                                               name="is_active"
                                               value="1"
                                               {{ old('is_active', $thana->is_active) ? 'checked' : '' }}>

                                        <label class="custom-control-label"
                                               for="is_active">

                                            Active

                                        </label>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="card-footer">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="fas fa-save"></i>
                            Update Thana

                        </button>

                        <a href="{{ route('admin.thanas.index') }}"
                           class="btn btn-secondary">

                            <i class="fas fa-arrow-left"></i>
                            Back

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </section>

@endsection