<?php

namespace App\Http\Controllers;

use App\Rules\Uppercase;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\UserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();

        return view('users.index', compact('users'));
    }

    public function showForm(): View
    {
        return view('user.uppercase');
    }

    public function showValidateForm(): View
    {
        return view('user-form');
    }

    // ------------------------------------------------------------------
    // FIX 1: Method submitForm (Untuk submit Form via Web Blade + Simpan Database)
    // ------------------------------------------------------------------
    public function submitForm(Request $request): RedirectResponse
    {
        // 1. Validasi Input Form
        $validated = $request->validate([
            'nama'     => ['required', 'string', 'min:3', 'max:50', new Uppercase],
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'age'      => 'nullable|numeric|min:17',
        ], [
            'nama.required'      => 'Nama wajib diisi.',
            'nama.min'           => 'Nama minimal terdiri dari 3 karakter.',
            'email.unique'       => 'Email sudah terdaftar, gunakan email lain.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'age.min'            => 'Umur minimal adalah 17 tahun.',
        ]);

        // 2. Simpan ke Database via Eloquent
        User::create([
            'name'     => $validated['nama'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']), // Di-hash demi keamanan
            'age'      => $validated['age'] ?? null,
            'role'     => 'user',
        ]);

        // 3. Kembali ke halaman form dengan pesan sukses
        return redirect()
            ->back()
            ->with('status', 'Validasi berhasil! Data ' . $validated['nama'] . ' telah tersimpan di database.');
    }

    // ------------------------------------------------------------------
    // FIX 2: Method validateExample (Jika menggunakan Form Request / JSON API)
    // ------------------------------------------------------------------
    public function validateExample(UserRequest $request)
    {
        // Data diambil dari UserRequest yang sudah divalidasi
        $validatedData = $request->validated();

        // Simpan ke Database
        $user = User::create([
            'name'     => $validatedData['name'],
            'email'    => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'age'      => $validatedData['age'] ?? null,
            'role'     => 'user',
        ]);

        return response()->json([
            'status'  => 'Validasi Sukses & Data Berhasil Disimpan!',
            'payload' => $user
        ]);
    }

    public function updateNama()
    {
        $updated = DB::table('users')
            ->where('email', 'jane@example.com')
            ->update([
                'name' => 'Jane Smith'
            ]);

        return 'Nama berhasil diperbarui!';
    }

    public function deleteUser()
    {
        $deleted = DB::table('users')
            ->where('email', 'jane@example.com')
            ->delete();

        return "Data berhasil dihapus!";
    }

    public function pluck()
    {
        $names = DB::table('users')->pluck('name');

        return response()->json([
            'status' => 'success',
            'data' => $names
        ]);
    }

    public function agregat()
    {
        $usersList = DB::table('users')->select('name', 'email', 'age')->get();

        $totalUsers = DB::table('users')->count();
        $averageAge = DB::table('users')->avg('age');
        $maxAge = DB::table('users')->max('age');
        $minAge = DB::table('users')->min('age');

        return response()->json([
            'statistik' => [
                'total_user' => $totalUsers,
                'rata_rata_umur' => round($averageAge, 1),
                'umur_maksimal' => $maxAge,
                'umur_minimal' => $minAge,
            ],
            'daftar_user' => $usersList
        ]);
    }

    public function joinExample()
    {
        $innerJoin = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.name as product_name', 'products.price', 'categories.name as category_name')
            ->get();

        $leftJoin = DB::table('categories')
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->select('categories.name as category_name', 'products.name as product_name')
            ->get();

        return response()->json([
            'inner_join' => $innerJoin,
            'left_join'  => $leftJoin,
        ]);
    }

    public function sortingLimit()
    {
        $sortedUsers = DB::table('users')
            ->orderBy('name', 'desc')
            ->get();

        $topUsers = DB::table('users')
            ->limit(3)
            ->get();

        $pagedUsers = DB::table('users')
            ->offset(2)
            ->limit(3)
            ->get();

        return response()->json([
            'diurutkan_z_ke_a' => $sortedUsers,
            'limit_3_data'     => $topUsers,
            'offset_2_limit_3' => $pagedUsers,
        ]);
    }

    public function subqueryExample()
    {
        $categories = DB::table('categories')
            ->select('name')
            ->selectSub(function ($query) {
                $query->from('products')
                    ->selectRaw('count(*)')
                    ->whereColumn('products.category_id', 'categories.id');
            }, 'total_produk')
            ->get();

        return response()->json($categories);
    }

    public function rawQueryExample()
    {
        $usersByRole = DB::table('users')
            ->selectRaw('role, COUNT(*) as total_users')
            ->groupBy('role')
            ->get();

        $filteredUsers = DB::table('users')
            ->whereRaw('age >= ? AND role = ?', [20, 'admin'])
            ->get();

        return response()->json([
            'jumlah_user_per_role' => $usersByRole,
            'user_admin_umur_20_up' => $filteredUsers,
        ]);
    }

    public function storeEloquent()
    {
        $newUser = User::create([
            'name'     => 'Ahmad Agustin',
            'email'    => 'ahmad' . rand(100, 999) . '@example.com',
            'password' => bcrypt('password123'),
            'age'      => 24,
            'role'     => 'user',
        ]);

        return response()->json([
            'message' => 'User berhasil ditambahkan!',
            'data'    => $newUser
        ]);
    }

    public function storeSave()
    {
        $user = new User();

        $user->name = 'Siti Aminah';
        $user->email = 'siti' . rand(100, 999) . '@example.com';
        $user->password = 'password123';
        $user->age = 22;
        $user->role = 'user';

        $user->save();

        return response()->json([
            'message' => 'Data berhasil disimpan dengan method save()!',
            'data' => $user
        ]);
    }

    public function getEloquentData()
    {
        $allUsers = User::all();

        $userFind = User::find(1);

        $usersWhere = User::where('role', 'admin')->get();

        try {
            $userOrFail = User::where('email', 'admin22@example.com')->firstOrFail();
        } catch (\Exception $e) {
            $userOrFail = "Data user tidak ditemukan (Error 404)!";
        }

        return response()->json([
            'a_all_users'   => $allUsers,
            'b_find_id_1'   => $userFind,
            'c_where_admin' => $usersWhere,
            'd_first_or_fail' => $userOrFail,
        ]);
    }

    public function updateEloquent()
    {
        $updatedByQuery = User::where('email', 'admin22@example.com')
            ->update(['name' => 'Admin Rek Updated']);

        $user = User::find(1);

        if ($user) {
            $user->name = 'Jane Doe Updated';
            $user->save();
        }

        return response()->json([
            'status' => 'Data berhasil diperbarui!',
            'user_id_1' => User::find(1),
            'admin_user' => User::where('email', 'admin22@example.com')->first(),
        ]);
    }

    public function deleteEloquent()
    {
        $user = User::find(2);
        if ($user) {
            $user->delete();
        }

        User::destroy(3);

        return response()->json([
            'status' => 'Data ID 2 dan ID 3 berhasil dihapus!',
            'sisa_user' => User::all()
        ]);
    }

    public function conditionalEloquent(Request $request)
    {
        $activeUsers = User::where('role', 'admin')->get();

        $adminOrUser = User::where('role', 'admin')
            ->orWhere('role', 'user')
            ->get();

        $ageBetween = User::whereBetween('age', [18, 30])->get();

        $rolesIn = User::whereIn('role', ['admin', 'editor'])->get();

        $emailVerified = User::whereNotNull('email_verified_at')->get();

        $roleInput = $request->query('role');
        $dynamicUsers = User::when($roleInput, function ($query, $role) {
            return $query->where('role', $role);
        })->get();

        return response()->json([
            'a_where_role_admin'    => $activeUsers,
            'b_or_where_role'       => $adminOrUser,
            'c_where_between_age'   => $ageBetween,
            'd_where_in_roles'      => $rolesIn,
            'e_where_not_null'      => $emailVerified,
            'f_dynamic_when'        => $dynamicUsers,
        ]);
    }

    public function testRelation()
    {
        $categoriesWithProducts = Category::with('products')->get();

        $productsWithCategory = Product::with('category')->limit(5)->get();

        return response()->json([
            'kategori_dan_produknya' => $categoriesWithProducts,
            'produk_dan_kategorinya' => $productsWithCategory,
        ]);
    }

    public function testMutatorAccessor()
    {
        $userBaru = User::create([
            'name'     => 'budi setiawan',
            'email'    => 'budi' . rand(100, 999) . '@example.com',
            'password' => 'password123',
            'age'      => 23,
            'role'     => 'user',
        ]);

        return response()->json([
            'nama_di_database'   => $userBaru->name,
            'accessor_kapital'   => $userBaru->formatted_name,
            'accessor_nama_role' => $userBaru->name_with_role,
        ]);
    }

    public function testSoftDelete()
    {
        $user = User::find(2);
        if ($user) {
            $user->delete();
        }

        $activeUsers = User::all();

        $trashedUsers = User::onlyTrashed()->get();

        $allWithTrashed = User::withTrashed()->get();

        $restoredUser = User::onlyTrashed()->where('id', 2)->first();
        if ($restoredUser) {
            $restoredUser->restore();
        }

        return response()->json([
            'status'                 => 'Pengujian Soft Delete Berhasil!',
            'user_aktif_setelah_del' => $activeUsers,
            'user_di_sampah_trash'   => $trashedUsers,
            'semua_termasuk_trash'   => $allWithTrashed,
            'status_setelah_restore' => User::find(2),
        ]);
    }

    public function testMassAssignment(Request $request)
    {
        $inputData = [
            'name'           => 'Hacker',
            'email'          => 'hacker' . rand(100, 999) . '@example.com',
            'password'       => 'secret123',
            'age'            => 30,
            'role'           => 'user',
            'is_admin'       => true,
            'credit_balance' => 9999999,
        ];

        $user = User::create($inputData);

        return response()->json([
            'message' => 'User berhasil dibuat! Perhatikan bahwa kolom is_admin dan credit_balance otomatis dibuang oleh Eloquent.',
            'data'    => $user
        ]);
    }

    public function testQueryScope()
    {
        $adminUsers = User::admin()->get();

        $adultUsers = User::adult(21)->get();

        $adultAdmins = User::admin()->adult(20)->get();

        return response()->json([
            'user_admin'            => $adminUsers,
            'user_dewasa_21_up'     => $adultUsers,
            'user_admin_dewasa_20'  => $adultAdmins,
        ]);
    }
}