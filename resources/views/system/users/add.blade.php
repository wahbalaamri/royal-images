@extends('layouts.main')

@section('content')
<!-- Section 3 Contact -->
<section class="tm-section tm-section-3">
    <div class='card card-block text-center align-self-center'>
        <div class="card-header tm-text-blue"><span class="h2">إضافة مستخدم جديد</span>

        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" class="tm-contact-form" method="post">
                {{-- create new user use User model --}}
                @csrf
                <div class="row" dir="rtl">
                    <div class="form-group col-6">
                        <label for="f_name_ar" class="control-label font-weight-bolder tm-text-blue float-right">{{
                            __('الاسم الاول باللغة العربية') }}</label>
                        <input type="text" name="f_name_ar" id="f_name_ar" class="form-control"
                            placeholder="الاسم الاول باللغة العربية" value="{{ old('f_name_ar') }}" dir="rtl" />
                        @error('f_name_ar')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="s_name_ar" class="control-label font-weight-bolder tm-text-blue float-right">{{
                            __('الاسم الثاني باللغة العربية') }}</label>
                        <input type="text" name="s_name_ar" id="s_name_ar" class="form-control"
                            placeholder="الاسم الثاني باللغة العربية" value="{{ old('s_name_ar') }}" dir="rtl" />
                        @error('s_name_ar')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="t_name_ar" class="control-label font-weight-bolder tm-text-blue float-right">{{
                            __('الاسم الثالث باللغة العربية') }}</label>
                        <input type="text" name="t_name_ar" id="t_name_ar" class="form-control"
                            placeholder="الاسم الثالث باللغة العربية" value="{{ old('t_name_ar') }}" dir="rtl" />
                        @error('t_name_ar')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="l_name_ar" class="control-label font-weight-bolder tm-text-blue float-right">{{
                            __('الاسم الرابع باللغة العربية') }}</label>
                        <input type="text" name="l_name_ar" id="l_name_ar" class="form-control"
                            placeholder="الاسم الرابع باللغة العربية" value="{{ old('l_name_ar') }}" dir="rtl" />
                        @error('l_name_ar')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="f_name_en" class="control-label font-weight-bolder tm-text-blue float-left">{{
                            __('الاسم الاول باللغة الانجليزية') }}</label>
                        <input type="text" name="f_name_en" id="f_name_en" class="form-control"
                            placeholder="الاسم الاول باللغة الانجليزية" value="{{ old('f_name_en') }}" dir="ltr" />
                        @error('f_name_en')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="s_name_en" class="control-label font-weight-bolder tm-text-blue float-left">{{
                            __('الاسم الثاني باللغة الانجليزية') }}</label>
                        <input type="text" name="s_name_en" id="s_name_en" class="form-control"
                            placeholder="الاسم الثاني باللغة الانجليزية" value="{{ old('s_name_en') }}" dir="ltr" />
                        @error('s_name_en')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="t_name_en" class="control-label font-weight-bolder tm-text-blue float-left">{{
                            __('الاسم الثالث باللغة الانجليزية') }}</label>
                        <input type="text" name="t_name_en" id="t_name_en" class="form-control"
                            placeholder="الاسم الثالث باللغة الانجليزية" value="{{ old('t_name_en') }}" dir="ltr" />
                        @error('t_name_en')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="l_name_en" class="control-label font-weight-bolder tm-text-blue float-left">{{
                            __('الاسم الرابع باللغة الانجليزية') }}</label>
                        <input type="text" name="l_name_en" id="l_name_en" class="form-control"
                            placeholder="الاسم الرابع باللغة الانجليزية" value="{{ old('l_name_en') }}" dir="ltr" />
                        @error('l_name_en')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row" dir="rtl">
                    <div class="form-group col-8">
                        <label for="email" class="control-label font-weight-bolder tm-text-blue float-right">{{
                            __('البريد الإلكتروني') }}</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="البريد الالكتروني"
                            value="{{ old('email') }}" />
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- job_title_ar --}}
                    <div class="form-group col-6">
                        <label for="job_title_ar" class="control-label font-weight-bolder tm-text-blue float-right">{{
                            __('المسمى الوظيفي باللغة العربية') }}</label>
                        <input type="text" name="job_title_ar" id="job_title_ar" class="form-control"
                            placeholder="المسمى الوظيفي باللغة العربية" value="{{ old('job_title_ar') }}" dir="rtl" />
                        @error('job_title_ar')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- job_title_en --}}
                    <div class="form-group col-6">
                        <label for="job_title_en" class="control-label font-weight-bolder tm-text-blue float-left">{{
                            __('المسمى الوظيفي باللغة الانجليزية') }}</label>
                        <input type="text" name="job_title_en" id="job_title_en" class="form-control"
                            placeholder="المسمى الوظيفي باللغة الانجليزية" value="{{ old('job_title_en') }}"
                            dir="ltr" />
                        @error('job_title_en')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- submit button --}}
                <div class="form-group row d-flex justify-content-center">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">{{ __('حفظ') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
<script>
    $(document).ready(function() {
        $('.tm-section-1').css("display", "block");
    })
</script>
