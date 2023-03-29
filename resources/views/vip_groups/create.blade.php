@extends('layouts.main')
@section('content')
<div class="card w-50">
    <div class="alert alert-dark text-center"><h2 class="h2">إضافة مجموعة لكبار الشخصية</h2></div>
    <form action="{{ route('vipGroups.store') }}" method="POST" class="card-body">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="sm-col-2 control-label font-weight-bolder">اسم المجموعة</label>
            <div class="sm-col-5">
                <input type="text" dir="rtl" name="ar_vip_group" id="ar_vip_group" class="form-control" placeholder="أدخل اسم الفئة باللغة العربية" required>
            </div>
        </div>
        <div class="form-group">
            <label class="sm-col-2 control-label font-weight-bolder"> VIP group Name</label>
            <div class="sm-col-5">
                <input type="text" name="en_vip_group" id="en_vip_group" class="form-control" placeholder="Enter VIP Group Name In English" required>
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-lg btn-primary ">إضافة</button>
        </div>
    </form>
</div>
@endsection
