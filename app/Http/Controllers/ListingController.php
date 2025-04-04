<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Listing;
use App\Models\Province;
use App\Models\Tag;


class ListingController extends Controller
{
 
    public function index()
    {
        $listings = Listing::all();
        return view('welcome', compact('listings'));
    }


    public function create()
    {
        $provinces = Province::all();
        $tags = Tag::all();
        return view('listings.create', compact('provinces','tags'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'price_per_night' => 'required|numeric',
            'location' => 'required|string',
            'province_id' => 'required|exists:provinces,id',
            'max_guests' => 'required|integer|min:1',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive',
            'latitude' => 'required',
            'longitude' => 'required',
            'tags' => 'array',  
            'tags.*' => 'exists:tags,id', 
        ]);
    
        $listing = Listing::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'price_per_night' => $request->price_per_night,
            'location' => $request->location,
            'province_id' => $request->province_id,
            'max_guests' => $request->max_guests,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'status' => $request->status,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        if ($request->has('tags')) {
            $listing->tags()->sync($request->tags);
        }    
    
        return redirect()->route('listings.index')->with('success', 'Propiedad creada exitosamente.');
    }
    
    public function myListings()
    {
        $user = auth()->user();
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }
    
        $listings = $user->listings ?? collect(); 
        return view('listings.myListings', compact('listings'));
    }
    


    public function show(Listing $listing)
    {
        $listing->load('tags');
        return view('listings.show', compact('listing'));
    }

    public function edit(Listing $listing)
    {
        $provinces = Province::all();
        $tags = Tag::all();
        return view('listings.edit', compact('listing', 'provinces', 'tags'));
    }
    


    public function update(Request $request, Listing $listing)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'province_id' => 'required|exists:provinces,id',
            'location' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'price_per_night' => 'required|numeric',
            'max_guests' => 'required|integer',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);
    
        $listing->update($request->all());
    
        return redirect()->route('listings.myListings')->with('success', 'Propiedad actualizada correctamente.');
    }
    


    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->route('listings.myListings')->with('success', 'Propiedad eliminada.');
    }
}
