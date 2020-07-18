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


    <div class="row">
        <div class="col">
            <div class="card bg-secondary shadow">
                <div class="card-header">
                    <form action="{{ route("admin.users.index") }}" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        <select class="form-control" name="search_by">
                                            <option value="">Search By</option>
                                            <option value="id" {{ request()->get("search_by") == 'id' ? 'selected' : null }}>ID</option>
                                            <option value="first_name" {{ request()->get("search_by") == 'first_name' ? 'selected' : null }}>First Name</option>
                                            <option value="last_name" {{ request()->get("search_by") == 'last_name' ? 'selected' : null }}>Last Name</option>
                                            <option value="email" {{ request()->get("search_by") == 'email' ? 'selected' : null }}>Email</option>
                                            <option value="phone" {{ request()->get("search_by") == 'phone' ? 'selected' : null }}>Phone</option>
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
                                        <select class="form-control" name="gender">
                                            <option value="">All Genders</option>
                                            @foreach($genders::getList() as $key => $value)
                                            <option value="{{ $key }}" {{ request()->filled('gender') && (int)request()->get('gender') === $key ? 'selected':'' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        <select class="form-control" name="per_page">
                                            <option value="*">All</option>
                                            @for($i=10 ; $i <= 100 ; $i+=10) <option value="{{$i}}"
                                              {{ (request()->filled('per_page') && (int)request()->get('per_page') === $i) || (!request()->filled('per_page') && $i ==10) ? 'selected':'' }}>{{$i}}</option>
                                                @endfor
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
                                        <input class="form-control datepicker" autocomplete="off" value="{{request()->get('from')}}" name="from" data-date-format="yyyy-mm-dd" placeholder="Select From date" type="text">
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
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        <select class="form-control" name="area_id">
                                            <option value="">All Areas</option>
                                            @foreach($areas as $key => $area)
                                            <option value="{{ $area->id }}" {{ request()->filled('area_id') && (int)request()->get('area_id') === $area->id ? 'selected':'' }}>{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="type" value="{{ request()->get('type') }}">

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

    <!-- Table -->
    <div class="row">
        <div class="col" data-check-all-container>
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <h3 class="mb-0">Users</h3>
                        </div>
                        <div class="col-7 text-right">
                            @can("create", \App\Models\User::class)
                            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-icon btn-outline-primary float-right">Create <span class="btn-inner--icon"><i class="fa fa-plus"></i></span></a>
                            @endcan

                            @can("delete", new \App\Models\User())
                            <button type="submit mr-2" onclick="remove_all()" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                            @endcan

                            @if(request()->has('type') && request()->get('type') == $userTypes::USER)
                                <button type="button" onclick="setUserId()" class="btn btn-sm btn-icon btn-outline-primary float-right mr-2" data-toggle="modal" data-target="#message_image">
                                    <i class="fas fa-comment"></i> Send Notification
                                </button>
                                @endif
                                <span class="btn btn-sm btn-primary mr-2"> Count: <span data-check-all-count>0</span> </span>
                                <form id="delete_all" class="d-none" action="{{route('admin.users.delete.all')}}" method="post">
                                    @csrf
                                    <input type="hidden" class="user_ids" name="user_ids" value="">
                                </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input data-check-all type="checkbox" aria-label="Checkbox for following text input">
                                        </div>
                                    </div>
                                </th>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">phone</th>
                                <th scope="col">gender</th>
                                <th scope="col">address</th>
                                <th scope="col">Requests</th>
                                @if(auth()->user()->hasAccess("admin.users.edit") || auth()->user()->hasAccess("admin.users.destroy"))
                                    <th scope="col">Actions</th>
                                    @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $item)
                            <tr>
                                <td>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input data-check-all-item class="choise_checkbox" value="{{ $item->id }}" type="checkbox" aria-label="Checkbox for following text input">
                                        </div>
                                    </div>
                                </td>
                                <th scope="row">
                                    {{ $item->id }}
                                </th>
                                <td>
                                    {{ $item->first_name.' '. $item->last_name }}
                                </td>
                                <td>
                                    {{ $item->phone }}
                                </td>
                                <td>
                                    {{ $genders::getLabel($item->gender) }}
                                </td>
                                <td>
                                    {{ $item->area->city->name .' ,' . $item->area->name  }}
                                </td>
                                @if(request()->has('type') && request()->get('type') == $userTypes::ADMIN)
                                    <td>
                                        <a href="{{ route('admin.demands.index',['admin_id' => $item->id]) }}">{{ $item->manageDemands->count() }}</a>
                                    </td>
                                    @else
                                    <td>
                                        <a href="{{ route('admin.demands.index',['user_id' => $item->id]) }}">{{ $item->demands->count() }}</a>
                                    </td>
                                    @endif

                                    @if(auth()->user()->hasAccess("admin.users.edit") || auth()->user()->hasAccess("admin.users.destroy"))
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    @can("update", $item)
                                                    <a class="dropdown-item has-icon" href="{{ route("admin.users.edit", ['user' => $item]) }}"><i class="fa fa-edit"></i> Show & Edit</a>
                                                    @endcan

                                                    @can("delete", $item)
                                                    <button type="button" class="dropdown-item has-icon" data-toggle="modal" data-target="#delete_model_{{ $item->id }}">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </button>
                                                    @endcan

                                                    @if($item->type == $userTypes::ADMIN)
                                                        <a class="dropdown-item has-icon" href="{{ route('admin.users.roles.index', ['user' => $item->id]) }}">
                                                            <i class="fa fa-edit"></i> {{trans('Roles')}}
                                                        </a>
                                                        @endif
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
                <div class="modal fade" id="delete_model_{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="example-Modal3">{{trans('Delete')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admin.users.destroy', ['user' => $item]) }}" method="Post">
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

<div class="modal fade" id="message_image" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.users.send_notify') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Send Notification Message To All User</h4>
                </div>
                <div class="modal-body">
                    <textarea name="message" class="form-control" rows="10" cols="45" placeholder="Type Your Message Here ..."></textarea>
                    <input type="text" class="form-control mt-1" placeholder="Type Url Here ...." name="url" value="">
                    <input type="hidden" name="user_ids" class="notify_user_ids" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section("script")
<script type="text/javascript" src="{{ asset('assets/js/check-all.umd.js') }}"></script>
<script type="text/javascript">
    var x = checkAll.default(document.querySelector('[data-check-all-container]'))

    function remove_all() {
        var str = ''
        $('.choise_checkbox').each(function() {
            if (this.checked) {
                str += $(this).val() + ','
            }
        });
        $('.user_ids').val(str.slice(0, -1))
        if (confirm("are you Sure ?")) {
            $('#delete_all').submit()
        }
    }

    function setUserId() {
        var str = ''
        $('.choise_checkbox').each(function() {
            if (this.checked) {
                str += $(this).val() + ','
            }
        });
        $('.notify_user_ids').val(str.slice(0, -1))
    }
</script>
@endsection
