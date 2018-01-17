function pw(s){
if (s.password.value == "")
{
alert('旧密码不能为空！');
return false;
}
if (s.password1.value == "")
{
alert('新密码不能为空！');
return false;
}
if (s.password2.value == "")
{
alert('重复密码不能为空！');
return false;
}
if (s.password1.value.length <= "4")
{
alert('为了安全起见,请设置大于4位数长度的密码！');
return false;
}
if (s.password1.value != s.password2.value)
{
alert('两次密码不一致,请重新输入！');
return false;
}
}