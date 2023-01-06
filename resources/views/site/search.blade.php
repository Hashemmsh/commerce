@extends('site.master')
@section('title','Shop |'.config('app.name'))
@section('content')
@section('styles')

@stop
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
                    <form action="{{ route('site.search') }}" method="GET">
                        <input type="search" class="form-control" placeholder="Search..." name="s" value="{{request()->s }}">
                        <button class="btn btn-main">Search</button>
                    </form>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="products section">
	<div class="container">
		<div class="row">
            @foreach ($products as $product)
            <div class="col-md-4">
			  @include('site.parts.product_box')
			</div>
            @endforeach

		</div>
    </div>
</section>

@stop
