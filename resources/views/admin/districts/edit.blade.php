@extends('layouts.master')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Edit District</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.districts.index') }}">
                            Districts
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Edit District
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
                    Edit District
                </h3>

            </div>


            <form action="{{ route('admin.districts.update', $district->id) }}"
                  method="POST">

                @csrf
                @method('PUT')


                <div class="card-body">

                    {{-- Division --}}
                    <div class="form-group">

                        <label for="division_id">

                            Division

                            <span class="text-danger">
                                *
                            </span>

                        </label>

                        <select name="division_id"
                                id="division_id"
                                class="form-control @error('division_id') is-invalid @enderror">

                            <option value="">
                                Select Division
                            </option>

                            @foreach($divisions as $division)

                                <option value="{{ $division->id }}"
                                    {{ old('division_id', $district->division_id) == $division->id ? 'selected' : '' }}>

                                    {{ $division->name }}

                                </option>

                            @endforeach

                        </select>

                        @error('division_id')

                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    <div class="row">

                        {{-- Name --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="name">

                                    District Name

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <input type="text"
                                       name="name"
                                       id="name"
                                       value="{{ old('name', $district->name) }}"
                                       class="form-control @error('name') is-invalid @enderror">

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
                                       value="{{ old('bn_name', $district->bn_name) }}"
                                       class="form-control @error('bn_name') is-invalid @enderror">

                                @error('bn_name')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- Code --}}
                    <div class="form-group">

                        <label for="code">
                            District Code
                        </label>

                        <input type="text"
                               name="code"
                               id="code"
                               value="{{ old('code', $district->code) }}"
                               class="form-control @error('code') is-invalid @enderror">

                        @error('code')

                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    {{-- Status --}}
                    <div class="form-group">

                        <div class="custom-control custom-checkbox">

                            <input type="checkbox"
                                   name="is_active"
                                   value="1"
                                   id="is_active"
                                   class="custom-control-input"
                                   {{ old('is_active', $district->is_active) ? 'checked' : '' }}>

                            <label class="custom-control-label"
                                   for="is_active">

                                Active

                            </label>

                        </div>

                    </div>

                </div>


                <div class="card-footer">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Update District

                    </button>

                    <a href="{{ route('admin.districts.index') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection