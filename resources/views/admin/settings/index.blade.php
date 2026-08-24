@extends('layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Settings</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Settings
                    </li>

                </ol>
            </div>

        </div>

    </div>
</section>


<section class="content">

    <div class="container-fluid">

        {{-- Success Message --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button type="button"
                        class="close"
                        data-dismiss="alert">

                    <span>&times;</span>

                </button>

            </div>

        @endif


        {{-- Error Message --}}
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


        <div class="card">

            {{-- Card Header --}}
            <div class="card-header">

                <div class="d-flex justify-content-between align-items-center">

                    <h3 class="card-title">
                        All Settings
                    </h3>

                    <a href="{{ route('admin.settings.create') }}"
                       class="btn btn-primary">

                        <i class="fas fa-plus"></i>
                        Add Setting

                    </a>

                </div>

            </div>


            {{-- Card Body --}}
            <div class="card-body p-0">

                @if($settings->count())

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover mb-0">

                            <thead>

                                <tr>

                                    <th width="60">
                                        #
                                    </th>

                                    <th>
                                        Key
                                    </th>

                                    <th>
                                        Value
                                    </th>

                                    <th>
                                        Type
                                    </th>

                                    <th>
                                        Group
                                    </th>

                                    <th>
                                        Public
                                    </th>

                                    <th width="160">
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($settings as $setting)

                                    <tr>

                                        {{-- Serial --}}
                                        <td>
                                            {{ $settings->firstItem() + $loop->index }}
                                        </td>


                                        {{-- Key --}}
                                        <td>

                                            <strong>
                                                {{ $setting->key }}
                                            </strong>

                                        </td>


                                        {{-- Value --}}
                                        <td>

                                            @if($setting->type === 'password')

                                                <span class="text-muted">
                                                    ********
                                                </span>

                                            @elseif($setting->type === 'code')

                                                <code>
                                                    {{ \Illuminate\Support\Str::limit($setting->value, 80) }}
                                                </code>

                                            @elseif($setting->value === null || $setting->value === '')

                                                <span class="text-muted">
                                                    N/A
                                                </span>

                                            @else

                                                {{ \Illuminate\Support\Str::limit($setting->value, 80) }}

                                            @endif

                                        </td>


                                        {{-- Type --}}
                                        <td>

                                            <span class="badge badge-info">
                                                {{ ucfirst($setting->type) }}
                                            </span>

                                        </td>


                                        {{-- Group --}}
                                        <td>

                                            <span class="badge badge-secondary">
                                                {{ ucfirst($setting->group) }}
                                            </span>

                                        </td>


                                        {{-- Public --}}
                                        <td>

                                            @if($setting->is_public)

                                                <span class="badge badge-success">
                                                    Yes
                                                </span>

                                            @else

                                                <span class="badge badge-danger">
                                                    No
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Actions --}}
                                        <td>

                                            <a href="{{ route('admin.settings.edit', $setting->id) }}"
                                               class="btn btn-sm btn-warning mr-2"
                                               title="Edit">

                                                <i class="fas fa-edit"></i>

                                            </a>


                                            <form action="{{ route('admin.settings.destroy', $setting->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this setting?');">

                                                @csrf

                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        title="Delete">

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    {{-- Empty State --}}
                    <div class="text-center p-5">

                        <i class="fas fa-cog fa-3x text-muted mb-3"></i>

                        <h5>
                            No settings found.
                        </h5>

                        <a href="{{ route('admin.settings.create') }}"
                           class="btn btn-primary mt-2">

                            <i class="fas fa-plus"></i>
                            Add First Setting

                        </a>

                    </div>

                @endif

            </div>


            {{-- Pagination --}}
            @if($settings->hasPages())

                <div class="card-footer clearfix">

                    <div class="row align-items-center">

                        {{-- Pagination Information --}}
                        <div class="col-sm-6">

                            <div class="text-muted">

                                Showing
                                <strong>{{ $settings->firstItem() }}</strong>
                                to
                                <strong>{{ $settings->lastItem() }}</strong>
                                of
                                <strong>{{ $settings->total() }}</strong>
                                settings

                            </div>

                        </div>


                        {{-- Pagination Links --}}
                        <div class="col-sm-6">

                            <div class="float-right">

                                {{ $settings->links('pagination::bootstrap-4') }}

                            </div>

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </div>

</section>

@endsection