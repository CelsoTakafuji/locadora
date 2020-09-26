<?php
/***************************************
DEFINE BANCO DE DADOS
****************************************/
define(HOST, 'localhost');
define(USER, 'cmassao');
define(PASS, 'nirvana');
define(DBSA, 'locadoravirtual');

/***************************************
BASE DO SITE
****************************************/
define(BASE,		'http://localhost/locadora');
define(SITENAME,	'&copy;Locadora');
define(SITEANO, 	'2016');
define(SITEAUTOR, 	'Napapão');
define(SITETAGS, 	'Filmes');
define(SITEDESC, 	'Locadora - '.SITETAGS);

/***************************************
DEFINE O SERVIDOR DE E-MAIL
****************************************/
define(MAILNOME, 'Napapapão');
define(MAILUSER, 'napapapao@gmail.com');
define(MAILPASS, 'napa1234');
define(MAILPORT, '587'); //porta 587 (com STARTTLS)
define(MAILHOST, 'smtp.gmail.com');
#define(MAILPORT, '465'); //porta 465 (com SSL/TLS)
#define(MAILHOST, 'ssl://smtp.gmail.com');

#define(MAILUSER, 'napapapao@yahoo.com');
#define(MAILPASS, 'napa1234');
#define(MAILPORT, '587'); //porta 587 (com STARTTLS)
#define(MAILHOST, 'smtp.mail.yahoo.com');
#define(MAILPORT, '465'); //porta 465 (com SSL/TLS)
#define(MAILHOST, 'ssl://smtp.mail.yahoo.com');

#define(MAILUSER, 'napapapao@mundonapa.890m.com');
#define(MAILPASS, 'napa1234');
#define(MAILPORT, '2525');
#define(MAILHOST, 'mx1.hostinger.com.br');

?>