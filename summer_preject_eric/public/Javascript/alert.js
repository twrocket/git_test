function ShowAlert(year_now,year_set,time_now,time_set,text)
{   
    if(year_now>=year_set){
        if(time_now>time_set){
            alert ("將引導您前去目標網頁");
        }
        else{
            alert ("很抱歉，此網頁現在無法讀取");
        }
              
    }
    else{
        alert ("很抱歉，此網頁現在無法讀取");
    }
   
    
}