@extends('layouts.main')

@section('content')
    <!-- Section 3 Contact -->
    <section class="tm-section tm-section-3">
        <form class="tm-contact-form">
            <div class="form-group mb-4">
                <div class="row">
                    <div class="col-6">
                        <label class="col-form-label"><strong>{{ __('Select VIPS :') }}</strong></label><br />
                        <select class="selectpicker form-control" multiple data-live-search="true" name="vips[]" id="Names"
                            onchange="search()">

                            @if (count($VIPs) > 0)
                                @foreach ($VIPs as $VIP)
                                    <option value="{{ $VIP->id }}">{{ $VIP->name_en }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="col-form-label"><strong>{{ __('Image Occasion') }}</strong></label><br />
                        <input type="text" class="form-control col-md-8 typeahead" name="image_occasion" id="image_occasion"
                            onchange="search()">
                    </div>
                </div>
            </div>

            <div class="form-group mb-4">
                <div class="row">
                    <div class="col-6">
                        <label class="col-form-label"><strong>{{ __('Image Quality') }}</strong></label><br />
                        <input type="text" class="form-control col-md-8" name="image_quality" id="image_quality"
                            onchange="search()">
                    </div>

                    <div class="col-6">
                        <label class="col-form-label"><strong>{{ __('Image Location') }}</strong></label><br />
                        <input type="text" class="form-control col-md-8 typeahead" name="image_location" onchange="search()"
                            id="image_location">
                    </div>
                </div>
            </div>

            <div class="form-group mb-4">
                <div class="row">
                    <div class="col-6">
                        <label class="col-form-label"><strong>{{ __('Image Date From') }}</strong></label><br />
                        <input type="date" class="form-control col-md-8" name="image_date" id="image_date_from"
                            onchange="search()">
                    </div>
                    <div class="col-6">
                        <label class="col-form-label"><strong>{{ __('Image Date To') }}</strong></label><br />
                        <input type="date" class="form-control col-md-8" name="image_date_to" id="image_date_to"
                            onchange="search()">
                    </div>

                </div>
            </div>

            <div class="form-group mb-4">
                <div class="row">
                    <div class="col-6">
                        <label class="col-form-label"><strong>{{ __('Image Type') }}</strong></label><br />
                        <select class="selectpicker form-control" data-live-search="true" name="image_type" id="image_type"
                            onchange="search()">
                            <option value="">{{ __('SELECT') }}</option>
                            @if (count($types) > 0)
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">
                                        {{ $type->type_en }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="col-form-label"><strong>{{ __('Image Color Type') }}</strong></label><br />
                        <select class="selectpicker form-control" data-live-search="true" name="image_color_type"
                            id="image_color_type" onchange="search()">
                            <option value="">{{ __('SELECT') }}</option>
                            <option value="1">
                                {{ __('Black and White') }}
                            </option>
                            <option value="2">{{ __('Coloured') }}
                            </option>

                        </select>
                    </div>

                </div>
            </div>
            {{-- <div class="form-group mb-4">

            </div>
            <div class="form-group mb-4">

            </div>
            <div class="form-group mb-4">
                <div class="row">
                    <div class="col-8">

                    </div>
                    <div class="col-3">
                        <a href="/imageTypes/create" class="btn btn-lg btn-info mt-5">{{ __('Add New Image Type') }}</a>
                    </div>
                </div>
            </div> --}}
        </form>

        <div class="tm-contact-form mt-5">
            <div class="container"id="result">
                {{-- <label class="option_item">
                        <input type="checkbox" class="checkbox" data-id="12">
                        <div class="option_inner facebook">
                            <div class="tickmark" ></div>
                            <div class="icon">
                                <div class="row" id="result">


                                </div>
                            </div>

                        </div>
                    </label> --}}

            </div>

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
    // $(document).ready(function() {
    //     $('select').selectpicker();
    // });
</script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script>
    search = () => {
        // console.log("dddd== " + $("#Names").val());
        $.ajax({
            url: '/search',
            data: {
                _token: '{{ csrf_token() }}',
                vips: $("#Names").val(),
                Occasion: $("#image_occasion").val(),
                Quality: $("#image_quality").val(),
                Location: $("#image_location").val(),
                DateFrom: $("#image_date_from").val(),
                DateTo: $("#image_date_to").val(),
                ImageType: $("#image_type").val(),
                ColorType: $("#image_color_type").val(),
            },
            type: 'post',
            success: (response) => {
                images = response.images
                imagesDiv = "";
                images.forEach(element => {
                    // console.log(element.id);
                    path = "uploaded_images/" + element.image_url;
                    imagesDiv +=
                        '<label class="option_item">'+
                        '<input type="checkbox" class="checkbox" data-id="'+element.id+'">'+
                        '<div class="option_inner facebook">'+
                            '<div class="tickmark" ></div>'+
                            '<div class="icon"><a href="#" data-toggle="modal" data-target="#viewImageModal" onclick="show_image(this)">' +
                        "<img src='../uploaded_images/" + element.image_url+"' class='card-img-top' alt='...'> </a> </div></div></label>"
                    console.log();
                });
                $('#result').html(imagesDiv)
                console.log(response);
            },
            error: (error) => {
                console.log(error);
            }
        });
    }
    show_image = (controle) => {

        $('.modal-body').find('img').attr('src', $(controle).find('img').attr('src'))
    }
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
    });;
</script>
