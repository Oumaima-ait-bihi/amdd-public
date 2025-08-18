<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class MembreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except(['login', 'verifyLogin']);
    }
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $query = Client::query();

        if ($filter === 'day') {
            $query->whereDate('created_at', today());
        } elseif ($filter === 'week') {
            $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
        }

        $members = $query->latest()->paginate(10);

        return view('admin.members.index', compact('members'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Client::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $Client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
        ]);
        return redirect()->route('admin.members.index')
                        ->with('success', 'Membre créé avec succès.');
    }

    public function edit($id)
    {
        $member = Client::findOrFail($id);
        return view('admin.members.edit', compact('member'));
    }
    public function update(Request $request, $id)
    {
        $membre = Client::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $membre->id,
            'password' => 'nullable|string|min:8|confirmed',
            'is_active' => 'required|boolean',
        ]);

        $membre->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'is_active' => $validated['is_active'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $membre->password,
        ]);

        return redirect()->route('admin.members.index')
                        ->with('success', 'Membre mis à jour avec succès.');
    }


    public function destroy($id)
    {
        $membre = Client::findOrFail($id);
        $membre->delete();
        return redirect()->route('admin.members.index')
                        ->with('success', 'Membre supprimé avec succès.');
    }

    public function login() {
        return view('auth.login');
    }

    public function verifyLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string',
        ]);

        $member = Client::where('email', $request->email)
                        ->first();

        if ($member && Hash::check($request->password, $member->password)) {
            if (!$member->is_active) {
                return redirect()->route('frontend.espace-membre')
                                ->with('error', 'Votre compte est inactif. Veuillez contacter l\'administration pour activer votre compte.');
            }

            auth()->guard('web')->login($member);

            return redirect('/chatify');
        }

        return redirect()->route('frontend.espace-membre')
                        ->withErrors(['email' => 'Les identifiants fournis sont incorrects.'])
                        ->withInput();
    }
}
