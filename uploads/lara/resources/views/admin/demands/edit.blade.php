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
                                <h3 class="mb-0">Requests</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.demands.update', ['demand' => $demand]) }}" enctype="multipart/form-data" method="post" novalidate>
                            @method('put')
                            @csrf
                            <h6 class="heading-small text-muted mb-4">Request Information</h6>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="provider_id">Provider</label>
                                        @error('provider')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <select name="provider_id" id="provider_id" class="form-control">
                                            <option value="">Select provider</option>
                                            @foreach($providers as $item)
                                                <option value="{{ $item->id }}" {{ old("provider_id", $demand->provider_id) == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Name</label>
                                        @error('name')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $demand->name) }}" placeholder="Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="phone">Phone</label>
                                        @error('phone')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ old("phone", $demand->phone) }}" placeholder="phone">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                      <img id="myImg"  src="{{ asset($demand->image) }}" width="100%" height="100px" alt="">
                                      <label class="form-control-label" for="name">Image</label>
                                      <input type="file" name="image" accept="image/*">
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="answer_demand" @if(old('status', $demand->status) != $demandstatus::ReceiveRequest) style="display: none;" @endif>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                      <img id="myImg"  src="{{ asset($demand->answer_demand) }}" width="100%" height="100px" alt="">
                                      <label class="form-control-label" for="name">Answer to the Request</label>
                                      <input type="file" name="answer_demand" accept="image/*">
                                    </div>
                                </div>
                            </div>

                            <div class="row"  @if(!$demand->receipt) style="display: none;" @endif>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                      <img id="myImg"  src="{{ asset($demand->receipt) }}" width="100%" height="100px" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="status">Request status</label>
                                        @error('status')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <select name="status" id="status" class="form-control status-change">
                                            @foreach($demandstatus::getList() as $key => $value)
                                                <option value="{{ $key }}" {{ $demand->status == $key ? 'selected':'' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="wait {{$demand->status == $demandstatus::Charging ? '' : 'd-none' }} mr-3" style="background-color: #fee9e9;box-shadow: 1px 1px 3px #000;height:auto;padding: 17px;border-radius: 10px;margin-bottom: 25px;">
                              <div class="row">
                                  <div class="col-lg-4">
                                      <div class="form-group focused">
                                          <label class="form-control-label" for="price">Price befor discount</label>
                                          <input type="number" step=".01" min="1" class="form-control" name="price" id="price" value="{{ old("price", $demand->price) }}" placeholder="Price Befor Discount">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-lg-4">
                                      <div class="form-group focused">
                                          <label class="form-control-label" for="price_after_discount">Price after discount</label>
                                          <input type="number" step=".01" min="1" class="form-control" name="price_after_discount" id="price_after_discount" value="{{ old("price_after_discount", $demand->price_after_discount) }}" placeholder="Price After Discount">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-lg-4">
                                      <div class="form-group focused">
                                          <label class="form-control-label" for="demand_details">Request Item</label>
                                          <input type="text" class="form-control" name="title[]" id="demand_details" value="" placeholder="Request Item">
                                      </div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="form-group focused">
                                      <br>
                                      <button type="button" class="mt-2 btn btn-outline-success add-item"><i class="fas fa-plus"></i></button>
                                    </div>
                                  </div>
                              </div>
                              @foreach ($demand->items as $key => $value)
                              <div class="row">
                                  <div class="col-lg-4">
                                      <div class="form-group focused">
                                          <label class="form-control-label" for="demand_details">Request Item</label>
                                          <input type="text" class="form-control" name="title[]" id="demand_details" value="{{ $value->title }}" placeholder="Request Item" disabled>
                                      </div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="form-group focused">
                                      <br>
                                      <button type="button" class="mt-2 btn btn-outline-danger remove-item exsist" id="{{ $value->id }}"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                  </div>
                              </div>
                              @endforeach
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

@section('script')
  <script type="text/javascript">
  $('.status-change').change(function(){
    val = $(this).val();
    if(!$('.wait').hasClass('d-none')){
      $('.wait').addClass('d-none')
    }
    if(val == "{{ $demandstatus::Charging }}"){
      $('.wait').removeClass('d-none')
    }
  })
  $('.add-item').click(function(){
    var inp = '<div class="row">\
                <div class="col-lg-4">\
                    <div class="form-group focused">\
                        <label class="form-control-label" for="demand_details">Request Item</label>\
                        <input type="text" class="form-control" name="title[]" id="demand_details" value="" placeholder="Request Item">\
                    </div>\
                </div>\
                <div class="col-lg-3">\
                  <div class="form-group focused">\
                    <br>\
                    <button type="button" class="mt-2 btn btn-outline-danger remove-item"><i class="fas fa-trash-alt"></i></button>\
                  </div>\
                </div>\
            </div>';
    $('.wait').append(inp)
  });
  $(document).on('click','.remove-item',function(){
    $(this).parent('div').parent('div').parent('div').remove();
    if($(this).hasClass('exsist')){
      $.get('{{ url('admin/remove/item') }}/'+$(this).attr('id'),function(res){
        console.log('ok');
      })
    }
  });

  $('#status').on('change', function () {
      $('#answer_demand').hide();
      if (this.value === '{{ $demandstatus::ReceiveRequest}}' ) {
          $('#answer_demand').show();
      }
  });
  </script>
@endsection
