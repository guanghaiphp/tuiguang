function mb(s){
if (s.payid.value == "")
{
alert('收款账号不能为空！');
return false;
}
if (s.paynames.value == "")
{
alert('收款人姓名不能为空！');
return false;
}
if(!confirm('收款资料设置后不能更改,是否确定设置?'))
return false;
}