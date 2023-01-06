
@extends('admin.master')
@section('title', 'Dashbord | Admin')

@section('content')


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add New Products</h1>
@include('admin.errors')
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf




<div class="row">
   <div class="col-md-6">
    <div  class="mb-3">
        <label>English Name</label>
        <input type="text" name="name_en" placeholder="English Name" class="form-control">
    </div>
   </div>
 <div class="col-md-6">
    <div  class="mb-3">
        <label>Arabic Name</label>
        <input  type="text" name="name_ar" placeholder="Arabic Name"
        class="form-control" >

   </div>
 </div>
</div>


  <div class="row">
    <div class="col-md-6">
     <div  class="mb-3">
         <label>English Content</label>
       <textarea name="content_en" placeholder="English Content"
       class="form_control customarea"  ></textarea>
     </div>
    </div>
  <div class="col-md-6">
     <div  class="mb-3">
         <label>Arabic Content</label>
         <textarea name="content_ar" placeholder="Arabic Content"
         class="form_control customarea" ></textarea>
    </div>
   </div>
  </div>
  <div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
  </div>



    <div  class="mb-3">
        <label>Price</label>
        <input  type="number" name="price" placeholder="price"
        class="form-control">
   </div>
   <div  class="mb-3">
    <label>Sale Price</label>
    <input  type="number" name="sale_price" placeholder="sale_price"
    class="form-control">
</div>

<div  class="mb-3">
    <label>Quantity</label>
    <input  type="number" name="quantity" placeholder="Quantity"
    class="form-control">
</div>


    <div  class="mb-3">
        <label>Parent</label>
        <select name="category_id" class="form-control">
            <option value="">--select  parent--</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->trans_name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-outline-primary w-25">Add</button>
    </form>

    @stop
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js"
></script>
<script>
    tinymce.init({
        selector:'.customarea',

    })
</script>
@stop
