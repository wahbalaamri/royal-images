@extends('layouts.main')

@section('content')
    <!-- Section 3 Contact -->
    <section class="tm-section tm-section-3">
        <form action="{{ route('imageTypes.update', $type->id) }}" class="tm-contact-form" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group mb-4">
                <label for="type_ar" class="col-form-label">{{ __('نوع الصورة باللغة العربية') }}</label>
                <input type="text" id="type_ar" name="type_ar" value="{{ old('type_ar', $type->type_ar) }}"
                    class="form-control" placeholder='{{ __('أدخل نوع الصورة باللغة العربية') }}' />
            </div>
            <div class="form-group mb-4">
                <label for="type_en" class="col-form-label">{{ __('نوع الصورة باللغة الإنجليزية') }}</label>
                <input type="text" id="type_en" name="type_en" class="form-control"
                    value="{{ old('type_en', $type->type_en) }}" placeholder='{{ __('أدخل نوع الصورة باللغة الإنجليزية') }}' />
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="btn tm-send-btn tm-fl-right">
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
<script>
    // $(document).ready(function(){
    //     $('.tm-section-1').css("display","block");
    // })
</script>
