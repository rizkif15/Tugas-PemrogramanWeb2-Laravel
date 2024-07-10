@extends('layouts.app')

@section('title', 'View Post')

@section('header-title', 'View Post')

@section('content')
    <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
            <h5 class="card-title">{{ $post->nama_barang }}</h5>
            @if($post->keterangan)
                <img src="{{ asset('storage/' . $post->keterangan) }}" class="img-fluid rounded mb-3" alt="Post Image" style="max-width: 100%;">
            @else
                <p class="text-muted">No Image</p>
            @endif
            <p class="card-text">{{ $post->jumlah }}</p>
            <a href="{{ route('posts.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection


