<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Storage;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Status;
use Faker\Provider\Image;
use App\Mailers\AppMailer;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TicketController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        $categories = Category::all();
        return view('ticket.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // store code
    }
}
