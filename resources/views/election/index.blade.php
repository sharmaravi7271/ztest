@extends('adminlte::page')
@section('content')

  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Total Votes</th>
    </tr>
  </thead>
  <tbody>
     @foreach ($candidates as $key=>$candidate)
    <tr>
      <th scope="row">{{++$key}}</th>
      <td> <a href="{{route('cantidates.votes',[$candidate->id])}}"><img class="direct-chat-img" src="{{Storage::url($candidate->image->url)}}" alt="message user image"></a></td>
      <td>{{$candidate->name}}</td>
      <td>{{$candidate->email}}</td>
       <td>{{$candidate->votes->count()}}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>
@endsection
