<?php

// ** IF YOU CAN READ THIS IN YOUR WEB BROWSER **,
// YOU DO NOT HAVE PHP ENABLED
// ON YOUR SERVER. YOU NEED PHP
// TO USE APOSTROPHE. THAT IS YOUR
// FIRST STEP. FIX THAT AND VISIT 
// THIS PAGE AGAIN.

if (is_cli()) {
    echo "*********************************************\n";
    echo "*                                           *\n";
    echo "*  Apostrophe & Symfony requirements check  *\n";
    echo "*                                           *\n";
    echo "*********************************************\n\n";
    echo sprintf("php.ini used by PHP: %s\n\n", get_ini_path());

    echo "** WARNING **\n";
    echo "*  The PHP CLI can use a different php.ini file\n";
    echo "*  than the one used with your web server.\n";
    if ('\\' == DIRECTORY_SEPARATOR) {
        echo "*  (especially on the Windows platform)\n";
    }
    echo "*  If this is the case, please ALSO launch this\n";
    echo "*  utility from your web server.\n";
    echo "** WARNING **\n";
} else {
    echo <<<EOF
<html>
<head>
<style>
body {
    padding: 30px;
    text-align: center;
    width: 900px;
    font-family: Arial;
}
</style>
</head>
<body>
<h1>APOSTROPHE REQUIREMENTS CHECK</h1>
EOF
;
    echo sprintf("<p><small>php.ini used by PHP: %s</small></p>", get_ini_path());
}

// mandatory
echo_title("Mandatory requirements");
check(version_compare(phpversion(), '5.2.4', '>='), sprintf('Checking that PHP version is at least 5.2.4 (%s installed)', phpversion()), 'Install PHP 5.3.1 or newer (current version is '.phpversion(), true);
check(ini_get('date.timezone'), 'Checking that the "date.timezone" setting is set', 'Set the "date.timezone" setting in php.ini (like Europe/Paris)', true);
check(is_writable(__DIR__.'/../cache'), sprintf('Checking that cache/ directory is writable'), 'Change the permissions of the cache/ directory so that the web server can write in it', true);
check(is_writable(__DIR__.'/../log'), sprintf('Checking that the logs/ directory is writable'), 'Change the permissions of the logs/ directory so that the web server can write in it', true);
check(is_writable(__DIR__.'/../data/a_writable'), sprintf('Checking that the data/a_writable/ directory is writable'), 'Change the permissions of the data/a-writable directory so that the web server can write in it', true);
check(class_exists('PDO'), 'Checking that PDO is installed', 'Install PDO (mandatory for Propel and Doctrine)', false);
if (class_exists('PDO')) {
    $drivers = PDO::getAvailableDrivers();
    check(in_array('mysql', $drivers), 'Checking that the PDO MySQL driver is installed', 'Install the MySQL driver for PDO');
}
check(function_exists('imagecreatefromjpeg'), 'Checking that gd is enabled in PHP', 'Enable the gd extension in PHP', true);
check(strlen(`echo hello`), 'Checking that PHP is permitted to invoke the shell', 'Turn off so-called "safe" mode, which is both deprecated and ineffective', true);

// Yes, include - we want a nonfatal error if it doesn't work
@include 'Date.php';

check(class_exists('Date'), 'Checking that the Date pear module is installed', 'Install Date via PEAR (pear install Date)', true);

check(class_exists('DomDocument'), 'Checking that the PHP-XML module is installed', 'Install and enable the php-xml module', false);

check(false, 'memory_limit in php.ini must be at least 32M, recommend 64M', 'Cannot be checked automatically, verify this in your php.ini', false);

check(false, 'This script is still installed', 'Remove servercheck.php once you meet the requirements', true);

// warnings
echo_title("Optional checks");
check(function_exists('mb_strlen'), 'Checking that the mb_strlen() function is available', 'Install and enable the mbstring extension', false);
check(function_exists('iconv'), 'Checking that the iconv() function is available', 'Install and enable the iconv extension', false);
check(function_exists('utf8_decode'), 'Checking that the utf8_decode() is available', 'Install and enable the XML extension', false);
check(function_exists('posix_isatty'), 'Checking that the posix_isatty() is available', 'Install and enable the php_posix extension (used to colorize the CLI output)', false);

check(!ini_get('magic_quotes_gpc'), 'Checking that php.ini has magic_quotes_gpc set to off', 'Set magic_quotes_gpc to off in php.ini', false);
check(!ini_get('register_globals'), 'Checking that php.ini has register_globals set to off', 'Set register_globals to off in php.ini', false);
check(!ini_get('session.auto_start'), 'Checking that php.ini has session.auto_start set to off', 'Set session.auto_start to off in php.ini', false);

echo_title('ghostscript and netpbm checks (may fail if your install dir is nonstandard)');
check(strlen(`which gs`), 'Checking that ghostscript is installed for PDF preview', 'Install ghostscript', false);

check(strlen(`which pnmtopng`), 'Checking that netpbm is installed for low-overhead image conversion and PDF previewing', 'Install the netpbm utilities', false);

$accelerator = 
    (function_exists('apc_store') && ini_get('apc.enabled'))
    ||
    function_exists('eaccelerator_put') && ini_get('eaccelerator.enable')
    ||
    function_exists('xcache_set')
;
check($accelerator, 'Checking that that a PHP accelerator is installed', 'Install a PHP accelerator like APC (performance will NOT be acceptable without one)', false);

if (!is_cli()) {
  echo '</body></html>';
}

/**
 * Checks a configuration.
 */
function check($boolean, $message, $help = '', $fatal = false)
{
    if (is_cli()) {
        echo $boolean ? "  OK        " : sprintf("\n\n[[%s]] ", $fatal ? ' ERROR ' : 'WARNING');
        echo sprintf("$message%s\n", $boolean ? '' : ': FAILED');

        if (!$boolean) {
            echo "            *** $help ***\n";
            if ($fatal) {
                die("You must fix this problem before resuming the check.\n");
            }
        }
    } else {
        if ($boolean) {
            $color = '#60b111';
            $alt = 'ok';
        } elseif ($fatal) {
            $color = '#fd3900';
            $alt = 'fatal';
        } else {
            $color = '#6a9ee6';
            $alt = 'warning';
        }

        echo sprintf('
<div style="background-color: %s; padding: 4px; margin: 3px; border: 1px #ddd solid; font-size: 18px">
    <div style="float: left; background-color: white; padding: 4px; margin-right: 4px">%s</div>
    <div style="float: left; margin-top: 7px; text-align: left;">%s%s</div>
    <div style="clear: both"></div>
</div>', $color, $alt, $message, !$boolean ? '<div style="background-color: #fff; padding:5px">What to do'.($fatal ? '' : ' (<em>optional</em>)').': '.$help.'</div>' : '');
    }
}

function echo_title($title)
{
    if (is_cli()) {
        echo "\n** $title **\n\n";
    } else {
        echo "<h2>$title</h2>";
    }
}

/**
 * Gets the php.ini path used by the current PHP interpretor.
 *
 * @return string the php.ini path
 */
function get_ini_path()
{
    if ($path = get_cfg_var('cfg_file_path')) {
        return $path;
    }

    return 'WARNING: not using a php.ini file';
}

function is_cli()
{
    return !isset($_SERVER['HTTP_HOST']);
}

// Adapted freely from the check.php script distributed with the
// Symfony 2.0 evaluation release. That license follows.

// Copyright (c) 2004-2010 Fabien Potencier
// 
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is furnished
// to do so, subject to the following conditions:
// 
// The above copyright notice and this permission notice shall be included in all
// copies or substantial portions of the Software.
// 
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
// THE SOFTWARE.
