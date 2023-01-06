
@extends('admin.master')
@section('title', 'Dashbord | Admin')

@section('content')
@section('styles')
    <style>
        .table th,
        .table td{
            vertical-align: middle;
        }
    </style>
@stop

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Trashed Categories</h1>
 @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
    </div>

@endif
 <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
     @foreach ($products as $product )
     <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->trans_name}}</td>
        <td>
            <a class="btn btn-sm btn-primary" href="{{ route('admin.products.restore', $product->id) }}">
                <i class="fas fa-undo"></i>
            <a onclick="return confirm('Are You Sure')" class="btn btn-sm btn-danger " href="{{ route('admin.products.forcedelete', $product->id) }}">
                    <i class="fas fa-times"></i>
            </a>
        </td>
     </tr>
     @endforeach
 </table>
@stop
