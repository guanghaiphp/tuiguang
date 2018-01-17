function oCopy(obj){ 
obj.select(); 
js=obj.createTextRange(); 
js.execCommand("Copy");
alert('复制成功!')
}