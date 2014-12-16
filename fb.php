<?php
/**
 * 參考資料：
 * http://hybridauth.sourceforge.net/userguide/IDProvider_info_Facebook.html
 * http://hybridauth.sourceforge.net/apidoc.html
 * 
 */

require_once __DIR__ . '/vendor/autoload.php';

try {

	/**
	 * 設定以下四項：
	 * 	 $app_id      facebook app id
	 * 	 $app_secret  facebook app secret
	 * 	 $base_url　　　　指向 hybrid.php 之 url
	 * 	 $scope       要求之權限，以逗點分隔
	 * 
	 */
	$app_id = "xxxxxxxx";
	$app_secret = "xxxxxxxx";
	$base_url = "http://your.site/your_folder/hybrid.php";
	$scope = "email";
	
	// 參數陣列
	$config = array(
	    "base_url" => $base_url,
	    "providers" => array(
	        "Facebook" => array(
	            "enabled" => true,
	            "keys" => array("id" => $app_id, "secret" => $app_secret),
	            "scope" => $scope
	        )
	    )
	);

	$hybridAuth = new Hybrid_Auth($config);

	// 進行認證
	// 認證成功後透過 $adapter 操作
	$adapter = $hybridAuth->authenticate("Facebook");

	$userProfile = $adapter->getUserProfile();

	echo "<pre>";
		print_r($adapter->getAccessToken());
		print_r($userProfile);
	echo "</pre>";

} catch (Exception $e) {

 	var_dump($e);

} 

?>