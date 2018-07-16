{!! csrf_field() !!}
<div class="form-group">
    <label for="" class="col-form-label">Name</label>
    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
    <input type="text" class="form-control" name="name" value="{{old('name', isset($category)?$category->name:'')}}">
</div>
<div class="form-group">
    <label for="" class="col-form-label">Description</label>
    @if ($errors->has('description'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
    <input type="text" class="form-control" name="description" value="{{old('description',isset($category)?$category->description:'')}}">
</div>