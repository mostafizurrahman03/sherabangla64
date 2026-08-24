@extends('layouts.master')

@section('title', 'Manage Sliders')

@section('content')

@include('admin.components.alert')

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


            {{-- Search --}}
            <div class="card-body border-bottom">

                <form
                    method="GET"
                    action="{{ route('admin.sliders.index') }}"
                >

                    <div class="row">

                        <div class="col-md-4 mb-2">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Search slider..."
                                value="{{ request('search') }}"
                            >

                        </div>


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
                                    value="title"
                                    @selected(request('sort_by') === 'title')
                                >
                                    Title
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

                            <th style="width: 100px;">
                                Image
                            </th>

                            <th>
                                Title
                            </th>

                            <th>
                                Button
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

                            <th style="width: 140px;">
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

                                    <img
                                        src="{{ asset('storage/' . $slider->image) }}"
                                        alt="{{ $slider->title }}"
                                        class="slider-thumb"
                                        width="70"
                                    >

                                </td>


                                {{-- Title --}}
                                <td>

                                    <strong>
                                        {{ $slider->title ?? 'No Title' }}
                                    </strong>

                                    @if($slider->subtitle)

                                        <br>

                                        <small class="text-muted">
                                            {{ Str::limit($slider->subtitle, 50) }}
                                        </small>

                                    @endif

                                </td>


                                {{-- Button --}}
                                <td>

                                    @if($slider->button_text)

                                        <span class="badge badge-info">
                                            {{ $slider->button_text }}
                                        </span>

                                    @else

                                        <span class="text-muted">
                                            N/A
                                        </span>

                                    @endif

                                </td>


                                {{-- Sort --}}
                                <td class="text-center">

                                    {{ $slider->sort_order }}

                                </td>


                                {{-- Schedule --}}
                                <td>

                                    @if($slider->start_at || $slider->end_at)

                                        <small>

                                            @if($slider->start_at)
                                                <strong>Start:</strong>
                                                {{ $slider->start_at->format('d M Y h:i A') }}
                                                <br>
                                            @endif

                                            @if($slider->end_at)
                                                <strong>End:</strong>
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

                                        <a
                                            href="{{ route('admin.sliders.edit', $slider->id) }}"
                                            class="btn btn-warning btn-sm mr-2"
                                            title="Edit"
                                        >

                                            <i class="fas fa-edit"></i>

                                        </a>


                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $slider->id }})"
                                            title="Delete"
                                        >

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </div>


                                    <form
                                        id="delete-form-{{ $slider->id }}"
                                        action="{{ route('admin.sliders.destroy', $slider->id) }}"
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
                                        No sliders found.
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

                    {{ $sliders->links() }}

                </div>

                <div class="float-left">

                    <small class="text-muted">

                        Showing
                        {{ $sliders->firstItem() ?? 0 }}

                        to

                        {{ $sliders->lastItem() ?? 0 }}

                        of

                        {{ $sliders->total() }}

                        sliders

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

</style>

@endpush


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