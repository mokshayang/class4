// JavaScript Document
function of(x)
{
	location.href=x
}
function del(tab,id){
	let chk = confirm("確定要刪除嗎 ? ");
	if(chk){
		$.post("api/del.php",{tab,id},()=>{
			location.reload();
		})
	}
}