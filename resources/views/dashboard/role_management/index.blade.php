@extends('layouts.dashboard_master')

@section('content')

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Role Management Page</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-header">Role Management List</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role Name</th>
                        <th scope="col">Permission Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                     @foreach ($roles as $role)
                         <tr>
                           <th scope="row">{{ $loop->index +1 }}</th>
                           <td>{{ $role->name }}</td>
                           <td>
                            @foreach ($role->getPermissionNames() as $t)
                                <span class="badge bg-warning my-2">{{ $t }}</span>
                            @endforeach
                           </td>
                           <td>
                            <a href="{{ route('role.delete',$role->id) }}" class="btn btn-danger">Delete</a>
                           </td>
                         </tr>
                     @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Role Assign List</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Permission</th>
                      </tr>
                    </thead>
                    <tbody>

                     @foreach ($users as $user)

                         <tr>
                            <th scope="row">{{ $loop->index +1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>
                             @foreach ($user->getRoleNames() as $r)
                                 <span class="badge bg-warning my-2">{{ $r }}</span>
                             @endforeach
                            </td>
                            <td>
                             @foreach ($user->getAllPermissions() as $p)
                                     <span class="badge bg-warning my-2">{{ $p->name }}</span>
                             @endforeach
                            </td>
                          </tr>

                     @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                Permission Assign
            </div>
            <div class="card-body">
                <form action="{{ route('role.permission.store') }}" method="POST">
                    @csrf
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="permission_name" value="">
                <button type="submit" class="btn btn-primary mt-3">Assign Permission</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Role Assign
            </div>
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Role Name</label>
                    <input type="text" class="form-control" name="role_name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Permission Names</label>
                    @foreach ($permissions as $p)
                        <br>
                        <input type="checkbox" name="permission_id[]" value="{{ $p->id }}"> {{ $p->name }}
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary mt-3">Assign Permission</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                User Assign
            </div>
            <div class="card-body">
                <form action="{{ route('assign.role') }}" method="POST">
                    @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User Name</label>
                    <select class="form-control" name="user_id">
                        @foreach ($peoples as $people)
                            <option value="{{ $people->id }}">{{ $people->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Role Names</label>
                    @foreach ($roles as $r)
                        <br>
                        <input type="checkbox" name="role_id[]" value="{{ $r->id }}"> {{ $r->name }}
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary mt-3">Assign Permission</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
