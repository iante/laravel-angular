@extends('layouts.app')
@section('content')
<style>
    .push-top {
      margin-top: 50px;
    }
  </style>
  <div class="push-top">
    @if(session()->get('message'))
      <div class="alert alert-success">
        {{ session()->get('message') }}  
      </div><br />
    @endif
    <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
       <a href="{{ route('students.create') }}"> <button type="submit"  class="btn btn-block btn-success">Create New Student Record</button></a>
    </div>
    <table class="table">
      <thead>
          <tr class="table-warning">
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Date Of Joining</td>
            <td class="text-center">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($students as $student)
          <tr>
              <td>{{$student->id}}</td>
              <td>{{$student->name}}</td>
              <td>{{$student->email}}</td>
              <td>{{$student->phone}}</td>
              <td>{{$student->date_of_joining}}</td>
              <td class="text-center">
                  <a href="{{ route('students.edit', $student->id)}}" class="btn btn-primary btn-sm">Edit</a>
                  <form action="{{ route('students.destroy', $student->id)}}" method="post" style="display: inline-block">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  <div>
@endsection