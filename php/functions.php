<?php
require_once("php/mysql.php");

function get_user($pdo, $userid) {
	$stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = ?");
	$stmt->bindValue(1, $userid, PDO::PARAM_INT);
	$result = $stmt->execute();
	if (!$result) {
		error_log("Error while pulling user with id: " + $userid + " from Database");
	}
	$user = $stmt->fetch();
	if ($user['teacher']) {
		$stmt = $pdo->prepare("SELECT * FROM teachers WHERE user_id = ?");
		$stmt->bindValue(1, $userid, PDO::PARAM_INT);
		$result1 = $stmt->execute();
		if (!$result1) {
			error_log("Error while pulling teacher with user_id: " + $userid + " from Database");
		}
		$teacher = $stmt->fetch();

		$user['tel'] = $teacher['tel'];
		$user['birthday'] = $teacher['birthday'];
		$user['pronouns'] = $teacher['pronouns'];
		$user['path_to_pic'] = $teacher['path_to_pic'];
		$user['notes'] = $teacher['notes'];
	} elseif ($user['students']) {
		$stmt = $pdo->prepare("SELECT * FROM students WHERE user_id = ?");
		$stmt->bindValue(1, $userid, PDO::PARAM_INT);
		$result2 = $stmt->execute();
		if (!$result2) {
			error_log("Error while pulling student with user_id: " + $userid + " from Database");
		}
		$student = $stmt->fetch();

		$user['company_id'] = $student['company_id'];
		$user['instructor_id'] = $student['instructor_id'];
		$user['job_id'] = $student['job_id'];
		$user['tel'] = $student['tel'];
		$user['birthday'] = $student['birthday'];
		$user['pronouns'] = $student['pronouns'];
		$user['path_to_pic'] = $student['path_to_pic'];
		$user['notes'] = $student['notes'];
	}





	return $user;
}

function check_user() {
	global $pdo;
	if (isset($_SESSION['userid']) && isset($_COOKIE['identifier']) && isset($_COOKIE['securitytoken'])) {
		$identifier = $_COOKIE['identifier'];
		$securitytoken = $_COOKIE['securitytoken'];
		$stmt = $pdo->prepare("SELECT * FROM securitytokens WHERE identifier = ?");
		$stmt->bindValue(1, $identifier);
		$result = $stmt->execute();
		if (!$result) {
			exit;
		}
		$securitytoken_row = $stmt->fetch();
		if(sha1($securitytoken) !== $securitytoken_row['securitytoken']) {
			setcookie("identifier","del",time()-(3600*12),'/'); // valid for -12 hours
			setcookie("securitytoken","del",time()-(3600*12),'/'); // valid for -12 hours
			error_log("forced logout from check_user #1");
			print("<script>location.href='/logout.php'</script>");
			exit;
		} if(!isset($_SESSION['userid'])) {
			return FALSE;
		} else {
			return(get_user($pdo, $_SESSION['userid']));
		}
	} elseif(!isset($_SESSION['userid']) && isset($_COOKIE['identifier']) && isset($_COOKIE['securitytoken'])) {
		$identifier = $_COOKIE['identifier'];
		$securitytoken = $_COOKIE['securitytoken'];
		$stmt = $pdo->prepare("SELECT * FROM securitytokens WHERE identifier = ?");
		$stmt->bindValue(1, $identifier);
		$result = $stmt->execute();
		if (!$result) {
			exit;
		}
		$securitytoken_row = $stmt->fetch();
		if(sha1($securitytoken) !== $securitytoken_row['securitytoken']) {
			setcookie("identifier","del",time()-(3600*12),'/'); // valid for -12 hours
			setcookie("securitytoken","del",time()-(3600*12),'/'); // valid for -12 hours
			error_log("forced logout from check_user #2");
			print("<script>location.href='/logout.php'</script>");
			exit;
		} else { //Token war korrekt
			//Setze neuen Token
			$neuer_securitytoken = md5(uniqid());
			$stmt = $pdo->prepare("UPDATE securitytokens SET securitytoken = ? WHERE identifier = ?");
			$stmt->bindValue(1, sha1($neuer_securitytoken));
			$stmt->bindValue(2, $identifier);
			$result = $stmt->execute();
			if (!$result) {
				exit;
			}
			setcookie("identifier",$identifier,time()+(3600*24*90),'/'); //90 Tage Gültigkeit
			setcookie("securitytoken",$neuer_securitytoken,time()+(3600*24*90),'/'); //90 Tage Gültigkeit
			//Logge den Benutzer ein
			$_SESSION['userid'] = $securitytoken_row['user_id'];
		}
		if(!isset($_SESSION['userid'])) {
			return FALSE;
		} else {
			return(get_user($pdo, $_SESSION['userid']));
		}
	} else {
		return FALSE;
	}
}


function sqlError($error_msg) {
	global $pdo;
	$backtrace = debug_backtrace();
	if (!empty($error_log)) {
		error_log($backtrace[count($backtrace)-1]['file'] . ':' . $backtrace[count($backtrace)-1]['line'] . ': ' . $error_msg . ': ' . $error_log);
	} else {
		error_log($backtrace[count($backtrace)-1]['file'] . ':' . $backtrace[count($backtrace)-1]['line'] . ':' . $error_msg);
	}
	include_once("templates/error.php");
	exit;
}

function errorPage($error_msg) {
	require_once("php/functions.php");
	require_once("templates/imports.php");
	include_once("templates/error.php");
	exit();
}

function error($error_msg) {
	global $pdo;
	$backtrace = debug_backtrace();
	if (!empty($error_log)) {
		error_log($backtrace[count($backtrace)-1]['file'] . ':' . $backtrace[count($backtrace)-1]['line'] . ': ' . $error_msg . ': ' . $error_log);
	} else {
		error_log($backtrace[count($backtrace)-1]['file'] . ':' . $backtrace[count($backtrace)-1]['line'] . ':' . $error_msg);
	}
	errorPage($error_msg);
}

function pdo_debugStrParams($stmt) {
	ob_start();
	$stmt->debugDumpParams();
	$r = ob_get_contents();
	ob_end_clean();
	return $r;
}

function isMobile () {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function check_style() {
	if(isset($_COOKIE['style'])) {
		if ($_COOKIE['style'] == 'dark') {
			return 'dark';
		} else if ($_COOKIE['style'] == 'light') {
			return 'light';
		}
	} else {
		return 'light';
	}
}

function check_cookie() {
	// return true; // Remove this line to get the cookie modal back
	if(isset($_COOKIE['acceptCookies'])) {
		return true;
	} else {
		return false;
	}
}


function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function convertToWEBP($file, $compression_quality = 40)
{
    // check if file exists
    if (!file_exists($file)) {
        return false;
    }
    $file_type = exif_imagetype($file);
    //https://www.php.net/manual/en/function.exif-imagetype.php
    //exif_imagetype($file);
    // 1    IMAGETYPE_GIF
    // 2    IMAGETYPE_JPEG
    // 3    IMAGETYPE_PNG
    // 6    IMAGETYPE_BMP
    // 15   IMAGETYPE_WBMP
    // 16   IMAGETYPE_XBM
    $output_file =  $file . '.webp';
    if (file_exists($output_file)) {
        return $output_file;
    }
    if (function_exists('imagewebp')) {
        switch ($file_type) {
            case '1': //IMAGETYPE_GIF
                $image = imagecreatefromgif($file);
                break;
            case '2': //IMAGETYPE_JPEG
                $image = imagecreatefromjpeg($file);
                break;
            case '3': //IMAGETYPE_PNG
                    $image = imagecreatefrompng($file);
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                    break;
            case '6': // IMAGETYPE_BMP
                $image = imagecreatefrombmp($file);
                break;
            case '15': //IMAGETYPE_Webp
               return false;
                break;
            case '16': //IMAGETYPE_XBM
                $image = imagecreatefromxbm($file);
                break;
            default:
                return false;
        }
        // Save the image
        $result = imagewebp($image, $output_file, $compression_quality);
        if (false === $result) {
            return false;
        }
        // Free up memory
        imagedestroy($image);
        return $output_file;
    }
    return false;
}
?>