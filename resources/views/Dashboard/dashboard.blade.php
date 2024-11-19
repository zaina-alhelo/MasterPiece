@extends('Dashboard.master')

@section('content')
<section class="section dashboard">
    <div class="row">

        <!-- Users Count Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card users-card">
                <div class="card-body">
                    <h5 class="card-title">Users <span>| Total</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $usersCount }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Users Count Card -->

        <!-- Articles Count Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card articles-card">
                <div class="card-body">
                    <h5 class="card-title">Blogs <span>| Total</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $articlesCount }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Articles Count Card -->

        <!-- Recipes Count Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card recipes-card">
                <div class="card-body">
                    <h5 class="card-title">Recipes <span>| Total</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-journal"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $recipesCount }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   </div>

<div class="col-12">
    <div class="card">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Reports <span>/Today</span></h5>
            <div id="reportsChart"></div>

            <script>
            document.addEventListener("DOMContentLoaded", () => {
                var bmis = @json($bmis ?? []);

                if (bmis.length > 0) {
                    var bmiData = bmis.map(function(bmi) {
                        return bmi.bmi || 0;
                    });

                    var labels = bmis.map(function(bmi) {
                        return bmi.user ? ('User ' + bmi.user.name) : 'Unknown User';
                    });

                    new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                            name: 'BMI',
                            data: bmiData,
                        }],
                        chart: {
                            height: 350,
                            type: 'line',
                            toolbar: { show: false }
                        },
                        markers: { size: 4 },
                        colors: ['#4154f1'],
                        fill: {
                            type: "gradient",
                            gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0.3,
                                opacityTo: 0.4,
                                stops: [0, 90, 100]
                            }
                        },
                        dataLabels: { enabled: false },
                        stroke: { curve: 'smooth', width: 2 },
                        xaxis: { categories: labels },
                        tooltip: {
                            x: { format: 'dd/MM/yy HH:mm' }
                        }
                    }).render();
                } else {
                    document.querySelector("#reportsChart").innerHTML = '<p>No BMI data available</p>';
                }
            });
            </script>
        </div>
    </div>
</div>


          

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

 

        <!-- Website Traffic -->
<div class="card">
  <div class="filter">
    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
      <li class="dropdown-header text-start">
        <h6>Filter</h6>
      </li>
      <li><a class="dropdown-item" href="#">Today</a></li>
      <li><a class="dropdown-item" href="#">This Month</a></li>
      <li><a class="dropdown-item" href="#">This Year</a></li>
    </ul>
  </div>

  <div class="card-body pb-0">
    <h5 class="card-title">Gender Distribution</h5>

    <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        var genderData = @json($genderData); 

        echarts.init(document.querySelector("#trafficChart")).setOption({
          tooltip: {
            trigger: 'item'
          },
          legend: {
            top: '5%',
            left: 'center'
          },
          series: [{
            name: 'Gender Distribution',
            type: 'pie',
            radius: ['40%', '70%'],
            avoidLabelOverlap: false,
            label: {
              show: false,
              position: 'center'
            },
            emphasis: {
              label: {
                show: true,
                fontSize: '18',
                fontWeight: 'bold'
              }
            },
            labelLine: {
              show: false
            },
            data: genderData.map(item => ({
              value: item.value,
              name: item.name
            }))
          }]
        });
      });
    </script>
  </div>
</div>

 <div>
        <canvas id="bmiChart" width="400" height="200"></canvas>
    </div>
    
    <script>
        var bmiData = @json($bmiData);
        
        var genderLabels = [...new Set(bmiData.map(item => item.gender))];
        var ageGroups = [...new Set(bmiData.map(item => item.age_group))];
        
        var data = {
            labels: genderLabels,
            datasets: ageGroups.map(ageGroup => {
                return {
                    label: ageGroup,
                    data: bmiData.filter(item => item.age_group === ageGroup).map(item => item.avg_bmi_change),
                    borderColor: 'rgb(75, 192, 192)',
                    fill: false
                };
            })
        };
        
        var config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Gender'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Average BMI Change (%)'
                        }
                    }
                }
            }
        };
        
        var bmiChart = new Chart(
            document.getElementById('bmiChart'),
            config
        );
    </script>


        </div>

      </div>
    </section>
    @endsection
