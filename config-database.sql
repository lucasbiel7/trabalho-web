create database trabalho_final_php;
create user 'trabalhoFinal'@'localhost' identified with mysql_native_password by 'trabalhoFinal';
grant all privileges on trabalho_final_php.* to 'trabalhoFinal'@'localhost';