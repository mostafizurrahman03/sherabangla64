@extends('layouts.master')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1>Integration Settings</h1>

            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Integration
                    </li>

                </ol>

            </div>

        </div>

    </div>

</section>


<section class="content">

    <div class="container-fluid">

        @if(session('success'))

            <div class="alert alert-success">

                <i class="fas fa-check-circle mr-1"></i>

                {{ session('success') }}

            </div>

        @endif


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
              method="POST">

            @csrf
            @method('PUT')

            <input type="hidden"
                   name="group"
                   value="integration">


            {{-- ================================================= --}}
            {{-- GOOGLE CAPTCHA --}}
            {{-- ================================================= --}}

            <div class="card card-danger">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fab fa-google mr-1"></i>

                        Google reCAPTCHA

                    </h3>

                </div>


                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Site Key
                                </label>

                                <input type="text"
                                       name="google_captcha_site_key"
                                       value="{{ old('google_captcha_site_key', $settings['google_captcha_site_key']->value ?? '') }}"
                                       class="form-control"
                                       placeholder="Google reCAPTCHA Site Key">

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Secret Key
                                </label>

                                <input type="password"
                                       name="google_captcha_secret_key"
                                       class="form-control"
                                       placeholder="Leave blank to keep existing secret">

                                <small class="text-muted">

                                    Leave blank to keep existing secret.

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- GOOGLE TAG MANAGER --}}
            {{-- ================================================= --}}

            <div class="card card-primary">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-code mr-1"></i>

                        Google Tag Manager

                    </h3>

                </div>


                <div class="card-body">

                    <div class="form-group">

                        <label>
                            Header Code
                        </label>

                        <textarea name="google_tag_manager_header_code"
                                  rows="1"
                                  class="form-control"
                                  placeholder="Paste Google Tag Manager header code here">{{ old('google_tag_manager_header_code', $settings['google_tag_manager_header_code']->value ?? '') }}</textarea>

                    </div>


                    <div class="form-group">

                        <label>
                            Body Code
                        </label>

                        <textarea name="google_tag_manager_body_code"
                                  rows="1"
                                  class="form-control"
                                  placeholder="Paste Google Tag Manager body code here">{{ old('google_tag_manager_body_code', $settings['google_tag_manager_body_code']->value ?? '') }}</textarea>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- FACEBOOK PIXEL --}}
            {{-- ================================================= --}}

            <div class="card card-info">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fab fa-facebook mr-1"></i>

                        Facebook Pixel

                    </h3>

                </div>


                <div class="card-body">

                    <div class="form-group">

                        <label>
                            Facebook Pixel Code
                        </label>

                        <textarea name="facebook_pixel_code"
                                  rows="1"
                                  class="form-control"
                                  placeholder="Paste Facebook Pixel code here">{{ old('facebook_pixel_code', $settings['facebook_pixel_code']->value ?? '') }}</textarea>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- TAWK --}}
            {{-- ================================================= --}}

            <div class="card card-warning">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-comments mr-1"></i>

                        Tawk.to

                    </h3>

                </div>


                <div class="card-body">

                    <div class="form-group">

                        <label>
                            Tawk Chat Link
                        </label>

                        <input type="url"
                               name="tawk_chat_link"
                               value="{{ old('tawk_chat_link', $settings['tawk_chat_link']->value ?? '') }}"
                               class="form-control"
                               placeholder="https://embed.tawk.to/...">

                    </div>

                </div>

            </div>


            {{-- SAVE --}}

            <div class="card">

                <div class="card-footer">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save mr-1"></i>

                        Save Integration Settings

                    </button>

                </div>

            </div>

        </form>

    </div>

</section>

@endsection