<?php
require 'header.php';
?>
<!-- Content -->
    <div class="container contents lisitng-grid-layout">
        <div class="row">
            <div class="span12 main-wrap">

                <!-- Main Content -->
                <div class="main">                               
                        <!-- Gallery Container -->
                        <div class="span12 main-wrap" align="center">
						            
									    <h1><strong style="color:#FF0000"><u>REGISTRATION FORM</u></strong></h1></br></br>                           
 <form action="armyregester.php" method="POST">
    <label>Enter Your E-Mail ID</label>
    <input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@something.com"></br></br>
    <label>Enter Password For your account</label>
    <input type="password" name="pass1" required pattern="(?=^.{10,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password should have UpperCase, LowerCase, Number/SpecialChar and 10 chars"></br></br>
    <label>Confirm  password</label>
    <input type="password" name="pass2" required pattern="(?=^.{10,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password should have UpperCase, LowerCase, Number/SpecialChar and 10 chars"><br /></br>
	<label>Enter Mobile Number</label>
    <input type="number" name="MobN" required pattern="[0-9]{3}[0-9]{3}[0-9]{4}" title="enter 10 digit number"><br/></br>
    <input type="submit" id="submit" class="real-btn">  <input type="reset" id="submit" class="real-btn">
    <label>Already have an account?<a href="seeker.php"> Sign In</a></label>
 </form>

                              
</section>
</div>
</div>
</div>
</div>
</div>
<?php
require 'footer.php';
?>
