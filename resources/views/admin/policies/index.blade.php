@extends('layouts.master')

@section('title', 'Manage Policies')

@section('content')

@include('admin.components.alert')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Policies</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Home</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Policies
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
                    <i class="fas fa-file-alt"></i>
                    Policy List
                </h3>

                <div class="card-tools">

                    <a href="{{ route('admin.policies.create') }}"
                       class="btn btn-success btn-sm">

                        <i class="fas fa-plus"></i>
                        Add New Policy

                    </a>

                </div>

            </div>


            {{-- Search --}}
            <div class="card-body border-bottom">

                <form method="GET"
                      action="{{ route('admin.policies.index') }}">

                    <div class="row">

                        <div class="col-md-4 mb-2">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Search policy..."
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
                                    @selected(request('status') == '1')>
                                    Active
                                </option>

                                <option value="0"
                                    @selected(request('status') == '0')>
                                    Inactive
                                </option>

                            </select>

                        </div>


                        <div class="col-md-3 mb-2">

                            <select name="sort_by"
                                    class="form-control">

                                <option value="created_at"
                                    @selected(request('sort_by', 'created_at') == 'created_at')>
                                    Created Date
                                </option>

                                <option value="title"
                                    @selected(request('sort_by') == 'title')>
                                    Title
                                </option>

                                <option value="sort_order"
                                    @selected(request('sort_by') == 'sort_order')>
                                    Sort Order
                                </option>

                                <option value="published_at"
                                    @selected(request('sort_by') == 'published_at')>
                                    Published Date
                                </option>

                            </select>

                        </div>


                        <div class="col-md-2 mb-2">

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fas fa-search"></i>
                                Search

                            </button>

                            <a href="{{ route('admin.policies.index') }}"
                               class="btn btn-secondary">

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

                            <th style="width: 50px;">
                                #
                            </th>

                            <th>
                                Title
                            </th>

                            <th>
                                Slug
                            </th>

                            <th style="width: 100px;">
                                Sort Order
                            </th>

                            <th style="width: 120px;">
                                Published
                            </th>

                            <th style="width: 100px;">
                                Status
                            </th>

                            <th style="width: 120px;">
                                Created
                            </th>

                            <th style="width: 150px;">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($policies as $policy)

                            <tr>

                                <td>
                                    {{ $policies->firstItem() + $loop->index }}
                                </td>


                                <td>

                                    <strong>
                                        {{ $policy->title }}
                                    </strong>

                                    @if($policy->description)

                                        <br>

                                        <small class="text-muted">

                                            {{ Str::limit(strip_tags($policy->description), 60) }}

                                        </small>

                                    @endif

                                </td>


                                <td>

                                    <code>
                                        {{ $policy->slug }}
                                    </code>

                                </td>


                                <td class="text-center">

                                    {{ $policy->sort_order ?? 0 }}

                                </td>


                                <td class="text-center">

                                    @if($policy->published_at)

                                        <span class="text-success">

                                            {{ $policy->published_at->format('d M Y') }}

                                        </span>

                                    @else

                                        <span class="text-muted">
                                            Not Published
                                        </span>

                                    @endif

                                </td>


                                <td class="text-center">

                                    @if($policy->is_active)

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


                                <td>

                                    {{ $policy->created_at?->format('d M Y') }}

                                </td>


                                <td>

                                    <a href="{{ route('admin.policies.edit', $policy->id) }}"
                                       class="btn btn-warning btn-sm mr-2"
                                       title="Edit">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <button
                                        type="button"
                                        onclick="confirmDelete(event, {{ $policy->id }})"
                                        class="btn btn-danger btn-sm"
                                        title="Delete">

                                        <i class="fas fa-trash"></i>

                                    </button>


                                    <form
                                        id="delete-form-{{ $policy->id }}"
                                        action="{{ route('admin.policies.destroy', $policy->id) }}"
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

                                        No policies found.

                                    </span>

                                    <a href="{{ route('admin.policies.create') }}">

                                        Add your first policy.

                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if($policies->hasPages())

                <div class="card-footer clearfix">

                    <div class="float-right">

                        {{ $policies->links() }}

                    </div>

                    <div class="float-left">

                        <small class="text-muted">

                            Showing
                            {{ $policies->firstItem() ?? 0 }}
                            to
                            {{ $policies->lastItem() ?? 0 }}
                            of
                            {{ $policies->total() }}
                            policies

                        </small>

                    </div>

                </div>

            @endif

        </div>

    </div>

</section>

@endsection


@push('styles')

<style>

    .table td {
        vertical-align: middle;
    }

    .btn {
        margin-right: 3px;
    }

    code {
        font-size: 12px;
        background: #f4f4f4;
        padding: 3px 6px;
        border-radius: 3px;
    }

</style>

@endpush


@push('js')

<script>

function confirmDelete(event, policyId)
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
                .getElementById('delete-form-' + policyId)
                .submit();

        }

    });
}

</script>

@endpush