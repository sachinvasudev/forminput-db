function validate2() 
{
	var message = "Please enter:\n\n";

	for( k = 0; k < document.regist.getElementsByTagName("input").length; k++) {

		var node = document.regist.getElementsByTagName("input")[k];

		if(node.type == "text") 
		{
			node.style.border = "1px solid black";

			if(isEmpty(node.value)) 
			{
				node.style.border = "2px solid red";
				message += "" + node.name + "\n";
			} else if(node.className == "num" && (isNaN(node.value))) 
			{
				node.style.border = "2px solid red";
				message += "" + node.name + "\n";

			}

		} //end of type=text block

	}//end of loop

	if(!checkAddress())
		message += "Address\n";

	if(!checkOccupation())
		message += "Occupation\n";
	message += " ";
	
	if(!checkStatus())
		message += "Status\n";
	message += " ";

	if(message == "Please enter:\n\n ")
		return true;
	else 
	{
		alert(message);
		return false;
	}

}//end of function validate2

function isEmpty(text) 
{
	if(text == "")
		return true;
	else
		return false;
}

function checkAddress() 
{

	if(document.regist.address.value == "") 
	{
		document.getElementById("address").style.width = "10%";
		document.getElementById("address").style.border = "2px solid red"
		return false;
	} else 
	{

		document.getElementById("address").style.border = "none"
		return true;
		;

	}

}

function checkOccupation() 
{
	if(document.regist.occupation.selectedIndex == 0) 
	{
		document.getElementById("occupation").style.width = "10%"
		document.getElementById("occupation").style.border = "2px solid red"
		return false;
	} else 
	{
		document.getElementById("occupation").style.border = "none"
		return true;
	}

}

function checkStatus()
{
	if(document.regist.status.selectedIndex == 0) 
	{
		document.getElementById("status").style.width = "10%"
		document.getElementById("status").style.border = "2px solid red"
		return false;
	} else 
	{
		document.getElementById("status").style.border = "none"
		return true;
	}
	
}
