@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Add a Product</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('products.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Name:</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Type</label>
                        <select name="product_type_id" class="form-control">
                            @foreach ( $product_types as $product_type )
                                <option value="{{ $product_type->id }}">{{ $product_type->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="city">Description</label>
                        <input type="text" class="form-control" name="description"/>
                    </div>
                    <div class="form-group">
                        <label for="country">Link</label>
                        <input type="text" class="form-control" name="link"/>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Price</label>
                        <input type="text" class="form-control" name="price"/>
                    </div>
                    <div class="form-group">
                        <label for="job_title">Discounted Price</label>
                        <input type="text" class="form-control" name="discounted_price"/>
                    </div>
                    <button type="submit" class="btn btn-primary-outline">Add product</button>
                </form>
            </div>
        </div>
    </div>
@endsection