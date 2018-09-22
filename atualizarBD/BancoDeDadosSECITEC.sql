CREATE TABLE curso (
	id_curso int auto_increment primary key not null,
	nome_curso varchar(300) not null,
    imgPadrao_curso varchar(200) not null
)default character set = utf8;



CREATE TABLE minicurso (	
    id_Mcurso int auto_increment primary key not null,
    nome_Mcurso varchar(300) not null,
    des_Mcurso varchar(500),
    local_Mcurso varchar(120),
    dia_Mcurso datetime,
	ministrante_Mcurso varchar(300),
    ch_Mcurso float(4,1),
    vagas_Mcurso int,
    img_Minicurso varchar(200),
    FK_Curso_id_curso int not null,
    foreign key (FK_Curso_id_curso)  references Curso (id_curso)
)default character set = utf8;


CREATE TABLE palestras (	
    id_Mcurso int auto_increment primary key not null,
    nome_Mcurso varchar(300) not null,
    des_Mcurso varchar(500),
    local_Mcurso varchar(120),
    dia_Mcurso datetime,
	ministrante_Mcurso varchar(300),
    ch_Mcurso float(4,1),
    vagas_Mcurso int,
    img_Minicurso varchar(200),
    FK_Curso_id_curso int not null,
    foreign key (FK_Curso_id_curso)  references Curso (id_curso)
)default character set = utf8;

CREATE TABLE outraatv (	
    id_Mcurso int auto_increment primary key not null,
    nome_Mcurso varchar(300) not null,
    des_Mcurso varchar(500),
    local_Mcurso varchar(120),
    dia_Mcurso datetime,
	ministrante_Mcurso varchar(300),
    ch_Mcurso float(4,1),
    vagas_Mcurso int,
    img_Minicurso varchar(200),
    FK_Curso_id_curso int not null,
    foreign key (FK_Curso_id_curso)  references Curso (id_curso)
)default character set = utf8;


CREATE TABLE usuarios (
	id_usuario int not null auto_increment primary key,
	nome_completo varchar(60) not null,
	nome_login varchar(60) not null,
    senha varchar(16) not null
)default character set = utf8;