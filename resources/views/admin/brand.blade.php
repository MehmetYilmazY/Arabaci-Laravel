@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <h1>Marka Listesi</h1>

        <!-- Kullanıcı Oluşturma Formu -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Yeni Marka Oluştur
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
                    <th>Marka</th>
                    <th>İşlemler</th>
                    <!-- İhtiyaca göre daha fazla sütun ekleyin veya çıkarın -->
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            <!-- Düzenleme Butonu -->
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editbrandModal{{ $brand->id }}">Düzenle</a>

                            <!-- Silme Butonu -->
                            <form action="{{ route('brands.destroy', $brand->id) }}" method="post" style="display: inline;">
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

    @foreach($brands as $brand)
    <!-- Marka Modalı -->
    <div class="modal fade" id="editbrandModal{{ $brand->id }}" tabindex="-1" aria-labelledby="editbrandModalLabel{{ $brand->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editbrandModalLabel{{ $brand->id }}">Markayı Düzenle: {{ $brand->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Marka düzenleme formu -->
                    <form method="post" action="{{ route('brands.update', $brand->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Marka</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary">Markayı Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

    <!-- Marka Oluşturma Modalı -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Yeni Marka Oluştur</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Kullanıcı oluşturma formu -->
              <form method="post" action="{{ route('brands.store') }}">
                @csrf
      
                <div class="mb-3">
                    <label for="name" class="form-label">Marka</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                  <button type="submit" class="btn btn-primary">Markayı Oluştur</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection