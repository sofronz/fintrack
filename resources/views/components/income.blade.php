<div class="card shadow border-0 ft-card p-4">
    <div class="card-body">
        <h5 class="card-title ft-fw-bold text-start">
            Income
        </h5>
        <h6 class="card-subtitle ft-fw-light text-start text-body-secondary mb-5">
            Here to track your Income
        </h6>
        <div class="chart" id="chartIncome"></div>
    </div>
</div>

@push('scripts')
    <script>
        var options = {
            series: [14, 32, 40],
            chart: {
                type: 'polarArea',
            },
            stroke: {
                colors: ['#fff']
            },
            fill: {
                opacity: 0.8
            },
            labels: ['Income', 'Expense'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#chartIncome"), options);
        chart.render();
    </script>
@endpush
