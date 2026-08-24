@extends('layouts.master')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1>Social Media Settings</h1>

            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Social Media
                    </li>

                </ol>

            </div>

        </div>

    </div>

</section>


<section class="content">

    <div class="container-fluid">

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
                   value="social">


            <div class="card card-info">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-share-alt mr-1"></i>

                        Social Media Links

                    </h3>

                </div>


                <div class="card-body">

                    <div class="row">


                        @php

                            $socials = [

                                'facebook' => [
                                    'label' => 'Facebook',
                                    'icon' => 'fab fa-facebook',
                                ],

                                'instagram' => [
                                    'label' => 'Instagram',
                                    'icon' => 'fab fa-instagram',
                                ],

                                'whatsapp' => [
                                    'label' => 'WhatsApp',
                                    'icon' => 'fab fa-whatsapp',
                                ],

                                'messenger' => [
                                    'label' => 'Messenger',
                                    'icon' => 'fab fa-facebook-messenger',
                                ],

                                'tiktok' => [
                                    'label' => 'TikTok',
                                    'icon' => 'fab fa-tiktok',
                                ],

                                'twitter' => [
                                    'label' => 'Twitter',
                                    'icon' => 'fab fa-twitter',
                                ],

                                'linkedin' => [
                                    'label' => 'LinkedIn',
                                    'icon' => 'fab fa-linkedin',
                                ],

                            ];

                        @endphp


                        @foreach($socials as $key => $social)

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>

                                        {{ $social['label'] }}

                                    </label>


                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <span class="input-group-text">

                                                <i class="{{ $social['icon'] }}"></i>

                                            </span>

                                        </div>


                                        <input type="url"
                                               name="{{ $key }}"
                                               value="{{ old($key, $settings[$key]->value ?? '') }}"
                                               class="form-control"
                                               placeholder="https://...">

                                    </div>

                                </div>

                            </div>

                        @endforeach


                    </div>

                </div>


                <div class="card-footer">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save mr-1"></i>

                        Save Social Settings

                    </button>

                </div>

            </div>

        </form>

    </div>

</section>

@endsection