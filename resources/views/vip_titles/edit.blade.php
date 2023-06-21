@extends('layouts.main')
@section('content')
<div class="card w-50">
    <div class="alert alert-dark text-center"><h2 class="h2">تعديل بيانات الصفة الإعتبارية</h2></div>
    <form action="{{ route('vipTitles.update', $Vip_title->id) }}" method="post">
    @csrf
    @method('put')
        <div class="form-group">
            <label class="sm-col-2 control-label font-weight-bolder">الصفة الإعتبارية</label>
            <div class="sm-col-5">
                <input type="text" dir="rtl" name="ar_vip_title" id="ar_vip_title" value="{{$Vip_title->ar_vip_title}}" class="form-control" placeholder="أدخل اسم الجنسية باللغة العربية" required>
            </div>
        </div>
        <div class="form-group">
            <label class="sm-col-2 control-label font-weight-bolder">VIP Title </label>
            <div class="sm-col-5">
                <input type="text" name="en_vip_title" id="en_vip_title" value="{{$Vip_title->en_vip_title}}" class="form-control" placeholder="Enter VIP Title Name In English" required>
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-lg btn-primary ">حفظ</button>
        </div>
    </form>
</div>
@endsection
<script>
    // $(document).ready(function(){
    //     $('.tm-section-1').css("display","block");
    // })
</script>
