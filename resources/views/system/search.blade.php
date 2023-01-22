@extends('layouts.main')

@section('content')
    <!-- Section 2 Work (Gallery) -->
    <section class="tm-section tm-section-2 mx-auto">
        <div class="grid tm-gallery">
            <figure class="effect-goliath tm-gallery-item">
                <img src="{{ asset('img/01.jpg') }}" alt="Image 1" class="" />
                <figcaption>
                    <h2>
                        Thoughtful
                        <span>Goliath</span>
                    </h2>
                    <p>When Goliath comes out, you should run.</p>
                    <a href="{{ asset('img/01.jpg') }}">View more</a>
                </figcaption>
            </figure>
            <figure class="effect-goliath tm-gallery-item">
                <img src="{{ asset('img/02.jpg') }}" alt="Pretty Girl" class="" />
                <figcaption>
                    <h2>
                        Pretty Girl
                        <span>Picture</span>
                    </h2>
                    <p>Vivamus feugiat, neque sed.</p>
                    <a href="{{ asset('img/02.jpg') }}">View more</a>
                </figcaption>
            </figure>
            <figure class="effect-goliath tm-gallery-item">
                <img src="{{ asset('img/03.jpg') }}" alt="Red Flowers" class="" />
                <figcaption>
                    <h2>
                        A bunch of
                        <span>Red Flower</span>
                    </h2>
                    <p>Integer pellentesque nisi iaculis sapien.</p>
                    <a href="{{ asset('img/03.jpg') }}">View more</a>
                </figcaption>
            </figure>
            <figure class="effect-goliath tm-gallery-item">
                <img src="{{ asset('img/04.jpg') }}" alt="Stairs" class="" />
                <figcaption>
                    <h2>
                        Thoughtful
                        <span>Goliath</span>
                    </h2>
                    <p>When Goliath comes out, you should run.</p>
                    <a href="{{ asset('img/04.jpg') }}">View more</a>
                </figcaption>
            </figure>
            <figure class="effect-goliath tm-gallery-item">
                <img src="{{ asset('img/05.jpg') }}" alt="Image 5" class="" />
                <figcaption>
                    <h2>
                        Thoughtful
                        <span>Goliath</span>
                    </h2>
                    <p>When Goliath comes out, you should run.</p>
                    <a href="{{ asset('img/05.jpg') }}">View more</a>
                </figcaption>
            </figure>
            <figure class="effect-goliath tm-gallery-item">
                <img src="{{ asset('img/06.jpg') }}" alt="Image 6" class="" />
                <figcaption>
                    <h2>
                        Thoughtful
                        <span>Goliath</span>
                    </h2>
                    <p>When Goliath comes out, you should run.</p>
                    <a href="{{ asset('img/06.jpg') }}">View more</a>
                </figcaption>
            </figure>
            <figure class="effect-goliath tm-gallery-item">
                <img src="{{ asset('img/07.jpg') }}" alt="Image 7" class="" />
                <figcaption>
                    <h2>
                        Thoughtful
                        <span>Goliath</span>
                    </h2>
                    <p>When Goliath comes out, you should run.</p>
                    <a href="{{ asset('img/07.jpg') }}">View more</a>
                </figcaption>
            </figure>
            <figure class="effect-goliath tm-gallery-item">
                <img src="{{ asset('img/08.jpg') }}" alt="Image 8" class="" />
                <figcaption>
                    <h2>
                        Thoughtful
                        <span>Goliath</span>
                    </h2>
                    <p>When Goliath comes out, you should run.</p>
                    <a href="{{ asset('img/08.jpg') }}">View more</a>
                </figcaption>
            </figure>
            <figure class="effect-goliath tm-gallery-item">
                <img src="{{ asset('img/09.jpg') }}" alt="Image 9" class="" />
                <figcaption>
                    <h2>
                        Thoughtful
                        <span>Goliath</span>
                    </h2>
                    <p>When Goliath comes out, you should run.</p>
                    <a href="{{ asset('img/09.jpg') }}">View more</a>
                </figcaption>
            </figure>
            <figure class="effect-goliath tm-gallery-item">
                <img src="{{ asset('img/10.jpg') }}" alt="Image 10" class="" />
                <figcaption>
                    <h2>
                        Thoughtful
                        <span>Goliath</span>
                    </h2>
                    <p>When Goliath comes out, you should run.</p>
                    <a href="{{ asset('img/10.jpg') }}">View more</a>
                </figcaption>
            </figure>
            <figure class="effect-goliath tm-gallery-item">
                <img src="{{ asset('img/11.jpg') }}" alt="Image 11" class="" />
                <figcaption>
                    <h2>
                        Thoughtful
                        <span>Goliath</span>
                    </h2>
                    <p>When Goliath comes out, you should run.</p>
                    <a href="{{ asset('img/11.jpg') }}">View more</a>
                </figcaption>
            </figure>
            <figure class="effect-goliath tm-gallery-item">
                <img src="{{ asset('img/12.jpg') }}" alt="Image 12" class="" />
                <figcaption>
                    <h2>
                        Thoughtful
                        <span>Goliath</span>
                    </h2>
                    <p>When Goliath comes out, you should run.</p>
                    <a href="{{ asset('img/12.jpg') }}">View more</a>
                </figcaption>
            </figure>
        </div>
    </section>
@endsection
<script>
    $(document).ready(function() {
        $('.tm-section-1').css("display", "block");
    })
</script>
