<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::paginate(15);
        return view('admin.stores.index', compact('stores'));
    }

    public function create()
    {
        $users = User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = User::find($data['user']);
        $store = $user->store()->create($data);
        return $store;
    }

    public function edit($storeId)
    {
        $store = Store::find($storeId);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, $store)
    {
        $data = $request->all();
        $store = Store::find($store);
        $store->update($data);
        return $store;
    }

    public function destroy($store)
    {
        $store = Store::find($store);
        $store->delete();
        return redirect('/stores');
    }


}
