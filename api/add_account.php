<?php   // 创建 MySQL 连接
$servername = "127.0.0.1:3306";  // MySQL 服务器地址和端口号
$username = "514531";  // MySQL 用户名
$password = "x2WckpITibFxApHt";  // MySQL 密码
$dbname = "514531";  // 数据库名称
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("连接失败：" . $conn->connect_error);
}
if($_GET["p"]!=='jK4tG8sLxN7wP2yQ6cV9rT5zF1mD3hB0'){
die('???');
}
// 获取 POST 请求中的 username 和 email 参数
$email = $_GET["email"];
$id = $_GET["id"];

// 生成 6 位随机字符串
$random = substr(md5(mt_rand()), 0, 6);

// 将用户名设置为 POST 请求中的 username 加上 6 位随机字符串
$username_with_random = $random;

// 构建 SQL 插入语句
$sql = "INSERT INTO `users` (`id`, `username`, `nickname`, `email`, `is_email_confirmed`, `password`, `avatar_url`, `preferences`, `joined_at`, `last_seen_at`, `marked_all_as_read_at`, `read_notifications_at`, `discussion_count`, `comment_count`, `read_flags_at`, `suspended_until`, `suspend_reason`, `suspend_message`, `best_answer_count`, `money`, `social_buttons`, `bio`, `birthday`, `showDobDate`, `showDobYear`, `total_checkin_count`, `total_continuous_checkin_count`, `last_checkin_time`)
VALUES ('$id', '$username_with_random', NULL, '$email', '1', 'a', NULL, NULL, NOW(), NOW(), NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL, '1', '1', '0', '0', NULL)";

// 执行 SQL 插入语句
if ($conn->query($sql) === TRUE) {
  echo "插入成功";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// 关闭 MySQL 连接
$conn->close();
?>