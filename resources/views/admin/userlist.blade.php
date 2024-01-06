@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <h1>Kullanıcı Listesi</h1>

        <!-- Kullanıcı Oluşturma Formu -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Yeni Kullanıcı Oluştur
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
                    <th>Adı</th>
                    <th>Email</th>
                    <th>Rolü</th>
                    <th>İşlemler</th>
                    <!-- İhtiyaca göre daha fazla sütun ekleyin veya çıkarın -->
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->userType }}</td>
                        <td>
                            <!-- Düzenleme Butonu -->
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">Düzenle</a>

                            <!-- Silme Butonu -->
                            <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline;">
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

    @foreach($users as $user)
    <!-- Düzenleme Modalı -->
    <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Kullanıcı Düzenle: {{ $user->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Kullanıcı düzenleme formu -->
                    <form method="post" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Adı</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="userType" class="form-label">Rol</label>
                            <select class="form-select" id="userType" name="userType" required>
                                <option value="user" {{ $user->userType == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->userType == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary">Kullanıcıyı Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

    <!-- Kullanıcı Oluşturma Modalı -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Yeni Kullanıcı Oluştur</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Kullanıcı oluşturma formu -->
              <form method="post" action="{{ route('users.store') }}">
                @csrf
      
                <div class="mb-3">
                  <label for="name" class="form-label">Adı</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
      
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Şifre</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                  </div>

                  <div class="mb-3">
                    <label for="userType" class="form-label">Rol</label>
                    <select class="form-select" id="userType" name="userType" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
      
                <!-- İhtiyaca göre daha fazla form alanı ekleyin -->
      
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                  <button type="submit" class="btn btn-primary">Kullanıcı Oluştur</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection