Php Apache Version
==================

You can choose a version of php for the apache folder /var/www/html.
    Use a different version of php with php-fpm from PHP software Collection of Remi repository.

    The version  php54 (default el7 version), php56, php70, php71, php72 are available and launched one at a time, for all Virtualhosts.

    If you need a specific PHP version for one VirtualHost, then you must adjust it in the Panel of your VirtualHost

How install more php rpm
    All php rpm must be installed directly from Remi by a yum command line.

    For example if you want to display all available rpm for the software collection

    yum list available php\* --disablerepo=* --enablerepo=remi-safe

    If you want to install a rpm for all php version (php56,php70,php71, php72)

    yum install php56-php-dba php70-php-dba php71-php-dba php72-php-dba 

