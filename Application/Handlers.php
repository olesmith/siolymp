<?php



class Handlers extends ApplicationLogs
{
    var $DefaultAction="Start";

    //*
    //* function HandleStart, Parameter list:
    //*
    //* The Start Handler. Should display some basic info.
    //*

    function HandleStart()
    {
        $this->MyApp_Handle_Start();
    }

    //*
    //* Presents change password form and exits.
    //*

    function HandleNewPassword()
    {
        $this->ChangePasswordForm();
        exit();
    }

    //*
    //* Handles the edit personal data form.
    //*

    function HandleMyData()
    {
        $this->ModuleName=$this->AuthHash[ "Module" ];

        $this->MyApp_Interface_Head();

        $this->UsersObj()->HandleMyData();
        exit();
    }



}

?>