<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Custom_invoice;
use App\Models\Maintenance_appointments;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    //web-app

    public function finance(){
        $companies = Company::all();
        $invoices = Custom_invoice::all();
        return view('web-app/finance')
            ->with(['companies' => $companies])
            ->with(['invoices' => $invoices]);
    }

    public function company(){
        $companies = Company::all();
        return view('web-app/company')
            ->with(['companies' => $companies]);
    }


    public function maintenance()
    {
        $appointments = Maintenance_appointments::all();
        return view('web-app/maintenance')
            ->with(['appointments' => $appointments]);
    }


    public function inkoop()
    {
        $products = Product::all();
        return view('web-app/inkoop')
            ->with(['products' => $products]);
    }

    public function sales()
    {
        return view('web-app/sales');
    }
    public function dashboard()
    {
//        $company = Company::all();
        $users = User::all();
        if (Auth::user()->role_id == 1){//1 = medewerker
            return view('web-app/dashboard')
//                ->with(['company' => $company])
                ->with(['users' => $users]);
        }else{
            return view('web-app/company/show')
//                ->with(['company' => $company])
                ->with(['users' => $users]);
        }

    }

    //web-site
    public function offerte()
    {
        return view('web-site/offerte');

    }
    public function index()
    {
        return view('web-site/index')  ;
    }
    public function contact()
    {
        return view('web-site/contact')  ;
    }
    public function bonen()
    {
        $beans = Product::query()
            ->where('products_category_id', '=', 1)
            ->get();
        return view('web-site/beans')
            ->with(['beans' => $beans]);
    }
    public function machines()
    {
        $machines = Product::query()
            ->where('products_category_id', '=', 2)
            ->get();
        return view('web-site/machines')
            ->with(['machines' => $machines]);
    }

    public function createCustomer()

    {
        $users = User::All();
        return view('web-app/createCustomer')
            ->with(['users' => $users]);
    }
}

