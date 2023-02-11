<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Offer::class, 'offer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        $offers = Offer::paginate(10);
        return view('offer.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $offers = Offer::all();
        return view('offer.create', compact('offers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'price' => 'required|numeric',
            'end_time' => 'required|date|after:today',
        ]);
        $offer = new Offer();
        $offer->price = $request->price;
        $offer->end_time = $request->end_time;
        $offer->user_id = Auth::user()->id;
        $offer->post_id = $request->post_id;
        $offer->save();
        (new ActionController)->new_notification($offer->user_id, 'Offer in', 'offer/'.$offer->post_id.'/edit');
        (new ActionController)->new_notification($offer->post->user_id, 'New offer for your post', 'offer/'.$offer->id).'/edit';
        return back()->with('status', 'successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        $post = Post::with('images')->find($offer->post->id);
        return view('offer.show', compact('offer', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        $post = Post::with('images')->find($offer->post->id);
        return view('offer.edit', compact('offer', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Offer $offer)
    {
        $offer->update([
            'price' => $request->input("price"),
            'end_time' => $request->input("end_time"),
        ]);
        (new ActionController)->new_notification($offer->user_id, 'The offer has been updated', 'offer/'.$offer->id.'/edit');
        (new ActionController)->new_notification($offer->post->user_id, 'The offer has been updated', 'offer/'.$offer->id.'/edit');
        return back()->with('status', 'Successfully updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\RedirectResponse
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        (new ActionController)->new_notification($offer->user_id, 'The offer has been deleted', 'posts/'.$offer->post_id);

        return back()->with('status', 'Successfully deleted');
    }
}
