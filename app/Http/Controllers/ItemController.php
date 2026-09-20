<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index(): View
    {
        $items = Item::all();
        return view('items.items', compact('items'));
    }
}
