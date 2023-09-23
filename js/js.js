// JavaScript Document
function of(x)
{
	location.href=x
}
function del(dom,tab,id){
	let chk = confirm("確定要刪除嗎 ?");
	if(chk){
		$.post("api/del.php",{tab,id},()=>{
			$(dom).parents('tr').remove()
		})
	}
}