<?php

namespace App\Http\Controllers;
use App\Models\WatchList;
use App\Http\Requests\StoreWatchListRequest;
use App\Http\Requests\UpdateWatchListRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $se = $request->search;
        $fi = $request->filter;
        if($fi == null){
            $watchList = WatchList::select('watch_lists.*')
            ->join('movies','watch_lists.movie_id', 'movies.id')
            ->where('watch_lists.user_id', Auth::user()->id)
            ->where(function ($query) use ($se, $fi) {
                $query->where('movies.title', 'like', '%' . $se . '%');
                $query->where('watch_lists.status','<>','Remove');
            })
            ->get();
        }else{
            $watchList = WatchList::select('watch_lists.*')
            ->join('movies','watch_lists.movie_id', 'movies.id')
            ->where('watch_lists.user_id', Auth::user()->id)
            ->where(function ($query) use ($se, $fi) {
                $query->where('movies.title', 'like', '%' . $se . '%');
                $query->where('watch_lists.status',$fi);
                $query->where('watch_lists.status','<>','Remove');
            })
            ->get();
        }
        if($se == null){
            return view('watchlist' , compact('watchList'));
        }else{
            return view('watchlist' , compact('watchList','se'));
        }
    }

    public function filter(Request $request)
    {
        $se = $request->search;
        $fi = $request->filter;
        if($fi == null){
            $watchList = WatchList::select('watch_lists.*')
            ->join('movies','watch_lists.movie_id', 'movies.id')
            ->where('watch_lists.user_id', Auth::user()->id)
            ->where(function ($query) use ($se, $fi) {
                $query->where('movies.title', 'like', '%' . $se . '%');
                $query->where('watch_lists.status','<>','Remove');
            })
            ->get();
        }else{
            $watchList = WatchList::select('watch_lists.*')
            ->join('movies','watch_lists.movie_id', 'movies.id')
            ->where('watch_lists.user_id', Auth::user()->id)
            ->where(function ($query) use ($se, $fi) {
                $query->where('movies.title', 'like', '%' . $se . '%');
                $query->where('watch_lists.status',$fi);
                $query->where('watch_lists.status','<>','Remove');
            })
            ->get();
        }
        if($se == null){
            return view('watchlist' , compact('watchList'));
        }else{
            return view('watchlist' , compact('watchList','se'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWatchListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWatchListRequest $request)
    {
        $watchList = WatchList::where('user_id', Auth::user()->id)->pluck('movie_id')->toArray();
        if(in_array($request->movie_id, $watchList)){
            return redirect()->back()->with('msg', 'Already in Watch List');
        }
        $wl = new WatchList;
        $wl->movie_id = $request->movie_id;
        $wl->user_id = Auth::user()->id;
        $wl->status = 'Planned';
        $wl->save();
        return redirect()->route('addWatchlist.index')->with('msg', 'Success Add To Watch List');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function show(WatchList $watchList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function edit(WatchList $watchList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWatchListRequest  $request
     * @param  \App\Models\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWatchListRequest $request, WatchList $addWatchlist)
    {
        $request->validate([
            'status'=>'required|in:Planned,Watching,Finished,Remove',
        ]);
        $addWatchlist->status = $request->status;
        $addWatchlist->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function destroy(WatchList $watchList)
    {
        //
    }
}
