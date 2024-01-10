@extends('main.master')

@section('content')
<!-- Section-->
<!-- Detaylar için yeni bölüm -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="text-center mb-5">Araç Detayları</h2>

        @foreach($products as $product)
            <div class="row">
                <div class="col-lg-6">
                    <img class="img-fluid" src="{{ $product->image }}" alt="Product Image" />
                </div>
                <div class="col-lg-6">
                    <h3>{{ $product->title }}</h3>
                    <p><strong>Fiyat:</strong> ${{ $product->price }}</p>
                    <!-- Diğer detayları buraya ekleyin -->
                    <p><a class="btn btn-outline-dark mt-auto" href="{{ route('detail', $product->id) }}">Detayları Gör</a></p>
                </div>
            </div>
            <hr class="my-5">
        @endforeach
    </div>
</section>
@endsection