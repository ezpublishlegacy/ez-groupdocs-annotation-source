<?php
/**
 * File containing the ezjscoreDemoServerCallFunctions class.
 *
 * @package ezjscore_demo
 * @version //autogentag//
 * @copyright Copyright (C) 2005-2009 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 */
 include_once( 'extension/ezjscore/classes/ezjscserverfunctions.php' );
 include_once( 'lib/ezutils/classes/ezhttptool.php' );
 include_once( 'kernel/classes/ezpersistentobject.php' );
class GroupdocsannotationServerCallFunctions extends ezjscServerFunctions
{


    public static function search( $args )
    {
        if ( isset( $args[0] ) )
        {
            return 'Wrong access ;)';
        }
        else
        {
            $http = eZHTTPTool::instance();
            if ( $http->hasPostVariable( 'arg1' ) )
            {
                return 'Hello World, you sent 
                        me post : ' . $http->postVariable( 'arg1' );
            }
        }
 
	$db = eZDB::instance();
	$dataArray = '';
	// prepear js array
	$dataArray.= '{';

	$query = 'SELECT * FROM gda'; 
	$rows = $db -> arrayQuery( $query );

	$count = sizeof($rows);
	$c = 1;
	if($rows) foreach($rows as $row){
		if($row['awidth']==='0') 
			$row['awidth'] = '100%'; 
		else 
			$row['awidth'] = $row['awidth'].'px';
		if($row['aheight']==='0') 
			$row['aheight'] = '300px';
		else
			$row['aheight'] = $row['aheight'].'px';
		// forming js array
		$dataArray.= '"'.$row['afile_hook'].'":["'.$row['afile_id'].'","'.$row['awidth'].'","'.$row['aheight'].'"]';
		if($count>$c) $dataArray.= ',';  
	    $c++;
	}
	$dataArray.= '}';
        return ($count)?$dataArray:'';
    }
}
?>