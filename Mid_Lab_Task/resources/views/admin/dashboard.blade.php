<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css') }}">
</head>
<body>
    
    <div class="container">
         <div class="row">
            <div class="col-md-6 col-md-offset-3">
                   <h4>Admin Info</h4><hr>
                   <table class="table table-hover">
                      <thead>
                        <th>User Name</th>
                        <th>Email</th>
                        <th></th>
                      </thead>
                      <tbody>
                         <tr>
                            <td>{{ $LoggedUserInfo['username'] }}</td>
                            <td>{{ $LoggedUserInfo['email'] }}</td>
                            <td><a href="{{ route('auth.logout') }}">Logout</a></td>
                         </tr>
                      </tbody>
                   </table>

                   <ul>
                      
                       <li><a href="/admin/profile">Profile</a></li>
                       <li><a href="/admin/settings">Settings</a></li>
                       <li><a href="{{route('home.Clist')}}">Customer List</a></li>
                       <li><a href="{{route('system.salesLog')}}">View Sales Log</a></li>
                       <li><a href="{{route('system.socialMedia')}}">Social Media</a></li>
                       <li><a href="{{route('system.ecommerce')}}">E-Commerce Web App</a></li>
                       <li><a href="{{route('product.Elist')}}">Existing Product List</a></li>
                       <li><a href="{{route('product.Ulist')}}">Upcoming Product List</a></li>
                   </ul>
            </div>
         </div>
    </div>
</body>
</html>