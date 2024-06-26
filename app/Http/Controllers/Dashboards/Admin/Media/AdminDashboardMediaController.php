<?php

namespace App\Http\Controllers\Dashboards\Admin\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Models\Dashboards\Admin\Media;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\ImageResizeServices\ImageResizeService;
use App\Services\VideoRenderServices\VideoRenderService;
use App\Http\Requests\Dashboards\Admin\Media\MediaStoreRequest;

class AdminDashboardMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        // $mediaFiles = Media::where('user_id', auth()->user()->id)->paginate(10);

        $mediaFiles = Media::where('user_id', auth()->user()->id)
        ->where(function ($query) {
            $query->where('video_job_id', '!=', null)->where('thumbnail_job_id', '!=', null);
        })
        ->paginate(10);
       
        return view('dashboards.users.admin.pages.media.index.index', compact('user', 'mediaFiles'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        $firstMediaItem = Media::first();

        return view('dashboards.users.admin.pages.media.create.index', compact('user'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MediaStoreRequest $request)
    {
        $validated = $request->validated();
        
        // check if incomig file is image
        if(in_array($request->file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'bmp'])) {
            // call and create a new instance of the class, with image and path inputs
            $renderImageService = new ImageResizeService(
                $request->file, 
                'media-files/' . auth()->user()->id
            );
            
            // insert into db
            Media::create([
                'user_id' => auth()->user()->id,
                'file_type' => 'image',
                'file_name' => $request->file->getClientOriginalName(),
                'file_path' => $renderImageService->resizeImageConstrainedWidth(1200),
                'thumbnail' => $renderImageService->resizeImage(50, 50),
                'file_size' => $request->file->getSize(),
                'video_job_id' => 'done',
                'thumbnail_job_id' => 'done',
            ]);
        // here the user uploads a video file    
        } elseif(in_array($request->file->getClientOriginalExtension(), ['flv', 'mp4', 'mkv'])) {

            // insert into db and get media object for its id
            $media = Media::create([
                'user_id' => auth()->user()->id,
                'file_type' => 'video',
                'file_name' => $request->file->getClientOriginalName(),
                'file_size' => $request->file->getSize()
            ]);
            
            // call video render service class, send media id to the job method so that job_id is set in the media table, to check if jon is done.
            $videoRenderService = new VideoRenderService(
                $request->file, 
                'media-files/' . auth()->user()->id,
                $media->id,
            );
            
            // render and resize video file
            $renderedVideo = $videoRenderService->resizeVideo(1280, 720);

            $media->update([
                'file_path' => $renderedVideo['file_path'],
                'temp_path' => $renderedVideo['temp_path'],
                'thumbnail' => $videoRenderService->generateVideoThumbnail($renderedVideo['video_conversion_temp_path'])
            ]);
        }

        return redirect(route('admin.dashboard.media.index'))->with('success', 'رسانه مورد نظر با موفقیت بارگذاری گردید.');
    }

    /**
     * Remove the specified Actcat resource from storage.
     */
    public function destroy(Media $media)
    {
        if($media->file_type == 'image') {
            if(file_exists($media->file_path)) {
                unlink($media->file_path);
            }
            if(file_exists($media->thumbnail)) {
                unlink($media->thumbnail);
            }
        } elseif($media->file_type == 'video') {
            if(file_exists($media->file_path)) {
                unlink($media->file_path);
            }
            if(file_exists($media->temp_path)) {
                unlink($media->temp_path);
            }
            if(file_exists($media->thumbnail)) {
                unlink($media->thumbnail);
            }
        }

        // delete category
        $media->delete();

        return redirect(route('admin.dashboard.media.index'))->with('success', 'رسانه مورد نظر با موفقیت حذف گردید.');
    }

    /**
     * Search Items
     */
    public function search(Request $request) {

        $user = auth()->user();

        $searchString = trim($request->q);
        $mediaFiles = Media::where('file_name', 'like', '%' . $searchString . '%')
        ->where(function ($query) {
            $query->where('video_job_id', '!=', null)->where('thumbnail_job_id', '!=', null);
        })->paginate(10);

        return view('dashboards.users.admin.pages.media.search.index', compact('user', 'mediaFiles', 'searchString')); 
    }
    
}
