function validate() 
{
	
	var token =0;

	for( k = 0; k < document.myform.getElementsByTagName("input").length; k++) {

		var node = document.myform.getElementsByTagName("input")[k];

		if(node.type == "text") 
		{
			node.style.border = "1px solid black";

			if(isEmpty(node.value)) 
			{
				node.style.border = "1px solid red";
				token=1;
			} else if(node.className == "num" && (isNaN(node.value))) 
			{
				node.style.border = "1px solid red";
				token=1;

			}

		} //end of type=text block

	}
	
	for( k = 0; k < document.myform.getElementsByTagName("textarea").length; k++) {

		var node = document.myform.getElementsByTagName("textarea")[k];
		
		node.style.border="1px solid black";
		if(node.value == "")
		{
			node.style.border="1px solid red";
			token=1;
		}

		
	}
	
	for( k = 0; k < document.myform.getElementsByTagName("select").length; k++) {

		var node = document.myform.getElementsByTagName("select")[k];
		
		node.style.border="1px solid black";
		if(node.selectedIndex == 0)
		{
			node.style.border="1px solid red";
			token=1;
		}

		
	}
	
	
	
	
	
if(token==0)
return true;
else
{
alert("Please correct items shown in red");
return false;
}

}//end of function validate


function validate2()
{
	var token=0;
	num = document.getElementById("num");
	if(isEmpty(num.value))
	{
		alert("How many cannot be empty");
		token=1;
		
	}
	if(isNaN(num.value))
	{
		alert("How many must be a number");
		token=1;
	}
	if(token==0)
	return true;
	else
	{
		num.focus();
		return false;
		
	}
}


function isEmpty(text) 
{
	if(text == "")
		return true;
	else
		return false;
}

