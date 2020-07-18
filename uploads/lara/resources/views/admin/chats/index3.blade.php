@extends("admin.layouts.app")

@section("content")
<style media="screen">
    @importurl("https://fonts.googleapis.com/css?family=Lato:100, 300, 400, 700");
    @importurl("https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css");

    a {
        color: rgba(82, 179, 217, 0.9);
    }

    /* M E N U */

    .menu {
        position: absolute;
        top: 0;
        left: 0;
        right:0;
        width: 100%;
        height: 50px;
        background: rgba(82, 179, 217, 0.9);
    }

    .back {
        position: absolute;
        width: 90px;
        height: 50px;
        top: 0px;
        left: 0px;
        color: #fff;
        line-height: 50px;
        font-size: 30px;
        padding-left: 10px;
        cursor: pointer;
    }

    .back img {
        position: absolute;
        top: 5px;
        left: 30px;
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.98);
        border-radius: 100%;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        -ms-border-radius: 100%;
        margin-left: 15px;
    }

    .back:active {
        background: rgba(255, 255, 255, 0.2);
    }

    .name {
        position: absolute;
        top: 3px;
        left: 110px;
        font-family: "Lato";
        font-size: 25px;
        font-weight: 300;
        color: rgba(255, 255, 255, 0.98);
        cursor: default;
    }

    .last {
        position: relative;
        top: 30px;
        left: 115px;
        font-family: "Lato";
        font-size: 11px;
        font-weight: 400;
        color: rgba(255, 255, 255, 0.6);
        cursor: default;
    }

    /* M E S S A G E S */

    .chat {
        list-style: none;
        background: none;
        margin: 0;
        padding: 0 0 50px 0;
        margin-top: 60px;
        margin-bottom: 10px;
    }

    .chat li {
        padding: 0.5rem;
        overflow: hidden;
        display: flex;
    }

    .chat .avatar {
        width: 40px;
        height: 40px;
        position: relative;
        display: block;
        z-index: 2;
        border-radius: 100%;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        -ms-border-radius: 100%;
        background-color: rgba(255, 255, 255, 0.9);
    }

    .chat .avatar img {
        width: 40px;
        height: 40px;
        border-radius: 100%;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        -ms-border-radius: 100%;
        background-color: rgba(255, 255, 255, 0.9);
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .chat .day {
        position: relative;
        display: block;
        text-align: center;
        color: #c0c0c0;
        height: 20px;
        text-shadow: 7px 0px 0px #e5e5e5, 6px 0px 0px #e5e5e5, 5px 0px 0px #e5e5e5,
            4px 0px 0px #e5e5e5, 3px 0px 0px #e5e5e5, 2px 0px 0px #e5e5e5,
            1px 0px 0px #e5e5e5, 1px 0px 0px #e5e5e5, 0px 0px 0px #e5e5e5,
            -1px 0px 0px #e5e5e5, -2px 0px 0px #e5e5e5, -3px 0px 0px #e5e5e5,
            -4px 0px 0px #e5e5e5, -5px 0px 0px #e5e5e5, -6px 0px 0px #e5e5e5,
            -7px 0px 0px #e5e5e5;
        box-shadow: inset 20px 0px 0px #e5e5e5, inset -20px 0px 0px #e5e5e5,
            inset 0px -2px 0px #d7d7d7;
        line-height: 38px;
        margin-top: 5px;
        margin-bottom: 20px;
        cursor: default;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .other .msg {
        order: 1;
        border-top-left-radius: 0px;
        box-shadow: -1px 2px 0px #d4d4d4;
    }

    .other:before {
        content: "";
        position: relative;
        top: 0px;
        right: 0px;
        left: 40px;
        width: 0px;
        height: 0px;
        border: 5px solid #fff;
        border-left-color: transparent;
        border-bottom-color: transparent;
    }

    .self {
        justify-content: flex-end;
        align-items: flex-end;
    }

    .self .msg {
        order: 1;
        border-bottom-right-radius: 0px;
        box-shadow: 1px 2px 0px #d4d4d4;
    }

    .self .avatar {
        order: 2;
    }

    .self .avatar:after {
        content: "";
        position: relative;
        display: inline-block;
        bottom: 19px;
        right: 0px;
        width: 0px;
        height: 0px;
        border: 5px solid #fff;
        border-right-color: transparent;
        border-top-color: transparent;
        box-shadow: 0px 2px 0px #d4d4d4;
    }

    .msg {
        background: #000;
        min-width: 50px;
        padding: 10px;
        border-radius: 2px;
        box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.07);
    }

    .msg p {
        font-size: 0.8rem;
        margin: 0 0 0.2rem 0;
        color: #fff;
        word-break: break-word;
    }

    .msg img {
        position: relative;
        display: block;
        width: 450px;
        border-radius: 5px;
        box-shadow: 0px 0px 3px #eee;
        transition: all 0.4s cubic-bezier(0.565, -0.26, 0.255, 1.41);
        cursor: default;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    @mediascreen and (max-width: 800px) {
        .msg img {
            width: 300px;
        }
    }

    @mediascreen and (max-width: 550px) {
        .msg img {
            width: 200px;
        }
    }

    .msg time {
        font-size: 0.7rem;
        color: #ccc;
        margin-top: 3px;
        float: right;
        cursor: default;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .msg time:before {
        content: "\f017";
        color: #ddd;
        font-family: FontAwesome;
        display: inline-block;
        margin-right: 4px;
    }

    emoji {
        display: inline-block;
        height: 18px;
        width: 18px;
        background-size: cover;
        background-repeat: no-repeat;
        margin-top: -7px;
        margin-right: 2px;
        transform: translate3d(0px, 3px, 0px);
    }

    emoji.please {
        background-image: url(https://imgur.com/ftowh0s.png);
    }

    emoji.lmao {
        background-image: url(https://i.imgur.com/MllSy5N.png);
    }

    emoji.happy {
        background-image: url(https://imgur.com/5WUpcPZ.png);
    }

    emoji.pizza {
        background-image: url(https://imgur.com/voEvJld.png);
    }

    emoji.cryalot {
        background-image: url(https://i.imgur.com/UUrRRo6.png);
    }

    emoji.books {
        background-image: url(https://i.imgur.com/UjZLf1R.png);
    }

    emoji.moai {
        background-image: url(https://imgur.com/uSpaYy8.png);
    }

    emoji.suffocated {
        background-image: url(https://i.imgur.com/jfTyB5F.png);
    }

    emoji.scream {
        background-image: url(https://i.imgur.com/tOLNJgg.png);
    }

    emoji.hearth_blue {
        background-image: url(https://i.imgur.com/gR9juts.png);
    }

    emoji.funny {
        background-image: url(https://i.imgur.com/qKia58V.png);
    }

    @-webikt-keyframespulse {
        from {
            opacity: 0;
        }

        to {
            opacity: 0.5;
        }
    }

    /* ::-webkit-scrollbar {
        min-width: 12px;
        width: 12px;
        max-width: 12px;
        min-height: 12px;
        height: 12px;
        max-height: 12px;
        background: #e5e5e5;
        box-shadow: inset 0px 50px 0px rgba(82, 179, 217, 0.9),
            inset 0px -52px 0px #fafafa;
    }

    ::-webkit-scrollbar-thumb {
        background: #bbb;
        border: none;
        border-radius: 100px;
        border: solid 3px #e5e5e5;
        box-shadow: inset 0px 0px 3px #999;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #b0b0b0;
        box-shadow: inset 0px 0px 3px #888;
    }

    ::-webkit-scrollbar-thumb:active {
        background: #aaa;
        box-shadow: inset 0px 0px 3px #7f7f7f;
    }

    ::-webkit-scrollbar-button {
        display: block;
        height: 26px;
    } */

    /* T Y P E */

    input.textarea {
        position: relative;
        bottom: 0px;
        left: 0px;
        right: 0px;
        width: 100%;
        height: 50px;
        z-index: 99;
        background: #fafafa;
        border: none;
        outline: none;
        padding-left: 55px;
        padding-right: 55px;
        color: #666;
        font-weight: 400;
    }

    .emojis {
        position: fixed;
        display: block;
        bottom: 8px;
        left: 7px;
        width: 34px;
        height: 34px;
        background-image: url(https://i.imgur.com/5WUpcPZ.png);
        background-repeat: no-repeat;
        background-size: cover;
        z-index: 100;
        cursor: pointer;
    }

    .emojis:active {
        opacity: 0.9;
    }
</style>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
  <div class="row">
  <div class="col-xl-12 order-xl-1" id="chat" style="background-color: #5a00d1;box-shadow: rgb(17, 11, 11) 1px 1px 15px;">
      <div class="menu">
          <div class="back"><i class="fa fa-chevron-left"></i> <img src="{{ $user->image }}" draggable="false" /></div>
          <div class="name">{{ $user->first_name }}</div>
      </div>
      <ol class="chat" style="overflow-y:scroll;height:440px">
          <li v-for="item in list" :class="[item.user_id == uid ? 'self' : 'other']">
              <div class="avatar"><img :src="item.user.image" draggable="false" /></div>
              <div class="msg">
                  <p v-if="item.type == 1">@{{ item.message }}</p>
                  <p v-else> <img :src="item.message" alt=""> </p>
                  <time>@{{ item.created_at }}</time>
              </div>
          </li>
      </ol>
      <input type="file" @change="getImage($event)" id="images" style="display:none;">
      <label for="images" class="badge btn btn-success" style="height: 50px;position: absolute;z-index: 9999;left: 15px;border-radius: 0;">
        <i class="fa fa-image fa-lg" style="font-size: 42px;"></i>
      </label>
      <input type="text" placeholder="Type here!" v-model="message" @keyup.enter="sendMessage(1)" class="textarea message_focuse">
      <div class="modal fade" id="message_image" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Show Image</h4>
            </div>
            <div class="modal-body">
              <img class="im_src" style="width:100%;height:300px" src="" alt="">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" @click.prevent="sendImageMessage">Send Message</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="row" style="min-height: 30px;"></div>
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

                        <div class="row" id="answer_demand" @if(old('status', $demand->status) != $demandstatus::Approval and old('status', $demand->status) != $demandstatus::ReceiveRequest) style="display: none;" @endif>
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
                                        <label class="form-control-label" for="">Price befor discount</label>
                                        <input type="number" step=".01" min="1" class="form-control" name="price" id="" value="{{ old("price", $demand->price) }}" placeholder="Price Befor Discount">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="">Price after discount</label>
                                        <input type="number" step=".01" min="1" class="form-control" name="price_after_discount" id="" value="{{ old("price_after_discount", $demand->price_after_discount) }}" placeholder="Price After Discount">
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
                        <input type="hidden" name="chat" value="chat">
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
    <div class="row" style="min-height: 100px;"></div>

</div>
@stop
@section('script')
<script type="text/javascript">
  const app = new Vue({
    el:"#chat",
    data:{
      list : [],
      data:new FormData(),
      uid : "{{ Auth::id() }}",
      message:'',
      channel:''
    },
    methods: {
      getChat(){
        var _this = this
        $.ajax({
          url:"{{ route('admin.chats.index') }}",
          type:"get",
          data:{
            user_id    : "{{ $_REQUEST['user_id'] }}",
            demand_id : "{{ $_REQUEST['demand_id'] }}",
          },
          success:function(response){
            _this.list = response
          }
        });
        $('.chat').scrollTop($(".chat")[0].scrollHeight);
      },
      sendMessage(type){
        var _this = this
        $.ajax({
          url:"{{ route('admin.chats.store') }}",
          type:"post",
          data:{
            demand_id:"{{ $_REQUEST['demand_id'] }}",
            user_id:"{{ Auth::id() }}",
            message:_this.message,
            type:type
          },
          success:function(response){
            _this.message = ''
            _this.list.push(response)
          }
        })
        $('.chat').scrollTop($(".chat")[0].scrollHeight);
      },
      getImage(e){
        var _this = this
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.im_src').attr('src',e.target.result)
            $('#message_image').modal('show');
        }
        reader.readAsDataURL(e.target.files[0]);
        this.data.append("message", e.target.files[0])
      },
      sendImageMessage(){
        var _this = this
        this.data.append('user_id',this.uid)
        this.data.append('demand_id',"{{$_REQUEST['demand_id']}}")
        this.data.append('type',"2")
        $.ajax({
          url:"{{ route('admin.chats.store') }}",
          type:"post",
          contentType: false,
          processData: false,
          data:_this.data,
          success:function(response){
            _this.message = ''
            _this.data = new FormData()
            $('#message_image').modal('hide');
            _this.list.push(response)
          }
        })
        $('.chat').scrollTop($(".chat")[0].scrollHeight);
      }
    },
    created() {
      this.getChat()
      this.channel = pusher.subscribe('private-chat.{{\Auth::id()}}');
      var _this = this;
      this.channel.bind('chat-event', function(data) {
        _this.list.push(data.data)
        $('.chat').scrollTop($(".chat")[0].scrollHeight);
      });
    },
  })
</script>
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
