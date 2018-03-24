<?php
require 'header.php';
?>
<!-- Content -->
    <div class="container contents lisitng-grid-layout">
        <div class="row">
            <div class="span12 main-wrap" align="center">

                <!-- Main Content -->
                <div class="main">                               
                        <!-- Gallery Container -->
                        
                            <div class="gallery-2-columns isotope clearfix" align="center">
                              <h1><strong style="color:#FF0000"><u>REGISTRATION FORM</u></strong></h1></br></br> 
                                <div class="gallery-item isotope-item on-rent">
						               
						               <form action="companyreg.php" method="POST">									    
                                        <label>Enter Your E-Mail ID</label>
                                        <input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@something.com"><br/></br>
                                        <label>Create a Password for your account</label>
                                        <input type="password" name="pass1" required pattern="(?=^.{10,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password should have UpperCase, LowerCase, Number/SpecialChar and 10 chars"><br/></br>
                                        <label>Confirm  password</label>
                                        <input type="password" name="pass2" required pattern="(?=^.{10,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password should have UpperCase, LowerCase, Number/SpecialChar and 10 chars"><br/></br>
							</div>
							<div class="gallery-item isotope-item on-rent ">
										 <label>Enter company contact No</label>
                                        <input type="number" name="ContactNo" required><br/></br>
                                        <label>Enter Company Name</label>
                                        <input type="text" name="CompanyName" required ><br/></br>
                                        <label>Description</label>
                                        <textarea  name="Description" required></textarea>
                            </div>
							</div>
									<br/></br><input type="submit"id="submit" class="real-btn" >   <input type="reset"id="submit" class="real-btn" >
                                         <label>Already have an account?<a href="companysignup.php"> Sign In</a></label>
                                     </form>
                                


</div>
</div>
</div>
<?php
require 'footer.php';
?>
