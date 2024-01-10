@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <h1>Ürün Listesi</h1>

        <!-- Kullanıcı Oluşturma Formu -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Yeni Ürün Oluştur
          </button>

          @if(session('success'))
          <div class="alert alert-success" role="alert">
              {{ session('success') }}
          </div>
      @endif
      
      @if($errors->any())
          <div class="alert alert-danger" role="alert">
              {{ $errors->first('error') }}
          </div>
      @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Başlık</th>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Yıl</th>
                    <th>KM</th>
                    <th>Görsel</th>
                    <th>İşlemler</th>
                    <!-- İhtiyaca göre daha fazla sütun ekleyin veya çıkarın -->
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->model }}</td>
                        <td>{{ $product->year }}</td>
                        <td>{{ $product->kms }}</td>
                        <td>
                            <img src="{{ $product->image }}" alt="Ürün Görseli" style="max-width: 50px; max-height: 70px;">
                        </td>                        <td>
                            <!-- Düzenleme Butonu -->
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editproductModal{{ $product->id }}">Düzenle</a>

                            <!-- Silme Butonu -->
                            <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bu kullanıcıyı silmek istediğinize emin misiniz?')">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach($products as $product)
    <!-- ürün Modalı -->
    <div class="modal fade" id="editproductModal{{ $product->id }}" tabindex="-1" aria-labelledby="editproductModalLabel{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editproductModalLabel{{ $product->id }}">Aracı Düzenle: {{ $product->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('products.update', $product->id) }}">
                        @csrf
                        @method('PUT')
                    
                        <div class="mb-3">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="brand" class="form-label">Marka</label>
                            <select class="form-select" id="brand" name="brand" required>
                                <option value="" selected disabled>Marka Seçiniz</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <select class="form-select" id="model" name="model" required>
                                <option value="" selected disabled>Model Seçiniz</option>
                                @foreach($models as $model)
                                    <option value="{{ $model->name }}">{{ $brand->name }} -> {{ $model->name }}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="mb-3">
                            <label for="year" class="form-label">Yıl</label>
                            <input type="number" class="form-control" id="year" name="year" value="{{ $product->year }}" required>
                        </div>
        
                        <div class="mb-3">
                            <label for="kms" class="form-label">Kilometre</label>
                            <input type="number" class="form-control" id="kms" name="kms" value="{{ $product->kms }}" required>
                        </div>
        
                        <div class="mb-3">
                            <label for="engine" class="form-label">Motor Hacmi</label>
                            <select class="form-select" id="engine" name="engine" required>
                                <option value="1600">1.6</option>
                                <option value="2000">2.0</option>
                            </select>
                        </div>
        
                        <div class="mb-3">
                            <label for="horsePower" class="form-label">Beygir Gücü</label>
                            <input type="number" class="form-control" id="horsePower" name="horsePower" value="{{ $product->horsePower }}" required>
                        </div>

                                
                        <div class="mb-3">
                            <label for="carType" class="form-label">Araç Tipi</label>
                            <select class="form-select" id="carType" name="carType" required>
                                <option value="sedan">Sedan</option>
                                <option value="suv">SUV</option>
                                <option value="cabrio">Cabrio</option>
                                <option value="suv">Hatchback</option>
                            </select>
                        </div>
        
                        <div class="mb-3">
                            <label for="color" class="form-label">Renk</label>
                            <input type="color" class="form-control" id="color" name="color" value="{{ $product->color }}" required>
                        </div>
        
                        <div class="mb-3">
                            <label for="description" class="form-label">Açıklama</label>
                            <input type="textarea" class="form-control" id="description" name="description" value="{{ $product->description }}" required>
                        </div>
        
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Fiyat</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Görsel</label>
                            <input type="text" class="form-control" id="image" name="image" value="{{ $product->image }}" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary">Ürünü Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

    <!-- Ürün Oluşturma Modalı -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Yeni Ürün Oluştur</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Kullanıcı oluşturma formu -->
              <form method="post" action="{{ route('products.store') }}">
                @csrf
      
                <div class="mb-3">
                    <label for="title" class="form-label">Başlık</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Görsel</label>
                    <input type="text" class="form-control" id="image" name="image" required>
                </div>

                <div class="mb-3">
                    <label for="brand" class="form-label">Marka</label>
                    <select class="form-select" id="brand" name="brand" required>
                        <option value="" selected disabled>Marka Seçiniz</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <select class="form-select" id="model" name="model" required>
                        <option value="" selected disabled>Model Seçiniz</option>
                        @foreach($models as $model)
                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="year" class="form-label">Yıl</label>
                    <input type="number" class="form-control" id="year" name="year" required>
                </div>

                <div class="mb-3">
                    <label for="kms" class="form-label">Kilometre</label>
                    <input type="number" class="form-control" id="kms" name="kms" required>
                </div>

                <div class="mb-3">
                    <label for="engine" class="form-label">Motor Hacmi</label>
                    <select class="form-select" id="engine" name="engine" required>
                        <option value="1600">1.6</option>
                        <option value="2000">2.0</option>
                        <option value="elektrik">Electrik</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="carType" class="form-label">Araç Tipi</label>
                    <select class="form-select" id="carType" name="carType" required>
                        <option value="sedan">Sedan</option>
                        <option value="suv">SUV</option>
                        <option value="cabrio">Cabrio</option>
                        <option value="suv">Hatchback</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="horsePower" class="form-label">Beygir Gücü</label>
                    <input type="number" class="form-control" id="horsePower" name="horsePower" required>
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Renk</label>
                    <input type="color" class="form-control" id="color" name="color" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Açıklama</label>
                    <input type="textarea" class="form-control" id="description" name="description" required>
                </div>

                
                <div class="mb-3">
                    <label for="price" class="form-label">Fiyat</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
      
                <!-- İhtiyaca göre daha fazla form alanı ekleyin -->
      
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                  <button type="submit" class="btn btn-primary">Ürünü Oluştur</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection