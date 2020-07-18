@extends("admin.layouts.app")

@section("content")
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
    @include('admin.layouts.alerts')
    <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header">
                        <form action="{{ route("admin.categories.index") }}" method="get">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <select class="form-control" name="search_by">
                                                <option value="">Search By</option>
                                                <option value="id" {{ request()->get("search_by") == 'id' ? 'selected' : null }}>ID</option>
                                                <option value="name" {{ request()->get("search_by") == 'name' ? 'selected' : null }}>Name</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                            </div>
                                            <input class="form-control" value="{{request()->get('query')}}" name="query" placeholder="Search" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <select class="form-control" name="active">
                                                <option value="">All Statues</option>
                                                @foreach($status::getList() as $key => $value)
                                                    <option value="{{ $key }}" {{ request()->filled('active') && (int)request()->get('active') === $key ? 'selected':'' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <button type="submit" href="#" class="btn btn-block btn-outline-primary"><i class="fa fa-search"></i> Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group"></div>

        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Categories</h3>
                            </div>
                            <div class="col-4 text-right">
                                @can("create", \App\Models\Category::class)
                                    <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-icon btn-outline-primary float-right">Create <span class="btn-inner--icon"><i class="fa fa-plus"></i></span></a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col" >Image</th>
                                    <th scope="col" >Name</th>
                                    <th scope="col" >Status</th>
                                    @if(auth()->user()->hasAccess("admin.categories.edit") || auth()->user()->hasAccess("admin.categories.destroy"))
                                        <th scope="col">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <th scope="row">
                                        {{ $item->id }}
                                    </th>
                                    <td>
                                      <img src="{{ $item->image }}" alt="{{ $item->name }}" width="150px" height="150px">
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $item->active ? "success" : "danger" }}">
                                        {{ $status::getLabel($item->active) }}
                                        </span>
                                    </td>

                                    @if(auth()->user()->hasAccess("admin.categories.edit") || auth()->user()->hasAccess("admin.categories.destroy"))
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    @can("update", $item)
                                                        <a class="dropdown-item" href="{{ route("admin.categories.edit", ['category' => $item]) }}">Edit</a>
                                                    @endcan

                                                    @can("delete", $item)
                                                        <button type="button" class="dropdown-item has-icon" data-toggle="modal" data-target="#delete_model_{{ $item->id }}">
                                                            <i class="fa fa-trash"></i> Remove
                                                        </button>
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

                    @foreach($list as $item)
                        <div class="modal fade" id="delete_model_{{ $item->id }}" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="example-Modal3">{{trans('Delete')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('admin.categories.destroy', ['category' => $item]) }}" method="Post" >
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal-body">
                                            Are you sure? The operation can't be undone.
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

                    <div class="card-footer py-4">
                        {{ $list->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->

    </div>

@endsection
