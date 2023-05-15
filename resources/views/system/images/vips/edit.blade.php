@extends('layouts.main')

@section('content')
<!-- Section 3 Contact -->
<section class="tm-section tm-section-3">
    <form action="{{ route('vipsNames.update',$vip->id) }}" class="tm-contact-form" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row" dir="rtl">
            <div class="col-lg-5 col-md-11 m-1 form-group mb-4">
                <label for="name_ar" class="col-form-label float-right">{{ __("اسم الشخصية باللغة العربية") }}</label>
                <input type="text" id="name_ar" name="name_ar" value="{{old('name_ar',$vip->name_ar)}}"
                    class="form-control" placeholder='{{ __("أدخل اسم الشخصية باللغة العربية") }}' />
            </div>
            <div class="col-lg-5 col-md-11 m-1 form-group mb-4">
                <label for="name_en" class="col-form-label float-right">{{ __("اسم الشخصية باللغة الإنجليزية")
                    }}</label>
                <input type="text" id="name_en" name="name_en" value="{{old('name_en',$vip->name_en)}}"
                    class="form-control" placeholder='{{ __("أدخل اسم الشخصية باللغة الإنجليزية") }}' />
            </div>
            <div class="col-lg-5 col-md-11 m-1 form-group mb-4">
                <label for="name_ar" class="col-form-label float-right">{{ __("مجموعة كبار الشخصيات") }}</label>
                {{-- "" --}}
                <Select class="selectpicker" name="vip_group" id="vip_group">
                    @if (count($VIPgroups) > 0)
                    @foreach ($VIPgroups as $VIPgroup)
                        <option value="{{ $VIPgroup->id }}"
                            @if (old('vip_group',$vip->vip_group) != null) @if ($VIPgroup->id== old('vip_group',$vip->vip_group))
                            selected @endif
                            @endif>{{ $VIPgroup->ar_vip_group }}</option>
                    @endforeach
                @endif
                </Select>
            </div>
            <div class="col-lg-5 col-md-11 m-1 form-group mb-4">
                <label for="name_en" class="col-form-label float-right">{{ __("الصفة الإعتبارية") }}</label>
                {{-- "" --}}
                <Select class="selectpicker" name="vip_title" id="vip_title">
                    @if (count($VIPtitles) > 0)
                    @foreach ($VIPtitles as $VIPtitle)
                        <option value="{{ $VIPtitle->id }}"
                            @if (old('vip_title',$vip->vip_title) != null) @if ($VIPtitle->id== old('vip_title',$vip->vip_title))
                            selected @endif
                            @endif>{{ $VIPtitle->ar_vip_title }}</option>
                    @endforeach
                @endif
                </Select>
            </div>
            <div class="col-lg-5 col-md-11 m-1 form-group mb-4">
                <label for="name_en" class="col-form-label float-right">{{ __("الجنسية") }}</label>
                {{-- "" --}}
                <Select class="selectpicker" name="nationality" id="nationality">
                    @if (count($VIPnationalities) > 0)
                    @foreach ($VIPnationalities as $VIPnationality)
                        <option value="{{ $VIPnationality->id }}"
                            @if (old('nationality',$vip->nationality) != null) @if ($VIPnationality->id== old('nationality',$vip->nationality))
                            selected @endif
                            @endif>{{ $VIPnationality->ar_nationality }}</option>
                    @endforeach
                @endif
                </Select>
            </div>
        </div>
        <div class="form-group mb-0">
            <button type="submit" class="btn tm-send-btn float-left">
                {{__('حفظ')}}
            </button>
        </div>
    </form>
</section>
@endsection
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<style type="text/css">
    .dropdown-toggle {
        height: 40px;
        width: 400px !important;
    }
</style>
<!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

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
