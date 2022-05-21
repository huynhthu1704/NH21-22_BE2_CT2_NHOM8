<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaginationController extends Controller
{
    public function index()
    {
        $data = Product::paginate(12);
        return View('category', ['products' => $data]);
    }

    public function getProductByFilter(Request $request)
    {
        $input = $request->all();

        $data = Product::paginate(12);
    }
}
