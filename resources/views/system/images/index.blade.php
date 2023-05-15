@extends('layouts.main')

@section('content')
    {{-- <!-- Section 1 About Me -->
  <section class="tm-section tm-section-1" style="display: block">
    <div class="tm-textbox tm-textbox-2 tm-bg-dark">
      <h2 class="tm-text-blue mb-4">About Me</h2>
      <p class="mb-4">
        You are allowed to modify and use this HTML template for
        your personal or business websites.
      </p>
      <p class="mb-4">
        You are NOT allowed to re-distribute this template file on
        your site for any reason. Thank you.
      </p>
      <a
        href="#"
        id="tm_work_link"
        data-linkid="2"
        class="tm-link m-0"
        >Next</a
      >
    </div>
  </section> --}}

    <section class="tm-section tm-section-3 col-lg-10">
        <div class="tm-textbox tm-bg-dark" dir="rtl">
            <h2 class="text-white mb-4 text-uppercase float-right">
                {{ __('Images') }}
            </h2>
            {{-- <div class="card">
                <div class="card-header">
                    <div class="col-12">
                        <button class="btn btn-lg btn-success float-right">Add New Image</button>
                    </div>
                </div>
                <div class="card-body"> --}}
            @if (count($images) > 0)
                <div class="col-12">
                    <a href="/images/create" class="btn btn-lg btn-success float-left mb-3">{{ __('إضافة صورة جديدة') }}</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover text-white">
                        <thead>
                            <tr class="text-uppercase">
                                <th>#</th>
                                <th>{{ __('كبار الشخصيات') }}</th>
                                <th>{{ __('الصورة') }}</th>
                                <th>{{ __('الموقع') }}</th>
                                <th>{{ __('المناسبة') }}</th>
                                <th>{{ __('نوع الصورة') }}</th>
                                <th>{{ __('تاريخ الصورة') }}</th>
                                {{-- <th>{{ __('Image Color Mode') }}</th> --}}
                                <th>{{ __('جودة الصورة') }}</th>
                                <th>{{ __('نوع الملف') }}</th>
                                <th>{{ __('تعديل بيانات الصورة') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($images as $image)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <ol>
                                            @foreach ($image->vipsInImages as $vipInImage)
                                                @foreach ($VIPs as $VIP)
                                                    @if ($VIP->id == $vipInImage->vip_id)
                                                        <li>
                                                            {{-- @if (app()->getLocale() == 'ar') --}}
                                                                {{ $VIP->name_ar }}
                                                            {{-- @else
                                                                {{ $VIP->name_en }}
                                                            @endif --}}
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#viewImageModal" onclick="show_image(this)"><img
                                                src="{{ asset('uploaded_images/' . $image->image_url) }}"
                                                alt="{{ $image->image_url }}" class="img-fluid" height="50"
                                                width="50" srcset=""/></button>
                                    </td>
                                    <td>{{ $image->image_location }}</td>
                                    <td>{{ $image->image_occasion }}</td>
                                    <td>
                                        @foreach ($types as $type)
                                            @if ($image->image_type == $type->id)
                                                {{-- @if (app()->getLocale() == 'ar') --}}
                                                    {{ $type->type_ar }}
                                                {{-- @else
                                                    {{ $type->type_en }}
                                                @endif --}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $image->image_date }}</td>
                                    {{-- <td>
                                        @if ($image->image_color_mode == 1)
                                            {{ __('أبيض وأسود') }}
                                        @else
                                            {{ __('ملون') }}
                                        @endif
                                    </td> --}}
                                    <td>{{ $image->image_quality }}</td>
                                    <td>{{ $image->image_file_type }}</td>
                                    <td><a href="/images/{{$image->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center">
                    <div class="alert alert-warning">{{ __('لا توجد صور مضافة') }}</div>
                    <div class="col-12">
                        <a href="/images/create" class="btn btn-lg btn-success">{{ __('إضافة صورة جديدة') }}</a>
                    </div>
                </div>
            @endif


        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="viewImageModal" tabindex="-1" aria-labelledby="viewImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewImageModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" alt="" srcset="" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
    show_image=(controle)=>{
        console.log('dd');
        $('.modal-body').find('img').attr('src',$(controle).find('img').attr('src'))
    }
    // $(document).ready(function(){
    //     $('.tm-section-1').css("display","block");
    // })
</script>
