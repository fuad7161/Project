<!DOCTYPE html>
<html>
<head>
<title>{{$data['title']}}</title>
</head>
<body>

    <table>
        <tr>
            <th>Name</th>
            <th>{{ $data['name'] }}</th>
        </tr>
        <tr>
            <th>Email</th>
            <th>{{$data['email']}}</th>
        </tr>
    </table>
    <p><b>Note:-</b> You can use your old Password.</p>
     <a href = "{{$data['url']}}">Click here to login your account</a>
     <p>Thank you.</p>

</body>
</html>