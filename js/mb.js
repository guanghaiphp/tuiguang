function mb(s){
if (s.mb1.value == "")
{
alert('密保验证码不能为空！');
return false;
}
if (s.mb2.value == "")
{
alert('密保验证码不能为空！');
return false;
}
if (s.mb1.value != s.mb2.value)
{
alert('密保验证码输入不一致,请重新输入！');
return false;
}
if(!confirm('密保安全验证码设置后不能更改,是否确定设置?'))
return false;
}