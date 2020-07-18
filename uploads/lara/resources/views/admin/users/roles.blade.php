@extends('admin.layouts.app')

@section('breadcrumb')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('admin.users.index') }}">Users</a>
@endsection

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
    <div class="container-fluid mt--7">
        @include('admin.layouts.alerts')
        <div class="row">
            <div class="col">
            </div>
        </div>
        <div class="form-group"></div>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Manage Roles</h3>
                            </div>
                            <div class="col-4 text-right">

                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <form action="{{ route('admin.users.roles.store', ['user' => $user]) }}" method="Post" autocomplete="off" >
                            @method('POST')
                            @csrf
                            <div class="form-group col-md-12 row">
                                @foreach ($roles as $role)
                                    <div class="form-group mb-0 col-md-4">

                                        <label>
                                            <input type="checkbox" name="roles[]"  value="{{$role->id}}"  {{ ($user->roles->contains('id', $role->id)) ? 'checked' : '' }} >
                                            {{$role->name}}
                                        </label>

                                    </div>
                                @endforeach

                            </div>

                            <div class="form-group col-md-12 row">
                                <div class="form-group col-md-3">
                                    <button type="submit" href="#" class="btn  btn-outline-primary m-b-5  m-t-5">
                                        <i class="fa fa-save"></i> {{trans('save')}}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer py-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
