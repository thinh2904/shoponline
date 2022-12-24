@extends('layouts.admin')

@section('title','Users List')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Users
                    <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm text-white float-end">
                        Thêm User
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-border table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Tùy Chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role_as == '0')
                                    <label class="badge btn-primary">User</label>
                                @elseif($user->role_as == '1')
                                    <label class="badge btn-success">Admin</label>
                                @else
                                    <label class="badge btn-danger">None</label>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-sm btn-success">
                                    Chỉnh Sửa
                                </a>
                                <a href="{{ url('admin/users/'.$user->id.'/delete') }}" onclick="return confirm('A Dou Sua Ờ Bao Dát?')" class="btn btn-sm btn-danger">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5"><img src="https://isuckhoe.net/wp-content/uploads/2021/06/isuckhoe_bmngqdr.jpg" style="width: 300px;height:300px;border-radius:0;" alt=""></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection