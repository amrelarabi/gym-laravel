<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trainer;
use App\Payment;
use App\Option;
use App\Attendance;
use Carbon\Carbon;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->gender;
        if(!empty($filter) && $filter != 'all'){
            $trainers = Trainer::where('gender','=',$filter)->paginate(50);
        }else{
            $trainers = Trainer::paginate(50);
        }
        return view('trainer.index', ['trainers' => $trainers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'fullname' => 'required',
        ]);
        
        $trainer = new Trainer;
        $trainer->fullname = $request->fullname;
        $trainer->gender = $request->gender;
        $trainer->subscription_type = $request->subscription_type;
        $trainer->subscription_date = $request->subscription_date;
        $trainer->subscription_package = $request->subscription_package;
        $trainer->phone = $request->phone;
        $trainer->notes = $request->notes;

        $current_date =  Carbon::parse($request->subscription_date);
        if( $request->subscription_type == 'month'){
            $current_date->addDays(30);
            $type_prefix = '_month';
        }elseif ($request->subscription_type == 'halfmonth') {
            $current_date->addDays(15);
            $type_prefix = '_month';
        }elseif($request->subscription_type == 'day'){
            $current_date->addDays(1);
            $type_prefix = '_day';
        }
        if($request->gender == 'male'){
            $gender_prefix = 'men';
        }elseif($request->gender == 'female'){
            $gender_prefix = 'women';
        }
        if($request->subscription_package == 'metal'){
            $package_prefix = '_metal';
        }elseif($request->subscription_package == 'walk'){
            $package_prefix = '_walk';
        }else{
            $package_prefix = '_both';
        }

        $trainer->expire_date  = $current_date->toDateString('Y-m-d');
        $trainer->last_attendance = $current_date->toDateString('Y-m-d');

        $trainer->save();
        
        $payment = new Payment;
        $payment->trainer_id = $trainer->id;
        if($request->subscription_type != 'halfmonth'){
            $payment_value = (int)Option::where('key','=', $gender_prefix.$type_prefix.$package_prefix.'_price' )->pluck('value')[0];
        }else{
            $payment_value = (int)Option::where('key','=', $gender_prefix.$type_prefix.$package_prefix.'_price' )->pluck('value')[0]*.5;
        }
        $payment->payment_value = $payment_value;
        $payment->save();    
        return back()->with('success', 'تم اضافة المتدرب بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trainer = Trainer::find($id);
        return view('trainer.edit', ['trainer'=>$trainer]);
    }
    public function renew($id)
    {
        $trainer = Trainer::find($id);
        return view('trainer.renew', ['trainer'=>$trainer]);
    }
    public function expand(Request $request, $id){
        $trainer = Trainer::find($id);
        $attendance = new Attendance;
        $attendance->trainer_id = $trainer->id;
        $attendance->save();
        return redirect()->route('expired.index')->with('success', 'تم تمديد الاشتراك لمدة يوم واحد بنجاح ');

    }
    public function update_renew(Request $request, $id){
        $trainer = Trainer::find($id);

        $trainer->subscription_type = $request->subscription_type;
        $trainer->subscription_date = $request->subscription_date;
        $trainer->subscription_package = $request->subscription_package;
        $trainer->phone = $request->phone;
        $trainer->notes = $request->notes;

        $current_date =  Carbon::parse($request->subscription_date);
        if( $request->subscription_type == 'month'){
            $current_date->addDays(30);
            $type_prefix = '_month';
        }elseif ($request->subscription_type == 'halfmonth') {
            $current_date->addDays(15);
            $type_prefix = '_month';
        }elseif($request->subscription_type == 'day'){
            $current_date->addDays(1);
            $type_prefix = '_day';
        }
        if($request->gender == 'male'){
            $gender_prefix = 'men';
        }elseif($request->gender == 'female'){
            $gender_prefix = 'women';
        }
        if($request->subscription_package == 'metal'){
            $package_prefix = '_metal';
        }elseif($request->subscription_package == 'walk'){
            $package_prefix = '_walk';
        }else{
            $package_prefix = '_both';
        }

        $trainer->expire_date  = $current_date->toDateString('Y-m-d');
        $trainer->last_attendance = $current_date->toDateString('Y-m-d');
        $trainer->save();
        
        $payment = new Payment;
        $payment->trainer_id = $trainer->id;
        if($request->subscription_type != 'halfmonth'){
            $payment_value = (int)Option::where('key','=', $gender_prefix.$type_prefix.$package_prefix.'_price' )->pluck('value')[0];
        }else{
            $payment_value = (int)Option::where('key','=', $gender_prefix.$type_prefix.$package_prefix.'_price' )->pluck('value')[0]*.5;
        }
        $payment->payment_value = $payment_value;
        $payment->save();
        // TODO
        return redirect()->route('expired.index')->with('success', 'تم تجديد الاشتراك بنجاح ');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'fullname' => 'required',
        ]);

        $trainer = Trainer::find($id);
        $trainer->fullname = $request->fullname;
        $trainer->gender = $request->gender;
        $trainer->subscription_type = $request->subscription_type;
        $trainer->subscription_date = $request->subscription_date;
        $trainer->subscription_package = $request->subscription_package;
        $trainer->phone = $request->phone;
        $trainer->notes = $request->notes;

        $current_date =  Carbon::parse($request->subscription_date);
        if( $request->subscription_type == 'month'){
            $current_date->addDays(30);
        }elseif ($request->subscription_type == 'halfmonth') {
            $current_date->addDays(15);
        }elseif($request->subscription_type == 'day'){
            $current_date->addDays(1);
        }
        $trainer->expire_date  = $current_date->toDateString('Y-m-d');

        $trainer->save();

        return redirect()->route('trainer.index')->with('success', 'تم تعديل بيانات المتدرب');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer = Trainer::find($id);
        $trainer->delete();
        return back()->with('success', 'تم حذف المتدرب بنجاح');
    }

    public function search(Request $request)
    {
        $keyword = $request->search_keyword;
        $filter = $request->gender;
        if(empty($filter) || $filter =='all' ){
            if( !empty($keyword) ){
                $trainers = Trainer::where('fullname', "LIKE", '%'.$keyword.'%')->paginate(50);
            }else{
                $trainers = Trainer::paginate(50);
            }
        }else{
           
            if( !empty($keyword) ){
                $trainers = Trainer::where('gender','=',$filter)->where('fullname', "LIKE", '%'.$keyword.'%')->paginate(50);
            }else{
                $trainers = Trainer::where('gender','=',$filter)->paginate(50);
            }

            
        }
        return view('trainer.index', ['trainers'=>$trainers]);
    }
}
