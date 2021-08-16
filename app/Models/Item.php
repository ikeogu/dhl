<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['item_name', 'item_weight', 'item_cost', 'owner_name', 'owner_email', 'owner_address', 'owner_phone', 'doc', 'dod', 'r_address', 'r_phone', 'r_name', 'r_email', 'status', 'c_location', 'TrackID'];

    public function dispatcher($id)
    {
        $sid = DispatcherItem::where('item_id', $id)->first();
        if (!empty($sid)) {
            return Dispatcher::find($sid->dispatcher_id);
        }
    }
    public function otherPhotos()
    {
        return $this->hasMany(ItemPhoto::class);
    }
}