#!/bin/bash
echo -en "Domain adını giriniz ve [ENTER] basın\n"
echo -en "Ornek :  voloamotore.com\n"
read domain

echo -en "subdomainleri aralarında bosluk bırakarak girin ve [ENTER] basın\n"
echo -en "Ornek : porno pornoizle adult anime\n"
read sub

if [ -z $domain ] || [ -z $sub ];then
echo -e "Eksik Bilgi Girdiniz\n"
exit 0;
else

/usr/bin/clear
echo "--------------------------------------"
echo "Asagıdaki bilgiler ile sub domainler aciliyor."
echo "Domain        :$domain"
echo "Sub Domainler :$sub" 
fi

setupdir="/root/subgen"
wwwdir="/var/www"
email="enes.aklin@gmail.com"
apikey="5b4d587da3d86cba62fa187645a74c3386b77"
log="/var/log/nginx"

#
#Statik calistirilmasi istenirse bunlar acilsin.yukarısı kapatılsın
#
#domain="voloamotore.com"
#sub="porno pornoizle 31cek porntube sevis"

for deger in $sub 
do
/bin/tar -zxvf template.tar.gz -C /var/www
/bin/mv $wwwdir/template.com $wwwdir/$deger.$domain
/bin/cp -a /etc/nginx/sites-available/template /etc/nginx/sites-available/$deger.$domain
/bin/ln -s /etc/nginx/sites-available/$deger.$domain /etc/nginx/sites-enabled/
/bin/sed -i "s/siteadresi/$deger.$domain/" /etc/nginx/sites-available/$deger.$domain

# mysql islemleri
/usr/bin/mysql -u root -pgelecek-01! -e "create database $deger"
/usr/bin/mysql -u root -pgelecek-01! -e "CREATE USER $deger@localhost IDENTIFIED BY 'iHytYPju';"
/usr/bin/mysql -u root -pgelecek-01! -e "GRANT ALL PRIVILEGES ON $deger.* TO $deger@localhost;"
/bin/sed -i "s/siteadresi/$deger.$domain/" $setupdir/template_db.sql
/usr/bin/mysql -u root -pgelecek-01! -e "use $deger"
/usr/bin/mysql -u root -pgelecek-01! -e "use $deger;\. /root/subgen/template_db.sql"

/bin/sed -i "s/databaseuser/$deger/" $wwwdir/$deger.$domain/lib/ayar.php
/bin/sed -i "s/databaseadi/$deger/" $wwwdir/$deger.$domain/lib/ayar.php
/bin/cp -a $setupdir/template_db.arsiv.sql  $setupdir/template_db.sql 
/root/subgen/dyndns.sh $email $apikey CREATE $domain A $deger.$domain 0
/bin/touch $log/$deger.$domain.access.log
/usr/sbin/useradd -m $deger -s /bin/false
/bin/ln -s /var/www/$deger.$domain /home/$deger
chown $deger:$deger /home/$deger
done

/etc/init.d/nginx restart

