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
                                <h3 class="mb-0">Contact US</h3>
                            </div>
                            <div class="col-4 text-right">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h3>Message Info</h3>
                        <div>
                            ID : {{ $contactUs->id }}
                        </div>
                        <div>
                            Email : {{ $contactUs->email}}
                        </div>
                        <div>
                            Phone : {{ $contactUs->phone}}
                        </div>
                        <div>
                            subject : {{ $contactUs->subject}}
                        </div>
                        Message :
                        <div style="background-color: #DDDDDD; padding: 12px; border-radius: 10px;">
                             {{ $contactUs->message }}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
