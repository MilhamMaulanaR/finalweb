@extends('layouts.app')

<style>
    table {
        justify-content: center;
        align-content: center;
        text-align: center;
    }
    
    .title {
        padding-top: 50px;
    }
    
    .grid-container {
            display: flex;
            grid-template-columns: repeat(3, 1fr);
            width: 100%;
            max-height: 100vh; /* Tentukan ketinggian maksimum grid yang dapat di-scroll */
            overflow-y: auto; /* Tambahkan overflow-y untuk membuat grid dapat di-scroll */
    }

</style>
@section('content')
<div class="grid-container ">
    <div class="title d-flex align-items-center justify-content-center">
        <a href="/users/create" type="button" class="btn search mb-2" style="background-color: darkgray; width:80%">+ Add</a>
    </div>
    {{-- memeriksa apakah ada sesi (session) dengan kunci 'success' --}}
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <table class="table table-bordered table-striped table-hover">
        <tr style="height: 20px">
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Role</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        @if ($users->count() > 0)
        {{-- lakukan perulangan bila data lebih > 0 --}}
            @foreach ($users as $item)  
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->name }}</td>
                    <td class="align-middle">{{ $item->address }}</td>
                    <td class="align-middle">{{ $item->role }}</td>
                    <td class="align-middle">{{ $item->email }}</td>
                    <td class="align-middle" style="width:20%">{{ $item->password }}</td>
                    <td class="align-middle">
                        <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="btn btn-danger p-0 m-0" onsubmit="return confirm('Delete Product?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>                        
                    </td>
                </tr>
            @endforeach
            {{-- else jika tidak ada data ditemukan --}}
        @else
        <tr>
            <td class="text-center" colspan="5">Items Not Found</td>
        </tr>
        @endif
    </table>
</div>
@endsection