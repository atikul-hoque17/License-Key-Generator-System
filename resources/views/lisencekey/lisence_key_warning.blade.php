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

div#Create_Lisence p span {
    color: #fbff00;
    font-weight: bold;
}
</style>
</head>
<body>

<div id="wrapper" style="padding: 15px;width: 50%;margin: 0 auto">

        <div class="container" id="Create_Lisence"style="padding: 20px !important">
        
            <h1> Lisence Key Updated Sucessfully</h1>    

              
              <p>
                “Congratulations!! Your License Has Been Activated. It will work till<span> {{ Session::get('expire_date') }}  </span>”. (The Expired Date).
              </p>

               <a style="width: 100%;text-decoration: none; float: right; color: white; text-align: right;" href="{{ url('/license/key/form/') }}">Return to <span style="color: #ffa013;font-weight: bold;">Home</span> Page</a>


        </div>
      

</div> 



</body>
</html>
