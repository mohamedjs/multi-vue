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
        @if(
            auth()->user()->hasAccess("admin.demands.assignees.create") or
            auth()->user()->hasAccess("admin.demands.assignees.himself")
        )
            <div class="row">
                <div class="col">
                    <div class="card bg-secondary shadow">
                        <div class="card-header">
                            <form action="{{ route("admin.demands.assignees.store", ["demand" => $demand]) }}" method="post">
                                @csrf
                                <div class="row">
                                    @error('user_id')
                                        <div class="col-12">
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <select class="form-control" name="user_id">
                                                    <option value="">All Admins</option>
                                                    @foreach($admins as $key => $user)
                                                        <option value="{{ $user->id }}" {{ $user->id == auth()->id() ? " style=color:green" : null }} {{ request()->filled('user_id') && (int)request()->get('user_id') === $user->id ? 'selected':'' }}>{{ $user->first_name.' '.$user->last_name}} {{ $user->id == auth()->id() ? " (Me)" : null }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <button type="submit" href="#" class="btn btn-block btn-outline-primary">Add Request Manager</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="form-group"></div>

        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Requests</h3>
                            </div>
                            <div class="col-4 text-right">
                                {{-- <a href="{{ route('admin.demands.create') }}" class="btn btn-sm btn-icon btn-outline-primary float-right">Create <span class="btn-inner--icon"><i class="fa fa-plus"></i></span></a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">image</th>
                                <th scope="col" >User Name</th>
                                <th scope="col" >Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($demand->managers as $user)
                                <tr>
                                    <th scope="row">
                                        {{ $user->id }}
                                    </th>
                                    <th>
                                        <img src="{{ $user->image }}" style="width:150px;height:150px;" alt="">
                                    </th>
                                    <td>
                                        {{ $user->first_name . " " . $user->last_name }}
                                    </td>
                                    <td class="text-right">
                                        @if(
                                            auth()->user()->hasAccess("admin.demands.assignees.create") or
                                            ( auth()->user()->hasAccess("admin.demands.assignees.himself") and auth()->id() == $user->id)
                                        )
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <button type="button" class="dropdown-item has-icon" data-toggle="modal" data-target="#delete_model_{{ $user->id }}">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @foreach($demand->managers as $user)
            <div class="modal fade" id="delete_model_{{ $user->id }}" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">{{trans('Delete')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('admin.demands.assignees.destroy', ['demand' => $demand, "assignee" => $user]) }}" method="Post" >
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
                <!-- Footer -->

    </div>

@endsection
