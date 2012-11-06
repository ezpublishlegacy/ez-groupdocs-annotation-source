<?php
/**
* File containing the eZ Publish view implementation.
*
* @copyright Orest Loginsky
* @version 1.0
* @extention groupdocsannotation
*/
/*

*/
///////////////////////////////////////// FORM STARTED /////////////////////////////////////////
// take copy of global object 
$db = eZDB::instance(); 
$http = eZHTTPTool::instance (); 

		 // Create mysql table if not exist
		if(!isset($_SESSION['gdacreatetable']) || !$_SESSION['gdacreatetable']){
			$query = 'CREATE TABLE IF NOT EXISTS `gda` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `afile_id` varchar(250) NOT NULL,
						  `afile_hook` varchar(250) NOT NULL,
						  `awidth` int(5) NOT NULL,
						  `aheight` int(5) NOT NULL,
						  PRIMARY KEY (`id`)
						) ENGINE=MyISAM;'; 
			$db -> query( $query );
			$_SESSION['gdacreatetable'] = 1;
		}

include_once( 'extension/groupdocsannotation/classes/groupdocsannotation.php' );
$module = $Params['Module'];

// If the variable 'name' is sent by GET or POST, show variable 
$value = '';

// DELETE GroupDocs File ID 
if( $http->hasVariable('del_id') )  {
    $del_id = $http->variable ('del_id');
	$query = 'DELETE FROM gda WHERE id='.(int)$del_id; 
	$db -> arrayQuery( $query );
	return $module->redirectTo('/groupdocsannotation/config');
}

// SAVE GroupDocs File ID
if( $http->hasVariable('afile_id') )  {
    $afile_id = $http->variable ('afile_id');
    $awidth = (int)$http->variable ('awidth');
	$aheight = (int)$http->variable ('aheight');

if( $afile_id != '' ) 
{

		// assign hook_id
		$HookId = GroupDocsAnnotation::getMaxId();
		$hook = '#gdannotation'.($HookId+1).'#';// as no records show zero
		// generate new data object 
		$GDAObject = GroupDocsAnnotation::create( $afile_id, $hook, $awidth, $aheight);
		eZDebug::writeDebug( '1.'.print_r( $GDAObject, true ), 
							 'GDAObject before saving: ID not set' ) ;
	 
		// save object in database 
		$GDAObject->store();
		eZDebug::writeDebug( '2.'.print_r( $GDAObject, true ), 
							 'GDAObject after saving: ID set' ) ;
	 
		// ask for the ID of the new created object 
		$id = $GDAObject->attribute( 'id' );
	 
		// investigate the amount of data existing 
		$count = GroupDocsAnnotation::getListCount(); 
		$statusMessage = 'File ID: >>'. $afile_id .
                     '<< Hook:  >>'. $hook.
                     '<< In database with ID >>'. $id.
                     '<< saved!New ammount = '. $count ;

		return $module->redirectTo('/groupdocsannotation/config');
	}else 
		$statusMessage = 'Please insert data';
	 
	// initialize Templateobject 
	$tpl = eZTemplate::factory();

	$tpl->setVariable( 'status_message', $statusMessage ); 
	// Write variable $statusMessage in the file eZ Debug Output / Log 
	// here the 4 different types: Notice, Debug, Warning, Error 
	eZDebug::writeNotice( $statusMessage, 'groupdocsannotation:groupdocsannotation/config.php' ); 
	eZDebug::writeDebug( $statusMessage, 'groupdocsannotation:groupdocsannotation/config.php' ); 
	eZDebug::writeWarning( $statusMessage, 'groupdocsannotation:groupdocsannotation/config.php' ); 
	eZDebug::writeError( $statusMessage, 'groupdocsannotation:groupdocsannotation/config.php' );
}
/////////////////////////////////////////// form ended ////////////////////////////////////////////////
// Get list of file from DB
$dataArray = array();
$query = 'SELECT * FROM gda'; 
$rows = $db -> arrayQuery( $query );
if($rows) foreach($rows as $row){
	if($row['awidth']==='0') $row['awidth'] = '';
	if($row['aheight']==='0') $row['aheight'] = '';
	$dataArray[$row['id']] = array( $row['afile_id'], $row['afile_hook'], $row['awidth'], $row['aheight'] );
}
// initialize Templateobject
$tpl = eZTemplate::factory();
 
// create example Array in the template => {$data_array}
$tpl->setVariable( 'data_array', $dataArray );
/////////////////////////////////// inistialization ended ///////////////////////////////////////

//carry out internal processing here, none required in this case.
// setting up what to render to the user:
$Result = array();

//$t = $tpl->compileTemplateFile('design:groupdocsannotation/config.tpl');
$t = $tpl->fetch('design:groupdocsannotation/config.tpl');

$Result['content'] = $t; //main tpl file to display the output

$Result['left_menu'] = "design:groupdocsannotation/leftmenu.tpl"; 

$Result['path'] = array( array( 
	'url' => 'groupdocsannotation/config',
	'text' => 'Groupdocs Annotation' 
) ); //what to show in the Title bar for this URL


// read variable GdaDebug of INI block [GDAExtensionSettings] 
// of INI file jacextension.ini  

$groupdocsannotationINI = eZINI::instance( 'groupdocsannotation.ini' ); 
 
$gdaDebug = $groupdocsannotationINI->variable( 'GDAExtensionSetting','JacDebug' ); 
 
// If Debug is activated do something 
if( $gdaDebug === 'enabled' ) 
    echo 'groupdocsannotation.ini: [GDAExtensionSetting] GdaDebug=enabled';

?>