function ShowAlert(time_set,text)
{   
    
    var time_now = new Date();
    var time_set = new Date(time_set);   
    
    if (time_now >= time_set) {
        alert('讀取成功');
        return 1;
    } else {
        alert('讀取失敗');
        return 0;
    }
   
    /*
    alert(time_now.getFullYear() +' ' +  (time_now.getMonth()+1) +' ' + time_now.getDate());
    alert(time_now.getHours()+" "+time_now.getMinutes()+" "+ time_now.getSeconds() );
    console.log(time_now.getFullYear() +' ' +  (time_now.getMonth()+1) +' ' + time_now.getDate());
   
   
   
    可參考 https://www.fooish.com/javascript/date/ 
    https://www.delftstack.com/zh-tw/howto/javascript/javascript-get-current-date/
    */
}