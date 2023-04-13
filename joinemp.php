<!DOCTYPE html>
<html>
<head>
  <title>Employee Joining Application Form</title>
  <link href="img/favicon.png" rel="icon">
</head>
<style>
  body {
    background-color: linear-gradient(#54b4fa, #76c2c8, #6dbed5);
    color: #090d4d;
  }

  fieldset {
    border: 2px solid #5cbefb;
    border-radius: 10px;
    padding: 10px;
    margin-bottom: 20px;
  }

  legend {
    color: #5cbefb;
    font-weight: bold;
  }

  input[type="submit"],
  input[type="reset"] {
    background-color: #5cbefb;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
  }

  input[type="submit"]:hover,
  input[type="reset"]:hover {
    background-color: #fff;
    color: #5cbefb;
    border: 1px solid #5cbefb;
  }

</style>
<body>
  <h1>Employee Joining Application Form</h1>

  <form>
    <fieldset>
      <legend>Personal Information:</legend>
      <label for="fullname">Full Name:</label>
      <input type="text" id="fullname" name="fullname" required><br>

      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="dob" required><br>

      <label for="address">Address:</label>
      <input type="text" id="address" name="address" required><br>

      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" required><br>

      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" required><br>

      <label for="emergencyname">Emergency Contact Name:</label>
      <input type="text" id="emergencyname" name="emergencyname" required><br>

      <label for="emergencyphone">Emergency Contact Phone Number:</label>
      <input type="tel" id="emergencyphone" name="emergencyphone" required><br>
    </fieldset>

    <fieldset>
      <legend>Employment Information:</legend>
      <label for="position">Position Applied for:</label>
      <input type="text" id="position" name="position" required><br>

      <label for="joiningdate">Date of Joining:</label>
      <input type="date" id="joiningdate" name="joiningdate" required><br>

      <label for="salary">Salary:</label>
      <input type="number" id="salary" name="salary" required><br>

      <label for="department">Department:</label>
      <input type="text" id="department" name="department" required><br>

      <label for="manager">Manager's Name:</label>
      <input type="text" id="manager" name="manager" required><br>

      <label for="employeeid">Employee ID Number:</label>
      <input type="text" id="employeeid" name="employeeid" required><br>
    </fieldset>

    <fieldset>
      <legend>Education and Qualifications:</legend>
      <label for="degree">Degree/Qualification:</label>
      <input type="text" id="degree" name="degree" required><br>

      <label for="institution">Institution:</label>
      <input type="text" id="institution" name="institution" required><br>

      <label for="yearcompleted">Year Completed:</label>
      <input type="number" id="yearcompleted" name="yearcompleted" required><br>
    </fieldset>

    <fieldset>
      <legend>Previous Employment:</legend>
      <label for="prevcompany">Name of Company:</label>
      <input type="text" id="prevcompany" name="prevcompany" required><br>

      <label for="prevjobtitle">Job Title:</label>
      <input type="text" id="prevjobtitle" name="prevjobtitle" required><br>

      <label for="employmentdates">Employment Dates:</label>
      <input type="text" id="employmentdates" name="employmentdates" required><br>

      <label for="reasonforleaving">Reason for Leaving:</label>
      <input type="text" id="reasonforleaving" name="reasonforleaving" required><br>

  </fieldset>

  <fieldset>
    <legend>References:</legend>
    <label for="ref1name">Reference 1 Name:</label>
    <input type="text" id="ref1name" name="ref1name" required><br>

    <label for="ref1phone">Reference 1 Phone Number:</label>
    <input type="tel" id="ref1phone" name="ref1phone" required><br>

    <label for="ref1relationship">Reference 1 Relationship:</label>
    <input type="text" id="ref1relationship" name="ref1relationship" required><br>

    <label for="ref2name">Reference 2 Name:</label>
    <input type="text" id="ref2name" name="ref2name" required><br>

    <label for="ref2phone">Reference 2 Phone Number:</label>
    <input type="tel" id="ref2phone" name="ref2phone" required><br>

    <label for="ref2relationship">Reference 2 Relationship:</label>
    <input type="text" id="ref2relationship" name="ref2relationship" required><br>
  </fieldset>

  <fieldset>
    <legend>Declaration:</legend>
    <p>
      I hereby certify that the above information provided by me is true and correct to the best of my knowledge. I understand that any misrepresentation or omission of any facts in my application may result in refusal of employment or termination of employment.
    </p>

    <label for="signature">Signature:</label>
    <input type="text" id="signature" name="signature" required><br>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br>
  </fieldset>

  <input type="submit" value="Submit">
  <input type="reset" value="Reset">
</form>


</body>
</html>>