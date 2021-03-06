@extends('common')

@include('nav.income')

@section('content')
    <section class="Hui-article-box">
        <nav class="breadcrumb"><i class="Hui-iconfont"></i> <a href="/" class="maincolor">首页</a>
            <span class="c-999 en">&gt;</span>
            <a href="/income/paytotal" class="maincolor">收入类</a>
            <span class="c-999 en">&gt;</span>
            <span class="c-666">付费分布</span>
            <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
               href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
        </nav>
        <div class="Hui-article">
            <form action="/income/paydistribution" method="post" class="form form-horizontal">
                {!! csrf_field() !!}
                <div class="row cl">
                    <label class="form-label col-xs-1 col-sm-1">选择日期：</label>
                    <div class="formControls  skin-minimal">
                        <div class="radio-box">
                            <input type="radio" name="option-date" value="1" id="sex-1" {{ $option == 1?'checked':'' }}>
                            <label for="sex-1">本日</label>
                        </div>
                        <div class="radio-box">
                            <input type="radio" name="option-date" value="2" id="sex-2" {{ $option == 2?'checked':'' }}>
                            <label for="sex-2">本周</label>
                        </div>
                        <div class="radio-box">
                            <input type="radio" name="option-date" value="3" id="sex-3" {{ $option == 3?'checked':'' }}>
                            <label for="sex-3">本月</label>
                        </div>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-1 col-sm-1">选择项目：</label>
                    <div class="formControls  skin-minimal">
                        <div class="radio-box">
                            <input type="radio" name="type" value="1"
                                   id="interval-1" {{ $type == 1?'checked':'' }}>
                            <label for="interval-1">计费点</label>
                        </div>
                        <div class="radio-box">
                            <input type="radio" name="type" value="2"
                                   id="interval-2" {{ $type == 2?'checked':'' }}>
                            <label for="interval-2">渠道</label>
                        </div>
                        <div class="radio-box">
                            <input type="radio" name="type" value="3"
                                   id="interval-2" {{ $type == 3?'checked':'' }}>
                            <label for="interval-2">服务器</label>
                        </div>
                    </div>
                </div>
                <div class="row cl">
                    <div class="col-xs-1 col-sm-1 col-xs-offset-1 col-sm-offset-1">
                        <button class="btn btn-success radius" type="submit">
                            <i class="Hui-iconfont">&#xe665;</i>查询
                        </button>
                    </div>
                </div>
            </form>

            <div class="mt-20 col-xs-12 col-sm-12">
                <table class="table table-border table-bordered table-bg table-hover table-sort">
                    <thead>
                    <tr class="text-c">
                        <th>ID/时间点</th>
                        <th>充值金额</th>
                        <th>所占比例</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $v)
                        <tr class="text-c">
                            <td>{{ isset($v['id'])?$v['id']:date('Y-m-d H:i:s',$v['time']/1000) }}</td>
                            <td>{{ round($v['money']/100,2) }}</td>
                            <td>{{ $v['rat'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $('.table-sort').dataTable({
            "aaSorting": [[0, "desc"]],//默认第几个排序
            "bStateSave": true,//状态保存
        });
    </script>
@endsection