<?php

include( "../../../../wp-config.php" );

global $user_ID;

$titulos = array(

    '<!--:es-->Programa<!--:--><!--:en-->Program<!--:-->'         => 'programa.php',
    '<!--:es-->Invitados<!--:--><!--:en-->Guests<!--:-->'     => 'invitados.php',
    '<!--:es-->Lecturas<!--:--><!--:en-->Texts<!--:-->'     => 'lecturas.php',
    '<!--:es-->Educativo<!--:--><!--:en-->Education<!--:-->'     => 'educativo.php',
    '<!--:es-->SITAC<!--:--><!--:en-->SITAC<!--:-->'             => 'sitac.php'

);

$madreID = 0;

$loremImg = '<img src="img/hormigas.gif">';
$loremTxt = '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
<p> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>';


foreach ($titulos as $madre => $arrayOtemplate ) {
   
    $madreID = 0;
   
    $titulo = $madre;


    $page = array(
        'post_type'    => 'page',
        'post_content' => /* $loremImg .*/ $loremTxt,
        'post_parent'  => 0,
        'post_author'  => $user_ID,
        'post_status'  => 'publish',
        'post_title'   => $titulo
    );


    $pageID = wp_insert_post ($page);
   
    if( !is_array($arrayOtemplate) ) {
        $template = $arrayOtemplate;       
    }
    if( is_array($arrayOtemplate) ) {
        $template = $arrayOtemplate["template"];
    }
    update_post_meta($pageID, "_wp_page_template", $template );
	
	echo $titulo . " : OK <br>";


    if( is_array($arrayOtemplate) ) {
        $madreID = $pageID;
        $hijas = $arrayOtemplate["paginas"];
       
        if(count($hijas)>1){
           
            if ($madreID != 0) {

                foreach($hijas as $hija=>$template){
                   
                    $titulo = $hija;

                    $page = array(
                        'post_type'    => 'page',
						'post_content' => /* $loremImg .*/ $loremTxt,
                        'post_parent'  => $madreID,
                        'post_author'  => $user_ID,
                        'post_status'  => 'publish',
                        'post_title'   => $titulo
                    );

                    $pageID = wp_insert_post ($page);
                   
                    update_post_meta($pageID, "_wp_page_template", $template );
					
					echo $titulo . " : OK <br>";
               
                }


            }
        }
    }

       
}

?>
