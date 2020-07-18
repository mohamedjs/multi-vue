@extends('admin.layouts.app')

@section('breadcrumb')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('admin.roles.index') }}">{{trans ('Update Role Code') }}</a>
@endsection

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
    <div class="container-fluid mt--7">
        @include('admin.layouts.alerts')
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{trans ('Create Role') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.roles.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{trans ('Role Information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="name">{{ trans ('Name')}} </label>
                                            @error('name')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                            <input type="text" id="name" value="{{ old('name') }}" class="form-control form-control-alternative" name="name" placeholder="{{ trans ('Name')}}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <label class="form-control-label" for="active">{{ trans('Status') }}</label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="custom-toggle">
                                            <input type="checkbox" id="active" name="active" value="1" checked >
                                            <span class="custom-toggle-slider rounded-circle"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <button type="submit" href="#" class="btn  btn-outline-primary m-b-5  m-t-5"><i class="fa fa-save"></i> {{trans('save')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
