<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::where('is_del',0)->get();
        $category = Category::where('is_del',0)->get();
        $category = $this->getTree($category);
        return view('admin.goods.create',['brand'=>$brand,'category'=>$category]);
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
}
