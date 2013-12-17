<?php
header("Content-Type: text/html;charset=utf-8");

$targetFolder ='/uploads'; //定义上传的文件夹
$tempFolder = '/uploads/temp'; //定义临时文件夹
$verifyToken = md5('unique_salt'.$_POST['timestamp']); //验证信息，验证文件传输是否正确
if (!empty($_FILES) && $_POST['token'] == $verifyToken) {	//如果验证信息正确
	try{
		$tempFile = $_FILES['Filedata']['tmp_name'];  //获取临时文件
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . $tempFolder;//自建临时文件夹
		if (!file_exists($targetPath)) { //如果这个临时文件夹不存在，就先创建
			mkdir($targetPath);
		}
		$targetFile=rtrim($targetPath,'/'). '/' .uniqid("jwc_");//生成唯一文件名
		if (!empty($tempFile) && $tempFile!=null) {	//过滤掉上传失败的文件
			move_uploaded_file($tempFile, iconv('utf-8', 'gb2312', $targetFile));
			echo $targetFile."|".$_FILES['Filedata']['name'];
		}
		else{
			//echo 
		}
	}
	catch(Exception $e){
		echo "上传失败，未知错误。";
		exit();
	}
}
?>