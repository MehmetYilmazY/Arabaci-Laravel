@extends('main.master')

@section('content')
    <!-- Araç Detayları Bölümü -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="text-center mb-5">Araç Detayları</h2>

            @if($products->count() > 0)
                <p>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} results</p>
                @foreach($products as $product)
                    <div class="row">
                        <div class="col-lg-6">
                            <img class="img-fluid" src="{{ $product->image }}" alt="{{ $product->title }}" />
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
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            @else
                <p>No results found.</p>
            @endif
        </div>
    </section>
@endsection