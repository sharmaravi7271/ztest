@extends('adminlte::page')
@section('content')

  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full name</th>
      <th scope="col">Email</th>
      <th scope="col">Member id</th>
       <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
     @foreach ($votes as $key=>$vote)
    <tr>
      <th scope="row">{{++$key}}</th>
      
      <td>{{$vote->full_name}}</td>
      <td>{{$vote->email}}</td>
       <td>{{$vote->member_id}}</td>
       <td>{{$vote->status}}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>
@endsection
