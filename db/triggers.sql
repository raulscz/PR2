/*Este Trigger Copia en la tabla tbl_copia la misma incidencia que se crea con un insert en la tabla tbl_incidencia.*/

DELIMITER $$
  CREATE TRIGGER AñadirInci AFTER INSERT ON tbl_inci
  FOR EACH ROW
  BEGIN
    INSERT INTO `tbl_copia` (`id_inci`,`data_inci`,`hora_inci`,`desc_inci`, `id_mesa`) VALUES (NEW.id_inci, NEW.data_inci, NEW.hora_inci, NEW.desc_inci, NEW.id_mesa);
  END $$
DELIMITER ;

/*Este Trigger Actualiza en la tabla tbl_copia cualquier cambio que ha tenido una incidencia en la tabla tbl_incidencia.*/

DELIMITER $$
  CREATE TRIGGER ActuInci AFTER UPDATE ON tbl_inci
  FOR EACH ROW
  BEGIN 
    UPDATE `tbl_copia` SET `data_inci` = NEW.data_inci, `hora_inci` = NEW.hora_inci, `desc_inci` = NEW.desc_inci, `id_mesa` = NEW.id_mesa, WHERE `id_inci` = NEW.id_inci;
  END $$
DELIMITER ;