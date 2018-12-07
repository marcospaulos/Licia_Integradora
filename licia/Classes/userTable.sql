CREATE TABLE public.integradora_user
(
  id_u SERIAL PRIMARY KEY,
  login_user character varying(50) NOT NULL,
  nome_user character varying(50) NOT NULL,
  email_user character varying(50) NOT NULL,
  senha_user character varying(50) NOT NULL,
  perfil_user character varying(50) NOT NULL

)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.integradora_user
  OWNER TO postgres;