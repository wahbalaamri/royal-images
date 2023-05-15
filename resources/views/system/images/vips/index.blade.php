@extends('layouts.main')

@section('content')
<section class="tm-section tm-section-3 col-lg-10">

    <div class="tm-textbox tm-bg-dark" dir="rtl">
        <h2 class="text-white mb-4 text-uppercase float-right">
            {{ __('كبار الشخصيات') }}
        </h2>
        @if (count($VIPs) > 0)
        <div class="col-12">
            <a href="/vipsNames/create" class="btn btn-lg btn-success float-left mb-2">{{ __('إضافة شخصية جديدة') }}</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover text-white">
                <thead>
                    <tr class="text-uppercase">
                        <th>#</th>
                        <th>{{ __('اسم الشخصية بالعربية') }}</th>
                        <th>{{ __('اسم الشخصية بالإنجليزية') }}</th>
                        <th>{{ __('الفئة') }}</th>
                        <th>{{ __('الصفة') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($VIPs as $vip)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $vip->name_ar }}</td>
                        <td>{{ $vip->name_en }}</td>
                        <td>{{ $vip->vipGroup->ar_vip_group }}</td>
                        <td>{{ $vip->vipTitle->ar_vip_title }}</td>
                        <td>
                            <div class="col-9">
                                <div class="row">
                                    <a href="/vipsNames/{{ $vip->id }}/edit" class="btn btn-sm btn-warning mr-2 ml-2">{{
                                        __('تعديل') }}</a>
                                    <form action="{{ route('vipsNames.destroy', $vip->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">{{ __('حذف') }}</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center">
            <div class="alert alert-warning">{{ __('لم تتم إضافة أسماء كبار الشخصيات بعد') }}</div>
            <div class="col-12">
                <a href="/vipsNames/create" class="btn btn-sm btn-success">{{ __('إضافة إسم جديد') }}</a>
            </div>
        </div>
        @endif


    </div>
</section>
@endsection
<script>
    // $(document).ready(function(){
    //     $('.tm-section-1').css("display","block");
    // })
</script>
