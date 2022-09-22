@extends('layout')
{{-- @section('judul','Dashboard') --}}
@section('isi')

{{-- Tabel Manajer --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Manajer</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Username</th>
                    <th class="col-2">Email</th>
                    <th class="col-1">Level</th>
                    <th class="col-1">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->where('level', 'manajer') as $item)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td class="user-username">{{ $item->username }}</td>
                    <td class="user-email">{{ $item->email }}</td>
                    <td class="text-capitalize user-level">{{ $item->level }}</td>
                    <td class="d-flex">
                        <button type="button" class="btn btn-info btn-sm tombol-edit" data-toggle="modal"
                            data-target="#modalEditUser" data-id="{{ $item->id }}">
                            <i class="fas fa-pencil-alt"></i>
                        </button>|
                        <form action="/user/delete/{{ $item->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Tabel Staff --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Staff</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Username</th>
                    <th class="col-2">Email</th>
                    <th class="col-1">Level</th>
                    <th class="col-1">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->where('level', 'staff') as $item)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td class="user-username">{{ $item->username }}</td>
                    <td class="user-email">{{ $item->email }}</td>
                    <td class="text-capitalize user-level">{{ $item->level }}</td>
                    <td class="d-flex">
                        <button type="button" class="btn btn-info btn-sm tombol-edit" data-toggle="modal"
                            data-target="#modalEditUser" data-id="{{ $item->id }}">
                            <i class="fas fa-pencil-alt"></i>
                        </button>|
                        <form action="/user/delete/{{ $item->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@if ( Auth::user()->level == 'admin' )
    <button class="btn btn-primary rounded-circle" style="width: 40px; height: 40px; position: absolute; bottom: 0; right: 0; margin-right: 25px; margin-bottom: 75px;" data-toggle="modal" data-target="#modalAddUser">
        <i class="bi bi-plus"></i>
    </button>
@endif



{{-- Modal Edit User --}}
<div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit</h5>
            </div>
            <form action="/user/update/{{ $item->id }}" method="POST" class="form-edit">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control input-user-username">
                    </div>
                    <div class="form-group">
                        <label for="">Emai</label>
                        <input type="email" name="email" class="form-control input-user-email">
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select class="form-control text-capitalize selected" name="level" required>
                            <option class="input-user-level" selected></option>
                            <option value="manajer">Manajer</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal Add User --}}
<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
            </div>
            <form action="/user/store" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="">Emai</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="level" class="form-control" required>
                            <option selected>Pilih..</option>
                            <option value="manajer">Manajer</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection