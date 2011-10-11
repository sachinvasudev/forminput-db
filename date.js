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
    		constrainInput: true
    	    		
    	});
    	
    	$("#startDate").focus();
    
  });
  
function update()
{
	
	
	var date =  $("#startDate").datepicker("getDate");
	if(date==null)
	return false;
	

	
	$("#endDate").datepicker( "option", "minDate", date);
	$("#endDate").datepicker( "option", "defaultDate", date);
	
	
}
