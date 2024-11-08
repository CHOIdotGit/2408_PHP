<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- 이것은 보입니다. -->
    <h1>이거는 보입니다.</h1>
    {{-- <h1>이거는 안보입니다.</h1> --}}
    <p> {{ $data['name'] }}</p>
    <p><?php echo htmlspecialchars($data['content']); ?></p>
    {{-- 위 두개는 동일하게 JS로 공격하는 것을 어느정도 막아준다. --}}
</body>
</html>