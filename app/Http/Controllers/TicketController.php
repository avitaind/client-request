<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Models\User;
use Storage;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Status;
use Faker\Provider\Image;
use App\Mailers\AppMailer;
use Illuminate\Http\Request;
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

    public function store(Request $request, AppMailer $mailer)
    {
        // store code
        $this->validate($request, [
            'brand'     => 'required',
            'country'   => 'required',
            'title'     => 'required',
            'category'  => 'required',
            'priority'  => 'required',
            'summary'   => 'required',
            'reference.*' => 'mimes:doc,docx,jpg,jpeg,png,pdf,xlsx,xlx,ppt,pptx,csv,zip',
                      
        ]);
 
        if($request->hasFile('reference')) {
        $picture = array();
        $imageNameArr = [];
        foreach ($request->reference as $file) {
            // you can also use the original name
            $imageName = time().'-'.$file->getClientOriginalName();
            $imageNameArr[] = $imageName;
            // Upload file to public path in images directory
            $fileName = $file->move(base_path('\public\uploads'), $file->getClientOriginalName());           

            // Database operation
            $array[] = $fileName; 
            $picture = implode(",", $array); //Image separated by comma
        }
        
    }
        else{
            $picture = "";

    }

      $ticket = new Ticket([
             'job'     => 'ADNESEA',
             'brand'   => $request->input('brand'),
             'country' => $request->input('country'),
             'title'   => $request->input('title'),
             'category_name' => $request->input('category'),
             'priority'  => $request->input('priority'),
             'summary'   => $request->input('summary'),
             'objective' => $request->input('objective'),
             'reference' => $picture,
             'otherinfo' => $request->input('otherinfo'),
         ]);
        
  
        $ticket->save();         
        $mailer->sendTicketInformation(Auth::user(), $ticket);

        $number = DB::table('tickets')
        ->orderBy('created_at','desc')
        ->first();
      
       $num = sprintf('%03d', intval($number->no));
       return redirect()->back()->with("status", "A new SRN: $ticket->job$num has been generated.");

    }
}
