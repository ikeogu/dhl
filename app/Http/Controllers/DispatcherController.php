<?php

namespace App\Http\Controllers;

use App\Models\Dispatcher;
use App\Models\DispatcherItem;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\SanitizeInput;

class DispatcherController extends Controller
{
    //
    public function __construct()
    {
        $this->sanitize = new SanitizeInput;
    }


    public function index()
    {
        $dispatcher = Dispatcher::latest()->get();
        return view('admin.dispatcher', ['dispatchers' => $dispatcher]);
    }

    public function store(Request $request)
    {
        $dis = new Dispatcher();
        $cover = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = str_replace(' ', '_', strtolower($request->template_name)) . '_image' . time() . '.' . $file->extension();
            $request->file('image')->storeAs('public/Dispatcher', $fileName);
            $cover = $fileName;
        }


        $dis->firstname = $this->sanitize->SanitizeInput($request->firstname);
        $dis->lastname = $this->sanitize->SanitizeInput($request->lastname);
        $dis->email = $this->sanitize->SanitizeInput($request->email);
        $dis->phone = $this->sanitize->SanitizeInput($request->phone);
        $dis->status = 1;
        $dis->image = $cover;


        $dis->save();

        return back()->with('success', 'Data inserted');
    }

    public function update(Request $request, $id)
    {
        $dis = Dispatcher::find($id);
        $dis->firstname = $this->sanitize->SanitizeInput($request->firstname);
        $dis->lastname = $this->sanitize->SanitizeInput($request->lastname);
        $dis->email = $this->sanitize->SanitizeInput($request->email);
        $dis->phone = $this->sanitize->SanitizeInput($request->phone);
        $dis->status = 1;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = str_replace(' ', '_', strtolower($request->template_name)) . '_image' . time() . '.' . $file->extension();
            $request->file('image')->storeAs('public/Dispatcher', $fileName);
            $cover = $fileName;
        }

        $dis->image = $cover;
        $dis->save();

        return back()->with('success', 'Data updated');
    }
    public function destroy($id)
    {
        $dis = Dispatcher::find($id);
        $dis->delete();
        return back()->with('success', 'Data deleted');
    }

    public function dispatched($id)
    {
        $items = DispatcherItem::where('dispatcher_id', $id)->get();
        $ids = [];
        foreach ($items as $i) {
            array_push($ids, $i->id);
        }
        $data['items'] = Item::whereIn('id', $ids)->get();
        $data['dispatcher'] = Dispatcher::find($id);
        return view('profile.dispatched')->with($data);
    }
}