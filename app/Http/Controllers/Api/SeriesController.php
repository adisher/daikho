<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Series;
use App\SeriesSeason;
use App\Video;
use App\SeriesCategories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\SignedUrlTrait;

class SeriesController extends Controller
{
    use SignedUrlTrait;

    public function list(){

        $series_categories = SeriesCategories::select('category_id','category_name')
        ->whereIn('category_name', array('Web Series', 'Comedy', 'Shows'))
        ->get();

        foreach ($series_categories as $key => $cat) {

            if ($cat->category_id == 10) {
                continue;
            }

            $series = Series::select('series_id','series_name','series_description','featured','is_free','is_free_mobile','category','poster','file_directory','aws_cdn','date_added','ext_thumb')
            ->where('category','like', '%#'.$cat->category_id.'#%')
            ->where('category','not like', '%#10#%')
            ->where('active','yes') 
            ->orderBy('date_added','desc')
            ->get();

            $this->convertAwsThumbs($series,'series');

            $cat->series = array_values(json_decode(json_encode($series), true));
        }

        return response()->json($series_categories);

    }

    public function detail($id){

        // $series = Series::select('series_id','series_name','series_description','featured','is_free','is_free_mobile','category','poster','file_directory','aws_cdn','date_added','ext_thumb')
        // ->with(['seasons.episodes'])
        // ->where('series_id',$id)
        // ->get();
        $series =  Series::select('series_id','series_name','series_description','featured','is_free','is_free_mobile','category','poster','file_directory','aws_cdn','date_added','ext_thumb')
        ->with(['seasons.episodes' => function($q){
            $q->where('active', 'yes')
            // ->where('status', 'Successful')
            ->orderBy('sequence');
        }])
        ->where('series_id',$id)
        ->where('active','yes') 
        ->orderBy('date_added','desc')
        ->get();
        if ($series->isEmpty()) {
            return response()->json($series);
        }
        $this->convertAwsThumbs($series,'series');
        
        foreach ($series[0]->seasons as $key => $season) {
            $this->convertAwsThumbs($season->episodes,'video');
        }

        return response()->json($series);
    }


    public function seriesByCat($id){ 
        $series_category = SeriesCategories::select('category_id','category_name')
        ->where('category_id',$id)
        ->first();
        if ($series_category != null) {
        
            $series = Series::select('series_id','series_name','series_description','featured','is_free','is_free_mobile','category','poster','file_directory','aws_cdn','date_added','ext_thumb')
            ->where('category','like', '%#'.$id.'#%')
            ->where('active','yes') 
            ->orderBy('date_added','desc')
            ->paginate(10);

            $this->convertAwsThumbs($series,'series');
       
            //$cat->series = array_values(json_decode(json_encode($series), true));

            $results = $series->toArray();
            $data = $results['data'];
            unset($results['data']);
            $cid = array('category_id' => $id);
            $cname = array('category_name' => $series_category->category_name);
            $series = array('series'=>$data);
            $results = $series+$results;
            $results = $cname+$results;
            $results = $cid+$results;
        }else{
            return response()->json(["error"=>"No Category Found"]);
        }

        return response()->json($results);
    }
    public function starz(){
        $series_categories = SeriesCategories::select('category_id','category_name')
        ->whereIn('category_name', array('Web Series', 'Comedy', 'Shows'))
        ->get();

        foreach ($series_categories as $key => $cat) {

            $series = Series::select('series_id','series_name','series_description','featured','is_free','is_free_mobile','category','poster','file_directory','aws_cdn','date_added','ext_thumb')
            ->where('category','like', '%#'.$cat->category_id.'#%')
            ->where('category','like', '%#10#%')
            ->where('active','yes') 
            ->orderBy('date_added','desc')
            ->get();

            $this->convertAwsThumbs($series,'series');

            $cat->series = array_values(json_decode(json_encode($series), true));
        }

        return response()->json($series_categories);

    }


}


