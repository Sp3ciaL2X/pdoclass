# PDO Database Class

> This class includes functions that allow simpler use of operations such as adding, removing and updating using pdo.

> Before using this class, you need to define the constant "DIRECTORY_SEC" with a "boolean" value on the page you will use.
If it is defined as "True", it is not possible to directly access valid pages via the browser.

#

### Setting the PDO error type

> The "errormode" method sets pdo fetch type, the values ​​it will take are as follows.

```php

/* Syntax */ 

Database::errormode( string $errmode ) : bool ;



/* Parameters */

#errmode:	Error type.The values ​​it takes should be as follows.
#		
#		"silent" 	= Represents the constant PDO::ERRMODE_SILENT
#		"warning" 	= Represents the constant PDO::ERRMODE_WARNING
#		"exception"	= Represents the constant PDO::ERRMODE_EXCEPTION



/* Return */

#Return: Returns "False" if there is no active PDO connection.
#Return: Returns "False" if the specified error type is incorrect.
#Return: Returns "True" if the error type is set successfully.



/* Example */

$database = new Database;

$database->errormode( "silent" );

```

#

### Setting the fetch type

> The "defaultfetch" method sets pdo fetch type, the values ​​it will take are as follows.

```php

/* Syntax */ 

Database::defaultfetch( string $fetchmode ) : bool ;



/* Parameters */

#fetchmode:	Fetch type to be used.The values ​​it takes should be as follows.
#
#		"object"	= Represents the constant PDO::FETCH_OBJ
#		"assoc" 	= Represents the constant PDO::FETCH_ASSOC
#		"both"		= Represents the constant PDO::FETCH_BOTH
#		"num"		= Represents the constant PDO::FETCH_NUM



/* Return */

#Return: Returns "False" if there is no active PDO connection.
#Return: Returns "False" if an error type is not specified or left blank.
#Return: Returns "True" if everything is ok.



/* Example */

$database = new Database;

$database->defaultfetch( "assoc" );

```

#

### Specify Attribute

> The "defaultAttribute" method performs default attribute assignment for pdo.

```php

/* Syntax */ 

Database::defaultAttribute( int $attribute , $value ) : bool ;



/* Parameters */

#attribute:	Attribute pdo constant to set
#value:		A valid value for the set constant



/* Return */

#Return: Returns "False" if there is no active PDO connection.
#Return: Returns "True" if everything is ok.



/* Example */

$database = new Database;

$database->defaultAttribute( PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC );

```

#

### Adding Data

> The "insert" method is used to add data to the database

```php

/* Syntax */

Database::insert( string $table , array $insert ) : object ;



/* Parameters */

#table:		The name of the table to which the data will be added
#insert:	The data to be added must be in array type



/* Return */

#Return: Returns "empty object" if there is no active PDO connection.
#Return: Returns an "empty object" if no value is specified in the $insert variable.
#Return: Returns the current class if everything is fine.

/* Example */

$database = new Database;

$database->insert( "members" , [ "username" => "John" , "email" => "doe@example.net" ] );


```

#

### Data Deletion

> The "delete" method , deletes data based on the condition specified in the database.

```php

/* Syntax */ 

Database::delete( string $table , array $condition , string $operator , integer $limit ) : object ;



/* Parameters */

#table:		A valid table name
#condition:	Array with one or more conditions for deletion.[Optional]
#operator:	AND-OR operators for multiple conditions.[Optional]
#limit:		Number of data to be deleted.[Optional]



/* Return */

#Return: Returns "empty object" if there is no active PDO connection.
#Return: Returns an "empty object" if no value is specified in the $table variable
#Return: Returns the current class if everything is fine



/* Example */

$database = new Database;

$database->delete( "members" , [ "uid = 1" , "uid = 2" , "uid = 3" ] , "AND" , 1 );

```

#

### Data Update

> The "update" method , update data based on the condition specified in the database.

```php

/* Syntax */ 

Database::update( string $table , array $update , array $condition , string $operator , integer $limit ) : object ;



/* Parameters */

#table:		A valid table name.
#update:	The syntax of the update should be "column" => "update".
#condition:	Array with one or more conditions for update.[Optional]
#operator:	AND-OR operators for multiple conditions.[Optional]
#limit:		Number of data to be update.[Optional]



/* Return */

#Return: Returns "empty object" if there is no active PDO connection.
#Return: Returns an "empty object" if no value is specified in the $table variable
#Return: Returns the current class if everything is fine



/* Example */

$database = new Database;

$database->update( "members" , [ "status" => "confirmed" ] );
$database->update( "members" , [ "status" => "confirmed" ] , [ "status = pending" , "status = 0" ] , "AND" , 3 );

```

#

### Select Columns

> The "select" method selects columns from the table specified in the database.

```php

/* Syntax */ 

Database::select( string $table , array $column , array $condition , string $operator , integer $limit ) : object ;



/* Parameters */

#table:		A valid table name.
#column:	The array containing the name of the columns to be selected.
#condition:	Array with one or more conditions for select.[Optional]
#operator:	AND-OR operators for multiple conditions.[Optional]
#limit:		Number of data to be select.[Optional]



/* Return */

#Return: Returns "empty object" if there is no active PDO connection.
#Return: Returns an "empty object" if no value is specified in the $table variable
#Return: Returns the current class if everything is fine



/* Example */

$database = new Database;

$database->select( "members" , [ "username" , "email" ] );
$database->select( "members" , [ "username" , "email" ] , [ "uid > 1" , "uid < 5" ] , "AND" , 3 );

```

#

### Run a Query

> The "query" method is used to run a query in the database

```php

/* Syntax */

Database::query( string $query , bool $default ) : object ;



/* Parameters */

#query:		Query to run.
#default:	If "True" is specified, this method returns the default pdo methods, 
#		 if "False" is specified, it returns the methods in the current class.



/* Return */

#Return: Returns "empty object" if there is no active PDO connection.
#Return: Returns an "empty object" if no value is specified in the $table variable.
#Return: Returns an object based on the $default parameter.



/* Example */

$database = new Database;

$database->query( "SELECT * FROM members" , True )->fetchAll();/* Pdo methods */
$database->query( "SELECT * FROM members" , False )->result();

```

#

### Getting Results

> The "result" method is used to get the query result running.

```php

/* Syntax */

Database::result( &$result , string $fetchMode = NULL , $object = NULL , array $parameters = NULL ) : mixed ;



/* Parameters */

#result:	Reference parameter, Values ​​affected by query result are assigned to this variable.
#fetchMode:	Fetch type to be used.The values ​​it takes should be as follows.[Optional]
#				
#		"object"	= Represents the constant PDO::FETCH_OBJ
#		"assoc"		= Represents the constant PDO::FETCH_ASSOC
#		"both"		= Represents the constant PDO::FETCH_BOTH
#		"num"		= Represents the constant PDO::FETCH_NUM
#		"class"		= Represents the constant PDO::FETCH_CLASS
#		"into"		= Represents the constant PDO::FETCH_INTO
#
#object:	If the $fetchmode parameter is defined as "class", a string must be specified in a class name, 
#		if it is defined as "object", an object must be specified. 
#		This parameter is mandatory if $fetchmode "Class" and "object" are defined.[Optional]
#parameters:	Parameters for "class" or "object".
#		This parameter is mandatory if $ fetchmode "Class" and "object" are defined.[Optional]




/* Return */

#Return: Returns "False" if there is no active PDO connection.
#Return: If the "$this->query" property is not an object, 
#	that is if the current query fails, this method returns "False".
#Return: Returns "False" if $this->query is not a PDOStatement instance.
#Return: Otherwise Returns "True".



/* Example */

$database = new Database;

$database->select( "members" , [ "username" , "email" ] )->result( $result , "assoc" );

```

#

### Get the number of rows affected

> The "affected" method returns the number of rows affected by the query.

```php

/* Syntax */

Database::affected( void ) : integer ;


/* Return */

#Return: Returns "-1" if there is no active PDO connection.
#Return: Returns "-1" if the "$this->query" property is not an object, that is if the current query fails.
#Return: Returns "-1" if $this->query is not a PDOStatement instance.
#Return: Otherwise it returns the number of rows affected by the query.



/* Example */

$database = new Database;

$database->select( "members" , [ "username" , "email" ] )->affected();

```

#

### 1.0 Start transaction on database

> The "beginTransaction" method starts a transaction on the database.

```php

/* Syntax */

Database::beginTransaction( void ) : bool ;



/* Return */

#Return: Returns "False" if there is no active PDO connection.
#Return: Returns "False" if Transaction cannot be started.
#Return: Returns "True" if Transaction is started.



/* Example */

$database = new Database;

$database->beginTransaction();

```

#

### 1.1 Commit transaction

> The "commitTransaction" method performs a commit in the database.

```php

/* Syntax */

Database::commitTransaction( void ) : bool ;



/* Return */

#Return: Returns "False" if there is no active PDO connection.
#Return: Returns "False" if commit failed.
#Return: Returns "False" if commit was successful.



/* Example */

$database = new Database;

$database->beginTransaction();

if ( true ) {
	
	$database->commitTransaction();

}

```

#

### 1.2 Checks if inside a transaction

> The "inTransaction" method checks if inside a transaction.

```php

/* Syntax */

Database::inTransaction( void ) : bool ;



/* Return */

#Return: Returns "False" if there is no active PDO connection.
#Return: Returns "False" if this method is used outside a transaction.
#Return: Returns "True" if this method is used in a transaction.



/* Example */

$database = new Database;

$database->beginTransaction();

echo $database->inTransaction(); #True

```

#

### 1.3 Rollback a failed transaction

> The "endTransaction" method rollback a failed transaction.

```php

/* Syntax */

Database::endTransaction( void ) : bool ;



/* Return */

#Return: Returns "False" if there is no active PDO connection.
#Return: Returns "False" if rollback fails.
#Return: Returns "True" if rollback is successful.



/* Example */

$database = new Database;

$database->beginTransaction();

if ( true ) {
	
	$database->commitTransaction();

}else{

	$database->endTransaction();

}

```

#

### Get the ID of the last added data

> The "lastid" method returns the line id of the last line added to the database.

```php

/* Syntax */

Database::lastid( void ) : string ;



/* Return */

#Return: Returns "empty string" if there is no active PDO connection.
#Return: Returns the id of the last line added to the database.



/* Example */

$database = new Database;

$database->insert( "members" , [ "username" => "John" , "email" => "doe@example.net" ] );
$database->insert( "members" , [ "username" => "doe" , "email" => "john@example.net" ] );

echo $database->lastid();

```

#

### Get the number of column affected

> The "column" method returns the number of column affected by the query

```php

/* Syntax */

Database::column( void ) : int ;



/* Return */

#Return: Returns "-1" if there is no active PDO connection.
#Return: Returns "-1" if the "$this->query" property is not an object, that is if the current query fails.
#Return: Returns "-1" if $this->query is not a PDOStatement instance.
#Return: Otherwise it returns the number of column affected by the query.



/* Example */

$database = new Database;

$database->select( "members" , [ "*" ] );

echo $database->column();

```

#

### Getting errors

> The "getError" method assigns errors to variables defined as reference.

```php

/* Syntax */

Database::getError( &$info , &$code , &$state = NULL ) : mixed ;



/* Parameters */

#info:	Driver-specific error message.
#code:	Driver-specific error code.
#state:	SQLSTATE error code (a five characters alphanumeric identifier defined in the ANSI SQL standard).



/* Return */

#Return: Returns "False" if there is no active PDO connection.
#Return: Returns "False" if the "$this->query" property is not an object, that is if the current query fails.
#Return: Returns "False" if $this->query is not a PDOStatement instance.
#Return: Returns "True" if $this->query is a PDOStatement instance.



/* Example */

$database = new Database;

$database->getError( $info , $code );

echo "[ ".$code." ] : ".$info;

```

#

### Using default pdo methods

> The "default" method is used to access the default pdo object

```php

/* Syntax */

Database::default( void ) : object ;


/* Return */

#Return: Returns "stdClass" if there is no active PDO connection.
#Return: Returns the default pdo object.



/* Example */

$database = new Database;

$database->default()->query( "SELECT * FROM `members`" );

```

#

## FOR DEVELOPERS

### Getting the data type

> The "getType" method is used to define the type of data added when adding data to the database.

```php

/* Syntax */

Database::getType( mixed $check ) : mixed ;



/* Parameters */

#check: Attribute pdo constant to set



/* Return */

#Return: Returns "False" if there is no active PDO connection.
#Return: Returns "False" if an check type is not specified or left blank.
#Return: Returns a constant of pdo for the specified value if there is no error.



/* Example */

$this->getType( "It's a string value" ); #Return: PDO::PARAM_STR

```

#

## Start a pdo connection

> The "connect" method if everything is processed successfully, it starts a pdo connection.

```php

/* Syntax */

Database::connect( void ) : bool ;



/* Return */

#Return: Returns "False" if "catch" catches an error.
#Return: Returns "True" if everything is ok.



/* Example: */

$this->connect(); # If there is no error, the connection starts

```

#

## Escape column names

> The "escape" method returns escaped column names for "PDO::bindValue".

```php

/* Syntax */

Database::escape( array $columns ) : array ;



/* Parameters */

#column: Column names to be escaped for "PDO::bindValue".



/* Return */

#Return: Returns "empty array" if there is no active PDO connection.
#Return: Returns an "empty array" if no column name is specified.
#Return: If everything is in order, an escaped array returns ":column => value".



/* Example */

$this->escape( [ "column_1" , "column_2" , "column_3" ] );

#Return: [ ":column_1" , ":column_2" , ":column_3" ]

```

#

## Change fetch type instantly

> The "instantFetch" method only changes the "fetch" mode for the current query.

```php

/* Syntax */

Database::instantFetch( string $fetchMode , $object = NULL , array $parameters = NULL ) : bool ;



/* Parameters */

#fetchMode:	Fetch type to be used.The values ​​it takes should be as follows
#
#		"object"	= Represents the constant PDO::FETCH_OBJ
#		"assoc"		= Represents the constant PDO::FETCH_ASSOC
#		"both"		= Represents the constant PDO::FETCH_BOTH
#		"num"		= Represents the constant PDO::FETCH_NUM
#		"class"		= Represents the constant PDO::FETCH_CLASS
#		"into"		= Represents the constant PDO::FETCH_INTO
#
#object:	If the $fetchmode parameter is defined as "class", 
#		a string must be specified in a class name, if it is defined as "object", 
#		an object must be specified. 
#		This parameter is mandatory if $fetchmode "class" and "object" are defined.
#
#parameters:	Parameters for "class" or "object".
#		This parameter is mandatory if $fetchmode "class" and "object" are defined.



/* Return */

#Return: Returns an "False" if no value is specified in the $table variable
#Return: If $fetchmode is defined as "class", $object returns "False" if it is not a string value.
#Return: If $fetchmode is defined as "object", $object returns "False" if it is not a object value.
#Return: Returns "False" if an invalid fetch mode is specified.



/* Example */

# Its use in "result" method is shown



/* Note */

# This method was created for the "result" method that belongs to this class

```
