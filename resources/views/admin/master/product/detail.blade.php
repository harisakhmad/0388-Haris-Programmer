@extends('template.app')

@section('pagetitle','Detail Product')


@section('content')
<div class="box box-primary">
    <div class="box-body">

        <div>
            <a href="{{route('product.index')}}" class="btn btn-sm btn-primary">
            <span class="fa fa-arrow-left"></span> Kembali</a>
        </div>

        <div class="row">
            <div class="col-md-6">
                <dl class="dl-horizontal">
                    <dt>Judul Riset</dt>
                    <dd> {{ ucfirst($product->title) }}</dd>
                    <dt>Product</dt>
                    <dd> {{ ucfirst($product->final_product) }}</dd>
                    <dt>peneliti</dt>
                    <dd> {{ ucfirst($product->researcher) }}</dd>

                    {{-- <dt>Harga Produk</dt>
                    <dd> {{ "Rp. ". number_format($product->price,0,'.','.') }}</dd>

                    <dt>Stok Produk</dt>
                    <dd> <label for="" class="text text-primary"> {{ $product->stock }} </label></dd> --}}

                    {{-- <dt>Summary</dt>
                    <dd style="word-break: break-all;"> {{ str_limit($product->summary,500,' ...') }}</dd> --}}

                </dl>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <label for="">Description</label>
                <p class="text">{!! $product->summary !!}</p>
            </div>
        </div>

        {{-- <div class="row"> --}}
            <div class="table">
                <table class="table table-striped table-hover table-responsive" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                        </tr>
                    </thead> 
                    <tbody>
                    @foreach ( $product->fileRelation as $image)
                    <tr>
                        <td>{{$loop->iteration}}</td> 
                        <td><img src="{{URL::asset('uploads/'.$image->image )}}" alt="" width="240px" height="120px"></td>

                    </tr>
                        
                    @endforeach
                   
                        
                    </tbody>
                </table>
            </div>
            {{-- </div> --}}

    </div>
</div>
@endsection