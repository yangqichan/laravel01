<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goodstype;
use App\Models\Attr;

class GoodstypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Goodstype::where('is_del',0)->get();
        return view('admin.goodstype.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goodstype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        // dd($data);
        $res = Goodstype::insert($data);
        if($res){
            return redirect('/goodstype/index');
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
        $goodstype = Goodstype::where('type_id',$id)->first();
        // dd($goodstype);
        return view('admin.goodstype.edit',['goodstype'=>$goodstype]);
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
        $data = $request->except('_token');
        // dd($data);
        $res = Goodstype::where('type_id',$id)->update($data);
        if($res){
            return redirect('/goodstype/index');
        }else{
            return redirect('/goodstype/edit/'.$id);
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
        $data = Attr::where(['is_del'=>0,'type_id'=>$id])->get();
        if(count($data)>0){
            return $message=[
                'code'=>10000,
                'msage'=>'该类型底下有属性！'
            ];
        }
        $res = Goodstype::where('type_id',$id)->update(['is_del'=>1]);
        if($res){
            return $message=[
                'code'=>200,
                'msage'=>'删除成功'
            ];
        }
    }
}
