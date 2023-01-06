
@extends('admin.master')
@section('title', 'Edite Category | Admin')

@section('content')


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edite Category</h1>
@include('admin.errors')
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

  <div class="row">
   <div class="col-md-6">
    <div  class="mb-3">
        <label>English Name</label>
        <input type="text" name="name_en"
        placeholder="English Name"
         class="form-control" value="{{ $category->name_en }}" />
    </div>
   </div>
 <div class="col-md-6">
    <div  class="mb-3">
        <label>Arabic Name</label>
        <input id="name" type="text" name="name_ar" placeholder="Arabic Name"
        class="form-control" value="{{ $category->name_ar }}">

   </div>
 </div>

  </div>
    <div  class="mb-3">
        <label>Image</label>
        <input type="file" name="image"

         class="form-control">
         <td><img width="70" src="{{ asset('uploads/categories/'.$category->image) }}" alt=""></td>

    </div>
    <div  class="mb-3">
        <label>Parent</label>
        <select name="parent_id" class="form-control">
            <option value="">--select  parent--</option>
            @foreach ($categories as $item)
            <option {{ $category->parent_id == $item->id ? 'selected':''}}
                value="{{ $item->id }}">{{ $item->trans_name }}</option>

            @endforeach
        </select>
    </div>
    <button class="btn btn-outline-info w-25">Update</button>
    </form>

@stop
