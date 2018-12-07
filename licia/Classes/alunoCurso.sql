CREATE TABLE public.alunoCurso
(
  id SERIAL PRIMARY KEY,
  nome_aluno character varying(50) NOT NULL,
  matrcula_aluno character varying(40) NOT NULL,
  curso_aluno character varying NOT NULL
  
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.alunoCurso
  OWNER TO postgres;