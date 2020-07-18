@extends('admin.layouts.app')
@section('breadcrumb')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('admin.roles.index') }}">Roles</a>
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
                                <h3 class="mb-0">Manage Permissions</h3>
                            </div>
                            <div class="col-4 text-right">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive" data-check-all-container>
                        <form action="{{ route('admin.role.permissions.store', ['role' => $role]) }}" method="Post" autocomplete="off" >
                            @method('POST')
                            @csrf
                            <label style="padding-left: 5px ">
                                <input type="checkbox" name="select-all" id="select-all" data-check-all />
                                Check All
                            </label>
                            <div class="form-group col-md-12 row">
                                @foreach($permissionsPerModule as $key => $permissions)
                                    <div class="col-12" style="padding-bottom: 30px;">
                                        <div style="background: #DDD; height: 40px">{{ $key }}</div>
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                <div class="form-group mb-0 col-md-4">
                                                    <label>
                                                        <input type="checkbox" name="permissions[]"  value="{{$permission->id}}"  {{ ($role->permissions->contains('id', $permission->id)) ? 'checked' : '' }} data-check-all-item >
                                                        {{$permission->name}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
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
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="https://unpkg.com/@github/check-all@latest"></script>
    <script>
        checkAll.default(document.querySelector("[data-check-all-container]"))
    </script>u
@endsection
