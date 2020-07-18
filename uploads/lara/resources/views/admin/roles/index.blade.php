@extends('admin.layouts.app')

@section('breadcrumb')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('admin.roles.index') }}">{{ trans('Roles') }}</a>
@endsection

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
    <div class="container-fluid mt--7">
        @include('admin.layouts.alerts')
        <div class="form-group"></div>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ trans('Roles List') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                @can("create", Role::class)
                                <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-icon btn-outline-primary float-right">{{ trans('Create') }} <span class="btn-inner--icon"><i class="fa fa-plus"></i></span></a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive index-table">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th width="70%" scope="col">{{ trans('Name') }}</th>
                                <th scope="col">{{ trans('Status') }}</th>
                                @if(auth()->user()->hasAccess("admin.roles.edit") || auth()->user()->hasAccess("admin.roles.destroy")|| auth()->user()->hasAccess("admin.role.permissions.index"))
                                    <th scope="col"></th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <th scope="row">{{ $role->name }}</th>
                                    <td> <span class="badge badge-{{ $role->active ? 'success' : 'danger' }}">{{ $role->active?  'Active'  :  'Disabled'  }}</span> </td>
                                    @if(auth()->user()->hasAccess("admin.roles.edit") || auth()->user()->hasAccess("admin.roles.destroy") || auth()->user()->hasAccess("admin.role.permissions.index"))
                                    <td class="text-right">
                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn btn-sm  btn-outline-primary m-b-5 m-t-5 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa-cog fa"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @can("update", $role)
                                                <a class="dropdown-item has-icon" href="{{ route('admin.roles.edit', ['role' => $role]) }}"><i class="fa fa-edit"></i> {{ trans('Edit') }}</a>
                                                @endcan
                                                @can("delete", $role)
                                                <button type="button" class="dropdown-item has-icon" data-toggle="modal" data-target="#delete_model_{{ $role->id }}">
                                                    <i class="fa fa-trash"></i> {{ trans('Remove') }}
                                                </button>
                                                @endcan
                                                @can('index', [RolePermission::class ,$role])
                                                <a class="dropdown-item has-icon" href="{{ route('admin.role.permissions.index', ['role' => $role]) }}">
                                                    <i class="fa fa-edit"></i> {{ trans('permissions') }}
                                                </a>
                                                @endcan
                                            </div>
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                {{ $roles->links() }}
                            </ul>
                        </nav>
                    </div>
                    @foreach ($roles as $role)
                        <div class="modal fade" id="delete_model_{{ $role->id }}" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="example-Modal3">{{trans('Delete')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('admin.roles.destroy', ['role' => $role]) }}" method="Post" >
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal-body">
                                            {{ trans("Are you sure? The operation can't be undone.") }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">{{trans('Close')}}</button>
                                            <button type="submit" class="btn btn-primary">{{trans('Delete')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
