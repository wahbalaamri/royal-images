@extends('layouts.main')

@section('content')
<section class="tm-section tm-section-3 col-lg-10">
    <div class="tm-textbox tm-bg-dark">
        <h2 class="text-white float-right mb-4 text-uppercase">
            {{ __('أنواع الصور') }}
        </h2>

        @if (count($types) > 0)
        <div class="col-12">
            <a href="/imageTypes/create" class="btn btn-lg btn-success float-left mb-2">{{ __('إضافة نوع جديد') }}</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover text-white">
                <thead>
                    <tr class="text-uppercase">
                        <th>#</th>
                        <th>{{ __('نوع الصورة بالعربية') }}</th>
                        <th>{{ __('نوع الصورة بالإنجليزية') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $type->type_ar }}</td>
                        <td>{{ $type->type_en }}</td>
                        <td>
                            <div class="col-9">
                                <div class="row">
                                    <a href="/imageTypes/{{ $type }}/edit" class="btn btn-sm btn-warning mr-2 ml-2">{{
                                        __('تعديل') }}</a>
                                    <form action="{{ route('imageTypes.destroy', $type->id) }}" method="post">
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
            <div class="alert alert-warning">{{ __('لا توجد أنواع للصور مضافة من قبل') }}</div>
            <div class="col-12">
                <a href="/imageTypes/create" class="btn btn-lg btn-success">{{ __('إضافة نوع جديد') }}</a>
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
