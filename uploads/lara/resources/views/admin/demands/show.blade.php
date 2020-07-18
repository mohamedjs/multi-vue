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
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Requests</h3>
                            </div>
                            <div class="col-4 text-right">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h3>Request Info</h3>
                        <div>
                            ID : {{ $demand->id }}
                        </div>
                        <div>
                            Provider : {{ $demand->provider->name}}
                        </div>
                        <div>
                          User Name  : {{ $demand->user->first_name . ' ' . $demand->user->last_name  }}
                        </div>
                        <div>
                            Email : {{ $demand->user->email}}
                        </div>
                        <div>
                          Phone : {{ $demand->phone }}
                        </div>
                        <div>
                          Notes :
                          <div style="background-color: #DDDDDD; padding: 12px; border-radius: 10px;">
                               {{ $demand->note }}
                          </div>
                        </div>
                        @if($demand->image)
                            <div class="row">
                                <div class="col-3">
                                    img:
                                </div>
                                <div class="col-9">
                                    <img id="myImg"  src="{{ $demand->image }}" style="width:300px;height:300px" alt="">
                                </div>
                            </div>
                        @endif

                        @if($demand->answer_demand)
                            <div class="row">
                                <div class="col-3">
                                    Answer Demand:
                                </div>
                                <div class="col-9">
                                    <img id="myImg"  src="{{ $demand->answer_demand }}" style="width:300px;height:300px" alt="">
                                </div>
                            </div>
                        @endif

                        @if($demand->receipt)
                            <div class="row">
                                <div class="col-3">
                                    Receipt:
                                </div>
                                <div class="col-9">
                                    <img src="{{ $demand->receipt }}" style="width:300px;height:300px" alt="">
                                </div>
                            </div>
                        @endif
                        <div>
                          status :
                          <form action="{{ route('admin.demands.update', ['demand' => $demand]) }}" enctype="multipart/form-data" method="post" novalidate>
                              @method('put')
                              @csrf
                              <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <select class="form-control status-change" name="status">
                                                @foreach($demandstatus::getList() as $key => $value)
                                                    <option value="{{ $key }}" {{ $demand->status == $key ? 'selected':'' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="chat" value="chat">
                                <div class="col-md-3">
                                    <button type="submit" href="#" class="btn btn-block btn-outline-primary">Update Status</button>
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

                          </form>
                        </div>
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
      if (this.value === '{{ $demandstatus::Approval}}' || this.value === '{{ $demandstatus::ReceiveRequest}}' ) {
          $('#answer_demand').show();
      }
  });
  </script>
@endsection
