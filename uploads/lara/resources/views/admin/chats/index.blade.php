@extends("admin.layouts.app")

@section("content")
<style media="screen">
    .chat {
        margin-top: auto;
        margin-bottom: auto;
    }

    .chat .card {
        height: 555px;
        border-radius: 15px !important;
        background-color: rgba(0, 0, 0, 0.9) !important;
    }

    .chat .contacts_body {
        padding: 0.75rem 0 !important;
        overflow-y: auto;
        white-space: nowrap;
    }

    .chat .msg_card_body {
        overflow-y: auto;
    }

    .chat .card-header {
        border-radius: 15px 15px 0 0 !important;
        border-bottom: 0 !important;
    }

    .chat .card-footer {
        border-radius: 0 0 15px 15px !important;
        border-top: 0 !important;
        background: transparent !important;
    }

    .chat .container {
        align-content: center;
    }

    .chat .search {
        border-radius: 15px 0 0 15px !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
    }

    .chat .search:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .chat .type_msg {
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        height: 60px !important;
        overflow-y: auto;
    }

    .chat .type_msg:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .chat .attach_btn {
        border-radius: 15px 0 0 15px !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .chat .send_btn {
        border-radius: 0 15px 15px 0 !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .chat .search_btn {
        border-radius: 0 15px 15px 0 !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .chat .contacts {
        list-style: none;
        padding: 0;
    }

    .chat .contacts li {
        width: 100% !important;
        padding: 5px 10px;
        margin-bottom: 15px !important;
    }

    .chat .active {
        background-color: rgba(0, 0, 0, 0.3);
    }

    .chat .user_img {
        height: 70px;
        width: 70px;
        border: 1.5px solid #f5f6fa;

    }

    .chat .user_img_msg {
        height: 40px;
        width: 40px;
        border: 1.5px solid #f5f6fa;

    }

    .chat .img_cont {
        position: relative;
        height: 70px;
        width: 70px;
    }

    .chat .img_cont_msg {
        height: 40px;
        width: 40px;
    }

    .chat .online_icon {
        position: absolute;
        height: 15px;
        width: 15px;
        background-color: #4cd137;
        border-radius: 50%;
        bottom: 0.2em;
        right: 0.4em;
        border: 1.5px solid white;
    }

    .chat .offline {
        background-color: #c23616 !important;
    }

    .chat .user_info {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 15px;
    }

    .chat .user_info span {
        font-size: 20px;
        color: white;
    }

    .chat .user_info p {
        font-size: 10px;
        font-weight: bolder;
        color: rgb(43, 213, 0,.8)
    }

    .chat onload="".video_cam {
        margin-left: 50px;
        margin-top: 5px;
    }

    .chat onload="".video_cam span {
        color: white;
        font-size: 20px;
        cursor: pointer;
        margin-right: 20px;
    }

    .chat .msg_cotainer {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 10px;
        border-radius: 25px;
        background-color: #fff;
        padding: 10px;
        position: relative;
        min-width: 230px;
    }

    .chat .msg_cotainer_send {
        margin-top: auto;
        margin-bottom: auto;
        margin-right: 10px;
        border-radius: 25px;
        background-color: #78e08f;
        padding: 10px;
        position: relative;
        min-width: 230px;
    }

    .chat .msg_time {
        position: absolute;
        left: 0;
        bottom: -15px;
        color: rgba(255, 255, 255, 0.5);
        font-size: 10px;
    }

    .chat .msg_time_send {
        position: absolute;
        right: 0;
        bottom: -15px;
        color: rgba(255, 255, 255, 0.5);
        font-size: 10px;
    }

    .chat .msg_head {
        position: relative;
        background: transparent !important;
    }

    .chat #action_menu_btn {
        position: absolute;
        right: 10px;
        top: 10px;
        color: white;
        cursor: pointer;
        font-size: 20px;
    }

    .chat .action_menu {
        z-index: 10231;
        position: absolute;
        padding: 15px 0;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border-radius: 15px;
        top: 30px;
        right: 15px;
        display: none;
    }

    .chat .action_menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .chat .action_menu ul li {
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 5px;
    }

    .chat .action_menu ul li i {
        padding-right: 10px;

    }

    .chat .action_menu ul li:hover {
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.2);
    }

    @media(max-width: 576px) {
        .chat .contacts_card {
            margin-bottom: 15px !important;
        }
    }

    .chat_bg
    {
      background: #7F7FD5;
      background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
      background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
    }

    .img-responsive{
      height: 179px;
      width: 300px;
    }
</style>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<div class="container-fluid p-0 chat_bg mt--7">
    <div class="row justify-content-center h-100" id="chat">
        <div class="col-md-12 col-xl-12 chat">
            <div class="card">
                <div class="card-header msg_head">
                    <div class="d-flex bd-highlight">
                        <div class="img_cont">
                            <img src="{{ $user->image }}" class="rounded-circle user_img">
                            <span class="online_icon"></span>
                        </div>
                        <div class="user_info">
                            <span>Chat with {{ $user->first_name . ' ' . $user->last_name }}</span>
                            <p>@{{list.length}} Messages</p>
                        </div>
                    </div>
                    <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                    <div class="action_menu">
                        <ul>
                            <li><i class="fas fa-user-circle"></i> View profile</li>
                        </ul>
                    </div>
                </div>
                <vue-scroll ref="vs" :ops="ops">
                <div class="card-body msg_card_body">
                  <template v-for="item in list">
                    <div v-if="item.user_id != uid" class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                            <img :src="item.user.image" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer" v-if="item.type == 1">
                            @{{ item.message }}
                            <span class="msg_time">@{{ moment(item.created_at).format('lll')}}</span>
                        </div>
                        <div class="msg_cotainer" style="background:none" v-else>
                            <img id="myImg" :src="window.location.origin+'/adminnslamtk/public'+item.message" class="img-responsive">
                            <span class="msg_time">@{{ moment(item.created_at).format('lll')}}</span>
                        </div>
                    </div>

                    <div v-else class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send" v-if="item.type == 1">
                            @{{ item.message }}
                            <span class="msg_time_send">@{{ moment(item.created_at).format('lll')}}</span>
                        </div>
                        <div class="msg_cotainer_send" style="background:none" v-else>
                            <img :src="window.location.origin+'/adminnslamtk/public'+item.message" id="myImg" class="img-responsive">
                            <span class="msg_time_send">@{{ moment(item.created_at).format('lll')}}</span>
                        </div>
                        <div class="img_cont_msg">
                            <img :src="window.location.origin+'/adminnslamtk/public'+item.user.image" class="rounded-circle user_img_msg">
                        </div>
                    </div>
                  </template>
                </div>
                </vue-scroll>
                <div class="card-footer">
                    <div class="input-group">
                        <div class="input-group-append">
                            <label class="input-group-text attach_btn" for="images"><i class="fas fa-paperclip"></i></label>
                            <input type="file" @change="getImage($event)" id="images" style="display:none;">
                        </div>
                        <textarea name="" v-model="message" class="form-control type_msg" @keyup.enter="sendMessage(1)"  placeholder="Type your message..."></textarea>
                        <div class="input-group-append" @click="sendMessage(1)" >
                            <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                        </div>
                    </div>
                </div>
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

                        @can("update", $demand)
                            @method('put')
                            @csrf
                        @endcan
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

                        @can("update", $demand)
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <button type="submit" href="#" class="btn  btn-outline-primary m-b-5  m-t-5"><i class="fa fa-save"></i> {{trans('save')}}</button>
                                    </div>
                                </div>
                            </div>
                        @endcan
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
        el: "#chat",
        data: {
            list: [],
            data: new FormData(),
            uid: "{{ Auth::id() }}",
            message: '',
            ops: {
                rail: {
                },
                bar: {
                background: '#00ff00',
                keepShow: true,
                size: '10px',
                minSize: 0.2
                },
                scrollButton: {
                enable: true,
                background: '#cecece'
                },
                scrollPanel: {
                easing: 'easeInQuad',
                speed: 800
                },
                vuescroll: {
                wheelScrollDuration: 0,
                zooming:false,
                wheelDirectionReverse: false
                }
            },
            channel: ''
        },
        methods: {
            getChat() {
                var _this = this
                $.ajax({
                    url: "{{ route('admin.chats.index') }}",
                    type: "get",
                    data: {
                        user_id: "{{ $_REQUEST['user_id'] }}",
                        demand_id: "{{ $_REQUEST['demand_id'] }}",
                    },
                    success: function(response) {
                        _this.list = response
                    }
                });
                setTimeout(function(){
                  _this.$refs["vs"].scrollTo(
                    {
                      y: "105%"
                    },
                    800
                  );
                },500)
            },
            sendMessage(type) {
                var _this = this
                $.ajax({
                    url: "{{ route('admin.chats.store') }}",
                    type: "post",
                    data: {
                        demand_id: "{{ $_REQUEST['demand_id'] }}",
                        user_id: "{{ Auth::id() }}",
                        message: _this.message,
                        type: type
                    },
                    success: function(response) {
                        _this.message = ''
                        _this.list.push(response)
                        _this.$refs["vs"].scrollTo(
                          {
                            y: "120%"
                          },
                          800
                        );
                    }
                })

            },
            getImage(e) {
                var _this = this
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.im_src').attr('src', e.target.result)
                    $('#message_image').modal('show');
                    $('.modal-backdrop').removeClass('modal-backdrop')
                }
                reader.readAsDataURL(e.target.files[0]);
                this.data.append("message", e.target.files[0])
            },
            sendImageMessage() {
                var _this = this
                this.data.append('user_id', this.uid)
                this.data.append('demand_id', "{{$_REQUEST['demand_id']}}")
                this.data.append('type', "2")
                $.ajax({
                    url: "{{ route('admin.chats.store') }}",
                    type: "post",
                    contentType: false,
                    processData: false,
                    data: _this.data,
                    success: function(response) {
                        _this.message = ''
                        _this.data = new FormData()
                        $('#message_image').modal('hide');
                        _this.list.push(response)
                        _this.$refs["vs"].scrollTo(
                          {
                            y: "120%"
                          },
                          800
                        );
                    }
                })
            }
        },
        created() {
            this.getChat()
            this.channel = pusher.subscribe('private-chat.{{\Auth::id()}}');
            var _this = this;
            this.channel.bind('chat-event', function(data) {
                console.log(data.data);
                if(data.data.demand_id == "{{request()->get('demand_id')}}"){
                    _this.list.push(data.data)
                    _this.$refs["vs"].scrollTo(
                    {
                        y: "120%"
                    },
                    800
                    );
                }
            });
        },
    })
</script>
<script type="text/javascript">
    $('.status-change').change(function() {
        val = $(this).val();
        if (!$('.wait').hasClass('d-none')) {
            $('.wait').addClass('d-none')
        }
        if (val == "{{ $demandstatus::Charging }}") {
            $('.wait').removeClass('d-none')
        }
    })
    $('.add-item').click(function() {
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
    $(document).on('click', '.remove-item', function() {
        $(this).parent('div').parent('div').parent('div').remove();
        if ($(this).hasClass('exsist')) {
            $.get('{{ url('admin/remove/item') }}/' + $(this).attr('id'),
                function(res) {
                    console.log('ok');
                })
        }
    });

    $('#status').on('change', function() {
        $('#answer_demand').hide();
        if (this.value === '{{ $demandstatus::ReceiveRequest}}') {
            $('#answer_demand').show();
        }
    });

    $(document).ready(function() {
        $('#action_menu_btn').click(function() {
            $('.action_menu').toggle();
        });
    });
</script>
@endsection
