<?php
/*
CREATE TABLE gda ( 
    id INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY , 
    afile_id VARCHAR( 250 ) NOT NULL,  
    afile_hook VARCHAR( 250 ) NOT NULL 
) ENGINE = MYISAM ;
*/
include_once( 'kernel/classes/ezpersistentobject.php' );
class GroupDocsAnnotation extends eZPersistentObject
{ 
    /** 
     * Constructor 
     *
     * @param array $row Hash of attributes for new GroupDocsAnnotation object
     */ 
    public function __construct( array $row )
    { 
        parent::eZPersistentObject( $row ); 
    }
 
    /*
     * Definition of the data object structure /of the structure of the database table 
     *
     * @return array Hash with table definition for this persistent object
     */ 
    public static function definition()
    { 
        return array( 'fields' => array( 'id' => array( 'name' => 'ID', 
                                                        'datatype' => 'integer', 
                                                        'default' => 0, 
                                                        'required' => true ),
 
                                        'afile_id' => array( 'name' => 'aFileID', 
                                                            'datatype' => 'string', 
                                                            'default' => '', 
                                                            'required' => true ),
 
                                        'afile_hook' => array( 'name' => 'aFileHook', 
                                                            'datatype' => 'string', 
                                                            'default' => '', 
                                                            'required' => true ),

                                        'awidth' => array( 'name' => 'Width', 
                                                            'datatype' => 'int', 
                                                            'default' => '', 
                                                            'required' => true ),

                                        'aheight' => array( 'name' => 'Height', 
                                                            'datatype' => 'int', 
                                                            'default' => '', 
                                                            'required' => true ),
                                        ), 
                      'keys'=> array( 'id' ), 
                      'function_attributes' => array( 'afile_id_object' => 'getaFileIdObject' ), // accessing to attribute "user_object" will trigger getUserObject() method
                      'increment_key' => 'id', 
                      'class_name' => 'GroupDocsAnnotation', 
                      'name' => 'gda'
                      ); 
    }
 
    /** 
     * Help function will open in attribute function 
     * @param bool $asObject
     */ 
    public function getaFileIdObject( $asObject = true )
    { 
        $afile_id = $this->attribute('afile_id');

        //$afile_id_Ob = eZUser::fetch($afile_id, $asObject); 
        //return $afile_id_Ob; 
		print 'Function getaFileIdObject() not in use :)';
    }
 
    /**
     * Creates a new object of type GroupDocsAnnotation and shows it
     * @param int $user_id
     * @param string $value
     * @return GroupDocsAnnotation
     */
    public static function create( $afile_id, $afile_hook, $awidth, $aheight )
    { 
        $row = array( 'id'      => null, 
                      'afile_id' => $afile_id, 
                      'afile_hook'   => $afile_hook, 
					  'awidth'   => $awidth, 
					  'aheight'   => $aheight, 
                      ); 
        return new self( $row ); 
    }
 
    /**
     * Shows the data as GroupDocsAnnotation with given id
     * @param int $id of File ID
     * @param bool $asObject
     * @return GroupDocsAnnotation
     */ 
    public static function fetchByID( $id , $asObject = true)
    { 
        $result = eZPersistentObject::fetchObject( 
                                                    self::definition(), 
                                                    null, 
                                                    array( 'id' => $id ), 
                                                    $asObject, 
                                                    null, 
                                                    null ); 
 
        if ( $result instanceof GroupDocsAnnotation ) 
            return $result; 
        else 
            return false; 
    }
 
    /**
     * Shows all the objects GroupDocsAnnotation as object or array
     * @param int $asObject
     * @return array( GroupDocsAnnotation )
     */ 
    public static function fetchList( $asObject = true )
    { 
        $result = eZPersistentObject::fetchObjectList( 
                                                        self::definition(), 
                                                        null,null,null,null, 
                                                        $asObject, 
                                                        false,null ); 
        return $result; 
    }
 
    /**
     * Shows the amount of data
     * @return int 
     */ 
    public static function getListCount() 
    { 
        $db = eZDB::instance(); 
        $query = 'SELECT COUNT(id) AS count FROM gda'; 
        $rows = $db -> arrayQuery( $query ); 
        return $rows[0]['count'];
    } 

    public static function getMaxId() 
    { 
        $db = eZDB::instance(); 
        $query = 'SELECT MAX(id) AS mid FROM gda'; 
        $rows = $db -> arrayQuery( $query ); 
        return $rows[0]['mid'];
    } 
 
    // -- member variables-- 
    protected $ID;
    protected $aFileID; 
    protected $aFileHook; 
 
} 
?>