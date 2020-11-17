<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Goodstype;
use App\Models\Attr;
use App\Models\Goods;
use App\Models\Goodsattr;
use App\Models\Product;
use Illuminate\Support\Facades\DB; 
use Illuminate\Validation\Rule;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Goods::select('goods.*','brand_name','cate_name')->leftjoin('brand','brand.brand_id','=','goods.brand_id')->leftjoin('category','goods.cate_id','=','category.cate_id')->where('goods.is_del',0)->get();
        // dd($goods);
        return view('admin.goods.index',['goods'=>$goods]);
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
        //类型
        $goods_type = Goodstype::where('is_del',0)->get();
        return view('admin.goods.create',['brand'=>$brand,'category'=>$category,'goods_type'=>$goods_type]);
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
        $request->validate([
            'goods_name' => 'required|unique:goods',
            'goods_price' => 'required',
            'num' => 'required',
            'cate_id' => 'required',
            'brand_id' => 'required',
        ],[
            'goods_name.required'=>'商品名称不能为空',
            'goods_name.unique'=>'商品名称已存在',
            'goods_price.required'=>'商品价格不能为空',
            'num.required'=>'商品数量不能为空',
            'cate_id.required'=>'商品分类不能为空',
            'brand_id.required'=>'商品品牌不能为空',
        ]);
        DB::beginTransaction();
        try{
            $attr_price_list = $request->attr_price_list;
            $attr_value_list = $request->attr_value_list;
            $attr_id_list = $request->attr_id_list;
            $data = $request->except(['_token','attr_price_list','attr_value_list','attr_id_list','type_id']);
            if(empty($goods_sn)){
                $data['goods_sn'] = 'SHOP'.time().rand(0000,9999);
            }
            //图片
            if($request->hasFile('goods_img') && $request->file('goods_img')->isValid()) {
                $file = $request->goods_img;
                $data['goods_img'] = '/'.$file->store('goods_img');
            }
            // dd($request->file('goods_imgs'));
            //相册
            if($request->hasFile('goods_imgs')) {
                $file = $request->goods_imgs;
                // dd($file);
                $goods_imgs=[];
                foreach($file as $k=>$v){
                    $goods_imgs[] = '/'.$v->store('goods_imgs');
                }
                $data['goods_imgs']=implode('|',$goods_imgs);
            }
            $data['add_time']=time();
            //$res指的是goods_id
            $goods_id = Goods::insertGetId($data);
            // dd($goods_id);
            if(!empty($goods_id)){
                if(!empty($attr_id_list)){
                    $arr = [];
                    for($i=0;$i<count($attr_id_list);$i++){
                        $arr[]=[
                            'goods_id'=>$goods_id,
                            'attr_id'=>$attr_id_list[$i],
                            'attr_value'=>$attr_value_list[$i],
                            'attr_price'=>$attr_price_list[$i] ?? 0
                        ];
                    }
                    Goodsattr::insert($arr);         
                }
                //判断有没有规格
                $goods_specs = $this->goodsSpecs($goods_id);
                if(count($goods_specs)>0){
                    $new_goods_specs = [];
                    foreach($goods_specs as $k=>$v){
                        $new_goods_specs['attr_name'][$v['attr_id']] = $v['attr_name'];
                        $new_goods_specs['attr_values'][$v['attr_id']][$v['goods_attr_id']] = $v['attr_value'];
                    }
                    $goods = Goods::where('goods_id',$goods_id)->first(['goods_name','goods_sn','goods_id']);
                    DB::commit();
                    return view('admin.goods.product',['new_goods_specs'=>$new_goods_specs,'goods'=>$goods]);
                }              
                return redirect('/goods/index');
            }
        }catch(Exception $e){
           dump($e->getMessage());
            DB::rollBack();
        }
    }
    /**
     * 添加货品
     */
    public function product(Request $request){
        $data = $request->except('_token');
        if(count($data['attr'])>0){
            $attr = $data['attr'];
//            dump($attr);
            $firstKey = array_key_first($attr);
//            dd($attr[$firstKey]);
            $count = count($attr[$firstKey]);
//            dd($count);
            for($i=0;$i<$count;$i++){
                $arr[] = array_column($attr,$i);
            }
            $product = [];
            foreach($arr as $k=>$v){
                $product[]=[
                    'goods_id'=>$data['goods_id'],
                    'goods_attr'=>implode('|',$v),
                    'product_sn'=>$data['product_sn'][$k] ?? 'SHOP'.$data['goods_id'].time().rand(0000,9999),
                    'product_number'=>$data['product_number'][$k]
                ];
            }
//            dd($product);
           $res =  Product::insert($product);
            if($res){
                return redirect('/goods/index');
            }
        }
//        dd($data);
    }
    /**
     * 判断有没有规格
     */
    public function goodsSpecs($goods_id){
        $data = Goods::leftjoin('goods_attr as ga','goods.goods_id','=','ga.goods_id')
            ->leftjoin('attribute as ab','ga.attr_id','=','ab.attr_id')
            ->where(['ga.goods_id'=>$goods_id,'ab.attr_type'=>1])->get();
        return $data;
    }

    /**
     * Display the specified resource.
     
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
        $goods = Goods::where('goods_id',$id)->first();
        $brand = Brand::where('is_del',0)->get();
        $category = Category::where('is_del',0)->get();
        $category = $this->getTree($category);
        //类型
        $goods_type = Goodstype::where('is_del',0)->get();
        return view('admin.goods.edit',['goods'=>$goods,'brand'=>$brand,'category'=>$category,'goods_type'=>$goods_type]);
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
            'goods_name' =>
                [
                    'required',
                    Rule::unique('goods')->ignore(request()->goods_id,'goods_id')
                ],
            'goods_price' => 'required',
            'num' => 'required',
            'cate_id' => 'required',
            'brand_id' => 'required',
        ],[
            'goods_name.required'=>'商品名称不能为空',
            'goods_name.unique'=>'商品名称已存在',
            'goods_price.required'=>'商品价格不能为空',
            'num.required'=>'商品数量不能为空',
            'cate_id.required'=>'商品分类不能为空',
            'brand_id.required'=>'商品品牌不能为空',
        ]);
        $data = $request->except(['_token','attr_price_list','attr_value_list','attr_id_list','type_id']);
        if(empty($goods_sn)){
            $data['goods_sn'] = 'SHOP'.time().rand(0000,9999);
        }
        //图片
        if($request->hasFile('goods_img') && $request->file('goods_img')->isValid()) {
            $file = $request->goods_img;
            $data['goods_img'] = '/'.$file->store('goods_img');
        }
        // dd($request->file('goods_imgs'));
        //相册
        if($request->hasFile('goods_imgs')) {
            $file = $request->goods_imgs;
            // dd($file);
            $goods_imgs=[];
            foreach($file as $k=>$v){
                $goods_imgs[] = '/'.$v->store('goods_imgs');
            }
            $data['goods_imgs']=implode('|',$goods_imgs);
        }
        // $data['add_time']=time();
        //$res指的是goods_id
        $res = Goods::where('goods_id',$id)->update($data);
        if($res !== false){
            return redirect('/goods/index');
        }else{
            return redirect('/goods/edit/'.$id);
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
        $res = Goods::where('goods_id',$id)->update(['is_del'=>1]);
        if($res){
            Goodsattr::where('goods_id',$id)->update(['is_del'=>1]);
            Product::where('goods_id',$id)->update(['is_del'=>1]);
            return redirect('/goods/index');
        }
    }
    /**
     * 商品属性
     */
    public function goodsattr(){
       $type_id = request()->type_id;
    //    dd($type_id);
        $attr = Attr::where('type_id',$type_id)->where('is_del',0)->get();
        return view('admin.goods.goodsattr',['attr'=>$attr]);
    }
}
