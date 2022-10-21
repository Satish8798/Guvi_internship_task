
       $(function(){ 

        $("#loginuser").on('click', function(){ 

           var email       = $("#email").val();
           var password    = $("#password").val();

        $.ajax({ 

          method: "POST", 
          
          url: "login.php",

          data: {"email": email, "password": password},

        }).done(function( data ) { 
          
          var result= data;
            console.log(data)
          var string='';
   
         /* from result create a string of data and append to the div */
        
          $.each( result, function( key, value ) { 
            
             /* string += "<tr> <td>"+value['id'] + "</td><td>"+value['first_name']+' '+value['last_name']+'</td>  \
                      <td>'+value['email']+"</td> </tr>"; */  

                      string+="<p>First Name : "+value['first_name']+"</p>"+"<p>Last Name : "+ value['last_name']+ "</p>"
                      +"<p>Email :  "+value['email']+"</p>"+"<p>ID : "+ value['id']+"</p>";


                }); 

               string += '</table>'; 

            $("#records").html(string); 
         }); 
      }); 
  }); 
