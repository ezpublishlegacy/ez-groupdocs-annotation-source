<h3>Enter GroupDocs File ID</h3>
<div style="padding:10px;border:3px double gray;awidth:675px;">
	<form method="post" action={'groupdocsannotation/config'|ezurl}>
	<table><tr>
		<td><span style="color:blue">File ID:</span> </td>
			<td colspan="2"><input type="text" name="afile_id" size="80" value=""></td>
		</tr>
		<tr>
			<td><span style="color:blue">Width:</span> </td>
			<td><input type="text" name="awidth" size="10" value=""></td>
			<td>=> (if empty by default = 100% to sute website layout)</td>
		</tr>
		<tr>
			<td><span style="color:blue">Height:</span> </td>
			<td><input type="text" name="aheight" size="10" value=""></td>
			<td>=> (if empty by default = 300px )</td>
		</tr>
		<tr>
			<td colspan="3"><input type="submit" value="Save" style="color:green"></td>
	</tr></table>
	</form>
</div>
<hr>
To <u>display</u> GroupDocs file on your website, just copy the <span style="color:red;font-weight:bold;">"Hook"</span>, paste it to any page and save it.
<hr>
<h3>GroupDocs Files</h3>
<table border=1><tr>
<th style="padding:5px;color:red">
Hook to Copy
</th>
<th style="padding:5px;color:blue">
File IDs
</th>
<th style="padding:5px;color:blue">
Width
</th>
<th style="padding:5px;color:blue">
Height
</th>
<th style="awidth:60px">
Actions
</th>
{*List: {fetch( 'groupdocsannotation', 'list', hash( 'as_object', true() ) )|attribute( 'show' )} - to use this just need to add functions in config.php*}
{if is_set($data_array)} 
    
    {foreach $data_array as $index => $item} 
        </tr><tr><td style="padding:5px;">{$item[1]} </td><td style="padding:5px;"> {$item[0]}</td>
		<td style="padding:5px;">{$item[2]}</td><td style="padding:5px;">{$item[3]}</td>
		<td>
		<div style="float:left"><input style="awidth:30px;color:red;" type="button" value="Del" onclick="Adel({$index})"></div>
		<div style="float:left"><input style="awidth:30px;color:green;" type="button" value="Vew" onclick="Avew('{$item[0]}')"></div>
		</td>
    {/foreach} 
     
{else} 
    <p>Attention: no existing data!!</p> 
{/if}
</tr></table>

{literal}
<script language="JavaScript" type="text/javascript">
<!--
     function Adel(id){
        var r=confirm("Do you want to delete this file ?");
		if (r==true)
			location.href = 'config?del_id='+id;
    }

	function Avew(afileid){
        cmsName = 'ezPublish-Annotation'
        cmsVersion = '1.0'
		myWindow=window.open('','','width=500,height=300')
		myWindow.document.write('<iframe src="http://apps.groupdocs.com/document-annotation/embed/'+afileid+'?&referer='+cmsName+'/'+cmsVersion+'" frameborder="0" width="100%" height="100%">If you can see this text, your browser does not support iframes. Please enable iframe support in your browser or use the latest version of any popular web browser such as Mozilla Firefox or Google Chrome. For more help, please check our documentation Wiki: http://groupdocs.com/docs/display/annotation/GroupDocs+Annotation+Integration+with+3rd+Party+Platforms</iframe>')
	}
-->
</script>
{/literal}