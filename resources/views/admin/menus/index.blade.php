@extends('layouts.master')

@section('title', 'Manage Menus')

@section('content')

@include('admin.components.alert')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Menus</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Menus
                    </li>

                </ol>

            </div>

        </div>

    </div>

</section>


<section class="content">

    <div class="container-fluid">

        <div class="card card-primary">

            {{-- Card Header --}}
            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-bars"></i>
                    Menu List

                </h3>

                <div class="card-tools">

                    <a
                        href="{{ route('admin.menus.create') }}"
                        class="btn btn-success btn-sm"
                    >

                        <i class="fas fa-plus"></i>
                        Add New Menu

                    </a>

                </div>

            </div>


            {{-- Search / Filter --}}
            <div class="card-body border-bottom">

                <form
                    method="GET"
                    action="{{ route('admin.menus.index') }}"
                >

                    <div class="row">

                        {{-- Search --}}
                        <div class="col-md-4 mb-2">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Search menu..."
                                value="{{ request('search') }}"
                            >

                        </div>


                        {{-- Status --}}
                        <div class="col-md-3 mb-2">

                            <select
                                name="status"
                                class="form-control"
                            >

                                <option value="">
                                    All Status
                                </option>

                                <option
                                    value="1"
                                    @selected(request('status') === '1')
                                >
                                    Active
                                </option>

                                <option
                                    value="0"
                                    @selected(request('status') === '0')
                                >
                                    Inactive
                                </option>

                            </select>

                        </div>


                        {{-- Sort --}}
                        <div class="col-md-3 mb-2">

                            <select
                                name="sort_by"
                                class="form-control"
                            >

                                <option
                                    value="created_at"
                                    @selected(request('sort_by', 'created_at') === 'created_at')
                                >
                                    Created Date
                                </option>

                                <option
                                    value="name"
                                    @selected(request('sort_by') === 'name')
                                >
                                    Name
                                </option>

                                <option
                                    value="status"
                                    @selected(request('sort_by') === 'status')
                                >
                                    Status
                                </option>

                            </select>

                        </div>


                        {{-- Search --}}
                        <div class="col-md-2 mb-2">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >

                                <i class="fas fa-search"></i>
                                Search

                            </button>

                            <a
                                href="{{ route('admin.menus.index') }}"
                                class="btn btn-secondary"
                            >

                                Reset

                            </a>

                        </div>

                    </div>

                </form>

            </div>


            {{-- Table --}}
            <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap">

                    <thead>

                        <tr>

                            <th style="width: 60px;">
                                #
                            </th>

                            <th>
                                Menu Name
                            </th>

                            <th>
                                Created By
                            </th>

                            <th class="text-center">
                                Status
                            </th>

                            <th class="text-center">
                                Created
                            </th>

                            <th
                                class="text-center"
                                style="width: 150px;"
                            >
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($menus as $menu)

                            <tr>

                                {{-- Number --}}
                                <td>
                                    {{ $menus->firstItem() + $loop->index }}
                                </td>


                                {{-- Name --}}
                                <td>

                                    <strong>
                                        {{ $menu->name }}
                                    </strong>

                                </td>


                                {{-- User --}}
                                <td>

                                    @if($menu->user)

                                        <span>
                                            {{ $menu->user->name }}
                                        </span>

                                    @else

                                        <span class="text-muted">
                                            N/A
                                        </span>

                                    @endif

                                </td>


                                {{-- Status --}}
                                <td class="text-center">

                                    @if($menu->status == 1)

                                        <span class="badge badge-success">

                                            <i class="fas fa-check-circle"></i>
                                            Active

                                        </span>

                                    @else

                                        <span class="badge badge-danger">

                                            <i class="fas fa-times-circle"></i>
                                            Inactive

                                        </span>

                                    @endif

                                </td>


                                {{-- Created --}}
                                <td class="text-center">

                                    {{ $menu->created_at?->format('d M Y') }}

                                </td>


                                {{-- Actions --}}
                                <td class="text-center">

                                    <div class="menu-actions">

                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('admin.menus.edit', $menu->id) }}"
                                            class="btn btn-warning btn-sm mr-2"
                                            title="Edit"
                                        >

                                            <i class="fas fa-edit"></i>

                                        </a>


                                        {{-- Delete --}}
                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $menu->id }})"
                                            title="Delete"
                                        >

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </div>


                                    <form
                                        id="delete-form-{{ $menu->id }}"
                                        action="{{ route('admin.menus.destroy', $menu->id) }}"
                                        method="POST"
                                        style="display:none;"
                                    >

                                        @csrf

                                        @method('DELETE')

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="text-center py-4"
                                >

                                    <i class="fas fa-info-circle text-muted"></i>

                                    <span class="text-muted">
                                        No menus found.
                                    </span>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            <div class="card-footer clearfix">

                <div class="float-right">

                    {{ $menus->links() }}

                </div>

                <div class="float-left">

                    <small class="text-muted">

                        Showing
                        {{ $menus->firstItem() ?? 0 }}

                        to

                        {{ $menus->lastItem() ?? 0 }}

                        of

                        {{ $menus->total() }}

                        menus

                    </small>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection


@push('styles')

<style>

    .table td {
        vertical-align: middle;
    }

    .menu-actions {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .menu-actions .btn {
        min-width: 36px;
    }

</style>

@endpush


@push('js')

<script>

    function confirmDelete(menuId) {

        Swal.fire({

            title: 'Are you sure?',

            text: "You won't be able to revert this!",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#d33',

            cancelButtonColor: '#3085d6',

            confirmButtonText: 'Yes, delete it!'

        }).then((result) => {

            if (result.isConfirmed) {

                document
                    .getElementById('delete-form-' + menuId)
                    .submit();

            }

        });

    }

</script>

@endpush