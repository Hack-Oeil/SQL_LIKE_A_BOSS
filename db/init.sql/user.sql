CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

insert into user (id, firstname, lastname, username, password) values (1, 'Admin', 'Immo', 'admin_inutile_a_connaitre', 'password_inutile_a_connaitre');
insert into user (id, firstname, lastname, username, password) values (2, 'John', 'Doe', 'guest', 'guest');
insert into user (id, firstname, lastname, username, password) values (3, 'Michek', 'Dupont', 'm.dupont@boutik.com', 'd7ecc71525aa6973d');
insert into user (id, firstname, lastname, username, password) values (4, 'Molly', 'Lourens', 'mlourens3@nih.gov', '934416201fc32f9017b8');
insert into user (id, firstname, lastname, username, password) values (5, 'Jeanine', 'Carpmile', 'jcarpmile4@github.io', '7e668cf26acaa6fd1ae592a');
insert into user (id, firstname, lastname, username, password) values (6, 'Ekaterina', 'Penhearow', 'epenhearow5@dropbox.com', '02f15b8b0381524a5c4df4e');
insert into user (id, firstname, lastname, username, password) values (7, 'Wini', 'Gonnelly', 'wgonnelly6@ning.com', 'bb3a1703d3523fbb9');
insert into user (id, firstname, lastname, username, password) values (8, 'Kimble', 'Alpe', 'kalpe7@ezinearticles.com', '81f4dbb2cfd3');
insert into user (id, firstname, lastname, username, password) values (9, 'Vonnie', 'Coward', 'vcoward8@fc2.com', 'be26020330c4425d123cc11f');
