@extends('layouts.dashboard')

@section('title', 'الرئيسية')

@section('content')

<div class="row">
    <div class="col-md-6">
       <div class="card">
           <div class="header">
               <h4 class="title">
                   المبلغ الكلى
               </h4>
           </div>
           <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="title">اليوم</h4>
                        <div class="total_cash">
                            {{ $today_net }} 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4 class="title">اخر 7 ايام</h4>
                        <div class="total_cash">
                            {{ $week_net }} 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4 class="title">الشهر الحالى</h4>
                        <div class="total_cash">
                            {{ $month_net }} 
                        </div>
                    </div>
                </div>
           </div>
       </div>
       <div class="card">

            <div class="header">
                <h4 class="title">احصائيات المشتركين</h4>
                <p class="category">نسبة الذكور للسيدات</p>
            </div>
            <div class="content">
                <div id="chart-div" class="chart_box"></div>

                @piechart('IMDB', 'chart-div')

                <div class="footer">
                  
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i>تم تحديثه اليوم
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title">احصائيات الاشتراكات</h4>
            </div>
            <div class="content">
                <div id="pop_div" class="chart_box"></div>

                @areachart('Subscriptions', 'pop_div')

                <div class="footer">
                   
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> تم تحديثه منذ 12 ساعة
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
