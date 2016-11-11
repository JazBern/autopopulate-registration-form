  <html>
      <head>
              <meta charset = "utf-8"> 
              <title>CodeIgniter View Example</title> 


              <script type='text/javascript' src="<?php echo base_url(); ?>js/jquery.min.js"></script>
              <!-- <script type='text/javascript' src="<?php //echo base_url(); ?>js/sample.js"></script> -->



              <style>
                    table {
                      font-family: arial, sans-serif;
                      border-collapse: collapse;
                      width: 100%;
                    }

                    td, th{
                      border: 1px solid #dddddd;
                      text-align: left;
                      padding: 8px;
                    }

                    tr:nth-child(even){
                      background-color: #dddddd;
                    }
              </style>
      </head>
       <body>
              <h3>DATABASE RECORDS</h3>
              <table>
                <tr>
                  <th>Select</th>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Address</th>
                </tr>
                <?php
                foreach($records as $rec) {

                  echo "<tr>";
                  echo "<td>";
                  echo"<button class='btn'>Select</button>";
                  echo "</td>";
                  echo "<td class='nr'>";
                  echo $rec->id;
                  echo "</td>";
                  echo "<td>";
                  echo $rec->Name;
                  echo "</td>";
                  echo "<td>";
                  echo $rec->Age;
                  echo "</td>";
                  echo "<td>";
                  echo $rec->Address;
                  echo "</td>";
                  echo "</tr>";
                }
                ?>
              </table>
              <h3>REGISTRATION FORM</h3>

              <form action="" method="post"><br>
                Name: <input class="name" type="text" name="name" size="35" placeholder="Name"><br><br>
                Age: <input class="age" type="text" name="age" size="38" placeholder="Age"><br><br>
                Address:  <input  class="address" type="text" name="addr" size="33" placeholder="Address"><br><br>
                <input type="submit" value="SUBMIT">
              </form><br>
                      <p class="test"></p>
                      <script type="text/javascript">

                $(document).ready(function(){
                  $(".btn").click(function(e) {
                  // e.preventDefault();
                    var item = $(this).closest("tr")    // Finds the closest row <tr> 
                                       .find(".nr")     // Gets a descendent with class="nr"
                                       .text();         // Retrieves the text within <td>
                                                  
                           $.ajax({
                            url: 'home/get_user_data',
                            dataType: 'json', 
                            type: "post",
                            data: ({'items':item}),

                            success: function(res)
                            {

                              var newPlaceholder =res[0].Name;
                              $("input.name").prop("placeholder", newPlaceholder);
                              $("input.age").prop("placeholder", res[0].Age);
                              $("input.address").prop("placeholder",res[0].Address);

                            },
                            error: function()
                            {
                              alert("fail");
                            }
                          });


                         });



                });
              </script>


         </body>
  </html>



