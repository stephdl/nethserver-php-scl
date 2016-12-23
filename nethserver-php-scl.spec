Summary: Nethserver php REMI scl
%define name nethserver-php-scl
Name: %{name}
%define version 1.1.0
%define release 1
Version: %{version}
Release: %{release}%{?dist}
License: GPL
Group: Administration
Source: %{name}-%{version}.tar.gz
BuildRoot: /var/tmp/e-smith-buildroot
BuildRequires: nethserver-devtools
BuildArchitectures: x86_64
Requires: scl-utils, nethserver-httpd, nethserver-phpsettings, nethserver-virtualhosts 

Requires: php56 , php56-php , php56-php-bcmath , php56-php-gd , php56-php-imap , php56-php-ldap , php56-php-enchant
Requires: php56-php-mbstring , php56-php-pdo , php56-php-tidy , php56-php-mysqlnd , php56-php-xml , php56-php-soap
Requires: php56-php-pecl-zip, php56-php-mcrypt, php56-php-fpm , php56-php-pgsql

Requires: php70 , php70-php , php70-php-bcmath , php70-php-gd , php70-php-imap , php70-php-ldap , php70-php-enchant
Requires: php70-php-mbstring , php70-php-pdo , php70-php-tidy , php70-php-mysqlnd , php70-php-xml , php70-php-soap
Requires: php70-php-pecl-zip, php70-php-mcrypt, php70-php-pear, php70-php-fpm , php70-php-pgsql

Requires: php71 , php71-php , php71-php-bcmath , php71-php-gd , php71-php-imap , php71-php-ldap , php71-php-enchant
Requires: php71-php-mbstring , php71-php-pdo , php71-php-tidy , php71-php-mysqlnd , php71-php-xml , php71-php-soap
Requires: php71-php-pecl-zip, php71-php-mcrypt php71-php-pear, php71-php-fpm, php71-php-pgsql

AutoReqProv: no

%changelog
* Wed Dec 21 2016 Stephane de Labrusse <stephdl@de-labrusse.fr> 1.1.0-1-ns7
- New version php-fpm based for NS7

* Tue Jul 12 2016 Stephane de Labrusse <stephdl@de-labrusse.fr> 1.0.5-1-ns6
- Added nethserver-remi-phpscl as dependency

* Tue Jan 26 2016 Stephane de Labrusse <stephdl@de-labrusse.fr> 1.0.4-1-ns6
- Added path to /usr/share/pear in 50PathsDirectories

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
%{genfilelist} \
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

##PHP54
echo "#
# PHP is an HTML-embedded scripting language which attempts to make it
# easy for developers to write dynamically generated webpages.
#
<IfModule prefork.c>
  LoadModule php5_module modules/libphp5.so
</IfModule>" > /etc/httpd/conf.modules.d/10-php.conf

#PHP56
echo "#
# PHP is an HTML-embedded scripting language which attempts to make it
# easy for developers to write dynamically generated webpages.
#
<IfModule prefork.c>
  LoadModule php5_module modules/libphp56-php5.so
</IfModule>" > /etc/httpd/conf.modules.d/10-php56-php.conf

#php70
echo "#
# PHP is an HTML-embedded scripting language which attempts to make it
# easy for developers to write dynamically generated webpages.
#

# Cannot load both php5 and php7 modules
<IfModule !mod_php5.c>
  <IfModule prefork.c>
    LoadModule php7_module modules/libphp70.so
  </IfModule>
</IfModule>" > /etc/httpd/conf.modules.d/15-php70-php.conf

#php71
echo "#
# PHP is an HTML-embedded scripting language which attempts to make it
# easy for developers to write dynamically generated webpages.
#

# Cannot load both php5 and php7 modules
<IfModule !mod_php5.c>
  <IfModule prefork.c>
    LoadModule php7_module modules/libphp71.so
  </IfModule>
</IfModule>" > /etc/httpd/conf.modules.d/15-php71-php.conf

%files -f %{name}-%{version}-filelist
%defattr(-,root,root)

%dir %{_nseventsdir}/%{name}-update
