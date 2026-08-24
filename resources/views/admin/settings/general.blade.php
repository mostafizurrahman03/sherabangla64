@extends('layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>General Settings</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        General Settings
                    </li>

                </ol>

            </div>

        </div>

    </div>
</section>


<section class="content">

    <div class="container-fluid">

        {{-- Success --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show">

                <i class="fas fa-check-circle mr-1"></i>

                {{ session('success') }}

                <button type="button"
                        class="close"
                        data-dismiss="alert">

                    <span>&times;</span>

                </button>

            </div>

        @endif


        {{-- Errors --}}
        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form action="{{ route('admin.settings.update-all') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <input type="hidden"
                   name="group"
                   value="general">


            {{-- ================================================= --}}
            {{-- GENERAL INFORMATION --}}
            {{-- ================================================= --}}

            <div class="card card-primary">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-cog mr-1"></i>

                        General Information

                    </h3>

                </div>


                <div class="card-body">

                    <div class="row">

                        {{-- App Name --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Application Name
                                </label>

                                <input type="text"
                                       name="app_name"
                                       value="{{ old('app_name', $settings['app_name']->value ?? '') }}"
                                       class="form-control"
                                       placeholder="My Website">

                            </div>

                        </div>


                        {{-- Email --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Primary Email
                                </label>

                                <input type="email"
                                       name="email"
                                       value="{{ old('email', $settings['email']->value ?? '') }}"
                                       class="form-control"
                                       placeholder="info@example.com">

                            </div>

                        </div>


                        {{-- Secondary Email --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Secondary Email
                                </label>

                                <input type="email"
                                       name="secondary_email"
                                       value="{{ old('secondary_email', $settings['secondary_email']->value ?? '') }}"
                                       class="form-control"
                                       placeholder="support@example.com">

                            </div>

                        </div>


                        {{-- Phone 1 --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Phone 1
                                </label>

                                <input type="text"
                                       name="phone_1"
                                       value="{{ old('phone_1', $settings['phone_1']->value ?? '') }}"
                                       class="form-control"
                                       placeholder="+8801XXXXXXXXX">

                            </div>

                        </div>


                        {{-- Phone 2 --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Phone 2
                                </label>

                                <input type="text"
                                       name="phone_2"
                                       value="{{ old('phone_2', $settings['phone_2']->value ?? '') }}"
                                       class="form-control"
                                       placeholder="+8801XXXXXXXXX">

                            </div>

                        </div>


                        {{-- WhatsApp --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    WhatsApp Number
                                </label>

                                <input type="text"
                                       name="whatsapp_number"
                                       value="{{ old('whatsapp_number', $settings['whatsapp_number']->value ?? '') }}"
                                       class="form-control"
                                       placeholder="+8801XXXXXXXXX">

                            </div>

                        </div>


                        {{-- Address --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Address
                                </label>

                                <textarea name="address"
                                          rows="3"
                                          class="form-control"
                                          placeholder="Dhaka, Bangladesh">{{ old('address', $settings['address']->value ?? '') }}</textarea>

                            </div>

                        </div>


                        {{-- Copyright --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Copyright Text
                                </label>

                                <textarea name="copyright_text"
                                          rows="3"
                                          class="form-control"
                                          placeholder="© 2026 My Website">{{ old('copyright_text', $settings['copyright_text']->value ?? '') }}</textarea>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- WEBSITE IMAGES --}}
            {{-- ================================================= --}}

            <div class="card card-secondary">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-images mr-1"></i>

                        Website Images

                    </h3>

                </div>


                <div class="card-body">

                    <div class="row">


                        {{-- Logo --}}
                        <div class="col-md-4">

                            <div class="form-group">

                                <label>
                                    Logo
                                </label>

                                <div class="custom-file">

                                    <input type="file"
                                           name="logo"
                                           id="logo"
                                           class="custom-file-input"
                                           accept="image/*">

                                    <label class="custom-file-label"
                                           for="logo">

                                        Choose logo

                                    </label>

                                </div>


                                @if(!empty($settings['logo']->value ?? null))

                                    <div class="mt-3">

                                        <img src="{{ asset('storage/' . $settings['logo']->value) }}"
                                             alt="Logo"
                                             style="max-width:200px; max-height:80px;">

                                    </div>

                                @endif

                            </div>

                        </div>


                        {{-- Favicon --}}
                        <div class="col-md-4">

                            <div class="form-group">

                                <label>
                                    Favicon
                                </label>

                                <div class="custom-file">

                                    <input type="file"
                                           name="favicon"
                                           id="favicon"
                                           class="custom-file-input"
                                           accept="image/*">

                                    <label class="custom-file-label"
                                           for="favicon">

                                        Choose favicon

                                    </label>

                                </div>


                                @if(!empty($settings['favicon']->value ?? null))

                                    <div class="mt-3">

                                        <img src="{{ asset('storage/' . $settings['favicon']->value) }}"
                                             alt="Favicon"
                                             style="max-width:60px; max-height:60px;">

                                    </div>

                                @endif

                            </div>

                        </div>


                        {{-- OG Image --}}
                        <div class="col-md-4">

                            <div class="form-group">

                                <label>
                                    OG Image
                                </label>

                                <div class="custom-file">

                                    <input type="file"
                                           name="og_image"
                                           id="og_image"
                                           class="custom-file-input"
                                           accept="image/*">

                                    <label class="custom-file-label"
                                           for="og_image">

                                        Choose OG image

                                    </label>

                                </div>


                                @if(!empty($settings['og_image']->value ?? null))

                                    <div class="mt-3">

                                        <img src="{{ asset('storage/' . $settings['og_image']->value) }}"
                                             alt="OG Image"
                                             style="max-width:180px; max-height:100px;">

                                    </div>

                                @endif

                            </div>

                        </div>


                    </div>

                </div>

            </div>


            {{-- SAVE --}}

            <div class="card">

                <div class="card-footer">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save mr-1"></i>

                        Save General Settings

                    </button>

                </div>

            </div>

        </form>

    </div>

</section>

@endsection


@push('scripts')

<script>

document.querySelectorAll('.custom-file-input').forEach(function(input) {

    input.addEventListener('change', function() {

        let fileName = this.files.length
            ? this.files[0].name
            : 'Choose file';

        this.nextElementSibling.textContent = fileName;

    });

});

</script>

@endpush