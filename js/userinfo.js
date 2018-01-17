function infocheck(s){
if (s.dizhi.value == "")
{
alert('请输入联系地址！');
return false;
}
if (s.youbian.value == "" || s.youbian.value.length < "6")
{
alert('请输入正确的邮编号码！');
return false;
}
if (s.qq.value == "" || s.youbian.value.length < "5" || s.youbian.value.length > "10")
{
alert('请输入正确的QQ号码！');
return false;
}
if (s.dianhua.value == "" || s.youbian.value.length < "11")
{
alert('请输入正确的手机号码！');
return false;
}

if (s.shenfenzheng.value == "" || s.shenfenzheng.value.length < "15")
{
alert('请输入正确的身份证号码！');
return false;
}
}
