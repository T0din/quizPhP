/* Ajout de la table role */
DROP TABLE IF EXISTS `roles`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1030 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

/* Ajout de roles a associer aux utilisateurs*/

INSERT INTO `roles`(id, name) VALUES (1,'admin'),
(2,'user');

-- créer le champ role_id (qui va contenir la clé etrangère)
ALTER TABLE `app_users` ADD `role_id` INT NOT NULL DEFAULT 2;

ALTER TABLE `app_users` ADD INDEX(`role_id`);

-- j'ajoute la contrainte de clé étrangère sur le champ et j'indique vers quelle table/et qual champ, la clé étrangère "pointe"
ALTER TABLE `app_user` ADD FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;