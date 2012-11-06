<?php
include_once( 'extension/groupdocsannotation/classes/groupdocsannotation.php' );

/** 
 * Operator: gad('list') and gad('count') <br> 
 * Count: {gad('count')} <br> 
 * Liste: {gad('list')|attribute(show)} 
 */ 
class GADOperator
{ 
    public $Operators;
 
    public function __construct( $name = 'gad' )
    { 
        $this->Operators = array( $name ); 
    }
 
    /** 
     * Returns the template operators.
     * @return array
     */ 
    function operatorList()
    { 
        return $this->Operators; 
    }
 
    /**
     * Returns true to tell the template engine that the parameter list 
     * exists per operator type. 
     */ 
    public function namedParameterPerOperator() 
    { 
        return true; 
    }
 
    /**
     * @see eZTemplateOperator::namedParameterList 
     **/ 
    public function namedParameterList() 
    { 
        return array( 'gad' => array( 'result_type' => array( 'type' => 'string',    
                                                              'required' => true, 
                                                              'default' => 'list' ))
                    ); 
    }
 
    /**
     * Depending of the parameters that have been transmitted, fetch objects JACExtensionData 
     * {gad('list)} or count data {gad('count')} 
     */ 
    public function modify( $tpl, $operatorName, $operatorParameters, $rootNamespace, $currentNamespace, &$operatorValue, $namedParameters )
    { 
        $result_type = $namedParameters['result_type']; 
        if( $result_type == 'list') 
            $operatorValue = GroupDocsAnnotation::fetchList(true); 
        else if( $result_type == 'count') 
            $operatorValue = GroupDocsAnnotation::getListCount(); 
    } 
} 
?>