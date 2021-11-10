@extends('layout.template')
@section('title', 'Edit Buku')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-gray">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Data Buku</h3>
            </div>
                <form action="{{url('update-book/'.$book->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="box-body">
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i>{{ session('status') }}</h4>
                        </div>
                        @endif
                        <div class="form-group mb-3">
                            <label for="">Judul</label>
                            <input type="text" name="judul" value="{{$book->judul}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Pengarang</label>
                            <input type="text" name="pengarang" value="{{$book->pengarang}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Penerbit</label>
                            <input type="text" name="penerbit" value="{{$book->penerbit}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                            <img src="{{ asset('uploads/books/'.$book->gambar) }}" width="120px" height="180px" alt="Image">
                        </div>
                    </div>
              <div class="box-footer">
              <a href="{{ url('books') }}" class="btn btn-danger float-end">Kembali</a>
              <button type="submit" class="btn bg-navy margin">Update</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection