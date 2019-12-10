<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subjects;
use App\Models\Requests;

use Session;

class AdminController extends Controller
{
    public function viewProtocols(){
        $subjects = Subjects::orderBy('name')->get();
        return view('admin',compact('subjects'));
    }

    public function createProtocol(){
        return view("adminProtocolCreate");
    }

    public function destroy($id){
        if(Requests::where('subject_id',$id)->exists()){
            Session::flash('menssagem','Protocolo criado com sucesso.');
            Session::flash('classe-alerta', 'alert-success');
            return redirect('/admin');
        }
        $subjects = Subjects::findOrFail($id);
        $subjects->delete();
        return redirect('/admin');
    }

    public function update(Request $request,$id){

        $newRequest = Subjects::findOrFail($id);
        $newRequest->price = $request->price;
        $newRequest->name = $request->name;
        $newRequest->save();
        return redirect('/admin');
    }

    public function store(Request $request){
        // dd($request);
        $subject = new Subjects;
        $subject->name = $request->name;
        $subject->price = $request->price;
        $subject->save();
        return redirect('/admin');
    }
}   
