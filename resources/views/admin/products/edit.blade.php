
@extends('admin.master')
@section('title', 'Edite Product | Admin')

@section('content')


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edite Product</h1>
@include('admin.errors')
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

  <div class="row">
   <div class="col-md-6">
    <div  class="mb-3">
        <label>English Name</label>
        <input type="text" name="name_en"
        placeholder="English Name"
         class="form-control" value="{{ $product->name_en }}"/>
    </div>
   </div>
 <div class="col-md-6">
    <div  class="mb-3">
        <label>Arabic Name</label>
        <input id="name" type="text" name="name_ar" placeholder="Arabic Name"
        class="form-control" value="{{ $product->name_ar }}">

   </div>
 </div>

  </div>

  <div class="row">
    <div class="col-md-6">
     <div  class="mb-3">
         <label>English Content</label>
       <textarea name="content_en" placeholder="English Content"
       class="form_control customarea">{{ $product->content_en }}</textarea>
     </div>
    </div>
  <div class="col-md-6">
     <div  class="mb-3">
         <label>Arabic Content</label>
         <textarea name="content_ar" placeholder="Arabic Content"
         class="form_control customarea">{{ $product->content_ar }}</textarea>

    </div>
 </div>

   </div>
   <div  class="mb-3">
    <label>Image</label>
    <input type="file" name="image"

     class="form-control">
     <td><img width="70" src="{{ asset('uploads/products/'.$product->image) }}" alt=""></td>

</div>
    <div  class="mb-3">
        <label>Price</label>
        <input  type="number" name="price" placeholder="price"
        class="form-control" value="{{ $product->price}}">
   </div>
   <div  class="mb-3">
    <label>Sale Price</label>
    <input  type="number" name="sale_price" placeholder="sale_price"
    class="form-control" value="{{ $product->sale_price }}">
</div>

<div  class="mb-3">
    <label>Quantity</label>
    <input  type="number" name="quantity" placeholder="Quantity"
    class="form-control" value="{{ $product->quantity }}">
</div>

    <div  class="mb-3">
        <label>category</label>
        <select name="category_id" class="form-control">
            <option value="">--select  parent--</option>
            @foreach ($categories as $item)
            <option {{ $product->category_id == $item->id ? 'selected':''}}
                value="{{ $item->id }}">{{ $item->trans_name }}</option>

            @endforeach
        </select>
    </div>
    <button class="btn btn-outline-info w-25">Update</button>
    </form>

@stop

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js"
></script>
<script>
    tinymce.init({
        selector:'.customarea',
        plugins:['code']

    })
</script>
@stop
