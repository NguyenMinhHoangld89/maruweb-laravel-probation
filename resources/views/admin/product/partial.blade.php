{!! csrf_field() !!}
<div class="form-group">
    <label for="" class="col-form-label">Name</label>
    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
    <input type="text" class="form-control" name="name" value="{{old('name', isset($product)?$product->name:'')}}">
</div>
<div class="form-group">
    <label for="" class="col-form-label">SKU</label>
    @if ($errors->has('sku'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sku') }}</strong>
        </span>
    @endif
    <input type="text" class="form-control" name="sku" value="{{old('sku',isset($product)?$product->sku:'')}}">
</div>
<div class="form-group">
    <label for="" class="col-form-label">Price</label>
    @if ($errors->has('price'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('price') }}</strong>
        </span>
    @endif
    <input type="text" class="form-control" name="price" value="{{old('price',isset($product)?$product->price:'')}}">
</div>
<div class="form-group">
    <label for="" class="col-form-label">Image</label>
    @if ($errors->has('image'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
    @endif
    <input type="file" class="form-control" name="image">
    @if(isset($product))
        <br>
        {!! showImage($product->image) !!}
    @endif
</div>
<div class="form-group">
    <label for="" class="col-form-label">Category</label>
    @if ($errors->has('category_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('category_id') }}</strong>
        </span>
    @endif
    <select name="category_id" id="category_id" class="form-control">
        @foreach($categories as $category)
            <option value="{{$category->id}}"
                @if(isset($product) && $product->category_id == $category->id)
                    selected
                @endif
            >{{$category->name}}</option>
        @endforeach
    </select>
</div>
