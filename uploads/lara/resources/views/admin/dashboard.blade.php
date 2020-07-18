@extends("admin.layouts.app")

@section("content")
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Customers</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$user}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">City</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$city}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-globe"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Area</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$area}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-globe"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">provider</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$provider}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-user-md"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                  <div class="col-xl-3 col-lg-6">
                      <div class="card card-stats mb-4 mb-xl-0">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">category</h5>
                                      <span class="h2 font-weight-bold mb-0">{{$category}}</span>
                                  </div>
                                  <div class="col-auto">
                                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                          <i class="fas fa-book"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-6">
                      <div class="card card-stats mb-4 mb-xl-0">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Request</h5>
                                      <span class="h2 font-weight-bold mb-0">{{$demand}}</span>
                                  </div>
                                  <div class="col-auto">
                                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                          <i class="fas fa-bars"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-6">
                      <div class="card card-stats mb-4 mb-xl-0">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Payment Cash</h5>
                                      <span class="h2 font-weight-bold mb-0">{{$cash}}</span>
                                  </div>
                                  <div class="col-auto">
                                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                          <i class="fas fa-money-bill-alt"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-6">
                      <div class="card card-stats mb-4 mb-xl-0">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0">Payment Visa</h5>
                                      <span class="h2 font-weight-bold mb-0">{{$visa}}</span>
                                  </div>
                                  <div class="col-auto">
                                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                          <i class="fas fa-credit-card"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            @can("users", \App\Models\User::class)
                <div class="col-xl-6">
                    <div class="card shadow">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-muted ls-1 mb-1">Users</h6>
                                    <h2 class="mb-0">Total Amount</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart">
                                <canvas id="chart-users" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
                @can("providers", \App\Models\User::class)
                <div class="col-xl-6">
                <div class="card shadow">
                  <div class="card-header bg-transparent">
                      <div class="row align-items-center">
                          <div class="col">
                              <h6 class="text-uppercase text-muted ls-1 mb-1">Providers</h6>
                              <h2 class="mb-0">Total Amount</h2>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <!-- Chart -->
                      <div class="chart">
                          <canvas id="chart-providers" class="chart-canvas"></canvas>
                      </div>
                  </div>
                </div>
                </div>
                @endcan
        </div>
        <div class="row mt-5">
            @can("financials", \App\Models\User::class)

                <div class="col-xl-6">
              <div class="card shadow">
                  <div class="card-header bg-transparent">
                      <div class="row align-items-center">
                          <div class="col">
                              <h6 class="text-uppercase text-muted ls-1 mb-1">Financials</h6>
                              <h2 class="mb-0">Total Anount</h2>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <!-- Chart -->
                      <div class="chart">
                          <canvas id="chart-payments" class="chart-canvas"></canvas>
                      </div>
                  </div>
              </div>
          </div>
            @endcan

            @can("cities", \App\Models\User::class)
                <div class="col-xl-6">
              <div class="card shadow">
                  <div class="card-header bg-transparent">
                      <div class="row align-items-center">
                          <div class="col">
                              <h6 class="text-uppercase text-muted ls-1 mb-1">Areas</h6>
                              <h2 class="mb-0">Total Amount</h2>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <!-- Chart -->
                      <div class="chart">
                          <canvas id="chart-areas" class="chart-canvas"></canvas>
                      </div>
                  </div>
              </div>
          </div>
            @endcan
        </div>
        <!-- Footer -->

    </div>

@endsection

@section('script')

  <script type="text/javascript">

  var UsersChart = (function() {


  var array_data = $.parseJSON(("{{ $user_graph->pluck('amount_sum') }}").replace(/&quot;/g, '"'));
  var label_data = $.parseJSON(("{{ $user_graph->pluck('first_name') }}").replace(/&quot;/g, '"'));
    //
    // Variables
    //

    var $chart = $('#chart-users');
    var $ordersSelect = $('[name="ordersSelect"]');


    //
    // Methods
    //

    // Init chart
    function initChart($chart) {

      // Create chart
      var usersChart = new Chart($chart, {
        type: 'bar',
        options: {
          scales: {
            yAxes: [{
              gridLines: {
                lineWidth: 1,
                color: '#dfe2e6',
                zeroLineColor: '#dfe2e6'
              },
              ticks: {
                callback: function(value) {
                  if (!(value % 10)) {
                    //return '$' + value + 'k'
                    return value
                  }
                }
              }
            }]
          },
          tooltips: {
            callbacks: {
              label: function(item, data) {
                var label = data.datasets[item.datasetIndex].label || '';
                var yLabel = item.yLabel;
                var content = '';

                if (data.datasets.length > 1) {
                  content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                }

                content += '<span class="popover-body-value">' + yLabel + '</span>';

                return content;
              }
            }
          }
        },
        data: {
          labels: label_data,
          datasets: [{
            label: 'Payment Amount',
            data: array_data
          }]
        }
      });

      // Save to jQuery object
      $chart.data('chart', usersChart);
    }


    // Init chart
    if ($chart.length) {
      initChart($chart);
    }

  })();

  </script>

  <script type="text/javascript">

  var ProvidersChart = (function() {

    //
    // Orders chart
    //

    var array_data = $.parseJSON(("{{ $provider_graph->pluck('amount_sum') }}").replace(/&quot;/g, '"'));
    var label_data = $.parseJSON(("{{ $provider_graph->pluck('provider_name') }}").replace(/&quot;/g, '"'));

    //
    // Variables
    //

    var $chart = $('#chart-providers');
    var $ordersSelect = $('[name="ordersSelect"]');


    //
    // Methods
    //

    // Init chart
    function initChart($chart) {

      // Create chart
      var providersChart = new Chart($chart, {
        type: 'bar',
        options: {
          scales: {
            yAxes: [{
              gridLines: {
                lineWidth: 1,
                color: '#dfe2e6',
                zeroLineColor: '#dfe2e6'
              },
              ticks: {
                callback: function(value) {
                  if (!(value % 10)) {
                    //return '$' + value + 'k'
                    return value
                  }
                }
              }
            }]
          },
          tooltips: {
            callbacks: {
              label: function(item, data) {
                var label = data.datasets[item.datasetIndex].label || '';
                var yLabel = item.yLabel;
                var content = '';

                if (data.datasets.length > 1) {
                  content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                }

                content += '<span class="popover-body-value">' + yLabel + '</span>';

                return content;
              }
            }
          }
        },
        data: {
          labels: label_data,
          datasets: [{
            label: 'Payment Amount',
            data: array_data
          }]
        }
      });

      // Save to jQuery object
      $chart.data('chart', providersChart);
    }


    // Init chart
    if ($chart.length) {
      initChart($chart);
    }

  })();

  </script>

  <script type="text/javascript">


  var PaymentsChart = (function() {

    //
    // Variables
    //

    //
    // Orders chart
    //

    var array_data = $.parseJSON(("{{ $payment_graph->pluck('amount_sum') }}").replace(/&quot;/g, '"'));

    var $chart = $('#chart-payments');
    var $ordersSelect = $('[name="ordersSelect"]');


    //
    // Methods
    //

    // Init chart
    function initChart($chart) {

      // Create chart
      var paymentsChart = new Chart($chart, {
        type: 'bar',
        options: {
          scales: {
            yAxes: [{
              gridLines: {
                lineWidth: 1,
                color: '#dfe2e6',
                zeroLineColor: '#dfe2e6'
              },
              ticks: {
                callback: function(value) {
                  if (!(value % 10)) {
                    //return '$' + value + 'k'
                    return value
                  }
                }
              }
            }]
          },
          tooltips: {
            callbacks: {
              label: function(item, data) {
                var label = data.datasets[item.datasetIndex].label || '';
                var yLabel = item.yLabel;
                var content = '';

                if (data.datasets.length > 1) {
                  content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                }

                content += '<span class="popover-body-value">' + yLabel + '</span>';

                return content;
              }
            }
          }
        },
        data: {
          labels: ["{{ count($payment_graph) ? $paymentMethods::getLabel($payment_graph[0]->payment_method) : null }}" , "{{ count($payment_graph) ? $paymentMethods::getLabel($payment_graph[1]->payment_method) : null}}"],
          datasets: [{
            label: 'Payment Amount',
            data: array_data
          }]
        }
      });

      // Save to jQuery object
      $chart.data('chart', paymentsChart);
    }


    // Init chart
    if ($chart.length) {
      initChart($chart);
    }

  })();

  </script>

  <script type="text/javascript">

  var AreasChart = (function() {

    //
    // Orders chart
    //

    var array_data = $.parseJSON(("{{ $area_graph->pluck('amount_sum') }}").replace(/&quot;/g, '"'));
    var label_data = $.parseJSON(("{{ $area_graph->pluck('area_name') }}").replace(/&quot;/g, '"'));

    //
    // Variables
    //

    var $chart = $('#chart-areas');
    var $ordersSelect = $('[name="ordersSelect"]');


    //
    // Methods
    //

    // Init chart
    function initChart($chart) {

      // Create chart
      var areasChart = new Chart($chart, {
        type: 'bar',
        options: {
          scales: {
            yAxes: [{
              gridLines: {
                lineWidth: 1,
                color: '#dfe2e6',
                zeroLineColor: '#dfe2e6'
              },
              ticks: {
                callback: function(value) {
                  if (!(value % 10)) {
                    //return '$' + value + 'k'
                    return value
                  }
                }
              }
            }]
          },
          tooltips: {
            callbacks: {
              label: function(item, data) {
                var label = data.datasets[item.datasetIndex].label || '';
                var yLabel = item.yLabel;
                var content = '';

                if (data.datasets.length > 1) {
                  content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                }

                content += '<span class="popover-body-value">' + yLabel + '</span>';

                return content;
              }
            }
          }
        },
        data: {
          labels: label_data,
          datasets: [{
            label: 'Payment Amount',
            data: array_data
          }]
        }
      });

      // Save to jQuery object
      $chart.data('chart', areasChart);
    }


    // Init chart
    if ($chart.length) {
      initChart($chart);
    }

  })();

  </script>


@endsection
