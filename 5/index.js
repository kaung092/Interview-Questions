$(document).ready(function(){

    $("#butt_submit").click(function(){
        var input = $('input[name="textInputNumber"]').val();
        
        //validate input
        if($.isNumeric(input) && input >=1 && input <= 1000){
          
          //disable inputs
          $('input[name="textInputNumber"]').attr("disabled", "disabled"); 
          $('#butt_submit').attr("disabled", "disabled"); 
          //show loading graphic
          $('#spinner').css('display','inline-block');
          $('#butt_submit').css('display','none');


          $.ajax({
            url: "http://www.kaunghtet.net/temp/NumToTextConverter.php",
            type:"POST",
            data: {userInput:input},
            success: function(result){
              if(result==null){
                $('#label_result').text("Input is not multiple of three or five or both. Please try again");
              }
              else{
               $('#label_result').text(result);
              }
            },
            error: function(err){
              alert("Server Error");
            }
          });

        }
        else{
          $('#label_result').text("Error: Input must be numbers only and within the range (1-1000)");
        }
     
        return false;
    });
});
