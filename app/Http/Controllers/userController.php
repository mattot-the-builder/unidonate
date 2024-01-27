<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Item;
use App\Models\User;


class userController extends Controller
{
    public function addDonation(Request $req) {
        $item = new Item;

        $item->donor_id = Auth::user()->id;
        $item->name = $req->name;
        $item->category = $req->category;
        $item->item_condition = $req->item_condition;
        $item->description = $req->description;

        if ($req->hasFile('image')) {
            $destination_path = 'public/img/items';
            $image = $req->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $req->file('image')->storeAs($destination_path, $image_name);

            $item->image = $image_name;
        }

        $item->status = 'AVAILABLE';
        $item->save();

        return redirect('donation')->with('success', 'Item added sucessfully');
    }

    public function viewItem() {
        $items = Item::where('status', '=', 'AVAILABLE')->latest('created_at')->paginate(6);

        return view('item', ['items'=>$items]);
    }

    public function viewItemDetails($item_id) {
        $item = Item::find($item_id);
        $user = User::find($item['donor_id']);

        return view('item-details', ['item'=>$item, 'user'=>$user]);
    }

    public function showUserItems() {
        $items = Item::all()->where('donor_id', '=', Auth::user()->id);
        return view('myitem', ['items'=>$items]);
    }

    public function donateItem($item_id, Request $req) {
        $item = Item::find($item_id);

        $item->status = "DONATED";
        $item->receiver_id = $req->receiver_id;
        $item->save();

        return redirect('/myitem');
    }

    public function searchItem(Request $req) {
        $items = Item::where('name', 'LIKE', '%'.$req->name.'%')
        ->orWhere('category', 'LIKE', '%'.$req->name.'%')
        ->paginate(2);
        return view('item', ['items'=>$items]);
    }

}
