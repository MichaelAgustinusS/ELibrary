@extends('layout.template')
@section('title', 'Data Buku - User')

@section('content')
<div class="box">
<div class="box-header">
          <a href="{{ url('books') }}" class="btn bg-navy margin">Refresh</a>
            <div class="box-tools">
            <form action="{{ url('books') }}" method="GET">
              <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                <input type="search" name="search" class="form-control pull-right" placeholder="Search">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div> 
              </div>
            </form>
            </div>
        </div>
<div class="box-body">
        @foreach ($book as $item)
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon"><img src="{{ asset('uploads/books/'.$item->gambar) }}" height="123px" width="90px" alt="Image"></span>

                <div class="info-box-content">
                  <span class="info-box-number">{{ $item->judul }}</span>
                  <span class="info-box-text"><b>Pengarang :</b> {{ $item->pengarang }}</span>
                  <span class="info-box-text"><b>Penerbit  :</b> {{ $item->penerbit }}</span>
                  <a href="https://myanimelist.net/" class="btn bg-navy margin btn-sm">Source</a>
                </div>
            </div>
          </div>
        @endforeach
        </div>  
    </div>
@endsection