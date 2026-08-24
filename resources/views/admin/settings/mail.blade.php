@extends('layouts.master')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1>Mail Settings</h1>

            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Mail Settings
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
                   value="mail">


            <div class="card card-warning">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-envelope mr-1"></i>

                        SMTP Mail Configuration

                    </h3>

                </div>


                <div class="card-body">

                    <div class="row">


                        {{-- Sender Name --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Sender Name
                                </label>

                                <input type="text"
                                       name="sender_name"
                                       value="{{ old('sender_name', $settings['sender_name']->value ?? '') }}"
                                       class="form-control"
                                       placeholder="My Website">

                            </div>

                        </div>


                        {{-- Sender Email --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Sender Email
                                </label>

                                <input type="email"
                                       name="sender_email"
                                       value="{{ old('sender_email', $settings['sender_email']->value ?? '') }}"
                                       class="form-control"
                                       placeholder="info@example.com">

                            </div>

                        </div>


                        {{-- Recipient --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Recipient Email
                                </label>

                                <input type="email"
                                       name="recipient_email"
                                       value="{{ old('recipient_email', $settings['recipient_email']->value ?? '') }}"
                                       class="form-control"
                                       placeholder="admin@example.com">

                            </div>

                        </div>


                        {{-- Host --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Mail Host
                                </label>

                                <input type="text"
                                       name="mail_host"
                                       value="{{ old('mail_host', $settings['mail_host']->value ?? '') }}"
                                       class="form-control"
                                       placeholder="smtp.gmail.com">

                            </div>

                        </div>


                        {{-- Username --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    SMTP Username
                                </label>

                                <input type="text"
                                       name="smtp_username"
                                       value="{{ old('smtp_username', $settings['smtp_username']->value ?? '') }}"
                                       class="form-control"
                                       placeholder="example@gmail.com">

                            </div>

                        </div>


                        {{-- Password --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    SMTP Password
                                </label>

                                <input type="password"
                                       name="smtp_password"
                                       class="form-control"
                                       placeholder="Leave blank to keep existing password">

                                <small class="text-muted">

                                    Leave blank to keep existing password.

                                </small>

                            </div>

                        </div>


                        {{-- Port --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Mail Port
                                </label>

                                <input type="number"
                                       name="mail_port"
                                       value="{{ old('mail_port', $settings['mail_port']->value ?? 587) }}"
                                       class="form-control"
                                       placeholder="587">

                            </div>

                        </div>


                        {{-- Encryption --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Mail Encryption
                                </label>

                                @php

                                    $encryption = old(
                                        'mail_encryption',
                                        $settings['mail_encryption']->value ?? 'tls'
                                    );

                                @endphp


                                <select name="mail_encryption"
                                        class="form-control">

                                    <option value="tls"
                                        {{ $encryption === 'tls' ? 'selected' : '' }}>

                                        TLS

                                    </option>

                                    <option value="ssl"
                                        {{ $encryption === 'ssl' ? 'selected' : '' }}>

                                        SSL

                                    </option>

                                </select>

                            </div>

                        </div>


                    </div>

                </div>


                <div class="card-footer">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save mr-1"></i>

                        Save Mail Settings

                    </button>

                </div>

            </div>

        </form>

    </div>

</section>

@endsection