@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <h1>Model Listesi</h1>

        <!-- Kullanıcı Oluşturma Formu -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Yeni Model Oluştur
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
                    <th>Model</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach($models as $model)
                    <tr>
                        <td>{{ $model->id }}</td>
                        <td>{{ $model->brand }}</td>
                        <td>{{ $model->name }}</td>

                        <td>
                            <!-- Düzenleme Butonu -->
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editmodelModal{{ $model->id }}">Düzenle</a>

                            <!-- Silme Butonu -->
                            <form action="{{ route('models.destroy', $model->id) }}" method="post" style="display: inline;">
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

    @foreach($models as $model)
    <!-- Model Modalı -->
    <div class="modal fade" id="editmodelModal{{ $model->id }}" tabindex="-1" aria-labelledby="editmodelModalLabel{{ $model->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmodelModalLabel{{ $model->id }}">Modelyı Düzenle: {{ $model->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Model düzenleme formu -->
                    <form method="post" action="{{ route('models.update', $model->id) }}">
                        @csrf
                        @method('PUT')

                                        <div class="mb-3">
                    <label for="brand" class="form-label">Marka</label>
                    <select class="form-select" id="brand" name="brand" required>
                        <option value="" selected disabled>Marka Seçiniz</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Model</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $model->name }}" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary">Modelyı Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

    <!-- Model Oluşturma Modalı -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Yeni Model Oluştur</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Kullanıcı oluşturma formu -->
              <form method="post" action="{{ route('models.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="brand" class="form-label">Marka</label>
                    <select class="form-select" id="brand" name="brand" required>
                        <option value="" selected disabled>Marka Seçiniz</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="mb-3">
                    <label for="name" class="form-label">Model</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Markayı Oluştur</button>
                </div>
            </form>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection  