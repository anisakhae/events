@extends('layouts.global')

@section('title') Edit Category @endsection

@section('content')

<div class="container kons">
  <div class="col-md-8">
    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif
    <form
      action="{{route('categories.update', ['id' => $category->id])}}"
      enctype="multipart/form-data"
      method="POST"
      class="shadow-sm p-3"
      >

      @csrf

      <input
        type="hidden"
        value="PUT"
        name="_method">

      <label>Category name</label> <br>
      <input
        type="text"
        class="form-control {{$errors->first('name') ? "is-invalid" : ""}}"
        value="{{old('name') ? old('name') : $category->name}}"
        name="name">
        <div class="invalid-feedback">
          {{$errors->first('name')}}
        </div>
      <br><br>

      <label>Cateogry slug</label>
      <input
        type="text"
        class="form-control {{$errors->first('slug') ? "is-invalid" : ""}}"
        value="{{old('slug') ? old('slug') : $category->slug}}"
        name="slug">
      <div class="invalid-feedback">
        {{$errors->first('slug')}}
      </div>
      <br><br>

      <label for="image">Category image</label>
        <br>
        Current image: <br>
        @if($category->image)
        <img src="{{asset('storage/'.$category->image)}}" width="120px" />
        <br>
        @else
        No Image
        @endif
        <br>
        <input id="image" name="image" type="file" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin mengubah image</small>

      <br><br>

      <input type="submit" class="btn btn-primary" value="Update">

    </form>
  </div>
</div>
@endsection
