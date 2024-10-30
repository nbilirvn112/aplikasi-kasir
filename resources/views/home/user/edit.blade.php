@extends('layouts.master');
@section('title', 'User');
@section('content');
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Tambah Edit Data user</h3>
                            <a class="btn btn-primary" href="/user">Kembali</a>
                            </div>  
                            <div class="card-body">
                            <form action="/user/{{ $user->id }}/update" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Name user</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $user->id }}"
                                        name="name"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">email</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        value="{{ $user->email }}"
                                        name="email"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        value="{{ $user->password }}"
                                        name="password"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>

                                <button class="btn btn-primary" type="submit">update</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection