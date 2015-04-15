.. --initial-header-level=3 

Php Software Collection
^^^^^^^^^^^^^^^^^^^^^^^

Use a different version of php as a CGI script from PHP software Collection of Remi repository.
Actually only php54, php55, php56 are available and launched one at a time, only for your Ibay.
Apache is still running the default php version. Therefore Apache can not trigger php settings
like you can do it with the module nethserver-phpsettings. If you need to adjust settings to PHP, 
then you must adjust them in the Panel *Php Settings*

How install more php rpm
    All php module needed must be installed directly from Remi by a yum command line.
    For example if you want to display all available rpm for the software collection

    yum list available php\* --disablerepo=* --enablerepo=remi-phpscl

    If you want to install a rpm for all php verion (php54,php55,php56)

    yum install php54-php-dba php55-php-dba php56-php-dba --enablerepo=remi-phpscl
