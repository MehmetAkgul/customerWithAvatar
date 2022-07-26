<?php

namespace App\Http\Controllers;

use App\Helper\Helpers;
use App\Models\Customer;
use App\Models\Pdf;
use App\Notifications\Subscribe;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function taskOnePdf()
    {
        return view("task-one-pdf");
    }

    public function taskOnePdfStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required | max:20',
            'name' => 'required |  max:30',
            'email' => 'required  | max:50',
        ]);
        $file = $request->file('pdf');
        $uniqueFileName = uniqid() . $file->getClientOriginalName();
        $path = public_path('assets/customer/pdf/');
        $file->move($path, $uniqueFileName);

        $pdf = new Pdf();
        $pdf->title = $request->title;
        $pdf->name = $request->name;
        $pdf->email = $request->email;
        $pdf->path = $path . "/" . $uniqueFileName;
        $pdf->save();
        return view("task-one-result");
    }

    public function taskOneExamineList()
    {
        return view("task-one-examine-list");
    }

    public function taskOneExamineData(Request $request)
    {
        $data = Datatables::of(Pdf::query())
            ->editColumn('path', function ($table) {
                return '<a href="' . route('task-one-examine', ["id" => $table->id]) . '">Examine</a>';
            })
            ->rawColumns(['path'])
            ->make(true);
        return $data;
    }

    public function taskOneExamine(Request $request)
    {
        $pdf_file = Pdf::where("id", $request->id)->first()->path;
        $data = Helpers::keywordDestinyReport($pdf_file);
        return view("task-one-examine", compact("data"));
    }

    public function taskTwo()
    {
        return view("task-two");
    }

    public function taskTwoData(Request $request)
    {
        $data = Datatables::of(Customer::query())
            ->editColumn('avatar', function ($table) {
                return '<img src=' . asset("assets/customer/avatar/" . $table->avatar) . ' alt="" style="width: 50px;">';
            })
            ->editColumn('is_subscribe', function ($table) {
                return Helpers::isSubscribe($table->is_subscribe, $table->id);
            })
            ->rawColumns(['avatar', 'is_subscribe'])
            ->make(true);
        return $data;
    }

    public function taskTwoSubscribe(Request $request)
    {
        $status = Customer::where("id", $request->id)
            ->update(['is_subscribe' => $request->subscribe]);
        if ($status)
            return "Successfully";

        return "Sorry, your transaction was unsuccessful";

    }

    public function taskThree()
    {
        return view("task-three");
    }

    public function taskThreeNewSubscribe(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required | max:20',
            'name' => 'required |  max:20',
            'email' => 'required  |unique:customers| max:30',
        ]);
        $customer = new Customer();
        $customer->title = $request->title;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->is_subscribe = 1;

        $customer->save();

        $customer->notify(new Subscribe());
        if ($customer) {
            return "Successfuly";
        }
        return "Sorry, your transaction was unsuccessful";
    }


}
