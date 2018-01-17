function checksearch(s) {

if (s.username.value == "")
{
alert('请输入登录用户名！');
return false;
}

if (s.username.value.length <= "4")
{
alert('登录账号长度只能大于4位，小于16位！');
return false;
}

if (s.username.value.length > "16")
{
alert('登录账号长度只能大于4位，小于16位！');
return false;
}

if (s.userpass1.value == "")
{
alert('请输入登录密码！');
return false;
}

if (s.userpass2.value == "")
{
alert('请输入重复密码！');
return false;
}

if (s.userpass1.value.length <= "4")
{
alert('为了安全起见,请设置大于4位数长度的密码');
return false;
}
if (s.userpass1.value != s.userpass2.value)
{
alert('两次输入密码不一致，请重新输入！');
return false;
}

if (s.qq.value == "")
{
alert('请输入QQ号码！');
return false;
}

if (s.qq.value.length <= "4")
{
alert('您的QQ号码输入有误,请重新输入！');
return false;
}

if (s.qq.value.length >= "11")
{
alert('您的QQ号码输入有误,请重新输入！');
return false;
}

}
