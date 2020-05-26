<?php 

/**
 *
 * @author 		Sp3ciaL2X <Sp3ciaL2X@gmail.com>
 * @since 		2020
 * @license 	We live in a free world
 * @version 	1.0.0
 *
 **/

namespace Configuration;

if ( defined( "DIRECTORY_SEC" ) != True || DIRECTORY_SEC != True ) {
	
	exit( "Direct initialization of this file is not allowed." );

}

final class Configuration {

	CONST database_type = "mysql";
	CONST database_host = "localhost";
	CONST database_port = "3306";
	CONST database_name = "leechtr";
	CONST database_char = "utf8";

	/**
	 *
	 * Database user information
	 *
	 **/

	CONST username = "ghost";
	CONST password = "123456789";

}

?>