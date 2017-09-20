<?php

class HTMLView {
	public function echoPage($body) {
		echo 
"<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"utf-8\">
    
    <title>Third Horizon</title>
    <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
    
    <link rel=\"stylesheet\" href=\"./view/style.css\" />
  </head>
  <body >
  <div id=\"wrapper\">
	$body    
  <footer id=\"footer\">
            <section>
              <h2>Third Horizon</h2>
              <p>Developed in 2016 by Daniel Toll in order to generate horizons.</p>
              
            </section>
            
            <p class=\"copyright\">Content is &copy; 2017 Fria Ligan. Code etc is licenced under Create Commons.</p>
            <p>Names and content is randomized.</p>
  </footer>
	</div>
   </body>

   
</html>";
	}
}