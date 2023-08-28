@extends('dashboard.layout.layout')

@section('body')
    <div class="container-fluid px-4 mt-n10">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            {{-- <a type="button"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#adduser">Add Module</a> --}}

        </div>
        <div class="row">
            <div class="col-xl-4 mb-4">
                <!-- Dashboard example card 1-->
                <div class="card lift h-100" href="#!">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="me-3">
                               
                                <h5 class="text-primary">Total Number of Students</h5>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">40</div>
                            </div>
                            <img src="{{asset('dashboard')}}/img/Students-amico.svg" alt="..." style="width: 8rem">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-4">
                <!-- Dashboard example card 2-->
                <div class="card lift h-100" href="#!">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="me-3">
                               
                                <h5 class="text-success">New Students <br> (of this month)</h5>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">40 </div></div>
                            <img src="{{asset('dashboard')}}/img/Students-rafiki.svg" alt="..." style="width: 8rem">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-4">
                <!-- Dashboard example card 3-->
                <div class="card lift h-100" href="#!">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="me-3">
                                
                                <h5 class="text-danger" >Students who not Paid (more than 2 months)</h5>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">40 <a type="button" class="font-weight-normal " ><small><u>show them..</u></small></a></div>
                            </div>
                           
                            <img src="{{asset('dashboard')}}/img/Payment-bro.svg" alt="..." style="width: 8rem">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <!-- Tabbed dashboard card example-->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Sessions</h6>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Sessions of This Day: </h5>
                        <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                            
                            
                            <div class="vertical-timeline-item vertical-timeline-element row justify-content-center">
                                <div class="col-10">
                                    <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-primary"> </i>
                                                                </span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title ">Discussion with marketing <span class="text-success" >team</span> </h4>
                                        <p>Discussion with marketing team about the popularity of last product</p>
                                        <span class="vertical-timeline-element-date">9:00 </span>
                                    </div>
                                    
                                </div>
                                <div class="dropdown no-arrow  col-1 text-center">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">Print list</a>
                                        <a class="dropdown-item" href="#">Session Done</a>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="vertical-timeline-item vertical-timeline-element row justify-content-center">
                                <div class="col-10">
                                    <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-primary"> </i>
                                                                </span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title ">Discussion with marketing <span class="text-success" >team</span> </h4>
                                        <p>Discussion with marketing team about the popularity of last product</p>
                                        <span class="vertical-timeline-element-date">9:00 </span>
                                    </div>
                                    
                                </div>
                                <div class="dropdown no-arrow  col-1 text-center">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="vertical-timeline-item vertical-timeline-element row justify-content-center">
                                <div class="col-10">
                                    <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-primary"> </i>
                                                                </span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title ">Discussion with marketing <span class="text-success" >team</span> </h4>
                                        <p>Discussion with marketing team about the popularity of last product</p>
                                        <span class="vertical-timeline-element-date">9:00 </span>
                                    </div>
                                    
                                </div>
                                <div class="dropdown no-arrow  col-1 text-center">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                                
                            </div>
                            
        
        
        
        
                        </div>
                    </div>
                </div>
                <!-- Illustration dashboard card example-->


            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Students Payments</h6>
                        
                    </div>
                    <!-- Card Body -->
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
                            <canvas id="myPieChart" width="900" height="490"
                                style="display: block; height: 245px; width: 450px;"
                                class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Paid
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-danger"></i> Not Paid
                            </span>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('dashboard')}}/vendor/chart.js/Chart.min.js"></script>
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Direct", "Referral"],
    datasets: [{
      data: [55, 30],
      backgroundColor: ['#4e73df', '#1cc88a'],
      hoverBackgroundColor: ['#2e59d9', '#17a673'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

    </script>
@endsection
