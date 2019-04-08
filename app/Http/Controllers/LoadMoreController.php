<?php

namespace App\Http\Controllers;
use App\Jobs;
use Illuminate\Http\Request;
use DB;

class LoadMoreController extends Controller
{
    public function index()
    {
        return view('loadmore.index');
    }
    public function load_data(Request $request)
    {
        if($request->ajax()){
            if($request->id > 0){
                $data = DB::table('jobs')->where('id', '>', $request->id)
                ->orderBy('id')
                ->limit(5)
                ->get();
            }else{
                $data = DB::table('jobs')
                ->orderBy('id')
                ->limit(5)
                ->get();
            }
            $output = '';
            $last_id = '';

            if($data && !$data->isEmpty()){
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                    <td>'.$row->id.'</td>
                    <td>'.$row->title.'</td>
                    <td>'.$row->slug.'</td>
                    <td><a href="loadmore/'.$row->id.'" class="btn btn-primary">View</a></td>
                    </tr>';
                    $last_id = $row->id;
                }
                $output .= '
                <tr style="background-color:inherit" id="tr_load_more">
                    <th colspan="4">
                        <div id="load_more" style="display:flex">
                            <button style="width:150px;margin:0 auto" type="button" name="load_more_button" class="btn btn-success form-control" value="'.$last_id.'" id="load_more_button">Load More</button>
                        </div>
                    </th>
                </tr>';
            }else{
                $output .= '
                <tr id="tr_load_more">
                    <th colspan="4">
                        <div id="load_more" style="display:flex">
                            <button style="width:150px;margin:0 auto" type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
                        </div>
                    </th>
                </tr>'; 
            }
            echo $output;
        }
    }

    public function show($id)
    {
        $job = Jobs::find($id);
        return view('loadmore.show', compact('job'));
    }
}
