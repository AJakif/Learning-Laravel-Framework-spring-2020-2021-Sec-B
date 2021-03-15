<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Edit Customer</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>

<div class="title">
 	<div class="align">
    	<div class="sign">
      		<span class="fast-flicker">Client&nbsp;&nbsp;</span>Management&nbsp;&nbsp;<span class="flicker">System</span>
    	</div>
	</div>
</div>

    <h1>Edit Customer, {{ $user['id'] }}</h1>
	<a href="{{route('logout.index')}}">Logout</a> |
	<a href="{{route('home.index')}}">Home</a> |
	<a href="{{route('home.Clist')}}">Customer List</a> |
	<br><br>

    <form method="post">
    	@csrf
		<fieldset>
			<legend>Edit</legend>
	<center>
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" value="{{$user['username']}}"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" value="{{ $user['password'] }}"></td>
				</tr>
				<tr>
					<td>Full Name</td>
					<td><input type="text" name="full_name" value="{{ $user['fullname'] }}"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" value="{{ $user['email'] }}" readonly="readonly"></td>
				</tr>
				<tr>
					<td>Country</td>
					<td><input type="text" name="country" value="{{ $user['country'] }}"></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><input type="text" name="phone" value="{{ $user['phone'] }}"></td>
				</tr>
				<tr>
					<td>City</td>
					<td><input type="text" name="city" value="{{ $user['city'] }}"></td>
				</tr>
				<tr>
					<td>Company Name</td>
					<td><input type="text" name="company_name" value="{{ $user['companyname'] }}"></td>
				</tr>
				<tr>
					<td>User Type</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;
					<select name='user_type'>
							<option value="Customer" @if($user['type'] == 'user') selected @endif > CUSTOMER </option>
							<option value="Admin"  @if($user['type'] == 'Admin') selected @endif > ADMIN </option>
							<option value="Accountant" @if($user['type'] == 'Accountant') selected @endif > ACCOUNTANT </option>
							<option value="Sales"  @if($user['type'] == 'Sales') selected @endif > SALES </option>
							<option value="Vendor" @if($user['type'] == 'Vendor') selected @endif > VENDOR </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Date Added</td>
					<td><input type="date" name="date_added" value="{{$user['date_added']}}"></td>
				</tr>
				<td><input type="submit" class="btn" name="submit" value="Update"></td>
			</table>
	</center>
		</fieldset>
	</form>

	<br>
	@foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach

	@extends('layout.footer')

</body>
</html>