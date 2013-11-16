<?php
include("global.php");
print "
<SCRIPT language=JavaScript>
alert ("Welcome to spaceconquerers. Please remember that all people that have more than one account signed up for this game, both of their accounts will be delted. No one likes a cheater. Now that being said....... HAVE FUN! And all fields are required!")
</script>
<title>$title .:. Registration</title>
<body bgcolor=\"$bgcolor\" text=\"$text\">";

if ($username==1) {
	print "<font color=yellow>You must put a username!</font>";
}
elseif ($username==2) {
	print "<font color=yellow>Username already taken!</font>";
}
elseif ($password==1) {
	print "<font color=yellow>You must put a password!</font>";
}
elseif ($email==1) {
	print "<font color=yellow>You must put an email address!</font>";
}
elseif ($email==2) {
	print "<font color=yellow>Email Address alread in use!</font>";
}
print "
      <SCRIPT language=JavaScript>
<!--
function VerifyData() {

    if (document.formUser.password.value != document.formUser.verifypassword.value) {
      alert ("Your passwords do NOT match! Please Retry");
      return false;
   } else
      if (document.formUser.username.value != document.formUser.verifyusername.value) { 
		alert ("Your Username's do NOT match! Please Retry"); return false; 
      } else
	return true;
}
-->
</SCRIPT>
<form name=formUser onsubmit="return VerifyData()" action=\"register_check.php\" method=post>
<table>
<tr>
	<td>
	Desired Username (Planet Name):
	</td>
	<td>
	<input type=text name=\"username\" size=20>
	</td>
</tr>
<tr>
	<td>
	Verify Username:
	</td>
	<td input type=text name=\"verifyusername\" size=20>
	</td>
</tr>
<tr>
	<td>
	<p>
	Password:
	</td>
	<td>
	<input type=password name=\"password\" size=20>
	</td>
</tr>
<tr>
	<td>
	Verify Password:
	</td>
	<td>
	<input type=password name=\"verifypassword\" size=20>
	</td>
</tr>
<tr>
	<td><p>
	Email Address:
	</td>
	<td>
	<input type=text name=\"email\" size=20>
	</td>
</tr>
<tr>
	<td>
	Country:
	</td>
        <td>
	<select name=country> 
	<OPTION value=0 selected>-Select Country-</OPTION> <OPTION 
                          value=AD>Andorra</OPTION> <OPTION 
                          value=AF>Afghanistan</OPTION> <OPTION value=AG>Antigua 
                          And Barbuda</OPTION> <OPTION 
                          value=AI>Anguilla</OPTION> <OPTION 
                          value=AL>Albania</OPTION> <OPTION 
                          value=AM>Armenia</OPTION> <OPTION value=AN>Netherlands 
                          Antilles</OPTION> <OPTION value=AO>Angola</OPTION> 
                          <OPTION value=AQ>Antarctica</OPTION> <OPTION 
                          value=AR>Argentina</OPTION> <OPTION value=AS>American 
                          Samoa</OPTION> <OPTION value=AT>Austria</OPTION> 
                          <OPTION value=AU>Australia</OPTION> <OPTION 
                          value=AW>Aruba</OPTION> <OPTION 
                          value=AZ>Azerbaijan</OPTION> <OPTION value=BA>Bosnia 
                          and Herzegovina</OPTION> <OPTION 
                          value=BB>Barbados</OPTION> <OPTION 
                          value=BD>Bangladesh</OPTION> <OPTION 
                          value=BE>Belgium</OPTION> <OPTION value=BF>Burkina 
                          Faso</OPTION> <OPTION value=BG>Bulgaria</OPTION> 
                          <OPTION value=BH>Bahrain</OPTION> <OPTION 
                          value=BI>Burundi</OPTION> <OPTION 
                          value=BJ>Benin</OPTION> <OPTION 
                          value=BM>Bermuda</OPTION> <OPTION 
                          value=BN>Brunei</OPTION> <OPTION 
                          value=BO>Bolivia</OPTION> <OPTION 
                          value=BR>Brazil</OPTION> <OPTION 
                          value=BS>Bahamas</OPTION> <OPTION 
                          value=BT>Bhutan</OPTION> <OPTION value=BV>Bouvet 
                          Island</OPTION> <OPTION value=BW>Botswana</OPTION> 
                          <OPTION value=BY>Belarus</OPTION> <OPTION 
                          value=BZ>Belize</OPTION> <OPTION 
                          value=CA>Canada</OPTION> <OPTION value=CC>Cocos 
                          (Keeling) Islands</OPTION> <OPTION value=CD>Dem Rep of 
                          Congo (Zaire)</OPTION> <OPTION value=CF>Central 
                          African Republic</OPTION> <OPTION 
                          value=CG>Congo</OPTION> <OPTION 
                          value=CH>Switzerland</OPTION> <OPTION value=CI>Cote 
                          D'Ivoire (Ivory Coast)</OPTION> <OPTION value=CK>Cook 
                          Islands</OPTION> <OPTION value=CL>Chile</OPTION> 
                          <OPTION value=CM>Cameroon</OPTION> <OPTION 
                          value=CN>China</OPTION> <OPTION 
                          value=CO>Columbia</OPTION> <OPTION value=CR>Costa 
                          Rica</OPTION> <OPTION value=CU>Cuba</OPTION> <OPTION 
                          value=CV>Cape Verde</OPTION> <OPTION 
                          value=CX>Christmas Island</OPTION> <OPTION 
                          value=CY>Cyprus</OPTION> <OPTION value=CZ>Czech 
                          Republic</OPTION> <OPTION value=DJ>Djibouti</OPTION> 
                          <OPTION value=DK>Denmark</OPTION> <OPTION 
                          value=DM>Dominica</OPTION> <OPTION value=DO>Dominican 
                          Republic</OPTION> <OPTION value=DZ>Algeria</OPTION> 
                          <OPTION value=EC>Ecuador</OPTION> <OPTION 
                          value=EE>Estonia</OPTION> <OPTION 
                          value=EG>Egypt</OPTION> <OPTION value=EH>Western 
                          Sahara</OPTION> <OPTION value=ER>Eritrea</OPTION> 
                          <OPTION value=ES>Spain</OPTION> <OPTION 
                          value=ET>Ethiopia</OPTION> <OPTION 
                          value=FI>Finland</OPTION> <OPTION 
                          value=FJ>Fiji</OPTION> <OPTION value=FK>Falkland 
                          Islands (Malvinas)</OPTION> <OPTION 
                          value=FM>Micronesia</OPTION> <OPTION value=FO>Faroe 
                          Islands</OPTION> <OPTION value=FR>France</OPTION> 
                          <OPTION value=GA>Gabon</OPTION> <OPTION 
                          value=GD>Grenada</OPTION> <OPTION 
                          value=GE>Georgia</OPTION> <OPTION value=GF>French 
                          Guiana</OPTION> <OPTION value=GH>Ghana</OPTION> 
                          <OPTION value=GI>Gibraltar</OPTION> <OPTION 
                          value=GL>Greenland</OPTION> <OPTION 
                          value=GM>Gambia</OPTION> <OPTION 
                          value=DE>Germany</OPTION> <OPTION 
                          value=GN>Guinea</OPTION> <OPTION 
                          value=GP>Guadeloupe</OPTION> <OPTION 
                          value=GQ>Equatorial Guinea</OPTION> <OPTION 
                          value=GR>Greece</OPTION> <OPTION 
                          value=GT>Guatemala</OPTION> <OPTION 
                          value=GU>Guam</OPTION> <OPTION 
                          value=GW>Guinea-Bissau</OPTION> <OPTION 
                          value=GY>Guyana</OPTION> <OPTION value=HK>Hong Kong 
                          SAR, PRC</OPTION> <OPTION value=HM>Heard and McDonald 
                          Islands</OPTION> <OPTION value=HN>Honduras</OPTION> 
                          <OPTION value=HR>Croatia (Hrvatska)</OPTION> <OPTION 
                          value=HT>Haiti</OPTION> <OPTION 
                          value=HU>Hungary</OPTION> <OPTION 
                          value=ID>Indonesia</OPTION> <OPTION 
                          value=IE>Ireland</OPTION> <OPTION 
                          value=IL>Israel</OPTION> <OPTION 
                          value=IN>India</OPTION> <OPTION value=IQ>Iraq</OPTION> 
                          <OPTION value=IR>Iran</OPTION> <OPTION 
                          value=IS>Iceland</OPTION> <OPTION 
                          value=IT>Italy</OPTION> <OPTION 
                          value=JM>Jamaica</OPTION> <OPTION 
                          value=JO>Jordan</OPTION> <OPTION 
                          value=JP>Japan</OPTION> <OPTION 
                          value=KE>Kenya</OPTION> <OPTION 
                          value=KG>Kyrgyzstan</OPTION> <OPTION 
                          value=KH>Cambodia</OPTION> <OPTION 
                          value=KI>Kiribati</OPTION> <OPTION 
                          value=KM>Comoros</OPTION> <OPTION value=KN>Saint Kitts 
                          And Nevis</OPTION> <OPTION value=KP>D.P.R. 
                          Korea</OPTION> <OPTION value=KR>Korea</OPTION> <OPTION 
                          value=KW>Kuwait</OPTION> <OPTION value=KY>Cayman 
                          Islands</OPTION> <OPTION value=KZ>Kazakhstan</OPTION> 
                          <OPTION value=LA>Lao</OPTION> <OPTION 
                          value=LB>Lebanon</OPTION> <OPTION value=LC>Saint 
                          Lucia</OPTION> <OPTION value=LI>Liechtenstein</OPTION> 
                          <OPTION value=LK>Sri Lanka</OPTION> <OPTION 
                          value=LR>Liberia</OPTION> <OPTION 
                          value=LS>Lesotho</OPTION> <OPTION 
                          value=LT>Lithuania</OPTION> <OPTION 
                          value=LU>Luxembourg</OPTION> <OPTION 
                          value=LV>Latvia</OPTION> <OPTION 
                          value=LY>Libya</OPTION> <OPTION 
                          value=MA>Morocco</OPTION> <OPTION 
                          value=MC>Monaco</OPTION> <OPTION 
                          value=MD>Moldova</OPTION> <OPTION 
                          value=MG>Madagascar</OPTION> <OPTION value=MH>Marshall 
                          Islands</OPTION> <OPTION value=MK>Macedonia</OPTION> 
                          <OPTION value=ML>Mali</OPTION> <OPTION 
                          value=MM>Myanmar</OPTION> <OPTION 
                          value=MN>Mongolia</OPTION> <OPTION 
                          value=MO>Macao</OPTION> <OPTION value=MP>Northern 
                          Mariana Islands</OPTION> <OPTION 
                          value=MQ>Martinique</OPTION> <OPTION 
                          value=MR>Mauritania</OPTION> <OPTION 
                          value=MS>Montserrat</OPTION> <OPTION 
                          value=MT>Malta</OPTION> <OPTION 
                          value=MU>Mauritius</OPTION> <OPTION 
                          value=MV>Maldives</OPTION> <OPTION 
                          value=MW>Malawi</OPTION> <OPTION 
                          value=MX>Mexico</OPTION> <OPTION 
                          value=MY>Malaysia</OPTION> <OPTION 
                          value=MZ>Mozambique</OPTION> <OPTION 
                          value=NA>Namibia</OPTION> <OPTION value=NC>New 
                          Caledonia</OPTION> <OPTION value=NE>Niger</OPTION> 
                          <OPTION value=NF>Norfolk Island</OPTION> <OPTION 
                          value=NG>Nigeria</OPTION> <OPTION 
                          value=NI>Nicaragua</OPTION> <OPTION 
                          value=NL>Netherlands</OPTION> <OPTION 
                          value=NO>Norway</OPTION> <OPTION 
                          value=NP>Nepal</OPTION> <OPTION 
                          value=NR>Nauru</OPTION> <OPTION value=NU>Niue</OPTION> 
                          <OPTION value=NZ>New Zealand</OPTION> <OPTION 
                          value=OM>Oman</OPTION> <OPTION 
                          value=PA>Panama</OPTION> <OPTION 
                          value=PE>Peru</OPTION> <OPTION value=PF>French 
                          Polynesia</OPTION> <OPTION value=PG>Papua new 
                          Guinea</OPTION> <OPTION value=PH>Philippines</OPTION> 
                          <OPTION value=PK>Pakistan</OPTION> <OPTION 
                          value=PL>Poland</OPTION> <OPTION value=PM>St Pierre 
                          and Miquelon</OPTION> <OPTION 
                          value=PN>Pitcairn</OPTION> <OPTION value=PR>Puerto 
                          Rico</OPTION> <OPTION value=PT>Portugal</OPTION> 
                          <OPTION value=PW>Palau</OPTION> <OPTION 
                          value=PY>Paraguay</OPTION> <OPTION 
                          value=QA>Qatar</OPTION> <OPTION 
                          value=RE>Reunion</OPTION> <OPTION 
                          value=RO>Romania</OPTION> <OPTION 
                          value=RU>Russia</OPTION> <OPTION 
                          value=RW>Rwanda</OPTION> <OPTION value=SA>Saudi 
                          Arabia</OPTION> <OPTION value=SB>Solomon 
                          Islands</OPTION> <OPTION value=SC>Seychelles</OPTION> 
                          <OPTION value=SD>Sudan</OPTION> <OPTION 
                          value=SE>Sweden</OPTION> <OPTION 
                          value=SG>Singapore</OPTION> <OPTION value=SH>St 
                          Helena</OPTION> <OPTION value=SI>Slovenia</OPTION> 
                          <OPTION value=SK>Slovak Republic</OPTION> <OPTION 
                          value=SL>Sierra Leone</OPTION> <OPTION value=SM>San 
                          Marino</OPTION> <OPTION value=SN>Senegal</OPTION> 
                          <OPTION value=SO>Somalia</OPTION> <OPTION 
                          value=SR>Suriname</OPTION> <OPTION value=ST>Sao Tome 
                          and Principe</OPTION> <OPTION value=SV>El 
                          Salvador</OPTION> <OPTION value=SY>Syria</OPTION> 
                          <OPTION value=SZ>Swaziland</OPTION> <OPTION 
                          value=TC>Turks And Caicos Islands</OPTION> <OPTION 
                          value=TD>Chad</OPTION> <OPTION value=TF>French 
                          Southern Territories</OPTION> <OPTION 
                          value=TG>Togo</OPTION> <OPTION 
                          value=TH>Thailand</OPTION> <OPTION 
                          value=TJ>Tajikistan</OPTION> <OPTION 
                          value=TK>Tokelau</OPTION> <OPTION 
                          value=TM>Turkmenistan</OPTION> <OPTION 
                          value=TN>Tunisia</OPTION> <OPTION 
                          value=TO>Tonga</OPTION> <OPTION value=TP>East 
                          Timor</OPTION> <OPTION value=TR>Turkey</OPTION> 
                          <OPTION value=TT>Trinidad And Tobago</OPTION> <OPTION 
                          value=TV>Tuvalu</OPTION> <OPTION value=TW>Taiwan 
                          Region</OPTION> <OPTION value=TZ>Tanzania</OPTION> 
                          <OPTION value=UA>Ukraine</OPTION> <OPTION 
                          value=UG>Uganda</OPTION> <OPTION value=AE>United Arab 
                          Emirates</OPTION> <OPTION value=UK>United 
                          Kingdom</OPTION> <OPTION value=US>United 
                          States</OPTION> <OPTION value=UY>Uruguay</OPTION> 
                          <OPTION value=UZ>Uzbekistan</OPTION> <OPTION 
                          value=VA>Vatican City State (Holy See)</OPTION> 
                          <OPTION value=VE>Venezuela</OPTION> <OPTION 
                          value=VG>Virgin Islands (British)</OPTION> <OPTION 
                          value=VI>Virgin Islands (US)</OPTION> <OPTION 
                          value=VN>Vietnam</OPTION> <OPTION 
                          value=VU>Vanuatu</OPTION> <OPTION value=WF>Wallis And 
                          Futuna Islands</OPTION> <OPTION 
                          value=WS>Samoa</OPTION> <OPTION 
                          value=YE>Yemen</OPTION> <OPTION 
                          value=YT>Mayotte</OPTION> <OPTION 
                          value=YU>Yugoslavia</OPTION> <OPTION value=ZA>South 
                          Africa</OPTION> <OPTION value=ZM>Zambia</OPTION> 
        <OPTION value=ZW>Zimbabwe</OPTION>
	</SELECT>
	</td>
</tr>
<tr>
	<td colspan=2><p>
	<input type=submit name=\"register\" value=\"Register!\">
	</td>
</tr>
</table>
</form>";

?>