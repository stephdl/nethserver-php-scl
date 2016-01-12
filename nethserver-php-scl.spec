Summary: Nethserver php REMI scl
%define name nethserver-php-scl
Name: %{name}
%define version 1.0.3
%define release 1
Version: %{version}
Release: %{release}%{?dist}
License: GPL
Group: Administration
Source: %{name}-%{version}.tar.gz
BuildRoot: /var/tmp/e-smith-buildroot
BuildRequires: nethserver-devtools
BuildArchitectures: x86_64

Requires: scl-utils, nethserver-httpd, nethserver-ibays

Requires: php54 , php54-php , php54-php-bcmath , php54-php-gd , php54-php-imap , php54-php-ldap , php54-php-enchant
Requires: php54-php-mbstring , php54-php-pdo , php54-php-tidy , php54-php-mysqlnd php54-php-pecl-zip , php54-php-xml
Requires: php54-php-soap , php54-php-mcrypt

Requires: php55 , php55-php , php55-php-bcmath , php55-php-gd , php55-php-imap , php55-php-ldap , php55-php-enchant
Requires: php55-php-mbstring , php55-php-pdo , php55-php-tidy , php55-php-mysqlnd , php55-php-xml , php55-php-soap
Requires: php55-php-pecl-zip, php55-php-mcrypt

Requires: php56 , php56-php , php56-php-bcmath , php56-php-gd , php56-php-imap , php56-php-ldap , php56-php-enchant
Requires: php56-php-mbstring , php56-php-pdo , php56-php-tidy , php56-php-mysqlnd , php56-php-xml , php56-php-soap
Requires: php56-php-pecl-zip, php56-php-mcrypt

Requires: php70 , php70-php , php70-php-bcmath , php70-php-gd , php70-php-imap , php70-php-ldap , php70-php-enchant
Requires: php70-php-mbstring , php70-php-pdo , php70-php-tidy , php70-php-mysqlnd , php70-php-xml , php70-php-soap
Requires: php70-php-pecl-zip, php70-php-mcrypt php70-php-pear

AutoReqProv: no

%changelog
* Sun Jan 24 2016 Stephane de Labrusse <stephdl@de-labrusse.fr> 1.0.3-1-ns6
- Added specific path for soap cache  and save session

* Tue Dec 22 2015 Stephane de Labrusse <stephdl@de-labrusse.fr> 1.0.2-1-ns6
- Added the php70 settings for software collections

* Sat May 30 2015 Stephane de Labrusse <stephdl@de-labrusse.fr> 1.0.1-2-ns6
- Corrected the httpd-admin issue when php scl is set to the whole server

* Fri May 01 2015 Stephane de Labrusse <stephdl@de-labrusse.fr> 1.0.1-1-ns6
- Ready to release

* Wed Apr 22 2015 Stephane de Labrusse <stephdl@de-labrusse.fr> 1.0.0-1-ns6
- Initial release to ns6

* Fri Feb 20 2015 Stephane de Labrusse <stephdl@de-labrusse.fr> 0.4-3
- Corrected a typo '~' in /opt/remi/php55/root/etc/php.ini

* Fri Feb 20 2015 Stephane de Labrusse <stephdl@de-labrusse.fr> 0.4-2
- Added a Panel to select the php version in PHP-mod

* Sat Feb 07 2015 Stephane de Labrusse <stephdl@de-labrusse.fr> 0.4-1
- Switch to remi repository {php54,php55,php56}
- Added a Panel for ibay php version

* Sun Nov 9 2014 Stephane de Labrusse <stephdl@de-labrusse.fr> 0.3-3
- Added a db to load the php54-mod in apache
- New php settings in php.ini
- Added default db values

* Fri Nov 7 2014 Stephane de Labrusse <stephdl@de-labrusse.fr> 0.2-1
- Added php55

* Fri Nov 7 2014 Stephane de Labrusse <stephdl@de-labrusse.fr> 0.1-1
- Initial release to sme9

%description
Allow to use different versions of php whith a cgi script.

%prep
%setup

%build
%{makedocs}
perl createlinks

%install
rm -rf $RPM_BUILD_ROOT
(cd root   ; find . -depth -print | cpio -dump $RPM_BUILD_ROOT)
rm -f %{name}-%{version}-filelist
/sbin/e-smith/genfilelist \
    --file /usr/bin/phpscl/php54_REMI 'attr(0750,root,apache)' \
    --file /usr/bin/phpscl/php55_REMI 'attr(0750,root,apache)' \
    --file /usr/bin/phpscl/php56_REMI 'attr(0750,root,apache)' \
    --file /usr/bin/phpscl/php70_REMI 'attr(0750,root,apache)' \
  $RPM_BUILD_ROOT > %{name}-%{version}-filelist

%clean
rm -rf $RPM_BUILD_ROOT

%pre

%preun

%post
echo "
 Hi

 All my development work is done in my free time and from my own expenses.
 If you consider my work as something helpful, thank you to kindly make
 a donation to my paypal account and allow me to continue paying my server
 and all associated costs.

 https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZPK8FKHVT4TY8

 Thank in advance.

 Stephane de Labrusse Alias Stephdl
"
%postun
#we write in former state all php.conf files

#PHP53
echo "
#
# PHP is an HTML-embedded scripting language which attempts to make it
# # easy for developers to write dynamically generated webpages.
#
 <IfModule prefork.c>
   LoadModule php5_module modules/libphp5.so
 </IfModule>
 <IfModule worker.c>
   LoadModule php5_module modules/libphp5-zts.so
 </IfModule>

#
# Cause the PHP interpreter to handle files with a .php extension.
#
AddHandler php5-script .php
AddType text/html .php

#
# Add index.php to the list of files that will be served as directory
# indexes.
#
DirectoryIndex index.php

#
# Uncomment the following line to allow PHP to pretty-print .phps
# files as PHP source code:
#
#AddType application/x-httpd-php-source .phps" > /etc/httpd/conf.d/php.conf


##PHP54
echo "
#
# PHP is an HTML-embedded scripting language which attempts to make it
# easy for developers to write dynamically generated webpages.
#
<IfModule prefork.c>
    LoadModule php5_module modules/libphp54-php5.so
</IfModule>

#
# The following lines prevent .user.ini files from being viewed by Web clients.
#
<Files ".user.ini">
    <IfModule mod_authz_core.c>
        Require all denied
    </IfModule>
    <IfModule !mod_authz_core.c>
        Order allow,deny
        Deny from all
        Satisfy All
    </IfModule>
</Files>

#
# Allow php to handle Multiviews
#
AddType text/html .php

#
# Add index.php to the list of files that will be served as directory
# indexes.
#
DirectoryIndex index.php

# mod_php options
<IfModule  mod_php5.c>
    #
    # Cause the PHP interpreter to handle files with a .php extension.
    #
    <FilesMatch \.php$>
        SetHandler application/x-httpd-php
    </FilesMatch>

    #
    # Uncomment the following lines to allow PHP to pretty-print .phps
    # files as PHP source code:
    #
    #<FilesMatch \.phps$>
    #    SetHandler application/x-httpd-php-source
    #</FilesMatch>

    #
    # Apache specific PHP configuration options
    # those can be override in each configured vhost
    #
    php_value session.save_handler "files"
    php_value session.save_path    "/opt/remi/php54/root/var/lib/php/session"
    php_value soap.wsdl_cache_dir  "/opt/remi/php54/root/var/lib/php/wsdlcache"
</IfModule>" > /etc/httpd/conf.d/php54-php.conf


#PHP55
echo "
#
# PHP is an HTML-embedded scripting language which attempts to make it
# easy for developers to write dynamically generated webpages.
#
<IfModule prefork.c>
    LoadModule php5_module modules/libphp55-php5.so
</IfModule>

#
# The following lines prevent .user.ini files from being viewed by Web clients.
#
<Files ".user.ini">
    <IfModule mod_authz_core.c>
        Require all denied
    </IfModule>
    <IfModule !mod_authz_core.c>
        Order allow,deny
        Deny from all
        Satisfy All
    </IfModule>
</Files>

#
# Allow php to handle Multiviews
#
AddType text/html .php

#
# Add index.php to the list of files that will be served as directory
# indexes.
#
DirectoryIndex index.php

# mod_php options
<IfModule  mod_php5.c>
    #
    # Cause the PHP interpreter to handle files with a .php extension.
    #
    <FilesMatch \.php$>
        SetHandler application/x-httpd-php
    </FilesMatch>

    #
    # Uncomment the following lines to allow PHP to pretty-print .phps
    # files as PHP source code:
    #
    #<FilesMatch \.phps$>
    #    SetHandler application/x-httpd-php-source
    #</FilesMatch>

    #
    # Apache specific PHP configuration options
    # those can be override in each configured vhost
    #
    php_value session.save_handler "files"
    php_value session.save_path    "/opt/remi/php55/root/var/lib/php/session"
    php_value soap.wsdl_cache_dir  "/opt/remi/php55/root/var/lib/php/wsdlcache"
</IfModule>" > /etc/httpd/conf.d/php55-php.conf



#PHP56
echo "
#
# PHP is an HTML-embedded scripting language which attempts to make it
# easy for developers to write dynamically generated webpages.
#
<IfModule prefork.c>
  LoadModule php5_module modules/libphp56-php5.so
</IfModule>

#
# The following lines prevent .user.ini files from being viewed by Web clients.
#
<Files ".user.ini">
    <IfModule mod_authz_core.c>
        Require all denied
    </IfModule>
    <IfModule !mod_authz_core.c>
        Order allow,deny
        Deny from all
        Satisfy All
    </IfModule>
</Files>

#
# Allow php to handle Multiviews
#
AddType text/html .php

#
# Add index.php to the list of files that will be served as directory
# indexes.
#
DirectoryIndex index.php

# mod_php options
<IfModule  mod_php5.c>
    #
    # Cause the PHP interpreter to handle files with a .php extension.
    #
    <FilesMatch \.php$>
        SetHandler application/x-httpd-php
    </FilesMatch>

    #
    # Uncomment the following lines to allow PHP to pretty-print .phps
    # files as PHP source code:
    #
    #<FilesMatch \.phps$>
    #    SetHandler application/x-httpd-php-source
    #</FilesMatch>

    #
    # Apache specific PHP configuration options
    # those can be override in each configured vhost
    #
    php_value session.save_handler "files"
    php_value session.save_path    "/opt/remi/php56/root/var/lib/php/session"
    php_value soap.wsdl_cache_dir  "/opt/remi/php56/root/var/lib/php/wsdlcache"
</IfModule>" > /etc/httpd/conf.d/php56-php.conf


%files -f %{name}-%{version}-filelist
%defattr(-,root,root)
