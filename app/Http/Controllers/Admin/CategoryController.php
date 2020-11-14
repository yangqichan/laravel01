<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelS\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('is_del',0)->get();
        $category = $this->getTree($category);
        // dd($category);
        return view('admin.category.index',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::where('is_del',0)->get();
        $cateinfo = $this->getTree($category);
        // dd($cateinfo);
        // dd($data);
        return view('admin.category.create',['cateinfo'=>$cateinfo]);
    }
    /**
     * 无限极分类
     */
    public function getTree($arr, $parent_id=0 , $level=0){
        static $tree = array();
        //在$arr内 查找以$parent_id为父分类ID的数据
        //遍历所有的 $arr内元素
        foreach($arr as $row) {
            //判断parent_id字段是否是 $parent_id
            if($row['parent_id'] == $parent_id) {
                //找到当前$parent_id下的子分类了。
                $row->level=$level;
                $tree[] = $row;
                //应该先去找 当前分类的子分类
                $this->getTree($arr, $row['cate_id'],$level+1);
            }
        }
        //返回查找结果
        return $tree;
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
        $res = Category::insert($data);
        if($res){
            return redirect('/category/index');
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
        $data=Category::where("cate_id",$id)->first();
        $category=Category::where('is_del',0)->get();
        $cateinfo = $this->getTree($category);
        return view('admin.category.edit',['data'=>$data,'cateinfo'=>$cateinfo]);
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
        $res = Category::where('cate_id',$id)->update($data);
        if($res !== false){
            return redirect('/category/index');
        }else{
            return redirect('/category/edit/$id');
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
        $re=Category::where(["parent_id"=>$id,'is_del'=>0])->first();
        //        dd($re);
        if($re){
            return  $msage=[
                'code'=>'100000',
                'msage'=>'该下面有子分类不能删除！',
                'success'=>true
            ];
        }
        //判断分类底下是否有商品，有商品不能删除

        $res = Category::where('cate_id',$id)->update(['is_del'=>1]);
        if($res){
            return  $msage=[
                'code'=>'200',
                'msage'=>'删除成功',
                'success'=>true
            ];
        }
    }
}
