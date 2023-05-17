@extends('layouts.main')
@section('content')

<div class='card card-block text-center w-75 align-self-center'>
    <div class="card-header tm-text-blue"><span class="h2">مستخدمي النظام</span>
        <span class="float-left"><a href="{{ route('users.create') }}" class="btn btn-sm btn-success">إضافة
                مستخدم</a></span>
    </div>
    <div class="card-body">
        @if(count($users)>0)
        <table class="table table-responsive tm-text-blue table-bordered d-xl-table" dir="rtl">
            <thead>
                <tr>
                    <th>م</th>
                    <th>المستخدم</th>
                    <th>البريد الإلكتروني</th>
                    <th>تاريخ الإضافة</th>
                    <th>تاريخ التعديل</th>
                    <th>الصلاحيات</th>
                    <th colspan="3">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @php
                $count = 0;
                @endphp
                @foreach ($users as $user)
                <tr>

                    <td>{{$count += 1}}</td>
                    <td>{{$user->full_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->format('j F, Y')}}</td>
                    <td>{{$user->updated_at->format('d-m-Y')}}</td>
                    {{-- get user spatie role --}}
                    <td>
                        <div class="row justify-content-center">
                            @foreach ($user->roles as $role)
                            <span class="badge badge-primary m-1">{{$role->name}}</span>
                            @endforeach
                        </div>
                        {{-- button to change roles --}}
                        @if ($user->email!='admin@diwan.gov.om')
                        <a href="{{ route('users.ChangeRoles',$user->id) }}" class="btn btn-info btn-sm mt-2">تعديل
                            الصلاحيات</a>
                        @endif
                        {{-- show --}}
                    <td><a href="{{ route('users.show',$user->id)}}" class="btn btn-primary btn-sm">عرض</a></td>
                    {{-- edit --}}
                    <td>
                        @if ($user->email!='admin@diwan.gov.om')
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        @endif
                    </td>
                    <td>
                        @if ($user->email!='admin@diwan.gov.om')
                        <form action="{{route('vipGroups.destroy',$user->id)}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm ">حذف</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="alert alert-info">
            <h3>لا توجد مجموعة معتمدة إلى الآن</h3>
        </div>
        @endif
    </div>
</div>
@endsection
