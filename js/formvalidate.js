<!--

function validate_form ( )
{
    valid = true;

    if ( document.myform.address.value == "" )
    {
        alert ( "Enter Checkpoint Location" );
        valid = false;
    }

    

   if ( ( document.myform.type[0].checked == false ) && ( document.myform.type[1].checked == false ) )
        {
                alert ( "Enter Checkpoint Type" );
                valid = false;
        }
		
		return valid;
}

//-->