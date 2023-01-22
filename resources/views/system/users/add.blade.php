@extends('layouts.main')

@section('content')
    <!-- Section 3 Contact -->
    <section class="tm-section tm-section-3">
        <form action="" class="tm-contact-form" method="post">
            <div class="form-group mb-4">
                <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name"
                    required />
            </div>
            <div class="form-group mb-4">
                <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email"
                    required />
            </div>
            <div class="form-group mb-4">
                <textarea rows="4" id="contact_message" name="contact_message" class="form-control" placeholder="Message"
                    required></textarea>
            </div>
            <div class="form-group mb-0">
                <button type="submit" class="btn tm-send-btn tm-fl-right">
                    Send
                </button>
            </div>
        </form>
    </section>
@endsection
<script>
    $(document).ready(function() {
        $('.tm-section-1').css("display", "block");
    })
</script>
