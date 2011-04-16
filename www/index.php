<?php
// 定義ファイルの読み込み
require('/home/hebita/www/lib/conf/Define.php');
require( CLASS_DIR . '/validateURL.php');
require( CLASS_DIR . '/hebita.php');

try {
	$u = new ValidateURL;
	$class = $u->validatePath();

	// 小クラスを呼ぶ
	require($class);
	$className = $u->GetClassName();
	$o = new $className;
	
	// 解析したパスを与える
	$o->SetBaseTemplate($u);
	$o->execute();
	$o->GenHtml();

} catch (Exception $e) {
	echo $e->getMessage(), "\n";
}

?>
