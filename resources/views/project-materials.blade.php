@extends('layouts.template')

@section('content')
@php $modal="material"; $pagetype = "Table"; @endphp

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Materials Used</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Material Checkouts</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

    <h3 class="page-title">Project: <small style="color: green">{{ $project->title }}</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">

                        <!-- <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#materialcheckout">Collect Materials</a> -->


                </div>
                <div class="panel-body">
                    <table class="table responsive-table" id="products" style="width:100% !important">
                        <thead>
                            <tr>
                                <th>Material Name</th>
                                <th>Production Batch No.</th>
                                <th>Quantity</th>
                                <th>Details</th>
                                <th>Checked Out By</th>
                                <th>Approved By</th>
                                <th>Date</th>
                                <th>Location/Facility</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materials as $mtc)

                                <tr>
                                    <td>{{$mtc->material->name}}</td>
                                    <td><b>{{$mtc->task_id}}</b></td>
                                    <td><b>{{$mtc->quantity}}{{$mtc->material->measurement_unit}}</b></td>
                                    <td>{{$mtc->details}}</td>
                                    <td>{{$mtc->checkoutby->name}}</td>
                                    <td>{{$mtc->approvedby->name}}</td>
                                    <td>{{$mtc->dated}}</td>
                                    <td>{{$mtc->business->business_name}}</td>

                                    <td>
                                        <a href="/delete-mtc/{{$mtc->id}}/{{$mtc->material_id}}/{{$mtc->quantity}}" class="label label-danger" onclick="return confirm('Are you sure you want to delete the material checkout record, this will return the {{$mtc->material->name}} with quantity {{$mtc->quantity}} back to stock?')">Delete</a>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <div style="text-align: right">
                        {{$materials->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>

    </div>


   

@endsection
