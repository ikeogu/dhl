<?php

namespace App\Http\Controllers;

use App\Mail\ItemDelivered;
use App\Mail\ItemNotDelivered;
use App\Mail\ItemOnQueue;
use App\Mail\ItemOnTransit;
use App\Models\Dispatcher;
use App\Models\DispatcherItem;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\SanitizeInput;
use Illuminate\Support\Facades\Mail;

class ItemController extends Controller
{
    //
    public function __construct()
    {
        $this->sanitize = new SanitizeInput;
    }

    public function index()
    {
        $items = Item::latest()->get();
        return view('admin.index', ['items' => $items]);
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([

            'item_name' => 'required',
            'item_weight' => 'required',
            'item_cost' => 'required',
            'owner_name' => 'required',
            'owner_email' => 'required',
            'owner_address' => 'required|max:300',
            'owner_phone' => 'required|max:11',

            'r_address' => 'required|max:300',
            'r_phone' => 'required',
            'r_name' => 'required',

        ]);
        $cover = $cover2 = $cover3 = '';
        $item = new Item();
        $item->item_name = $this->sanitize->SanitizeInput($request->item_name);
        $item->item_weight = $this->sanitize->SanitizeInput($request->item_weight);
        $item->item_cost = $this->sanitize->SanitizeInput($request->item_cost);
        $item->owner_name = $this->sanitize->SanitizeInput($request->owner_name);
        $item->owner_email = $this->sanitize->SanitizeInput($request->owner_email);
        $item->owner_address = $this->sanitize->SanitizeInput($request->owner_address);
        $item->owner_phone = $this->sanitize->SanitizeInput($request->owner_phone);
        $item->doc = $this->sanitize->SanitizeInput($request->doc);
        $item->dod = $this->sanitize->SanitizeInput($request->dod);
        $item->r_address = $this->sanitize->SanitizeInput($request->r_address);
        $item->r_phone = $this->sanitize->SanitizeInput($request->r_phone);
        $item->r_name = $this->sanitize->SanitizeInput($request->r_name);
        $item->r_email = $this->sanitize->SanitizeInput($request->r_email);
        $item->c_location = $this->sanitize->SanitizeInput($request->c_location);
        $item->status = 1;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = str_replace(' ', '_', strtolower($request->template_name)) . '_image' . time() . '.' . $file->extension();
            $request->file('image')->storeAs('public/Item', $fileName);
            $cover = $fileName;
        }

        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $fileName = str_replace(' ', '_', strtolower($request->template_name)) . '_image' . time() . '.' . $file->extension();
            $request->file('image')->storeAs('public/Item', $fileName);
            $cover2 = $fileName;
        }

        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $fileName = str_replace(' ', '_', strtolower($request->template_name)) . '_image' . time() . '.' . $file->extension();
            $request->file('image')->storeAs('public/Item', $fileName);
            $cover3 = $fileName;
        }
        $item->image = $cover;
        $item->image2 = $cover2;
        $item->image3 = $cover3;
        $id = Item::latest()->first();
        if ($id) {
            $item->TrackID = 'DT-00' . $id->id + 1;
        } else {
            $item->TrackID = 'DT-00' . 1;
        }


        if($item->save()){
            $data = [
                'email' => $request->r_email,
                'subject' => "You Item is On Queue.",
                'name' => $request->r_name,
                'item' => $item,
                
            ];

            Mail::to($request->r_email)->send(new ItemOnQueue($data));
        }

        return back()->with('success', 'Data Inserted');
    }
    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        $item->item_name = $this->sanitize->SanitizeInput($request->item_name);
        $item->item_weight = $this->sanitize->SanitizeInput($request->item_weight);
        $item->item_cost = $this->sanitize->SanitizeInput($request->item_cost);
        $item->owner_name = $this->sanitize->SanitizeInput($request->owner_name);
        $item->owner_email = $this->sanitize->SanitizeInput($request->owner_email);
        $item->owner_address = $this->sanitize->SanitizeInput($request->owner_address);
        $item->owner_phone = $this->sanitize->SanitizeInput($request->owner_phone);
        $item->doc = $this->sanitize->SanitizeInput($request->doc);
        $item->dod = $this->sanitize->SanitizeInput($request->dod);
        $item->r_address = $this->sanitize->SanitizeInput($request->r_address);
        $item->r_phone = $this->sanitize->SanitizeInput($request->r_phone);
        $item->r_name = $this->sanitize->SanitizeInput($request->r_name);
        $item->r_email = $this->sanitize->SanitizeInput($request->r_email);
        $item->c_location = $this->sanitize->SanitizeInput($request->c_location);
        $item->status =  $this->sanitize->SanitizeInput($request->status);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = str_replace(' ', '_', strtolower($request->template_name)) . '_image' . time() . '.' . $file->extension();
            $request->file('image')->storeAs('public/Item', $fileName);
            $cover = $fileName;
            $item->image = $cover;
        }

        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $fileName = str_replace(' ', '_', strtolower($request->template_name)) . '_image' . time() . '.' . $file->extension();
            $request->file('image')->storeAs('public/Item', $fileName);
            $cover = $fileName;
            $item->image2 = $cover;
        }

        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $fileName = str_replace(' ', '_', strtolower($request->template_name)) . '_image' . time() . '.' . $file->extension();
            $request->file('image')->storeAs('public/Item', $fileName);
            $cover = $fileName;
            $item->image3 = $cover;
        }

        $item->save();

        return back()->with('success', 'Data updated');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return back()->with('success', 'Data  deleted');
    }
    public function changeStatus(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->status =  $this->sanitize->SanitizeInput($request->status);

        if ($item->save()) {
            
            if($item->status ==2)
            $data = [
                'email' => $request->r_email,
                'subject' => "You Item is On Transist.",
                'name' => $request->r_name,
                'item' => $item,

            ];
                Mail::to($request->r_email)->send(new ItemOnTransit($data));
             }elseif($item->status == 3){
                    $data = [
                    'email' => $request->r_email,
                    'subject' => "You Item has been Delivered Successfully",
                    'name' => $request->r_name,
                    'item' => $item,

                ];
                Mail::to($request->r_email)->send(new ItemDelivered($data));
            }elseif($item->status==4){
                $data = [
                'email' => $request->r_email,
                'subject' => "You Item unfortunately was not delivered.",
                'name' => $request->r_name,
                'item' => $item,

                ];
                Mail::to($request->r_email)->send(new ItemNotDelivered($data));
            
            }
        return back()->with('success', 'Status Changed!');
    }
    public function show($id)
    {
        $item = Item::find($id);
        return view('admin.item_show', ['item' => $item]);
    }

    public function addItemToQueue(Request $request)
    {
        $item = Item::find($request->item_id);
        $dis = Dispatcher::find($request->dis_id);
        $disItem = new DispatcherItem();
        $disItem->item_id = $item->id;
        $disItem->dispatcher_id = $dis->id;
        $item->status = 2;
        $disItem->save();
        if ($item->save()) {
            $data = [
                'email' => $request->r_email,
                'subject' => "You Item is On Queue.",
                'name' => $request->r_name,
                'item' => $item,

            ];

            Mail::to($request->r_email)->send(new ItemOnTransit($data));
        }
        return back()->with('success', 'Item Assigned to Dispatcher');
    }
    public function assignDispatcher()
    {
        $data['items'] = Item::where('status',  1)->get();

        $data['dispatcher'] = Dispatcher::where('status', 1)->get();
        return view('assigndis')->with($data);
    }

    public function filterItems(Request $request)
    {

        if (!is_null($request->status)) {
            if ($request->status == 'any') {
                $data['items'] = Item::all();
            } elseif ($request->status !== 'any') {
                $data['items'] = Item::where('status', $request->status)->get();
            }
        }

        return view('admin.index')->with($data);
    }
}