CREATE PROCEDURE `sp_demands_save`(
pdeskid VARCHAR(64),
pdtbirthday DATE(),
pnrmatriculation BIGINT,
pdesperson VARCHAR(64),
pdesemail VARCHAR(64),
pnrphone BIGINT,
pnrcpf BIGINT,
pnrpassword VARCHAR(64), 
pdtpassword DATETIME(), 
pdesqrcode VARCHAR(256),
pidlocal INT(11)

)
BEGIN

	DECLARE vidperson INT;
    
	INSERT INTO tb_persons (desperson, desemail, nrphone, nrcpf)
    VALUES(pdesperson, pdesemail, pnrphone, pnrcpf);
    
    SET vidperson = LAST_INSERT_ID();
	
    DECLARE vidperson INT;
    
	INSERT INTO tb_kids (deskid, dtbirthday, nrmatriculation, idperson)
    VALUES(pdekid, pdtbirthday, pnrmatriculation, vidperson);
    
    SET vidkid = LAST_INSERT_ID();
    
    INSERT INTO tb_demands (idkid, nrpassword, dtpassword, desqrcode, idlocal)
    VALUES(vidkid, pnrpassword, pdtpassword, pdesqrcode, pidlocal);
    
    SELECT * FROM tb_demands a 
    INNER JOIN tb_persons b USING(idperson) 
    INNER JOIN tb_kids c USING(idkid)    
    WHERE a.iddemand = LAST_INSERT_ID();
    
END 