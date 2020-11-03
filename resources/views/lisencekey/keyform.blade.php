<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
 
}


* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  background-color: #48ad1f;
  color: white;
}

#table_data {
  background-color: #48ad1f;
  color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.getclientidinfo {
  background-color: #15d0d0;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  text-align: center;
}

#savelisence{

  background-color: #15d0d0;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;

}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}


#table_data{
width: 100%;
    background-color: rgb(72, 173, 31);
    height: auto;
    display: none;
    float: left;
    padding: 10px;
    border-top: 1px solid #fbff09;    
}
thead tr th {
    border-right: 1px solid white;
    text-align: left;
    width: 50%;
    border: 1px solid;
    background: white;
    padding: 10px;
    color: black;
}

.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    float: left;
    width: 100%;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
</head>
<body>

<div id="wrapper" style="padding: 15px;width: 50%;margin: 0 auto">



      <div id="table_data">
        <input type="hidden" id="cdate" value="{{ $ldate = date('Y-m-d H:i:s') }}">

          <table id="userTable" class="userTable" style="width: 100%;padding: 10px;background-color: white">
            <thead>
              <tr>
                <th>Firstname</th>
                <th id="Firstname"></th> 
              </tr>
              <tr>
                <th>Lastname</th>
                <th id="Lastname"></th> 
              </tr>
              <tr>
                <th>Name of the Organization </th>
                <th id="Organization"></th> 
              </tr>
              <tr>
                <th>Mobile</th>
                <th id="Mobile"></th> 
              </tr>
              <tr>
                <th>E-Mail Address</th>
                <th id="Mail"></th> 
              </tr>
              <tr>
                <th>License Key</th>
                <th id="License"></th> 
              </tr>
              <tr>
                <th>Expire Date</th>
                <th id="Date"></th> 
              </tr>
            </thead>          
          </table>
      </div>





        <div class="container" id="Create_Lisence"style="padding: 20px !important">
        
            <h1>Create Lisence</h1>            
            <hr>

            <form method="POST" action="{{ route('lisence.update') }}">
                        @csrf

                    <input type="hidden" id="expire_date" name="expire_date" value=" Expire Date will be">
                    <label for="email"><b>Client ID</b></label>
                    <input type="text" placeholder="Enter Client Id" name="clientid" id="clientid" required>

                    <label for="Key"><b>Lisence Key</b></label>
                    <input type="text" placeholder="Lisence Key Will be auto generate" name="lisencekey" id="lisencekey" required>

                  
                    <p class="getclientidinfo" id="getclientidinfo">Press Enter</p>

                    <button style="display: none" type="submit" id="savelisence" >Save</button>

                   

                    <select style="float: right;" id="lisencefor" name="lisencefor">
                        <option value="3">3 month</option>
                        <option value="6">6 month</option>
                        <option value="12">12 month</option>
                    </select>

                    <label style="float: right;margin-right: 5px" for="lisencefor"><b>Lisence For </b></label> 

          </form>

        </div>

        <div id="extra" style="float: left;width: 100%; background-color: #48ad1f;padding: 20px">     

            <button style="float: right;margin: 8px; " type="submit" id="Createkey" class="Createkey">Create Key</button>
            <a style="width: 100%;text-decoration: none; float: right; color: white; text-align: right;" href="{{ route('login') }}">Return to <span style="color: #ffa013;font-weight: bold;">Login</span> Page</a>
             
         </div>  


        <div class="alert" id="alert_ajax_error" style="display: none;margin-top: 10px;text-align: center;">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          <strong>Sorry!</strong> No data found !
        </div>

</div> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script type='text/javascript'>
      $(document).ready(function(){
     
          //get data by id start here

            $('#getclientidinfo').click(function(){
            var user_id = Number($('#clientid').val().trim());  
                
                    $.ajax({
                      
                      url:"{{route('get.client')}}",
                      type: 'get',
                      data:{id:user_id},
                      
                          success: function(result){  

                             if(result.id>0){
                              $("#table_data").css({display: "block"});
                              $("#savelisence").css({display: "block"});
                              $("#getclientidinfo").css({display: "none"});
                              $("#Firstname").text(result.firstname);
                              $("#Lastname").text(result.lastname);
                              $("#Organization").text(result.organization);
                              $("#Mail").text(result.email);
                              $("#Mobile").text(result.mobile);
                              $("#License").text(result.license_key);
                              $("#Date").text(result.expire_date);
                              $("#clientid").val(result.id);
                             
                              }else{
                                $("#table_data").css({display: "none"});  
                                $("#alert_ajax_error").show();
                              }
                          }
                      });
            });

            //get data by id end here




//////////////////////////////////



           $('#Createkey').click(function(){

                var user_id = Number($('#clientid').val().trim());      
                var date=       $( "#cdate" ).val();

                var d = Date.parse(date);
                var number = Math.floor(1000000000000000 + Math.random() * 9000000000000000+Math.random() * user_id+Math.random() * d); 

                $("#lisencekey").val(number);

                   var lisencefor= $( "#lisencefor option:selected" ).val();
                // $("select#id_of_select_element option").filter(":selected").val();
                
                    let now = new Date();
                    //var current_date =now.toUTCString();

                    var next30days = new Date(now.setDate(now.getDate() + 30*lisencefor));
//console.log('Next 30th day: ' + next30days.toUTCString())
                    $("#expire_date").val(next30days);
                   
                    //alert(next30days);

                     // var lisencefor= $( "#lisencefor option:selected" ).val();
            // var now = new Date();
            // var five_years_ago = new Date(now.getFullYear(),now.getMonth(),now.getDay() +lisencefor*30);


            });



//////////////////////////


    });
      
</script>






</body>
</html>
