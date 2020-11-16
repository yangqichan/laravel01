<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attr;
use App\Models\Goodstype;
use App\Models\Goodsattr;
class GoodsattrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type_id)
    {
        $data = Attr::leftjoin('goods_type','goods_type.type_id','=','attribute.type_id')->where('attribute.type_id',$type_id)->where('attribute.is_del',0)->get();
        // dd($data);
        return view('admin.goodsattr.index',['data'=>$data,'type_id'=>$type_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type_id)
    {
        $data = Goodstype::get();
        return view('admin.goodsattr.create',['data'=>$data,'type_id'=>$type_id]);
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
        $res = Attr::insert($data);
        if($res){
            return redirect("/goodsattr/index/".$data['type_id']);
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
        $attr = Attr::where('attr_id',$id)->first();
        $data = Goodstype::get();
        return view('admin.goodsattr.edit',['attr'=>$attr,'data'=>$data]);
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
        $res = Attr::where('attr_id',$id)->update($data);
        if($res!==false){
            return redirect("/goodsattr/index/".$data['type_id']);
        }else{
            return redirect("/goodsattr/edit/".$id);
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
        $goodsattr = Goodsattr::where('attr_id',$id)->get();
        if(count($goodsattr)>0){
            return $msage=[
                'code'=>10000,
                'msage'=>'该属性底下有商品,不能删！'
            ];
        }
        $attr = Attr::where('attr_id',$id)->update(['is_del'=>1]);
        if($attr){
            return $msage=[
                'code'=>200,
                'msage'=>'删除成功'
            ];
        }
    }
}
