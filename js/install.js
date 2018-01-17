function install(s) {

if (s.server.value == "")
{
alert('服务器地址不能为空！');
return false;
}

if (s.mysqlname.value == "")
{
alert('MYSQL用户名不能为空！');
return false;
}

if (s.mysqlpass.value == "")
{
alert('MYSQL密码不能为空！');
return false;
}

if (s.mysqldb.value == "")
{
alert('MYSQL数据库名不能为空！');
return false;
}

if (s.adminname.value == "")
{
alert('后台账号不能为空！');
return false;
}

if (s.adminpass.value == "")
{
alert('后台密码不能为空！');
return false;
}
}
