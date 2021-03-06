array
    (
       "Help" => array
       (
        "Href"     => "",
        "HrefArgs" => "",
        "Title"    => "Ajuda #ItemsName",
        "Title_UK" => "Help #ItemsName_UK",
        "Title_ES" => "Ayuda #ItemsName_ES",
        "Name"     => "Ajuda #ItemsName",
        "Name_UK"  => "Help #ItemsName_UK",
        "Name_ES"     => "Ayuda #ItemsName_ES",
        "ShortName"     => "Ajuda #ItemsName",
        "ShortName_UK"  => "Help #ItemsName_UK",
        "ShortName_ES"     => "Ayuda #ItemsName_ES",

        "Icon"     => "help_dark.png",
        "Public"   => 1,
        "Person"   => 1,
        "Admin"    => 1,

        "Handler"       => "MyMod_Handle_Help",
        "AccessMethod"  => "MyMod_Handle_Help_Has",

        "Singular"   => FALSE,
       ),
       "Search" => array
       (
        "Href"     => "",
        "HrefArgs" => "",
        "Title"    => "Pesquisar #ItemsName",
        "Title_UK" => "Search #ItemsName_UK",
        "Title_ES" => "Pesquisar #ItemsName_ES",
        "Name"     => "Pesquisar #ItemsName",
        "Name_UK"  => "Search #ItemsName_UK",
        "Name_ES"  => "Pesquisar #ItemsName_ES",
        "ShortName"     => "Pesquisar",
        "ShortName_UK"  => "Search",
        "ShortName_ES"  => "Pesquisar",

        "Icon"     => "show_dark.png",
        "Public"   => 1,
        "Person"   => 1,
        "Admin"   => 1,
        "Handler"   => "MyMod_Handle_Search",
        //"AltAction"   => "EditList",
        "Edits"   => 0,
        "Singular"   => FALSE,
       ),
       "Add" => array
       (
        "Href"     => "",
        "HrefArgs" => "",
        "Title"    => "Criar novo(a) #ItemName",
        "Title_UK" => "Create #ItemName_UK",
        "Title_ES" => "Criar nuevo(a) #ItemName_ES",
        "Name"     => "Adicionar #ItemName",
        "Name_UK"  => "Add #ItemName_UK",
        "Name_ES"  => "Adicionar #ItemName_ES",
        "ShortName"     => "Adicionar",
        "ShortName_UK"  => "Add",
        "ShortName_ES"     => "Adicionar",

        "PName"     => "#ItemName adicionado com êxito",
        "PName_UK"  => "#ItemName_UK successfully added",
        "PName_ES"  => "#ItemName_UK adicionado com exito",
        "Icon"     => "add_light.png",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 1,
        "Handler"   => "HandleAdd",
        "NoHeads"   => 1,
        "NoInterfaceMenu"   => 1,
        "Edits"   => 1,
        "Singular"   => FALSE,
       ),
       "ComposedAdd" => array
       (
        "Href"     => "",
        "HrefArgs" => "",
        "Title"    => "Criar novo(a) #ItemName",
        "Title_UK" => "Create #ItemName_UK",
        "Title_ES"    => "Criar nuevo(a) #ItemName_ES",
        "Name"     => "Adicionar #ItemsName",
        "Name_UK"  => "Add #ItemsName_UK",
        "Name_ES"     => "Adicionar #ItemsName_ES",
        "ShortName"     => "Adicionar #ItemsName",
        "ShortName_UK"  => "Add #ItemsName_UK",
        "ShortName_ES"     => "Adicionar #ItemsName_ES",
        "PName"     => "#ItemName adicionado com êxito",
        "PName_UK"  => "#ItemName_UK successfully added",
        "PName_ES"     => "#ItemName_ES adicionado con exito",
        "Icon"     => "add_light.png",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 1,
        "Handler"   => "HandleComposedAdd",
        "NoHeads"   => 1,
        "NoInterfaceMenu"   => 1,
        "Edits"   => 1,
        "Singular"   => FALSE,
       ),
       "Copy" => array
       (
        "Href"     => "",
        "HrefArgs" => "ID=#ID",
        "Title"    => "Copiar #ItemName #Name",
        "Title_UK" => "Copy #ItemName_UK #Name_UK",
        "Title_ES"    => "Copiar #ItemName_ES #Name",
        "Name"     => "Copiar #ItemName",
        "Name_UK"  => "Copy #ItemName_UK",
        "Name_ES"     => "Copiar #ItemName_ES",
        "PName"     => "#ItemName copiado com êxito",
        "PName_UK"  => "#ItemName_UK successfully copied",
        "PName_ES"     => "#ItemName_ES copiado con exito",
        "Icon"     => "copy_light.png",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 1,
        "Handler"   => "MyMod_Handle_Copy",
        "NoHeads"   => 1,
        "NoInterfaceMenu"   => 1,
        "Edits"   => 1,
        "Singular"   => TRUE,
       ),
       "Show" => array
       (
        "Href"     => "",
        "HrefArgs" => "ID=#ID",
        "Title"    => "Mostrar #ItemName",
        "Title_UK" => "Show #ItemName_UK",
        "Title_ES"    => "Mostrar #ItemName_ES",
        "Name_UK"  => "Show #ItemName_UK",
        "Name"     => "Mostrar #ItemName",
        "Name_ES"     => "Mostrar #ItemName_ES",
        "Icon"     => "show_light.png",
        "ShowIDCols"     => array(),
        "Public"   => 0,
        "Person"   => 1,
        "Admin"   => 1,
        "Handler"   => "HandleShow",
        //"Target"   => "_#Module",
        "Edits"   => 0,
        "Singular"   => TRUE,
        "AltAction"   => "Edit",
       ),
       "Edit" => array
       (
        "Href"     => "",
        "HrefArgs" => "ID=#ID",
        "Title"    => "Editar #ItemName",
        "Title_ES"    => "Editar #ItemName_ES",
        "Title_UK" => "Edit #ItemName_UK",
        "Name"     => "Editar #ItemName",
        "Name_UK"  => "Edit #ItemName_UK",
        "Name_ES"     => "Editar #ItemName_ES",
        "Icon"     => "edit_light.png",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 1,
        "AltAction"   => "Show",
        "Handler"   => "HandleEdit",
        //"Target"   => "_#Module",
        "Edits"   => 1,
        "Singular"   => TRUE,
       ),
       /* "ShowList" => array */
       /* ( */
       /*  "Href"     => "", */
       /*  "HrefArgs" => "", */
       /*  "Title"    => "Mostrar todo(a)s #ItemsName", */
       /*  "Title_UK" => "Show all #ItemsName_UK", */
       /*  "Title_ES"    => "Mostrar todo(a)s #ItemsName_ES", */
       /*  "Name"     => "Mostrar #ItemsName", */
       /*  "Name_UK"  => "Show #ItemsName_UK", */
       /*  "Name_ES"     => "Mostrar #ItemsName_ES", */
       /*  "Icon"     => "show_dark.png", */
       /*  "Public"   => 0, */
       /*  "Person"   => 1, */
       /*  "Admin"   => 1, */
       /*  "Handler"   => "MyMod_Handle_Search", */
       /*  "Edits"   => 0, */
       /*  "Singular"   => FALSE, */
       /* ), */
       "EditList" => array
       (
        "Href"     => "",
        "HrefArgs" => "",
        "Title"    => "Editar #ItemsName em Lista",
        "Title_UK" => "Edit #ItemsName_UK in List",
        "Title_ES"    => "Editar #ItemsName_ES en Lista",
        "Name"     => "Editar #ItemsName",
        "Name_UK"  => "Edit #ItemsName_UK",
        "Name_ES"     => "Editar #ItemsName_ES",
        "ShortName"     => "Editar em Lista",
        "ShortName_UK"  => "Edit in List",
        "ShortName_ES"     => "Editar em Lista",
        "Icon"     => "edit_dark.png",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 1,
        "Handler"   => "MyMod_Handle_Search",
        //"AltAction"   => "Search",
        "Edits"   => 1,
        "Edit"   => 1,
        "Singular"   => FALSE,
       ),
       "Delete" => array
       (
        "Href"     => "",
        "HrefArgs" => "ID=#ID",
        "Title"    => "Deletar #ItemName",
        "Title_UK" => "Delete #ItemName_UK",
        "Title_ES"    => "Deletar #ItemName_ES",
        "Name"     => "Deletar #ItemName",
        "Name_ES"     => "Deletar #ItemName_ES",
        "Name_UK"  => "Delete #ItemName_UK",
        "PName"     => "#ItemName deletado com êxito",
        "PName_ES"     => "#ItemName_ES deletado con exito",
        "PName_UK"  => "#ItemName_UK successfully deleted",
        "Icon"     => "delete_light.png",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 0,
        //"Target"   => "_delete",
        "Handler"   => "HandleDelete",
        "Edits"   => 1,
        "Singular"   => TRUE,
       ),
       "Latex" => array
       (
        "Href"     => "",
        "HrefArgs" => "Latex=1&ID=#ID",
        "Title"    => "Imprimir #ItemName",
        "Title_UK" => "Print #ItemName_U",
        "Title_ES" => "Imprimir #ItemName_ES",
        "Name"     => "Versão Imprimível",
        "Name_UK"  => "Printable Version",
        "Name_ES"  => "Versión Imprimíble",
        "Icon"     => "print_dark.png",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 0,
        "Admin"   => 0,
        "Handler"   => "HandleLatexItem",
        "NoHeads"   => 1,
        "NoInterfaceMenu"   => 1,
        "Edits"   => 0,
        "Singular"   => TRUE,
       ),
       "LatexList" => array
       (
        "Href"     => "",
        "HrefArgs" => "",
        "Title"    => "Imprimir",
        "Title_UK" => "Print",
        "Title_ES"    => "Imprimir",
        "Name"     => "Versão Imprimível",
        "Name_UK"  => "Printable Version",
        "Name_ES"     => "Versión Imprimíble",
        "Icon"     => "print_light.png",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 0,
        "Handler"   => "HandleLatexItems",
        "NoHeads"   => 1,
        "Edits"   => 0,
        "Singular"   => FALSE,
       ),
       "Print" => array
       (
        "Href"     => "",
        "HrefArgs" => "ID=#ID",
        "Title"    => "Imprimir",
        "Title_UK" => "Print",
        "Title_ES"    => "Imprimir",
        "Name"     => "Versão Imprimível",
        "Name_UK"  => "Printable Version",
        "Name_ES"     => "Versión Imprimíble",
        "Icon"     => "print_light.png",
        "Public"   => 1,
        "Person"   => 1,
        "Admin"   => 1,
        "Handler"   => "HandlePrint",
        "NoHeads"   => 1,
        "NoInterfaceMenu"   => 1,
        "Edits"   => 0,
        "Singular"   => TRUE,
       ),
       "PrintList" => array
       (
        "Href"     => "",
        "HrefArgs" => "",
        "Title"    => "Gerar PDF de todo(a)s #ItemsName",
        "Title_UK" => "Generate PDF for all #ItemsName_UK",
        "Title_ES"    => "Generar PDF de todo(a)s #ItemsName_ES",
        "Name"     => "Versão Imprimível",
        "Name_UK"  => "Printable Version",
        "Name_ES"     => "Versión Imprimíble",
        "Icon"     => "print_dark.png",
        "Public"   => 1,
        "Person"   => 1,
        "Admin"   => 1,
        "Handler"   => "MyMod_Handle_Prints",
        "NoHeads"   => 1,
        "NoInterfaceMenu"   => 1,
        "Edits"   => 0,
       ),
       "Download" => array
       (
        "Href"     => "",
        "HrefArgs" => "ID=#ID",
        "Title"    => "Baixar #Name",
        "Title_UK" => "Download #Name",
        "Title_ES"    => "Descarregar #Name",
        "Name"     => "Baixar",
        "Name_UK"  => "Download",
        "Name_ES"     => "Descarregar",
        "Icon"     => "schedule_light.png",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 1,
        "Handler"   => "MyMod_Handle_Download",
        "NoHeads"   => 1,
        "NoInterfaceMenu"   => 1,
        "Edits"   => 0,
        "Singular"   => FALSE,
       ),
       "Unlink" => array
       (
        "Href"     => "",
        "HrefArgs" => "ID=#ID",
        "Title"    => "Deletar #Name",
        "Title_UK" => "Delete #Name",
        "Title_ES"    => "Deletar #Name",
        "Name"     => "Deletar",
        "Name_UK"  => "Delete",
        "Name_ES"     => "Deletar",
        "Icon"     => "delete_light.png",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 1,
        "Handler"   => "MyMod_Handle_Unlink",
        "NoHeads"   => 1,
        "NoInterfaceMenu"   => 1,
        "Edits"   => 0,
        "Singular"   => FALSE,
        "Confirm"   => FALSE,
       ),
       "Export" => array
       (
        "Href"     => "",
        "HrefArgs" => "",
        "Title"    => "Exportar #ItemsName (dump)",
        "Title_UK" => "Export #ItemsName_UK (dump)",
        "Title_ES"    => "Exportar #ItemsName_ES (dump)",
        "Name"     => "Exportar #ItemsName",
        "Name_UK"  => "Export #ItemsName_UK",
        "Name_ES"     => "Exportar #ItemsName_ES",
        //"Icon"     => "rubik.png",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 1,
        "Handler"   => "MyMod_Handle_Export",
        "NoHeads"   => 1,
        "NoInterfaceMenu"   => 1,
        "Edits"   => 0,
        "Singular"   => FALSE,
       ),
       "Import" => array
       (
        "Href"     => "",
        "HrefArgs" => "",
        "Title"    => "Importar #ItemsName do Arquivo",
        "Title_UK" => "Import #ItemsName_UK (restore)",
        "Title_ES"    => "Importar #ItemsName_ES do Archivo",
        "Name"     => "Importar #ItemsName do Arquivo",
        "Name_UK"  => "Import #ItemsName_UK",
        "Name_ES"     => "Importar #ItemsName_ES do Archivo",
        //"Icon"     => "rubik.png",
        "Public"   => 0,
        "Person"   => 1,
        "Admin"   => 1,
        "Handler"   => "HandleImport",
        "Singular"   => FALSE,
       ),
       "Zip" => array
       (
        "Href"     => "",
        "HrefArgs" => "",
        "Title"    => "Zipar Arquivos Carregados",
        "Title_UK" => "Zip Uploaded Files",
        "Title_ES"    => "Zipar Archivos Carregados",
        "Name"     => "Zipar Arquivos",
        "Name_UK"  => "Zip Files",
        "Name_ES"     => "Zipar Archivos",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 1,
        "Handler"   => "HandleZip",
        "NoHeads"   => 1,
        "NoInterfaceMenu"   => 1,
        "Edits"   => 0,
        "Singular"   => FALSE,
       ),
       "Files" => array
       (
        "Href"     => "",
        "HrefArgs" => "",
        "Title"    => "Arquivos Carregados",
        "Title_UK" => "Uploaded Files",
        "Title_ES"    => "Archivos Carregados",
        "Name"     => "Arquivos",
        "Name_UK"  => "Files",
        "Name_ES"     => "Archivos",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 1,
        "Handler"   => "MyMod_Handle_Files",
        "Edits"   => 0,
        "Singular"   => FALSE,
       ),
       "Process" => array
       (
        "Href"     => "",
        "HrefArgs" => "",
        "AddIDArg"   => 0,
        "Title"    => "Processar #ItemsName",
        "Title_UK" => "Process #ItemsName_UK",
        "Title_ES"    => "Processar #ItemsName_ES",
        "Name"     => "Processar",
        "Name_UK"  => "Process",
        "Name_ES"     => "Processar",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 1,
        "Handler"   => "HandleProcess",
        "Singular"   => FALSE,
       ),
       "Info" => array
       (
        "Href"     => "",
        "HrefArgs" => "",
        "AddIDArg"   => 0,
        "Title"    => "SysInfo",
        "Title_UK" => "SysInfo",
        "Title_ES"    => "SysInfo",
        "Name"     => "SysInfo",
        "Name_UK"  => "SysInfo",
        "Name_ES"     => "SysInfo",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 1,
        "Singular"   => FALSE,
        "Handler"  => "MyMod_Handle_Info",
       ),
       "Profiles" => array
       (
        "Href"     => "",
        "HrefArgs" => "",
        "AddIDArg"   => 0,
        "Title"    => "Perfis e Permissões do Módulo",
        "Title_UK" => "Module Profiles and Permissions",
        "Title_ES"    => "Perfiles e Permisos del Módulo",
        "Name"     => "Perfis e Permissões",
        "Name_UK"  => "Profiles and Permission",
        "Name_ES"     => "Perfiles e Permisos",
        "Public"   => 0,
        "Person"   => 0,
        "Admin"   => 1,
        "Singular"   => FALSE,
       ),
    );
