<div id="feed" style="margin-bottom: 5px; margin-top:-15px;"></div>
<script type="text/javascript">
var refreshtime=1000;
function ttc()
{
aasyncAjax("GET","gridseedlog.php",Math.random(),ddisplay,{});
setTimeout(ttc,refreshtime);
}
function ddisplay(xhr,cdat)
{
 if(xhr.readyState==4 && xhr.status==200)
 {
   document.getElementById("feed").innerHTML=xhr.responseText;
 }
}
function aasyncAjax(method,url,qs,callback,callbackData)
{
    var xmlhttp=new XMLHttpRequest();
    //xmlhttp.cdat=callbackData;
    if(method=="GET")
    {
        url+="?"+qs;
    }
    var cb=callback;
    callback=function()
    {
        var xhr=xmlhttp;
        //xhr.cdat=callbackData;
        var cdat2=callbackData;
        cb(xhr,cdat2);
        return;
    }
    xmlhttp.open(method,url,true);
    xmlhttp.onreadystatechange=callback;
    if(method=="POST"){
            xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            xmlhttp.send(qs);
    }
    else
    {
            xmlhttp.send(null);
    }
}
ttc();
</script>
