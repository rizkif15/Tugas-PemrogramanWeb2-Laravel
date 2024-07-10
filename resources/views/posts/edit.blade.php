@extends('layouts.app')

@section('title', 'Edit Post')

@section('header-title', 'Edit Post')

@section('content')
    <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $post->nama_barang) }}">
                    @error('nama_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah', $post->jumlah) }}" min="0" step="1">
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="keterangan">Gambar</label>
                    <input type="file" class="form-control-file @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan">
                    @if($post->keterangan)
                        <img src="{{ asset('storage/' . $post->keterangan) }}" class="rounded mt-2" style="width: 150px" alt="Post Image">
                    @endif
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection


