@extends('layouts.template')


@section('title')
Roles
@endsection

@section('breadcrumb')
{{ Breadcrumbs::render('roles') }}
@endsection

@push('css')

<link rel="stylesheet" href="{{asset('asset')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('asset')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('asset')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">



@endpush

@section('content')



<div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Roles</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {{ $dataTable->table() }}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection

@push('js')

<script src="{{asset('asset')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('asset')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('asset')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('asset')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('asset')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('asset')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('asset')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('asset')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('asset')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('asset')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
{{ $dataTable->scripts() }}

@endpush
