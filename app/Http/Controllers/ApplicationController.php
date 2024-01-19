<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{




    public function store(Request $request)
    {
        if($request->hasFile('file')) {
            $name = $request-> file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs(
                'files',
                $name,
                'public',

            );
        }
        $validator = $request->validate( [
            'subject' => 'required|max:255',
            'body' => 'required',
           ' file'=>'file|nimes:jpg,png,pdf'
        ]);


   $application = Application::create([
       'user_id'=>auth()->user()->id,
       'subject'=>$request->subject,
       'message'=>$request->message,
       'file_url'=> $path ?? null,

   ]);
   return redirect()->back();
    }
}
