<?php
/**
 * PHPLine
 *
 * @author		Khaled Attia
 * @filesource
 */

namespace PHPLine;

class PHPLine {

	/*
	 * Run
	 * Execute the given command
	 *
	 * @param	string		$command	The command that will be executed.
	 * @param	bool		$realtime
	 * @return	mixed
	 */
	public function run($command, $realtime = FALSE)
	{
		$descriptorspec = array(
			0 => array("pipe", "r"), // stdin is a pipe that the child will read from
			1 => array('pipe', 'w'), // stdout is a pipe that the child will write to
			2 => array('pipe', 'w') // stderr
		);

		$pipes		= array();
		$resource	= proc_open($command, $descriptorspec, $pipes, NULL, NULL);

		if ( ! is_resource($resource) ) {
			return FALSE;
		}

		if( $realtime ) {
			$errbuf = NULL;
			while ( ($buffer = fgets($pipes[1], 1024)) != NULL || ($errbuf = fgets($pipes[2], 1024)) != NULL ) {
				if (strlen($buffer)){
					echo $buffer;
				}

				if (strlen($errbuf)) {
					echo "ERR: " . $errbuf;
				}
			}
		}
		else {
			$stdin		= stream_get_contents($pipes[0]); // Standard input
			$stdout		= stream_get_contents($pipes[1]); // Standard output
			$stderr		= stream_get_contents($pipes[2]); // Standard error
		}

		foreach ($pipes as $pipe) {
			fclose($pipe);
		}

		$status		= proc_close($resource);
		if ($status) {
			throw new Exception($stderr);
		}

		// return empty($stdout) ? $stderr : $stdout;

		if( ! $realtime ) {
			return array(
				'status'	=> $status,
				'stdin'		=> $stdin,
				'stdout'	=> $stdout,
				'stderr'	=> $stderr,
			);
		}
	}
}

/* End of file PHPLine.php */
/* Location: ./src/PHPLine/PHPLine.php */
