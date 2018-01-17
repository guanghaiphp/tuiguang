function system(s){

if( s.title.value == "" || s.domain.value == "" || s.ticheng.value == "" || s.moneyname.value == "" || s.paynum.value == "" || s.doyzm.value == "")
{
alert('请完整填写所有必填项后再进行保存!');location.href='system.php';
return false;
}

}

function reg(s){
if(s.key.value == "" || s.key.value.length != "45")
{
alert('请正确输入您的授权序列号!');
return false;
}
}

 function checkRate(input)
{
     var re = /^[1-9]+[0-9]*]*$/;  
    var nubmer = document.getElementById(input).value;
    
     if (!re.test(nubmer))
    {
        alert("请正确输入您已授权登记的QQ号码!");
        document.getElementById(input).value = "";
        return false;
     }
}
