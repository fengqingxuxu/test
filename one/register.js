//输入框获得焦点时，显示提示内容
function showDesc(obj)
{ 
   var id= obj.name;
   document.getElementById(id).style.display="inline";
}

//输入框失去焦点时检验输入内容是否有效
function checkText(obj)
{
   //获取输入框的id值
   var id= obj.name;
   var text=document.getElementById(id.toString().toUpperCase()).value;

   //判断是否为空
   if(text.replace(/\s/g, "")=="")
   {
      document.getElementById(id).innerHTML="输入不能为空";
   }
   else
   {
     //组装方法
     //取首字母转换为大写,其余不变
     var firstChar=id.charAt(0).toString().toUpperCase();
     //
     var strsub=id.substring(1,id.length);
     var strMethod="check"+firstChar+strsub+"()";
     var isTrue = eval(strMethod);
     if(isTrue)
     {
         document.getElementById(id).innerHTML="输入有效";
     }
   }

  
}

function checkUsername()
{
    //只简单的判断用户名的长度
    var id = document.getElementById("USERNAME");
    var username=id.value;   
    if(username.length > 10)
    {
      document.getElementById(id.name).innerHTML = "输入的用户名过长";
      return false;
    }
    else
    return true;
}
function checkPwd()
{
    var password = document.getElementById("PASSWORD").value;   
    return true;
}
function checkCpwd()
{
     var id=document.getElementById("PASSWORD");
     var id2=document.getElementById("PASSWORD2");
     var password = id.value;   
     var password2 = id2.value;
     if(password!=password2)
     {
        document.getElementById(id.name).innerHTML="密码不一致";
        return false;
     }
     return true;   
}