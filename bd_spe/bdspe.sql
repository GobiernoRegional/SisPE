
CREATE TABLE tbprc_programa
( 
	rpr_codigo           char(6)  NOT NULL ,
	rpr_descripcion      varchar(1800)  NULL ,
	CONSTRAINT XPKtbprc_programa PRIMARY KEY (rpr_codigo )
)
;



CREATE TABLE tbprc_programaInversion
( 
	rpi_codigo           char(6)  NOT NULL ,
	rpi_uprovincia       varchar(200)  NULL ,
	rpi_udistrito        varchar(300)  NULL ,
	rpi_nestudio         varchar(300)  NULL ,
	rpi_rpr_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbprc_programaInversion PRIMARY KEY (rpi_codigo ),
	CONSTRAINT R_37 FOREIGN KEY (rpi_rpr_codigo) REFERENCES tbprc_programa(rpr_codigo)
)
;



CREATE TABLE tbprc_inversionano
( 
	ria_codigo           char(6)  NOT NULL ,
	ria_ano              integer  NULL ,
	ria_monto            numeric(12,3)  NULL ,
	ria_rpi_codigo       char(6)  NULL ,
	ria_total            numeric(12,3)  NULL ,
	CONSTRAINT XPKtbprc_inversionano PRIMARY KEY (ria_codigo ),
	CONSTRAINT R_40 FOREIGN KEY (ria_rpi_codigo) REFERENCES tbprc_programaInversion(rpi_codigo)
)
;



CREATE TABLE tbprc_politica
( 
	rpo_codigo           char(6)  NOT NULL ,
	rpo_descripcion      varchar(700)  NULL ,
	CONSTRAINT XPKtbprc_politica PRIMARY KEY (rpo_codigo )
)
;



CREATE TABLE tbprc_estrategia
( 
	res_codigo           char(6)  NOT NULL ,
	res_descripcion      varchar(3000)  NULL ,
	CONSTRAINT XPKtbprc_estrategia PRIMARY KEY (res_codigo )
)
;



CREATE TABLE tbPlanRegionalConcertado
( 
	prc_codigo           char(6)  NOT NULL ,
	prc_nombre           varchar(300)  NULL ,
	prc_descripcion      varchar(400)  NULL ,
	CONSTRAINT XPKtbPlanRegionalConcertado PRIMARY KEY (prc_codigo )
)
;



CREATE TABLE tbprc_capitulo
( 
	rca_codigo           char(6)  NOT NULL ,
	rca_nombre           varchar(300)  NULL ,
	rca_prc_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbprc_capitulo PRIMARY KEY (rca_codigo ),
	CONSTRAINT R_12 FOREIGN KEY (rca_prc_codigo) REFERENCES tbPlanRegionalConcertado(prc_codigo)
)
;



CREATE TABLE tbprc_subcapitulos
( 
	rsu_codigo           char(6)  NOT NULL ,
	rsu_nombre           varchar(600)  NULL ,
	rsu_rca_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbprc_subcapitulos PRIMARY KEY (rsu_codigo ),
	CONSTRAINT R_13 FOREIGN KEY (rsu_rca_codigo) REFERENCES tbprc_capitulo(rca_codigo)
)
;



CREATE TABLE tbprc_ejeEstrategico
( 
	rej_codigo           char(6)  NOT NULL ,
	rej_nombre           varchar(700)  NULL ,
	rej_rsu_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbprc_ejeEstrategico PRIMARY KEY (rej_codigo ),
	CONSTRAINT R_14 FOREIGN KEY (rej_rsu_codigo) REFERENCES tbprc_subcapitulos(rsu_codigo)
)
;



CREATE TABLE tbprc_objetivosEspecificos
( 
	roe_codigo           char(6)  NOT NULL ,
	roe_nombre           varchar(600)  NULL ,
	roe_rej_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbprc_objetivosEspecificos PRIMARY KEY (roe_codigo ),
	CONSTRAINT R_15 FOREIGN KEY (roe_rej_codigo) REFERENCES tbprc_ejeEstrategico(rej_codigo)
)
;



CREATE TABLE tbprc_tipoSector
( 
	pts_codigo           char(6)  NOT NULL ,
	pts_nombre           char(600)  NULL ,
	pts_rpo_codigo       char(6)  NULL ,
	pts_res_codigo       char(6)  NULL ,
	pts_rpr_codigo       char(6)  NULL ,
	pts_roe_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbprc_tipoSector PRIMARY KEY (pts_codigo ),
	CONSTRAINT R_19 FOREIGN KEY (pts_rpo_codigo) REFERENCES tbprc_politica(rpo_codigo),
CONSTRAINT R_20 FOREIGN KEY (pts_res_codigo) REFERENCES tbprc_estrategia(res_codigo),
CONSTRAINT R_21 FOREIGN KEY (pts_rpr_codigo) REFERENCES tbprc_programa(rpr_codigo),
CONSTRAINT R_22 FOREIGN KEY (pts_roe_codigo) REFERENCES tbprc_objetivosEspecificos(roe_codigo)
)
;



CREATE TABLE tbprc_Inversion
( 
	rin_codigo           char(6)  NOT NULL ,
	rin_año              integer  NULL ,
	rin_monto            numeric(12,3)  NULL ,
	rin_rej_codigo       char(18)  NULL ,
	rin_total            numeric(12,3)  NULL ,
	rin_porcentaje       numeric(12,3)  NULL ,
	rin_pts_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbprc_Inversion PRIMARY KEY (rin_codigo ),
	CONSTRAINT R_36 FOREIGN KEY (rin_pts_codigo) REFERENCES tbprc_tipoSector(pts_codigo)
)
;



CREATE TABLE tbprc_variable
( 
	rva_codigo           char(6)  NOT NULL ,
	rva_nombre           char(2000)  NULL ,
	rva_pts_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbprc_variable PRIMARY KEY (rva_codigo ),
	CONSTRAINT R_23 FOREIGN KEY (rva_pts_codigo) REFERENCES tbprc_tipoSector(pts_codigo)
)
;



CREATE TABLE tbprc_metas
( 
	rme_codigo           char(6)  NOT NULL ,
	rme_meta2014         numeric(12,3)  NULL ,
	rme_meta2018         numeric(12,3)  NULL ,
	rme_meta2021         numeric(12,3)  NULL ,
	rme_rva_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbprc_metas PRIMARY KEY (rme_codigo ),
	CONSTRAINT R_34 FOREIGN KEY (rme_rva_codigo) REFERENCES tbprc_variable(rva_codigo)
)
;



CREATE TABLE tbprc_lineaBase
( 
	rlb_codigo           char(6)  NOT NULL ,
	rlb_cantidad         integer  NULL ,
	rlb_ano              integer  NULL ,
	rlb_rva_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbprc_lineaBase PRIMARY KEY (rlb_codigo ),
	CONSTRAINT R_33 FOREIGN KEY (rlb_rva_codigo) REFERENCES tbprc_variable(rva_codigo)
)
;



CREATE TABLE tbprc_Indicador
( 
	rin_codigo           char(600)  NOT NULL ,
	rin_nombre           varchar(700)  NULL ,
	rin_umedida          varchar(50)  NULL ,
	rin_fuente           varchar(400)  NULL ,
	rin_rva_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbprc_Indicador PRIMARY KEY (rin_codigo ),
	CONSTRAINT R_32 FOREIGN KEY (rin_rva_codigo) REFERENCES tbprc_variable(rva_codigo)
)
;



CREATE TABLE tbPlanDesarrolloNacional
( 
	pdn_codigo           char(6)  NOT NULL ,
	pdn_titulo           varchar(50)  NULL ,
	pdn_descripcion      varchar(300)  NULL ,
	CONSTRAINT XPKtbPlanDesarrolloNacional PRIMARY KEY (pdn_codigo )
)
;



CREATE TABLE tbpdn_EjeEstrategico
( 
	nej_codigo           char(6)  NOT NULL ,
	nej_nombre           varchar(100)  NULL ,
	nej_pdn_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbpdn_EjeEstrategico PRIMARY KEY (nej_codigo ),
	CONSTRAINT R_11 FOREIGN KEY (nej_pdn_codigo) REFERENCES tbPlanDesarrolloNacional(pdn_codigo)
)
;



CREATE TABLE tbpdn_ProgramasEstrategicos
( 
	npe_codigo           char(6)  NOT NULL ,
	npe_tipo             varchar(200)  NULL ,
	npe_titulo           varchar(100)  NULL ,
	npe_ambito           varchar(200)  NULL ,
	npe_descripcion      varchar(200)  NULL ,
	npe_monto            numeric(12,3)  NULL ,
	npe_nej_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbpdn_ProgramasEstrategicos PRIMARY KEY (npe_codigo ),
	CONSTRAINT R_10 FOREIGN KEY (npe_nej_codigo) REFERENCES tbpdn_EjeEstrategico(nej_codigo)
);



CREATE TABLE tbpdn_objetivosEspecificos
( 
	noe_codigo           char(6)  NOT NULL ,
	noe_nombre           varchar(200)  NULL ,
	noe_nej_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbpdn_objetivosEspecificos PRIMARY KEY (noe_codigo ),
	CONSTRAINT R_8 FOREIGN KEY (noe_nej_codigo) REFERENCES tbpdn_EjeEstrategico(nej_codigo)
)
;



CREATE TABLE tbpdn_acciones
( 
	nac_codigo           char(6)  NOT NULL ,
	nac_descripcion      char(200)  NULL ,
	nac_noe_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbpdn_acciones PRIMARY KEY (nac_codigo ),
	CONSTRAINT R_9 FOREIGN KEY (nac_noe_codigo) REFERENCES tbpdn_objetivosEspecificos(noe_codigo)
)
;



CREATE TABLE tbpdn_OEIndicadores
( 
	noi_codigo           char(18)  NOT NULL ,
	noi_nombre           char(200)  NULL ,
	noi_umedida          char(50)  NULL ,
	noi_noe_codigo       char(6)  NULL ,
	noi_formula          char(100)  NULL ,
	noi_fuente           char(100)  NULL ,
	noi_linea            char(100)  NULL ,
	noi_tendencia        char(100)  NULL ,
	noi_metas            char(100)  NULL ,
	CONSTRAINT XPKtbpdn_OEIndicadores PRIMARY KEY (noi_codigo ),
	CONSTRAINT R_6 FOREIGN KEY (noi_noe_codigo) REFERENCES tbpdn_objetivosEspecificos(noe_codigo)
)
;



CREATE TABLE tbpdn_prioridades
( 
	npr_codigo           char(6)  NOT NULL ,
	npr_nombre           varchar(200)  NULL ,
	npr_nej_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbpdn_prioridades PRIMARY KEY (npr_codigo ),
	CONSTRAINT R_5 FOREIGN KEY (npr_nej_codigo) REFERENCES tbpdn_EjeEstrategico(nej_codigo)
)
;



CREATE TABLE tbpdn_lineamiento
( 
	nli_codigo           char(6)  NOT NULL ,
	nli_tipo             varchar(100)  NULL ,
	nli_descripcion      char(300)  NULL ,
	nli_nej_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbpdn_lineamiento PRIMARY KEY (nli_codigo ),
	CONSTRAINT R_4 FOREIGN KEY (nli_nej_codigo) REFERENCES tbpdn_EjeEstrategico(nej_codigo)
)
;



CREATE TABLE tbpdn_ObjetivoNacional
( 
	non_codigo           char(6)  NOT NULL ,
	non_nombre           varchar(200)  NULL ,
	non_descripcion      varchar(300)  NULL ,
	non_nej_codigo       char(6)  NULL ,
	CONSTRAINT XPKtbpdn_ObjetivoNacional PRIMARY KEY (non_codigo ),
	CONSTRAINT R_3 FOREIGN KEY (non_nej_codigo) REFERENCES tbpdn_EjeEstrategico(nej_codigo)
)
;


