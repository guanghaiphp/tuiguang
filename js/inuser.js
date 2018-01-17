function inad(s){
if (s.username.value == "")
{
alert('用户账号不能为空,请重新输入!');
return false;
}
if (s.userpass.value == "")
{
alert('用户密码不能为空,请重新输入!');
return false;
}
if (s.userpass2.value != s.userpass.value)
{
alert('两次密码不一致,请检查后重新输入!');
return false;
}
}