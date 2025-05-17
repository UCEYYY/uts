@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Daftar Buku</h4>
                    <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
                </div>
                <div class="card-body">
                    @if(count($books) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($books as $book)
                                        <tr>
                                            <td>{{ $book->judul }}</td>
                                            <td>{{ $book->penulis }}</td>
                                            <td>{{ $book->penerbit }}</td>
                                            <td>{{ $book->tahun_terbit }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Detail</a>
                                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">Tidak ada buku yang tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection