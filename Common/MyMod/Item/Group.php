<?php

include_once("Group/Data.php");
include_once("Group/CGI.php");
include_once("Group/Tables.php");
include_once("Group/Update.php");
include_once("Group/Form.php");

trait MyMod_Item_Group
{
    var $SGroups_NumberItems=FALSE;
    
    use
        MyMod_Item_Group_Data,
        MyMod_Item_Group_CGI,
        MyMod_Item_Group_Tables,
        MyMod_Item_Group_Update,
        MyMod_Item_Group_Form;

    
    //*
    //* Returns loaded ItemDataSGroups. 
    //*

    function MyMod_Item_SGroups($edit,$groupsperrow=3)
    {
        $profile=$this->Profile();
        
        
        $sgroups=array();
        foreach (array_keys($this->ItemDataSGroups) as $group)
        {
            if (
                  !empty($this->ItemDataSGroups[ $group ][ $profile ])
                  &&
                  count($this->ItemDataSGroups[ $group ][ "Data" ])>0
               )
            {
                array_push($sgroups,$group);
            }
        }
        
        $groups=array();
        foreach ($this->PageArray($sgroups,$groupsperrow) as $row => $rgroups)
        {
            $groups[ $row ]=array();

            foreach ($rgroups as $group)
            {
                $redit=$edit;
                if ($this->MyMod_Item_Group_Allowed($this->ItemDataSGroups[ $group ]))
                {
                    if ($edit==1) { $redit=$this->ItemDataSGroups[ $group ][ $profile ]-1; }
            
                    $groups[ $row ][ $group ]=$redit;
                }
            }
        }

        return $groups;
    }
    
    //*
    //* Chekcs access to data group.
    //*

    function MyMod_Item_Group_Allowed($groupdef,$item=array())
    {
        $res=FALSE;
        if (!empty($groupdef[ $this->LoginType() ]))
        {
            $res=TRUE;
        }
        elseif (!empty($groupdef[ $this->Profile() ]))
        {
            $res=TRUE;
        }

        if ($res && count($item)>0)
        {
            if (!empty($groupdef[ "AccessMethod" ]))
            {
                $accessmethods=$groupdef[ "AccessMethod" ];
                if (!is_array($accessmethods)) { $accessmethods=array($accessmethods); }

                foreach ($accessmethods as $accessmethod)
                {
                   if (method_exists($this,$accessmethod))
                    {
                        if (!$this->$accessmethod($item)) { return FALSE; }
                    }
                    else
                    {
                        $this->Debug=1;
                        $this->AddMsg("Warning: Invalid group def access method: ".
                                      $accessmethod.", ignored");
                    }
                }
            }
        }

        return $res;
    }
    

    //*
    //* Detects if we should edit at least one in $groupdefs.
    //*

    function MyMod_Item_Group_Edit_Should($groupdefs)
    {
        foreach ($groupdefs as $groupdef)
        {
            foreach ($groupdef as $group => $edit)
            {
                if ($edit) { return TRUE; }
            }
        }

        return FALSE;
    }
    
    
    //*
    //* Detects editable groups from $groupdefs.
    //*

    function MyMod_Item_Group_Defs2Groups($groupdefs)
    {
        $groups=array();
        foreach ($groupdefs as $groupdef)
        {
            foreach ($groupdef as $group => $edit)
            {
                if ($edit)
                {
                    array_push($groups,$group);
                }
            }
        }

        return $groups;
    }
}

?>