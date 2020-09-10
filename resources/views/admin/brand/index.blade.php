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
       <!--  <li class="layui-nav-item layui-nav-itemed"> -->
        <li @if(strpos($name,'goods')!=false) class="layui-nav-item layui-nav-itemed" @else class="layui-nav-item @endif >
          <a class="" href="javascript:;">商品管理</a>
          <dl class="layui-nav-child">
            <dd class="layui-this"><a href="javascript:;">添加商品</a></dd>
            <dd><a href="javascript:;">商品列表</a></dd>          
          </dl>
        </li>
        <li @if(strpos($name,'brand')!=false) class="layui-nav-item layui-nav-itemed" @else class="layui-nav-item @endif >
          <a href="javascript:;">商品品牌</a>
          <dl class="layui-nav-child">
            <dd><a href="{{url('/brand/create')}}">添加品牌</a></dd>
            <dd><a href="{{url('/brand')}}">品牌列表</a></dd>          
          </dl>
        </li>
        <li class="layui-nav-item"><a href="">云市场</a></li>
        <li class="layui-nav-item"><a href="">发布商品</a></li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
        <span class="layui-breadcrumb" style="padding: 15px;">
        <a href="/">首页</a>
        <a href="/demo/">品牌管理</a>
        <a><cite>品牌列表</cite></a>
        </span>
        
    </fieldset>

  <form class="layui-form" action="">
    <div class="layui-form-item">
    <div class="layui-inline">    
      <div class="layui-input-inline" style="padding-left: 30px;">
        <input type="tel" name="brand_name"  placeholder="请输入品牌名称"  value="{{$query['brand_name']??''}}" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-inline">
      <div class="layui-input-inline">
        <input type="text" name="brand_url"   placeholder="请输入品牌网址" value="{{$query['brand_url']??''}}"  autocomplete="off" class="layui-input">
      </div>
    </div>
     <div class="layui-inline">
      <div class="layui-input-inline">
         <button class="layui-btn layui-btn-normal">搜索</button>
      </div>
    </div>
  </div>
</form>
<div class="layui-form" style="padding-left: 15px;padding-right: 15px;padding-bottom:15px; "></div>
    <table class="layui-table">
      <colgroup>
        <col width="150">
        <col width="150">
        <col width="200">
        <col>
      </colgroup>
      <thead>
        <tr>
          <th width="5%">
              <input type="checkbox" name="allcheckbox" id="all" lay-skin="primary">
          </th>
          <th>品牌ID</th>
          <th>品牌名称</th>
          <th>品牌LOGO</th>
          <th>品牌网址</th>
          <th>品牌简介</th>
          <th>操作</th>
        </tr> 
      </thead>
     
      <tbody>
         @foreach($data as $v)
        <tr>
          <td><input type="checkbox" name="brandcheck[]" lay-skin="primary" value="{{$v->brand_id}}"></td>
          <td>{{$v->brand_id}}</td>
          <td id="{{$v->brand_id}}" oldval="{{$v->brand_name}}"><span class="brand_name">{{$v->brand_name}}</span></td>
          <td>@if($v->brand_logo)<img src="{{env('UPLOADS_URL')}}{{$v->brand_logo}}" width="50">@endif</td>
          <td>{{$v->brand_url}}</td>
          <td>{{$v->brand_desc}}</td>
          <td>
            <a href="{{url('/brand/edit/'.$v->brand_id)}}" class="layui-btn layui-btn-normal">编辑</a>
            <!-- <a href="{{url('/brand/destroy/'.$v->brand_id)}}" class="layui-btn layui-btn-warm">删除</a> -->
            <a href="javascript:void(0)" onclick="deleteByID({{$v->brand_id}},this)" class="layui-btn layui-btn-warm">删除</a>
          </td>
        </tr>
       @endforeach
    
      <tr >
        <td colspan="7">{{$data->appends($query)->links('vendor.pagination.adminshop')}}
          <button type="button" class="layui-btn layui-btn-normal moredel">批量删除</button>
        </td> 
      </tr>
        </tbody>
    </table>  
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  </div>
</div>
<script src="/static/admin/layui/layui.js"></script>
<script src="/static/admin/js/jquery.min.js"></script>
<script>
//JavaScript代码区域
layui.use(['element','form'],function(){
  var element = layui.element;
  var form= layui.form;
});

//即点即改
$(document).on('click','.brand_name',function(){
  var brand_name=$(this).text();
  var id=$(this).parent().attr('id');
    $(this).parent().html('<input type=text class="changename  input_name_'+id+'" value='+brand_name+'>' );
    $('.input_name_'+id).val('').focus().val(brand_name);
});

$(document).on('blur','.changename',function(){
    //入库
    var newname=$(this).val();
    if(!newname){
        alert("内容不能为空");return;
    }
    var oldval=$(this).parent().attr('oldval');
     if(newname==oldval){
       $(this).parent().html('<span class="brand_name">'+newname+'</span>');
       return;
    }
    var id=$(this).parent().attr('id');
    var obj=$(this);
    $.get('/brand/change',{id:id,brand_name:newname},function(res){
      if(res.code==0){
        obj.parent().html('<span class="brand_name">'+newname+'</span>');
      }
  },'json')
});

//全选
$(document).on('click','#all',function(){
  //alert(123);
  var checkval = $('input[name="allcheckbox"]').prop('checked');
  //alert(checkval);
  // $('input[name="brandcheck[]"]').prop('checked',checkval);
  if(checkval){
    $('input[name="brandcheck[]"]').prop('checked',true);
  }else{
    $('input[name="brandcheck[]"]').prop('checked',false);
  }
})

//批量删除 
$(document).on('click','.moredel',function(){
  //alert(123);
  var ids = new Array();
  $('input[name="brandcheck[]"]:checked').each(function(i,k){
    ids.push($(this).val());
  })
  //alert(ids);
  $.get('/brand/destroy/',{id:ids},function(res){
    alert(res.msg);
    //$.(obj).parents('tr').remove();
    location.reload();
  },'json')
})


//ajax删除
function deleteByID(brand_id,obj){
  //alert(brand_id);
  if(!brand_id){
    return ;
  }  

  $.get('/brand/destroy/'+brand_id,function(res){
    alert(res.msg);
    //$.(obj).parents('tr').remove();
    location.reload();
  },'json')
 }

//ajax分页
$(document).on('click','.layui-laypage a',function(){
//$('.layui-laypage a').click(function(){
  var url=$(this).attr('href');
   $.get(url,function(res){
     $('tbody').html(res);
     layui.use(['element','form'],function(){
        var element = layui.element;
        var form= layui.form;
        form.render();
      });

  })
  return false;
})
</script>
</body>
</html>