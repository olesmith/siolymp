<?php

class Certificates_Read extends MyCertificates
{
    //*
    //* function Certificate_Inscription_Level_Info_Datas, Parameter list: $cert
    //*
    //* Genetates inscription $cert level info latex table.
    //*

    function Certificate_Inscription_Level_Info_Datas($cert)
    {
        $where=
            $this->UnitEventWhere
            (
                array
                (
                    "Friend" => $cert[ "Inscription_Hash" ][ "Friend" ],
                )
            );

        $table=array();
        foreach ($this->LevelsObj()->ReadCurrentLevels() as $lid => $level)
        {        
            $where[ "Level" ]=$level;
            $ninscribed=$this->ParticipantsObj()->Sql_Select_NHashes($where);
                
            $where[ "Presence" ]=2;
            $npresent=$this->ParticipantsObj()->Sql_Select_NHashes($where);

            if ($ninscribed>0)
            {
                $row=
                    array
                    (
                        $this->B($level[ "Name" ]),
                        $level[ "Title" ],
                        $ninscribed,
                        $npresent
                    );

                array_push($table,$row);
            }

        }

        $latex="";
        if (count($table)>0)
        {
            $latex=
                $this->Center
                (
                    $this->Latex_Table
                    (
                        array(array("","Nivel","Inscritos","Presentes")),
                        $table
                    )
                );                    
        }

        return $latex;
    }

    
    //*
    //* function Certificate_Inscription_Honouration_Info_Datas, Parameter list: $cert
    //*
    //* Genetates inscription $cert level info latex table.
    //*

    function Certificate_Inscription_Honouration_Info_Datas($cert)
    {
        $where=
            $this->UnitEventWhere
            (
                array
                (
                    "Friend" => $cert[ "Inscription_Hash" ][ "Friend" ],
                    "__Honouration" => "Honouration>'1'",
                )
            );

        $table=array();

        $parts=$this->ParticipantsObj()->Sql_Select_Hashes($where);
        $parts=$this->MyHash_HashesList_2IDs($parts,"Level");
        foreach ($this->LevelsObj()->ReadCurrentLevels()  as $lid => $level)
        {        
            if (!empty($parts[ $level[ "ID" ] ]))
            {
                $lparts=$parts[ $level[ "ID" ] ];
                $lparts=$this->MyHash_HashesList_2IDs($lparts,"Honouration");
                
                $honours=array_keys($lparts);
                sort($honours);
                $honours=array_reverse($honours);
                foreach ($honours as $honour)
                {
                    $hparts=$lparts[ $honour ];
                    foreach ($hparts as $part)
                    {
                        $part=$this->ParticipantsObj()->ApplyAllEnums($part);
                    
                        $row=
                            array
                            (
                                $this->B($level[ "Name" ]),
                                $level[ "Title" ],
                                $part[ "Name" ],
                                $part[ "Honouration" ]
                            );

                        array_push($table,$row);
                    }
                }
            }

        }

        $latex="";
        if (count($table)>0)
        {
            $latex=
                "\\Large{Menções dos Alunos Participantes:}\n\n".
                $this->Center
                (
                    $this->Latex_Table
                    (
                        array(array("","Nivel","Nome","")),
                        $table
                    )
                );                    
        }

        return $latex;
     }
    
    //*
    //* function Certificate_Read_Datas, Parameter list: &$cert
    //*
    //* Reads certificate sub data.
    //*

    function Certificate_Read_Datas(&$cert)
    {
        parent::Certificate_Read_Datas($cert);

        if (!empty($cert[ "Participant_Hash" ]))
        {
            $cert[ "City" ]=$cert[ "Participant_Hash" ][ "City" ];
        
            $this->Certificate_Read_Data($cert,"City","CitiesObj");
            $cert[ "Honouration" ]=
                $this->ParticipantsObj()->MyMod_Data_Fields_Show("Honouration",$cert[ "Participant_Hash" ]);
                
            $cert[ "Level" ]=$cert[ "Participant_Hash" ][ "Level" ];
            $this->Certificate_Read_Data($cert,"Level","LevelsObj");
        }
        elseif (!empty($cert[ "Inscription_Hash" ]))
        {
            $cert[ "Level_Info" ]=$this->Certificate_Inscription_Level_Info_Datas($cert);
            $cert[ "Honouration_Info" ]=$this->Certificate_Inscription_Honouration_Info_Datas($cert);
        }
    }
}

?>