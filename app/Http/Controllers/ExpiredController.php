<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trainer;
use Carbon\Carbon;

class ExpiredController extends Controller
{
    public function index(Request $request){
        $filter = $request->type;
        if(!empty($filter) && $filter != 'all'){

        $trainers = Trainer::whereDate('expire_date', '<=', Carbon::now()->format('Y-m-d') )
                            ->where('subscription_type','=',$filter)
                            ->paginate(50);
        }else{
            $trainers = Trainer::whereDate('expire_date', '<=', Carbon::now()->format('Y-m-d') )
            ->paginate(50);
        }

        return view('expired.index',['trainers'=>$trainers]);
    }
    public function search(Request $request)
    {
        $keyword = $request->search_keyword;
        $filter = $request->type;
        if(empty($filter) || $filter =='all' ){
            if( !empty($keyword) ){
                $trainers = Trainer::whereDate('expire_date', '<=', Carbon::now()->format('Y-m-d') )
                                    ->where('fullname', "LIKE", '%'.$keyword.'%')->paginate(50);

            }else{
                $trainers = Trainer::whereDate('expire_date', '<=', Carbon::now()->format('Y-m-d') )
                ->paginate(50);
            }
        }else{
           
            if( !empty($keyword) ){
                $trainers = Trainer::whereDate('expire_date', '<=', Carbon::now()->format('Y-m-d') )
                ->where('subscription_type','=',$filter)
                ->where('fullname', "LIKE", '%'.$keyword.'%')->paginate(50);
                
            }else{
                $trainers = Trainer::whereDate('expire_date', '<=', Carbon::now()->format('Y-m-d') )
                ->where('subscription_type','=',$filter)->paginate(50);
            }

            
        }
        return view('expired.index', ['trainers'=>$trainers]);
    }

}
