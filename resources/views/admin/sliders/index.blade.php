@extends('layouts.master')

@section('title', 'Manage Sliders')

@section('content')

@include('admin.components.alert')

{{-- Content Header --}}
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Sliders</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Sliders
                    </li>

                </ol>
            </div>

        </div>
    </div>
</section>


{{-- Main Content --}}
<section class="content">

    <div class="container-fluid">

        <div class="card card-primary">

            {{-- Header --}}
            <div class="card-header">

                <h3 class="card-title">
                    <i class="fas fa-images"></i>
                    Slider List
                </h3>

                <div class="card-tools">

                    <a
                        href="{{ route('admin.sliders.create') }}"
                        class="btn btn-success btn-sm"
                    >
                        <i class="fas fa-plus"></i>
                        Add New Slider
                    </a>

                </div>

            </div>


            {{-- Filters --}}
            <div class="card-body border-bottom">

                <form
                    method="GET"
                    action="{{ route('admin.sliders.index') }}"
                >

                    <div class="row">

                        {{-- Position --}}
                        <div class="col-md-4 mb-2">

                            <select
                                name="position"
                                class="form-control"
                            >

                                <option value="">
                                    All Positions
                                </option>

                                <option
                                    value="main_slider"
                                    @selected(request('position') == 'main_slider')
                                >
                                    Main Slider
                                </option>

                                <option
                                    value="side_top"
                                    @selected(request('position') == 'side_top')
                                >
                                    Side Top
                                </option>

                                <option
                                    value="side_bottom"
                                    @selected(request('position') == 'side_bottom')
                                >
                                    Side Bottom
                                </option>

                            </select>

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


                        {{-- Sort By --}}
                        <div class="col-md-3 mb-2">

                            <select
                                name="sort_by"
                                class="form-control"
                            >

                                <option
                                    value="sort_order"
                                    @selected(request('sort_by', 'sort_order') === 'sort_order')
                                >
                                    Sort Order
                                </option>

                                <option
                                    value="position"
                                    @selected(request('sort_by') === 'position')
                                >
                                    Position
                                </option>

                                <option
                                    value="created_at"
                                    @selected(request('sort_by') === 'created_at')
                                >
                                    Created Date
                                </option>

                                <option
                                    value="start_at"
                                    @selected(request('sort_by') === 'start_at')
                                >
                                    Start Date
                                </option>

                                <option
                                    value="end_at"
                                    @selected(request('sort_by') === 'end_at')
                                >
                                    End Date
                                </option>

                            </select>

                        </div>


                        {{-- Buttons --}}
                        <div class="col-md-2 mb-2">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                <i class="fas fa-filter"></i>
                                Filter
                            </button>

                            <a
                                href="{{ route('admin.sliders.index') }}"
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

                            <th style="width: 110px;">
                                Image
                            </th>

                            <th>
                                Position
                            </th>

                            <th>
                                Link
                            </th>

                            <th style="width: 80px;">
                                Order
                            </th>

                            <th>
                                Schedule
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Created
                            </th>

                            <th style="width: 130px;">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($sliders as $slider)

                            <tr>

                                {{-- Number --}}
                                <td>
                                    {{ $sliders->firstItem() + $loop->index }}
                                </td>


                                {{-- Image --}}
                                <td>

                                    @if($slider->image)

                                        <img
                                            src="{{ asset('storage/' . $slider->image) }}"
                                            alt="Slider Image"
                                            class="slider-thumb"
                                            width="70"
                                        >

                                    @else

                                        <span class="text-muted">
                                            No Image
                                        </span>

                                    @endif

                                </td>


                                {{-- Position --}}
                                <td>

                                    @if($slider->position === 'main_slider')

                                        <span class="badge badge-primary">
                                            Main Slider
                                        </span>

                                    @elseif($slider->position === 'side_top')

                                        <span class="badge badge-info">
                                            Side Top
                                        </span>

                                    @elseif($slider->position === 'side_bottom')

                                        <span class="badge badge-secondary">
                                            Side Bottom
                                        </span>

                                    @else

                                        <span class="badge badge-light">
                                            Unknown
                                        </span>

                                    @endif

                                </td>


                                {{-- Link --}}
                                <td>

                                    @if($slider->link_url)

                                        <a
                                            href="{{ $slider->link_url }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="text-primary"
                                            title="{{ $slider->link_url }}"
                                        >

                                            <i class="fas fa-external-link-alt"></i>
                                            View Link

                                        </a>

                                    @else

                                        <span class="text-muted">
                                            No Link
                                        </span>

                                    @endif

                                </td>


                                {{-- Sort Order --}}
                                <td class="text-center">

                                    <span class="badge badge-light">
                                        {{ $slider->sort_order }}
                                    </span>

                                </td>


                                {{-- Schedule --}}
                                <td>

                                    @if($slider->start_at || $slider->end_at)

                                        <small>

                                            @if($slider->start_at)

                                                <strong>
                                                    Start:
                                                </strong>

                                                {{ $slider->start_at->format('d M Y h:i A') }}

                                                <br>

                                            @endif


                                            @if($slider->end_at)

                                                <strong>
                                                    End:
                                                </strong>

                                                {{ $slider->end_at->format('d M Y h:i A') }}

                                            @endif

                                        </small>

                                    @else

                                        <span class="badge badge-secondary">
                                            Always
                                        </span>

                                    @endif

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($slider->is_active)

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

                                    {{ $slider->created_at?->format('d M Y') }}

                                </td>


                                {{-- Actions --}}
                                <td>

                                    <div class="slider-actions">

                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('admin.sliders.edit', $slider->id) }}"
                                            class="btn btn-warning btn-sm mr-2"
                                            title="Edit"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </a>


                                        {{-- Delete --}}
                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $slider->id }})"
                                            title="Delete"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </button>

                                    </div>


                                    {{-- Delete Form --}}
                                    <form
                                        id="delete-form-{{ $slider->id }}"
                                        action="{{ route('admin.sliders.destroy', $slider->id) }}"
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
                                    colspan="9"
                                    class="text-center py-4"
                                >

                                    <i class="fas fa-info-circle text-muted"></i>

                                    <span class="text-muted">
                                        No sliders found.
                                    </span>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination Footer --}}
            @if($sliders->hasPages() || $sliders->total() > 0)

                <div class="card-footer">

                    <div class="row align-items-center">

                        {{-- Showing Info --}}
                        <div class="col-md-6">

                            <small class="text-muted">

                                Showing

                                <strong>
                                    {{ $sliders->firstItem() ?? 0 }}
                                </strong>

                                to

                                <strong>
                                    {{ $sliders->lastItem() ?? 0 }}
                                </strong>

                                of

                                <strong>
                                    {{ $sliders->total() }}
                                </strong>

                                sliders

                            </small>

                        </div>


                        {{-- Pagination --}}
                        <div class="col-md-6">

                            <div class="float-right">

                                {{ $sliders->links() }}

                            </div>

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </div>

</section>

@endsection


{{-- CSS --}}
@push('styles')

<style>

    .table td {
        vertical-align: middle;
    }

    .slider-thumb {
        width: 80px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .slider-actions {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .slider-actions .btn {
        min-width: 36px;
    }

    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    */

    .card-footer .pagination {
        margin-bottom: 0;
    }

    .card-footer .page-link {
        padding: 0.375rem 0.75rem;
    }

</style>

@endpush


{{-- JavaScript --}}
@push('js')

<script>

    function confirmDelete(sliderId) {

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
                    .getElementById('delete-form-' + sliderId)
                    .submit();

            }

        });

    }

</script>

@endpush