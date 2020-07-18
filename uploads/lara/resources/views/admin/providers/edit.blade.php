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
        <!-- Table -->
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Providers</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.providers.update', ['provider' => $provider]) }}" enctype="multipart/form-data" method="post">
                            @method('put')
                            @csrf
                            <h6 class="heading-small text-muted mb-4">Provider Information</h6>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Name</label>
                                        @error('name')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $provider->name) }}" placeholder="Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Address</label>
                                        @error('address')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="address" id="name" value="{{ old('address', $provider->address) }}" placeholder="Address">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="type">Category</label>
                                        @error('category_id')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <select class="form-control chosen-rtl" name="category_id[]" id="category_id" multiple>
                                            <option value="">Select Category</option>
                                                @foreach($category as $key => $cat)
                                                    <option value="{{ $cat->id }}" {{ in_array($cat->id,$provider->categorys->pluck('id')->toArray() )  ? 'selected': null }}> {{ $cat->name }} </option>
                                                @endforeach
                                        </select>
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
                                                    <option value="{{ $city->id }}" {{ $provider->area->city->id == $city->id ? 'selected': null }}> {{ $city->name }} </option>
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
                                                    <option value="{{ $area->id }}" {{ $provider->area_id == $area->id ? 'selected': null }}> {{ $area->name }} </option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                      <img src="{{ $provider->image }}" width="100%" height="100px" alt="">
                                      <label class="form-control-label" for="name">Image</label>
                                      <input type="file" name="image" accept="image/*">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-1">
                                    <label class="form-control-label" for="active">{{ trans('Active') }}</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="custom-toggle">
                                        <input type="checkbox" id="active" name="active" value="1"  {{ old('active', $provider->active) ? "checked" : 0 }}>
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
