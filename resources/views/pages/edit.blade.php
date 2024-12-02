@extends('layouts.default')
@section('content')
  
<form method="post" action="{{url('/update_contact')}}">
<div class="container">
    @csrf
        <div class="row">
               <input type="hidden" name="id" value="{{$selected_contact->event_id}}">
                <h3 class="text-center"> EDit Contact Form</h3>
                <div class="form-group">
                    <label for="">title</label>
                    <input type="varchar" name="title"  class="form-control"   value="{{$selected_contact->title}}" required>
                </div>
                <div class="form-group">
                    <label for=""> Description</label>
                    <input type="varchar" name="description"   class="form-control" value="{{$selected_contact->description}}">
                <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" name="date"   class="form-control" value="{{$selected_contact->date}}">
                </div>  
                <div class="form-group">
                    <label for="">Location</label>
                    <input type="varchar" name="location"  class="form-control" value="{{$selected_contact->location}}">
                </div>
                
                </div>
                <input type="submit" value="Enter" class="btn btn-primary">
            </div>
</form>
</div>
</div>
</form>

@stop