@extends('layouts.dashboard')

@section('title', 'تجديد الاشتراك ')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
            </div>
            <div class="content">
                <form action="{{route('trainer.update.renew', $trainer->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الاسم بالكامل</label>
                                <input type="text" class="form-control" readonly name="fullname" required value="{{ $trainer->fullname }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">النوع</label>
                                <select class="form-control" name="gender" readonly>
                                    <option value="male" {{ $trainer->getOriginal('gender')=='male'?'selected':'' }}>ذكر</option>
                                    <option value="female" {{ $trainer->getOriginal('gender')=='female'?'selected':'' }}>انثى</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subscription_type">نوع الاشتراك</label>
                                <select class="form-control" name="subscription_type" id="subscription_type">
                                    <option value="month" {{ $trainer->getOriginal('subscription_type')=='month'?'selected':'' }}>شهرى</option>
                                    <option value="halfmonth" {{ $trainer->getOriginal('subscription_type')=='halfmonth'?'selected':'' }}>نصف شهرى</option>
                                    <option value="day" {{ $trainer->getOriginal('subscription_type')=='day'?'selected':'' }}>بالحصة</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="date_box">
                                <label for="date">تاريخ الاشتراك</label>
                                <input class="form-control" type="date" name="subscription_date" value="{{ $trainer->renew_date }}" id="date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subscription_package"> الاشتراك يشمل</label>
                                <select class="form-control" name="subscription_package" id="subscription_package">
                                    <option value="all" {{ $trainer->getOriginal('subscription_package')=='all'?'selected':'' }}>الكل</option>
                                    <option value="walking" {{ $trainer->getOriginal('subscription_package')=='walking'?'selected':'' }}>جراية فقط</option>
                                    <option value="metal" {{ $trainer->getOriginal('subscription_package')=='metal'?'selected':'' }}>حديد فقط</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>رقم الهاتف</label>
                                <input type="number" class="form-control" readonly name="phone" value="{{$trainer->phone}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ملاحظات</label>
                                <input type="text" class="form-control" name="notes" value="{{$trainer->notes}}">
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-success btn-fill pull-left"> تجديد الاشتراك</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
