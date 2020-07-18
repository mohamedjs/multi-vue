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

    <div class="form-group"></div>
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header">
                        <form action="{{ route("admin.payments.index") }}" method="get">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                            </div>
                                            <input class="form-control" value="{{request()->get('id')}}" name="id" placeholder="Payment ID" type="number" min="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                            </div>
                                            <input class="form-control" value="{{request()->get('user_id')}}" name="user_id" placeholder="User ID" type="number" min="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                            </div>
                                            <input class="form-control" value="{{request()->get('from')}}" name="from" placeholder="From Amount" type="number" min="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                            </div>
                                            <input class="form-control" value="{{request()->get('to')}}" name="to" placeholder="To Amount" type="number" min="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                            </div>
                                            <input class="form-control" value="{{request()->get('transaction_id')}}" name="transaction_id" placeholder="Transaction ID" type="text">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <select class="form-control" name="payment_method">
                                                <option value="">All Payment Type</option>
                                                @foreach($paymentMethods::getList() as $key => $value)
                                                    <option value="{{ $key }}" {{ request()->filled('payment_method') && (int)request()->get('payment_method') === $key ? 'selected':'' }}>{{ $value }}</option>
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

        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Payments</h3>
                            </div>
                            <div class="col-4 text-right">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">amount</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <th scope="row">
                                        {{ $item->id }}
                                    </th>
                                    <td>
                                        <img src="{{ asset($item->image) }}" width="100px" height="100px">
                                    </td>
                                    <td>
                                        @if($item->user)
                                            {{ $item->user->first_name . " " . $item->user->last_name }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->transaction_id }}
                                    </td>
                                    <td>
                                        {{ $item->amount }}
                                    </td>
                                    <td>
                                      <span class="badge badge-{{ $item->payment_method ==1 ? "success" : "info" }}">
                                        {{ $paymentMethods::getLabel($item->payment_method) }}
                                      </span>
                                    </td>
                                    <td>
                                        {{ $item->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer py-4">
                        {{ $list->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->

    </div>

@endsection
