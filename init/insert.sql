INSERT INTO user (`firstname`, `lastname`, `profilePicture`,`address`,`phoneNumber`,`trigram`,`role`) 
VALUES ('Martial','Berger','1.jpg','8 route de la grue','+3345454545','mbg','Teacher'), 
('Keling','Martin','2.jpg','8 route de la grue','+3345454545','kmt','Teacher'),
('Julien','Oppliger','3.jpg','8 route de la grue','+3345454545','jol','Teacher'),
('Julio','Ribeiro','4.jpg','8 route de la grue','+3345454545','jri','Teacher')
;

INSERT INTO course (`userId`, `code`, `courseName`,`profilePicture`,`description`) 
VALUES (1,'d01','Réseaux','1.course.jpg','Cours de réseaux'), 
(2,'d02','Base de donnée','2.course.jpg','Cours de base de donnée'),
(3,'d03','CyberSecurité','3.course.jpg','Cours de cyberSécurité'),
(4,'d42','Php','4.course.jpg','Cours de php'),
(4,'d43','Algorithmique','5.course.jpg','Cours algorithmique');