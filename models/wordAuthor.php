<?php
    $filename = 'author.doc';
    header("Content-type: application/vnd.ms-word");
    header( "Content-Disposition: attachment; filename=".basename($filename));
    header( "Content-Description: File Transfer");
    @readfile($filename);
    $content = '<html xmlns:v="urn:schemas-microsoft-com:vml" '
                .'xmlns:o="urn:schemas-microsoft-com:office:office" '
                .'xmlns:w="urn:schemas-microsoft-com:office:word" '
                .'xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"= '
                .'xmlns="http://www.w3.org/TR/REC-html40">'
                .'<head><meta http-equiv="Content-Type" content="text/html; charset=Windows1252">'
                .'<title></title>'
                .'<!--[if gte mso 9]>'
                .'<xml>'
                .'<w:WordDocument>'
                .'<w:View>Print'
                .'<w:Zoom>100'
                .'<w:DoNotOptimizeForBrowser/>'
                .'</w:WordDocument>'
                .'</xml>'
                .'<![endif]-->'
                .'<style>
                @page
                    {
                    font-family: Arial;
                    size:215.9mm 279.4mm; /* A4 */
                    margin:14.2mm 17.5mm 14.2mm 16mm; /* Margins: 2.5 cm on each side */
                    }
                    h2 { font-family: Arial; font-size: 18px; text-align:center; }
                    p.para {font-family: Arial; font-size: 13.5px; text-align: justify;}
                    </style>'
                    .'</head>'
                    .'<body>'
                    .'<h2>Tijana Nestinac 93/18</h2><br/>'
                    .'<p>City: Belgrade, Serbia</p>'
                    .'<p>Currently studying at Visoka ICT College</p>';
    echo $content;
?>