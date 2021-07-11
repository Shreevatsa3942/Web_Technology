const addbtn=document.querySelector(".add");
const tbl=document.querySelector("#displayTbl > tbody")

addbtn.addEventListener('click',function(){
    location.href = "addbook.html"; 
})

window.onload=function(){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText === "0"){
                tbl.innerHTML="<tr><td colspan=7 style='text-align: center;color:red;'>There is no Data</td></tr>";
            }
            else{
                
                var data=JSON.parse(this.responseText);
                console.log(data);
                var html="";
                for(i=0;i<data.length;i++){
                    html+="<tr>";
                    html+="<td>"+data[i].acc_no+"</td>";
                    html+="<td>"+data[i].title+"</td>";
                    html+="<td>"+data[i].author+"</td>";
                    html+="<td>"+data[i].edition+"</td>";
                    html+="<td>"+data[i].publisher+"</td>";
                    html+="<td><a href='edit.php?id="+data[i].acc_no+"'>Edit</a></td>";
                    html+="<td><a href='delete.php?id="+data[i].acc_no+"'>Delete</a></td>";
                    html+="</tr>";
                }
                tbl.innerHTML = html;
            }
        }
    }
    request.open("GET","displayData.php");
    request.send();
}