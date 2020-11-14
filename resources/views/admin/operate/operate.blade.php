@extends('admin.layout.main')
@section('title','后台运营统计模块')
@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- 年数据 -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>

                <h3 class="box-title">年数据</h3>

                <div class="box-tools pull-right">
                    <button
                        type="button"
                        class="btn btn-box-tool"
                        data-widget="collapse"
                    >
                        <i class="fa fa-minus"></i>
                    </button>
                    <button
                        type="button"
                        class="btn btn-box-tool"
                        data-widget="remove"
                    >
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div id="line-chart" style="height: 400px">
                <!-- 内容 -->
                <div id="container" style="min-width:400px;height:400px"></div>
                </div>
            </div>
            <!-- /.box-body-->
        </div>
        <!-- /.box -->

        <!-- 月数据 -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>

                <h3 class="box-title">月数据</h3>

                <div class="box-tools pull-right">
                    <button
                        type="button"
                        class="btn btn-box-tool"
                        data-widget="collapse"
                    >
                        <i class="fa fa-minus"></i>
                    </button>
                    <button
                        type="button"
                        class="btn btn-box-tool"
                        data-widget="remove"
                    >
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                    <div id="line-chart" style="height: 400px">
                        <!-- 内容 -->
                        <div id="container2" style="min-width:400px;height:400px"></div>
                    </div>
            </div>
            <!-- /.box-body-->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-6">
        <!-- 周数据 -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>

                <h3 class="box-title">周数据</h3>

                <div class="box-tools pull-right">
                    <button
                        type="button"
                        class="btn btn-box-tool"
                        data-widget="collapse"
                    >
                        <i class="fa fa-minus"></i>
                    </button>
                    <button
                        type="button"
                        class="btn btn-box-tool"
                        data-widget="remove"
                    >
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div id="bar-chart" style="height: 400px">
                <!-- 内容 -->
                <div id="container3" style="min-width:400px;height:400px"></div>
                    
                </div>
            </div>
            <!-- /.box-body-->
        </div>
        <!-- /.box -->

        <!-- 日数据 -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>

                <h3 class="box-title">日数据</h3>

                <div class="box-tools pull-right">
                    <button
                        type="button"
                        class="btn btn-box-tool"
                        data-widget="collapse"
                    >
                        <i class="fa fa-minus"></i>
                    </button>
                    <button
                        type="button"
                        class="btn btn-box-tool"
                        data-widget="remove"
                    >
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div id="donut-chart" style="height: 400px">
                    <!-- 内容 -->
                    <div id="container4" style="min-width:400px;height:400px"></div>
                </div>
            </div>
            <!-- /.box-body-->
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- <script type="text/javascript" src="/adminlte/dist/error/jquery.min.js"></script> -->
<script>
// 年数据图表
var chart = Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: '年订单数据'
    },
    subtitle: {
        text: '数据来源: 大狗管家.com'
    },
    xAxis: {
        categories: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月']
    },
    yAxis: {
        title: {
            text: '订单'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                // 开启数据标签
                enabled: true          
            },
            // 关闭鼠标跟踪，对应的提示框、点击事件会失效
            enableMouseTracking: true
        }
    },
    series: [{
        name: '支付',
        data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 100000, 26.5, 23.3, 18.3, 13.9, 9.6]
    }, {
        name: '退款',
        data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
    }]
});
// 月数据图标
Highcharts.chart('container2', {
	chart: {
		plotBackgroundColor: null,
		plotBorderWidth: null,
		plotShadow: false,
		type: 'pie'
	},
	title: {
		text: '当前月订单统计'
	},
	tooltip: {
		pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	},
	plotOptions: {
		pie: {
			allowPointSelect: true,
			cursor: 'pointer',
			dataLabels: {
				enabled: true,
				format: '<b>{point.name}</b>: {point.y}',
				style: {
					color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
				}
			}
		}
	},
	series: [{
		name: 'Brands',
		colorByPoint: true,
		data: [{
			name: '以支付订单',
			y: 61,
			sliced: true,
			selected: true
		}, {
			name: '取消订单',
			y: 11
		}, {
			name: '退款订单',
			y: 10
		}]
	}]
});
// 周数据图标
var chart = Highcharts.chart('container3', {
	chart: {
		type: 'column'
	},
	title: {
		text: '周数据统计'
	},
	xAxis: {
		categories: ['第一周', '第二周', '第三周', '第四周']
	},
	yAxis: {
		min: 0,
		title: {
			text: '周订单总量'
		},
		stackLabels: {  // 堆叠数据标签
			enabled: true,
			style: {
				fontWeight: 'bold',
				color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
			}
		}
	},
	legend: {
		align: 'right',
		x: -30,
		verticalAlign: 'top',
		y: 25,
		floating: true,
		backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
		borderColor: '#CCC',
		borderWidth: 1,
		shadow: false
	},
	tooltip: {
		formatter: function () {
			return '<b>' + this.x + '</b><br/>' +
				this.series.name + ': ' + this.y + '<br/>' +
				'总量: ' + this.point.stackTotal;
		}
	},
	plotOptions: {
		column: {
			stacking: 'normal',
			dataLabels: {
				enabled: true,
				color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
				style: {
					// 如果不需要数据标签阴影，可以将 textOutline 设置为 'none'
					textOutline: '1px 1px black'
				}
			}
		}
	},
	series: [{
		name: '已完成订单',
		data: [5, 300, 4, 7]
	}, {
		name: '退款订单',
		data: [2, 2, 3, 2]
	}]
});
// 天数据统计
var chart = Highcharts.chart('container4', {
	chart: {
		type: 'pie',
		options3d: {
			enabled: true,
			alpha: 45
		}
	},
	title: {
		text: '当天订单统计'
	},
	subtitle: {
		text: '数据来源: 大狗管家.com'
	},
	plotOptions: {
		pie: {
			innerSize: 100,
			depth: 45
		}
	},
	series: [{
		name: '订单数量',
		data: [
			['已完成', 8],
			['已退款', 3]
		]
	}]
});
</script>
@endsection
