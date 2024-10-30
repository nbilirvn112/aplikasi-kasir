@extends('layouts.master');
@section('title', 'User');
@section('content');
<div class="content-wrapper">
    <section class="content">
        <div class="cointaner-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                             <h3>Halaman Data User</h3>
                             <a class="btn btn-primary" href="/user/tambah">Tambah</a>
                             </div>
                            <div class="card-body">
                                <div class="table-resposive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">NO .</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td><a class="btn btn-warning "href="/user/{{ $user->id }}/show">Edit</a>
                                                    <a class="btn btn-danger "href="/user/{{ $user->id }}/delete" 
                                                        oneclick="return confirm('yakin mau hapus?')">delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection