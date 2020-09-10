<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <h1>登录页面</h1>
</head>
<body>
    <form action="{{url('login/loginDo')}}" method="post">
        @csrf
        <table>
            <tr>
                <td>用户名</td>
                <td><input type="text" name="u_name"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="text" name="u_pwd"></td>
            </tr>
            <tr>
                <td><input type="submit" value="登录"></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>