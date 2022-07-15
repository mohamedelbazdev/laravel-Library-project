@extends('layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>49 Error Page</h1>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning">419</h2>

        <div class="error-content">
          <h3>
            <i class="fas fa-exclamation-triangle text-warning"></i> Oops!
            Page not found.
          </h3>

          <p>
          Sorry,Your session has expired.<a href="../../index.html">return to dashboard</a>
          Pleas refresh and try again.
          </p>


        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
