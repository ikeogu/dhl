<?php

namespace App\Http\Controllers;

use App\Mail\ItemDelivered;
use App\Mail\ItemNotDelivered;
use App\Mail\ItemOnQueue;
use App\Mail\ItemOnTransit;
use App\Models\Dispatcher;
use App\Models\DispatcherItem;
use App\Models\Item;
use App\Models\ItemPhoto;
use Illuminate\Http\Request;
use App\Models\SanitizeInput;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

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

            'recipient_address' => 'required|max:300',
            'recipient_phone' => 'required',
            'recipient_name' => 'required',
            'recipient_email' => 'required',

        ]);

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
        $item->r_address = $this->sanitize->SanitizeInput($request->recipient_address);
        $item->r_phone = $this->sanitize->SanitizeInput($request->recipient_phone);
        $item->r_name = $this->sanitize->SanitizeInput($request->recipient_name);
        $item->r_email = $this->sanitize->SanitizeInput($request->recipient_email);
        $item->c_location = $this->sanitize->SanitizeInput($request->c_location);
        $item->status = 1;
        $cover = '';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = str_replace(' ', '_', strtolower($request->template_name)) . '_image' . time() . '.' . $file->extension();
            $request->file('image')->storeAs('public/Item/cover', $fileName);
            $cover = $fileName;
        }
        $item->image = $cover;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $photo) {


                $photoFullname = $photo->getClientOriginalName();
                $photoExt = $photo->getClientOriginalExtension();
                $photonameonly = pathinfo(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '_', $photoFullname)), PATHINFO_FILENAME);
                // $photonameonly = pathinfo($photoFullname, PATHINFO_FILENAME);
                $photoToDb = $photonameonly . '_' . time() . '.' . $photoExt;
                $path = $photo->storeAs('public/Item/OtherPhoto', $photoToDb);

                $otherPhoto = new ItemPhoto();

                $otherPhoto->image = $photoToDb;
                $otherPhoto->item_id = $item->id;

                $otherPhoto->save();
            }
        }
        try {

            if ($item->save()) {
                $item->TrackID = 'DT-00' . $item->id;
                $item->save();
                $data = [
                    'email' => $request->r_email,
                    'subject' => "You Item is On Queue.",
                    'name' => $request->r_name,
                    'item' => $item,

                ];

                Mail::to($request->r_email)->send(new ItemOnQueue($data));
            }
            return back()->with('success', 'Data Inserted');
        } catch (\Exception $e) {

            return $e->getMessage();
        }
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
        $cover = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = '_image' . time() . '.' . $file->extension();
            $request->file('image')->storeAs('public/Item/cover', $fileName);
            $cover = $fileName;
        }
        $item->image = $cover;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $photo) {


                $photoFullname = $photo->getClientOriginalName();
                $photoExt = $photo->getClientOriginalExtension();
                $photonameonly = pathinfo(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '_', $photoFullname)), PATHINFO_FILENAME);
                // $photonameonly = pathinfo($photoFullname, PATHINFO_FILENAME);
                $photoToDb = $photonameonly . '_' . time() . '.' . $photoExt;
                $path = $photo->storeAs('public/Item/OtherPhoto', $photoToDb);

                $otherPhoto = new ItemPhoto();

                $otherPhoto->image = $photoToDb;
                $otherPhoto->item_id = $item->id;

                $otherPhoto->save();
            }
        }


        $item->save();

        return back()->with('success', 'Data updated');
    }

    public function desItem($id)
    {
        $item = Item::find($id);
        $item->delete();
        return back()->with('success', 'Data  deleted');
    }

    public function changeStatus(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->status =  $this->sanitize->SanitizeInput($request->status);
        $disItem = DispatcherItem::where('item_id', $item->id)->first();
        if ($disItem) {
            $item->save();
            if ($item->status == 2) {
                $data = [
                    'email' => $item->r_email,
                    'subject' => "You Item is On Transist.",
                    'name' => $item->r_name,
                    'item' => $item,

                ];
                Mail::to($item->r_email)->send(new ItemOnTransit($data));
            } elseif ($item->status == 3) {
                $data = [
                    'email' => $item->r_email,
                    'subject' => "You Item has been Delivered Successfully",
                    'name' => $item->r_name,
                    'item' => $item,

                ];
                Mail::to($item->r_email)->send(new ItemDelivered($data));
            } elseif ($item->status == 4) {
                $data = [
                    'email' => $item->r_email,
                    'subject' => "You Item unfortunately was not delivered.",
                    'name' => $item->r_name,
                    'item' => $item,

                ];
                Mail::to($item->r_email)->send(new ItemNotDelivered($data));
            }
        } else {
            return back()->with('warning', 'Please assign item to a dispatcher before changing item status status');
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

            Mail::to($item->r_email)->send(new ItemOnTransit($data));
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