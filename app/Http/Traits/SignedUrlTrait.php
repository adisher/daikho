<?php

namespace App\Http\Traits;

use App\Config;
use App\Video;
use Carbon\Carbon;
use CloudFrontUrlSigner;
use Illuminate\Support\Facades\Storage;

trait SignedUrlTrait
{
    public function getconfigs()
    {
        $cbConfigsResults = Config::select('name', 'value')->get();
        $cbConfigs = array();
        if ($cbConfigsResults) {
            foreach ($cbConfigsResults as $key => $config) {
                $cbConfigs[$config->name] = $config->value;
            }
        }
        return $cbConfigs;
    }
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
                ->url('file/video/' . date('Y/m/d', strtotime($data[0]->date_added)) . '/' . $data[0]->file_name . '/' . $data[0]->file_name . '.m3u8'), Carbon::now()->addHours(2));

        return $signed_url;
    }

    public function convertAwsThumbs($videos, $type)
    {
      $configs = $this->getconfigs();

        $base_url = $configs['baseurl'];
        $base_dir = $configs['basedir'];
        $files_dir = $base_dir . '/files';
        // $videos_dir = $files_dir . '/videos';
        $thumbs_dir = $files_dir . '/thumbs';
        $files_url = $base_url . '/files';
        // $videos_url = $files_url . '/videos';
        $thumbs_url = $files_url . '/thumbs';
        // $series_thumbs_dir = $base_dir . '/images/series_thumbs/';
        // $series_thumbs_url = $base_url . '/images/series_thumbs';

        if ($type == 'video') {
            foreach ($videos as $key => $video) {

                if (isset($video->file_name) && $video->aws_thumb_path == "") {

                    if ($video->files_thumbs_path) {
                        $thumb_url = $video->files_thumbs_path . '/' . $video->file_directory . '/' . $$video->file_name . '-' . $video->default_thumb . '.jpg';
                    } else {
                        if (file_exists($thumbs_dir . '/' . $video->file_directory . '/' . $video->file_name . '-original-' . $video->default_thumb . '.jpg')) {
                            $thumb_url = $thumbs_url . '/' . $video->file_directory . '/' . $video->file_name . '-original-' . $video->default_thumb . '.jpg';
                        }

                    }

                } elseif (isset($video->file_name) && $video->aws_thumb_path != "") {

                    if ($video->aws_migrate == 'yes') {
                        $num = "-" . $video->default_thumb . ".jpg";
                        $thumb_url = $video->aws_thumb_path . "/files/thumbs/" . $video->file_directory . "/" . $video->file_name . "-original" . $num;
                    } else {
                        $num = "." . sprintf('%07d', $video->default_thumb) . ".jpeg";
                        $thumb_url = $video->aws_thumb_path . $video->file_name . "-original" . $num;
                    }

                }
                // $tid = '0' . strval($video->aws_thumbs_count - 1);
                $thumbs = array();
                // if ($video->aws_thumbs_count > 9) {
                //     $tid = $video->aws_thumbs_count - 1;
                // }
                $thumbs['original'] = CloudFrontUrlSigner::sign(Storage::disk('s3')
                        ->url(substr($thumb_url,strpos($thumb_url, ".net/")+5)), Carbon::now()->addHours(2));

                $video->thumbs = $thumbs;

            }

        }

        if ($type == 'series') {
            foreach ($videos as $key => $video) {

                if ($video->aws_cdn == null || $video->aws_cdn == '') {
                    $thumb = 'https://deikho.com/images/series_thumbs/' . $video->file_directory . '/' . $video->series_id . '.jpg';

                } else {
                    $thumb = CloudFrontUrlSigner::sign(Storage::disk('s3')
                            ->url('file/series_thumb/' . date('Y/m/d', strtotime($video->date_added)) . '/' . $video->series_id . '.' . $video->ext_thumb), Carbon::now()->addHours(2));
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
