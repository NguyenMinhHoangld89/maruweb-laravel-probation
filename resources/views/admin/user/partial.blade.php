{!! csrf_field() !!}
<div class="form-group">
    <label for="" class="col-form-label">Name</label>
    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
    <input type="text" class="form-control" name="name" value="{{old('name', isset($user)?$user->name:'')}}">
</div>
<div class="form-group">
    <label for="" class="col-form-label">Email</label>
    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
    <input type="text" class="form-control" name="email" value="{{old('email',isset($user)?$user->email:'')}}">
</div>
<div class="form-group">
    <label for="" class="col-form-label">Password</label>
    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
    <input type="text" class="form-control" name="password">
</div>
<div class="form-group">
    <label for="" class="col-form-label">Birthday</label>
    @if ($errors->has('birthday'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('birthday') }}</strong>
        </span>
    @endif
    <input type="date" class="form-control" name="birthday" id="datepicker" value="{{old('birthday',isset($user)?$user->birthday:'')}}">
</div>
<div class="form-group">
    <label for="" class="col-form-label">Avatar</label>
    @if ($errors->has('image'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
    @endif
    <input type="file" class="form-control" name="image">
    @if(isset($user))
        <br>
        {!! showImage($user->image) !!}
    @endif
</div>
