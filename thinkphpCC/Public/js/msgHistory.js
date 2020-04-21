function openDiv(thisobj){
        /*点击分组:
        如果分组是展开的，点击之后则关闭
        如果分组是关闭的，点击之后则展开，在展开之前先关闭所有分组，在展开当前分组*/
        //thisobj-->当前被点击的a元素
        
        var div=thisobj.nextElementSibling;  //获取当前被点击的a元素后面相邻的div元素

        if(div.style.display=="block"){
            div.style.display="none";        //如果分组是展开的，点击之后关闭
        }else{
            
            //将a元素后面相邻的div元素设置为显示
            div.style.display="block";       //如果分组是展开的，点击之后关闭

        }

    }



function MyFriend(){

    document.getElementById('MyFriend').style.display='block'; 
    document.getElementById('MyGroup').style.display='none'; 
}

function MyGroup(){

    document.getElementById('MyFriend').style.display='none'; 
    document.getElementById('MyGroup').style.display='block'; 
}    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // function openDiv(thisobj){
    //     /*点击分组:
    //     如果分组是展开的，点击之后则关闭
    //     如果分组是关闭的，点击之后则展开，在展开之前先关闭所有分组，在展开当前分组*/
    //     //thisobj-->当前被点击的a元素
    //     //获取当前被点击的a元素后面相邻的div元素
    //     var div=thisobj.nextElementSibling;
    //     //console.log(div.style.display);
    //     //var div=thisobj.parentNode.getElementsByTagName("div")[0];
    //     if(div.style.display=="block"){
    //         div.style.display="none";
    //     }else{
    //         //在展开当前分组之前，先关闭所有分组
    //         var arrDivs=document.getElementsByTagName("div");
    //         for(var i=0;i<arrDivs.length;i++)
    //         {
    //             arrDivs[i].style.display="none";
    //         }
    //         //将a元素后面相邻的div元素设置为显示
    //         div.style.display="block";

    //     }

    // }