<?php

namespace LaravelForm\Http\Controllers;

use Illuminate\Http\Request;
use LaravelForm\Http\Requests\CreateDiscussionRequest;
use LaravelForm\Discussion;
use LaravelForm\Reply;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function __construct()
   {
       $this->middleware('auth')->only(['create','store']);
   }

    public function index()
    {
        return view('discussion.index')->with('discussions',Discussion::paginate(6));#,return view('discussion.index',['discussions'=>Discussion::paginate(5)]
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        auth()->user()->discussions()->create([
            'title' => $request->title,
            'contnt' => $request->contnt,
            'channel_id' => $request->channel,
            'slug' => str_slug($request->title),
        ]);
        return redirect()->route('discussions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        return view('discussion.show',[
            'discussion'=>$discussion
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function reply(Discussion $discussion , Reply $reply){
        $discussion->makeAsBestReply($reply);
        return redirect()->back()->with('message','mark as best done');
    }
}
