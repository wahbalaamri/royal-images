@extends('layouts.main')

@section('content')
    <!-- Section 3 Contact -->
    <section class="tm-section tm-section-3">
        <form action="{{ route('images.update', $image->id) }}" class="tm-contact-form" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group mb-4">
                <label for="image" class="col-form-label">{{ __('أختر الصورة') }}</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*" placeholder="Name" />
            </div>
            <div class="form-group mb-4">
                <div class="row">
                    <div class="col-8">
                        <label class="col-form-label"><strong>{{ __('أختر اسماء كبار الشخصيات :') }}
                            </strong></label><br />
                        <select class="selectpicker" multiple data-live-search="true" name="vips[]" id="Names">

                            @if (count($VIPs) > 0)
                                @foreach ($VIPs as $VIP)
                                    <option value="{{ $VIP->id }}"
                                        @if (old('vips') == null && $image->vipsInImages->pluck('vip_id')->toArray() != null) @if (in_array($VIP->id, $image->vipsInImages->pluck('vip_id')->toArray()))
                                        selected @endif
                                    @elseif (old('vips') != null && $image->vipsInImages->pluck('vip_id')->toArray() != null)
                                        @if (in_array($VIP->id, old('vips')) || in_array($VIP->id, $image->vipsInImages->pluck('vip_id')->toArray())) selected @endif @endif
                                        >{{ $VIP->name_en }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-3">
                        <a href="/vipsNames/create" class="btn btn-lg btn-info mt-5">{{ __('Add New VIP') }}</a>
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <label class="col-form-label"><strong>{{ __('مناسبة الصورة') }}</strong></label><br />
                <input type="text" class="form-control col-md-8"
                    value="{{ old('image_occasion', $image->image_occasion) }}" name="image_occasion" id="image_occasion">
            </div>
            <div class="form-group mb-4">
                <label class="col-form-label"><strong>{{ __('جودة الصورة') }}</strong></label><br />
                <input type="text" class="form-control col-md-8" value="{{ old('image_quality', $image->image_quality) }}"
                    name="image_quality" id="image_quality">
            </div>
            <div class="form-group mb-4">
                <label class="col-form-label"><strong>{{ __('المكان الذي ألتقطت به الصورة') }}</strong></label><br />
                <input type="text" class="form-control col-md-8"
                    value="{{ old('image_location', $image->image_location) }}" name="image_location" id="image_location">
            </div>
            <div class="form-group mb-4">
                <label class="col-form-label"><strong>{{ __('تاريخ الصورة') }}</strong></label><br />
                <input type="date" class="form-control col-md-8" name="image_date"
                    value="{{ old('image_date', $image->image_date) }}" id="image_date">
            </div>
            <div class="form-group mb-4">
                <div class="row">
                    <div class="col-8">
                        <label class="col-form-label"><strong>{{ __('نوع الصورة') }}</strong></label><br />
                        <select class="selectpicker" data-live-search="true" name="image_type" id="image_type">

                            @if (count($types) > 0)
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @if (old('image_type', $image->image_type) == $type->id) selected @endif>
                                        {{ $type->type_en }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-3">
                        <a href="/imageTypes/create" class="btn btn-lg btn-info mt-5">{{ __('Add New نوع الصورة') }}</a>
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <div class="row">
                    <div class="col-8">
                        <label class="col-form-label"><strong>{{ __('نوع ألوان الصورة') }}</strong></label><br />
                        <select class="selectpicker" data-live-search="true" name="image_color_type"
                            id="image_color_type">

                            <option value="1" @if (old('image_color_type', $image->image_color_type) == 1) selected @endif>
                                {{ __('أبيض وأسود') }}
                            </option>
                            <option value="2" @if (old('image_color_type', $image->image_color_type) == 2) selected @endif>{{ __('ملون') }}
                            </option>

                        </select>
                    </div>

                </div>
            </div>
            {{-- <div class="fform-group mb-4">
                <div class="row">
                    <input type="text" id="vip" name="vips" class="form-control col-md-8" placeholder="VIPs" /> --}}
            {{-- <a class="btn btn-info btn-lg text-uppercase align-self-center" onclick="AddVip()">Add VIP</a> --}}
            {{-- </div>

            </div> --}}
            {{-- <div class="fform-group mb-4">
                <textarea rows="4" id="contact_message" name="contact_message" class="form-control" placeholder="Message"></textarea>
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
