@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update a product</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('products.update', $product->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}" />
                </div>
                <div class="form-group">
                    <label for="type">Type:</label>
                    <select name="product_type_id" class="form-control">
                        @foreach ( $product_types as $product_type )
                            <option value="{{ $product_type->id }}"{{ ( $product['product_type_id'] == $product_type->id ) ? ' selected' : '' }}>{{ $product_type->description }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" name="description" value="{{ $product->description }}" />
                </div>
                <div class="form-group">
                    <label for="link">Link:</label>
                    <input type="text" class="form-control" name="link" value="{{ $product->link }}" />
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    £<input type="text" class="form-control" name="price" value="{{ number_format($product->price / 100,2) }}" />
                </div>
                <div class="form-group">
                    <label for="discounted_price">Discounted Price:</label>
                    £<input type="text" class="form-control" name="discounted_price" value="{{ number_format($product->discounted_price / 100,2) }}" />.
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection