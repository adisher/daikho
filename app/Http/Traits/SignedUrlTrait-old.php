<?php

namespace App\Http\Traits;
use CloudFrontUrlSigner;
use Illuminate\Support\Facades\Storage;
use App\Video;
use Carbon\Carbon;

trait SignedUrlTrait {

    public function convertAwsVideo($videoid)
    {
        // $data = DB::connection('mysql2')
        // ->select('select aws_cdn,date_added,file_name from cb_video where videoid=1963');
        $data = Video::select('aws_cdn', 'date_added', 'file_name', )->where('videoid', $videoid)->get();
        //    return Storage::disk('s3')->temporaryUrl(
        //     $url,
        //     now()->addSeconds(1000)
        // );
        //$url1=Storage::disk('s3')->response('file/video/'.$date.'/'.$file_name.'/'.$file_name.'.m3u8');
        $signed_url = CloudFrontUrlSigner::sign(Storage::disk('s3')
                ->url('file/video/' . date('Y/m/d', strtotime($data[0]->date_added)) . '/' . $data[0]->file_name . '/' . $data[0]->file_name . '.mp4'), Carbon::now()->addHours(2));

        return $signed_url;
    }

    public function convertAwsThumbs($videos,$type)
    {
      if ($type == 'video') {
        foreach ($videos as $key => $video) {
            $tid = '0'.strval($video->aws_thumbs_count - 1);
            $thumbs = array();
            if ( $video->aws_thumbs_count > 9) {
                  $tid = $video->aws_thumbs_count - 1;
            }
           
            $thumbs['original'] = CloudFrontUrlSigner::sign(Storage::disk('s3')
                    ->url('file/thumb/' . date('Y/m/d', strtotime($video->date_added)) . '/' . $video->file_name . '/' . $video->file_name . '-original.00000'.$tid.'.jpeg'), Carbon::now()->addHours(2));

            $video->thumbs = $thumbs;
        }
      }

      if ($type == 'series') {
        foreach ($videos as $key => $video) {
            
            if ($video->aws_cdn == NULL || $video->aws_cdn == '') {
              $thumb = 'https://deikho.com/images/series_thumbs/' . $video->file_directory . '/' . $video->series_id  . '.jpg';

            }else{
              $thumb = CloudFrontUrlSigner::sign(Storage::disk('s3')
              ->url('file/series_thumb/' . date('Y/m/d', strtotime($video->date_added)) . '/' .$video->series_id.'.'.$video->ext_thumb), Carbon::now()->addHours(2));
            }

            
            $video->thumb = $thumb;


        }
      }
       
        // $data = DB::connection('mysql2')
        // ->select('select aws_cdn,date_added,file_name from cb_video where videoid=1963');
        //$data = Video::select('aws_cdn','date_added','file_name')->where('videoid',$videoid)->get();
        //    return Storage::disk('s3')->temporaryUrl(
        //     $url,
        //     now()->addSeconds(1000)
        // );
        //$url1=Storage::disk('s3')->response('file/video/'.$date.'/'.$file_name.'/'.$file_name.'.m3u8');

        return $videos;
    }

}