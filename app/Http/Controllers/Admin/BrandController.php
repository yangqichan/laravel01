<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand_name = request()->brand_name;
        $where=[];
        if($brand_name){
            $where[]=[
                'brand_name','like',"%$brand_name%"
            ];
        }
        $brand = Brand::where('is_del',0)->where($where)->paginate(5);
        return view('admin.brand.index',['brand'=>$brand,'brand_name'=>$brand_name]);
    }

    /**
     * 添加品牌
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * 执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brand',
        ],[
            'brand_name.required'=>"品牌名称不能为空",
            'brand_name.unique'=>"品牌名称已存在",
        ]);
        $brand_name = request()->brand_name;
        $brand_desc = request()->brand_desc;
        $brand_url = request()->brand_url;
        if ($request->hasFile('brand_logo') && $request->file('brand_logo')->isValid()) {
            $file = $request->brand_logo;
            $brand_logo = '/'.$file->store('brand_logo');
            // $brand_logo = env('UPLOAD_URL').'/'.$brand_logo;
        }
        $data = [
            'brand_name'=>$brand_name,
            'brand_desc'=>$brand_desc,
            'brand_logo'=>$brand_logo,
            'brand_url'=>$brand_url
        ];
        $res = Brand::insert($data);
        if($res){
            return redirect('/brand/index');
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
        $brand = Brand::where('brand_id',$id)->first();
        return view('admin.brand.edit',['brand'=>$brand]);
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
        $request->validate([
            'brand_name' =>
                [
                    'required',
                    Rule::unique('brand')->ignore(request()->brand_id,'brand_id')
                ],
        ],[
            'brand_name.required'=>'品牌名称不能为空',
            'brand_name.unique'=>'品牌名称已存在',
        ]);
        $data=$request->except('_token');
        if ($request->hasFile('brand_logo') && $request->file('brand_logo')->isValid()) {
            $file = $request->brand_logo;
            $data['brand_logo'] ='/'.$file->store('brand_logo');
            // $data['brand_logo'] = env('UPLOAD_URL').'/'.$brand_logo;

        }
        // dd($data);
        $res = Brand::where('brand_id',$id)->update($data);
        if($res !== false){
            return redirect('/brand/index');
        }else{
            return redirect('/brand/edit/$id');
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
        $res = Brand::where(['brand_id'=>$id])->update(['is_del'=>1]);
        if($res){
            return redirect('/brand/index');
        }
    }
}
