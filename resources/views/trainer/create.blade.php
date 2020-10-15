@extends('layouts.dashboard')

@section('title', 'اضافة متدرب')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
            </div>
            <div class="content">
                <form action="{{route('trainer.store')}}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الاسم بالكامل</label>
                                <input type="text" class="form-control" name="fullname" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">النوع</label>
                                <select class="form-control" name="gender">
                                    <option value="male">ذكر</option>
                                    <option value="female">انثى</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subscription_type">نوع الاشتراك</label>
                                <select class="form-control" name="subscription_type" id="subscription_type">
                                    <option value="month" selected>شهرى</option>
                                    <option value="halfmonth">نصف شهرى</option>
                                    <option value="day">بالحصة</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="date_box">
                                <label for="date">تاريخ الاشتراك</label>
                                <input class="form-control" type="date" name="subscription_date" value="{{date('Y-m-d')}}" id="date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subscription_package"> الاشتراك يشمل</label>
                                <select class="form-control" name="subscription_package" id="subscription_package">
                                    <option value="all" selected>الكل</option>
                                    <option value="walking">جراية فقط</option>
                                    <option value="metal">حديد فقط</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>رقم الهاتف</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>
                  
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ملاحظات</label>
                                <input type="text" class="form-control" name="notes">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info btn-fill pull-left">اضافة المتدرب</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
