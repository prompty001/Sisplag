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


CREATE TABLE instituicao( 
	id_instituicao INT NOT NULL AUTO_INCREMENT, 
	fk_tipoInstituicao INT,
	fk_sigla INT,
	fk_distrito INT,
	nome_instituicao VARCHAR(50) NOT NULL, 
	fundacao DATE,
	codigo_inep VARCHAR(25),
	cnpj_escola VARCHAR(20),
	entidade_mantenedora VARCHAR(50) DEFAULT 'SEMEC',
	cnpj_conselho VARCHAR(20),
	vigencia_ce VARCHAR(50),
	cep_escola INT,
	uf VARCHAR(2),
	cidade VARCHAR(50),
	bairro VARCHAR(50),  
	complemento VARCHAR(50),
	email_inst VARCHAR(50) DEFAULT 'Sem email',
	telefone_inst VARCHAR(13) DEFAULT 'Sem telefone',
	nome_gestor VARCHAR(50),
	email_gestor VARCHAR(50) DEFAULT 'Sem email',
	whats_gestor VARCHAR(50) DEFAULT 'Sem WhatsApp',  
	nome_secretario VARCHAR(50),
	email_secretario VARCHAR(50) DEFAULT 'Sem email',
	whats_secretario VARCHAR(50) DEFAULT 'Sem WhatsApp',  
	nome_coordenador VARCHAR(50),
	email_coordenador VARCHAR(50) DEFAULT 'Sem email',
	whats_coordenador VARCHAR(50) DEFAULT 'Sem WhatsApp', 
	convenio_semec VARCHAR(50), 
	educacao_infantil VARCHAR(50), 
	fundamental VARCHAR(50), 
	fundamental_eja VARCHAR(50), 
	outros_niveis VARCHAR(50), 
	CONSTRAINT pk_escola PRIMARY KEY (id_instituicao)
)

/*
	convenio_semec VARCHAR(50), 
	educacao_infantil VARCHAR(50), 
	fundamental VARCHAR(50), 
	fundamental_eja VARCHAR(50), 
	outros_niveis VARCHAR(50),
*/


CREATE TABLE tipoInstituicao( 
	id_inst INT NOT NULL AUTO_INCREMENT, 
	nome_inst VARCHAR(50) NOT NULL, 
	CONSTRAINT pk_tipoinst PRIMARY KEY (id_inst) 
)

CREATE TABLE siglaInstituicao( 
	id_sigla INT NOT NULL AUTO_INCREMENT, 
	sigla VARCHAR(50) NOT NULL, 
	CONSTRAINT pk_siglaInstiuicao PRIMARY KEY (id_sigla) 
)


CREATE TABLE distritoAdm( 
	id_distrito INT NOT NULL AUTO_INCREMENT, 
	distritoAdm VARCHAR(50) NOT NULL, 
	CONSTRAINT pk_distrito PRIMARY KEY (id_distrito) 
)


CREATE TABLE filial( 
	id_filial INT NOT NULL AUTO_INCREMENT, 
	nome_filial VARCHAR(50),
	sigla_filial VARCHAR(20),
	fundacao_filial VARCHAR(50),
	codigo_inepfilial VARCHAR(50),
	cep_escola INT,
	uf VARCHAR(2),
	cidade VARCHAR(50),
	bairro VARCHAR(50),  
	complemento VARCHAR(50),
	telefone_filial VARCHAR(13) DEFAULT 'Sem telefone',
	email_filial VARCHAR(50) DEFAULT 'Sem email',
	responsavel_filial VARCHAR(50), 
	email_respLegal VARCHAR(50) DEFAULT 'Sem email',
	educacaoinf_Filial VARCHAR(50), 
	fundamental_filial VARCHAR(50), 
	fundamentaleja_filial VARCHAR(50), 
	outrosniveis_filial VARCHAR(50),
	fk_tipoInstituicaoFilial INT, 
	CONSTRAINT pk_filial PRIMARY KEY (id_filial)
)

/* ************RETIRADO**************
CREATE TABLE contato( 
	id_contato INT NOT NULL AUTO_INCREMENT, 
	email_contato VARCHAR(50) DEFAULT 'Sem email',
	emailextra_contato VARCHAR(50) DEFAULT 'Sem email',
	whats_contato VARCHAR(50) DEFAULT 'Sem WhatsApp',  
	telefone_contato VARCHAR(13) DEFAULT 'Sem telefone',
	CONSTRAINT pk_contato PRIMARY KEY (id_contato) 
)
*/

/* ************RETIRADO**************
CREATE TABLE localizacao( 
	id_local INT NOT NULL AUTO_INCREMENT, 
	uf_local VARCHAR(2),
	cidade VARCHAR(50),
	bairro VARCHAR(50),  
	complemento VARCHAR(50),
	CONSTRAINT pk_local PRIMARY KEY (id_local) 
)
*/

/* ************RETIRADO**************
CREATE TABLE gestor( 
	id_gestor INT NOT NULL AUTO_INCREMENT, 
	nome_gestor VARCHAR(50),
	email_gestor VARCHAR(50) DEFAULT 'Sem email',
	whats_gestor VARCHAR(50) DEFAULT 'Sem WhatsApp',  
	telefone_gestor VARCHAR(13) DEFAULT 'Sem telefone',
	CONSTRAINT pk_gestor PRIMARY KEY (id_gestor) 
)
*/

/* ************RETIRADO**************
CREATE TABLE secretario( 
	id_secretario INT NOT NULL AUTO_INCREMENT, 
	nome_secretario VARCHAR(50),
	email_secretario VARCHAR(50) DEFAULT 'Sem email',
	whats_secretario VARCHAR(50) DEFAULT 'Sem WhatsApp',  
	CONSTRAINT pk_secretario PRIMARY KEY (id_secretario) 
)
*/

/* ************RETIRADO**************
CREATE TABLE coordenador( 
	id_coordenador INT NOT NULL AUTO_INCREMENT, 
	nome_coordenador VARCHAR(50),
	email_coordenador VARCHAR(50) DEFAULT 'Sem email',
	whats_coordenador VARCHAR(50) DEFAULT 'Sem WhatsApp',  
	CONSTRAINT pk_coordenador PRIMARY KEY (id_coordenador) 
)
*/

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


INSERT INTO tipoInstituicao 
	VALUES ('pública'),
    		('privada')


INSERT INTO `siglainstituicao`(`sigla`) 
	VALUES ('Comunitária'),
    		('Confessional'),
            ('OSC'),
            ('Privada'),
            ('None'),
            ('EMEIF'),
            ('EMEF'),
            ('EMEI'),
            ('UEI'),
            ('Block')



//ALTER

ALTER TABLE usuario ADD fk_cargo int;
ALTER TABLE usuario ADD CONSTRAINT fk_cg FOREIGN KEY (fk_cargo) REFERENCES cargo (id_cargo);
ALTER TABLE usuario ADD fk_tipousuario int;
ALTER TABLE usuario ADD CONSTRAINT fk_tipo FOREIGN KEY (fk_tipousuario) REFERENCES tipoUsuario (id_tipousuario);


ALTER TABLE instituicao ADD CONSTRAINT fk_tip FOREIGN KEY (fk_tipoInstituicao) REFERENCES tipoInstituicao (id_inst);
ALTER TABLE instituicao ADD CONSTRAINT fk_distritoadm FOREIGN KEY (fk_distrito) REFERENCES distritoadm (id_distrito);
ALTER TABLE instituicao ADD CONSTRAINT fk_siglainst FOREIGN KEY (fk_sigla) REFERENCES siglainstituicao (id_sigla);

ALTER TABLE filial ADD CONSTRAINT fk_tipoinst FOREIGN KEY (fk_tipoInstituicaoFilial) REFERENCES tipoInstituicao (id_inst);

/*ALTER TABLE instituicao ADD fk_siglainst int;*/


/*ALTER TABLE instituicao ADD (
	convenio_semec VARCHAR(50), 
	educacao_infantil VARCHAR(50), 
	fundamental VARCHAR(50), 
	fundamental_eja VARCHAR(50), 
	outros_niveis VARCHAR(50)
);
*/


ALTER TABLE instituicao
    ADD COLUMN n_convenio INT AFTER convenio_semec,
    ADD COLUMN objeto VARCHAR(50) AFTER n_convenio,
    ADD COLUMN vigencia DATE AFTER objeto;

	
