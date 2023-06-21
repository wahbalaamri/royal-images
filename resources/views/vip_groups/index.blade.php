@extends('layouts.main')
@section('content')

    <div class='card card-block text-center w-75 align-self-center'>
        <div class="card-header tm-text-blue"><span class="h2">مجموعات كبار الشخصيات المعتمدة</span>
            <span class="float-left"><a href="/vipGroups/create" class="btn btn-sm btn-success">إضافة مجموعة</a></span>
        </div>
        <div class="card-body">
            @if(count($approved_vipGroups)>0)
            <table class="table table-responsive tm-text-blue table-bordered d-xl-table" dir="rtl">
                <thead>
                    <tr>
                        <th>م</th>
                        <th>اسم الفئة</th>
                        <th>VIP Group Name</th>
                        <th>تاريخ الإضافة</th>
                        <th>تاريخ التعديل</th>
                        <th colspan="2">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $count = 0;
                    @endphp
                    @foreach ($approved_vipGroups as $vip_group)
                    <tr>

                        <td>{{$count += 1}}</td>
                        <td>{{$vip_group->ar_vip_group}}</td>
                        <td>{{$vip_group->en_vip_group}}</td>
                        <td>{{$vip_group->created_at->format('j F, Y')}}</td>
                        <td>{{$vip_group->updated_at->format('d-m-Y')}}</td>
                        <td><a href="/vipGroups/{{$vip_group->id}}/edit" class="btn btn-warning btn-sm">تعديل</a></td>
                        <td>   <form action="{{route('vipGroups.destroy',$vip_group->id)}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm ">حذف</button>
                            </form></td>
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

{{-- <div id="card">
    <div class='card card-block text-center align-self-center'>
        <div class="card-header"><span class="h2">مجموعات كبار الشخصيات الغير معتمدة</span>

        </div>
        <div class="card-body">
            @if(count($unaproved_vipGroups)>0)
            <table class="table table-responsive table-bordered d-xl-table" dir="rtl">
                <thead>
                    <tr>
                        <th>م</th>
                        <th>اسم الفئة</th>
                        <th>VIP Group Name</th>
                        <th>تاريخ الإضافة</th>
                        <th>تاريخ التعديل</th>

                    </tr>
                </thead>
                <tbody>
                @php
                    $count = 0;
                    @endphp
                    @foreach ($unaproved_vipGroups as $vip_group)
                    <tr>

                        <td>{{$count += 1}}</td>
                        <td>{{$vip_group->ar_vip_group}}</td>
                        <td>{{$vip_group->en_vip_group}}</td>
                        <td>{{$vip_group->created_at->format('j F, Y')}}</td>
                        <td>{{$vip_group->updated_at->format('d-m-Y')}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-info">
                <h3>لا توجد مجموعة في إنتظار الإعتماد</h3>
            </div>
            @endif
        </div>
    </div>
</div> --}}
@endsection
<script>
    // $(document).ready(function(){
    //     $('.tm-section-1').css("display","block");
    // })
</script>
