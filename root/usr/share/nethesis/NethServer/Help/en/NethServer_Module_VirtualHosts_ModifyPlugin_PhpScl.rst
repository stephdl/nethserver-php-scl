.. --initial-header-level=3 

Php Software Collection
^^^^^^^^^^^^^^^^^^^^^^^

Use a different version of php as with php-fpm from PHP software Collection of Remi repository.
The version  php56, php70, php71, php72, php73 are available and launched one at a time, only for your Virtualhost.

If you need to adjust settings to PHP, then you must adjust them in the Tab *Php Settings*, the modifications are valid only for your virtualhost

How install more php rpm
    All php rpm must be installed directly from Remi by a yum command line.

    For example if you want to display all available rpm for the software collection

    yum list available php\* --disablerepo=* --enablerepo=remi-safe

    If you want to install a rpm for all php version (php56,php70,php71,php72,php73)

    yum install php56-php-dba php70-php-dba php71-php-dba php72-php-dba php73-php-dba
