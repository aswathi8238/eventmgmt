<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;

class Dashcontroller extends Controller
{
    public function index(){

        $items=event::select()->get();

        return view('pages.home',compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string',
        ]);
    
        $data=$request->post();
        $data=['title'=>$data['title'],'description'=>$data['description'],'date'=>$data['date'],'location'=>$data['location']];
        event::create($data);
        return redirect(url('/h'));
        
    }

    public function contact_delete($event_id){
        // echo $id;
        $contact=event::where('event_id', $event_id);
        $status=$contact->delete();
        if($status){
         return redirect(url('/h'));
        }
        return redirect(url('/h'));
     }
 
     public function contact_edit($event_id){
         $data=event::where("event_id","=",$event_id)->first();
         $ar1=['selected_contact'=>$data];
         return view('pages.edit')->with($ar1);
     }

     public function update_contact(Request $req){
        $data=$req->post();
        $data1=['title'=>$data['title'],'date'=>$data['date'],'location'=>$data['location']];
        event::where('event_id',$data['id'])->update($data1);
     // print_r($data);
       return redirect(url('/h'));
    }
 
    }
