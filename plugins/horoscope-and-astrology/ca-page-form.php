<div class="cawp-form-container" style="width:100%;max-width:<?php echo $cahorowidth.'px';?>">
<div class="horo-widget-error" id="horo-widget-error"></div>
<form method="post" action="https://api.clickastro.com/wp-widget/freehoro/freehoro-composexml.php" target="_tab" name="frmplaceorderwidget" id="frmplaceorder">
<div class="caouter">
    <div class="astrowidget-wrapper">
    <div class="ca_clear"></div>
            <div class="ca_clear">
                <div class="heading dsk" <?php echo $inline_style;?>
                    <h2>Get FREE HOROSCOPE in 30 seconds</h2>
                </div>
                <div class="dataentry tabcontent" id="fade">
                    <div class="astrowidget-col" id="first-part">
                        <div class="fleft"><input type="text" name="name" id="name" placeholder="Your name here"></div><span class="cag">Date of birth</span>
                        <div class="w21"><select id="dobyear" onChange="validateDate()" name="dobyear"><?php for($i=2025;$i>=1901;$i--) { echo '<option value='.$i.'>'.$i.'</option>'; } ?> </select></div>
                        <div class="w35"><select name="dobmonth" id="dobmonth" onChange="validateDate()">
                                <option value=1>Jan</option>
                                <option value=2>Feb</option>
                                <option value=3>Mar</option>
                                <option value=4>Apr</option>
                                <option value=5>May</option>
                                <option value=6>Jun</option>
                                <option value=7>Jul</option>
                                <option value=8>Aug</option>
                                <option value=9>Sep</option>
                                <option value=10>Oct</option>
                                <option value=11>Nov</option>
                                <option value=12>Dec</option>
                            </select></div>
                        <div class="w18"><select name="dobday" id="dobday" onChange="validateDate()">
                            <?php for($i=1;$i<=31;$i++) { echo '<option value='.$i.'>'.$i.'</option>'; } ?> 
                            </select>
                        </div> 
                        <span class="cag">Time of Birth</span>
                        <div class="w18">
                            <select name="tobhour" id="tobhour" onchange="validateDate()">
                              <?php for($i=1;$i<=12;$i++) { echo '<option value='.$i.'>'.$i.'</option>'; } ?>     
                            </select>
                        </div>
                     <div class="w18 pl">
                        <select name="tobmin" onchange="validateDate()">
                        <?php for($i=0;$i<=59;$i++) { $min = ($i < 10) ? 0 . $i : $i; echo '<option value='.$min.'>'.$i.'</option>'; } ?> 
                        </select>
                     </div>
                        <div class="rh"><input name="ampm" type="radio" id="radio3" value="AM" checked="checked" onclick="validateDate()" class="ampmtab" /><label for="radio3" class="ca-ampm">AM</label><input name="ampm" type="radio" id="radio4" value="PM" onclick="validateDate()" class="ampmtab" /><label for="radio4" class="ca-ampm">PM</label>
                        </div>
                        <div class="fleft">
                            <input type="text" name="ca_city" id="ca_city" autocomplete="off" oninput="validatealpha();" onkeydown="bst(event)" class="txtbox" placeholder="Place of birth"   /><div id="errorcity" class="error_cacity" style="color:red;"></div>
                        </div>
                        <div class="ca_clear"></div>
                    </div>
                    <div class="astrowidget-col" id="second-part">
                        <div class="fleft"  style="margin-bottom:13px;"><span class="cag">Gender</span><input name="gender" id="radio1" type="radio" value="Male" checked="checked" class="gendertab" /><label for="radio1">Male</label><input name="gender" type="radio" id="radio2" value="Female" class="gendertab" /><label for="radio2">Female</label></div>
                        <div class="fleft"><select name="language">
                                <option value="0">Select Language</option>
                                <option value="Eng">English</option>
                                <option value="Mal">Malayalam</option>
                                <option value="Tam">Tamil</option>
                                <option value="Tel">Telugu</option>
                                <option value="Hin">Hindi</option>
                                <option value="Kan">Kannada</option>
                                <option value="Mar">Marathi</option>
                                <option value="Ben">Bengali</option>
                                <option value="Ori">Oriya</option>
								<option value="Guj">Gujarati</option>
                            </select></div>
                        <div class="fleft"><select name="chart_style" id="chart_style">
                                <option value="" selected>Chart Style</option>
                                <option value="1">South Indian</option>
                                <option value="2">North Indian</option>
                                <option value="3">East Indian</option>
                                <option value="0">Kerala</option>
                            </select></div>
                        <div class="fleft"><input type="text" name="email" class="txtbox" placeholder="E-mail" /></div>
                    </div>
                    <div class="horo-footer">
                        <div class="txtleft"><b>Available Languages:</b> <br>
                            <div style="margin-top:5px"> English, Hindi, Malayalam, Tamil, Telugu, Marathi, Kannada, Bengali, Oriya.</div>
                        </div>

                        <div class="ca_backbutton horobutton" id="back" onclick="backFirstPart();" style="display: none;"><a href="javascript:;">&larr;&nbsp;Back</a></div>
                        <div class="horobutton" id="button" onclick="finalValidate();"><a href="javascript:;">Get Personal Horoscope</a></div>
                        <div class="ca_continuebutton horobutton" id="continue-button" onclick="continueSecondPart();" style="display:none"><a href="javascript:;">Continue&nbsp;&rarr;</a></div>
                        <div class="ca_clear"></div>
<?php if ($display_link == On) { ?> 
<div class="ca_copyright" style=""><?php if(empty($backlink_text)) { echo 'Free Horoscope';} else{echo '<a href="'.$backlink.'?rf='.$client_id.'">'.$backlink_text.'</a>'; } ?> powered by clickastro.com
</div>
<?php } ?>
</div><input type="hidden" name="country" id="country"> <input type="hidden" name="region_dist" id="region_dist"> <input type="hidden" name="state" id="state"> <input type="hidden" name="txt_place_search" id="txt_place_search" value=""> <input type="hidden" name="longdeg" id="longdeg" value=""> <input type="hidden" name="longmin" id="longmin" value=""> <input type="hidden" name="longdir" id="longdir" value=""> <input type="hidden" name="latdeg" id="latdeg" value=""> <input type="hidden" name="latmin" id="latmin" value=""> <input type="hidden" name="latdir" id="latdir" value=""> <input type="hidden" name="timezone" id="timezone" value=""><input type="hidden" name="latitude_google" id="latitude_google" value=""><input type="hidden" name="longitude_google" id="longitude_google" value=""> <input type="hidden" name="correction" id="correction" value="" /><input type="hidden" name="placechecked" id="placechecked"><input type="hidden" name="lsmid" id="lsmid" value=""><input type="hidden" name="reporttype" id="reporttype" value="LS-MT"> <input type="hidden" name="clientid" id="clientid" value="<?php echo $client_id;?>"><input type="hidden" name="apikey" id="apikey" value="<?php echo $apikey; ?>">
</div>
</div>
</div>
</div>
</form>
</div>
