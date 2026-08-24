@extends('layouts.master')

@section('title', 'Manage Roles')

@section('content')

@include('admin.components.alert')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Roles</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Roles
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
                    <i class="fas fa-user-shield"></i>
                    Role List
                </h3>

                <div class="card-tools">
                    <a href="{{ route('admin.roles.create') }}"
                       class="btn btn-success btn-sm">

                        <i class="fas fa-plus"></i>
                        Add New Role

                    </a>
                </div>

            </div>


            {{-- Search --}}
            <div class="card-body border-bottom">

                <form method="GET"
                      action="{{ route('admin.roles.index') }}">

                    <div class="row">

                        <div class="col-md-5 mb-2">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Search role..."
                                value="{{ request('search') }}"
                            >

                        </div>


                        <div class="col-md-3 mb-2">

                            <select name="status"
                                    class="form-control">

                                <option value="">
                                    All Status
                                </option>

                                <option value="1"
                                    @selected(request('status') === '1')>
                                    Active
                                </option>

                                <option value="0"
                                    @selected(request('status') === '0')>
                                    Inactive
                                </option>

                            </select>

                        </div>


                        <div class="col-md-2 mb-2">

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fas fa-search"></i>
                                Search

                            </button>

                        </div>


                        <div class="col-md-2 mb-2">

                            <a href="{{ route('admin.roles.index') }}"
                               class="btn btn-secondary">

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
                                Name
                            </th>

                            <th>
                                Slug
                            </th>

                            <th>
                                Description
                            </th>

                            <th class="text-center">
                                Users
                            </th>

                            <th class="text-center">
                                Status
                            </th>

                            <th class="text-center">
                                Created
                            </th>

                            <th class="text-center"
                                style="width: 150px;">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($roles as $role)

                            <tr>

                                <td>
                                    {{ $roles->firstItem() + $loop->index }}
                                </td>


                                <td>

                                    <strong>
                                        {{ $role->name }}
                                    </strong>

                                </td>


                                <td>

                                    <code>
                                        {{ $role->slug }}
                                    </code>

                                </td>


                                <td>

                                    @if($role->description)

                                        {{ Str::limit($role->description, 60) }}

                                    @else

                                        <span class="text-muted">
                                            No description
                                        </span>

                                    @endif

                                </td>


                                <td class="text-center">

                                    <span class="badge badge-info">

                                        {{ $role->users_count }}

                                    </span>

                                </td>


                                <td class="text-center">

                                    @if($role->is_active)

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


                                <td class="text-center">

                                    {{ $role->created_at?->format('d M Y') }}

                                </td>


                                <td class="text-center">

                                    <div class="role-actions">

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                                           class="btn btn-warning btn-sm mr-2"
                                           title="Edit">

                                            <i class="fas fa-edit"></i>

                                        </a>


                                        {{-- Delete --}}
                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $role->id }})"
                                            title="Delete">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </div>


                                    <form
                                        id="delete-form-{{ $role->id }}"
                                        action="{{ route('admin.roles.destroy', $role->id) }}"
                                        method="POST"
                                        style="display:none;">

                                        @csrf

                                        @method('DELETE')

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8"
                                    class="text-center py-4">

                                    <i class="fas fa-info-circle text-muted"></i>

                                    <span class="text-muted">

                                        No roles found.

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

                    {{ $roles->links() }}

                </div>

                <div class="float-left">

                    <small class="text-muted">

                        Showing
                        {{ $roles->firstItem() ?? 0 }}
                        to
                        {{ $roles->lastItem() ?? 0 }}
                        of
                        {{ $roles->total() }}
                        roles

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

    .role-actions {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .role-actions .btn {
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

    function confirmDelete(roleId) {

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
                    .getElementById('delete-form-' + roleId)
                    .submit();

            }

        });

    }

</script>

@endpush