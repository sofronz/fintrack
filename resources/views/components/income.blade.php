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
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('transactions.chart-data', ['type' => 'INCOME']) }}",
                method: 'GET',
                success: function(data) {
                    if (data.length === 0) {
                        $('#chartIncome').html('<h5 class="ft-fw-semibold text-center mt-5">No transactions available in income</h5>');
                    }

                    const labels = data.map(item => item.category);
                    const series = data.map(item => parseFloat(item.total));
                    
                    var options = {
                        series: series,
                        labels: labels,
                        chart: {
                            type: 'polarArea',
                        },
                        stroke: {
                            colors: ['#fff']
                        },
                        fill: {
                            opacity: 0.8
                        },
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
                },
                error: function(xhr, status, error) {
                    toastr.success(error);
                }
            });
        });
    </script>
@endpush
