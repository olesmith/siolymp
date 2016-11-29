<?php


class FriendsClean extends MyFriends
{
    //*
    //* function HandleClean, Parameter list: 
    //*
    //* Handles cleaning of friends. That is, $friends that are:
    //*
    //* Volatile ($friend[ "Volatile" ]==2),
    //* add created more than, say, one hour ago.
    //*

    function HandleClean()
    {
        $this->SearchVars=array();
        $this->ItemData[ "CTime" ][ "Search" ]=1;

        $group=$this->GetActualDataGroup();

        array_push($this->ItemDataGroups[ $group ][ "Data" ],"CleanCell");
        $this->MyMod_Handle_Search("",TRUE,1,$group,array(),"","","Remover","Resetar");
    }

    //*
    //* function CleanCell, Parameter list: 
    //*
    //* Produces Clean cell checkbox.
    //*

    function CleanCell($friend=NULL,$edit=0)
    {
        if (empty($friend)) { return "Remover"; }

        $cgikey="Remove_".$friend[ "ID" ];

        $nassess=0;
        foreach ($this->Sql_Table_Names("^".$this->Unit("ID")."__\d+_Inscriptions") as $sqltable)
        {
            $nassess+=$this->Sql_Select_NHashes
            (
                array("Friend" => $friend[ "ID" ]),
                $sqltable
            );
        }

        $maydelete=FALSE;
        if ($nassess==0)
        {
            $maydelete=TRUE;
            $pdatas=array("Profile_Admin","Profile_Coordinator");
            $privs=$this->Sql_Select_Hash
            (
                array("ID" => $friend[ "ID" ]),
                $pdatas
            );

            foreach ($pdatas as $pdata)
            {
                if ($privs[ $pdata ]==2) { $maydelete=FALSE; }
            }
        }

        if ($maydelete)
        {
            if ($this->CGI_POSTint("Update")==1 && $this->CGI_POSTint($cgikey)==1)
            {
                $this->Sql_Delete_Item($friend[ "ID" ],"ID");

                return "Removido";
            }
            else
            {
                return $this->MakeCheckBox($cgikey,1,TRUE);
            }
        }
        elseif ($nassess>0)
        {
            return $nassess;
        }
        else
        {
            return "Privileged";
        }
    }
}

?>