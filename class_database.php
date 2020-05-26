<?php 

/**
 *
 * @author 		Sp3ciaL2X <Sp3ciaL2X@gmail.com>
 * @since 		2020
 * @license 	We live in a free world
 * @version 	1.0.0
 *
 **/

namespace Database;

if ( defined( "DIRECTORY_SEC" ) != True || DIRECTORY_SEC != True ) {
	
	exit( "Direct initialization of this file is not allowed." );

}

interface DatabaseInterface {

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::__construct
		 * @param 		[ None ]
		 * @return 		[ None ]
		 * @example		Database::__construct( void )
		 *
		 * === INFO ======================================================================
		 * 
		 * This method , sets the required information for connection to the database
		 * 
		 * === Parameters ================================================================
		 *
		 * None
		 *
		 * === Return ====================================================================
		 * 
		 * None
		 * 
		 */

	public function __construct( );

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::errormode
		 * @param 		[ String ]	 $errmode
		 * @return 		[ Boolean ]
		 * @example		Database::errormode( "silent" )
		 *
		 * === INFO ======================================================================
		 *
		 * This method , sets pdo error type , the values ​​it will take are as follows
		 *
		 * === Parameters ================================================================
		 *
		 * $errmode = Error type.The values ​​it takes should be as follows
		 * 
		 *			  "silent" 		= Represents the constant "PDO::ERRMODE_SILENT"
		 *			  "warning" 	= Represents the constant "PDO::ERRMODE_WARNING"
		 *			  "exception"	= Represents the constant "PDO::ERRMODE_EXCEPTION"
		 *
		 * === Return ====================================================================
		 *
		 * Returns "False" if there is no active PDO connection.
		 * Returns "False" if the specified error type is incorrect.
		 * Returns "True" if the error type is set successfully.
		 *
		 * 
		 */

	public function errormode( string $errmode );

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::defaultfetch
		 * @param 		[ String ]	 $fetchmode
		 * @return 		[ Boolean ]
		 * @example		Database::defaultfetch( "object" )
		 *
		 * === INFO ======================================================================
		 *
		 * This method , sets pdo fetch type, the values ​​it will take are as follows.
		 *
		 * === Parameters ================================================================
		 *
		 *  $fetchmode = Fetch type to be used.The values ​​it takes should be as follows
		 *
		 *				 "object"	= Represents the constant "PDO::FETCH_OBJ"
		 *				 "assoc" 	= Represents the constant "PDO::FETCH_ASSOC"
		 *				 "both"		= Represents the constant "PDO::FETCH_BOTH"
		 *				 "num"		= Represents the constant "PDO::FETCH_NUM"
		 *
		 * === Return ====================================================================
		 *
		 * Returns "False" if there is no active PDO connection.
		 * Returns "False" if an error type is not specified or left blank.
		 * Returns "True" if everything is ok
		 *
		 *
		 */

	public function defaultfetch( string $fetchmode );

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::defaultAttribute
		 * @param 		[ Integer ]	 $attribute
		 * @param 		[ Mixed ]	 $value
		 * @return 		[ Boolean ]
		 * @example		Database::defaultAttribute( PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC )
		 *
		 * === INFO ======================================================================
		 *
		 * This method , performs default attribute assignment for pdo.
		 *
		 * === Parameters ================================================================
		 *
		 *	$attribute 	= Attribute pdo constant to set
		 *	$value 		= A valid value for the set constant
		 *
		 * === Return ====================================================================
		 *
		 * Returns "False" if there is no active PDO connection.
		 * Returns "True" if everything is ok
		 *
		 */

	public function defaultAttribute( int $attribute , $value );

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::getType
		 * @param 		[ Mixed ]	 $check
		 * @return 		[ Mixed ]
		 * @example		Database::getType( "this is string value" )
		 *
		 * === INFO ======================================================================
		 *
		 * This method , is used to define the type of data added when adding data to the database.
		 *
		 * === Parameters ================================================================
		 *
		 * $check = Attribute pdo constant to set
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "False" if there is no active PDO connection.
		 * Returns "False" if an check type is not specified or left blank.
		 * Returns a constant of pdo for the specified value if there is no error
		 *
		 */

	public function getType( $check );

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::connect
		 * @param 		[ None ]
		 * @return 		[ Boolean ]
		 * @example		Database::connect( void )
		 *
		 * === INFO ======================================================================
		 *
		 * This method , if everything is processed successfully, it starts a pdo connection
		 *
		 * === Parameters ================================================================
		 *
		 * None
		 * 
		 * === Return ====================================================================
		 * 
		 * Returns "False" if "catch" catches an error.
		 * Returns "True" if everything is ok.
		 *
		 */

	public function connect();

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::escape
		 * @param 		[ Array ]	 $columns
		 * @return 		[ Array ]
		 * @example		Database::escape( [ "column_1" , "column_2" , "column_2" , ... ] )
		 *
		 * === INFO ======================================================================
		 *
		 * This method , returns escaped column names for "PDO::bindValue".
		 *
		 * === Parameters ================================================================
		 *
		 * $columns = Column names to be escaped for "PDO::bindValue"
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "empty array" if there is no active PDO connection.
		 * Returns an "empty array" if no column name is specified.
		 * If everything is in order, an escaped array returns ":column => value"
		 *
		 */

	public function escape( array $columns );

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::insert
		 * @param 		[ String ]	 $table
		 * @param 		[ Array ]	 $insert
		 * @return 		[ Object ]
		 * @example		Database::insert( "table" , [ "column" => "data to add" , ... ] )
		 *
		 * === INFO ======================================================================
		 *
		 * This method is used to add data to the database.
		 *
		 * === Parameters ================================================================
		 *
		 * $table 	= Table name to which data will be added
		 * $insert 	= The data to be added must be in array type
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "empty object" if there is no active PDO connection.
		 * Returns an "empty object" if no value is specified in the $insert variable
		 * Returns the current class if everything is fine
		 *
		 */

	public function insert( string $table , array $insert );

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::delete
		 * @param 		[ String ]	 $table
		 * @param 		[ Array ]	 $condition
		 * @param 		[ String ]	 $operator
		 * @param 		[ Integer ]	 $limit
		 * @return 		[ Object ]
		 * @example		Database::delete( "table" , [ "uid = 1" , "uid = 2" ] , "OR" , 2 )
		 *
		 * === INFO ======================================================================
		 *
		 * This method deletes data based on the condition specified in the database.
		 *
		 * === Parameters ================================================================
		 *
		 * $table 		= A valid table name.
		 * $condition 	= Array with one or more conditions for deletion. -OPTIONAL-
		 * $operator  	= "AND" - "OR" operators for multiple conditions. -OPTIONAL-( If more than one condition is specified, this parameter is mandatory. )
		 * $limit 		= Number of data to be deleted. -OPTIONAL-
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "empty object" if there is no active PDO connection.
		 * Returns an "empty object" if no value is specified in the $table variable
		 * Returns the current class if everything is fine
		 *
		 */

	public function delete( string $table , array $condition = NULL , string $operator = NULL , int $limit = 0 );

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::update
		 * @param 		[ String ]	 $table
		 * @param 		[ Array ]	 $update
		 * @param 		[ Array ]	 $condition
		 * @param 		[ String ]	 $operator
		 * @param 		[ Integer ]	 $limit
		 * @return 		[ Object ]
		 * @example		Database::update( "table" , [ "username" => "Sp3ciaL2X" , ... ] , [ "uid = 1" , ... ] , "OR" , 2 )
		 *
		 * === INFO ======================================================================
		 *
		 * This method update data based on the condition specified in the database.
		 *
		 * === Parameters ================================================================
		 *
		 * $table 		= A valid table name.
		 * $update 		= The syntax of the update should be "column" => "update".
		 * $condition 	= Array with one or more conditions for update. -OPTIONAL-
		 * $operator  	= "AND" - "OR" operators for multiple conditions. -OPTIONAL-( If more than one condition is specified, this parameter is mandatory. )
		 * $limit 		= Number of data to be update. -OPTIONAL-
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "empty object" if there is no active PDO connection.
		 * Returns an "empty object" if no value is specified in the $table variable
		 * Returns the current class if everything is fine
		 *
		 */

	public function update( string $table , array $update , array $condition = NULL , string $operator = NULL , int $limit = 0 );

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::select
		 * @param 		[ String ]	 $table
		 * @param 		[ Array ]	 $columns
		 * @param 		[ Array ]	 $condition
		 * @param 		[ String ]	 $operator
		 * @param 		[ Integer ]	 $limit
		 * @return 		[ Object ]
		 * @example		Database::select( "table" , [ "username" => "Sp3ciaL2X" , ... ] , [ "uid = 1" , ... ] , "OR" , 2 )
		 *
		 * === INFO ======================================================================
		 *
		 * This method update data based on the condition specified in the database.
		 *
		 * === Parameters ================================================================
		 *
		 * $table 		= A valid table name.
		 * $columns 	= The array containing the name of the columns to be selected.
		 * $condition 	= Array with one or more conditions for select. -OPTIONAL-
		 * $operator  	= "AND" - "OR" operators for multiple conditions. -OPTIONAL-( If more than one condition is specified, this parameter is mandatory. )
		 * $limit 		= Number of data to be select. -OPTIONAL-
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "empty object" if there is no active PDO connection.
		 * Returns an "empty object" if no value is specified in the $table variable
		 * Returns the current class if everything is fine
		 *
		 */

	public function select( string $table , array $columns , array $condition = NULL , string $operator = NULL , int $limit = 0 );

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::query
		 * @param 		[ String ]	 $query
		 * @param 		[ Boolean ]	 $default
		 * @return 		[ Object ]
		 * @example		Database::query( "SELECT * FROM table" , True )
		 *
		 * === INFO ======================================================================
		 *
		 * This method used to run a query in a database.
		 *
		 * === Parameters ================================================================
		 *
		 * $query 		= Query to run
		 * $default 	= If "True" is specified, this method returns the default pdo methods, 
		 * 				  if "False" is specified, it returns the methods in the current class.
		 *
		 * $database->query( "SELECT * FROM table" , True )->fetchAll();
		 * $database->query( "SELECT * FROM table" , False )->result();
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "empty object" if there is no active PDO connection.
		 * Returns an "empty object" if no value is specified in the $table variable
		 * Returns an object based on the $default parameter
		 *
		 */

	public function query( string $query , bool $default = True );

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::instantFetch
		 * @param 		[ String ]	 $fetchMode
		 * @param 		[ Mixed ]	 $object
		 * @param 		[ array ]	 $parameters
		 * @return 		[ Boolean ]
		 * @example		Database::instantFetch( "class" , "className" , [ "param_1" , "param_2" , "param_3" ] )
		 *
		 * === INFO ======================================================================
		 *
		 * This method only changes the "fetch" mode for the current query
		 *
		 * === Parameters ================================================================
		 *
		 * $fetchMode 	= Fetch type to be used.The values ​​it takes should be as follows
		 *
		 *				  "object"	= Represents the constant PDO::FETCH_OBJ
		 *				  "assoc"	= Represents the constant PDO::FETCH_ASSOC
		 *				  "both"	= Represents the constant PDO::FETCH_BOTH
		 *				  "num"		= Represents the constant PDO::FETCH_NUM
		 *				  "class"	= Represents the constant PDO::FETCH_CLASS
		 *				  "into"	= Represents the constant PDO::FETCH_INTO
		 *
		 * $object 		= If the $fetchmode parameter is defined as "class", 
		 *				  a string must be specified in a class name, if it is defined as "object", 
		 *				  an object must be specified. This parameter is mandatory if $fetchmode "class" and "object" are defined.- OPTIONAL -
		 * $parameters 	= Parameters for "class" or "object".This parameter is mandatory if $fetchmode "class" and "object" are defined. - OPTIONAL -
		 *
		 * === Return ====================================================================
		 * 
		 * Returns an "False" if no value is specified in the $table variable
		 * If $fetchmode is defined as "class", $object returns "False" if it is not a string value.
		 * If $fetchmode is defined as "object", $object returns "False" if it is not a object value.
		 * Returns "False" if an invalid fetch mode is specified.
		 *
		 * === Note ====================================================================
		 *
		 * This method was created for the "result" method that belongs to this class, it can be used for such methods
		 *
		 */

	public function instantFetch( string $fetchMode , $object = NULL , array $parameters = NULL );

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::result
		 * @param 		[ String ]	 $fetchMode
		 * @param 		[ Mixed ]	 $object
		 * @param 		[ array ]	 $parameters
		 * @return 		[ Boolean ]
		 * @example		Database::result( $result , "class" , "className" , [ "param_1" , "param_2" , "param_3" ] )
		 *
		 * === INFO ======================================================================
		 *
		 * This method is used to get the query result run
		 *
		 * === Parameters ================================================================
		 *
		 * $result 		= Reference parameter, Values ​​affected by query result are assigned to this variable.
		 * $fetchMode 	= Fetch type to be used.The values ​​it takes should be as follows
		 *
		 *				  "object"	= Represents the constant PDO::FETCH_OBJ
		 *				  "assoc"	= Represents the constant PDO::FETCH_ASSOC
		 *				  "both"	= Represents the constant PDO::FETCH_BOTH
		 *				  "num"		= Represents the constant PDO::FETCH_NUM
		 *				  "class"	= Represents the constant PDO::FETCH_CLASS
		 *				  "into"	= Represents the constant PDO::FETCH_INTO
		 *
		 * $object 		= If the $fetchmode parameter is defined as "class", 
		 *				  a string must be specified in a class name, if it is defined as "object", 
		 *				  an object must be specified. This parameter is mandatory if $fetchmode "Class" and "object" are defined.- OPTIONAL -
		 * $parameters 	= Parameters for "class" or "object".This parameter is mandatory if $ fetchmode "Class" and "object" are defined. - OPTIONAL -
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "False" if there is no active PDO connection.
		 * If the "$this->query" property is not an object, that is if the current query fails, this method returns "False".
		 * Returns "False" if $this->query is not a PDOStatement instance.
		 * Otherwise Returns "True".
		 *
		 */

	public function result( &$result , string $fetchMode = NULL , $object = NULL , array $parameters = NULL );

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::affected
		 * @param 		[ None ]
		 * @return 		[ Integer ]
		 * @example		Database::affected(  )
		 *
		 * === INFO ======================================================================
		 *
		 * This method returns the number of rows affected by the query
		 *
		 * === Parameters ================================================================
		 *
		 * None
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "-1" if there is no active PDO connection.
		 * Returns "-1" if the "$this->query" property is not an object, that is if the current query fails.
		 * Returns "-1" if $this->query is not a PDOStatement instance.
		 * Otherwise it returns the number of rows affected by the query.
		 *
		 */

	public function affected();

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::beginTransaction
		 * @param 		[ None ]
		 * @return 		[ Boolean ]
		 * @example		Database::beginTransaction(  )
		 *
		 * === INFO ======================================================================
		 *
		 * This method starts a transaction on the database
		 *
		 * === Parameters ================================================================
		 *
		 * None
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "False" if there is no active PDO connection.
		 * Returns "False" if Transaction cannot be started.
		 * Returns "True" if Transaction is started.
		 *
		 */

	public function beginTransaction();

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::commitTransaction
		 * @param 		[ None ]
		 * @return 		[ Boolean ]
		 * @example		Database::commitTransaction(  )
		 *
		 * === INFO ======================================================================
		 *
		 * This method performs a commit in the database
		 *
		 * === Parameters ================================================================
		 *
		 * None
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "False" if there is no active PDO connection.
		 * Returns "False" if commit failed.
		 * Returns "False" if commit was successful.
		 *
		 */

	public function commitTransaction();

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::inTransaction
		 * @param 		[ None ]
		 * @return 		[ Boolean ]
		 * @example		Database::inTransaction(  )
		 *
		 * === INFO ======================================================================
		 *
		 * This method checks if inside a transaction
		 *
		 * === Parameters ================================================================
		 *
		 * None
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "False" if there is no active PDO connection.
		 * Returns "False" if this method is used outside a transaction
		 * Returns "True" if this method is used in a transaction
		 *
		 */

	public function inTransaction();

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::endTransaction
		 * @param 		[ None ]
		 * @return 		[ Boolean ]
		 * @example		Database::endTransaction(  )
		 *
		 * === INFO ======================================================================
		 *
		 * This method rollback a failed transaction
		 *
		 * === Parameters ================================================================
		 *
		 * None
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "False" if there is no active PDO connection.
		 * Returns "False" if rollback fails
		 * Returns "True" if rollback is successful
		 *
		 */

	public function endTransaction();

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::lastid
		 * @param 		[ None ]
		 * @return 		[ String ]
		 * @example		Database::lastid(  )
		 *
		 * === INFO ======================================================================
		 *
		 * This method returns the line id of the last line added to the database
		 *
		 * === Parameters ================================================================
		 *
		 * None
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "empty string" if there is no active PDO connection.
		 * Returns the id of the last line added to the database
		 *
		 */

	public function lastid();

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::column
		 * @param 		[ None ]
		 * @return 		[ Integer ]
		 * @example		Database::column(  )
		 *
		 * === INFO ======================================================================
		 *
		 * This method returns the number of column affected by the query
		 *
		 * === Parameters ================================================================
		 *
		 * None
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "-1" if there is no active PDO connection.
		 * Returns "-1" if the "$this->query" property is not an object, that is if the current query fails.
		 * Returns "-1" if $this->query is not a PDOStatement instance.
		 * Otherwise it returns the number of column affected by the query.
		 *
		 */

	public function column();

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::getError
		 * @param 		[ String ] 	$info
		 * @param 		[ Integer ]	$code
		 * @param 		[ Integer ]	$state
		 * @return 		[ Boolean ]
		 * @example		Database::getError( $message , $code , $state )
		 *
		 * === INFO ======================================================================
		 *
		 * This method assigns errors to variables defined as reference.
		 *
		 * === Parameters ================================================================
		 *
		 * $info 	= Driver-specific error message.
		 * $code 	= Driver-specific error code.
		 * $state 	= SQLSTATE error code (a five characters alphanumeric identifier defined in the ANSI SQL standard).
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "False" if there is no active PDO connection.
		 * Returns "False" if the "$this->query" property is not an object, that is if the current query fails.
		 * Returns "False" if $this->query is not a PDOStatement instance.
		 * Returns "True" if $this->query is a PDOStatement instance.
		 *
		 */

	public function getError( &$info , &$code , &$state = NULL );

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Method Database::default
		 * @param 		[ None ]
		 * @return 		[ Object ]
		 * @example		Database::default(  )->prepare(...);
		 *
		 * === INFO ======================================================================
		 *
		 * This method is used to access the default pdo object
		 *
		 * === Parameters ================================================================
		 *
		 * None
		 *
		 * === Return ====================================================================
		 * 
		 * Returns "StdClass" if there is no active PDO connection.
		 * Returns the default pdo object.
		 *
		 */

	public function default();

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Magic Methods Database::__toString
		 * @param 		[ None ]
		 * @return 		[ String ]
		 *
		 * === INFO ======================================================================
		 *
		 * Magic Method
		 *
		 * === Parameters ================================================================
		 *
		 * None
		 *
		 * === Return ====================================================================
		 * 
		 * Return "String"
		 *
		 */

	public function __toString();

		/**
		 *
		 * @final 		True
		 * @internal 	Public
		 * @method 		Interface Magic Methods Database::__debugInfo
		 * @param 		[ None ]
		 * @return 		[ Array ]
		 *
		 * === INFO ======================================================================
		 *
		 * Magic Method
		 *
		 * === Parameters ================================================================
		 *
		 * None
		 *
		 * === Return ====================================================================
		 * 
		 * Return "String"
		 *
		 */

	public function __debugInfo();

}

final class Database implements DatabaseInterface {

	/**
	 *
	 * @internal Private
	 * @property $dsn_type
	 *
	 * The name of the database driver to use
	 *
	 */

	private $dsn_type 	= NULL;

	/**
	 *
	 * @internal Private
	 * @property $dsn_host
	 *
	 * The address of the database server to use
	 *
	 */

	private $dsn_host 	= NULL;

	/**
	 *
	 * @internal Private
	 * @property $dsn_port
	 *
	 * The port of the database server to use
	 *
	 */

	private $dsn_port 	= NULL;

	/**
	 *
	 * @internal Private
	 * @property $dsn_name
	 *
	 * Name of the database to be used
	 *
	 */

	private $dsn_name 	= NULL;

	/**
	 *
	 * @internal Private
	 * @property $dsn_char
	 *
	 * Character set for data
	 *
	 */

	private $dsn_char 	= NULL;

	/**
	 *
	 * @internal Private
	 * @property $username
	 *
	 * Database username
	 *
	 */

	private $username 	= NULL;

	/**
	 *
	 * @internal Private
	 * @property $password
	 *
	 * Database password
	 *
	 */

	private $password 	= NULL;

	/**
	 *
	 * @internal Private
	 * @property $dsn
	 *
	 * Database Source
	 *
	 */

	private $dsn 		= NULL;

	/**
	 *
	 * @internal Private
	 * @property $pdo
	 *
	 * PDO resource
	 *
	 */

	private $pdo		= NULL;

	/**
	 *
	 * @internal Private
	 * @property $connection
	 *
	 * Connection status, "True" if there is connection, "False" if not
	 *
	 */

	private $connection = NULL;

	/**
	 *
	 * @internal Private
	 * @property $query
	 *
	 * Last query object executed
	 *
	 */

	private $query		= NULL;


	final public function __construct( ) {

		if ( !file_exists( "configuration.php" ) ) {
			
			throw new Exception( "Configuration file does not exist" );

		}

		require_once "configuration.php";

		$array = array( "database_type" , "database_host" , "database_port" , "database_name" , "database_char" , "username" , "password" );

		foreach ( $array as $const ) {

			if ( !defined( "\Configuration\Configuration::" . $const ) || empty( trim( "\Configuration\Configuration::".$const ) ) ) {
				
				exit( "'Configuration::".$const."' is not defined" );

			}

		}

		unset( $array );

		$this->dsn_type = \Configuration\Configuration::database_type;
		$this->dsn_host = \Configuration\Configuration::database_host;
		$this->dsn_port = \Configuration\Configuration::database_port;
		$this->dsn_name = \Configuration\Configuration::database_name;
		$this->dsn_char = \Configuration\Configuration::database_char;
		$this->username = \Configuration\Configuration::username;
		$this->password = \Configuration\Configuration::password;

		$this->connect();

		return $this;
		
	}

	final public function errormode( string $errmode ) : bool {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return False;

		}

		if ( empty( trim( $errmode ) != False ) ) {
			
			return False;

		}


		switch ( strtolower( $errmode ) ) {
			
			case "silent" : 

				$this->pdo->setAttribute( \PDO::ATTR_ERRMODE , \PDO::ERRMODE_SILENT );
				break;

			case "warning" :

				$this->pdo->setAttribute( \PDO::ATTR_ERRMODE , \PDO::ERRMODE_WARNING );
				break;

			case "exception" :

				$this->pdo->setAttribute( \PDO::ATTR_ERRMODE , \PDO::ATTR_EXCEPTION );
				break;

			default :

				echo "{$errmode} Invalid error mode";
				return False;

		}

		return True;

	}

	final public function defaultfetch( string $fetchmode ) : bool {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return False;

		}

		if ( empty( trim( $fetchmode ) != False ) ) {
			
			return False;

		}

		switch ( strtolower( $fetchmode ) ) {
			
			case "object" :

				$this->pdo->setAttribute( \PDO::ATTR_DEFAULT_FETCH_MODE , \PDO::FETCH_OBJ );
				break;

			case "assoc" : 

				$this->pdo->setAttribute( \PDO::ATTR_DEFAULT_FETCH_MODE , \PDO::FETCH_ASSOC );
				break;

			case "both" : 

				$this->pdo->setAttribute( \PDO::ATTR_DEFAULT_FETCH_MODE , \PDO::FETCH_BOTH );
				break;

			case "num" : 

				$this->pdo->setAttribute( \PDO::ATTR_DEFAULT_FETCH_MODE , \PDO::FETCH_NUM );
				break;

			default : 

				echo "{$fetchmode} Invalid fetch mode";
				return False;

		}

		return True;

	}

	final public function defaultAttribute( int $attribute , $value ) : bool {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return False;

		}

		return $this->pdo->setAttribute( $attribute , $value );


	}

	final public function getType( $check ) {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return False;

		}

		if ( empty( trim( $check ) ) ) {

			return False;

		}

		switch ( $check ) {
			
			case is_null( $check ) :

				return \PDO::PARAM_NULL;

			case is_bool( $check ) :

				return \PDO::PARAM_BOOL;

			case is_int( $check ) :

				return \PDO::PARAM_INT;

			case is_string( $check ) :

				return \PDO::PARAM_STR;

			default : 

				return False;

		}

		return False;

	}

	final public function connect() : bool {

		if ( is_object( $this->pdo ) ) {
			
			$this->pdo = NULL;

		}

		if ( !is_null( $this->dsn_type ) && $this->dsn_type == "mysql" ) {
			
			$this->dsn = $this->dsn_type.":host=".$this->dsn_host.";port=".$this->dsn_port.";dbname=".$this->dsn_name.";charset=".$this->dsn_char.";";

		}

		if ( !is_null( $this->dsn_type ) && ( $this->dsn_type == "sqlite" || $this->dsn_type == "sqlite2" ) ) {
			
			$this->dsn = $this->dsn_type.":".$this->dsn_name;

		}

		try {

			$this->pdo = new \PDO( $this->dsn , $this->username , $this->password );

			if ( is_object( $this->pdo ) ) {
				
				$this->connection = True;

			}

		} catch( \PDOException $e ) {

			echo "[".$e->getCode()."] - ".$e->getMessage()." ".$e->getFile()." on line ".$e->getLine();
			return False;

		}

		return True;

	}

	final public function escape( array $columns ) : array {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return [ ];

		}

		if ( count( $columns ) < 1 ) {
			
			return [ ];

		}

		$escaped = array();

		foreach ( $columns as $column => $value ) {

			$escaped[ chr( 58 ).$column ] = $value;

		}

		return $escaped;

	}

	final public function insert( string $table , array $insert ) : object {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return ( object )[ ];

		}

		if ( empty( trim( $table ) || count( $insert ) < 1 ) ) {
			
			return ( object )[ ];

		}

		$sql = "INSERT INTO {$table} ( ".implode( chr( 44 ) , array_keys( $insert ) )." ) VALUES ( ".implode( chr( 44 ) , array_keys( $this->escape( $insert ) ) )." )";

		$prepare = $this->pdo->prepare( $sql );

		foreach (  $this->escape( $insert ) as $column => $value ) {
			
			$prepare->bindValue( $column , $value , $this->getType( $value ) );

		}

		$prepare->execute();

		$this->query = $prepare;

		return $this;

	}

	final public function delete( string $table , array $condition = NULL , string $operator = NULL , int $limit = 0 ) : object {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return ( object )[ ];

		}

		if ( empty( trim( $table ) ) ) {
			
			return ( object )[ ];

		}

		if ( !is_null( $condition ) ) {

			$process = array();
			$prefix = 0;
			
			foreach ( $condition as $key => $value ) {
			
				$explode[ ] = explode( " " , $value );
					
				$process[ $explode[ $key ][ "0" ]."_".$prefix++ ] = $explode[ $key ][ "2" ];

				$explode[ $key ][ "2" ] = array_keys( $escaped = $this->escape( $process ) )[ $key ];

				$implode[ ] = implode( " " , $explode[ $key ] );

			}

			if ( count( $condition ) == 1 ) {
				
				$query = "DELETE FROM {$table} WHERE ".$implode[ "0" ].( $limit > 0 ? " LIMIT ".$limit : "" );

			}

			if ( count( $condition ) > 1 && !is_null( $operator ) ) {
	
				$query = "DELETE FROM {$table} WHERE ".implode( " ".$operator." " , $implode ).( $limit > 0 ? " LIMIT ".$limit : "" );

			}

		}

		$prepare = $this->pdo->prepare( $query );

		foreach ( $escaped as $column => $value ) {
			
			$prepare->bindValue( $column , $value , $this->getType( $value ) );

		}

		$prepare->execute();
		$this->query = $prepare;

		return $this;

	}

	final public function update( string $table , array $update , array $condition = NULL , string $operator = NULL , int $limit = 0 ) : object {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return ( object )[ ];

		}

		if ( empty( trim( $table ) ) || count( $update ) < 1 ) {
			
			return ( object )[ ];

		}

		foreach ( array_combine( array_keys( $update ) , array_keys( $tempescaped = $this->escape( $update ) ) ) as $key => $value ) {
			
			$mapping[] = $key." ".chr( 61 )." ".$value;

		}

		$query = "UPDATE {$table} SET ".implode( " ".chr( 44 )." " , $mapping ).( $limit > 0 ? " LIMIT ".$limit : "" );

		$prepare = $this->pdo->prepare( $query );

		if ( !is_null( $condition ) ) {

			$process = array();
			$prefix = 0;
			
			foreach ( $condition as $key => $value ) {
				
				$explode[ ] = explode( " " , $value );
				
				$process[ $explode[ $key ][ "0" ]."_".$prefix++ ] = $explode[ $key ][ "2" ];

				$explode[ $key ][ "2" ] = array_keys( $escaped = $this->escape( $process ) )[ $key ];

				$implode[ ] = implode( " " , $explode[ $key ] );

			}

			if ( count( $condition ) == 1 ) {
				
				$query = "UPDATE {$table} SET ".implode( " ".chr( 44 )." " , $mapping )." WHERE ".$implode[ "0" ].( $limit > 0 ? " LIMIT ".$limit : "" );

			}

			if ( count( $condition ) > 1 && !is_null( $operator ) ) {
				
				$query = "UPDATE {$table} SET ".implode( " ".chr( 44 )." " , $mapping )." WHERE ".implode( " ".$operator." " , $implode ).( $limit > 0 ? " LIMIT ".$limit : "" );

			}

			$escaped = array_merge( $tempescaped , $escaped );

		}

		$prepare = $this->pdo->prepare( $query );

		foreach ( isset( $escaped ) ? $escaped : $tempescaped as $column => $value ) {
			
			$prepare->bindValue( $column , $value , $this->getType( $value ) );

		}
		
		$prepare->execute();
		$this->query = $prepare;

		return $this;

	}

	final public function select( string $table , array $columns , array $condition = NULL , string $operator = NULL , int $limit = 0 ) : object {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return ( object )[ ];

		}

		if ( empty( trim( $table ) ) ) {
			
			return ( object )[ ];

		}

		$query = "SELECT ".implode( " ".chr( 44 )." " , $columns )." FROM {$table}".( $limit > 0 ? " LIMIT ".$limit : "" );

		$prepare = $this->pdo->prepare( $query );

		if ( !is_null( $condition ) ) {
			
			$process = array();
			$prefix = 0;

			foreach ( $condition as $key => $value ) {
				
				$explode[ ] = explode( " " , $value );

				$process[ $explode[ $key ][ "0" ]."_".$prefix++ ] = $explode[ $key ][ "2" ];

				$explode[ $key ][ "2" ] = array_keys( $escaped = $this->escape( $process ) )[ $key ];

				$implode[ ] = implode( " " , $explode[ $key ] );

			}

			if ( count( $condition ) == 1 ) {
				
				$query = "SELECT ".implode( " ".chr( 44 )." " , $columns )." FROM {$table} WHERE ".$implode[ "0" ].( $limit > 0 ? " LIMIT ".$limit : "" );

			}

			if ( count( $condition ) > 1 && !is_null( $operator ) ) {
				
				$query = "SELECT ".implode( " ".chr( 44 )." " , $columns )." FROM {$table} WHERE ".implode( " ".$operator." " , $implode ).( $limit > 0 ? " LIMIT ".$limit : "" );

			}

			$prepare = $this->pdo->prepare( $query );

			foreach ( $escaped as $column => $value ) {
			
				$prepare->bindValue( $column , $value , $this->getType( $value ) );

			}

		}

		$prepare->execute();
		$this->query = $prepare;

		return $this;

	}

	final public function query( string $query , bool $default = True ) : object {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return ( object )[ ];

		}

		if ( empty( trim( $query ) ) ) {
			
			return ( object )[ ];

		}


		if ( $default != False ) {
			
			return $this->pdo->query( $query );

		}

		$this->query = $this->pdo->query( $query );

		return $this;

	}

	final public function instantFetch( string $fetchMode , $object = NULL , array $parameters = NULL ) : bool {

		if ( empty( trim( $fetchMode ) ) ) {
			
			return False;

		}
			
		switch ( strtolower( $fetchMode ) ) {

			case "object" :

				$this->query->setFetchMode( \PDO::FETCH_OBJ );
				break;

			case "assoc" : 

				$this->query->setFetchMode( \PDO::FETCH_ASSOC );
				break;

			case "both" : 

				$this->query->setFetchMode( \PDO::FETCH_BOTH );
				break;

			case "num" : 

				$this->query->setFetchMode( \PDO::FETCH_NUM );
				break;

			case "class" :

				if ( is_string( $object ) ) {
					
					$this->query->setFetchMode( \PDO::FETCH_CLASS , $object , $parameters );
					break;

				}

				return False;

			case "into" :

				if ( is_object( $object ) ) {
					
					$this->query->setFetchMode( \PDO::FETCH_INTO , $object );
					break;

				}

				return False;

			default : 

				echo "'{$fetchMode}' Invalid fetch mode";
				return False;

		}

		return True;

	}

	final public function result( &$result , string $fetchMode = NULL , $object = NULL , array $parameters = NULL ) : bool {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return False;

		}

		if ( is_object( $this->query ) != True ) {
			
			return False;

		}

		if ( $this->query instanceof \PDOStatement ) {

			if ( !is_null( $fetchMode ) ) {
				
				$this->instantFetch( $fetchMode , $object , $parameters );

			}

			while ( $value = $this->query->fetch() ) {
				
				$result[ ] = $value;

			}

			return True;

		}

		return False;

	}

	final public function affected() : int {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return -1;

		}

		if ( is_object( $this->query ) != True ) {
			
			return -1;

		}

		if ( $this->query instanceof \PDOStatement ) {
			
			return $this->query->rowCount();

		}

		return -1;

	}

	final public function beginTransaction() : bool {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return False;

		}

		return $this->pdo->beginTransaction();

	}

	final public function commitTransaction() : bool {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return False;

		}

		return $this->pdo->commit();

	}

	final public function inTransaction() : bool {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return False;

		}

		return $this->pdo->inTransaction();

	}

	final public function endTransaction() : bool {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return False;

		}

		return $this->pdo->rollback();

	}

	final public function lastid() : string {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return ( string )"";

		}

		return $this->pdo->lastInsertId();

	}

	final public function column() : int {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return -1;

		}

		if ( is_object( $this->query ) != True ) {
			
			return -1;

		}

		if ( $this->query instanceof \PDOStatement ) {
			
			return $this->query->columnCount();

		}

		return -1;

	}

	final public function getError( &$info , &$code , &$state = NULL ) : bool {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return False;

		}

		if ( is_object( $this->query ) != True ) {
			
			return False;

		}

		if ( $this->query instanceof \PDOStatement ) {
			
			if ( is_array( $this->query->errorInfo() ) != False  ) {
				
				$info = $this->query->errorInfo()[ "2" ];
				$code = $this->query->errorInfo()[ "1" ];

			}

			if ( isset( $code ) && $code > 0 ) {
				
				$state = $this->query->errorCode();

			}

			return True;

		}

		return False;

	}

	final public function default() : object {

		if ( !is_null( $this->connection ) && $this->connection != True ) {
			
			return ( object )[ ];

		}

		return ( object ) $this->pdo;

	}

	final public function __toString() : string {

		return "";

	}

	final public function __debugInfo() : array {

		return [ ];

	}

}

?>