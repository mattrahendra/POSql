<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return response(
                User::all()
            );
        }
        $customers = User::latest()->paginate(10);
        return view('admin.customers.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $avatar_path = '';

        // if ($request->hasFile('avatar')) {
        //     $avatar_path = $request->file('avatar')->store('customers', 'public');
        // }

        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'alamat' => 'required',
            'image' => 'required|image',
        ]);

        $customer = new User;

        $customer->username = $request->username;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->alamat = $request->alamat;
        $customer->level = 'user';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/img/', $filename);
            $customer->image = $filename;
        }

        // $customer = User::create([
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'alamat' => $request->alamat,
        //     'image' => $avatar_path,
        //     'level' => 'user'
        // ]);

        $customer->save();

        if (!$customer) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while creating customer.');
        }
        return redirect()->route('customers.index')->with('success', 'Success, your customer have been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(User $customer)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(User $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $customer)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'image' => 'image', // Make it optional if not always required
            'password' => 'nullable|min:6', // Adjust as per your security requirements
            'status' => 'required'
        ]);

        $customer->username = $request->username;
        $customer->email = $request->email;
        $customer->alamat = $request->alamat;

        // Check if password is present before hashing
        if ($request->filled('password')) {
            $customer->password = Hash::make($request->password);
        }

        $customer->status = $request->status;

        if ($request->hasFile('image')) {
            $filepath = 'images/img/' . $customer->image;
            if (File::exists($filepath)) {
                File::delete($filepath);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/img/', $filename);
            $customer->image = $filename;
        }

        if (!$customer->save()) {
            return redirect()->back()->with('error', 'User Gagal Diupdate.');
        }

        return redirect()->route('customers.index')->with('success', 'Berhasil Update');
    }


    public function destroy(Customer $customer)
    {
        if ($customer->avatar) {
            Storage::delete($customer->avatar);
        }

        $customer->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function block($id)
    {
        $c = User::find($id);

        if (!$c) {
            return redirect()->back()->with('failed', 'Gagal diblock. Pengguna tidak ditemukan.');
        }

        $c->status = 'blokir';

        if ($c->save()) {
            return redirect()->back()->with('success', 'Berhasil diblock');
        } else {
            return redirect()->back()->with('failed', 'Gagal diblock. Terjadi kesalahan saat menyimpan perubahan status.');
        }
    }
}