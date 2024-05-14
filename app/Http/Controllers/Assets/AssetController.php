<?php

namespace App\Http\Controllers\Assets;

use File;
use ZipArchive;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Purify\Facades\Purify;

use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\UserModels\Activity\Activity;

class AssetController extends Controller
{
    // download single image
    public function getLicenseItemsSingleImage($activity_id, $file)
    {
        abort_if(auth()->guest(), Response::HTTP_FORBIDDEN);

        $user_id = Activity::findOrFail($activity_id)->user->id;
        
        if (auth()->user()->id !== $user_id && auth()->user()->role !== 'admin') {
            abort(Response::HTTP_FORBIDDEN);
        }

        // here user asks for a single image file
        $path = "private/activity/$activity_id/$file";
        abort_unless(Storage::exists($path), Response::HTTP_NOT_FOUND);

        return response()->file(Storage::path($path));
    }

    // download zipped file of all images
    public function getLicenseItemsZip($activity_id) {
        abort_if(auth()->guest(), Response::HTTP_FORBIDDEN);

        $activityObject = Activity::findOrFail($activity_id);
        $user_id = $activityObject->user->id;

        if (auth()->user()->id !== $user_id && auth()->user()->role !== 'admin') {
            abort(Response::HTTP_FORBIDDEN);
        }

        // اینجا چون قرار است سایر کاربران که حق عضویت پرداخت کنند هم دسترسی به فایل های زیپ شده داشته باشند
        // باید نوع فعالیت محدود به مناقصه، مزایده، استعلام باشد
        // چون مثلا توی فرم رزومه هم این مدل مدارک هستند، ولی آن ها مدارک حساسی هستند و نباید توسط هیچ کاربری به جز صاحب آن نمایش داده شود
        // درست است که در صفحه تکی رزومه دکمه دانلود وجود ندارد، ولی کاربر می تواند آن مسیر را شبیه سازی کرده و مدارک حساس را دانلود کند
        // بنابراین دسترسی دکمه دانلود محدود می شود به نوع فعالیت مربوط به مناقصه، مزایده و استعلام ها
        if (
            $activityObject->subactivity->type !== 'auction' 
            && $activityObject->subactivity->type !== 'tender_buy'
            && $activityObject->subactivity->type !== 'tender_project'
            && $activityObject->subactivity->type !== 'inquiry_buy'
            && $activityObject->subactivity->type !== 'inquiry_project'
        ) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $zip = new ZipArchive;
        $fileName = hexdec(uniqid()) . '.zip';
        $path = Storage::disk('private')->path("activity/$activity_id");

        if ($zip->open(public_path('assets/frontend/downloads/' . $fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files($path);
     
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
               
            $zip->close();

            return response()->download(public_path('assets/frontend/downloads/' . $fileName))->deleteFileAfterSend(true);
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }
    }
}