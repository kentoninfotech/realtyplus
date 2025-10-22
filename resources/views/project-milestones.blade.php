@extends('layouts.template')
@php
    $pagetype = 'Table';
@endphp
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Project Title : {{$project->title}}, {{$project->location}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Projects</a></li>
                        <li class="breadcrumb-item active">Milestones</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="card">
        <div class="card-body" style="overflow: auto;">
            <div class="right">
                <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm" style="float: right; margin-top: 0px; margin-right: 10px;"> <i class="fa fa-angle-left"></i> Back</a>
            </div>

            <table class="table responsive-table" id="products">
                <thead>
                    <tr>
                        <th width="20">#</th>
                        <th>Title</th>
                        <th>Assigned To</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($milestones as $milestone)
                        <tr @if ($milestone->status == 'Completed') style="background-color: azure !important;" @endif
                            @if ($milestone->status == 'In progress' || $milestone->status == 'Ongoing') style="background-color: #FFF8B0 !important;" @endif
                            @if ($milestone->status == 'Upcoming') style="background-color:rgb(232, 237, 207) !important;" @endif>
                            <td>{{ $milestone->id }}</td>
                            <td>{{ $milestone->title }}</td>
                            <td>{{ $milestone->assignedTo->name }}</td>
                            <td>{{ $milestone->status }}</td>
                            <td>{{ $milestone->start_date }}</td>
                            <td>{{ $milestone->end_date }}</td>
                            <td width="90">



                                <div class="btn-group">
                                    
                                    <a href="/milestone/{{ $milestone->id }}"
                                        class="btn btn-primary btn-sm">View</a>

                                </div>
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
