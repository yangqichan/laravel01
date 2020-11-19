<div class="list_c">
            	
                <ul class="cate_list">
                    @foreach($data as $k=>$v)
                	<li>
                    	<div class="img"><a href="#"><img src="{{$v->goods_img}}" width="210" height="185" /></a></div>
                        <div class="price">
                            <font>￥<span>{{$v->goods_price}}</span></font> &nbsp; 
                        </div>
                        <div class="name"><a href="#">{{$v->goods_name}}</a></div>
                        <div class="carbg">
                        	<a href="#" class="ss">收藏</a>
                            <a href="#" class="j_car">加入购物车</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                
                <div class="pages">
                    <span href="#" class="p_pre">{{$data->links('vendor.pagination.simple-bootstrap-4')}}</span>
                   
                </div>
                
                
            </div>