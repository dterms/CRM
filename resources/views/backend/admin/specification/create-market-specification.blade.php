@extends('layouts.master')
@section('title', 'Specification')
@push('styles')

@endpush
@section('preloader')
@parent
@endsection
@section('sidenavbar')
@parent
@endsection
@section('content')

<section class="user_marketplace">

    <div class="marketplace_list card p-4 mt-2" style="border-bottom:4px solid #ddd;">
        <h4 class="d-flex justify-content-between m-0">Add New Specification
            <a href="{{ route('admin.specifications.index') }}" class="btn btn-sm text-light rounded-0"
                style="background: #19AAF8;"><i class="fas fa-angle-left"></i> Go to Back</a>
        </h4>
    </div>

    <div class="marketplace_list card p-4 mt-2">


        <section class="user_settings_create_specification card rounded-0 p-4">
            <form action="{{ route('admin.specifications.store') }}" method="POST">
                @csrf

                <div class="">
                    @if ($errors->any())
                    <div class="alert alert-danger d-flex justify-content-center">
                        <ul class="my-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </div>

                <div class="row px-4">

                    <div class="col-md-4">
                        <div class="background_type">
                            <h5>FILE TYPE <span class="text-danger">*</span></h5>
                            <div class="pl-3 my-3">

                                @foreach ($File_Type as $item)
                                <div class="checkbox">
                                    <label><input type="checkbox" name="file_type[]" value="{{ $item->id }}" /> &nbsp {{ $item->name }}</label>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="background">
                            <h5>Background <span class="text-danger">*</span></h5>
                            <div class="pl-3 my-3">

                                @foreach ($Background as $item)
                                    <div class="checkbox"> <label><input type="checkbox" name="background[]" value="{{ $item->id }}" />&nbsp {{ $item->name }}</label>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="alignment_type">
                            <h5>Alignment <span class="text-danger">*</span></h5>
                            <div class="pl-3 my-3">

                                @foreach ($Alignment as $item)
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="alignment[]" value="{{ $item->id }}" /> &nbsp {{ $item->name }}</label>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="color_profile">
                            <h5>Color Profile <span class="text-danger">*</span></h5>
                            <div class="pl-3 my-3">

                                @foreach ($Color as $item)
                                    <div class="checkbox"> <label><input type="checkbox" name="color[]" value="{{ $item->id }}" /> &nbsp {{ $item->name }}</label>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="margin_type">
                            <h5>Margin</h5>
                            <div class="pl-3 my-3">
                                <div class="checkbox"> <label>
                                        Top : &nbsp &nbsp &nbsp &nbsp<input type="text" name="margin[]" placeholder="0 px" value="0" style="width: 15%; margin-bottom: 5px;">&nbsp
                                        Righ : <input type="text" name="margin[]" placeholder="0 px" value="0" style="width: 15%; margin-bottom: 5px;"><br><br>
                                        Bottom : <input type="text" name="margin[]" placeholder="0 px" value="0" style="width: 15%; margin-bottom: 5px;">&nbsp
                                        Left : &nbsp<input type="text" name="margin[]" placeholder="0 px" value="0" style="width: 15%; margin-bottom: 5px;">
                                    </label>
                                </div>
                            </div>
                            <div class="dpi_type">
                                <h5>DPI <span class="text-danger">*</span></h5>
                                <div class="pl-3 my-3">

                                    @foreach ($Dpi as $item)
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="dpi[]" value="{{ $item->id }}" /> &nbsp {{ $item->name }}</label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="dpi_type">
                                <h5>Specification Addon <span class="text-danger">*</span></h5>
                                <div class="pl-3 my-3">

                                    @foreach ($Addon as $item)
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="addon[]" value="{{ $item->id }}" /> &nbsp {{ $item->name }}</label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="dpi_type">
                                <h5>Size <span class="text-danger">*</span></h5>
                                <div class="pl-3 my-3">

                                    @foreach ($Size as $item)
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="size[]" value="{{ $item->id }}" /> &nbsp {{ $item->name }}</label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mt-3">
                            <div class="form-group">
                                <label>Specification name <span class="text-danger">*</span></label>
                                <input type="text" name="specification_name" class="form-control" placeholder="specification name">
                            </div>

                            <div class="form-group">
                                <label>Category name <span class="text-danger">*</span></label>
                                <select name="category_name" class="form-control">
                                    <option value="">--Select One--</option>

                                    @foreach ($Category as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <button type="submit" class="btn btn-md text-light btn-block rounded-0" style="background: #19AAF8;">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>

    </div>

</section>


@endsection
