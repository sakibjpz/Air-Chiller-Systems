<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|url',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        // Handle image upload - FOLLOWING YOUR PATTERN
        if ($request->hasFile('logo')) {
            $imageName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('images/clients'), $imageName);
            $validated['logo'] = 'images/clients/' . $imageName;
        }

        Client::create($validated);

        return redirect()->route('admin.clients.index')
                         ->with('success', 'Client added successfully!');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        // Handle image upload - FOLLOWING YOUR PATTERN
        if ($request->hasFile('logo')) {
            $imageName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('images/clients'), $imageName);
            $validated['logo'] = 'images/clients/' . $imageName;
            
            // Delete old image if exists
            if ($client->logo && file_exists(public_path($client->logo))) {
                unlink(public_path($client->logo));
            }
        } else {
            unset($validated['logo']);
        }

        $client->update($validated);

        return redirect()->route('admin.clients.index')
                         ->with('success', 'Client updated successfully!');
    }

    public function destroy(Client $client)
    {
        // Delete image if exists
        if ($client->logo && file_exists(public_path($client->logo))) {
            unlink(public_path($client->logo));
        }
        
        $client->delete();
        
        return redirect()->route('admin.clients.index')
                         ->with('success', 'Client deleted successfully!');
    }
}