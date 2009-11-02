Junior - A really small PHP framework
=====================================

Junior is a really small PHP framework inspired by Sinatra. It consists of two PHP files (working on making it one), two directories and a .htaccess file

It supports friendly URLs using regular expressions, and uses a single layout file, rather than the more common header and footer include setup

Setup
-----

1. git clone git://github.com/madpilot/junior.git new_app
2. Create an app.php file in the new_app root path
3. Point apache at the public directory in the new_app directory
4. Put your stylesheets and javascripts in the public directory (keep it clean, make sub-directories!)

Example
-------

    <?php
      require_once('lib/junior.php');
      
      function route($request)
      {
        global $vars, $layout;

        if(preg_match("/^$/", $request))
        {
          $layout = "index_layout.php";
          include('views/index.php');
        }
        elseif(preg_match("/^about$/", $request)
        {
          include('views/about.php');
        }
        elseif(preg_match("^/news/(\d+)$", $request, $m))
        {
          $id = $m[1];
          include('views/news.php');
        }
        else
        {
          show_404();
        }
      }
     
      run();
    ?>

Configuration Options
---------------------

$layout - This sets the master layout for the request. Set it to false to not render a layout. Include the variable: $content somewhere in the layout and it will be replaced by the content of the rendered view

$vars - Because of PHP variable scoping, you can use this variable to set "global" variables for the layout file. We suggest a associative array
