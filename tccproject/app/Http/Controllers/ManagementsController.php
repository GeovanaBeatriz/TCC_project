<?php

namespace App\Http\Controllers;
use App\Models\managements;

use Illuminate\Http\Request;

class managementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $managements = managements::where(function ($query) use ($search){
            if($search) {
                $query->where('nome', 'LIKE', "%{$search}%");
            }
        })->get();
        return view('admin.managements', compact('managements'));
    }
}
