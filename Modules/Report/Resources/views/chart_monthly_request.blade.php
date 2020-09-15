<script>
    var options = {
        chart: {
            height: 320,
            type: 'pie'
        },
        series: [{{ $monthRequest->offer_request }}, {{ $monthRequest->service_request }}],
        labels: ["{{ __('report::labels.offer_request') }}", "{{ __('report::labels.service_request') }}"],
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
    var chart = new ApexCharts(document.querySelector("#month_request"), options);
    chart.render(); // Donut chart
</script>
