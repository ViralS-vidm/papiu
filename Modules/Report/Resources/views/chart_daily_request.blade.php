<script>
    var options = {
        chart: {
            height: 380,
            type: 'line',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            }
        },
        colors: ['#34c38f', '#556ee6'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [2, 2],
            curve: 'straight',
            dashArray: [4, 4]
        },
        series: [{
            name: "{{ __('report::labels.offer_request') }}",
            data: [
                {{ @implode(",", $dayRequests->map(function ($item) {
                    return $item->offer_request;
                    })->toArray()) }}
            ]
        }, {
            name: "{{ __('report::labels.service_request') }}",
            data: [
                {{ @implode(",", $dayRequests->map(function ($item) {
                    return $item->service_request;
                    })->toArray()) }}
            ]
        }],
        title: {
            text: '{{ __("report::labels.daily_request") }}',
            align: 'center'
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: [
                {{ @implode(",", $dayRequests->map(function ($item) {
                    return \Carbon\Carbon::parse($item->day)->day;
                    })->toArray()) }}
            ]
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function formatter(val) {
                        return val;
                    }
                }
            }, {
                title: {
                    formatter: function formatter(val) {
                        return val;
                    }
                }
            }, {
                title: {
                    formatter: function formatter(val) {
                        return val;
                    }
                }
            }]
        },
        grid: {
            borderColor: '#f1f1f1'
        }
    };
    var chart = new ApexCharts(document.querySelector("#daily_request"), options);
    chart.render(); //   spline_area
</script>
