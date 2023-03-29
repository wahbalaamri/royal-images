@extends('layouts.main')
@section('content')
<div class="card w-50">
    <div class="alert alert-dark text-center"><h2 class="h2">إضافة جنسية جديدة</h2></div>
    <form action="{{ route('nationalities.store') }}" method="POST" class="card-body">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="sm-col-2 control-label font-weight-bolder">الجنسية</label>
            <div class="sm-col-5">
                <input type="text" dir="rtl" name="ar_nationality" id="ar_nationality" class="form-control" placeholder="أدخل اسم الجنسية باللغة العربية" required>
            </div>
        </div>
        <div class="form-group">
            <label class="sm-col-2 control-label font-weight-bolder">Nationality Name</label>
            <div class="sm-col-5">
                <input type="text" name="en_nationality" id="en_nationality" class="form-control" placeholder="Enter Nationality Name In English" required>
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-lg btn-primary ">إضافة</button>
        </div>
    </form>
</div>
@endsection
