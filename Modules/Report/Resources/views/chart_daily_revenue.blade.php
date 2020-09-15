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
            name: "{{ __('report::labels.room_revenue') }}",
            data: [
                {{ @implode(",", $dayRevenues->map(function ($item) {
                    return $item->room_revenue / 1000000;
                    })->toArray()) }}
            ]
        }, {
            name: "{{ __('report::labels.service_revenue') }}",
            data: [
                {{ @implode(",", $dayRevenues->map(function ($item) {
                    return $item->service_revenue / 1000000;
                    })->toArray()) }}
            ]
        }],
        title: {
            text: '{{ __("report::labels.daily_revenue") }}',
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
                {{ @implode(",", $dayRevenues->map(function ($item) {
                    return \Carbon\Carbon::parse($item->day)->day;
                    })->toArray()) }}
            ]
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function formatter(val) {
                        return val + " (triệu vnd)";
                    }
                }
            }, {
                title: {
                    formatter: function formatter(val) {
                        return val + " (triệu vnd)";
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
    var chart = new ApexCharts(document.querySelector("#daily_revenue"), options);
    chart.render();
</script>
