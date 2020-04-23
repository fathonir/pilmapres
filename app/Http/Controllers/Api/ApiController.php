<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Berita;
use App\Event;
use App\Video;

class ApiController extends BaseApiController
{
    public function postViewer(Request $request, $id){ 
        $berita = Berita::where('id', $id)->first();
        $count  = $berita->viewers;
        $beritas = Berita::where('id', $id)->first();
    	$countForSave = $count+$request->data;
    	$beritas->viewers = $countForSave;
        $beritas->save();
        return $beritas;
    }

    public function postViewerEvent(Request $request, $id){ 
        $event = Event::where('id', $id)->first();
        $count  = $event->viewers;
        $events = Event::where('id', $id)->first();
    	$countForSave = $count+$request->data;
    	$events->viewers = $countForSave;
        $events->save();
        return $events;
    }

    public function getArticlesLoadmore(Request $request){ 
        $berita = Berita::orderBy('created_at', 'desc')->paginate(8);
        return $berita;
    }

    public function getVideos(Request $request){ 
        $video = Video::orderBy('created_at', 'desc')->paginate(8);
        return $video;
    }
}    