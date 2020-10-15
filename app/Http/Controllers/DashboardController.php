<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Lava;
use App\Trainer;
use App\Payment;
use Carbon\Carbon;

class DashboardController extends Controller
{
   public function index(){

        $men_count = Trainer::where('gender', '=', 'male')->count();
        $women_count = Trainer::where('gender', '=', 'female')->count();
        $overall_count = $men_count+ $women_count;
        
        if($men_count>0){
            $men_percentage = $men_count/$overall_count;
        }else{
            $men_percentage = 0;
        }

        if($women_count>0){
            $women_percentage = $women_count/$overall_count;
        }else{
            $women_percentage = 0;
        }


        $lava = new Lavacharts; 

        $gender = $lava->DataTable();
        
        $gender->addStringColumn('Gender')
                ->addNumberColumn('Percent')
                ->addRow(['ذكر', $men_percentage])
                ->addRow(['انثى', $women_percentage]);

        Lava::PieChart('IMDB', $gender, [
            'is3D'   => true,
            'slices' => [
                ['offset' => 0.2],
                ['offset' => 0.25],
                ['offset' => 0.3]
            ]
        ]);

        $now = Carbon::now()->firstOfMonth();
        $subscription = $lava->DataTable();

        $subscription->addDateColumn('Month')
        ->addNumberColumn('عدد المشتركين')
        ->addRow([$now->format('M'),  $overall_count ]);
        
        $counter=1;
        $ticks = array($now->format('Y-m-d') );
        while($counter<=3){
            $current_date = $now->subMonth($counter);  
            array_push($ticks, $current_date);
            $month = $current_date->format('M');
            $current_count = Trainer::whereDate('subscription_date', '<=', $current_date->format('Y-m-d'))->count();
            $subscription->addRow([$month,  $current_count]);
            $counter+=1;
        }

        Lava::AreaChart('Subscriptions', $subscription, [
            'title' => 'عدد الاشتراكات',
            'hAxis' => [
                'format'=>'MMM'
            ],
            'legend' => [
                'position' => 'in'
            ]
        ]);
        $today_net = Payment::whereDate('created_at', '=', Carbon::today())->sum('payment_value');
        $week_net = Payment::whereDate('created_at', '>=', Carbon::today()->subWeek())->sum('payment_value');
        $month_net = Payment::whereDate('created_at', '>=', Carbon::today()->subMonth())->sum('payment_value');
       return view('dashboard.index', ['today_net'=>$today_net, 'week_net'=>$week_net, 'month_net'=>$month_net]);
   }
}
