<?php

namespace App\Http\Controllers\Admin;


use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
      $c_count=Category::count();
      $p_count=Product::count();
      $m_earning= Payment::whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->sum('total');
      $y_earning= Payment::whereYear('created_at',date('Y'))->sum('total');
    return view('admin.index',compact('c_count','p_count','m_earning','y_earning'));
    }

}
