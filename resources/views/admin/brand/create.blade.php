<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>layout 后台大布局 - Layui</title>
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">layui 后台布局</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="">商品管理</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    贤心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                 @php $name=Route::currentRouteName();  dump($name); @endphp
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">商品管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">添加商品</a></dd>
                        <dd><a href="javascript:;">商品列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">商品品牌</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">添加品牌</a></dd>
                        <dd><a href="javascript:;">品牌列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">云市场</a></li>
                <li class="layui-nav-item"><a href="">发布商品</a></li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>
                 <span class="layui-breadcrumb">
                      <a href="/">后台首页</a>
                      <a href="/demo/">商品品牌</a>
                      <a><cite>添加品牌</cite></a>
            </span>
            </legend>
        </fieldset>

    <div style="padding: 15px;">
@if ($errors->any())
<div class="alert alert-danger" style="padding-bottom:20px;padding-left:20px;">
<ul>
@foreach ($errors->all() as $error)
<li style="margin-top: 10px; color: #ff0000;">{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
        <form class="layui-form" action="{{url('/brand/store')}}" method="post" >
                @csrf
                <div class="layui-form-item">
                    <label class="layui-form-label">品牌名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="brand_name" lay-verify="title" autocomplete="off" placeholder="请输入品牌名称" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">品牌URL</label>
                    <div class="layui-input-block">
                        <input type="text" name="brand_url" lay-verify="title" autocomplete="off" placeholder="请输入品牌URL" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">品牌LOGO</label>
                    <div class="layui-input-block">
                        <div class="layui-upload-drag" id="test10">
                          <i class="layui-icon"></i>
                          <p>点击上传，或将文件拖拽到此处</p>
                          <div class="layui-hide" id="uploadDemoView">
                            <hr>
                            <img src="" alt="上传成功后渲染" style="max-width: 196px">
                          </div>
                        </div>
                        <input type="hidden" name="brand_logo">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">品牌简介</label>
                    <div class="layui-input-block">
                        <input type="text" name="brand_desc" lay-verify="title" autocomplete="off" placeholder="请输入品牌简介" class="layui-input">
                    </div>
                </div>
                <div align="center">
                     <button type="submit" class="layui-btn layui-btn-normal">添加</button>
                     <button type="reset" class="layui-btn layui-btn-warm">重置</button>
                </div>
              </form>
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
<script src="/static/admin/layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });

    layui.use('upload', function(){
      var $ = layui.jquery
      ,upload = layui.upload;

      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

      //拖拽上传
      upload.render({
        elem: '#test10'
        ,url: 'http://www.2001.com/brand/upload' //改成您自己的上传接口
        ,done: function(res){
          layer.msg(res.msg);
          layui.$('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.data);
          //console.log(res)
          layui.$('input[name="brand_logo"]').attr('value',res.data);
        }
      });
    });

</script>
</body>
</html>
