<?php
/**
 * Example of how to use PHPLine to execute command on your machine
 */

include_once( '../src/PHPLine/PHPLine.php' );

$PHPLine = new PHPLine\PHPLine();

echo '<pre>';
print_r($PHPLine->run('ls -al'));
echo '</pre>';

/* End of file index.php */
/* Location: ./src/examples/index.php */
