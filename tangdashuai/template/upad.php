<!--查询广告数据-->
<?php
//引入系统配置文件
require '../setting.php';
//引入数据库配置文件
require '../config.php';
$m="13";//每页显示的记录数
$numsql = "select * from axphp_ad";
$numery = mysql_query($numsql,$config);
$lognum = mysql_num_rows($numery);//总记录数
$zy = (int)(($lognum-1)/$m)+1;//总页数
isset($_GET['page'])?$page=$_GET['page']:$page="1";//当前页数
$one = (int)($page-1)*$m;//当前页的首条记录


$adsql = "select *,COUNT(*) from axphp_ad order by id asc limit $one,$m ";
$adery = mysql_query($adsql,$config);


if($lognum=="0")
{
    echo "<p>暂时没有广告记录！</p>";
    die();
}

?>
<section class="Hui-article-box">
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span>
        广告管理
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <div class="Hui-article">
        <article class="cl pd-20">
            <!--<div class="text-c">
				<span class="select-box inline">
				<select name="" class="select">
					<option value="0">全部分类</option>
					<option value="1">分类一</option>
					<option value="2">分类二</option>
				</select>
				</span>
                日期范围：
                <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}'})" id="logmin" class="input-text Wdate" style="width:120px;">
                -
                <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d'})" id="logmax" class="input-text Wdate" style="width:120px;">
                <input type="text" name="" id="" placeholder=" 广告名称" style="width:250px" class="input-text">
                <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜广告</button>
            </div>-->
            <div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
				<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
				<a class="btn btn-primary radius" data-title="添加广告" _href="article-add.html" onclick="article_add('添加广告','article-add.html')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加广告</a>
				</span>
                <span class="r">共有广告：<strong><?php echo $lognum ?></strong> 条</span>
            </div>
            <div class="mt-20">
                <table class="table table-border table-bordered table-bg table-hover table-sort">
                    <thead>
                    <tr class="text-c">
                        <th width="25"><input type="checkbox" name="" value=""></th>
                        <th width="80">编号</th>
                        <th>标题</th>
                        <th width="80">单价</th>
                        <th width="80">点击量</th>
                        <th width="120">消耗金额</th>
                        <th width="75">预计投入</th>
                        <th width="60">发布状态</th>
                        <th width="120">操作管理</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while($ad = mysql_fetch_array($adery,MYSQL_ASSOC )){
                        echo '<tr class="text-c">';
                        echo '<td><input type="checkbox" value="" name=""></td>';
                        echo '<td>'.$ad['id'].'</td>';
                        echo '<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit(\'查看\',\'article-zhang.html\',\''.$ad['id'].'\')" title="查看">'.$ad['title'].'</u></td>';
                        echo '<td>'.$ad['prices'].'</td>';
                        echo '<td>21212</td>';
                        echo '<td>21212</td>';
                        echo '<td>21212</td>';
                        echo '<td class="td-status"><span class="label label-success radius">已发布</span></td>';
                        echo '<td class="f-14 td-manage"><a style="text-decoration:none" onClick="article_stop(this,\'10001\')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>
                            <a style="text-decoration:none" class="ml-5" onClick="article_edit(\'广告编辑\',\'article-add.html\',\'10001\')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
                            <a style="text-decoration:none" class="ml-5" onClick="article_del(this,\'10001\')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        </td>';

                        echo '</tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </article>
    </div>
</section>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.page.js"></script>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    //js排序
    $('.table-sort').dataTable({
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[0,8]}// 不参与排序的列
        ]
    });

    /*广告-添加*/
    function article_add(title,url,w,h){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*广告-编辑*/
    function article_edit(title,url,id,w,h){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*广告-删除*/
    function article_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }

    /*广告-审核*/
    function article_shenhe(obj,id){
        layer.confirm('审核文章？', {
                btn: ['通过','不通过','取消'],
                shade: false,
                closeBtn: 0
            },
            function(){
                $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
                $(obj).remove();
                layer.msg('已发布', {icon:6,time:1000});
            },
            function(){
                $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
                $(obj).remove();
                layer.msg('未通过', {icon:5,time:1000});
            });
    }
    /*广告-下架*/
    function article_stop(obj,id){
        layer.confirm('确认要下架吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
            $(obj).remove();
            layer.msg('已下架!',{icon: 5,time:1000});
        });
    }

    /*广告-发布*/
    function article_start(obj,id){
        layer.confirm('确认要发布吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
            $(obj).remove();
            layer.msg('已发布!',{icon: 6,time:1000});
        });
    }
    /*广告-申请上线*/
    function article_shenqing(obj,id){
        $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
        $(obj).parents("tr").find(".td-manage").html("");
        layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
    }
    //动态操作
    function opdg(id)
    {
        var DG = new J.dialog({
            page:'updatead.php?id=' + id,
            title:'修改广告配置',
            height:'350',
            width:'550',
            cancelBtn:false,
            resize:false,
            iconTitle:false,
            maxBtn:false,
            btnBar:false,
            onXclick:axoutauto,
            cover:true
        });
        DG.ShowDialog();
    }

    function delad(id)
    {
        var DG = new J.dialog({
            page:'delad.php?id=' + id,
            title:'删除广告',
            height:'150',
            width:'350',
            cancelBtn:false,
            resize:false,
            iconTitle:false,
            maxBtn:false,
            cover:true,
            onXclick:axoutauto
        });
        DG.ShowDialog();
    }

    function adxj(id)
    {
        var DG = new J.dialog({
            page:'adxj.php?id=' + id,
            title:'广告下架',
            height:'150',
            width:'350',
            cancelBtn:false,
            resize:false,
            iconTitle:false,
            maxBtn:false,
            cover:true,
            onXclick:axoutauto
        });
        DG.ShowDialog();
    }

    function adsj(id)
    {
        var DG = new J.dialog({
            page:'adsj.php?id=' + id,
            title:'广告上架',
            height:'150',
            width:'350',
            cancelBtn:false,
            resize:false,
            iconTitle:false,
            maxBtn:false,
            cover:true,
            onXclick:axoutauto
        });
        DG.ShowDialog();
    }

    function axoutauto(){
        history.go(0);
        location.href='upad.php';
    }
</script>
<!--/请在上方写此页面业务相关的脚本-->

</body>
</html>