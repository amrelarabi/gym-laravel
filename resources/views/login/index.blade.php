<html>
    <head>
        <title> تسجيل الدخول </title>
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
          
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="card" id="login_box">
                        <div class="header">
                            <h4 class="title">
                                تسجيل الدخول
                            </h4>
                        </div>
                        <div class="content">
                            <form>
                                <div class="form-group">
                                    <label for="username">الاسم</label>
                                    <input type="email" class="form-control" id="username" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">كلمة المرور</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
     
                                <button type="submit" class="btn btn-primary">الدخول</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
      </div>
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
         
      
                // $.notify({
                //     icon: 'pe-7s-gift',
                //     message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."
      
                //   },{
                //       type: 'info',
                //       timer: 4000
                //   });
                  $("#subscription").on('change', function() {
                    if(this.value == 'day'){
                      $("#walker_box").hide();
                      $("#date_box").hide();
                    }else{
                      $("#walker_box").show();
                      $("#date_box").show();
                    }
                 });
            });
        </script>
      
      </html>
      