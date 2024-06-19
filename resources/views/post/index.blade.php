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
                                data-bs-target="#modal-add-post">
                                Tambah Postingan
                            </button>
                        </div>
                        <div class="modal fade" id="modal-add-post" tabindex="-1" data-bs-backdrop="static"
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
                                        <form action="{{ route('post.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold">JUDUL</label>
                                                <input type="text"
                                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                                    value="{{ old('title') }}" placeholder="Masukkan Judul Post">
                                                @error('title')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold">KONTEN</label>
                                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5"
                                                    placeholder="Masukkan Konten Post">{{ old('content') }}</textarea>
                                                @error('content')
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
                                <th scope="col">Judul</th>
                                <th scope="col">Content</th>
                                @if (Auth::user()->role == 'admin')
                                    <th scope="col">Username</th>
                                @endif
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr class="">
                                    <td width="30%"> {{ $post->title }} </td>
                                    <td width="50%"> {!! $post->content !!} </td>
                                    @if (Auth::user()->role == 'admin')
                                        <td width="20%">{{ $post->username }}</td>
                                    @endif
                                    <td width="20%" class="d-flex justify-content-evently">
                                        @if (Auth::user()->role == 'author')
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modal-edit-post">
                                                Ubah
                                            </button>
                                            <div class="modal fade" id="modal-edit-post" tabindex="-1"
                                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                                aria-labelledby="modalTitleId" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalTitleId">
                                                                Ubah Postingan
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('post.update', $post->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="font-weight-bold">JUDUL</label>
                                                                    <input type="text" value="{{ $post->title }}"
                                                                        class="form-control @error('title') is-invalid @enderror"
                                                                        name="title" value="{{ old('title') }}"
                                                                        placeholder="Masukkan Judul Post">
                                                                    @error('title')
                                                                        <div class="alert alert-danger mt-2">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="font-weight-bold">KONTEN</label>
                                                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5"
                                                                        placeholder="Masukkan Konten Post">{{ old('content') }}{{ $post->content }}</textarea>
                                                                    @error('content')
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
                                        @endif
                                        <form onsubmit="return confirm('Yakin?')"
                                            action="{{ route('post.destroy', $post->id) }}" method="post">
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
