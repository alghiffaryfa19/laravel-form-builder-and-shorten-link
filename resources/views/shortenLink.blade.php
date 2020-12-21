@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shorten Link Fiksioner Indonesia</h1>
   
    <div class="card">
      <div class="card-header">
        <form method="POST" action="{{ route('generate.shorten.link.post') }}">
            @csrf
                <div class="form-row">
                  <div class="col">
                    <input type="text" name="link" class="form-control" placeholder="Link">
                  </div>
                  <div class="col">
                    <input type="text" name="code" class="form-control" placeholder="Alias">
                  </div>
                </div>
                <br>
                <button class="btn btn-success" type="submit">Generate Shorten Link</button>
        </form>
      </div>
      <div class="card-body">
   
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
   
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Short Link</th>
                        <th>Link</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shortLinks as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a><input type="hidden" id="myInput" value="{{ route('shorten.link', $row->code) }}"></td>
                            <td>{{ $row->link }}</td>
                            <td>
                              <a type="button" class="btn btn-danger btn-sm" href="{{ route('shortlink.hapus', $row->id) }}">Hapus</a> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
   
</div>
@endsection