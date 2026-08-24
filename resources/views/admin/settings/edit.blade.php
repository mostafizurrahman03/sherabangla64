@extends('layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Edit Setting</h1>
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
                        Edit
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
                    Edit Setting
                </h3>

            </div>


            <form action="{{ route('admin.settings.update', $setting->id) }}"
                  method="POST">

                @csrf
                @method('PUT')


                <div class="card-body">

                    {{-- Key --}}
                    <div class="form-group">

                        <label for="key">
                            Key <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="key"
                               id="key"
                               value="{{ old('key', $setting->key) }}"
                               class="form-control @error('key') is-invalid @enderror">

                        @error('key')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Value --}}
                    <div class="form-group">

                        <label for="value">
                            Value
                        </label>

                        <textarea name="value"
                                  id="value"
                                  rows="5"
                                  class="form-control @error('value') is-invalid @enderror">{{ old('value', $setting->value) }}</textarea>

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

                                    @php
                                        $types = [
                                            'string' => 'String',
                                            'text' => 'Text',
                                            'integer' => 'Integer',
                                            'float' => 'Float',
                                            'boolean' => 'Boolean',
                                            'url' => 'URL',
                                            'email' => 'Email',
                                            'image' => 'Image',
                                            'password' => 'Password',
                                            'code' => 'Code',
                                        ];
                                    @endphp

                                    @foreach($types as $value => $label)

                                        <option value="{{ $value }}"
                                            {{ old('type', $setting->type) === $value ? 'selected' : '' }}>

                                            {{ $label }}

                                        </option>

                                    @endforeach

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

                                    @php
                                        $groups = [
                                            'general' => 'General',
                                            'social' => 'Social',
                                            'mail' => 'Mail',
                                            'integration' => 'Integration',
                                        ];
                                    @endphp

                                    @foreach($groups as $value => $label)

                                        <option value="{{ $value }}"
                                            {{ old('group', $setting->group) === $value ? 'selected' : '' }}>

                                            {{ $label }}

                                        </option>

                                    @endforeach

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
                                   {{ old('is_public', $setting->is_public) ? 'checked' : '' }}>

                            <label class="custom-control-label"
                                   for="is_public">

                                Make this setting public

                            </label>

                        </div>

                    </div>

                </div>


                <div class="card-footer">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Update Setting

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