<div class="container-fluid">
    <div class="row">
        <?php $this->carregarTemplate('Sidebar') ?>
        <div class="col">

            <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-4">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Saldo</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>

                                </div>
                                <div class="col-auto"><i class="fa-solid fa-sack-dollar fa-2x"></i></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total ganho</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>

                                </div>
                                <div class="col-auto"><i class="fa-solid fa-arrow-up fa-2x"></i></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow h-100 py-2 ">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total gasto</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>

                                </div>
                                <div class="col-auto"><i class="fa-solid fa-arrow-down fa-2x"></i></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>

                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="myAreaChart" width="464" height="320"
                                    style="display: block; width: 464px; height: 320px;"
                                    class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
        
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                        </div>
            
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="myPieChart" width="464" height="245"
                                    style="display: block; width: 464px; height: 245px;"
                                    class="chartjs-render-monitor"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> Direct
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Social
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-info"></i> Referral
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        const ctxArea = document.getElementById('myAreaChart');
        new Chart(ctxArea, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                datasets: [{
                    label: 'Ganhos',
                    data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
                    backgroundColor: 'rgba(78, 115, 223, 0.05)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    tension: 0.3, 
                    fill: true
                },{
                    label: 'Gastos',
                    data: [0, 10000, 5000, 153, 101, 200.50, 15000, 500, 200, 30000, 3000, 400],
                    backgroundColor: 'rgba(78, 115, 223, 0.05)',
                    borderColor: 'rgb(223, 78, 78)',
                    tension: 0.3, 
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

      
        const ctxPie = document.getElementById('myPieChart');
        new Chart(ctxPie, {
            type: 'doughnut', 
            data: {
                labels: ['Direto', 'Social', 'Referência'],
                datasets: [{
                    label: 'Fontes',
                    data: [55, 30, 15],
                    backgroundColor: [
                        '#4e73df', 
                        '#1cc88a',
                        '#36b9cc' 
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>