CREATE DATABASE zoo;

use zoo;


CREATE TABLE habitats (
   id_habitat int(11) PRIMARY KEY AUTO_INCREMENT,
   nomHab varchar(100),
   description_Hab varchar(100)
);

CREATE TABLE animal (
   id_animal int(11) PRIMARY KEY AUTO_INCREMENT ,
   nom  varchar(100) ,
   type_alimentaire varchar(100) ,
   image mediumblob ,
   id_habitat int(11)

   FOREIGN KEY (id_habitat) REFERENCES habitats (id_habitat);
);


INSERT INTO habitats (id_habitat, nomHab, description_Hab) VALUES
(1, 'Savane', 'grande plaine herbeuse chaude, habitée par le Lion et d’autres animaux résistants au climat sec'),
(2, 'Jungle', 'forêt dense et humide, riche en biodiversité comme le Tigre et les oiseaux tropicaux.'),
(3, 'Désert', 'milieu aride avec peu d’eau, où survivent des espèces adaptées comme le Chameau.'),
(4, 'Océan', 'vaste écosystème marin qui régule le climat et abrite des créatures comme le Requin');


INSERT INTO animal (id_animal, nom, type_alimentaire, image, id_habitat) VALUES
(2, 'Lion', 'omnivore', 0x6c696f6e2e6a706567, 1),
(3, 'Fox', 'herbivore', 0x466f782e61766966, 3),
(4, 'Elephant', 'herbivore', 0x456c657068616e742e6a7067, 2),
(5, 'Tiger', 'carnivore', 0x54696765722e6a7067, 3),
(6, 'Zebra', 'herbivore', 0x5a656272612e706e67, 2),
(7, 'Bear', 'omnivore', 0x426561722e6a7067, 2),
(8, 'Panda', 'herbivore', 0x50616e64612e4a5047, 2),
(9, 'Eagle', 'carnivore', 0x4561676c652e6a7067, 1),
(10, 'Fox', 'carnivore', 0x466f782e61766966, 1);



SELECT * FROM habitats;

SELECT * FROM animal;

DELETE FROM animal WHERE id_animal = 1;
