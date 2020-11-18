<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use DB;
use App\Models\Goods;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class CategorylistController extends Controller
{
    //商品列表页面（点击搜索后的页面）
    public function categorylist(Request $request){
        $query=$request->all();
        $where=[];
        if(isset($query['goods_price'])){
            $goods_price=explode('元',$query['goods_price']);//字符串切割成数组切成2块
            $goods_price=explode('-', $goods_price[0]);
            $where[]=['goods_price','>',$goods_price[0]];
            if($goods_price[1]){
                $where[]=['goods_price','<',$goods_price[1]];
            }
        }
        if(isset($query['brand_id'])){
            $where[]=['brand_id','=',$query['brand_id']];
        }
        if(isset($request->cate_id)){
            $where[]=['cate_id','=',$cate_id];
        }
        $cate_id=8; //$request->cate_id;
        $data=Goods::where($where)->get();
        $count=Goods::where($where)->count();
        $money=Goods::where('cate_id',$cate_id)->max('goods_price');
        $money=$this->money($money);
        $brand=[];
        foreach ($data as $k => $v) {
            $brand[]=Goods::where('goods_id',$v->goods_id)->value('brand_id');
        }
        $brand=array_unique($brand);
        $brand_name=[];
        foreach ($brand as $key => $value) {
            $brand_name=Brand::where('brand_id',$value)->get();
        }
        $url='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REDIRECT_URL'];
        //dd($money);
        return view('index.category.categorylist',['brand_name'=>$brand_name,'money'=>$money,'data'=>$data,'count'=>$count,'url'=>$url,'query'=>$query]);
    }
    //获取到价格区间
    public function money($money){
        $length=strlen($money);
        $dd='1'.str_repeat(0,$length-4);//循环0，求出是几位数
        $s=substr($money,0,1);//截取第一位
        $money=$s*$dd;//最大价格向下取整
        $price=[];
        $avg=$money/5;
        for($i=0,$j=1;$i<$money;$i++,$j++){
            $price[]=$i.'-'.$avg*$j.'元';//得出区间
            $i=$avg*$j-1;//用于下一次循环，因为自增所以减一
        }
        $price[]=$money.'元以上';
        return $price;
    }
}
