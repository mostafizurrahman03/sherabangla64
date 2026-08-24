@extends('layouts.master')

@section('title', 'Manage Permissions')

@section('content')

@include('admin.components.alert')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Permissions</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Permissions
                    </li>

                </ol>

            </div>

        </div>

    </div>

</section>


<section class="content">

    <div class="container-fluid">

        <div class="card card-primary">

            {{-- Header --}}
            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-key"></i>
                    Permission List

                </h3>

                <div class="card-tools">

                    <a
                        href="{{ route('admin.permissions.create') }}"
                        class="btn btn-success btn-sm"
                    >

                        <i class="fas fa-plus"></i>
                        Add New Permission

                    </a>

                </div>

            </div>


            {{-- Search --}}
            <div class="card-body border-bottom">

                <form
                    method="GET"
                    action="{{ route('admin.permissions.index') }}"
                >

                    <div class="row">

                        {{-- Search --}}
                        <div class="col-md-5 mb-2">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Search permission..."
                                value="{{ request('search') }}"
                            >

                        </div>


                        {{-- Sort --}}
                        <div class="col-md-3 mb-2">

                            <select
                                name="sort_by"
                                class="form-control"
                            >

                                <option
                                    value="created_at"
                                    @selected(request('sort_by', 'created_at') == 'created_at')
                                >
                                    Created Date
                                </option>

                                <option
                                    value="name"
                                    @selected(request('sort_by') == 'name')
                                >
                                    Name
                                </option>

                                <option
                                    value="slug"
                                    @selected(request('sort_by') == 'slug')
                                >
                                    Slug
                                </option>

                            </select>

                        </div>


                        {{-- Search button --}}
                        <div class="col-md-2 mb-2">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >

                                <i class="fas fa-search"></i>
                                Search

                            </button>

                        </div>


                        {{-- Reset --}}
                        <div class="col-md-2 mb-2">

                            <a
                                href="{{ route('admin.permissions.index') }}"
                                class="btn btn-secondary"
                            >

                                <i class="fas fa-sync"></i>
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
                                Permission Name
                            </th>

                            <th>
                                Slug
                            </th>

                            <th class="text-center">
                                Roles
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

                        @forelse($permissions as $permission)

                            <tr>

                                {{-- Number --}}
                                <td>
                                    {{ $permissions->firstItem() + $loop->index }}
                                </td>


                                {{-- Name --}}
                                <td>

                                    <strong>
                                        {{ $permission->name }}
                                    </strong>

                                </td>


                                {{-- Slug --}}
                                <td>

                                    <code>
                                        {{ $permission->slug }}
                                    </code>

                                </td>


                                {{-- Roles --}}
                                <td class="text-center">

                                    <span class="badge badge-info">

                                        {{ $permission->roles_count }}

                                    </span>

                                </td>


                                {{-- Created --}}
                                <td class="text-center">

                                    {{ $permission->created_at?->format('d M Y') }}

                                </td>


                                {{-- Actions --}}
                                <td class="text-center">

                                    <div class="permission-actions">

                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('admin.permissions.edit', $permission->id) }}"
                                            class="btn btn-warning btn-sm mr-2"
                                            title="Edit"
                                        >

                                            <i class="fas fa-edit"></i>

                                        </a>


                                        {{-- Delete --}}
                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $permission->id }})"
                                            title="Delete"
                                        >

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </div>


                                    <form
                                        id="delete-form-{{ $permission->id }}"
                                        action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                        method="POST"
                                        style="display: none;"
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

                                        No permissions found.

                                    </span>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Footer --}}
            <div class="card-footer clearfix">

                <div class="float-right">

                    {{ $permissions->links() }}

                </div>

                <div class="float-left">

                    <small class="text-muted">

                        Showing
                        {{ $permissions->firstItem() ?? 0 }}

                        to

                        {{ $permissions->lastItem() ?? 0 }}

                        of

                        {{ $permissions->total() }}

                        permissions

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

    .permission-actions {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .permission-actions .btn {
        min-width: 36px;
    }

    code {
        font-size: 12px;
        background: #f4f4f4;
        padding: 3px 7px;
        border-radius: 3px;
    }

</style>

@endpush


@push('js')

<script>

    function confirmDelete(permissionId) {

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
                    .getElementById('delete-form-' + permissionId)
                    .submit();

            }

        });

    }

</script>

@endpush