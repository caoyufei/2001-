<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新闻添加</title>
    <h1>新闻添加</h1>
</head>
<body>
    <form action="{{url('login/add')}}" method="post" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>新闻标题</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td>新闻分类</td>
                <td>
                <select name="" id="">
                    <option value="1">娱乐新闻</option>
                    <option value="2">军事新闻</option>
                    <option value="3">国内新闻</option>
                    <option value="4">国际新闻</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>新闻图片</td>
                <td><input type="file" name="img"></td>
            </tr>
            <tr>
                <td>新闻简介</td>
                <td><input type="text" name="desc"></td>
            </tr>
            <tr>
                <td>新闻内容</td>
                <td><textarea name="content" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="添加"></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>