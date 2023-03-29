@extends('layouts.main')
@section('content')

    <div class='card card-block text-center w-75 align-self-center tm-text-blue'>
        <div class="card-header"><span class="h2">الجنسيات</span>
            <span class="float-left"><a href="/nationalities/create" class="btn btn-sm btn-success">إضافة جنسية</a></span>
        </div>
        <div class="card-body">
            @if(count($nationalities)>0)
            <table class="table table-responsive table-bordered d-xl-table" dir="rtl">
                <thead>
                    <tr>
                        <th>م</th>
                        <th>اسم الشخصية</th>
                        <th>Nationality Name</th>
                        <th>تاريخ الإضافة</th>
                        <th>تاريخ التعديل</th>
                        <th colspan="2">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $count = 0;
                    @endphp
                    @foreach ($nationalities as $nationality)
                    <tr>

                        <td>{{$count += 1}}</td>
                        <td>{{$nationality->ar_nationality}}</td>
                        <td>{{$nationality->en_nationality}}</td>
                        <td>{{$nationality->created_at->format('j F, Y')}}</td>
                        <td>{{$nationality->updated_at->format('d-m-Y')}}</td>
                        <td><a href="/nationalities/{{$nationality->id}}/edit" class="btn btn-warning btn-sm">تعديل</a></td>
                        <td>   <form action="{{ route('nationalities.destroy', $nationality->id) }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-info">
                <h3>لا توجد بيانات لعرضها</h3>
            </div>
            @endif
        </div>
    </div>
{{--
<div id="card">
    <div class='card card-block text-center w-75 align-self-center'>
        <div class="card-header"><span class="h2">الجنسيات الغير معتمدة</span>

        </div>
        <div class="card-body">
            @if(count($unapproved_nationalities)>0)
            <table class="table table-responsive table-bordered d-xl-table" dir="rtl">
                <thead>
                    <tr>
                        <th>م</th>
                        <th>اسم الشخصية</th>
                        <th>Nationality Name</th>
                        <th>تاريخ الإضافة</th>
                        <th>تاريخ التعديل</th>

                    </tr>
                </thead>
                <tbody>
                @php
                    $count = 0;
                    @endphp
                    @foreach ($unapproved_nationalities as $nationality)
                    <tr>

                        <td>{{$count += 1}}</td>
                        <td>{{$nationality->ar_nationality}}</td>
                        <td>{{$nationality->en_nationality}}</td>
                        <td>{{$nationality->created_at->format('j F, Y')}}</td>
                        <td>{{$nationality->updated_at->format('d-m-Y')}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-info">
                <h3>لا توجد بيانات لعرضها</h3>
            </div>
            @endif
        </div>
    </div>
</div> --}}
@endsection
