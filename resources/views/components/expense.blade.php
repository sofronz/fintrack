<div class="card shadow border-0 ft-card p-4">
    <div class="card-body">
        <h5 class="card-title ft-fw-bold text-start">
            Expense
        </h5>
        <h6 class="card-subtitle ft-fw-light text-start text-body-secondary mb-5">
            Here to track your Expense
        </h6>
        <div class="chart" id="chartExpense"></div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('transactions.chart-data', ['type' => 'EXPENSE']) }}",
                method: 'GET',
                success: function(data) {
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

                    var chart = new ApexCharts(document.querySelector("#chartExpense"), options);
                    chart.render();
                },
                error: function(xhr, status, error) {
                    toastr.success(error);
                }
            });
        });
    </script>
@endpush
