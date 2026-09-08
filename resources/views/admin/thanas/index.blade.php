@extends('layouts.master')

@push('css')

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@endpush

@section('content')

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Thanas</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">

                            <a href="{{ route('dashboard') }}">
                                Dashboard
                            </a>

                        </li>

                        <li class="breadcrumb-item active">
                            Thanas
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


            {{-- Search & Filter --}}
            <div class="card">

                <div class="card-body">

                    <form method="GET"
                          action="{{ route('admin.thanas.index') }}">

                        <div class="row">

                            {{-- Search --}}
                            <div class="col-md-4">

                                <div class="form-group mb-md-0">

                                    <label for="search">
                                        Search
                                    </label>

                                    <input type="text"
                                           name="search"
                                           id="search"
                                           value="{{ request('search') }}"
                                           class="form-control"
                                           placeholder="Name, Bengali name or code">

                                </div>

                            </div>


                            {{-- District --}}
                            <div class="col-md-3">

                                <div class="form-group mb-md-0">

                                    <label for="district_id">
                                        District
                                    </label>

                                    <select name="district_id"
                                            id="district_id"
                                            class="form-control">

                                        <option value="">
                                            All Districts
                                        </option>

                                        @foreach($districts as $district)

                                            <option value="{{ $district->id }}"
                                                {{ (string) request('district_id') === (string) $district->id ? 'selected' : '' }}>

                                                {{ $district->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>


                            {{-- Status --}}
                            <div class="col-md-2">

                                <div class="form-group mb-md-0">

                                    <label for="is_active">
                                        Status
                                    </label>

                                    <select name="is_active"
                                            id="is_active"
                                            class="form-control">

                                        <option value="">
                                            All
                                        </option>

                                        <option value="1"
                                            {{ request('is_active') === '1' ? 'selected' : '' }}>

                                            Active

                                        </option>

                                        <option value="0"
                                            {{ request('is_active') === '0' ? 'selected' : '' }}>

                                            Inactive

                                        </option>

                                    </select>

                                </div>

                            </div>


                            {{-- Per Page --}}
                            <div class="col-md-1">

                                <div class="form-group mb-md-0">

                                    <label for="per_page">
                                        Show
                                    </label>

                                    <select name="per_page"
                                            id="per_page"
                                            class="form-control">

                                        <option value="10"
                                            {{ (string) request('per_page', '25') === '10' ? 'selected' : '' }}>

                                            10

                                        </option>

                                        <option value="25"
                                            {{ (string) request('per_page', '25') === '25' ? 'selected' : '' }}>

                                            25

                                        </option>

                                        <option value="50"
                                            {{ (string) request('per_page', '25') === '50' ? 'selected' : '' }}>

                                            50

                                        </option>

                                        <option value="100"
                                            {{ (string) request('per_page', '25') === '100' ? 'selected' : '' }}>

                                            100

                                        </option>

                                        <option value="all"
                                            {{ request('per_page') === 'all' ? 'selected' : '' }}>

                                            All

                                        </option>

                                    </select>

                                </div>

                            </div>


                            {{-- Buttons --}}
                            <div class="col-md-2">

                                <label>
                                    &nbsp;
                                </label>

                                <div>

                                    <button type="submit"
                                            class="btn btn-primary">

                                        <i class="fas fa-search"></i>
                                        Search

                                    </button>

                                    <a href="{{ route('admin.thanas.index') }}"
                                       class="btn btn-secondary"
                                       title="Reset">

                                        <i class="fas fa-redo"></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>


            {{-- Thana List --}}
            <div class="card">

                <div class="card-header">

                    <div class="d-flex justify-content-between align-items-center">

                        <h3 class="card-title">
                            Thana List
                        </h3>

                        <a href="{{ route('admin.thanas.create') }}"
                           class="btn btn-primary btn-sm">

                            <i class="fas fa-plus"></i>
                            Add Thana

                        </a>

                    </div>

                </div>


                {{-- Table --}}
                <div class="card-body p-0">

                    @if($thanas->count())

                        <div class="table-responsive">

                            <table class="table table-bordered table-hover mb-0">

                                <thead>

                                    <tr>

                                        <th width="60">
                                            #
                                        </th>

                                        <th>
                                            District
                                        </th>

                                        <th>
                                            Name
                                        </th>

                                        <th>
                                            Bengali Name
                                        </th>

                                        <th>
                                            Code
                                        </th>

                                        <th>
                                            Status
                                        </th>

                                        <th width="150">
                                            Action
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @foreach($thanas as $thana)

                                        <tr>

                                            {{-- Serial --}}
                                            <td>

                                                {{ $thanas->firstItem() + $loop->index }}

                                            </td>


                                            {{-- District --}}
                                            <td>

                                                {{ $thana->district?->name ?? '-' }}

                                            </td>


                                            {{-- Name --}}
                                            <td>

                                                <strong>
                                                    {{ $thana->name }}
                                                </strong>

                                            </td>


                                            {{-- Bengali Name --}}
                                            <td>

                                                {{ $thana->bn_name ?? '-' }}

                                            </td>


                                            {{-- Code --}}
                                            <td>

                                                {{ $thana->code ?? '-' }}

                                            </td>


                                            {{-- Status --}}
                                            <td>

                                                @if($thana->is_active)

                                                    <span class="badge badge-success">
                                                        Active
                                                    </span>

                                                @else

                                                    <span class="badge badge-danger">
                                                        Inactive
                                                    </span>

                                                @endif

                                            </td>


                                            {{-- Action --}}
                                            <td>

                                                {{-- Edit --}}
                                                <a href="{{ route('admin.thanas.edit', $thana->id) }}"
                                                   class="btn btn-sm btn-warning"
                                                   title="Edit">

                                                    <i class="fas fa-edit"></i>

                                                </a>


                                                {{-- Toggle Status --}}
                                                <form action="{{ route('admin.thanas.toggle-status', $thana->id) }}"
                                                      method="POST"
                                                      class="d-inline">

                                                    @csrf

                                                    <button type="submit"
                                                            class="btn btn-sm {{ $thana->is_active ? 'btn-success' : 'btn-secondary' }}"
                                                            title="{{ $thana->is_active ? 'Deactivate' : 'Activate' }}">

                                                        @if($thana->is_active)

                                                            <i class="fas fa-toggle-on"></i>

                                                        @else

                                                            <i class="fas fa-toggle-off"></i>

                                                        @endif

                                                    </button>

                                                </form>


                                                {{-- Delete --}}
                                                <form action="{{ route('admin.thanas.destroy', $thana->id) }}"
                                                      method="POST"
                                                      class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this thana?');">

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

                            <i class="fas fa-map-marker-alt fa-3x text-muted mb-3"></i>

                            <h5>
                                No thanas found.
                            </h5>

                            <a href="{{ route('admin.thanas.create') }}"
                               class="btn btn-primary mt-2">

                                <i class="fas fa-plus"></i>
                                Add Thana

                            </a>

                        </div>

                    @endif

                </div>


                {{-- Pagination --}}
                @if($thanas->hasPages())

                    <div class="card-footer">

                        <div class="row align-items-center">

                            {{-- Pagination Information --}}
                            <div class="col-md-6">

                                <div class="text-muted">

                                    Showing

                                    <strong>
                                        {{ $thanas->firstItem() }}
                                    </strong>

                                    to

                                    <strong>
                                        {{ $thanas->lastItem() }}
                                    </strong>

                                    of

                                    <strong>
                                        {{ $thanas->total() }}
                                    </strong>

                                    thanas

                                </div>

                            </div>


                            {{-- Pagination Links --}}
                            <div class="col-md-6">

                                <div class="float-right">

                                    {{ $thanas->appends(request()->query())->onEachSide(1)->links('pagination::bootstrap-4') }}

                                </div>

                            </div>

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </section>

@endsection