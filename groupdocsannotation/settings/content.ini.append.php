<?php /* #?ini charset="utf-8"?
# eZ publish configuration file for content

[literal]
AvailableClasses[]
AvailableClasses[]=html

[CustomTagSettings]
AvailableCustomTags[]=separator
AvailableCustomTags[]=children_menu
AvailableCustomTags[]=video
AvailableCustomTags[]=factbox

AvailableCustomTags[]=gdannotation
IsInline[gdannotation]=true

[gdannotation]
CustomAttributes[]
CustomAttributes[]=File ID

[ContentOverrideSettings]
EnableClassGroupOverride=true 

[folder]
SummaryInFullView=enabled

[article]
SummaryInFullView=enabled
ImageInFullView=enabled

[children_menu]
CustomAttributes[]=align
CustomAttributes[]=limit
CustomAttributes[]=like
CustomAttributesDefaults[align]=right
CustomAttributesDefaults[limit]=5
CustomAttributesDefaults[like]=left_menu
#menu modes: 'left_menu' | 'top_menu' | 'children' or ''

[video]
CustomAttributes[]=awidth
CustomAttributes[]=aheight
CustomAttributes[]=source
CustomAttributes[]=allow_full_screen
CustomAttributes[]=allow_script_access

[ChildrenNodeList]
ExcludedClasses[]=folder
ExcludedClasses[]=link

*/ ?>