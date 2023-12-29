<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="UTF-8">
        <title>Responsive Registaration Form</title>
        <!-- <link rel="stylesheet" href="responsiveRegistration.css"> -->
        <style>
            
*{box-sizing: border-box;
    max-height: fit-content;
}
input[type=text], input[type=email], input[type=number], input[type=select], input[type=date],input[type=select],input[type=password], input[type=tel]
{
    width: 45%;
    padding: 12px;
    border: 1px solid rgb(168, 166, 166);
    border-radius: 4px;
    resize: vertical;
}
textarea{
    width:45%;
    padding: 12px;
    border: 1px solid rgb(168, 166, 166);
    border-radius: 4px;
    resize: vertical;
}
input[type=radio],input[type=checkbox]{
    width: 1%;
    padding-left: 0%;
    border: 1px solid rgb(168, 166, 166);
    border-radius: 4px;
    resize: vertical;
}
h1{
    font-family: Arial;
    font-size: medium;
    font-style: normal;
    font-weight: bold;
    color: brown;
    text-align: center;
    text-decoration: underline;
}
label{
    padding: 12px 12px 12px 0;
    display: inline-block;
}
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float:left;
}
input[type=submit]:hover {
background-color: #32a336;
}
.container{
    border-radius: 5px;
    background-color:#f2f2f2;
    padding: 20px;
}
.col-10{
    float: left;
    width:10%;
    margin-top: 6px;
}
.col-90{
    float: left;
    width: 90%;
    margin-top: 6px;
}
.row:after{
    content: "";
    display: table;
    clear: both;
}
@media screen and (max-width: 600px) {
    .col-10,.col-90,input[type=submit]{
        width: 100%;
        margin-top: 0;
    }
}

        </style>
    </head>
       
    <body>

    <?php

       include 'dbcon.php';       

       if(isset($_POST['submit'])){
        $first_name= mysqli_real_escape_string($con,$_POST['firstname']);
        $last_name=mysqli_real_escape_string($con, $_POST['lastname']);
        $email=mysqli_real_escape_string($con, $_POST['email']);
        $mobile=mysqli_real_escape_string($con, $_POST['mobile']);
        $gender=mysqli_real_escape_string($con, $_POST['gender']);
        $dob=mysqli_real_escape_string($con, $_POST['dob']);
        $address=mysqli_real_escape_string($con, $_POST['address']);
        $city=mysqli_real_escape_string($con, $_POST['city']);
        $pin=mysqli_real_escape_string($con, $_POST['pin']);
        $state=mysqli_real_escape_string($con, $_POST['state']);
        $qualification=mysqli_real_escape_string($con, $_POST['qualification']);
        $specialization=mysqli_real_escape_string($con, $_POST['specialization']);
        $password=mysqli_real_escape_string($con, $_POST['password']);


        $pass= password_hash($password, PASSWORD_BCRYPT);
   
        $emailquery = "select * from register where email='$email' ";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount>0){
            ?>
            <script>
                alert("Email already exists");
            </script>

            <?php
            
        }
        else{
            $insertquery = "insert into register( first_name, last_name, email, mobile, gender, date, address, city, area_pin, state,
             Qualification, Specialization, password) values('$first_name','$last_name','$email','$mobile','$gender','$dob','$address','$city','$pin','$state',
             '$qualification','$specialization','$pass')";

             $iquery = mysqli_query($con, $insertquery);

             if($iquery){
                ?>
                <script>
                    alert("Registered Successfully");
                </script>

                <?php
             }
             else{
                ?>
                <script>
                    alert("Not Registered");
                </script>

                <?php
             }
             
        }


       }


    ?>



        <h1>Student Registaration Form</h1>
       <form action="" method="POST">
       <div class="container">
            <div class="row">
                <div class="col-10">
                    <label for="fname">First Name:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="fname" name="firstname" placeholder="Enter your first name" required>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="lname">Last Name:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="lname" name="lastname" placeholder="Enter your last name" required>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="email">Email:</label>
                </div>
                <div class="col-90">
                    <input type="email" id="email" name="email" placeholder="it should contain @,." required>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="mobile">Mobile:</label>
                </div>
                <div class="col-90">
                    <input type="tel" id="mobile" name="mobile" placeholder="only 10 digits are allowed" required>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="gender" required>Gender:</label>
                </div>
                <div class="col-90">
                    <input type="radio" id="male" name="gender" required value="male"/>Male
                    <input type="radio" id="female" name="gender" required value="female"/>Female
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="dob">Date Of Birth:</label>
                </div>
                <div class="col-90">
                    <input type="Date" id="dob" name="dob" required>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="address">Address:</label>
                </div>
                <div class="col-90">
                    <textarea name="address" id="address" cols="30" rows="10" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="city">City:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="city" name="city" maxlength="10" required>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="pincode">Area PIN:</label>
                </div>
                <div class="col-90">
                    <input type="number" id="pin" name="pin" maxlength="6" required>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="state">State:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="state" name="state" required>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="qualification" required >Qualification:</label>
                </div>
                <div class="col-90">
                    <select name="qualification" id="qualification" required>
                        <option value=" ">Select Qualification:</option>
                        <option value="Less than 8">Less than 8</option>
                        <option value="9TH">9th</option>
                        <option value="10TH">10th</option>
                        <option value="11TH">11th</option>
                        <option value="12TH">12th</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="specialization">Specialization:</label>
                </div>
                <div class="col-90" required>
                    <input type="radio" class="specialization" id="cs" name="specialization" value="P.C.M">P.C.M<br/>
                    <input type="radio" class="specialization" id="it" name="specialization" value="Commerce">Commerce<br/>
                    <input type="radio" class="specialization" id="ca" name="specialization" value="Arts">Arts<br/>
                    <input type="radio" class="specialization" id="tc" name="specialization" value="Biology">Biology<br/>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="password">Password:</label>
                </div>
                <div class="col-90">
                    <input type="password" id="password" name="password" maxlength="8" required>
                </div>
            </div>
            <div class="row">
                <input type="submit" name="submit" value="Registered" required >
            </div>  
        </div> 
       </form> 
       
    </body>
</html>