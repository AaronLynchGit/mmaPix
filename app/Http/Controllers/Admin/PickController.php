<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pick;
use App\Models\Event;
use App\Models\Fight;
use App\Models\Fighter;
use Auth;


class PickController extends Controller
{


  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user();
      $picks = Pick::where('user_id',auth()->id())->get();
      // $picks = Pick::all();

      return view('admin.picks.index', [
        'picks' => $picks,
        'user' => $user
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $event = Event::findOrFail($id);

      $fights = Fight::where('event_id', $id)->get();
      $fighters = Fighter::all();
    //  $fighters = Fighter::all();

      return view('admin.picks.create', [
        'event' => $event,
        'fights' => $fights,
        'fighters' => $fighters
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
      $user = Auth::user();

      $pick = new Pick();

      $pick->user_id = $user->id;
      $pick->event_id = $id;
      $pick->fighter_id1 = $request->input('fighter_id1');
      $pick->fighter_id2 = $request->input('fighter_id2');
      $pick->fighter_id3 = $request->input('fighter_id3');
      $pick->fighter_id4 = $request->input('fighter_id4');
      $pick->fighter_id5 = $request->input('fighter_id5');
      $pick->fighter_id6 = $request->input('fighter_id6');
      $pick->fighter_id7 = $request->input('fighter_id7');
      $pick->fighter_id8 = $request->input('fighter_id8');
      $pick->fighter_id9 = $request->input('fighter_id9');
      $pick->fighter_id10 = $request->input('fighter_id10');

      $pick->save();

      return redirect()->route('admin.picks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $pick = Pick::findOrFail($id);

      return view('admin.picks.show', [
        'pick' => $pick
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
      $pick = Pick::findOrFail($id);

      return view('admin.picks.edit', [
        'pick' => $pick
      ]);
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


      $pick = Pick::findOrFail($id);

      $pick->fight1 = $request->input('fight1');
      $pick->fight2 = $request->input('fight2');
      $pick->fight3 = $request->input('fight3');
      $pick->fight4 = $request->input('fight4');
      $pick->fight5 = $request->input('fight5');
      $pick->fight6 = $request->input('fight6');
      $pick->fight7 = $request->input('fight7');
      $pick->fight8 = $request->input('fight8');
      $pick->fight9 = $request->input('fight9');
      $pick->fight10 = $request->input('fight10');

      $pick->save();

      return redirect()->route('user.picks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pick = Pick::findOrFail($id);
      $pick->delete();

      return redirect()->route('admin.picks.index');
    }
}
