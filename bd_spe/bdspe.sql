

CREATE TABLE tbpolitica
( 
	pol_codigo           char(6)  NOT NULL ,
	pol_descripcion      char(400)  NULL ,
	 PRIMARY KEY (pol_codigo )
)
;



CREATE TABLE tbestrategia
( 
	est_codigo           char(6)  NOT NULL ,
	est_descripcion      varchar(300)  NULL ,
	 PRIMARY KEY (est_codigo )
)
;



CREATE TABLE tbPlanDesarrollo
( 
	pde_codigo           char(6)  NOT NULL ,
	pde_titulo           varchar(500)  NULL ,
	pde_descripcion      varchar(1000)  NULL ,
	 PRIMARY KEY (pde_codigo )
)
;



CREATE TABLE tbcapitulo
( 
	cap_codigo           char(6)  NOT NULL ,
	cap_nombre           varchar(100)  NULL ,
	cap_pdn_codigo       char(6)  NULL ,
	 PRIMARY KEY (cap_codigo ),
	 FOREIGN KEY (cap_pdn_codigo) REFERENCES tbPlanDesarrollo(pde_codigo)
)
;



CREATE TABLE tbsubcapitulos
( 
	sub_codigo           char(6)  NOT NULL ,
	sub_nombre           varchar(100)  NULL ,
	sub_cap_codigo       char(6)  NULL ,
	 PRIMARY KEY (sub_codigo ),
	 FOREIGN KEY (sub_cap_codigo) REFERENCES tbcapitulo(cap_codigo)
)
;



CREATE TABLE tbEjeEstrategico
( 
	eje_codigo           char(6)  NOT NULL ,
	eje_nombre           varchar(200)  NULL ,
	eje_sub_codigo       char(6)  NULL ,
	 PRIMARY KEY (eje_codigo ),
	 FOREIGN KEY (eje_sub_codigo) REFERENCES tbsubcapitulos(sub_codigo)
)
;



CREATE TABLE tbobjetivo_Especifico
( 
	oes_codigo           char(6)  NOT NULL ,
	oes_nombre           char(300)  NULL ,
	oes_nej_codigo       char(6)  NULL ,
	 PRIMARY KEY (oes_codigo ),
	 FOREIGN KEY (oes_nej_codigo) REFERENCES tbEjeEstrategico(eje_codigo)
)
;



CREATE TABLE tbtipo_Sector
( 
	tse_codigo           char(6)  NOT NULL ,
	tse_nombre           char(300)  NULL ,
	tse_pol_codigo       char(6)  NULL ,
	tse_est_codigo       char(6)  NULL ,
	tse_oes_codigo       char(6)  NULL ,
	tse_eje_codigo       char(6)  NULL ,
	 PRIMARY KEY (tse_codigo ),
	 FOREIGN KEY (tse_pol_codigo) REFERENCES tbpolitica(pol_codigo),
 FOREIGN KEY (tse_est_codigo) REFERENCES tbestrategia(est_codigo),
 FOREIGN KEY (tse_oes_codigo) REFERENCES tbobjetivo_Especifico(oes_codigo),
 FOREIGN KEY (tse_eje_codigo) REFERENCES tbEjeEstrategico(eje_codigo)
)
;

CREATE TABLE tbprograma_Estrategia
( 
	pes_codigo           char(6)  NOT NULL ,
	pes_tipo             varchar(50)  NULL ,
	pes_titulo           char(18)  NULL ,
	pes_ambito           char(18)  NULL ,
	pes_descripcion      char(18)  NULL ,
	pes_monto            char(18)  NULL ,
	pes_eje_codigo       char(6)  NULL ,
	pes_tse_codigo       char(6)  NULL ,
	 PRIMARY KEY (pes_codigo ),
	 FOREIGN KEY (pes_eje_codigo) REFERENCES tbEjeEstrategico(eje_codigo),
	 FOREIGN KEY (pes_tse_codigo) REFERENCES tbtipo_Sector(tse_codigo)
)
;

CREATE TABLE tbvariable
( 
	var_codigo           char(6)  NOT NULL ,
	var_nombre           varchar(200)  NULL ,
	var_tse_codigo       char(6)  NULL ,
	var_justificacion    varchar(600)  NULL ,
	var_unidadAnalisis   varchar(200)  NULL ,
	var_ResposableGestion varchar(300)  NULL ,
	var_responsableReporte varchar(300)  NULL ,
	 PRIMARY KEY (var_codigo ),
	 FOREIGN KEY (var_tse_codigo) REFERENCES tbtipo_Sector(tse_codigo)
)
;



CREATE TABLE tbIndicador
( 
	ind_codigo           char(6)  NOT NULL ,
	ind_nombre           varchar(200)  NULL ,
	ind_umedida          varchar(100)  NULL ,
	ind_fuente           varchar(300)  NULL ,
	ind_rva_codigo       char(6)  NULL ,
	ind_baseCantidad     varchar(200)  NULL ,
	ind_baseAno          varchar(200)  NULL ,
	ind_formula          varchar(100)  NULL ,
	ind_tendencia        varchar(300)  NULL ,
	ind_linea            varchar(300)  NULL ,
	ind_noe_codigo       char(6)  NULL ,
	ind_intencion        char(18)  NULL ,
	ind_frecuencia       char(18)  NULL ,
	ind_periodo          char(18)  NULL ,
	 PRIMARY KEY (ind_codigo ),
	 FOREIGN KEY (ind_rva_codigo) REFERENCES tbvariable(var_codigo),
 FOREIGN KEY (ind_noe_codigo) REFERENCES tbobjetivo_Especifico(oes_codigo)
)
;


CREATE TABLE tbcargo
( 
	car_codigo           char(6)  NOT NULL ,
	car_nombre           varchar(100)  NULL ,
	 PRIMARY KEY (car_codigo )
)
;



CREATE TABLE tbubigeo_departamento
( 
	ude_codigo           char(2)  NOT NULL ,
	ude_nombre           char(100)  NULL ,
	 PRIMARY KEY (ude_codigo )
)
;



CREATE TABLE tbubigeo_provincia
( 
	upr_codigo           char(3)  NOT NULL ,
	upr_nombre           char(100)  NULL ,
	upr_ude_codigo       char(2)  NULL ,
	 PRIMARY KEY (upr_codigo ),
	 FOREIGN KEY (upr_ude_codigo) REFERENCES tbubigeo_departamento(ude_codigo)
)
;



CREATE TABLE tbubigeo_distrito
( 
	udi_codigo           char(4)  NOT NULL ,
	udi_nombre           char(18)  NULL ,
	udi_upr_codigo       char(3)  NULL ,
	 PRIMARY KEY (udi_codigo ),
	 FOREIGN KEY (udi_upr_codigo) REFERENCES tbubigeo_provincia(upr_codigo)
)
;



CREATE TABLE tbDependencia
( 
	dep_codigo           char(6)  NOT NULL ,
	dep_nombre           varchar(300)  NULL ,
	dep_telefono         char(9)  NULL ,
	dep_udi_codigo       char(4)  NULL ,
	 PRIMARY KEY (dep_codigo ),
	 FOREIGN KEY (dep_udi_codigo) REFERENCES tbubigeo_distrito(udi_codigo)
)
;


CREATE TABLE tbArea
( 
	are_codigo           char(6)  NOT NULL ,
	are_nombre           varchar(300)  NULL ,
	are_dep_codigo       char(6)  NULL ,
	 PRIMARY KEY (are_codigo ),
	 FOREIGN KEY (are_dep_codigo) REFERENCES tbDependencia(dep_codigo)
)
;



CREATE TABLE tbpersonal
( 
	per_codigo           char(6)  NOT NULL ,
	per_nombre           varchar(300)  NULL ,
	per_apellido         varchar(300)  NULL ,
	per_dni              char(8)  NULL ,
	per_fnac             date  NULL ,
	per_direccion        varchar(300)  NULL ,
	per_sexo             char(1)  NULL ,
	per_correo           varchar(300)  NULL ,
	per_telefono         char(9)  NULL ,
	per_estado           char(1)  NULL ,
	per_ind_codigo       char(6)  NULL ,
	per_car_codigo       char(6)  NULL ,
	per_are_codigo       char(6)  NULL ,
	per_udi_codigo       char(4)  NULL ,
	 PRIMARY KEY (per_codigo ),
	 FOREIGN KEY (per_ind_codigo) REFERENCES tbIndicador(ind_codigo),
 FOREIGN KEY (per_car_codigo) REFERENCES tbcargo(car_codigo),
 FOREIGN KEY (per_are_codigo) REFERENCES tbArea(are_codigo),
 FOREIGN KEY (per_udi_codigo) REFERENCES tbubigeo_distrito(udi_codigo)
)
;





CREATE TABLE tbprograma_Inversion
( 
	pin_codigo           char(6)  NOT NULL ,
	pin_nestudio         varchar(200)  NULL ,
	pin_npe_codigo       char(6)  NULL ,
	pin_udi_codigo       char(4)  NULL ,
	 PRIMARY KEY (pin_codigo ),
	 FOREIGN KEY (pin_npe_codigo) REFERENCES tbprograma_Estrategia(pes_codigo),
 FOREIGN KEY (pin_udi_codigo) REFERENCES tbubigeo_distrito(udi_codigo)
)
;


CREATE TABLE tbinversion_ano
( 
	ian_codigo           char(6)  NOT NULL ,
	ian_año              char(4)  NULL ,
	ian_monto            numeric(12,3)  NULL ,
	ian_pin_codigo       char(6)  NULL ,
	ian_total            numeric(12,3)  NULL ,
	 PRIMARY KEY (ian_codigo ),
	 FOREIGN KEY (ian_pin_codigo) REFERENCES tbprograma_Inversion(pin_codigo)
)
;



CREATE TABLE tbInversion
( 
	inv_codigo           char(6)  NOT NULL ,
	inv_año              char(4)  NULL ,
	inv_monto            numeric(12,3)  NULL ,
	inv_total            numeric(12,3)  NULL ,
	inv_porcentaje       char(6)  NULL ,
	inv_tse_codigo       char(6)  NULL ,
	 PRIMARY KEY (inv_codigo ),
	 FOREIGN KEY (inv_tse_codigo) REFERENCES tbtipo_Sector(tse_codigo)
)
;



CREATE TABLE tbmeta
( 
	met_codigo           char(6)  NOT NULL ,
	met_ano              char(4)  NULL ,
	met_ind_codigo       char(6)  NULL ,
	met_valor            numeric(12,3)  NULL ,
	 PRIMARY KEY (met_codigo ),
	 FOREIGN KEY (met_ind_codigo) REFERENCES tbIndicador(ind_codigo)
)
;



CREATE TABLE tbaccion
( 
	acc_codigo           char(6)  NOT NULL ,
	acc_descripcion      char(400)  NULL ,
	acc_obj_codigo       char(6)  NULL ,
	 PRIMARY KEY (acc_codigo ),
	 FOREIGN KEY (acc_obj_codigo) REFERENCES tbobjetivo_Especifico(oes_codigo)
)
;



CREATE TABLE tbprioridad
( 
	pri_codigo           char(6)  NOT NULL ,
	pri_nombre           char(300)  NULL ,
	pri_eje_codigo       char(6)  NULL ,
	 PRIMARY KEY (pri_codigo ),
	 FOREIGN KEY (pri_eje_codigo) REFERENCES tbEjeEstrategico(eje_codigo)
)
;



CREATE TABLE tbObjetivo_Nacional
( 
	ona_codigo           char(6)  NOT NULL ,
	ona_nombre           char(100)  NULL ,
	ona_descripcion      char(300)  NULL ,
	ona_eje_codigo       char(6)  NULL ,
	 PRIMARY KEY (ona_codigo ),
	 FOREIGN KEY (ona_eje_codigo) REFERENCES tbEjeEstrategico(eje_codigo)
)
;

