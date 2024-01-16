<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexStore(Request $request) {
        // $avatar_path = '';

        // if ($request->hasFile('avatar')) {
        //     $avatar_path = $request->file('avatar')->store('customers', 'public');
        // }

        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'image' => 'required|image',
        ]);

        $customer = new User;

        $customer->username = $request->username;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->level = 'admin';
        $customer->alamat = '-';
        $customer->status = 'aman';
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($customer->image) {
                Storage::delete($customer->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('users', 'public');
            $customer->image = $imagePath;
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
            return redirect()->back()->with('error', 'Maaf, tidak bisa menambah Admin');
        }
        return redirect()->route('user.index')->with('success', 'Admin sukses ditambahkan');

    }

    public function indexCreate(Request $request) {
        return view('admin.user.create');

    }
    public function indexEdit(Request $request, $id) {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));

    }
    public function indexLA() {
        $data = User::all();

        return view('admin.user.index', compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexA()
    {
        $orders = Order::with(['items', 'payments'])->get();
        // $customers_count = Customer::count();
        $customers_count = User::count();

        return view('admin.home', [
            'orders_count' => $orders->count(),
            'income' => $orders->map(function($i) {
                if($i->receivedAmount() > $i->total()) {
                    return $i->total();
                }
                return $i->receivedAmount();
            })->sum(),
            'income_today' => $orders->where('created_at', '>=', date('Y-m-d').' 00:00:00')->map(function($i) {
                if($i->receivedAmount() > $i->total()) {
                    return $i->total();
                }
                return $i->receivedAmount();
            })->sum(),
            'customers_count' => $customers_count
        ]);
    }






    public function blokir() {
        return view('user.blocked');
    }
    public function blocked() {
        return view('blocked');
    }
    public function blockedA() {
        return view('blocked');
    }
    public function profile() {
        $user = Auth::user();
        return view('user.profile');
    }

    public function profileA()
    {
        $user = Auth::user();
        return view('admin.profile');
    }
    public function edit() {
        $user = Auth::user();
        return view('user.edit');
    }
    public function simpan(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'password' => 'nullable|string|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        // Update nama dan alamat
        $user->username = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Update gambar jika diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($user->image) {
                Storage::delete($user->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;
        }

        // Simpan perubahan
        $user->update();

        return redirect()->route('user.edit')->with('success', 'Profil berhasil disimpan.');
    }

    public function updateA(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'username' => 'nullable|string',
            'email' => 'nullable|email',
            'password' => 'nullable|string|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable',
        ]);
        $user = User::find($id);
           // Update nama dan alamat
        $user->username = $request->username;
        $user->email = $request->email;
        $user->status = $request->status;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Update gambar jika diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($user->image) {
                Storage::delete($user->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;
        }

        // Simpan perubahan
        $user->save();

        return redirect()->route('user.index')->with('success', 'Data berhasil diupdate');
    }

    public function simpanA(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|string|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        // Update nama dan alamat
        $user->username = $request->name;
        $user->email = $request->email;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Update gambar jika diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($user->image) {
                Storage::delete($user->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;
        }

        // Simpan perubahan
        $user->update();

        return redirect()->route('admin.profile')->with('success', 'Data Berhasil diupdate');
    }

    public function indexU()
    {
        $user = auth()->user();
        $data = Order::all();
        $orders = Order::with(['items', 'payments'])->where('user_id', $user->getID())->get();
        $customers_count = Customer::count();

        return view('user.home', compact('data', 'orders'), [
            'orders_count' => $orders->count(),
            'income' => $orders->map(function($i) {
                if($i->receivedAmount() > $i->total()) {
                    return $i->total();
                }
                return $i->receivedAmount();
            })->sum(),
            'income_today' => $orders->where('created_at', '>=', date('Y-m-d').' 00:00:00')->map(function($i) {
                if($i->receivedAmount() > $i->total()) {
                    return $i->total();
                }
                return $i->receivedAmount();
            })->sum(),
            'customers_count' => $customers_count
        ]);
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'jenisKelamin' => 'required',
            'password' => 'required|min:8|max:20|confirmed'
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenisKelamin;
        $user->password = Hash::make($request->password);

        $user->save();

        if ($user) {
            return redirect('/auth/login')->with('success', 'Akun berhasil dibuat, silahkan melakukan proses login!');
        } else {
            return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
        }
    }

    public function login() {
        return view('auth.login');
    }
    public function register() {
        return view('auth.register');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:20'
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if ($user->level == 'user') {
                return redirect('/user/home');
            } elseif ($user->level == 'admin') {
                return redirect('/admin/home');
            }
        }
        return redirect('/home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }
}