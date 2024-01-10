<!-- product_details.blade.php -->

@extends('main.master')

@section('content')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img class="card-img-top mb-5 mb-md-0" src="{{ $product->image }}" alt="{{ $product->title }}" />
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $product->title }}</h1>
                    <div class="fs-5 mb-5">
                    <span class="text-decoration">₺{{ $product->price }}</span>
                    <br>
                    <p class="lead">{{ $product->description }}</p>
                    <p><strong>Marka:</strong> {{ $product->brand }}</p>
                    <p><strong>Model:</strong> {{ $product->model }}</p>
                    <p><strong>Yıl:</strong> {{ $product->year }}</p>
                    <p><strong>Kilometre:</strong> {{ $product->kms }}</p>
                    <p><strong>Motor:</strong> {{ $product->engine }}</p>
                    <p><strong>Araç Tipi:</strong> {{ $product->carType }}</p>
                    <p><strong>Beygir Gücü:</strong> {{ $product->horsePower }}</p>
                    <p><strong>Renk:</strong> <div class="color-box" style="background-color: {{ $product->color }}; width: 120px; height: 30px;"></div> </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Tavsiye Edilen Araçlar</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ $relatedProduct->image }}" alt="{{ $relatedProduct->title }}" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $relatedProduct->title }}</h5>
                                    <!-- Product price-->
                                    <span class="text-decoration">₺{{ $product->price }}</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="{{ route('detail', $relatedProduct->id) }}">View details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
