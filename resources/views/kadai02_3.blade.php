<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>sample01 - サーバーサイドスクリプト演習２</title>
</head>
<body>
    @foreach ($courses as $course)
        <h3>{{ $course['name'] }}</h3>
        <p>{{ $course['note'] }}</p>
        <a href={{ $course['url'] }} target="kadai02_3">コースの紹介</a>
    @endforeach
</body>
</html>
