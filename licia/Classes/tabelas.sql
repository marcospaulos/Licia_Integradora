CREATE TABLE public.integradora
(
  id SERIAL PRIMARY KEY,
  nome_aluno character varying(50) NOT NULL,
  matrcula_aluno character varying(40) NOT NULL,
  cod_aluno character varying NOT NULL,
  date_added character varying(100) NOT NULL,
  $date_updat character varying(100) NOT NULL,
  periodo_letivo character varying(40) NOT NULL,
  nota1 integer NOT NULL,
  nota2 integer NOT NULL,
  nota3 integer NOT NULL,
  nota4 integer NOT NULL,
  nota5 integer NOT NULL,
  nota6 integer NOT NULL,
  nota7 integer NOT NULL,
  nota8 integer NOT NULL,
  nota9 integer NOT NULL,
  nota10 integer NOT NULL,
  nota11 integer NOT NULL,
  nota12 integer NOT NULL,
  nota13 integer NOT NULL,
  nota14 integer NOT NULL,
  nota15 integer NOT NULL,
  nota16 integer NOT NULL,
  nota17 integer NOT NULL,
  nota18 integer NOT NULL,
  nota19 integer NOT NULL,
  nota20 integer NOT NULL,
  multiplicada character varying(20) NOT NULL
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.integradora
  OWNER TO postgres;


--Tabela vestibalm


CREATE TABLE IF NOT EXISTS vestibalm(
  id SERIAL PRIMARY KEY,
  nome_aluno character varying(50) NOT NULL,
  numer_aluno character varying(40) NOT NULL,
  cod_aluno character varying NOT NULL,
  date_added character varying(100) NOT NULL,
  date_updat character varying(100) NOT NULL,
  periodo_letivo character varying(40) NOT NULL,
  nota1 integer NOT NULL,
  nota2 integer NOT NULL,
  nota3 integer NOT NULL,
  nota4 integer NOT NULL,
  nota5 integer NOT NULL,
  nota6 integer NOT NULL,
  nota7 integer NOT NULL,
  nota8 integer NOT NULL,
  nota9 integer NOT NULL,
  nota10 integer NOT NULL,
  nota11 integer NOT NULL,
  nota12 integer NOT NULL,
  nota13 integer NOT NULL,
  nota14 integer NOT NULL,
  nota15 integer NOT NULL,
  nota16 integer NOT NULL,
  nota17 integer NOT NULL,
  nota18 integer NOT NULL,
  nota19 integer NOT NULL,
  nota20 integer NOT NULL,
  nota21 integer NOT NULL,
 nota22	 integer NOT NULL,
 nota23	 integer NOT NULL,
 nota24	 integer NOT NULL,
 nota25	 integer NOT NULL,
 nota26	 integer NOT NULL,
 nota27	 integer NOT NULL,
 nota28	 integer NOT NULL,
 nota29	 integer NOT NULL,
 nota30	 integer NOT NULL,
 nota31	 integer NOT NULL,
 nota32	 integer NOT NULL,
 nota33	 integer NOT NULL,
 nota34	 integer NOT NULL,
 nota35	 integer NOT NULL,
 nota36	 integer NOT NULL,
 nota37	 integer NOT NULL,
 nota38	 integer NOT NULL,
 nota39	 integer NOT NULL,
 nota40	 integer NOT NULL

)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.vestibalm
  OWNER TO postgres;


ALTER TABLE vestibalm 
ADD COLUMN soma_ling_por character varying(20) NOT NULL, 
ADD COLUMN soma_cien_hum character varying(20) NOT NULL, 
ADD COLUMN soma_cien_nat character varying(20) NOT NULL, 
ADD COLUMN soma_mat_tec character varying(20) NOT NULL;