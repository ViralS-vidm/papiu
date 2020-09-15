<script>
    var options = {
        chart: {
            height: 320,
            type: 'pie'
        },
        series: [{{ $report->room_booking_count }}, {{ $report->service_booking_count }}],
        labels: ["{{ __('report::labels.room_booking') }}", "{{ __('report::labels.service_booking') }}"],
        colors: ["#34c38f", "#556ee6"],
        legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            verticalAlign: 'middle',
            floating: false,
            fontSize: '14px',
            offsetX: 0,
            offsetY: -10
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 240
                },
                legend: {
                    show: false
                }
            }
        }]
    };
    var chart = new ApexCharts(document.querySelector("#booking_count"), options);
    chart.render(); // Donut chart
</script>
