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
        <div class="row">
        <div class="col">
            <div class="card bg-secondary shadow">
                <div class="card-header">
                    <form action="{{ route("admin.reports.providers") }}" method="get">
                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
                                  <div class="input-group mb-4">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                      </div>
                                      <input class="form-control datepicker" autocomplete="off" value="{{request()->get('from_date')}}" name="from_date" data-date-format="yyyy-mm-dd"  placeholder="Select From date" type="text">
                                  </div>
                              </div>
                          </div>

                          <div class="col-md-3">
                              <div class="form-group">
                                  <div class="input-group mb-4">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                      </div>
                                      <input class="form-control datepicker" autocomplete="off" value="{{request()->get('to_date')}}" name="to_date" data-date-format="yyyy-mm-dd" placeholder="Select To date" type="text">
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
        {{-- Search --}}
        <div class="form-group"></div>
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Providers Report</h3>
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
                                    <th scope="col" >Provider Name</th>
                                    <th scope="col" >demands</th>
                                    <th scope="col" >Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $key=>$item)
                                <tr>
                                    <th scope="row">
                                        {{ $item->provider_id }}
                                    </th>
                                    <td>
                                        {{ $item->provider_name }}
                                    </td>
                                    <td>
                                        {{ $item->demands_count }}
                                    </td>
                                    <td>
                                        {{ $item->amount_sum }}
                                    </td>
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

        <div class="row">
          <div class="col-xl-12">
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
        </div>
        <!-- Footer -->
    </div>

@endsection

@section('script')

  <script type="text/javascript">

  var ProvidersChart = (function() {

    //
    // Orders chart
    //

    var array_data = $.parseJSON(("{{ $list->pluck('amount_sum') }}").replace(/&quot;/g, '"'));
    var label_data = $.parseJSON(("{{ $list->pluck('provider_name') }}").replace(/&quot;/g, '"'));

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

@endsection
