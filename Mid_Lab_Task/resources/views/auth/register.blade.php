<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('bootstrap-3.1.1\css\bootstrap.min.css')}}">
<body>
</head>
<body>
    
<div class="container">
   <div class="row" style="margin-top:45px">
      <div class="col-md-4 col-md-offset-4">
           <h4>| Register |</h4><hr>
           <form action="{{route('auth.save')}}" method="post">
           @if(Session::get('success'))
             <div class="alert alert-success">
                {{ Session::get('success') }}
             </div>
           @endif

           @if(Session::get('fail'))
             <div class="alert alert-danger">
                {{ Session::get('fail') }}
             </div>
           @endif
           @csrf
           <div class="form-group">
                 <label>Full Name</label>
                 <input type="text" class="form-control" name="fullname" placeholder="Enter full name" value="{{ old('fullname') }}">
                 <span class="text-danger">@error('fullname'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>User Name</label>
                 <input type="text" class="form-control" name="username" placeholder="Enter User name" value="{{ old('username') }}">
                 <span class="text-danger">@error('username'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Email</label>
                 <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                 <span class="text-danger">@error('email'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Password</label>
                 <input type="password" class="form-control" name="password" placeholder="Enter password">
                 <span class="text-danger">@error('password'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Confirm Password</label>
                 <input type="password" class="form-control" name="cpassword" placeholder="Re-Enter password">
                 <span class="text-danger">@error('password'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Address</label>
                 <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{ old('address') }}">
                 <span class="text-danger">@error('address'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Company Name</label>
                 <input type="text" class="form-control" name="company" placeholder="Enter User name" value="{{ old('company') }}">
                 <span class="text-danger">@error('company'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Phone Number</label>
                 <input type="text" class="form-control" name="number" placeholder="Enter Phone Number" value="{{ old('number') }}">
                 <span class="text-danger">@error('number'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>City</label>
                 <input type="text" class="form-control" name="city" placeholder="Enter City name" value="{{ old('city') }}">
                 <span class="text-danger">@error('city'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Country</label>
                 <input type="text" class="form-control" name="country" placeholder="Enter Country name" value="{{ old('country') }}">
                 <span class="text-danger">@error('country'){{ $message }} @enderror</span>
              </div>
              <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
              <br>
              <a href="{{ route('auth.login') }}">I already have an account, sign in</a>
           </form>
      </div>
   </div>
</div>
</body>
</html>