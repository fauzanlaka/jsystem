$(document).ready(function(){
            $('#subjectCode').keyup(function(){ // Keyup function for check the user action in input
                var Username = $(this).val(); // Get the username textbox using $(this) or you can use directly $('#username')
                var UsernameAvailResult = $('#subjectCode_avail_result'); // Get the ID of the result where we gonna display the results
                if(Username.length > 4) { // check if greater than 2 (minimum 3)
                    UsernameAvailResult.html('Loading..'); // Preloader, use can use loading animation here
                    var UrlToPass = 'action=subjectCode_availability&username='+Username;
                    $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
                    type : 'POST',
                    data : UrlToPass,
                    url  : 'function/all.php',
                    success: function(responseText){ // Get the result and asign to each cases
                        if(responseText == 0){
                            UsernameAvailResult.html('<span class="success">Bisa di tambah</span>');
                        }
                        else if(responseText > 0){
                            UsernameAvailResult.html('<span class="error">Data Sudah ada</span>');
                        }
                        else{
                            alert('Problem with sql query');
                        }
                    }
                    });
                }else{
                    UsernameAvailResult.html('<span class="error">Harap sempurnakan KODE</span>');
                }
                if(Username.length == 0) {
                    UsernameAvailResult.html('');
                }
            });
        });

