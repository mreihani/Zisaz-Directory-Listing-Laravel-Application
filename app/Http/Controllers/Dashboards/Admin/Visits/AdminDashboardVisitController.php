<?php

namespace App\Http\Controllers\Dashboards\Admin\Visits;

use App\Models\User;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use App\Models\Dashboards\Admin\Visit;
use Stevebauman\Purify\Facades\Purify;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Dashboards\Admin\VisitChart;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\Dashboards\Admin\Visits\VisitSearchRequest;


class AdminDashboardVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $visits = Visit::orderBy('created_at', 'desc')->paginate(10);
    
        return view('dashboards.users.admin.pages.visits.index.index', compact('user', 'visits'));  
    }

    /**
     * Display a listing of the resource.
     */
    public function history(Request $request)
    {
        $visitorUser = User::findOrFail($request->userId);

        $user = auth()->user();
        $visits = Visit::where('user_id', $visitorUser->id)->orderBy('created_at', 'desc')->paginate(10)->appends(['userId' => $visitorUser->id]);

        return view('dashboards.users.admin.pages.visits.history.index', compact('user', 'visits', 'visitorUser'));  
    }

    /**
     * Search Items
     */
    public function search(VisitSearchRequest $request) {
        $validated = $request->validated();

        $user = auth()->user();

        $searchString = trim($request->q);
        $ip = trim($request->ip);
        $device = trim($request->device);
        $platform = trim($request->platform);
        $browser = trim($request->browser);
        $country = trim($request->country);
        $province = trim($request->province);
        $city = trim($request->city);
        $startDate = !empty($request->startDate) ? Jalalian::fromFormat('Y-m-d', trim($request->startDate))->toCarbon() : ''; 
        $endDate = !empty($request->endDate) ? Jalalian::fromFormat('Y-m-d', trim($request->endDate))->toCarbon() : ''; 
        
        $visits = Visit::query()
        ->when($ip, function ($query) use ($ip) {
            $query->where('ip', $ip);
        })
        ->when($device, function ($query) use ($device) {
            $query->where('device', $device);
        })
        ->when($platform, function ($query) use ($platform) {
            $query->where('platform', $platform);
        })
        ->when($browser, function ($query) use ($browser) {
            $query->where('browser', $browser);
        })
        ->when($country, function ($query) use ($country) {
            $query->where('country', $country);
        })
        ->when($province, function ($query) use ($province) {
            $query->where('province', $province);
        })
        ->when($city, function ($query) use ($city) {
            $query->where('city', $city);
        })
        ->when($startDate, function ($query) use ($startDate) {
            $query->whereRaw("DATE(created_at) >= ?", [$startDate->format('Y-m-d')]);
        })
        ->when($endDate, function ($query) use ($endDate) {
            $query->whereRaw("DATE(created_at) <= ?", [$endDate->format('Y-m-d')]);
        })
        ->when($searchString, function ($query) use ($searchString) {
            $query->whereHas('user', function ($query) use ($searchString) {
                $query->whereRaw("CONCAT(firstname, ' ', lastname) like ?", ['%' . $searchString . '%']);
            });
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10)
        ->appends($request->except('page'));

        return view('dashboards.users.admin.pages.visits.search.index', compact('user',  'visits', 'searchString')); 
    }

    public function exportExcel(Request $request) {
        if(empty($request->except('page'))) {
            // Retrieve all Visit records
            $visits = Visit::orderBy('created_at', 'desc')->get();
        } elseif(!empty($request->except('page')) && !$request->has('userId')) {

            // Retrieve filtered Visit records
            $searchString = trim($request->q);
            $ip = trim($request->ip);
            $device = trim($request->device);
            $platform = trim($request->platform);
            $browser = trim($request->browser);
            $country = trim($request->country);
            $province = trim($request->province);
            $city = trim($request->city);
            $startDate = !empty($request->startDate) ? Jalalian::fromFormat('Y-m-d', trim($request->startDate))->toCarbon() : ''; 
            $endDate = !empty($request->endDate) ? Jalalian::fromFormat('Y-m-d', trim($request->endDate))->toCarbon() : ''; 

            $visits = Visit::query()
            ->when($ip, function ($query) use ($ip) {
                $query->where('ip', $ip);
            })
            ->when($device, function ($query) use ($device) {
                $query->where('device', $device);
            })
            ->when($platform, function ($query) use ($platform) {
                $query->where('platform', $platform);
            })
            ->when($browser, function ($query) use ($browser) {
                $query->where('browser', $browser);
            })
            ->when($country, function ($query) use ($country) {
                $query->where('country', $country);
            })
            ->when($province, function ($query) use ($province) {
                $query->where('province', $province);
            })
            ->when($city, function ($query) use ($city) {
                $query->where('city', $city);
            })
            ->when($startDate, function ($query) use ($startDate) {
                $query->whereRaw("DATE(created_at) >= ?", [$startDate->format('Y-m-d')]);
            })
            ->when($endDate, function ($query) use ($endDate) {
                $query->whereRaw("DATE(created_at) <= ?", [$endDate->format('Y-m-d')]);
            })
            ->when($searchString, function ($query) use ($searchString) {
                $query->whereHas('user', function ($query) use ($searchString) {
                    $query->whereRaw("CONCAT(firstname, ' ', lastname) like ?", ['%' . $searchString . '%']);
                });
            })->orderBy('created_at', 'desc')->get();
        } elseif(!empty($request->except('page')) && $request->has('userId')) {
            $visitorUser = User::findOrFail($request->userId);

            $user = auth()->user();
            $visits = Visit::where('user_id', $visitorUser->id)->orderBy('created_at', 'desc')->get();
        }
        
        // Create a new Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet()->setTitle('جدول بازدید زی ساز');
        
        // Set the default column width for all columns
        $sheet->getDefaultColumnDimension()->setWidth(25);

        // Set the sheet direction to right-to-left
        $sheet->setRightToLeft(true);

        // Set a wider width for the 'آدرس بازدید' column
        $sheet->getColumnDimension('F')->setWidth(50); // Adjust the width as needed

        // Set headers for the Excel file
        $headers = [
            'ردیف',
            'شماره کاربر در دیتابیس',
            'نام و نام خانوادگی',
            'شماره تلفن',
            'ایمیل',
            'آدرس بازدید',
            'دستگاه',
            'پلتفرم',
            'مرورگر',
            'آی پی',
            'کشور',
            'استان',
            'شهر',
            'زمان بازدید'
        ];

        // Set the headers in the first row of the Excel file
        $sheet->fromArray([$headers], NULL, 'A1');

        // Populate the Excel file with Visit data
        $rowData = [];
        foreach ($visits as $key => $visit) {
            $rowData[] = [
                $key + 1,
                !empty($visit->user) ? ($visit->user->id) : '',
                !empty($visit->user) ? ($visit->user->firstname . ' ' . $visit->user->lastname) : 'کاربر میهمان',
                !empty($visit->user) ? ($visit->user->phone) : '',
                (!empty($visit->user) && !empty($visit->user->email)) ? ($visit->user->email) : '',
                $visit->url,
                $visit->device,
                $visit->platform,
                $visit->browser,
                $visit->ip,
                $visit->country,
                $visit->province,
                $visit->city,
                jdate($visit->created_at)
            ];
        }

        // Add data to the Excel file starting from the second row
        $sheet->fromArray($rowData, NULL, 'A2');

        // Save the Excel file
        $writer = new Xlsx($spreadsheet);
        $fileName = hexdec(uniqid()) . '.xlsx';
        $filePath = public_path('assets/frontend/downloads/' . $fileName);
        $writer->save($filePath);

        // Download the Excel file
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    /**
     * Display visits charts
     */
    public function show() {
        $user = auth()->user();

        $dateSpan = VisitChart::all()->pluck('visits_date');

        $globalVisitors = VisitChart::all()->pluck('global_visits_count');
        $globalUniqueVisitors = VisitChart::all()->pluck('global_unique_visits_count');
        $iranVisitors = VisitChart::all()->pluck('iran_visits_count');
        $iranUniqueVisitors = VisitChart::all()->pluck('iran_unique_visits_count');

        return view('dashboards.users.admin.pages.visits.show.index', compact(
            'user',
            'dateSpan',
            'globalVisitors',
            'globalUniqueVisitors',
            'iranVisitors',
            'iranUniqueVisitors'
        )); 
    }
}



