@extends('dashboard.layouts.app')

@section('title' , __('models.add_partner')  )

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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.partners.index') }}">{{ __('models.partners') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">{{ __('models.add_partner') }}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Vertical form layout section start -->
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title">{{ __('models.add_partner') }}</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical needs-validation" id="createCustomerForm"
                                        action="{{ route('admin.partners.store') }}" method="POST"
                                        enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="row">

                                            {{--  name  --}}
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="name">{{ __('models.name') }}</label>
                                                    <input type="text" id="name" class="form-control" name="name"
                                                        value="{{ old('name') }}" required/>

                                                    @error('name')
                                                        <span class="text-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror

                                            </div>

                                            {{--  email  --}}
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="email">{{ __('models.email') }}</label>
                                                    <input type="email" id="email" class="form-control" name="email"
                                                        value="{{ old('email') }}" required/>

                                                    @error('email')
                                                        <span class="text-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror

                                            </div>

                                            {{--  password  --}}
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="password">{{ __('models.password') }}</label>
                                                    <input type="password" id="password" class="form-control" name="password"
                                                        required/>

                                                    @error('password')
                                                        <span class="text-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror

                                            </div>


                                            {{--  mobile  --}}
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="mobile">{{ __('models.mobile') }}</label>
                                                    <input type="number" id="mobile" class="form-control" name="mobile"
                                                        value="{{ old('mobile') }}" required/>

                                                    @error('mobile')
                                                        <span class="text-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror

                                            </div>

                                            {{--  manager  --}}
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="manager">{{ __('models.manager') }}</label>
                                                    <input type="text" id="manager" class="form-control" name="manager"
                                                        value="{{ old('manager') }}" required/>

                                                    @error('manager')
                                                        <span class="text-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror

                                            </div>

                                            {{--  manager_mobile  --}}
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="manager_mobile">{{ __('models.manager_mobile') }}</label>
                                                    <input type="number" id="manager_mobile" class="form-control" name="manager_mobile"
                                                        value="{{ old('manager_mobile') }}" required/>

                                                    @error('manager_mobile')
                                                        <span class="text-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror

                                            </div>

                                            {{--  img  --}}
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="formFile" class="form-label">{{ __('models.partner_img') }}</label>
                                                <input class="form-control image" type="file" id="formFile"
                                                    name="img" required>

                                                @error('img')
                                                    <span class="text-danger">
                                                        <small class="errorTxt">{{ $message }}</small>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group prev">
                                                <img src="" style="width: 100px" class="img-thumbnail preview-formFile" alt="">
                                            </div>


                                            {{--  location_img  --}}
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="location_img" class="form-label">{{ __('models.location_img') }}</label>
                                                <input class="form-control image" type="file" id="location_img"
                                                    name="location_img" required>

                                                @error('location_img')
                                                    <span class="text-danger">
                                                        <small class="errorTxt">{{ $message }}</small>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group prev">
                                                <img src="" style="width: 100px" class="img-thumbnail preview-location_img" alt="">
                                            </div>

                                            {{-- delivary   --}}
                                            <div class="col-md-6 col-12 mb-3">
                                                <div class="custom-control custom-control-success custom-checkbox">

                                                    <input type="checkbox" name="delivary" class="custom-control-input" value="1" id="delivary" {{ old('delivary') == 1 ? 'checked' : '' }}  />
                                                    <label class="custom-control-label" for="delivary">هل يوجد توصيل ؟</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-3">

                                            </div>

                                            <div class="col-md-12 col-12 mb-3">
                                               <h2 style="text-center">الخدمات المتاحه :</h2>
                                            </div>
                                            {{-- service   --}}
                                            @foreach ($services as $service )
                                            <div class="col-md-6 col-12 mb-3">
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" name="service_id[]" class="custom-control-input" value="{{ $service->id }}" id="{{ $service->id }}" {{ old('service_id') == 1 ? 'checked' : '' }} multiple/>
                                                        <label class="custom-control-label" for="{{ $service->id }}">{{ $service->name }}</label>
                                                    </div>
                                            </div>
                                            @endforeach



                                            <div class="col-md-12 col-12 mb-3">
                                                <div class="d-flex col-md-12 flex-column mb-7 fv-row fv-plugins-icon-container">
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required" style="font-weight:bold">
                                                                {{ __('models.location') . ' ('.__('models.search_in_map').')' }}
                                                            </span>

                                                        </label>
                                                            <input type="text"  name="icon"  class="form-control form-control-solid" id="searchInput" value="{{ old('location') }}" >

                                                </div> <br>
                                           </div>

                                            <div class="col-md-12 col-12 mb-3">
                                                <div class="d-flex col-12 flex-column mb-7 fv-row fv-plugins-icon-container" style="height:100vh">
                                                    <input type="hidden" name="location" class="form-control" id="location"  value="{{ old('location') }}">
                                                    <input type="hidden" name="lat" class="form-control" id="lat"  value="{{ old('lat') }}">
                                                    <input type="hidden" name="lng" class="form-control" id="lng"  value="{{ old('lng') }}">
                                                    <div id="map" style="height: 100%;width: 100%;">
                                                </div>
                                            </div>


                                            <br><br>




                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1">{{ __('models.save') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Vertical form layout section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @push('js')
    @include('dashboard.backend.partners.mab')
    <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
