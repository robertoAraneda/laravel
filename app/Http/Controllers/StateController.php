<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;

class StateController extends Controller
{

  // public function __construct()
  // {
  //     $this->middleware('auth:api');
  // }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    try {
      $states = State::orderBy('id')
        ->with(['createdUser', 'updatedUser'])
        ->get()
        ->map(function ($state) {

          $state['links'] = [
            'href' => "/states/" . $state->id,
            'rel' => 'self',
            'type' => 'GET'
          ];

          return $state;
        });

      return response()->json([
        'success' => true,
        'data' => [
          'link' => '/states',
          'size' => count($states),
          'states' => $states
        ],
        'error' => null
      ]);
    } catch (\Exception $exception) {
      return response()->json([
        'success' => false,
        'data' => null,
        'error' => $exception
      ]);
    }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
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
}
