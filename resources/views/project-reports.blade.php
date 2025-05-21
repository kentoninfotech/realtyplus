@extends('layouts.template')

@section('content')
@php $modal="material"; $pagetype = "Table"; @endphp

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3 class="m-0">Project Title : {{$project->title}}, {{$project->location}}</h3>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Project</a></li>
          <li class="breadcrumb-item active">Reports</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

    <!-- <h3 class="page-title">Project: <small style="color: green">{{ $project->title }}</small></h3> -->
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                    <div class="right">
                        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm" style="float: right; margin-top: -30px; margin-right: 10px;"> <i class="fa fa-angle-left"></i> Back</a>
                    </div>
                        


                </div>
                <div class="panel-body">                    
                    <table class="table responsive-table" id="products" style="width:100% !important">
                    <thead>
                        <tr style="color: ">
                            <th>Subject</th>
                            <th>Category</th>
                            <th>Milestone</th>
                            <th>Approval</th>
                            <th>Due Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <td>{{ $report->subject }}</td>
                                <th>{{$report->category ?? ''}}</th>
                                <td>{{$report->milestone->title ?? ''}}</td>                                
                                <td>{{ $report->approval }}</td>
                                <td>{{ $report->end_date }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                    <div style="text-align: right">
                        {{$reports->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>

    </div>


   

@endsection
