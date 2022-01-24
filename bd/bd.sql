//CREATE

CREATE TABLE usuario( 
	id_usuario INT NOT NULL AUTO_INCREMENT, 
	nome_usuario VARCHAR(50) NOT NULL , 
	cpf_usuario INT(11) NOT NULL , 
	email_usuario VARCHAR(50), 
	senha_usuario VARCHAR(50) NOT NULL, 
	inicio_mandato DATE, 
	fim_mandato DATE, 
	data_nascimento DATE, 
	CONSTRAINT pk_usuario PRIMARY KEY (id_usuario) 
)


CREATE TABLE cargo( 
	id_cargo INT NOT NULL AUTO_INCREMENT, 
	cargo VARCHAR(50) NOT NULL , 
	CONSTRAINT pk_cargo PRIMARY KEY (id_cargo) 
)



CREATE TABLE tipoUsuario( 
	id_tipousuario INT NOT NULL AUTO_INCREMENT, 
	tipoUsuario VARCHAR(50) NOT NULL , 
	permissao VARCHAR(20) NOT NULL,
	CONSTRAINT pk_tipousuario PRIMARY KEY (id_tipousuario) 
)


CREATE TABLE escola( 
	id_escola INT NOT NULL AUTO_INCREMENT, 
	nome_escola VARCHAR(50) NOT NULL, 
	sigla VARCHAR(20),
	data_criacao DATE,
	cnpj INT UNIQUE,
	cep_escola INT,
	codigo_inep VARCHAR(25),
	tipo_escola VARCHAR(20),
	CONSTRAINT pk_escola PRIMARY KEY (id_escola) 
)

CREATE TABLE distritoAdm( 
	id_distrito INT NOT NULL AUTO_INCREMENT, 
	distritoAdm VARCHAR(50) NOT NULL, 
	CONSTRAINT pk_distrito PRIMARY KEY (id_distrito) 
)


//INSERT

INSERT INTO cargo(cargo) 
	VALUES ('presidente'),
		('secretario geral'),
		('secretario'),
		('servidor/conselheiro')
		

INSERT INTO tipousuario(tipoUsuario, permissao) 
	VALUES ('administrador', '1'),
    		('comum', '2')
			
			
INSERT INTO distritoadm (distritoAdm) 
	VALUES 	('DABEL'),
			('DABEN'),
    		('DAGUA'),
            ('DAICO'),
            ('DAOUT'),
            ('DAMOS'),
            ('DAENT'),
            ('DASAC')

INSERT INTO usuario (nome_usuario, cpf_usuario, email_usuario, senha_usuario, inicio_mandato, fim_mandato, data_nascimento) VALUES ('teste', 00000000000, 'teste@gmail.com', 'teste', '2022-01-22', '2022-01-30', '1920-05-01')

//ALTER

ALTER TABLE usuario ADD fk_cargo int;
ALTER TABLE usuario ADD CONSTRAINT fk_cg FOREIGN KEY (fk_cargo) REFERENCES cargo (id_cargo);

ALTER TABLE usuario ADD fk_tipousuario int;
ALTER TABLE usuario ADD CONSTRAINT fk_tipo FOREIGN KEY (fk_tipousuario) REFERENCES tipoUsuario (id_tipousuario);