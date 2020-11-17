<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Position;
class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Ad::leftjoin('position','ad.position_id','=','position.position_id')->get();
        return view('admin.ad.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.ad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=request()->except('_token');
        $post['start_time']=strtotime($post['start_time']);
        $post['end_time']=strtotime($post['end_time']);
        // if (request()->hasFile('ad_img') && request()->file('ad_img')->isValid()) {
        //     # code...
        // }
        $red=Ad::insert($post);
        if ($red) {
            return redirect('ad');
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Ad::where('ad_id',$id)->first();
        return view('admin.ad.edit',compact('data'));
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
        $post=request()->except('_token');
        $post['start_time']=strtotime($post['start_time']);
        $post['end_time']=strtotime($post['end_time']);
        $red=Ad::where('ad_id',$id)->update($post);
        if ($red!==false) {
            return redirect('ad');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $red=Ad::destroy($id);
        if ($red) {
            return json_encode(['code'=>001,'msg'=>'删除成功']);
        }
    }
}
