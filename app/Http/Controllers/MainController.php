<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public  function main()
    {
        return redirect('dashboard');
    }

    public  function dashboard()
    {
        return redirect('dashboard')->with([
            'applications'=>Application::paginate(2),

        ]);
    }


}
