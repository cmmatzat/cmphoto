
/* Add event listener to form */
var form = document.querySelector( "form[contact-form]" );
form.addEventListener( "submit" , submissionHandler );

/* Handle Submit Button */
function submissionHandler( event ) {

    // Override normal submit button operation
    event.preventDefault();

    // Get form input data
    var inputs = document.getElementsByClassName("cf-input");
    var data = {};

    // Put inputs into a dictionary
    for (var i = 0; i < inputs.length; i++) {
        data[ inputs[i].name ] = inputs[i].value;
    }

    // Attempt Form Submission
    submitForm( data );
}

/* Submit the form with JS */
function submitForm( data ) {

    // Create new request
    var xhttp = new XMLHttpRequest();

    // Handle request
    xhttp.onreadystatechange = function() {
        if ( this.readyState == 4 && this.status == 200 ) {
            handleResponse( this.responseText );
        }
    };

    // Send request
    xhttp.open( "POST", "/application/scripts/contact_form_handler.php", true );
    xhttp.setRequestHeader( "Content-type" , "application/x-www-form-urlencoded" );
    xhttp.send( objToText( data ) );

}

/* Handles the php response to form submission */
function handleResponse( responseText ) {

    // Decode the response
    var response = JSON.parse( responseText );

    // Failed Submission
    if (response['success'] == false) {

        var error_labels = document.getElementsByClassName("cf-error");
        for ( var i = 0; i < error_labels.length; i++ ) {

            if (response[error_labels[i].id] == false) {
                error_labels[i].classList.add('cf-hide');
                error_labels[i].innerHTML = "";
            } else {
                error_labels[i].classList.remove('cf-hide');
                error_labels[i].innerHTML = response[error_labels[i].id];
            }

            var success_msg = document.getElementById("cf-success");
            success_msg.classList.add('cf-hide');
        }

    // Successful Submission
    } else {

        var error_labels = document.getElementsByClassName("cf-error");
        for ( var i = 0; i < error_labels.length; i++ ) {
            error_labels[i].classList.add('cf-hide');
            error_labels[i].innerHTML = "";
        }

        var form_inputs = document.getElementsByClassName("cf-input");
        for ( var i = 0; i < form_inputs.length; i++ ) {
            form_inputs[i].value = "";
        }

        var success_msg = document.getElementById("cf-success");
        success_msg.classList.remove('cf-hide');

    }
}


function objToText( obj ) {
    var text = "";
    for( key in obj ) {
        text += key + "=" + obj[key] + "&";
    }
    text = text.substring(0, text.length - 1);
    return text;
}












