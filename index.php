<!doctype html>
<html>
    <head>
        <title>Vito - Home</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="dog.png">
    </head>
    
    <body>
        <?php include('header.php')?>
        
        <div class="content">
            <h3>About Vito</h3>
            <p>
                On May 5, 2015 somewhere in Mexico a yellow English Labrador Retriever is born.
                His name is Vito. He is a cute, cuddly and fluffy puppy.
                He spends the first two years of his life at a breeders in Mexico.
                At two years old Vito made the journey from Mexico to Hill Country Dog Center in Texas.
                In June 2017 an entourage from Eanes ISD made the journey to Pipe Creek
                and selected Vito out of all the other dogs to come
                and become part of the security team at Eanes ISD.
                Vito remained at the trainers in Pipe Creek and in July,
                Deputy Peals met Vito and together over the next two weeks they trained hard,
                resulting in passing of required certification.
                Vito arrived on campus and Deputy Peals began orientating him to the school.
                They continue their training together with Travis County Sheriff's Office K9 unit.
                Vito has been very successful since he first arrived here and is always looking for more to do.
                He is happy when he is working and he is almost as happy when he is home relaxing.

                <br><div class="smalltext">- Deputy B. Peals #3562 SRO Westlake High School</div>
            </p>
            
            <br>
            <hr>
            <br>

            <h3>Questions from students</h3>
        	<table>
                <!-- the first row that labels each column of the table -->
                <tr>
                    <th>
                        Question <!-- & name & date underneath but in the same box hopefully -->
                    </th>
                    <th>
                        Answer <!-- & name & date underneath but in the same box hopefully -->
                    </th>
                    <th>
                        Date
                    </th>
                </tr>

            <!--
            	WORK     IN      PROGRESS   !!
                accessing the sql table
                by getting all the info for each person
                and filling in that cell of the table
                -->
            <?php
                require ('mysqli_connect.php');
                $q = "SELECT * FROM QuestionTable";
                $result = @mysqli_query($dbcon, $q);
                while ($row = mysqli_fetch_assoc($result)) {
                	if ($row["answered"] == true) {
                    echo "<tr>" .
                            //identification
                            "<td>" .
                                $row["question"] . "<div class='right'>" .
                                $row["fname"] . "</div>" .
                            "</td>" .
                            "<td>" .
                                $row["answer"] .
                            "</td>" .
                            "<td>" .
                                $row["date"] .
                            "</td>" .
                        "</tr>";
                    }
                }
                echo "</table>";
                //end of whole table
                //once it's looped through all the info
                mysqli_close($dbcon);
                //close the connection to the server
                //since we are done
            ?>

            
            <!-- table from database
            	check if  answered,
            	_______________________________
            	| display  q | display answer |
            	_______________________________
            	| display  q | display answer |
            	_______________________________
            	| display  q | display answer |

            -->
    	</div>
    </body>
</html>