@extends('layouts.default')
@section('content')

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
    <form method="post" action="{{url('/speaker')}}">
        <div class="container">
        <div class="row">
          @csrf
             
          <input type="hidden" name="event_id" value="{{$selected_contact->event_id}}">
                <h3 style="color: blue;">Create Session</h3>
                <div class="form-group">
                    <label for="">TITLE</label>
                    <input type="varchar" name="title"   class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">speaker</label>
                    <input type="varchar" name="speaker"  class="form-control">
                </div>
               
                <div class="form-group">
                    <label for="">start_time</label>
                    <input type="time" name="start_time"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="">end_time</label>
                    <input type="time" name="end_time" class="form-control">
                </div>
                
                <input type="submit" value="save" class="btn btn-primary" style="width: 150px; height: 50px;">
                <input type="button" value="cancel" class="btn btn-primary" style="width: 150px; height: 50px;  background-color:grey">
            </div>
</form>
</div>
</div>
@stop