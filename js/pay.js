function pay(s) {
if (s.money.value == "")
{
alert('请输入提现金额！');
return false;
}
}

function checkRate(input)
{
     var re = /^[0-9]+.?[0-9]*$/;
    var nubmer = document.getElementById(input).value;
    
     if (!re.test(nubmer))
    {
        alert("请输入正确的提现金额数字,只允许输入整数或小数!");
        document.getElementById(input).value = "";
        return false;
     }
}
