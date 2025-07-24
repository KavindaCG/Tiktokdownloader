<?php
$download_url = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['url'])) {
    $url = $_POST['url'];

    // Use SnapTik (Tikwm) API
    $api_url = "https://www.tikwm.com/api/?url=" . urlencode($url) . "&hd=1";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "User-Agent: Mozilla/5.0",
        "Referer: https://www.tikwm.com"
    ]);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code == 200) {
        $data = json_decode($response, true);
        if (isset($data['data']['play'])) {
            $download_url = $data['data']['play']; // Get the video URL
        } else {
            $error = "Invalid TikTok URL or API error.";
        }
    } else {
        $error = "API request failed. Status code: " . $http_code;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TikTok Video Downloader</title>
    
    <style>
        body {
            background-image: url('tikimg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed; 
            background-size: 100% 100%;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
            height: 200px;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .first-downbtn{
            padding: 10px 15px;
            background-color: green;
            color:white;
            border-radius: 5px;
            font-size: 18px;
        }
        button {
            padding: 10px 15px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            font-size: 18px;
        }
        .download-btn {
            padding: 10px 15px;
            background: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
        }
        .download-btn:hover {
            background-color: darkgreen;
        }
        .refresh-btn {
            background-color: #ff0050;
            color: white;
            margin-top: 15px;
        }
        .refresh-btn:hover {
            background-color: #d40042;
        }
        .error {
            color: red;
            margin-top: 10px;
        }

        .input-container {
            position: relative;
        }

        .clear-btn {
            position: absolute;
            top: 12px;
            right: 16px;
            background-color: #ccc;
            border: none;
            padding: 6px;
            cursor: pointer;
            font-size: 18px;
        }

        .clear-btn:hover {
            background-color: #aaa;
        }

        .containerone{ 
            padding: 10px;
            background-color: white;
            width: 650px;
            margin: auto;
            text-align:left;
        }

        .process{
            padding:20px;
            
        }
    </style>
  
</head>
<body>
    <div id="main-container">
        <div class="container">
            <h2>🔥 TikTok Video Downloader 🔥</h2>
            <form method="POST">
                <div class="input-container">
                    <input type="text" id="url-input" name="url" placeholder="Enter TikTok Video URL" required>
                    <button class="clear-btn" type="button" onclick="clearInput()">×</button>
                </div>
            <button class="first-downbtn" type="submit">Download</button>
            </form>

            <script>
        function showDownloadScreen(downloadUrl) {
            document.getElementById("main-container").innerHTML = `
                <div class="container">
                    <h3>✅ Video Ready to Download</h3>
                    <br><br>
                    <a href="${downloadUrl}" target="_blank" class="download-btn">Download Now</a>
                    <br><br>
                    <button onclick="showInputScreen()" class="refresh-btn">Download Another Video</button>
                </div>
            `;
        }

        function showInputScreen() {
            document.getElementById("main-container").innerHTML = `
            
                <div class="container">
                    <h2>🔥 TikTok Video Downloader 🔥</h2>
                    <form method="POST">
                        <div class="input-container">
                            <input type="text" id="url-input" name="url" placeholder="Enter TikTok Video URL" required>
                            <button class="clear-btn" type="button" onclick="clearInput()">×</button>
                        </div>
                        <button class="first-downbtn" type="submit">Download</button>
                    </form>
                </div>
            `;
        }
        function clearInput() {
    document.getElementById("url-input").value = "";
}
    </script>
        </div>
        
    </div>

    <?php if (!empty($download_url)): ?>
        <script>
            showDownloadScreen('<?php echo $download_url; ?>');
        </script>
    <?php elseif (!empty($error)): ?>
        <p class="error">⚠️ <?php echo $error; ?></p>
    <?php endif; ?>

    <br><br><br>

    <div class= "containerone"> 
        <h3 style= "text-align:center;"> how to download the tiktok video</h3>
        
        
        <p class = "process"> 
        <b>1 step :-  </b> Copy the you wanted TikTok video link <br><br>
        <b>2 step :-  </b> Past the link on upper text box <br><br>
        <b>3 step :-  </b> Click Download button and after click it you went to Video Ready to &nbsp;&nbsp;&nbsp; Download place <br><br>
        <b>4 step :-  </b> Now you can click Download Now button<br><br>
        <b>5 step :-  </b> Now you went to new tab with video<br><br>
        <b>6 step :-  </b> Now you can download the video click bottom conner 3dot and click download <br><br>
    </p>
</body>
</html>
