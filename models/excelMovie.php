<?php
    require_once "../config/connection.php";
    $film = "SELECT * FROM movie";

    try{
       $filmovi = $conn->query($film)->fetchAll(); 
    }catch(PDOException $e){
        echo "There is no connection with the server";
        die("Something is wrong");
    }
    $excel = new COM("excel.application") or die("Connection with excel file isn't possible");
    $excel->Visible = true;
    $excel->DisplayAlerts = 1;
    $workbook = $excel->Workbooks->Add();
    $worksheet = $excel->Worksheets("Sheet1");
    $worksheet->activate;

    $title = $worksheet->Range("A1");
    $title->activate;
    $title->Value = "Movie name";

    $date = $worksheet->Range("B1");
    $date->activate;
    $date->Value = "Release date";

    $quote = $worksheet->Range("C1");
    $quote->activate;
    $quote->Value="Quote";

    $i = 2;
    foreach($filmovi as $f){
        $title = $worksheet->Range("A{$i}");
        $title->activate;
        $title->Value = $f->title;

        $date = $worksheet->Range("B{$i}");
        $date->activate;
        $date->Value = $f->release_date;

        $quote = $worksheet->Range("C1{$i}");
        $quote->activate;
        $quote->Value = $f->quote;

        $i++;
    }

    $workbook->_SaveAs($filename);
    $workbook->Saved = true;
    $workbook->Save();
    $workbook->Close;
    $excel->Workbooks->Close();
    $excel->Quit();

    unset($worksheet);
    unset($workbook);
    unset($excel);

    $filename = tempnam(sys_get_temp_dir(), "excel");

    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=movieDetails.xsl");

    readfile($filename);
    unlink($filename);

?>