@extends('templates.default')

@section('content')

<h1>{{ $product->product_name }}</h1>
<p class="lead">{{ $product->product_description }}</p>
<p><small>${{ $product->price}}</small></p>
	<img  class = "img-responsive" style = ""  src="{{url($product->base_image)}}">
<hr>

<a href="{{ route('products.index') }}" class="btn btn-info">Back to all Products</a>
<a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>

<div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['products.destroy', $product->id]
        ]) !!}
            {!! Form::submit('Delete this Product?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>

@stop
