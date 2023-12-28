@extends('layouts.app')  

@section('content')
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>First Semester (Total : {{ $getRecord->total() }})</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
         </div>

          @include(' _message')

            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Submission List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive" style="overflow:auto; " >

                  <!-- Filter Dropdown -->
                <div class="mb-3 ">
                  <label for="requirementsFilter" class="form-label">Filter by Requirements:</label>
                  <select id="requirementsFilter" class="form-control">
                    <option value="">Requirements</option>
                    <option value="Syllabus">Syllabus</option>
                    <option value="Accomplishment Report">Accomplishment Report</option>
                    <option value="Table of Specifications">Table of Specifications</option>
                    <option value="Test Questionnaire">Test Questionnaire</option>
                    <option value="Grade">Grade</option>
                    <option value="Class Observations">Class Observations</option>
                    <option value="Class Record">Class Record</option>
                  </select>
                </div>
                <table class="table table-bordered table-hover" id="myTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Course Code</th>
                      <th>Requirments</th>
                      <th>Semester</th>
                      <th>Document</th>
                      <th >Submitted By</th>
                      <th >Status</th>
                      <th >Created Date</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @forelse ($getRecord as $value )
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->class_name }}</td>
                      <td>{{ $value->requirments_name }}</td>
                      <td>{{ $value->semester }}</td>
                      <td>
                        @if(!empty($value->getDocument()))
                          <a href="{{ $value->getDocument() }}" class="btn btn-primary" target="_blank">View</a>
                        @endif
                      </td>
                      <td>{{ $value->created_by_name }} {{ $value->created_by_last_name }}</td>
                      <td>{{ $value->status }}</td>
                      <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                      <td style="min-width: 140px;">
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('admin/homework/delete/'.$value->id) }}">Delete</a>
                            <a class="dropdown-item" href="{{ url('admin/homework/accept/'.$value->id) }}">Accept</a>
                            <a class="dropdown-item" href="{{ url('admin/homework/decline/'.$value->id) }}">Decline</a>
                            <a class="dropdown-item"
                            href="{{ url('admin/homework/view-users/'.$value->requirments) }}">View Users
                            Not Submitted</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                     
                   @empty
                     
                   @endforelse
                  </tbody>
                </table>
                <div style="padding: 10px; float:right;">
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        </section> 
  </div>
  <!-- /.content-wrapper -->
    


@endsection