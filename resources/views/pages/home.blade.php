@extends('layouts.default')
@section('content')

<h3 style="color: blue;"> Event List</h3>
                <!--Table Starts-->
                <table class="table">
  <thead class="thead-light">
    <tr>
      <th style="background-color: blue; color:white;" scope="col">ID</th>
      <th style="background-color: blue; color:white;" scope="col">TITLE</th>
      <th style="background-color: blue; color:white;" scope="col">DATE</th>
      <th style="background-color: blue; color:white;" scope="col">LOCATION</th>
      <th style="background-color: blue; color:white;" scope="col">ACTION</th>
      
      
    </tr>
  </thead>
  <tbody>
  @foreach($items as $item)
    <tr>
        
        <td>{{$item->event_id}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->date}}</td>
        <td>{{$item->location}}</td>
        <td><a href="{{ url('cc/'.$item->event_id)}}" style="background-color: blue; color:white; padding: 10px; text-decoration: none; display: inline-block;">Create Session</a>
        <a href="{{ url('/delete_contact/'.$item->event_id) }}" style="background-color: blue; color:white; padding: 10px; text-decoration: none; display: inline-block;">Delete</a>
<a href="{{ url('/edit_contact/'.$item->event_id) }}" style="background-color: blue; color:white; padding: 10px; text-decoration: none; display: inline-block;">Edit</a>
<a href="{{ url('/sview/'.$item->event_id) }}" style="background-color: blue; color:white; padding: 10px; text-decoration: none; display: inline-block;">view session</a>
</td>
       
</tr>
@endforeach
</tbody>
</table>

    @stop
    @section('con')

    <!-- /resources/views/post/create.blade.php -->
 

 
 @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif
  
 <!-- Create Post Form -->
    <form method="post" action="{{url('/bb')}}">
        <div class="container">
        <div class="row">
          @csrf

            
                <h3 style="color: blue;">Create Event</h3>
                <div class="form-group">
                    <label for="">TITLE</label>
                    <input type="varchar" name="title"   class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">DESCRIPTION</label>
                    <input type="varchar" name="description"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="">DATE</label>
                    <input type="date" name="date"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="">LOCATION</label>
                    <input type="varchar" name="location" class="form-control">
                </div>
                
                <input type="submit" value="save" class="btn btn-primary" style="width: 150px; height: 50px;">
                <input type="button" value="cancel" class="btn btn-primary" style="width: 150px; height: 50px;  background-color:grey">
            </div>
</form>
</div>
</div>
    @stop
