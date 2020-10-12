# tp-empresa-transporte

Trello: https://trello.com/b/q8VAMSbz/ucalp-tp-seminario-paradigmas

# Windows Installation

1) Download XAMP: https://www.apachefriends.org/download.html

2) Install Xamp (default path: "C:\XAMP")

3) Download Git: https://git-scm.com/download/win

4) Open a Command Prompt:
    - cd C:\xampp\htdocs
    - mkdir main
    - cd main
    - git clone https://github.com/jperrino/tp-empresa-transporte.git

5) Open: "C:\xampp\appache\conf\httpd.conf"
    - Set: DocumentRoot "C:\xampp\htdocs\main\tp-empresa-transporte\frontend\pages"

6) Run XAMP:
    - Start 'Apache' Module
    - Start 'MySQL' Module
    - Click 'MySQL' > 'Admin'

    ![Xamp Control Panel](/pics/xamp_1.png)

7) In 'phpMyAdmin' go to:
    - Cuentas de usuarios > Agregar cuenta de usuario
    ![Xamp php My Admin 1](/pics/xamp_2.png)
    - Create a new user: test///test
    ![Xamp php My Admin 2](/pics/xamp_3.png)
    - Grant 'Datos' privileges
    ![Xamp php My Admin 3](/pics/xamp_4.png)

8) Click 'Nueva' > set 'empresa_de_transporte' as DataBase name and click 'Crear'
![Xamp php My Admin DB 1](/pics/xamp_5.png)

9) Open 'database' and click 'Importar'.

10) Import file: "C:\xampp\htdocs\main\tp-empresa-transporte\bd\empresa_de_transporte.sql"
![Xamp php My Admin DB 2](/pics/xamp_6.png)

11) Open a browser and navigate to:
http://localhost