<?php

include_once("File/Update.php");
include_once("File/Decorator.php");
include_once("File/Extensions.php");

//Should be obsolete
include_once("File/Correct.php");

trait MyMod_Data_Fields_File
{
    use
        MyMod_Data_Fields_File_Update,
        MyMod_Data_Fields_File_Decorator,
        MyMod_Data_Fields_File_Extensions,
        MyMod_Data_Fields_File_Correct;
    
    //*
    //* function MyMod_Data_Fields_File_Contents_Save, Parameter list: &$item,$file,$filefield
    //*
    //* Saves properly formatted version of file contents.
    //*

    function MyMod_Data_Fields_File_Contents_Save(&$item,$file,$filefield)
    {
        $this->Sql_Update_Item_Value_Set
        (
            $item[ "ID" ],
            $filefield."_Contents",
            $this->MyMod_Data_Fields_File_Contents_2DB($file),
            "ID"
        );

        $rfilefield=$filefield."_Time";
        $item[ $rfilefield ]=time();
        $this->Sql_Update_Item_Value_Set
        (
            $item[ "ID" ],
            $rfilefield,
            $item[ $rfilefield ],
            "ID"
        );

        $rfilefield=$filefield."_Size";
        $item[ $rfilefield ]=filesize($file);
        $this->MySqlSetItemValue
        (
            $item[ "ID" ],
            $rfilefield,
            $item[ $rfilefield ],
            "ID"
        );
    }

    //*
    //* function MyMod_Data_Fields_File_Contents_2DB, Parameter list: &$item,$file,$filefield
    //*
    //* Returns properly formatted version of file contents.
    //*

    //*
    //* function FileContents2DB, Parameter list: $file
    //*
    //* Returns properly formatted file contents ready to store in DB.
    //*

    function MyMod_Data_Fields_File_Contents_2DB($file)
    {
        $fp      = fopen($file, 'r');
        $content = fread($fp, filesize($file));
        fclose($fp);

        if (empty($content)) { return $content; }
      
        return 
            strtr
            (
                base64_encode
                (
                    addslashes
                    (
                        gzcompress( serialize($content) , 9)
                    )
                ),
                '+/=',
                '-_,'
            );
    }
    
    //*
    //* function DB2FileContents, Parameter list: $content
    //*
    //* Reverses db file content encodings.
    //*

    function MyMod_Data_Fields_File_DB_2Contents($content)
    {
        if (empty($content)) { return $content; }
      
        return unserialize
            (
                gzuncompress
                (
                    stripslashes
                    (
                        base64_decode
                        (
                            strtr($content,'-_,', '+/=')
                        )
                    )
                )
            );
    }

}

?>