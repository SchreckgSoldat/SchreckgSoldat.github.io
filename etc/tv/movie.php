<?php
// 设置字符编码
header('Content-Type: text/html; charset=utf-8');

// 目标URL
$target_url = "http://www.饭太硬.com/tv";

// 初始化cURL
$ch = curl_init();

// 设置cURL选项
curl_setopt_array($ch, [
    CURLOPT_URL => $target_url,
    CURLOPT_RETURNTRANSFER => true,      // 返回内容而不直接输出
    CURLOPT_FOLLOWLOCATION => true,      // 跟随重定向
    CURLOPT_MAXREDIRS => 10,             // 最大重定向次数
    CURLOPT_TIMEOUT => 30,               // 超时时间（秒）
    CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', // 模拟浏览器
    CURLOPT_SSL_VERIFYPEER => false,     // 不验证SSL证书（仅用于测试）
    CURLOPT_SSL_VERIFYHOST => false      // 不验证主机名（仅用于测试）
]);

// 执行cURL请求
$content = curl_exec($ch);

// 检查是否出错
if (curl_errno($ch)) {
    echo "cURL错误: " . curl_error($ch);
} else {
    // 获取HTTP状态码
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    if ($http_code == 200) {
        echo $content;
    } else {
        echo "HTTP错误: " . $http_code;
    }
}

// 关闭cURL资源
curl_close($ch);
?>
