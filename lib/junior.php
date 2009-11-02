<?php
  $layout = 'views/layout.php';
  $vars = array();

  function recursive_stripslashes($str) {
		return is_array($str) ? array_map('recursive_stripslashes', $str) : stripslashes($str);
	}

	// Undo magic quotes - who was the freaking genius that developed that?!
	if(get_magic_quotes_gpc()) 
	{
		foreach(array('_COOKIE', '_GET', '_POST', '_REQUEST') as $var) {
			$$var = array_map('recursive_stripslashes', $$var);
		}
	}


  function run()
  {
    global $layout;
    global $vars;

    $request = $_REQUEST['request'];
    ob_start();
    route($request);
    $content = ob_get_contents();
    ob_end_clean();

    if($layout != false)
    {
      include(dirname(__FILE__) . '/../' . $layout);
    }
    else
    {
      print $content;
    }
  }
?>
