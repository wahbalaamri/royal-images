@extends('layouts.main')
@section('content')
<div class="card w-50">
    <div class="alert alert-dark text-center"><h2 class="h2">إضافة صفة إعتبارية جديدة</h2></div>
    <form action="{{ route('vipTitles.store') }}" method="POST" class="card-body">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="sm-col-2 control-label font-weight-bolder">اسم الصفة الإعتبارية</label>
            <div class="sm-col-5">
                <input type="text" dir="rtl" name="ar_vip_title" id="ar_vip_title" class="form-control" placeholder="أدخل اسم الصفة باللغة العربية" required>
            </div>
        </div>
        <div class="form-group">
            <label class="sm-col-2 control-label font-weight-bolder">VIP Title</label>
            <div class="sm-col-5">
                <input type="text" name="en_vip_title" id="en_vip_title" class="form-control" placeholder="Enter VIP Title Name In English" required>
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-lg btn-primary ">إضافة</button>
        </div>
    </form>
</div>
@endsection
