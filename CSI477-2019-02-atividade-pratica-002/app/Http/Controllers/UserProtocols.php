<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subjects;
use App\Models\Requests;

class UserProtocols extends Controller
{
    public function viewRequests(){

        $requests = Subjects::join('requests','requests.subject_id','=','subjects.id')
            ->where('user_id',auth()->user()->id)
            ->orderBy('date')->get();


        // $requests = Requests::where('user_id',auth()->user()->id)->orderBy('date')->get();
        $subjects = Subjects::orderBy('name')->get();
        // $requests = Requests::orderBy('date')->get();
        return view('protocols',compact('requests','subjects'));
    }

    public function createRequests(){
        $subjects = Subjects::orderBy('name')->get();
        return view("create_request",compact('subjects'));
        
    }

    public function destroy($id){
        $requestObj = Requests::findOrFail($id);
        $requestObj->delete();
        return redirect('/home/protocols');
    }

    public function update(Request $request,$id){

        $newRequest = Requests::findOrFail($id);
        $newRequest->subject_id = $request->protocol_type;
        $newRequest->date = $request->date;
        $newRequest->description = $request->description;
        $newRequest->save();
        return redirect('/home/protocols');
    }

    public function store(){
        // dd($req);
        $request = new Requests;
        $request->subject_id = request('protocol_type');
        $request->date = request('date');
        $request->description = request('description');
        $request->user_id = auth()->user()->id;
        $request->save();
        return redirect('/home/protocols');
    }
}
