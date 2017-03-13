function showForm(elem) {
	var a = document.getElementsByClassName("addform");
	for (i=0; i<a.length; i++){
	  a[i].style.display='none';
	}
   	document.getElementById(elem.value).style.display = "block";

   	/*$('.addform').hide();
   	var id = $(this).val();
   	alert(id);
   	$(id).show();*/
}