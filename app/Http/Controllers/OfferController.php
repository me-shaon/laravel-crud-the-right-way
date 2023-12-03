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
    public function index(Request $request, OfferService $offerService)
    {
        $this->authorize('viewAny', Offer::class);

        $categories = Category::orderBy('title')->get();
        $locations = Location::orderBy('title')->get();

        $offers = $offerService->get($request->query());

        return view('offers.index', compact('offers', 'categories', 'locations'));
    }

    /**
     * Display a listing of the resource for the logged-in user
     */
    public function myOffers(Request $request, OfferService $offerService)
    {
        $this->authorize('viewMy', Offer::class);

        $categories = Category::orderBy('title')->get();
        $locations = Location::orderBy('title')->get();

        $offers = $offerService->getMine($request->query());

        return view('offers.index', compact('offers', 'categories', 'locations'));
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
    public function edit(Offer $offer)
    {
        $this->authorize('update', $offer);

        $categories = Category::orderBy('title')->get();
        $locations = Location::orderBy('title')->get();

        return view('offers.edit', compact('offer','categories', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOfferRequest $request, Offer $offer, OfferService $offerService)
    {
        $this->authorize('update', $offer);

        $offerService->update(
            $offer,
            $request->validated(),
            $request->hasFile('image') ? $request->file('image') : null
        );

        return redirect()->back()->with(['success' => 'Offer updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer, OfferService $offerService)
    {
        $offerService->destroy($offer);

        return response('Offer deleted');
    }
}
