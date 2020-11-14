<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
class Couponcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Coupon::get();
        return view('admin.coupon.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.coupon.create');
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
        //dd($post);
        $post['start_time']=strtotime($post['start_time']);
        $post['end_time']=strtotime($post['end_time']);
        //dd($post);
        $res=Coupon::create($post);
        if ($res) {
            return redirect('coupon');
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
        $data=Coupon::where('coupon_id',$id)->first();
        return view('admin.coupon.edit',compact('data'));
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
        //dd($post);
        $post['start_time']=strtotime($post['start_time']);
        $post['end_time']=strtotime($post['end_time']);
        //dd($post);
        $res=Coupon::where('coupon_id',$id)->update($post);
        if ($res!==false) {
            return redirect('coupon');
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
        $res=Coupon::destroy($id);
        if ($res) {
            return json_encode(['code'=>001,'msg'=>"删除成功"]);
        }
    }
}
