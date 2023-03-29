<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Video;
use App\Series;
use App\VideoCategories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\SignedUrlTrait;

class VideoController extends Controller
{   
    use SignedUrlTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function list()
    {    
        $videoCategories = VideoCategories::select('category_id','category_name')
        ->whereIn('category_name', array('Action', 'Drama', 'Comedy'))
        ->get();

        foreach($videoCategories as $cat){
            if ($cat->category_id == 30) {
                continue;
            }
            $result = Video::select('videoid','title','description','is_free','is_free_mobile','aws_cdn','category','file_name','date_added','duration','default_thumb','file_directory','aws_thumb_path','aws_migrate','mime')
            ->where('category','like','%#'.$cat->category_id.'#%')
            ->where('category','not like','%30%')
            ->where('series_id',0)
            ->where('active','yes')
            //->where('status','Successful')
            ->where('reupload', 1)
            ->orderBy('date_added','desc')
            ->take(10)
            ->get();

            // $result = DB::select("SELECT videoid,title,,'description','is_free','is_free_mobile','aws_cdn','category',CONCAT('".$aws."',`file_directory`,'/',`file_name`,'/',`file_name`,'-original.0000005.jpeg') AS thumb  FROM cb_video WHERE category LIKE '%$cat->category_id%' AND series_id = 0 and status='Successful' order by date_added desc");
            
            // $result = $result->filter(function ($video) {
            //     if(strpos($video->category,'#30#') !== false){
            //         return false;
            //     }else{
            //         return true;
            //     }
                   
            //   });

             $this->convertAwsThumbs($result,'video');
            $cat->movies = array_values(json_decode(json_encode($result), true));
        }
        
        
        return response()->json($videoCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function videoByCat($id)
    {   
        $videoCategories = VideoCategories::select('category_id', 'category_name')
        ->where('category_id', $id)
        ->first();
        if (!$videoCategories == null) {
            $videos = Video::select('videoid','title','description','is_free','is_free_mobile','aws_cdn','category','file_name','date_added','duration','default_thumb','file_directory','aws_thumb_path','aws_migrate','mime')
            ->where('category','like','%#'.$id.'#%')
            ->where('series_id',0)
            ->where('active','yes')
            // ->where('status','Successful')
            ->where('reupload', 1)
            ->orderBy('date_added','desc')
            ->paginate(10);

            $this->convertAwsThumbs($videos,'video');
            //$cat->movies = array_values(json_decode(json_encode($result), true));
            // $result = array(array("category_id"=>$id,"category_name"=>$videoCategories->category_name,$videos));

            $results = $videos->toArray();
            $data = $results['data'];
            unset($results['data']);
            $cid = array('category_id' => $id);
            $cname = array('category_name' => $videoCategories->category_name);
            $movies = array('movies'=>$data);
            $results = $movies+$results;
            $results = $cname+$results;
            $results = $cid+$results;
        } else {
            return response()->json(["error" => 'No Category found']);
        }

         return response()->json($results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function starz()
    {
        $videoCategories = VideoCategories::select('category_id', 'category_name')
        ->whereIn('category_name', array('Action', 'Drama', 'Comedy'))
        ->get();

    foreach ($videoCategories as $cat) {

        $result = Video::select('videoid', 'title', 'description', 'is_free','is_free_mobile', 'aws_cdn', 'category','date_added', 'file_name','duration','default_thumb','file_directory','aws_thumb_path','aws_migrate','mime')
            ->where('category', 'like', '%#' . $cat->category_id . '#%')
            ->where('category', 'like', '%30%')
            ->where('series_id', 0)
            ->where('active', 'yes')
            // ->where('status', 'Successful')
            ->where('reupload', 1)
            ->orderBy('date_added', 'desc')
            ->take(10)
            ->get();

        $this->convertAwsThumbs($result, 'video');
        $cat->movies = array_values(json_decode(json_encode($result), true));
    }

    return response()->json($videoCategories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
      $video = Video::select('videoid', 'title', 'description', 'is_free','is_free_mobile', 'aws_cdn', 'category','date_added', 'file_name','duration','default_thumb','file_directory','aws_thumb_path','aws_migrate','mime')
      ->where('videoid',$id)
      ->where('reupload', 1)
      ->get();
      if ($video->isEmpty()) {
        return response()->json($video);
    }
      $this->convertAwsThumbs($video, 'video');
      return response()->json($video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function selected()
    {
        $video = Video::select('videoid', 'title', 'description','files_thumbs_path', 'is_free','is_free_mobile', 'aws_cdn', 'category','date_added', 'file_name','duration','default_thumb','file_directory','aws_thumb_path','aws_migrate','mime')
        ->whereIn('videoid', array(4221,4234, 4243, 4245,4237))
        ->get();

        $this->convertAwsThumbs($video, 'video');
        return response()->json($video);
    }

    public function mostWatched()
    {
        $series = Series::select('series_id','series_name','series_description','featured','is_free','is_free_mobile','category','poster','file_directory','aws_cdn','date_added','ext_thumb')
        ->whereIn('series_id', array(82,100,118, 108, 89))
        ->get();

        $this->convertAwsThumbs($series,'series');
        return response()->json($series);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
