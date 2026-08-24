@extends('layouts.master')

@section('title', 'Manage Users')

@section('content')

@include('admin.components.alert')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Users</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Users
                    </li>

                </ol>

            </div>

        </div>

    </div>

</section>


<section class="content">

    <div class="container-fluid">

        <div class="row">

            <div class="col-12">

                <div class="card card-primary">

                    {{-- Header --}}
                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-users"></i>

                            User List

                        </h3>


                        <div class="card-tools">

                            <a
                                href="{{ route('admin.users.create') }}"
                                class="btn btn-success btn-sm"
                            >

                                <i class="fas fa-plus"></i>

                                Add New User

                            </a>

                        </div>

                    </div>


                    {{-- Search / Filter --}}
                    <div class="card-body border-bottom">

                        <form
                            method="GET"
                            action="{{ route('admin.users.index') }}"
                        >

                            <div class="row">

                                <div class="col-md-3 mb-2">

                                    <input
                                        type="text"
                                        name="search"
                                        class="form-control"
                                        placeholder="Search user..."
                                        value="{{ request('search') }}"
                                    >

                                </div>


                                <div class="col-md-3 mb-2">

                                    <select
                                        name="role_id"
                                        class="form-control"
                                    >

                                        <option value="">
                                            All Roles
                                        </option>

                                        @foreach($roles as $role)

                                            <option
                                                value="{{ $role->id }}"
                                                @selected(
                                                    request('role_id') == $role->id
                                                )
                                            >

                                                {{ $role->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                <div class="col-md-2 mb-2">

                                    <select
                                        name="status"
                                        class="form-control"
                                    >

                                        <option value="">
                                            All Status
                                        </option>

                                        <option
                                            value="1"
                                            @selected(
                                                request('status') === '1'
                                            )
                                        >
                                            Active
                                        </option>

                                        <option
                                            value="0"
                                            @selected(
                                                request('status') === '0'
                                            )
                                        >
                                            Inactive
                                        </option>

                                    </select>

                                </div>


                                <div class="col-md-2 mb-2">

                                    <select
                                        name="sort_by"
                                        class="form-control"
                                    >

                                        <option
                                            value="created_at"
                                            @selected(
                                                request(
                                                    'sort_by',
                                                    'created_at'
                                                ) === 'created_at'
                                            )
                                        >
                                            Created Date
                                        </option>

                                        <option
                                            value="name"
                                            @selected(
                                                request('sort_by') === 'name'
                                            )
                                        >
                                            Name
                                        </option>

                                        <option
                                            value="email"
                                            @selected(
                                                request('sort_by') === 'email'
                                            )
                                        >
                                            Email
                                        </option>

                                    </select>

                                </div>


                                <div class="col-md-2 mb-2">

                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >

                                        <i class="fas fa-search"></i>

                                        Search

                                    </button>


                                    <a
                                        href="{{ route('admin.users.index') }}"
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

                                    <th style="width:50px;">
                                        #
                                    </th>

                                    <th>
                                        Image
                                    </th>

                                    <th>
                                        Name
                                    </th>

                                    <th>
                                        Email
                                    </th>

                                    <th>
                                        Phone
                                    </th>

                                    <th>
                                        Role
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Created
                                    </th>

                                    <th style="width:120px;">
                                        Actions
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($users as $user)

                                    <tr>

                                        <td>
                                            {{ $users->firstItem() + $loop->index }}
                                        </td>


                                        {{-- Image --}}
                                        <td>

                                            @if($user->image)

                                                <img
                                                    src="{{ asset('storage/' . $user->image) }}"
                                                    alt="{{ $user->name }}"
                                                    class="user-image"
                                                    width="50"
                                                >

                                            @else

                                                <div class="user-placeholder">

                                                    <i class="fas fa-user"></i>

                                                </div>

                                            @endif

                                        </td>


                                        {{-- Name --}}
                                        <td>

                                            <strong>
                                                {{ $user->name }}
                                            </strong>

                                        </td>


                                        {{-- Email --}}
                                        <td>

                                            {{ $user->email }}

                                        </td>


                                        {{-- Phone --}}
                                        <td>

                                            {{ $user->phone_no ?? 'N/A' }}

                                        </td>


                                        {{-- Role --}}
                                        <td>

                                            @if($user->role)

                                                <span class="badge badge-primary">

                                                    {{ $user->role->name }}

                                                </span>

                                            @else

                                                <span class="badge badge-secondary">
                                                    No Role
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Status --}}
                                        <td>

                                            @if($user->is_active)

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
                                        <td>

                                            {{ $user->created_at?->format('d M Y') }}

                                        </td>


                                        {{-- Actions --}}
                                        <td>

                                            <div class="action-buttons">

                                                <a
                                                    href="{{ route('admin.users.edit', $user->id) }}"
                                                    class="btn btn-warning btn-sm"
                                                    title="Edit"
                                                >

                                                    <i class="fas fa-edit"></i>

                                                </a>


                                                @if(auth()->id() != $user->id)

                                                    <button
                                                        type="button"
                                                        onclick="confirmDelete(
                                                            event,
                                                            {{ $user->id }}
                                                        )"
                                                        class="btn btn-danger btn-sm"
                                                        title="Delete"
                                                    >

                                                        <i class="fas fa-trash"></i>

                                                    </button>

                                                @endif

                                            </div>


                                            <form
                                                id="delete-form-{{ $user->id }}"
                                                action="{{ route('admin.users.destroy', $user->id) }}"
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
                                            colspan="9"
                                            class="text-center py-4"
                                        >

                                            <i class="fas fa-info-circle text-muted"></i>

                                            <span class="text-muted">

                                                No users found.

                                                <a
                                                    href="{{ route('admin.users.create') }}"
                                                >
                                                    Add your first user
                                                </a>

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

                            {{ $users->links() }}

                        </div>


                        <div class="float-left">

                            <small class="text-muted">

                                Showing

                                {{ $users->firstItem() ?? 0 }}

                                to

                                {{ $users->lastItem() ?? 0 }}

                                of

                                {{ $users->total() }}

                                users

                            </small>

                        </div>

                    </div>

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

    .user-image {

        width: 45px !important;

        height: 45px !important;

        max-width: 45px !important;

        max-height: 45px !important;

        object-fit: cover;

        border-radius: 50%;

        border: 1px solid #ddd;

        padding: 2px;

        background: #fff;

    }


    .user-placeholder {

        width: 45px;

        height: 45px;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #f4f4f4;

        border: 1px solid #ddd;

        border-radius: 50%;

        color: #999;

    }


    .badge {

        font-size: 12px;

        padding: 5px 9px;

    }


    .action-buttons {

        display: flex;

        align-items: center;

        gap: 8px;

    }


    .action-buttons .btn {

        margin: 0 !important;

    }


    .pagination {

        margin-bottom: 0;
    }

</style>

@endpush


@push('js')

<script>

function confirmDelete(event, userId)
{
    event.preventDefault();

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
                .getElementById(
                    'delete-form-' + userId
                )
                .submit();

        }

    });
}

</script>

@endpush