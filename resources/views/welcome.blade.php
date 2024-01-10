@extends('main.master')

@section('content')
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5">Türkiye'nin bir numaralı arabacısı: ARABACI!</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-window m-auto text-primary"></i></div>
                            <h3>Rakipsiz Fiyatlar</h3>
                            <p class="lead mb-0">Başka yerde daha ucuzunu bulun, bedavaya* götürün!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-layers m-auto text-primary"></i></div>
                            <h3>Mükemmel Kondisyon</h3>
                            <p class="lead mb-0">Sadece Mükemmel* Kondisyonlu Araç Garantisi!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto text-primary"></i></div>
                            <h3>Yüzlerce Model</h3>
                            <p class="lead mb-0">Yüzlerce Model Arasında Kaybolun!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Showcases-->
            <!-- Section-->
            <section class="py-5">
                <div class="container px-4 px-lg-5 mt-5">
                    <h2 class="text-center mb-5">Önerdiğimiz Araçlar</h2>

                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        @foreach($products as $product)
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" src="{{ $product->image }}" alt="Product Image" />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{ $product->title }}</h5>
                                            <!-- Product price-->
                                            ${{ $product->price }}
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-outline-dark mt-auto" href="{{ route('products.show', $product->id) }}">Detayları Gör</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

        <!-- Testimonials-->
        <section class="testimonials text-center bg-light">
            <div class="container">
                <h2 class="mb-5">İnsanlar Hakkımızda Ne Düşünüyor...</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="{{asset('home/assets/img/testimonials-1.jpg')}}" alt="..." />
                            <h5>Margaret E.</h5>
                            <p class="font-weight-light mb-0">"Mükemmelsiniz! Arabam pert çıktı.🙌"</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="{{asset('home/assets/img/testimonials-2.jpg')}}" alt="..." />
                            <h5>Mehmet Y.</h5>
                            <p class="font-weight-light mb-0">"Sonunda aldığım 80 taklalı Peugeot 106 GTI ile otobana çıkabileceğim. 😎😎🎶"</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="{{asset('home/assets/img/testimonials-3.jpg')}}" alt="..." />
                            <h5>Sarah W.</h5>
                            <p class="font-weight-light mb-0">"Süper! Artık kocamın arabasını kaçırmak zorunda değilim. 💋"</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to Action-->
        <section class="call-to-action text-white text-center" id="signup">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <h2 class="mb-4">Türkiye'de bir numarayız!</h2>
                    </div>
                </div>
            </div>
        </section>
@endsection