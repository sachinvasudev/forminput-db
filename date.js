 $(document).ready(function() {
 	
 	
    $("#startDate").datepicker(
    	{
    		dateFormat: 'dd-mm-yy',
    		constrainInput: true
    		
    	    		
    	});
    	
    	
    	 $("#endDate").datepicker(
    	{
    		dateFormat: 'dd-mm-yy',
    		beforeShow: update,
    		constrainInput: true,
    		onSelect: search
    	    		
    	});
    	
    	$("#startDate").focus();
    
  });
  
  
function search()
{
	
	var req = new XMLHttpRequest();
	var startDate = $("#startDate").val();
	var endDate = $("#endDate").val();
	alert(startDate);
	return;


	
	req.open("POST","datesearch.php",true);
	req.onreadystatechange = function ()
	{
		if(req.readyState==4&&req.status==200)
	{
		
		
		
		
		

			
		
	} 
	
		
	}
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	req.send("checkUname="+username);
	
	
	
	
}
  
function update()
{
	
	
	var date =  $("#startDate").datepicker("getDate");
	if(date==null)
	return false;
	

	
	$("#endDate").datepicker( "option", "minDate", date);
	$("#endDate").datepicker( "option", "defaultDate", date);
	
	
}
