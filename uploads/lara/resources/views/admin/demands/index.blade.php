@extends("admin.layouts.app")

@section("content")
  <style media="screen">
    td{
      padding: 5px !important;
    }
  </style>
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
                        <form action="{{ route("admin.demands.index") }}" method="get">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <select class="form-control" name="search_by">
                                                <option value="">Search By</option>
                                                <option value="id" {{ request()->get("search_by") == 'id' ? 'selected' : null }}>ID</option>
                                                <option value="name" {{ request()->get("search_by") == 'name' ? 'selected' : null }}>Name</option>
                                                <option value="email" {{ request()->get("email") == 'email' ? 'selected' : null }}>Email</option>
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
                                            <select class="form-control" name="per_page">
                                                <option value="*">All</option>
                                                @for($i=10 ; $i <= 100 ; $i+=10)
                                                    <option value="{{$i}}" {{ (request()->filled('per_page') && (int)request()->get('per_page') === $i) || (!request()->filled('per_page') && $i ==10) ? 'selected':'' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <select class="form-control" name="status">
                                                <option value="">All Statues</option>
                                                @foreach($demandstatus::getList() as $key => $value)
                                                    <option value="{{ $key }}" {{ request()->filled('status') && (int)request()->get('status') === $key ? 'selected':'' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <select class="form-control" name="user_id">
                                                <option value="">All Users</option>
                                                @foreach($users as $key => $user)
                                                    <option value="{{ $user->id }}" {{ request()->filled('user_id') && (int)request()->get('user_id') === $user->id ? 'selected':'' }}>{{ $user->first_name.' '.$user->last_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <select class="form-control" name="provider_id">
                                                <option value="">All Providers</option>
                                                @foreach($providers as $key => $provider)
                                                    <option value="{{ $provider->id }}" {{ request()->filled('provider_id') && (int)request()->get('provider_id') === $provider->id ? 'selected':'' }}>{{ $provider->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control datepicker" autocomplete="off" value="{{request()->get('from')}}" name="from" data-date-format="yyyy-mm-dd"  placeholder="Select From date" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control datepicker" autocomplete="off" value="{{request()->get('to')}}" name="to" data-date-format="yyyy-mm-dd" placeholder="Select To date" type="text">
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
            <div class="col" data-check-all-container>
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-5">
                                <h3 class="mb-0">Requests</h3>
                            </div>
                            <div class="col-7 text-right">

                                @can("delete", new \App\Models\Demand())
                                    <button type="submit mr-2" onclick="remove_all()" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                @endcan
                                <span class="btn btn-sm btn-primary mr-2"> Count: <span data-check-all-count>0</span> </span>
                                <form id="delete_all" class="d-none" action="{{route('admin.demands.delete.all')}}" method="post">
                                    @csrf
                                    <input type="hidden" class="demand_ids" name="demand_ids" value="">
                                </form>
                                {{-- <a href="{{ route('admin.demands.create') }}" class="btn btn-sm btn-icon btn-outline-primary float-right">Create <span class="btn-inner--icon"><i class="fa fa-plus"></i></span></a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    @can("delete", new \App\Models\Demand())
                                        <th>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input data-check-all type="checkbox" aria-label="Checkbox for following text input">
                                                </div>
                                            </div>
                                        </th>
                                    @endcan
                                    <th scope="col">ID</th>
                                    <th scope="col" >User Name</th>
                                    <th scope="col" >Provider</th>
                                    <th scope="col">phone</th>
                                    <th scope="col" >Status</th>
                                    @if(
                                        auth()->user()->hasAccess("admin.demands.show") ||
                                        auth()->user()->hasAccess("admin.demands.edit") ||
                                        auth()->user()->hasAccess("admin.demands.destroy")
                                    )
                                        <th scope="col">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    @can("delete", $item)
                                        <th>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input data-check-all-item class="choise_checkbox" value="{{ $item->id }}" type="checkbox" aria-label="Checkbox for following text input">
                                                </div>
                                            </div>
                                        </th>
                                    @endcan
                                    <th scope="row">
                                        {{ $item->id }}
                                    </th>
                                    <td>
                                        {{ $item->user->first_name.''.$item->user->last_name }}
                                    </td>
                                    <td>
                                        {{ $item->provider->name }}
                                    </td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <span class="badge badge-{{ $item->status != 5 ? "success" : "danger" }}">
                                        {{ $demandstatus::getLabel($item->status) }}
                                        </span>
                                    </td>

                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a  href="{{ route("admin.chats.index", ['demand_id' => $item->id , 'user_id' => $item->user_id]) }}" class="dropdown-item has-icon">
                                                    <i class="fa fa-comment"></i> Chat
                                                </a>
                                                @can("update", $item)
                                                    <a  href="{{ route("admin.demands.edit", ['demand' => $item]) }}" class="dropdown-item has-icon">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                @endcan

                                                @can("show", $item)
                                                    {{-- <a href="{{ route("admin.demands.show", ['demand' => $item]) }}" class="dropdown-item has-icon">
                                                        <i class="fa fa-chevron-circle-right"></i> Show Details
                                                    </a> --}}
                                                @endcan
                                                <a  href="{{ route("admin.demands.assignees.create", ['demand' => $item]) }}" class="dropdown-item has-icon">
                                                    <i class="fas fa-user-friends"></i> Request Assignees
                                                </a>
                                                @can("delete", $item)
                                                    <button type="button" class="dropdown-item has-icon" data-toggle="modal" data-target="#delete_model_{{ $item->id }}">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </button>
                                                @endcan

                                            </div>
                                        </div>
                                    </td>
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
                                    <form action="{{ route('admin.demands.destroy', ['demand' => $item]) }}" method="Post" >
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
                        {{ request("per_page") != '*' ? $list->links() : null }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->

    </div>

@endsection

@section("script")
    <script type="text/javascript" src="{{ asset('assets/js/check-all.umd.js') }}"></script>
    <script type="text/javascript">
        var x= checkAll.default(document.querySelector('[data-check-all-container]'))
        function remove_all(){
          var str = ''
          $('.choise_checkbox').each(function () {
            if(this.checked){
              str += $(this).val()+ ','
            }
          });
          $('.demand_ids').val(str.slice(0,-1))
          if(confirm("are you Sure ?")){
              $('#delete_all').submit()
          }
        }
    </script>
@endsection
