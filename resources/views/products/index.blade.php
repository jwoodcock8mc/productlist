@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-4">Products</h1>
            <div class="col-sm-12">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <div>
                <a style="margin: 16px;" href="{{ route('products.create')}}" class="btn btn-primary">New Product</a>
                <a style="margin: 16px;" href="{{ route('productList.index')}}" class="btn btn-primary">Show Product Page</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Type</td>
                    <td>Description</td>
                    <td>Discounted Price</td>
                    <td>Photo</td>
                    <td colspan = 3>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{number_format($product->price / 100, 2)}}</td>
                        <td>{{$product->productType->description}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{number_format($product->discounted_price / 100, 2) }}</td>
                        <td><img height=100 src="images\{{$product->image_name}}"></td>
                        <td>
                            <a href="{{ route('image.upload',$product->id)}}" class="btn btn-primary">Upload Photo</a>
                        </td>
                        <td>
                            <a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection