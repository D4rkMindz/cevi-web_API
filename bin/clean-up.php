<?php
$backupDirectory = scandir("./backup/");
$homeDirectory = scandir(".");
foreach ($homeDirectory as $dir)***REMOVED***
    if (is_dir($dir) && strpos($dir, "htdocs_") !== false)***REMOVED***
        echo "Removig $dir \n";
        system("rm -rf $dir");
***REMOVED***
***REMOVED***
if (!isset($argv[1])) ***REMOVED***
    $argv[1] = 0;
***REMOVED***
$time = date("Y-m-d_H-i-s", time() - $argv[1]);
$directories = [];
$directoriesToDelete = [];
foreach ($backupDirectory as $dir) ***REMOVED***
    if (is_dir($dir)) ***REMOVED***
        if ($dir < $time && strpos($dir, ".") === false) ***REMOVED***
            $directoriesToDelete[] = $dir;
    ***REMOVED***
***REMOVED***
***REMOVED***
if ($argv[1] <= 60) ***REMOVED***
    $t = "Seconds";
    $val = $argv[1];
***REMOVED*** elseif ($argv[1] <= 3600) ***REMOVED***
    $t = "Minutes";
    $val = $argv[1] / 60;
***REMOVED*** elseif ($argv[1] <= 86400) ***REMOVED***
    $t = "Hours";
    $val = ($argv[1] / 60) / 60;
***REMOVED*** elseif ($argv[1] <= 31536000) ***REMOVED***
    $t = "Days";
    $val = (($argv[1] / 60) / 60) / 24;
***REMOVED*** elseif ($argv[1] > 31536000) ***REMOVED***
    $t = "Years";
    $val = ((($argv[1] / 60) / 60) / 24) / 365;
***REMOVED***
foreach ($directoriesToDelete as $dir) ***REMOVED***
    echo "Deleting directory $dir (older than $val $t)\n";
    system("rm -rf $dir");
***REMOVED***
$dirContent= scandir(".");
$files = [];
if (!is_dir("backup/"))***REMOVED***
    echo "Creating ./backup directory\n";
    system("mkdir ./backup/");
***REMOVED***
foreach ($dirContent as $file)***REMOVED***
    if (is_file($file) && pathinfo($file, PATHINFO_EXTENSION) == "zip")***REMOVED***
        $fulldate = str_replace("contact_form_", "", $file);
        $date = substr($fulldate, 0, -13);
        $files[] = $file;
        if (!is_dir("./backup/$date/"))***REMOVED***
            echo "\n";
            echo "Creating ./backup/$date directory\n";
            system("mkdir ./backup/$date/");
    ***REMOVED***
        echo "Moving $file to backup/$date/$file\n";
        rename($file, "backup/$date/$file");
***REMOVED***
***REMOVED***
echo "\nFinished cleaning up zip files\n";