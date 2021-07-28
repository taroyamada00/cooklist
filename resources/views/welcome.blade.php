<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Cook list 〜 最近なに食べた？ 〜</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    </head>

    <body>
    <div class="center mt-5">
        <div class="text-center">
            <h1>Cook li</h1>
            <p>〜 最近なに食べた？ 〜</p>
        </div>
        <ul class="d-flex justify-content-center">
            <li class="btn btn-light mr-2">会員登録</li>
            <li class="btn btn-light">ログイン</li>
        </ul>
    </div>
    
    <div class="container">
        {{-- エラーメッセージ --}}
        @include('commons.error_messages')
    </div>
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>