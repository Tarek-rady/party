@extends('dashboard.layouts.app')

@section('title', __('models.product_details'))

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">{{ __('models.product_details') }}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic table -->
                <table class="datatables-basic table">

                    <tr class="table-info">
                        <th>{{ __('models.products') }}</th>
                        <th>{{ __('models.price') }}</th>
                        <th>{{ __('models.categories') }}</th>


                    </tr>



                    <td>
                        <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="{{ $product->name }}">
                            <img src="{{ asset('storage/'. $product->img) }}" alt="Avatar" height="50" width="50" />
                        </div>
                         {{ $product->name }}

                    </td>
                    <td><span class="badge badge-pill badge-light-info mr-1">{{ $product->price }}</span></td>

                    <td><span class="badge badge-pill badge-light-primary mr-1">{{ $product->category->name }}</span></td>

                    <tr class="table-info">
                        <th>{{ __('models.title') }}</th>
                        <th>{{ __('models.desc') }}</th>
                        <th>{{ __('models.size') }}</th>

                    </tr>

                    <td>
                        <span class="badge badge-pill badge-light-success mr-1"> {{  $product->title }}</span>
                    </td>

                    <td>
                        {{  $product->desc }}
                    </td>

                    <td>
                        @if ($product->sizes)

                            @foreach ($product->sizes as $size)
                                <button class="btn btn-info">{{ $size->name }}</button>
                            @endforeach
                        @endif
                    </td>















                </table>

                <h3 class="text-center" style="color: red">{{ __('models.ingredents') }}</h3>

                <section id="basic-datatable">

                    <!-- Company Table Card -->
                    <div class="col-lg-12 col-12">
                        <div class="card card-company-table">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('models.ingredents') }}</th>
                                                <th>{{ __('models.products') }}</th>

                                                <th>{{ __('models.created_at') }}</th>


                                                <th class="text-center">{{ __('models.action') }}</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($product->ingredents as $ingredent )

                                            <tr>


                                                <td>
                                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="{{ $ingredent->name }}">
                                                        <img src="{{ asset('storage/'. $ingredent->img) }}" alt="Avatar" height="50" width="50" />
                                                    </div>
                                                     {{ $ingredent->name }}

                                                </td>
                                                <td><span class="badge badge-pill badge-light-success mr-1">{{ $ingredent->product->name }}</span></td>

                                                <td>
                                                    <i data-feather="watch" class="font-medium-3"></i>
                                                    {{ $ingredent->created_at->diffForHumans() }}
                                                </td>


                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <a href="{{ route('admin.ingredents.edit', $ingredent->id) }}"
                                                            class="btn btn-sm btn-primary"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                                <a href="{{ route('admin.ingredents.destroy', $ingredent->id) }}"
                                                                    data-id="{{ $ingredent->id }}"
                                                                    class="btn btn-sm btn-danger item-delete"><i
                                                                        class="fa-solid fa-trash-can"></i></a>
                                                    </div>
                                                </td>

                                            </tr>

                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Company Table Card -->

                </section>


            </div>
        </div>
    </div>
    <!-- END: Content-->
    @push('js')
      <script src="{{ asset('dashboard/app-assets/js/custom/custom-delete.js') }}"></script>
    @endpush
@endsection
{{--  success
active  --}}
