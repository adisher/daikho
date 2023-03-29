<?php

namespace App\Http\Controllers;

use App\MarketingCampaigns;
use Illuminate\Http\Request;

class MarketingCampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = MarketingCampaigns::all();
        return view('marketing-urls.index', compact('urls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marketing-urls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = $request->input('status') == 'active' ? true : false;
        $callbacks = $request->input('callbacks') == true ? true : false;
        $freeSignup = $request->input('freeSignup') == true ? true : false;
        $request->validate([
            'slug' => 'required|unique:marketing_campaigns,slug'
        ]);

        $url = MarketingCampaigns::create([
            'slug' => $request->input('slug'),
            'callback_id' => $request->input('callback_id'),
            'source_id' => $request->input('source_id'),
            'visible' => $status,
            'freeSignup' => $callbacks,
            'callbacks' => $freeSignup,
        ]);


        return redirect()->route('marketing-urls.index')->with('success', 'Url created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MarketingCampaigns  $marketingURLs
     * @return \Illuminate\Http\Response
     */
    public function show(MarketingCampaigns $marketingURLs)
    {
        return view('marketing-urls.show', compact('url'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MarketingCampaigns  $marketingURLs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = MarketingCampaigns::findOrFail($id);
        return view('marketing-urls.edit', compact('url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\MarketingCampaigns  $marketingURLs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarketingCampaigns $marketingURLs, $id)
    {
        // dd($request->all());

        $marketingURL = MarketingCampaigns::where('id', $id)->firstOrFail();

        $status = $request->input('status') == 'active' ? true : false;
        $callbacks = $request->input('callbacks') == true ? true : false;
        $freeSignup = $request->input('freeSignup') == true ? true : false;
        $marketingURL->update([
            'slug' => $request->input('slug'),
            'callback_id' => $request->input('callback_id'),
            'source_id' => $request->input('source_id'),
            'callbacks' => $callbacks,
            'freeSignup' => $freeSignup,
            'visible' => $status,
        ]);

        return redirect()->route('marketing-urls.index')->with('success', 'Url updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MarketingCampaigns  $marketingURLs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $url = MarketingCampaigns::findOrFail($id);
        $url->delete();

        return redirect()->route('marketing-urls.index')->with('success', 'Url deleted successfully!');
    }
}
