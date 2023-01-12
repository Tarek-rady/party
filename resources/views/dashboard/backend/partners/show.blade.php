@extends('dashboard.layouts.app')

@section('title', __('models.partner_details'))

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
                                    <li class="breadcrumb-item"><a href="#">{{ __('models.partner_details') }}</a>
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
                        <th>{{ __('models.partners') }}</th>
                        <th>{{ __('models.email') }}</th>
                        <th>{{ __('models.mobile') }}</th>

                    </tr>



                    <td>
                        <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="{{ $partner->name }}">
                            <img src="{{ asset('storage/'. $partner->img) }}" alt="Avatar" height="50" width="50" />
                        </div>
                        <span class="badge badge-pill badge-light-info mr-1">{{ $partner->name }}</span>

                    </td>
                    <td><span class="badge badge-pill badge-light-info mr-1">{{ $partner->email }}</span></td>

                    <td><span class="badge badge-pill badge-light-primary mr-1">{{ $partner->mobile }}</span></td>


                    <tr class="table-info">
                        <th>{{ __('models.location') }}</th>
                        <th>{{ __('models.manager') }}</th>
                        <th>{{ __('models.manager_mobile') }}</th>

                    </tr>



                    <td>

                        <span class="badge badge-pill badge-light-info mr-1">{{ $partner->location }}</span>

                    </td>
                    <td><span class="badge badge-pill badge-light-info mr-1">{{ $partner->manager }}</span></td>

                    <td><span class="badge badge-pill badge-light-primary mr-1">{{ $partner->manager_mobile }}</span></td>




                    <tr class="table-info">
                        <th>{{ __('models.img') }}</th>
                        <th>{{ __('models.location_img') }}</th>
                        <th>{{ __('models.delivary') }}</th>

                    </tr>



                    <td>
                        <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="{{ $partner->name }}">
                            <img src="{{ asset('storage/'. $partner->location_img) }}" alt="Avatar" height="50" width="50" />
                        </div>


                    </td>
                    <td>
                        <span class="badge badge-pill badge-light-info mr-1"></span>
                    </td>

                    <td>
                        @if ($partner->delivary == 1)
                          <span class="badge badge-pill badge-light-success mr-1"> نعم يوجد توصيل</span>
                        @else
                        <span class="badge badge-pill badge-light-success mr-1"> لا يوجد توصيل</span>

                        @endif
                    </td>



                </table>

                <br><br>


                <section id="basic-datatable">

                    <!-- Company Table Card -->
                    <div class="col-lg-12 col-12">
                        <div class="card card-company-table">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('models.services') }}</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($partner->services as $service )
                                                <td><span class="badge badge-pill badge-light-primary mr-1">{{ $service->name }}</span></td>
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
