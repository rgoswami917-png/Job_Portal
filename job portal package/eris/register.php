<section id="content">
    <div class="container content">

        <p><?php check_message(); ?></p>

        <form id="regForm" class="row form-horizontal span6 wow fadeInDown"
              action="process.php?action=register"
              method="POST">

            <h2>Personal Info</h2>

            <!-- Hidden Job ID -->
            <input name="JOBID" type="hidden"
                   value="<?php echo isset($_GET['job']) ? $_GET['job'] : ''; ?>">

            <!-- FIRST NAME -->
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="FNAME">Firstname:</label>
                    <div class="col-md-8">
                        <input class="form-control input-sm" id="FNAME" name="FNAME"
                               placeholder="Firstname" type="text"
                               onkeyup="capitalize(this.id, this.value);" autocomplete="off">
                    </div>
                </div>
            </div>

            <!-- LAST NAME -->
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="LNAME">Lastname:</label>
                    <div class="col-md-8">
                        <input class="form-control input-sm" id="LNAME" name="LNAME"
                               placeholder="Lastname"
                               onkeyup="capitalize(this.id, this.value);" autocomplete="off">
                    </div>
                </div>
            </div>

            <!-- MIDDLE NAME -->
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="MNAME">Middle Name:</label>
                    <div class="col-md-8">
                        <input class="form-control input-sm" id="MNAME" name="MNAME"
                               placeholder="Middle Name"
                               onkeyup="capitalize(this.id, this.value);" autocomplete="off">
                    </div>
                </div>
            </div>

            <!-- ADDRESS -->
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="ADDRESS">Address:</label>
                    <div class="col-md-8">
                        <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS"
                                  placeholder="Address" required
                                  onkeyup="capitalize(this.id, this.value);" autocomplete="off"></textarea>
                    </div>
                </div>
            </div>

            <!-- GENDER -->
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label">Sex:</label>
                    <div class="col-md-8">
                        <label><input id="optionsRadios1" name="optionsRadios"
                                      type="radio" value="Female"> Female</label>
                        <label><input id="optionsRadios2" name="optionsRadios"
                                      type="radio" value="Male"> Male</label>
                    </div>
                </div>
            </div>

            <!-- DOB -->
            <div class="form-group">
                <div class="rows">
                    <div class="col-md-8">
                        <div class="col-md-4">
                            <label class="col-lg-12 control-label">Date of Birth:</label>
                        </div>

                        <!-- Month -->
                        <div class="col-lg-3">
                            <select class="form-control input-sm" name="month">
                                <option>Month</option>
                                <?php
                                $mon = array(
                                    'Jan' => 1, 'Feb' => 2, 'Mar' => 3,
                                    'Apr' => 4, 'May' => 5, 'Jun' => 6,
                                    'Jul' => 7, 'Aug' => 8, 'Sep' => 9,
                                    'Oct' => 10, 'Nov' => 11, 'Dec' => 12
                                );
                                foreach ($mon as $month => $value) {
                                    echo "<option value='$value'>$month</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Day -->
                        <div class="col-lg-2">
                            <select class="form-control input-sm" name="day">
                                <option>Day</option>
                                <?php for ($d = 1; $d <= 31; $d++) { echo "<option value='$d'>$d</option>"; } ?>
                            </select>
                        </div>

                        <!-- Year -->
                        <div class="col-lg-3">
                            <select class="form-control input-sm" name="year">
                                <option>Year</option>
                                <?php foreach (range(date("Y"), 1900, -1) as $yr) { echo "<option value='$yr'>$yr</option>"; } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BIRTHPLACE -->
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="BIRTHPLACE">Place of Birth:</label>
                    <div class="col-md-8">
                        <textarea class="form-control input-sm" id="BIRTHPLACE" name="BIRTHPLACE"
                                  placeholder="Place of Birth"
                                  onkeyup="capitalize(this.id, this.value);" autocomplete="off"></textarea>
                    </div>
                </div>
            </div>

            <!-- CONTACT NUMBER -->
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="TELNO">Contact No.:</label>
                    <div class="col-md-8">
                        <input class="form-control input-sm" id="TELNO" name="TELNO"
                               placeholder="Contact No." type="text">
                    </div>
                </div>
            </div>

            <!-- CIVIL STATUS -->
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="CIVILSTATUS">Civil Status:</label>
                    <div class="col-md-8">
                        <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                            <option value="none">Select</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widow">Widow</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- EMAIL -->
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="EMAILADDRESS">Email Address:</label>
                    <div class="col-md-8">
                        <input type="email" class="form-control input-sm" id="EMAILADDRESS"
                               name="EMAILADDRESS" placeholder="Email Address" autocomplete="off">
                    </div>
                </div>
            </div>

            <!-- USERNAME -->
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="USERNAME">Username:</label>
                    <div class="col-md-8">
                        <input class="form-control input-sm" id="USERNAME" name="USERNAME"
                               placeholder="Username" autocomplete="off">
                    </div>
                </div>
            </div>

            <!-- PASSWORD -->
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="PASS">Password:</label>
                    <div class="col-md-8">
                        <input class="form-control input-sm" id="PASS" name="PASS"
                               placeholder="Password" type="password" autocomplete="off">
                    </div>
                </div>
            </div>

            <!-- EDUCATION -->
            <div class="form-group">
                <div class="col-md-8">
                    <label class="col-md-4 control-label" for="DEGREE">Educational Attainment:</label>
                    <div class="col-md-8">
                        <input class="form-control input-sm" id="DEGREE" name="DEGREE"
                               placeholder="Educational Attainment" autocomplete="off">
                    </div>
                </div>
            </div>

            <!-- TERMS -->
            <div class="form-group">
                <div class="col-md-8">
                    <div class="col-md-8 col-md-offset-4">
                        <label><input type="checkbox" id="terms"> I agree to the terms & conditions.</label>
                    </div>
                </div>
            </div>

            <!-- SUBMIT BUTTON -->
            <div class="form-group">
                <div class="col-md-8">
                    <div class="col-md-8 col-md-offset-4">
                        <button class="btn btn-primary btn-sm" name="btnRegister" type="submit">
                            <span class="fa fa-save fw-fa"></span> Save
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>

<!-- ⭐ JAVASCRIPT VALIDATION ⭐ -->
<script>
document.getElementById("regForm").addEventListener("submit", function(e) {

    let errors = [];

    function get(id) { return document.getElementById(id).value.trim(); }

    // Required fields
    if(get("FNAME") === "") errors.push("First name is required");
    if(get("LNAME") === "") errors.push("Last name is required");
    if(get("MNAME") === "") errors.push("Middle name is required");
    if(get("ADDRESS") === "") errors.push("Address is required");
    if(get("BIRTHPLACE") === "") errors.push("Birthplace is required");
    if(get("USERNAME") === "") errors.push("Username is required");
    if(get("DEGREE") === "") errors.push("Educational attainment is required");

    // Gender
    if(!document.querySelector("input[name='optionsRadios']:checked"))
        errors.push("Gender is required");

    // DOB
    let month = document.querySelector("select[name='month']").value;
    let day = document.querySelector("select[name='day']").value;
    let year = document.querySelector("select[name='year']").value;

    if(month === "Month" || day === "Day" || year === "Year")
        errors.push("Complete Date of Birth");

    // Phone number validation (exactly 10 digits)
    let phone = get("TELNO");
    if(!/^[0-9]{10}$/.test(phone))
        errors.push("Contact number must be 10 digits");

    // Civil Status
    if(document.getElementById("CIVILSTATUS").value === "none")
        errors.push("Select civil status");

    // Email
    let email = get("EMAILADDRESS");
    if(email !== "" && !/^\S+@\S+\.\S+$/.test(email))
        errors.push("Enter valid email");

    // Password
    if(get("PASS").length < 6)
        errors.push("Password must be at least 6 characters");

    // Terms
    if(!document.getElementById("terms").checked)
        errors.push("You must accept Terms & Conditions");

    if(errors.length > 0) {
        e.preventDefault();
        alert("Please correct the following:\n\n" + errors.join("\n"));
    }

});
</script>
