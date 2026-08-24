@extends('layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Add Setting</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.settings.index') }}">
                            Settings
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Add
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
                    Create New Setting
                </h3>
            </div>


            <form action="{{ route('admin.settings.store') }}"
                  method="POST">

                @csrf

                <div class="card-body">

                    {{-- Key --}}
                    <div class="form-group">

                        <label for="key">
                            Key <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="key"
                               id="key"
                               value="{{ old('key') }}"
                               class="form-control @error('key') is-invalid @enderror"
                               placeholder="e.g. app_name">

                        @error('key')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror

                        <small class="form-text text-muted">
                            Only letters, numbers and underscore are allowed.
                        </small>

                    </div>


                    {{-- Value --}}
                    <div class="form-group">

                        <label for="value">
                            Value
                        </label>

                        <textarea name="value"
                                  id="value"
                                  rows="5"
                                  class="form-control @error('value') is-invalid @enderror"
                                  placeholder="Enter setting value">{{ old('value') }}</textarea>

                        @error('value')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    <div class="row">

                        {{-- Type --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="type">
                                    Type <span class="text-danger">*</span>
                                </label>

                                <select name="type"
                                        id="type"
                                        class="form-control @error('type') is-invalid @enderror">

                                    <option value="string"
                                        {{ old('type', 'string') === 'string' ? 'selected' : '' }}>
                                        String
                                    </option>

                                    <option value="text"
                                        {{ old('type') === 'text' ? 'selected' : '' }}>
                                        Text
                                    </option>

                                    <option value="integer"
                                        {{ old('type') === 'integer' ? 'selected' : '' }}>
                                        Integer
                                    </option>

                                    <option value="float"
                                        {{ old('type') === 'float' ? 'selected' : '' }}>
                                        Float
                                    </option>

                                    <option value="boolean"
                                        {{ old('type') === 'boolean' ? 'selected' : '' }}>
                                        Boolean
                                    </option>

                                    <option value="url"
                                        {{ old('type') === 'url' ? 'selected' : '' }}>
                                        URL
                                    </option>

                                    <option value="email"
                                        {{ old('type') === 'email' ? 'selected' : '' }}>
                                        Email
                                    </option>

                                    <option value="image"
                                        {{ old('type') === 'image' ? 'selected' : '' }}>
                                        Image
                                    </option>

                                    <option value="password"
                                        {{ old('type') === 'password' ? 'selected' : '' }}>
                                        Password
                                    </option>

                                    <option value="code"
                                        {{ old('type') === 'code' ? 'selected' : '' }}>
                                        Code
                                    </option>

                                </select>

                                @error('type')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                        </div>


                        {{-- Group --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="group">
                                    Group <span class="text-danger">*</span>
                                </label>

                                <select name="group"
                                        id="group"
                                        class="form-control @error('group') is-invalid @enderror">

                                    <option value="general"
                                        {{ old('group', 'general') === 'general' ? 'selected' : '' }}>
                                        General
                                    </option>

                                    <option value="social"
                                        {{ old('group') === 'social' ? 'selected' : '' }}>
                                        Social
                                    </option>

                                    <option value="mail"
                                        {{ old('group') === 'mail' ? 'selected' : '' }}>
                                        Mail
                                    </option>

                                    <option value="integration"
                                        {{ old('group') === 'integration' ? 'selected' : '' }}>
                                        Integration
                                    </option>

                                </select>

                                @error('group')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- Is Public --}}
                    <div class="form-group">

                        <div class="custom-control custom-checkbox">

                            <input type="checkbox"
                                   name="is_public"
                                   value="1"
                                   id="is_public"
                                   class="custom-control-input"
                                   {{ old('is_public') ? 'checked' : '' }}>

                            <label class="custom-control-label"
                                   for="is_public">

                                Make this setting public

                            </label>

                        </div>

                        <small class="form-text text-muted">
                            Public settings can be exposed through public APIs.
                        </small>

                    </div>

                </div>


                <div class="card-footer">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Save Setting

                    </button>

                    <a href="{{ route('admin.settings.index') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection