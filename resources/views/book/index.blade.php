@extends('layout.template')
@section('title', 'Data Buku')

@section('content')

<div class="box">
            <div class="box-header">
                <a href="{{ url('add-book') }}" class="btn bg-navy margin">Add Buku</a>
            </div>
            <div class="box-body">
              @if (session('status'))
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('status') }}</h4>
                  </div>
                @endif
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Judul</th>
                  <th>Pengarang</th>
                  <th>Penerbit</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($book as $item)
                  <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->pengarang }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>
                      <img src="{{ asset('uploads/books/'.$item->gambar) }}" width="120px" height="160px" alt="Image">
                    </td>
                    <td><a href="{{ url('edit-book/'.$item->id) }}" class="btn bg-navy margin btn-sm">Edit</a>
                    <a href="{{ url('delete-book/'.$item->id) }}" class="btn bg-navy margin btn-sm">Hapus</a>
                  </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection