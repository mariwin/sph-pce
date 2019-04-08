<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function index()
    {
        $jobs = DB::table('jobs')->Paginate(5);
        //using pagination method
        return view('job.index', ['jobs' => $jobs]);
    }

    public function show($id)
    {
        $job = Jobs::find($id);
        return view('job.show', compact('job'));
    }
}
