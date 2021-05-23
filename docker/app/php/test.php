<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>sampleapp</title>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
$.ajax({
      type: 'GET',
      url: '/?info=json',
      async: true,
      dataType: 'json',
  })
  .done((data) => {
    // console.log(data);
    $('#front_append_area').append(`<p>ユーザID(userinfo.sub): ${data.userinfo.sub}</p>`);
    $('#front_append_area').append(`<p>ユーザ名(userinfo.preferred_username): ${data.userinfo.preferred_username}</p>`);
  });
</script>
</head>
<body>
<h2>バックエンドが読み取ったユーザ情報</h2>
<?php
$userid = getenv('OIDC_CLAIM_sub');
$username = getenv('OIDC_CLAIM_preferred_username');
$email = getenv('OIDC_CLAIM_email');
echo "<p>ユーザID(OIDC_CLAIM_sub): $userid</p>";
echo "<p>ユーザ名(OIDC_CLAIM_preferred_username): $username</p>";
//phpinfo()
?>
<h2>フロントエンドが読み取ったユーザ情報</h2>
<div id='front_append_area'></div>
<a href="/?logout=http://sampleapp:8081/test.php">ログアウト</a>
</body>
</html>
