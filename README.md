# pdoPractica
Practica en php con PDO

#configurar database, la primera vez no deberia pedir contraseña
sudo mysql -h localhost -u root

#dentro de mysql, crear base dedatos
CREATE DATABASE banco;

#crear usuario y dar privilegios
CREATE USER 'nombre_usuario' IDENTIFIED BY 'contraseña';
GRANT USAGE ON *.* TO 'nombre_usuario'@localhost IDENTIFIED BY 'contraseña';
GRANT ALL privileges ON banco.* TO nombre_usuario@localhost;
FLUSH PRIVILEGES;

#y exit para salir de mariadb, exportar base de datos del archivo sql
mysql -u nombre_usuario -p banco < banco.sql


practica06.php generara una instancia de la clase Cliente y esta a su vez usara la clase conexion para utilizar el PDO de la practica
