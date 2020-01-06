<template>
    <div id="dashboard-analytics">
        <div class="vx-row">
            <div class="vx-col w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 mb-base">
                <statistics-card-line icon="UsersIcon" :statistic="anybackdata.anyclients?anybackdata.anyclients.reduce((a, b) => a + b, 0) - 1:0" statisticTitle="Subscribers Gained" :chartData="subscribersGained.series" type='area'></statistics-card-line>
            </div>
            <div class="vx-col w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 mb-base">
                <statistics-card-line icon="DollarSignIcon" :statistic="anybackdata.anyrevenus?anybackdata.anyrevenus.reduce((a, b) => parseInt(a) + parseInt(b), 0) - 1:0" statisticTitle="Revenue Generated" :chartData="revenueGenerated.series" color='success' type='area'></statistics-card-line>
            </div>
            <div class="vx-col w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 mb-base">
                <statistics-card-line icon="ShoppingCartIcon" :statistic="anybackdata.anycarts?anybackdata.anycarts.reduce((a, b) => a + b, 0) - 1:0" statisticTitle="Quarterly Sales" :chartData="quarterlySales.series" color='danger' type='area'></statistics-card-line>
            </div>
            <div class="vx-col w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 mb-base">
                <statistics-card-line icon="ShoppingBagIcon" :statistic="anybackdata.anyorders?anybackdata.anyorders.reduce((a, b) => a + b, 0) - 1:0" statisticTitle="Orders Received" :chartData="ordersRecevied.series" color='warning' type='area'></statistics-card-line>
            </div>

        </div>
        <div class="vx-row">
          <!-- LINE CHART -->
          <div class="vx-col w-full mb-base">
              <vx-card title="Revenue">
                  <template slot="actions">
                      <feather-icon icon="SettingsIcon" svgClasses="w-6 h-6 text-grey"></feather-icon>
                  </template>
                  <div slot="no-body" class="p-6 pb-0">
                      <div class="flex">
                          <div class="mr-6">
                              <p class="mb-1 font-semibold">This Year</p>
                              <p class="text-3xl text-success"><sup class="text-base mr-1">$</sup>{{anybackdata.month_revenue? anybackdata.month_revenue[0].reduce((a, b) => parseInt(a) + parseInt(b), 0) : 1400}}</p>
                          </div>
                          <div>
                              <p class="mb-1 font-semibold">Last Year</p>
                              <p class="text-3xl"><sup class="text-base mr-1">$</sup>{{anybackdata.month_revenue? anybackdata.month_revenue[1].reduce((a, b) => parseInt(a) + parseInt(b), 0) : 5000}}</p>
                          </div>
                      </div>
                      <vue-apex-charts type=line height=266 :options="revenueComparisonLine.chartOptions" :series="revenueComparisonLine.series" />
                  </div>
              </vx-card>
          </div>
        </div>
        <div class="vx-row">
            <!-- CARD 6: Product Orders -->
            <div class="vx-col w-full lg:w-1/2 mb-base">
                <vx-card title="Product Orders">
                    <!-- CARD ACTION -->
                    <template slot="actions">
                        <change-time-duration-dropdown />
                    </template>

                    <div slot="no-body">
                        <vue-apex-charts type=radialBar height=370 :options="productOrdersRadialBar.chartOptions" :series="productOrdersRadialBar.series" />
                    </div>

                    <ul>
                        <li v-for="orderData in productOrdersRadialBar.analyticsData" :key="orderData.orderType" class="flex mb-3 justify-between">
                            <span class="flex items-center">
                                    <span class="inline-block h-4 w-4 rounded-full mr-2 bg-white border-3 border-solid" :class="`border-${orderData.color}`"></span>
                                    <span class="font-semibold">{{ orderData.orderType }}</span>
                            </span>
                            <span>{{ orderData.counts }}</span>
                        </li>
                        <!-- <li><span class="inline-block h-2 w-2 rounded-full mr-2 bg-primary"></span>Finished - 23,043</li> -->
                    </ul>
                </vx-card>
            </div>
            <!-- Coupons -->
            <div class="vx-col w-full lg:w-1/2 mt-base">
              <vx-card title="Coupons">
                  <!-- SLOT = ACTIONS -->
                  <template slot="actions">
                      <change-time-duration-dropdown />
                  </template>
                  <div slot="no-body">
                      <vue-apex-charts class="mt-5" type=donut height=325 :options="sessionsByDeviceDonut.chartOptions" :series="sessionsByDeviceDonut.series" />
                  </div>
                  <ul>
                      <li v-for="deviceData in sessionsByDeviceDonut.analyticsData" :key="deviceData.device" class="flex mb-3">
                          <feather-icon :icon="deviceData.icon" :svgClasses="[`h-5 w-5 stroke-current text-${deviceData.color}`]"></feather-icon>
                          <span class="ml-2 inline-block font-semibold">{{ deviceData.device }}</span>
                          <span class="mx-2">-</span>
                          <span class="mr-4">{{ deviceData.sessionsPercentgae }}%</span>
                          <div class="ml-auto flex -mr-1">
                          <span class="mr-1">{{ deviceData.comparedResultPercentage }}%</span>
                          <feather-icon :icon=" deviceData.comparedResultPercentage < 0 ? 'ArrowDownIcon' : 'ArrowUpIcon'" :svgClasses="[deviceData.comparedResultPercentage < 0 ? 'text-danger' : 'text-success'  ,'stroke-current h-4 w-4 mb-1 mr-1']"></feather-icon>
                          </div>
                      </li>
                  </ul>
              </vx-card>
            </div>
        </div>
        <!-- <div class="vx-row">
          CARD 9: DISPATCHED ORDERS
          <div class="vx-col w-full">
            <vx-card title="Dispatched Orders">
              <div slot="no-body" class="mt-4">
                <vs-table :data="anybackdata.latest_orders">
                  <template slot="thead">
                    <vs-th sort-key="name">ORDER NO.</vs-th>
                    <vs-th sort-key="name">Order Owner</vs-th>
                    <vs-th sort-key="name">LOCATION</vs-th>
                    <vs-th sort-key="name">Total Price</vs-th>
                    <vs-th sort-key="name">Shipping Amount</vs-th>
                    <vs-th sort-key="name">Total Price After Shipping</vs-th>
                    <vs-th sort-key="name">STATUS</vs-th>
                    <vs-th sort-key="name">DATE</vs-th>
                    <vs-th sort-key="name">Action</vs-th>
                  </template>

                  <template slot-scope="{data}">
                    <vs-tr :key="indextr" v-for="(tr, indextr) in data">
                      <vs-td :data="data[indextr].id">
                        <span>#{{data[indextr].id}}</span>
                      </vs-td>
                      <vs-td :data="data[indextr].id">
                        <ul class="users-liked user-list">
                            <li>
                                <vx-tooltip :text="data[indextr].client.name" position="bottom">
                                    <vs-avatar :src="data[indextr].client.image" size="30px" class="border-2 border-white border-solid -m-1"></vs-avatar>
                                </vx-tooltip>
                            </li>
                        </ul>
                      </vs-td>
                      <vs-td :data="data[indextr].id">
                        <span>{{data[indextr].address.city.name}} - {{data[indextr].address.city.state.name}}, {{data[indextr].address.city.state.country.name}}</span>
                      </vs-td>
                      <vs-td :data="data[indextr].id">
                        <span>${{data[indextr].total_price - data[indextr].shipping_amount}}</span>
                      </vs-td>
                      <vs-td :data="data[indextr].id">
                        <span>${{data[indextr].shipping_amount}}</span>
                      </vs-td>
                      <vs-td :data="data[indextr].id">
                        <span>${{data[indextr].total_price}}</span>
                      </vs-td>
                      <vs-td :data="data[indextr].status">
                        <span class="flex items-center px-2 py-1 rounded">
                          <div class="h-3 w-3 rounded-full mr-2" :class="'bg-' +[data[indextr].status == 'Finshed' ? 'success':'warning']"></div>{{data[indextr].status}}</span>
                      </vs-td>
                      <vs-td :data="data[indextr].id">
                        <span>{{data[indextr].created_at}}</span>
                      </vs-td>
                      <vs-td :data="data[indextr].id">
                        <span>show</span>
                      </vs-td>
                    </vs-tr>
                  </template>
                </vs-table>
              </div>
            </vx-card>
          </div>
        </div> -->
    </div>
</template>

<script>
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
import VueApexCharts from 'vue-apexcharts'
import StatisticsCardLine from '@/components/statistics-cards/StatisticsCardLine.vue'
import analyticsData from './ui-elements/card/analyticsData.js'
import ChangeTimeDurationDropdown from '@/components/ChangeTimeDurationDropdown.vue'

export default{
    data() {
        return {
            anybackdata:[],
            analyticsData:analyticsData,
            revenueComparisonLine: {
                series: [{
                        name: "This Month",
                        data: [45000, 47000, 44800, 47500, 45500, 48000, 46500, 48600]
                    },
                    {
                        name: "Last Month",
                        data: [46000, 48000, 45500, 46600, 44500, 46500, 45000, 47000]
                    }
                ],
                chartOptions: {
                    chart: {
                        toolbar: { show: false },
                    },
                    stroke: {
                        curve: 'smooth',
                        dashArray: [0, 8],
                        width: [4, 2],
                    },
                    grid: {
                        borderColor: '#e7e7e7',
                    },
                    legend: {
                        show: false,
                    },
                    colors: ['#F97794', '#b8c2cc'],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            inverseColors: false,
                            gradientToColors: ['#7367F0', '#b8c2cc'],
                            shadeIntensity: 1,
                            type: 'horizontal',
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 100, 100, 100]
                        },
                    },
                    markers: {
                        size: 0,
                        hover: {
                            size: 5
                        }
                    },
                    xaxis: {
                        labels: {
                            style: {
                                cssClass: 'text-grey fill-current',
                            }
                        },
                        axisTicks: {
                            show: false,
                        },
                        categories: ['01', '05', '09', '13', '17', '21', '26', '31'],
                        axisBorder: {
                            show: false,
                        },
                    },
                    yaxis: {
                        tickAmount: 5,
                        labels: {
                            style: {
                                cssClass: 'text-grey fill-current',
                            },
                            formatter: function(val) {
                                return val > 999 ? (val / 1000).toFixed(1) + 'k' : val;
                            }
                        }
                    },
                    tooltip: {
                        x: { show: false }
                    }
                }
            },
            subscribersGained: {
                series: [{
                    name: 'Subscribers',
                    data: [28, 40, 36]
                }],
                chartOptions: {
                    grid: {
                        show: false,
                        padding: {
                            left: 0,
                            right: 0
                        }
                    },
                    chart: {
                        toolbar: {
                            show: false,
                        },
                        sparkline: {
                            enabled: true
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2.5
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 0.9,
                            opacityFrom: 0.7,
                            opacityTo: 0.5,
                            stops: [0, 80, 100]
                        }
                    },
                    xaxis: {
                        type: 'numeric',
                        lines: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                        labels: { show: false }
                    },
                    yaxis: [{
                        y: 0,
                        offsetX: 0,
                        offsetY: 0,
                        padding: { left: 0, right: 0 },
                    }],
                    tooltip: {
                        x: { show: false }
                    },
                },
            },
            quarterlySales: {
                series: [{
                    name: 'Sales',
                    data: [28, 40, 36]
                }],
                chartOptions: {
                    grid: {
                        show: false,
                        padding: {
                            left: 0,
                            right: 0
                        }
                    },
                    chart: {
                        toolbar: {
                            show: false,
                        },
                        sparkline: {
                            enabled: true
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2.5
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 0.9,
                            opacityFrom: 0.7,
                            opacityTo: 0.5,
                            stops: [0, 80, 100]
                        }
                    },
                    xaxis: {
                        type: 'numeric',
                        lines: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                        labels: { show: false }
                    },
                    yaxis: [{
                        y: 0,
                        offsetX: 0,
                        offsetY: 0,
                        padding: { left: 0, right: 0 },
                    }],
                    tooltip: {
                        x: { show: false }
                    },
                },
            },
            revenueGenerated: {
                series: [{
                    name: 'Revenue',
                    data: [28, 40, 36]
                }],
                chartOptions: {
                    grid: {
                        show: false,
                        padding: {
                            left: 0,
                            right: 0
                        }
                    },
                    chart: {
                        toolbar: {
                            show: false,
                        },
                        sparkline: {
                            enabled: true
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2.5
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 0.9,
                            opacityFrom: 0.7,
                            opacityTo: 0.5,
                            stops: [0, 80, 100]
                        }
                    },
                    xaxis: {
                        type: 'numeric',
                        lines: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                        labels: { show: false }
                    },
                    yaxis: [{
                        y: 0,
                        offsetX: 0,
                        offsetY: 0,
                        padding: { left: 0, right: 0 },
                    }],
                    tooltip: {
                        x: { show: false }
                    },
                },
            },
            ordersRecevied: {
                series: [{
                    name: 'Orders',
                    data: [28, 40, 36]
                }],
                chartOptions: {
                    grid: {
                        show: false,
                        padding: {
                            left: 0,
                            right: 0
                        }
                    },
                    chart: {
                        toolbar: {
                            show: false,
                        },
                        sparkline: {
                            enabled: true
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2.5
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 0.9,
                            opacityFrom: 0.7,
                            opacityTo: 0.5,
                            stops: [0, 80, 100]
                        }
                    },
                    xaxis: {
                        type: 'numeric',
                        lines: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                        labels: { show: false }
                    },
                    yaxis: [{
                        y: 0,
                        offsetX: 0,
                        offsetY: 0,
                        padding: { left: 0, right: 0 },
                    }],
                    tooltip: {
                        x: { show: false }
                    },
                },
            },
            sessionsByDeviceDonut: {
                analyticsData: [
                    { device: 'Dekstop', icon: 'MonitorIcon', color: 'primary', sessionsPercentgae: 58.6, comparedResultPercentage: 2 },
                    { device: 'Mobile', icon: 'SmartphoneIcon', color: 'warning', sessionsPercentgae: 34.9, comparedResultPercentage: 8 },
                    { device: 'Tablet', icon: 'TabletIcon', color: 'danger', sessionsPercentgae: 6.5, comparedResultPercentage: -5 },
                ],
                comparedResult: [2, -3, 8],
                series: [58.6, 34.9, 6.5],
                chartOptions: {
                    labels: ['Not Used', 'Reserved', 'Used'],
                    dataLabels: {
                        enabled: false
                    },
                    legend: { show: false },
                    chart: {
                        offsetY: 30,
                        type: 'donut',
                        toolbar: {
                            show: false
                        }
                    },
                    stroke: { width: 0 },
                    colors: ['#7961F9', '#FF9F43', '#EA5455'],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            gradientToColors: ['#9c8cfc', '#FFC085', '#f29292']
                        }
                    }
                }
            },
            productOrdersRadialBar: {
                analyticsData: [
                    { 'orderType': 'Finished', 'counts': 23043, color: 'primary' },
                    { 'orderType': 'Pending', 'counts': 14658, color: 'warning' },
                    { 'orderType': 'Rejected ', 'counts': 4758, color: 'danger' },
                ],
                series: [70, 52, 26],
                chartOptions: {
                    labels: ['Finished', 'Pending', 'Rejected'],
                    plotOptions: {
                        radialBar: {
                            size: 165,
                            offsetY: 30,
                            hollow: {
                                size: '20%'
                            },
                            track: {
                                background: "#ebebeb",
                                strokeWidth: '100%',
                                margin: 15,
                            },
                            dataLabels: {
                                show: true,
                                name: {
                                    fontSize: '18px',
                                },
                                value: {
                                    fontSize: '16px',
                                    color: "#636a71",
                                    offsetY: 11
                                },
                                total: {
                                    show: true,
                                    label: 'Total',
                                    formatter: function() {
                                        return 42459
                                    }
                                }
                            }
                        },
                    },
                    responsive: [{
                        breakpoint: 576,
                        options: {
                            plotOptions: {
                                radialBar: {
                                    size: 150,
                                    hollow: {
                                        size: '20%'
                                    },
                                    track: {
                                        background: "#ebebeb",
                                        strokeWidth: '100%',
                                        margin: 15,
                                    },
                                }
                            }
                        }
                    }],
                    colors: ['#7961F9', '#FF9F43', '#EA5455'],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            // enabled: true,
                            shade: 'dark',
                            type: 'vertical',
                            shadeIntensity: 0.5,
                            gradientToColors: ['#9c8cfc', '#FFC085', '#f29292'],
                            inverseColors: false,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 100]
                        },
                    },
                    stroke: {
                        lineCap: 'round'
                    },
                    chart: {
                        dropShadow: {
                            enabled: true,
                            blur: 3,
                            left: 1,
                            top: 1,
                            opacity: 0.1
                        },
                    }
                }
            },
            settings: { // perfectscrollbar settings
                maxScrollbarLength: 60,
                wheelSpeed: .60,
            },
        }
    },
    components: {
        VueApexCharts,
        StatisticsCardLine,
        VuePerfectScrollbar,
        ChangeTimeDurationDropdown
    },
    created(){
      var _this = this
      this.$http.get('/api/home').then(function(response){
        _this.anybackdata = response.data.data;
        _this.subscribersGained     = {
            series: [{
                name: 'Subscribers',
                data: response.data.data.anyclients.length > 0?response.data.data.anyclients:[28, 40, 36]
            }],
            chartOptions: {
                grid: {
                    show: false,
                    padding: {
                        left: 0,
                        right: 0
                    }
                },
                chart: {
                    toolbar: {
                        show: false,
                    },
                    sparkline: {
                        enabled: true
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2.5
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 0.9,
                        opacityFrom: 0.7,
                        opacityTo: 0.5,
                        stops: [0, 80, 100]
                    }
                },
                xaxis: {
                    type: 'numeric',
                    lines: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    labels: { show: false }
                },
                yaxis: [{
                    y: 0,
                    offsetX: 0,
                    offsetY: 0,
                    padding: { left: 0, right: 0 },
                }],
                tooltip: {
                    x: { show: false }
                },
            },
        },
        _this.quarterlySales        = {
            series: [{
                name: 'Sales',
                data: response.data.data.anycarts.length> 0?response.data.data.anycarts:[28, 40, 36]
            }],
            chartOptions: {
                grid: {
                    show: false,
                    padding: {
                        left: 0,
                        right: 0
                    }
                },
                chart: {
                    toolbar: {
                        show: false,
                    },
                    sparkline: {
                        enabled: true
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2.5
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 0.9,
                        opacityFrom: 0.7,
                        opacityTo: 0.5,
                        stops: [0, 80, 100]
                    }
                },
                xaxis: {
                    type: 'numeric',
                    lines: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    labels: { show: false }
                },
                yaxis: [{
                    y: 0,
                    offsetX: 0,
                    offsetY: 0,
                    padding: { left: 0, right: 0 },
                }],
                tooltip: {
                    x: { show: false }
                },
            },
        },
        _this.revenueGenerated      = {
            series: [{
                name: 'Revenue',
                data: response.data.data.anyrevenus.length> 0?response.data.data.anyrevenus:[28, 40, 36]
            }],
            chartOptions: {
                grid: {
                    show: false,
                    padding: {
                        left: 0,
                        right: 0
                    }
                },
                chart: {
                    toolbar: {
                        show: false,
                    },
                    sparkline: {
                        enabled: true
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2.5
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 0.9,
                        opacityFrom: 0.7,
                        opacityTo: 0.5,
                        stops: [0, 80, 100]
                    }
                },
                xaxis: {
                    type: 'numeric',
                    lines: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    labels: { show: false }
                },
                yaxis: [{
                    y: 0,
                    offsetX: 0,
                    offsetY: 0,
                    padding: { left: 0, right: 0 },
                }],
                tooltip: {
                    x: { show: false }
                },
            },
        },
        _this.ordersRecevied        = {
            series: [{
                name: 'Orders',
                data: response.data.data.anyorders.length> 0?response.data.data.anyorders:[28, 40, 36]
            }],
            chartOptions: {
                grid: {
                    show: false,
                    padding: {
                        left: 0,
                        right: 0
                    }
                },
                chart: {
                    toolbar: {
                        show: false,
                    },
                    sparkline: {
                        enabled: true
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2.5
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 0.9,
                        opacityFrom: 0.7,
                        opacityTo: 0.5,
                        stops: [0, 80, 100]
                    }
                },
                xaxis: {
                    type: 'numeric',
                    lines: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    labels: { show: false }
                },
                yaxis: [{
                    y: 0,
                    offsetX: 0,
                    offsetY: 0,
                    padding: { left: 0, right: 0 },
                }],
                tooltip: {
                    x: { show: false }
                },
            },
        },
        _this.sessionsByDeviceDonut = {
            analyticsData: [
                { device: 'Not Used', icon: 'MonitorIcon', color: 'danger', sessionsPercentgae: response.data.data.coupons.length > 0 ?response.data.data.coupons[0]:0, comparedResultPercentage: 1 },
                { device: 'Reserved', icon: 'SmartphoneIcon', color: 'warning', sessionsPercentgae: response.data.data.coupons.length > 0 ?response.data.data.coupons[1]:0, comparedResultPercentage: 2 },
                { device: 'Used', icon: 'TabletIcon', color: ' primary', sessionsPercentgae: response.data.data.coupons.length > 0 ?response.data.data.coupons[2]:0, comparedResultPercentage: 3 },
            ],
            comparedResult: [1, 2, 3],
            series: response.data.data.coupons,
            chartOptions: {
                labels: ['Not Used', 'Reserved', 'Used'],
                dataLabels: {
                    enabled: false
                },
                legend: { show: false },
                chart: {
                    offsetY: 30,
                    type: 'donut',
                    toolbar: {
                        show: false
                    }
                },
                stroke: { width: 0 },
                colors: ['#7961F9', '#FF9F43', '#EA5455'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        gradientToColors: ['#9c8cfc', '#FFC085', '#f29292']
                    }
                }
            }
        },
        _this.productOrdersRadialBar= {
            analyticsData: [
                { 'orderType': 'Finished', 'counts': response.data.data.orders ?(response.data.data.orders[2]/response.data.data.orders.reduce((a, b) => a + b, 0))*100:0 , color: 'primary' },
                { 'orderType': 'Pending', 'counts': response.data.data.orders ?(response.data.data.orders[0]/response.data.data.orders.reduce((a, b) => a + b, 0))*100:0, color: 'warning' },
                { 'orderType': 'Under Shipping', 'counts': response.data.data.orders ?(response.data.data.orders[1]/response.data.data.orders.reduce((a, b) => a + b, 0))*100:0, color: 'danger' },
            ],
            series: response.data.data.orders,
            chartOptions: {
                labels: ['Finished', 'Pending', 'Under Shipping'],
                plotOptions: {
                    radialBar: {
                        size: 165,
                        offsetY: 30,
                        hollow: {
                            size: '20%'
                        },
                        track: {
                            background: "#ebebeb",
                            strokeWidth: '100%',
                            margin: 15,
                        },
                        dataLabels: {
                            show: true,
                            name: {
                                fontSize: '18px',
                            },
                            value: {
                                fontSize: '16px',
                                color: "#636a71",
                                offsetY: 11
                            },
                            total: {
                                show: true,
                                label: 'Total',
                                formatter: function() {
                                    return response.data.data.orders ?response.data.data.orders.reduce((a, b) => a + b, 0):0
                                }
                            }
                        }
                    },
                },
                responsive: [{
                    breakpoint: 576,
                    options: {
                        plotOptions: {
                            radialBar: {
                                size: 150,
                                hollow: {
                                    size: '20%'
                                },
                                track: {
                                    background: "#ebebeb",
                                    strokeWidth: '100%',
                                    margin: 15,
                                },
                            }
                        }
                    }
                }],
                colors: ['#7961F9', '#FF9F43', '#EA5455'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        // enabled: true,
                        shade: 'dark',
                        type: 'vertical',
                        shadeIntensity: 0.5,
                        gradientToColors: ['#9c8cfc', '#FFC085', '#f29292'],
                        inverseColors: false,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 100]
                    },
                },
                stroke: {
                    lineCap: 'round'
                },
                chart: {
                    dropShadow: {
                        enabled: true,
                        blur: 3,
                        left: 1,
                        top: 1,
                        opacity: 0.1
                    },
                }
            }
        },
        _this.revenueComparisonLine = {
            series: [{
                    name: "This Year",
                    data: response.data.data.month_revenue? response.data.data.month_revenue[0]:[45000, 47000, 44800, 47500, 45500, 48000, 46500, 48600]
                },
                {
                    name: "Last Year",
                    data: response.data.data.month_revenue? response.data.data.month_revenue[1]:[46000, 48000, 45500, 46600, 44500, 46500, 45000, 47000]
                }
            ],
            chartOptions: {
                chart: {
                    toolbar: { show: false },
                },
                stroke: {
                    curve: 'smooth',
                    dashArray: [0, 8],
                    width: [4, 2],
                },
                grid: {
                    borderColor: '#e7e7e7',
                },
                legend: {
                    show: false,
                },
                colors: ['#F97794', '#b8c2cc'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        inverseColors: false,
                        gradientToColors: ['#7367F0', '#b8c2cc'],
                        shadeIntensity: 1,
                        type: 'horizontal',
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 100, 100, 100]
                    },
                },
                markers: {
                    size: 0,
                    hover: {
                        size: 5
                    }
                },
                xaxis: {
                    labels: {
                        style: {
                            cssClass: 'text-grey fill-current',
                        }
                    },
                    axisTicks: {
                        show: false,
                    },
                    categories: response.data.data.month_revenue? response.data.data.month_revenue[2]:['01', '05', '09', '13', '17', '21', '26', '31'],
                    axisBorder: {
                        show: false,
                    },
                },
                yaxis: {
                    tickAmount: 5,
                    labels: {
                        style: {
                            cssClass: 'text-grey fill-current',
                        },
                        formatter: function(val) {
                            return val > 999 ? (val / 1000).toFixed(1) + 'k' : val;
                        }
                    }
                },
                tooltip: {
                    x: { show: false }
                }
            }
        },
        console.log(response.status);
      })
    },
    mounted() {

    }
}
</script>
