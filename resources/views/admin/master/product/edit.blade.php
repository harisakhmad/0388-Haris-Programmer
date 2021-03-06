//create.blade.php
@extends('template.app')

@section('pagetitle','Edit Research')

@push('customcss')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <style>
        .label-required{
            font-size: 14px;
            color: red;
        }
    </style>
@endpush

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-success">
            <form action="{{route('product.update',$product->id)}}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="">Judul <span class="label-required">*</span></label>
                        <input type="text" name="title" class="form-control input-sm" placeholder="Judul Produk..."
                            required maxlength="60" value="{{ $product->title }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Produk <span class="label-required">*</span></label>
                        <input type="text" name="final_product" class="form-control input-sm" placeholder="Nama Produk..."
                            required maxlength="60" value="{{ $product->final_product }}">
                    </div>

                    {{-- <div class="form-group">
                        <label for="">Harga <span class="label-required">*</span></label>
                        <input type="number" name="price" class="form-control input-sm" placeholder="Produk..."
                            required min="0" max="9999999999" value="{{ old('price') }}">
                    </div> --}}

                    {{-- <div class="form-group">
                        <label for="">Stok <span class="label-required">*</span></label>
                        <input type="number" name="stock" class="form-control input-sm" placeholder="Stok Produk..."
                            required min="0" max="9999999999" value="{{ old('stock') }}">
                    </div> --}}

                    <div class="form-group">
                            <label for="images">referensi riset</label>
                            <input type="file" id="images" multiple name="filess[]" id="images" accept="image/*,.pdf">
                            <p class="help-block">File</p>
                    </div>

                    <div class="form-group">
                        <label for="">Summary</label>
                        <textarea id="description" class="form-control" name="summary">{{ $product->summary  }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Peneliti <span class="label-required">*</span></label>
                        <input type="text" name="researcher" class="form-control input-sm" placeholder="Nama Nama Peneliti..."
                            required maxlength="60" value="{{ $product->researcher }}">
                    </div>
                </div> <!-- /.box-body -->
                

                <div class="box-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-md btn-primary"> <i class="fa fa-save"></i> Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

{{-- @push('customscript')
    <script src="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            //description
            $('#description').wysihtml5({
                toolbar : {
                    "image": false,
                    "blockquote": false,
                    "link": false,
                    "lists": false,
                }
            });
        });
    </script>
@endpush --}}

//detail.blade.php
@extends('template.app')

@section('pagetitle','Detail Product')


@section('content')
<div class="box box-primary">
    <div class="box-body">

        <div class="row">
            <div class="col-md-6">
                <dl class="dl-horizontal">
                    <dt>Nama Produk</dt>
                    {{-- <dd> {{ ucfirst($products->product) }}</dd>  --}}

                    <dt>Harga Produk</dt>
                    {{-- <dd> {{ "Rp. ". number_format($product->price,0,'.','.') }}</dd> --}}

                    <dt>Stok Produk</dt>
                    {{-- <dd> <label for="" class="text text-primary"> {{ $product->stock }} </label></dd> --}}

                    <dt>Description</dt>
                    {{-- <dd style="word-break: break-all;"> {{ str_limit($product->description,500,' ...') }}</dd> --}}

                </dl>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <label for="">Description</label>
                {{-- <p class="text">{{ $product->description }}</p> --}}
            </div>
        </div>

        <div class="row">
            <div class="table">
                <table class="table table-striped table-hover table-responsive" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            </div>

    </div>
</div>
@endsection

