@extends('layouts.app')
@section('breadcrumbs')
{{ Breadcrumbs::render('home') }}
@endsection
@section('content')
<div class="card">
  <div class="card-header">Dashboard</div>
  <div class="card-body">
    You are logged in!
  </div>
</div>
@endsection
