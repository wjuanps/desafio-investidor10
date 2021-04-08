<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tiding;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TidingsController extends Controller {

    function index(Request $request) {
        $search = "";
        if (isset($request->search)) {
            $search = $request->search;
            $tidings = Tiding::join('categories', 'categories.id', '=', 'tidings.category_id')
                ->where(function ($query) use ($search) {
                    $query->where('tidings.title', 'like', "%{$search}%")
                        ->orWhere('categories.name', 'like', "%{$search}%");
                })->orderBy('tidings.id', 'desc')->get();
        } else {
            $tidings = Tiding::orderBy('id', 'desc')->get();
        }

        return view('welcome', compact('tidings', 'search'));
    }

    function store(Request $request) {
        $tiding = null;
        $error_message = "Erro ao cadastrar notícia";

        $tiding_slug = Str::slug($request->title);

        $verify_tiding = Tiding::where('slug', $tiding_slug)->count();

        if ($verify_tiding > 0) {
            $error_message = "Uma notícia já está cadastrada com esse título";
        } else {
            DB::transaction(function () use ($request, &$tiding, $tiding_slug) {
                try {
                    $tiding = Tiding::create([
                        'category_id' => $request->category,
                        'title' => $request->title,
                        'text' => $request->text,
                        'slug' => $tiding_slug,
                    ]);
                } catch (\Throwable $th) {
                    dd($th);
                }
            });
        }

        if ($tiding) {
            return redirect()->route('tiding.index');
        } else {
            return redirect()->back()->with('error', $error_message);
        }
    }

    function new() {
        $categories = Category::all();

        return view('tiding.create', compact('categories'));
    }

    function show(Request $request) {
        $tiding = Tiding::where('slug', $request->slug)->first();

        return view('tiding.show', compact('tiding'));
    }
}
