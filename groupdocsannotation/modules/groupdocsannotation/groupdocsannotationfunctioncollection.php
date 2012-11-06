<?php
 include_once( 'extension/groupdocsannotation/classes/groupdocsannotation.php' );
/*
class GroupdocsAnnotationFunctionCollection
{

function GroupdocsAnnotationFunctionCollection()
{
}

function &fetchList( $offset, $limit )
{
$parameters = array( 'offset' => $offset,
'limit' => $limit );
$lista =& Groupdocsannotation( $parameters );

return array( 'result' => &$lista );
}

}
*/
class GroupdocsAnnotationFunctionCollection
{ 
    public function __construct() 
    {
        // ...
    }
 
    /*
     * Is opened by('modul1', 'list', hash('as_object', $bool ) ) fetch
     * @param bool $asObject
     */ 
    public static function fetchList( $asObject ) 
    { 
        return array( 'result' => GroupDocsAnnotation::fetchList( $asObject ) ); 
    }
 
    /*
     * Is opened by('modul1', 'count', hash() ) fetch
     */
    public static function fetchJacExtensionDataListCount()
    { 
        return array( 'result' => GroupDocsAnnotation::getListCount() ); 
    } 
} 
?>