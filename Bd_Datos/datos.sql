create table identificador(
ci varchar(10) primary key,
nombres varchar(30),
apellidoP varchar(15),
apellidoM varchar(15),
fechanaci date,
lugarnaci varchar(4),
contra varchar(15)
);

INSERT INTO `identificador` (`ci`, `nombres`, `apellidoP`, `apellidoM`, `fechanaci`, `lugarnaci`, `contra`) VALUES ('9199600', 'Enrique Martin', 'Condori', 'Mamani', '14/07/96', '01', 'Quique');
INSERT INTO academico.identificador (ci,nombres,apellidoP,apellidoM,fechanaci,lugarnaci,contra) VALUES ('1723458', 'Jhon Alvaro', 'Vallejos', 'Perez', '1997-03-10', '01', 'Al123456');

create table usuario(
ci varchar(10) primary key,
nombre varchar(20),
contraseña varchar(15),
color varchar(10)
)
INSERT INTO `usuario` (`ci`, `nombre`, `contraseña`) VALUES ('9199600', 'Enrique Martin', 'Quique');
INSERT INTO academico.usuario (ci,nombre,contraseña) VALUES ('9199600', 'Enrique Martin', 'Quique');
INSERT INTO `usuario` (`ci`, `nombre`, `contraseña`) VALUES ('97363549', 'Ana Carolina', 'Ana123'), ('97487589', 'Carlos', 'Cbultron');
INSERT INTO academico.usuario (ci,nombre,contraseña,color) VALUES ('9199600', 'Enrique Martin', 'Quique','#2F4F4F');

create table notas(
	ci varchar(10),
	materia varchar(20),
	nota int
)


SELECT COUNT(*),lugarnaci FROM notas as n,identificador as i WHERE n.ci like i.ci GROUP BY lugarnaci
SELECT COUNT(*),lugarnaci FROM notas as n,identificador as i WHERE n.ci like i.ci AND n.nota > 50 GROUP BY lugarnaci

SELECT COUNT(i.lugarnaci),n.ci,i.nombres,n.nota FROM `notas`as n,identificador as i WHERE n.nota > 50 AND i.ci LIKE n.ci GROUP BY i.lugarnaci
SELECT ci,
(case 
	when lugarnaci like '01' then 'La Paz'
	when lugarnaci like '02' then 'Cochabamba'
 	when lugarnaci like '03' then 'Santa Cruz'
 	when lugarnaci like '04' then 'Beni'
 	when lugarnaci like '05' then 'Oruro'
 	when lugarnaci like '06' then 'Potosi'
 	when lugarnaci like '07' then 'Tarija'
 	when lugarnaci like '08' then 'Chuquisaca'
 	when lugarnaci like '09' then 'Pando'
	end) as depto
FROM identificador




SELECT a.ci,(a.lugarnaci),nota,materia
FROM (SELECT ci,lugarnaci
FROM identificador) as a, notas as n
where a.ci like n.ci

SELECT a.ci,(a.lugarnaci),nota,materia
FROM (SELECT ci,lugarnaci
FROM identificador) as a, notas as n
where a.ci like n.ci