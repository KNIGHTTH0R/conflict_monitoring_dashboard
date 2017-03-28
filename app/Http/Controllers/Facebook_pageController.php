<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facebook_page;

class Facebook_pageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fb = Facebook_page::with('category')->paginate(10);
        return $fb;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fb = new Facebook_page;
        $fb->page_id = $request->page_id;
        $fb->page_name = $request->page_name;
        $fb->category_id = $request->category_id;
        $fb->save();
        return $fb;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fb = Facebook_page::with('category')->find($id);
        return $fb;
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
        $fb = Facebook_page::with('category')->find($id);
        $fb->page_id = $request->page_id;
        $fb->page_name = $request->page_name;
        $fb->category_id = $request->category_id;
        $fb->save();
        return $fb;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fb = Facebook_page::find($id);
        $fb->delete();
    }
}
