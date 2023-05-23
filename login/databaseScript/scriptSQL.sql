CREATE DATABASE login
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

use login;

create table tbLogin (
	cdLogin int auto_increment,
    nmLogin varchar(20) not null,
    senha varchar(20) not null,
    PRIMARY KEY(cdLogin)
) DEFAULT CHARSET = 'utf8';

select * from tbLogin;

INSERT INTO tbLogin values
(DEFAULT, 'allan', 'allan123'),
(DEFAULT, 'gabriel', 'gabriel123'),
(DEFAULT, 'elton', 'elton123');