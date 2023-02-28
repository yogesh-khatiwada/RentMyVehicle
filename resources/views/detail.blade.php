<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title></title>

<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
<link href= "{{ asset('frontend/css/deatail.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ 'frontendcss/style.css' }}">
<meta name="robots" content="noindex, follow">
</head>
<body>

<div class="main">
<div class="container">
<div class="signup-content">
<div class="signup-img">
<img src="images/form-img.jpg" alt="">
<div class="signup-img-content">
<h2>please provide the following detail before booked or rent vehicle. </h2>

</div>
</div>
<div class="signup-form">
<form action="{{ route('detail.store',1) }}" method="POST" class="register-form" id="register-form ">
    @csrf
    
<div class="form-row">
<div class="form-group">
<div class="form-input">
<label for="first_name" class="required">First name</label>
<input type="text" name="first_name" id="first_name" />
</div>
<div class="form-input">
<label for="last_name" class="required">Last name</label>
<input type="text" name="last_name" id="last_name" />
</div>
<div class="form-input">
    <label for="email" class="required">Email</label>
    <input type="email" name="email" id="email" />
    </div>
    <div class="form-input">
        <label for="phone_number" class="required">Phone number</label>
        <input type="number" name="phone_number" id="phone_number" />
        </div>
<div class="form-input">
<label for="age" class="required">Age</label>
<input type="number" name="age" id="age" />
</div>
<div class="form-input">
    <label for="taddress" class="required">Temporary Address</label>
    <input type="text" name="taddress" id="taddress" />
    </div>
    <div class="form-input">
        <label for="paddress" class="required">Permanent Address</label>
        <input type="text" name="paddress" id="paddress" />
        </div>
        <form action="/action_page.php">
            <label for="" class="required">certizenship Photo Front</label>
            <input type="file" id="myFile" name="cpf">
            
          </form>
          <form action="/action_page.php">
            <label for="paddress" class="required">certizenship Photo Back</label>
            <input type="file" id="myFile" name="cpb">
            
          </form>
          <form action="/action_page.php">
            <label for="paddress" class="required">Licesence Photo</label>
            <input type="file" id="myFile" name="lp">
           
          </form>


<div class="form-submit">
<input type="submit" value="Submit" class="submit" id="submit" name="submit" />
<input type="submit" value="Reset" class="submit" id="reset" name="reset" />
</div>
</form>
</div>
</div>
</div>
</div>

</body>
</html>