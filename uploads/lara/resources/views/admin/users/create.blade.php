@extends("admin.layouts.app")

@section("content")
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
      @if(count($errors)>0)
          <div class="alert alert-danger">
              <ul>
                  @foreach($errors->all() as $error)
                      <li>
                          {{$error}}
                      </li>
                  @endforeach
              </ul>
          </div>
      @endif

        <!-- Table -->
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.users.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">User Information</h6>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="first_name">First Name</label>
                                        @error('first_name')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="last_name">Last Name</label>
                                        @error('last_name')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old("last_name") }}" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="emila">Email</label>
                                        @error('email')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="password">Password</label>
                                        @error('password')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="Password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="phone">phone</label>
                                        @error('phone')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" placeholder="phone">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="type">City</label>
                                        @error('city_id')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <select class="form-control" name="city_id" id="city_id">
                                                @foreach($citys as $key => $city)
                                                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected': null }}> {{ $city->name }} </option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="type">Area</label>
                                        @error('area_id')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <select class="form-control" name="area_id" id="area_id">
                                                @foreach($areas as $key => $area)
                                                    <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected': null }}> {{ $area->name }} </option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                      <img src="" width="100%" height="100px" alt="">
                                      <label class="form-control-label" for="name">Image</label>
                                      <input type="file" name="image" accept="image/*">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="type">Type</label>
                                        @error('type')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <select class="form-control" name="type" id="type">
                                            <option value="">Select Product</option>
                                                @foreach($userTypes::getList() as $key => $value)
                                                    <option value="{{ $key }}" {{ old('type') == $key ? 'selected': null }}> {{ $value }} </option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="gender">Gender</label>
                                        @error('gender')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="">Select Gender</option>
                                            @foreach($genders::getList() as $key => $value)
                                                <option value="{{ $key }}" {{ old('gender') == $key ? 'selected': null }}> {{ $value }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-1">
                                    <label class="form-control-label" for="active">{{ trans('Active') }}</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="custom-toggle">
                                        <input type="checkbox" id="active" name="active" value="1"  >
                                        <span class="custom-toggle-slider rounded-circle"></span>
                                    </label>
                                </div>
                            </div>


                            <div class="pl-lg-4">
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
