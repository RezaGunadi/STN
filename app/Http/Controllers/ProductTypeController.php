<?php

namespace App\Http\Controllers;

use App\Models\ProductTypeDB;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function autoCompleteSize(Request $request)
    {
        $query = $request->get('q');
        $sizes = ProductTypeDB::where('size', 'like', "%{$query}%")
            ->distinct()
            ->get(['size']);

        return response()->json($sizes);
    }
} 