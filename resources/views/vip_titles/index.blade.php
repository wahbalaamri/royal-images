@extends('layouts.main')
@section('content')

    <div class='card card-block text-center tm-text-blue w-75 align-self-center'>
        <div class="card-header"><span class="h2">الصفات الإعتبارية</span>
            <span class="float-left"><a href="{{ route('vipTitles.create') }}" class="btn btn-sm btn-success">إضافة صفة </a></span>
        </div>
        <div class="card-body">
            @if(count($vip_titles)>0)
            <table class="table table-responsive table-bordered d-xl-table" dir="rtl">
                <thead>
                    <tr>
                        <th>م</th>
                        <th>اسم الصفة</th>
                        <th>Vip Title Name</th>
                        <th>تاريخ الإضافة</th>
                        <th>تاريخ التعديل</th>
                        <th colspan="2">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $count = 0;
                    @endphp
                    @foreach ($vip_titles as $vip_title)
                    <tr>

                        <td>{{$count += 1}}</td>
                        <td>{{$vip_title->ar_vip_title}}</td>
                        <td>{{$vip_title->en_vip_title}}</td>
                        <td>{{$vip_title->created_at->format('j F, Y')}}</td>
                        <td>{{$vip_title->updated_at->format('d-m-Y')}}</td>
                        <td><a href="/vipTitles/{{$vip_title->id}}/edit" class="btn btn-warning btn-sm">تعديل</a></td>
                        <td>  <form action="{{ route('vipTitles.destroy', $vip_title->id) }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @method('delete')
                                <button type="submit" class='btn btn-danger btn-sm'>حذف</button>
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

@endsection
