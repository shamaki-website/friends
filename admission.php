<?php
session_start();
error_reporting(1);
include 'header.php';
include('../connect.php');

 $sql = "SELECT * FROM `account` WHERE `email` ='".$email."'";
$result = mysqli_query($conn, $sql);
                
                  // output data of each row
echo $row = mysqli_fetch_assoc($result);
                

 date_default_timezone_set('Africa/Lagos');
 $current_date = date('Y-m-d');

if(isset($_POST["btnsubmit"]))
{

//Get application ID
function applicationID(){
$string = (uniqid(rand(), true));
return substr($string, 0,5);
}
	
$applicationID = "ADM/".date("Y")."/".applicationID();		


$fullname = mysqli_real_escape_string($conn,$_POST['txtfullname']);
$sex = mysqli_real_escape_string($conn,$_POST['cmdsex']);
$phone = mysqli_real_escape_string($conn,$_POST['txtphone']);
$email = mysqli_real_escape_string($conn,$_POST['txtemail']);
$country = mysqli_real_escape_string($conn,$_POST['cmdcountry']);
$state = mysqli_real_escape_string($conn,$_POST['cmdstate']);
$lga = mysqli_real_escape_string($conn,$_POST['cmdlga']);
$address = mysqli_real_escape_string($conn,$_POST['txtaddress']);
$dob = mysqli_real_escape_string($conn,$_POST['datedob']);
$pcs = mysqli_real_escape_string($conn,$_POST['cmdpcs']);
$problem = mysqli_real_escape_string($conn,$_POST['txtproblem']);
$jambno = mysqli_real_escape_string($conn,$_POST['txtjambno']);
$jambscore = mysqli_real_escape_string($conn,$_POST['txtjambscore']);
$dept = mysqli_real_escape_string($conn,$_POST['cmddept']);
$faculty = mysqli_real_escape_string($conn,$_POST['txtfaculty']);
$exam = mysqli_real_escape_string($conn,$_POST['cmdexam']);
$yg = mysqli_real_escape_string($conn,$_POST['txtyg']);
$eng = mysqli_real_escape_string($conn,$_POST['cmdeng']);
$math = mysqli_real_escape_string($conn,$_POST['cmdmath']);
$other = mysqli_real_escape_string($conn,$_POST['cmdother']);

$photo='upload/default.jpg';
$credential='upload/Result-Report-card-software.png';

$status='0';


//check if jamb number already exist
$sql_u = "SELECT * FROM admission WHERE jamb_number='$jambno'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
$msg_error = "Jamb number already exist";

}else {	
//check if  email already exist
$sql_u = "SELECT * FROM admission WHERE email='$email'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
$msg_error = "Email already exist";

}else {
$sql = "INSERT INTO admission (fullname,sex,phone,email,country,state,lga,address,dob,pcs,problem,jamb_number,jamb_score,dept,faculty,ssce_details,yg,eng,math,other,ssce,status,photo,date_admission,applicationID)VALUES('$fullname','$sex','$phone','$email','$country','$state','$lga','$address','$dob','$pcs','$problem','$jambno','$jambscore','$dept','$faculty','$exam','$yg','$eng','$math','$other','$credential','$status','$photo','$current_date','$applicationID')";
 
 if ($conn->query($sql) === TRUE) {
 
$_SESSION['email']=$email;
$_SESSION['fullname']=$fullname;
$_SESSION['ApplicationID']=$applicationID;

header("Location: upload.php"); 
    }else { 
?>
<script>
alert('Problem Occured , Try Again');

</script>
<?php
}
}
}
}
?>


<title>Application Form| Online student admission system</title>
<?php if ($msg <> "") { ?>
  <style type="text/css">
<!--
.style1 {
	font-size: 12px;
	color: #FF0000;
}
-->
  </style>
  <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
    <button data-dismiss="alert" class="close" type="button">x</button>
    <p><?php echo $msg; ?></p>
  </div>
<?php } ?>
<p><h4><?php echo "<p> <font color=red font face='arial' size='3pt'>$msg_error</font> </p>"; ?></h4>  </p>
  <h4><?php echo "<p> <font color=green font face='arial' size='3pt'>$msg_success</font> </p>"; ?></h4>  </p>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="well contact-form-container">
        <form class="form-horizontal contactform" action="" method="post" name="f" >
          <?php
            
               
                    

                    ?>
          <fieldset>
	
                         <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Fullname:
                <input type="text"  id="pass1" class="form-control" name="txtfullname" value="<?php echo $row['fullname']; ?>" required="">
              </label>
            </div>
			<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Sex:
               <select name="cmdsex" id="gender" class="form-control" required="">
                                                    <option value=" ">--Select Gender--</option>
                                                     <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                              </select>
              </label>
            </div>
			  <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">phone:
                <input type="number"  id="pass1" class="form-control" name="txtphone" value="<?php if (isset($_POST['txtphone']))?><?php echo $_POST['txtphone']; ?>" required="">
              </label>
            </div>
				  <div class="form-group">
              <label class="col-lg-12 control-label" for="uemail">Email:
             <input type="email" name="txtemail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  value="<?php echo $secmail; ?>"  required="" placeholder="shamaki@gmail.com">
              </label>
            </div>
        <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Country:
               <select name="cmdcountry" id="gender" class="form-control" required="">
                                                    <option value=" ">---Select Country---</option>
                                                     <option value="Afganistan">Afghanistan</option>
   <option value="Albania">Albania</option>
   <option value="Algeria">Algeria</option>
   <option value="American Samoa">American Samoa</option>
   <option value="Andorra">Andorra</option>
   <option value="Angola">Angola</option>
   <option value="Anguilla">Anguilla</option>
   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
   <option value="Argentina">Argentina</option>
   <option value="Armenia">Armenia</option>
   <option value="Aruba">Aruba</option>
   <option value="Australia">Australia</option>
   <option value="Austria">Austria</option>
   <option value="Azerbaijan">Azerbaijan</option>
   <option value="Bahamas">Bahamas</option>
   <option value="Bahrain">Bahrain</option>
   <option value="Bangladesh">Bangladesh</option>
   <option value="Barbados">Barbados</option>
   <option value="Belarus">Belarus</option>
   <option value="Belgium">Belgium</option>
   <option value="Belize">Belize</option>
   <option value="Benin">Benin</option>
   <option value="Bermuda">Bermuda</option>
   <option value="Bhutan">Bhutan</option>
   <option value="Bolivia">Bolivia</option>
   <option value="Bonaire">Bonaire</option>
   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
   <option value="Botswana">Botswana</option>
   <option value="Brazil">Brazil</option>
   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
   <option value="Brunei">Brunei</option>
   <option value="Bulgaria">Bulgaria</option>
   <option value="Burkina Faso">Burkina Faso</option>
   <option value="Burundi">Burundi</option>
   <option value="Cambodia">Cambodia</option>
   <option value="Cameroon">Cameroon</option>
   <option value="Canada">Canada</option>
   <option value="Canary Islands">Canary Islands</option>
   <option value="Cape Verde">Cape Verde</option>
   <option value="Cayman Islands">Cayman Islands</option>
   <option value="Central African Republic">Central African Republic</option>
   <option value="Chad">Chad</option>
   <option value="Channel Islands">Channel Islands</option>
   <option value="Chile">Chile</option>
   <option value="China">China</option>
   <option value="Christmas Island">Christmas Island</option>
   <option value="Cocos Island">Cocos Island</option>
   <option value="Colombia">Colombia</option>
   <option value="Comoros">Comoros</option>
   <option value="Congo">Congo</option>
   <option value="Cook Islands">Cook Islands</option>
   <option value="Costa Rica">Costa Rica</option>
   <option value="Cote DIvoire">Cote DIvoire</option>
   <option value="Croatia">Croatia</option>
   <option value="Cuba">Cuba</option>
   <option value="Curaco">Curacao</option>
   <option value="Cyprus">Cyprus</option>
   <option value="Czech Republic">Czech Republic</option>
   <option value="Denmark">Denmark</option>
   <option value="Djibouti">Djibouti</option>
   <option value="Dominica">Dominica</option>
   <option value="Dominican Republic">Dominican Republic</option>
   <option value="East Timor">East Timor</option>
   <option value="Ecuador">Ecuador</option>
   <option value="Egypt">Egypt</option>
   <option value="El Salvador">El Salvador</option>
   <option value="Equatorial Guinea">Equatorial Guinea</option>
   <option value="Eritrea">Eritrea</option>
   <option value="Estonia">Estonia</option>
   <option value="Ethiopia">Ethiopia</option>
   <option value="Falkland Islands">Falkland Islands</option>
   <option value="Faroe Islands">Faroe Islands</option>
   <option value="Fiji">Fiji</option>
   <option value="Finland">Finland</option>
   <option value="France">France</option>
   <option value="French Guiana">French Guiana</option>
   <option value="French Polynesia">French Polynesia</option>
   <option value="French Southern Ter">French Southern Ter</option>
   <option value="Gabon">Gabon</option>
   <option value="Gambia">Gambia</option>
   <option value="Georgia">Georgia</option>
   <option value="Germany">Germany</option>
   <option value="Ghana">Ghana</option>
   <option value="Gibraltar">Gibraltar</option>
   <option value="Great Britain">Great Britain</option>
   <option value="Greece">Greece</option>
   <option value="Greenland">Greenland</option>
   <option value="Grenada">Grenada</option>
   <option value="Guadeloupe">Guadeloupe</option>
   <option value="Guam">Guam</option>
   <option value="Guatemala">Guatemala</option>
   <option value="Guinea">Guinea</option>
   <option value="Guyana">Guyana</option>
   <option value="Haiti">Haiti</option>
   <option value="Hawaii">Hawaii</option>
   <option value="Honduras">Honduras</option>
   <option value="Hong Kong">Hong Kong</option>
   <option value="Hungary">Hungary</option>
   <option value="Iceland">Iceland</option>
   <option value="Indonesia">Indonesia</option>
   <option value="India">India</option>
   <option value="Iran">Iran</option>
   <option value="Iraq">Iraq</option>
   <option value="Ireland">Ireland</option>
   <option value="Isle of Man">Isle of Man</option>
   <option value="Israel">Israel</option>
   <option value="Italy">Italy</option>
   <option value="Jamaica">Jamaica</option>
   <option value="Japan">Japan</option>
   <option value="Jordan">Jordan</option>
   <option value="Kazakhstan">Kazakhstan</option>
   <option value="Kenya">Kenya</option>
   <option value="Kiribati">Kiribati</option>
   <option value="Korea North">Korea North</option>
   <option value="Korea Sout">Korea South</option>
   <option value="Kuwait">Kuwait</option>
   <option value="Kyrgyzstan">Kyrgyzstan</option>
   <option value="Laos">Laos</option>
   <option value="Latvia">Latvia</option>
   <option value="Lebanon">Lebanon</option>
   <option value="Lesotho">Lesotho</option>
   <option value="Liberia">Liberia</option>
   <option value="Libya">Libya</option>
   <option value="Liechtenstein">Liechtenstein</option>
   <option value="Lithuania">Lithuania</option>
   <option value="Luxembourg">Luxembourg</option>
   <option value="Macau">Macau</option>
   <option value="Macedonia">Macedonia</option>
   <option value="Madagascar">Madagascar</option>
   <option value="Malaysia">Malaysia</option>
   <option value="Malawi">Malawi</option>
   <option value="Maldives">Maldives</option>
   <option value="Mali">Mali</option>
   <option value="Malta">Malta</option>
   <option value="Marshall Islands">Marshall Islands</option>
   <option value="Martinique">Martinique</option>
   <option value="Mauritania">Mauritania</option>
   <option value="Mauritius">Mauritius</option>
   <option value="Mayotte">Mayotte</option>
   <option value="Mexico">Mexico</option>
   <option value="Midway Islands">Midway Islands</option>
   <option value="Moldova">Moldova</option>
   <option value="Monaco">Monaco</option>
   <option value="Mongolia">Mongolia</option>
   <option value="Montserrat">Montserrat</option>
   <option value="Morocco">Morocco</option>
   <option value="Mozambique">Mozambique</option>
   <option value="Myanmar">Myanmar</option>
   <option value="Nambia">Nambia</option>
   <option value="Nauru">Nauru</option>
   <option value="Nepal">Nepal</option>
   <option value="Netherland Antilles">Netherland Antilles</option>
   <option value="Netherlands">Netherlands (Holland, Europe)</option>
   <option value="Nevis">Nevis</option>
   <option value="New Caledonia">New Caledonia</option>
   <option value="New Zealand">New Zealand</option>
   <option value="Nicaragua">Nicaragua</option>
   <option value="Niger">Niger</option>
   <option value="Nigeria">Nigeria</option>
   <option value="Niue">Niue</option>
   <option value="Norfolk Island">Norfolk Island</option>
   <option value="Norway">Norway</option>
   <option value="Oman">Oman</option>
   <option value="Pakistan">Pakistan</option>
   <option value="Palau Island">Palau Island</option>
   <option value="Palestine">Palestine</option>
   <option value="Panama">Panama</option>
   <option value="Papua New Guinea">Papua New Guinea</option>
   <option value="Paraguay">Paraguay</option>
   <option value="Peru">Peru</option>
   <option value="Phillipines">Philippines</option>
   <option value="Pitcairn Island">Pitcairn Island</option>
   <option value="Poland">Poland</option>
   <option value="Portugal">Portugal</option>
   <option value="Puerto Rico">Puerto Rico</option>
   <option value="Qatar">Qatar</option>
   <option value="Republic of Montenegro">Republic of Montenegro</option>
   <option value="Republic of Serbia">Republic of Serbia</option>
   <option value="Reunion">Reunion</option>
   <option value="Romania">Romania</option>
   <option value="Russia">Russia</option>
   <option value="Rwanda">Rwanda</option>
   <option value="St Barthelemy">St Barthelemy</option>
   <option value="St Eustatius">St Eustatius</option>
   <option value="St Helena">St Helena</option>
   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
   <option value="St Lucia">St Lucia</option>
   <option value="St Maarten">St Maarten</option>
   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
   <option value="Saipan">Saipan</option>
   <option value="Samoa">Samoa</option>
   <option value="Samoa American">Samoa American</option>
   <option value="San Marino">San Marino</option>
   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
   <option value="Saudi Arabia">Saudi Arabia</option>
   <option value="Senegal">Senegal</option>
   <option value="Seychelles">Seychelles</option>
   <option value="Sierra Leone">Sierra Leone</option>
   <option value="Singapore">Singapore</option>
   <option value="Slovakia">Slovakia</option>
   <option value="Slovenia">Slovenia</option>
   <option value="Solomon Islands">Solomon Islands</option>
   <option value="Somalia">Somalia</option>
   <option value="South Africa">South Africa</option>
   <option value="Spain">Spain</option>
   <option value="Sri Lanka">Sri Lanka</option>
   <option value="Sudan">Sudan</option>
   <option value="Suriname">Suriname</option>
   <option value="Swaziland">Swaziland</option>
   <option value="Sweden">Sweden</option>
   <option value="Switzerland">Switzerland</option>
   <option value="Syria">Syria</option>
   <option value="Tahiti">Tahiti</option>
   <option value="Taiwan">Taiwan</option>
   <option value="Tajikistan">Tajikistan</option>
   <option value="Tanzania">Tanzania</option>
   <option value="Thailand">Thailand</option>
   <option value="Togo">Togo</option>
   <option value="Tokelau">Tokelau</option>
   <option value="Tonga">Tonga</option>
   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
   <option value="Tunisia">Tunisia</option>
   <option value="Turkey">Turkey</option>
   <option value="Turkmenistan">Turkmenistan</option>
   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
   <option value="Tuvalu">Tuvalu</option>
   <option value="Uganda">Uganda</option>
   <option value="United Kingdom">United Kingdom</option>
   <option value="Ukraine">Ukraine</option>
   <option value="United Arab Erimates">United Arab Emirates</option>
   <option value="United States of America">United States of America</option>
   <option value="Uraguay">Uruguay</option>
   <option value="Uzbekistan">Uzbekistan</option>
   <option value="Vanuatu">Vanuatu</option>
   <option value="Vatican City State">Vatican City State</option>
   <option value="Venezuela">Venezuela</option>
   <option value="Vietnam">Vietnam</option>
   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
   <option value="Wake Island">Wake Island</option>
   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
   <option value="Yemen">Yemen</option>
   <option value="Zaire">Zaire</option>
   <option value="Zambia">Zambia</option>
   <option value="Zimbabwe">Zimbabwe</option>                          
                </select>
              </label>
            </div>
				<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">State:
               <select name="cmdstate" onchange="toggleLGA(this);" id="state"class="form-control" required="">
                                                   <option value="" selected="selected">- Select -</option>
              <option value="Abia">Abia</option>
              <option value="Adamawa">Adamawa</option>
              <option value="AkwaIbom">AkwaIbom</option>
              <option value="Anambra">Anambra</option>
              <option value="Bauchi">Bauchi</option>
              <option value="Bayelsa">Bayelsa</option>
              <option value="Benue">Benue</option>
              <option value="Borno">Borno</option>
              <option value="Cross River">Cross River</option>
              <option value="Delta">Delta</option>
              <option value="Ebonyi">Ebonyi</option>
              <option value="Edo">Edo</option>
              <option value="Ekiti">Ekiti</option>
              <option value="Enugu">Enugu</option>
              <option value="FCT">FCT</option>
              <option value="Gombe">Gombe</option>
              <option value="Imo">Imo</option>
              <option value="Jigawa">Jigawa</option>
              <option value="Kaduna">Kaduna</option>
              <option value="Kano">Kano</option>
              <option value="Katsina">Katsina</option>
              <option value="Kebbi">Kebbi</option>
              <option value="Kogi">Kogi</option>
              <option value="Kwara">Kwara</option>
              <option value="Lagos">Lagos</option>
              <option value="Nasarawa">Nasarawa</option>
              <option value="Niger">Niger</option>
              <option value="Ogun">Ogun</option>
              <option value="Ondo">Ondo</option>
              <option value="Osun">Osun</option>
              <option value="Oyo">Oyo</option>
              <option value="Plateau">Plateau</option>
              <option value="Rivers">Rivers</option>
              <option value="Sokoto">Sokoto</option>
              <option value="Taraba">Taraba</option>
              <option value="Yobe">Yobe</option>
              <option value="Zamfara">Zamafara</option>
                </select>                                     
              </label>
            </div>
        <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">LGA:
                <select name="cmdlga" value="lga" id="lga" class="form-control select-lga">
                </select>
              </label>
            </div>
            <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Home Address:
                <input type="text"  id="pass1" class="form-control" name="txtaddress" value="<?php if (isset($_POST['txtaddress']))?><?php echo $_POST['txtaddress']; ?>" required="">
              </label>
            </div>
         
                     <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">D.O.B:
                <input type="date"  id="pass1" class="form-control" name="datedob"  value="<?php if (isset($_POST['datedob']))?><?php echo $_POST['datedob']; ?>" required="">
              </label>
            </div>
             <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Physically Challenge Status:
               <select name="cmdpcs" id="pcs" class="form-control" required="">
                                                    <option value=" ">--Select--</option>
                                                     <option value="Yes">Yes</option>
                                                      <option value="No">No</option>
                                              </select>
              </label>
            </div>
                <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">If Yes (Specify the problem):
                <input type="text"  id="pass1" class="form-control" name="txtproblem"  value="<?php if (isset($_POST['datedob']))?><?php echo $_POST['problem']; ?>" placeholder="Optional">
              </label>
            </div>

		  <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Jamb Number:
                <input type="text"  id="pass1" class="form-control" name="txtjambno"  value="<?php if (isset($_POST['txtjambno']))?><?php echo $_POST['txtjambno']; ?>" required="">
              </label>
            </div>
			<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Jamb score:
                <input type="text"  id="pass1" class="form-control" name="txtjambscore"  value="<?php if (isset($_POST['txtjambscore']))?><?php echo $_POST['txtjambscore']; ?>" required="">
              </label>
            </div>

            <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Department Apply For:
               <select name="cmddept" id="dept" class="form-control" required="">
                                                    <option value=" ">--Select--</option>
                                                    <option value="Diploma Accountancy">Diploma Accountancy</option>
                                                    <option value="Diploma in Public Account and Audit">Diploma in Public Account and Audit</option>
                                                    <option value="HND Accountacy">HND Accountacy</option>
                                                    <option value="HND Accountacy (SP)">HND Accountacy (SP)</option>
                                                    <option value="National Diploma in Accountancy (PT)">National Diploma in Accountancy (PT)</option>
                                                    <option value="National Diploma in Accountancy (SP)">National Diploma in Accountancy (SP)</option>
                                                    <option value="National Diploma in Accountancy ">National Diploma in Accountancy</option>
                                                    <option value="Pre Heigher National Diploma in Accountancy">Pre Heigher National Diploma in Accountancy</option>
                                                    <option value="National Diploma Banking and Finance">National Diploma Banking and Finance</option>
                                                    <option value="National Diploma Banking and Finance (PT)">National Diploma Banking and Finance (PT)</option>
                                                    <option value="National Diploma Banking and Finance">National Diploma Banking and Finance</option>
                                                    <option value="HND Business Administration and Management">HND Business Administration and Management</option>
                                                    <option value="HND Business Administration and Management (SP)">HND Business Administration and Management (SP)</option>
                                                    <option value="National Diploma in Business Administration and Management">National Diploma in Business Administration and Management</option>
                                                    <option value="National Diploma in Business Administration and Management (PT)">National Diploma in Business Administration and Management (PT)</option>
                                                     <option value="Diploma in Business Administration and Management">Diploma in Business Administration and Management</option>
                                                     <option value="HND Office Technology and Managemen">HND Office Technology and Managemen</option>
                                                     <option value="HND Office Technology and Management (SP)">HND Office Technology and Management (SP)</option>
                                                     <option value="Pre Heigher National Diploma in Office Technology and Management">Pre Heigher National Diploma in Office Technology and Management</option>
                                                     <option value="National Diploma Technology and Management">National Diploma Technology and Management</option>
                                                     <option value="National Diploma Technology and Management (PT)">National Diploma Technology and Management(PT)</option>
                                                     <option value="Diploma in Office Technology and Management">Diploma in Office Technology and Management</option>
                                                     <option value="HND Library and Information Science">HND Library and Information Science</option>
                                                     <option value="HND Library and Information Science (SP)">HND Library and Information Science (SP)</option>
                                                     <option value="National Diploma Library and Information Science">National Diploma Library and Information Science</option>
                                                      <option value="National Diploma Library and Information Science (PT)">National Diploma Library and Information Science (PT)</option>
                                                      <option value="Diploma Library and Information Science">Diploma Library and Information Science</option>
                                                      <option value="Pre Higher National Diploma in Library and Information Science">Pre Higher National Diploma in Library and Information Science</option>
                                                      <option value="HND Local Government Studies">HND Local Government Studies</option>
                                                      <option value="HND Local Government Studies (SP)">HND Local Government Studies (SP)</option>
                                                      <option value="National Diploma in Local Government Studies">National Diploma in Local Government Studies</option>
                                                      <option value="National Diploma in Local Government Studies (PT)">National Diploma in Local Government Studies(PT)</option>
                                                      <option value="Pre Higher National Diploma in Local Government Studies">Pre Higher National Diploma in Local Government Studies</option>
                                                      <option value="HND Public Administration">HND Public Administration</option>
                                                      <option value="HND Public Administration (SP)">HND Public Administration (SP)</option>
                                                      <option value="National Diploma in Public Administration">National Diploma in Public Administration</option>
                                                      <option value="National Diploma in Public Administration (PT)">National Diploma in Public Administration (PT)</option>
                                                      <option value="National Diploma in Public Administration (SP)">National Diploma in Public Administration (SP)</option>
                                                      <option value="Diploma in Public Administration">Diploma in Public Administration</option>
                                                      <option value="Diploma in Public Administration (SP)">Diploma in Public Administration (SP)</option>
                                                      <option value="Pre Higher National Diploma in Public Administration">Pre Higher National Diploma in Public Administration</option>
                                                      <option value="Diploma in Crime Management Technology">Diploma in Crime Management Technology</option>
                                                      <option value="HND Social Development (Community and Adult Education)">HND Social Development (Community and Adult Education)</option>
                                                      <option value="HND Social Development (Social Welfare)">HND Social Development (Social Welfare)</option>
                                                      <option value="HND Social Development (Social Welfare) (SP)">HND Social Development (Social Welfare) (SP)</option>
                                                      <option value="National Diploma in Community and Adult Education (PT)">National Diploma in Community and Adult Education (PT)</option>
                                                      <option value="National Diploma Community and Adult Education">National Diploma Community and Adult Education</option>
                                                      <option value="National Diploma Social Development (PT)">National Diploma Social Development (PT)</option>
                                                      <option value="National Diploma Social Development (SP)">National Diploma Social Development (SP)</option>
                                                      <option value="National Diploma in Social Development">National Diploma in Social Development</option>
                                                      <option value="Diploma in Community Development">Diploma in Community Development</option>
                                                      <option value="Diploma Social Development">Diploma Social Development</option>
                                                      <option value="Pre Higher National Diploma in Social Development">Pre Higher National Diploma in Social Development</option>
                                                      <option value="Pre Higher National Diploma in Community Development">Pre Higher National Diploma in Community Development</option>
                                                      <option value="National Diploma in Community Health">National Diploma in Community Health</option>
                                                      <option value="Pre ND in Community Health">Pre ND in Community Health</option>
                                                      <option value="Diploma in Community Health">Diploma in Community Health</option>
                                                      <option value="National Diploma in Computer Science">National Diploma in Computer Science</option>
                                                      <option value="Diploma in Computer Science">Diploma in Computer Science</option>
                                                      <option value="Pre ND Electrical Engineering">Pre ND Electrical Engineering</option>
                                                      <option value="Diploma in Environmental Science Management Technology">Diploma in Environmental Science Management Technology</option>
                                                      <option value="National Diploma Health information management">National Diploma Health information management</option>
                                                      <option value="Pre ND Health Information Management">Pre ND Health Information Management</option>
                                                      <option value="National Diploma Science Laboratory Technology">National Diploma Science Laboratory Technology</option>
                                                      <option value="Pre ND Science Laboratory Technology">Pre ND Science Laboratory Technology</option>
                                              </select>
              </label>
            </div>
						<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Faculty:
              	<select id="faculty" class="form-control" name="txtfaculty" readonly required="">
              		<option>-- select -- </option>
              	</select >
                
              </label>
            </div>
			
			<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Qualification:
               <select name="cmdexam" id="pcs" class="form-control" required="">
                                                    <option value=" ">--Select--</option>
                                                     <option value="NECO">NECO</option>
                                                      <option value="WAEC">WAEC</option>
                                                      <option value="NABTEB">NABTEB</option>
                                                      <option value="DIPLOMA">DIPLOMA</option>
                                                      <option value="NCE">NCE</option>
                                                      <option value="GRADE II">GRADE II</option>
                                                      <option value="GCE">GCE</option>
                                                      <option value="CERTIFICATE">CERTIFICATE</option>
                                              </select>
              </label>
            </div>
<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Year of Graduate:
                <input type="text"  id="pass1" class="form-control" name="txtyg"  value="<?php if (isset($_POST['txtyg']))?><?php echo $_POST['txtyg']; ?>" required="" placeholder="Example 2019">
              </label>
            </div>
<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">English:
               <select name="cmdeng" id="pcs" class="form-control" required="">
                                                    <option value=" ">--Select--</option>
                                                     <option value="A1">A1</option>
                                                      <option value="B2">B2</option>
                                                      <option value="B3">B3</option>
                                                      <option value="C4">C4</option>
                                                      <option value="C5">C5</option>
                                                      <option value="C6">C6</option>
                                                      <option value="D7">D7</option>
                                                      <option value="E8">E8</option>
                                                      <option value="F9">F9</option>
                                              </select>
              </label>
            </div>
<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Mathematic:
               <select name="cmdmath" id="pcs" class="form-control" required="">
                                                    <option value=" ">--Select--</option>
                                                     <option value="A1">A1</option>
                                                      <option value="B2">B2</option>
                                                      <option value="B3">B3</option>
                                                      <option value="C4">C4</option>
                                                      <option value="C5">C5</option>
                                                      <option value="C6">C6</option>
                                                      <option value="D7">D7</option>
                                                      <option value="E8">E8</option>
                                                      <option value="F9">F9</option>
                                              </select>
              </label>
            </div>
<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Do you have three (3) credit:
               <select name="cmdother" id="pcs" class="form-control" required="">
                                                    <option value=" ">--Select--</option>
                                                     <option value="yes">Yes</option>
                                                      <option value="no">No</option>
                                              </select>
              </label>
            </div>
            <div style="height: 10px;clear: both"></div>

            <div class="form-group">
			
			
              <div class="col-lg-10">
                <button class="btn btn-primary" type="submit" name="btnsubmit">Submit</button> 
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

<p>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p data-v-6f398a90="">&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script src="js/lga.min.js"></script>
<script src="admin/plugins/jquery/jquery.min.js" type="text/javascript"></script>
<script src="admin/plugins/jquery/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
    $("#dept").change(function () {
        var val = $(this).val();
        if (val == "Diploma Accountancy") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        } else if (val == "Diploma in Public Account and Audit") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        } else if (val == "HND Accountacy") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        } else if (val == "HND Accountacy (SP)") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "National Diploma in Accountancy (PT)") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "National Diploma in Accountancy (SP)") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "National Diploma in Accountancy") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "Pre Heigher National Diploma in Accountancy") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "National Diploma Banking and Finance") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "National Diploma Banking and Finance (PT)") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "HND Business Administration and Management") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "HND Business Administration and Management (SP)") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "National Diploma in Business Administration and Management") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "National Diploma in Business Administration and Management (PT)") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "Diploma in Business Administration and Management") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "HND Office Technology and Managemen") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "HND Office Technology and Management (SP)") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "Pre Heigher National Diploma in Office Technology and Management") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "National Diploma Technology and Management") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "National Diploma Technology and Management (PT)") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "Diploma in Office Technology and Management") {
            $("#faculty").html("<option value='Business Studies'>Faculty of Business Studies</option>");
        }else if (val == "HND Library and Information Science") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "HND Library and Information Science (SP)") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "National Diploma Library and Information Science") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "National Diploma Library and Information Science (PT)") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "Diploma Library and Information Science") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "Pre Higher National Diploma in Library and Information Science") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "HND Local Government Studies") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "HND Local Government Studies (SP)") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "National Diploma in Local Government Studies") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "National Diploma in Local Government Studies (PT)") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "Pre Higher National Diploma in Local Government Studies") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "HND Public Administration") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "HND Public Administration (SP)") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "National Diploma in Public Administration") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "National Diploma in Public Administration (PT)") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "National Diploma in Public Administration (SP)") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "Diploma in Public Administration") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "Diploma in Public Administration (SP)") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "Pre Higher National Diploma in Public Administration") {
            $("#faculty").html("<option value='Administrative Studies'>Faculty of Administrative Studies</option>");
        }else if (val == "Diploma in Crime Management Technology") {
            $("#faculty").html("<option value='Social Development'>Faculty of Social Development</option>");
        }else if (val == "HND Social Development (Community and Adult Education)") {
            $("#faculty").html("<option value='Social Development'>Faculty of Social Development</option>");
        }else if (val == "HND Social Development (Social Welfare)") {
            $("#faculty").html("<option value='Social Development'>Faculty of Social Development</option>");
        }else if (val == "HND Social Development (Social Welfare) (SP)") {
            $("#faculty").html("<option value='Social Development'>Faculty of Social Development</option>");
        }else if (val == "National Diploma in Community and Adult Education (PT)") {
            $("#faculty").html("<option value='Social Development'>Faculty of Social Development</option>");
        }else if (val == "National Diploma Community and Adult Education") {
            $("#faculty").html("<option value='Social Development'>Faculty of Social Development</option>");
        }else if (val == "National Diploma Social Development (PT)") {
            $("#faculty").html("<option value='Social Development'>Faculty of Social Development</option>");
        }else if (val == "National Diploma Social Development (SP)") {
            $("#faculty").html("<option value='Social Development'>Faculty of Social Development</option>");
        }else if (val == "National Diploma in Social Development") {
            $("#faculty").html("<option value='Social Development'>Faculty of Social Development</option>");
        }else if (val == "Diploma in Community Development") {
            $("#faculty").html("<option value='Social Development'>Faculty of Social Development</option>");
        }else if (val == "Diploma Social Development") {
            $("#faculty").html("<option value='Social Development'>Faculty of Social Development</option>");
        }else if (val == "Pre Higher National Diploma in Social Development") {
            $("#faculty").html("<option value='Social Development'>Faculty of Social Development</option>");
        }else if (val == "Pre Higher National Diploma in Community Development") {
            $("#faculty").html("<option value='Social Development'>Faculty of Social Development</option>");
        }else if (val == "National Diploma in Community Health") {
            $("#faculty").html("<option value='Science and Engineering'>Faculty of Science and Engineering</option>");
        }else if (val == "Pre ND in Community Health") {
            $("#faculty").html("<option value='Science and Engineering'>Faculty of Science and Engineering</option>");
        }else if (val == "Diploma in Community Health") {
            $("#faculty").html("<option value='Science and Engineering'>Faculty of Science and Engineering</option>");
        }else if (val == "National Diploma in Computer Science") {
            $("#faculty").html("<option value='Science and Engineering'>Faculty of Science and Engineering</option>");
        }else if (val == "Diploma in Computer Science") {
            $("#faculty").html("<option value='Science and Engineering'>Faculty of Science and Engineering</option>");
        }else if (val == "National Diploma in Electrical Engineering") {
            $("#faculty").html("<option value='Science and Engineering'>Faculty of Science and Engineering</option>");
        }else if (val == "Pre ND Electrical Engineering") {
            $("#faculty").html("<option value='Science and Engineering'>Faculty of Science and Engineering</option>");
        }else if (val == "Diploma in Environmental Science Management Technology") {
            $("#faculty").html("<option value='Science and Engineering'>Faculty of Science and Engineering</option>");
        }else if (val == "National Diploma Health information management") {
            $("#faculty").html("<option value='Science and Engineering'>Faculty of Science and Engineering</option>");
        }else if (val == "Pre ND Health Information Management") {
            $("#faculty").html("<option value='Science and Engineering'>Faculty of Science and Engineering</option>");
        }else if (val == "National Diploma Science Laboratory Technology") {
            $("#faculty").html("<option value='Science and Engineering'>Faculty of Science and Engineering</option>");
        }else if (val == "Pre ND Science Laboratory Technology") {
            $("#faculty").html("<option value='Science and Engineering'>Faculty of Science and Engineering</option>");
        }
    });
});

</script>

</body>
</html>