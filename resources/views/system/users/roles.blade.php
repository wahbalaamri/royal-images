@extends('layouts.main')

@section('content')
<!-- Section 3 Contact -->
<section class="tm-section tm-section-3">
    <div class='card card-block text-center w-50 align-self-center'>
        <div class="card-header tm-text-blue"><span class="h2">تعديل صلاحيات مستخدم </span>

        </div>
        <div class="card-body">
            <form action="{{ route('users.SaveRoles',$id) }}" class="tm-contact-form" method="post">
                @csrf
                {{-- mulit select --}}

                <div class="form-group">
                    <label for="roles" class="control-label font-weight-bolder tm-text-blue float-right">{{
                        __('الصلاحيات') }}</label>
                    <select name="roles[]" id="roles" class="form-control selectpicker" multiple>
                        <option value="admin" {{ in_array('admin', old('roles') ?: $roles) ? 'selected' : '' }}>admin </option>
                        <option value="viewer" {{ in_array('viewer', old('roles') ?: $roles) ? 'selected' : '' }}>viewer </option>
                        <option value="dataEntry" {{ in_array('dataEntry', old('roles') ?: $roles) ? 'selected' : '' }}>data Entry </option>
                    </select>
                    {{-- save button --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block text-uppercase">حفظ</button>
                    </div>

            </form>
        </div>
    </div>
</section>
@endsection
