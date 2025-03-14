<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class VideoController extends Controller
{
    //front controllers
    public function home()
    {
        $videos = Video::all();

        return view('front.newHome', compact('videos'));

    }

    public function detail($id)
    {
        $video = Video::find($id);

        return view('front.newDetail', compact('video'));
    }

    /*    public function show($video,$image){
            $videos=Video::all();
            if($video == 'ildenile.mp4'){
                $title = "İlden İle";
                $text = "İlden İle programında Doğu Anadolu illerimizden Elazığ'ın tarihi geçmişinden bahsedilmiştir.";
            }

            if($video == 'harputtansesler.mp4'){
                $title = "Harputtan Sesler";
                $text = "İlden İle programında Doğu Anadolu illerimizden Elazığ ilçesi Harput'un yöresel zenginliklerinden bahsedilmiştir.";
            }

            if($video == 'kanal23-1994.mp4'){
                $title = "Kanal 23 1994";
                $text = "1994 yılında Kanal 23 kanalında Elazığ yöresine ait müzik dinletisi";

            }

            if($video == 'kanal23canlıkanal.mp4'){
                $title = "Kanal 23 E-canlı";
                $text = "Kanal 23 Elazığ klarnet gösterisi";
            }

            return view('front.detail',compact('videos'));
        }*/

    public function lastAdded()
    {
        $videos=Video::orderBy('created_at', 'DESC')->get()->take(9);


        return view('front.lastadded', compact('videos'));

    }

    public function mostViewed()
    {
        $videos = Video::all();

        return view('front.mostviewed', compact('videos'));

    }

    //panel controllers
    public function create(Request $request)
    {
        $request->validate(
            [
                "order" => "required",
                "image" => "required",
                "title" => "string|max:255|required",
                "description" => "string|max:255|required",
                "category_id" => "nullable",

            ],
            [
                'order.required' => 'Video Sırası boş bırakılamaz.',
                'image.required' => 'Fotoğraf alanı boş bırakılamaz.',
                'title.required' => 'Video Başlığı boş bırakılamaz.',
                'description.required' => 'Açıklama boş bırakılamaz.',
                'description.string' => 'Açıklama alanında uygun olmayan karakter görüldü.',
                'title.string' => 'Başlık alanında uygun olmayan karakter görüldü.',

            ]

        );
        $video = new Video();
        $video->user_id = Auth::user()->id;
        $video->order = Helper::scriptStripper($request->order);
        $video->title = Helper::scriptStripper($request->title);
        $video->video_url = Helper::scriptStripper($request->video_url);

        $video->description = Helper::scriptStripper($request->description);
        if ($request->category_id != null) {
            $video->category_id = Helper::scriptStripper($request->category_id);

        } else {
            $video->category_id = 36;
        }


        if (isset($request->image)) {
            if ($request->image != null) {
                $imageControl = Helper::isImage($request->image);
                if ($imageControl['status'] != 'ok') {
                    return abort(500);
                } else {
                    $img_name = $request->video_url . '.' . $request->image->getClientOriginalExtension();
                    $img_path = '/images/';
                    $request->image->move(public_path($img_path), $img_name);
                    $video->image = $img_path . $img_name;
                    $video->save();

                }
            }
            /*if (isset($request->video_url)){
                if ($request->video_url != null){
                    $videoControl = Helper::isVideo($request->video_url);
                    if ($videoControl['status'] != 'ok'){
                        return abort(500);
                    }else{
                        $vid_name = $request->video_url.'.'.$request->video_url->getClientOriginalExtension();
                        $img_path = '/videos/';
                        $request->video_url ->move(public_path($img_path),$vid_name);
                        $video->video_url = $img_path.$vid_name;
                        $video->save();

                    }
                }
        }*/
            $video->save();

            return response()->json(['Success' => 'success']);


        }
    }

    public function list()
    {
        $category = Category::all();
        $videos = Video::all();
        return view('panel.videos.list', compact('category', 'videos'));
    }

    function fetch()
    {
        $videos = Video::all();
        return DataTables::of($videos)
            ->addColumn('update', function ($data) {
                return "<button onclick='updateVideo(" . $data->id . ")' class='btn btn-warning'>Güncelle</button>";
            })->addColumn('delete', function ($data) {
                return "<button onclick='deleteVideo(" . $data->id . ")' class='btn btn-danger'>Sil</button>";
            })->editColumn('category_id', function ($data) {
                if (Category::where('id', $data->category_id)->first()) {
                    return Category::where('id', $data->category_id)->first()->name;
                } else {
                    return 'Kategori Kaydı Bulunamadı';
                }
            })
            ->rawColumns(['update', 'delete', 'category'])
            ->make(true);
    }

    function delete(Request $request)
    {
        $request->validate([
            'id' => 'distinct'
        ]);
        Video::find($request->id)->delete();
        return response()->json(['Success' => 'success']);
    }

    function get(Request $request)
    {
        $videos = Video::where('id', $request->id)->first();
        return response()->json(['title' => $videos->title, 'video_url' => $videos->video_url, 'image' => $videos->image, 'order' => $videos->order, 'description' => $videos->description, 'category_id' => $videos->category_id,]);

    }

    function update(Request $request)
    {
        $request->validate([
            "order" => "required",
            "image" => "nullable",
            "title" => "string|max:255|required",
            "video_url" => "string|max:255|required",
            "description" => "string|max:255|required",
            "category_id" => "nullable",

        ]);
        if (Video::find($request->updateId)->image == null) {
            $request->validate([

                "image" => "required",

            ]);
        }

        /*if (isset($request->video_url)){
            if ($request->video_url != null){
                $videoControl = Helper::isVideo($request->video_url);
                if ($videoControl['status'] != 'ok'){
                    return abort(500);
                }else{
                    $vid_name = $request->video_url.'.'.$request->video_url->getClientOriginalExtension();
                    $img_path = '/videos/';
                    $request->video_url ->move(public_path($img_path),$vid_name);
                    $request->video_url = $img_path.$vid_name;
                }
            }
        }*/

        Video::where('id', $request->updateId)->update([
            'order' => Helper::scriptStripper($request->order),
            'title' => Helper::scriptStripper($request->title),
            'video_url' => Helper::scriptStripper($request->video_url),
            'description' => Helper::scriptStripper($request->description),
            'category_id' => Helper::scriptStripper($request->category_id),

        ]);

        $video = Video::find($request->updateId);

        if (isset($request->image)) {
            if ($request->image != null) {
                $imageControl = Helper::isImage($request->image);
                if ($imageControl['status'] != 'ok') {
                    return abort(500);
                } else {
                    $old_image = public_path() . $video->image;
                    if (file_exists($old_image) && !is_null($video->image)) {
                        unlink($old_image);
                    }

                    $img_name = $request->video_url . '.' . $request->image->getClientOriginalExtension();
                    $img_path = '/images/';
                    $request->image->move(public_path($img_path), $img_name);
                    $video->image = $img_path . $img_name;
                    $video->save();

                }
            }
        }


        return response()->json(['Success' => 'success']);
    }

}
