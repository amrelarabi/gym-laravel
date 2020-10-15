@extends('layouts.dashboard')

@section('title', 'المدفوعات')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
          
            @if(!$payments->isEmpty())
            <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                            <th>المتدرب</th>
                            <th>قيمة المدفوع</th>
                            <th>تاريخ الدفع</th>
                            <th></th>
                        </tr></thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->trainer->fullname }}</td>
                                <td>{{ $payment->payment_value }}</td>
                                <td>{{ $payment->created_at->format('d/m/Y') }}</td>
                                <td>
             
                                    <form action="{{ route('payment.destroy', $payment->id) }}" method="POST" class="delete-form">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-md" ><i class="pe-7s-trash"></i> حذف</button>
                                    </form>

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
<div class="row">
    <div class="col-md-12 text-center">
        {{ $payments->links() }}
    </div>
</div>
@endsection
