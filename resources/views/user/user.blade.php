@extends('app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center">Selamat Datang Di Blog {{ Auth::user()->name }}</h3>
                    <div class="row">
                        <div class="text-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal-add-user">
                                Tambah User
                            </button>
                        </div>
                        <div class="modal fade" id="modal-add-user" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Tambah
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('user.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold">USERNAME</label>
                                                <input type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    name="username" value="{{ old('username') }}"
                                                    placeholder="Masukkan Judul Post">
                                                @error('username')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <label class="font-weight-bold">NAME</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" placeholder="Masukkan Judul Post">
                                                @error('name')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <label class="font-weight-bold">PASSWORD</label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" value="{{ old('password') }}"
                                                    placeholder="Masukkan Judul Post">
                                                @error('password')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Tutup
                                                </button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Name</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr class="">
                                    <td width="30%"> {{ $user->username }} </td>
                                    <td width="50%"> {{ $user->name }} </td>
                                    <td width="20%" class="d-flex justify-content-evently">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-user">
                                            Ubah
                                        </button>
                                        <div class="modal fade" id="modal-edit-user" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                            aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">
                                                            Ubah User
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('user.update', $user->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">USERNAME</label>
                                                                <input value="{{ $user->username }}" type="text"
                                                                    class="form-control @error('username') is-invalid @enderror"
                                                                    name="username" value="{{ old('username') }}"
                                                                    placeholder="Masukkan Judul Post">
                                                                @error('username')
                                                                    <div class="alert alert-danger mt-2">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                                <label class="font-weight-bold">NAME</label>
                                                                <input value="{{ $user->name }}" type="text"
                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                    name="name" value="{{ old('name') }}"
                                                                    placeholder="Masukkan Judul Post">
                                                                @error('name')
                                                                    <div class="alert alert-danger mt-2">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                                <label class="font-weight-bold">PASSWORD</label>
                                                                <input type="password"
                                                                    class="form-control @error('password') is-invalid @enderror"
                                                                    name="password" value="{{ old('password') }}"
                                                                    placeholder="Masukkan Judul Post">
                                                                @error('password')
                                                                    <div class="alert alert-danger mt-2">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    Tutup
                                                                </button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form onsubmit="return confirm('Yakin?')"
                                            action="{{ route('user.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger text-center">
                                    Data Kosong
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
