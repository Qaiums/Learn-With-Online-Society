<head>
    <meta/>
    <title>Learn with online society</title>
    <link href="style.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        .error{
            color: red;
            background-color: #fff;
        }
    </style>
</head>

<body>
    <div id="header_panel">
        <div id="header_section">
            <div id="title_section">Learn With Online Society</div>
            <div id="tagline">about my website</div>
        </div>
    </div>
    <div id="menu_panel">
        <div id="menu_section">
            <ul>
                <li><a href="home.php">Home</a>
                </li>
                <li><a href="">Profile</a>
                </li>
                <li><a href="">Follower</a>
                </li>
                <li><a href="">Following</a>
                </li>
                <li><a href="aboutus.php">About Us</a>
                </li>
                <li><a href="">Contact Us</a>
                </li>
                <li><a href="login.php">Login</a>
                </li>
                <li><a href="registration.php">Register</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- colum 1-->
    <div id="content">

        <div id="content_column_one">
            <div class="column_one_section">
                <p>Categories
                    <br>
                    <br>
                    <br>
                    <input type="radio" name="oracle" value=" "> Oracle
                    <br>
                    <br>
                    <input type="radio" name="php" value=" "> PHP
                    <br>
                    <br>
                    <input type="radio" name="java" value=" "> Java
                    <br>
                    <br>
                    <input type="radio" name="c#" value=" "> C#
                    <br>
                    <br>
                    <input type="radio" name="Cplus" value=" "> C++
                    <br>
                    <br>
                    <input type="radio" name="other" value=" "> Other </p>


            </div>

            <div class="cleaner_with_divider">&nbsp;</div>



        </div>


        <!-- end of column one    -->





        <div id="content_column_two">

            <div class="column_two_section">
                <center>
s
                    <form name="myForm" action="regintodatabase.php" method="post">

                        <h1>Your Info To Submit</h1>
                        <table>
                            <tr>
                                <td>
                                    <p>Name :</p>
                                </td>
                                <td>
                                    <input type="text" name="name" placeholder="Name" id="name" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>User Name :</p>
                                </td>
                                <td>
                                    <input type="text" name="uname" placeholder="UserName" value="" />
                                    <div id="demo"></div>

                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <p>DOB :</p>
                                </td>
                                <td>

                                    <input type="date" name="dob" placeholder="Date of Birth" value=''>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p>Gender:</p>
                                </td>
                                <td>
                                    <input type="radio" name="gender" value="male" />
                                    <p>Male</p>
                                    <input type="radio" name="gender" value="female" />
                                    <p>Female</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Phone :</p>
                                </td>
                                <td>
                                    <input type="text" name="phone" placeholder="Phone Number" value="" />



                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p>Email ID :</p>
                                </td>
                                <td>
                                    <input type="email" name="email" placeholder="Email" />
                                </td>
                            </tr>



                            <tr>
                                <td>
                                    <p>Address :</p>
                                </td>
                                <td>
                                    <input type="text" name="address" placeholder="Address" value="" />

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Country :</p>
                                </td>
                                <td>
                                    <select name="country">
                                        <option value=''>Select Country</option>
                                        <option value='Bangladesh'>Bangladesh</option>
                                        <option value='Japan'>Japan</option>
                                        <option value='Saudi Arabia'>Saudi Arabia</option>
                                        <option value='USA'>USA</option>
                                        <option value='UK'>UK</option>
                                        <option value='Italy'>Italy</option>
                                        <option value='Australia'>Australia</option>
                                        <option value='Other'>Other</option>
                                    </select>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p>State :</p>
                                </td>
                                <td>
                                    <select name="state">
                                        <option value=''>Select State</option>
                                        <option value='Dhaka'>Dhaka</option>
                                        <option value='Chitagong'>Chitagong</option>
                                        <option value='Sylhet'>Sylhet</option>
                                        <option value='Rajshahi'>Rajshahi</option>
                                        <option value='Khulna'>Khulna</option>
                                        <option value='Borishal'>Borishal</option>
                                        <option value='Rongpur'>Rongpur</option>
                                        <option value='Other'>Other</option>
                                    </select>

                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <p>Password :</p>
                                </td>
                                <td>
                                    <input type="password" placeholder="Password" name="pass" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p>Confirm Password :</p>
                                </td>
                                <td>
                                    <input type="password" placeholder="Confirm Password" name="confirmPass" />

                                </td>
                            </tr>

                            <td>

                            </td>
                            </tr>
                        </table>




                        <input type="submit" value="Submit" id="submitBtn" />

                    </form>



                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>





                </center>

            </div>

        </div>


        <!-- end of column two -->

        <div id="content_column_three">

            <div class="column_three_section">
                <h2 style="color: #f5ea01;">About This Blog</h2>
                <p>Hallo All </p>
            </div>

        </div>
        <!-- end of column three -->


    </div>
    <!-- end of content -->

    <div id="bottom_panel">
        <center>
            <div class="bottom_panel_section">
                <a href="#">Home</a> | <a href="#">Profile</a> | <a href="#"> Follower</a> | <a href="#">Following </a>| <a href="#">About Us</a> | <a href="#">Contact Us</a>
                <br />
                <br />
                <p> Copyright © 2016 </p> <a href="#"><strong>Muhammad Abdul Qaium</strong></a>
            </div>
        </center>

    </div>
    <!-- end of bottom panel -->

    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>

    <script type="text/javascript">
        // Wait for the DOM to be ready
        $(function() {
          // Initialize form validation on the registration form.
          // It has the name attribute "registration"
          $("form[name='myForm']").validate({
            // Specify validation rules
            rules: {
              // The key name on the left side is the name attribute
              // of an input field. Validation rules are defined
              // on the right side
              name: "required",
              uname: "required",
              email: {
                required: true,
                email: true
              },
              pass: {
                required: true,
                minlength: 5
              },
              confirmPass : {
                    minlength : 5,
                    equalTo : "#pass"
                }
            },
            // Specify validation error messages
            messages: {
              name: "Please enter your firstname",
              uname: "Please enter your lastname",
              pass: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
              },
              email: "Please enter a valid email address"
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
              form.submit();
            }
          });
        }); 
    </script>







</body>