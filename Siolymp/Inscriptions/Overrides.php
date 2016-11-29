<?php

class InscriptionsOverrides extends InscriptionsAccess
{
    //*
    //* function InscriptionFriendTableData, Parameter list: 
    //*
    //* Creates Inscription edit html table.
    //*

    function InscriptionFriendTableData()
    {
        return
            array
            (
               "Name","School","INEP","Email","Cell",
               "Friend_Data_Edit_Link"
            );
    }    
}

?>