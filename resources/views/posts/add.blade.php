@extends('layouts.app')

@section('title', 'Tambah Post')

@section('header-title', 'Tambah Post')

@section('content')


<div class="card border-0 shadow-sm rounded">
    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_barang">Judul</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukan Nama Barang">
                @error('nama_barang')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jumlah">Konten</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Barang" min="0" step="1">
                @error('jumlah')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="keterangan">Gambar</label>
                <input type="file" class="form-control-file" id="keterangan" name="keterangan">
                @error('keterangan')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection


