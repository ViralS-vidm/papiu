<script>
    var options = {
        chart: {
            height: 320,
            type: 'pie'
        },
        series: [{{ $monthRevenue->room_revenue }}, {{ $monthRevenue->service_revenue }}],
        labels: ["{{ __('report::labels.room_revenue') }}", "{{ __('report::labels.service_revenue') }}"],
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
    var chart = new ApexCharts(document.querySelector("#month_revenue"), options);
    chart.render(); // Donut chart
</script>
