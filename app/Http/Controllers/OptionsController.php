<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;

class OptionsController extends Controller
{
    public function index(){
        $options = Option::get()->pluck('value', 'key')->all();
        return view('options.index',['options'=>$options]);
    }
    public function update(Request $request)
    {
        $this->validate(request(), [
            'men_month_metal_price' => 'required|numeric',
            'men_month_walk_price' => 'required|numeric',
            'men_day_metal_price' => 'required|numeric',
            'men_day_walk_price' => 'required|numeric',
            'women_month_metal_price' => 'required|numeric',
            'women_month_walk_price' => 'required|numeric',
            'women_day_metal_price' => 'required|numeric',
            'women_day_walk_price' => 'required|numeric',
        ]);

        $men_month_metal_price = Option::updateOrCreate(
            ['key' => 'men_month_metal_price'],
            ['value' => $request->men_month_metal_price]
        );
        $men_month_metal_price->save();

        $men_month_walk_price = Option::updateOrCreate(
            ['key' => 'men_month_walk_price'],
            ['value' => $request->men_month_walk_price]
        );
        $men_month_walk_price->save();

        $men_month_both_price = Option::updateOrCreate(
            ['key' => 'men_month_both_price'],
            ['value' => $request->men_month_metal_price+$request->men_month_walk_price]
        );
        $men_month_both_price->save();


        $men_day_metal_price = Option::updateOrCreate(
            ['key' => 'men_day_metal_price'],
            ['value' => $request->men_day_metal_price]
        );
        $men_day_metal_price->save();

        $men_day_walk_price = Option::updateOrCreate(
            ['key' => 'men_day_walk_price'],
            ['value' => $request->men_day_walk_price]
        );
        $men_day_walk_price->save();

        
        $men_day_both_price = Option::updateOrCreate(
            ['key' => 'men_day_both_price'],
            ['value' =>  $request->men_day_metal_price+ $request->men_day_walk_price]
        );
        $men_day_both_price->save();

        $men_days = Option::updateOrCreate(
            ['key' => 'men_days'],
            ['value' =>  implode(',',$request->men_days)]
        );
        $men_days->save();

        $women_month_metal_price = Option::updateOrCreate(
            ['key' => 'women_month_metal_price'],
            ['value' => $request->women_month_metal_price]
        );
        $women_month_metal_price->save();

        $women_month_walk_price = Option::updateOrCreate(
            ['key' => 'women_month_walk_price'],
            ['value' => $request->women_month_walk_price]
        );
        $women_month_walk_price->save();

        $women_month_both_price = Option::updateOrCreate(
            ['key' => 'women_month_both_price'],
            ['value' => $request->women_month_metal_price + $request->women_month_walk_price]
        );
        $women_month_both_price->save();


        $women_day_metal_price = Option::updateOrCreate(
            ['key' => 'women_day_metal_price'],
            ['value' => $request->women_day_metal_price]
        );
        $women_day_metal_price->save();

        $women_day_walk_price = Option::updateOrCreate(
            ['key' => 'women_day_walk_price'],
            ['value' => $request->women_day_walk_price]
        );
        $women_day_walk_price->save();

        $women_day_both_price = Option::updateOrCreate(
            ['key' => 'women_day_both_price'],
            ['value' => $request->women_day_metal_price+$request->women_day_walk_price]
        );
        $women_day_both_price->save();


        $women_days = Option::updateOrCreate(
            ['key' => 'women_days'],
            ['value' =>  implode(',',$request->women_days)]
        );
        $women_days->save();


        return back()->with('success', 'تم تحديث الاعدادات');

    }
}
