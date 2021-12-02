<?php
$key = '109fsjda0as9fsafds09afjs90ja3';

function noAccess()
{
	echo $_GET['key'];
	echo 'Access denied. Get the fuck out of here!';
}

function missParameter($paramater)
{
	$ans = 'Error. Parameter ';
	$ans .= (string)$paramater;
	$ans .= ' not found';
	echo $ans;
}

function requestProcessing($key)
{
	if(!isset($_GET['key']))
		return noAccess();
	if((string)$_GET['key'] != (string)$key)
		return noAccess();

	if(!isset($_GET['method']))
		return missParameter('method');

	$method = $_GET['method'];
	switch ($method) {
		case 'addPost':
			if(!isset($_GET['dir']))
				return missParameter('dir');
			if(!isset($_GET['group_id']))
				return missParameter('group_id');
			if(!isset($_GET['post_id']))
				return missParameter('post_id');

			$dir = $_GET['dir'];
			$group_id = $_GET['group_id'];
			$post_id = $_GET['post_id'];
			$path = './';
			$path .= $dir;
			if(!is_dir($path))
				mkdir($path);
			$path .= '/';
			$path .= $group_id;
			file_put_contents($path, $post_id);
			if(file_exists($path))
				echo "Successful!";
			else
				echo "Unknown error :c";
		break;
		
		case 'getPost':
			if(!isset($_GET['dir']))
				return missParameter('dir');
			if(!isset($_GET['group_id']))
				return missParameter('group_id');
			$dir = $_GET['dir'];
			$group_id = $_GET['group_id'];
			$path = './';
			$path .= $dir;
			$path .= '/';
			$path .= $group_id;
			if(!file_exists($path)){
				echo 'Error. Group is not found!';
				return;
			}
			echo file_get_contents($path);
		break;

		case 'clearAllPosts':
			if(!isset($_GET['dir']))
				return missParameter('dir');
			$path = './';
			$path .= $_GET['dir'];
			$files = scandir($path);
			for($i = 2; $i < count($files); $i++)
			{
				$file = $path;
				$file .= '/';
				$file .= $files[$i];
				file_put_contents($file, '0');
			}

			echo 'All posts cleared!';
			break;

		case 'clearPost':
			if(!isset($_GET['dir']))
				return missParameter('dir');
			if(!isset($_GET['group_id']))
				return missParameter('group_id');
			$path = './';
			$path .= $_GET['dir'];
			$path .= '/';
			$path .= $group_id;
			if(!file_exists($path))
				return echo 'Successful';
			file_put_contents($path, '0');
			echo 'Successful';
	}
}
requestProcessing($key);



?>