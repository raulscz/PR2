DELIMITER $$
  CREATE TRIGGER AñadirInci AFTER INSERT ON tbl_inci
  FOR EACH ROW
  BEGIN
    INSERT INTO `tbl_copia` (`id_inci`,`data_inci`,`hora_inci`,`desc_inci`, `id_mesa`) VALUES (NEW.id_inci, NEW.data_inci, NEW.hora_inci, NEW.desc_inci, NEW.id_mesa);
  END $$
DELIMITER ;