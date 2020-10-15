@extends('layouts.dashboard')

@section('title', 'الاعدادات')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
            </div>
            <div class="content">
                <form method="POST" action="{{ route('options.update') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <h3>للراجال</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>قيمة اشتراك الحديد الشهرى</label>
                                <input type="number" class="form-control" value="{{ !empty($options['men_month_metal_price'])?$options['men_month_metal_price']:'' }}" name="men_month_metal_price">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>قيمة اشتراك الحديد بالحصة</label>
                                <input type="number" class="form-control" value="{{ !empty($options['men_day_metal_price'])?$options['men_day_metal_price']:'' }}" name="men_day_metal_price">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>قيمة اشتراك الجراية الشهرى</label>
                                <input type="number" class="form-control" value="{{ !empty($options['men_month_walk_price'])?$options['men_month_walk_price']:'' }}" name="men_month_walk_price">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>قيمة اشتراك الجراية بالحصة</label>
                                <input type="number" class="form-control" value="{{!empty($options['men_day_walk_price'])?$options['men_day_walk_price']:''}}" name="men_day_walk_price">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12">
                            <div class="form-group">
                                <label> الايام </label>
                                <select class="form-control" name="men_days[]" multiple>
                                    @if(!empty($options['men_days']))
                                    <option value="all"{{in_array('all', explode(',', $options['men_days']) )?'selected':'' }} >كل يوم</option>
                                    <option value="1" {{in_array(1, explode(',', $options['men_days']) )?'selected':'' }}>الاحد</option>
                                    <option value="2" {{in_array(2, explode(',', $options['men_days']) )?'selected':'' }}>الاثنين</option>
                                    <option value="3" {{in_array(3, explode(',', $options['men_days']) )?'selected':'' }}>الثلاثاء</option>
                                    <option value="4" {{in_array(4, explode(',', $options['men_days']) )?'selected':'' }}>الاربع</option>
                                    <option value="5" {{in_array(5, explode(',', $options['men_days']) )?'selected':'' }}>الخميس</option>
                                    <option value="6" {{in_array(6, explode(',', $options['men_days']) )?'selected':'' }}>الجمعة</option>
                                    <option value="7" {{in_array(7, explode(',', $options['men_days']) )?'selected':'' }}>السبت</option>
                                    @else:
                                    <option value="all">كل يوم</option>
                                    <option value="1">الاحد</option>
                                    <option value="2">الاثنين</option>
                                    <option value="3">الثلاثاء</option>
                                    <option value="4">الاربع</option>
                                    <option value="5">الخميس</option>
                                    <option value="6">الجمعة</option>
                                    <option value="7">السبت</option>
                                    @endif
                                </select>
                            </div>
                       </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h3>للسيدات</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>قيمة اشتراك الحديد الشهرى</label>
                                <input type="number" class="form-control" value="{{!empty($options['women_month_metal_price'])?$options['women_month_metal_price']:''}}"  name="women_month_metal_price">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>قيمة اشتراك الحديد بالحصة</label>
                                <input type="number" class="form-control" value="{{!empty($options['women_day_metal_price'])?$options['women_day_metal_price']:''}}" name="women_day_metal_price">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>قيمة اشتراك الجراية الشهرى</label>
                                <input type="number" class="form-control" value="{{!empty($options['women_month_walk_price'])?$options['women_month_walk_price']:''}}" name="women_month_walk_price">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>قيمة اشتراك الجراية بالحصة</label>
                                <input type="number" class="form-control" value="{{!empty($options['women_day_walk_price'])?$options['women_day_walk_price']:''}}" name="women_day_walk_price">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> الايام </label>
                                <select class="form-control" name="women_days[]" multiple>
                                @if(!empty($options['women_days']))
                                    <option value="all"{{in_array('all', explode(',', $options['women_days']) )?'selected':'' }} >كل يوم</option>
                                    <option value="1" {{in_array(1, explode(',', $options['women_days']) )?'selected':'' }}>الاحد</option>
                                    <option value="2" {{in_array(2, explode(',', $options['women_days']) )?'selected':'' }}>الاثنين</option>
                                    <option value="3" {{in_array(3, explode(',', $options['women_days']) )?'selected':'' }}>الثلاثاء</option>
                                    <option value="4" {{in_array(4, explode(',', $options['women_days']) )?'selected':'' }}>الاربع</option>
                                    <option value="5" {{in_array(5, explode(',', $options['women_days']) )?'selected':'' }}>الخميس</option>
                                    <option value="6" {{in_array(6, explode(',', $options['women_days']) )?'selected':'' }}>الجمعة</option>
                                    <option value="7" {{in_array(7, explode(',', $options['women_days']) )?'selected':'' }}>السبت</option>
                                @else:
                                    <option value="all">كل يوم</option>
                                    <option value="1">الاحد</option>
                                    <option value="2">الاثنين</option>
                                    <option value="3">الثلاثاء</option>
                                    <option value="4">الاربع</option>
                                    <option value="5">الخميس</option>
                                    <option value="6">الجمعة</option>
                                    <option value="7">السبت</option>
                            
                                @endif
                               </select>

                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info btn-fill pull-left">تحديث الاعدادات</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
