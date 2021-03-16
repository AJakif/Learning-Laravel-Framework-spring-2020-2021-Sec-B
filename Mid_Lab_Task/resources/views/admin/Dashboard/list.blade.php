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
                       
                   </ul>
                    <center>
                        <table border="1">
                            <tr>
                                <td>Id</td>
                                <td>Username</td>
                                <td>Password</td>
                                <td>Type</td>
                                <td>ACTION</td>
                            </tr>

                            @for($i=0; $i < count($list); $i++)
                            <tr>
                                <td>{{ $list[$i]['id'] }}</td>
                                <td>{{ $list[$i]['username'] }}</td>
                                <td>{{ $list[$i]['password'] }}</td>
                                <td>{{ $list[$i]['user_type'] }}</td>
                                <td>
                                    <a href="{{ route('home.Cedit', [$list[$i]['id']]) }}">Edit</a> |
                                    <a href="/home/delete/customer/{{ $list[$i]['id'] }}">Delete</a> |
                                    <a href="/home/details/customer/{{ $list[$i]['id'] }}">Details</a>
                                </td>
                            </tr>
                            @endfor
                        </table>
                    </center>  

                    <br>

                        {{session('msg')}}
            </div>
         </div>
    </div>
</body>
</html>