<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Offer;
use App\Services\OfferService;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Offer::class);

        $categories = Category::orderBy('title')->get();
        $locations = Location::orderBy('title')->get();

        return view('offers.create', compact('categories', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfferRequest $request, OfferService $offerService)
    {
        $this->authorize('create', Offer::class);

        $offerService->store(
            $request->validated(),
            $request->hasFile('image') ? $request->file('image') : null
        );

        return redirect()->back()->with(['success' => 'Offer created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        $offer->load(['author', 'categories', 'locations']);
        return view('offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
