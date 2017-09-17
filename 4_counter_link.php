<?php
    ## подсчет нажатия на ссылку с помощью текстового файла
    $files=fopen("4_count.txt","a+") or die("Error open!");

    flock($files,LOCK_EX);
    $count=fread($files,100);
    flock($files,LOCK_UN);
    fclose($files);

    $all="Нажато на ссылку: $count раз(а).";
    print "$all";

    if (@$_GET['numb'] == true){
        $files = fopen("4_count.txt","a+");
        flock($files,LOCK_EX);
        $count = fread($files,100);
        $count++;
        ftruncate($files,0);
        fwrite($files,$count);
        fflush($files);
        flock($files,LOCK_UN);
        fclose($files);

        //
        header("Location: 4_counter_link.php");
    }






