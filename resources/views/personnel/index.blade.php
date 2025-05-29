@extends('layouts.template')

@php
    $pagetype = 'Table';
@endphp

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Personnels <span class="text-muted fs-6">({{ $users->total() }})</span></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Personnel</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="card">
  <div class="card-body" style="overflow: auto;">

    <div class="mb-1">
        <div>
            <!-- <button class="btn btn-outline-secondary me-2">Export</button> -->
            <a href="{{ route('new.personnel') }}" class="btn btn-primary" style="float: right;">+ New Personnel</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle table-striped" id="products">
            <thead class="table-light">
                <tr>
                    <!-- <th><input type="checkbox"></th> -->
                    <th class="col-md-3">Name</th>
                    <th>Phone</th>
                    <th>Designation</th>
                    <th>Staff ID</th>
                    <th>Role</th>
                    <th width="20">Status</th>
                    <th width="20">Options</th>
                </tr>
            </thead>
            <tbody>
                @if(!$users->isEmpty())
                @foreach($users as $user)
                <tr>
                    <!-- <td><input type="checkbox" name="select_user[]" value="{{-- $user->id --}}"></td> -->
                    <td class="d-flex align-items-center">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}" class="rounded-circle me-2" width="40" height="40" alt="{{ $user->name }}">
                        <div>
                            <div>{{ $user->name }}</div>
                            <div class="text-muted small">{{ $user->email }}</div>
                        </div>
                    </td>
                    <td>{{ $user->phone_number ?? 'N/A' }}</td>
                    <td>{{ $user->personnel->designation ?? 'N/A' }}
                        <div class="text-muted small">{{ $user->personnel->department ?? 'N/A' }}</div>
                    </td>
                    <td>{{ $user->personnel->staff_id ?? '' }}</td>
                    <td>
                        @foreach($user->getRoleNames() ?? [] as $role)
                            <span class="badge
                                @if($role === 'Admin') bg-danger text-white
                                @elseif($role === 'Manager') bg-warning text-white
                                @elseif($role === 'Finance') bg-info text-white
                                @elseif($role === 'Staff') bg-primary text-white
                                @else bg-secondary text-white
                                @endif
                            ">
                                {{ $role }}</span>
                        @endforeach
                    </td>
                    <td>
                        <span class="badge {{ $user->status === 'Active' ? 'bg-success' : 'bg-danger' }}">
                            {{ $user->status }}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-secondary">...</button>
                    </td>
                </tr>
                 @endforeach
                 @else
                <tr>
                    <td colspan="7" class="text-center text-muted">No employees found.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-between mt-3">
        <div>
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>
 </div>
</div>
@endsection
