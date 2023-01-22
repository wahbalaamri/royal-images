@extends('layouts.main')

@section('content')
    <section class="tm-section tm-section-3 col-lg-10">
        <h2 class="tm-text-blue mb-4 text-uppercase">
            {{ __('Types') }}
        </h2>
        <div class="tm-textbox tm-bg-dark">

            @if (count($types) > 0)
                <div class="col-12">
                    <a href="/imageTypes/create" class="btn btn-lg btn-success float-right mb-2">{{ __('Add Image Type') }}</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover tm-text-blue">
                        <thead>
                            <tr class="text-uppercase">
                                <th>#</th>
                                <th>{{ __('Type in Arabic') }}</th>
                                <th>{{ __('Type in English') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $type->type_ar }}</td>
                                    <td>{{ $type->type_en }}</td>
                                    <td>
                                        <div class="row col-6">
                                            <a href="/imageTypes/{{ $type }}/edit"
                                                class="btn btn-sm btn-warning mr-2 ml-2">{{ __('Edit') }}</a>
                                            <form action="{{ route('imageTypes.destroy', $type->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center">
                    <div class="alert alert-warning">{{ __('There is No Image Type') }}</div>
                    <div class="col-12">
                        <a href="/imageTypes/create" class="btn btn-lg btn-success">{{ __('Add New Image Type') }}</a>
                    </div>
                </div>
            @endif


        </div>
    </section>
@endsection
<script>
    // $(document).ready(function(){
    //     $('.tm-section-1').css("display","block");
    // })
</script>
