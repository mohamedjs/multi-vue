<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="token" content="{{ csrf_token() }}">
    <title>
        Slamtk
    </title>
    <link rel="stylesheet" href="{{ asset('./assets/css/noty.min.css') }}">
    <!-- Favicon -->
    <link href="{{ asset('./assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('./assets/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
    <link href="{{ asset('./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('./assets/css/chosen.min.css') }}">
    <!-- CSS Files -->
    <link href="{{ asset('./assets/css/argon-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
    <style media="screen">
        @-moz-keyframesswing {
            0% {
                -moz-transform: rotate(-3deg)
            }

            50% {
                -moz-transform: rotate(3deg)
            }

            100% {
                -moz-transform: rotate(-3deg)
            }
        }

        @-webkit-keyframesswing {
            0% {
                -webkit-transform: rotate(-3deg)
            }

            50% {
                -webkit-transform: rotate(3deg)
            }

            100% {
                -webkit-transform: rotate(-3deg)
            }
        }

        .swing {
            -moz-animation: 1s ease 0s normal none 5s swing;
            -moz-transform-origin: center top;
            -webkit-animation: swing 1s infinite ease-in-out;
            -webkit-transform-origin: top;
        }
    </style>
    <style media="screen">
      /* Style the Image Used to Trigger the Modal */
      #myImg {
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
      }

      #myImg:hover {opacity: 0.7;}

      /* The Modal (background) */
      .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
      }

      /* Modal Content (Image) */
      .modal-content {
      margin: auto;
      display: block;
      width: 100%;
      max-width: 90%;
      }

      /* Caption of Modal Image (Image Text) - Same Width as the Image */
      #caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      text-align: center;
      color: #ccc;
      padding: 10px 0;
      height: 150px;
      }

      /* Add Animation - Zoom in the Modal */
      .modal-content, #caption {
      animation-name: zoom;
      animation-duration: 0.6s;
      }

      @keyframes zoom {
      from {transform:scale(0)}
      to {transform:scale(1)}
      }

      /* The Close Button */
      .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
      }

      .close:hover,
      .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
      }

      /* 100% Image Width on Smaller Screens */
      @media only screen and (max-width: 700px){
      .modal-content {
        width: 100%;
      }
      }
    </style>

</head>

<body class="">
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand pt-0" href="{{ route("admin.home.index") }}">
                <img src="{{ asset('./assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
            </a>
            <!-- User -->
            <ul class="nav align-items-center d-md-none">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-bell-55"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="{{ asset('./assets/img/theme/team-1-800x800.jpg') }}">
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ route("admin.home.index") }}">
                                <img src="{{ asset('./assets/img/brand/blue.png') }}">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Form -->
                <form class="mt-4 mb-3 d-md-none">
                    <div class="input-group input-group-rounded input-group-merge">
                        <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-search"></span>
                            </div>
                        </div>
                    </div>
                </form>

                @include("admin.layouts.sidenav")

            </div>

        </div>
    </nav>
    <div class="main-content">

        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route("admin.home.index") }}">Dashboard</a>

                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link read" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-bell-55 read" style="font-size:25px"><span class="badge btn btn-sm btn-danger count_not" style="position: absolute;top: -8px;left: 14px;font-size: 9px;border-radius: 50%;">{{ count(auth()->user()->unread_notify) }}</span></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                            <!-- Dropdown header -->
                            <div class="px-3 py-3">
                                <h6 class="text-sm text-muted m-0">You have <strong class="text-primary count_not">{{ count(auth()->user()->unread_notify) }}</strong> unread notifications.</h6>
                            </div>
                            <!-- List group -->
                            <div class="list-group list-group-flush append_here"  style="height:300px;overflow-y:scroll">
                              @foreach (auth()->user()->notifications as $key => $notify)
                                <a href="{{ $notify->url }}" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                          <p class="text-sm mb-0">{{$notify->message}}</p>
                                        </div>
                                        <div class="col-4">
                                          <div class="text-right text-muted">
                                              <small>{{\Carbon\Carbon::parse($notify->created_at)->diffForHumans()}}</small>
                                          </div>
                                        </div>
                                    </div>
                                </a>
                              @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="{{ asset(auth()->user()->image) }}">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->first_name . " " . auth()->user()->last_name  }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
        @yield("content")
        <div id="myModal" class="modal">

          <!-- The Close Button -->
          <span class="close">&times;</span>

          <!-- Modal Content (The Image) -->
          <img class="modal-content" id="img01">

          <!-- Modal Caption (Image Text) -->
          <div id="caption"></div>
        </div>
    </div>
    <!--   Core   -->
    <script src="{{ asset('./assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!--   Optional JS   -->
    <script src="{{ asset('./assets/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
    <!--   Argon JS   -->
    <script src="{{ asset('./assets/js/argon-dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/pusher.min.js') }}"></script>
    <script src="{{ asset('assets/js/vue.min.js') }}"></script>
    <script src="{{ asset('assets/js/pusher_config.js') }}"></script>
    <script src="{{ asset('assets/js/noty.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/vuescroll.js') }}"></script>
    <script src="{{ asset('assets/js/vuescroll.js') }}"></script>
    <!-- import vuescroll-slide -->
    <script src="{{ asset('assets/js/vuescroll-slide.js') }}"></script>
    <!-- import vuescroll-native -->
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        });
        $(".modal").on('shown.bs.modal', function(){
          console.log('ok');
              $(".modal-backdrop").removeClass("modal-backdrop")
        });

        $('#city_id').change(function() {
            $.ajax({
                url: "{{url('api/area')}}?city_id=" + $(this).val(),
                type: "get",
                success: function(data) {
                    $('#area_id').empty();
                    for (let i = 0; i < data.result.length; i++) {
                        const element = '<option value="' + data.result[i].id + '">' + data.result[i].name + '</option>'
                        $('#area_id').append(element)
                    }
                },
            });
        })
        $('input[type=file]').change(function(e) {
            var _this = $(this)
            var reader = new FileReader();
            reader.onload = function(e) {
                _this.parent().find('>:first-child').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        })
    </script>
    <script>
        function last_notify(){
          $.get("{{ route('admin.users.last_notify') }}",function(res){
            if(res){
              console.log('ok');
              var a = '<a href='+res.url+' class="list-group-item list-group-item-action">\
                        <div class="row align-items-center">\
                            <div class="col-8">\
                              <p class="text-sm mb-0">'+res.message+'</p>\
                            </div>\
                            <div class="col-4">\
                              <div class="text-right text-muted">\
                                  <small>'+moment(res.created_at).fromNow()+'</small>\
                              </div>\
                            </div>\
                        </div>\
                    </a>';
              $('.append_here').prepend(a)
            }
          })
        }
        var channel = pusher.subscribe('private-notification.{{\Auth::id()}}');
        channel.bind('notify-event', function(data) {
            let audio = new Audio("{{url('assets/facebook_sound.mp3')}}");
            last_notify()
            audio.play();
            if (data.type != 'contact') {
                $('.request_number').html(parseInt($('.request_number').html()) + 1);
                $('.request_number').addClass('swing')
                new Noty({
                    type: 'info',
                    layout: 'bottomRight',
                    text: data.data,
                    timeout:3000
                }).show();
            } else {
                $('.contact_number').html(parseInt($('.contact_number').html()) + 1)
                $('.contact_number').addClass('swing')
                new Noty({
                    type: 'success',
                    layout: 'bottomRight',
                    text: data.data,
                    timeout:3000
                }).show();
            }
            $('.count_not').html(parseInt($('.count_not').html()) + 1)
        });
        var chat = pusher.subscribe('private-chat.{{\Auth::id()}}');
        chat.bind('chat-event', function(data) {
            if (!$('.message_focuse').is(':focus')) {
                $('.count_not').html(parseInt($('.count_not').html()) + 1)
                last_notify()
                let audio = new Audio("{{url('assets/facebook_sound.mp3')}}");
                audio.play();
                new Noty({
                    type: 'success',
                    layout: 'bottomRight',
                    text: data.data.user.first_name + ' send message to you From his Request and Request Id Is' + data.data.demand.id,
                    timeout:3000
                }).show();
            }
        });
        $('.read').click(function(){
          $.get("{{ route('admin.users.read_notify') }}",function(res){
            setTimeout(function () {
            $('.count_not').html(0)
          },5000)
          })
        })
    </script>
    <script>
        $(document).ready(function () {
            // $('#example').DataTable();
            var el = $('.chosen-rtl');
            if ("<?php echo App::getLocale(); ?>" == "ar") {
                el.chosen({
                    rtl: true,
                    width: '100%'
                });
            }
            else {
                el.addClass("chosen");
                el.removeClass("chosen-rtl");
                $(".chosen").chosen();
            }
        });
    </script>
    @yield("script")
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script type="text/javascript">
    window.TrackJS &&
    TrackJS.install({
            token: "ee6fab19c5a04ac1a32a645abde4613a",
            application: "argon-dashboard-free"
        });
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        $(document).on('click','#myImg',function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        })

        $(document).on('click','.close',function(){
          modal.style.display = "none";
        })
    </script>
</body>

</html>
