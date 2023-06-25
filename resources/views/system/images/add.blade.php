@extends('layouts.main')

@section('content')
<!-- Section 3 Contact -->
<section class="tm-section tm-section-3">
    <form action="{{ route('images.store') }}" class="tm-contact-form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row" dir="rtl">
            <div class="col-lg-7 col-md-11 m-1 form-group mb-4">
                <label for="image" class="col-form-label float-right">{{ __('أختر الصورة') }}</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*" placeholder="Name" />
            </div>
            <div class="col-lg-7 col-md-11 m-1 form-group mb-4">
                <label for="name_en" class="col-form-label float-right">{{ __("الجنسية") }}</label>
                {{-- "" --}}
                <Select class="js-example-basic-single" name="nationality" id="nationality">
                    @if (count($VIPnationalities) > 0)
                    <option value="">أختر</option>
                    @foreach ($VIPnationalities as $VIPnationality)
                    <option value="{{ $VIPnationality->id }}" @if (old('nationality') !=null) @if ($VIPnationality->id==
                        old('nationality'))
                        selected @endif
                        @endif>{{ $VIPnationality->ar_nationality }}</option>
                    @endforeach
                    @endif
                </Select>
            </div>
            <div class="col-lg-7 col-md-11 m-1 form-group mb-4">
                <label for="name_ar" class="col-form-label float-right">{{ __("مجموعة كبار الشخصيات") }}</label>
                {{-- "" --}}
                <Select class="js-example-basic-single" name="vip_group" id="vip_group" disabled>
                    @if (count($VIPgroups) > 0)
                    <option value="">أختر</option>
                    @foreach ($VIPgroups as $VIPgroup)
                    <option value="{{ $VIPgroup->id }}" @if (old('vip_group') !=null) @if ($VIPgroup->id==
                        old('vip_group'))
                        selected @endif
                        @endif>{{ $VIPgroup->ar_vip_group }}</option>
                    @endforeach
                    @endif
                </Select>
            </div>
            <div class="col-lg-7 col-md-11 m-1 form-group mb-4">
                <label for="name_en" class="col-form-label float-right">{{ __("الصفة الإعتبارية") }}</label>
                {{-- "" --}}
                <Select class="js-example-basic-single" name="vip_title" id="vip_title" disabled>
                    @if (count($VIPtitles) > 0)
                    <option value="">أختر</option>
                    @foreach ($VIPtitles as $VIPtitle)
                    <option value="{{ $VIPtitle->id }}" @if (old('vip_title') !=null) @if ($VIPtitle->id==
                        old('vip_title'))
                        selected @endif
                        @endif>{{ $VIPtitle->ar_vip_title }}</option>
                    @endforeach
                    @endif
                </Select>
            </div>

            <div class="col-lg-7 col-md-11 m-1 form-group mb-4">
                <label class="col-form-label float-right"><strong>{{ __('أختر اسماء كبار الشخصيات :')
                        }}</strong></label>
                <select class="js-example-basic-multiple" multiple data-live-search="true" name="vips[]" id="Names"
                    disabled>

                    @if (count($VIPs) > 0)
                    @foreach ($VIPs as $VIP)
                    <option value="{{ $VIP->id }}" @if (old('vips') !=null) @if (in_array($VIP->id,
                        old('vips')))
                        selected @endif
                        @endif>{{ $VIP->name_ar }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-lg-5 col-md-11 m-1 form-group mb-4">
                <label class="col-form-label float-right"><strong>{{ __('مناسبة الصورة') }}</strong></label>
                <input type="text" class="form-control" value="{{ old('image_occasion') }}" name="image_occasion"
                    id="image_occasion">
            </div>
            <div class="col-lg-7 col-md-11 m-1 form-group mb-4">
                <label class="col-form-label float-right"><strong>{{ __('جودة الصورة') }}</strong></label>
                <input type="text" class="form-control" value="{{ old('image_quality') }}" name="image_quality"
                    id="image_quality">
            </div>
            <div class="col-lg-7 col-md-11 m-1 form-group mb-4">
                <label class="col-form-label float-right"><strong>{{ __('المكان الذي ألتقطت به الصورة')
                        }}</strong></label>
                <input type="text" class="form-control" value="{{ old('image_location') }}" name="image_location"
                    id="image_location">
            </div>
            <div class="col-lg-7 col-md-11 m-1 form-group mb-4">
                <label class="col-form-label float-right"><strong>{{ __('تاريخ الصورة') }}</strong></label>
                <input type="date" class="form-control" name="image_date" value="{{ old('image_date') }}"
                    id="image_date">
            </div>
            <div class="col-lg-7 col-md-11 m-1 form-group mb-4">

                <label class="col-form-label float-right"><strong>{{ __('نوع الصورة') }}</strong></label>
                <select class="js-example-basic-single" data-live-search="true" name="image_type" id="image_type">

                    @if (count($types) > 0)
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}" @if (old('image_type')==$type->id) selected @endif>
                        {{ $type->type_en }}</option>
                    @endforeach
                    @endif
                </select>

            </div>
            <div class="col-lg-7 col-md-11 m-1 form-group mb-4">

                <label class="col-form-label float-right"><strong>{{ __('نوع ألوان الصورة') }}</strong></label>
                <select class="js-example-basic-single" data-live-search="true" name="image_color_type" id="image_color_type">

                    <option value="1" @if (old('image_color_type')==1) selected @endif>
                        {{ __('أبيض وأسود') }}
                    </option>
                    <option value="2" @if (old('image_color_type')==2) selected @endif>{{ __('ملون') }}
                    </option>

                </select>

            </div>
        </div>

        {{-- <div class="fcol-lg-7 col-md-11 m-1 form-group mb-4">
            <div class="row">
                <input type="text" id="vip" name="vips" class="form-control" placeholder="VIPs" /> --}}
                {{-- <a class="btn btn-info btn-lg text-uppercase align-self-center" onclick="AddVip()">Add VIP</a> --}}
                {{--
            </div>

        </div> --}}
        {{-- <div class="fcol-lg-7 col-md-11 m-1 form-group mb-4">
            <textarea rows="4" id="contact_message" name="contact_message" class="form-control"
                placeholder="Message"></textarea>
        </div> --}}
        <hr class="w-100">
        <div class="form-group mb-2 mt-5 pt-2 pb-1 text-center">
            <button type="submit" class="btn btn-lg btn-success col-3 text-md-center">
                {{ __('حفظ') }}
            </button>
        </div>
    </form>
</section>
@endsection
@section('scripts')
<!-- CSS -->

{{-- selec2 cdn --}}

{{--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> --}}
<style type="text/css">
    .dropdown-toggle {
        height: 40px;
        width: 400px !important;
    }
</style>
<!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function() {
        // $('select').selectpicker();
        $('.js-example-basic-multiple').select2();
            $('.js-example-basic-single').select2();
    });
</script>
{{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> --}}

<script>
    $(document).ready(function() {
        $('.tm-section-1').css("display", "block");
        $('input[type=file]').change(function() {
            console.log(this.files[0].mozFullPath);
        });
    });
    AddVip = () => {
        vip = $('#vip').val();
        if (vip == "" || vip == null) {
            console.log("nothing to add");
            return;
        }
        $.ajax({
            url: '/addVips',
            data: {
                vip: vip,
                _token: '{{ csrf_token() }}'
            },
            type: "post",
            success: function(response) {
                var result = [];
                var keys = Object.keys(response);
                keys.forEach(function(key) {
                    result.push(response[key]);
                });
                // response = JSON.parse(response);
                console.log("success " + result);
                var o = new Option("option text", "value");
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html("option text");
                $("#Names").append(o);
                console.log($('#Names'));
            },
            error: function(response) {
                console.log('error');
            }
        })
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#name').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: '{{ route('search') }}',
                type: 'GET',
                data: {
                    'name': query
                },
                success: function(data) {
                    $('#product_list').html(data);
                }
            })
        });
        $(document).on('click', 'li', function() {
            var value = $(this).text();
            $('#name').val(value);
            $('#product_list').html("");
        });
        $("#nationality").change(function(){
            console.log($("#nationality").val()!="");
            console.log($("#nationality").val());
            if($("#nationality").val()!="")
            {
                $("#vip_group").prop('disabled', false);
            }
            else
            {
                $("#vip_group").prop('disabled', true);
                $("#vip_title").prop('disabled', true);
                $("#Names").prop('disabled', true);
            }
        });
        $("#vip_group").change(function(){
            if($("#vip_group").val()!="")
            {
                $("#vip_title").prop('disabled', false);
            }
            else
            {
                $("#vip_title").prop('disabled', true);
                $("#Names").prop('disabled', true);
            }
        });
        $("#vip_title").change(function(){
            if($("#vip_title").val()!="")
            {
                //shorthand ajax call post
                $.post("{{route('getVips')}}",
                {
                    _token: '{{ csrf_token() }}',
                    vip_group: $("#vip_group").val(),
                    vip_title: $("#vip_title").val(),
                    nationality: $("#nationality").val(),
                },
                function(data, status){
                    // console.log(data);
                     $("#Names").empty();
                    // $("#Names").append("<option value='' >أختر</option>");
                    $.each(data, function(index, value) {
                        $("#Names").append("<option value='"+value.id+"'>"+value.name_ar+"</option>");
                    });
                });
                $("#Names").prop('disabled', false);
            }
            else
            {
                $("#Names").prop('disabled', true);
            }
        });
    });
</script>
@endsection
<script>
    // $(document).ready(function(){
    //     $('.tm-section-1').css("display","block");
    // })
</script>
