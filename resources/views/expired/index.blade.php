@extends('layouts.dashboard')

@section('title', 'المشتركين المنتهى اشتراكهم')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <form class="row" action="{{route('expired.search')}}" method="get">
  
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="type" id="type_filter">
                                <option value="all" {{ Request::get('type') == 'all'?'selected':'' }}>الكل</option>
                                <option value="month" {{ Request::get('type') == 'month'?'selected':'' }}>شهرى </option>
                                <option value="halfmonth" {{ Request::get('type') == 'halfmonth'?'selected':'' }}>نصف شهرى</option>
                                <option value="day" {{ Request::get('type') == 'day'?'selected':'' }}>حصة</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="search_keyword" value="{{Request('search_keyword')}}" id="search_box" placeholder="البحث باسم المتدرب">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" id="search_btn" class="btn btn-info btn-fill pull-left"> <i class="pe-7s-search"></i> ابحث </button>
                    </div>
                </form>
            </div>
            @if(!$trainers->isEmpty())
            <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                            <th>الاسم</th>
                            <th>النوع</th>
                            <th>تاريخ الاشتراك</th>
                            <th>تاريخ الانتهاء</th>
                            <th>تاريخ التمديد </th>
                            <th>نوع الاشتراك</th>
                            <th> الاشتراك يشمل</th>
                            <th></th>
                        </tr></thead>
                        <tbody>
                            @foreach ($trainers as $trainer)
                                
                            <tr>
                                <td>{{ $trainer->fullname }}</td>
                                <td>{{ $trainer->gender }}</td>
                                <td>{{ $trainer->subscription_date }}</td>
                                <td>{{ $trainer->expire_date }}</td>
                                
                                <td>
                                    {{ $trainer->last_attendance }}
                                </td>
                            
                                <td>{{ $trainer->subscription_type }}</td>
                                <td>{{ $trainer->subscription_package }}</td>
                                <td>
             
                                    <form action="{{ route('trainer.destroy', $trainer->id) }}" method="POST" class="delete-form">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-md" ><i class="pe-7s-trash"></i> حذف</button>
                                    </form>

                                    <a href="{{route('trainer.renew', $trainer->id)}}" class="btn btn-success btn-md">
                                    <i class="pe-7s-refresh"></i> تجديد
                                    </a>

                                    @if($trainer->getOriginal('subscription_type') != 'day')
                                    <a href="{{route('trainer.expand', $trainer->id)}}" class="btn btn-default btn-md">
                                        <i class="pe-7s-timer"></i> تمديد
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        
                    </table>

                </div>
            @else
            <div class="content">
                <div class="alert alert-warning" role="alert">
                    لم يتم ايجاد اي نتائج
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
