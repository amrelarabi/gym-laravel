<html>
    <head>
        <title> @yield('title') </title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <!-- Animation library for notifications   -->
        <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="{{asset('assets/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="{{asset('assets/css/pe-icon-7-stroke.c')}}ss" rel="stylesheet" />
          
    </head>
    <body>

      <div class="wrapper">
          <div class="sidebar" data-color="purple" data-image="{{asset('assets/img/bodybuider_2.jpg')}}">
            <div class="sidebar-wrapper">
                  <div class="logo">
                      <a href="#" class="simple-text">
                         MAX GYM
                      </a>
                  </div>
      
                  <ul class="nav">
                      <li class="{{ Route::current()->getName() == 'dashboard.index'? 'active':'' }}">
                          <a href="{{route('dashboard.index')}}">
                              <i class="pe-7s-graph"></i>
                              <p>الرئيسية</p>
                          </a>
                      </li>
                      <li class="{{ Route::current()->getName() == 'trainer.index'? 'active':'' }}">
                          <a href="{{route('trainer.index')}}">
                              <i class="pe-7s-user"></i>
                              <p>المتدربين</p>
                          </a>
                      </li>
                      <li class="{{ Route::current()->getName() == 'trainer.create'? 'active':'' }}">
                          <a href="{{route('trainer.create')}}">
                              <i class="pe-7s-add-user"></i>
                              <p>اضافة متدرب</p>
                          </a>
                      </li>
                      <li class="{{ Route::current()->getName() == 'expired.index'? 'active':'' }}">
                          <a href="{{route('expired.index')}}">
                              <i class="pe-7s-note2"></i>
                              <p>انتهى اشتراكهم </p>
                          </a>
                      </li>
                      <li class="{{ Route::current()->getName() == 'payment.index'? 'active':'' }}">
                        <a href="{{route('payment.index')}}">
                            <i class="pe-7s-cash"></i>
                            <p> المدفوعات </p>
                        </a>
                      </li>
                      <li class="{{ Route::current()->getName() == 'options.index'? 'active':'' }}">
                          <a href="{{route('options.index')}}">
                              <i class="pe-7s-settings"></i>
                              <p>الاعدادات</p>
                          </a>
                      </li>
                      <li class="{{ Route::current()->getName() == 'backup'? 'active':'' }}">
                        <a href="{{route('backup')}}">
                            <i class="pe-7s-albums"></i>
                            <p>تصدير</p>
                        </a>
                    </li>
                  </ul>
            </div>
          </div>
      
          <div class="main-panel">

              <nav class="navbar navbar-default navbar-fixed">
                  <div class="container-fluid">
                      <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse">
                              <span class="sr-only">اظهار القائمة</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="#">@yield('title')</a>
                      </div>
                      <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <!-- <li>
                                    <a href="#">
                                        <p>تسجيل الخروج</p>
                                    </a>
                                </li> -->
                                <li class="separator hidden-lg"></li>
                            </ul>     
                      </div>
                  </div>
              </nav>

              <div class="content">
                  <div class="container-fluid">
                    @yield('content')
                  </div>
              </div>
          </div>
      </div>
        @if (session('success'))
      
        @endif
      </body>
        <!--   Core JS Files   -->
        <script src="{{asset('assets/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
      
        <!--  Charts Plugin -->
        <script src="{{asset('assets/js/chartist.min.js')}}"></script>
      
        <!--  Notifications Plugin    -->
        <script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>
    
          <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
        <script src="{{asset('assets/js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>

        <script type="text/javascript">
            $(document).ready(function(){
         
                @if(session('success'))
                $.notify({
                    icon: 'pe-7s-bell',
                    message: "{{session('success')}}"
      
                  },{
                      type: 'success',
                      timer: 400
                  });
                 @endif

                 $("#gender_filter").change(function(){
                    if(this.value == 'male'){
                        $(location).attr('href', '{{route("trainer.index", ["gender"=>"male"])}}');
                    }else if(this.value =='female'){
                        $(location).attr('href', '{{route("trainer.index", ["gender"=>"female"])}}');
                    }else if(this.value =='all'){
                        $(location).attr('href', '{{route("trainer.index", ["gender"=>"all"])}}');
                    }
                 });
                 $("#type_filter").change(function(){
                    if(this.value == 'all'){
                        $(location).attr('href', '{{route("expired.index", ["type"=>"all"])}}');
                    }else if(this.value =='month'){
                        $(location).attr('href', '{{route("expired.index", ["type"=>"month"])}}');
                    }else if(this.value =='halfmonth'){
                        $(location).attr('href', '{{route("expired.index", ["type"=>"halfmonth"])}}');
                    }else if(this.value =='day'){
                        $(location).attr('href', '{{route("expired.index", ["type"=>"day"])}}');
                    }
                 });
            });
        </script>
      
      </html>
      