<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="png" href="Images/favicon.png">
    <title>Bit's Hardwares</title>
</head>
<body id="body" onload="NavigatorOb()" style="background-image: url(images/Background.jpg);">
  <section id="top">
      <table id="animation_Heading">
          <tr> 
          <td><img src="Images/favicon.png" alt="Image of CPU" id="animation"></td>
          <td><h2 id="h1"> <strong> EPI-USE</strong> </h2> </td>
          </tr>
      </table>
        
          <?php 

            echo " 
          <nav id=\"nav1\"> 
              <ul id=\"ulNav\" >
                  <li class=\"link2\" id=\"about_id\"><a id=\"a\"  href=\"index.php\"  onMouseOver=\"this.style.color='#818181'\" onMouseOut=\"this.style.color='whitesmoke'\" style=\"margin-right:110px;\"> Home </a></li>
                  
              </ul>
          </nav>
  </section>
  <nav id=\"nav2\" > 
    <div class=\"dropdown3\" >
        <li class=\"link2\" ><a id=\"a\" href=\"javascript:void(0)\" onMouseOver=\"this.style.color='#818181'\" onMouseOut=\"this.style.color='whitesmoke'\" style=\"margin-right:120px; color: whitesmoke\">&#9776;</a></li>
        <div class=\"dropdown-content3\" id=\"table2\" style=\"background-color: black;\">
                <div class=\"Log\">
                    <button class=\"glowEffect\" > <a href=\"index2.html\" style=\"color:whitesmoke ;text-decoration: none;\"> Home</a> </button>
                </div>

                <div class=\"Log\">
                    <button class=\"glowEffect\" > <a href=\"index.html\" style=\"color:whitesmoke ;text-decoration: none;\">Account Settings</a></button>
                </div> 

                <div class=\"Log\">
                    <button class=\"glowEffect\" ><a href=\"index2.html\" style=\"color:whitesmoke ;text-decoration: none;\">Log out</a></button>
                </div>

                <div class=\"Log\">
                    <button class=\"glowEffect\" > <a href=\" \" style=\"color:whitesmoke ;text-decoration: none;\"> Your Cart</a></button>
                </div>

                <div class=\"Log\">
                    <div class=\"dropdown\">
                        <button class=\"glowEffect\" ><a href=\"javascript:void(0)\" onMouseOver=\"this.style.color='#818181'\" onMouseOut=\"this.style.color='whitesmoke'\" style=\"color:whitesmoke ;text-decoration: none;\"> Search </a></button>
                        <div class=\"dropdown-content\" id=\"table1\">
                            <form action=\"\" id=\"Form2\" name=\"Search1\" onsubmit=\"return Validation2()\">
                                <table>
                                    <tr>
                                        <td> <input type=\"text\" id=\"in\" placeholder=\"Search..\" name=\"search\" style=\"height: 45px; width: 210px; border-radius: 15px; text-align: center;\"> </td>
                                        <td> <button type=\"submit\" id=\"Se\" class=\"glowEffect\">&#128269;</button> </td>
                                    </tr> 
                                </table> 
                                </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</nav>";
?>
        <div class="About" style="height:fit-content">
          <!-- <h4 id="column">Our orginzation prides itself in helping our customers find their dream computer hardware</h4>!-->
         
          <?php
            
            include 'config.php'; // importing config page, to use its properties
                    
            $connect = OpenConnection(); // calling the function and storing its return value

            $mainQuery = "SELECT * FROM Employees WHERE  reportingLine = 'none'"; // print the top guy first, remember that the top guy will always have 


            $executeall =  mysqli_query($connect, $mainQuery) or die("Unable to connect to database!"); // The result is then returned, to the variable result 

            $record = mysqli_fetch_array($executeall);

            $Cname = $record['Employee_Name']; // Using global variable to access data sent via Post method

            $Cposition = $record['role_position'];

            $Cnumber = $record['Employee_Number']; // check to ensure that there's only unique employee numbers

            echo "<ul>
            <li><a href=\"Edit.php?id=$Cnumber\" style=\"text-decoration:none\;color: white;\">$Cname <br></a><br> $Cposition</span>
              <ul> <br>"; // to print in list format, the links are used to lead to a edit page where user get to chose to either delete or edit 

            $CEO = "SELECT * FROM Employees WHERE  reportingLine = '$Cnumber'";

            $exCEO =  mysqli_query($connect,$CEO) or die("Unable to connect to database!"); // The result is then returned, to the variable result 

            while($record = mysqli_fetch_array($exCEO)){// now to try and find children


              $Cname = $record['Employee_Name']; // Using global variable to access data sent via Post method
              $Csurname = $record['Employee_Surname'];
              $Cdate = $record['Employee_BirthDate'];
              $Cnumber = $record['Employee_Number']; // check to ensure that there's only unique employee numbers
              $Csalary= $record['Salary'];
              $Cposition = $record['role_position'];
              $CLineManager = $record['reportingLine']; 
             
              echo "<li><a href=\"Edit.php?id=$Cnumber\" style=\"text-decoration:none\;color: white;\">$Cname <br> </a><br> $Cposition </li> <br>"; // to print in list format

            }

            echo "</ul>
                </li>
                  </ul>";
  
            // Now to print all the records in the database, with their children, to show some sort of relationship


            $allrecords = "SELECT * FROM Employees WHERE reportingLine != 'none'"; // get all records except for the CEO 

            echo "<ul>";

            $retrieveAll =  mysqli_query($connect, $allrecords) or die("Unable to connect to database!"); // The result is then returned, to the variable result 

            while($record = mysqli_fetch_array($retrieveAll)){// now to try and find children

                $Cname = $record['Employee_Name']; // Using global variable to access data sent via Post method
                $Csurname = $record['Employee_Surname'];
                $Cdate = $record['Employee_BirthDate'];
                $Cnumber = $record['Employee_Number']; // check to ensure that there's only unique employee numbers
                $Csalary= $record['Salary'];
                $Cposition = $record['role_position'];
                $CLineManager = $record['reportingLine']; 

        
               
              echo "<li><a href=\"Edit.php?id=$Cnumber\" style=\"text-decoration:none\;color: white;\">$Cname <br> </a><br> $Cposition </li> <br>"; // to print in list format

                 


                $children = "SELECT * FROM Employees WHERE  reportingLine = '$Cnumber'"; // records that are referencing the abobe record

                $retrievChil=  mysqli_query($connect,  $children) or die("Unable to connect to database!"); // The result is then returned, to the variable result 

                


                while($record = mysqli_fetch_array( $retrievChil)){// now to try and find children


                      $Cname = $record['Employee_Name']; // Using global variable to access data sent via Post method
                      $Csurname = $record['Employee_Surname'];
                      $Cdate = $record['Employee_BirthDate'];
                      $Cnumber = $record['Employee_Number']; // check to ensure that there's only unique employee numbers
                      $Csalary= $record['Salary'];
                      $Cposition = $record['role_position'];
                      $CLineManager = $record['reportingLine']; 
        
                      echo "<ul>
                              <li><a href=\"Edit.php?id=$Cnumber\" style=\"text-decoration:none\;color: white;\">$Cname <br> </a><br> $Cposition </li> <br>
                            </ul> <br>"; // to print in list format

                      
                }

                



            }


          ?>
          
            </div>
          
        
             
          
           

        
     
            
  
            
    

      <!--<div  id="left">
        <button class="glowEffect3"   onclick="CalIncre(+1); block();"></button>
      </div> !-->
    <script>
        // When the user scrolls down the page with a value of or greater 20px, the top navigation bar is hidden from the user to allow the user to view more of the content
        // However the opposite occurs when the user scrolls up, in other words the top navigation bar is revealed to the user this is denoted by the else statement 
        window.onscroll = function() {
        
        Slide_Down_a_Bar()
      
      };

      function Slide_Down_a_Bar() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 0) {// 20 px is the value that is produced when scrollind down
          document.getElementById("top").style.top = "-200px";
        } else {
          document.getElementById("top").style.top = "3px";
        }

    }
    
    




</script>
</body>
</html>