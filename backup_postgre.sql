--
-- PostgreSQL database dump
--

\restrict cUYj2qqkrl9rwXQI6fPdj41bgFd7acaleI9iGhyYiKmRNGUIVYuZu45bYkNHKqx

-- Dumped from database version 18.6
-- Dumped by pg_dump version 18.6

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

-- *not* creating schema, since initdb creates it


ALTER SCHEMA public OWNER TO postgres;

--
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS '';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: bienes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bienes (
    id integer NOT NULL,
    codigo_b character varying(30) NOT NULL,
    nombre_b character varying(100) NOT NULL,
    marca_b character varying(50) NOT NULL,
    modelo_b character varying(50) NOT NULL,
    color_b character varying(50) NOT NULL,
    serial_b character varying(50) NOT NULL,
    descripcion_b text NOT NULL,
    fecha_ingreso_b date NOT NULL,
    direccion character varying(100) NOT NULL,
    coordinacion character varying(100) NOT NULL,
    observaciones text,
    ubicacion_bienes_id integer NOT NULL,
    estado_bien_id integer NOT NULL,
    fecha_estado date NOT NULL,
    organismos_id integer NOT NULL,
    fecha_creacion timestamp without time zone NOT NULL
);


ALTER TABLE public.bienes OWNER TO postgres;

--
-- Name: TABLE bienes; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.bienes IS 'Tabla que almacena los datos de los bienes asignados a la organización 171.';


--
-- Name: COLUMN bienes.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN bienes.codigo_b; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.codigo_b IS 'Campo que almacena el código del bien.';


--
-- Name: COLUMN bienes.nombre_b; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.nombre_b IS 'Campo que almacena el nombre del bien.';


--
-- Name: COLUMN bienes.marca_b; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.marca_b IS 'Campo que almacena la marca del bien.';


--
-- Name: COLUMN bienes.modelo_b; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.modelo_b IS 'Campo que almacena el modelo del bien.';


--
-- Name: COLUMN bienes.color_b; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.color_b IS 'Campo que almacena el color del bien.';


--
-- Name: COLUMN bienes.serial_b; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.serial_b IS 'Campo que almacena el serial del bien.';


--
-- Name: COLUMN bienes.descripcion_b; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.descripcion_b IS 'Campo que almacena la descripción del bien.';


--
-- Name: COLUMN bienes.fecha_ingreso_b; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.fecha_ingreso_b IS 'Campo que almacena la fecha de ingreso del bien.';


--
-- Name: COLUMN bienes.direccion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.direccion IS 'Campo que almacena el nombre de la dirección a que se asigna el bien.';


--
-- Name: COLUMN bienes.coordinacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.coordinacion IS 'Campo que almacena el nombre de la coordinación a que se asigna el bien.';


--
-- Name: COLUMN bienes.observaciones; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.observaciones IS 'Campo que almacena las observaciones del bien.';


--
-- Name: COLUMN bienes.ubicacion_bienes_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.ubicacion_bienes_id IS 'Campo que se relaciona con la tabla ubicación de bienes.';


--
-- Name: COLUMN bienes.estado_bien_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.estado_bien_id IS 'Campo que se relaciona con la tabla estados de bien.';


--
-- Name: COLUMN bienes.fecha_estado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.fecha_estado IS 'Campo que almacena la fecha de estado del bien.';


--
-- Name: COLUMN bienes.organismos_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.organismos_id IS 'Campo que se relaciona con la tabla organismo e indica el organismo que se a asignado el bien.';


--
-- Name: COLUMN bienes.fecha_creacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bienes.fecha_creacion IS 'Campo que almacena la fecha de registro automáticamente del sistema.';


--
-- Name: bienes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bienes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.bienes_id_seq OWNER TO postgres;

--
-- Name: bienes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.bienes_id_seq OWNED BY public.bienes.id;


--
-- Name: bitacora; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bitacora (
    id integer NOT NULL,
    usuario_aplicacion character varying(60) NOT NULL,
    nombre_esquema character varying(60) NOT NULL,
    nombre_tabla character varying(60) NOT NULL,
    proceso character varying(60) NOT NULL,
    valor_anterior text,
    valor_nuevo text,
    fecha_operacion timestamp(6) without time zone NOT NULL
);


ALTER TABLE public.bitacora OWNER TO postgres;

--
-- Name: TABLE bitacora; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.bitacora IS 'Tabla que almacena los trazas que se van generando en el uso de la aplicación';


--
-- Name: COLUMN bitacora.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitacora.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN bitacora.usuario_aplicacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitacora.usuario_aplicacion IS 'Campo que almacena el usuario que realizo una petición en el sistema.';


--
-- Name: COLUMN bitacora.nombre_esquema; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitacora.nombre_esquema IS 'Campo que almacena el esquema de la base de datos donde se encuentra la tabla que tuvo cambios.';


--
-- Name: COLUMN bitacora.nombre_tabla; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitacora.nombre_tabla IS 'Campo que almacena la tabla que tuvo un cambio.';


--
-- Name: COLUMN bitacora.proceso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitacora.proceso IS 'Campo que almacena el tipo de proceso que se realizo en el sistema.';


--
-- Name: COLUMN bitacora.valor_anterior; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitacora.valor_anterior IS 'Campo que almacena el valor que tenia antes de hacer el cambio en el sistema.';


--
-- Name: COLUMN bitacora.valor_nuevo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitacora.valor_nuevo IS 'Campo que almacena el nuevo valor registrado en el sistema.';


--
-- Name: COLUMN bitacora.fecha_operacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitacora.fecha_operacion IS 'Campo que almacena la fecha que se realizo la petición';


--
-- Name: bitacora_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bitacora_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.bitacora_id_seq OWNER TO postgres;

--
-- Name: bitacora_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.bitacora_id_seq OWNED BY public.bitacora.id;


--
-- Name: cargos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cargos (
    id integer NOT NULL,
    nombre_cargo character varying(100) NOT NULL
);


ALTER TABLE public.cargos OWNER TO postgres;

--
-- Name: TABLE cargos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.cargos IS 'Tabla que almacena los datos de los cargos del personal Ven911.';


--
-- Name: COLUMN cargos.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cargos.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN cargos.nombre_cargo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cargos.nombre_cargo IS 'Campo que almacena el nombre del cargo del personal Ven911.';


--
-- Name: cargos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cargos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.cargos_id_seq OWNER TO postgres;

--
-- Name: cargos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cargos_id_seq OWNED BY public.cargos.id;


--
-- Name: control_bienes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.control_bienes (
    id integer NOT NULL,
    fecha_creacion timestamp without time zone NOT NULL,
    grupo_personal_id integer NOT NULL,
    materiales_recibe text,
    materiales_entrega text
);


ALTER TABLE public.control_bienes OWNER TO postgres;

--
-- Name: TABLE control_bienes; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.control_bienes IS 'Tabla que almacena el control de bienes durante las guardias';


--
-- Name: control_bienes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.control_bienes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.control_bienes_id_seq OWNER TO postgres;

--
-- Name: control_bienes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.control_bienes_id_seq OWNED BY public.control_bienes.id;


--
-- Name: director; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.director (
    cedula_dir integer NOT NULL,
    p_apellido_dir character varying(50),
    s_apellido_dir character varying(50),
    p_nombre_dir character varying(50),
    s_nombre_dir character varying(50),
    grado_instruccion_dir character varying(50),
    cargo_dir character varying(50)
);


ALTER TABLE public.director OWNER TO postgres;

--
-- Name: estadisticas_solicitud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estadisticas_solicitud (
    id integer NOT NULL,
    efectivo integer NOT NULL,
    no_efectivo integer NOT NULL,
    sin_despacho integer NOT NULL,
    repetida integer NOT NULL,
    sabotaje integer NOT NULL,
    informacion integer NOT NULL,
    abandonada integer NOT NULL,
    total_solici integer NOT NULL,
    mayor_rele character varying(255) NOT NULL,
    mes character varying(20) NOT NULL,
    ano integer NOT NULL,
    guardia_id integer NOT NULL
);


ALTER TABLE public.estadisticas_solicitud OWNER TO postgres;

--
-- Name: TABLE estadisticas_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.estadisticas_solicitud IS 'Tabla que almacena los diferentes tipos de estatus de la solicitud.';


--
-- Name: COLUMN estadisticas_solicitud.guardia_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.estadisticas_solicitud.guardia_id IS 'Campo almacena id de registros de la tabla de guardias';


--
-- Name: estadisticas_solicitud_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estadisticas_solicitud_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.estadisticas_solicitud_id_seq OWNER TO postgres;

--
-- Name: estadisticas_solicitud_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estadisticas_solicitud_id_seq OWNED BY public.estadisticas_solicitud.id;


--
-- Name: estado_bien; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estado_bien (
    id integer NOT NULL,
    estado_bien character varying(100) NOT NULL
);


ALTER TABLE public.estado_bien OWNER TO postgres;

--
-- Name: TABLE estado_bien; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.estado_bien IS 'Tabla que almacena los datos del estado en que se encuentra el bien asignado.';


--
-- Name: COLUMN estado_bien.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.estado_bien.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN estado_bien.estado_bien; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.estado_bien.estado_bien IS 'Campo que almacena el tipo de estado del bien.';


--
-- Name: estado_bien_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estado_bien_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.estado_bien_id_seq OWNER TO postgres;

--
-- Name: estado_bien_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estado_bien_id_seq OWNED BY public.estado_bien.id;


--
-- Name: estado_civil; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estado_civil (
    id integer NOT NULL,
    estado_civil character varying(30) NOT NULL
);


ALTER TABLE public.estado_civil OWNER TO postgres;

--
-- Name: TABLE estado_civil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.estado_civil IS 'Tabla que almacena los datos del estado civil del personal 171.';


--
-- Name: COLUMN estado_civil.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.estado_civil.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN estado_civil.estado_civil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.estado_civil.estado_civil IS 'Campo que almacena el nombre del estado civil.';


--
-- Name: estado_civil_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estado_civil_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.estado_civil_id_seq OWNER TO postgres;

--
-- Name: estado_civil_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estado_civil_id_seq OWNED BY public.estado_civil.id;


--
-- Name: estado_usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estado_usuario (
    id integer NOT NULL,
    nombre_estado character varying(60) NOT NULL
);


ALTER TABLE public.estado_usuario OWNER TO postgres;

--
-- Name: TABLE estado_usuario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.estado_usuario IS 'Tabla que almacena los datos del estado que se encuentra el usuario.';


--
-- Name: COLUMN estado_usuario.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.estado_usuario.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN estado_usuario.nombre_estado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.estado_usuario.nombre_estado IS 'Campo que almacena el nombre del estado del usuario. Activo, Inactivo';


--
-- Name: estado_usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estado_usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.estado_usuario_id_seq OWNER TO postgres;

--
-- Name: estado_usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estado_usuario_id_seq OWNED BY public.estado_usuario.id;


--
-- Name: estados; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estados (
    id integer NOT NULL,
    nombre_estado character varying(100) NOT NULL
);


ALTER TABLE public.estados OWNER TO postgres;

--
-- Name: TABLE estados; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.estados IS 'Tabla que almacena los datos de los estados.';


--
-- Name: COLUMN estados.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.estados.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN estados.nombre_estado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.estados.nombre_estado IS 'Campo que almacena el nombre del estado.';


--
-- Name: estados_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.estados_id_seq OWNER TO postgres;

--
-- Name: estados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estados_id_seq OWNED BY public.estados.id;


--
-- Name: estatus_personal; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estatus_personal (
    id integer NOT NULL,
    estatus character varying(30) NOT NULL
);


ALTER TABLE public.estatus_personal OWNER TO postgres;

--
-- Name: TABLE estatus_personal; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.estatus_personal IS 'Tabla que almacena los datos del estatus del personal 171.Su valor activo y/o inactivo.';


--
-- Name: COLUMN estatus_personal.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.estatus_personal.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN estatus_personal.estatus; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.estatus_personal.estatus IS 'Campo que almacena el estatus del personal 171.';


--
-- Name: estatus_personal_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estatus_personal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.estatus_personal_id_seq OWNER TO postgres;

--
-- Name: estatus_personal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estatus_personal_id_seq OWNED BY public.estatus_personal.id;


--
-- Name: estatus_solicitud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estatus_solicitud (
    id integer NOT NULL,
    tipo_estatus character varying(100) NOT NULL
);


ALTER TABLE public.estatus_solicitud OWNER TO postgres;

--
-- Name: TABLE estatus_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.estatus_solicitud IS 'Tabla que almacena los diferentes tipos de estatus de la solicitud.';


--
-- Name: COLUMN estatus_solicitud.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.estatus_solicitud.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN estatus_solicitud.tipo_estatus; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.estatus_solicitud.tipo_estatus IS 'Campo que almacena el tipo de estatus de la solicitud';


--
-- Name: estatus_solicitud_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estatus_solicitud_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.estatus_solicitud_id_seq OWNER TO postgres;

--
-- Name: estatus_solicitud_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estatus_solicitud_id_seq OWNED BY public.estatus_solicitud.id;


--
-- Name: genero; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.genero (
    id integer NOT NULL,
    genero character varying(30) NOT NULL
);


ALTER TABLE public.genero OWNER TO postgres;

--
-- Name: TABLE genero; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.genero IS 'Tabla que almacena los datos del genero del personal 171.';


--
-- Name: COLUMN genero.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.genero.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN genero.genero; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.genero.genero IS 'Campo que almacena el genero del personal 171.';


--
-- Name: genero_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.genero_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.genero_id_seq OWNER TO postgres;

--
-- Name: genero_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.genero_id_seq OWNED BY public.genero.id;


--
-- Name: grado_instruccion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.grado_instruccion (
    id integer NOT NULL,
    grado_instruccion character varying(50) NOT NULL
);


ALTER TABLE public.grado_instruccion OWNER TO postgres;

--
-- Name: TABLE grado_instruccion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.grado_instruccion IS 'Tabla que almacena los datos del grado de instrucción del personal 911.';


--
-- Name: COLUMN grado_instruccion.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.grado_instruccion.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN grado_instruccion.grado_instruccion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.grado_instruccion.grado_instruccion IS 'Campo que almacena el nombre del grado de instrucción.';


--
-- Name: grado_instruccion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.grado_instruccion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.grado_instruccion_id_seq OWNER TO postgres;

--
-- Name: grado_instruccion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.grado_instruccion_id_seq OWNED BY public.grado_instruccion.id;


--
-- Name: grupos_guardia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.grupos_guardia (
    id integer NOT NULL,
    nombre_grupo character varying(100) NOT NULL
);


ALTER TABLE public.grupos_guardia OWNER TO postgres;

--
-- Name: TABLE grupos_guardia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.grupos_guardia IS 'Tabla que almacena los datos de los grupos de guardia.';


--
-- Name: COLUMN grupos_guardia.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.grupos_guardia.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN grupos_guardia.nombre_grupo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.grupos_guardia.nombre_grupo IS 'Campo que almacena el nombre del grupo de guardias.';


--
-- Name: grupos_guardia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.grupos_guardia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.grupos_guardia_id_seq OWNER TO postgres;

--
-- Name: grupos_guardia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.grupos_guardia_id_seq OWNED BY public.grupos_guardia.id;


--
-- Name: guardias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.guardias (
    id integer NOT NULL,
    fecha_inicio_g timestamp without time zone,
    fecha_fin_g timestamp without time zone,
    apertura_g text,
    cierre_g text,
    grupos_guardia_id integer NOT NULL,
    usuario_entrada_id integer,
    usuario_salida_id integer,
    control_bienes_id integer NOT NULL
);


ALTER TABLE public.guardias OWNER TO postgres;

--
-- Name: TABLE guardias; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.guardias IS 'Tabla que almacena los datos de los registros de las guardias realizadas por el personal 171.';


--
-- Name: COLUMN guardias.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.guardias.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN guardias.fecha_inicio_g; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.guardias.fecha_inicio_g IS 'Campo que almacena la fecha de inicio de la guardia.';


--
-- Name: COLUMN guardias.fecha_fin_g; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.guardias.fecha_fin_g IS 'Campo que almacena la fecha de salida de la guardia.';


--
-- Name: COLUMN guardias.apertura_g; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.guardias.apertura_g IS 'Campo que almacena la descripción de la apertura de la guardia.';


--
-- Name: COLUMN guardias.cierre_g; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.guardias.cierre_g IS 'Campo que almacena la descripción del cierre de la guardia.';


--
-- Name: COLUMN guardias.grupos_guardia_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.guardias.grupos_guardia_id IS 'Campo que se relaciona con la tabla grupos de guardia e indica el grupo de entrada de la guardia.';


--
-- Name: COLUMN guardias.usuario_entrada_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.guardias.usuario_entrada_id IS 'Campo que se relaciona con la tabla de usuarios e indica el usuario que registra la entrada de la guardia.';


--
-- Name: COLUMN guardias.usuario_salida_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.guardias.usuario_salida_id IS 'Campo que se relaciona con la tabla de usuarios e indica el usuario que registra salda de la guardia.';


--
-- Name: COLUMN guardias.control_bienes_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.guardias.control_bienes_id IS 'campo que almacena el valor de registro proveniente de la tabla "control_bienes"';


--
-- Name: guardias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.guardias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.guardias_id_seq OWNER TO postgres;

--
-- Name: guardias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.guardias_id_seq OWNED BY public.guardias.id;


--
-- Name: motivo_protocolo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.motivo_protocolo (
    id integer NOT NULL,
    descripcion text,
    motivo_id integer
);


ALTER TABLE public.motivo_protocolo OWNER TO postgres;

--
-- Name: motivo_solicitud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.motivo_solicitud (
    id integer NOT NULL,
    nombre_motivo character varying(60),
    motivo_grupo_id integer NOT NULL
);


ALTER TABLE public.motivo_solicitud OWNER TO postgres;

--
-- Name: TABLE motivo_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.motivo_solicitud IS 'tabla que almacena los diferentes motivos reflejados del grupo de solicitud';


--
-- Name: COLUMN motivo_solicitud.motivo_grupo_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.motivo_solicitud.motivo_grupo_id IS 'Campo que almacena los ID de los grupos de motivos de solicitud';


--
-- Name: motivo_solicitud_grupo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.motivo_solicitud_grupo (
    id integer NOT NULL,
    nombre_motivo_grupo character(40) NOT NULL
);


ALTER TABLE public.motivo_solicitud_grupo OWNER TO postgres;

--
-- Name: TABLE motivo_solicitud_grupo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.motivo_solicitud_grupo IS 'Tabla que almacena los grupos de los motivos de solicitudes';


--
-- Name: COLUMN motivo_solicitud_grupo.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.motivo_solicitud_grupo.id IS 'campo que almacena el ID del motivo de solicitud en grupo';


--
-- Name: COLUMN motivo_solicitud_grupo.nombre_motivo_grupo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.motivo_solicitud_grupo.nombre_motivo_grupo IS 'campo que almacena el nombre del grupo en motivo a solicitud';


--
-- Name: municipios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.municipios (
    id integer NOT NULL,
    nombre_municipio character varying(100) NOT NULL,
    estados_id integer NOT NULL
);


ALTER TABLE public.municipios OWNER TO postgres;

--
-- Name: TABLE municipios; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.municipios IS 'Tabla que almacena los datos de los municipios.';


--
-- Name: COLUMN municipios.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.municipios.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN municipios.nombre_municipio; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.municipios.nombre_municipio IS 'Campo que almacena el nombre de los municipios.';


--
-- Name: COLUMN municipios.estados_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.municipios.estados_id IS 'Campo que se relaciona con la tabla estados.';


--
-- Name: municipios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.municipios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.municipios_id_seq OWNER TO postgres;

--
-- Name: municipios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.municipios_id_seq OWNED BY public.municipios.id;


--
-- Name: observaciones; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.observaciones (
    id integer NOT NULL,
    notas text,
    acciones_pen text,
    apoyo_adm text,
    anexo text,
    fecha_creacion_obs timestamp without time zone,
    guardias_id integer,
    organismos_id integer
);


ALTER TABLE public.observaciones OWNER TO postgres;

--
-- Name: observaciones_entrada; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.observaciones_entrada (
    id integer NOT NULL,
    tipo_obse_e character varying(50) NOT NULL
);


ALTER TABLE public.observaciones_entrada OWNER TO postgres;

--
-- Name: TABLE observaciones_entrada; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.observaciones_entrada IS 'Tabla que almacena los datos de las observaciones de entrada del personal de guardia.';


--
-- Name: COLUMN observaciones_entrada.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.observaciones_entrada.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN observaciones_entrada.tipo_obse_e; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.observaciones_entrada.tipo_obse_e IS 'Campo que almacena el tipo de observación de entrada del personal de guardia.';


--
-- Name: observaciones_entrada_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.observaciones_entrada_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.observaciones_entrada_id_seq OWNER TO postgres;

--
-- Name: observaciones_entrada_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.observaciones_entrada_id_seq OWNED BY public.observaciones_entrada.id;


--
-- Name: observaciones_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.observaciones_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.observaciones_id_seq OWNER TO postgres;

--
-- Name: observaciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.observaciones_id_seq OWNED BY public.observaciones.id;


--
-- Name: observaciones_salida; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.observaciones_salida (
    id integer NOT NULL,
    tipo_obse_s character varying(50) NOT NULL
);


ALTER TABLE public.observaciones_salida OWNER TO postgres;

--
-- Name: TABLE observaciones_salida; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.observaciones_salida IS 'Tabla que almacena los datos de las observaciones de salida del personal de guardia.';


--
-- Name: COLUMN observaciones_salida.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.observaciones_salida.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN observaciones_salida.tipo_obse_s; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.observaciones_salida.tipo_obse_s IS 'Campo que almacena el tipo de observación de salida del personal de guardia.';


--
-- Name: observaciones_salida_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.observaciones_salida_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.observaciones_salida_id_seq OWNER TO postgres;

--
-- Name: observaciones_salida_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.observaciones_salida_id_seq OWNED BY public.observaciones_salida.id;


--
-- Name: organismos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.organismos (
    id integer NOT NULL,
    nombre_oganismos character varying(100) NOT NULL
);


ALTER TABLE public.organismos OWNER TO postgres;

--
-- Name: TABLE organismos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.organismos IS 'Tabla que almacena los datos de los diferentes organismos al que pertenece el personal 171.';


--
-- Name: COLUMN organismos.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.organismos.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN organismos.nombre_oganismos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.organismos.nombre_oganismos IS 'Campo que almacena el nombre del organismo.';


--
-- Name: organismos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.organismos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.organismos_id_seq OWNER TO postgres;

--
-- Name: organismos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.organismos_id_seq OWNED BY public.organismos.id;


--
-- Name: organismos_solicitud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.organismos_solicitud (
    id integer NOT NULL,
    nombre_org character varying(100) NOT NULL
);


ALTER TABLE public.organismos_solicitud OWNER TO postgres;

--
-- Name: TABLE organismos_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.organismos_solicitud IS 'Tabla que almacena los datos de los distintos organismos que dan atención a la solicitud.';


--
-- Name: COLUMN organismos_solicitud.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.organismos_solicitud.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN organismos_solicitud.nombre_org; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.organismos_solicitud.nombre_org IS 'Campo que almacena el nombre del organismo.';


--
-- Name: organismos_solicitud_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.organismos_solicitud_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.organismos_solicitud_id_seq OWNER TO postgres;

--
-- Name: organismos_solicitud_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.organismos_solicitud_id_seq OWNED BY public.organismos_solicitud.id;


--
-- Name: parantesco_personal; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.parantesco_personal (
    id integer NOT NULL,
    cedula_p integer,
    nombre_p character varying(50) NOT NULL,
    apellido_p character varying(50) NOT NULL,
    telefono_p character varying(15) NOT NULL,
    observaciones_p text,
    personal_cedula integer NOT NULL,
    tipo_parenstesco_id integer NOT NULL
);


ALTER TABLE public.parantesco_personal OWNER TO postgres;

--
-- Name: TABLE parantesco_personal; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.parantesco_personal IS 'Tabla que almacena los datos de los parentescos del personal Ven911.';


--
-- Name: COLUMN parantesco_personal.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.parantesco_personal.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN parantesco_personal.cedula_p; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.parantesco_personal.cedula_p IS 'Campo que almacena el número de cédula del familiar del personal Ven911.';


--
-- Name: COLUMN parantesco_personal.nombre_p; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.parantesco_personal.nombre_p IS 'Campo que almacena el nombre del familiar del personal Ven911.';


--
-- Name: COLUMN parantesco_personal.apellido_p; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.parantesco_personal.apellido_p IS 'Campo que almacena el apellido del familiar del personal Ven 911.';


--
-- Name: COLUMN parantesco_personal.telefono_p; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.parantesco_personal.telefono_p IS 'Campo que almacena el número del telefono del familiar del personal  Ven911.';


--
-- Name: COLUMN parantesco_personal.observaciones_p; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.parantesco_personal.observaciones_p IS 'Campo que almacena las observaciones del familiar del personal  Ven911.';


--
-- Name: COLUMN parantesco_personal.personal_cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.parantesco_personal.personal_cedula IS 'Campo que se relaciona con la tabla personal Ven911.';


--
-- Name: COLUMN parantesco_personal.tipo_parenstesco_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.parantesco_personal.tipo_parenstesco_id IS 'Campo que se relaciona con la tabla tipo_parentesco ';


--
-- Name: parantesco_personal_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.parantesco_personal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.parantesco_personal_id_seq OWNER TO postgres;

--
-- Name: parantesco_personal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.parantesco_personal_id_seq OWNED BY public.parantesco_personal.id;


--
-- Name: parroquias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.parroquias (
    id integer NOT NULL,
    nombre_parroquia character varying(100) NOT NULL,
    municipios_id integer NOT NULL
);


ALTER TABLE public.parroquias OWNER TO postgres;

--
-- Name: TABLE parroquias; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.parroquias IS 'Tabla que almacena los datos de las parroquias.';


--
-- Name: COLUMN parroquias.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.parroquias.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN parroquias.nombre_parroquia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.parroquias.nombre_parroquia IS 'Campo que almacena el nombre de las parroquias.';


--
-- Name: COLUMN parroquias.municipios_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.parroquias.municipios_id IS 'Campo que se relaciona con la tabla municipios.';


--
-- Name: parroquias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.parroquias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.parroquias_id_seq OWNER TO postgres;

--
-- Name: parroquias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.parroquias_id_seq OWNED BY public.parroquias.id;


--
-- Name: personal; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal (
    cedula integer NOT NULL,
    p_nombre character varying(50) NOT NULL,
    s_nombre character varying(50),
    p_apellido character varying(50) NOT NULL,
    s_apelllido character varying(50),
    telefono_celular character varying(15) NOT NULL,
    telefono_casa character varying(15),
    correo_electronico character varying(100) NOT NULL,
    hijos boolean NOT NULL,
    numero_hijos integer,
    nombre_sector character varying(100) NOT NULL,
    avenida character varying(50),
    calle character varying(30),
    casa character varying(30),
    piso integer,
    apto character varying(20),
    punto_referencia text,
    fecha_creacion timestamp without time zone NOT NULL,
    parroquias_id integer NOT NULL,
    estado_civil_id integer NOT NULL,
    genero_id integer NOT NULL,
    grado_instruccion_id integer NOT NULL,
    organismos_id integer NOT NULL,
    cargos_id integer NOT NULL,
    rango_categoria_id integer NOT NULL,
    estatus_personal_id integer NOT NULL,
    grupo_guardia_id integer NOT NULL
);


ALTER TABLE public.personal OWNER TO postgres;

--
-- Name: TABLE personal; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.personal IS 'Tabla que almacena los datos del personal Ven911.';


--
-- Name: COLUMN personal.cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.cedula IS 'Campo que almacena el número de cédula del personal Ven911.Identificador de la tabla.';


--
-- Name: COLUMN personal.p_nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.p_nombre IS 'Campo que almacena el primer nombre del personal Ven911.';


--
-- Name: COLUMN personal.s_nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.s_nombre IS 'Campo que almacena el segundo nombre del personal Ven911.';


--
-- Name: COLUMN personal.p_apellido; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.p_apellido IS 'Campo que almacena el primer apellido del personal Ven911.';


--
-- Name: COLUMN personal.s_apelllido; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.s_apelllido IS 'Campo que almacena el segundo apellido del personal Ven911.';


--
-- Name: COLUMN personal.telefono_celular; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.telefono_celular IS 'Campo que almacena el número de teléfono celular del personal Ven911.';


--
-- Name: COLUMN personal.telefono_casa; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.telefono_casa IS 'Campo que almacena el número de teléfono de casa del personal Ven911.';


--
-- Name: COLUMN personal.correo_electronico; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.correo_electronico IS 'Campo que almacena el correo electrónico del personal Ven911.';


--
-- Name: COLUMN personal.hijos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.hijos IS 'Campo que indica si el personal Ven911 tiene hijos.';


--
-- Name: COLUMN personal.numero_hijos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.numero_hijos IS 'Campo que almacena el número de hijos del personal Ven911.';


--
-- Name: COLUMN personal.nombre_sector; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.nombre_sector IS 'Campo que almacena el nombre del sector donde vive del personal Ven911.';


--
-- Name: COLUMN personal.avenida; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.avenida IS 'Campo que almacena el nombre de la avenida donde vive del personal Ven911.';


--
-- Name: COLUMN personal.calle; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.calle IS 'Campo que almacena el nombre de la calle donde vive del personal Ven911.';


--
-- Name: COLUMN personal.casa; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.casa IS 'Campo que almacena el número de la avenida donde vive del personal Ven911.';


--
-- Name: COLUMN personal.piso; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.piso IS 'Campo que almacena el número de piso donde vive del personal Ven911.';


--
-- Name: COLUMN personal.apto; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.apto IS 'Campo que almacena el nombre del apartamento donde vive del personal Ven911.';


--
-- Name: COLUMN personal.punto_referencia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.punto_referencia IS 'Campo que almacena el punto de referencia donde vive el personal Ven911.';


--
-- Name: COLUMN personal.fecha_creacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.fecha_creacion IS 'Campo que almacena la fecha de registro automáticamente del sistema.';


--
-- Name: COLUMN personal.parroquias_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.parroquias_id IS 'Campo que se relaciona con la tabla parroquias.';


--
-- Name: COLUMN personal.estado_civil_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.estado_civil_id IS 'Campo que se relaciona con la tabla estado_civil.';


--
-- Name: COLUMN personal.genero_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.genero_id IS 'Campo que se relaciona con la tabla genero.';


--
-- Name: COLUMN personal.grado_instruccion_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.grado_instruccion_id IS 'Campo que se relaciona con la tabla grado de instrucción.';


--
-- Name: COLUMN personal.organismos_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.organismos_id IS 'Campo que se relaciona con la tabla organismos.';


--
-- Name: COLUMN personal.cargos_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.cargos_id IS 'Campo que se relaciona con la tabla cargos.';


--
-- Name: COLUMN personal.rango_categoria_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.rango_categoria_id IS 'Campo que se relaciona con la tabla rango de categorías.';


--
-- Name: COLUMN personal.estatus_personal_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.estatus_personal_id IS 'Campo que se relaciona con la tabla estatus del personal Ven911. indica si la persona se encuentra laborando, de permiso, de reposo,  de vacaciones, trasladada, o retirada.';


--
-- Name: COLUMN personal.grupo_guardia_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal.grupo_guardia_id IS 'Campo que almacena el grupo de guardia al que pertenece el personal';


--
-- Name: personal_cedula_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_cedula_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.personal_cedula_seq OWNER TO postgres;

--
-- Name: personal_cedula_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_cedula_seq OWNED BY public.personal.cedula;


--
-- Name: personal_datos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_datos (
    id integer NOT NULL,
    personal_cedula_sup integer NOT NULL,
    personal_cedula_aux integer,
    personal_cedula_op1 integer,
    personal_cedula_op2 integer,
    personal_cedula_op3 integer,
    personal_cedula_op4 integer,
    personal_cedula_op5 integer,
    personal_cedula_op6 integer,
    personal_cedula_poli1 integer,
    personal_cedula_poli2 integer,
    personal_cedula_poli3 integer,
    personal_cedula_bomb1 integer,
    personal_cedula_bomb2 integer,
    personal_cedula_bomb3 integer,
    personal_cedula_pc1 integer,
    personal_cedula_pc2 integer,
    personal_cedula_pc3 integer,
    personal_grupos_guardia_id integer NOT NULL
);


ALTER TABLE public.personal_datos OWNER TO postgres;

--
-- Name: TABLE personal_datos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.personal_datos IS 'Tabla que almacena los numeros de cedulas de las personas pertenecientes al grupo de guardia';


--
-- Name: COLUMN personal_datos.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.id IS 'Este campo es un auto incrementable para identificar el personal de guardia';


--
-- Name: COLUMN personal_datos.personal_cedula_sup; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_sup IS 'Este campo almacena el numero de cedula del supervisor de la guardia';


--
-- Name: COLUMN personal_datos.personal_cedula_aux; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_aux IS 'Este campo almacena el numero de cedula del Auxiliar de supervisor de guardia';


--
-- Name: COLUMN personal_datos.personal_cedula_op1; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_op1 IS 'Este campo almacena el numero de cedula del Operador de llamadas telefonicas 1';


--
-- Name: COLUMN personal_datos.personal_cedula_op2; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_op2 IS 'Este campo almacena el numero de cedula del Operador de llamadas telefonicas 2';


--
-- Name: COLUMN personal_datos.personal_cedula_op3; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_op3 IS 'Este campo almacena el numero de cedula del Operador de llamadas telefonicas 3';


--
-- Name: COLUMN personal_datos.personal_cedula_op4; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_op4 IS 'Este campo almacena el numero de cedula del Operador de llamadas telefonicas 4';


--
-- Name: COLUMN personal_datos.personal_cedula_op5; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_op5 IS 'Este campo almacena el numero de cedula del Operador de llamadas telefonicas 5';


--
-- Name: COLUMN personal_datos.personal_cedula_op6; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_op6 IS 'Este campo almacena el numero de cedula del Operador de llamadas telefonicas 6';


--
-- Name: COLUMN personal_datos.personal_cedula_poli1; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_poli1 IS 'Este campo almacena el numero de cedula del Despachador 1 de unidades ante las llamadas de emergencias de Policia';


--
-- Name: COLUMN personal_datos.personal_cedula_poli2; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_poli2 IS 'Este campo almacena el numero de cedula del Despachador 2 de unidades ante las llamadas de emergencias de Policia';


--
-- Name: COLUMN personal_datos.personal_cedula_poli3; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_poli3 IS 'Este campo almacena el numero de cedula del Despachador 3 de unidades ante las llamadas de emergencias de Policia';


--
-- Name: COLUMN personal_datos.personal_cedula_bomb1; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_bomb1 IS 'Este campo almacena el numero de cedula del Despachador 1 de unidades ante las llamadas de emergencias de Bomberos';


--
-- Name: COLUMN personal_datos.personal_cedula_bomb2; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_bomb2 IS 'Este campo almacena el numero de cedula del Despachador 2 de unidades ante las llamadas de emergencias de Bomberos';


--
-- Name: COLUMN personal_datos.personal_cedula_bomb3; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_bomb3 IS 'Este campo almacena el numero de cedula del Despachador 3 de unidades ante las llamadas de emergencias de Bomberos';


--
-- Name: COLUMN personal_datos.personal_cedula_pc1; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_pc1 IS 'Este campo almacena el numero de cedula del Despachador 1 de unidades ante las llamadas de emergencias de Proteccion Civil';


--
-- Name: COLUMN personal_datos.personal_cedula_pc2; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_pc2 IS 'Este campo almacena el numero de cedula del Despachador 2 de unidades ante las llamadas de emergencias de Proteccion Civil';


--
-- Name: COLUMN personal_datos.personal_cedula_pc3; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_cedula_pc3 IS 'Este campo almacena el numero de cedula del Despachador 3 de unidades ante las llamadas de emergencias de Proteccion Civil';


--
-- Name: COLUMN personal_datos.personal_grupos_guardia_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_datos.personal_grupos_guardia_id IS 'Este campo almacena el numero de identificacion de la tabla personal_grupos_guardia';


--
-- Name: personal_datos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_datos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.personal_datos_id_seq OWNER TO postgres;

--
-- Name: personal_datos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_datos_id_seq OWNED BY public.personal_datos.id;


--
-- Name: personal_grupos_guardia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_grupos_guardia (
    id integer NOT NULL,
    grupos_guardia_id integer NOT NULL,
    fecha_asig timestamp without time zone,
    fecha_fin timestamp without time zone
);


ALTER TABLE public.personal_grupos_guardia OWNER TO postgres;

--
-- Name: TABLE personal_grupos_guardia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.personal_grupos_guardia IS 'Tabla que almacena y contiene caracteristicas del personal de guardia';


--
-- Name: COLUMN personal_grupos_guardia.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_grupos_guardia.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN personal_grupos_guardia.fecha_asig; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_grupos_guardia.fecha_asig IS 'Campo que almacena la fecha de asignación del personal al grupo de guardia.';


--
-- Name: COLUMN personal_grupos_guardia.fecha_fin; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_grupos_guardia.fecha_fin IS 'Campo que almacena la fecha de finalización del personal al grupo de guardia asignado  y posteriormente reasignado a otro grupo..';


--
-- Name: personal_grupos_guardia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_grupos_guardia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.personal_grupos_guardia_id_seq OWNER TO postgres;

--
-- Name: personal_grupos_guardia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_grupos_guardia_id_seq OWNED BY public.personal_grupos_guardia.id;


--
-- Name: personal_guardias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_guardias (
    id integer NOT NULL,
    fecha_ingreso_g timestamp without time zone,
    fecha_salida_g timestamp without time zone,
    descripcion text NOT NULL,
    observaciones_entrada_id integer,
    observaciones_salida_id integer,
    personal_cedula integer NOT NULL,
    guardias_id integer
);


ALTER TABLE public.personal_guardias OWNER TO postgres;

--
-- Name: TABLE personal_guardias; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.personal_guardias IS 'Tabla que almacena los datos de los registros de las guardias y el personal 171 asignados por grupos para realizar las mismas.';


--
-- Name: COLUMN personal_guardias.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_guardias.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN personal_guardias.fecha_ingreso_g; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_guardias.fecha_ingreso_g IS 'Campo que almacena la fecha de ingreso del personal 171 a la guardia.';


--
-- Name: COLUMN personal_guardias.fecha_salida_g; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_guardias.fecha_salida_g IS 'Campo que almacena la fecha de salida del personal 171 a la guardia.';


--
-- Name: COLUMN personal_guardias.descripcion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_guardias.descripcion IS 'Campo que almacena las descripciones del personal de guardia.';


--
-- Name: COLUMN personal_guardias.personal_cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_guardias.personal_cedula IS 'Campo que se relaciona con la tabla personal 171';


--
-- Name: COLUMN personal_guardias.guardias_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.personal_guardias.guardias_id IS 'Campo que se relaciona con la tabla guardias.';


--
-- Name: personal_guardias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_guardias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.personal_guardias_id_seq OWNER TO postgres;

--
-- Name: personal_guardias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_guardias_id_seq OWNED BY public.personal_guardias.id;


--
-- Name: preguntas_usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.preguntas_usuario (
    id bigint NOT NULL,
    pregunta_recuperacion_1 character varying(200) NOT NULL,
    respuesta_recuperacion_1 character varying(200) NOT NULL,
    pregunta_recuperacion_2 character varying(200) NOT NULL,
    respuesta_recuperacion_2 character varying(200) NOT NULL
);


ALTER TABLE public.preguntas_usuario OWNER TO postgres;

--
-- Name: TABLE preguntas_usuario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.preguntas_usuario IS 'Tabla en la que el usuario almacenará dos preguntas con respuesta para poder recuperar el usuario en caso de estar bloqueado';


--
-- Name: rango_categoria; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rango_categoria (
    id integer NOT NULL,
    nombre_rango character varying(100) NOT NULL
);


ALTER TABLE public.rango_categoria OWNER TO postgres;

--
-- Name: TABLE rango_categoria; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.rango_categoria IS 'Tabla que almacena los datos de los diferentes rangos de categorías que se asigna al personal 171.';


--
-- Name: COLUMN rango_categoria.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.rango_categoria.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN rango_categoria.nombre_rango; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.rango_categoria.nombre_rango IS 'Campo que almacena el nombre del rango del personal 171.';


--
-- Name: rango_categoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.rango_categoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.rango_categoria_id_seq OWNER TO postgres;

--
-- Name: rango_categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.rango_categoria_id_seq OWNED BY public.rango_categoria.id;


--
-- Name: reporte_solicitudes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.reporte_solicitudes (
    id integer NOT NULL,
    numero_solicitud bigint NOT NULL,
    fecha_solicitud date NOT NULL,
    hora_solicitud time(6) without time zone NOT NULL,
    hora_cierre time(6) without time zone NOT NULL,
    nombre_solicitante character varying(50) NOT NULL,
    motivo_solicitud character varying(50) NOT NULL,
    direccion text NOT NULL,
    detalles text NOT NULL,
    procedimiento text NOT NULL,
    fallecidos bigint NOT NULL,
    lesionados bigint NOT NULL,
    parroquia character varying(50),
    sector character varying(50),
    punto_referencia character varying(50),
    operador character varying(50) NOT NULL,
    despachador character varying(50) NOT NULL,
    tiempo_respuesta time without time zone NOT NULL,
    organismos character varying(255) NOT NULL,
    motos boolean NOT NULL,
    num_motos bigint NOT NULL,
    vehiculos boolean NOT NULL,
    num_vehiculos bigint NOT NULL,
    guardias_id integer,
    municipio integer NOT NULL
);


ALTER TABLE public.reporte_solicitudes OWNER TO postgres;

--
-- Name: TABLE reporte_solicitudes; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.reporte_solicitudes IS 'Tabla que almacena los reposter de solicitudes traidas del sistema de emergencias 171';


--
-- Name: COLUMN reporte_solicitudes.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.id IS 'Identificador único de la tabla.
';


--
-- Name: COLUMN reporte_solicitudes.numero_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.numero_solicitud IS 'Campo que almacena el número de solicitud.
';


--
-- Name: COLUMN reporte_solicitudes.fecha_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.fecha_solicitud IS 'Campo que almacena la fecha de solicitud.
';


--
-- Name: COLUMN reporte_solicitudes.hora_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.hora_solicitud IS 'Campo que almacena la hora de solicitud.
';


--
-- Name: COLUMN reporte_solicitudes.hora_cierre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.hora_cierre IS 'Campo que almacena la hora de cierre de la solicitud.
';


--
-- Name: COLUMN reporte_solicitudes.nombre_solicitante; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.nombre_solicitante IS 'Campo que almacena el nombre de la persona que realiza la solicitud.
';


--
-- Name: COLUMN reporte_solicitudes.motivo_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.motivo_solicitud IS 'Campo que almacena el motivo de la solicitud
';


--
-- Name: COLUMN reporte_solicitudes.direccion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.direccion IS 'Campo que almacena la dirección de la persona que realiza la solicitud.
';


--
-- Name: COLUMN reporte_solicitudes.detalles; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.detalles IS 'Campo que almacena los detalles de la solicitud.
';


--
-- Name: COLUMN reporte_solicitudes.procedimiento; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.procedimiento IS 'Campo que almacena los procedimientos de la solicitud.
';


--
-- Name: COLUMN reporte_solicitudes.fallecidos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.fallecidos IS 'Campo que almacena la cantidad de fallecidos.
';


--
-- Name: COLUMN reporte_solicitudes.lesionados; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.lesionados IS 'Campo que almacena la cantidad de heridos.
';


--
-- Name: COLUMN reporte_solicitudes.parroquia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.parroquia IS 'Campo que almacena la parroquia donde se realiza la solicitud
';


--
-- Name: COLUMN reporte_solicitudes.sector; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.sector IS 'Campo que almacena el sector donde se realiza la solicitud
';


--
-- Name: COLUMN reporte_solicitudes.punto_referencia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.punto_referencia IS 'Campo que almacena punto de referencia donde se realiza la solicitud
';


--
-- Name: COLUMN reporte_solicitudes.operador; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.operador IS 'Campo que almacena el nombre del operador que recibe la solicitud.
';


--
-- Name: COLUMN reporte_solicitudes.despachador; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.despachador IS 'Campo que almacena el despachador que recibe la solicitud.
';


--
-- Name: COLUMN reporte_solicitudes.tiempo_respuesta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.tiempo_respuesta IS 'Campo que almacena el tiempo de respuestra tras la llamada de la solicitud
';


--
-- Name: COLUMN reporte_solicitudes.organismos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.organismos IS 'Campo que almacena el organismo que asiste a la solicitud.
';


--
-- Name: COLUMN reporte_solicitudes.motos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.motos IS 'Campo que almacena la presencia de motos de emergencias en el sitio de la solicitud
';


--
-- Name: COLUMN reporte_solicitudes.num_motos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.num_motos IS 'Campo que almacena el numero de motos de emergencias en el sitio de la solicitud
';


--
-- Name: COLUMN reporte_solicitudes.vehiculos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.vehiculos IS 'Campo que almacena la presencia de vehiculos de emergencias en el sitio de la solicitud
';


--
-- Name: COLUMN reporte_solicitudes.num_vehiculos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.num_vehiculos IS 'Campo que almacena el numero de vehiculos de emergencias en el sitio de la solicitud
';


--
-- Name: COLUMN reporte_solicitudes.guardias_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.guardias_id IS 'Campo que se relaciona con la tabla guardias.';


--
-- Name: COLUMN reporte_solicitudes.municipio; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.reporte_solicitudes.municipio IS 'Campo que almacena el municipo donde se realiza la solicitud ';


--
-- Name: reporte_solicitudes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.reporte_solicitudes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.reporte_solicitudes_id_seq OWNER TO postgres;

--
-- Name: reporte_solicitudes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.reporte_solicitudes_id_seq OWNED BY public.reporte_solicitudes.id;


--
-- Name: sectores; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sectores (
    id integer DEFAULT nextval('public.parroquias_id_seq'::regclass) NOT NULL,
    nombre_sector character varying(100) NOT NULL,
    parroquias_id integer NOT NULL
);


ALTER TABLE public.sectores OWNER TO postgres;

--
-- Name: TABLE sectores; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.sectores IS 'Tabla que almacena los sectores de las parroquias y municipios del Estado Mérida';


--
-- Name: solicitante; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.solicitante (
    id integer NOT NULL,
    p_nombre_sol character varying(50) NOT NULL,
    p_apellido_sol character varying(50) NOT NULL,
    telefono_celular_sol character varying(15) NOT NULL,
    motivo_solicitud_id integer NOT NULL,
    organismos_solicitud_id integer
);


ALTER TABLE public.solicitante OWNER TO postgres;

--
-- Name: TABLE solicitante; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.solicitante IS 'Tabla que almacena los datos del solicitante.';


--
-- Name: COLUMN solicitante.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN solicitante.p_nombre_sol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.p_nombre_sol IS 'Campo que almacena el primer nombre del solicitante.';


--
-- Name: COLUMN solicitante.p_apellido_sol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.p_apellido_sol IS 'Campo que almacena el primer apellido del solicitante.';


--
-- Name: COLUMN solicitante.telefono_celular_sol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.telefono_celular_sol IS 'Campo que almacena el numero de telefono del solicitante.';


--
-- Name: COLUMN solicitante.motivo_solicitud_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.motivo_solicitud_id IS 'Campo que almacena el ID del motivo de la solicitud realizada por el solicitante';


--
-- Name: COLUMN solicitante.organismos_solicitud_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitante.organismos_solicitud_id IS 'Este campo almacena el identificador de organismo que realiza la llamada de solicitud';


--
-- Name: solicitante_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.solicitante_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.solicitante_id_seq OWNER TO postgres;

--
-- Name: solicitante_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.solicitante_id_seq OWNED BY public.solicitante.id;


--
-- Name: solicitud_atencion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.solicitud_atencion (
    id integer NOT NULL,
    detalles_solicitud text NOT NULL,
    procedimiento_solicitud text NOT NULL,
    num_fallecidos integer NOT NULL,
    num_lesionados integer NOT NULL,
    num_heridos integer NOT NULL,
    funcionario boolean NOT NULL,
    amigo171 boolean NOT NULL,
    motos boolean NOT NULL,
    vehiculos boolean NOT NULL,
    solicitudes_id bigint NOT NULL,
    direccion_solicitud text NOT NULL,
    despachador_solicitud integer,
    operador_solicitud integer,
    num_motos integer,
    num_vehiculos integer
);


ALTER TABLE public.solicitud_atencion OWNER TO postgres;

--
-- Name: TABLE solicitud_atencion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.solicitud_atencion IS 'Tabla que almacena los datos de la solicitud de atención.';


--
-- Name: COLUMN solicitud_atencion.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN solicitud_atencion.detalles_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.detalles_solicitud IS 'Campo que almacena los detalles de la solicitud.';


--
-- Name: COLUMN solicitud_atencion.procedimiento_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.procedimiento_solicitud IS 'Campo que almacena los procedimientos de la solicitud.';


--
-- Name: COLUMN solicitud_atencion.num_fallecidos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.num_fallecidos IS 'Campo que almacena el numero de fallecidos.';


--
-- Name: COLUMN solicitud_atencion.num_lesionados; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.num_lesionados IS 'Campo que almacena el numero de lesionados.';


--
-- Name: COLUMN solicitud_atencion.num_heridos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.num_heridos IS 'Campo que almacena el numero de heridos.';


--
-- Name: COLUMN solicitud_atencion.funcionario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.funcionario IS 'Campo que indica si la solicitud es realizada por un funcionario 171.';


--
-- Name: COLUMN solicitud_atencion.amigo171; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.amigo171 IS 'Campo que almacena si el solicitante es amigo del 171.';


--
-- Name: COLUMN solicitud_atencion.motos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.motos IS 'Campo que indica si la solicitud fue asistida por motos.';


--
-- Name: COLUMN solicitud_atencion.vehiculos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.vehiculos IS 'Campo que indica si la solicitud fue asistida por vehiculos.';


--
-- Name: COLUMN solicitud_atencion.solicitudes_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.solicitudes_id IS 'Campo que se relaciona con la tabla de solicitudes.';


--
-- Name: COLUMN solicitud_atencion.direccion_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.direccion_solicitud IS 'Campo que almacena la direccion donde la llamada de la solicitud esta sucediendo';


--
-- Name: COLUMN solicitud_atencion.despachador_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.despachador_solicitud IS 'Campo que almacena el numero de cedula del despachador que atiende y despacha la unidad de emergencia a sitio de la solicitud';


--
-- Name: COLUMN solicitud_atencion.operador_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.operador_solicitud IS 'Campo que almacena el numero de cedula del operador que recibe la llamada de solicitud';


--
-- Name: COLUMN solicitud_atencion.num_motos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.num_motos IS 'Este campo almacena el numero de motos de emergencias en el lugar de la solicitud ';


--
-- Name: COLUMN solicitud_atencion.num_vehiculos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitud_atencion.num_vehiculos IS 'Este campo almacena el numero de vehiculos de emergencias en el lugar de la solicitud';


--
-- Name: solicitud_atencion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.solicitud_atencion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.solicitud_atencion_id_seq OWNER TO postgres;

--
-- Name: solicitud_atencion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.solicitud_atencion_id_seq OWNED BY public.solicitud_atencion.id;


--
-- Name: solicitudes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.solicitudes (
    id bigint NOT NULL,
    numero_sol bigint,
    tiempo_apertura_sol time(6) without time zone NOT NULL,
    fecha_sol date NOT NULL,
    hora_sol time(6) without time zone NOT NULL,
    hora_cierre_sol time(6) without time zone NOT NULL,
    tiempo_respuesta_sol integer,
    sector_sol character varying(100) NOT NULL,
    punto_referencia_sol text,
    parroquias_id integer NOT NULL,
    solicitante_id integer NOT NULL,
    guardias_id integer NOT NULL,
    estatus_solicitud_id integer NOT NULL,
    fecha_creacion_sol timestamp(6) without time zone NOT NULL,
    tiempo_respuesta time with time zone
);


ALTER TABLE public.solicitudes OWNER TO postgres;

--
-- Name: TABLE solicitudes; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.solicitudes IS 'Tabla que almacena los datos del registro de solicitudes.';


--
-- Name: COLUMN solicitudes.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes.id IS 'Identificador único de la tabla solicitudes.';


--
-- Name: COLUMN solicitudes.numero_sol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes.numero_sol IS 'Campo que almacena el numero de solicitud.';


--
-- Name: COLUMN solicitudes.tiempo_apertura_sol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes.tiempo_apertura_sol IS 'Campo que almacena el tiempo de apertura de la solicitud.';


--
-- Name: COLUMN solicitudes.fecha_sol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes.fecha_sol IS 'Campo que almacena la fecha de solicitud.';


--
-- Name: COLUMN solicitudes.hora_sol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes.hora_sol IS 'Campo que almacena la hora de la solicitud.';


--
-- Name: COLUMN solicitudes.hora_cierre_sol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes.hora_cierre_sol IS 'Campo que almacena la hora de cierre de la solicitud.';


--
-- Name: COLUMN solicitudes.tiempo_respuesta_sol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes.tiempo_respuesta_sol IS 'Campo que almacena el tiempo de respuesta de la solicitud.';


--
-- Name: COLUMN solicitudes.sector_sol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes.sector_sol IS 'Campo que almacena el nombre del sector del registro de la solicitud.';


--
-- Name: COLUMN solicitudes.punto_referencia_sol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes.punto_referencia_sol IS 'Campo que almacena el punto de referencia.';


--
-- Name: COLUMN solicitudes.parroquias_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes.parroquias_id IS 'Campo que se relaciona con la tabla parroquias.';


--
-- Name: COLUMN solicitudes.solicitante_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes.solicitante_id IS 'Campo que se relaciona con la tabla solicitante.';


--
-- Name: COLUMN solicitudes.guardias_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes.guardias_id IS 'Campo que se relaciona con la tabla registros de guardias.';


--
-- Name: COLUMN solicitudes.fecha_creacion_sol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes.fecha_creacion_sol IS 'Campo que almacena la fecha del sistema en que se hace el registro de la nueva solicitud.';


--
-- Name: COLUMN solicitudes.tiempo_respuesta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes.tiempo_respuesta IS 'Campo que almacena la duracion de la solicitud desde el momento de la primera llamada';


--
-- Name: solicitudes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.solicitudes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.solicitudes_id_seq OWNER TO postgres;

--
-- Name: solicitudes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.solicitudes_id_seq OWNED BY public.solicitudes.id;


--
-- Name: solicitudes_organismos_solicitud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.solicitudes_organismos_solicitud (
    solicitudes_id bigint NOT NULL,
    organismos_solicitud_id integer CONSTRAINT solicitudes_organismos_solicit_organismos_solicitud_id_not_null NOT NULL
);


ALTER TABLE public.solicitudes_organismos_solicitud OWNER TO postgres;

--
-- Name: TABLE solicitudes_organismos_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.solicitudes_organismos_solicitud IS 'Tabla de muchos a muchos que guarda los datos de las solicitudes con los diferentes organismos que asistieron a la solicitud.';


--
-- Name: COLUMN solicitudes_organismos_solicitud.solicitudes_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes_organismos_solicitud.solicitudes_id IS 'Campo que se relaciona con la tabla solicitudes.';


--
-- Name: COLUMN solicitudes_organismos_solicitud.organismos_solicitud_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.solicitudes_organismos_solicitud.organismos_solicitud_id IS 'Campo que se relaciona con la tabla organismos de solicitudes.';


--
-- Name: tipo_parenstesco; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipo_parenstesco (
    id integer NOT NULL,
    tipo_par character varying(50) NOT NULL
);


ALTER TABLE public.tipo_parenstesco OWNER TO postgres;

--
-- Name: TABLE tipo_parenstesco; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tipo_parenstesco IS 'Tabla que almacena los datos de los cargos del personal 171.';


--
-- Name: COLUMN tipo_parenstesco.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tipo_parenstesco.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN tipo_parenstesco.tipo_par; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tipo_parenstesco.tipo_par IS 'Campo que almacena el tipo de parentesco relacionado con el personal de emergencias 171.';


--
-- Name: tipo_parenstesco_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_parenstesco_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tipo_parenstesco_id_seq OWNER TO postgres;

--
-- Name: tipo_parenstesco_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipo_parenstesco_id_seq OWNED BY public.tipo_parenstesco.id;


--
-- Name: tipo_rol; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipo_rol (
    id integer NOT NULL,
    tipo_rol character varying(60) NOT NULL
);


ALTER TABLE public.tipo_rol OWNER TO postgres;

--
-- Name: TABLE tipo_rol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.tipo_rol IS 'Tabla que almacena los datos del tipo de rol del usuario.';


--
-- Name: COLUMN tipo_rol.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tipo_rol.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN tipo_rol.tipo_rol; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.tipo_rol.tipo_rol IS 'Campo que almacena el tipo de rol de usuario.';


--
-- Name: tipo_rol_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_rol_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tipo_rol_id_seq OWNER TO postgres;

--
-- Name: tipo_rol_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipo_rol_id_seq OWNED BY public.tipo_rol.id;


--
-- Name: ubicacion_bienes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ubicacion_bienes (
    id integer NOT NULL,
    area_ubicacion character varying(100) NOT NULL
);


ALTER TABLE public.ubicacion_bienes OWNER TO postgres;

--
-- Name: TABLE ubicacion_bienes; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.ubicacion_bienes IS 'Tabla que almacena los datos de las ubicaciones de los bienes.';


--
-- Name: COLUMN ubicacion_bienes.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.ubicacion_bienes.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN ubicacion_bienes.area_ubicacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.ubicacion_bienes.area_ubicacion IS 'Campo que almacena el área donde esta ubicado el bien.';


--
-- Name: ubicacion_bienes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ubicacion_bienes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.ubicacion_bienes_id_seq OWNER TO postgres;

--
-- Name: ubicacion_bienes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ubicacion_bienes_id_seq OWNED BY public.ubicacion_bienes.id;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id integer NOT NULL,
    usuario character varying(100) NOT NULL,
    contrasena character varying(100) NOT NULL,
    tipo_rol_id integer NOT NULL,
    estado_usuario_id integer NOT NULL,
    personal_cedula integer NOT NULL,
    fecha_creacion timestamp without time zone NOT NULL,
    preguntas_usuario_id integer NOT NULL
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: TABLE usuario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.usuario IS 'Tabla que almacena los datos del usuario.';


--
-- Name: COLUMN usuario.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.id IS 'Identificador único de la tabla.';


--
-- Name: COLUMN usuario.usuario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.usuario IS 'Campo que almacena el usuario para iniciar sesión en el sistema.';


--
-- Name: COLUMN usuario.contrasena; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.contrasena IS 'Campo que almacena la contraseña del usuario.';


--
-- Name: COLUMN usuario.tipo_rol_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.tipo_rol_id IS 'Campo que se relaciona con la tabla tipo de rol.';


--
-- Name: COLUMN usuario.estado_usuario_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.estado_usuario_id IS 'Campo que se relaciona con la tabla estados de usuarios. indica si el usuario esta activo o inactivo';


--
-- Name: COLUMN usuario.fecha_creacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.usuario.fecha_creacion IS 'Campo que almacena la fecha de registro automáticamente del sistema.';


--
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuario_id_seq OWNER TO postgres;

--
-- Name: usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;


--
-- Name: bienes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bienes ALTER COLUMN id SET DEFAULT nextval('public.bienes_id_seq'::regclass);


--
-- Name: bitacora id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacora ALTER COLUMN id SET DEFAULT nextval('public.bitacora_id_seq'::regclass);


--
-- Name: cargos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cargos ALTER COLUMN id SET DEFAULT nextval('public.cargos_id_seq'::regclass);


--
-- Name: control_bienes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.control_bienes ALTER COLUMN id SET DEFAULT nextval('public.control_bienes_id_seq'::regclass);


--
-- Name: estadisticas_solicitud id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estadisticas_solicitud ALTER COLUMN id SET DEFAULT nextval('public.estadisticas_solicitud_id_seq'::regclass);


--
-- Name: estado_bien id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado_bien ALTER COLUMN id SET DEFAULT nextval('public.estado_bien_id_seq'::regclass);


--
-- Name: estado_civil id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado_civil ALTER COLUMN id SET DEFAULT nextval('public.estado_civil_id_seq'::regclass);


--
-- Name: estado_usuario id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado_usuario ALTER COLUMN id SET DEFAULT nextval('public.estado_usuario_id_seq'::regclass);


--
-- Name: estados id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estados ALTER COLUMN id SET DEFAULT nextval('public.estados_id_seq'::regclass);


--
-- Name: estatus_personal id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estatus_personal ALTER COLUMN id SET DEFAULT nextval('public.estatus_personal_id_seq'::regclass);


--
-- Name: estatus_solicitud id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estatus_solicitud ALTER COLUMN id SET DEFAULT nextval('public.estatus_solicitud_id_seq'::regclass);


--
-- Name: genero id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.genero ALTER COLUMN id SET DEFAULT nextval('public.genero_id_seq'::regclass);


--
-- Name: grado_instruccion id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grado_instruccion ALTER COLUMN id SET DEFAULT nextval('public.grado_instruccion_id_seq'::regclass);


--
-- Name: grupos_guardia id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grupos_guardia ALTER COLUMN id SET DEFAULT nextval('public.grupos_guardia_id_seq'::regclass);


--
-- Name: guardias id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.guardias ALTER COLUMN id SET DEFAULT nextval('public.guardias_id_seq'::regclass);


--
-- Name: municipios id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.municipios ALTER COLUMN id SET DEFAULT nextval('public.municipios_id_seq'::regclass);


--
-- Name: observaciones id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.observaciones ALTER COLUMN id SET DEFAULT nextval('public.observaciones_id_seq'::regclass);


--
-- Name: observaciones_entrada id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.observaciones_entrada ALTER COLUMN id SET DEFAULT nextval('public.observaciones_entrada_id_seq'::regclass);


--
-- Name: observaciones_salida id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.observaciones_salida ALTER COLUMN id SET DEFAULT nextval('public.observaciones_salida_id_seq'::regclass);


--
-- Name: organismos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.organismos ALTER COLUMN id SET DEFAULT nextval('public.organismos_id_seq'::regclass);


--
-- Name: organismos_solicitud id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.organismos_solicitud ALTER COLUMN id SET DEFAULT nextval('public.organismos_solicitud_id_seq'::regclass);


--
-- Name: parantesco_personal id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parantesco_personal ALTER COLUMN id SET DEFAULT nextval('public.parantesco_personal_id_seq'::regclass);


--
-- Name: parroquias id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parroquias ALTER COLUMN id SET DEFAULT nextval('public.parroquias_id_seq'::regclass);


--
-- Name: personal cedula; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal ALTER COLUMN cedula SET DEFAULT nextval('public.personal_cedula_seq'::regclass);


--
-- Name: personal_datos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_datos ALTER COLUMN id SET DEFAULT nextval('public.personal_datos_id_seq'::regclass);


--
-- Name: personal_grupos_guardia id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_grupos_guardia ALTER COLUMN id SET DEFAULT nextval('public.personal_grupos_guardia_id_seq'::regclass);


--
-- Name: personal_guardias id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_guardias ALTER COLUMN id SET DEFAULT nextval('public.personal_guardias_id_seq'::regclass);


--
-- Name: rango_categoria id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rango_categoria ALTER COLUMN id SET DEFAULT nextval('public.rango_categoria_id_seq'::regclass);


--
-- Name: reporte_solicitudes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reporte_solicitudes ALTER COLUMN id SET DEFAULT nextval('public.reporte_solicitudes_id_seq'::regclass);


--
-- Name: solicitante id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitante ALTER COLUMN id SET DEFAULT nextval('public.solicitante_id_seq'::regclass);


--
-- Name: solicitud_atencion id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud_atencion ALTER COLUMN id SET DEFAULT nextval('public.solicitud_atencion_id_seq'::regclass);


--
-- Name: solicitudes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitudes ALTER COLUMN id SET DEFAULT nextval('public.solicitudes_id_seq'::regclass);


--
-- Name: tipo_parenstesco id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_parenstesco ALTER COLUMN id SET DEFAULT nextval('public.tipo_parenstesco_id_seq'::regclass);


--
-- Name: tipo_rol id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_rol ALTER COLUMN id SET DEFAULT nextval('public.tipo_rol_id_seq'::regclass);


--
-- Name: ubicacion_bienes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ubicacion_bienes ALTER COLUMN id SET DEFAULT nextval('public.ubicacion_bienes_id_seq'::regclass);


--
-- Name: usuario id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);


--
-- Data for Name: bienes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bienes (id, codigo_b, nombre_b, marca_b, modelo_b, color_b, serial_b, descripcion_b, fecha_ingreso_b, direccion, coordinacion, observaciones, ubicacion_bienes_id, estado_bien_id, fecha_estado, organismos_id, fecha_creacion) FROM stdin;
2	123-789-456-123	RADIO	MOTOROLA	MT-147-59-RR	NEGRO	147258-AS1472-123456	TELEFONO UHF SISTEMA TROCALIZADO	2021-11-08	M.P.P. RELACIONES INTERIORES, JUSTICIA Y PAZ	EMERGENCIAS 911	POSEE CARGADOR	2	1	2021-11-08	1	2021-11-08 13:11:47
3	258-369-369	RADIO	MOTOROLA	MT-QWER-147	NEGRO	14758-QW2581478	TELEFONO DE ESTACION PARA COMUNICACIONES	2021-11-08	M.P.P. RELACIONES INTERIORES, JUSTICIA Y PAZ	EMERGENCIAS 911	BUEN ESTADO	2	1	2021-11-08	2	2021-11-08 13:11:20
4	987-258-654-325	RADIO UHF	MOTOROLA	MOTO-147-12	NEGRO	14785-69853-256321	RADIO DE COMUNICACIONES UHF SISTEMA TETRA	2021-11-08	M.P.P. RELACIONES INTERIORES, JUSTICIA Y PAZ	EMERGENCIAS 911	SE ENCUENTRA EN BUEN ESTADO	2	1	2021-11-08	3	2021-11-08 13:11:45
5	021023-789-NN-44	MOUSE	GLION	G20	BLANCO Y AZUL	SINNUMERO	MOUSE INALAMBRICO DE FUNCIONAMIENTO CON PILA AA	2022-10-14	M.P.P. RELACIONES INTERIORES, JUSTICIA Y PAZ	EMERGENCIAS 911	PIERDE SEñAL A MAS DE 3 METROS	1	1	2023-08-03	4	2023-08-03 06:08:59
6	1256-1254-NN-45	TECLADO	GLION	KG3080	BLANCO Y AZUL	15V4-MA15-KG30-8080	FASHION WIRELESS WATERPROOF KEYBOARDS	2022-10-14	M.P.P. RELACIONES INTERIORES, JUSTICIA Y PAZ	EMERGENCIAS 911	TECLADO INALAMBRICO	1	1	2023-08-03	4	2023-08-03 06:08:36
1	123-456-789-147	TELEFONO	CISCO	RM-258-AC	GRIS	14725-36985-145-2514	TELEFONO CON VOCINA DE ASIGNACION IP	2021-11-08	M.P.P RELACIONES INTERIORES, JUSTICIA Y PAZ	EMERGENCIAS 911	MANTENIMIENTO POR FALLAS EL CONFIGURACION IP	3	3	2024-12-26	5	2021-11-08 13:11:17
\.


--
-- Data for Name: bitacora; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bitacora (id, usuario_aplicacion, nombre_esquema, nombre_tabla, proceso, valor_anterior, valor_nuevo, fecha_operacion) FROM stdin;
1	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 08/11/2021 | 10:03:40 	2021-11-08 10:03:40
2	99999999	Modificar Personal	personal	MODIFICAR	\N	99999999, ADMIN, ADMIN, ADMIN, ADMIN, (000) 000-0000, (000) 000-0000, ADMIN@ADMIN.COM, f, 00, VEN911, VEN911, VEN911, VEN911, 00, 0, VEN911 MERIDA, 2021-11-08 09:40:30, 914, 1, 2, 4, 5, 3, 3, 1, 4	2021-11-08 10:11:19
3	99999999	Modificar Personal	personal	MODIFICAR	\N	99999999, ADMIN, ADMIN, ADMIN, ADMIN, (000) 000-0000, (000) 000-0000, ADMIN@ADMIN.COM, f, 00, VEN911, VEN911, VEN911, VEN911, 00, 0, VEN911 MERIDA, 2021-11-08 09:40:30, 914, 1, 2, 4, 5, 4 , 4 , 1, 4	2021-11-08 10:11:43
4	99999999	Modificar Pariente	parantesco_personal	MODIFICAR	\N	99999992, EMERGENCIAS MERIDA, EMERGENCIAS MERIDA, (000) 000-0000, MINISTERIOR DE RELACIONES INTERIORES, 99999999, 1	2021-11-08 10:11:11
5	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 08/11/2021 | 10:46:05 	2021-11-08 10:46:05
6	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 08/11/2021 | 11:32:57 	2021-11-08 11:32:57
7	99999999	Modificar Pariente	parantesco_personal	MODIFICAR	\N	99999991, EMERGENCIAS MERIDA, EMERGENCIAS MERIDA, (000) 000-0000, MINISTERIOR DE RELACIONES INTERIORES, 99999999, 1	2021-11-08 11:11:14
8	99999999	Modificar Pariente	parantesco_personal	MODIFICAR	\N	99999991, EMERGENCIAS MERIDA, EMERGENCIAS MERIDA, (000) 000-0000, MINISTERIOR DE RELACIONES INTERIORES, 99999999, 1	2021-11-08 11:11:19
9	99999999	Registro de Personal	personal	INSERTAR	\N	18125565, TELMA, YOSELIN, ARAUJO, QUINTERO, (426) 173-1829, (000) 000-0000, ARAUJOTELMA93@GMAIL.COM, 1, 2, BARRIO RAÚL LEONI, PRINCIPAL, PRINCIPAL, 22, 00, 00, PASOS ARRIBA DEL ESTADIO, 2021/11/8 11:11:01, 937, 1 , 1, 1 , 4 , 1 , 4 , 1 , 1 	2021-11-08 11:11:01
10	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	8017023, CELSA, DE ARAUJO, (274) 416-6858, LLAMAR EN CASO DE EMERGENCIAS, 18125565, 1 	2021-11-08 11:11:00
11	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	MI COLOR FAVORITO, TURQUESA, NOMBRE DE MI HIJA, SAMANTHA	2021-11-08 11:11:42
12	99999999	Registro de Usuario	usuario	INSERTAR	\N	TAraujo565, d28d16c3a39db0b14e024ef53579726f461fa6a7, 4 , 1, 18125565, 2	2021-11-08 11:11:43
13	99999999	Registro de Personal	personal	INSERTAR	\N	8042991, JOSE, ELPIDIO, SOSA, NIñO, (426) 274-0692, (274) 221-7858, SOSAJOSE_E@HOTMAIL.COM, 1, 2, SECTOR MANZANO ABAJO, URDANETA, LOS RUICES, SIN NUMERO, 00, 00, VIA PRINCIPAL MANZANO ALTO, 2021/11/8 11:11:53, 915, 4 , 2, 1 , 3 , 2 , 3 , 1 , 1 	2021-11-08 11:11:53
14	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	1010123, NANCY, PEñA, (274) 221-7858, LLAMAR EN CASO DE EMERGENCIA, 8042991, 7 	2021-11-08 11:11:08
15	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	COLOR FAVORITO, AZUL, NOMBRE DE MI NIETA, JAZMIN	2021-11-08 11:11:11
16	99999999	Registro de Usuario	usuario	INSERTAR	\N	JSosa991, 69cd8f7bc049e317752294ba9d6df13e7ef38ad3, 3 , 1, 8042991, 3	2021-11-08 11:11:51
17	99999999	Registro de Personal	personal	INSERTAR	\N	13499752, AURELIO, , HERNANDEZ, RUIZ, (424) 777-0712, (000) 000-0000, ANGELYVALERIA15@GMAIL.COM, 1, 2, SECTOR LOS CUROS, SECTOR G7, CALLE 2, 12, 00, 00, DETRAS DE LICEO ROMULO BETANCOURD, 2021/11/8 12:11:56, 942, 1 , 2, 1 , 2 , 2 , 2 , 1 , 1 	2021-11-08 12:11:56
18	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	15640920, ASENCION, HERNANDEZ, (414) 977-3599, LLAMAR EN CASO DE EMERGENCIA, 13499752, 3 	2021-11-08 12:11:26
19	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	MI COLOR FAVORITO, ROJO, NOMBRE DE MI MASCOTA, PELUCHE	2021-11-08 12:11:11
20	99999999	Registro de Usuario	usuario	INSERTAR	\N	AHernandez, 07af30afc63d24433b24057413524524dcf09ce3, 3 , 1, 13499752, 4	2021-11-08 12:11:05
21	99999999	Registro de Personal	personal	INSERTAR	\N	17842117, MISAEL, EDUARDO, FERNANDEZ, MONTILLA, (412) 062-3789, (000) 000-0000, MISAELFERNANDEZ1610@GMAIL.COM, 1, 1, URBANIZACIÓN BICENTENARIO, PRINCIPAL, PRINCIPAL, 21, 00, 00, DESPUES DEL TANQUE DE AGUAS DE MERIDA, 2021/11/8 12:11:55, 942, 2 , 2, 1 , 1 , 2 , 2 , 1 , 1 	2021-11-08 12:11:55
22	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	23302896, KASSANDRA, DE FERNANDEZ, (412) 078-2744, LLAMAR EN CASO DE EMERGENCIA, 13499752, 7 	2021-11-08 12:11:34
23	99999999	Modificar Personal	personal	MODIFICAR	\N	17842117, MISAEL, EDUARDO, FERNANDEZ, MONTILLA, (412) 062-3789, (000) 000-0000, MISAELFERNANDEZ1610@GMAIL.COM, t, 3, URBANIZACIÓN BICENTENARIO, PRINCIPAL, PRINCIPAL, 21, 00, 00, DESPUES DEL TANQUE DE AGUAS DE MERIDA, 2021-11-08 12:11:55, 942, 2, 2, 1, 1, 2, 2, 1, 1	2021-11-08 12:11:09
24	99999999	Registro de Personal	personal	INSERTAR	\N	16200660, JORGE, LUIS, UZCATEGUI, ALBARRAN, (416) 874-6785, (274) 221-3715, JORG3K3ILA@GMAIL.COM, 1, 1, URBANIZACIÓN ALFREDO LARA, PRINCIPAL, PRINCIPAL VIA EL SALADO, 1-A, 00, 00, 100 MTS ANTES DEL PUENTE, 2021/11/8 12:11:36, 915, 4 , 2, 3 , 5 , 3 , 3 , 1 , 1 	2021-11-08 12:11:36
25	99999999	Modificar Pariente	parantesco_personal	MODIFICAR	\N	23303011, KEILA, ROJAS, (414) 751-0991, LLAMAR EN CASO DE EMERGENCIA, 16200660, 7	2021-11-08 12:11:40
26	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 08/11/2021 | 13:00:46 	2021-11-08 13:00:46
27	99999999	Registro de Personal	personal	INSERTAR	\N	15620802, JOSE, ANTONIO, SOSA, UZCATEGUI, (416) 470-5428, (274) 244-9759, JOSESOSAUZCATEGUI@GMAIL.COM, 0, 00, BARRIO SAN JOSÉ DE LAS FLORES, LOS PROCERES, PRIMERA ESCALERA, 4-52, 00, 00, FRENTE A RESIDENCIAS ROSA E, 2021/11/8 13:11:04, 931, 1 , 2, 2 , 4 , 1 , 4 , 1 , 1 	2021-11-08 13:11:04
28	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	20848648, CELINA, BALZA, (412) 784-5668, LLAMAR EN CASO DE EMERGENCIA, 15620802, 8 	2021-11-08 13:11:06
29	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	MI DEPORTE FAVORITO, FUTBOLL, COLOR FAVORITO, MORADO	2021-11-08 13:11:33
30	99999999	Registro de Usuario	usuario	INSERTAR	\N	JSosa802, e2ce132a3a8762c91719e448edba8d3384d2e106, 4 , 1, 15620802, 7	2021-11-08 13:11:18
31	99999999	Registro de Personal	personal	INSERTAR	\N	18308368, MARIA, VICTORIA, DAVILA, ESPINOZA, (412) 799-6849, (274) 872-0815, DAVILAMARIAVICTORIA@GMAIL.COM, 1, 1, BARRIO EL LLANITO, LOS PROCERES, CAIGUIRE, 0-27, 00, 00, EL CAUCHO, 2021/11/8 13:11:27, 931, 1 , 1, 4 , 4 , 1 , 4 , 1 , 1 	2021-11-08 13:11:27
32	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	8026807, ARMINDA, ESPINOZA, (424) 773-7618, LLAMR EN CASO DE EMERGENCIA, 18308368, 1 	2021-11-08 13:11:24
33	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE MI MASCOTA, TABBY, COLOR FAVORITO, MORADO	2021-11-08 13:11:50
34	99999999	Registro de Usuario	usuario	INSERTAR	\N	MDavila368, ed28ed4ebcd69f605706891d05f6eea6202bc7f3, 4 , 1, 18308368, 8	2021-11-08 13:11:00
35	16200660	Inicio de Session	Usuario	VALIDAR	\N	6, JUzcategui, 2, \n\t\t\t1, 16200660, 08/11/2021 | 13:43:16 	2021-11-08 13:43:16
36	16200660	Personal de Guardia	personal_grupos_guardias	Insertar	\N	16200660 , , 18125565 , 15620802 , 18308368 , , , , 8042991 , , , 8042991 , , , 17842117 , , , 1	2021-11-08 13:11:56
250	17129573	Personal de Guardia	personal_grupos_guardias	Insertar	\N	17129573 , 14267697 , 20197663 , 29794276 , , , , , , , , , , , , , , 1	2021-11-13 07:11:41
37	99999999	Registrar Bienes	bienes	INSERTAR	\N	123-456-789-147, TELEFONO, CISCO, RM-258-AC, GRIS, 14725-36985-145-2514, TELEFONO CON VOCINA DE ASIGNACION IP, 2021-11-08, M.P.P. RELACIONES INTERIORES, JUSTICIA Y PAZ, EMERGENCIAS 911, BUEN ESTADO, 3 , 1 , 2021-11-08, 5 	2021-11-08 13:11:17
38	99999999	Registrar Bienes	bienes	INSERTAR	\N	123-789-456-123, RADIO, MOTOROLA, MT-147-59-RR, NEGRO, 147258-AS1472-123456, TELEFONO UHF SISTEMA TROCALIZADO, 2021-11-08, M.P.P. RELACIONES INTERIORES, JUSTICIA Y PAZ, EMERGENCIAS 911, POSEE CARGADOR, 2 , 1 , 2021-11-08, 1 	2021-11-08 13:11:47
39	99999999	Registrar Bienes	bienes	INSERTAR	\N	258-369-369, RADIO, MOTOROLA, MT-QWER-147, NEGRO, 14758-QW2581478, TELEFONO DE ESTACION PARA COMUNICACIONES, 2021-11-08, M.P.P. RELACIONES INTERIORES, JUSTICIA Y PAZ, EMERGENCIAS 911, BUEN ESTADO, 2 , 1 , 2021-11-08, 2 	2021-11-08 13:11:20
40	99999999	Registrar Bienes	bienes	INSERTAR	\N	987-258-654-325, RADIO UHF, MOTOROLA, MOTO-147-12, NEGRO, 14785-69853-256321, RADIO DE COMUNICACIONES UHF SISTEMA TETRA, 2021-11-08, M.P.P. RELACIONES INTERIORES, JUSTICIA Y PAZ, EMERGENCIAS 911, SE ENCUENTRA EN BUEN ESTADO, 2 , 1 , 2021-11-08, 3 	2021-11-08 13:11:45
41	16200660	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	1, 1	2021-11-08 13:11:25
42	16200660	Apertura de guardia	guardias	Insertar	\N	1, sin novedad	2021-11-08 13:11:03
43	16200660	Nuevas Solicitudes	solicitudes	Insertar	\N	13:11:06, 2021-11-08, 13:11:06, 13:11:06, Pedro, araujo, (424) 785-4512, 22 , BARRIO ANDRÉS ELOY BLANCO, hotel tibisay, 941, , 1, 5 , Detalles de la solicitud, , , , , 1, 0, , , Dirección exacta, , 16200660 , , , 	2021-11-08 14:11:54
44	16200660	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3855465, 2021-11-08, 11:05:31, 11:32:12, BANCO BICENTENARIO, 122, MERIDA CENTRO SECTOR GLORIAS PATRIAS AV 3 CON CALLE 33, EDIFICIO GLURIA PLANTA BAJA , SE HA ACTIVADO LA ALARMA DE LA AGENCIA DEL BANCO BICENTENARIO , SE LE PASO LA I9NFORMACION A LOA POLICIA DEL ESTADO MERIDA BOLIVARIONO DONDE ME ATENDIO EL O/J JOSE MESA OPERADOR DE GUARDIA INDICANDO QUE SE COMUNICARIA CON LOS ENCARGADOS DE LOS CUADRANTES DE PAS PARA QUE VALLAN Y VERIFIQUEN ESA SOLICITUD ENTRANTE CONTROL SIN NOVEDAD , 0, 0, 190, 947, SECTOR GLORIAS PATRIAS, , 1296, 1267, 02:11, Bomberos Rescate, FALSE, 0, FALSE, 0, 1	2021-11-08 14:11:34
45	16200660	Observaciones de Guardia	observaciones	Insertar	\N	se le coloco un raton nuevo al computador, , , , 1, 5	2021-11-08 14:11:46
46	13499752	Inicio de Session	Usuario	VALIDAR	\N	4, AHernandez, 3, \n\t\t\t1, 13499752, 08/11/2021 | 14:24:22 	2021-11-08 14:24:22
47	13499752	Inicio de Session	Usuario	VALIDAR	\N	4, AHernandez, 3, \n\t\t\t1, 13499752, 08/11/2021 | 14:26:15 	2021-11-08 14:26:15
48	13499752	Inicio de Session	Usuario	VALIDAR	\N	4, AHernandez, 3, \n\t\t\t1, 13499752, 08/11/2021 | 14:26:26 	2021-11-08 14:26:26
49	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 08/11/2021 | 14:28:51 	2021-11-08 14:28:51
50	17842117	Inicio de Session	Usuario	VALIDAR	\N	5, MFernandez, 3, \n\t\t\t1, 17842117, 08/11/2021 | 14:29:52 	2021-11-08 14:29:52
51		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	1, 2, 3, 4	2021-11-08 14:11:55
52		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	1, 2, 3, 4	2021-11-08 14:11:59
53	13499752	Inicio de Session	Usuario	VALIDAR	\N	4, AHernandez, 3, \n\t\t\t1, 13499752, 08/11/2021 | 14:32:04 	2021-11-08 14:32:04
54	13499752	Apertura de guardia	guardias	Insertar	\N	1, recibiendo sin novedad	2021-11-08 14:11:18
55	8042991	Apertura de guardia	guardias	Insertar	\N	1, recibi la guardia sin novedad	2021-11-08 14:11:19
56	17842117	Apertura de guardia	guardias	Insertar	\N	1, hoy 08/11/2021 se recibe la guardia en el sistema integrado de articulacion de atencion para la atencion de la emergencias ven 9.1.1 guardia de 24 horas,	2021-11-08 14:11:42
57	17842117	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	1, 2, 3, 4	2021-11-08 14:11:41
58	17842117	Nuevas Solicitudes	solicitudes	Insertar	\N	14:11:00, 2021-11-08, 14:11:00, kassandra maria, jerez marquez, (041) 207-8274, 9 , 36 , URBANIZACIÓN BELLA VISTA, despues del tanque de agua de merida , 942, 4, 5 , parroquia osuna rorodriguez, parte alta bloque 39 apartamento 00-01 , 17842117 	2021-11-08 14:11:36
59	13499752	Nuevas Solicitudes	solicitudes	Insertar	\N	14:11:00, 2021-11-08, 14:11:00, jesus , rivera, (426) 326-5987, 2 , 57 , BARRIO SAN ISIDRO, vias a jaji, 939, 2, 5 , los curos, 13499752 	2021-11-08 14:11:39
60	8042991	Nuevas Solicitudes	solicitudes	Insertar	\N	14:11:02, 2021-11-08, 14:11:02, jose , penia, (042) 627-4069, 5 , 1 , 0, esquina la concordia, 915, 3, 5 , ejidoserca de el liceo arias, 8042991 	2021-11-08 14:11:23
61	13499752	Cierre Solicitudes	solicitudes	Insertar	\N	14:11:02, 2021-11-08, 14:11:02, 14:11:57, JOSE , PENIA, (042) 627-4069, 1, 0, ESQUINA LA CONCORDIA, 915, 0, 2, 1 , PERSONA ARMADA, polo, -1, -1, -1, FALSE, FALSE, 0, 1, EJIDOSERCA DE EL LICEO ARIAS, 13499752 , 8042991, 1, 0, 2 	2021-11-08 14:11:23
62	13499752	Cierre Solicitudes	solicitudes	Insertar	\N	14:11:00, 2021-11-08, 14:11:00, 14:11:48, JESUS , RIVERA, (426) 326-5987, 57, BARRIO SAN ISIDRO, VIAS A JAJI, 939, 0, 2, 1 , INFOEMA DE INCENDIO DE VEGETACION, polo, 1, 1, 1, TRUE, TRUE, 1, 1, LOS CUROS, 13499752 , 13499752, 1, 1, 2 	2021-11-08 14:11:39
63	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	14:11:00, 2021-11-08, 14:11:00, 14:11:49, KASSANDRA MARIA, JEREZ MARQUEZ, (041) 207-8274, 36, URBANIZACIÓN BELLA VISTA, DESPUES DEL TANQUE DE AGUA DE MERIDA , 942, 0, 3, 1 , SE ESTA PROCESO UNA FIESTA CON BEBIDAS ALCOHOLICAS, Y CON MENORES DE EDAD , al sitio se precento los funcionarios de guartda cabo 2 francisco peres y jose aria en la unidad alfa 3 de los bomberos, 1, 2, 1, TRUE, FALSE, 1, 1, PARROQUIA OSUNA RORODRIGUEZ, PARTE ALTA BLOQUE 39 APARTAMENTO 00-01 , 8042991 , 17842117, 1, 1, 1 	2021-11-08 14:11:36
64	17842117	Cierre Solicitudes	solicitudes	Insertar	\N	13:11:06, 2021-11-08, 13:11:06, 14:11:37, PEDRO, ARAUJO, (424) 785-4512, 22, BARRIO ANDRÉS ELOY BLANCO, HOTEL TIBISAY, 941, 1, 4, 2 , DETALLES DE LA SOLICITUD, sargento peña en la unidad morotiza 0.90, -00, 01, 02, TRUE, FALSE, 1, 1, DIRECCIóN EXACTA, 17842117 , 16200660, 01, 4, 4 	2021-11-08 14:11:54
65	17842117	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3853370, 2021-11-03, 14:45:38, 20:22:08, ANA PEREZ, 87, MERIDA AV 2 LORAS ESQUINA CON EL VIADUCTO CAMPO ELIAS , INDICAN DE UN MASCULINO DE APROXI 20 QUIEN APARENTEMENTE SUFRIO PERDIDA DE CONSCIENCIA CAE DE SU PROPIA ALTURA OCACIONANDO LESION A NIVEL DEL CRANEO CON FUERTE HEMORRAGIA SOLICITAN APOYO DE PARAMEDICOS EN EL LUGAR , AL SITIO LA UNIDAD B-073  CONDUCIDA  POR EL TENIENTE ADOLFO PE�A   AL MANDO DEL   PRIMER TENIENTE FERNADO RUIZ  QUIEN AL LLEGAR AL SITIO VERIFICO QUE SE TRATABA DE UN SERVICIO MEDICO PRE HOSPITALARIO  AL  CIUDADANO GABRIEL SOTO  MORA  DE 38  A�OS  CI  V.- 19.335.876 QUIEN PRESENTO TRAUMATISMO A NIVEL FACIAL HERIDA CONTUSA   ESPECIFICAMENTE ARCO SUPRAXILIAR DERECHO  REALIZANDOSE UNA ASEPCIA CUBRIENDOLA,  INMOVILIZADO  TRANSLADADO EN LA UNIDAD B-073  AL INSTITUTO VENEZOLANO SEGUROS SOCIALES DR TULIO CARNEVALI SALVATIERRA   RECIBIDA POR EL MEDICO DE GUARDIA   JESUS SILVA  MPPS 145946, 0, 0, 190, 947, VIADUCTO CAMPO EL�AS, , 1258, 145, 03:11, INPRADEM, PM Foraneo, Supervision, FALSE, 0, FALSE, 0, 4	2021-11-08 15:11:10
66	13499752	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3855316, 2021-11-08, 01:57:44, 08:24:43, ALFREDO ALTUVE, 118, MERIDA SECTOR LOS PERIODISTAS DESPUES DEL AMBULATORIO PRIMER EDIFCIIO A MANO DERECHA TORRE 1 APRATAMENTO 02 PLANTA BAJA, SOLICITANTE INFORMA SOBRE MASCULINO DE 85 A�OS DE EDAD EL MISMO FALLECIO AL PARECER  DE CAUSA NATURAL SOLICITAN COMISION DEL CICPC EN EL SITIO , SE REALIZA LLAMADO A LA DOCTORA CAROLINA BARRIOS DE HOMICIDIOS DEL CICPC LA CUAL COORDINA CON PERSONAL DE SENAMECF PARA QUE ASISTAN AL SITIO, YA QUE SE HABL� CON LA DOCTORA LENIS MENDOZA CI: 16.654.057 DEL CENTRO ASISTENCIAL DEL SECTOR LOS PERIODISTAS Y LA MISMA INDICA QUE SE TRATA DE UN CASO SOSPECHOSO DE COVID 19 Y TIENEN QUE CUMPLIR CON EL PROTOCOLO. LOS DATOS DEL OCCISO SON VICTORIANO ALTUVE DE 87 A�OS CI: V-7649309, 1, 0, 190, 946, URB. LOS PERIODISTAS, , 1273, 1016, 03:11, INPRADEM, PM Foraneo, FALSE, 0, FALSE, 0, 2	2021-11-08 15:11:47
67	13499752	Observaciones de Guardia	observaciones	Insertar	\N	dejaron manos libre, , , , 2, 2	2021-11-08 15:11:29
68	17842117	Observaciones de Guardia	observaciones	Insertar	\N	, , , MI COMPAÑERO DEja SU Cargador de su celular,, durante su guardia, , 4, 1	2021-11-08 15:11:17
69	8042991	Observaciones de Guardia	observaciones	Insertar	\N	mi compañera dejo un lapicero y no se sucito nigun eventualidad relevante , , , , 3, 3	2021-11-08 15:11:36
70	17842117	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	1, 2, 3, 4	2021-11-08 15:11:49
71	8042991	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	1, 2, 3, 4	2021-11-08 15:11:02
72	13499752	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	1, 2, 3	2021-11-08 15:11:12
73	13499752	Cierre de guardia	guardias	Insertar	\N	1, pasdpasdppas	2021-11-08 15:11:21
74	13499752	CIERRE DE SESSION	USUARIO	VALIDAR	\N	4, AHernandez, 3, 1, 13499752, 08/11/2021 | 15:17:23 	2021-11-08 15:17:23
75	17842117	Cierre de guardia	guardias	Insertar	\N	1, no esta el radio uhf	2021-11-08 15:11:24
76	17842117	CIERRE DE SESSION	USUARIO	VALIDAR	\N	5, MFernandez, 3, 1, 17842117, 08/11/2021 | 15:17:26 	2021-11-08 15:17:26
77	8042991	Cierre de guardia	guardias	Insertar	\N	1, se procede a el cierre de guardia sn	2021-11-08 15:11:53
78	8042991	CIERRE DE SESSION	USUARIO	VALIDAR	\N	3, JSosa991, 3, 1, 8042991, 08/11/2021 | 15:17:56 	2021-11-08 15:17:56
79	13499752	Inicio de Session	Usuario	VALIDAR	\N	4, AHernandez, 3, \n\t\t\t1, 13499752, 08/11/2021 | 15:18:02 	2021-11-08 15:18:02
80		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	1, 2, 3, 4	2021-11-08 15:11:12
81	13499752	Apertura de guardia	guardias	Insertar	\N	1, polo	2021-11-08 15:11:20
82	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 08/11/2021 | 15:22:23 	2021-11-08 15:22:23
83	99999999	Registro de Personal	personal	INSERTAR	\N	16445441, WILMER, DE JESUS, ALBARRAN, RIVERA, (426) 232-7453, (274) 996-3804, ALBARRAN_32@HOTMAIL.COM, 1, 2, SECTOR LOS CARACOLES, SIN NUMERO, 13, 114, 00, 00, ABASTO LOS PEñA, 2021/11/8 15:11:23, 968, 4 , 2, 2 , 2 , 2 , 1 , 1 , 1 	2021-11-08 15:11:23
84	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	19048401, MARIA, VEGA, (426) 377-4090, LLAMAR EN CASO DE EMERGENCIA, 16445441, 7 	2021-11-08 15:11:13
85	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	LUGAR FAVORITO, AEIOU, DEPORTE FAVORITO, AEIOU	2021-11-08 15:11:42
86	99999999	Registro de Usuario	usuario	INSERTAR	\N	WAlbarran4, 463d16dffb5cbc86c78dd0b772d1322fe0f64584, 3 , 1, 16445441, 9	2021-11-08 15:11:59
87	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 08/11/2021 | 15:30:51 	2021-11-08 15:30:51
88	16200660	Inicio de Session	Usuario	VALIDAR	\N	6, JUzcategui, 2, \n\t\t\t1, 16200660, 08/11/2021 | 15:32:09 	2021-11-08 15:32:09
89	16200660	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	40, 10, 7, 35, 378, 71, 73, 614, 3714045 , 1	2021-11-08 15:11:24
90	16200660	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	1, 1	2021-11-08 15:11:08
91	16200660	Cierre de guardia	guardias	Insertar	\N	1, realizamos el cierre de guardia sin novedad	2021-11-08 15:11:55
92	16200660	CIERRE DE SESSION	USUARIO	VALIDAR	\N	6, JUzcategui, 2, 1, 16200660, 08/11/2021 | 15:54:58 	2021-11-08 15:54:58
93	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 10/11/2021 | 09:48:17 	2021-11-10 09:48:17
94	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 10/11/2021 | 10:15:12 	2021-11-10 10:15:12
95	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 10/11/2021 | 10:56:32 	2021-11-10 10:56:32
96	99999999	Registro de Personal	personal	INSERTAR	\N	17340596, GABRIEL, , TORRES, GUERRERO, (412) 122-5093, (274) 244-1430, TORRESGUERREROGABRIEL01@GMAIL.COM, 0, 00, SECTOR LOS CHORROS DE MILLA, PRINCIPAL, PRINCIPAL, 6-92, 00, 00, METROS ABAJO DEL HOTEL RIO MILLA, 2021/11/10 10:11:44, 941, 1 , 2, 1 , 4 , 1 , 4 , 1 , 3 	2021-11-10 10:11:44
97	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	8024736, ISABEL, GUERRERO, (414) 732-9749, LLAMAR EN CASO DE EMERGENCIA, 17340596, 1 	2021-11-10 11:11:57
98	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	HOBBY FAVORITO, PREHOSPITALARIA, NOMBRE MASCOTA, CANELA	2021-11-10 11:11:04
99	99999999	Registro de Usuario	usuario	INSERTAR	\N	GTorres596, 140840a1f8b8e59ca65622b1391ffdfdea8f760c, 4 , 1, 17340596, 10	2021-11-10 11:11:48
100	99999999	Registro de Personal	personal	INSERTAR	\N	27777826, NEIRI, COROMOTO, PEREZ, GUEDEZ, (424) 750-2075, (000) 000-0000, NEIRYPEREZ.16D@GMAIL.COM, 1, 1, SECTOR LOS CUROS, PRINCIPAL, SIN NUMERO, 20, 02, 00, SECTOR SAN VICENTE, 2021/11/10 11:11:07, 942, 1 , 1, 2 , 4 , 1 , 4 , 1 , 3 	2021-11-10 11:11:07
101	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	15175000, ALEXIS, GUEDEZ, (424) 775-4800, LLAMAR EN CASO DE EMERGENCIA, 27777826, 1 	2021-11-10 11:11:17
102	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE MI HIJO, ALAN, MI BEBIDA FAVORITA, AGUA	2021-11-10 11:11:14
103	99999999	Registro de Usuario	usuario	INSERTAR	\N	NPerez826, e84d979b400c8f943f3c4ceb0ad7ea4016779913, 4 , 1, 27777826, 11	2021-11-10 11:11:01
104	99999999	Registro de Personal	personal	INSERTAR	\N	26052701, YENNIFER, ANDREA, DUGARTE, ANGULO, (414) 975-7448, (274) 266-6273, YENNIFERANDREADUGARTEANGULO@GMAIL.COM, 1, 2, SECTOR LOMA DE MAITINES, LAS AMERICAS, PUENTA LA PEDREGOSA, 111, 00, 00, MINI CC MIS RECUERDOS, 2021/11/10 11:11:20, 939, 1 , 1, 2 , 4 , 1 , 4 , 1 , 3 	2021-11-10 11:11:20
105	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	8032619, ROSA, ANGULO, (414) 079-6213, LLAMAR EN CASO DE EMERGENCIA, 26052701, 1 	2021-11-10 11:11:14
106	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	COLOR FAVORITO, AZUL REY, HOBBY FAVORITO, CANTAR	2021-11-10 11:11:42
107	99999999	Registro de Usuario	usuario	INSERTAR	\N	YDugarte701, b1eb32109d3c20a7a66dbd789b4d74291a636f94, 4 , 1, 26052701, 12	2021-11-10 11:11:32
251	17129573	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	4, 1	2021-11-13 07:11:29
285		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	5, 2, 3, 4	2021-11-15 10:11:00
108	99999999	Registro de Personal	personal	INSERTAR	\N	16664398, JOSE, RAMON, VELAZQUEZ, DUGARTE, (416) 669-8341, (000) 000-0000, JOSE12101983@GMAIL.COM, 1, 2, URBANIZACIÓN CAMPO DE ORO, PRINCIPAL, 1, 5-64, 00, 00, FRENTE A ANTIGUA FARMACIA SANTA MONICA, 2021/11/10 11:11:38, 934, 1 , 2, 3 , 5 , 3 , 3 , 1 , 3 	2021-11-10 11:11:38
109	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	8027751, ALBA, DUGARTE, (416) 174-0231, LLAMAR EN CASO DE EMERGENCIA, 16664398, 1 	2021-11-10 12:11:26
110	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE MI HIJO, ROMAN, NOMBRE MASCOTA, PRINCESA	2021-11-10 12:11:56
111	99999999	Registro de Usuario	usuario	INSERTAR	\N	JVelazquez398, f59722d46b26b9837ef4c29e678f6d7d1b4ae26a, 2 , 1, 16664398, 13	2021-11-10 12:11:40
112	16664398	Inicio de Session	Usuario	VALIDAR	\N	13, JVelazquez398, 2, \n\t\t\t1, 16664398, 10/11/2021 | 12:31:21 	2021-11-10 12:31:21
113	99999999	Modificar Personal	personal	MODIFICAR	\N	13499752, AURELIO, , HERNANDEZ, RUIZ, (424) 777-0712, (000) 000-0000, ANGELYVALERIA15@GMAIL.COM, t, 02, SECTOR LOS CUROS, SECTOR G7, CALLE 2, 12, 00, 00, DETRAS DE LICEO ROMULO BETANCOURD, 2021-11-08 12:11:56, 942, 1, 2, 1, 2, 2, 2, 1, 1	2021-11-10 12:11:28
114	16664398	Personal de Guardia	personal_grupos_guardias	Insertar	\N	16664398 , , 26052701 , 17340596 , 27777826 , , , , 8042991 , , , , , , , , , 3	2021-11-10 12:11:34
115	16664398	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	2, 1	2021-11-10 12:11:02
116	16664398	Apertura de guardia	guardias	Insertar	\N	3, Se recibe el servicio de la guardia sin novedad con las notas antes expuestas, las áreas limpia y en orden.	2021-11-10 12:11:20
117	16664398	Nuevas Solicitudes	solicitudes	Insertar	\N	12:11:54, 2021-11-10, 12:11:54, 12:11:54, ramon, velazquez, (041) 666-9834, 54 , SECTOR BELÉN, farmacia, 932, , 10, 5 , Incendio de estructura tipo vivienda con personas atrapadas., , , , , 0, 1, , , belen, av 8 entre calle 7 y 8, , 16664398 , , , 	2021-11-10 12:11:25
118	16664398	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3856322, 2021-11-10, 08:42:06, 10:26:31, BANCO PROVINCIAL, 122, MERIDA AV URDANETA CON VIADUCTO MIRANDA , LLAMADA DE EMERGENCIA POR ACTIVACION  DE ALARMA DE LAS INSTALACIONES DEL BANCO , SE LE PASO LA SOLICITUD AC LA P�LICIA DEL ESTADO BOLIVARIANO DE MERIDA AL CCP, UNO AL JEFE DE VAREA PARA ESTE MOMENTO S/BARTOLOME VIVAS INDICANDO QUE CCORDINA CON LOS CUADRANTE PAZ PARA QUE LE DEN REPUESTA , 0, 0, 190, 947, SECTOR GLORIAS PATRIAS, , 1258, 1267, 12:11, Bomberos Rescate, FALSE, 0, FALSE, 0, 10	2021-11-10 12:11:01
119	16664398	Observaciones de Guardia	observaciones	Insertar	\N	siendo las 12:00hlv ingresa el funcionario de la policia sosa jose a laborar motivado a que se habia quedado accidentado , , , , 10, 5	2021-11-10 12:11:00
120	16664398	Observaciones al personal de guardia	personal_guardias	Insertar	\N	se retira porque va a presentar una prueba , 6 , 17340596 , 10	2021-11-10 12:11:40
121	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 10/11/2021 | 09:28:13 	2021-11-10 09:28:13
154	99999999	Registro de Personal	personal	INSERTAR	\N	20435049, MARIANA, ANDREINA, TORO, ARAQUE, (416) 675-5088, (274) 221-7646, PCMERIDAV.MTORO5049@GMAIL.COM, 0, 0, SECTOR LA VEGA, CENTENARIO, PRINCIPAL, 60-B, 01, 00, PASO ARRIBA DE LA CAPILLA, 2021/11/10 09:11:15, 913, 1 , 2, 3 , 1 , 2 , 2 , 1 , 3 	2021-11-10 09:11:15
155	99999999	Modificar Pariente	parantesco_personal	MODIFICAR	\N	9477580, AALEJANDRINA, ARAQUE, (274) 221-7643, LLAMAR EN CASO DE EMERGENCIA, 20435049, 1	2021-11-10 09:11:29
156	99999999	Modificar Pariente	parantesco_personal	MODIFICAR	\N	9477580, AALEJANDRINA, ARAQUE, (274) 221-7646, LLAMAR EN CASO DE EMERGENCIA, 20435049, 1	2021-11-10 09:11:49
157	99999999	Modificar de Usuario	usuario	MODIFICAR	\N	MToro049, 35ea734a527d24c68d6fbfdb9c795b0a11c63a3d, 3, 1, 20435049, 14	2021-11-10 09:11:04
158	13499752	Inicio de Session	Usuario	VALIDAR	\N	4, AHernandez, 3, \n\t\t\t1, 13499752, 10/11/2021 | 10:16:07 	2021-11-10 10:16:07
159	20435049	Inicio de Session	Usuario	VALIDAR	\N	14, MToro049, 3, \n\t\t\t1, 20435049, 10/11/2021 | 10:16:32 	2021-11-10 10:16:32
160		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	2, 2, 3, 4	2021-11-10 10:11:05
161		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	2, 2, 3, 4	2021-11-10 10:11:28
162	13499752	Apertura de guardia	guardias	Insertar	\N	3, se rcibe el servicio de guardia sin novedad.	2021-11-10 10:11:19
163	20435049	Apertura de guardia	guardias	Insertar	\N	3, siendo las 08:00 am se recibe la guardia sin novedad	2021-11-10 10:11:26
164	20435049	Nuevas Solicitudes	solicitudes	Insertar	\N	10:11:10, 2021-11-10, 10:11:10, gaby, contreras , (041) 207-8274, 7 , 3 , 0, la farmacia las americas , 931, 12, 5 , av las americas, frente a farmacia las americas., 20435049 	2021-11-10 10:11:03
165	13499752	Nuevas Solicitudes	solicitudes	Insertar	\N	10:11:58, 2021-11-10, 10:11:58, jesus, rivera, (426) 326-5987, 3 , 54 , SECTOR ENTABLITO L, vias a jaji, 942, 11, 5 , los curos, 27777826 	2021-11-10 10:11:13
166	20435049	Cierre Solicitudes	solicitudes	Insertar	\N	10:11:10, 2021-11-10, 10:11:10, 10:11:04, GABY, CONTRERAS , (041) 207-8274, 3, 0, LA FARMACIA LAS AMERICAS , 931, 0, 12, 1 , SEGUN INDICA LA CIUDADANA QUE SE ESTA PRESENTANDO UN ROBO A PERSONAS DE LA FARMACIA., al sitio se dirijio el oficial sanchez jose, quien indica que el ciudadano alvaro soso fue esposado por querer robar la farmacia , 0, 1, 0, FALSE, FALSE, 0, 0, AV LAS AMERICAS, FRENTE A FARMACIA LAS AMERICAS., 20435049 , 20435049, 0, 0, 5 	2021-11-10 10:11:03
167	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 10/11/2021 | 10:41:07 	2021-11-10 10:41:07
168	13499752	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3855990, 2021-11-09, 07:53:09, 09:17:39, BANCO DEL SUR, 122, EL VIGIA AV 16 EDIFICIO VERENAP, ALARMA CONTRA INCENDIO BANCO DEL SUR , SE LE PASO LA INFORMACION A LA SALA CUPAZ, TOMA NOTA DEL REPORTE EL OPERADOR RONALD DIAZ, QUIEN DESPACHO AL CUADRANTE CORRESPONDIENTE, 0, 0, 178, 893, AV. BOLIVAR, , 1311, 1016, 10:11, Bomberos Servivida, FALSE, 0, FALSE, 0, 11	2021-11-10 10:11:03
169	13499752	Observaciones de Guardia	observaciones	Insertar	\N	se produjo varios apagones del fluido electrico., , , , 11, 2	2021-11-10 10:11:00
170	20435049	Observaciones de Guardia	observaciones	Insertar	\N	se fue la luz en dos ocaciones el dia de hoy a las 13 20 y a las 13 46, , , , 12, 1	2021-11-10 10:11:05
171	13499752	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	2, 2, 3, 4	2021-11-10 10:11:41
172	20435049	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	2, 2, 3, 4	2021-11-10 10:11:44
173	20435049	Cierre de guardia	guardias	Insertar	\N	3, se realiza el sierre de guardia con bajones de luz y sin novedad	2021-11-10 11:11:30
174	20435049	CIERRE DE SESSION	USUARIO	VALIDAR	\N	14, MToro049, 3, 1, 20435049, 10/11/2021 | 11:00:32 	2021-11-10 11:00:32
175	13499752	Cierre de guardia	guardias	Insertar	\N	3, se realizo el cierre de guardia con la novedad de los bajones de sistema electrico	2021-11-10 11:11:47
176	13499752	CIERRE DE SESSION	USUARIO	VALIDAR	\N	4, AHernandez, 3, 1, 13499752, 10/11/2021 | 11:00:48 	2021-11-10 11:00:48
252	17129573	Apertura de guardia	guardias	Insertar	\N	1, Se recibe la guardia sin novedades resaltantes	2021-11-13 08:11:17
177	99999999	Modificar Personal	personal	MODIFICAR	\N	13499752, AURELIO, , HERNANDEZ, RUIZ, (424) 777-0712, (000) 000-0000, ANGELYVALERIA15@GMAIL.COM, t, 02, SECTOR LOS CUROS, SECTOR G7, CALLE 2, 12, 00, 00, DETRAS DE LICEO ROMULO BETANCOURD, 2021-11-08 12:11:56, 942, 1, 2, 1, 2, 2, 2, 1, 1	2021-11-10 11:11:39
178	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 10/11/2021 | 11:02:43 	2021-11-10 11:02:43
179	16664398	Inicio de Session	Usuario	VALIDAR	\N	13, JVelazquez398, 2, \n\t\t\t1, 16664398, 10/11/2021 | 11:19:21 	2021-11-10 11:19:21
180	16664398	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	6, 0, 3, 15, 188, 4, 13, 234, 3856309 , 10	2021-11-10 11:11:57
181	16664398	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	2, 1	2021-11-10 11:11:02
182	16664398	Cierre de guardia	guardias	Insertar	\N	3, se entrega la guardia sin mivedad	2021-11-10 11:11:22
183	16664398	CIERRE DE SESSION	USUARIO	VALIDAR	\N	13, JVelazquez398, 2, 1, 16664398, 10/11/2021 | 11:22:24 	2021-11-10 11:22:24
184	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 11/11/2021 | 08:34:27 	2021-11-11 08:34:27
185	99999999	Registro de Personal	personal	INSERTAR	\N	29520477, ALEJANDRA, , MORENO, PEñA, (412) 074-3972, (274) 283-0571, ALEJANDRAMP9@GMAIL.COM, 0, 00, SECTOR EL ROSAL, SIN NUMERO, ARAGUANEY, 059-B, 00, 00, DIAGONAL A CASA COMUNITARIA EL ROSAL, 2021/11/11 08:11:07, 962, 1 , 1, 1 , 4 , 1 , 4 , 1 , 4 	2021-11-11 08:11:07
186	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	9476025, RAMON, MORENO, (412) 099-3125, LLAMAR EN CASO DE EMERGENCIA, 29520477, 2 	2021-11-11 08:11:06
187	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE MI PERRO, CHIQUITO, MUSICA FAVORITA, ROCK	2021-11-11 08:11:44
188	99999999	Registro de Usuario	usuario	INSERTAR	\N	AMoreno477, a151acf14f6bcd791b0f8a8f62650699ff2bcb33, 4 , 1, 29520477, 15	2021-11-11 08:11:24
189	99999999	Registro de Personal	personal	INSERTAR	\N	18966872, WENNDY, NAIROBY, MOYA, FLOREZ, (412) 547-6218, (000) 000-0000, WENNDY.MOYA@GMAIL.COM, 0, 00, SECTOR MUCUMBO, SIN NUMERO, FINAL POMPILIO FLORES, SIN NUMERO, 00, 00, PASO ABAJO TALLER LATONERIA RAMON, 2021/11/11 09:11:38, 963, 1 , 1, 4 , 4 , 1 , 4 , 1 , 4 	2021-11-11 09:11:38
190	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	16201803, YACKSON, PICON, (424) 249-3348, LLAMAR EN CASO DE EMERGENCIA, 18966872, 7 	2021-11-11 09:11:01
191	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE MI PERRO, WINKER, NOMBRE DE MI MAMA, VIDALINA	2021-11-11 09:11:31
192	99999999	Registro de Usuario	usuario	INSERTAR	\N	WMoya872, 22f9ac8639d5c768d17e5c02394e993164c30245, 4 , 1, 18966872, 16	2021-11-11 09:11:37
193	99999999	Registro de Personal	personal	INSERTAR	\N	22887354, NEYDA, DEL CARMEN, HERNANDEZ, ACUñA, (424) 776-6573, (000) 000-0000, MAUANTONELA8899@GMAIL.COM, 1, 2, SECTOR LOS CUROS, PRINCIPAL, PRINCIPAL, 34 EDIFICIO 3, 00, 00-01, MODULO CHICHUY, 2021/11/11 09:11:25, 942, 2 , 1, 3 , 4 , 1 , 4 , 1 , 4 	2021-11-11 09:11:25
194	99999999	Modificar de Usuario	usuario	MODIFICAR	\N	NHernandez228, b9fa63325b79ab759d3348392054070731d97749, 4, 1, 22887354, 17	2021-11-11 09:11:44
195	99999999	Registro de Personal	personal	INSERTAR	\N	23302896, KASSANDRA, MARIA, JEREZ, MARQUEZ, (412) 078-2744, (000) 000-0000, KASSANDRAJEREZ07@GMAIL.COM, 1, 2, SECTOR LOS CUROS, PRINCIPAL, PRINCIPAL, 21, 00, 00, PASOS ARRIBA DEL TANQUE AGUAS DE MERIDA, 2021/11/11 10:11:00, 942, 2 , 1, 1 , 5 , 3 , 3 , 1 , 4 	2021-11-11 10:11:00
196	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	17842117, MISAEL, FERNANDEZ, (412) 062-3789, LLAMAR EN CASO DE EMERGENCIA, 23302896, 7 	2021-11-11 10:11:03
197	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE MI PRIMERA HIJA, MARIANGEL, NOMBRE DE MI SEGUNDA HIJA, SOPHIA	2021-11-11 10:11:54
198	99999999	Registro de Usuario	usuario	INSERTAR	\N	KJerez896, 0932445a7c4cfbe3a8b489c79de48af200097a0c, 2 , 1, 23302896, 18	2021-11-11 10:11:09
199	99999999	Registro de Personal	personal	INSERTAR	\N	16908218, JULIO, JOSE, SANCHEZ, NIñO, (412) 061-5433, (000) 000-0000, SJULIO84@GMAIL.COM, 1, 4, CASERÍO LOS RURALES, SIN NUMERO, 1, 5-12, 00, 00, AL LADO POSADA LOS RURALES, 2021/11/11 10:11:06, 964, 1 , 2, 3 , 5 , 3 , 3 , 1 , 4 	2021-11-11 10:11:06
200	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	19046539, NANCY, RANGEL, (412) 763-2387, LLAMAR EN CASO DE EMERGENCIA, 16908218, 7 	2021-11-11 10:11:24
201	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	COLOR FAVORITO, AZUL, APELLIDO MATERNO DE ESPOSA, VARELA	2021-11-11 10:11:26
202	99999999	Registro de Usuario	usuario	INSERTAR	\N	JSanchez218, ce85d76df33c877b6827a578a25fd1613ccb4882, 2 , 1, 16908218, 19	2021-11-11 10:11:20
203	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 11/11/2021 | 10:21:58 	2021-11-11 10:21:58
204	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 11/11/2021 | 10:27:03 	2021-11-11 10:27:03
205	23302896	Observaciones al personal	personal_guardias	Insertar	\N	Andreína Fernández realizo cambio de guardia con neyda Hernández, 9 , 22887354 	2021-11-11 10:11:57
206	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 29520477 , 18966872 , 22887354 , , , , 8042991 , , , , , , 17842117 , , , 4	2021-11-11 10:11:45
207	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	3, 1	2021-11-11 10:11:34
208	23302896	Apertura de guardia	guardias	Insertar	\N	4, Se recibe el áreas de trabajo algo sucio por lo que el personal de mantenimiento no vino a realizar el mismo	2021-11-11 10:11:21
209	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	10:11:19, 2021-11-11, 10:11:19, 10:11:19, maria, gonzalez, (412) 000-0015, 58 , SECTOR PLAZA LAS HEROÍNAS, al lado de la licoreria , 943, , 16, 5 , El solicitante informa que ha sido víctima de hurto hacia su comercio , , , , , 0, 0, , , Mérida centro avenida 2 con calles 13 y 14, , 23302896 , , , 	2021-11-11 10:11:59
210	23302896	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3856261, 2021-11-10, 00:31:43, 01:48:34, BANCO BICENTENARIO, 122, MERIDA, CENTRO DE LA CIUDAD, BANCO BICENTENARIO, AGENCIA GLORIAS PATRIAS, ESDIFICIO GUIGLIA PLANTA BAJA. AVENIDA 3 CON CALLE 33, ALARMA ACTIVADA DE HURTO Y ASALTO.  , SE LE PASA LA INFORMACION A LA SALA CUPAZ, TOMA NOTA DEL REPORTE EL OPERADOR FRANCO PEREZ QUIEN DESPACHA AL CUADRANTE P-14 AL MANDO DEL SUPERVISOR HUGO RONDON EN LA UNIDAD 950, QUIEN VERIFICO LA ENTIDAD BANCARIA Y SE ENCUENTRA SIN NOVEDAD, 0, 0, 190, 947, AV. 3, , 2, 1016, 10:11, Transito, FALSE, 0, FALSE, 0, 16	2021-11-11 10:11:56
211	23302896	Observaciones de Guardia	observaciones	Insertar	\N	Se calló el sistema operativo de llamadas de emergencias del 911 el ingeniero Eduardo intenta su recuperación y hasta la hora ha sido imposible , , , , 16, 5	2021-11-11 10:11:41
212	23302896	Observaciones al personal de guardia	personal_guardias	Insertar	\N	Se retira la operadora por malestar general, 3 , 22887354 , 16	2021-11-11 10:11:41
213	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 11/11/2021 | 11:00:59 	2021-11-11 11:00:59
253	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 13/11/2021 | 08:10:28 	2021-11-13 08:10:28
214	99999999	Registro de Personal	personal	INSERTAR	\N	18123089, LUIS, ALBERTO, MORALES, RONDON, (424) 752-3860, (274) 245-5142, MORALESLUIS1687@GMAIL.COM, 1, 1, URBANIZACIÓN ALFREDO LARA, SINNUMERO, 01 VEREDA 09, 07, 00, 00, DIAGONAL AL PREESCOLAR 021, 2021/11/11 11:11:34, 915, 1 , 2, 3 , 1 , 2 , 4 , 1 , 4 	2021-11-11 11:11:34
215	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	8010477, AURA, RONDON, (274) 245-5142, LLAMAR EN CASO DE EMERGENCIA, 18123089, 1 	2021-11-11 11:11:23
216	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	COLOR FAVORITO, AZUL, DEPORTE FAVORITO, VOLEIBOL	2021-11-11 11:11:19
217	99999999	Registro de Usuario	usuario	INSERTAR	\N	LMorales089, 9439049ddce1adda0f549c10552163d3901c6f64, 3 , 1, 18123089, 20	2021-11-11 11:11:01
218	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 11/11/2021 | 11:08:59 	2021-11-11 11:08:59
219	18123089	Inicio de Session	Usuario	VALIDAR	\N	20, LMorales089, 3, \n\t\t\t1, 18123089, 11/11/2021 | 11:21:05 	2021-11-11 11:21:05
220		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	3, 2, 3, 4	2021-11-11 11:11:06
221	18123089	Apertura de guardia	guardias	Insertar	\N	4, SIN NOVEDAD	2021-11-11 11:11:45
222	18123089	Nuevas Solicitudes	solicitudes	Insertar	\N	11:11:46, 2021-11-11, 11:11:46, JOSE, MOLINA, (416) 978-4205, 9 , 23 , SECTOR ENTABLITO LL, FRENTE AL PREESCOLAR, 942, 17, 5 , URBANIZACION LOS CUROS CALLE PRINCIPAL CASA 09 VERDA 07, 18123089 	2021-11-11 11:11:21
223	18123089	Cierre Solicitudes	solicitudes	Insertar	\N	10:11:19, 2021-11-11, 10:11:19, 11:11:14, MARIA, GONZALEZ, (412) 000-0015, 58, SECTOR PLAZA LAS HEROÍNAS, AL LADO DE LA LICORERIA , 943, 1, 17, 1 , EL SOLICITANTE INFORMA QUE HA SIDO VíCTIMA DE HURTO HACIA SU COMERCIO , SE REALIZA EL DESPACHO DE LA UNIDAD SAR 26 AL MANDIO DE LA OFICIAL OPC II JUAN SANCHEZ EL CUAL VERIFICAN LA SITUACION Y ES POSITIVA SE RESGUARDA LA ZONA., 0, 1, 0, FALSE, FALSE, 1, 0, MéRIDA CENTRO AVENIDA 2 CON CALLES 13 Y 14, 18123089 , 23302896, 1, 0, 3 	2021-11-11 10:11:59
224	18123089	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3856309, 2021-11-10, 08:21:22, 10:24:27, FONDO COMUN, 122, MERIDA, AV LAS AMERICAS CC PLAZA MAYOR, ALAMAR ACTIVADA DEL BANCO FONDO COMUN, SE LE PASO AL CCP, UNO DE  LA POLICIA DEL ESTADO BOLIVARIANO DE MERIDA AL JEFE DE CAREA PARA ELM MOMENTO S/BARTOLOME VIVAS INDICANDO QUE COORDINA CON LOS CUADRANTE DE PAZ DE ESE SECTOR ENCARGADO S/N, 0, 0, 190, 946, GARZON, , 1306, 1267, 11:11, Bomberos Rescate, Supervision, FALSE, 0, FALSE, 0, 17	2021-11-11 11:11:32
225	18123089	Observaciones de Guardia	observaciones	Insertar	\N	, , SIENDO LAS 15:00 SE RECIBE INDUCCION DEL MANEJO DEL LIBRO DE NOVEDADES 911, , 17, 1	2021-11-11 11:11:07
226	18123089	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	3, 2, 3, 4	2021-11-11 11:11:49
227	18123089	Cierre de guardia	guardias	Insertar	\N	4, SIN NOVEDAD	2021-11-11 11:11:07
228	18123089	CIERRE DE SESSION	USUARIO	VALIDAR	\N	20, LMorales089, 3, 1, 18123089, 11/11/2021 | 11:47:09 	2021-11-11 11:47:09
229	23302896	Cierre Solicitudes	solicitudes	Insertar	\N	11:11:46, 2021-11-11, 11:11:46, 11:11:54, JOSE, MOLINA, (416) 978-4205, 23, SECTOR ENTABLITO LL, FRENTE AL PREESCOLAR, 942, 0, 16, 1 , CASA DE COLOR VERDE FRENTE AL PRESCOLAR, Para el momento los funcionarios se encuentran en el sito y informan que hay varias personas dentro de la vivienda, 00, 00, 00, FALSE, TRUE, 0, 1, URBANIZACION LOS CUROS CALLE PRINCIPAL CASA 09 VERDA 07, 23302896 , 18123089, 00, 01, 5 	2021-11-11 11:11:21
230	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 13/11/2021 | 06:26:51 	2021-11-13 06:26:51
231	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 13/11/2021 | 06:42:00 	2021-11-13 06:42:00
232	99999999	Registro de Personal	personal	INSERTAR	\N	14267697, THAIS, BIBIANA, BUSTAMANTE, GARRIDO, (426) 273-2210, (274) 271-2066, THAISB.0280@GMAIL.COM, 1, 2, URBANIZACIÓN EL CENTRAL, ANDRES BELLO, LA NEVADA, 818-1, 00, 00, MUSEO DE CIENCIA, 2021/11/13 06:11:51, 938, 2 , 1, 3 , 5 , 3 , 3 , 1 , 1 	2021-11-13 06:11:51
233	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	16445619, RONALD, DAVILA, (426) 131-8662, LLAMAR EN CASO DE EMERGENCIA, 14267697, 7 	2021-11-13 06:11:34
234	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	CUAL ES MI COLOR FAVORITO, AZUL, NOMBRE DE MI HIJO, CRISTHIAN	2021-11-13 06:11:58
235	99999999	Registro de Usuario	usuario	INSERTAR	\N	TBustamante697, 1c0d450fa93b1cd4aeb2dfb0388684c841549fdf, 2 , 1, 14267697, 21	2021-11-13 06:11:54
236	99999999	Registro de Personal	personal	INSERTAR	\N	17129573, NANCY, CAROLINA, VALERO, RAMIREZ, (412) 965-4950, (274) 251-4551, NANCYCAROLINAVALERO@GMAIL.COM, 1, 1, URBANIZACIÓN CARLOS GAINZA, PRINCIPAL EL ARENAL, PRINCIPAL URB LOS FRAILES, 3, 03, 04, ENTRADA CARLOS GAINZA, 2021/11/13 06:11:57, 932, 1 , 1, 4 , 5 , 3 , 3 , 1 , 1 	2021-11-13 06:11:57
237	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	9477276, CARMEN, RAMIREZ, (412) 164-4300, LLAMAREN CASO DE EMERGENCIA, 17129573, 1 	2021-11-13 06:11:58
238	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	COLOR FAVORITO, AZUL, NOMBRE PRIMERA MASCOTA, CHOCOLATE	2021-11-13 06:11:10
239	99999999	Registro de Usuario	usuario	INSERTAR	\N	NValero573, 438f2efd29232a00843d6128149bf30e787ead4a, 2 , 1, 17129573, 22	2021-11-13 07:11:06
240	99999999	Registro de Personal	personal	INSERTAR	\N	20197663, DAYANA, COROMOTO, GUILLEN, FLORES, (412) 765-8898, (274) 221-5931, DAYANAGRETTEL27@GMAIL.COM, 1, 1, BARRIO LOS ROSALES, CENTENARIO, PASAJE COLON, 3, 00, 00, DIAGONAL A HERMACA, 2021/11/13 07:11:20, 913, 1 , 1, 3 , 4 , 1 , 4 , 1 , 1 	2021-11-13 07:11:20
241	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	14805840, YELIMAR, GUILLEN, (424) 838-2337, LLAMAR EN CASO DE EMERGENCIA, 20197663, 3 	2021-11-13 07:11:18
242	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	SEGUNDO NOMBRE DE MI HIJA, NAZARETH, NOMBRE DE MI PADRE, AZAEL	2021-11-13 07:11:39
243	99999999	Registro de Usuario	usuario	INSERTAR	\N	DGuillen663, 54f95a5cd610903de53885f696f59eca715cf55c, 4 , 1, 20197663, 23	2021-11-13 07:11:38
244	99999999	Registro de Personal	personal	INSERTAR	\N	29794276, KEYLIMAR, YOMARY, PEñALOZA, SANTANA, (426) 336-7739, (000) 000-0000, KEYLIMARSANTANA02@GMAIL.COM, 0, 0, SECTOR EL VALLE, PRINCIPAL, PRINCIPAL, 32-B, 02, 00, FRENTE AL NOVICIADO, 2021/11/13 07:11:53, 936, 1 , 1, 1 , 4 , 1 , 4 , 1 , 1 	2021-11-13 07:11:53
245	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	18796909, KEYLA, SANTANA, (424) 737-9987, LLAMAR EN CASO DE EMERGENCIA, 29794276, 1 	2021-11-13 07:11:40
246	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	MI COLOR FAVORITO, DORADO, NOMBRE DE MI MADRE, KEYLA	2021-11-13 07:11:21
247	99999999	Registro de Usuario	usuario	INSERTAR	\N	KPenaloza276, 8bfdbdac1e0ab346d63bae0c40987ac1cc7ee53c, 4 , 1, 29794276, 24	2021-11-13 07:11:33
248	99999999	Registro de Personal	personal	INSERTAR	\N	18310118, YESSICA, ELIMAR, GONZALEZ, MERCADO, (426) 304-8917, (000) 000-0000, YESSICA_GONZALEZ_115@HOTMAIL.COM, 1, 3, CASERÍO MUCUNUTAN, ENTRADA DOS CAMINOS, EL ELECHAL, SIN NUMERO, 00, 00, CERCA DEL AMBULATORIO, 2021/11/13 07:11:16, 962, 1 , 1, 2 , 2 , 2 , 1 , 1 , 1 	2021-11-13 07:11:16
249	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 13/11/2021 | 07:49:13 	2021-11-13 07:49:13
254	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	08:11:24, 2021-11-13, 08:11:24, 08:11:24, maria, perez, (424) 785-4512, 69 , CARACCIOLO PARRA PÉREZ, estacion de servicio buganvilles, 933, , 19, 5 , solicitante informa de persona arrollada, tendida sobre el pavimento, , , , , 0, 0, , , merida, av los proceres, canal de descenso, , 17129573 , , , 	2021-11-13 08:11:07
255	17129573	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3857440, 2021-11-13, 06:19:43, 08:14:39, GRACIELA ALTUVE, 105, EJIDO SECTOR PAN DE AZUCAR PARTE ALTA MAS ARRIBA DE LA ESCULA. POR LA BODEGA DE NINA, CASA NUMERO 2 COLOR AZUL. SOLICITANTE HACE ESPERA EN VIA PUBLICA, SOLICITANTE INDICA FEMENINA DE TERCERA EDAD CON HIPOGLICEMIA, ASI MISMO MANIFIESTA ESTAR INCONSCIENTE AL MOMENTO SOLICITAN APOYO EN EL SITIO. NUMERO DE CONTACTO 04247038271, AL SITIO LA UNIDAD LINCE 83 AL MANDO DEL SARGENTO MAYOR EDIXON PUCCHINI  QUIEN REPORTA POSITIVO EL SERVICIO TRATANDOSE DE UN SERVICIO MEDICO PRE-HOSPITALARIO  A LA CIUDADANA CARMEN GUTIERREZ  DE 67  A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD V- 8018159 QUIEN PRESENTO HIPOGLICEMIA  ESTABILIZADA Y TRANSLADADA HASTA EL IAHULA EN LA UNIDAD ALFA 2 DE PROTECCION CIVIL CAMPO ELIAS AL MANDO DEL OFICIAL SUPERVISOR II YEISON RAMIREZ SE RETORNANDO SIN NOVEDAD , 0, 0, 183, 914, , , 1221, 1041, 08:11, PM Foraneo, Supervision, FALSE, 0, FALSE, 0, 19	2021-11-13 08:11:05
256	17129573	Observaciones de Guardia	observaciones	Insertar	\N	siendo las 10 am se presentop el Ing Gilbert Gonzales del departamento de teleinformatica de la Gobernacion del estado, para dar la induccion sobre el libro de novedades al peronal del Ven911 Merida, , , , 19, 5	2021-11-13 08:11:51
257	17129573	Observaciones al personal de guardia	personal_guardias	Insertar	\N	la auxiliar de supervision se retira de la guardia, por orden medica, 3 , 14267697 , 19	2021-11-13 08:11:52
258	18310118	Inicio de Session	Usuario	VALIDAR	\N	25, YGonzalez118, 3, \n\t\t\t1, 18310118, 13/11/2021 | 08:49:15 	2021-11-13 08:49:15
259		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	4, 2, 3	2021-11-13 08:11:19
260	18310118	Apertura de guardia	guardias	Insertar	\N	1,  se realiza la apertura de guardia  donde el radio  uhf no se encuentra en el área de trabajo 	2021-11-13 08:11:32
261	18310118	Nuevas Solicitudes	solicitudes	Insertar	\N	08:11:40, 2021-11-13, 08:11:40, yessica, gonzalez, (426) 304-8917, 1 , 72 , CONJUNTO RESIDENCIAL ANDRÉS BELLO, CERCA DE AUTO LAVADO EL TIO, 938, 20, 5 ,  AVENIDA LOS PRÓCERES   CASA NUMERO 2-76  CASA DE COLOR BLANCO , 18310118 	2021-11-13 09:11:39
262	18310118	Cierre Solicitudes	solicitudes	Insertar	\N	08:11:24, 2021-11-13, 08:11:24, 09:11:11, MARIA, PEREZ, (424) 785-4512, 69, CARACCIOLO PARRA PÉREZ, ESTACION DE SERVICIO BUGANVILLES, 933, 1, 20, 1 , SOLICITANTE INFORMA DE PERSONA ARROLLADA, TENDIDA SOBRE EL PAVIMENTO,  SE  REALIZO   UNA TOMA DE TENCION   DE 120/70mhg y  se le ralizo   estabilizacion en la  extremidad inferir derecha  , 0, 1, 0, FALSE, FALSE, 1, 1, MERIDA, AV LOS PROCERES, CANAL DE DESCENSO, 18310118 , 17129573, 2, 1, 1 	2021-11-13 08:11:07
263	18310118	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3857440, 2021-11-13, 06:19:43, 08:14:39, GRACIELA ALTUVE, 105, EJIDO SECTOR PAN DE AZUCAR PARTE ALTA MAS ARRIBA DE LA ESCULA. POR LA BODEGA DE NINA, CASA NUMERO 2 COLOR AZUL. SOLICITANTE HACE ESPERA EN VIA PUBLICA, SOLICITANTE INDICA FEMENINA DE TERCERA EDAD CON HIPOGLICEMIA, ASI MISMO MANIFIESTA ESTAR INCONSCIENTE AL MOMENTO SOLICITAN APOYO EN EL SITIO. NUMERO DE CONTACTO 04247038271, AL SITIO LA UNIDAD LINCE 83 AL MANDO DEL SARGENTO MAYOR EDIXON PUCCHINI  QUIEN REPORTA POSITIVO EL SERVICIO TRATANDOSE DE UN SERVICIO MEDICO PRE-HOSPITALARIO  A LA CIUDADANA CARMEN GUTIERREZ  DE 67  A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD V- 8018159 QUIEN PRESENTO HIPOGLICEMIA  ESTABILIZADA Y TRANSLADADA HASTA EL IAHULA EN LA UNIDAD ALFA 2 DE PROTECCION CIVIL CAMPO ELIAS AL MANDO DEL OFICIAL SUPERVISOR II YEISON RAMIREZ SE RETORNANDO SIN NOVEDAD , 0, 0, 183, 914, , , 1221, 1041, 09:11, PM Foraneo, Supervision, FALSE, 0, FALSE, 0, 20	2021-11-13 09:11:30
264	18310118	Observaciones de Guardia	observaciones	Insertar	\N	, pendiente la reunión  el dia 09 -12-2021  a las 09:00, , , 20, 2	2021-11-13 09:11:02
265	18310118	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	4, 2, 3	2021-11-13 09:11:15
266	18310118	Cierre de guardia	guardias	Insertar	\N	1, se realizo el  cierre de guardia sin ninguna novedad	2021-11-13 09:11:53
267	18310118	CIERRE DE SESSION	USUARIO	VALIDAR	\N	25, YGonzalez118, 3, 1, 18310118, 13/11/2021 | 09:30:57 	2021-11-13 09:30:57
268	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 13/11/2021 | 09:32:30 	2021-11-13 09:32:30
269	17129573	Cierre Solicitudes	solicitudes	Insertar	\N	08:11:40, 2021-11-13, 08:11:40, 09:11:22, YESSICA, GONZALEZ, (426) 304-8917, 72, CONJUNTO RESIDENCIAL ANDRÉS BELLO, CERCA DE AUTO LAVADO EL TIO, 938, 1, 19, 1 ,  RESCATE DE ANIMAL, se dirige al lugar lince 74 al mando del sgto mayor nava, quien al llegar al sitio procede al rescate del canino, 0, 0, 0, TRUE, TRUE, 1, 0,  AVENIDA LOS PRÓCERES   CASA NUMERO 2-76  CASA DE COLOR BLANCO , 17129573 , 18310118, 1, 0, 1 	2021-11-13 09:11:39
270	17129573	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	4, 1, 3, 14, 116, 10, 16, 176, 3857403 , 19	2021-11-13 09:11:53
271	17129573	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	4, 1	2021-11-13 09:11:00
272	17129573	Cierre de guardia	guardias	Insertar	\N	1, se entrega el servicio sin novedades resaltantes	2021-11-13 09:11:20
273	17129573	CIERRE DE SESSION	USUARIO	VALIDAR	\N	22, NValero573, 2, 1, 17129573, 13/11/2021 | 09:38:22 	2021-11-13 09:38:22
274	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 15/11/2021 | 09:51:29 	2021-11-15 09:51:29
275	99999999	Registro de Personal	personal	INSERTAR	\N	12356337, YADIRA, ALEXANDRA, RODRIGUEZ, SANCHEZ, (416) 446-3276, (000) 000-0000, YRODRIGUEZ7644@GMAIL.COM, 1, 2, SECTOR LOMA DE MAITINES, LOS PROCERES, PRINCIPAL BAJO, 67-54, 01, 00, SUBIENDO LAS ESCALERAS AFILADORAS MéRIDA, 2021/11/15 09:11:18, 939, 4 , 1, 1 , 2 , 2 , 2 , 1 , 1 	2021-11-15 09:11:18
276	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	11460624, ROLANDO, CARRILLO, (426) 926-7288, LLAMAR EN CASO DE EMERGENCIA, 12356337, 7 	2021-11-15 09:11:12
277	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE MI HIJA, MARIA GABRIELA, COLOR FAVORITO, AZUL	2021-11-15 09:11:15
278	99999999	Registro de Usuario	usuario	INSERTAR	\N	YRodriguez337, d2c8c878121ba7982adb9c9f591fb6e44085e139, 3 , 1, 12356337, 26	2021-11-15 09:11:01
279	16200660	Inicio de Session	Usuario	VALIDAR	\N	6, JUzcategui, 2, \n\t\t\t1, 16200660, 15/11/2021 | 10:29:07 	2021-11-15 10:29:07
280	16200660	Personal de Guardia	personal_grupos_guardias	Insertar	\N	16200660 , , 15620802 , 18125565 , 18308368 , , , , 8042991 , , , 12356337 , , , 20435049 , , , 1	2021-11-15 10:11:39
281	16200660	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	5, 1	2021-11-15 10:11:50
282	16200660	Apertura de guardia	guardias	Insertar	\N	1, se recibe el servicio con las notas antes expuestas, las areas en orden, buen estado y limpias.	2021-11-15 10:11:55
283	20435049	Inicio de Session	Usuario	VALIDAR	\N	14, MToro049, 3, \n\t\t\t1, 20435049, 15/11/2021 | 10:38:44 	2021-11-15 10:38:44
284	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 15/11/2021 | 10:38:48 	2021-11-15 10:38:48
286	20435049	Apertura de guardia	guardias	Insertar	\N	1, se recibe la guardia sin novedad relevante.	2021-11-15 10:11:30
287		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	5, 2, 3, 4	2021-11-15 10:11:11
288	12356337	Apertura de guardia	guardias	Insertar	\N	1, buenos dias recibe la guardia la sargento segundo yadira rodriguez  de bomberos merida  sin novedad	2021-11-15 10:11:48
289	20435049	Nuevas Solicitudes	solicitudes	Insertar	\N	10:11:40, 2021-11-15, 10:11:40, gaby, contreras, (041) 275-5088, 3 , 3 , CONJUNTO RESIDENCIAL CENTENARIO, centro comercial centenario, 913, 24, 5 , centenario en el centro comercial frente a garibaldi., 17842117 	2021-11-15 10:11:52
290	20435049	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	5, 2, 3, 4	2021-11-15 10:11:17
291	12356337	Nuevas Solicitudes	solicitudes	Insertar	\N	10:11:30, 2021-11-15, 10:11:30, maria, carrillo, (416) 446-3276, 2 , 115 , SECTOR LOMA DE MAITINES, cerca a la panaderia paladium , 939, 25, 5 , av los proceres puente la pedregosa , 12356337 	2021-11-15 10:11:26
292	12356337	Cierre Solicitudes	solicitudes	Insertar	\N	10:11:40, 2021-11-15, 10:11:40, 10:11:43, GABY, CONTRERAS, (041) 275-5088, 3, CONJUNTO RESIDENCIAL CENTENARIO, CENTRO COMERCIAL CENTENARIO, 913, 0, 25, 1 , UNOS SUJETOS ROBARON A UN CIUDADANO AL CUAL LO GOLPEARON Y ESTA HERIDO., al sitio el oficial sosa niño en la unidad m487 quien al llegar  al sitio el ciudadano se encontraba tendido en la via siendo atendido por funcionarios bomberiles en la unidad b072 al mando del teniente jose perez  quien indico que le señor solo presentaba herida lacerante a nivel frontal, , 0, 0, 01, FALSE, FALSE, 1, 0, CENTENARIO EN EL CENTRO COMERCIAL FRENTE A GARIBALDI., 12356337 , 17842117, 1, 0, 2 	2021-11-15 10:11:52
293	12356337	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3858048, 2021-11-15, 08:30:32, 10:44:42, BANCARIBE, 122, AV 2 LORA GLORIAS PATRIAS, DETRAS DEL COMANDO DE LA POLICIA, ALARMA ACTIVADA BANCARIBE, SE LE PASO A SALA CUPAZ , 0, 0, 190, 947, SECTOR GLORIAS PATRIAS, , 1311, 1267, 11:11, Bomberos Rescate, FALSE, 0, FALSE, 0, 25	2021-11-15 11:11:23
294	12356337	Observaciones de Guardia	observaciones	Insertar	\N	, entregar tareas a angel , , , 25, 2	2021-11-15 11:11:09
295	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 15/11/2021 | 11:19:47 	2021-11-15 11:19:47
296		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	5, 2, 3, 4	2021-11-15 11:11:55
297	8042991	Apertura de guardia	guardias	Insertar	\N	1, habro el servicio sin novedad	2021-11-15 11:11:00
298	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	10:11:30, 2021-11-15, 10:11:30, 11:11:04, MARIA, CARRILLO, (416) 446-3276, 115, SECTOR LOMA DE MAITINES, CERCA A LA PANADERIA PALADIUM , 939, 1, 26, 1 , SOLICITANTE INDICA QUE REQUIERE UN TRASLADO DESDE  SU RESIDENCIA EN EL PUENTE LA PEDREGOSA LOMA LOS MAITINES PARTE BAJA CASA 87-98 HASTA EL HOSPITAL UNIVERSITARIO DE LOS ANDES PUNTO DE REFERENCIA CERCA A LA PANADERIA , funcionarios tubieron en el sitio s/j arias fran comision que estubo en el sitio horuga n1, 1, 1, 2, FALSE, FALSE, 0, 1, AV LOS PROCERES PUENTE LA PEDREGOSA , 8042991 , 12356337, 0, 1, 3 	2021-11-15 10:11:26
299	8042991	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3857999, 2021-11-15, 00:21:38, 01:47:20, MARIA BLANCO, 85, MERIDA AV PRINCIPAL DE SANTA JUANA  POR LA PARTE DE ABAJO  DE LA CRUZ ROJA RESIDENCIAS LOS  ANDES BLOUE 23  APARTAMENTO O2 -O3, SOLICITANTE INFORMA SOBRE FEMENINA DE 89 A�OS LA CUAL PRESENTA HIPERTENSION DE IGUAL MANERA TAQUICARDIA SU FAMILIAR INDICA QUE SOLO SE QUEJA DE UNA FUERTE CEFALEA Y NO RESPONDE A NINGUN OTRO ESTIMULO POR LO CUAL SOLICITAN COMISION EN EL SITIO , SIN DESPACHO, 0, 0, 190, 946, SANTA JUANA, , 1273, 1160, 11:11, PM Foraneo, FALSE, 0, FALSE, 0, 26	2021-11-15 11:11:45
300	8042991	Observaciones de Guardia	observaciones	Insertar	\N	, sto de bombero dejo su monedero, , , 26, 3	2021-11-15 11:11:03
301	16200660	Inicio de Session	Usuario	VALIDAR	\N	6, JUzcategui, 2, \n\t\t\t1, 16200660, 15/11/2021 | 15:43:42 	2021-11-15 15:43:42
302	16200660	Observaciones al personal de guardia	personal_guardias	Insertar	\N	la operadora no se presenta a laborar ya que esta de viaje y tiene permiso por parte del licenciado jhair morales, 8 , 18125565 , 23	2021-11-15 16:11:06
303	16200660	Inicio de Session	Usuario	VALIDAR	\N	6, JUzcategui, 2, \n\t\t\t1, 16200660, 15/11/2021 | 17:26:07 	2021-11-15 17:26:07
304	16200660	Observaciones al personal de guardia	personal_guardias	Insertar	\N	el despachador de la policia  jose sosa niño se presento a laborar a las 9am y se retiro a las 3-45 pm, 9 , 15620802 , 23	2021-11-15 17:11:53
305	16200660	Inicio de Session	Usuario	VALIDAR	\N	6, JUzcategui, 2, \n\t\t\t1, 16200660, 15/11/2021 | 21:24:00 	2021-11-15 21:24:00
306	16200660	Inicio de Session	Usuario	VALIDAR	\N	6, JUzcategui, 2, \n\t\t\t1, 16200660, 16/11/2021 | 03:49:49 	2021-11-16 03:49:49
307	16200660	Inicio de Session	Usuario	VALIDAR	\N	6, JUzcategui, 2, \n\t\t\t1, 16200660, 16/11/2021 | 06:45:43 	2021-11-16 06:45:43
308	16200660	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	17, 2, 7, 5, 457, 21, 23, 535, 3858460 , 23	2021-11-16 06:11:29
309	16200660	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	5, 1	2021-11-16 06:11:35
310	16200660	Cierre de guardia	guardias	Insertar	\N	1, se hace entrega del servicio con las notas antes descritas las areas en orden y semi sucias ya que el personal de limpieza no tenia los implementos necesarios.	2021-11-16 06:11:35
311	16200660	CIERRE DE SESSION	USUARIO	VALIDAR	\N	6, JUzcategui, 2, 1, 16200660, 16/11/2021 | 06:47:36 	2021-11-16 06:47:36
312	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 16/11/2021 | 08:20:54 	2021-11-16 08:20:54
313	12356337	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	5, 2, 3, 4	2021-11-16 08:11:33
314	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 16/11/2021 | 08:52:57 	2021-11-16 08:52:57
315	99999999	Registro de Personal	personal	INSERTAR	\N	15620712, GISELA, , MALDONADO, AVENDAñO, (426) 776-2436, (274) 244-1759, GISEMALDO24@GMAIL.COM, 0, 0, SECTOR LOS CHORROS DE MILLA, PRINCIPAL UNION, 01, 1-75, 00, 00, AL LADO HOTEL RIO MILLA, 2021/11/16 09:11:28, 941, 1 , 1, 4 , 5 , 3 , 5 , 1 , 2 	2021-11-16 09:11:28
316	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	14106046, MARIA, MALDONADO, (416) 078-3547, LLAMAR EN CASO DE EMERGENCIA, 15620712, 3 	2021-11-16 09:11:22
317	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	MI POSTRE FAVORITO, CHOCOLATE, MI MASCOTA FAVORITA, LORO	2021-11-16 09:11:46
318	99999999	Registro de Usuario	usuario	INSERTAR	\N	GMaldonado712, f66e65ec2c01d1c2cfb3c056c9b424dd5c4041c5, 2 , 1, 15620712, 27	2021-11-16 09:11:58
319	99999999	Registro de Personal	personal	INSERTAR	\N	17523387, EDWIN, ANDRES, PINTO, ROJAS, (424) 717-7720, (274) 266-9991, RUTA02ENBICI@GMAIL.COM, 1, 1, SECTOR LA CHAMITA, BOLIVAR, LOS FRAILES, 1-47, 00, 00, DIAGONAL AL PASAJE LOS GUAMOS, 2021/11/16 09:11:56, 937, 1 , 2, 1 , 5 , 3 , 5 , 1 , 2 	2021-11-16 09:11:56
320	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	15516249, YUSMARY, BALZA, (424) 717-7720, LLAMAR EN CASO DE EMERGENCIA, 17523387, 7 	2021-11-16 09:11:03
321	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	MI DEPORTE FAVORITO, CICLISMO, MI COLOR FAVORITO, GRIS	2021-11-16 09:11:17
322	99999999	Registro de Usuario	usuario	INSERTAR	\N	EPinto387, 55a0338d0f0ba7534112fe39018bb9cd9f3ecc50, 2 , 1, 17523387, 28	2021-11-16 09:11:14
323	99999999	Registro de Personal	personal	INSERTAR	\N	15040226, LUIS, ADRIAN, MARCANO, CARABALLO, (426) 827-1296, (000) 000-0000, LUISADRIANMARCANOCARABALLO@GMAIL.COM, 0, 0, BARRIO SANTA ANA NORTE, LAS AMERICAS, VIA LA HECHICERA, RESISD DOMINGO SALAZAR 02, 1, 0202, FRENTE AL HOTEL CONVENCIONES, 2021/11/16 09:11:09, 931, 1 , 2, 4 , 4 , 1 , 5 , 1 , 2 	2021-11-16 09:11:09
324	15620712	Inicio de Session	Usuario	VALIDAR	\N	27, GMaldonado712, 2, \n\t\t\t1, 15620712, 16/11/2021 | 09:43:02 	2021-11-16 09:43:02
325	15620712	Observaciones al personal	personal_guardias	Insertar	\N	Siendo las 0936 hlv no se ha presentado al servicio, se desconoce los motivos, 9 , 15620802 	2021-11-16 09:11:46
326	15620712	Observaciones al personal	personal_guardias	Insertar	\N	Siendo las 0938 hlv no se ha presentado al servicio, se desconoce los motivos, 9 , 18123089 	2021-11-16 09:11:35
327	15620712	Personal de Guardia	personal_grupos_guardias	Insertar	\N	15620712 , 17523387 , 26052701 , 15040226 , 22887354 , , , , 8042991 , , , 13499752 , , , 18123089 , , , 2	2021-11-16 09:11:10
328	15620712	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	6, 1	2021-11-16 09:11:34
329	15620712	Apertura de guardia	guardias	Insertar	\N	2, Se recibe el servicio con la novedad que las áreas comunes se encuentran sin mantenimiento 	2021-11-16 09:11:31
330	15620712	Observaciones de Guardia	observaciones	Insertar	\N	Siendo las 0830hlv se presentó el funcionario del CICPC D/J Jorman Parra reportandose al servicio para cualquier eventualidad 0414-7473830, , , , 28, 5	2021-11-16 09:11:07
331	15620712	Observaciones al personal de guardia	personal_guardias	Insertar	\N	Se presenta al servicio a las 0950hlv notificando que se encontraba en otro trabajo donde su traslado impidió llegar a tiempo, 9 , 18123089 , 28	2021-11-16 10:11:51
332	13499752	Inicio de Session	Usuario	VALIDAR	\N	4, AHernandez, 3, \n\t\t\t1, 13499752, 16/11/2021 | 10:16:44 	2021-11-16 10:16:44
333	18123089	Inicio de Session	Usuario	VALIDAR	\N	20, LMorales089, 3, \n\t\t\t1, 18123089, 16/11/2021 | 10:18:41 	2021-11-16 10:18:41
334	18123089	Inicio de Session	Usuario	VALIDAR	\N	20, LMorales089, 3, \n\t\t\t1, 18123089, 16/11/2021 | 10:33:12 	2021-11-16 10:33:12
335	18123089	Inicio de Session	Usuario	VALIDAR	\N	20, LMorales089, 3, \n\t\t\t1, 18123089, 16/11/2021 | 14:00:45 	2021-11-16 14:00:45
336	15620712	Inicio de Session	Usuario	VALIDAR	\N	27, GMaldonado712, 2, \n\t\t\t1, 15620712, 16/11/2021 | 20:47:57 	2021-11-16 20:47:57
337	15620712	Observaciones de Guardia	observaciones	Insertar	\N	Siendo las 1600hlv se presenta el S/J Avendaño de la PNB Municipal reportando que para el día de mañana asistirá para el turno de la tarde un funcionario, , , , 28, 5	2021-11-16 20:11:28
338	15620712	Inicio de Session	Usuario	VALIDAR	\N	27, GMaldonado712, 2, \n\t\t\t1, 15620712, 17/11/2021 | 07:29:46 	2021-11-17 07:29:46
339	15620712	Observaciones al personal de guardia	personal_guardias	Insertar	\N	Solicita permiso para retirarse temprano a las 0630 hlv, 8 , 18123089 , 28	2021-11-17 07:11:50
340	15620712	Inicio de Session	Usuario	VALIDAR	\N	27, GMaldonado712, 2, \n\t\t\t1, 15620712, 17/11/2021 | 08:46:08 	2021-11-17 08:46:08
341	15620712	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	21, 0, 4, 9, 341, 6, 96, 477, 3858952 , 28	2021-11-17 08:11:07
342	15620712	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	6, 1	2021-11-17 08:11:12
343	15620712	Cierre de guardia	guardias	Insertar	\N	2, Se hace entrega del servicio al Supervisor Gabriel Torres	2021-11-17 08:11:42
344	15620712	CIERRE DE SESSION	USUARIO	VALIDAR	\N	27, GMaldonado712, 2, 1, 15620712, 17/11/2021 | 08:48:43 	2021-11-17 08:48:43
345	16664398	Inicio de Session	Usuario	VALIDAR	\N	13, JVelazquez398, 2, \n\t\t\t1, 16664398, 17/11/2021 | 10:58:49 	2021-11-17 10:58:49
346	16664398	Personal de Guardia	personal_grupos_guardias	Insertar	\N	16664398 , , 27777826 , , , , , , 8042991 , , , , , , , , , 3	2021-11-17 11:11:21
347	16664398	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	7, 1	2021-11-17 11:11:28
348	16664398	Apertura de guardia	guardias	Insertar	\N	3, Se recibe el servicio de guardia sin novedad con las notas antes expuestas, las áreas en orden.	2021-11-17 11:11:19
349	16664398	Observaciones de Guardia	observaciones	Insertar	\N	El operador Steven Medina se presentó a laborar, pero por motivo de salud se retira de las instalacion. , , , , 30, 5	2021-11-17 11:11:59
350	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 18/11/2021 | 12:19:07 	2021-11-18 12:19:07
351	99999999	Registro de Personal	personal	INSERTAR	\N	22657819, LAURA, BEATRIZ, PEñA, ZERPA, (424) 778-9766, (000) 000-0000, JORGEMORRERO10@GMAIL.COM, 1, 2, SECTOR LA CHAMA, PRINCIPAL, URB EL GALERON CALLE 11, 11-02, 00, 00, ESCUELA 16 DE SEPTIEMBRE ARRIBA A LA IZQ, 2021/11/18 12:11:12, 937, 1 , 1, 2 , 2 , 2 , 2 , 1 , 4 	2021-11-18 12:11:12
352	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	18965308, JORGE, DUGARTE, (426) 271-8340, LLAMAR EN CASO DE EMERGENCIA, 22657819, 7 	2021-11-18 12:11:34
353	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE MI HIJO, RICARDO, NOMBRE DE MI HIJA, NELLYANA	2021-11-18 12:11:17
354	99999999	Registro de Usuario	usuario	INSERTAR	\N	LPena819, a4eb3b06ba54e6ad0164d518415a4db1319ad5ef, 3 , 1, 22657819, 30	2021-11-18 12:11:55
355	16908218	Inicio de Session	Usuario	VALIDAR	\N	19, JSanchez218, 2, \n\t\t\t1, 16908218, 18/11/2021 | 12:31:46 	2021-11-18 12:31:46
356	16908218	Observaciones al personal	personal_guardias	Insertar	\N	Laborara el dia Sabado 20/11/21 en apoyo, 6 , 23302896 	2021-11-18 12:11:27
357	16908218	Observaciones al personal	personal_guardias	Insertar	\N	No se presento a laborar motivado a que se encuentra en el odontologo reparando una pieza dental., 9 , 8042991 	2021-11-18 12:11:17
358	16908218	Personal de Guardia	personal_grupos_guardias	Insertar	\N	16908218 , , 29520477 , 18966872 , , , , , 8042991 , , , 22657819 , , , 17842117 , , , 4	2021-11-18 12:11:04
359	16908218	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	8, 1	2021-11-18 12:11:23
360	16908218	Apertura de guardia	guardias	Insertar	\N	4, Se recibe las áreas del ven911 limpias y en buen estado...	2021-11-18 12:11:06
361	22657819	Inicio de Session	Usuario	VALIDAR	\N	30, LPena819, 3, \n\t\t\t1, 22657819, 18/11/2021 | 12:42:56 	2021-11-18 12:42:56
362		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	8, 2, 3	2021-11-18 12:11:46
363	22657819	Apertura de guardia	guardias	Insertar	\N	4, se recibe el servicio por 24 horas convedades resaltantes el dia de ayer 17/11/2021 no hubo despachador 	2021-11-18 12:11:10
364	22657819	Nuevas Solicitudes	solicitudes	Insertar	\N	12:11:51, 2021-11-18, 12:11:51, jose , zerpa, (424) 778-9766, 5 , 85 , CARACCIOLO PARRA PÉREZ, el caucho , 933, 32, 5 , av. los proceres a la altura del caucho , 22657819 	2021-11-18 12:11:53
414	15620712	Cierre de guardia	guardias	Insertar	\N	2, se hace entrega del servicio sin novedad relevante, para la entidad merideña fuertes precipitaciones	2021-11-24 08:11:24
416	16664398	Inicio de Session	Usuario	VALIDAR	\N	13, JVelazquez398, 2, \n\t\t\t1, 16664398, 24/11/2021 | 11:11:28 	2021-11-24 11:11:28
365	22657819	Cierre Solicitudes	solicitudes	Insertar	\N	12:11:51, 2021-11-18, 12:11:51, 12:11:28, JOSE , ZERPA, (424) 778-9766, 85, CARACCIOLO PARRA PÉREZ, EL CAUCHO , 933, 0, 32, 1 , MASCULINO DE LA TERCERA EDAD CON UN POSIBLE ACV EN PROCESO , al sitio la unidad donde se verifico que se trataba de un ciudadano en situacion de calle dando las recomendaciones a los funcionarioa retornado sin novedad , 0, 0, 0, TRUE, FALSE, 0, 0, AV. LOS PROCERES A LA ALTURA DEL CAUCHO , 22657819 , 22657819, 0, 0, 1 	2021-11-18 12:11:53
366	22657819	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3859477, 2021-11-18, 08:31:40, 11:20:07, ALFREDO BRICEñO, 119, ACUARIO, FRENTE AL CC LAS TAPIAS, POR DETRAS DEL MONUMENTO DE LA TRUCHA., EL SOLICITANTE, TRABAJADOR DEL ACUARIO, INDICA QUE HAY UN SE�OR ACOSTADO EN EL SUELO, AL LADO DE LA ESTATUA DE LA TRUCHA DEL ACUARIO, ESTA INCONSIENTE Y SUS ROPAS SE ENCUENTRAN EN MAL ESTADO, EXPLICA QUE EL SUJETO NO RESPIRA, POR LO TANTO LO CONSIDERAN MUERTO. EL SUJETO TIENE CHAQUETA MARRON Y PANTALON AZUL., AL SITIO LA UNIDAD LINCE 96 AL MANDO DE LA SAGENTO SEGUNDO EMELINE UZCATEGUI QUIEN REPORTA POSITIVO ELM SERVICIO TRATANDOSE DE UN ACTO DE PRESENCIA EN UNA CIUDADANO EN SITUACION  DE CALLE CON  CON FUERTE ENTOXICACION HETILICA DESCONOCIENDOSE DATOS QUIEN VESTIA DE CAMPALON AZUL CHAQUETA NEGRA Y BOLSO MARRON DANDO QUIEN SE ENCONTRABA EN SU RESPECTIVO DESCANDO  DANDO LAS RECOMENDACIONES AL CIUDADANO GERARDO GOMEZ DE 70 A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD V-8.009.561 QUIEN ES SUPERVISOR DEL ACUARIO RETORNANDO SIN NOVEDAD , 0, 0, 190, , EL ACUARIO, , 1299, 1041, 01:11, Bomberos Rescate, PM Foraneo, TRUE, 0, FALSE, 0, 32	2021-11-18 13:11:26
367	22657819	Observaciones de Guardia	observaciones	Insertar	\N	se suspendio el fluido electyrico por 15 minutos , recordar para el dia 9/12/21 la recunion a nivel de despacho , , , 32, 2	2021-11-18 13:11:58
368	17842117	Inicio de Session	Usuario	VALIDAR	\N	5, MFernandez, 3, \n\t\t\t1, 17842117, 18/11/2021 | 13:29:42 	2021-11-18 13:29:42
369		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	8, 2, 3, 4	2021-11-18 13:11:53
370	17842117	Apertura de guardia	guardias	Insertar	\N	4, se recibe guardia sin novedad	2021-11-18 13:11:23
371	22657819	Inicio de Session	Usuario	VALIDAR	\N	30, LPena819, 3, \n\t\t\t1, 22657819, 18/11/2021 | 19:04:09 	2021-11-18 19:04:09
372	22657819	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3859474, 2021-11-18, 08:21:51, 19:01:09, FLOR ANGELA CARVALLO, , MERIDA AV LOS PROCERES VIA JAJI PASANDO PUENTE LA PEDREGOSA, SOLICITANTE INFORMA QUE  MOTORIZADO MASCULINO ACOMPA�ADO DE FEMINA PERDIERON EL CONTROL DE LA MOTO Y SE ENCUENTRAN TIRADOS EN LA VIA, EN UNA ZONA NO POBLADA. DESCONOCE MAYOR INFORMACION, AL SITIO LA UNIDAD ALFA 113  AL MANDO DEL TENIENTE WUILMER MOLINA QUIEN REPORTA POSITIVO EL SERVICIO TRATANDOSE DE UN ACCIDENTE DE TRANSITO TIPO COLISION ENTRE VEHICULO PRIMER VEHICULO TIPO MOTO DESCONOCIENDOSE DATOS YA QUE SE ENCONTRABA SOLO CHASI Y MOTOS CONDUCIDA POR EL CIUDADANO ROGER PE�A DE 27 A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD V-22.757754 QUIEN RESULTO ILESO SEGUNDO VEHICULO TIPO MOTO BERA  SOCIALISTA 150 PLACAS AB2ES25 CONDUCIDA POR EL CIUDADANO JESUS DAVILA DE 26 A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD V-233258 QUIEN RESULTO ILESO SIENDO SU ACOMPA�ANTE LA CIUDADANA LILIANA AVILA   DE 49 A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD V-12.571.365  QUIEN PRESENTO TRAUMATISMO EN LA EXTREMIDAD INFERIOR IZQUIERDA ESPECIFICAMENTE TIBIA Y PEERONE ESTABILIZADA Y TRANSLADADA HASTA EL IAHULA SIENDO RECIBIDA POR EL MDICO DE GUARDIAN JESUS PANTOJA MATRICULA DEL MINISTERIO DEL PODER POPULAR PARA LA SALUD N�133584 QUIEN SE ENCARDO DEL CASO , 0, 1, 183, 917, , MAS ARRIBA DEL HOTEL LAS LOMAS, 1308, 1041, 07:11, PM Foraneo, Supervision, TRUE, 2, FALSE, 0, 32	2021-11-18 19:11:04
373	22657819	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3859646, 2021-11-18, 14:05:20, 19:14:57, MARIA RAMIREZ, , MERIDA, AV LOS PROCERES , RESIDENCIAS ROSA E, EN FRENTE. CANAL SUBIENDO , LA SOLICITANTE INDICA QUE HACE UNOS MINUTOS UN CAMION BLANCO ARROLLO UNA MOTO LA CUAL LLEVABA 2 PASAJEROS MASCULINOS Y PARA EL MOMENTO LOS MISMOS SE ENCUENTRAN TENDIDOS EN ELSUELO SIN PODER MOVILIZARSE. EL CAMION SE DIO A LA FUGA. SOLICITAN COMISIONES EN EL SITIO NOTA: NO POSEE MAYOR INFORMACION , AL SITIO LA UNIDAD B-078AL MANDO DEL PRIMER TENIENTE RICARDO HERNANDEZ QUIEN REPORTA POSITIVO EL SERVICIO TRATANDOSE DE UN ACCIDENTE DE TRANSITO TIPO COLISION ENTRE DOS VEHICULO PRIMER VEHICULO TIPO MOTO LONCHI MODELO LOBER  250 COLOR AMARILLO PLACAS A8A93G CONDUCIDA POR EL CIUDADANO YONATAN MARQUEZ DESCONOCIENDOSE MAS DATOS YA QUE SE NEGO A APORTARLOS QUIEN PRESENTO ESCORIACIONES MULTIPLES Y TRAUMATISMO A NIVEL FACIAL ESTABILIZADO Y TRANSLADADO EN LA UNIDAD RESCATE 1 AL  HASTA EL SOR JUANA INES DE LA CRUZ SIENDO RECIBIDO SEGUNDO VEHICULO SE DESCONOCEN LOS DATOS YA QUE AL LLEGAR AL SITIO NO SE ENCONTRABA EN EL LUGAR  COMISIONES EN EL SITIO POLICIA NACIONAL BOLIVARIANA AL MANDO DEL OFICIAL AGREGADO JOSE PEREZ QUIEN SE ENCARGO DEL CASO , 0, 0, 190, 946, RESIDENCIAS ROSA E, , 2, 1041, 07:11, Bomberos Rescate, Bomberos Servivida, Transito, TRUE, 1, FALSE, 0, 32	2021-11-18 19:11:00
374	22657819	Inicio de Session	Usuario	VALIDAR	\N	30, LPena819, 3, \n\t\t\t1, 22657819, 18/11/2021 | 23:17:58 	2021-11-18 23:17:58
375	22657819	Nuevas Solicitudes	solicitudes	Insertar	\N	23:11:06, 2021-11-18, 23:11:06, capitan orlando , barreto, (426) 570-8010, 2 , 87 , 0, metros antes de la pizzeria sabor de los, 941, 32, 5 , av2 loras metros abajo de la plaza charly chaply casa de rejas color blanco punto de referencia metros antes de la pizzeria sabor de los quesos , 22657819 	2021-11-18 23:11:37
376	16908218	Inicio de Session	Usuario	VALIDAR	\N	19, JSanchez218, 2, \n\t\t\t1, 16908218, 19/11/2021 | 03:08:59 	2021-11-19 03:08:59
377	16908218	Observaciones de Guardia	observaciones	Insertar	\N	Siendo las 18:10hlv se presenta a laborar en el despacho de policia, la S/J PM Stella Correa., , , , 31, 5	2021-11-19 03:11:09
378	16908218	Observaciones de Guardia	observaciones	Insertar	\N	Siendo las 18:00hlv se presenta a laborar en vigilancia, el Sr Ramon Lobo., , , , 31, 5	2021-11-19 03:11:58
379	16908218	Inicio de Session	Usuario	VALIDAR	\N	19, JSanchez218, 2, \n\t\t\t1, 16908218, 19/11/2021 | 06:11:35 	2021-11-19 06:11:35
415	15620712	CIERRE DE SESSION	USUARIO	VALIDAR	\N	27, GMaldonado712, 2, 1, 15620712, 24/11/2021 | 08:48:26 	2021-11-24 08:48:26
417	16664398	Personal de Guardia	personal_grupos_guardias	Insertar	\N	16664398 , , 27777826 , 17340596 , , , , , , , , 22657819 , , , , , , 3	2021-11-24 11:11:12
419	16664398	Apertura de guardia	guardias	Insertar	\N	3, se recibe la guardia sin novedad.	2021-11-24 11:11:36
420	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 24/11/2021 | 12:58:00 	2021-11-24 12:58:00
421	99999999	Registro de Personal	personal	INSERTAR	\N	15621210, YUMAIRA, CAROLINA, ALBARRAN, DUQUE, (426) 256-9921, (000) 000-0000, ALBARRANDUQUE@GMAIL.COM, 1, 1, SECTOR EL ZAMURO, PRINCIPAL, SIN NUMERO, FINCA LOS POTRERITOS, 00, 00, FINCA LOS POTRERITOS, 2021/11/24 13:11:25, 932, 2 , 1, 4 , 1 , 2 , 3 , 1 , 3 	2021-11-24 13:11:25
422	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	14016771, HENRRY, MONSALVE, (424) 751-8457, LLAMAR EN CASO DE EMERGENCIA, 15621210, 7 	2021-11-24 13:11:59
423	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE MI PERRA, LUNA, NOMBRE DE MI PERRA, LUNA	2021-11-24 13:11:07
424	99999999	Registro de Usuario	usuario	INSERTAR	\N	YAlbarran210, 83082452c421366b1816dc4d5d22e4e4365bef70, 3 , 1, 15621210, 31	2021-11-24 13:11:03
380	16908218	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3859915, 2021-11-19, 00:32:36, 02:58:37, JHON NAVARRO, , VIGIA, FRENTE AL YUNIOR MOLL AL LADO DEL TERMINAL DE PASAJEROS. EN LA VIA, SOLICITANTE INDICA ACCIDENTE VEHICULAR TIPO  CARRO CON  UNA MOTO. PARA EL MOMENTO MASCULINO LESIONADO EL CUAL SE ENCUENTRA INCONSCIENTE. SOLICITAN COMISION EN EL SITIO. NOTA NO SUMINISTRAN MAYOR INFORMACION, AL SITIO LA UNIDAD AMBULANCIA LA AMBULANCIA DE LA CAMARA MUNICIPAL DEL VIGIA CONDUCIDA POR EL CONCEJAL GERSON CACIQUE LA CUAL SE TRATABA DE UN ACCIDENTE DE TRANSITO TIPO COLICION ENTRE DOS VEHICULOS PRIMER VEHICULO TIPO MOTO BERA 150 COLOR AZUL A�O 2013  PLACAS A60095V CONDUCIDA POR EL CIUDADANO NESTOR DANIEL RIVAS D 21 A�OS DE EDAD  TITULAR DE LA CEDULA DE IDENTIDAD V-21.305.766 QUIEN PRESENTO POLITRAUMATISMO GENERALIZADO ESTABILIZADO Y TRANSLADADO HASTA EL HOSPITAL HUGO CHAVEZ DEL VIGIA RECIBIDA POR EL DOCTOR EDUARDO RODRIGUEZ DESCONOCIENDOSE MAS DATOS SEGUNDO VEHICULO TIPO FORD 450 MODELO SUPER DUTTY COLOR BLANCO  A�O 1996  PLACAS A96ASAE CONDUCIDA POR EL CIUDADANO GABRIEL ANTONIO CONDE CONDE  DE  29 A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD V-20.369.281 QUIEN RESULTO ILESO  COMISIONES EN EL SITIO POLICIA NACIONAL BOLIVARIANA EN LA UNIDAD UR003 AL MANDO DEL SUPERVISOR AGREGADO RONDON JOSE QUIEN SE ENCARGO DEL CASO , 0, 1, 178, 893, SECTOR LA P�EZ, , 1308, 1041, 06:11, Bomberos Servivida, PM Foraneo, Supervision, TRUE, 1, TRUE, 1, 31	2021-11-19 06:11:13
381	17842117	Inicio de Session	Usuario	VALIDAR	\N	5, MFernandez, 3, \n\t\t\t1, 17842117, 19/11/2021 | 07:32:38 	2021-11-19 07:32:38
382	22657819	Inicio de Session	Usuario	VALIDAR	\N	30, LPena819, 3, \n\t\t\t1, 22657819, 19/11/2021 | 07:56:28 	2021-11-19 07:56:28
383	17842117	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	8, 2, 3, 4	2021-11-19 08:11:16
384	17842117	Cierre de guardia	guardias	Insertar	\N	4, se entrega la guardai sin novedad a espera del funcionario. entrante 	2021-11-19 08:11:01
385	17842117	CIERRE DE SESSION	USUARIO	VALIDAR	\N	5, MFernandez, 3, 1, 17842117, 19/11/2021 | 08:14:03 	2021-11-19 08:14:03
386	16908218	Inicio de Session	Usuario	VALIDAR	\N	19, JSanchez218, 2, \n\t\t\t1, 16908218, 19/11/2021 | 08:19:46 	2021-11-19 08:19:46
387	16908218	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	19, 4, 3, 17, 357, 18, 86, 504, 3859503 , 31	2021-11-19 08:11:45
388	16908218	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	8, 1	2021-11-19 08:11:16
389	16908218	Cierre de guardia	guardias	Insertar	\N	4, Se hace entrega del servicio sin novedad.	2021-11-19 08:11:37
390	16908218	CIERRE DE SESSION	USUARIO	VALIDAR	\N	19, JSanchez218, 2, 1, 16908218, 19/11/2021 | 08:21:39 	2021-11-19 08:21:39
391	22657819	Inicio de Session	Usuario	VALIDAR	\N	30, LPena819, 3, \n\t\t\t1, 22657819, 19/11/2021 | 08:22:55 	2021-11-19 08:22:55
392	22657819	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	8, 2, 3, 4	2021-11-19 08:11:46
393	22657819	Cierre de guardia	guardias	Insertar	\N	4, se entrega el servicio sin novedad \n	2021-11-19 08:11:58
394	22657819	CIERRE DE SESSION	USUARIO	VALIDAR	\N	30, LPena819, 3, 1, 22657819, 19/11/2021 | 08:34:59 	2021-11-19 08:34:59
395	15620712	Inicio de Session	Usuario	VALIDAR	\N	27, GMaldonado712, 2, \n\t\t\t1, 15620712, 23/11/2021 | 09:36:59 	2021-11-23 09:36:59
396	15620712	Observaciones al personal	personal_guardias	Insertar	\N	No ha reportado al servicio, 9 , 8042991 	2021-11-23 09:11:40
397	15620712	Observaciones al personal	personal_guardias	Insertar	\N	Reporta su llegada tarde porque se encuentra en una Audiencia de Fiscalía, 3 , 17842117 	2021-11-23 09:11:25
398	15620712	Personal de Guardia	personal_grupos_guardias	Insertar	\N	15620712 , 17523387 , 26052701 , 15040226 , 22887354 , , , , 8042991 , , , , , , 17842117 , , , 2	2021-11-23 09:11:49
399	15620712	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	9, 1	2021-11-23 09:11:57
400	15620712	Apertura de guardia	guardias	Insertar	\N	2, Se recibe el servicio a la espera de los despachadores, para el momento precipitaciones en el territorio	2021-11-23 09:11:34
401	15620712	Inicio de Session	Usuario	VALIDAR	\N	27, GMaldonado712, 2, \n\t\t\t1, 15620712, 23/11/2021 | 21:23:36 	2021-11-23 21:23:36
402	15620712	Observaciones de Guardia	observaciones	Insertar	\N	Siendo las 0940 hlv recibe despacho de la policía el Supervisor Jefe Sosa, Niño y se retira del servicio a las 1500hlv, , , , 37, 5	2021-11-23 21:11:18
403	15620712	Observaciones al personal de guardia	personal_guardias	Insertar	\N	Solicitó permiso para retirarse del servicio a las 1650 hlv por emergencia médica, su esposa se encuentra mal de salud, autorizado por la Lcda Isabel Rangel de Recursos Humanos , 7 , 17523387 , 37	2021-11-23 21:11:48
404	15620712	Observaciones al personal de guardia	personal_guardias	Insertar	\N	Recibe el servicio a las 1300 Hlv, se encontraba en una audiencia., 8 , 17842117 , 37	2021-11-23 21:11:30
405	15620712	Observaciones de Guardia	observaciones	Insertar	\N	Para el día de hoy 23 de noviembre del 2021 no hubo despachador de Bomberos Mérida, le correspondía a la Sargento Mary Inez Ruiz, se desconoce los motivos, , , , 37, 5	2021-11-23 21:11:46
406	15620712	Observaciones de Guardia	observaciones	Insertar	\N	Siendo las 1800 hlv se presenta el funcionario de seguridad el Sr Jose Luis Perez para cubrir el turno de viilancia hasta el amancer, , , , 37, 5	2021-11-23 21:11:06
407	15620712	Observaciones de Guardia	observaciones	Insertar	\N	Siendo las 1917 hlv recibe el servicio el despachador de la policia Supervisor Jefe Joe Rodriguez quien cubre el turno nocturno, , , , 37, 5	2021-11-23 21:11:20
408	15620712	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3861875, 2021-11-23, 07:07:39, 21:43:01, OFICIAL EN JEFE SANCHEZ JOSE, , EJIDO JAJI (LA CHORRERA), EL OFICIAL EN JEFE INFORMA QUE EN LA VIA A JAJI ESPECIFICAMENTE EN LA CHORRERA HAY UN DERRUMBE DONDE NO HAY PASO NI VEHICULAR NI PEATONAL DONDE SE REQUIERE QUE UNA COMICION SE DIRIJA AL SITIO , HOY 23 /11/2021 SE RECIBE LLAMADA AL SISTEMA INTEGRADO DE ARTICULACION PARA LA ATENCION DE LAS EMERGENCIAS,VEN 9.1.1 DE LO CUAL  SE TRASMITE VIA LLAMADA TELEFONICA POR PARTE DEL TECNICO SAR Y OPC 3 DE PROTECCION CIVIL, KERVIN ZAMBRANO AL OSPC 1 VICTOR DUGARTE, EN HORAS DE LA TARDE EL OSPC 3 JEAN CARLOS BRICE�O INFORMA QUE AL LUGAR DE L�A NOVEDAD SE APERSONO.. EL ALCALDE DEL MUNICIPIO CAMPO ELIAS, SIMON FIGUEROA, JUNTO A EL PERSONAL DE LA ALCALDIA ( INGENIEROS) Y COMISION DE PROTECCION CIVIL CAMPO ELIAS..PARA RESTAURAR  EL PASO. LO CUAL A LA EVALUACION EN EL SITIO NO SE PRESENTA NINGUN DA�O MATERIAL NI DE INFRAESTRUCTURAS,,, 0, 0, 183, 917, , , 1296, 1253, 09:11, Supervision, FALSE, 0, FALSE, 0, 37	2021-11-23 21:11:52
409	15620712	Inicio de Session	Usuario	VALIDAR	\N	27, GMaldonado712, 2, \n\t\t\t1, 15620712, 24/11/2021 | 03:32:16 	2021-11-24 03:32:16
410	15620712	Inicio de Session	Usuario	VALIDAR	\N	27, GMaldonado712, 2, \n\t\t\t1, 15620712, 24/11/2021 | 06:32:58 	2021-11-24 06:32:58
411	15620712	Inicio de Session	Usuario	VALIDAR	\N	27, GMaldonado712, 2, \n\t\t\t1, 15620712, 24/11/2021 | 08:47:11 	2021-11-24 08:47:11
412	15620712	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	17, 0, 3, 9, 422, 19, 108, 578, 3862144 , 37	2021-11-24 08:11:47
413	15620712	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	9, 1	2021-11-24 08:11:50
418	16664398	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	10, 1	2021-11-24 11:11:16
425	15621210	Inicio de Session	Usuario	VALIDAR	\N	31, YAlbarran210, 3, \n\t\t\t1, 15621210, 24/11/2021 | 13:09:34 	2021-11-24 13:09:34
426		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	10, 2, 3, 4	2021-11-24 13:11:03
427	15621210	Apertura de guardia	guardias	Insertar	\N	3, siendo las 13:14 del dia miercoles 24/11/2021 se resive la gurdia sin novedades relevantes 	2021-11-24 13:11:18
428	15621210	Nuevas Solicitudes	solicitudes	Insertar	\N	13:11:01, 2021-11-24, 13:11:01, naria, perez, (274) 251-8457, 3 , 83 , SECTOR 16 DE SEPTIEMBRE, panaderia los hermanos, 934, 40, 5 , santa juana calle 3 , frente a la panaderia, 15621210 	2021-11-24 13:11:51
429	15621210	Cierre Solicitudes	solicitudes	Insertar	\N	13:11:01, 2021-11-24, 13:11:01, 13:11:28, NARIA, PEREZ, (274) 251-8457, 83, SECTOR 16 DE SEPTIEMBRE, PANADERIA LOS HERMANOS, 934, 0, 40, 1 , HECHO VIAL CON MULTIPLE LECIONADOS , se despacho la unidad rojo 1 al llegar sitio indicaron que es positivo  . , 0, 0, 1, TRUE, TRUE, 0, 1, SANTA JUANA CALLE 3 , FRENTE A LA PANADERIA, 15621210 , 15621210, 0, 1, 3 	2021-11-24 13:11:51
430	15621210	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3862404, 2021-11-24, 06:49:20, 08:25:11, JOSE CASTILLO, 104, MERIDA SAN JACINTO ,SECTOR LOS SAMANES,  CERCA DE LA UNIDAD EDUCATIVA DE SAN JACINTO, CASA DE COLOR VERDE, EL SOLICITANTE INDICA QUE UN JOVEN MASCULINO PRESENTA UNA FUERTE FIEBRE DESDE AYER Y ADEMAS TIENE UNA CONDICION DE DISCAPACIDAD PARA CAMINAR. LOS PARIENTES DEL PACIENTE ESTARAN AFUERA PARA ESPERAR A LOS ORGANISMO DE SALUD. NO  APORTO MAS INFORMACION DE LA DIRECCION PORQUE FINALIZO LA LLAMADA. SE REQUIERE ASISTENCIA MEDICA, SE LE REALIZA EL LLAMADO V�A TELEF�NICA AL CUARTEL CENTRAL DE LOS BOMBEROS, TOMA NOTA DEL REPORTE LA BOMBERA PAOLA GUERRERO QUIEN SE ENCARGA DE COORDINAR UNA UNIDAD PARA EL SERVICIO, NOTA: AL MOMENTO DEL CIERRE SE DESCONOCE DETALLES DEL PROCEDIMIENTO , 0, 0, 190, , SAN JACINTO, UNIDAD EDUCATIVA SAN JACINTO, 1292, 1016, 01:11, INPRADEM, FALSE, 0, FALSE, 0, 40	2021-11-24 13:11:29
431	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 24/11/2021 | 13:56:09 	2021-11-24 13:56:09
432	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 03/12/2021 | 11:13:23 	2021-12-03 11:13:23
433	99999999	Registro de Grupos	grupos_guardia	INSERTAR	\N	GRUPO 5	2021-12-03 11:12:06
434	99999999	Registro de Grupos	grupos_guardia	INSERTAR	\N	GRUPO 6	2021-12-03 11:12:18
435	99999999	Registro de Grupos	grupos_guardia	INSERTAR	\N	GRUPO 7	2021-12-03 11:12:29
436	99999999	Registro de Personal	personal	INSERTAR	\N	20200220, MARIA, ANGELICA, PEñA, PEñA, (412) 074-4086, (274) 263-5483, ANGELREBELDE50@GMAIL.COM, 0, 0, SECTOR SANTA ELENA, 16 SEPTIEMBRE, 9, 10-23, 00, 00, HOSPITAL UNIVERSITARIO, 2021/12/3 11:12:58, 934, 1 , 1, 1 , 5 , 3 , 5 , 1 , 5 	2021-12-03 11:12:58
437	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	8028830, MARIA, PEñA, (274) 263-5483, LLAMAR EN CASO DE EMERGENCIA, 20200220, 1 	2021-12-03 11:12:03
438	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	MI PRIMERA MASCOTA, BURBUJA, MI SEGUNDA MASCOTA, ORION	2021-12-03 11:12:34
439	99999999	Registro de Usuario	usuario	INSERTAR	\N	MPena220, cd9ed55678fe011a90fda2e669e92cbe398d7b75, 2 , 1, 20200220, 32	2021-12-03 11:12:46
440	99999999	Registro de Personal	personal	INSERTAR	\N	11913073, EDDY, RODOLFO, ZAMBRANO, PEñA, (416) 874-6792, (000) 000-0000, ERZP17@GMAIL.COM, 1, 2, CONJUNTO RESIDENCIAL CENTENARIO, CENTENARIO, , 5, 4, 41, ALA SUR CC CENTENARIO, 2021/12/3 11:12:41, 913, 1 , 2, 4 , 5 , 3 , 5 , 1 , 5 	2021-12-03 11:12:41
441	99999999	Registro de Personal	personal	INSERTAR	\N	26931489, ALEJANDRO, LUIS, BESEMBEL, RUIZ, (414) 729-5868, (274) 263-4496, ABESEMBEL@GMAIL.COM, 0, 0, SECTOR CENTRO EL LLANO, URDANETA, , TIBISAY TORRE B, 1, 6, FRENTE A LEO CARS, 2021/12/3 12:12:57, 935, 1 , 2, 1 , 4 , 1 , 5 , 1 , 5 	2021-12-03 12:12:57
442	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	8024300, EDUARDO, BESEMBEL, (414) 744-0957, LLAMAR EN CASO DE EMERGENCIA, 26931489, 2 	2021-12-03 12:12:20
443	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	ESTUDIO DE BACHILLERATO, LIBERTADOR, DIRECTOR DEL DEPARTAMENTO DE CALCULO, DERWIS	2021-12-03 12:12:10
444	99999999	Registro de Usuario	usuario	INSERTAR	\N	ABesembel489, 5f892e764e11fcb66c14e6f4e57546ffa137b471, 4 , 1, 26931489, 34	2021-12-03 12:12:09
445	99999999	Registro de Personal	personal	INSERTAR	\N	21182738, ALFREDO, ALEJANDRO, ROJAS, LOBO, (416) 571-5246, (000) 000-0000, ALFREDOALEJANDROROJASLOBO@GMAIL.COM, 1, 1, CONJUNTO RESIDENCIAL SAN ISIDRO, PRINCIPAL, PRIMAVERA, 8, 00, 00, ABASTO MIEL DE LUNA, 2021/12/3 12:12:28, 939, 2 , 2, 3 , 4 , 1 , 5 , 1 , 5 	2021-12-03 12:12:28
446	99999999	Registro de Personal	personal	INSERTAR	\N	12780724, ANGELO, IGNACIO, SANCHEZ, SUAREZ, (412) 655-3168, (000) 000-0000, ANGELONACHO@GMAIL.COM, 1, 4, SECTOR CARLOS SÁNCHEZ, PRINCIPAL, 2, 34, 00, 00, CUADRA ABAJO LICEO JOSE FELIX RIBAS, 2021/12/3 12:12:30, 914, 2 , 2, 3 , 4 , 1 , 5 , 1 , 5 	2021-12-03 12:12:30
447	11913073	Inicio de Session	Usuario	VALIDAR	\N	33, EZambrano073, 2, \n\t\t\t1, 11913073, 03/12/2021 | 12:55:48 	2021-12-03 12:55:48
448	11913073	Personal de Guardia	personal_grupos_guardias	Insertar	\N	11913073 , 20200220 , 12780724 , 26931489 , 21182738 , , , , 8042991 , , , 22657819 , , , 17842117 , , , 5	2021-12-03 13:12:25
449	11913073	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	11, 1	2021-12-03 13:12:48
450	11913073	Apertura de guardia	guardias	Insertar	\N	5, Se encuentra en perfecto estado, y la apertura del servicio sin novedad.	2021-12-03 13:12:20
451	11913073	Nuevas Solicitudes	solicitudes	Insertar	\N	13:12:08, 2021-12-03, 13:12:08, 13:12:08, Maria, Peña, (412) 074-4086, 5 , CONJUNTO RESIDENCIAL ANDRÉS BELLO, casa amarilla, 938, , 41, 5 , Moto mal estacionada., , , , , 0, 1, , , Mérida, av. Andrés bello., , 11913073 , , , 	2021-12-03 13:12:44
452	11913073	Cierre Solicitudes	solicitudes	Insertar	\N	13:12:08, 2021-12-03, 13:12:08, 13:12:13, MARIA, PEñA, (412) 074-4086, 5, CONJUNTO RESIDENCIAL ANDRÉS BELLO, CASA AMARILLA, 938, 0, 41, 1 , MOTO MAL ESTACIONADA., Recuperada, 0, 0, 0, FALSE, TRUE, 1, 1, MéRIDA, AV. ANDRéS BELLO., 11913073 , 11913073, 1, 0, 5 	2021-12-03 13:12:44
453	11913073	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3866707, 2021-12-03, 12:26:47, 12:43:22, GARCIA DUGLAS, 49, TOVAR SECTOR EL A�IL,  CARRERA 1 CON CALLE 5.FRENTE DEL HOTEL DO�A ELVA, INFORMA EL SOLICITANTE QUE HAY UN MASCULINO BAJO EL  EFECTO DEL ALCOHO, SE ENCUENTRA EN LA PUERTA DEL HOTEL, MOLESTANDO A LOS CLIENTES (SOLICITAN APOYO DE LA POLICIA PARA RETIRAR AL SUJETO) , SE LE INFORMO A LA POLICIA DEL ESTADO BOLIVARIANO DE MERIDA AL CCP,5 TOVAR A LA OFICIAL DE GUARDIA COMO JEFE DE AREA PARA ESTE MOMENTO DON  INDIACA VIA TELEFONIA QUE CCORDINA COMISION DE LOS CUADRANYE DEV PAZ DE ESAE SECTO PARA QUE LE DEN REPUESTA DE ESA SOLICITUD ENTRANTE CUMPLACE SIN NOVEDAD QUEDA EN ACCION DE RESPONSABILIDADAD DE ESE ORGANISMO SIN NOVEDAD POR PARTE DE ESTA SALA DE DESPACHO ATENTAMENTE EL S/J JOSE SOSA CUMPLACE , 0, 0, 199, 973, , , 1221, 1267, 01:12, Bomberos Servivida, FALSE, 0, FALSE, 0, 41	2021-12-03 13:12:17
454	11913073	Observaciones al personal de guardia	personal_guardias	Insertar	\N	Estudio , 4 , 20200220 , 41	2021-12-03 13:12:51
455	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 05/12/2021 | 11:26:40 	2021-12-05 11:26:40
456	99999999	Registro de Personal	personal	INSERTAR	\N	21183518, JESSICA, IMALAY, BRAVO, UZCATEGUI, (412) 078-3193, (000) 000-0000, IMALAYBRAVO@GMAIL.COM, 0, 00, SECTOR LOS CUROS, SECTOR JOSE ANTONIO PAEZ, 3 VEREDA 2, 1-26, 00, 00, DETRAS DEL MERCADO, 2021/12/5 11:12:59, 942, 1 , 1, 3 , 5 , 3 , 5 , 1 , 7 	2021-12-05 11:12:59
457	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	11952466, DORIS, UZCATEGUI, (414) 710-3139, LLAMAR EN CASO DE EMERGENCIAS, 21183518, 1 	2021-12-05 11:12:01
458	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE MI PERRITA, MIEL, NOMBRE DE LA TORTUGA, MANCHITO	2021-12-05 11:12:06
459	99999999	Registro de Usuario	usuario	INSERTAR	\N	JBravo518, 7b751c6108fd3674334b6c94b193d84517014150, 2 , 1, 21183518, 37	2021-12-05 11:12:59
460	99999999	Registro de Personal	personal	INSERTAR	\N	27433433, ANDY, MANUEL, TERAN, ZAMBRANO, (424) 725-9608, (000) 000-0000, ANDYMANUELTZ1997@GMAIL.COM, 0, 00, URBANIZACIÓN CAMPO DE ORO, 16 DE SEPTIEMBRE, , 00, 00, 00, FARMACIA LA 16, 2021/12/5 11:12:43, 934, 1 , 2, 1 , 4 , 1 , 5 , 1 , 7 	2021-12-05 11:12:43
461	99999999	Modificar Pariente	parantesco_personal	MODIFICAR	\N	9200795, MIREYA, ZAMBRANO, (424) 747-7709, LLAMAR EN CASO DE EMERGENCIA, 27433433, 1	2021-12-05 12:12:19
462	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 05/12/2021 | 12:06:13 	2021-12-05 12:06:13
463	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 05/12/2021 | 12:07:53 	2021-12-05 12:07:53
464	99999999	Registro de Personal	personal	INSERTAR	\N	19995073, ANTHONY, JESUS, CUEVAS, CUEVAS, (414) 358-2871, (274) 271-5861, ANTHONYCUEVAS126@GMAIL.COM, 0, 00, SECTOR LOS CUROS, PRINCIPAL, 6, 3, 2, 02-03, DETRAS INGLESIA CORAZON MARIA, 2021/12/5 12:12:45, 942, 1 , 2, 4 , 4 , 1 , 5 , 1 , 7 	2021-12-05 12:12:45
465	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	8039383, CARMEN, CUEVAS, (416) 070-6949, LLAMAR EN CASO DE EMERGENCIAS, 19995073, 1 	2021-12-05 12:12:51
466	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE MI PERRO BRANDY, BRANDY, NOMBRE DE MI MADRE CARMEN, CARMEN	2021-12-05 12:12:31
467	99999999	Registro de Usuario	usuario	INSERTAR	\N	ACuevas073, 65515d633e413a8e77273ecb836c9a74f02e95df, 4 , 1, 19995073, 39	2021-12-05 12:12:19
468	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 05/12/2021 | 12:29:27 	2021-12-05 12:29:27
469	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 05/12/2021 | 12:34:31 	2021-12-05 12:34:31
470	99999999	Registro de Personal	personal	INSERTAR	\N	11954012, JUSUS, REINALDO, SANCHEZ, ESCALONA, (412) 664-1838, (274) 221-0914, JESUSREINALDITO@GMAIL.COM, 1, 3, BARRIO AGUAS CALIENTES, PRINCIPAL, LARA, URB VILLA LARA TORRE 2, 2, 7, PASANDO PUENTE BELLA VISTA MANO IZQUIERD, 2021/12/5 12:12:01, 914, 4 , 2, 1 , 1 , 2 , 4 , 1 , 7 	2021-12-05 12:12:01
471	21183518	Inicio de Session	Usuario	VALIDAR	\N	37, JBravo518, 2, \n\t\t\t1, 21183518, 05/12/2021 | 12:51:02 	2021-12-05 12:51:02
472	21183518	Personal de Guardia	personal_grupos_guardias	Insertar	\N	21183518 , , 27433433 , 19995073 , , , , , , , , 13499752 , , , 11954012 , , , 7	2021-12-05 12:12:58
473	21183518	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	12, 1	2021-12-05 12:12:53
474	21183518	Apertura de guardia	guardias	Insertar	\N	7, Se recibe el servicio con las notas antes expuestas las áreas semi limpias y en orden, material de apoyo 2 bolígrafos, 2 reglas, 1 radio Motorola lts 2000 con pila/gancho y cargador de mesa, 1 radio tetra hytera con cargador de mesa, 1 teléfono android z555 con su cargador, guía médica priority en buen estado, bolso rojo con material de contingencia, las 8 cámaras de seguridad en buen estado, las llaves de las diferentes oficinas, en el pasillo se encuentra 1 laptop para el control de asistencia	2021-12-05 13:12:22
475	21183518	Nuevas Solicitudes	solicitudes	Insertar	\N	13:12:06, 2021-12-05, 13:12:06, 13:12:06, jessica , bravo , (412) 078-3193, 65 , SECTOR CENTRO EL LLANO, diagonal a la estacion de servicio chara, 935, , 42, 5 , La solicitante informa de un árbol de gran tamaño el cual se encuentra obstruyendo el paso vehicular, requieren presencia de protección civil en el sitio , , , , , 0, 0, , , merida, sector pie del llano, frente al colegio la salle , , 21183518 , , , 	2021-12-05 13:12:56
476	21183518	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3866970, 2021-12-03, 18:44:29, 05:05:57, KARINA HERNANDEZ, , CHIGUARA,  CALLE ROMAN EDUARDO SANDIA PASOS ARRIBA DE LA PLAZA SENTIDO SUBIENDO , SOLICITANTE INDICA ACCIDENTE DE TRANSITO ENTRE DOS VEHICULOS TIPO MTOS AL PARECER DOS MASCULINOS LESIONADOS SOLICITAN APOYO EN EL SIITO., HOY 03/12/2021 SE RECIBE LLAMADA AL SISTEMA  INTEGRAL DE ARTICULACION PARA  LA ATENCION DE EMERGENCIAS VEN 9.1.1 DE LO CUAL SE TRASMITE DE INMEDIATO, VIA RADIO TRONCALIZADO AL CAE EL ANIS LO CUAL ES RECIBIDA LA SOLICITUD POR EL OPC 2ROBERT GUTIERREZ. LO CUAL DE INMEDIATO DISPONE, ENVIAR AL LUGAR UN VOLUNTARIO CON FUNCIONARIO EN VEHICULO PARTICULAR,AL LLEGAR AL LUGAR LOS FAMILIARES DE LOS LESIONADOS YA HABIAN TRASLADADO. A UNO HACIA EL HOSPITAL Y OTRO LESIONADO SE RETIRO POR SUS MEDIOS A SU DOMICILIO, DEJANDO ASI LA TOMA DE DATOS PERSONALES DE LOS INVOLUCRADOS, Y LAS VERDADERAS LESIONES, SUFRIDAS,EL PERSONAL DE PROTECCION CIVIL SE RETIRA DEL LUGAR., 0, 2, 198, 971, , , 1221, 1253, 01:12, PM Foraneo, Supervision, TRUE, 1, FALSE, 0, 42	2021-12-05 13:12:27
477	21183518	Observaciones de Guardia	observaciones	Insertar	\N	Siendo las 11:30hlv ingresa al sistema Gilbert González para hacer el registro del libro digital y la respectiva inducción , , , , 42, 5	2021-12-05 13:12:38
478	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 05/12/2021 | 13:41:53 	2021-12-05 13:41:53
479	99999999	Modificar Personal	personal	MODIFICAR	\N	11954012, JESUS, REINALDO, SANCHEZ, ESCALONA, (412) 664-1838, (274) 221-0914, JESUSREINALDITO@GMAIL.COM, t, 03, BARRIO AGUAS CALIENTES, PRINCIPAL, LARA, URB VILLA LARA TORRE 2, 02, 7, PASANDO PUENTE BELLA VISTA MANO IZQUIERD, 2021-12-05 12:12:01, 914, 4, 2, 1, 1, 2, 4, 1, 7	2021-12-05 13:12:23
480	11954012	Inicio de Session	Usuario	VALIDAR	\N	40, JSanchez012, 3, \n\t\t\t1, 11954012, 05/12/2021 | 14:07:57 	2021-12-05 14:07:57
481		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	12, 3, 4	2021-12-05 14:12:44
482	11954012	Apertura de guardia	guardias	Insertar	\N	7, sin novedad	2021-12-05 14:12:51
483	21183518	Inicio de Session	Usuario	VALIDAR	\N	37, JBravo518, 2, \n\t\t\t1, 21183518, 05/12/2021 | 14:22:31 	2021-12-05 14:22:31
484	11954012	Nuevas Solicitudes	solicitudes	Insertar	\N	14:12:40, 2021-12-05, 14:12:40, carlos, sanchez, (041) 379-2258, 9 , 9 , CONJUNTO RESIDENCIA VILLA SANTA, serca del aeropuerto, 936, 43, 5 , municipio librertador merida, 11954012 	2021-12-05 14:12:01
485	11954012	Cierre Solicitudes	solicitudes	Insertar	\N	13:12:06, 2021-12-05, 13:12:06, 14:12:17, JESSICA , BRAVO , (412) 078-3193, 65, SECTOR CENTRO EL LLANO, DIAGONAL A LA ESTACION DE SERVICIO CHARA, 935, 1, 43, 1 , LA SOLICITANTE INFORMA DE UN áRBOL DE GRAN TAMAñO EL CUAL SE ENCUENTRA OBSTRUYENDO EL PASO VEHICULAR, REQUIEREN PRESENCIA DE PROTECCIóN CIVIL EN EL SITIO , sale la unidad sar 26 al sitio  al llegar  es positivo , 0, 01, 0, FALSE, FALSE, 0, 1, MERIDA, SECTOR PIE DEL LLANO, FRENTE AL COLEGIO LA SALLE , 11954012 , 21183518, 0, 01, 3 	2021-12-05 13:12:56
486	11954012	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3867446, 2021-12-05, 00:12:57, 02:56:07, MARIA MORENO, , MERIDA, BARRIO LA MILAGROSA FRENTE A LA LICORERIA , LA SOLICITANTE INDICA QUE EN ESTA ENTIDAD SE ENCUENTRA VARIAS PERSONAS TOMANDO BEBIDAS ALCOHOLICAS Y OBSTACULIZANDO LA VIA PUBLICA CON VEHICULOS, SE SOLICITA EL APOYO DE LA POLICIA , AL SITIO SE TRASLADO UNIDAD DE VIGILANCIA Y PATRULLAJE MOTORIZADO AL MANDO DEL SUPERVISOR JEFE IVAN MARQUEZ  QUIEN INDICO SITUACION SIN NOVEDAD PARA EL MOMENTO , 0, 0, 190, 946, BARRIO LA MILAGROSA, , 1298, 35, 02:12, Bomberos Rescate, FALSE, 0, FALSE, 0, 43	2021-12-05 14:12:43
487	11954012	Observaciones de Guardia	observaciones	Insertar	\N	se reporto un oficial carlos gutierre, , , , 43, 1	2021-12-05 14:12:58
488	21183518	Observaciones al personal de guardia	personal_guardias	Insertar	\N	Siendo las 13:56hlv el supervisor de guardia del dia lunes T.S.U. Jorge Uzcategui informa que por motivos de salud no podrá asistir el día de mañana, de igual manera notifica que en supervisión quedara Franky Vgot , 3 , 16200660 , 42	2021-12-05 14:12:35
489	21183518	Inicio de Session	Usuario	VALIDAR	\N	37, JBravo518, 2, \n\t\t\t1, 21183518, 05/12/2021 | 22:39:35 	2021-12-05 22:39:35
490	21183518	Inicio de Session	Usuario	VALIDAR	\N	37, JBravo518, 2, \n\t\t\t1, 21183518, 06/12/2021 | 05:28:58 	2021-12-06 05:28:58
491	21183518	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	21, 3, 5, 11, 324, 11, 56, 431, 3867446 , 42	2021-12-06 05:12:26
492	21183518	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	12, 1	2021-12-06 05:12:34
493	21183518	Cierre de guardia	guardias	Insertar	\N	7, SE HACE ENTREGA DE GUARDIA SIN NINGUNA NOVEDAD 	2021-12-06 05:12:59
494	21183518	CIERRE DE SESSION	USUARIO	VALIDAR	\N	37, JBravo518, 2, 1, 21183518, 06/12/2021 | 05:47:01 	2021-12-06 05:47:01
495	15620712	Inicio de Session	Usuario	VALIDAR	\N	27, GMaldonado712, 2, \n\t\t\t1, 15620712, 14/12/2021 | 10:10:37 	2021-12-14 10:10:37
496	15620712	Observaciones al personal	personal_guardias	Insertar	\N	asistio al servicio médico por presentar sintomas de gripe, emitiendo reporao medico y solicitud de prueba covid, 5 , 26052701 	2021-12-14 10:12:33
497	15620712	Observaciones al personal	personal_guardias	Insertar	\N	no se ha presentado al servicio se desconoce los motivos, 9 , 15620802 	2021-12-14 10:12:43
498	15620712	Observaciones al personal	personal_guardias	Insertar	\N	Se encuentra de reposo médico, 5 , 12356337 	2021-12-14 10:12:28
499	15620712	Personal de Guardia	personal_grupos_guardias	Insertar	\N	15620712 , 17523387 , 15040226 , 22887354 , 26052701 , , , , 8042991 , , , 12356337 , , , 15621210 , , , 2	2021-12-14 10:12:12
500	15620712	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	13, 1	2021-12-14 10:12:23
501	15620712	Apertura de guardia	guardias	Insertar	\N	2, Se recibe el servicio con la novedad que el teléfono celular asignado a supervisión se encuentra deteriorada la pantalla con fisura en tan poco tiempo de uso y de ser asignado	2021-12-14 10:12:11
502	15620712	Inicio de Session	Usuario	VALIDAR	\N	27, GMaldonado712, 2, \n\t\t\t1, 15620712, 15/12/2021 | 07:49:21 	2021-12-15 07:49:21
503	15620712	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3871770, 2021-12-14, 11:36:58, 14:29:19, KRISMAR QUINTWRO, , MERIDA, AV URDANETA, CERCA DEL COLEGIO LA SALLE EN LA ESTACION DE GASOLINA MARIO CHARAL, LA SOLICITANTE INDICA QUE SE PRODUJO  COLISION DE VEHICULO CON MOTO. LA VICTIMA SE ENCUENTRA EN EL SUELO. EL OTRO VEHICULO SE DIO A LA FUGA. SOLICITA APOYO, SE LE PASA LA INFORMACION VIA TELEFONICA AL CUARTEL CENTRAL DE LOS BOMBEROS TOMA NOTA DEL REPORTE LA BOMBERA YENIFER SANCHEZ, QUIEN DESPACHA LA UNIDAD B-078 AL MANDO DEL SARGENTO MAYOR DE BOMBEROS LUIS ROJAS QUIEN ACUDIO AL LLAMADO EN COMPA�IA DEL CABO SEGUNDO DEIBY RAMIREZ Y EL BOMBERO OSCAR MORA QUIENES SE PRESENTARON EN LA AV. URDANETA ESPECIFICAMENTE AL FRENTE DE LA ESTACION DE SERVICIO PIE EL LLANO, VERIFICO QUE SE TRATABA DE UN ACCIDENTE DE TR�NSITO TIPO COLISION ENTRE VEHICULOS. PRIMER VEHICULO TIPO MOTO, MARCA SUZUKI, MODELO DR 650CC COLOR AZUL CON BLANCO, A�O 2008 PLACA AD4U74S CONDUCIDO POR EL CIUDADANO CRISTOFER ALEJANDRO ROJAS MARQUINAS DE 17 A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD 30.372.500 QUIEN PRESENTO TRAUMATISMO EN EL ARCO SUPERCILIAR IZQUIERDO, DEL SEGUNDO VEHICULO SE DESCONOCE LOS DATOS YA QUE EL MISMO NO SE ENCONTRABA EN EL SITIO. EN DICHO PROCEDIMIENTO SE REALIZO ACORDONAMIENTO DE  LA ESCENA, ESTABILIZACION DEL PACIENTE CON COLLARIN Y EXTRACCI�N CON TABLA R�GIDA ESPINAL REALIZANDO ASEPSIA EN LA HERIDA MENCIONADA Y FUE TRASLADADA HACIA IAHULA RECIBIDO POR LA M�DICO DE GUARDIA MARBEL JEREZ MATRICULA MPPPS NRO 59205, 0, 1, 190, 947, AV. URDANETA, COLEGIO LA SALLE, 1292, 1016, 07:12, PM Foraneo, TRUE, 1, TRUE, 1, 45	2021-12-15 07:12:11
504	15620712	Solicitudes Sistema Emergencias 171	reporte_solicitudes	Insertar	\N	3871770, 2021-12-14, 11:36:58, 14:29:19, KRISMAR QUINTWRO, , MERIDA, AV URDANETA, CERCA DEL COLEGIO LA SALLE EN LA ESTACION DE GASOLINA MARIO CHARAL, LA SOLICITANTE INDICA QUE SE PRODUJO  COLISION DE VEHICULO CON MOTO. LA VICTIMA SE ENCUENTRA EN EL SUELO. EL OTRO VEHICULO SE DIO A LA FUGA. SOLICITA APOYO, SE LE PASA LA INFORMACION VIA TELEFONICA AL CUARTEL CENTRAL DE LOS BOMBEROS TOMA NOTA DEL REPORTE LA BOMBERA YENIFER SANCHEZ, QUIEN DESPACHA LA UNIDAD B-078 AL MANDO DEL SARGENTO MAYOR DE BOMBEROS LUIS ROJAS QUIEN ACUDIO AL LLAMADO EN COMPA�IA DEL CABO SEGUNDO DEIBY RAMIREZ Y EL BOMBERO OSCAR MORA QUIENES SE PRESENTARON EN LA AV. URDANETA ESPECIFICAMENTE AL FRENTE DE LA ESTACION DE SERVICIO PIE EL LLANO, VERIFICO QUE SE TRATABA DE UN ACCIDENTE DE TR�NSITO TIPO COLISION ENTRE VEHICULOS. PRIMER VEHICULO TIPO MOTO, MARCA SUZUKI, MODELO DR 650CC COLOR AZUL CON BLANCO, A�O 2008 PLACA AD4U74S CONDUCIDO POR EL CIUDADANO CRISTOFER ALEJANDRO ROJAS MARQUINAS DE 17 A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD 30.372.500 QUIEN PRESENTO TRAUMATISMO EN EL ARCO SUPERCILIAR IZQUIERDO, DEL SEGUNDO VEHICULO SE DESCONOCE LOS DATOS YA QUE EL MISMO NO SE ENCONTRABA EN EL SITIO. EN DICHO PROCEDIMIENTO SE REALIZO ACORDONAMIENTO DE  LA ESCENA, ESTABILIZACION DEL PACIENTE CON COLLARIN Y EXTRACCI�N CON TABLA R�GIDA ESPINAL REALIZANDO ASEPSIA EN LA HERIDA MENCIONADA Y FUE TRASLADADA HACIA IAHULA RECIBIDO POR LA M�DICO DE GUARDIA MARBEL JEREZ MATRICULA MPPPS NRO 59205, 0, 1, 190, 947, AV. URDANETA, COLEGIO LA SALLE, 1292, 1016, 07:12, PM Foraneo, TRUE, 1, TRUE, 1, 45	2021-12-15 07:12:07
505	15620712	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	23, 4, 2, 6, 246, 14, 36, 331, 3871770 , 45	2021-12-15 07:12:47
506	15620712	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	13, 1	2021-12-15 07:12:51
507	15620712	Cierre de guardia	guardias	Insertar	\N	2, se entrega el servicio a la espera del cierre del procedimiento de la solicitud nro 3871999	2021-12-15 07:12:37
508	15620712	CIERRE DE SESSION	USUARIO	VALIDAR	\N	27, GMaldonado712, 2, 1, 15620712, 15/12/2021 | 07:57:39 	2021-12-15 07:57:39
509	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 28/04/2023 | 11:34:26 	2023-04-28 11:34:26
510	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 28/04/2023 | 12:02:17 	2023-04-28 12:02:17
511	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 28/04/2023 | 12:02:25 	2023-04-28 12:02:25
512	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 28/04/2023 | 12:04:00 	2023-04-28 12:04:00
513	17129573	Personal de Guardia	personal_grupos_guardias	Insertar	\N	17129573 , , 26052701 , 27777826 , , , , , , , , 16445441 , , , , , , 1	2023-04-28 11:04:05
514	17129573	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	14, 1	2023-04-28 11:04:18
515	17129573	Apertura de guardia	guardias	Insertar	\N	1, se realiza la apertura de guardia	2023-04-28 11:04:36
516	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	11:04:57, 2023-04-28, 11:04:57, 11:04:57, luis, lares, (424) 456-7845, 7 , ALDEA MITISUS, punto de referencia, 922, , 47, 5 , detalles del evento, , , , , 0, 0, , , direccion del evento, , 18308368 , , , 	2023-04-28 11:04:28
517	17129573	Cierre Solicitudes	solicitudes	Insertar	\N	11:04:57, 2023-04-28, 11:04:57, 11:04:20, LUIS, LARES, (424) 456-7845, 7, ALDEA MITISUS, PUNTO DE REFERENCIA, 922, 0, 47, 1 , DETALLES DEL EVENTO, procedimiento de la comision, 0, 0, 0, FALSE, FALSE, 0, 1, DIRECCION DEL EVENTO, 18310118 , 18308368, 0, 1, 6 	2023-04-28 11:04:28
518	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 02/05/2023 | 12:41:30 	2023-05-02 12:41:30
519	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 02/05/2023 | 13:06:34 	2023-05-02 13:06:34
520	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 26/07/2023 | 01:03:37 	2023-07-26 01:03:37
521	99999999	Modificar Personal	personal	MODIFICAR	\N	8042991, JOSE, ELPIDIO, SOSA, NIñO, (426) 274-0692, (274) 221-7858, SOSAJOSE_E@HOTMAIL.COM, t, 02, SECTOR MANZANO ABAJO, URDANETA, LOS RUICES, SIN NUMERO, 00, 00, VIA PRINCIPAL MANZANO ALTO, 2021-11-08 11:11:53, 915, 4, 2, 2 , 3, 2, 3, 1, 1	2023-07-26 00:07:59
522	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 26/07/2023 | 01:43:13 	2023-07-26 01:43:13
523	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 26/07/2023 | 01:47:27 	2023-07-26 01:47:27
524	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 02/08/2023 | 06:42:52 	2023-08-02 06:42:52
525	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 26931489 , 19995073 , , , , , 8042991 , , , 18310118 , , , 18123089 , , , 4	2023-08-02 05:08:07
526	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	15, 1	2023-08-02 05:08:12
527	23302896	Apertura de guardia	guardias	Insertar	\N	4, Se procede a realizar la primera apertura de guardia de este año 2023	2023-08-02 05:08:00
528	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 02/08/2023 | 06:49:56 	2023-08-02 06:49:56
529	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 02/08/2023 | 06:52:20 	2023-08-02 06:52:20
530	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 02/08/2023 | 06:53:18 	2023-08-02 06:53:18
531	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 02/08/2023 | 06:54:44 	2023-08-02 06:54:44
532	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 02/08/2023 | 06:57:18 	2023-08-02 06:57:18
533	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 02/08/2023 | 06:58:10 	2023-08-02 06:58:10
534	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 02/08/2023 | 06:58:31 	2023-08-02 06:58:31
535	26931489	Nuevas Solicitudes	solicitudes	Insertar	\N	07:08:42, 2023-8-2, 07:08:42, Luis, Catro, (242) 585-8555, 9 , 9 , BARRIO SANTA BÁRBARA, Puentecito, 940, 4, 5 , Santa Barbara, 29520477 	2023-08-02 07:08:10
536	26931489	Nuevas Solicitudes	solicitudes	Insertar	\N	07:08:13, 2023-8-2, 07:08:13, Carlos, Perez, (416) 156-3636, 9 , 21 , BARRIO SANTA BÁRBARA, puentecito, 940, 4, 5 , Santa Barbara, 29520477 	2023-08-02 07:08:49
537	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 02/08/2023 | 08:16:44 	2023-08-02 08:16:44
538	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 27433433 , 19995073 , 12780724 , 18966872 , , , 8042991 , , , 18310118 , , , 18123089 , , , 4	2023-08-02 07:08:46
539	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	16, 1	2023-08-02 07:08:48
540	23302896	Apertura de guardia	guardias	Insertar	\N	4, Apertura de Guardia	2023-08-02 07:08:58
541	23302896	Cierre Solicitudes	solicitudes	Insertar	\N	07:08:13, 2023-08-02, 07:08:13, 07:08:12, CARLOS, PEREZ, (416) 156-3636, 21, BARRIO SANTA BÁRBARA, PUENTECITO, 940, 0, 49, 1 , ESTAFA A TURISTAS, Presencia de comision policial en el sitio, en apoyo a las personas afectadas, 0, 0, 0, FALSE, FALSE, 1, 0, SANTA BARBARA, 18123089 , 29520477, 1, 0, 5 	2023-08-02 07:08:49
542	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 03/08/2023 | 06:59:52 	2023-08-03 06:59:52
543	99999999	Registrar Bienes	bienes	INSERTAR	\N	021023-789-NN-44, MOUSE, GLION, G20, BLANCO Y AZUL, SINNUMERO, MOUSE INALAMBRICO DE FUNCIONAMIENTO CON PILA AA, 2022-10-14, M.P.P. RELACIONES INTERIORES, JUSTICIA Y PAZ, EMERGENCIAS 911, PIERDE SEñAL A MAS DE 3 METROS, 1 , 1 , 2023-08-03, 4 	2023-08-03 06:08:59
544	99999999	Registrar Bienes	bienes	INSERTAR	\N	1256-1254-NN-45, TECLADO, GLION, KG3080, BLANCO Y AZUL, 15V4-MA15-KG30-8080, FASHION WIRELESS WATERPROOF KEYBOARDS, 2022-10-14, M.P.P. RELACIONES INTERIORES, JUSTICIA Y PAZ, EMERGENCIAS 911, TECLADO INALAMBRICO, 1 , 1 , 2023-08-03, 4 	2023-08-03 06:08:36
545	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 03/08/2023 | 07:10:56 	2023-08-03 07:10:56
546	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 03/08/2023 | 07:11:29 	2023-08-03 07:11:29
547	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 03/08/2023 | 07:15:12 	2023-08-03 07:15:12
548	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 03/08/2023 | 07:17:17 	2023-08-03 07:17:17
549		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	16, 5, 6	2023-08-03 06:08:23
550	26931489	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	16, 5, 6	2023-08-03 06:08:40
551	26931489	CIERRE DE SESSION	USUARIO	VALIDAR	\N	34, ABesembel489, 4, 1, 26931489, 03/08/2023 | 07:20:41 	2023-08-03 07:20:41
552	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 03/08/2023 | 07:20:47 	2023-08-03 07:20:47
553		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	16, 5, 6	2023-08-03 06:08:53
554	26931489	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	16, 5, 6	2023-08-03 06:08:12
555	26931489	CIERRE DE SESSION	USUARIO	VALIDAR	\N	34, ABesembel489, 4, 1, 26931489, 03/08/2023 | 07:21:13 	2023-08-03 07:21:13
556	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 04/08/2023 | 06:32:56 	2023-08-04 06:32:56
557	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 04/08/2023 | 07:19:55 	2023-08-04 07:19:55
558	26931489	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	16, 5, 6	2023-08-04 06:08:21
559	26931489	CIERRE DE SESSION	USUARIO	VALIDAR	\N	34, ABesembel489, 4, 1, 26931489, 04/08/2023 | 07:20:22 	2023-08-04 07:20:22
560	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 04/08/2023 | 07:31:37 	2023-08-04 07:31:37
561	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 05/08/2023 | 19:51:52 	2023-08-05 19:51:52
562	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 05/08/2023 | 21:12:56 	2023-08-05 21:12:56
563	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 10/08/2023 | 06:16:55 	2023-08-10 06:16:55
564	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 10/08/2023 | 06:18:08 	2023-08-10 06:18:08
565	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 10/08/2023 | 06:20:02 	2023-08-10 06:20:02
566	20200220	Personal de Guardia	personal_grupos_guardias	Insertar	\N	20200220 , 11913073 , 18125565 , 15620802 , 18308368 , , , , 8042991 , , , 18310118 , 16445441 , , 17842117 , 20435049 , , 5	2023-08-10 05:08:42
567	20200220	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	17, 1	2023-08-10 05:08:46
568	20200220	Apertura de guardia	guardias	Insertar	\N	5, Realizamos la apertura de guardia, con la intencion de realizar modificaciones a formularios de solicitudes y sesiones de operadores	2023-08-10 05:08:42
569	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	05:08:39, 2023-8-10, 05:08:39, 05:08:39, pedro, jimenez, (412) 587-4512, 34 , CENTRO DE SANTA MARÍA DE CAPARO, sin informacion, 953, , 50, 5 , no se tiene mayor informacion, , , , , 0, 0, , , no dio mayor informacion, , 20200220 , , , 	2023-08-10 05:08:37
570	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	05:08:41, 2023-8-10, 05:08:41, 05:08:41, nulo, nulo, (424) 752-5858, 121 , ALDEA MUCURUTÁN, sin informacion, 944, , 50, 6 , nulo, , , , , 0, 0, , , nulo no hay mayor informacion, , 20200220 , , , 	2023-08-10 05:08:18
571	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 13/08/2023 | 18:13:35 	2023-08-13 18:13:35
572	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 13/08/2023 | 18:14:51 	2023-08-13 18:14:51
573	20200220	Personal de Guardia	personal_grupos_guardias	Insertar	\N	20200220 , 11913073 , 18125565 , 15620802 , 18308368 , , , , 8042991 , , , 18310118 , , , 17842117 , , , 5	2023-08-13 17:08:21
574	20200220	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	18, 1	2023-08-13 17:08:24
575	20200220	Apertura de guardia	guardias	Insertar	\N	5, registro de apertura de guardia de l domingo 13 de agosto	2023-08-13 17:08:58
576	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	17:08:54, 2023-8-13, 17:08:54, 17:08:54, carlos, paez, (424) 753-7845, 4 , LA AZULITA, la plaza, 900, , 51, 5 , postel electrico, , , , , 0, 0, , , zona las americas, , 20200220 , , , 	2023-08-13 17:08:46
577	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	17:08:17, 2023-8-13, 17:08:17, 17:08:17, laura, mendez, (424) 753-5689, 1 , BARRIO LA PEDECA, estado del clima, 893, , 51, 7 , solicitud de información, estado del clima, , , , , 0, 0, , , , , 20200220 , , , 	2023-08-13 17:08:23
578	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	17:08:46, 2023-8-13, 17:08:46, 17:08:46, lorena, arrieta, (421) 584-5875, 1 , BARRIO LA PEDECA, , 893, , 51, 7 , solicitud de informacion, , , , , 0, 0, , , , , 20200220 , , , 	2023-08-13 17:08:29
579	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	17:08:48, 2023-8-13, 17:08:48, 17:08:48, maria, sosa, (416) 854-8525, 1 , 0, , 929, , 51, 7 , llamada de informacion, , , , , 0, 0, , , , , 20200220 , , , 	2023-08-13 18:08:39
580	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	18:08:45, 2023-8-13, 18:08:45, 18:08:45, caremn, sosa, (421) 258-2585, 1 , BARRIO EL CARMEN, , 893, , 51, 7 , , , , , , 1, 1, , , , , 20200220 , , , 	2023-08-13 18:08:24
581	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	18:08:36, 2023-8-13, 18:08:36, 18:08:36, maria, quintero, (412) 258-4512, 1 , 0, , 893, , 51, 7 , , , , , , 0, 0, , , , , 20200220 , , , 	2023-08-13 18:08:21
582	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	18:08:24, 2023-8-13, 18:08:24, 18:08:24, laura, sasa, (416) 259-8798, 1 , 0, , 0, , 51, 7 , , , , , , 0, 0, , , , , 20200220 , , , 	2023-08-13 18:08:57
583	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	18:08:46, 2023-8-13, 18:08:46, 18:08:46, maria, moreno, (416) 789-5545, 1 , 0, , 0, , 51, 7 , solicitud de informacion, , , , , 0, 0, , , , , 20200220 , , , 	2023-08-13 18:08:26
584	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	18:08:37, 2023-8-13, 18:08:37, 18:08:37, , , (416) 253-6452, 0 , 0, , 0, , 51, 6 , , , , , , 1, 1, , , , , 20200220 , , , 	2023-08-13 19:08:04
585	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	19:08:28, 2023-8-13, 19:08:28, 19:08:28, , , (416) 859-5689, 0, 0, , 0, , 51, 6 , , , , , , 0, 0, , , , , 20200220 , , , 	2023-08-13 19:08:45
586	20200220	Cierre Solicitudes	solicitudes	Insertar	\N	17:08:54, 2023-08-13, 17:08:54, 19:08:22, CARLOS, PAEZ, (424) 753-7845, 4, LA AZULITA, LA PLAZA, 900, 2, 51, 1 , POSTEL ELECTRICO, los funcionarios hicieron presencia en el sitio del evento,el herido solo presenta contusiones leves, 0, 0, 1, FALSE, FALSE, 1, 1, ZONA LAS AMERICAS, 11913073 , 20200220, 2, 1, 6 	2023-08-13 17:08:46
587	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	19:08:51, 2023-8-13, 19:08:51, 19:08:51, carmen, sosa, (412) 159-5656, 0 , 0, , 0, , 51, 7 , llamada de solicitudde informacion, , , , , 0, 0, , , , , 11913073 , , , 	2023-08-13 19:08:36
588	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	19:08:39, 2023-8-13, 19:08:39, 19:08:39, Pedro, Canales, (424) 785-4512, 7 , SECTOR LA MILAGROSA L, bodega mi casita, 941, , 51, 5 , personas sospechosas, agresivas, , , , , 0, 0, , , Av. Las Francias, Calle Los caobos, , , 11913073 , , , 	2023-08-13 19:08:19
589	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	19:08:22, 2023-8-13, 19:08:22, 19:08:22, , , (416) 457-8455, 0, 0, , 0, , 51, 6 , , , , , , 0, 0, , , , , 11913073 , , , 	2023-08-13 19:08:42
590	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 13/08/2023 | 20:43:16 	2023-08-13 20:43:16
591	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	19:08:01, 2023-8-13, 19:08:01, 19:08:01, dario, meza, (142) 583-6945, 0, 0, , 0, , 51, 7 , solicitud de información, temperatura actual, , , , , 0, 0, , , , , 20200220, , , 	2023-08-13 19:08:49
592	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 14/08/2023 | 21:06:19 	2023-08-14 21:06:19
593	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 20/08/2023 | 06:50:35 	2023-08-20 06:50:35
594	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 20/08/2023 | 07:02:36 	2023-08-20 07:02:36
595	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 20/08/2023 | 08:11:35 	2023-08-20 08:11:35
596	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 20/08/2023 | 08:28:26 	2023-08-20 08:28:26
597	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 20/08/2023 | 08:28:29 	2023-08-20 08:28:29
598		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	18, 5, 6	2023-08-20 07:08:32
644	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 19/09/2023 | 23:32:15 	2023-09-19 23:32:15
599	26931489	Nuevas Solicitudes	solicitudes	Insertar	\N	07:08:36, 2023-8-20, 07:08:36, carmen, zerpa, (424) 785-4125, 0, 28 , BARRIO LA CONQUISTA, estacionamiento, 893, 5, 5 , calle el cajigal, 26931489	2023-08-20 07:08:11
600	26931489	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	18, 5, 6	2023-08-20 07:08:46
601	26931489	CIERRE DE SESSION	USUARIO	VALIDAR	\N	34, ABesembel489, 4, 1, 26931489, 20/08/2023 | 08:31:48 	2023-08-20 08:31:48
602	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 20/08/2023 | 08:31:51 	2023-08-20 08:31:51
603	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 20/08/2023 | 08:32:16 	2023-08-20 08:32:16
604	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 20/08/2023 | 08:32:23 	2023-08-20 08:32:23
605		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	18, 5, 6	2023-08-20 07:08:26
606	26931489	Nuevas Solicitudes	solicitudes	Insertar	\N	07:08:36, 2023-8-20, 07:08:36, jose, mora, (412) 458-4582, 0, 1 , BARRIO LA CONQUISTA, estacionamiento, 893, 5, 5 , calle cuji, 26931489	2023-08-20 07:08:42
607	26931489	Nuevas Solicitudes	solicitudes	Insertar	\N	07:08:09, 2023-8-20, 07:08:09, dario, zerpa, (421) 525-4554, 9 , 7 , BARRIO LA CONQUISTA, estacionamiento, 893, 5, 5 , direccion, 26931489	2023-08-20 07:08:57
608	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 20/08/2023 | 08:37:21 	2023-08-20 08:37:21
609	26931489	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	18, 5, 6	2023-08-20 07:08:40
610	26931489	CIERRE DE SESSION	USUARIO	VALIDAR	\N	34, ABesembel489, 4, 1, 26931489, 20/08/2023 | 08:37:41 	2023-08-20 08:37:41
611	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 20/08/2023 | 08:38:51 	2023-08-20 08:38:51
612	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 18125565 , 15620802 , 18308368 , , , , 8042991 , , , 18310118 , , , 20435049 , , , 4	2023-08-20 07:08:24
613	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	19, 1	2023-08-20 07:08:30
614	23302896	Apertura de guardia	guardias	Insertar	\N	4, apertura de guardia	2023-08-20 07:08:38
615	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	07:08:42, 2023-8-20, 07:08:42, 07:08:42, carlos, ortiz, (412) 258-6965, 1 , BARRIO LA CONQUISTA, estacionamiento, 893, , 52, 5 , Detalles del Evento, , , , , 0, 0, , , Direccion evento, , 23302896, , , 	2023-08-20 07:08:38
616	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 20/08/2023 | 08:40:55 	2023-08-20 08:40:55
617	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 20/08/2023 | 08:55:03 	2023-08-20 08:55:03
618	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 20/08/2023 | 08:55:28 	2023-08-20 08:55:28
619	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 19995073 , 27433433 , 12780724 , , , , 8042991 , , , 18310118 , , , 17842117 , , , 4	2023-08-20 07:08:58
620	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	20, 1	2023-08-20 07:08:01
621	23302896	Apertura de guardia	guardias	Insertar	\N	4, apertura de guardia2	2023-08-20 07:08:09
622	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	07:08:14, 2023-8-20, 07:08:14, 07:08:14, Gilbert, Gonzalez, (412) 258-4758, 12 , BARRIO LA PEDECA, Numero de cuadrante, 893, , 53, 5 , queda pendiente verificar el formulario en navegador firefox y mostrar el numero de cuadrante en el formulario del cierre de solicitud, , , , , 0, 0, , , se logra mostrar el numero de telefono del cuadrante al momento de seleccionar el sector., , 23302896, , , 	2023-08-20 07:08:28
623	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 23/08/2023 | 06:17:20 	2023-08-23 06:17:20
624	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 23/08/2023 | 06:17:48 	2023-08-23 06:17:48
625	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 23/08/2023 | 06:19:00 	2023-08-23 06:19:00
626	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 12780724 , 26931489 , 29794276 , , , , 8042991 , , , 12356337 , , , 20435049 , , , 4	2023-08-23 05:08:21
627	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	21, 1	2023-08-23 05:08:25
628	23302896	Apertura de guardia	guardias	Insertar	\N	4, realizamos apertura de guardia	2023-08-23 05:08:37
629	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	05:08:26, 2023-8-23, 05:08:26, 05:08:26, sara, madera, (412) 258-4512, 1 , BARRIO LA PEDECA, Numero de cuadrante, 893, , 54, 5 , detalles del motivo de al llamada, , , , , 0, 0, , , direccion con avenida, calle, punto referencia, otros detalles de ubicacion, , 23302896, , , 	2023-08-23 05:08:19
630	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 31/08/2023 | 05:54:18 	2023-08-31 05:54:18
631	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 19995073 , 12780724 , 26931489 , 29794276 , 22887354 , 29520477 , 8042991 , , , 18310118 , 12356337 , , 17842117 , , , 4	2023-08-31 04:08:03
632	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	22, 1	2023-08-31 04:08:07
633	23302896	Apertura de guardia	guardias	Insertar	\N	4, realizamos la apertura de guardia para realizar cambios a formulario de cierre de solicitudes y lograr mostrar en este el numero de telefono del cuadrante correspondiente	2023-08-31 04:08:32
634	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	04:08:47, 2023-8-31, 04:08:47, 04:08:47, sara, madera, (412) 258-3669, 53 , BARRIO LA CONQUISTA, Numero de cuadrante, 893, , 55, 5 , detalles del evento, , , , , 0, 0, , , direccion de la eventualidad, , 23302896, , , 	2023-08-31 04:08:12
635	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 19/09/2023 | 21:43:25 	2023-09-19 21:43:25
636	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 27777826 , 15040226 , , , , , 8042991 , , , 18310118 , , , 17842117 , , , 4	2023-09-19 20:09:53
637	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	23, 1	2023-09-19 20:09:56
638	23302896	Apertura de guardia	guardias	Insertar	\N	4, apertura de guardia se realizaconla intencion de modificar formulario de despacho en la seccion de solicitudes	2023-09-19 20:09:25
639	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	20:09:27, 2023-9-19, 20:09:27, 20:09:27, Pedro, camejo, (412) 745-1545, 55 , BARRIO LA CONQUISTA, kiosco don pepe, 893, , 56, 5 , detalles de la eventualidad, , , , , 0, 0, , , direccion de la eventualidad, , 23302896, , , 	2023-09-19 20:09:16
640	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 19/09/2023 | 23:29:55 	2023-09-19 23:29:55
641	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 12780724 , 15040226 , 18966872 , , , , 8042991 , , , 18310118 , 12356337 , , 20435049 , 18123089 , , 4	2023-09-19 22:09:20
642	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	24, 1	2023-09-19 22:09:24
643	23302896	Apertura de guardia	guardias	Insertar	\N	4, apertua de guardi, evaluacion de numero de cuadrantes y organismos	2023-09-19 22:09:43
645	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 23302896 , 20197663 , 29520477 , , , , , 8042991 , , , 16445441 , 12356337 , , 17842117 , 20435049 , , 4	2023-09-19 22:09:42
646	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	25, 1	2023-09-19 22:09:46
647	23302896	Apertura de guardia	guardias	Insertar	\N	4, asdf	2023-09-19 22:09:51
648	23302896	Cierre Solicitudes	solicitudes	Insertar	\N	20:09:27, 2023-09-19, 20:09:27, 22:09:40, PEDRO, CAMEJO, (412) 745-1545, 55, BARRIO LA CONQUISTA, KIOSCO DON PEPE, 893, 2, 58, 1 , DETALLES DE LA EVENTUALIDAD, se realizaron cambios  en la plantilla, adjuntando y mostrandon el numero del cuadrante y el organismo. queda pendiente buscar un metodo mas amigable, 0, 0, 1, FALSE, FALSE, 1, 1, DIRECCION DE LA EVENTUALIDAD, 23302896, 23302896, 2, 2, 1 	2023-09-19 20:09:16
649	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 03/10/2023 | 06:20:53 	2023-10-03 06:20:53
650	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 26931489 , 15040226 , , , , , 8042991 , , , 16445441 , , , 18123089 , , , 4	2023-10-03 05:10:21
651	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	26, 1	2023-10-03 05:10:25
652	23302896	Apertura de guardia	guardias	Insertar	\N	4, pruebas con formulario de nueva solicitud, agregando select con filtro de busqueda	2023-10-03 05:10:00
653	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 04/10/2023 | 05:57:15 	2023-10-04 05:57:15
654	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 04/10/2023 | 08:59:51 	2023-10-04 08:59:51
655	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 05/10/2023 | 23:36:04 	2023-10-05 23:36:04
656	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 05/10/2023 | 23:41:49 	2023-10-05 23:41:49
657	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 05/10/2023 | 23:42:09 	2023-10-05 23:42:09
658	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 20197663 , 22887354 , 15620802 , , , , 8042991 , , , 16445441 , , , 17842117 , , , 4	2023-10-05 22:10:18
659	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	27, 1	2023-10-05 22:10:36
660	23302896	Apertura de guardia	guardias	Insertar	\N	4, se realiza apertura de guardia	2023-10-05 22:10:49
661	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 29/12/2023 | 08:38:03 	2023-12-29 08:38:03
662	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 29/02/2024 | 10:37:46 	2024-02-29 10:37:46
663	20200220	Personal de Guardia	personal_grupos_guardias	Insertar	\N	20200220 , 11913073 , 15620802 , 29520477 , 20197663 , , , , 8042991 , , , 16445441 , 12356337 , , 20435049 , , , 5	2024-02-29 10:02:40
664	20200220	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	28, 1	2024-02-29 10:02:45
665	20200220	Apertura de guardia	guardias	Insertar	\N	5, Se procede a realizar la apertura de guardia luego de haber concluido con la carga de todos los sectores del territorio merideño, y sus cuadrantes de Paz. procederemos a realizar pruebas de carga de datos y registro de solicitudes	2024-02-29 10:02:18
666	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	10:02:28, 2024-2-29, 10:02:28, 10:02:28, Marcos, Perez, (412) 258-6952, 68 , 142841, Cancha Techada, 893, , 61, 5 , detallar que esta sucediendo o en que estatus se encuentran los involucrados, , , , , 0, 0, , , dirección detallada del evento o lugar de los hechos, , 20200220, , , 	2024-02-29 10:02:45
667	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	10:02:50, 2024-2-29, 10:02:50, 10:02:50, Laura, Rodriguez, (424) 758-4141, 50 , 143021, la mejor empanada, 893, , 61, 5 , detalles del evento, , , , , 0, 0, , , direccion exacta, , 20200220, , , 	2024-02-29 10:02:24
668	20200220	Cierre Solicitudes	solicitudes	Insertar	\N	10:02:28, 2024-02-29, 10:02:28, 10:02:52, MARCOS, PEREZ, (412) 258-6952, 68, 142841, CANCHA TECHADA, 934, 0, 61, 1 , DETALLAR QUE ESTA SUCEDIENDO O EN QUE ESTATUS SE ENCUENTRAN LOS INVOLUCRADOS, procede con el cierre de solicitud, 0, 0, 0, FALSE, FALSE, 0, 1, DIRECCIóN DETALLADA DEL EVENTO O LUGAR DE LOS HECHOS, 20200220, 20200220, 0, 1, 8 	2024-02-29 10:02:45
669	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	12:02:13, 2024-2-29, 12:02:13, 12:02:13, , , (274) 221-5452, 0 , 0, , 893, , 61, 6 , , , , , , 0, 0, , , , , 20200220, , , 	2024-02-29 12:02:45
670	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 29/02/2024 | 14:25:56 	2024-02-29 14:25:56
671	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	14:02:04, 2024-2-29, 14:02:04, 14:02:04, Carlos, Parra, (416) 258-4212, 63 , 143060, pollera Rico Pollo, 893, , 61, 5 , avispas furiosas, , , , , 0, 0, , , ubicación del tatuco de avispa, , 20200220, , , 	2024-02-29 14:02:15
672	20200220	Cierre Solicitudes	solicitudes	Insertar	\N	14:02:04, 2024-02-29, 14:02:04, 14:02:23, CARLOS, PARRA, (416) 258-4212, 63, 143060, POLLERA RICO POLLO, 942, 0, 61, 3 , AVISPAS FURIOSAS, sin unidades disponibles, 0, 0, 0, FALSE, TRUE, 1, 1, UBICACIóN DEL TATUCO DE AVISPA, 20200220, 20200220, 0, 0, 3 	2024-02-29 14:02:15
673	20200220	Cierre Solicitudes	solicitudes	Insertar	\N	10:02:50, 2024-02-29, 10:02:50, 15:02:34, LAURA, RODRIGUEZ, (424) 758-4141, 50, 143021, LA MEJOR EMPANADA, 941, 5, 61, 2 , DETALLES DEL EVENTO, al llegar al lugar, ya no se encontraba el vehiculo, 0, 0, 0, FALSE, FALSE, 0, 1, DIRECCION EXACTA, 20200220, 20200220, 0, 1, 8 	2024-02-29 10:02:24
674	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 07/03/2024 | 11:26:36 	2024-03-07 11:26:36
675	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 22887354 , 29520477 , 18308368 , , , , 8042991 , , , 18310118 , , , 17842117 , , , 4	2024-03-07 11:03:10
676	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	29, 1	2024-03-07 11:03:14
677	23302896	Apertura de guardia	guardias	Insertar	\N	4, Realizamos la apertura de guardia, con motivo a modificar las estadisticas al momento del cierre de guardia y de lograr que los diagramas tomen los valores correctos	2024-03-07 11:03:43
678	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	11:03:13, 2024-3-7, 11:03:13, 11:03:13, Carlos, Perez, (424) 752-4512, 1 , 143060, empanadas el buen sabor, 893, , 62, 5 , detalles de la llamada recibida, , , , , 0, 0, , , Avenida, calle, sector, , 23302896, , , 	2024-03-07 11:03:45
679	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	11:03:56, 2024-3-7, 11:03:56, 11:03:56, Carmen, Salas, (412) 456-2578, 76 , 142893, ferreteria Pedro Marmol, 893, , 62, 5 , Detalles de llamada del solicitante, , , , , 0, 0, , , Avenida, Calle, Vereda Sector, , 23302896, , , 	2024-03-07 11:03:18
680	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	11:03:29, 2024-3-7, 11:03:29, 11:03:29, , , (416) 587-4512, 0 , 0, , 893, , 62, 6 , , , , , , 1, 1, , , , , 23302896, , , 	2024-03-07 11:03:49
681	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	11:03:58, 2024-3-7, 11:03:58, 11:03:58, Jose, Mendez, (424) 158-7441, 65 , 0, , 893, , 62, 7 , la presona solicitud paso vehicular por los tuneles, , , , , 0, 0, , , , , 23302896, , , 	2024-03-07 11:03:08
682	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	11:03:21, 2024-3-7, 11:03:21, 11:03:21, Rosa, Diaz, (416) 253-2322, 50 , 143026, Hotel Noche Axul, 893, , 62, 5 , Detalles de la llamada, , , , , 0, 0, , , Avenida, Calle, Vereda, Edificio, Casa, Local, , 23302896, , , 	2024-03-07 12:03:16
683	23302896	Cierre Solicitudes	solicitudes	Insertar	\N	11:03:13, 2024-03-07, 11:03:13, 12:03:49, CARLOS, PEREZ, (424) 752-4512, 1, 143060, EMPANADAS EL BUEN SABOR, 942, 1, 62, 2 , DETALLES DE LA LLAMADA RECIBIDA, Procedimiento efectuado por los funcionarios en el lugar, 0, 0, 0, FALSE, FALSE, 1, 0, AVENIDA, CALLE, SECTOR, 23302896, 23302896, 1, 0, 5 	2024-03-07 11:03:45
684	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 07/03/2024 | 13:22:11 	2024-03-07 13:22:11
685	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	13:03:24, 2024-3-7, 13:03:24, 13:03:24, Laura, Rivas, (412) 452-1210, 57 , 143483, , 893, , 62, 5 , Detalles de la llamada de solicitud, , , , , 0, 1, , , Avenida, Calle, Vereda, Edificio, Casa, Local, , 23302896, , , 	2024-03-07 13:03:30
686	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	13:03:46, 2024-3-7, 13:03:46, 13:03:46, Ramon, Lobo, (416) 255-6232, 68 , 143411, Cauchera Don Pepe, 893, , 62, 5 , Detalles de la Solicitud, , , , , 0, 0, , , Avenida, Calle, Casa, , 23302896, , , 	2024-03-07 13:03:00
687	23302896	Cierre Solicitudes	solicitudes	Insertar	\N	11:03:56, 2024-03-07, 11:03:56, 13:03:01, CARMEN, SALAS, (412) 456-2578, 76, 142893, FERRETERIA PEDRO MARMOL, 937, 2, 62, 1 , DETALLES DE LLAMADA DEL SOLICITANTE, los funcionarios procedieron a rescatar un pequeño felino masculino que se encontraba atrapado en una cerca., 0, 0, 0, FALSE, FALSE, 1, 0, AVENIDA, CALLE, VEREDA SECTOR, 23302896, 23302896, 1, 0, 1 	2024-03-07 11:03:18
688	23302896	Cierre Solicitudes	solicitudes	Insertar	\N	11:03:21, 2024-03-07, 11:03:21, 13:03:37, ROSA, DIAZ, (416) 253-2322, 50, 143026, HOTEL NOCHE AXUL, 941, 2, 62, 3 , DETALLES DE LA LLAMADA, la unidad se encontraba fuera de servicio, 0, 0, 0, FALSE, FALSE, 0, 0, AVENIDA, CALLE, VEREDA, EDIFICIO, CASA, LOCAL, 23302896, 23302896, 0, 0, 8 	2024-03-07 12:03:16
689	23302896	Cierre Solicitudes	solicitudes	Insertar	\N	13:03:24, 2024-03-07, 13:03:24, 13:03:18, LAURA, RIVAS, (412) 452-1210, 57, 143483, , 964, 0, 62, 8 , DETALLES DE LA LLAMADA DE SOLICITUD, sin unidades disponibles, 0, 0, 0, FALSE, TRUE, 0, 0, AVENIDA, CALLE, VEREDA, EDIFICIO, CASA, LOCAL, 23302896, 23302896, 0, 0, 3 	2024-03-07 13:03:30
690	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	13:03:50, 2024-3-7, 13:03:50, 13:03:50, , , (412) 256-3222, 0 , 0, , 893, , 62, 6 , , , , , , 0, 0, , , , , 23302896, , , 	2024-03-07 13:03:17
691	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 07/03/2024 | 14:45:02 	2024-03-07 14:45:02
692	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	14:03:32, 2024-3-7, 14:03:32, 14:03:32, Diana, Cadenas, (424) 857-5656, 57 , 142828, edificio seniat, 893, , 62, 5 , Detalles de la llamada, proparacion del fuego.., , , , , 0, 0, , , direccińo del evento, Avenida, Clle, Vereda, Edificio, Casa, Local, , 23302896, , , 	2024-03-07 14:03:44
693	23302896	Cierre Solicitudes	solicitudes	Insertar	\N	14:03:32, 2024-03-07, 14:03:32, 14:03:07, DIANA, CADENAS, (424) 857-5656, 57, 142828, EDIFICIO SENIAT, 933, 0, 62, 1 , DETALLES DE LA LLAMADA, PROPARACION DEL FUEGO.., procedimiento realizado por la unidad en la calle, 0, 0, 0, FALSE, FALSE, 1, 1, DIRECCIńO DEL EVENTO, AVENIDA, CLLE, VEREDA, EDIFICIO, CASA, LOCAL, 23302896, 23302896, 2, 1, 1 	2024-03-07 14:03:44
694	23302896	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	2, 1, 1, 0, 2, 1, 1, 9, 55 , 62	2024-03-07 15:03:57
695	23302896	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	29, 1	2024-03-07 15:03:01
696	23302896	Cierre de guardia	guardias	Insertar	\N	4, Se Procede a realizar el cierre de guardia con la novedad que se ha modificado y actualizado el formulario de solicitudes, y correciones en formulario de estadisticas para el cierre de guardia.\r\nquedando pendiente corregir los diagramas en forma de torta, el menu "Consulta 911" y Ventana emergente para la selección de motivos en el registro de nuevas solicitudes	2024-03-07 15:03:32
697	23302896	CIERRE DE SESSION	USUARIO	VALIDAR	\N	18, KJerez896, 2, 1, 23302896, 07/03/2024 | 15:18:33 	2024-03-07 15:18:33
698	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 12/03/2024 | 15:51:23 	2024-03-12 15:51:23
699	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 17340596 , 18966872 , 29520477 , , , , 8042991 , , , 18310118 , , , , , , 4	2024-03-12 14:03:53
700	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	30, 1	2024-03-12 14:03:56
701	23302896	Apertura de guardia	guardias	Insertar	\N	4, se procede a realizar apertura de guardia para modificar el funcionamiento de las estadisticas	2024-03-12 14:03:37
702	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	14:03:36, 2024-3-12, 14:03:36, 14:03:36, , , (424) 756-8965, 0, 00, , 893, , 64, 6 , , , , , , 1, 1, , , , , 23302896, , , 	2024-03-12 14:03:04
703	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	14:03:07, 2024-3-12, 14:03:07, 14:03:07, , , (416) 552-4554, 0 , 00, , 893, , 64, 6 , , , , , , 1, 1, , , , , 23302896, , , 	2024-03-12 14:03:28
704	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	14:03:55, 2024-3-12, 14:03:55, 14:03:55, carlos, parra, (416) 582-5633, 121 , 142467, , 893, , 64, 5 , solicitud de uso de canal trolebus con sentido ejido merida, con dirección al hospital universitario, , , , , 0, 0, , , ejido, merida, , 23302896, , , 	2024-03-12 14:03:52
705	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 14/03/2024 | 11:39:26 	2024-03-14 11:39:26
706	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , , 20197663 , 29520477 , , , , , , , , , , , , , , 4	2024-03-14 10:03:45
707	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	31, 1	2024-03-14 10:03:48
708	23302896	Apertura de guardia	guardias	Insertar	\N	4, realizamos apertura de guardia, para revisar y modificar grafica de estadisticas\r\n	2024-03-14 10:03:13
709	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	10:03:23, 2024-3-14, 10:03:23, 10:03:23, , , (412) 025-6363, 0, 00, , 893, , 65, 6 , , , , , , 1, 1, , , , , 23302896, , , 	2024-03-14 10:03:38
710	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	10:03:40, 2024-3-14, 10:03:40, 10:03:40, maria, sosa, (412) 253-2322, 35 , 142934, acuario, 893, , 65, 5 , alta velocidad, a pie, , , , , 0, 0, , , avenida andres bello, , 23302896, , , 	2024-03-14 10:03:58
711	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	10:03:01, 2024-3-14, 10:03:01, 10:03:01, Carmen, maria, (426) 541-5210, 53 , 142956, ferreteria Pedro Marmol, 893, , 65, 7 , bote de agus, , , , , 0, 0, , , calle los palitos, , 23302896, , , 	2024-03-14 10:03:11
712	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 14/03/2024 | 13:25:19 	2024-03-14 13:25:19
713	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 14/03/2024 | 15:52:05 	2024-03-14 15:52:05
714	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	15:03:34, 2024-3-14, 15:03:34, 15:03:34, , , (416) 252-5252, 0 , 00, , 893, , 65, 6 , , , , , , 0, 0, , , , , 23302896, , , 	2024-03-14 15:03:00
715	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 19/03/2024 | 12:00:18 	2024-03-19 12:00:18
716	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , , 20197663 , 26052701 , , , , , , , , , , , 20435049 , , , 4	2024-03-19 11:03:43
717	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	32, 1	2024-03-19 11:03:46
718	23302896	Apertura de guardia	guardias	Insertar	\N	4, Se procede a realizar modificaciones y actualización de diagrama de torta, 	2024-03-19 11:03:14
719	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	11:03:09, 2024-3-19, 11:03:09, 11:03:09, , , (416) 589-6263, 0, 00, , 893, , 66, 6 , , , , , , 1, 1, , , , , 23302896, , , 	2024-03-19 11:03:22
720	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	11:03:24, 2024-3-19, 11:03:24, 11:03:24, Carmen, Flores, (416) 256-3620, 57 , 142508, los pinos, 893, , 66, 5 , detalles, , , , , 0, 0, , , direccion, , 23302896, , , 	2024-03-19 11:03:04
721	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	11:03:06, 2024-3-19, 11:03:06, 11:03:06, , , (416) 582-2022, 0 , 00, , 893, , 66, 6 , , , , , , 1, 1, , , , , 23302896, , , 	2024-03-19 11:03:32
722	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	11:03:36, 2024-3-19, 11:03:36, 11:03:36, maria, rangel, (424) 521-4544, 12 , 00, , 893, , 66, 7 , detalles solicitando la hora, , , , , 0, 0, , , direccion, , 23302896, , , 	2024-03-19 11:03:39
723	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 22/03/2024 | 09:27:58 	2024-03-22 09:27:58
724	23302896	Observaciones al personal	personal_guardias	Insertar	\N	llamo notificando que hoy transporte, llega tarde, 7 , 18308368 	2024-03-22 08:03:18
725	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 15620802 , 17340596 , , , , , 8042991 , , , , , , , , , 4	2024-03-22 08:03:47
726	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	33, 1	2024-03-22 08:03:00
727	23302896	Apertura de guardia	guardias	Insertar	\N	4, se apertura la guardia, con piso limpio los baños sucios sin agua	2024-03-22 08:03:26
728	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	08:03:54, 2024-3-22, 08:03:54, 08:03:54, Luis, Salas, (424) 512-1200, 10 , 142633, Cancha Techada, 893, , 67, 5 , detalles, , , , , 0, 0, , , direccion, , 23302896, , , 	2024-03-22 08:03:06
729	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 26/03/2024 | 14:43:43 	2024-03-26 14:43:43
730	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 29794276 , , , , , , 8042991 , , , 18310118 , , , , , , 4	2024-03-26 13:03:14
731	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	34, 1	2024-03-26 13:03:17
732	23302896	Apertura de guardia	guardias	Insertar	\N	4, Apertura de guardia	2024-03-26 13:03:25
733	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	13:03:33, 2024-3-26, 13:03:33, 13:03:33, , , (242) 452-8520, 0, 00, , 893, , 68, 6 , , , , , , 1, 1, , , , , 23302896, , , 	2024-03-26 13:03:46
734	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	13:03:49, 2024-3-26, 13:03:49, 13:03:49, Carlos, Mejias, (424) 512-1210, 46 , 142530, LA Curva, 893, , 68, 7 , detalles, , , , , 0, 0, , , direccion, , 23302896, , , 	2024-03-26 13:03:16
735	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	13:03:19, 2024-3-26, 13:03:19, 13:03:19, Maria, Sanchez, (416) 251-2121, 0, 00, , 893, , 68, 7 , solicitud de información del estado Climatico, , , , , 0, 0, , , , , 23302896, , , 	2024-03-26 13:03:10
736	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	13:03:13, 2024-3-26, 13:03:13, 13:03:13, Xiomara, Diaz, (424) 753-8965, 122 , 142779, la cancha, 893, , 68, 5 , Detalles, , , , , 0, 0, , , Direccion, , 23302896, , , 	2024-03-26 13:03:07
737	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	13:03:31, 2024-3-26, 13:03:31, 13:03:31, , , (416) 231-5899, 0 , 00, , 893, , 68, 6 , , , , , , 1, 1, , , , , 23302896, , , 	2024-03-26 13:03:49
738	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 26/03/2024 | 16:34:17 	2024-03-26 16:34:17
739	23302896	Cierre Solicitudes	solicitudes	Insertar	\N	13:03:13, 2024-03-26, 13:03:13, 15:03:34, XIOMARA, DIAZ, (424) 753-8965, 122, 142779, LA CANCHA, 931, 2, 68, 1 , DETALLES, procedimeinto de los funcionarios, 0, 0, 0, FALSE, FALSE, 0, 0, DIRECCION, 23302896, 23302896, 0, 0, 6 	2024-03-26 13:03:07
740	23302896	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 0, 0, 0, 2, 2, 0, 5, 78 , 68	2024-03-26 15:03:21
741	23302896	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	34, 1	2024-03-26 15:03:23
742	23302896	Cierre de guardia	guardias	Insertar	\N	4, Se Procede a Realizar el cierre de guardia con la estadisticas en forma de dona funcionando, quedando pendiente agregar la estadisticas en barra	2024-03-26 15:03:26
743	23302896	CIERRE DE SESSION	USUARIO	VALIDAR	\N	18, KJerez896, 2, 1, 23302896, 26/03/2024 | 16:59:28 	2024-03-26 16:59:28
744	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 30/03/2024 | 14:05:20 	2024-03-30 14:05:20
745	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , , 20197663 , , , , , , 8042991 , , , , , , 20435049 , , , 4	2024-03-30 13:03:55
746	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	35, 1	2024-03-30 13:03:00
747	23302896	Apertura de guardia	guardias	Insertar	\N	4, apertura de guardia	2024-03-30 13:03:08
748	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	13:03:21, 2024-3-30, 13:03:21, 13:03:21, , , (424) 512-0101, 0, 00, , 893, , 70, 6 , , , , , , 1, 1, , , , , 23302896, , , 	2024-03-30 13:03:36
749	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	13:03:41, 2024-3-30, 13:03:41, 13:03:41, Carlos, Perez, (424) 125-1411, 81 , 142530, la cancha, 893, , 70, 5 , detalles, , , , , 0, 0, , , direccion, , 23302896, , , 	2024-03-30 13:03:36
750	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	13:03:39, 2024-3-30, 13:03:39, 13:03:39, JOSE , MORA, (412) 525-3200, 0 , 00, , 893, , 70, 7 , INFORMACION, , , , , 0, 0, , , , , 23302896, , , 	2024-03-30 13:03:21
751	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	13:03:23, 2024-3-30, 13:03:23, 13:03:23, mARIAELA, CORRADO, (412) 525-2222, 46 , 142835, AVENIDA DON TULIO FEBRES, 893, , 70, 7 , INFORMACION, , , , , 0, 0, , , , , 23302896, , , 	2024-03-30 13:03:18
752	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 30/03/2024 | 15:14:54 	2024-03-30 15:14:54
753	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	14:03:51, 2024-3-30, 14:03:51, 14:03:51, Luis, Moreno, (416) 452-1210, 0 , 142029, , 893, , 70, 7 , , , , , , 0, 0, , , , , 23302896, , , 	2024-03-30 14:03:22
754	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	15:03:33, 2024-3-30, 15:03:33, 15:03:33, , , (424) 589-6523, 0, 00, , 893, , 70, 6 , , , , , , 1, 1, , , , , 23302896, , , 	2024-03-30 15:03:50
755	23302896	Cierre Solicitudes	solicitudes	Insertar	\N	13:03:41, 2024-03-30, 13:03:41, 15:03:23, CARLOS, PEREZ, (424) 125-1411, 81, 142530, LA CANCHA, 917, 2, 70, 1 , DETALLES, comision en el sitio poda y despeje de la via, 0, 0, 0, FALSE, FALSE, 1, 1, DIRECCION, 23302896, 23302896, 1, 2, 1 	2024-03-30 13:03:36
756	23302896	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 0, 0, 0, 2, 3, 0, 6, 81 , 70	2024-03-30 15:03:02
757	23302896	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	35, 1	2024-03-30 15:03:05
758	23302896	Cierre de guardia	guardias	Insertar	\N	4, Se Procede al cierre de guardia logrando dejar la grafica tipo dona con porcentaje funcional	2024-03-30 15:03:48
759	23302896	CIERRE DE SESSION	USUARIO	VALIDAR	\N	18, KJerez896, 2, 1, 23302896, 30/03/2024 | 16:11:50 	2024-03-30 16:11:50
760	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 09/04/2024 | 13:34:39 	2024-04-09 13:34:39
761	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , , 15040226 , , , , , , , , , , , , 18123089 , , , 4	2024-04-09 12:04:02
762	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	36, 1	2024-04-09 12:04:06
763	23302896	Apertura de guardia	guardias	Insertar	\N	4, apertura de guardia a nivel supervisores\r\n	2024-04-09 12:04:22
764	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	12:04:26, 2024-4-9, 12:04:26, 12:04:26, , , (424) 458-1251, 0, 00, , 893, , 72, 6 , , , , , , 1, 1, , , , , 23302896, , , 	2024-04-09 12:04:40
765	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	12:04:42, 2024-4-9, 12:04:42, 12:04:42, carlos, mesa, (416) 525-4588, 121 , 142439, , 893, , 72, 5 , traslado en ambulacia, , , , , 0, 0, , , desde avenida centenario hasta avenida 16 de septiembre, , 23302896, , , 	2024-04-09 12:04:06
766	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	12:04:11, 2024-4-9, 12:04:11, 12:04:11, maria, Flores, (416) 256-2536, 65 , 143476, , 893, , 72, 7 , solicita informacion del estado de las vias a nivel de los tuneles en la variante chiguara, , , , , 0, 0, , , , , 23302896, , , 	2024-04-09 12:04:11
767	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	12:04:14, 2024-4-9, 12:04:14, 12:04:14, zuleima, marquina, (424) 785-1245, 48 , 143090, frente al MacDonald, 893, , 72, 5 , se encuentran urgando los depositos de basura, , , , , 0, 0, , , avenida 8 cerca de la plaza las heroinas, , 23302896, , , 	2024-04-09 12:04:42
768	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	12:04:45, 2024-4-9, 12:04:45, 12:04:45, daniela, alvarez, (412) 525-0000, 0 , 00, , 893, , 72, 7 , la persona llama para solicitar información del estado del clima, , , , , 0, 0, , , , , 23302896, , , 	2024-04-09 12:04:37
769	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 11/04/2024 | 13:03:03 	2024-04-11 13:03:03
770	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 11/04/2024 | 13:03:59 	2024-04-11 13:03:59
771	16908218	Inicio de Session	Usuario	VALIDAR	\N	19, JSanchez218, 2, \n\t\t\t1, 16908218, 11/04/2024 | 13:05:25 	2024-04-11 13:05:25
772	16908218	Personal de Guardia	personal_grupos_guardias	Insertar	\N	16908218 , 23302896 , 26931489 , , , , , , 8042991 , , , 12356337 , , , 18123089 , , , 4	2024-04-11 12:04:55
773	16908218	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	37, 1	2024-04-11 12:04:58
774	16908218	Apertura de guardia	guardias	Insertar	\N	4, Apertura de guardia	2024-04-11 12:04:07
775	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 11/04/2024 | 13:06:32 	2024-04-11 13:06:32
776	16908218	Inicio de Session	Usuario	VALIDAR	\N	19, JSanchez218, 2, \n\t\t\t1, 16908218, 11/04/2024 | 13:07:11 	2024-04-11 13:07:11
777	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 11/04/2024 | 13:07:44 	2024-04-11 13:07:44
778	16908218	Inicio de Session	Usuario	VALIDAR	\N	19, JSanchez218, 2, \n\t\t\t1, 16908218, 11/04/2024 | 13:53:56 	2024-04-11 13:53:56
779	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 13:55:19 	2024-04-11 13:55:19
780	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 13:57:29 	2024-04-11 13:57:29
781	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 13:57:43 	2024-04-11 13:57:43
813	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 14:20:06 	2024-04-11 14:20:06
814	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 14:21:54 	2024-04-11 14:21:54
815		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	37, 2, 3, 4	2024-04-11 13:04:03
816	12356337	Apertura de guardia	guardias	Insertar	\N	4, Realizamos apertura de guardia a nivel de despacho de Bomberos	2024-04-11 13:04:24
817	22657819	Inicio de Session	Usuario	VALIDAR	\N	30, LPena819, 3, \n\t\t\t1, 22657819, 11/04/2024 | 14:24:57 	2024-04-11 14:24:57
818	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 14:26:09 	2024-04-11 14:26:09
819	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 14:29:40 	2024-04-11 14:29:40
820	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 14:31:40 	2024-04-11 14:31:40
821	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 14:32:59 	2024-04-11 14:32:59
822		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	37, 2, 3, 4	2024-04-11 13:04:03
823	12356337	Apertura de guardia	guardias	Insertar	\N	4, 2da apertura de guardia	2024-04-11 13:04:12
824	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 14:33:28 	2024-04-11 14:33:28
825	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 14:34:34 	2024-04-11 14:34:34
826	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 14:35:29 	2024-04-11 14:35:29
827	11954012	Inicio de Session	Usuario	VALIDAR	\N	40, JSanchez012, 3, \n\t\t\t1, 11954012, 11/04/2024 | 14:37:47 	2024-04-11 14:37:47
828	11954012	Inicio de Session	Usuario	VALIDAR	\N	40, JSanchez012, 3, \n\t\t\t1, 11954012, 11/04/2024 | 14:40:04 	2024-04-11 14:40:04
829	11954012	Inicio de Session	Usuario	VALIDAR	\N	40, JSanchez012, 3, \n\t\t\t1, 11954012, 11/04/2024 | 14:40:20 	2024-04-11 14:40:20
830	11954012	Inicio de Session	Usuario	VALIDAR	\N	40, JSanchez012, 3, \n\t\t\t1, 11954012, 11/04/2024 | 15:03:59 	2024-04-11 15:03:59
831	11954012	Inicio de Session	Usuario	VALIDAR	\N	40, JSanchez012, 3, \n\t\t\t1, 11954012, 11/04/2024 | 15:04:23 	2024-04-11 15:04:23
832	11954012	Inicio de Session	Usuario	VALIDAR	\N	40, JSanchez012, 3, \n\t\t\t1, 11954012, 11/04/2024 | 15:09:10 	2024-04-11 15:09:10
833	11954012	Inicio de Session	Usuario	VALIDAR	\N	40, JSanchez012, 3, \n\t\t\t1, 11954012, 11/04/2024 | 15:10:39 	2024-04-11 15:10:39
834	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 15:12:23 	2024-04-11 15:12:23
835	18123089	Inicio de Session	Usuario	VALIDAR	\N	20, LMorales089, 3, \n\t\t\t1, 18123089, 11/04/2024 | 15:14:32 	2024-04-11 15:14:32
836	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 15:17:29 	2024-04-11 15:17:29
837	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 15:19:28 	2024-04-11 15:19:28
838	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 15:19:56 	2024-04-11 15:19:56
839	18123089	Inicio de Session	Usuario	VALIDAR	\N	20, LMorales089, 3, \n\t\t\t1, 18123089, 11/04/2024 | 15:20:56 	2024-04-11 15:20:56
840	18123089	Inicio de Session	Usuario	VALIDAR	\N	20, LMorales089, 3, \n\t\t\t1, 18123089, 11/04/2024 | 15:22:58 	2024-04-11 15:22:58
841	18123089	Inicio de Session	Usuario	VALIDAR	\N	20, LMorales089, 3, \n\t\t\t1, 18123089, 11/04/2024 | 15:24:05 	2024-04-11 15:24:05
842	18123089	Inicio de Session	Usuario	VALIDAR	\N	20, LMorales089, 3, \n\t\t\t1, 18123089, 11/04/2024 | 15:27:30 	2024-04-11 15:27:30
843	18123089	Inicio de Session	Usuario	VALIDAR	\N	20, LMorales089, 3, \n\t\t\t1, 18123089, 11/04/2024 | 15:32:13 	2024-04-11 15:32:13
844	18123089	Inicio de Session	Usuario	VALIDAR	\N	20, LMorales089, 3, \n\t\t\t1, 18123089, 11/04/2024 | 15:32:50 	2024-04-11 15:32:50
845	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 11/04/2024 | 15:33:18 	2024-04-11 15:33:18
846	18123089	Inicio de Session	Usuario	VALIDAR	\N	20, LMorales089, 3, \n\t\t\t1, 18123089, 11/04/2024 | 15:33:43 	2024-04-11 15:33:43
847	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 11/04/2024 | 16:16:09 	2024-04-11 16:16:09
848	19995073	Inicio de Session	Usuario	VALIDAR	\N	39, ACuevas073, 4, \n\t\t\t1, 19995073, 11/04/2024 | 16:17:46 	2024-04-11 16:17:46
849	19995073	Inicio de Session	Usuario	VALIDAR	\N	39, ACuevas073, 4, \n\t\t\t1, 19995073, 11/04/2024 | 16:17:54 	2024-04-11 16:17:54
850	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 11/04/2024 | 16:18:15 	2024-04-11 16:18:15
851		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	37, 5, 6	2024-04-11 15:04:19
852	26931489	Nuevas Solicitudes	solicitudes	Insertar	\N	15:04:23, 2024-4-11, 15:04:23, , , (412) 452-1212, 0, 0 , 0, , 893, 4, 6 , , 26931489	2024-04-11 15:04:56
853	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 11/04/2024 | 16:19:07 	2024-04-11 16:19:07
854	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 11/04/2024 | 16:19:12 	2024-04-11 16:19:12
855	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 11/04/2024 | 16:19:22 	2024-04-11 16:19:22
856	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 11/04/2024 | 16:19:37 	2024-04-11 16:19:37
857	26931489	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	37, 5, 6	2024-04-11 15:04:28
858		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 11/04/2024 | 16:20:29 	2024-04-11 16:20:29
859	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 11/04/2024 | 16:20:34 	2024-04-11 16:20:34
860	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 11/04/2024 | 16:20:49 	2024-04-11 16:20:49
861	26931489	Inicio de Session	Usuario	VALIDAR	\N	34, ABesembel489, 4, \n\t\t\t1, 26931489, 11/04/2024 | 16:22:49 	2024-04-11 16:22:49
862	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 16/04/2024 | 12:41:53 	2024-04-16 12:41:53
863	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	12:04:03, 2024-4-16, 12:04:03, 12:04:03, Jose, Flores, (424) 154-8522, 57 , 142609, el caucho, 893, , 4, 5 , detalles del evento, , , , , 0, 0, , , dirección del evento, , 23302896, , , 	2024-04-16 12:04:00
864	18123089	Inicio de Session	Usuario	VALIDAR	\N	20, LMorales089, 3, \n\t\t\t1, 18123089, 16/04/2024 | 13:07:23 	2024-04-16 13:07:23
865		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	37, 2, 3, 4	2024-04-16 12:04:27
866	18123089	Apertura de guardia	guardias	Insertar	\N	4, Apertura de guardia con usuario PC Luis Morales	2024-04-16 12:04:45
867	23302896	Nuevas Solicitudes	solicitudes	Insertar	\N	12:04:10, 2024-4-16, 12:04:10, 12:04:10, Carlos, Mesa, (412) 452-5252, 57 , 142475, LA Curva, 893, , 4, 5 , detalles, , , , , 0, 0, , , direccion, , 23302896, , , 	2024-04-16 12:04:09
900	21183518	Inicio de Session	Usuario	VALIDAR	\N	37, JBravo518, 2, \n\t\t\t1, 21183518, 16/04/2024 | 13:17:25 	2024-04-16 13:17:25
901	21183518	Personal de Guardia	personal_grupos_guardias	Insertar	\N	21183518 , , 18308368 , 18966872 , , , , , 8042991 , , , 12356337 , , , 18123089 , , , 7	2024-04-16 12:04:56
902	21183518	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	38, 1	2024-04-16 12:04:58
903	21183518	Apertura de guardia	guardias	Insertar	\N	7, apertura de guardia	2024-04-16 12:04:06
904	21183518	Nuevas Solicitudes	solicitudes	Insertar	\N	12:04:10, 2024-4-16, 12:04:10, 12:04:10, Carlos, Morales, (424) 582-5454, 1 , 142279, la cancha, 893, , 77, 5 , detalles, , , , , 0, 0, , , direccion, , 21183518, , , 	2024-04-16 12:04:55
905	18123089	Cierre Solicitudes	solicitudes	Insertar	\N	12:04:03, 2024-04-16, 12:04:03, 12:04:04, JOSE, FLORES, (424) 154-8522, 57, 142609, EL CAUCHO, 918, 0, 76, 1 , DETALLES DEL EVENTO, procedimeintos de funcionarios en el sitio, 0, 0, 0, FALSE, FALSE, 1, 1, DIRECCIóN DEL EVENTO, 18123089, 23302896, 2, 1, 3 	2024-04-16 12:04:00
906	18123089	Cierre Solicitudes	solicitudes	Insertar	\N	12:04:10, 2024-04-16, 12:04:10, 12:04:57, CARLOS, MORALES, (424) 582-5454, 1, 142279, LA CANCHA, 901, 0, 76, 1 , DETALLES, procedimientos por funcionarios, 0, 0, 0, FALSE, FALSE, 1, 1, DIRECCION, 18123089, 21183518, 1, 0, 3 	2024-04-16 12:04:55
907	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 18/04/2024 | 10:30:13 	2024-04-18 10:30:13
908	17129573	Personal de Guardia	personal_grupos_guardias	Insertar	\N	17129573 , , 29794276 , 20197663 , 29520477 , , , , 8042991 , , , 16445441 , , , 18123089 , , , 1	2024-04-18 09:04:53
909	17129573	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	39, 1	2024-04-18 09:04:13
910	17129573	Apertura de guardia	guardias	Insertar	\N	1, Apertura de guardia con usuario Nancy Valero	2024-04-18 09:04:30
911	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 18/04/2024 | 12:31:20 	2024-04-18 12:31:20
912	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 18/04/2024 | 15:29:44 	2024-04-18 15:29:44
913	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	15:04:34, 2024-4-18, 15:04:34, 15:04:34, Eduardo, Salas, (412) 525-5255, 7 , 142823, zapateria los tres abuelos, 893, , 78, 5 , detaLLES, , , , , 0, 0, , , direccion, , 17129573, , , 	2024-04-18 15:04:42
914	17129573	Cierre Solicitudes	solicitudes	Insertar	\N	15:04:34, 2024-04-18, 15:04:34, 15:04:46, EDUARDO, SALAS, (412) 525-5255, 7, 142823, ZAPATERIA LOS TRES ABUELOS, 933, 0, 78, 1 , DETALLES, procedimiento del cierre, 0, 0, 0, FALSE, FALSE, 1, 0, DIRECCION, 17129573, 17129573, 2, 0, 2 	2024-04-18 15:04:42
915	17129573	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 0, 0, 0, 0, 0, 0, 1, 127 , 78	2024-04-18 15:04:45
916	17129573	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	39, 1	2024-04-18 15:04:48
1194		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	51, 2, 3, 4	2024-11-01 09:11:40
917	17129573	Cierre de guardia	guardias	Insertar	\N	1, Procedemos a realizar el cierre de guardia con la novedad que realiza consultas a registros para la seccion de Estadisticas del Personal, mostrando las solicitudes registradas.\r\n\r\nquedando pendiente la tabla y graficos estadisticos	2024-04-18 15:04:04
918	17129573	CIERRE DE SESSION	USUARIO	VALIDAR	\N	22, NValero573, 2, 1, 17129573, 18/04/2024 | 16:36:05 	2024-04-18 16:36:05
919	23302896	Inicio de Session	Usuario	VALIDAR	\N	18, KJerez896, 2, \n\t\t\t1, 23302896, 25/04/2024 | 16:47:55 	2024-04-25 16:47:55
920	23302896	Personal de Guardia	personal_grupos_guardias	Insertar	\N	23302896 , 16908218 , 20197663 , 18966872 , 29794276 , , , , 8042991 , , , 16445441 , , , 20435049 , , , 4	2024-04-25 15:04:29
921	23302896	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	40, 1	2024-04-25 15:04:36
922	23302896	Apertura de guardia	guardias	Insertar	\N	4, apertura de guardia\r\n	2024-04-25 15:04:45
923	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 30/04/2024 | 13:08:52 	2024-04-30 13:08:52
924	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 30/04/2024 | 16:10:12 	2024-04-30 16:10:12
925	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 07/05/2024 | 12:07:53 	2024-05-07 12:07:53
926	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 09/05/2024 | 13:51:02 	2024-05-09 13:51:02
927	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 09/05/2024 | 14:41:11 	2024-05-09 14:41:11
928	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 28/05/2024 | 13:10:06 	2024-05-28 13:10:06
929	17129573	Personal de Guardia	personal_grupos_guardias	Insertar	\N	16200660 , , 17340596 , 29520477 , 15040226 , , , , 8042991 , , , 18310118 , 12356337 , , 17842117 , , , 1	2024-05-28 12:05:25
930	17129573	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	41, 1	2024-05-28 12:05:28
931	17129573	Apertura de guardia	guardias	Insertar	\N	1, Realizamos la apertura de guardia correspondiente a hoy martes sin novedad	2024-05-28 12:05:02
932	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	12:05:09, 2024-5-28, 12:05:09, 12:05:09, , , (416) 256-2310, 0 , 00, , 893, , 81, 6 , , , , , , 0, 0, , , , , 17129573, , , 	2024-05-28 12:05:40
933	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	12:05:42, 2024-5-28, 12:05:42, 12:05:42, Samuel, Sulbaran, (416) 256-8565, 0 , 143037, redoma 5 aguilas, 893, , 81, 7 , solicitud de información de las vias al paramo, , , , , 0, 0, , , , , 17129573, , , 	2024-05-28 12:05:22
934	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	12:05:26, 2024-5-28, 12:05:26, 12:05:26, Sebastian, Moreno, (416) 256-8989, 170 , 142863, Restaurant Sancocho el más sabroso, 893, , 81, 5 , botes de aguas negras hacia la via, , , , , 0, 0, , , via el valle, metros arriba de sancocho el mas sabroso, , 17129573, , , 	2024-05-28 12:05:36
935	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	12:05:28, 2024-5-28, 12:05:28, 12:05:28, Manuel, Rojas, (416) 541-4542, 177 , 142528, pasos arriba escuela basica campo elías, 893, , 81, 5 , el vehiculo, esta obstaculizando el paso vehicular hace ya mas de 10 minutos, , , , , 0, 0, , , avenida fernandez peña, bajando hacia la plaza, pasos arriba escuela campo elias, , 17129573, , , 	2024-05-28 12:05:54
936	17129573	Cierre Solicitudes	solicitudes	Insertar	\N	12:05:26, 2024-05-28, 12:05:26, 12:05:30, SEBASTIAN, MORENO, (416) 256-8989, 170, 142863, RESTAURANT SANCOCHO EL MáS SABROSO, 936, 0, 81, 1 , BOTES DE AGUAS NEGRAS HACIA LA VIA, llega comision al sitio solventando derrame de aguas negras, 0, 0, 0, FALSE, FALSE, 0, 1, VIA EL VALLE, METROS ARRIBA DE SANCOCHO EL MAS SABROSO, 17129573, 17129573, 0, 1, 9 	2024-05-28 12:05:36
937	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 10/07/2024 | 11:33:51 	2024-07-10 11:33:51
938	17129573	Personal de Guardia	personal_grupos_guardias	Insertar	\N	17129573 , 14267697 , 18125565 , 17340596 , 20197663 , , , , 8042991 , , , 12356337 , 18310118 , , 20435049 , , , 1	2024-07-10 10:07:34
939	17129573	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	42, 1	2024-07-10 10:07:40
940	17129573	Apertura de guardia	guardias	Insertar	\N	1, se procede con la apertura de guardia	2024-07-10 10:07:17
941	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 10/07/2024 | 11:38:10 	2024-07-10 11:38:10
942		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	42, 5, 6	2024-07-10 10:07:22
943	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	10:38:28, 2024-7-10, 10:38:28, , , (412) 156-2358, 0 , 0 , 00, , 893, 1, 6 , , 17340596	2024-07-10 10:07:49
944	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	10:38:53, 2024-7-10, 10:38:53, Carmen, Moreno, (416) 587-4578, 9 , 122 , 143082, Banco Bicentenario, 893, 1, 5 , calle la unica, entre avenidas 3 y 4, 17340596	2024-07-10 10:07:59
945	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	10:41:01, 2024-7-10, 10:41:01, Andres, Rivas, (424) 785-4578, 9 , 0 , 143476, , 893, 1, 7 , , 17340596	2024-07-10 10:07:09
946	17129573	Cierre Solicitudes	solicitudes	Insertar	\N	10:47:42, 2024-07-10, 10:38:53, 10:47:42, CARMEN, MORENO, (416) 587-4578, 122, 143082, BANCO BICENTENARIO, 943, 00, 82, 1 , ACTIVACION DE ALARMA, comision policial al sitio, 0, 0, 0, FALSE, FALSE, 1, 0, CALLE LA UNICA, ENTRE AVENIDAS 3 Y 4, 17129573, 17340596, 1, 0, 5 	2024-07-10 10:07:59
947	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 10/07/2024 | 13:12:57 	2024-07-10 13:12:57
948	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 10/07/2024 | 14:06:00 	2024-07-10 14:06:00
949	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 10/07/2024 | 14:06:13 	2024-07-10 14:06:13
950	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 10/07/2024 | 14:06:27 	2024-07-10 14:06:27
951	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 10/07/2024 | 14:06:32 	2024-07-10 14:06:32
952	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 10/07/2024 | 14:06:40 	2024-07-10 14:06:40
953	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 10/07/2024 | 14:07:21 	2024-07-10 14:07:21
954	20197663	Inicio de Session	Usuario	VALIDAR	\N	23, DGuillen663, 4, \n\t\t\t1, 20197663, 10/07/2024 | 14:11:37 	2024-07-10 14:11:37
955	20197663	Inicio de Session	Usuario	VALIDAR	\N	23, DGuillen663, 4, \n\t\t\t1, 20197663, 10/07/2024 | 14:11:42 	2024-07-10 14:11:42
956	20197663	Inicio de Session	Usuario	VALIDAR	\N	23, DGuillen663, 4, \n\t\t\t1, 20197663, 10/07/2024 | 14:12:36 	2024-07-10 14:12:36
957		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	42, 5, 6	2024-07-10 13:07:52
958	20197663	Inicio de Session	Usuario	VALIDAR	\N	23, DGuillen663, 4, \n\t\t\t1, 20197663, 10/07/2024 | 14:13:43 	2024-07-10 14:13:43
959	20197663	Inicio de Session	Usuario	VALIDAR	\N	23, DGuillen663, 4, \n\t\t\t1, 20197663, 10/07/2024 | 14:13:48 	2024-07-10 14:13:48
960	20197663	Nuevas Solicitudes	solicitudes	Insertar	\N	13:14:00, 2024-7-10, 13:14:00, , , (412) 235-6898, 0 , 0 , 00, , 893, 1, 6 , , 20197663	2024-07-10 13:07:51
961	20197663	Nuevas Solicitudes	solicitudes	Insertar	\N	13:14:55, 2024-7-10, 13:14:55, carmen, gutierrez, (416) 589-4525, 9 , 0 , 142999, bomba buganvillas, 893, 1, 7 , , 20197663	2024-07-10 13:07:03
962	20197663	Nuevas Solicitudes	solicitudes	Insertar	\N	13:18:25, 2024-7-10, 13:18:25, Mariano, Salas, (416) 258-6987, 6 , 68 , 142999, frente a impradem, 893, 1, 5 , avenida los proceres frente a impradem, 20197663	2024-07-10 13:07:40
963	17129573	Cierre Solicitudes	solicitudes	Insertar	\N	13:24:34, 2024-07-10, 13:18:25, 13:24:34, MARIANO, SALAS, (416) 258-6987, 68, 142999, FRENTE A IMPRADEM, 940, 00, 82, 1 , COLISIóN VEHICULAR DE CAMION Y VEHICULOS 80 MUERTOS, procedimiento de solicitud en el lugar, 80, 0, 0, FALSE, FALSE, 1, 1, AVENIDA LOS PROCERES FRENTE A IMPRADEM, 17129573, 20197663, 2, 3, 8 	2024-07-10 13:07:40
964	20197663	Inicio de Session	Usuario	VALIDAR	\N	23, DGuillen663, 4, \n\t\t\t1, 20197663, 10/07/2024 | 15:31:34 	2024-07-10 15:31:34
965	20197663	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	42, 5, 6	2024-07-10 14:07:52
966	20197663	CIERRE DE SESSION	USUARIO	VALIDAR	\N	23, DGuillen663, 4, 1, 20197663, 10/07/2024 | 15:31:53 	2024-07-10 15:31:53
967	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 10/07/2024 | 16:42:03 	2024-07-10 16:42:03
968	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 06/08/2024 | 11:10:51 	2024-08-06 11:10:51
969	17129573	Personal de Guardia	personal_grupos_guardias	Insertar	\N	17129573 , , 18125565 , 17340596 , 27433433 , , , , 8042991 , , , 18310118 , 12356337 , , 20435049 , , , 1	2024-08-06 10:08:03
970	17129573	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	43, 1	2024-08-06 10:08:27
971	17129573	Apertura de guardia	guardias	Insertar	\N	1, apertura de guardia, con motivo a consultas de despachadores	2024-08-06 10:08:53
972	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 06/08/2024 | 11:16:57 	2024-08-06 11:16:57
973	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	10:18:33, 2024-8-6, 10:18:33, , , (424) 158-7845, 0 , 0 , 00, , 893, 1, 6 , , 17340596	2024-08-06 10:08:55
974	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 06/08/2024 | 12:33:25 	2024-08-06 12:33:25
975	17340596	Observaciones de Guardia	observaciones	Insertar	\N	Motivado a los requerimientos de consultas de registros de datos por parte de los operadores, se procede a realizar la edicion de codigos y formulario, para constatar que la consulta se realiza de manera correcta. , , , , 83, 4	2024-08-06 11:08:25
976	17340596	Observaciones de Guardia	observaciones	Insertar	\N	así mismo de realiza un cambio en el formulario de registro de observaciones, motivado a que los operadores no realizan apertura de guardia y este no tiene registros en tablas. por tanto se deja que traiga el ultimo registro realizado por supervision o despacho, , , , 83, 4	2024-08-06 11:08:43
977	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	11:51:22, 2024-8-6, 11:51:22, Carmen, Mendoza, (416) 258-6589, 0 , 0 , 00, , 893, 1, 7 , , 17340596	2024-08-06 11:08:42
978	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	11:52:47, 2024-8-6, 11:52:47, daniel, vivas, (426) 758-7576, 3 , 65 , 142809, la casa de los pastelitos, 893, 1, 5 , via el valle de la culata, 17340596	2024-08-06 11:08:23
979	17129573	Cierre Solicitudes	solicitudes	Insertar	\N	00:37:16, 2024-08-06, 11:52:47, 13:08:18, DANIEL, VIVAS, (426) 758-7576, 65, 142809, LA CASA DE LOS PASTELITOS, 932, 01, 83, 1 , LA PERSONA INDICA QUE HAY DESPLAZAMIENTO DE ESPECIES ARBóREAS EN LA VíA, comisión en el sitio, eliminando obstáculos en la via, 0, 0, 0, FALSE, FALSE, 1, 1, VIA EL VALLE DE LA CULATA, 17129573, 17340596, 2, 1, 3 	2024-08-06 11:08:23
980	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 06/08/2024 | 15:24:05 	2024-08-06 15:24:05
981	17129573	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 0, 0, 0, 1, 1, 0, 3, 140 , 83	2024-08-06 15:08:02
982	17129573	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	43, 1	2024-08-06 15:08:05
983	17129573	Cierre de guardia	guardias	Insertar	\N	1, procedemos al cierre de guardia	2024-08-06 15:08:15
984	17129573	CIERRE DE SESSION	USUARIO	VALIDAR	\N	22, NValero573, 2, 1, 17129573, 06/08/2024 | 16:34:16 	2024-08-06 16:34:16
985	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 08/08/2024 | 10:40:40 	2024-08-08 10:40:40
986	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 08/08/2024 | 16:23:47 	2024-08-08 16:23:47
987	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 08/08/2024 | 16:27:29 	2024-08-08 16:27:29
988	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 13/08/2024 | 10:12:17 	2024-08-13 10:12:17
989	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 13/08/2024 | 10:29:57 	2024-08-13 10:29:57
990	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 13/08/2024 | 10:59:36 	2024-08-13 10:59:36
991	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	09:59:41, 2024-8-13, 09:59:41, , , (416) 258-4578, 0, 0 , 00, , 893, 1, 6 , , 17340596	2024-08-13 10:08:04
992	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	10:00:07, 2024-8-13, 10:00:07, Sara, Mendoza, (414) 785-4512, 6 , 132 , 142839, Parque de los Poetas, 893, 1, 5 , , 17340596	2024-08-13 10:08:38
993	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	10:01:55, 2024-8-13, 10:01:55, , , (426) 563-5689, 0, 0, 00, , 893, 1, 6 , , 17340596	2024-08-13 10:08:24
994	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	10:02:26, 2024-8-13, 10:02:26, Andres, Perez, (426) 785-4598, 7 , 170 , 142793, Materiales de Construccion El Amigo, 893, 1, 5 , Avenida Los Proceres, metros abajo del semaforo de la casa blanca, 17340596	2024-08-13 10:08:05
995	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 13/08/2024 | 13:14:23 	2024-08-13 13:14:23
996	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 13/08/2024 | 14:30:23 	2024-08-13 14:30:23
997	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	13:42:22, 2024-8-13, 13:42:22, Laura, CArvajal, (424) 785-4578, 9 , 44 , 142955, La Casa Blanca, , 1, 7 , Avenida Los Proceres,, 17340596	2024-08-13 13:08:49
998	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	13:46:46, 2024-8-13, 13:46:46, , , (426) 589-5622, 0, 0 , 00, , 893, 1, 6 , , 17340596	2024-08-13 13:08:26
999	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	13:51:47, 2024-8-13, 13:51:47, Jose, Paredes, (414) 758-4110, 9 , 0 , 142989, ES El Terminal, 893, 1, 7 , Avenida Los Proceres, 17340596	2024-08-13 13:08:04
1000	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 13/08/2024 | 14:58:49 	2024-08-13 14:58:49
1001	17340596	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	43, 5, 6	2024-08-13 14:08:20
1002		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 13/08/2024 | 15:06:21 	2024-08-13 15:06:21
1003	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 13/08/2024 | 15:06:36 	2024-08-13 15:06:36
1004	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 13/08/2024 | 15:58:30 	2024-08-13 15:58:30
1005	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 13/08/2024 | 15:59:53 	2024-08-13 15:59:53
1006	17129573	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 0, 0, 0, 4, 3, 0, 10, 140 , 83	2024-08-13 15:08:02
1007	17129573	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	43, 1	2024-08-13 15:08:05
1008	17129573	Cierre de guardia	guardias	Insertar	\N	1, Realizamos el cierre de guardia	2024-08-13 15:08:17
1009		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 13/08/2024 | 16:30:19 	2024-08-13 16:30:19
1010	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 15/08/2024 | 11:51:23 	2024-08-15 11:51:23
1011	20200220	Personal de Guardia	personal_grupos_guardias	Insertar	\N	20200220 , , 15040226 , 26931489 , 21182738 , , , , 8042991 , , , 18310118 , 12356337 , , 17842117 , 15621210 , , 5	2024-08-15 10:08:12
1012	20200220	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	44, 1	2024-08-15 10:08:16
1013	20200220	Apertura de guardia	guardias	Insertar	\N	5, se realiza apertura de guardia sin novedad alguna	2024-08-15 10:08:34
1014	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 15/08/2024 | 11:53:14 	2024-08-15 11:53:14
1015	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 27/08/2024 | 06:56:56 	2024-08-27 06:56:56
1016	20200220	Personal de Guardia	personal_grupos_guardias	Insertar	\N	20200220 , 11913073 , 20197663 , 17340596 , 15040226 , , , , 8042991 , , , 18310118 , 12356337 , , 20435049 , 17842117 , , 5	2024-08-27 05:08:51
1017	20200220	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	45, 1	2024-08-27 05:08:55
1018	20200220	Apertura de guardia	guardias	Insertar	\N	5, Se Procede a la apertura de guardia 	2024-08-27 06:08:17
1019	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 27/08/2024 | 11:02:23 	2024-08-27 11:02:23
1020	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 27/08/2024 | 11:04:54 	2024-08-27 11:04:54
1021	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	10:28:39, 2024-8-27, 10:28:39, , , (426) 525-2656, 0, 0 , 00, , 893, 5, 6 , , 17340596	2024-08-27 10:08:17
1022	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	10:30:37, 2024-8-27, 10:30:37, , , (414) 785-4578, 0, 0 , 00, , 893, 5, 6 , , 17340596	2024-08-27 10:08:34
1023	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	10:31:37, 2024-8-27, 10:31:37, Blanca , Coronado, (416) 458-7898, 9 , 0 , 00, , 893, 5, 7 , , 17340596	2024-08-27 10:08:12
1024	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	10:37:24, 2024-8-27, 10:37:24, Carmen, Moncada, (424) 587-4542, 3 , 189 , 142359, Licoreria del martes, 893, 5, 5 , Avenida 2 con calle 3, 17340596	2024-08-27 10:08:17
1025	17340596	Observaciones de Guardia	observaciones	Insertar	\N	se notifica que hemos recibido agua y cafe, , , , 87, 4	2024-08-27 10:08:46
1026	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 27/08/2024 | 12:17:12 	2024-08-27 12:17:12
1027	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 27/08/2024 | 15:55:18 	2024-08-27 15:55:18
1028	17340596	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	45, 5, 6	2024-08-27 14:08:16
1029		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 27/08/2024 | 15:56:18 	2024-08-27 15:56:18
1030	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 03/09/2024 | 10:59:03 	2024-09-03 10:59:03
1031	17340596	Observaciones de Guardia	observaciones	Insertar	\N	Realizando pruebas de registros\r\n\r\ncon saltos de lineas\r\n\r\n* Viñetas\r\n* o sin viñetas\r\nsin viñetas, , , , 87, 4	2024-09-03 09:09:53
1032	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 03/09/2024 | 14:26:36 	2024-09-03 14:26:36
1033	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 05/09/2024 | 13:25:07 	2024-09-05 13:25:07
1034	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 24/09/2024 | 11:57:52 	2024-09-24 11:57:52
1035	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 24/09/2024 | 14:48:50 	2024-09-24 14:48:50
1036	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	13:49:42, 2024-9-24, 13:49:42, , , (416) 256-8956, 0, 123, 00, , 893, 5, 5 , , 17340596	2024-09-24 13:09:58
1037	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 24/09/2024 | 15:39:23 	2024-09-24 15:39:23
1038	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 26/09/2024 | 11:48:06 	2024-09-26 11:48:06
1039	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	12:04:39, 2024-9-26, 12:04:39, , , (412) 258-6956, 0, 0, 00, , 893, 5, 6 , , 17340596	2024-09-26 12:09:58
1040	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	12:05:01, 2024-9-26, 12:05:01, luis, mendez, (424) 587-4512, 9 , 170, 142955, el bloque amarillo, 893, 5, 5 , avenida los proceres, 17340596	2024-09-26 12:09:21
1041	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 26/09/2024 | 15:08:08 	2024-09-26 15:08:08
1042	17340596	Observaciones de Guardia	observaciones	Insertar	\N	reporte de registro, acciones pendientes, agregar botón de protocolo a usuario supervisor y administrador\r\n, , , 87, 4	2024-09-26 14:09:12
1043	17340596	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	45, 5, 6	2024-09-26 14:09:09
1044		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 26/09/2024 | 15:37:12 	2024-09-26 15:37:12
1045	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 26/09/2024 | 16:00:21 	2024-09-26 16:00:21
1046	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 01/10/2024 | 11:42:54 	2024-10-01 11:42:54
1047	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 01/10/2024 | 13:08:18 	2024-10-01 13:08:18
1048	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 03/10/2024 | 16:02:02 	2024-10-03 16:02:02
1049	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 04/10/2024 | 12:16:44 	2024-10-04 12:16:44
1050	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	11:18:14, 2024-10-4, 11:18:14, , , (416) 568-9532, 0, 0, 00, , 893, 5, 6 , , 17340596	2024-10-04 11:10:46
1051	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	11:18:51, 2024-10-4, 11:18:51, Maria, Zambrano, (414) 258-5623, 0, 0, 00, , 893, 5, 7 , , 17340596	2024-10-04 11:10:52
1052	17340596	Observaciones de Guardia	observaciones	Insertar	\N	se encontro en el cubiculo una llaves, , , , 87, 4	2024-10-04 11:10:46
1053	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 04/10/2024 | 12:32:49 	2024-10-04 12:32:49
1054	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 04/10/2024 | 12:41:44 	2024-10-04 12:41:44
1055	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 04/10/2024 | 12:41:44 	2024-10-04 12:41:44
1056	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 04/10/2024 | 12:42:24 	2024-10-04 12:42:24
1195	8042991	Apertura de guardia	guardias	Insertar	\N	5, apertura de guardia	2024-11-01 09:11:50
1057	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 04/10/2024 | 12:42:25 	2024-10-04 12:42:25
1058	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 04/10/2024 | 12:42:42 	2024-10-04 12:42:42
1059	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 04/10/2024 | 12:44:33 	2024-10-04 12:44:33
1060	17129573	Observaciones al personal	personal_guardias	Insertar	\N	requiere realizar consulta odontologica, 3 , 15040226 	2024-10-04 11:10:34
1061	17129573	Personal de Guardia	personal_grupos_guardias	Insertar	\N	17129573 , 16200660 , 27777826 , 29794276 , 26052701 , , , , 8042991 , , , 12356337 , 13499752 , , 20435049 , , , 1	2024-10-04 11:10:06
1062	17129573	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	46, 1	2024-10-04 11:10:13
1063	17129573	Apertura de guardia	guardias	Insertar	\N	1, apertura sin novedad	2024-10-04 11:10:27
1064	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	11:51:43, 2024-10-4, 11:51:43, 11:51:43, , , (416) 256-8956, 0, 00, , 893, , 88, 6 , , , , , , 0, 0, , , , , 17129573, , , 	2024-10-04 11:10:47
1065	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	11:56:52, 2024-10-4, 11:56:52, 11:56:52, , , (416) 589-4512, 0, 00, , 893, , 88, 6 , , , , , , 0, 0, , , , , 17129573, , , 	2024-10-04 11:10:07
1066	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	11:57:10, 2024-10-4, 11:57:10, 11:57:10, carmen, rojas, (414) 478-4512, 76, 143037, empanadas el amor de mama, 893, , 88, 5 , detalles del evento, , , , , 0, 0, , , direccion del evento, , 17129573, , , 	2024-10-04 11:10:41
1067	17129573	Cierre Solicitudes	solicitudes	Insertar	\N	00:04:10, 2024-10-04, 11:57:10, 12:01:24, CARMEN, ROJAS, (414) 478-4512, 76, 143037, EMPANADAS EL AMOR DE MAMA, 941, 00, 88, 1 , DETALLES DEL EVENTO, procedimiento efectuado por funcionarios en el sitio, 0, 0, 0, FALSE, FALSE, 1, 1, DIRECCION DEL EVENTO, 17129573, 17129573, 2, 1, 1 	2024-10-04 11:10:41
1068	17129573	Observaciones de Guardia	observaciones	Insertar	\N	, , observaciones de guardia, , 88, 5	2024-10-04 12:10:49
1069	17129573	Observaciones al personal de guardia	personal_guardias	Insertar	\N	se retira siendo las hora indicada para recibir clases en la universidad, 6 , 17340596 , 88	2024-10-04 12:10:28
1070	17129573	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 0, 0, 0, 3, 1, 0, 5, 159 , 88	2024-10-04 12:10:36
1071	17129573	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 0, 0, 0, 3, 1, 0, 5, 159 , 88	2024-10-04 12:10:36
1072	17129573	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	46, 1	2024-10-04 12:10:42
1073	17129573	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	46, 1	2024-10-04 12:10:42
1074	17129573	Cierre de guardia	guardias	Insertar	\N	1, realizo el cierre de guardia	2024-10-04 12:10:52
1075	17129573	Cierre de guardia	guardias	Insertar	\N	1, realizo el cierre de guardia	2024-10-04 12:10:52
1076	17129573	CIERRE DE SESSION	USUARIO	VALIDAR	\N	22, NValero573, 2, 1, 17129573, 04/10/2024 | 13:17:54 	2024-10-04 13:17:54
1077	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 04/10/2024 | 13:19:01 	2024-10-04 13:19:01
1078	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 08/10/2024 | 11:33:30 	2024-10-08 11:33:30
1079	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 15/10/2024 | 12:34:42 	2024-10-15 12:34:42
1080	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 15/10/2024 | 12:35:39 	2024-10-15 12:35:39
1081	17129573	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 0, 0, 0, 3, 1, 0, 5, 159 , 88	2024-10-15 11:10:46
1082	17129573	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	46, 1	2024-10-15 11:10:53
1083	17129573	Cierre de guardia	guardias	Insertar	\N	1, cierre de guardia	2024-10-15 11:10:01
1084		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 15/10/2024 | 12:37:03 	2024-10-15 12:37:03
1085	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 15/10/2024 | 12:37:12 	2024-10-15 12:37:12
1086	20200220	Personal de Guardia	personal_grupos_guardias	Insertar	\N	20200220 , 11913073 , 18125565 , 17340596 , 15040226 , , , , 8042991 , , , 18310118 , 12356337 , , 20435049 , , , 5	2024-10-15 11:10:26
1087	20200220	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	47, 1	2024-10-15 11:10:28
1088	20200220	Apertura de guardia	guardias	Insertar	\N	5, se procede3 a la apertura de guardia	2024-10-15 11:10:44
1089	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 15/10/2024 | 15:24:21 	2024-10-15 15:24:21
1090	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 15/10/2024 | 15:24:34 	2024-10-15 15:24:34
1091	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	14:31:47, 2024-10-15, 14:31:47, 14:31:47, Gilbert, Gonzalez, (424) 753-7979, 208, 142999, canal de salida a ha avenida las america, 893, , 92, 5 , endidura del suelo asfaltado y huecos , , , , , 1, 1, , , calle el porvenir, , 20200220, , , 	2024-10-15 14:10:17
1092	20200220	Cierre Solicitudes	solicitudes	Insertar	\N	00:02:32, 2024-10-15, 14:31:47, 14:34:21, GILBERT, GONZALEZ, (424) 753-7979, 208, 142999, CANAL DE SALIDA A HA AVENIDA LAS AMERICA, 940, 00, 92, 1 , ENDIDURA DEL SUELO ASFALTADO Y HUECOS , recoleccion de datos en sitio y recopilación fotográfica, 0, 0, 0, TRUE, TRUE, 1, 0, CALLE EL PORVENIR, 20200220, 20200220, 1, 0, 9 	2024-10-15 14:10:17
1093	20200220	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 0, 0, 0, 0, 0, 0, 1, 160 , 92	2024-10-15 14:10:16
1094	20200220	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	47, 1	2024-10-15 14:10:18
1095	20200220	Cierre de guardia	guardias	Insertar	\N	5, Se procede al cierre de guardia, realizando actualizaciones al formulario de nuevas solicitudes en la sección de "Estatus de Solicitud", así mismo se actualiza el contenido de protocolo de emergencias, buscando una visual agradable y facil de leer.	2024-10-15 14:10:00
1096	20200220	CIERRE DE SESSION	USUARIO	VALIDAR	\N	32, MPena220, 2, 1, 20200220, 15/10/2024 | 15:37:02 	2024-10-15 15:37:02
1097	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 17/10/2024 | 12:39:48 	2024-10-17 12:39:48
1098	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 17/10/2024 | 12:39:57 	2024-10-17 12:39:57
1099	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 17/10/2024 | 12:40:01 	2024-10-17 12:40:01
1100	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 17/10/2024 | 12:40:07 	2024-10-17 12:40:07
1101	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 17/10/2024 | 12:41:01 	2024-10-17 12:41:01
1102	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 17/10/2024 | 12:41:12 	2024-10-17 12:41:12
1103	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 17/10/2024 | 12:41:59 	2024-10-17 12:41:59
1104		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	47, 5, 6	2024-10-17 11:10:03
1105	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 17/10/2024 | 16:03:00 	2024-10-17 16:03:00
1106	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 17/10/2024 | 16:03:06 	2024-10-17 16:03:06
1107	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 17/10/2024 | 16:04:39 	2024-10-17 16:04:39
1108	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 18/10/2024 | 15:13:43 	2024-10-18 15:13:43
1109	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 18/10/2024 | 15:14:39 	2024-10-18 15:14:39
1110	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 18/10/2024 | 15:14:43 	2024-10-18 15:14:43
1111	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 18/10/2024 | 15:14:48 	2024-10-18 15:14:48
1112	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 18/10/2024 | 15:15:31 	2024-10-18 15:15:31
1113	20200220	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 0, 0, 0, 0, 0, 0, 1, 160 , 92	2024-10-18 14:10:43
1114	20200220	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	47, 1	2024-10-18 14:10:46
1115	20200220	Cierre de guardia	guardias	Insertar	\N	5, cierre guardia	2024-10-18 14:10:54
1116	17340596	CIERRE DE SESSION	USUARIO	VALIDAR	\N	10, GTorres596, 4, 1, 17340596, 18/10/2024 | 15:15:56 	2024-10-18 15:15:56
1117	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 18/10/2024 | 15:16:26 	2024-10-18 15:16:26
1118	17129573	Personal de Guardia	personal_grupos_guardias	Insertar	\N	17129573 , 16200660 , 17340596 , 15040226 , 21182738 , , , , 8042991 , , , 18310118 , , , 20435049 , , , 1	2024-10-18 14:10:23
1119	17129573	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	48, 1	2024-10-18 14:10:37
1120	17129573	Apertura de guardia	guardias	Insertar	\N	1, apertura de guardia	2024-10-18 14:10:54
1121	27777826	Inicio de Session	Usuario	VALIDAR	\N	11, NPerez826, 4, \n\t\t\t1, 27777826, 18/10/2024 | 15:19:54 	2024-10-18 15:19:54
1122	27777826	Inicio de Session	Usuario	VALIDAR	\N	11, NPerez826, 4, \n\t\t\t1, 27777826, 18/10/2024 | 15:20:04 	2024-10-18 15:20:04
1123	27777826	Inicio de Session	Usuario	VALIDAR	\N	11, NPerez826, 4, \n\t\t\t1, 27777826, 18/10/2024 | 15:20:49 	2024-10-18 15:20:49
1124	27777826	Inicio de Session	Usuario	VALIDAR	\N	11, NPerez826, 4, \n\t\t\t1, 27777826, 18/10/2024 | 15:20:57 	2024-10-18 15:20:57
1125	27777826	Inicio de Session	Usuario	VALIDAR	\N	11, NPerez826, 4, \n\t\t\t1, 27777826, 18/10/2024 | 15:20:57 	2024-10-18 15:20:57
1126	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 18/10/2024 | 15:21:52 	2024-10-18 15:21:52
1127		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	48, 5, 6	2024-10-18 14:10:06
1128		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	48, 5, 6	2024-10-18 14:10:06
1129	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	14:22:40, 2024-10-18, 14:22:40, , , (146) 258-3696, 0 , 0, 00, , 893, 1, 6 , , 17340596	2024-10-18 14:10:19
1130	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	14:23:26, 2024-10-18, 14:23:26, juan, rivas, (426) 589-6568, 7 , 65, 142922, cancha, 893, 1, 5 , direccion, 17340596	2024-10-18 14:10:10
1131	17340596	Observaciones de Guardia	observaciones	Insertar	\N	, , , pendientes, 95, 4	2024-10-18 14:10:54
1132	17340596	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	48, 5, 6	2024-10-18 14:10:27
1133	17340596	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	48, 5, 6	2024-10-18 14:10:27
1134	17340596	CIERRE DE SESSION	USUARIO	VALIDAR	\N	10, GTorres596, 4, 1, 17340596, 18/10/2024 | 15:27:31 	2024-10-18 15:27:31
1135	17129573	Cierre Solicitudes	solicitudes	Insertar	\N	00:04:59, 2024-10-18, 14:23:26, 14:28:54, JUAN, RIVAS, (426) 589-6568, 65, 142922, CANCHA, 938, 00, 95, 2 , DETALLES, procedimieno, 0, 0, 0, FALSE, TRUE, 0, 0, DIRECCION, 17129573, 17340596, 0, 0, 7 	2024-10-18 14:10:10
1136	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	14:29:41, 2024-10-18, 14:29:41, 14:29:41, luisSOSA, , (146) 258-3698, 123, 142024, , 893, , 95, 5 , detalles, , , , , 0, 0, , , detalle direccion, , 17129573, , , 	2024-10-18 14:10:26
1137	17129573	Cierre Solicitudes	solicitudes	Insertar	\N	00:03:59, 2024-10-18, 14:29:41, 14:33:44, LUISSOSA, , (146) 258-3698, 123, 142024, , 893, 00, 95, 1 , DETALLES, procedimeinto, 0, 0, 0, FALSE, FALSE, 0, 0, DETALLE DIRECCION, 17129573, 17129573, 0, 0, 7 	2024-10-18 14:10:26
1138	17129573	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 1, 0, 0, 1, 0, 0, 3, 163 , 95	2024-10-18 14:10:34
1139	17129573	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	48, 1	2024-10-18 14:10:39
1140	17129573	Cierre de guardia	guardias	Insertar	\N	1, se realiza el cierre de guardia con la novedad de realizar un pequeño video indicando la sesion del OPERADOR, quedando casi en su totalidad y funcional.\r\n\r\nSe deja la observacion que faltan protocolos de emergencias nuevos por desarrollar	2024-10-18 14:10:57
1141	17129573	CIERRE DE SESSION	USUARIO	VALIDAR	\N	22, NValero573, 2, 1, 17129573, 18/10/2024 | 15:35:59 	2024-10-18 15:35:59
1142	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 21/10/2024 | 16:20:16 	2024-10-21 16:20:16
1143	17340596	Nuevas Solicitudes	solicitudes	Insertar	\N	15:21:35, 2024-10-21, 15:21:35, lues, marcano, (424) 785-2536, 4 , 51, 142630, uptm, 893, 1, 7 , direccion exacta, 17340596	2024-10-21 15:10:38
1144	17340596	Observaciones de Guardia	observaciones	Insertar	\N	despues de fluctuacion el equipo asignado se apagó, , , , 95, 4	2024-10-21 15:10:16
1145	17340596	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	48, 5, 6	2024-10-21 15:10:04
1146		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 21/10/2024 | 16:29:06 	2024-10-21 16:29:06
1147	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 22/10/2024 | 11:40:34 	2024-10-22 11:40:34
1148	17340596	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	48, 5, 6	2024-10-22 10:10:42
1149		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 22/10/2024 | 11:45:43 	2024-10-22 11:45:43
1150	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 22/10/2024 | 11:47:03 	2024-10-22 11:47:03
1151	20200220	Personal de Guardia	personal_grupos_guardias	Insertar	\N	20200220 , 11913073 , 17340596 , 29520477 , 22887354 , , , , 8042991 , , , 16445441 , 12356337 , , 18123089 , , , 5	2024-10-22 10:10:15
1152	20200220	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	49, 1	2024-10-22 10:10:17
1153	20200220	Apertura de guardia	guardias	Insertar	\N	5, Se procede a la apertura de guardia a nivel de supervision, iniciando cambios, modificaciones y actualizaciones en el usuario de despachadores	2024-10-22 10:10:06
1154	12356337	Inicio de Session	Usuario	VALIDAR	\N	26, YRodriguez337, 3, \n\t\t\t1, 12356337, 22/10/2024 | 11:54:14 	2024-10-22 11:54:14
1155		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	49, 2, 3, 4	2024-10-22 10:10:27
1156		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	49, 2, 3, 4	2024-10-22 10:10:27
1157	12356337	Apertura de guardia	guardias	Insertar	\N	5, se procede a la apertura de guardia, motivado a realizar pruebas, modificaciones y actualizaciones	2024-10-22 10:10:23
1158	12356337	Apertura de guardia	guardias	Insertar	\N	5, se procede a la apertura de guardia, motivado a realizar pruebas, modificaciones y actualizaciones	2024-10-22 10:10:23
1159	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	10:56:49, 2024-10-22, 10:56:49, 10:56:49, Juan, hernandez, (416) 145-2585, 68, 142024, el bloque amarillo, 893, , 97, 5 , detalles, , , , , 0, 0, , , direccion exacta, , 20200220, , , 	2024-10-22 10:10:49
1160	20200220	Cierre Solicitudes	solicitudes	Insertar	\N	00:29:51, 2024-10-22, 10:56:49, 12:17:38, JUAN, HERNANDEZ, (416) 145-2585, 68, 142024, EL BLOQUE AMARILLO, 893, 01, 97, 1 , DETALLES, procedimiento en sitio de emergencia, 0, 0, 0, FALSE, FALSE, 1, 0, DIRECCION EXACTA, 20200220, 20200220, 1, 0, 8 	2024-10-22 10:10:49
1161	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	12:19:12, 2024-10-22, 12:19:12, 12:19:12, Adriana, Moreno, (416) 589-2563, 197, 142026, el postal electrico, 893, , 97, 5 , detalles, , , , , 0, 1, , , calle el hambre, , 20200220, , , 	2024-10-22 12:10:07
1162	12356337	Cierre Solicitudes	solicitudes	Insertar	\N	20:00:00, 2024-10-22, 12:19:12, 12:51:32, ADRIANA, MORENO, (416) 589-2563, 197, 142026, EL POSTAL ELECTRICO, 893, 00, 99, 1 , DETALLES, Procedimiento de la solicitud, 0, 0, 0, FALSE, TRUE, 0, 0, CALLE EL HAMBRE, 12356337, 20200220, 0, 0, 7 	2024-10-22 12:10:07
1163	12356337	Observaciones de Guardia	observaciones	Insertar	\N	se realiza observaciones de guardia, debido a que el formulario del cierre de solicitudes debe de tomar TIEMPO DE APERTURA, HORA SOLICITUD, TIEMPO DE RESPUESTA Y TIEMPO EFECTIVO.\r\n\r\nnotando que en navegador CHROMIUM, no es posible mostrar y tomar el tiempo de apertura, cosa que en el navegador de FIREFOX, si es posible.\r\nQue es necesario verificar y corregir el TIEMPO EFECTIVO, REALIZANDO LAS SUMAS RESPECTIVAS DEL TIEMPO DE APERTURA Y TIEMPO EFECTIVO, , , , 99, 2	2024-10-22 13:10:17
1164	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 22/10/2024 | 15:28:08 	2024-10-22 15:28:08
1165	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 29/10/2024 | 11:12:24 	2024-10-29 11:12:24
1166	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 29/10/2024 | 11:21:03 	2024-10-29 11:21:03
1167	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 29/10/2024 | 11:21:49 	2024-10-29 11:21:49
1168	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 29/10/2024 | 11:23:57 	2024-10-29 11:23:57
1169	17129573	Personal de Guardia	personal_grupos_guardias	Insertar	\N	17129573 , 14267697 , 19995073 , 27433433 , 12780724 , , , , 8042991 , , , , , , , , , 1	2024-10-29 10:10:37
1170	17129573	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	50, 1	2024-10-29 10:10:41
1171	17129573	Apertura de guardia	guardias	Insertar	\N	1, Se procede a la apertura de guardia con motivo a modificar el formulario de "Cierre de Solicitud" o en su defecto el formulario de "Ver Solicitud"	2024-10-29 10:10:20
1172	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 29/10/2024 | 12:04:25 	2024-10-29 12:04:25
1173		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	50, 2, 3, 4	2024-10-29 11:10:33
1174	8042991	Apertura de guardia	guardias	Insertar	\N	1, se realiza apertura de guardia, del usuario despachador	2024-10-29 11:10:55
1175	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	11:06:36, 2024-10-29, 11:06:36, 11:06:36, Carlos, Mendez, (416) 145-8952, 123, 143060, la Avioneta, 893, , 100, 5 , detalles del evento, , , , , 0, 0, , , dierección exacta del evento, , 17129573, , , 	2024-10-29 11:10:32
1176	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 29/10/2024 | 12:47:42 	2024-10-29 12:47:42
1177	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 29/10/2024 | 13:03:09 	2024-10-29 13:03:09
1178	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 29/10/2024 | 13:03:10 	2024-10-29 13:03:10
1179	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	00:56:48, 2024-10-29, 11:06:36, 12:12:02, CARLOS, MENDEZ, (416) 145-8952, 123, 143060, LA AVIONETA, 942, 01, 101, 1 , DETALLES DEL EVENTO, procedimientos aplicado por los funcionarios en sitio, 0, 0, 0, FALSE, FALSE, 0, 1, DIERECCIóN EXACTA DEL EVENTO, 8042991, 17129573, 0, 2, 4 	2024-10-29 11:10:32
1180	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	12:16:35, 2024-10-29, 12:16:35, 12:16:35, Laura, Diaz, (416) 589-5623, 2, 143060, la Avioneta, 893, , 100, 5 , detalles del evento, , , , , 0, 0, , , direccińo exacta, , 17129573, , , 	2024-10-29 12:10:58
1181	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	00:01:28, 2024-10-29, 12:16:35, 12:18:06, LAURA, DIAZ, (416) 589-5623, 2, 143060, LA AVIONETA, 942, 00, 101, 1 , DETALLES DEL EVENTO, procedimiento aplicado por los funcionarios en sitio., 0, 1, 0, FALSE, FALSE, 1, 0, DIRECCIńO EXACTA, 8042991, 17129573, 2, 0, 6 	2024-10-29 12:10:58
1182	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 29/10/2024 | 15:30:43 	2024-10-29 15:30:43
1183	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	14:30:50, 2024-10-29, 14:30:50, 14:30:50, Juan, mora, (416) 589-4512, 5, 142832, la bodega, 893, , 100, 5 , detalles del robo, , , , , 0, 0, , , direccion donde ocurrio el evento, , 17129573, , , 	2024-10-29 14:10:55
1184	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 29/10/2024 | 15:32:21 	2024-10-29 15:32:21
1185	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	00:01:35, 2024-10-29, 14:30:50, 14:32:29, JUAN, MORA, (416) 589-4512, 5, 142832, LA BODEGA, 933, 00, 101, 1 , DETALLES DEL ROBO, procedimiento realizado por los funcionarios en el sitio, 0, 1, 0, FALSE, FALSE, 1, 0, DIRECCION DONDE OCURRIO EL EVENTO, 8042991, 17129573, 2, 0, 6 	2024-10-29 14:10:55
1186	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 29/10/2024 | 16:36:41 	2024-10-29 16:36:41
1187	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	15:36:46, 2024-10-29, 15:36:46, 15:36:46, luis, salazar, (425) 258-6969, 123, 142194, canal de salida a ha avenida las america, 893, , 100, 5 , detalles, , , , , 0, 0, , , direccion, , 17129573, , , 	2024-10-29 15:10:44
1188	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	00:12:08, 2024-10-29, 15:36:46, 15:48:57, LUIS, SALAZAR, (425) 258-6969, 123, 142194, CANAL DE SALIDA A HA AVENIDA LAS AMERICA, 894, , 101, 1 , DETALLES, procedimiento aplicado por funcionarios, 0, 0, 0, FALSE, FALSE, 1, 0, DIRECCION, 8042991, 17129573, 2, 0, 6 	2024-10-29 15:10:44
1189	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 01/11/2024 | 10:29:49 	2024-11-01 10:29:49
1190	20200220	Personal de Guardia	personal_grupos_guardias	Insertar	\N	20200220 , 11913073 , 18308368 , 19995073 , 29794276 , , , , 8042991 , , , 12356337 , 18310118 , , 20435049 , , , 5	2024-11-01 09:11:24
1191	20200220	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	51, 1	2024-11-01 09:11:48
1192	20200220	Apertura de guardia	guardias	Insertar	\N	5, se realiza la paertura de guardia	2024-11-01 09:11:08
1193	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 01/11/2024 | 10:34:18 	2024-11-01 10:34:18
1196	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	09:35:18, 2024-11-1, 09:35:18, 09:35:18, Manuel, albornoz, (416) 258-6523, 65, 00, , 893, , 102, 7 , la persona pregunta por estado de via hacia el paramo, , , , , 0, 0, , , , , 20200220, , , 	2024-11-01 09:11:56
1197	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	09:37:04, 2024-11-1, 09:37:04, 09:37:04, maria, caceres, (424) 785-4578, 3, 142685, panaderia, 893, , 102, 5 , detalles de solicitud, , , , , 0, 0, , , direccion exacta, , 20200220, , , 	2024-11-01 09:11:33
1198	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	00:02:42, 2024-11-01, 09:37:04, 09:40:03, MARIA, CACERES, (424) 785-4578, 3, 142685, PANADERIA, 920, , 103, 1 , DETALLES DE SOLICITUD, llegaron funcionarios al sitio y aplicaron el procedimiento respectivo, 0, 0, 1, FALSE, FALSE, 1, 1, DIRECCION EXACTA, 8042991, 20200220, 2, 1, 1 	2024-11-01 09:11:33
1199	8042991	Observaciones de Guardia	observaciones	Insertar	\N	que durante la guardia nocturna a mi compañero Soto, se le quedo el cargador del telefono celular, , , , 103, 3	2024-11-01 10:11:27
1200	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 01/11/2024 | 13:09:55 	2024-11-01 13:09:55
1201	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 07/11/2024 | 11:15:22 	2024-11-07 11:15:22
1202	17129573	Personal de Guardia	personal_grupos_guardias	Insertar	\N	17129573 , 16200660 , 15040226 , 21182738 , , , , , 8042991 , , , 18310118 , , , 20435049 , , , 1	2024-11-07 11:11:04
1203	17129573	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	52, 1	2024-11-07 11:11:06
1204	17129573	Apertura de guardia	guardias	Insertar	\N	1, Se procede a la apertura de guardia con motivo a verificar funcionalidad del formulario "Cierre de Solicitud" y ajuste de imagenes en pantalla principal y nueva solicitud	2024-11-07 11:11:19
1205	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 26/11/2024 | 10:56:48 	2024-11-26 10:56:48
1206	20200220	Personal de Guardia	personal_grupos_guardias	Insertar	\N	20200220 , 11913073 , 18125565 , 15040226 , 29520477 , , , , 8042991 , , , 18310118 , , , 11954012 , , , 5	2024-11-26 10:11:27
1207	20200220	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	53, 1	2024-11-26 10:11:36
1208	20200220	Apertura de guardia	guardias	Insertar	\N	5, Se procede a la apertura de guardia de para verificar funcionalidad de sesion del usuario despachador	2024-11-26 10:11:16
1209	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 26/11/2024 | 11:02:35 	2024-11-26 11:02:35
1210		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	53, 2, 3, 4	2024-11-26 11:11:40
1211	8042991	Apertura de guardia	guardias	Insertar	\N	5, Se procede a iniciar guardia con usuario de Despachador Policia 	2024-11-26 11:11:04
1212	8042991	Observaciones de Guardia	observaciones	Insertar	\N	se realizó registro de inicio de sesion con el funcionamiento normal de los formularios, queda pemndiente realizar mantenimiento preventico a computador perteneciente a la coordinación de gestión Humana, , , 106, 3	2024-11-26 11:11:45
1213	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 26/11/2024 | 11:25:21 	2024-11-26 11:25:21
1214	99999999	Modificar de Usuario	usuario	MODIFICAR	\N	LMarcano226, 66c11a156fd2c5b5a217e82aab31e6f1dcbe429a, 4, 1, 15040226, 29	2024-11-26 11:11:22
1215	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 26/11/2024 | 11:26:56 	2024-11-26 11:26:56
1216	15040226	Inicio de Session	Usuario	VALIDAR	\N	29, LMarcano226, 4, \n\t\t\t1, 15040226, 26/11/2024 | 11:34:47 	2024-11-26 11:34:47
1217		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	53, 5, 6	2024-11-26 11:11:09
1218		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	53, 5, 6	2024-11-26 11:11:09
1219	15040226	Nuevas Solicitudes	solicitudes	Insertar	\N	11:36:19, 2024-11-26, 11:36:19, jose jose, gonzalez , (042) 625-5815, 5 , 0, 142139, puente la pedregoza , 893, 5, 5 , Merida  la pedregoza calle 22, 15040226	2024-11-26 11:11:05
1220	15040226	Nuevas Solicitudes	solicitudes	Insertar	\N	11:45:02, 2024-11-26, 11:45:02, andres jose, gonzalez, (042) 555-6656, 5 , 15, 142093, xxxxxxxxxx, 893, 5, 5 , centro merida , 15040226	2024-11-26 11:11:18
1221	15040226	Nuevas Solicitudes	solicitudes	Insertar	\N	11:45:02, 2024-11-26, 11:45:02, andres jose, gonzalez, (042) 555-6656, 5 , 15, 142093, xxxxxxxxxx, 893, 5, 5 , centro merida , 15040226	2024-11-26 11:11:18
1222	15040226	Nuevas Solicitudes	solicitudes	Insertar	\N	11:49:24, 2024-11-26, 11:49:24, leonardo, rivas, (042) 652-2354, 3 , 68, 142294, meridaaa, 893, 5, 5 , las americas terminal , 15040226	2024-11-26 11:11:32
1223	15040226	Nuevas Solicitudes	solicitudes	Insertar	\N	11:50:36, 2024-11-26, 11:50:36, jesus, rivas, (042) 666-6546, 5 , 128, 142024, capitolio calle 22, 893, 5, 5 , capitolio , 15040226	2024-11-26 11:11:15
1224	15040226	Nuevas Solicitudes	solicitudes	Insertar	\N	11:51:17, 2024-11-26, 11:51:17, , , (042) 655-8855, 0, 0, 00, , 893, 5, 6 , , 15040226	2024-11-26 11:11:28
1225	15040226	Nuevas Solicitudes	solicitudes	Insertar	\N	11:51:32, 2024-11-26, 11:51:32, , , (026) 559-8987, 0, 0, 00, , 893, 5, 6 , , 15040226	2024-11-26 11:11:23
1226	15040226	Nuevas Solicitudes	solicitudes	Insertar	\N	11:53:26, 2024-11-26, 11:53:26, , , (042) 632-5545, 0, 0, 00, , 893, 5, 6 , , 15040226	2024-11-26 11:11:38
1227	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 26/11/2024 | 11:54:10 	2024-11-26 11:54:10
1228	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	00:03:41, 2024-11-26, 11:50:36, 11:54:43, JESUS, RIVAS, (042) 666-6546, 128, 142024, CAPITOLIO CALLE 22, 893, , 106, 1 , ROBOSSS, se presenta comision en sitio para atencion de robo a panaderia, los sujetos de dieron a la fuga, no se encontraron más evidencias, 0, 0, 0, TRUE, TRUE, 1, 0, CAPITOLIO , 8042991, 15040226, 2, 0, 5 	2024-11-26 11:11:15
1229	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	00:26:08, 2024-11-26, 11:36:19, 12:02:46, JOSE JOSE, GONZALEZ , (042) 625-5815, 0, 142139, PUENTE LA PEDREGOZA , 894, , 106, 8 , GFEWFEWF, no se procede, 0, 0, 0, FALSE, FALSE, 0, 0, MERIDA  LA PEDREGOZA CALLE 22, 8042991, 15040226, 0, 0, 9 	2024-11-26 11:11:05
1230	15040226	Inicio de Session	Usuario	VALIDAR	\N	29, LMarcano226, 4, \n\t\t\t1, 15040226, 26/11/2024 | 12:04:51 	2024-11-26 12:04:51
1231	15040226	Nuevas Solicitudes	solicitudes	Insertar	\N	12:05:01, 2024-11-26, 12:05:01, andrea, rivas, (042) 424-2424, 3 , 230, 142828, meirdaaa, 893, 5, 5 , merida  calle 22 av 55, 15040226	2024-11-26 12:11:48
1232	15040226	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	53, 5, 6	2024-11-26 12:11:14
1233		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 26/11/2024 | 12:10:16 	2024-11-26 12:10:16
1234	15040226	Inicio de Session	Usuario	VALIDAR	\N	29, LMarcano226, 4, \n\t\t\t1, 15040226, 26/11/2024 | 12:16:03 	2024-11-26 12:16:03
1235	15040226	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	53, 5, 6	2024-11-26 12:11:12
1236		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 26/11/2024 | 12:27:13 	2024-11-26 12:27:13
1237	15040226	Inicio de Session	Usuario	VALIDAR	\N	29, LMarcano226, 4, \n\t\t\t1, 15040226, 26/11/2024 | 12:39:09 	2024-11-26 12:39:09
1238	15040226	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	53, 5, 6	2024-11-26 12:11:56
1239		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 26/11/2024 | 12:39:57 	2024-11-26 12:39:57
1240	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	00:13:52, 2024-11-26, 11:45:02, 12:45:41, ANDRES JOSE, GONZALEZ, (042) 555-6656, 15, 142093, XXXXXXXXXX, 893, , 106, 1 , XXXXXX, procedimeinto de funcionarios, 0, 0, 0, FALSE, FALSE, 1, 1, CENTRO MERIDA , 8042991, 15040226, 1, 1, 2 	2024-11-26 11:11:18
1241	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	00:01:59, 2024-11-26, 12:05:01, 13:03:48, ANDREA, RIVAS, (042) 424-2424, 230, 142828, MEIRDAAA, 933, , 106, 1 , CAIDA , se presenta la unidad de emergencia en el sitio para proceder con la atencion de la persona y realizar el traslado al centro sistencial, 0, 1, 0, FALSE, FALSE, 1, 1, MERIDA  CALLE 22 AV 55, 8042991, 15040226, 1, 1, 1 	2024-11-26 12:11:48
1242	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	01:01:57, 2024-11-26, 11:45:02, 13:16:50, ANDRES JOSE, GONZALEZ, (042) 555-6656, 15, 142093, XXXXXXXXXX, 893, , 106, 1 , XXXXXX, Se procede a realizar la atencion de la agresion fisica, 0, 1, 0, TRUE, FALSE, 1, 0, CENTRO MERIDA , 8042991, 15040226, 2, 0, 5 	2024-11-26 11:11:18
1243	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	01:28:29, 2024-11-26, 11:49:24, 13:18:02, LEONARDO, RIVAS, (042) 652-2354, 68, 142294, MERIDAAA, 901, , 106, 1 , XXXXX, Se presenta en sitio comision PNB, llevandose los vehiculos al estacionamiento judicial, 0, 2, 2, FALSE, TRUE, 0, 1, LAS AMERICAS TERMINAL , 8042991, 15040226, 0, 2, 7 	2024-11-26 11:11:32
1244	8042991	Observaciones de Guardia	observaciones	Insertar	\N	se modifica el formulario de cierre de solicitudes, con verificación en linea de código del campo sector, que al momento de seleccionar muestre el número del cuadrante. que aun en observacion sujeto a sugerencias y cambios.\r\n\r\nse agrega imagen de avatar (operador) del VEN 9-1-1, en la platilla del formulario., , , , 106, 3	2024-11-26 13:11:55
1245	8042991	Observaciones de Guardia	observaciones	Insertar	\N	se Verifica el registro de observaciones, consultas de guardias y manual de usuario. funcioando sin inconvenientes\r\n, , , , 106, 3	2024-11-26 14:11:18
1246	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 26/11/2024 | 14:30:08 	2024-11-26 14:30:08
1247	15040226	Inicio de Session	Usuario	VALIDAR	\N	29, LMarcano226, 4, \n\t\t\t1, 15040226, 26/11/2024 | 14:37:01 	2024-11-26 14:37:01
1248	8042991	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	53, 2, 3, 4	2024-11-26 14:11:48
1249	8042991	Cierre de guardia	guardias	Insertar	\N	5, se realiza el cierre de guardia verificando el funcionamiento correcto de la SESION DE USUARIO DESPACHADOR	2024-11-26 14:11:20
1250	8042991	CIERRE DE SESSION	USUARIO	VALIDAR	\N	3, JSosa991, 3, 1, 8042991, 26/11/2024 | 14:54:22 	2024-11-26 14:54:22
1251	20200220	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	5, 0, 0, 0, 3, 0, 1, 9, 175 , 105	2024-11-26 14:11:56
1252	20200220	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	53, 1	2024-11-26 14:11:01
1253	20200220	Cierre de guardia	guardias	Insertar	\N	5, se realiza el cierre de guairdia con la sesion del usuario DESPACHADOR, verificada	2024-11-26 14:11:37
1254	17129573	CIERRE DE SESSION	USUARIO	VALIDAR	\N	22, NValero573, 2, 1, 17129573, 26/11/2024 | 14:55:38 	2024-11-26 14:55:38
1255	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 03/12/2024 | 09:38:15 	2024-12-03 09:38:15
1256	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 03/12/2024 | 09:47:06 	2024-12-03 09:47:06
1257	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 03/12/2024 | 09:48:01 	2024-12-03 09:48:01
1258	17129573	Personal de Guardia	personal_grupos_guardias	Insertar	\N	17129573 , 14267697 , 15040226 , 29794276 , 26052701 , , , , 8042991 , , , 18310118 , 13499752 , , 18123089 , 15621210 , , 1	2024-12-03 09:12:45
1259	17129573	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	54, 1	2024-12-03 09:12:49
1260	17129573	Apertura de guardia	guardias	Insertar	\N	1, Se Realiza la apertura de guardian	2024-12-03 09:12:02
1261	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	09:49:34, 2024-12-3, 09:49:34, 09:49:34, andres, marquez, (416) 258-9865, 3, 142530, bodega tres caramelos, 893, , 109, 5 , xxxx, , , , , 0, 0, , , direccion del evento, , 17129573, , , 	2024-12-03 09:12:34
1262	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 03/12/2024 | 09:51:42 	2024-12-03 09:51:42
1263		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	54, 2, 3, 4	2024-12-03 09:12:46
1264	8042991	Apertura de guardia	guardias	Insertar	\N	1, se realiza apertura de guardia de despachadores	2024-12-03 09:12:03
1265	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	00:02:34, 2024-12-03, 09:49:34, 10:13:08, ANDRES, MARQUEZ, (416) 258-9865, 3, 142530, BODEGA TRES CARAMELOS, 917, , 110, 1 , XXXX, comision en el sitio, 0, 0, 1, FALSE, FALSE, 1, 1, DIRECCION DEL EVENTO, 8042991, 17129573, 2, 1, 4 	2024-12-03 09:12:34
1266	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 03/12/2024 | 10:35:21 	2024-12-03 10:35:21
1267	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 03/12/2024 | 12:01:00 	2024-12-03 12:01:00
1268	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 03/12/2024 | 12:37:49 	2024-12-03 12:37:49
1269	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 03/12/2024 | 12:37:55 	2024-12-03 12:37:55
1270	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 03/12/2024 | 12:39:49 	2024-12-03 12:39:49
1271	17129573	Observaciones de Guardia	observaciones	Insertar	\N	se verifica el inicio de sesion y formularios de apertura de guardia a nivel de supervisor, , , , 109, 5	2024-12-03 12:12:40
1272	17340596	Inicio de Session	Usuario	VALIDAR	\N	10, GTorres596, 4, \n\t\t\t1, 17340596, 03/12/2024 | 13:09:55 	2024-12-03 13:09:55
1273	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 03/12/2024 | 13:10:14 	2024-12-03 13:10:14
1274	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 03/12/2024 | 13:10:30 	2024-12-03 13:10:30
1275	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 03/12/2024 | 13:13:22 	2024-12-03 13:13:22
1276	17129573	Nuevas Solicitudes	solicitudes	Insertar	\N	13:18:40, 2024-12-3, 13:18:40, 13:18:40, luis, sosa, (416) 589-8564, 132, 142026, punto referencia, 893, , 109, 5 , detalles, , , , , 1, 1, , , direccion del evento, , 17129573, , , 	2024-12-03 13:12:44
1277	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 03/12/2024 | 14:29:11 	2024-12-03 14:29:11
1278	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	01:10:36, 2024-12-03, 13:18:40, 14:29:18, LUIS, SOSA, (416) 589-8564, 132, 142026, PUNTO REFERENCIA, 893, , 110, 3 , DETALLES, procedimiento solicitud, 0, 0, 0, TRUE, TRUE, 0, 0, DIRECCION DEL EVENTO, 8042991, 17129573, 0, 0, 0 	2024-12-03 13:12:44
1279	17129573	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 0, 1, 0, 0, 0, 0, 2, 182 , 109	2024-12-03 15:12:27
1280	17129573	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	54, 1	2024-12-03 15:12:33
1331	8042991	CIERRE DE SESSION	USUARIO	VALIDAR	\N	3, JSosa991, 3, 1, 8042991, 17/07/2025 | 12:52:35 	2025-07-17 12:52:35
1281	17129573	Cierre de guardia	guardias	Insertar	\N	1, se Procede el cierre de guardia, acotando que se realiza insercion de codigo en formularios de consulta de estadisticas del personal. quedando pendiente el emparejamiento con datos en PHP y POSGRETSQL, para su completa funcionalidad	2024-12-03 15:12:56
1282		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 03/12/2024 | 15:51:58 	2024-12-03 15:51:58
1283	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 17/12/2024 | 08:55:57 	2024-12-17 08:55:57
1284	20200220	Personal de Guardia	personal_grupos_guardias	Insertar	\N	20200220 , 11913073 , 15040226 , 18125565 , 27433433 , , , , 8042991 , , , 18310118 , 12356337 , , 17842117 , 15621210 , , 5	2024-12-17 08:12:00
1285	20200220	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	55, 1	2024-12-17 08:12:04
1286	20200220	Apertura de guardia	guardias	Insertar	\N	5, se realiza la apertura para realizar cambios es formulario de consulta del personal, "estadisticas del personal"	2024-12-17 08:12:10
1287	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 17/12/2024 | 10:58:39 	2024-12-17 10:58:39
1288	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 17/12/2024 | 12:18:51 	2024-12-17 12:18:51
1289	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 17/12/2024 | 17:44:50 	2024-12-17 17:44:50
1290	20200220	Nuevas Solicitudes	solicitudes	Insertar	\N	17:45:09, 2024-12-17, 17:45:09, 17:45:09, Carlos, Araque, (416) 256-8956, 139, 142024, canal de salida a ha avenida las america, 893, , 112, 5 , detalles, , , , , 0, 0, , , direccion, , 20200220, , , 	2024-12-17 17:12:06
1291	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 17/12/2024 | 17:50:30 	2024-12-17 17:50:30
1292		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	55, 2, 3, 4	2024-12-17 17:12:33
1293	8042991	Apertura de guardia	guardias	Insertar	\N	5, apertura	2024-12-17 17:12:41
1294	8042991	Apertura de guardia	guardias	Insertar	\N	5, apertura	2024-12-17 17:12:41
1295	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	00:05:37, 2024-12-17, 17:45:09, 17:50:48, CARLOS, ARAQUE, (416) 256-8956, 139, 142024, CANAL DE SALIDA A HA AVENIDA LAS AMERICA, 893, , 114, 1 , DETALLES, procedimientos, 0, 0, 0, FALSE, FALSE, 0, 0, DIRECCION, 8042991, 20200220, 0, 0, 3 	2024-12-17 17:12:06
1296	8042991	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	55, 2, 3, 4	2024-12-17 17:12:26
1297	8042991	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	55, 2, 3, 4	2024-12-17 17:12:26
1298	8042991	Cierre de guardia	guardias	Insertar	\N	5, cierre de guardia	2024-12-17 17:12:34
1299	8042991	CIERRE DE SESSION	USUARIO	VALIDAR	\N	3, JSosa991, 3, 1, 8042991, 17/12/2024 | 17:51:35 	2024-12-17 17:51:35
1300	20200220	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 0, 0, 0, 0, 0, 0, 1, 184 , 112	2024-12-17 17:12:51
1301	20200220	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	55, 1	2024-12-17 17:12:53
1302	20200220	Cierre de guardia	guardias	Insertar	\N	5, se procede al cierre de guardia con la novedad que el formulario de "Estadisticas del Personal" está totalmente funcional.\r\nquedando atento y pendiente iniciar las pruebas de usuario y funcionalidad.	2024-12-17 17:12:08
1303	20200220	CIERRE DE SESSION	USUARIO	VALIDAR	\N	32, MPena220, 2, 1, 20200220, 17/12/2024 | 17:53:10 	2024-12-17 17:53:10
1304	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 23/12/2024 | 10:18:12 	2024-12-23 10:18:12
1305	99999999	Modificar Personal	personal	MODIFICAR	\N	11913073, EDDY, RODOLFO, ZAMBRANO, PEñA, (416) 874-6792, (000) 000-0000, ERZP17@GMAIL.COM, t, 02, CONJUNTO RESIDENCIAL CENTENARIO, CENTENARIO, , 5, 04, 41, ALA SUR CC CENTENARIO, 2021-12-03 11:12:41, 914, 1, 2, 4, 5, 3, 5, 1, 5	2024-12-23 10:12:58
1306	99999999	Modificar de Usuario	usuario	MODIFICAR	\N	EZambrano073, c07eb5a8c0dc7bb81c217b67f11c3b7a5e95ffd7, 2, 2, 11913073, 33	2024-12-23 10:12:17
1307	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 26/12/2024 | 09:58:36 	2024-12-26 09:58:36
1308	99999999	Modificar Bienes	bienes	MOFIFICAR	\N	123-456-789-147, TELEFONO, CISCO, RM-258-AC, GRIS, 14725-36985-145-2514, TELEFONO CON VOCINA DE ASIGNACION IP, 2021-11-08, M.P.P RELACIONES INTERIORES, JUSTICIA Y PAZ, EMERGENCIAS 911, BUEN ESTADO, 3, 3 , 2024-12-26, 5	2024-12-26 10:12:08
1309	99999999	Modificar Bienes	bienes	MOFIFICAR	\N	123-456-789-147, TELEFONO, CISCO, RM-258-AC, GRIS, 14725-36985-145-2514, TELEFONO CON VOCINA DE ASIGNACION IP, 2021-11-08, M.P.P RELACIONES INTERIORES, JUSTICIA Y PAZ, EMERGENCIAS 911, MANTENIMIENTO POR FALLAS EL CONFIGURACION IP, 3, 3, 2024-12-26, 5	2024-12-26 10:12:43
1310	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 10/07/2025 | 11:54:10 	2025-07-10 11:54:10
1311	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 10/07/2025 | 14:07:04 	2025-07-10 14:07:04
1312	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 10/07/2025 | 15:53:20 	2025-07-10 15:53:20
1313	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 17/07/2025 | 12:00:57 	2025-07-17 12:00:57
1314	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 17/07/2025 | 12:02:41 	2025-07-17 12:02:41
1315	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 17/07/2025 | 12:05:25 	2025-07-17 12:05:25
1316	20200220	Inicio de Session	Usuario	VALIDAR	\N	32, MPena220, 2, \n\t\t\t1, 20200220, 17/07/2025 | 12:23:52 	2025-07-17 12:23:52
1317	15620712	Inicio de Session	Usuario	VALIDAR	\N	27, GMaldonado712, 2, \n\t\t\t1, 15620712, 17/07/2025 | 12:25:02 	2025-07-17 12:25:02
1318	15620712	Personal de Guardia	personal_grupos_guardias	Insertar	\N	15620712 , 17523387 , 18125565 , 15620802 , , , , , 8042991 , , , 18310118 , , , 17842117 , , , 2	2025-07-17 11:07:50
1319	15620712	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	56, 1	2025-07-17 11:07:54
1320	15620712	Apertura de guardia	guardias	Insertar	\N	2, se reiza apertura de guardia en di de hoy jueves 17 de julio 2025	2025-07-17 11:07:13
1321	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 17/07/2025 | 12:33:29 	2025-07-17 12:33:29
1322	18125565	Inicio de Session	Usuario	VALIDAR	\N	2, TAraujo565, 4, \n\t\t\t1, 18125565, 17/07/2025 | 12:33:55 	2025-07-17 12:33:55
1323		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	56, 5, 6	2025-07-17 11:07:02
1324	18125565	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	56, 5, 6	2025-07-17 11:07:00
1325	18125565	CIERRE DE SESSION	USUARIO	VALIDAR	\N	2, TAraujo565, 4, 1, 18125565, 17/07/2025 | 12:44:02 	2025-07-17 12:44:02
1326	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 17/07/2025 | 12:45:33 	2025-07-17 12:45:33
1327		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	56, 2, 3, 4	2025-07-17 11:07:41
1328	8042991	Apertura de guardia	guardias	Insertar	\N	2, REALIZAMOS APERTURA GUARDIA A NIVEL DEL DESPACHADOR	2025-07-17 11:07:55
1329	8042991	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	56, 2, 3, 4	2025-07-17 11:07:22
1330	8042991	Cierre de guardia	guardias	Insertar	\N	2, CIERRE DE GUARDIA DEL DESPACHADOR	2025-07-17 11:07:33
1332	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 17/07/2025 | 15:52:03 	2025-07-17 15:52:03
1333	8042991	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	56, 2, 3, 4	2025-07-17 14:07:08
1334	8042991	Cierre de guardia	guardias	Insertar	\N	2, Cierre de guardia del funcionario	2025-07-17 14:07:17
1335		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 17/07/2025 | 15:58:19 	2025-07-17 15:58:19
1336	15620712	Inicio de Session	Usuario	VALIDAR	\N	27, GMaldonado712, 2, \n\t\t\t1, 15620712, 17/07/2025 | 15:58:47 	2025-07-17 15:58:47
1337	15620712	Nuevas Solicitudes	solicitudes	Insertar	\N	15:00:29, 2025-7-17, 15:00:29, 15:00:29, juan, Perez, (412) 256-2565, 0, 00, , 893, , 117, 5 , null null null, , , , , 0, 0, , , null null null, , 15620712, , , 	2025-07-17 15:07:23
1338	8042991	Inicio de Session	Usuario	VALIDAR	\N	3, JSosa991, 3, \n\t\t\t1, 8042991, 17/07/2025 | 16:03:27 	2025-07-17 16:03:27
1339	15620712	Nuevas Solicitudes	solicitudes	Insertar	\N	15:04:10, 2025-7-17, 15:04:10, 15:04:10, juan, zambrabno, (424) 157-5869, 0, 142793, motel el brasero, 893, , 117, 5 , null null null , , , , , 0, 0, , , null null null, , 15620712, , , 	2025-07-17 15:07:16
1340	8042991	Cierre Solicitudes	solicitudes	Insertar	\N	00:01:15, 2025-07-17, 15:04:10, 15:05:27, JUAN, ZAMBRABNO, (424) 157-5869, 0, 142793, MOTEL EL BRASERO, 931, , 118, 1 , NULL NULL NULL , null null null , 0, 0, 0, FALSE, FALSE, 0, 0, NULL NULL NULL, 8042991, 15620712, 0, 0, 9 	2025-07-17 15:07:16
1341	15620712	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 0, 0, 0, 0, 0, 0, 2, 186 , 117	2025-07-17 15:07:20
1342	15620712	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	56, 1	2025-07-17 15:07:23
1343	15620712	Cierre de guardia	guardias	Insertar	\N	2, Cirre de guardia por el usuario de supervision	2025-07-17 15:07:38
1344	15620712	CIERRE DE SESSION	USUARIO	VALIDAR	\N	27, GMaldonado712, 2, 1, 15620712, 17/07/2025 | 16:06:39 	2025-07-17 16:06:39
1345	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 05/08/2025 | 18:04:52 	2025-08-05 18:04:52
1346	17129573	Personal de Guardia	personal_grupos_guardias	Insertar	\N	17129573 , 14267697 , 19995073 , , , , , , 8042991 , , , 18310118 , , , 11954012 , , , 1	2025-08-05 17:08:20
1347	17129573	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	57, 1	2025-08-05 17:08:23
1348	17129573	Apertura de guardia	guardias	Insertar	\N	1, control 01	2025-08-05 17:08:31
1349	17129573	Inicio de Session	Usuario	VALIDAR	\N	22, NValero573, 2, \n\t\t\t1, 17129573, 06/08/2025 | 10:53:38 	2025-08-06 10:53:38
1350	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 12/08/2025 | 13:35:01 	2025-08-12 13:35:01
1351	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 12/08/2025 | 13:35:10 	2025-08-12 13:35:10
1352	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 28/11/2025 | 11:48:51 	2025-11-28 11:48:51
1353	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 28/11/2025 | 12:35:54 	2025-11-28 12:35:54
1354	99999999	Registro de Personal	personal	INSERTAR	\N	26052741, EDWIN, ALEXANDER, RIVERA, RENDON, (412) 076-8508, (274) 271-0036, EDWINALEXANDERRIVERARENDON@GMAIL.COM, 0, 00, SECTOR ENTABLITO L, VEREDA 03, VEREDE 03, 30, 00, 00, PASOS ABAJO DEL REGISTRO CIVIL, 2025/11/28 12:11:45, 942, 1 , 2, 1 , 4 , 1 , 5 , 1 , 3 	2025-11-28 12:11:45
1355	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	16664939, ANDRINA, LAZARONE, (414) 753-5368, TIA DEL COMPAñERO, 26052741, 4 	2025-11-28 12:11:10
1356	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NPMBRE DE MI PERRO, ALBERTO, NPMBRE MASCOTA DEL VEN, VEN	2025-11-28 12:11:17
1357	99999999	Registro de Usuario	usuario	INSERTAR	\N	ERivera741, 6bcae0c915d97297dbd1ac559cb4c3dfe69283a4, 4 , 1, 26052741, 41	2025-11-28 12:11:17
1358	99999999	Registro de Personal	personal	INSERTAR	\N	20847648, OSCAR, ANDRES, ALARCON, ROJAS, (424) 766-8846, (000) 000-0000, OSCARAQUEVINA@GMAIL.COM, 1, 02, SECTOR EL PORTACHUELO, CALLE LOS JAZMINES, CALLE LOS JAZMINES, 00, 00, 00, PASANDO EL REDUCTOR DE VELOCIDAD, 2025/11/28 12:11:31, 937, 1 , 2, 1 , 4 , 1 , 5 , 1 , 3 	2025-11-28 12:11:31
1359	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE HIJO, KEVIN, NOMBRE DE HIJA, KEILY	2025-11-28 12:11:12
1360	99999999	Modificar Personal	personal	MODIFICAR	\N	20847648, OSCAR, ANDRES, ALARCON, ROJAS, (424) 766-8846, (000) 000-0000, OSCARAQUEVINA@GMAIL.COM, t, 02, SECTOR EL PORTACHUELO, CALLE LOS JAZMINES, CALLE LOS JAZMINES, 00, 00, 00, PASANDO EL REDUCTOR DE VELOCIDAD, 2025-11-28 12:11:31, 937, 1, 2, 1, 4, 1, 5, 1, 3	2025-11-28 12:11:29
1361	99999999	Modificar Personal	personal	MODIFICAR	\N	20847648, OSCAR, ANDRES, ALARCON, ROJAS, (424) 766-8846, (000) 000-0000, OSCARAQUEVINA@GMAIL.COM, t, 02, SECTOR EL PORTACHUELO, CALLE LOS JAZMINES, CALLE LOS JAZMINES, 00, 00, 00, PASANDO EL REDUCTOR DE VELOCIDAD, 2025-11-28 12:11:31, 937, 1, 2, 1, 4, 1, 5, 1, 3	2025-11-28 12:11:33
1362	99999999	Modificar Personal	personal	MODIFICAR	\N	20847648, OSCAR, ANDRES, ALARCON, ROJAS, (424) 766-8846, (000) 000-0000, OSCARAKEVINA@GMAIL.COM, t, 02, SECTOR EL PORTACHUELO, CALLE LOS JAZMINES, CALLE LOS JAZMINES, 00, 00, 00, PASANDO EL REDUCTOR DE VELOCIDAD, 2025-11-28 12:11:31, 937, 1, 2, 1, 4, 1, 5, 1, 3	2025-11-28 13:11:53
1363	99999999	Modificar Personal	personal	MODIFICAR	\N	20847648, OSCAR, ANDRES, ALARCON, ROJAS, (424) 766-8846, (000) 000-0000, OSCARAKEVINA@HOTMAIL.COM, t, 02, SECTOR EL PORTACHUELO, CALLE LOS JAZMINES, CALLE LOS JAZMINES, 00, 00, 00, PASANDO EL REDUCTOR DE VELOCIDAD, 2025-11-28 12:11:31, 937, 1, 2, 1, 4, 1, 5, 1, 3	2025-11-28 13:11:05
1364	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 28/11/2025 | 13:21:11 	2025-11-28 13:21:11
1365	16664398	Inicio de Session	Usuario	VALIDAR	\N	13, JVelazquez398, 2, \n\t\t\t1, 16664398, 28/11/2025 | 13:21:18 	2025-11-28 13:21:18
1366	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 28/11/2025 | 13:22:30 	2025-11-28 13:22:30
1367	99999999	Modificar Personal	personal	MODIFICAR	\N	20847648, OSCAR, ANDRES, ALARCON, ROJAS, (424) 766-8846, (000) 000-0000, OSCARAKEVINA@HOTMAIL.COM, t, 02, SECTOR EL PORTACHUELO, CALLE LOS JAZMINES, CALLE LOS JAZMINES, 00, 00, 00, PASANDO EL REDUCTOR DE VELOCIDAD, 2025-11-28 12:11:31, 937, 1, 2, 1, 3 , 2 , 5, 1, 3	2025-11-28 13:11:57
1368	99999999	Modificar de Usuario	usuario	MODIFICAR	\N	OAlarcon648, c07eb5a8c0dc7bb81c217b67f11c3b7a5e95ffd7, 3, 1, 20847648, 42	2025-11-28 13:11:04
1369	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 28/11/2025 | 13:23:09 	2025-11-28 13:23:09
1370	16664398	Inicio de Session	Usuario	VALIDAR	\N	13, JVelazquez398, 2, \n\t\t\t1, 16664398, 28/11/2025 | 13:23:36 	2025-11-28 13:23:36
1371	16664398	Personal de Guardia	personal_grupos_guardias	Insertar	\N	16664398 , 16664398 , 26052741 , , , , , , 20847648 , , , 13499752 , , , 15621210 , , , 3	2025-11-28 13:11:08
1372	16664398	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	58, 1	2025-11-28 13:11:23
1373	16664398	Apertura de guardia	guardias	Insertar	\N	3, Se procede a la apertura de guardia	2025-11-28 13:11:40
1374	26052741	Inicio de Session	Usuario	VALIDAR	\N	41, ERivera741, 4, \n\t\t\t1, 26052741, 28/11/2025 | 13:25:30 	2025-11-28 13:25:30
1375		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	58, 5, 6	2025-11-28 13:11:53
1376	26052741	Nuevas Solicitudes	solicitudes	Insertar	\N	13:26:35, 2025-11-28, 13:26:35, , , (412) 076-8508, 0, 0, 00, , 893, 123, 6 , , 26052741	2025-11-28 13:11:52
1377	20847648	Inicio de Session	Usuario	VALIDAR	\N	42, OAlarcon648, 3, \n\t\t\t1, 20847648, 28/11/2025 | 13:31:40 	2025-11-28 13:31:40
1378		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	58, 2, 3, 4	2025-11-28 13:11:19
1379	26052741	Nuevas Solicitudes	solicitudes	Insertar	\N	13:28:01, 2025-11-28, 13:28:01, alexander, peña, (412) 076-8508, 1 , 68, 142805, en la entrada de la urbanizacion , 893, 123, 5 , merida- av. los próceres, urbanización santa ana , 26052741	2025-11-28 13:11:36
1380	20847648	Apertura de guardia	guardias	Insertar	\N	3, se hace la apertura de la guardia, recibiendo el radio transmisor en buen estado, y un teléfono en buen estado, y una computadora en buen estado, y se recibe con el área limpia y un  libro de novedades  	2025-11-28 13:11:54
1381	26052741	Nuevas Solicitudes	solicitudes	Insertar	\N	13:37:35, 2025-11-28, 13:37:35, Carmen, Solorzano, (416) 256-8956, 5 , 3, 143090, plaza las eroinas, 893, 124, 5 , parque las eroinas, 26052741	2025-11-28 13:11:54
1382	20847648	Cierre Solicitudes	solicitudes	Insertar	\N	00:01:21, 2025-11-28, 13:37:35, 13:39:15, CARMEN, SOLORZANO, (416) 256-8956, 3, 143090, PLAZA LAS EROINAS, 943, , 124, 1 , LA PERSONA SOSPECHOSA BISTE DE BLUE JEAN Y SUETER NEGRO, se dirigio al sitio la unidad m-03 al mando de guilver gonzalez, indicandoco que es efectivo el procedimiento solicitado , 0, 0, 0, FALSE, FALSE, 1, 0, PARQUE LAS EROINAS, 20847648, 26052741, 1, 0, 5 	2025-11-28 13:11:54
1383	26052741	Inicio de Session	Usuario	VALIDAR	\N	41, ERivera741, 4, \n\t\t\t1, 26052741, 28/11/2025 | 14:23:22 	2025-11-28 14:23:22
1384	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 28/11/2025 | 14:24:35 	2025-11-28 14:24:35
1385	99999999	Modificar de Usuario	usuario	MODIFICAR	\N	ERivera741, c07eb5a8c0dc7bb81c217b67f11c3b7a5e95ffd7, 4, 1, 26052741, 41	2025-11-28 14:11:56
1386	26052741	Inicio de Session	Usuario	VALIDAR	\N	41, ERivera741, 4, \n\t\t\t1, 26052741, 28/11/2025 | 14:26:31 	2025-11-28 14:26:31
1387	99999999	Modificar de Usuario	usuario	MODIFICAR	\N	ERivera741, a2c1c4025d4708d41ceafe6e7f65334586f23be7, 4, 1, 26052741, 41	2025-11-28 14:11:32
1388	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 28/11/2025 | 14:27:51 	2025-11-28 14:27:51
1389	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 28/11/2025 | 14:28:07 	2025-11-28 14:28:07
1390	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 28/11/2025 | 14:28:32 	2025-11-28 14:28:32
1391	16664398	Inicio de Session	Usuario	VALIDAR	\N	13, JVelazquez398, 2, \n\t\t\t1, 16664398, 28/11/2025 | 14:29:17 	2025-11-28 14:29:17
1392	26052741	Inicio de Session	Usuario	VALIDAR	\N	41, ERivera741, 4, \n\t\t\t1, 26052741, 28/11/2025 | 14:29:44 	2025-11-28 14:29:44
1393	26052741	Inicio de Session	Usuario	VALIDAR	\N	41, ERivera741, 4, \n\t\t\t1, 26052741, 28/11/2025 | 14:30:41 	2025-11-28 14:30:41
1394	26052741	Observaciones de Guardia	observaciones	Insertar	\N	siendo las 14:31 tuvimos un fallo con el suministro electrico , , , , 124, 4	2025-11-28 14:11:24
1395	16664398	Nuevas Solicitudes	solicitudes	Insertar	\N	14:32:53, 2025-11-28, 14:32:53, 14:32:53, Maria, Zerpa, (412) 526-5233, 0, 00, , 893, , 123, 7 , , , , , , 0, 0, , , , , 16664398, , , 	2025-11-28 14:11:42
1396	26052741	Nuevas Solicitudes	solicitudes	Insertar	\N	14:32:31, 2025-11-28, 14:32:31, antonio , sanchez , (412) 075-6385, 7 , 197, 142953, puente la pedregosa , 893, 124, 7 , merida- la pedregosa , 26052741	2025-11-28 14:11:12
1397	16664398	Nuevas Solicitudes	solicitudes	Insertar	\N	14:38:39, 2025-11-28, 14:38:39, 14:38:39, Rosa, Moreno, (426) 452-1200, 0, 00, , 893, , 123, 7 , La persona lama solicitando informacion, si hay gasolina en las estaciones de servicio, , , , , 0, 0, , , , , 16664398, , , 	2025-11-28 14:11:44
1398	16664398	Nuevas Solicitudes	solicitudes	Insertar	\N	14:39:46, 2025-11-28, 14:39:46, 14:39:46, Maria, Zerpa, (426) 452-2200, 0, 00, , 893, , 123, 4 , , , , , , 0, 0, , , , , 16664398, , , 	2025-11-28 14:11:22
1399	16664398	Nuevas Solicitudes	solicitudes	Insertar	\N	14:40:25, 2025-11-28, 14:40:25, 14:40:25, , , (416) 458-7812, 0, 00, , 893, , 123, 6 , , , , , , 0, 0, , , , , 16664398, , , 	2025-11-28 14:11:40
1400	26052741	Nuevas Solicitudes	solicitudes	Insertar	\N	14:37:54, 2025-11-28, 14:37:54, antonio , sanchez, (424) 757-8505, 0, 3, 142793, cc pie de monte canal de ascenso, 893, 124, 5 , merida- av. los próceres, frente a el cc pie de monte  , 26052741	2025-11-28 14:11:08
1401	20847648	Cierre Solicitudes	solicitudes	Insertar	\N	00:12:58, 2025-11-28, 13:28:01, 13:41:01, ALEXANDER, PEñA, (412) 076-8508, 68, 142805, EN LA ENTRADA DE LA URBANIZACION , 931, , 124, 1 , EL SOLICITANTE INDICA DE UNA COLISIóN ENTRE DOS VEHICULOS TIPO CARRO, SE REQUIERE COMISIóN EN EL SITIO , en el sitio se presenta comisiones de transito, Policia de mérida, Bomberos, se procede al levantmiento del accidente, presentandose daños materiales y 01 herido, 0, 0, 1, TRUE, FALSE, 1, 1, MERIDA- AV. LOS PRóCERES, URBANIZACIóN SANTA ANA , 20847648, 26052741, 1, 2, 2 	2025-11-28 13:11:36
1402	20847648	Cierre Solicitudes	solicitudes	Insertar	\N	00:09:20, 2025-11-28, 14:37:54, 14:47:22, ANTONIO , SANCHEZ, (424) 757-8505, 3, 142793, CC PIE DE MONTE CANAL DE ASCENSO, 931, , 124, 2 , EL SOLICITANTE INDICA DE UN SUJETO DE APROXIMADAMENTE 22 AñOS DE EDAD DE COLOR DE PIEL OSCURA, VESTIMENTA SHORTH NEGRO Y FRANELA BLANCA EL CUAL SE LE ACERCO DE MANERA AGRESIVA Y PROCEDIó A ARREBATARLE EL TELEFONO MOVIL , EL SUJETO CORRIO POR EL CANAL DE BAJADA , se procede al cierre de la solicitud por falta de unidades de emergencias, 0, 0, 0, FALSE, FALSE, 0, 0, MERIDA- AV. LOS PRóCERES, FRENTE A EL CC PIE DE MONTE  , 20847648, 26052741, 0, 0, 0 	2025-11-28 14:11:08
1403	26052741	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	58, 5, 6	2025-11-28 14:11:34
1404		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 28/11/2025 | 14:51:36 	2025-11-28 14:51:36
1405	20847648	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	58, 2, 3, 4	2025-11-28 14:11:40
1406	20847648	Cierre de guardia	guardias	Insertar	\N	3, Se procede al Cierre de guardia sin novedad	2025-11-28 14:11:56
1407	20847648	CIERRE DE SESSION	USUARIO	VALIDAR	\N	42, OAlarcon648, 3, 1, 20847648, 28/11/2025 | 14:51:58 	2025-11-28 14:51:58
1408	16664398	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	2, 1, 0, 1, 2, 3, 0, 9, 188 , 123	2025-11-28 14:11:29
1409	16664398	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	58, 1	2025-11-28 14:11:41
1410	16664398	Cierre de guardia	guardias	Insertar	\N	3, Se procede a realizar el cierre de guardia con la novedad que hay que modificar el banner de recuperacion de contraseña y modificar el tiempo de respuesta y colores para el cierre solicitudes	2025-11-28 14:11:39
1411		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 28/11/2025 | 14:58:41 	2025-11-28 14:58:41
1412	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 02/12/2025 | 15:23:44 	2025-12-02 15:23:44
1490	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	14428070, JENNIFER, RAMIREZ, (424) 710-2874, LLAMAR EN CASO DE EMERGENCIA, 32148040, 1 	2025-12-04 15:12:24
1413	99999999	Registro de Personal	personal	INSERTAR	\N	31436014, KEVIN, LEONARDO, LOBO, LOBO, (426) 572-1683, (000) 000-0000, LOBOKEVIN268@GMAIL.COM, 0, 00, SECTOR LOS CUROS, VEREDA 01, VEREDA 01, 11, 01, 00, INFOCENTRO, 2025/12/2 15:12:12, 942, 1 , 2, 2 , 4 , 1 , 5 , 1 , 2 	2025-12-02 15:12:12
1414	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	15755220, EDWIN, LOBO, (426) 603-3608, PADRE DEL JOVEN, 31436014, 2 	2025-12-02 15:12:37
1415	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	CULA ES MI COLOR FAVORITO, VERDE, PRIMER CARRO DE MI ABUELA, ACCENT	2025-12-02 15:12:37
1416	99999999	Registro de Usuario	usuario	INSERTAR	\N	KLobo014, 0899fd75bb81c842dc9023b03eafd5d03e3168d3, 4 , 1, 31436014, 43	2025-12-02 15:12:40
1417	99999999	Registro de Personal	personal	INSERTAR	\N	28205113, YORMAN, JESUS, VALERO, PEñA, (414) 753-1321, (000) 000-0000, YORMANVALERO04@GMAIL.COM, 0, 00, URBANIZACIÓN SANTA JUANA, PRINCIPAL, VEREDA 07, 12, 00, 00, BAJANDO POR LA IGLESIA, 2025/12/2 15:12:00, 934, 1 , 2, 1 , 4 , 1 , 5 , 1 , 2 	2025-12-02 15:12:00
1418	99999999	Modificar Personal	personal	MODIFICAR	\N	31436014, KEVIN, LEONARDO, LOBO, LOBO, (424) 760-3858, (000) 000-0000, LOBOKEVIN268@GMAIL.COM, f, 00, SECTOR LOS CUROS, VEREDA 01, VEREDA 01, 11, 01, 00, INFOCENTRO, 2025-12-02 15:12:12, 942, 1, 2, 2, 4, 1, 5, 1, 2	2025-12-02 15:12:28
1419	99999999	Modificar Preguntas de Seguridad	preguntas_usuario	MODIFICAR	\N	44, NOMBRE DE MI MADRE, YOMAIRA, CUMPLEAñOS SOBRINA, NOVIEMBRE	2025-12-02 15:12:01
1420	99999999	Registro de Personal	personal	INSERTAR	\N	10100438, ERWIN, RICHARD, LOBO, MARTINEZ, (414) 592-6069, (274) 244-3866, RICHARDLOBO20000@GMAIL.COM, 1, 01, BARRIO EL LLANITO, LAS AMERICAS, RESIDENCIA ARAGUANEI, TORRE 06, 01, 03, COLEGIO ARZOBISPO SILVA, 2025/12/2 15:12:03, 931, 3 , 2, 1 , 1 , 2 , 4 , 1 , 2 	2025-12-02 15:12:03
1421	99999999	Modificar de Usuario	usuario	MODIFICAR	\N	ELobo438, c07eb5a8c0dc7bb81c217b67f11c3b7a5e95ffd7, 3 , 1, 10100438, 45	2025-12-02 16:12:36
1422	99999999	Modificar Preguntas de Seguridad	preguntas_usuario	MODIFICAR	\N	45, EQUIPO FUTBOL FAVORITO, BARCELONA, LUGAR DE NACIMIENTO DE MI MADRE, SAN CRISTROBAL	2025-12-02 16:12:46
1423	31436014	Inicio de Session	Usuario	VALIDAR	\N	43, KLobo014, 4, \n\t\t\t1, 31436014, 02/12/2025 | 16:07:49 	2025-12-02 16:07:49
1424	31436014	Inicio de Session	Usuario	VALIDAR	\N	43, KLobo014, 4, \n\t\t\t1, 31436014, 02/12/2025 | 16:07:59 	2025-12-02 16:07:59
1425	28205113	Inicio de Session	Usuario	VALIDAR	\N	44, YValero113, 4, \n\t\t\t1, 28205113, 02/12/2025 | 16:08:03 	2025-12-02 16:08:03
1426	28205113	Inicio de Session	Usuario	VALIDAR	\N	44, YValero113, 4, \n\t\t\t1, 28205113, 02/12/2025 | 16:08:12 	2025-12-02 16:08:12
1427	31436014	Inicio de Session	Usuario	VALIDAR	\N	43, KLobo014, 4, \n\t\t\t1, 31436014, 02/12/2025 | 16:08:28 	2025-12-02 16:08:28
1428	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 02/12/2025 | 16:08:30 	2025-12-02 16:08:30
1429	31436014	Inicio de Session	Usuario	VALIDAR	\N	43, KLobo014, 4, \n\t\t\t1, 31436014, 02/12/2025 | 16:08:36 	2025-12-02 16:08:36
1430	28205113	Inicio de Session	Usuario	VALIDAR	\N	44, YValero113, 4, \n\t\t\t1, 28205113, 02/12/2025 | 16:09:26 	2025-12-02 16:09:26
1431	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 02/12/2025 | 16:10:58 	2025-12-02 16:10:58
1432	99999999	Modificar Preguntas de Seguridad	preguntas_usuario	MODIFICAR	\N	45, EQUIPO FUTBOL FAVORITO, BARCELONA, LUGAR DE NACIMIENTO DE MI MADRE, TACHIRA	2025-12-02 16:12:27
1433	31436014	Inicio de Session	Usuario	VALIDAR	\N	43, KLobo014, 4, \n\t\t\t1, 31436014, 02/12/2025 | 16:11:35 	2025-12-02 16:11:35
1434	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 02/12/2025 | 16:13:39 	2025-12-02 16:13:39
1435	15620712	Inicio de Session	Usuario	VALIDAR	\N	27, GMaldonado712, 2, \n\t\t\t1, 15620712, 02/12/2025 | 16:13:47 	2025-12-02 16:13:47
1436	15620712	Observaciones al personal	personal_guardias	Insertar	\N	llega a la guardia con retraso, 2 , 31436014 	2025-12-02 16:12:34
1437	15620712	Personal de Guardia	personal_grupos_guardias	Insertar	\N	15620712 , 17523387 , 28205113 , 31436014 , , , , , 20847648 , , , 13499752 , , , 10100438 , , , 2	2025-12-02 16:12:10
1438	15620712	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	59, 	2025-12-02 16:12:53
1439	15620712	Apertura de guardia	guardias	Insertar	\N	2, Se apertura de guardia con la novedad que el telefono se encuentra fuera de servicio. recibiendo las demas partes del equipo en buenas condiciones 	2025-12-02 16:12:40
1440	31436014	Inicio de Session	Usuario	VALIDAR	\N	43, KLobo014, 4, \n\t\t\t1, 31436014, 02/12/2025 | 16:17:18 	2025-12-02 16:17:18
1441	28205113	Inicio de Session	Usuario	VALIDAR	\N	44, YValero113, 4, \n\t\t\t1, 28205113, 02/12/2025 | 16:17:21 	2025-12-02 16:17:21
1442		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	59, 5, 6	2025-12-02 16:12:28
1443	10100438	Inicio de Session	Usuario	VALIDAR	\N	45, ELobo438, 3, \n\t\t\t1, 10100438, 02/12/2025 | 16:17:35 	2025-12-02 16:17:35
1444		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	59, 2, 3, 4	2025-12-02 16:12:58
1445		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	59, 5, 6	2025-12-02 16:12:24
1446	10100438	Apertura de guardia	guardias	Insertar	\N	2, se recibe la guardia sin novedad alguna	2025-12-02 16:12:30
1447	31436014	Nuevas Solicitudes	solicitudes	Insertar	\N	16:18:41, 2025-12-2, 16:18:41, , , (041) 279-2452, 7 , 0, 00, , 893, 128, 6 , , 31436014	2025-12-02 16:12:39
1448	28205113	Nuevas Solicitudes	solicitudes	Insertar	\N	16:18:55, 2025-12-2, 16:18:55, Maria, Vargas, (412) 564-3254, 0, 0, 00, , 893, 128, 7 , , 28205113	2025-12-02 16:12:43
1449	31436014	Nuevas Solicitudes	solicitudes	Insertar	\N	16:20:47, 2025-12-2, 16:20:47, Keily, Alvarado Araque, (041) 279-2452, 7 , 59, 00, , 893, 128, 7 , ejido, aguas calientes sector santa eduviges, 31436014	2025-12-02 16:12:28
1450	31436014	Nuevas Solicitudes	solicitudes	Insertar	\N	16:22:35, 2025-12-2, 16:22:35, Keily, Alvarado Araque, (041) 279-2452, 1 , 81, 142569, iglesia, 893, 128, 5 , ejido, aguas calientes sector santa eduviges, 31436014	2025-12-02 16:12:46
1451	31436014	Nuevas Solicitudes	solicitudes	Insertar	\N	16:25:52, 2025-12-2, 16:25:52, Keily, Alvarado Araque, (041) 279-2452, 0, 0, 00, , 893, 128, 6 , ejido, aguas calientes sector santa eduviges, 31436014	2025-12-02 16:12:10
1452	28205113	Nuevas Solicitudes	solicitudes	Insertar	\N	16:21:51, 2025-12-2, 16:21:51, jose, altuve, (424) 587-9655, 5 , 4, 143082, , 893, 128, 5 , Merida, av 5, entre calles 24 y 25, 28205113	2025-12-02 16:12:25
1453	28205113	Nuevas Solicitudes	solicitudes	Insertar	\N	16:26:32, 2025-12-2, 16:26:32, daniel, lobo, (412) 568-5494, 2 , 231, 142850, iglesia de santa juana, 893, 128, 5 , merida, santa juana, av principal, diagonal a la iglesia, 28205113	2025-12-02 16:12:08
1454	10100438	Cierre Solicitudes	solicitudes	Insertar	\N	00:03:19, 2025-12-02, 16:22:35, 16:26:17, KEILY, ALVARADO ARAQUE, (041) 279-2452, 81, 142569, IGLESIA, 917, , 128, 2 , LA SOLICITANTE INDICA SOBRE UNA ESPECIE ARBOREA LA CUAL ESTA OBSTACULIZANDO LA VIA Y NO PERMITE EL PASO FLUIDO DE LOS VEHíCULOS , la unidad llego al sitio siendo negativo el llamado, 0, 0, 0, FALSE, FALSE, 1, 1, EJIDO, AGUAS CALIENTES SECTOR SANTA EDUVIGES, 10100438, 31436014, 1, 2, 2 	2025-12-02 16:12:46
1455	10100438	Cierre Solicitudes	solicitudes	Insertar	\N	00:04:58, 2025-12-02, 16:26:32, 16:31:39, DANIEL, LOBO, (412) 568-5494, 231, 142850, IGLESIA DE SANTA JUANA, 934, , 128, 1 , SOLICITANTE INFORMA SOBRE FEMENINA DE UNOS 60 AñOS LA MISMA SE ENCONTRABA TRANSITANDO LA ZONA, PARA EL MOMENTO CAYO DE SU PROPIA ALTURA, INDICA TENER MUCHO DOLOR EN LA EXTREMIDAD INFERIOR IZQUIERDA, REQUIERE DE COMISION LO MAS PRONTO POSIBLE, la unidad llego al sitio y presto los primeros auxilios a la persona, no fue necesario el traslado al IAHULA, 0, 1, 0, FALSE, FALSE, 1, 0, MERIDA, SANTA JUANA, AV PRINCIPAL, DIAGONAL A LA IGLESIA, 10100438, 28205113, 1, 0, 2 	2025-12-02 16:12:08
1456	28205113	Nuevas Solicitudes	solicitudes	Insertar	\N	16:34:30, 2025-12-2, 16:34:30, , , (426) 896-5233, 0, 0, 00, , 893, 128, 6 , , 28205113	2025-12-02 16:12:49
1457	31436014	Nuevas Solicitudes	solicitudes	Insertar	\N	16:28:05, 2025-12-2, 16:28:05, Keily, Alvarado Araque, (041) 279-2452, 3 , 65, 142024, iglesia, 893, 128, 5 , ejido, aguas calientes sector santa eduviges, 31436014	2025-12-02 16:12:56
1458	28205113	Nuevas Solicitudes	solicitudes	Insertar	\N	16:35:09, 2025-12-2, 16:35:09, Banco Banesco, , (274) 225-2215, 5 , 122, 142835, , 893, 128, 5 , Merida, sector glorias patrias, frente a la brigada 22, banco banesco, 28205113	2025-12-02 16:12:20
1459	10100438	Cierre Solicitudes	solicitudes	Insertar	\N	00:11:42, 2025-12-02, 16:21:51, 16:33:59, JOSE, ALTUVE, (424) 587-9655, 4, 143082, , 943, , 128, 1 , SOLICITANTE INFORMA QUE LE HAN ROBADO EL VEHíCULO TIPO BICICLETA, ACOTA QUE LA MISMA SE ENCONTRABA PARADA EN LA ENTRADA DE SU VIVIENDA, ES DE COLOR AZUL Y RINES VERDES, REQUIERE DE COMISION LO MAS PRONTO POSIBLE , la unidad realiza recorrido en la zona logrando la ubicación del vehículo hurtado en donde se verifica que sufrió algunos daños, 0, 0, 0, FALSE, FALSE, 1, 1, MERIDA, AV 5, ENTRE CALLES 24 Y 25, 10100438, 28205113, 2, 1, 5 	2025-12-02 16:12:25
1460	10100438	Cierre Solicitudes	solicitudes	Insertar	\N	00:13:06, 2025-12-02, 16:28:05, 16:41:37, KEILY, ALVARADO ARAQUE, (041) 279-2452, 65, 142024, IGLESIA, 893, , 128, 1 , MOTORIZADO EL CUAL PRESENTA UN VUELCO SOBRE LA VIA Y TIENE UNA POSIBLE FX EN LA EXTREMIDAD INFERIOR DERECHA {TOBILLO}, llega al sitio la unidad de protección civil prestando los primeros auxilios al conductor del vehículo tipo moto, siendo este inmovilizado y trasladado inmediatamente al IAHULA, 0, 1, 1, FALSE, FALSE, 1, 1, EJIDO, AGUAS CALIENTES SECTOR SANTA EDUVIGES, 10100438, 31436014, 2, 1, 3 	2025-12-02 16:12:56
1461	31436014	Nuevas Solicitudes	solicitudes	Insertar	\N	16:41:30, 2025-12-2, 16:41:30, Keily, Alvarado Araque, (041) 279-2452, 9 , 0, 143682, iglesia, 893, 128, 7 , ejido, aguas calientes sector santa eduviges, 31436014	2025-12-02 16:12:27
1462	10100438	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	59, 2, 3, 4	2025-12-02 16:12:48
1463	28205113	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	59, 5, 6	2025-12-02 16:12:03
1464	28205113	CIERRE DE SESSION	USUARIO	VALIDAR	\N	44, YValero113, 4, 1, 28205113, 02/12/2025 | 16:48:05 	2025-12-02 16:48:05
1465	31436014	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	59, 5, 6	2025-12-02 16:12:23
1466	10100438	Cierre de guardia	guardias	Insertar	\N	2, se procede al cambio de guardia sin novedad alguna	2025-12-02 16:12:23
1467	10100438	CIERRE DE SESSION	USUARIO	VALIDAR	\N	45, ELobo438, 3, 1, 10100438, 02/12/2025 | 16:48:25 	2025-12-02 16:48:25
1468	31436014	CIERRE DE SESSION	USUARIO	VALIDAR	\N	43, KLobo014, 4, 1, 31436014, 02/12/2025 | 16:48:27 	2025-12-02 16:48:27
1469	15620712	Observaciones al personal de guardia	personal_guardias	Insertar	\N	sala a las 10:00 HLV se incorpora a las 14:00HLV, 6 , 28205113 , 127	2025-12-02 16:12:35
1470	15620712	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	3, 1, 0, 0, 3, 3, 0, 11, 201 , 127	2025-12-02 16:12:56
1471	15620712	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	59, 1	2025-12-02 16:12:00
1472	15620712	Cierre de guardia	guardias	Insertar	\N	2, se procede a realizar el cierre de guardia sin novedad	2025-12-02 16:12:16
1473	15620712	CIERRE DE SESSION	USUARIO	VALIDAR	\N	27, GMaldonado712, 2, 1, 15620712, 02/12/2025 | 16:58:18 	2025-12-02 16:58:18
1474	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 02/12/2025 | 16:58:22 	2025-12-02 16:58:22
1475	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 02/12/2025 | 17:05:10 	2025-12-02 17:05:10
1476	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 04/12/2025 | 12:27:45 	2025-12-04 12:27:45
1477	99999999	Registro de Personal	personal	INSERTAR	\N	31033723, KENETH, JEREMIAS, MARQUINA, ANTOINE, (414) 709-7448, (000) 000-0000, MARQUINAKENETH560@GMAIL.COM, 0, 00, SECTOR LOS CARACOLES, PRINCIPAL, RESIDENCIA EL CARDON, 25, 00, 00, DETRAS DEL LICEO LA PORTUGUESA, 2025/12/4 12:12:30, 968, 1 , 2, 1 , 4 , 1 , 5 , 1 , 4 	2025-12-04 12:12:30
1478	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	11952049, MARIO, MARQUINA, (412) 178-1156, LLAMAR EN CASO DE EMERGENCIA, 31033723, 2 	2025-12-04 12:12:46
1479	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE MI PERRA, KIARA, NOMBRE DE MI HERMANO, PAUL	2025-12-04 12:12:47
1480	99999999	Registro de Usuario	usuario	INSERTAR	\N	MKeneth723, aadecb5ae428541dea34297f13f079ebd6c293b1, 4 , 1, 31033723, 46	2025-12-04 12:12:47
1481	99999999	Registro de Personal	personal	INSERTAR	\N	31837357, KEVIN, DANIEL, ALVARADO, RAMIREZ, (426) 460-6839, (274) 260-0321, DABIEL17ALVARADO2006@GMAIL.COM, 0, 00, SECTOR LA CHAMA, URBANICACION EL GALERON, 11, 1111, 00, 00, ULTIMA PARADA BUSETAS DEL CHAMA, 2025/12/4 12:12:52, 937, 1 , 2, 4 , 4 , 1 , 5 , 1 , 4 	2025-12-04 12:12:52
1482	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	15031296, DANI, ALVARADO, (412) 078-3178, LLAMAR EN CASO DE EMERGENCIA, 31837357, 2 	2025-12-04 12:12:51
1483	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	CUAL ES MI COLOR FAVORITO, AZUL, MI ANIMAL FAVORITO, PERRO	2025-12-04 12:12:39
1484	99999999	Registro de Usuario	usuario	INSERTAR	\N	AKevin357, 8cd791defd2246564feed8287e8a2fcf6869e4a0, 4 , 1, 31837357, 47	2025-12-04 12:12:23
1485	99999999	Modificar Personal	personal	MODIFICAR	\N	31837357, KEVIN, DANIEL, ALVARADO, RAMIREZ, (426) 460-6839, (274) 260-0321, DANIEL17ALVARADO2006@GMAIL.COM, f, 00, SECTOR LA CHAMA, URBANICACION EL GALERON, 11, 1111, 00, 00, ULTIMA PARADA BUSETAS DEL CHAMA, 2025-12-04 12:12:52, 937, 1, 2, 4, 4, 1, 5, 1, 4	2025-12-04 12:12:54
1486	99999999	Modificar Personal	personal	MODIFICAR	\N	31837357, KEVIN, DANIEL, ALVARADO, RAMIREZ, (426) 460-6839, (274) 260-0321, DANIEL17ALVARADO2006@GMAIL.COM, f, 00, SECTOR LA CHAMA, URBANICACION EL GALERON, 11, 1111, 00, 00, ULTIMA PARADA BUSETAS DEL CHAMA, 2025-12-04 12:12:52, 937, 1, 2, 4, 1 , 2 , 5, 1, 4	2025-12-04 12:12:21
1487	99999999	Modificar de Usuario	usuario	MODIFICAR	\N	AKevin357, c07eb5a8c0dc7bb81c217b67f11c3b7a5e95ffd7, 3 , 1, 31837357, 47	2025-12-04 12:12:28
1488	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 04/12/2025 | 15:04:23 	2025-12-04 15:04:23
1489	99999999	Registro de Personal	personal	INSERTAR	\N	32148040, LEONELA, ALEJANDRA, UZCATEGUI, RAMIREZ, (414) 702-9248, (000) 000-0000, UZCATEGUILEONELA054@GMAIL.COM, 0, 00, URBANIZACIÓN PADRE DUQUE, CALLE 5B, 5, 74, 00, 00, CALLE 5, 2025/12/4 15:12:33, 918, 1 , 1, 1 , 4 , 1 , 5 , 1 , 4 	2025-12-04 15:12:33
1491	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	CUAL ES MI COLOR FAVORITO, AZUL, NOMBRE DE MI SEGUNDO HERMANO, ANTONY	2025-12-04 15:12:13
1492	99999999	Registro de Usuario	usuario	INSERTAR	\N	ULeonela040, e5d8e6dccb27266d49fae92bd3c901ab3c2a1aa8, 4 , 1, 32148040, 48	2025-12-04 15:12:32
1493	99999999	Registro de Personal	personal	INSERTAR	\N	31149149, ROGNIBETH, ADRIANA, BASTIDAS, PEREZ, (424) 714-7321, (274) 271-1722, ROGNIBASTIDAS@GMAIL.COM, 0, 00, SECTOR LOS CUROS, PRINCIPAL, URB LOS CUROS, 43, 02, 04, 1ER TANQUE DE AGUA, 2025/12/4 15:12:42, 942, 1 , 1, 1 , 1 , 2 , 5 , 1 , 4 	2025-12-04 15:12:42
1494	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	13803858, LIZBETH, MONSALVE, (412) 121-1481, LLAMAR EN CASO DE EMERGENCIA, 31149149, 1 	2025-12-04 15:12:38
1495	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE MI HERMANA, NUBIA, NOMBRE DE MI ABUELA, AURELIA	2025-12-04 15:12:50
1496	99999999	Registro de Usuario	usuario	INSERTAR	\N	RPerez149, d22b6471b6cbaaf5ba7aaa06cb5b8e8e5887d19c, 3 , 1, 31149149, 49	2025-12-04 15:12:32
1497	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 04/12/2025 | 15:47:48 	2025-12-04 15:47:48
1498	31149149	Inicio de Session	Usuario	VALIDAR	\N	49, RPerez149, 3, \n\t\t\t1, 31149149, 04/12/2025 | 15:50:25 	2025-12-04 15:50:25
1499	31149149	Inicio de Session	Usuario	VALIDAR	\N	49, RPerez149, 3, \n\t\t\t1, 31149149, 04/12/2025 | 15:50:47 	2025-12-04 15:50:47
1500	31149149	Inicio de Session	Usuario	VALIDAR	\N	49, RPerez149, 3, \n\t\t\t1, 31149149, 04/12/2025 | 15:51:30 	2025-12-04 15:51:30
1501	31149149	Inicio de Session	Usuario	VALIDAR	\N	49, RPerez149, 3, \n\t\t\t1, 31149149, 04/12/2025 | 15:51:45 	2025-12-04 15:51:45
1502	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:51:49 	2025-12-04 15:51:49
1503	31149149	Inicio de Session	Usuario	VALIDAR	\N	49, RPerez149, 3, \n\t\t\t1, 31149149, 04/12/2025 | 15:51:56 	2025-12-04 15:51:56
1504	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:52:09 	2025-12-04 15:52:09
1505	31149149	Inicio de Session	Usuario	VALIDAR	\N	49, RPerez149, 3, \n\t\t\t1, 31149149, 04/12/2025 | 15:52:13 	2025-12-04 15:52:13
1506	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:52:21 	2025-12-04 15:52:21
1507	31149149	Inicio de Session	Usuario	VALIDAR	\N	49, RPerez149, 3, \n\t\t\t1, 31149149, 04/12/2025 | 15:52:24 	2025-12-04 15:52:24
1508	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:52:29 	2025-12-04 15:52:29
1509	31149149	Inicio de Session	Usuario	VALIDAR	\N	49, RPerez149, 3, \n\t\t\t1, 31149149, 04/12/2025 | 15:52:37 	2025-12-04 15:52:37
1510	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:52:38 	2025-12-04 15:52:38
1511	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:52:47 	2025-12-04 15:52:47
1512	31149149	Inicio de Session	Usuario	VALIDAR	\N	49, RPerez149, 3, \n\t\t\t1, 31149149, 04/12/2025 | 15:52:53 	2025-12-04 15:52:53
1513	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:52:54 	2025-12-04 15:52:54
1514	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:53:10 	2025-12-04 15:53:10
1515	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:53:22 	2025-12-04 15:53:22
1516	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 04/12/2025 | 15:53:29 	2025-12-04 15:53:29
1517	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:53:48 	2025-12-04 15:53:48
1518	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:53:55 	2025-12-04 15:53:55
1519	99999999	Modificar Personal	personal	MODIFICAR	\N	18966872, WENNDY, NAIROBY, MOYA, FLOREZ, (412) 547-6218, (000) 000-0000, WENNDY.MOYA@GMAIL.COM, f, 00, SECTOR MUCUMBO, SIN NUMERO, FINAL POMPILIO FLORES, SIN NUMERO, 00, 00, PASO ABAJO TALLER LATONERIA RAMON, 2021-11-11 09:11:38, 963, 1, 1, 4, 5 , 3 , 4, 1, 4	2025-12-04 15:12:56
1520	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:54:02 	2025-12-04 15:54:02
1521	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:54:12 	2025-12-04 15:54:12
1522	99999999	Modificar de Usuario	usuario	MODIFICAR	\N	WMoya872, 22f9ac8639d5c768d17e5c02394e993164c30245, 2 , 1, 18966872, 16	2025-12-04 15:12:13
1523	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 04/12/2025 | 15:54:20 	2025-12-04 15:54:20
1524	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:54:22 	2025-12-04 15:54:22
1525	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:54:29 	2025-12-04 15:54:29
1526	18966872	Inicio de Session	Usuario	VALIDAR	\N	16, WMoya872, 2, \n\t\t\t1, 18966872, 04/12/2025 | 15:54:29 	2025-12-04 15:54:29
1527	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:54:37 	2025-12-04 15:54:37
1528	18966872	Personal de Guardia	personal_grupos_guardias	Insertar	\N	18966872 , 16908218 , 32148040 , 31033723 , , , , , 20847648 , , , 18310118 , , , 31149149 , , , 4	2025-12-04 15:12:49
1529	18966872	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	60, 1	2025-12-04 15:12:29
1530	18966872	Apertura de guardia	guardias	Insertar	\N	4, Se procede a realizar la apertura de guardia sin novedad	2025-12-04 15:12:52
1531	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 04/12/2025 | 15:58:34 	2025-12-04 15:58:34
1532	31149149	Inicio de Session	Usuario	VALIDAR	\N	49, RPerez149, 3, \n\t\t\t1, 31149149, 04/12/2025 | 15:58:38 	2025-12-04 15:58:38
1533		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	60, 2, 3, 4	2025-12-04 15:12:48
1534	31149149	Apertura de guardia	guardias	Insertar	\N	4, Se procede a iniciar guardia sin novedad	2025-12-04 15:12:17
1535		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	60, 5, 6	2025-12-04 15:12:19
1536	32148040	Nuevas Solicitudes	solicitudes	Insertar	\N	16:00:04, 2025-12-4, 16:00:04, , , (414) 563-2789, 0, 0, 00, , 893, 132, 6 , , 32148040	2025-12-04 16:12:27
1537	32148040	Nuevas Solicitudes	solicitudes	Insertar	\N	16:01:39, 2025-12-4, 16:01:39, maria , perez, (412) 792-4528, 9 , 44, 143082, plaza bolivar, 893, 132, 7 , , 32148040	2025-12-04 16:12:36
1538	32148040	Nuevas Solicitudes	solicitudes	Insertar	\N	16:06:40, 2025-12-4, 16:06:40, juan , gomez, (414) 563-2784, 2 , 177, 143081, corpoelec , 893, 132, 5 , los curos zona industrial , 32148040	2025-12-04 16:12:16
1576	28202563	Inicio de Session	Usuario	VALIDAR	\N	51, LQuintero563, 4, \n\t\t\t1, 28202563, 08/12/2025 | 15:29:22 	2025-12-08 15:29:22
1577	32488556	Inicio de Session	Usuario	VALIDAR	\N	50, MPena556, 4, \n\t\t\t1, 32488556, 08/12/2025 | 15:29:26 	2025-12-08 15:29:26
1539	31149149	Cierre Solicitudes	solicitudes	Insertar	\N	00:07:06, 2025-12-04, 16:06:40, 16:13:56, JUAN , GOMEZ, (414) 563-2784, 177, 143081, CORPOELEC , 942, , 132, 1 , EL SOLICITANTE INFORMA DE UNA COLISION ENTRE DOS VEHICULOS TIPO MOTO , Se presenta en el sitio la comision de la policia del estado el cuadrante de paz numero 16 y comision motorizada de preteccion civil , 0, 2, 0, FALSE, FALSE, 1, 1, LOS CUROS ZONA INDUSTRIAL , 31149149, 32148040, 1, 1, 4 	2025-12-04 16:12:16
1540	18966872	Nuevas Solicitudes	solicitudes	Insertar	\N	16:18:17, 2025-12-4, 16:18:17, 16:18:17, , , (416) 254-1223, 0, 00, , 893, , 131, 6 , , , , , , 0, 0, , , , , 18966872, , , 	2025-12-04 16:12:33
1541	18966872	Nuevas Solicitudes	solicitudes	Insertar	\N	16:18:36, 2025-12-4, 16:18:36, 16:18:36, Carlos, Mendez, (424) 785-1245, 35, 143037, redoma, 893, , 131, 5 , motorizado a alta velocidad, sin precaucion alguna, , , , , 0, 0, , , direccion exacta del evento, a nivel de la vuelta de lola, , 18966872, , , 	2025-12-04 16:12:37
1542	18966872	Nuevas Solicitudes	solicitudes	Insertar	\N	16:20:41, 2025-12-4, 16:20:41, 16:20:41, maria, sosa, (426) 589-5623, 35, 143037, redoma , 893, , 131, 5 , vehiculo moto a alta velocidad, , , , , 0, 0, , , vuelta de lola, , 18966872, , , 	2025-12-04 16:12:45
1543	32148040	Nuevas Solicitudes	solicitudes	Insertar	\N	16:18:12, 2025-12-4, 16:18:12, emilia, guillen, (426) 254-9898, 4 , 3, 142499, frente al club polideportivo, 893, 132, 5 , ejido, el palmo, 32148040	2025-12-04 16:12:05
1544	31149149	Cierre Solicitudes	solicitudes	Insertar	\N	00:01:34, 2025-12-04, 16:20:41, 16:23:54, MARIA, SOSA, (426) 589-5623, 35, 143037, REDOMA , 941, , 132, 4 , VEHICULO MOTO A ALTA VELOCIDAD, Llamada repetida, 0, 0, 0, FALSE, FALSE, 0, 0, VUELTA DE LOLA, 31149149, 18966872, 0, 0, 8 	2025-12-04 16:12:45
1545	31149149	Cierre Solicitudes	solicitudes	Insertar	\N	00:06:01, 2025-12-04, 16:18:36, 16:24:55, CARLOS, MENDEZ, (424) 785-1245, 35, 143037, REDOMA, 941, , 132, 1 , MOTORIZADO A ALTA VELOCIDAD, SIN PRECAUCION ALGUNA, Se presenta una comisión de transito en el sitio realizando llamado de atención al ciudadano que conducía un vehículo tipo moto a alta velocidad en la zona , 0, 0, 0, FALSE, FALSE, 1, 0, DIRECCION EXACTA DEL EVENTO, A NIVEL DE LA VUELTA DE LOLA, 31149149, 18966872, 1, 0, 8 	2025-12-04 16:12:37
1546	32148040	Observaciones de Guardia	observaciones	Insertar	\N	, , el día de hoy se recibe un nuevo cuaderno para el área de video protección\r\n, , 132, 4	2025-12-04 16:12:45
1547	32148040	Observaciones de Guardia	observaciones	Insertar	\N	, queda pendiente hacer el recorrido de las cámaras, , , 132, 4	2025-12-04 16:12:28
1548	31149149	Observaciones de Guardia	observaciones	Insertar	\N	Siendo las 4:30 pm se perdieron las comunicacion de las lineas telefonicas , , , , 132, 1	2025-12-04 16:12:41
1549	31149149	Observaciones de Guardia	observaciones	Insertar	\N	, , , Se encontraron unos lentes tipo deportivos color negros en la cabina numero 4, aparentemente del personal de la guardia anterior , 132, 1	2025-12-04 16:12:47
1550	32148040	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	60, 5, 6	2025-12-04 16:12:07
1551	32148040	CIERRE DE SESSION	USUARIO	VALIDAR	\N	48, ULeonela040, 4, 1, 32148040, 04/12/2025 | 16:42:11 	2025-12-04 16:42:11
1552	31149149	Cierre Solicitudes	solicitudes	Insertar	\N	00:06:25, 2025-12-04, 16:18:12, 16:24:40, EMILIA, GUILLEN, (426) 254-9898, 3, 142499, FRENTE AL CLUB POLIDEPORTIVO, 917, , 132, 1 , LA SOLICITANTE INFORMA QUE UNA PERSONA LA AGREDIó PARA ROBARLE SU CARTERA , Se procede a enviar una comisión al lugar de los hechos , 0, 0, 0, FALSE, FALSE, 0, 1, EJIDO, EL PALMO, 31149149, 32148040, 1, 0, 4 	2025-12-04 16:12:05
1553	31149149	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	60, 2, 3, 4	2025-12-04 16:12:06
1554	31149149	Cierre de guardia	guardias	Insertar	\N	4, Se procede a entregar guardia sin novedad	2025-12-04 16:12:30
1555	31149149	CIERRE DE SESSION	USUARIO	VALIDAR	\N	49, RPerez149, 3, 1, 31149149, 04/12/2025 | 16:44:32 	2025-12-04 16:44:32
1556	18966872	Observaciones al personal de guardia	personal_guardias	Insertar	\N	la compañera presente fuerte dolor apdominal, la cual debe ser atendida por los medicos de la URI, entregando un reposo por 3 dias, 3 , 31149149 , 131	2025-12-04 16:12:37
1557	18966872	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	3, 0, 0, 1, 2, 1, 0, 7, 209 , 131	2025-12-04 16:12:33
1558	18966872	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	60, 1	2025-12-04 16:12:37
1559	18966872	Cierre de guardia	guardias	Insertar	\N	4, se procede a realizar el cierre de guardia con la novedad de corregir el campo de registro de dirección en el formulario de registro de personal.\r\n\r\nvisualizar los registros de guardia anterios a nivel de usuario operadores	2025-12-04 16:12:28
1560	18966872	CIERRE DE SESSION	USUARIO	VALIDAR	\N	16, WMoya872, 2, 1, 18966872, 04/12/2025 | 16:57:30 	2025-12-04 16:57:30
1561	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 04/12/2025 | 16:57:46 	2025-12-04 16:57:46
1562	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 04/12/2025 | 17:03:55 	2025-12-04 17:03:55
1563	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 08/12/2025 | 12:54:03 	2025-12-08 12:54:03
1564	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 08/12/2025 | 14:38:22 	2025-12-08 14:38:22
1565	99999999	Registro de Personal	personal	INSERTAR	\N	32488556, MIGUEL, ANGEL, PEñA, RODRIGUEZ, (416) 088-8082, (000) 000-0000, MP3659150@GMAIL.COM, 0, 00, BARRIO LA TRINIDAD, LOS PROCERES, SANTA ANA, 04, 00, 00, AGENCIA MRW, 2025/12/8 14:12:15, 939, 1 , 2, 1 , 4 , 1 , 5 , 1 , 2 	2025-12-08 14:12:15
1566	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	11954756, JOSE, PEñA, (422) 005-2775, LLAMAR EN CASO DE EMEREGENCIA, 32488556, 2 	2025-12-08 14:12:04
1567	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	NOMBRE DE MI MASCOTA, MARCELA, MI COLOR FAVORITO, VERDE	2025-12-08 14:12:07
1568	99999999	Registro de Usuario	usuario	INSERTAR	\N	MPena556, 1dd7a86126b02a06cfd047ea29f2156263ab5be3, 4 , 1, 32488556, 50	2025-12-08 14:12:17
1569	99999999	Registro de Personal	personal	INSERTAR	\N	28202563, LOGNER, ALEJANDRO, QUINTERO, GUERRERO, (424) 737-6255, (000) 000-0000, LOGNERQUIN23@GMAIL.COM, 0, 00, SECTOR LA CHAMA, PRINCIPAL, PRINCIPAL, 16, 00, 00, FRENTE A TOYOCENTER, 2025/12/8 15:12:38, 937, 1 , 2, 1 , 4 , 1 , 5 , 1 , 3 	2025-12-08 15:12:38
1570	99999999	Registro de Pariente	parantesco_personal	INSERTAR	\N	12351835, MARBELY, GUERRERO, (426) 272-8728, LLAMAR EN CASO DE EMERGENCIA, 28202563, 1 	2025-12-08 15:12:39
1571	99999999	Registro de Preguntas de Recuperación	preguntas_usuario	INSERTAR	\N	CUAL ES MI COMINDA FAVORITA, PASTICHO, NOMBRE DE MI PERRO, TOBY	2025-12-08 15:12:01
1572	99999999	Registro de Usuario	usuario	INSERTAR	\N	LQuintero563, 49bd3c3c29668f19b89a5b1faef3bc2bc938efef, 4 , 1, 28202563, 51	2025-12-08 15:12:57
1573	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 08/12/2025 | 15:25:29 	2025-12-08 15:25:29
1574	32488556	Inicio de Session	Usuario	VALIDAR	\N	50, MPena556, 4, \n\t\t\t1, 32488556, 08/12/2025 | 15:28:49 	2025-12-08 15:28:49
1575	32488556	Inicio de Session	Usuario	VALIDAR	\N	50, MPena556, 4, \n\t\t\t1, 32488556, 08/12/2025 | 15:29:12 	2025-12-08 15:29:12
1578	28202563	Inicio de Session	Usuario	VALIDAR	\N	51, LQuintero563, 4, \n\t\t\t1, 28202563, 08/12/2025 | 15:29:41 	2025-12-08 15:29:41
1579	32488556	Inicio de Session	Usuario	VALIDAR	\N	50, MPena556, 4, \n\t\t\t1, 32488556, 08/12/2025 | 15:29:44 	2025-12-08 15:29:44
1580	28202563	Inicio de Session	Usuario	VALIDAR	\N	51, LQuintero563, 4, \n\t\t\t1, 28202563, 08/12/2025 | 15:29:51 	2025-12-08 15:29:51
1581	32488556	Inicio de Session	Usuario	VALIDAR	\N	50, MPena556, 4, \n\t\t\t1, 32488556, 08/12/2025 | 15:29:56 	2025-12-08 15:29:56
1582	28202563	Inicio de Session	Usuario	VALIDAR	\N	51, LQuintero563, 4, \n\t\t\t1, 28202563, 08/12/2025 | 15:29:58 	2025-12-08 15:29:58
1583	32488556	Inicio de Session	Usuario	VALIDAR	\N	50, MPena556, 4, \n\t\t\t1, 32488556, 08/12/2025 | 15:30:05 	2025-12-08 15:30:05
1584	32488556	Inicio de Session	Usuario	VALIDAR	\N	50, MPena556, 4, \n\t\t\t1, 32488556, 08/12/2025 | 15:30:16 	2025-12-08 15:30:16
1585	32488556	Inicio de Session	Usuario	VALIDAR	\N	50, MPena556, 4, \n\t\t\t1, 32488556, 08/12/2025 | 15:30:39 	2025-12-08 15:30:39
1586	32488556	Inicio de Session	Usuario	VALIDAR	\N	50, MPena556, 4, \n\t\t\t1, 32488556, 08/12/2025 | 15:30:52 	2025-12-08 15:30:52
1587	32488556	Inicio de Session	Usuario	VALIDAR	\N	50, MPena556, 4, \n\t\t\t1, 32488556, 08/12/2025 | 15:31:07 	2025-12-08 15:31:07
1588	16664398	Inicio de Session	Usuario	VALIDAR	\N	13, JVelazquez398, 2, \n\t\t\t1, 16664398, 08/12/2025 | 15:32:33 	2025-12-08 15:32:33
1589	16664398	Personal de Guardia	personal_grupos_guardias	Insertar	\N	16664398 , 16664398 , 32488556 , 28202563 , , , , , 20847648 , , , 13499752 , , , 10100438 , , , 3	2025-12-08 15:12:37
1590	16664398	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	61, 1	2025-12-08 15:12:27
1591	16664398	Apertura de guardia	guardias	Insertar	\N	3, se recibe y apertura la guardia sin novedad	2025-12-08 15:12:57
1592	10100438	Inicio de Session	Usuario	VALIDAR	\N	45, ELobo438, 3, \n\t\t\t1, 10100438, 08/12/2025 | 15:36:38 	2025-12-08 15:36:38
1593		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	61, 2, 3, 4	2025-12-08 15:12:25
1594	32488556	Inicio de Session	Usuario	VALIDAR	\N	50, MPena556, 4, \n\t\t\t1, 32488556, 08/12/2025 | 15:37:43 	2025-12-08 15:37:43
1595		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	61, 5, 6	2025-12-08 15:12:56
1596	10100438	Apertura de guardia	guardias	Insertar	\N	3, se procede a la apertura de guardia sin novedad 	2025-12-08 15:12:37
1597	28202563	Inicio de Session	Usuario	VALIDAR	\N	51, LQuintero563, 4, \n\t\t\t1, 28202563, 08/12/2025 | 15:38:48 	2025-12-08 15:38:48
1598		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	61, 5, 6	2025-12-08 15:12:05
1599	32488556	Nuevas Solicitudes	solicitudes	Insertar	\N	15:38:45, 2025-12-8, 15:38:45, , , (424) 722-4832, 0, 0, 00, , 893, 136, 6 , , 32488556	2025-12-08 15:12:01
1600	28202563	Nuevas Solicitudes	solicitudes	Insertar	\N	15:39:09, 2025-12-8, 15:39:09, , , (424) 737-6255, 0, 0, 00, , 893, 136, 6 , , 28202563	2025-12-08 15:12:05
1601	32488556	Nuevas Solicitudes	solicitudes	Insertar	\N	15:41:07, 2025-12-8, 15:41:07, jose, marquez, (424) 722-2483, 1 , 63, 143082, cafe express, 893, 136, 5 , merida , av 2 y 3 , entre calle 25 y 24 , 32488556	2025-12-08 15:12:31
1602	28202563	Nuevas Solicitudes	solicitudes	Insertar	\N	15:43:13, 2025-12-8, 15:43:13, Emilia , Garrido, (424) 737-6255, 7 , 114, 142839, Esquina colegio la salle, 893, 136, 7 , Merida, Bomba mario charal, sector pie de llano, 28202563	2025-12-08 15:12:28
1603	10100438	Cierre Solicitudes	solicitudes	Insertar	\N	00:07:45, 2025-12-08, 15:41:07, 15:49:05, JOSE, MARQUEZ, (424) 722-2483, 63, 143082, CAFE EXPRESS, 943, , 136, 1 , UN GORDITO LLAMADO STIVEN TIRO UN TUMBA RANCHO A UN PANAL DE ABEJAS Y SE ENCENTRAN AGRESIVAS , SOLICITAN APOYO , Se realiza el procedimiento de la unidad de emergencia en el lugar, logrando exterminar los insectos (panal de abejas) con éxito , 0, 0, 0, FALSE, FALSE, 1, 0, MERIDA , AV 2 Y 3 , ENTRE CALLE 25 Y 24 , 10100438, 32488556, 1, 0, 3 	2025-12-08 15:12:31
1604	32488556	Nuevas Solicitudes	solicitudes	Insertar	\N	15:48:04, 2025-12-8, 15:48:04, jose  , colmenares, (424) 722-4832, 0, 0, 00, , 893, 136, 7 , , 32488556	2025-12-08 15:12:50
1605	10100438	Observaciones de Guardia	observaciones	Insertar	\N	Durante el proceso del dia hubo fuertes lluvias y se cayo el sistema troncalizado , , , , 136, 1	2025-12-08 15:12:14
1606	28202563	Nuevas Solicitudes	solicitudes	Insertar	\N	15:53:28, 2025-12-8, 15:53:28, Hector , Lavon, (424) 255-8366, 5 , 9, 143090, al lado de la farmacia fenix , 893, 136, 7 , Merida, Sector el sagrario, av 3 frente a la plaza  bolivar, a nivel de la gobernacion, al lado de la farmacia fenix., 28202563	2025-12-08 16:12:23
1607	32488556	Observaciones de Guardia	observaciones	Insertar	\N	 se informa que en la consola numero 4 se encuentra un carpeta de color amarillo dejada por un compañero se desconoce quien es el dueño , , , , 136, 4	2025-12-08 16:12:26
1608	28202563	Observaciones de Guardia	observaciones	Insertar	\N	Nota #1 Siendo las 15:10 se logra apreciar que en las camaras perimetral palacio de gobierno (plaza bolivar) tienen lag y la imagen se suele congelar, , , , 136, 4	2025-12-08 16:12:13
1609	28202563	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	61, 5, 6	2025-12-08 16:12:12
1610	28202563	CIERRE DE SESSION	USUARIO	VALIDAR	\N	51, LQuintero563, 4, 1, 28202563, 08/12/2025 | 16:18:13 	2025-12-08 16:18:13
1611	10100438	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	61, 2, 3, 4	2025-12-08 16:12:15
1612	10100438	Cierre de guardia	guardias	Insertar	\N	3, se realiza el cierre de guardia sin novedad	2025-12-08 16:12:26
1613	10100438	CIERRE DE SESSION	USUARIO	VALIDAR	\N	45, ELobo438, 3, 1, 10100438, 08/12/2025 | 16:18:28 	2025-12-08 16:18:28
1614	32488556	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	61, 5, 6	2025-12-08 16:12:52
1615	32488556	CIERRE DE SESSION	USUARIO	VALIDAR	\N	50, MPena556, 4, 1, 32488556, 08/12/2025 | 16:18:53 	2025-12-08 16:18:53
1616	16664398	Inicio de Session	Usuario	VALIDAR	\N	13, JVelazquez398, 2, \n\t\t\t1, 16664398, 08/12/2025 | 16:19:17 	2025-12-08 16:19:17
1617	16664398	Observaciones al personal de guardia	personal_guardias	Insertar	\N	se retira a realizar examen medico, con incorporarse a la guardia nuevamente, 2 , 32488556 , 135	2025-12-08 16:12:39
1618	16664398	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	1, 0, 0, 0, 2, 3, 0, 6, 216 , 135	2025-12-08 16:12:22
1619	16664398	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	61, 1	2025-12-08 16:12:29
1620	16664398	Cierre de guardia	guardias	Insertar	\N	3, cierre de guardia con la novedad de realizar cambios a los mensajes de ingre y registro.	2025-12-08 16:12:55
1621	16664398	CIERRE DE SESSION	USUARIO	VALIDAR	\N	13, JVelazquez398, 2, 1, 16664398, 08/12/2025 | 16:25:59 	2025-12-08 16:25:59
1622	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 08/12/2025 | 16:26:06 	2025-12-08 16:26:06
1623	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 08/12/2025 | 16:32:12 	2025-12-08 16:32:12
1624	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 09/12/2025 | 13:02:42 	2025-12-09 13:02:42
1625	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 09/12/2025 | 14:25:01 	2025-12-09 14:25:01
1626	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 09/12/2025 | 14:25:09 	2025-12-09 14:25:09
1627	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 09/12/2025 | 14:25:16 	2025-12-09 14:25:16
1628	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 09/12/2025 | 14:25:27 	2025-12-09 14:25:27
1629	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 09/12/2025 | 14:25:35 	2025-12-09 14:25:35
1630	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 09/12/2025 | 14:37:42 	2025-12-09 14:37:42
1631	18966872	Inicio de Session	Usuario	VALIDAR	\N	16, WMoya872, 2, \n\t\t\t1, 18966872, 09/12/2025 | 14:38:45 	2025-12-09 14:38:45
1632	18966872	Observaciones al personal	personal_guardias	Insertar	\N	se encontraba en el odontologo, 3 , 32148040 	2025-12-09 14:12:26
1633	18966872	Personal de Guardia	personal_grupos_guardias	Insertar	\N	18966872 , 16908218 , 32148040 , 31033723 , , , , , 20847648 , , , 13499752 , , , 31149149 , , , 4	2025-12-09 14:12:14
1634	18966872	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	62, 	2025-12-09 14:12:44
1635	18966872	Apertura de guardia	guardias	Insertar	\N	4, se recibe el telefono el telefono fuera de servicio....!!!\r\nobservaciones para la apertura de guardia	2025-12-09 14:12:25
1636	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 09/12/2025 | 14:50:14 	2025-12-09 14:50:14
1637	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 09/12/2025 | 14:50:47 	2025-12-09 14:50:47
1638		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 09/12/2025 | 14:50:52 	2025-12-09 14:50:52
1639	18966872	Inicio de Session	Usuario	VALIDAR	\N	16, WMoya872, 2, \n\t\t\t1, 18966872, 09/12/2025 | 14:50:59 	2025-12-09 14:50:59
1640	31033723	Inicio de Session	Usuario	VALIDAR	\N	46, MKeneth723, 4, \n\t\t\t1, 31033723, 09/12/2025 | 14:52:22 	2025-12-09 14:52:22
1641	31149149	Inicio de Session	Usuario	VALIDAR	\N	49, RPerez149, 3, \n\t\t\t1, 31149149, 09/12/2025 | 14:53:34 	2025-12-09 14:53:34
1642		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	62, 5, 6	2025-12-09 14:12:08
1643		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	62, 	2025-12-09 14:12:32
1644	31149149	Apertura de guardia	guardias	Insertar	\N	4, Al momento de recibir la guardia se encuentra todo sin novedad los equipos. 	2025-12-09 14:12:42
1645	31033723	Nuevas Solicitudes	solicitudes	Insertar	\N	14:54:15, 2025-12-9, 14:54:15, , , (412) 654-5586, 0 , 0, 00, , 893, 139, 6 , Llamada de Sabotaje , 31033723	2025-12-09 14:12:19
1646	32148040	Inicio de Session	Usuario	VALIDAR	\N	48, ULeonela040, 4, \n\t\t\t1, 32148040, 09/12/2025 | 14:59:55 	2025-12-09 14:59:55
1647		Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	62, 5, 6	2025-12-09 15:12:10
1648	32148040	Nuevas Solicitudes	solicitudes	Insertar	\N	15:02:30, 2025-12-9, 15:02:30, , , (042) 473-7625, 0, 0, 00, , 893, 140, 6 , , 32148040	2025-12-09 15:12:56
1649	31033723	Nuevas Solicitudes	solicitudes	Insertar	\N	14:59:23, 2025-12-9, 14:59:23, Sandra Jimenez, , (426) 778-5494, 8 , 0, 143009, Panaderia las delicias , 893, 140, 7 , , 31033723	2025-12-09 15:12:55
1650	31033723	Nuevas Solicitudes	solicitudes	Insertar	\N	15:03:59, 2025-12-9, 15:03:59, Susana  , perez, (426) 487-6523, 3 , 87, 143060, La panaderia el toque andino , 893, 140, 5 , La Parroquia, 31033723	2025-12-09 15:12:40
1651	32148040	Nuevas Solicitudes	solicitudes	Insertar	\N	15:03:02, 2025-12-9, 15:03:02, maria, perez, (412) 792-4526, 2 , 68, 143060, al frente de pastelitos la parroquia , 893, 140, 5 , Mérida, parroquia, 32148040	2025-12-09 15:12:20
1652	31033723	Nuevas Solicitudes	solicitudes	Insertar	\N	15:07:42, 2025-12-9, 15:07:42, Mario, Vazques , (422) 747-8635, 8 , 68, 143062, Segundo tanque de agua , 893, 140, 5 , Los curos parte alta , 31033723	2025-12-09 15:12:34
1653	31149149	Cierre Solicitudes	solicitudes	Insertar	\N	00:06:10, 2025-12-09, 15:07:42, 15:14:21, MARIO, VAZQUES , (422) 747-8635, 68, 143062, SEGUNDO TANQUE DE AGUA , 942, , 140, 4 , EL SOLICITANTE LLAMO DEBIDO A UNA COLISIóN DE VEHíCULO EN EL QUE TRANSITABA UNA MENOR DE EDAD  , Repetida de la solicitud 123 , 0, 0, 0, FALSE, FALSE, 0, 0, LOS CUROS PARTE ALTA , 31149149, 31033723, 0, 0, 0 	2025-12-09 15:12:34
1654	31033723	Nuevas Solicitudes	solicitudes	Insertar	\N	15:13:36, 2025-12-9, 15:13:36, Adrian, Bautista , (426) 558-9317, 6 , 2, 142928, Segundo piso local 3 , 893, 140, 5 , Urbanización Alto chama centro comercial Milenium, 31033723	2025-12-09 15:12:33
1655	31033723	Nuevas Solicitudes	solicitudes	Insertar	\N	15:17:38, 2025-12-9, 15:17:38, , , (426) 885-1374, 0 , 0, 00, , 893, 140, 6 , Llamada de sabotaje , 31033723	2025-12-09 15:12:16
1656	31149149	Cierre Solicitudes	solicitudes	Insertar	\N	00:11:57, 2025-12-09, 15:03:59, 15:16:08, SUSANA  , PEREZ, (426) 487-6523, 87, 143060, LA PANADERIA EL TOQUE ANDINO , 942, , 140, 3 , LA SOLICITANTE LLAMO PARA PEDIR AYUDAR POR UNA SEñORA QUE SE CAYó POR EL ATAQUE DE UN PERRO  , sin despacho no fueron el organismo al lugar , 0, 0, 0, FALSE, FALSE, 0, 0, LA PARROQUIA, 31149149, 31033723, 0, 0, 2 	2025-12-09 15:12:40
1657	31033723	Nuevas Solicitudes	solicitudes	Insertar	\N	15:18:19, 2025-12-9, 15:18:19, Carlos , colmenares, (426) 795-8335, 8 , 5, 142881, Escuela basica octulio picon , 893, 140, 5 , Sector el cambio , 31033723	2025-12-09 15:12:44
1658	31033723	Nuevas Solicitudes	solicitudes	Insertar	\N	15:23:46, 2025-12-9, 15:23:46, Carla , Montoya , (416) 857-3214, 0 , 0, 142129, , 893, 140, 7 , , 31033723	2025-12-09 15:12:15
1659	31149149	Cierre Solicitudes	solicitudes	Insertar	\N	00:18:29, 2025-12-09, 15:03:02, 15:21:35, MARIA, PEREZ, (412) 792-4526, 68, 143060, AL FRENTE DE PASTELITOS LA PARROQUIA , 942, , 140, 1 , LA SOLICITANTE INFORMA SOBRE UNA COLISIóN ENTRE UN VEHíCULO TIPO MOTO Y UN VEHíCULO TIPO CARRO, EN EL PADIMENTO SE ENCUENTRA UNA FEMENINA AFECTADA POR EL GOLPE, SE REQUIERE COMISIóN EN EL SITIO  , al sitio bomberos Mérida en la unidad lince 36 al CARGO DEL Teniente Marquez Mercedes , 0, 1, 1, FALSE, FALSE, 1, 1, MéRIDA, PARROQUIA, 31149149, 32148040, 1, 1, 2 	2025-12-09 15:12:20
1660	31149149	Cierre Solicitudes	solicitudes	Insertar	\N	00:23:35, 2025-12-09, 15:03:02, 15:27:07, MARIA, PEREZ, (412) 792-4526, 68, 143060, AL FRENTE DE PASTELITOS LA PARROQUIA , 942, , 140, 1 , LA SOLICITANTE INFORMA SOBRE UNA COLISIóN ENTRE UN VEHíCULO TIPO MOTO Y UN VEHíCULO TIPO CARRO, EN EL PADIMENTO SE ENCUENTRA UNA FEMENINA AFECTADA POR EL GOLPE, SE REQUIERE COMISIóN EN EL SITIO  , Al sitio la teniente Mercedes Marquez en la unidad lince 36 en compañía de cabo 1 Luis Sanchez, no visualizaron ningún hecho , 0, 0, 0, FALSE, FALSE, 1, 0, MéRIDA, PARROQUIA, 31149149, 32148040, 1, 0, 1 	2025-12-09 15:12:20
1661	31149149	Cierre Solicitudes	solicitudes	Insertar	\N	00:16:05, 2025-12-09, 15:13:36, 15:29:43, ADRIAN, BAUTISTA , (426) 558-9317, 2, 142928, SEGUNDO PISO LOCAL 3 , 938, , 140, 1 , EL SOLICITANTE LLAMó POR UN ROBO A UN COMERCIO EN EL CENTRO COMERCIAL , Se le informar al cuadrante correspondiente, atendiendo el Oficial Megias Miguel ed indicando que enviara comisión al sitio , 0, 0, 0, FALSE, FALSE, 0, 0, URBANIZACIóN ALTO CHAMA CENTRO COMERCIAL MILENIUM, 31149149, 31033723, 0, 0, 5 	2025-12-09 15:12:33
1692	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \r\n\t\t\t1, 99999999, 2026/10/20 | 16:59:46 	2026-10-20 16:59:46
1662	31149149	Cierre Solicitudes	solicitudes	Insertar	\N	00:13:49, 2025-12-09, 15:18:19, 15:32:13, CARLOS , COLMENARES, (426) 795-8335, 5, 142881, ESCUELA BASICA OCTULIO PICON , 937, , 140, 3 , EL SOLICITANTE LLAMó PARA INFORMAR QUE SU MOTO FUE ROBADA, No se pudo establecer comunicacion con el cuadrante p-18, 0, 0, 0, FALSE, FALSE, 0, 0, SECTOR EL CAMBIO , 31149149, 31033723, 0, 0, 5 	2025-12-09 15:12:44
1663	31149149	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	62, 	2025-12-09 15:12:53
1664	31149149	Cierre de guardia	guardias	Insertar	\N	4, Al entrega de la guardia no hubo ninguna novedad relevante. 	2025-12-09 15:12:31
1665	31149149	CIERRE DE SESSION	USUARIO	VALIDAR	\N	49, RPerez149, 3, 1, 31149149, 09/12/2025 | 15:34:33 	2025-12-09 15:34:33
1666	31033723	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	62, 5, 6	2025-12-09 15:12:48
1667	31033723	CIERRE DE SESSION	USUARIO	VALIDAR	\N	46, MKeneth723, 4, 1, 31033723, 09/12/2025 | 15:34:49 	2025-12-09 15:34:49
1668	32148040	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	62, 5, 6	2025-12-09 15:12:14
1669	32148040	CIERRE DE SESSION	USUARIO	VALIDAR	\N	48, ULeonela040, 4, 1, 32148040, 09/12/2025 | 15:35:16 	2025-12-09 15:35:16
1670	18966872	Observaciones al personal de guardia	personal_guardias	Insertar	\N	se retira con previa autorizacion y conocimiento, 8 , 31149149 , 139	2025-12-09 15:12:13
1671	18966872	Estadisticas de solicitudes	estadisticas_solicitud	Insertar	\N	2, 0, 2, 1, 3, 2, 0, 10, 224 , 139	2025-12-09 15:12:11
1672	18966872	Control de Bienes Salida Guardia	control_bienes	Insertar	\N	62, 	2025-12-09 15:12:37
1673	18966872	Cierre de guardia	guardias	Insertar	\N	4, se procede al cierre de guardia con la entrega del teléfono fuera de servicio	2025-12-09 15:12:20
1674		CIERRE DE SESSION	USUARIO	VALIDAR	\N	, , , , , 09/12/2025 | 15:45:22 	2025-12-09 15:45:22
1675	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 09/12/2025 | 15:45:27 	2025-12-09 15:45:27
1676	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 09/12/2025 | 15:48:43 	2025-12-09 15:48:43
1677	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 08/03/2026 | 19:29:17 	2026-03-08 19:29:17
1678	99999999	Modificar Bienes	bienes	MOFIFICAR	\N	123-456-789-147, TELEFONO, CISCO, RM-258-AC, GRIS, 14725-36985-145-2514, TELEFONO CON VOCINA DE ASIGNACION IP, 2021-11-08, M.P.P RELACIONES INTERIORES, JUSTICIA Y PAZ, EMERGENCIAS 911, MANTENIMIENTO POR FALLAS EL CONFIGURACION IP, 3, 3 , 2024-12-26, 5	2026-03-08 18:03:10
1679	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 08/03/2026 | 19:52:40 	2026-03-08 19:52:40
1680	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 08/03/2026 | 19:55:33 	2026-03-08 19:55:33
1681	99999999	Modificar de Usuario	usuario	MODIFICAR	\N	JVelazquez398, 2f5c5fb0c358b2e2556bd3fd1eba9287cf8d26cf, 2, 1, 16664398, 13	2026-03-08 18:03:21
1682	99999999	Modificar de Usuario	usuario	MODIFICAR	\N	JVelazquez398, c07eb5a8c0dc7bb81c217b67f11c3b7a5e95ffd7, 2, 1, 16664398, 13	2026-03-08 18:03:28
1683	16664398	Inicio de Session	Usuario	VALIDAR	\N	13, JVelazquez398, 2, \n\t\t\t1, 16664398, 08/03/2026 | 19:58:27 	2026-03-08 19:58:27
1684	16664398	Observaciones al personal	personal_guardias	Insertar	\N	el joven se incorpora luego de las 10:00 HLV, 8 , 15040226 	2026-03-08 19:03:34
1685	16664398	Personal de Guardia	personal_grupos_guardias	Insertar	\N	16664398 , , 15620802 , 28202563 , 27433433 , , , , 20847648 , , , 13499752 , , , 10100438 , , , 3	2026-03-08 19:03:05
1686	16664398	Control de Bienes Entrada Guardia	control_bienes	Insertar	\N	63, 1	2026-03-08 19:03:55
1687	16664398	Apertura de guardia	guardias	Insertar	\N	3, se procede a realizar la apertura de guardia sin novedad	2026-03-08 19:03:19
1688	16664398	Nuevas Solicitudes	solicitudes	Insertar	\N	19:03:26, 2026-3-8, 19:03:26, 19:03:26, , , (274) 256-3636, 0, 00, , 893, , 143, 6 , , , , , , 0, 0, , , , , 16664398, , , 	2026-03-08 19:03:59
1689	16664398	Nuevas Solicitudes	solicitudes	Insertar	\N	19:04:06, 2026-3-8, 19:04:06, 19:04:06, juan, gomez, (424) 263-2323, 0, 00, , 893, , 143, 7 , El Sr solicita conocer la hora, , , , , 0, 0, , , , , 16664398, , , 	2026-03-08 19:03:19
1690	99999999	CIERRE DE SESSION	USUARIO	VALIDAR	\N	1, Admin1234, 1, 1, 99999999, 08/03/2026 | 20:06:31 	2026-03-08 20:06:31
1691	99999999	Inicio de Session	Usuario	VALIDAR	\N	1, Admin1234, 1, \n\t\t\t1, 99999999, 13/08/2026 | 16:56:09 	2026-08-13 16:56:09
\.


--
-- Data for Name: cargos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cargos (id, nombre_cargo) FROM stdin;
1	Operador
2	Despachador
3	Supervisor
4	No aplica
\.


--
-- Data for Name: control_bienes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.control_bienes (id, fecha_creacion, grupo_personal_id, materiales_recibe, materiales_entrega) FROM stdin;
1	2021-11-08 13:11:25	1	1	\N
2	2021-11-08 14:11:55	1	2, 3, 4	\N
3	2021-11-08 14:11:59	1	2, 3, 4	\N
4	2021-11-08 14:11:41	1	\N	2, 3, 4
5	2021-11-08 15:11:49	1	\N	2, 3, 4
6	2021-11-08 15:11:02	1	\N	2, 3, 4
7	2021-11-08 15:11:12	1	\N	2, 3
8	2021-11-08 15:11:12	1	2, 3, 4	\N
9	2021-11-08 15:11:08	1	\N	1
10	2021-11-10 12:11:02	2	1	\N
11	2021-11-10 10:11:05	2	2, 3, 4	\N
12	2021-11-10 10:11:28	2	2, 3, 4	\N
13	2021-11-10 10:11:41	2	\N	2, 3, 4
14	2021-11-10 10:11:44	2	\N	2, 3, 4
15	2021-11-10 11:11:02	2	\N	1
16	2021-11-11 10:11:34	3	1	\N
17	2021-11-11 11:11:06	3	2, 3, 4	\N
18	2021-11-11 11:11:49	3	\N	2, 3, 4
19	2021-11-13 07:11:29	4	1	\N
20	2021-11-13 08:11:19	4	2, 3	\N
21	2021-11-13 09:11:15	4	\N	2, 3
22	2021-11-13 09:11:00	4	\N	1
23	2021-11-15 10:11:50	5	1	\N
24	2021-11-15 10:11:00	5	2, 3, 4	\N
25	2021-11-15 10:11:11	5	2, 3, 4	\N
26	2021-11-15 10:11:17	5	\N	2, 3, 4
27	2021-11-15 11:11:55	5	2, 3, 4	\N
28	2021-11-16 06:11:35	5	\N	1
29	2021-11-16 08:11:33	5	\N	2, 3, 4
30	2021-11-16 09:11:34	6	1	\N
31	2021-11-17 08:11:12	6	\N	1
32	2021-11-17 11:11:28	7	1	\N
33	2021-11-18 12:11:23	8	1	\N
34	2021-11-18 12:11:46	8	2, 3	\N
35	2021-11-18 13:11:53	8	2, 3, 4	\N
36	2021-11-19 08:11:16	8	\N	2, 3, 4
37	2021-11-19 08:11:16	8	\N	1
38	2021-11-19 08:11:46	8	\N	2, 3, 4
39	2021-11-23 09:11:57	9	1	\N
40	2021-11-24 08:11:50	9	\N	1
41	2021-11-24 11:11:16	10	1	\N
42	2021-11-24 13:11:03	10	2, 3, 4	\N
43	2021-12-03 13:12:48	11	1	\N
44	2021-12-05 12:12:53	12	1	\N
45	2021-12-05 14:12:44	12	3, 4	\N
46	2021-12-06 05:12:34	12	\N	1
47	2021-12-14 10:12:23	13	1	\N
48	2021-12-15 07:12:51	13	\N	1
49	2023-04-28 11:04:18	14	1	\N
50	2023-08-02 05:08:12	15	1	\N
51	2023-08-02 07:08:48	16	1	\N
52	2023-08-03 06:08:23	16	5, 6	\N
53	2023-08-03 06:08:40	16	\N	5, 6
54	2023-08-03 06:08:53	16	5, 6	\N
55	2023-08-03 06:08:12	16	\N	5, 6
56	2023-08-04 06:08:21	16	\N	5, 6
57	2023-08-10 05:08:46	17	1	\N
58	2023-08-13 17:08:24	18	1	\N
59	2023-08-20 07:08:32	18	5, 6	\N
60	2023-08-20 07:08:46	18	\N	5, 6
61	2023-08-20 07:08:26	18	5, 6	\N
62	2023-08-20 07:08:40	18	\N	5, 6
63	2023-08-20 07:08:30	19	1	\N
64	2023-08-20 07:08:01	20	1	\N
65	2023-08-23 05:08:25	21	1	\N
66	2023-08-31 04:08:07	22	1	\N
67	2023-09-19 20:09:56	23	1	\N
68	2023-09-19 22:09:24	24	1	\N
69	2023-09-19 22:09:46	25	1	\N
70	2023-10-03 05:10:25	26	1	\N
71	2023-10-05 22:10:36	27	1	\N
72	2024-02-29 10:02:45	28	1	\N
73	2024-03-07 11:03:14	29	1	\N
74	2024-03-07 15:03:01	29	\N	1
75	2024-03-12 14:03:56	30	1	\N
76	2024-03-14 10:03:48	31	1	\N
77	2024-03-19 11:03:46	32	1	\N
78	2024-03-22 08:03:00	33	1	\N
79	2024-03-26 13:03:17	34	1	\N
80	2024-03-26 15:03:23	34	\N	1
81	2024-03-30 13:03:00	35	1	\N
82	2024-03-30 15:03:05	35	\N	1
83	2024-04-09 12:04:06	36	1	\N
84	2024-04-11 12:04:58	37	1	\N
85	2024-04-11 13:04:03	37	2, 3, 4	\N
86	2024-04-11 13:04:03	37	2, 3, 4	\N
87	2024-04-11 15:04:19	37	5, 6	\N
88	2024-04-11 15:04:28	37	\N	5, 6
89	2024-04-16 12:04:27	37	2, 3, 4	\N
90	2024-04-16 12:04:58	38	1	\N
91	2024-04-18 09:04:13	39	1	\N
92	2024-04-18 15:04:48	39	\N	1
93	2024-04-25 15:04:36	40	1	\N
94	2024-05-28 12:05:28	41	1	\N
95	2024-07-10 10:07:40	42	1	\N
96	2024-07-10 10:07:22	42	5, 6	\N
97	2024-07-10 13:07:52	42	5, 6	\N
98	2024-07-10 14:07:52	42	\N	5, 6
99	2024-08-06 10:08:27	43	1	\N
100	2024-08-06 15:08:05	43	\N	1
101	2024-08-13 14:08:20	43	\N	5, 6
102	2024-08-13 15:08:05	43	\N	1
103	2024-08-15 10:08:16	44	1	\N
104	2024-08-27 05:08:55	45	1	\N
105	2024-08-27 14:08:16	45	\N	5, 6
106	2024-09-26 14:09:09	45	\N	5, 6
107	2024-10-04 11:10:13	46	1	\N
108	2024-10-04 12:10:42	46	\N	1
109	2024-10-04 12:10:42	46	\N	1
110	2024-10-15 11:10:53	46	\N	1
111	2024-10-15 11:10:28	47	1	\N
112	2024-10-15 14:10:18	47	\N	1
113	2024-10-17 11:10:03	47	5, 6	\N
114	2024-10-18 14:10:46	47	\N	1
115	2024-10-18 14:10:37	48	1	\N
116	2024-10-18 14:10:06	48	5, 6	\N
117	2024-10-18 14:10:06	48	5, 6	\N
118	2024-10-18 14:10:27	48	\N	5, 6
119	2024-10-18 14:10:27	48	\N	5, 6
120	2024-10-18 14:10:39	48	\N	1
121	2024-10-21 15:10:04	48	\N	5, 6
122	2024-10-22 10:10:42	48	\N	5, 6
123	2024-10-22 10:10:17	49	1	\N
124	2024-10-22 10:10:27	49	2, 3, 4	\N
125	2024-10-22 10:10:27	49	2, 3, 4	\N
126	2024-10-29 10:10:41	50	1	\N
127	2024-10-29 11:10:33	50	2, 3, 4	\N
128	2024-11-01 09:11:48	51	1	\N
129	2024-11-01 09:11:40	51	2, 3, 4	\N
130	2024-11-07 11:11:06	52	1	\N
131	2024-11-26 10:11:36	53	1	\N
132	2024-11-26 11:11:40	53	2, 3, 4	\N
133	2024-11-26 11:11:09	53	5, 6	\N
134	2024-11-26 11:11:09	53	5, 6	\N
135	2024-11-26 12:11:14	53	\N	5, 6
136	2024-11-26 12:11:12	53	\N	5, 6
137	2024-11-26 12:11:56	53	\N	5, 6
138	2024-11-26 14:11:48	53	\N	2, 3, 4
139	2024-11-26 14:11:01	53	\N	1
140	2024-12-03 09:12:49	54	1	\N
141	2024-12-03 09:12:46	54	2, 3, 4	\N
142	2024-12-03 15:12:33	54	\N	1
143	2024-12-17 08:12:04	55	1	\N
144	2024-12-17 17:12:33	55	2, 3, 4	\N
145	2024-12-17 17:12:26	55	\N	2, 3, 4
146	2024-12-17 17:12:26	55	\N	2, 3, 4
147	2024-12-17 17:12:53	55	\N	1
148	2025-07-17 11:07:54	56	1	\N
149	2025-07-17 11:07:02	56	5, 6	\N
150	2025-07-17 11:07:00	56	\N	5, 6
151	2025-07-17 11:07:41	56	2, 3, 4	\N
152	2025-07-17 11:07:22	56	\N	2, 3, 4
153	2025-07-17 14:07:08	56	\N	2, 3, 4
154	2025-07-17 15:07:23	56	\N	1
155	2025-08-05 17:08:23	57	1	\N
156	2025-11-28 13:11:23	58	1	\N
157	2025-11-28 13:11:53	58	5, 6	\N
158	2025-11-28 13:11:19	58	2, 3, 4	\N
159	2025-11-28 14:11:34	58	\N	5, 6
160	2025-11-28 14:11:40	58	\N	2, 3, 4
161	2025-11-28 14:11:41	58	\N	1
162	2025-12-02 16:12:53	59		\N
163	2025-12-02 16:12:28	59	5, 6	\N
164	2025-12-02 16:12:58	59	2, 3, 4	\N
165	2025-12-02 16:12:24	59	5, 6	\N
166	2025-12-02 16:12:48	59	\N	2, 3, 4
167	2025-12-02 16:12:03	59	\N	5, 6
168	2025-12-02 16:12:23	59	\N	5, 6
169	2025-12-02 16:12:00	59	\N	1
170	2025-12-04 15:12:29	60	1	\N
171	2025-12-04 15:12:48	60	2, 3, 4	\N
172	2025-12-04 15:12:19	60	5, 6	\N
173	2025-12-04 16:12:07	60	\N	5, 6
174	2025-12-04 16:12:06	60	\N	2, 3, 4
175	2025-12-04 16:12:37	60	\N	1
176	2025-12-08 15:12:27	61	1	\N
177	2025-12-08 15:12:25	61	2, 3, 4	\N
178	2025-12-08 15:12:56	61	5, 6	\N
179	2025-12-08 15:12:05	61	5, 6	\N
180	2025-12-08 16:12:12	61	\N	5, 6
181	2025-12-08 16:12:15	61	\N	2, 3, 4
182	2025-12-08 16:12:52	61	\N	5, 6
183	2025-12-08 16:12:29	61	\N	1
184	2025-12-09 14:12:44	62		\N
185	2025-12-09 14:12:08	62	5, 6	\N
186	2025-12-09 14:12:32	62		\N
187	2025-12-09 15:12:10	62	5, 6	\N
188	2025-12-09 15:12:53	62	\N	
189	2025-12-09 15:12:48	62	\N	5, 6
190	2025-12-09 15:12:14	62	\N	5, 6
191	2025-12-09 15:12:37	62	\N	
192	2026-03-08 19:03:55	63	1	\N
\.


--
-- Data for Name: director; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.director (cedula_dir, p_apellido_dir, s_apellido_dir, p_nombre_dir, s_nombre_dir, grado_instruccion_dir, cargo_dir) FROM stdin;
12900002	PAREDES	PAREDES	NEYLA		M/C	DIRECTORA
\.


--
-- Data for Name: estadisticas_solicitud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estadisticas_solicitud (id, efectivo, no_efectivo, sin_despacho, repetida, sabotaje, informacion, abandonada, total_solici, mayor_rele, mes, ano, guardia_id) FROM stdin;
1	40	10	7	35	378	71	73	614	3714045 	11	2021	1
2	6	0	3	15	188	4	13	234	3856309 	11	2021	10
3	4	1	3	14	116	10	16	176	3857403 	11	2021	19
4	17	2	7	5	457	21	23	535	3858460 	11	2021	23
5	21	0	4	9	341	6	96	477	3858952 	11	2021	28
6	19	4	3	17	357	18	86	504	3859503 	11	2021	31
7	17	0	3	9	422	19	108	578	3862144 	11	2021	37
8	21	3	5	11	324	11	56	431	3867446 	12	2021	42
9	23	4	2	6	246	14	36	331	3871770 	12	2021	45
10	2	1	1	0	2	1	1	9	55 	3	2024	62
11	1	0	0	0	2	2	0	5	78 	3	2024	68
12	1	0	0	0	2	3	0	6	81 	3	2024	70
13	1	0	0	0	0	0	0	1	127 	4	2024	78
14	1	0	0	0	1	1	0	3	140 	8	2024	83
15	1	0	0	0	4	3	0	10	140 	8	2024	83
16	1	0	0	0	3	1	0	5	159 	10	2024	88
17	1	0	0	0	3	1	0	5	159 	10	2024	88
18	1	0	0	0	3	1	0	5	159 	10	2024	88
19	1	0	0	0	0	0	0	1	160 	10	2024	92
20	1	0	0	0	0	0	0	1	160 	10	2024	92
21	1	1	0	0	1	0	0	3	163 	10	2024	95
22	5	0	0	0	3	0	1	9	175 	11	2024	105
23	1	0	1	0	0	0	0	2	182 	12	2024	109
24	1	0	0	0	0	0	0	1	184 	12	2024	112
25	1	0	0	0	0	0	0	2	186 	7	2025	117
26	2	1	0	1	2	3	0	9	188 	11	2025	123
27	3	1	0	0	3	3	0	11	201 	12	2025	127
28	3	0	0	1	2	1	0	7	209 	12	2025	131
29	1	0	0	0	2	3	0	6	216 	12	2025	135
30	2	0	2	1	3	2	0	10	224 	12	2025	139
\.


--
-- Data for Name: estado_bien; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estado_bien (id, estado_bien) FROM stdin;
1	Buen estado
2	Mal estado
3	Mantenimiento
4	Desincorporado
\.


--
-- Data for Name: estado_civil; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estado_civil (id, estado_civil) FROM stdin;
1	Soltero(a)
2	Casado(a)
3	Divorciado(a)
4	Concubino(a)
5	Viudo(a)
6	Otros
\.


--
-- Data for Name: estado_usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estado_usuario (id, nombre_estado) FROM stdin;
1	Activo
2	Inactivo
\.


--
-- Data for Name: estados; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estados (id, nombre_estado) FROM stdin;
1	AMAZONAS
2	ANZOATEGUI
3	APURE
4	ARAGUA
5	BARINAS
6	BOLIVAR
7	CARABOBO
8	COJEDES
9	DELTA AMACURO
10	DTTO. CAPITAL
11	FALCON
12	GUARICO
13	LARA
14	MERIDA
15	MIRANDA
16	MONAGAS
17	NUEVA ESPARTA
18	PORTUGUESA
19	SUCRE
20	TACHIRA
21	TRUJILLO
22	VARGAS
23	YARACUY
24	ZULIA
25	null
0	null
\.


--
-- Data for Name: estatus_personal; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estatus_personal (id, estatus) FROM stdin;
1	Activo
2	Comisión de Servicio
3	Inactivo
4	Permiso
5	Renuncia
6	Reposo
7	Traslado
8	Vacaciones
\.


--
-- Data for Name: estatus_solicitud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estatus_solicitud (id, tipo_estatus) FROM stdin;
1	Efectivo
2	No Efectivo
3	Sin Despacho
4	Repetida
6	Sabotaje
5	Pendiente
7	Información
8	Abandonada
\.


--
-- Data for Name: genero; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.genero (id, genero) FROM stdin;
1	Femenino
2	Masculino
\.


--
-- Data for Name: grado_instruccion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.grado_instruccion (id, grado_instruccion) FROM stdin;
1	Bachiller
2	Tecnico Medio
4	Universitario
5	Especialista
9	Maestria
10	Postgrado
11	Otros
3	Técnico Superior Universitario
\.


--
-- Data for Name: grupos_guardia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.grupos_guardia (id, nombre_grupo) FROM stdin;
1	GRUPO 1
2	GRUPO 2
3	GRUPO 3
4	GRUPO 4
5	GRUPO 5
6	GRUPO 6
7	GRUPO 7
\.


--
-- Data for Name: guardias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.guardias (id, fecha_inicio_g, fecha_fin_g, apertura_g, cierre_g, grupos_guardia_id, usuario_entrada_id, usuario_salida_id, control_bienes_id) FROM stdin;
1	2021-11-08 13:11:03	\N	SIN NOVEDAD	\N	1	16200660	\N	1
2	2021-11-08 14:11:18	\N	RECIBIENDO SIN NOVEDAD	\N	1	13499752	\N	3
3	2021-11-08 14:11:19	\N	RECIBI LA GUARDIA SIN NOVEDAD	\N	1	8042991	\N	3
4	2021-11-08 14:11:42	\N	HOY 08/11/2021 SE RECIBE LA GUARDIA EN EL SISTEMA INTEGRADO DE ARTICULACION DE ATENCION PARA LA ATENCION DE LA EMERGENCIAS VEN 9.1.1 GUARDIA DE 24 HORAS,	\N	1	17842117	\N	3
5	\N	2021-11-08 15:11:21	\N	PASDPASDPPAS	1	\N	13499752	7
6	\N	2021-11-08 15:11:24	\N	NO ESTA EL RADIO UHF	1	\N	17842117	5
7	\N	2021-11-08 15:11:53	\N	SE PROCEDE A EL CIERRE DE GUARDIA SN	1	\N	8042991	6
8	2021-11-08 15:11:20	\N	POLO	\N	1	13499752	\N	8
9	\N	2021-11-08 15:11:55	\N	REALIZAMOS EL CIERRE DE GUARDIA SIN NOVEDAD	1	\N	16200660	9
10	2021-11-10 12:11:20	\N	SE RECIBE EL SERVICIO DE LA GUARDIA SIN NOVEDAD CON LAS NOTAS ANTES EXPUESTAS, LAS áREAS LIMPIA Y EN ORDEN.	\N	3	16664398	\N	10
11	2021-11-10 10:11:19	\N	SE RCIBE EL SERVICIO DE GUARDIA SIN NOVEDAD.	\N	3	13499752	\N	12
12	2021-11-10 10:11:26	\N	SIENDO LAS 08:00 AM SE RECIBE LA GUARDIA SIN NOVEDAD	\N	3	20435049	\N	11
13	\N	2021-11-10 11:11:30	\N	SE REALIZA EL SIERRE DE GUARDIA CON BAJONES DE LUZ Y SIN NOVEDAD	3	\N	20435049	14
14	\N	2021-11-10 11:11:47	\N	SE REALIZO EL CIERRE DE GUARDIA CON LA NOVEDAD DE LOS BAJONES DE SISTEMA ELECTRICO	3	\N	13499752	14
15	\N	2021-11-10 11:11:22	\N	SE ENTREGA LA GUARDIA SIN MIVEDAD	3	\N	16664398	15
16	2021-11-11 10:11:21	\N	SE RECIBE EL áREAS DE TRABAJO ALGO SUCIO POR LO QUE EL PERSONAL DE MANTENIMIENTO NO VINO A REALIZAR EL MISMO	\N	4	23302896	\N	16
17	2021-11-11 11:11:45	\N	SIN NOVEDAD	\N	4	18123089	\N	17
18	\N	2021-11-11 11:11:07	\N	SIN NOVEDAD	4	\N	18123089	18
19	2021-11-13 08:11:17	\N	SE RECIBE LA GUARDIA SIN NOVEDADES RESALTANTES	\N	1	17129573	\N	19
20	2021-11-13 08:11:32	\N	 SE REALIZA LA APERTURA DE GUARDIA  DONDE EL RADIO  UHF NO SE ENCUENTRA EN EL áREA DE TRABAJO 	\N	1	18310118	\N	20
21	\N	2021-11-13 09:11:53	\N	SE REALIZO EL  CIERRE DE GUARDIA SIN NINGUNA NOVEDAD	1	\N	18310118	21
22	\N	2021-11-13 09:11:20	\N	SE ENTREGA EL SERVICIO SIN NOVEDADES RESALTANTES	1	\N	17129573	22
23	2021-11-15 10:11:55	\N	SE RECIBE EL SERVICIO CON LAS NOTAS ANTES EXPUESTAS, LAS AREAS EN ORDEN, BUEN ESTADO Y LIMPIAS.	\N	1	16200660	\N	23
24	2021-11-15 10:11:30	\N	SE RECIBE LA GUARDIA SIN NOVEDAD RELEVANTE.	\N	1	20435049	\N	24
25	2021-11-15 10:11:48	\N	BUENOS DIAS RECIBE LA GUARDIA LA SARGENTO SEGUNDO YADIRA RODRIGUEZ  DE BOMBEROS MERIDA  SIN NOVEDAD	\N	1	12356337	\N	25
26	2021-11-15 11:11:00	\N	HABRO EL SERVICIO SIN NOVEDAD	\N	1	8042991	\N	27
27	\N	2021-11-16 06:11:35	\N	SE HACE ENTREGA DEL SERVICIO CON LAS NOTAS ANTES DESCRITAS LAS AREAS EN ORDEN Y SEMI SUCIAS YA QUE EL PERSONAL DE LIMPIEZA NO TENIA LOS IMPLEMENTOS NECESARIOS.	1	\N	16200660	28
28	2021-11-16 09:11:31	\N	SE RECIBE EL SERVICIO CON LA NOVEDAD QUE LAS áREAS COMUNES SE ENCUENTRAN SIN MANTENIMIENTO 	\N	2	15620712	\N	30
29	\N	2021-11-17 08:11:42	\N	SE HACE ENTREGA DEL SERVICIO AL SUPERVISOR GABRIEL TORRES	2	\N	15620712	31
30	2021-11-17 11:11:19	\N	SE RECIBE EL SERVICIO DE GUARDIA SIN NOVEDAD CON LAS NOTAS ANTES EXPUESTAS, LAS áREAS EN ORDEN.	\N	3	16664398	\N	32
31	2021-11-18 12:11:06	\N	SE RECIBE LAS áREAS DEL VEN911 LIMPIAS Y EN BUEN ESTADO...	\N	4	16908218	\N	33
32	2021-11-18 12:11:10	\N	SE RECIBE EL SERVICIO POR 24 HORAS CONVEDADES RESALTANTES EL DIA DE AYER 17/11/2021 NO HUBO DESPACHADOR 	\N	4	22657819	\N	34
33	2021-11-18 13:11:23	\N	SE RECIBE GUARDIA SIN NOVEDAD	\N	4	17842117	\N	35
34	\N	2021-11-19 08:11:01	\N	SE ENTREGA LA GUARDAI SIN NOVEDAD A ESPERA DEL FUNCIONARIO. ENTRANTE 	4	\N	17842117	36
35	\N	2021-11-19 08:11:37	\N	SE HACE ENTREGA DEL SERVICIO SIN NOVEDAD.	4	\N	16908218	37
36	\N	2021-11-19 08:11:58	\N	SE ENTREGA EL SERVICIO SIN NOVEDAD \n	4	\N	22657819	38
37	2021-11-23 09:11:34	\N	SE RECIBE EL SERVICIO A LA ESPERA DE LOS DESPACHADORES, PARA EL MOMENTO PRECIPITACIONES EN EL TERRITORIO	\N	2	15620712	\N	39
38	\N	2021-11-24 08:11:24	\N	SE HACE ENTREGA DEL SERVICIO SIN NOVEDAD RELEVANTE, PARA LA ENTIDAD MERIDEñA FUERTES PRECIPITACIONES	2	\N	15620712	40
39	2021-11-24 11:11:36	\N	SE RECIBE LA GUARDIA SIN NOVEDAD.	\N	3	16664398	\N	41
40	2021-11-24 13:11:18	\N	SIENDO LAS 13:14 DEL DIA MIERCOLES 24/11/2021 SE RESIVE LA GURDIA SIN NOVEDADES RELEVANTES 	\N	3	15621210	\N	42
41	2021-12-03 13:12:20	\N	SE ENCUENTRA EN PERFECTO ESTADO, Y LA APERTURA DEL SERVICIO SIN NOVEDAD.	\N	5	11913073	\N	43
42	2021-12-05 13:12:22	\N	SE RECIBE EL SERVICIO CON LAS NOTAS ANTES EXPUESTAS LAS áREAS SEMI LIMPIAS Y EN ORDEN, MATERIAL DE APOYO 2 BOLíGRAFOS, 2 REGLAS, 1 RADIO MOTOROLA LTS 2000 CON PILA/GANCHO Y CARGADOR DE MESA, 1 RADIO TETRA HYTERA CON CARGADOR DE MESA, 1 TELéFONO ANDROID Z555 CON SU CARGADOR, GUíA MéDICA PRIORITY EN BUEN ESTADO, BOLSO ROJO CON MATERIAL DE CONTINGENCIA, LAS 8 CáMARAS DE SEGURIDAD EN BUEN ESTADO, LAS LLAVES DE LAS DIFERENTES OFICINAS, EN EL PASILLO SE ENCUENTRA 1 LAPTOP PARA EL CONTROL DE ASISTENCIA	\N	7	21183518	\N	44
43	2021-12-05 14:12:51	\N	SIN NOVEDAD	\N	7	11954012	\N	45
44	\N	2021-12-06 05:12:59	\N	SE HACE ENTREGA DE GUARDIA SIN NINGUNA NOVEDAD 	7	\N	21183518	46
45	2021-12-14 10:12:11	\N	SE RECIBE EL SERVICIO CON LA NOVEDAD QUE EL TELéFONO CELULAR ASIGNADO A SUPERVISIóN SE ENCUENTRA DETERIORADA LA PANTALLA CON FISURA EN TAN POCO TIEMPO DE USO Y DE SER ASIGNADO	\N	2	15620712	\N	47
46	\N	2021-12-15 07:12:37	\N	SE ENTREGA EL SERVICIO A LA ESPERA DEL CIERRE DEL PROCEDIMIENTO DE LA SOLICITUD NRO 3871999	2	\N	15620712	48
47	2023-04-28 11:04:36	\N	SE REALIZA LA APERTURA DE GUARDIA	\N	1	17129573	\N	49
48	2023-08-02 05:08:00	\N	SE PROCEDE A REALIZAR LA PRIMERA APERTURA DE GUARDIA DE ESTE AñO 2023	\N	4	23302896	\N	50
49	2023-08-02 07:08:58	\N	APERTURA DE GUARDIA	\N	4	23302896	\N	51
50	2023-08-10 05:08:42	\N	REALIZAMOS LA APERTURA DE GUARDIA, CON LA INTENCION DE REALIZAR MODIFICACIONES A FORMULARIOS DE SOLICITUDES Y SESIONES DE OPERADORES	\N	5	20200220	\N	57
51	2023-08-13 17:08:58	\N	REGISTRO DE APERTURA DE GUARDIA DE L DOMINGO 13 DE AGOSTO	\N	5	20200220	\N	58
52	2023-08-20 07:08:38	\N	APERTURA DE GUARDIA	\N	4	23302896	\N	63
53	2023-08-20 07:08:09	\N	APERTURA DE GUARDIA2	\N	4	23302896	\N	64
54	2023-08-23 05:08:37	\N	REALIZAMOS APERTURA DE GUARDIA	\N	4	23302896	\N	65
55	2023-08-31 04:08:32	\N	REALIZAMOS LA APERTURA DE GUARDIA PARA REALIZAR CAMBIOS A FORMULARIO DE CIERRE DE SOLICITUDES Y LOGRAR MOSTRAR EN ESTE EL NUMERO DE TELEFONO DEL CUADRANTE CORRESPONDIENTE	\N	4	23302896	\N	66
56	2023-09-19 20:09:25	\N	APERTURA DE GUARDIA SE REALIZACONLA INTENCION DE MODIFICAR FORMULARIO DE DESPACHO EN LA SECCION DE SOLICITUDES	\N	4	23302896	\N	67
57	2023-09-19 22:09:43	\N	APERTUA DE GUARDI, EVALUACION DE NUMERO DE CUADRANTES Y ORGANISMOS	\N	4	23302896	\N	68
58	2023-09-19 22:09:51	\N	ASDF	\N	4	23302896	\N	69
59	2023-10-03 05:10:00	\N	PRUEBAS CON FORMULARIO DE NUEVA SOLICITUD, AGREGANDO SELECT CON FILTRO DE BUSQUEDA	\N	4	23302896	\N	70
60	2023-10-05 22:10:49	\N	SE REALIZA APERTURA DE GUARDIA	\N	4	23302896	\N	71
61	2024-02-29 10:02:18	\N	SE PROCEDE A REALIZAR LA APERTURA DE GUARDIA LUEGO DE HABER CONCLUIDO CON LA CARGA DE TODOS LOS SECTORES DEL TERRITORIO MERIDEñO, Y SUS CUADRANTES DE PAZ. PROCEDEREMOS A REALIZAR PRUEBAS DE CARGA DE DATOS Y REGISTRO DE SOLICITUDES	\N	5	20200220	\N	72
62	2024-03-07 11:03:43	\N	REALIZAMOS LA APERTURA DE GUARDIA, CON MOTIVO A MODIFICAR LAS ESTADISTICAS AL MOMENTO DEL CIERRE DE GUARDIA Y DE LOGRAR QUE LOS DIAGRAMAS TOMEN LOS VALORES CORRECTOS	\N	4	23302896	\N	73
63	\N	2024-03-07 15:03:32	\N	SE PROCEDE A REALIZAR EL CIERRE DE GUARDIA CON LA NOVEDAD QUE SE HA MODIFICADO Y ACTUALIZADO EL FORMULARIO DE SOLICITUDES, Y CORRECIONES EN FORMULARIO DE ESTADISTICAS PARA EL CIERRE DE GUARDIA.\r\nQUEDANDO PENDIENTE CORREGIR LOS DIAGRAMAS EN FORMA DE TORTA, EL MENU "CONSULTA 911" Y VENTANA EMERGENTE PARA LA SELECCIóN DE MOTIVOS EN EL REGISTRO DE NUEVAS SOLICITUDES	4	\N	23302896	74
64	2024-03-12 14:03:37	\N	SE PROCEDE A REALIZAR APERTURA DE GUARDIA PARA MODIFICAR EL FUNCIONAMIENTO DE LAS ESTADISTICAS	\N	4	23302896	\N	75
65	2024-03-14 10:03:13	\N	REALIZAMOS APERTURA DE GUARDIA, PARA REVISAR Y MODIFICAR GRAFICA DE ESTADISTICAS\r\n	\N	4	23302896	\N	76
66	2024-03-19 11:03:14	\N	SE PROCEDE A REALIZAR MODIFICACIONES Y ACTUALIZACIóN DE DIAGRAMA DE TORTA, 	\N	4	23302896	\N	77
67	2024-03-22 08:03:26	\N	SE APERTURA LA GUARDIA, CON PISO LIMPIO LOS BAñOS SUCIOS SIN AGUA	\N	4	23302896	\N	78
68	2024-03-26 13:03:25	\N	APERTURA DE GUARDIA	\N	4	23302896	\N	79
69	\N	2024-03-26 15:03:26	\N	SE PROCEDE A REALIZAR EL CIERRE DE GUARDIA CON LA ESTADISTICAS EN FORMA DE DONA FUNCIONANDO, QUEDANDO PENDIENTE AGREGAR LA ESTADISTICAS EN BARRA	4	\N	23302896	80
70	2024-03-30 13:03:08	\N	APERTURA DE GUARDIA	\N	4	23302896	\N	81
71	\N	2024-03-30 15:03:48	\N	SE PROCEDE AL CIERRE DE GUARDIA LOGRANDO DEJAR LA GRAFICA TIPO DONA CON PORCENTAJE FUNCIONAL	4	\N	23302896	82
72	2024-04-09 12:04:22	\N	APERTURA DE GUARDIA A NIVEL SUPERVISORES\r\n	\N	4	23302896	\N	83
73	2024-04-11 12:04:07	\N	APERTURA DE GUARDIA	\N	4	16908218	\N	84
74	2024-04-11 13:04:24	\N	REALIZAMOS APERTURA DE GUARDIA A NIVEL DE DESPACHO DE BOMBEROS	\N	4	12356337	\N	85
75	2024-04-11 13:04:12	\N	2DA APERTURA DE GUARDIA	\N	4	12356337	\N	86
76	2024-04-16 12:04:45	\N	APERTURA DE GUARDIA CON USUARIO PC LUIS MORALES	\N	4	18123089	\N	89
77	2024-04-16 12:04:06	\N	APERTURA DE GUARDIA	\N	7	21183518	\N	90
78	2024-04-18 09:04:30	\N	APERTURA DE GUARDIA CON USUARIO NANCY VALERO	\N	1	17129573	\N	91
79	\N	2024-04-18 15:04:04	\N	PROCEDEMOS A REALIZAR EL CIERRE DE GUARDIA CON LA NOVEDAD QUE REALIZA CONSULTAS A REGISTROS PARA LA SECCION DE ESTADISTICAS DEL PERSONAL, MOSTRANDO LAS SOLICITUDES REGISTRADAS.\r\n\r\nQUEDANDO PENDIENTE LA TABLA Y GRAFICOS ESTADISTICOS	1	\N	17129573	92
80	2024-04-25 15:04:45	\N	APERTURA DE GUARDIA\r\n	\N	4	23302896	\N	93
81	2024-05-28 12:05:02	\N	REALIZAMOS LA APERTURA DE GUARDIA CORRESPONDIENTE A HOY MARTES SIN NOVEDAD	\N	1	17129573	\N	94
82	2024-07-10 10:07:17	\N	SE PROCEDE CON LA APERTURA DE GUARDIA	\N	1	17129573	\N	95
83	2024-08-06 10:08:53	\N	APERTURA DE GUARDIA, CON MOTIVO A CONSULTAS DE DESPACHADORES	\N	1	17129573	\N	99
84	\N	2024-08-06 15:08:15	\N	PROCEDEMOS AL CIERRE DE GUARDIA	1	\N	17129573	100
85	\N	2024-08-13 15:08:17	\N	REALIZAMOS EL CIERRE DE GUARDIA	1	\N	17129573	102
86	2024-08-15 10:08:34	\N	SE REALIZA APERTURA DE GUARDIA SIN NOVEDAD ALGUNA	\N	5	20200220	\N	103
87	2024-08-27 06:08:17	\N	SE PROCEDE A LA APERTURA DE GUARDIA 	\N	5	20200220	\N	104
88	2024-10-04 11:10:27	\N	APERTURA SIN NOVEDAD	\N	1	17129573	\N	107
89	\N	2024-10-04 12:10:52	\N	REALIZO EL CIERRE DE GUARDIA	1	\N	17129573	109
90	\N	2024-10-04 12:10:52	\N	REALIZO EL CIERRE DE GUARDIA	1	\N	17129573	109
91	\N	2024-10-15 11:10:01	\N	CIERRE DE GUARDIA	1	\N	17129573	110
92	2024-10-15 11:10:44	\N	SE PROCEDE3 A LA APERTURA DE GUARDIA	\N	5	20200220	\N	111
93	\N	2024-10-15 14:10:00	\N	SE PROCEDE AL CIERRE DE GUARDIA, REALIZANDO ACTUALIZACIONES AL FORMULARIO DE NUEVAS SOLICITUDES EN LA SECCIóN DE "ESTATUS DE SOLICITUD", ASí MISMO SE ACTUALIZA EL CONTENIDO DE PROTOCOLO DE EMERGENCIAS, BUSCANDO UNA VISUAL AGRADABLE Y FACIL DE LEER.	5	\N	20200220	112
94	\N	2024-10-18 14:10:54	\N	CIERRE GUARDIA	5	\N	20200220	114
95	2024-10-18 14:10:54	\N	APERTURA DE GUARDIA	\N	1	17129573	\N	115
96	\N	2024-10-18 14:10:57	\N	SE REALIZA EL CIERRE DE GUARDIA CON LA NOVEDAD DE REALIZAR UN PEQUEñO VIDEO INDICANDO LA SESION DEL OPERADOR, QUEDANDO CASI EN SU TOTALIDAD Y FUNCIONAL.\r\n\r\nSE DEJA LA OBSERVACION QUE FALTAN PROTOCOLOS DE EMERGENCIAS NUEVOS POR DESARROLLAR	1	\N	17129573	120
97	2024-10-22 10:10:06	\N	SE PROCEDE A LA APERTURA DE GUARDIA A NIVEL DE SUPERVISION, INICIANDO CAMBIOS, MODIFICACIONES Y ACTUALIZACIONES EN EL USUARIO DE DESPACHADORES	\N	5	20200220	\N	123
98	2024-10-22 10:10:23	\N	SE PROCEDE A LA APERTURA DE GUARDIA, MOTIVADO A REALIZAR PRUEBAS, MODIFICACIONES Y ACTUALIZACIONES	\N	5	12356337	\N	125
99	2024-10-22 10:10:23	\N	SE PROCEDE A LA APERTURA DE GUARDIA, MOTIVADO A REALIZAR PRUEBAS, MODIFICACIONES Y ACTUALIZACIONES	\N	5	12356337	\N	125
100	2024-10-29 10:10:20	\N	SE PROCEDE A LA APERTURA DE GUARDIA CON MOTIVO A MODIFICAR EL FORMULARIO DE "CIERRE DE SOLICITUD" O EN SU DEFECTO EL FORMULARIO DE "VER SOLICITUD"	\N	1	17129573	\N	126
101	2024-10-29 11:10:55	\N	SE REALIZA APERTURA DE GUARDIA, DEL USUARIO DESPACHADOR	\N	1	8042991	\N	127
102	2024-11-01 09:11:08	\N	SE REALIZA LA PAERTURA DE GUARDIA	\N	5	20200220	\N	128
103	2024-11-01 09:11:50	\N	APERTURA DE GUARDIA	\N	5	8042991	\N	129
104	2024-11-07 11:11:19	\N	SE PROCEDE A LA APERTURA DE GUARDIA CON MOTIVO A VERIFICAR FUNCIONALIDAD DEL FORMULARIO "CIERRE DE SOLICITUD" Y AJUSTE DE IMAGENES EN PANTALLA PRINCIPAL Y NUEVA SOLICITUD	\N	1	17129573	\N	130
105	2024-11-26 10:11:16	\N	SE PROCEDE A LA APERTURA DE GUARDIA DE PARA VERIFICAR FUNCIONALIDAD DE SESION DEL USUARIO DESPACHADOR	\N	5	20200220	\N	131
106	2024-11-26 11:11:04	\N	SE PROCEDE A INICIAR GUARDIA CON USUARIO DE DESPACHADOR POLICIA 	\N	5	8042991	\N	132
107	\N	2024-11-26 14:11:20	\N	SE REALIZA EL CIERRE DE GUARDIA VERIFICANDO EL FUNCIONAMIENTO CORRECTO DE LA SESION DE USUARIO DESPACHADOR	5	\N	8042991	138
108	\N	2024-11-26 14:11:37	\N	SE REALIZA EL CIERRE DE GUAIRDIA CON LA SESION DEL USUARIO DESPACHADOR, VERIFICADA	5	\N	20200220	139
109	2024-12-03 09:12:02	\N	SE REALIZA LA APERTURA DE GUARDIAN	\N	1	17129573	\N	140
110	2024-12-03 09:12:03	\N	SE REALIZA APERTURA DE GUARDIA DE DESPACHADORES	\N	1	8042991	\N	141
111	\N	2024-12-03 15:12:56	\N	SE PROCEDE EL CIERRE DE GUARDIA, ACOTANDO QUE SE REALIZA INSERCION DE CODIGO EN FORMULARIOS DE CONSULTA DE ESTADISTICAS DEL PERSONAL. QUEDANDO PENDIENTE EL EMPAREJAMIENTO CON DATOS EN PHP Y POSGRETSQL, PARA SU COMPLETA FUNCIONALIDAD	1	\N	17129573	142
112	2024-12-17 08:12:10	\N	SE REALIZA LA APERTURA PARA REALIZAR CAMBIOS ES FORMULARIO DE CONSULTA DEL PERSONAL, "ESTADISTICAS DEL PERSONAL"	\N	5	20200220	\N	143
113	2024-12-17 17:12:41	\N	APERTURA	\N	5	8042991	\N	144
114	2024-12-17 17:12:41	\N	APERTURA	\N	5	8042991	\N	144
115	\N	2024-12-17 17:12:34	\N	CIERRE DE GUARDIA	5	\N	8042991	146
116	\N	2024-12-17 17:12:08	\N	SE PROCEDE AL CIERRE DE GUARDIA CON LA NOVEDAD QUE EL FORMULARIO DE "ESTADISTICAS DEL PERSONAL" ESTá TOTALMENTE FUNCIONAL.\r\nQUEDANDO ATENTO Y PENDIENTE INICIAR LAS PRUEBAS DE USUARIO Y FUNCIONALIDAD.	5	\N	20200220	147
117	2025-07-17 11:07:13	\N	SE REIZA APERTURA DE GUARDIA EN DI DE HOY JUEVES 17 DE JULIO 2025	\N	2	15620712	\N	148
118	2025-07-17 11:07:55	\N	REALIZAMOS APERTURA GUARDIA A NIVEL DEL DESPACHADOR	\N	2	8042991	\N	151
119	\N	2025-07-17 11:07:33	\N	CIERRE DE GUARDIA DEL DESPACHADOR	2	\N	8042991	152
120	\N	2025-07-17 14:07:17	\N	CIERRE DE GUARDIA DEL FUNCIONARIO	2	\N	8042991	153
121	\N	2025-07-17 15:07:38	\N	CIRRE DE GUARDIA POR EL USUARIO DE SUPERVISION	2	\N	15620712	154
122	2025-08-05 17:08:31	\N	CONTROL 01	\N	1	17129573	\N	155
123	2025-11-28 13:11:40	\N	SE PROCEDE A LA APERTURA DE GUARDIA	\N	3	16664398	\N	156
124	2025-11-28 13:11:54	\N	SE HACE LA APERTURA DE LA GUARDIA, RECIBIENDO EL RADIO TRANSMISOR EN BUEN ESTADO, Y UN TELéFONO EN BUEN ESTADO, Y UNA COMPUTADORA EN BUEN ESTADO, Y SE RECIBE CON EL áREA LIMPIA Y UN  LIBRO DE NOVEDADES  	\N	3	20847648	\N	158
125	\N	2025-11-28 14:11:56	\N	SE PROCEDE AL CIERRE DE GUARDIA SIN NOVEDAD	3	\N	20847648	160
126	\N	2025-11-28 14:11:39	\N	SE PROCEDE A REALIZAR EL CIERRE DE GUARDIA CON LA NOVEDAD QUE HAY QUE MODIFICAR EL BANNER DE RECUPERACION DE CONTRASEñA Y MODIFICAR EL TIEMPO DE RESPUESTA Y COLORES PARA EL CIERRE SOLICITUDES	3	\N	16664398	161
127	2025-12-02 16:12:40	\N	SE APERTURA DE GUARDIA CON LA NOVEDAD QUE EL TELEFONO SE ENCUENTRA FUERA DE SERVICIO. RECIBIENDO LAS DEMAS PARTES DEL EQUIPO EN BUENAS CONDICIONES 	\N	2	15620712	\N	162
128	2025-12-02 16:12:30	\N	SE RECIBE LA GUARDIA SIN NOVEDAD ALGUNA	\N	2	10100438	\N	164
129	\N	2025-12-02 16:12:23	\N	SE PROCEDE AL CAMBIO DE GUARDIA SIN NOVEDAD ALGUNA	2	\N	10100438	166
130	\N	2025-12-02 16:12:16	\N	SE PROCEDE A REALIZAR EL CIERRE DE GUARDIA SIN NOVEDAD	2	\N	15620712	169
131	2025-12-04 15:12:52	\N	SE PROCEDE A REALIZAR LA APERTURA DE GUARDIA SIN NOVEDAD	\N	4	18966872	\N	170
132	2025-12-04 15:12:17	\N	SE PROCEDE A INICIAR GUARDIA SIN NOVEDAD	\N	4	31149149	\N	171
133	\N	2025-12-04 16:12:30	\N	SE PROCEDE A ENTREGAR GUARDIA SIN NOVEDAD	4	\N	31149149	174
134	\N	2025-12-04 16:12:28	\N	SE PROCEDE A REALIZAR EL CIERRE DE GUARDIA CON LA NOVEDAD DE CORREGIR EL CAMPO DE REGISTRO DE DIRECCIóN EN EL FORMULARIO DE REGISTRO DE PERSONAL.\r\n\r\nVISUALIZAR LOS REGISTROS DE GUARDIA ANTERIOS A NIVEL DE USUARIO OPERADORES	4	\N	18966872	175
135	2025-12-08 15:12:57	\N	SE RECIBE Y APERTURA LA GUARDIA SIN NOVEDAD	\N	3	16664398	\N	176
136	2025-12-08 15:12:37	\N	SE PROCEDE A LA APERTURA DE GUARDIA SIN NOVEDAD 	\N	3	10100438	\N	177
137	\N	2025-12-08 16:12:26	\N	SE REALIZA EL CIERRE DE GUARDIA SIN NOVEDAD	3	\N	10100438	181
138	\N	2025-12-08 16:12:55	\N	CIERRE DE GUARDIA CON LA NOVEDAD DE REALIZAR CAMBIOS A LOS MENSAJES DE INGRE Y REGISTRO.	3	\N	16664398	183
139	2025-12-09 14:12:25	\N	SE RECIBE EL TELEFONO EL TELEFONO FUERA DE SERVICIO....!!!\r\nOBSERVACIONES PARA LA APERTURA DE GUARDIA	\N	4	18966872	\N	184
140	2025-12-09 14:12:42	\N	AL MOMENTO DE RECIBIR LA GUARDIA SE ENCUENTRA TODO SIN NOVEDAD LOS EQUIPOS. 	\N	4	31149149	\N	186
141	\N	2025-12-09 15:12:31	\N	AL ENTREGA DE LA GUARDIA NO HUBO NINGUNA NOVEDAD RELEVANTE. 	4	\N	31149149	188
142	\N	2025-12-09 15:12:20	\N	SE PROCEDE AL CIERRE DE GUARDIA CON LA ENTREGA DEL TELéFONO FUERA DE SERVICIO	4	\N	18966872	191
143	2026-03-08 19:03:19	\N	SE PROCEDE A REALIZAR LA APERTURA DE GUARDIA SIN NOVEDAD	\N	3	16664398	\N	192
\.


--
-- Data for Name: motivo_protocolo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.motivo_protocolo (id, descripcion, motivo_id) FROM stdin;
69	-¿Cuántas personas fueron arrolladas?\n\n-¿Qué tipo de vehículo esta involucrado?\n\n-¿El vehículo involucrado esta en el sitio o se dio a la fuga?\n\n-¿La persona esta consciente o inconsciente?\n	69
5	-¿Cual es la ubicación exacta dónde sucedió el robo?\n\n-Punto de Referencia dónde sucedieron los hechos.\n\n-¿Es usted la persona agraviada?\n\n-De ser la persona agraviada:\n\n-¿Qué le robó el sujeto?\n\n-Características del sujeto que le practicó el robo.\n\n-¿El sujeto portaba algún tipo de arma?\n\n-¿Qué ruta tomó el sujeto?\n\n-¿Vá a esperar a la comisión policial en el sitio del hecho?\n\n-NOTA: De no hacer esperar el agraviado de la comisión policial, el operador le informará que en caso de detener al sujeto se le dejará en libertad, ya que no hay nada o nadie que lo señale como el autor de un hecho punible.\n\n-De ser un transeunte:\n\n-Informe caracteristicas del sujeto que practicó el robo.\n\n-¿Indique si el sujeto portaba algun tipo de arma?\n\n-¿Que ruta tomo el sujeto?\n	5
75	-¿Qué tipo de estructura colapso?\n\n-¿Conoce el motivo por el cual colapso la estructura?\n\n-¿Hay personas dentro de la estructura ¿cantidad aproximada?\n\n-¿Hay lesionados ¿Cuántos?\n\n-¿Hay fallecidos?\n\n-¿Observa presencia de llamas?.\n\n-Recomiende, según sea el caso:\n\n * Proceda a retirarse de la zona de impacto.\n\n-Según la magnitud y circunstancias debe notificar a la Policía, Bomberos, CICPC, Tránsito e INPRADEM.\n	75
76	-¿Qué sucede? ¿En qué lugar se encuentra el animal?\n\n-¿Conoce Ud el dueño del animal?\n\n-¿Qué especie de animal es?\n\n-¿La presencia del animal lesionó a alguien?\n\n-Recomiende, según sea el caso:\n\n * Por favor manténgase alejado del animal.\n\n * Por favor no pierda de vista los movimientos del mismo.\n\n * Manténgase atento a la comisión que se dirige al sitio.\n	76
112	-¿Tiene conocimiento de la sustancia ingerida?\n\n-¿Está consciente o inconsciente?\n\n-¿Ha presentado vómito?\n\n-¿Está sobresalivando? (Presenta espuma a nivel de la boca)\n\n-¿Presenta mareo o dolor abdominal?\n	112
67	-¿Qué tipo de vehículo colisionó o de que vehículo se trata: vehículos de cargas, vehículos familiares, unidades de transporte público, gandolas, motos entre otros?\n\n-Si es choque con objeto fijo, ¿Contra qué colisionó el vehículo?\n\n-Si volcó fuera de la vía ¿ hacia dónde y que distancia fuera de la vía volcó el vehículo.?\n\n-¿Cuántos lesionados hay aproximadamente?\n\n-Si se trata de un motorizado, recomiende no retirarle el casco.\n\n-Recomiende no movilizar a los lesionados, ni suministrar alimentos o bebidas.\n\n-¿Hay personas atrapadas?\n\n-¿Hay fallecidos?\n\n-Trate de colocar algúntipo de señalización disponible a una distancia aproximada de 3 a 5 m del hecho vial.\n\n-Si es vehículo de carga pregunte al solicitante ¿qué material transportaba el vehículo: químicos, maderas, papelería, combustible, Materia orgánica entre otros?\n\n-¿Hay presencia de fuego en el hecho ó derrame de combustible? Si la respuesta es sí, recomiende lo siguiente:\n\n * Por favor proceda a desconectar la batería del vehículo.\n\n * Si el vehículo esta en su fase incipiente (inicio de incendio), y el usuario posee un extintor de PQS recomiende:tome el extintor y proceda a acercarse hasta el punto de ignición y active el mismo.\n\n * Si está dentro del vehículo (bus), recomiende: utilice las salidas de emergencias (si es el caso conservar la llamada en línea).\n\n * Trate de neutralizar el combustible con árena o aserrín.\n\n * Trate de colocarle alguna cuña a las ruedas del vehículo para evitar que se desplace si esta en carreteras inclinadas.\n\n-Notifique a la Policía y Tránsito Terrestre.\n	67
70	-¿Tipo de vehículo del cual salieron expelida?\n\n-¿Cuántas personas salieron expelidas?\n\n-¿Esta consciente o inconsciente?\n\n-¿El vehículo involucrado está en el sitio o se dio a la fuga?\n	70
71	-¿Indique la dirección exacta: lugar en que cayó la aeronave?\n\n-¿Usted visualizó la caída de la misma?\n\n-¿Qué tipo de aeronave es: avión, helicóptero, avioneta entre otras.?\n\n-¿Sabes las coordenadas del avión. Si es si ¿Cuáles son?\n\n-Si el solicitante está en el sitio, pregunte ¿Hay sobrevivientes o heridos?; ¿La aeronave está en llamas? ; ¿La zona donde cayó, es inclinada o que tipo de topografía tiene?\n\n-Recomiende, según sea el caso:\n\n * Proceda a colocar los heridos en un lugar seguro.\n\n * Aplique los primeros auxilios si tiene conocimientos de los mismos.\n\n * Notifique a todos los organismos de seguridad ciudadana en general.\n	71
74	-¿En que está atrapada la persona?\n\n-Si la persona está atrapada en un Ascensor pregunte:\n\n * ¿Puede comunicarse con el conserje o alguien que posea la llave del ascensor? \n\n-Si la respuesta es no, continue preguntando:\n\n-¿Conoce el motivo por el cual el ascensor se detuvo o presento la falla. Ejem. Fallas en el fluido eléctrico.?\n\n-¿En qué piso se detuvo el ascensor.?\n\n-¿Cuántas personas quedaron adentro.?\n\n-Recomiende, según sea el caso:\n\n * Manténganse atenta a la comisión que va al sitio.\n\n * Si la situación se solventa por sus propios medios por favor notifíquelo al 9-1-1 nuevamente.\n	74
12	-Este motivo corresponde cuando la alarma se activa una vez que ha sido notificada la realización de la prueba de alarma.\n	12
13	-Este motivo corresponde cuando el banco / comercio notifica que va a efectuar una prueba de alarma.\n	13
19	-Indique las caraterísticas del Agresor.\n\n-¿Se encuentra el agresor en el lugar?\n \n-De no encontrarse ¿hacia que dirección se dirigió?.\n\n-¿Qué sucedió exactamente?\n\n-¿El agresor es conocido?\n\n-¿Hace cuánto ocurrio el hecho? \n\t\n-Si hace varios minutos y el agresor se retiro del lugar le sugiero que se traslade por sus propios medios a formular la denuncia por lo ocurrido.\n	19
21	-Indicarle el número del C.I.C.P.C. Directamente.\n	21
68	-¿Qué tipo de hecho vial es: colisión entre vehículos, vuelco sobre la vía, volcamiento fuera de la vía, choque con objeto fijo.?\n\n-¿Que tipo de vehículos colisionaron o de que vehículo se trata: vehículos de cargas, vehículos familiares, unidades de transporte público, gandolas, motos entre otros?\n\n-Si es choque con objeto fijo, ¿Con que colisiono?\n\n-¿Si volcó fuera de la vía, hacia donde y que distancia fuera de la vía fue el hecho?\n\n-Recomiende, según sea el caso:\n\n * Espere la comisión, en caso de llegar a mutuo acuerdo notifique para regresar la comisión/ Si la comisión tarda en llegar por favor vuelva a llamarnos.\n\n * En caso de que se fomente una riña o alguno de los vehículos se de a la fuga, notificar a la policía.\n	68
122	-Este motivo corresponde cuando la alarma se activa y no se ha notificado una realización de prueba de alarma.\n\t	122
47	-Indique la ubicación exacta donde se encuentra la persona.\n\n-¿Qué patología presenta?\n\n-¿Qué medicamentos ingiere la persona?\n\n-¿Tiene orden médica?.\n\n-¿Está alterado?.\n	47
48	-Indique la ubicación exacta donde se encuentra la persona.\n\n-¿Qué situación esta ocasionando la persona?.\n\n-¿En qué condiciones se encuentra?.\n	48
37	-Indique la ubicación exacta con puntos de referencia de donde se encuentra el o los sujetos.\n\n-¿Usted lo está observando en este justo momento?.\n\n-Informe de las características físicas del o los sujetos.\n\n-Según su criterio ¿Porque este sujeto presenta una actitud sospechosa?\n	37
14	-Indique las características de la víctima u occiso.\n\n-¿Que tipo de arma cree ud que fue utilizada: blanca o arma de fuego?\n\n-Si conoce las características del victimario, indique si se encuentra en el lugar, es conocido del sector, vecino u otro.\n\n-¿Sabe hace cuanto tiempo ocurrió el homicidio?, ¿Es ud. familiar del occiso?\n\n-Dónde se encuentra ubicada la victima (pavimento, cuneta, dentro de la vivienda u otro).\n\n-Que posición tiene el cuerpo, trate de resguardar la escena y no toque el occiso.\n\n-Espere la comisión.\n\n-El operador debe notificar al CICPC.\n	14
15	-Indique la ubicación exacta del sitio donde se lleva a cabo el hecho.\n\n-Informe las características del sujeto que lo agredió.\n\n-Fue agredido fisícamente, que tipo de lesiones recibio.\n\n-Requiere atención médica.\n\n-Considera que el agresor se encuentra bajo los efectos del alcohol o drogas.\n\n-El agresor porta arma blanca, objeto contundente o de fuego.\n\n-¿Que ruta tomó el sujeto agresor? ¿Se movilizó en un vehículo, moto, cooriendo, caminando?; en caso de haberse retirado del sitio.\n\n-¿Va hacer usted espera de la comisión policial en el sitio?\n\n-Por favor trasládese hasta el C.I.C.P.C a formular la respectiva denuncia.	15
17	-¿Indique la ubicación exacta del sitio donde se lleva a cabo el hecho.?\n\n-¿Tiene algún tipo de parentesco o relación con la persona que la/lo agredió.?\n\n-¿Fue agredido fisícamente, que tipo de lesiones recibió.?\n\n-¿Requiere atención médica.?\n\n-¿Considera que el agresor se encuentra bajo los efectos del alcohol o drogas.?\n\n-¿El agresor porta arma blanca, objeto contundente o de fuego.?\n\n-Describa la situación de los acontecimientos pausadamente.\n\n-En el caso de qué el solicitante notifique que el agresor(a) es su pareja, pregunte lo siguiente:\n\n-¿Requiere la presencia policial para que se retire el agresor?.\n\n-Recomiende:\n\n * Si el agresor esta atentando encontra de sus hijos o propia vida, trate de resguardase con un vecino o refugiarse en una habitación segura.\n\n * Comuniquese con algún vecino o familiar para que le preste apoyo mientras llega la comisión policial.\n\n * En caso de retirarse el sujeto agresor indique que ruta tomó.\n\n * Va hacer usted espera de la comisión policial en el sitio?\n	17
101	-¿La persona es hombre o mujer?\n\n-¿Qué edad tiene el paciente?\n\n-¿Está violento?\n\n-¿Posee algún tipo de arma?\n\n-¿Dónde está la persona en este momento?\n\n-Qué tipo de intento de suicidio es: sobredosis, envenenamiento (observa algún medicamento o sustancia que pudo haber ingerido) herida por arma de fuego, ahorcamiento, sofocación, heridas con hemorragias severas, entre otros. Según el caso revisar en las emergencias médicas el tipo de atención.\n\n-El operador debe notificar a la policía para que asegure la zona.\n\n-Recomiende:\n\n * Si no hay riesgo observe que está haciendo y manténganos informados.\n\n * Si no hay riesgo, protégela de si mismo.\n\n * Acuéstela y cálmela.\n\n * Si es intento de ahorcamiento corte de inmediato la cuerda y verifique su respiración.\n\n * Manténganse atenta a la comisión que va al sitio.\n	101
50	-¿Cuál es la dirección exacta?.\n\n-¿Cuáles son las características del vehículo? (marca, modelo, color, placa, año).\n\nNOTA: indicar números de grúas privadas al usuario como primera instancia sino se le indica a tránsito terrestre.\n\n-Si se trata de los túneles procesar la solicitud con Peajes.\n	50
45	-Indique el sitio exacto con puntos de referencia donde se encontro el vehículo.\n\n-Informe detalladamente las características del vehículo: Marca, Modelo, Año, Placas.\n\n-El vehículo recuperado fue denunciado al C.I.C.P.C.\n\n-Usted es el dueño o familiar del propietario.\n\n-El vehículo fue recuperado en estado de abandono o tienen retenido algún ciudadano.\n	45
38	-Informe detalladamente las características del vehículo: Marca, Modelo, Año, Placas.\n\n-Visualiza el o los sujetos sospechosos ¿qué características tienen: color de piel, cabello, tiene gorra, usa franela o camisa qué color?.\n\n-¿Que tiempo tiene observando el vehículo, que recorrido hace, comuniquese con algún vecino para preguntar si es algún familiar?\n\n-¿En caso de vehículo tiene vidrios con papel ahumado?\n\n-¿Cuando fue la última ves que observo el vehículo?\n\n-¿Es constante en el lugar o solo hace recorrido?\n\n-¿Que actitud tienen?\n	38
117	-Informe ubicación exacta y punto de referencia donde ocurrió el hecho.\n\n-Indique lo que observa en el sitio.\n\n-Manténgase a la espera en un sitio visible para que guie a la comisión policial hasta el lugar de los hechos.\n\n-Se enviara al sitio comisión del C.I.C.P.C.\n	117
116	-Informe ubicación exacta y punto de referencia donde ocurrió el hecho.\n\n-Indique lo que observa en el sitio.\n\n-Manténgase a la espera en un sitio visible para que guie a la comisión policial hasta el lugar de los hechos.\n\n-Se enviara al sitio comisión del C.I.C.P.C.\n	116
25	-Indique el sitio exacto con puntos de referencia dónde se encuentra el vehículo en estado de desvalijamiento.\n\n-¿Es Usted. El dueño del vehículo?\n\n-Indique las características del vehículo: Marca, Modelo ,Color y Placas\n\n-¿El vehículo fue desvalijado o lo están desvalijando?\n\n-Si fue desvalijado:\n\n * ¿Qué signos de desvalijamiento presenta el vehículo?\n\n * ¿Qué tiempo tiene el vehículo en el sitio?\n\n-En caso de estarlo desvalijando se solicita:\n\n * Características del sujeto que está desvalijando el vehículo.\n\n * ¿Está en otro vehículo o moto?, ¿Reconoce al agresor a simple vista?\n	25
59	-¿Dónde se produjo el corto circuito?\n\n-¿Hay luz en el sector?\n\n-¿Hay llamas producto del mismo?\n\n-¿Hay viviendas afectadas?\n\n-Sabe si hay personas dentro de esas viviendas ¿Cuántas?\n\n-Hay lesionados ¿Cuántos?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Por favor proceda a desconectar el fluido eléctrico de la vivienda.\n\n * Desaloje la vivienda, si el corto circuito amenaza con incendiar la estructura.\n\n * No aplique agua si hay llama (el agua es conductor de la electricidad)\n\n-El Operador debe notificar a CORPOELECT.\n\n-Manténganse atento(a) a la comisión que va al sitio.\n	59
150	-Mantenga la calma para que logre suministrar la información necesaria.\n\n-Indique el sitio exacto dónde observó la situación de rapto.\n\n-Informe las características del vehículo en el que fue introducido el raptado.\n\n-Informe las características de los sujetos que sometieron al raptado.\n\n-¿Portaban algún tipo de armas?\n\n-¿Qué ruta tomaron los sujetos?\n\n-De saberlo indique el nombre de la persona raptada.\n\n-Informe las características físicas del raptado: Estatura, Color de piel, Color de cabello.\n\n-Informe cómo está vestida la persona raptada.\n\n-En caso de encontrarse en persecución de los delincuentes:\n\n * Sea prudente para no llegar a ser observado por lo sujetos.\n\n * No abandone la línea.\n\nNOTA: El operador deberá pasar esta llamada al despachador de la policía, a fin de hacerle seguimiento al procedimiento policial, y lograr así la detención de los sujetos y la liberación de la persona afectada.\n	150
20	-Informe la dirección exacta dónde están sucediendo los hechos.\n\n-Indique un punto de referencia para que sea rápidamente ubicable la dirección.\n\n-¿Hay alguna persona lesionada o herida en el sitio, que requiera ser atendido?\n\n-¿Indique si tiene consanguinidad o con el agresor? \n\n * Si la respuesta es Sí, pregunte: ¿Es la primera vez que le agrede?, ¿Tiene alguna denuncia previa?\n\n-¿La situación le permite hacer espera de la comisión policial en la parte externa de la vivienda?\n\n-¿El agresor porta arma blanca, objeto contundente o de fuego.?\n\n-¿Presume que esta bajo los efectos de alcohol o estupefacientes?\n\n-Informe las características de la persona agresora en caso de haberse retirado del sitio.\n\n-En caso de que desee formular denuncia, puede dirigirse a los siguientes entes u organismos encargados:\n\n * Fiscalía del ministerio público.\n\n * C.I.C.P.C\n\n * Departamento de atención al público del Cuartel General de la Policía del Estado Mérida.\n\n * GUANAPEM, en caso de haber menores involucrados en la situación de violencia. Ubicada en la Av. 16 de septiembre.\n	20
22	-¿Qué bien material esta siendo dañado (casa, vehículo, entre otro)?\n\n-¿Se encuentra el agresor en el lugar? De no encontrarse ¿hacia que dirección se dirigió?.\n\n-¿El agresor es conocido?\n\n-¿Hace cuánto ocurrió el hecho?\n\n-¿El agresor arremete contra los bienes?\n\n-Si el agresor se retiro del lugar se sugiere trasladarse por sus propios medios a formular la denuncia por lo ocurrido.\n	22
23	-Informe la dirección exacta dónde están sucediendo los hechos.\n\n-¿Ud. es vecino del sector o propietario del terreno?\n\n-¿Sabe Ud. Si el dueño se encuentra, está de viaje o está sola la propiedad?\n\n-¿Qué cantidad de personas están invadiendo la propiedad , son del sector o ajenos al sitio?\n\n-¿Hay menores de edad involucrados?\n	23
24	-Indique el sitio exacto con puntos de referencia dónde se encuentra el vehículo en estado de desvalijamiento.\n\n-¿Es Usted. El dueño del vehículo?\n\n-Indique las características del vehículo: Marca, Modelo ,Color y Placas\n\n-¿El vehículo fue desvalijado o lo están desvalijando?\n\n-Si fue desvalijado:\n\n * ¿Qué signos de desvalijamiento presenta el vehículo?\n\n * ¿Qué tiempo tiene el vehículo en el sitio?\n\n-En caso de estarlo desvalijando se solicita:\n\n * Características del sujeto que está desvalijando el vehículo.\n\n * ¿Está en otro vehículo o moto?, ¿Reconoce al agresor a simple vista?\n	24
63	-¿Qué tipo de insecto es el que debe exterminarse: Abeja, avispas, arañas entre otros?\n\n-¿En qué parte de la estructura esta el panal?.\n\n-¿Qué tan grande es, compárelo con algo común?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Este tipo de exterminio se realiza en horas nocturna según el caso.\n\n * Recomiende adquirir los siguientes implementos: Baigon y fósforo. Para eliminar el peligro.\n\n * Manténganse atenta a la comisión que va al sitio.\n	63
64	-Si la emergencia ocurre en un local pregunte:\n\n * ¿Qué ocurre exactamente?\n\n * ¿Sabe qué producto se almacena?\n\n * ¿Hay personas en el lugar con difucultad respiratoria o inconscintes?¿Cuántos?\n\n * ¿Sabe de dónde proviene la sustancia química?\n\n-Si la emergencia ocurre en un vehículo pregunte:\n\n * Indique las características del mismo.\n\n * Busque visualmente la figura en forma de rombo que identifica el material transportado. Por favor describa.\n\n-Pasar la llamada de forma inmediata a despacho de bomberos.\n	64
65	-Indique el sitio exacto con puntos de referencia, donde se encuentra el obstáculo.\n\n-¿Qué tipo de obstáculo es? Animal, arboreo, vehícular, deslizamiento, talud, desbordamientos de ríos o quebrada.\n\n-¿Qué parte de la calzada obstaculiza el objeto?\n\n-¿Hay paso?\n\n-¿Cuál es la magnitud del objeto?\n\n-¿Hay heridos?\n	65
85	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-¿Respira con normalidad?\n\n-¿Siente hormigueo en el cuerpo?\n\n-Pregúntele si tiene zumbido en el oído (ACV en proceso)\n\n-Presente náusea o vomito (ACV en proceso)\n\n-Han tomado sus cifras tensiónales ¿en cuánto esta?\n\n-Tiene antecedentes de hipertensión o de ACV.\n	85
87	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-¿Está consciente o inconsciente?\n\n-Observa usted alguna fractura, ¿dónde?\n\n-¿Está sangrando?\n	87
91	-¿Hace cuánto tiempo apareció el dolor?\n\n-¿En qué parte del cuerpo tiene el dolor?\n\n-¿Hacia donde se irradia el dolor?\n\n-¿Además del dolor hay vómito, náuseas o cualquier otro síntoma?\n\n-En una escala del 1 al 10, ubique la intensidad del dolor.\n\n-¿Padece alguna enfermedad?\n	91
95	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-¿Cuántos episodios convulsivos ha presentado?\n\n-¿Está respirando ahora?\n\n-¿Está embarazada?\n\n-¿Tiene antecedentes de importancia?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * No trate de introducir nada en su boca.\n\n * Retire cualquier objeto extraño de sus vías respiratorias.\n\n * Verifique la respiración después de la convulsión.\n\n * Aleje del paciente cualquier objeto peligroso.\n\n * Después de la convulsión, con cuidado acueste el paciente de lado por si vomita.\n\n * No permita que camine.\n	95
176	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-¿Está consciente o inconsciente?\n\n-¿Cómo fue el accidente?\n\n-¿Sabe cual fue la fuente que originó la descarga?\n\n-¿Hace cuánto tiempo ocurrió la descarga? Si no ha pasado diez minutos recomiende no tener contacto físico con el lesionado.\n\n-¿Cayo de otra altura?\n	176
98	-¿Qué síntomas presenta?\n\n-¿Qué temperatura corpotal tiene?\n\n-¿Está ubicado en tiempo y espacio?\n\n-¿Se puede movilizar por sí solo?\n\n-¿A qué hora fue su última alimentación?\n\n-¿Está tomando algún tratamiento?\n	98
108	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-La atención primaria se realiza solo cuando el paciente va a ser atendido en su residencia, o cuando requiera administración de medicamentos (con récipe médico).\n	108
110	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-¿Respira con normalidad?\n\n-¿En qué parte del abdomen presenta el dolor?\n\n-¿Presenta dolor en alguna de las piernas?\n\n-¿Tiene antecedentes de alguna enfermedad?\n\nNOTA: Cuando se trata de una apendicitis en proceso el dolor es fuerte en el cuadrante del abdomen fosa iliaca derecha y por lo general el dolor se irradia a la extremidad inferior derecha.\n	110
213	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-¿Está consciente o inconsciente?\n\n-Observa usted alguna fractura, ¿dónde?\n\n-¿Está sangrando?\n	213
230	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-¿Está consciente o inconsciente?\n\n-Observa usted alguna fractura, ¿dónde?\n\n-¿Está sangrando?\n	230
61	-¿Qué magnitud tiene el incendio?\n\n-¿Hay viviendas o alguna estructura en riesgo?\n	61
62	-¿Que tipo de vehículo esta involucrado?\n\n-¿El derrame fue por falla mecánica o por accidente vial?\n\n-¿Cuál es la magnitud del derrame?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Tratar de establecer una zona de seguridad para alejar posibles causas de incendio.\n\n * Si tiene arena o aserrín cerca, debe colocar gran cantidad encima del derrame.\n\n * Manténgase atento a la comisión que va al sitio.\n	62
94	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-Puede hablar: \n\n * A si, habla con normalidad \n\n * B no, esta ahogado.\n\n-¿Está sudando o cambiando de color?\n\n-Tiene algún antecedente de importancia.\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Asegúrese que las vías respiratorias no estén obstruidas.\n\n * Verifique su respiración.\n\n * Ayúdelo a adoptar la posición más cómoda.\n\n * Mantenga a la mano los medicamentos que consume.\n\n * Mande a alguna persona a que este atenta a la llegada de la comisión.\n	94
231	-¿El paciente es hombre o mujer?\n-¿Qué edad tiene el mismo?\n\n-¿Está consciente o inconsciente?\n\n-Observa usted alguna fractura, ¿dónde?\n\n-¿Está sangrando?\n	231
88	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene?\n\n-¿Desde cuándo presenta la fiebre?\n\n-¿Ha sido valorado en algún centro asistencial?\n\n-¿Tiene tratamiento?\n	88
86	-¿Presenta dolor toraxico?\n\n-¿Tiene dificultad para respirar?\n\n-¿Qué color de la piel presenta?\n\n-¿Presenta dolor?\n\n-¿Qué antecedentes tiene? ¿Asma, Hipertensión, Enfermedad del corazón?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Mantenga la calma, mantengase atento a la llegada de la comisión.\n\n * Si tiene conocimiento de Primeros Auxilio, mantengase en línea. El operador debe pasar la llamada a despacho bomberos para que de las indicaciones.\n	86
96	-¿El paciente es hombre o mujer?\n-¿Qué edad tiene el mismo?\n\n-¿Como ocurrió el hecho?\n\n-Sabe el rumbo que tomaron los agresores ¿Cómo visten? Y datos relacionados a los mismos como ruta de escape y vehículos.\n\n-¿En qué parte del cuerpo presentó las heridas?\n\n-¿Presenta fuerte hemorragia?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Trate de buscar un aposito para detener la hemorragia sin hacer mayor presión.\n\n * Informe que ya se enviaron comisiones al sitio y recomiende:\n\n ** Trate de colocar algún apósito que ayude a detener las hemorragias haciendo presión.\n\n ** No altere la escena del crimen no mueva nada.\n	96
97	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-¿Tiene algún antecedente de importancia?\n\n-¿Tiene algún problema cardíaco?\n\n-¿Respira con normalidad?\n\n-¿Es la primera vez que se desmaya hoy?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Verifique sus vías aéreas. ¿Respira con normalidad?\n\n * Manténgase atento a la comisión de bomberos.\n	97
104	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene?\n\n-¿Desde cuándo presenta la fiebre?\n\n-¿Ha sido valorado en algún centro asistencial?\n\n-¿Tiene tratamiento?\n	104
99	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-¿Respira o traga con dificultad?\n\n-¿Está alerta?, ¿puede hablar?\n\n-¿Cuál puede ser la posible causa de la reacción?: medicamentos, alimentos, químicos, etc.\n\n-Tiene antecedente de importancia.\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Mantenga constante seguimiento al paciente.\n\n * Verifique si respira, que no tenga objetos extraños en las Vías respiratorias.\n\n * Mantener la llamada en línea si la situación del paciente es inestable y transferir al despacho de bomberos.\n	99
102	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-¿En qué parte del cuerpo presenta sangrado?\n\n-¿Cuál fue la causa de la herida?\n\n-Si es vaginal ¿Está embarazada? (Ver Motivo: Aborto)\n\n-¿Cómo es su frecuencia respiratoria?\n\n-¿Sabe si sufre de hemofilia?\n\n-La sangre es constante (hemorragia venosa) ó abundante e intermitente (hemorragia Arterial)\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Trate de colocar algún apósito que ayude a detener las hemorragias haciendo presión.\n\n * No aplique torniquetes (al menos que sea una amputación traumática)\n\n * Llame de nuevo si la condición del paciente empeora.\n\n-Si la herida es por riña el operador debe asignar a la policía.\n	102
103	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-¿Qué especie animal mordió o pico al paciente?\n\n-¿Sabe si es venenoso?\n\n-¿Presenta herida o hemorragia?\n\n-¿Presenta dolor?\n\n- Recomendaciones:\n\n * Si observa el animal que causó el daño no lo pierda de vista y en caso de que pueda colocarle algún objeto que lo atrape o tomele una foto. Esto permitirá saber que antídoto colocarle al paciente.\n	103
105	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene?\n\n-¿Esta pálido sudoroso y frío?\n\n-¿Ha sido valorado en algún centro asistencial?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Si esta en el páramo es recomendable comenzar a bajar el paciente.\n\n * Abríguelo bien.\n\n * Si esta inconsciente voltee la cara a un lado y levante sus piernas 45º aproximadamente.\n	105
109	-¿Presenta dolor a nivel lumbar? ¿o a nivel del riñón?\n\n-En una escala del 1 al 10, ubique la intensidad del dolor.\n\n-Si es mujer. ¿Cuándo fue su último ciclo menstrual? ¿Lo está presentando?\n	109
111	-¿Sabe usted Si el ciudadano es consumidor regular de sustancias estupefacientes?\n\n-¿Observa si tiene la vista enrrojecida?\n\n-¿Puede diferenciar cómo tiene la pupila: grande, pequeña o normal?\n\n-¿Qué conducta tiene?\n\n-¿Está tranquila o alterada?\n\n-¿Está sobresalivando? (Presenta espuma a nivel de la boca)\n\n-¿Tiene conocimiento de la sustancia ingerida?\n	111
120	-Informe ubicación exacta y punto de referencia donde esta ocurriendo el hecho (río, quebrada, lago, piscina, tanque, entre otros.)\n\n-Informe ubicación exacta y punto de referencia donde esta ocurriendo el hecho (río, quebrada, lago, piscina, tanque, entre otros.)\n\n-La persona es un niño, adolescente o adulto ¿Qué edad?\n\n-Sabe cuánto tiempo tiene la persona en ese estado.\n\n-Observa algún tipo de herida.\n\n-Tiene los medios para trasladarlo de no ser así mantengase atento a la ayuda.\n	120
84	-¿Qué edad tiene el mismo?\n\n-¿En qué parte del cuerpo es la fractura?\n\n-¿Cuál fue la causa de la fractura?\n\n-¿Observa usted hemorragia, o puede visualizar si el hueso está expuesto?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * No mueva la persona.\n\n * Controle la hemorragia con alguna gasa o paño limpio sobre la herida.\n\n * No aplique el torniquete (se usa solo en caso de amputación traumática).\n\n * Recomiende inmovilizar el miembro afectado con alguna férula improvisada.\n	84
92	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-¿Tiene antecedentes cardiacos?\n\n-¿Está consciente o inconsciente?\n\n-¿El dolor es en el pecho?, ¿se irradia al brazo izquierdo?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Enviar la comisión rápidamente – Pasar la llamada a despacho bomberil.\n \n * Aplicar RCP (Reanimación Cardio Pulmonar)\n \n * Estar atentos a cualquier cambio en el paciente.\n	92
106	-¿El paciente es hombre o mujer?\n\n-¿Qué edad tiene el mismo?\n\n-¿Por qué sufrió las quemaduras?\n\n-¿En qué lugar del cuerpo presenta las quemaduras?\n\n-¿Se encuentra consciente o inconsciente?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * No aplique nada sobre las quemaduras como cebolla, crema dental, café.\n\n * Mantenga la persona calmada.\n	106
3	-¿Cual es la ubicación exacta dónde sucedió el robo?\n\n-Punto de Referencia dónde sucedieron los hechos.\n\n-¿Es usted la persona agraviada?\n\n-De ser la persona agraviada:\n\n-¿Qué le robó el sujeto?\n\n-Características del sujeto que le practicó el robo.\n\n-¿El sujeto portaba algún tipo de arma?\n\n-¿Qué ruta tomó el sujeto?\n\n-¿Vá a esperar a la comisión policial en el sitio del hecho?\n\n-NOTA: De no hacer esperar el agraviado de la comisión policial, el operador le informará que en caso de detener al sujeto se le dejará en libertad, ya que no hay nada o nadie que lo señale como el autor de un hecho punible.\n\n-De ser un transeunte:\n\n-Informe caracteristicas del sujeto que practicó el robo.\n\n-¿Indique si el sujeto portaba algun tipo de arma?\n\n-¿Que ruta tomo el sujeto?\n	3
78	-¿Conoce la magnitud del sismo?\n\n-¿Hay personas lesionadas?\n\n-¿Hay viviendas o estructuras afectadas?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Calmar al solicitante.\n\n * Indicar que hacer durante y después de un sismo, por si acaso hay replicas.\n	78
77	-¿El derrumbe está obstaculizando el paso vehicular?\n\n-¿Hay congestionamiento vehicular?\n\n-¿Hay alguna vivienda o vehículo afectado por el deslizamiento?\n\n-Si es positivo, hay personas adentro ¿Cuántos?\n\n-¿Hay más viviendas en riesgo?\n\n-¿Hay personas lesionadas o desaparecida?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Por favor alejese de la zona de impacto.\n\n * Proceda a desalojar las viviendas en riesgos.\n\n * Ubique un lugar seguro.\n\n * Desconecte la electricidad.\n\n * Cierre la llave del gas.\n	77
79	-A que se debe la inundación, es decir, por desbordamiento de rio, tuberias rotas, fuertes precipitaciones entre otros.\n\n-Cuantas viviendas hay involucradas o en riesgo.\n\n-Hay lesionados o fallecidos.\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Ubique un lugar seguro.\n\n * Coloque sus enceres del hogar en lugares altos.\n\n * Recupere sus pertenencias\n	79
80	-Hay viviendas afectadas ¿Cuántas? \n\t\n-Hay personas lesionadas ¿Qué presentan?\n\n-Hay personas incomunicadas ¿Cuántas y en que circunstancia?\n\n-Hay personas desaparecidas ¿conoce los datos y características?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Por favor retírese del margen de las quebradas y ubique un lugar seguro.\n\n * Si su vivienda esta en riesgos inminente, desalójela.\n\n * Desconecte la electricidad.\n\n * Cierre la llave del gas.\n\n * No trate de cruzar el rio, es peligroso.\n	80
81	-¿Qué magnitud y longitud tiene el árbol?\n\n-¿Está obstaculizando alguna carretera ó via?\n\n-¿Afectó alguna vivienda o estructura?\n\n-¿A su caida afectó el tendido eléctrico?\n\n-¿Hay lesionados o fallecidos?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Ubicarse en un lugar seguro y establecer una zona de seguridad.\n\n-El operador debe notificar a CORPOELEC/supervisor si es necesario.\n	81
90	-¿Qué edad tiene?\n\n-¿Cuántos meses tiene de embarazo?\n\n-¿Tiene mucho sangrado?\n\n-Las contracciones son seguidas ¿Cuántos minutos hay en cada contracción? ¿Es el primer embarazo?\n\n-Observa alguna parte del bebé (si es el caso transferir la llamada a bomberos para la atención telefónica.\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * No trate de impedir el nacimiento (no permita que cruce las piernas)\n\n * Acuéstela y haga que respire profundamente entre contracciones.\n\n * No permita que se siente en el inodoro.\n\n * Si el bebe ya nació debe proceder a limpiarle la nariz y boca.\n\n * Proceder a cortar el cordón umbilical colocando una pinza a 5 cm del estomago del bebe, deje tres centímetros y coloca la otra pinza, luego corte entre las dos pinzas.\n\n * Entregarle el bebé a la progenitora mientras llega la unidad y durante su traslado.\n 	90
204	-¿El derrumbe está obstaculizando el paso vehicular?\n\n-¿Hay congestionamiento vehicular?\n\n-¿Hay alguna vivienda o vehículo afectado por el deslizamiento?\n\n-Si es positivo, hay personas adentro ¿Cuántos?\n\n-¿Hay más viviendas en riesgo?\n\n-¿Hay personas lesionadas o desaparecida?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Por favor alejese de la zona de impacto.\n\n * Proceda a desalojar las viviendas en riesgos.\n\n * Ubique un lugar seguro.\n\n * Desconecte la electricidad.\n\n * Cierre la llave del gas.\n	204
205	-Hay viviendas afectadas ¿Cuántas?\n\n-Hay personas lesionadas ¿Qué presentan?\n\n-Hay personas incomunicadas ¿Cuántas y en que circunstancia?\n\n-Hay personas desaparecidas ¿Conoce los datos y características?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Por favor retírese del margen de las quebradas y ubique un lugar seguro.\n\n * Si su vivienda esta en riesgos inminente, desalójela.\n\n * Desconecte la electricidad.\n\n * Cierre la llave del gas.\n\n * No trate de cruzar el rio, es peligroso.\n	205
54	-¿En qué piso del edificio se encuentra el incendio?.\n\n-¿Sabe el motivo del incendio: explosión, corto circuitos entre otros?\n\n-¿Sabe que contiene el galpón o la estructura, con respecto a químicos, maderas, papelería, Materia orgánica entre otros?.\n\n-¿El incendios esta en fase incipiente? (Iniciandose) o está en libre combustión.\n\n-Sabe si hay personas dentro de la estructura, ¿Cuántos?\n\n-Hay lesionados ¿Cuántos?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Proceda a desconectar el fluido eléctrico de la estructura.\n\n * Proceda desalojar la vivienda y trasladase a un sitio seguro.\n\n * Si la estructura esta en su fase incipiente, y el usuario posee un extintor de PQS que proceda acercarse hasta el punto de ignición y activar el mismo.\n	54
83	-Indicarle el números de Bomberos Mérida e INPRADEM directamente.\n	83
58	-¿Qué tipo de vegetación se esta quemando: arboles, grama, caña de azúcar entre otros?\n\n-¿El incendio está en fase incipiente o esta en libre combustión?\n\n-Hay viviendas cercas ¿Cuántas aproximadamente?\n\n-Sabe si hay personas dentro de esas viviendas ¿Cuántas?\n\n-Hay lesionados ¿Cuántos?\n\n-¿La zona es de fácil acceso o muy inclinada?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Por favor proceda a desalojar las viviendas que estén en riesgo, recomiende a las personas alejarse hacia un lugar seguro\n\n * Si tiene agua en la vivienda refresque las zonas de la misma para evitar la propagación.\n	58
26	-Informe el lugar exacto donde sucede el hecho.\n\n-¿Cómo sabe que posee el estupefaciente?\n\n-Indique las características de la persona que dice que posee el estupefaciente.\n	26
27	-Informe el lugar exacto donde sucede el hecho.\n\n-¿Cómo sabe que vende estupefacientes?\n\n-Indique las características de la persona.\n\n-¿La persona es conocida?\n\n-¿Es frecuente en el lugar?\n\n-¿En que medio se traslada: vehículo o moto?\n	27
28	-Informe el lugar exacto donde sucede el hecho.\n\n-Indique las características de la persona.\n	28
29	-Informe el lugar exacto donde sucede el hecho.\n\n-¿Cómo sabe que está traficando drogas?\n\n-Indique las características de la persona.\n\n-¿La persona es conocida?\n\n-¿Es frecuente en el lugar?\n\n-¿En que medio se traslada: vehículo o moto?\n	29
16	-Informe la dirección exacta dónde están sucediendo los hechos.\n\n-Indique un punto de referencia para que sea rápidamente ubicable la dirección.\n\n-¿Hay alguna persona lesionada o herida en el sitio, que requiera ser atendido?\n\n-¿Indique si tiene consanguinidad o con el agresor? Si la respuesta es Sí, pregunte: ¿Es la primera vez que le agrede?, ¿Tiene alguna denuncia previa?\n\n-¿La situación le permite hacer espera de la comisión policial en la parte externa de la vivienda?\n\n-¿El agresor porta arma blanca, objeto contundente o de fuego.?\n\n-¿Presume que esta bajo los efectos de alcohol o estupefacientes?\n\n-Informe las características de la persona agresora en caso de haberse retirado del sitio.\n\n-En caso de que desee formular denuncia, puede dirigirse a los siguientes entes u organismos encargados:\n\n * Fiscalía del ministerio público.\n\n * C.I.C.P.C\n\n * Departamento de atención al público del Cuartel General de la Policía del Estado Mérida.\n\n * GUANAPEM, en caso de haber menores involucrados en la situación de violencia. Ubicada en la Av. 16 de septiembre.\n	16
60	-En que se produce el escape de Gas: Bombonas, tuberías, tanques a granel entre otros.\n\n-¿Cuántas viviendas hay afectadas?\n\n-Sabe si hay personas dentro de esas viviendas ¿Cuántas?\n\n-Hay lesionados ¿Cuántos?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Por favor proceda a desconectar el fluido eléctrico de la vivienda.\n\n * Por favor proceda a desconectar el fluido de gas del edificio/casa.\n\n * Manténganse atenta a la comisión que va al sitio.\n\n * Si es una bombona con cuidado retírela de la vivienda hasta el aire libre.\n\n * Desaloje la vivienda, si es necesario.\n\n * No encienta la luz, llamas u otro punto de ignición que pueda convertir el escape en una defragación e incendios.\n\n-El Operador debe notificar a la compañía que presta el servicio de gas.\n	60
18	-Mantenga la calma para que logre suministrar la información necesaria.\n\n-Indique el sitio exacto dónde observó la situación de secuestro.\n\n-Informe las características del vehículo en el que fue introducido el secuestrado.\n\n-Informe las características de los sujetos que sometieron al secuestrado.\n\n-¿Portaban algún tipo de armas?\n\n-¿Qué ruta tomaron los sujetos?\n\n-De saberlo indique el nombre de la persona secuestrada.\n\n-Informe las características físicas del secuestrado: Estatura, Color de piel, Color de cabello.\n\n-Informe cómo está vestida la persona secuestrada.\n\n-En caso de encontrarse en persecución de los delincuentes:\n\n * Sea prudente para no llegar a ser observado por lo sujetos.\n\n * No abandone la línea.\n\nNOTA: El operador deberá pasar esta llamada al despachador de la policía, a fin de hacerle seguimiento al procedimiento policial, y lograr así la detención de los sujetos y la liberación de la persona afectada.\n	18
100	-¿La persona es hombre o mujer?\n\n-¿Qué edad tiene el paciente?\n\n-¿Está violento?\n\n-¿Posee algún tipo de arma?\n\n-¿Dónde está la persona en este momento?\n\n-Qué tipo de intento de suicidio es: sobredosis, envenenamiento (observa algún medicamento o sustancia que pudo haber ingerido) herida por arma de fuego, ahorcamiento, sofocación, heridas con hemorragias severas, entre otros.\n\n-Según el caso revisar en las emergencias médicas el tipo de atención.\n\n-El operador debe notificar a la policía para que asegure la zona.\n\n-Recomiende:\n\n * Si no hay riesgo observe que está haciendo y manténganos informados.\n\n * Si no hay riesgo, protégela de si mismo.\n\n * Acuéstela y cálmela.\n\n * Si es intento de ahorcamiento corte de inmediato la cuerda y verifique su respiración.\n\n * Manténganse atenta a la comisión que va al sitio.\n	100
93	-¿El paciente es hombre o mujer?\n\n-¿Como ocurrió el hecho?\n\n-Sabe el rumbo que tomaron los agresores ¿Cómo visten? Y datos relacionados a los mismos como ruta de escape y vehículos.\n\n-¿En qué parte del cuerpo presento las heridas?\n\n-¿Presenta fuerte hemorragia?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Si el arma no está en el cuerpo del herido trate de ubicar un aposito y uselo para detener la hemorragia, sin ejercer mayor presión.\n\n * Si es herida por arma blanca, no retire el cuchillo del lugar donde fue herido, si aún continua en el cuerpo del paciente.\n\n * Informe que ya se enviaron comisiones al sitio y recomiende:\n\n ** Si el agresor esta cerca manténgase en un lugar seguro.\n\n ** No altere la escena del crimen no mueva nada.\n\n ** Si es herida por arma blanca, no retira el cuchillo del lugar donde fue herido, si aún continua en el cuerpo del paciente.\n	93
57	-¿Qué tipo de vegetación se esta quemando: arboles, grama, caña de azúcar entre otros?\n\n-¿El incendio está en fase incipiente o esta en libre combustión?\n\n-Hay viviendas cercas ¿Cuántas aproximadamente?\n\n-Sabe si hay personas dentro de esas viviendas ¿Cuántas?\n\n-Hay lesionados ¿Cuántos?\n\n-¿La zona es de fácil acceso o muy inclinada?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Por favor proceda a desalojar las viviendas que estén en riesgo, recomiende a las personas alejarse hacia un lugar seguro\n\n * Si tiene agua en la vivienda refresque las zonas de la misma para evitar la propagación.\n	57
55	-Si es de carga, que material transportaba el vehículo, con respecto a químicos, maderas, papelería, combustible, Materia orgánica entre otros.\n\n-¿El incendio esta en fase incipiente o esta en libre combustión?\n\n-Sabe si hay personas dentro del vehículo, ¿Cuántos?\n\n-Hay lesionados ¿Cuántos?\n\n-Dar las siguientes Recomendaciones según sea el caso:\n\n * Por favor proceda a desconectar la batería del vehículo, si se puede.\n\n * Por favor proceda a alejarse del vehículo hacia un lugar seguro.\n\n * Si el vehículo esta en su fase incipiente, y el usuario posee un extintor de PQS que proceda acercarse hasta el punto de ignición y activar el mismo.\n\n * Si está dentro del vehículo, utilice las salidas de emergencias (si es el caso conservar la llamada en línea).\n	55
30	-Informe dirección exacta de donde proviene la alteración.\n\n-Indique un punto de referencia.\n\n-¿Cómo se presenta la situación?.\n\n-En caso de ver alteraciones en apartamentos o residencias con portones de seguridad:\n\n * Se le indica al solicitante que por favor haga espera de la comisión en la parte externa para que promueva el acceso al edificio o residencia. De no ser así la comisión se retirara del sitio.\n\n-En caso de ser alteraciones en vía pública:\n\n * Se le indica al solicitante informe cuántos vehículos o persona hay aproximadamente en el sitio.\n	30
66	-¿Qué tipo de vehículo colisionó o de que vehículo se trata: vehículos de cargas, vehículos familiares, unidades de transporte público, gandolas, motos entre otros?\n\n-Si es choque con objeto fijo, ¿Contra qué colisionó el vehículo?\n\n-Si volcó fuera de la vía ¿ hacia dónde y que distancia fuera de la vía volcó el vehículo.?\n\n-¿Cuántos lesionados hay aproximadamente?\n\n-Si se trata de un motorizado, recomiende no retirarle el casco.\n\n-Recomiende no movilizar a los lesionados, ni suministrar alimentos o bebidas.\n\n-¿Hay personas atrapadas?\n\n-¿Hay fallecidos?\n\n-Trate de colocar algúntipo de señalización disponible a una distancia aproximada de 3 a 5 m del hecho vial.\n\n-Si es vehículo de carga pregunte al solicitante ¿qué material transportaba el vehículo: químicos, maderas, papelería, combustible, Materia orgánica entre otros?\n\n-¿Hay presencia de fuego en el hecho ó derrame de combustible? Si la respuesta es sí, recomiende lo siguiente:\n\n * Por favor proceda a desconectar la batería del vehículo.\n\n * Si el vehículo esta en su fase incipiente (inicio de incendio), y el usuario posee un extintor de PQS recomiende:tome el extintor y proceda a acercarse hasta el punto de ignición y active el mismo.\n\n * Si está dentro del vehículo (bus), recomiende: utilice las salidas de emergencias (si es el caso conservar la llamada en línea).\n\n * Trate de neutralizar el combustible con árena o aserrín.\n\n * Trate de colocarle alguna cuña a las ruedas del vehículo para evitar que se desplace si esta en carreteras inclinadas.\n\n-Notifique a la Policía y Tránsito Terrestre.\n	66
9	-Informe el lugar exacto donde sucedió el hecho.\n\n-Informe un punto de referencia.\n\n-Informe si va hacer espera de la comisión policial para informar de la situación.\n\n-De ser así:\n\n * Indique el sitio exacto donde va hacer esperar de la comisión.\n\n * Informe las características de su vestimenta.\n\n-De no ser así:\n\n * Notifique al C.I.C.P.C del hecho ocurrido y formule la respectiva denuncia.\n	9
8	-Informe ubicación exacta del comercio.\n    \n-Indique un punto de referencia.\n\n-Informe el nombre del establecimiento.\n    \n-Informe del hecho sucedido al C.I.C.P.C.\n	8
11	-Por favor verifique que el suelo esté o no demarcado con información correspondiente a remolque por parte de los organismos competentes.\n\n-De ser así:\n\n * Trasládese hasta la sede de la policial de circulación vial o al comando de tránsito terrestre según sea el caso.\n\n-De no ser así:\n    \n * Informe el sitio exacto donde se encontraba estacionado el vehículo.\n    \n-¿A qué hora presume usted que sucedió el hecho?\n\n-¿Cuál es el nombre del propietario del vehículo?\n\n-Informe detalladamente las características del vehículo:Marca, Modelo, Año, Color y Placas\n\n-¿Alguna característica particular?\n\n-Indique un número de teléfono donde pueda ser ubicado en caso de que el vehículo sea recuperado.\n\n-Por favor trasládese al C.I.C.P.C y formule la respectiva denuncia.\n	11
10	-Por favor verifique que el suelo esté o no demarcado con información correspondiente a remolque por parte de los organismos competentes.\n\n-De ser así:\n\n * Trasládese hasta la sede de la policial de circulación vial o al comando de tránsito terrestre según sea el caso.\n\nDe no ser así:\n\n * Informe el sitio exacto donde se encontraba estacionado el vehículo.\n\n-¿A qué hora presume usted que sucedió el hecho?\n\n-¿Cuál es el nombre del propietario del vehículo?\n\n-Informe detalladamente las características del vehículo:Marca, Modelo, Año, Color y Placas\n\n-¿Alguna característica particular?\n\n-Indique un número de teléfono donde pueda ser ubicado en caso de que el vehículo sea recuperado.\n\n-Por favor trasládese al C.I.C.P.C y formule la respectiva denuncia.\n	10
7	-Informe ubicación exacta de la vivienda.\n\n-Indique un punto de referencia para facilitar la ubicación de la misma.\n\n-¿Qué características tiene la vivienda?.\n\n-¿Cuál es el color de fachada?.\n\n-¿Tiene algún nombre la vivienda?\n\n-¿Qué pertenencias se llevaron los sujetos??\n\n-Notifique al C.I.C.P.C del hacho sucedido.\n	7
56	-Tomar la información posible y comunicar a Bomberos aeronáuticos.	56
33	-¿Vizualiza la/las persona (s) que estan realizando las detonaciones?\n\n-¿Qué tipo de detonaciones están realizando? ¿Puede diferenciar entre juegos pirotécnicos y un arma de fuego?\n\n-¿De ser arma de fuego reconoce que tipo: pistola o escopeta?\n\n-¿Hace cuánto tiempo escucho las detonaciones, cuántos impactos escuchó?\n\n-¿Qué características tienen los sujetos detonantes, andan en vehículo que dirección tomarón?\n\n-¿Son constantes las detonaciones, los sujetos son conocidos, vecinos o extraños?\n	33
34	-Informe ubicación exacta de la riña colectiva.\n\n-Informe un punto de referencia.\n\n-Indique si se observa presencia de armas?\n\n-Informe características del o los sujetos en riña.\n\n-En caso de haberse dado a la fuga el sujeto agresor:\n\n * Informe características del sujeto agresor\n\n * Indique el medio de transporte que utilizó para darse a la fuga.\n	34
53	-¿Cuál es la causa del bote de agua? \n\n-Según la situación se decide organismo de apoyo:\n\n * hidrante – se asigna a bomberos.\n\n * tubería – Aguas de Mérida\n\n-¿Existe alguna situación de riesgo? ¿Cuál?\n	53
42	-Informe el sitio exacto donde fue observado el ciudadano por última vez.\n\n-¿Presenta algún problema de salud mental?\n\n-¿Qué parentesco tiene usted con la persona desaparecida?\n\n-¿Cómo vestía para el momento de su desaparición?\n\n-¿Indique el nombre de la persona desaparecida?\n\n-Indique características fisionómicas de la persona desaparecida? Edad, Color de piel, Color de cabello, Estatura.\n\n-Indique una dirección o número de teléfono donde se les pueda informar en caso de dar con el paradero del Sr. o Sra.\n\n-Notifique la desaparición al C.I.C.P.C.\n	42
46	-¿Cuál es la dirección dónde se encuentra la congestión vehicular?\n\n-¿Cuál cree ud es la causa de la congestión?\n\n-¿Cuánto tiempo ha permanecido en el lugar?\n	46
51	-Indique la ubicación exacta con puntos de referencia donde esta ocurriendo el hecho.\n\n-¿Que tipos de daños? Derrames de combustibles, desforestaciones o contaminación con desechos solidos u otros.\n\n-Si es vegetación (montaña baja) o forestales (plantación de pinos, parques nacionales), pregunte:\n\n-¿Hay personas cerca del hecho?.\n	51
35	-¿En qué lugar ocurrió el hecho?\n\n-¿Qué ruta tomó el vehículo?\n\n-¿Cuáles son las características del vehículo? (marca, modelo, color, placa, año)\n\n-Si observo el conductor puede dar las características.\n	35
36	-Indique la ubicación exacta donde se encuentra la persona.\n\n-¿Qué consumió la persona?.\n\n-¿Qué sintomas presenta?.\n	36
39	-Indique el sitio exacto con puntos de referencia, de donde se encuentra el vehículo en estado de abandono.\n\n-Indique las características del vehículo: Marca, Modelo ,Color y Placas\n\n-¿Presenta el vehículo signos de violencia?\n\n-¿Sabe cuánto tiempo tiene el vehículo el estado de abandono?\n\n-De encontrarse el vehículo abandonado en el sitio indicado durante un lapso mayor de 15 días, la junta comunal o asociación de vecinos del sector deberá notificar mediante oficio la irregularidad ante el ente correspondiente, bien sea policía de circulación Vial o Tránsito Terrestre.\n	39
49	-Indique la ubicación exacta donde se encuentra la persona.\n\n-¿Está ocasionando algún daño?.\n\n-¿Está ocasionando riñas?.\n	49
118	-Ubique al médico de cabecera para que otorgue el certificado de muerte natural.\n\n-Informe el sitio exacto donde se encuentra el cadáver.\n\n-Indique puntos de referencia.\n\n-De ser una muerte de otra naturaleza:\n\n * Indique lo que observa en el sitio.\n\n * Manténgase a la espera en un sitio visible para que guie a la comisión policial hasta el lugar de los hechos.\n\n * Se enviará al sitio comisión del C.I.C.P.C.\n	118
2	-Informe ubicación exacta y punto de referencia del establecimiento.\n\n-Nombre del establecimiento.\n\n-¿Cuáles son las características del o los sujetos implicados en el robo?\n\n-¿Poseían algún tipo de armas?\n\n-¿Hay alguna persona herida en el sitio que requiera asistencia médica?\n\n-¿Qué lograron llevarse los sujetos del establecimiento?\n\n-En caso de haberse dado a la fuga los sujetos, preguntar:\n\n * ¿Qué medio utilizaron los sujetos para darse a la fuga?\n\n * Informe las características del vehículo en que se dieron la fuga: Marca, Modelo, Color, Placas, si lograron visualizarlas.\n\n * Que ruta de escape tomaron los sujetos?\n	2
4	-Ubicación exacta del hecho indicando puntos de referencia?\n\n-¿Hay alguna persona lesionada o herida en el sitio?\n\n-¿Es usted el propietario del vehículo?\n\n-De no ser el propietario del vehículo se le pide por favor indique el nombre del propietario del vehículo.\n\n-Informe detalladamente las características del vehículo: Marca, Modelo, Año, Placas.\n\n-¿Tiene el vehículo alguna característica particular?\n\n-¿Indique las características de los sujetos que se llevaron su vehículo?\n\n-¿Los sujetos portaban algún tipo de armas?\n\n-¿Por favor indique que ruta tomaron los sujetos?\n\n-Indique un número de teléfono donde pueda ser ubicado en caso de que el vehículo sea recuperado.\n\n-Por favor trasládese al C.I.C.P.C y formule la respectiva denuncia.\n\n-En caso de encontrarse en persecución de los delincuentes:\n\n * Sea prudente para no llegar a ser observado por lo sujetos.\n\n * No abandone la línea.\n\nNOTA: El operador deberá pasar esta llamada al despachador de la policía, a fin de hacerle seguimiento al procedimiento policial, y lograr así la detención de los sujetos y la recuperación del vehículo.\n	4
1	-Ubicación exacta con puntos de referencia donde se encuentra ubicada la vivienda.\n\n-¿Cuáles son las Características externas de la vivienda, Color de fachada, Nº de casa, Nombre, si lo tiene, Nº de plantas?.\n\n-¿Cuáles son las características del o los sujetos implicados en el robo?\n\n-¿Poseían algún tipo de armas?\n\n-¿Permanecen aun los sujetos dentro de la vivienda?\n\n-De ser positiva la respuesta:\n\n * Procure en lo posible no ser observado.\n\n * Resguárdese en un sitio oculto, mientras llega la comisión al sitio.\n\n * No abandone la línea.\n\n-De ser negativa la respuesta:\n\n * ¿Qué ruta tomaron los sujetos?\n\n * ¿Alcanzó a observar el medio de transporte en que se dieron a la fuga los sujetos?\n\n * Informe las características del vehículo: marca, color y placa si es posible.\n\n * Notifique del hecho al C.I.C.P.C.\n	1
\.


--
-- Data for Name: motivo_solicitud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.motivo_solicitud (id, nombre_motivo, motivo_grupo_id) FROM stdin;
14	Homicidios	4
15	Agresión Física	4
17	Abuso Sexual / Violación	4
18	Secuestro	4
33	Detonación de Arma de Fuego	7
34	Riña	7
35	Exceso de Velocidad	8
36	Ingesta Alcohólica	8
37	Personas Sospechosas	8
41	Personas Solicitadas	8
48	Personas Indigentes	8
47	Personas Demente	8
49	Pers. Estado Ebriedad	8
51	Daños al Medio Ambiente	8
50	Solicitud Gruas	8
52	Contra la Moral	8
62	Derrame de Combustible	10
63	Exterminio de Insectos	10
64	Emergencias con Materiales Peligrosos	10
65	Obstaculización / Riesgos en la Vía	10
74	Personas Atrapadas	11
76	Rescate Animal	11
79	Anegación	12
78	Movimiento Sísmico	12
19	Personas Agresivas / Agresión Verbal	4
21	Extorsión	4
24	Desvalijamieto de Vehículo	5
25	Desvalijamiento de Moto	5
26	Posesión de Droga	6
30	Alteración del Orden Público	7
31	Manifestaciones	7
81	Colapso de Especies Arbóreas	12
113	Aborto	13
114	Solicitud de Apoyo	13
121	Uso Canal Exclusivo	15
45	Vehículo / Moto : Recuperados	8
90	Trabajo De Parto	13
89	Descarga Electrica	13
46	Congestión Vehicular	8
0	null	0
2	Robo a Comercio	1
3	Robo a Persona	1
123	Robo a Cajero Automática	1
4	Robo de Vehículo	1
5	Robo de Moto	1
6	Robos Otros	1
1	Robo a Residencia	1
124	Robo a Centro Hospitalario	1
125	Robo a Construcción	1
126	Robo a Institución Educativa	1
127	Robo a Institución Pública	1
128	Robo a Local	1
129	Robo Bancario	1
130	Robo de Cableado	1
131	Robo en Transporte Público	1
132	Robo Genérico	1
133	Robo Industrial	1
7	Hurto a Residencia	2
8	Hurto a Comercio	2
9	Hurto a Persona	2
10	Hurto de Vehículo	2
11	Hurto de Moto	2
134	Hurto a Cajero Automática	2
135	Hurto a Institución Educativa	2
136	Hurto a Institución Pública	2
12	Alarma Prueba Bancaria	3
13	Alarma Activación/Prueba	3
20	Violencia de Género	4
23	Invasión a la Propiedad	5
22	Daño a la Propiedad	5
28	Consumo de Estupefacientes	6
27	Venta de Sustancias Psicotrópicas	6
29	Microtráfico de Drogas	6
32	Arma Recuperada	7
53	Derrame de Agua Potable	8
42	Persona Desaparecida	8
43	Vehículo / Moto : Solicitado	8
38	Vehículo / Moto : Sospechoso	8
40	Auxilio Vial	8
44	Cierre de Vía	8
56	Incendio de Aeronave	9
54	Incendio a Estructura	9
58	Incendio Forestal	9
59	Corto Circuito	10
55	Incendio de Vehícular / Moto	9
61	Incendio de Desechos Sólidos	10
60	Fuga de Gas	10
69	Arrollamiento	11
75	Colapso de Estructura	11
72	Rescate a Persona	11
80	Desbordamiento de Quebrada	12
71	Accidente Aéreo	11
67	Accidente de Tránsito con Lesionados	11
68	Accidente de Tránsito	11
73	Accidente Laboral	11
70	Accidente de Transito con Expelimento	11
77	Deslizamientos	12
108	Atención Prehospitalaria	13
87	Herido por Caída de Altura	13
85	Persona con A.C.V. / Hipertensión	13
110	Persona con Apendicitis	13
95	Persona con Crisis Convulsiva	13
94	Persona con Crisis Asmaticas	13
100	Persona con Disnea	13
91	Persona con Dolores (Cabeza, Extremidades, Organos y Otros)	13
112	Persona con Envenenamiento	13
84	Persona con Fracturas (F.X.)	13
102	Persona con Hemorragias	13
93	Herido por Arma Blanca	13
107	Persona Herida	13
96	Herido por Arma de Fuego	13
105	Persona con Hipotensión	13
92	Persona con Infarto al Miocardio / En Proceso	13
97	Persona con Lipotimia	13
103	Herido por Mordedura	13
82	Otras Causas	13
106	Herido por Quemaduras	13
99	Persona con Reacción Alérgica	13
88	Persona con Sindrome Febril	13
111	Persona con Sobredosis	13
115	Sist. Emerg. Motivos Desconocidos	13
83	Traslado Médico	13
120	Fallecido por Inmersión	14
117	Fallecido por Arma Blanca	14
118	Fallecido por Causas Naturales	14
119	Fallecido por Otras Causas	14
137	Hurto de Cableados	2
138	Hurto de Ganado (Abigeato)	2
139	Hurto de Vehículo en Tiempo Real	2
140	Hurto Genérico	2
141	Hurto Industrial	2
142	Hurtos Otros	2
122	Alarma Activada	3
143	Alarma Activada Botón de Pánico	3
144	Alarma de Artefacto Explosivo	3
16	Violencia Contra la Familia	4
145	Abuso de Autoridad	4
146	Acto Lascivo	4
147	Amenaza de Muerte	4
148	Estafa Bancaria	4
149	Maltrato Infantil	4
150	Racto	4
151	Situación de Rehen	4
152	Abuso Sexual a Menor	4
153	Vandalismo	5
154	Allanamiento	7
155	Apoyo a Organísmos	7
156	Arma Solicitada	7
157	Comercio Ilegal	7
158	Contaminación Sónica	7
159	Desalojo	7
160	Dispositivo de Seguridad	7
161	Enfrentamientos	7
162	Motín	7
163	Incumplimiento de la Cuarentena Social	7
164	Resistencia a la Autoridad	7
165	Saqueo	7
166	Venta de Juego Pirotecnico	7
39	Vehículo / Moto : Abandonado	8
168	Denuncia	8
169	Hallazgo de Cadáver	8
170	Derrame de Aguas Negras	8
171	Hallazgo de Feto	8
172	Hallazgo de Osamenta	8
173	Maltrato Animal	8
174	Menor Abandonado	8
175	Menor Estraviado	8
177	Vehículo / Moto : Accidentado	8
178	Vehículo / Moto : Mal Estacionado	8
179	Falta de Recolección de Desechos	8
57	Incendio de Vegetación	9
180	Incendio	9
181	Incendio con Fallecidos	9
182	Incendio a Comercio	9
183	Incendio a Institución Pública	9
184	Incendio con Lesionado	9
185	Incendio de Refinería	9
186	Incendio de Refugio	9
187	Incendio Industrial	9
188	Incendio Residencial	9
189	Arbol Caído	10
190	Eliminación de Peligro	10
191	Enjambre de Abejas	10
192	Incendio de Alcantarilla	10
193	Incendio de Poste	10
66	Accidente de Tránsito con Fallecido	11
194	Colapso de Vivienda	11
195	Explosión	11
196	Explosión de Transformador	11
197	Falla Eléctrica	11
198	Inundación	11
199	Naufragio	11
200	Volcamiento	11
201	Volcamiento con Fallecidos	11
202	Volcamiento con Lesionados	11
203	Afectación por Lluvias	12
204	Derrumbe	12
205	Desbordamiento de Rio	12
206	Situación de Riesgo Vivienda	12
207	Terremoto	12
208	Vía Fragmentada	12
176	Herido por Electrocución	13
98	Persona con Cuadro Descompensación	13
109	Persona con Hematuria	13
86	Persona con Paro Respiratorio	13
104	Persona con Hipertermia	13
101	Persona con Autólisis / Intento de Suicidio	13
209	Herido por Aplastamiento	13
210	Herido por Objeto Contundente	13
211	Herido por Traumatismo	13
212	Persona con Lesiones Personales	13
213	Herido por Caida de su Nivel	13
214	Traslado Aéreo	13
215	Traslado Residencial	13
116	Fallecido por Arma de Fuego	14
216	Fallecido por Accidente Laboral	14
217	Fallecido por Ahorcamiento	14
218	Fallecido por Aplastamiento	14
219	Fallecido por Arrollamiento	14
220	Fallecido por Caida de Altura	14
221	Fallecido por Electrocución	14
222	Fallecido por Incendio	14
223	Fallecido por Intoxicación	14
224	Fallecido por Linchamiento	14
225	Fallecido por Quemadura	14
226	Fallecido por Riña	14
227	Fallecido por Traumatismo	14
228	Menor Fallecido	14
229	Herido por Incendio	13
230	Persona Caida de Altura	13
231	Persona Caida de su Nivel	13
\.


--
-- Data for Name: motivo_solicitud_grupo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.motivo_solicitud_grupo (id, nombre_motivo_grupo) FROM stdin;
1	Robos                                   
2	Hurtos                                  
3	Alarma                                  
4	Contra la Persona                       
5	Contra la Propiedad                     
6	Estupefacientes                         
7	Orden Público                           
8	Otras Causas                            
9	Incendios                               
10	Eliminaciones de Peligro                
11	Accidentes                              
12	Eventos Adversos                        
13	Emergencias Médicas                     
14	Personas Fallecidas                     
15	TROMERCA                                
0	null                                    
\.


--
-- Data for Name: municipios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.municipios (id, nombre_municipio, estados_id) FROM stdin;
25	AUTONOMO ALTO ORINOCO	1
26	AUTONOMO ATABAPO	1
27	AUTONOMO ATURES	1
28	AUTONOMO AUTANA	1
29	AUTONOMO MANAPIARE	1
30	AUTONOMO MAROA	1
31	AUTONOMO RIO NEGRO	1
32	ANACO	2
33	ARAGUA DE BARCELONA	2
34	FERNANDO DE PEÑALVER	2
35	FRANCISCO DEL CARMEN CARVAJAL	2
36	FRANCISCO DE MIRANDA	2
37	GUANTA	2
38	INDEPENDENCIA	2
39	JUAN ANTONIO SOTILLO	2
40	JUAN MANUEL CAJIGAL	2
41	JOSE GREGORIO MONAGAS	2
42	LIBERTAD	2
43	MANUEL EZEQUIEL BRUZUAL	2
44	PEDRO MARÍA FRÉITES	2
45	PÍRITU	2
46	SAN JOSÉ DE GUANIPA	2
47	SAN JUAN DE CAPISTRANO	2
48	SANTA ANA	2
49	SIMÓN BOLÍVAR	2
50	SIMÓN RODRÍGUEZ	2
51	SIR ARTHUR MC GREGOR	2
52	TURÍSTICO DIEGO BAUTISTA URBANEJA	2
53	ACHAGUAS	3
54	BIRUACA	3
55	MUÑOZ	3
56	PÁEZ	3
57	PEDRO CAMEJO	3
58	ROMULO GALLEGOS	3
59	SAN FERNANDO	3
60	BOLIVAR	4
61	CAMATAGUA	4
62	FRANCISCO LINARES ALCANTARA	4
63	GIRARDOT	4
64	JOSÉ ÁNGEL LAMAS	4
65	JOSÉ FÉLIX RIBAS	4
66	JOSÉ RAFAEL REVENGA	4
67	LIBERTADOR	4
68	MARIO BRICEÑO IRAGORRY	4
69	OCUMARE DE LA COSTA DE ORO	4
70	SAN CASIMIRO	4
71	SAN SEBASTIÁN	4
72	SANTIAGO MARIÑO	4
73	SANTOS MICHELENA	4
74	SUCRE	4
75	TOVAR	4
76	URDANETA	4
77	ZAMORA	4
78	ANDRÉS ELOY BLANCO	5
79	ANTONIO JOSÉ DE SUCRE	5
80	ALBERTO ARVELO TORREALBA	5
81	ARISMENDI	5
82	BARINAS	5
83	BOLIVAR	5
84	CRUZ PAREDES	5
85	EZEQUIEL ZAMORA	5
86	OBISPOS	5
87	PEDRAZA	5
88	ROJAS	5
89	SOSA	5
90	BOLIVARIANO ANGOSTURA	6
91	CARONI	6
92	CEDEÑO	6
93	EL CALLAO	6
94	GRAN SABANA	6
95	HERES	6
96	PADRE PEDRO CHIEN	6
97	PIAR	6
98	ROSCIO	6
99	SIFONTES	6
100	SUCRE	6
101	BEJUMA	7
102	CARLOS ARVELO	7
103	DIEGO IBARRA	7
104	GUACARA	7
105	JUAN JOSE MORA	7
106	LIBERTADOR	7
107	LOS GUAYOS	7
108	MIRANDA	7
109	MONTALBAN	7
110	NAGUANAGUA	7
111	PUERTO CABELLO	7
112	SAN DIEGO	7
113	SAN JOAQUÍN	7
114	VALENCIA	7
115	ANZOATEGUI	8
116	FALCÓN	8
117	GIRARDOT	8
118	LIMA BLANCO	8
119	EL PAO DE SAN JUAN BAUTISTA	8
120	RICAURTE	8
121	RÓMULO GALLEGOS	8
122	SAN CARLOS	8
123	TINACO	8
124	ANTONIO DIAZ	9
125	CASACOIMA	9
126	PEDERNALES	9
127	TUCUPITA	9
128	LIBERTADOR	10
129	ACOSTA	11
130	BOLIVAR	11
131	BUCHIVACOA	11
132	CACIQUE MANAURE	11
133	CARIRUBANA	11
134	COLINA	11
135	DABAJURO	11
136	DEMOCRACIA	11
137	FALCÓN	11
138	FEDERACION	11
139	JACURA	11
140	LOS TAQUES	11
141	MAUROA	11
142	MIRANDA	11
143	MONSEÑOR ITURRIZA	11
144	PALMASOLA	11
145	PETIT	11
146	PÍRITU	11
147	SAN FRANCISCO	11
148	SILVA	11
149	SUCRE	11
150	TOCÓPERO	11
151	UNIÓN	11
152	URUMACO	11
153	ZAMORA	11
154	CAMAGUAN	12
155	CHAGUARAMAS	12
156	EL SOCORRO	12
157	FRANCISCO DE MIRANDA	12
158	JOSÉ FÉLIX RIBAS	12
159	JOSÉ TADEO MONAGAS	12
160	JUAN GERMÁN ROSCIO	12
161	JULIÁN MELLADO	12
162	LAS MERCEDES	12
163	LEONARDO INFANTE	12
164	PEDRO ZARAZA	12
165	ORTÍZ	12
166	SAN GERÓNIMO DE GUAYABAL	12
167	SAN JOSÉ DE GUARIBE	12
168	SANTA MARÍA DE IPIRE	12
169	ANDRES ELOY BLANCO	13
170	CRESPO	13
171	IRIBARREN	13
172	JIMÉNEZ	13
173	MORAN	13
174	PALAVECINO	13
175	SIMÓN PLANAS	13
176	TORRES	13
177	URDANETA	13
178	ALBERTO ADRIANI	14
179	ANDRES BELLO	14
180	ANTONIO PINTO SALINAS	14
181	ARICAGUA	14
182	ARZOBISPO CHACÓN	14
183	CAMPO ELIAS	14
184	CARACCIOLO PARRA OLMEDO	14
185	CARDENAL QUINTERO	14
186	GUARAQUE	14
187	JULIO CESAR SALAS	14
188	JUSTO BRICEÑO	14
189	LIBERTADOR	14
190	MIRANDA	14
191	OBISPO RAMOS DE LORA	14
192	PADRE NOGUERA	14
193	PUEBLO LLANO	14
194	RANGEL	14
195	RIVAS DÁVILA	14
196	SANTOS MARQUINA	14
197	SUCRE	14
198	TOVAR	14
199	TULIO FEBRES CORDERO	14
200	ZEA	14
201	ACEVEDO	15
202	ANDRES BELLO	15
203	BARUTA	15
204	BRION	15
205	BUROZ	15
206	CARRIZAL	15
207	CHACAO	15
208	CRISTOBAL ROJAS	15
209	EL HATILLO	15
210	GUAICAIPURO	15
211	INDEPENDENCIA	15
212	LANDER	15
213	LOS SALIAS	15
214	PAEZ	15
215	PAZ CASTILLO	15
216	PEDRO GUAL	15
217	PLAZA	15
218	SIMON BOLIVAR	15
219	SUCRE	15
220	URDANETA	15
221	ZAMORA	15
222	ACOSTA	16
223	AGUASAY	16
224	BOLIVAR	16
225	CARIPE	16
226	CEDEÑO	16
227	EZEQUIEL ZAMORA	16
228	LIBERTADOR	16
229	MATURIN	16
230	PÍAR	16
231	PUNCERES	16
232	SANTA BÁRBARA	16
233	SOTILLO	16
234	URACOA	16
235	ANTOLIN DEL CAMPO	17
236	ARISMENDI	17
237	DIAZ	17
238	GARCIA	17
239	GOMEZ	17
240	MANEIRO	17
241	MARCANO	17
242	MARIÑO	17
243	PENINSULA DE MACANAO	17
244	TUBORES	17
245	VILLALBA	17
246	AGUA BLANCA	18
247	ARAURE	18
248	ESTELLER	18
249	GUANARE	18
250	GUANARITO	18
251	MONSEÑOR JOSÉ VICENTE DE UNDA	18
252	OSPINO	18
253	PAEZ	18
254	PAPELÓN	18
255	SAN GENARO DE BOCONOITO	18
256	SAN RAFAEL DE ONOTO	18
257	SANTA ROSALIA	18
258	SUCRE	18
259	TURÉN	18
260	ANDRES ELOY BLANCO	19
261	ANDRES MATA	19
262	ARISMENDI	19
263	BENITEZ	19
264	BERMUDEZ	19
265	BOLIVAR	19
266	CAJIGAL	19
267	CRUZ SALMERON ACOSTA	19
268	LIBERTADOR	19
269	MARIÑO	19
270	MEJIA	19
271	MONTES	19
272	RIBERO	19
273	SUCRE	19
274	VALDEZ	19
275	ANDRES BELLO	20
276	ANTONIO ROMULO COSTA	20
277	AYACUCHO	20
278	BOLIVAR	20
279	CARDENAS	20
280	CORDOBA	20
281	FERNANDEZ FEO	20
282	FRANCISCO DE MIRANDA	20
283	GARCIA DE HEVIA	20
284	GUASIMOS	20
285	INDEPENDENCIA	20
286	JAUREGUI	20
287	JOSE MARIA VARGAS	20
288	JUNÍN	20
289	LIBERTAD	20
290	LIBERTADOR	20
291	LOBATERA	20
292	MICHELENA	20
293	PANAMERICANO	20
294	PEDRO MARIA UREÑA	20
295	RAFAEL URDANETA	20
296	SAMUEL DARIO MALDONADO	20
297	SAN CRISTOBAL	20
298	SEBORUCO	20
299	SIMON RODRIGUEZ	20
300	SUCRE	20
301	TORBES	20
302	URIBANTE	20
303	SAN JUDAS TADEO	20
304	ANDRES BELLO	21
305	BOCONO	21
306	BOLIVAR	21
307	CANDELARIA	21
308	CARACHE	21
309	ESCUQUE	21
310	JOSE FELIPE MARQUEZ CAÑIZALES	21
311	JUAN VICENTE CAMPO ELIAS	21
312	LA CEIBA	21
313	MIRANDA	21
314	MONTE CARMELO	21
315	MOTATAN	21
316	PAMPAN	21
317	PAMPANITO	21
318	RAFAEL RANGEL	21
319	SAN RAFAEL DE CARVAJAL	21
320	SUCRE	21
321	TRUJILLO	21
322	URDANETA	21
323	VALERA	21
324	VARGAS	22
325	ARISTIDES BASTIDAS	23
326	BOLIVAR	23
327	BRUZUAL	23
328	COCOROTE	23
329	INDEPENDENCIA	23
330	JOSE ANTONIO PAEZ	23
331	LA TRINIDAD	23
332	MANUEL MONGE	23
333	NIRGUA	23
334	PEÑA	23
335	SAN FELIPE	23
336	SUCRE	23
337	URACHICHE	23
338	VEROES	23
339	ALMIRANTE PADILLA	24
340	BARALT	24
341	CABIMAS	24
342	CATATUMBO	24
343	COLON	24
344	FRANCISCO JAVIER PULGAR	24
345	JESÚS ENRIQUE LOSSADA	24
346	JESÚS MARIA SEMPRUM	24
347	LA CAÑADA DE URDANETA	24
348	LAGUNILLAS	24
349	MACHIQUES DE PERIJÁ	24
350	MARA	24
351	MARACAIBO	24
352	MIRANDA	24
353	INDIGENA BOLIVARIANO GUAJIRA	24
354	ROSARIO DE PERIJA	24
355	SAN FRANCISCO	24
356	SANTA RITA	24
357	SIMON BOLIVAR	24
358	SUCRE	24
359	VALMORE RODRIGUEZ	24
0	null	0
\.


--
-- Data for Name: observaciones; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.observaciones (id, notas, acciones_pen, apoyo_adm, anexo, fecha_creacion_obs, guardias_id, organismos_id) FROM stdin;
1	SE LE COLOCO UN RATON NUEVO AL COMPUTADOR				2021-11-08 14:11:46	1	5
2	DEJARON MANOS LIBRE				2021-11-08 15:11:29	2	2
3				MI COMPAÑERO DEJA SU CARGADOR DE SU CELULAR,, DURANTE SU GUARDIA, 	2021-11-08 15:11:17	4	1
4	MI COMPAñERA DEJO UN LAPICERO Y NO SE SUCITO NIGUN EVENTUALIDAD RELEVANTE 				2021-11-08 15:11:36	3	3
5	SIENDO LAS 12:00HLV INGRESA EL FUNCIONARIO DE LA POLICIA SOSA JOSE A LABORAR MOTIVADO A QUE SE HABIA QUEDADO ACCIDENTADO 				2021-11-10 12:11:00	10	5
6	SE PRODUJO VARIOS APAGONES DEL FLUIDO ELECTRICO.				2021-11-10 10:11:00	11	2
7	SE FUE LA LUZ EN DOS OCACIONES EL DIA DE HOY A LAS 13 20 Y A LAS 13 46				2021-11-10 10:11:05	12	1
8	SE CALLó EL SISTEMA OPERATIVO DE LLAMADAS DE EMERGENCIAS DEL 911 EL INGENIERO EDUARDO INTENTA SU RECUPERACIóN Y HASTA LA HORA HA SIDO IMPOSIBLE 				2021-11-11 10:11:41	16	5
9			SIENDO LAS 15:00 SE RECIBE INDUCCION DEL MANEJO DEL LIBRO DE NOVEDADES 911		2021-11-11 11:11:07	17	1
10	SIENDO LAS 10 AM SE PRESENTOP EL ING GILBERT GONZALES DEL DEPARTAMENTO DE TELEINFORMATICA DE LA GOBERNACION DEL ESTADO, PARA DAR LA INDUCCION SOBRE EL LIBRO DE NOVEDADES AL PERONAL DEL VEN911 MERIDA				2021-11-13 08:11:51	19	5
11		PENDIENTE LA REUNIóN  EL DIA 09 -12-2021  A LAS 09:00			2021-11-13 09:11:02	20	2
12		ENTREGAR TAREAS A ANGEL 			2021-11-15 11:11:09	25	2
13		STO DE BOMBERO DEJO SU MONEDERO			2021-11-15 11:11:03	26	3
14	SIENDO LAS 0830HLV SE PRESENTó EL FUNCIONARIO DEL CICPC D/J JORMAN PARRA REPORTANDOSE AL SERVICIO PARA CUALQUIER EVENTUALIDAD 0414-7473830				2021-11-16 09:11:07	28	5
15	SIENDO LAS 1600HLV SE PRESENTA EL S/J AVENDAñO DE LA PNB MUNICIPAL REPORTANDO QUE PARA EL DíA DE MAñANA ASISTIRá PARA EL TURNO DE LA TARDE UN FUNCIONARIO				2021-11-16 20:11:28	28	5
16	EL OPERADOR STEVEN MEDINA SE PRESENTó A LABORAR, PERO POR MOTIVO DE SALUD SE RETIRA DE LAS INSTALACION. 				2021-11-17 11:11:59	30	5
17	SE SUSPENDIO EL FLUIDO ELECTYRICO POR 15 MINUTOS 	RECORDAR PARA EL DIA 9/12/21 LA RECUNION A NIVEL DE DESPACHO 			2021-11-18 13:11:58	32	2
18	SIENDO LAS 18:10HLV SE PRESENTA A LABORAR EN EL DESPACHO DE POLICIA, LA S/J PM STELLA CORREA.				2021-11-19 03:11:09	31	5
19	SIENDO LAS 18:00HLV SE PRESENTA A LABORAR EN VIGILANCIA, EL SR RAMON LOBO.				2021-11-19 03:11:58	31	5
20	SIENDO LAS 0940 HLV RECIBE DESPACHO DE LA POLICíA EL SUPERVISOR JEFE SOSA, NIñO Y SE RETIRA DEL SERVICIO A LAS 1500HLV				2021-11-23 21:11:18	37	5
21	PARA EL DíA DE HOY 23 DE NOVIEMBRE DEL 2021 NO HUBO DESPACHADOR DE BOMBEROS MéRIDA, LE CORRESPONDíA A LA SARGENTO MARY INEZ RUIZ, SE DESCONOCE LOS MOTIVOS				2021-11-23 21:11:46	37	5
22	SIENDO LAS 1800 HLV SE PRESENTA EL FUNCIONARIO DE SEGURIDAD EL SR JOSE LUIS PEREZ PARA CUBRIR EL TURNO DE VIILANCIA HASTA EL AMANCER				2021-11-23 21:11:06	37	5
23	SIENDO LAS 1917 HLV RECIBE EL SERVICIO EL DESPACHADOR DE LA POLICIA SUPERVISOR JEFE JOE RODRIGUEZ QUIEN CUBRE EL TURNO NOCTURNO				2021-11-23 21:11:20	37	5
24	SIENDO LAS 11:30HLV INGRESA AL SISTEMA GILBERT GONZáLEZ PARA HACER EL REGISTRO DEL LIBRO DIGITAL Y LA RESPECTIVA INDUCCIóN 				2021-12-05 13:12:38	42	5
25	SE REPORTO UN OFICIAL CARLOS GUTIERRE				2021-12-05 14:12:58	43	1
26	MOTIVADO A LOS REQUERIMIENTOS DE CONSULTAS DE REGISTROS DE DATOS POR PARTE DE LOS OPERADORES, SE PROCEDE A REALIZAR LA EDICION DE CODIGOS Y FORMULARIO, PARA CONSTATAR QUE LA CONSULTA SE REALIZA DE MANERA CORRECTA. 				2024-08-06 11:08:25	83	4
27	ASí MISMO DE REALIZA UN CAMBIO EN EL FORMULARIO DE REGISTRO DE OBSERVACIONES, MOTIVADO A QUE LOS OPERADORES NO REALIZAN APERTURA DE GUARDIA Y ESTE NO TIENE REGISTROS EN TABLAS. POR TANTO SE DEJA QUE TRAIGA EL ULTIMO REGISTRO REALIZADO POR SUPERVISION O DESPACHO				2024-08-06 11:08:43	83	4
28	SE NOTIFICA QUE HEMOS RECIBIDO AGUA Y CAFE				2024-08-27 10:08:46	87	4
29	REALIZANDO PRUEBAS DE REGISTROS\r\n\r\nCON SALTOS DE LINEAS\r\n\r\n* VIñETAS\r\n* O SIN VIñETAS\r\nSIN VIñETAS				2024-09-03 09:09:53	87	4
30	REPORTE DE REGISTRO	ACCIONES PENDIENTES, AGREGAR BOTóN DE PROTOCOLO A USUARIO SUPERVISOR Y ADMINISTRADOR\r\n			2024-09-26 14:09:12	87	4
31	SE ENCONTRO EN EL CUBICULO UNA LLAVES				2024-10-04 11:10:46	87	4
32			OBSERVACIONES DE GUARDIA		2024-10-04 12:10:49	88	5
33				PENDIENTES	2024-10-18 14:10:54	95	4
34	DESPUES DE FLUCTUACION EL EQUIPO ASIGNADO SE APAGó				2024-10-21 15:10:16	95	4
35	SE REALIZA OBSERVACIONES DE GUARDIA, DEBIDO A QUE EL FORMULARIO DEL CIERRE DE SOLICITUDES DEBE DE TOMAR TIEMPO DE APERTURA, HORA SOLICITUD, TIEMPO DE RESPUESTA Y TIEMPO EFECTIVO.\r\n\r\nNOTANDO QUE EN NAVEGADOR CHROMIUM, NO ES POSIBLE MOSTRAR Y TOMAR EL TIEMPO DE APERTURA, COSA QUE EN EL NAVEGADOR DE FIREFOX, SI ES POSIBLE.\r\nQUE ES NECESARIO VERIFICAR Y CORREGIR EL TIEMPO EFECTIVO, REALIZANDO LAS SUMAS RESPECTIVAS DEL TIEMPO DE APERTURA Y TIEMPO EFECTIVO				2024-10-22 13:10:17	99	2
36	QUE DURANTE LA GUARDIA NOCTURNA A MI COMPAñERO SOTO, SE LE QUEDO EL CARGADOR DEL TELEFONO CELULAR				2024-11-01 10:11:27	103	3
37	SE REALIZó REGISTRO DE INICIO DE SESION CON EL FUNCIONAMIENTO NORMAL DE LOS FORMULARIOS	QUEDA PEMNDIENTE REALIZAR MANTENIMIENTO PREVENTICO A COMPUTADOR PERTENECIENTE A LA COORDINACIóN DE GESTIóN HUMANA			2024-11-26 11:11:45	106	3
38	SE MODIFICA EL FORMULARIO DE CIERRE DE SOLICITUDES, CON VERIFICACIóN EN LINEA DE CóDIGO DEL CAMPO SECTOR, QUE AL MOMENTO DE SELECCIONAR MUESTRE EL NúMERO DEL CUADRANTE. QUE AUN EN OBSERVACION SUJETO A SUGERENCIAS Y CAMBIOS.\r\n\r\nSE AGREGA IMAGEN DE AVATAR (OPERADOR) DEL VEN 9-1-1, EN LA PLATILLA DEL FORMULARIO.				2024-11-26 13:11:55	106	3
39	SE VERIFICA EL REGISTRO DE OBSERVACIONES, CONSULTAS DE GUARDIAS Y MANUAL DE USUARIO. FUNCIOANDO SIN INCONVENIENTES\r\n				2024-11-26 14:11:18	106	3
40	SE VERIFICA EL INICIO DE SESION Y FORMULARIOS DE APERTURA DE GUARDIA A NIVEL DE SUPERVISOR				2024-12-03 12:12:40	109	5
41	SIENDO LAS 14:31 TUVIMOS UN FALLO CON EL SUMINISTRO ELECTRICO 				2025-11-28 14:11:24	124	4
42			EL DíA DE HOY SE RECIBE UN NUEVO CUADERNO PARA EL áREA DE VIDEO PROTECCIóN\r\n		2025-12-04 16:12:45	132	4
43		QUEDA PENDIENTE HACER EL RECORRIDO DE LAS CáMARAS			2025-12-04 16:12:28	132	4
44	SIENDO LAS 4:30 PM SE PERDIERON LAS COMUNICACION DE LAS LINEAS TELEFONICAS 				2025-12-04 16:12:41	132	1
45				SE ENCONTRARON UNOS LENTES TIPO DEPORTIVOS COLOR NEGROS EN LA CABINA NUMERO 4, APARENTEMENTE DEL PERSONAL DE LA GUARDIA ANTERIOR 	2025-12-04 16:12:47	132	1
46	DURANTE EL PROCESO DEL DIA HUBO FUERTES LLUVIAS Y SE CAYO EL SISTEMA TRONCALIZADO 				2025-12-08 15:12:14	136	1
47	 SE INFORMA QUE EN LA CONSOLA NUMERO 4 SE ENCUENTRA UN CARPETA DE COLOR AMARILLO DEJADA POR UN COMPAñERO SE DESCONOCE QUIEN ES EL DUEñO 				2025-12-08 16:12:26	136	4
48	NOTA #1 SIENDO LAS 15:10 SE LOGRA APRECIAR QUE EN LAS CAMARAS PERIMETRAL PALACIO DE GOBIERNO (PLAZA BOLIVAR) TIENEN LAG Y LA IMAGEN SE SUELE CONGELAR				2025-12-08 16:12:13	136	4
\.


--
-- Data for Name: observaciones_entrada; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.observaciones_entrada (id, tipo_obse_e) FROM stdin;
1	No aplica
2	Tarde
3	Tarde con permiso
4	Cita médica
5	Enfermedad
6	Permiso Previo
7	Incidente
8	Estudio
9	Otro
\.


--
-- Data for Name: observaciones_salida; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.observaciones_salida (id, tipo_obse_s) FROM stdin;
1	No aplica
2	Cita médica
3	Enfermedad
4	Justificada
5	No autorizada
6	Estudio
7	Incidente
8	Permiso Previo
9	Otro
\.


--
-- Data for Name: organismos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.organismos (id, nombre_oganismos) FROM stdin;
1	PROTECCIÓN CIVÍL MÉRIDA
2	BOMBEROS DE MÉRIDA
3	POLICÍA DE MÉRIDA
4	OPERADORES
5	SUPERVISOR
\.


--
-- Data for Name: organismos_solicitud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.organismos_solicitud (id, nombre_org) FROM stdin;
3	INPRADEM
4	PM Foraneo
5	PM Libertador
6	Policia Municipal
7	Supervisión
8	Tránsito
1	Bomberos Rescate
2	Bomberos Servivida
9	No Aplica
0	null
\.


--
-- Data for Name: parantesco_personal; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.parantesco_personal (id, cedula_p, nombre_p, apellido_p, telefono_p, observaciones_p, personal_cedula, tipo_parenstesco_id) FROM stdin;
1	99999991	EMERGENCIAS MERIDA	EMERGENCIAS MERIDA	(000) 000-0000	MINISTERIOR DE RELACIONES INTERIORES	99999999	1
2	8017023	CELSA	DE ARAUJO	(274) 416-6858	LLAMAR EN CASO DE EMERGENCIAS	18125565	1
3	1010123	NANCY	PEñA	(274) 221-7858	LLAMAR EN CASO DE EMERGENCIA	8042991	7
4	15640920	ASENCION	HERNANDEZ	(414) 977-3599	LLAMAR EN CASO DE EMERGENCIA	13499752	3
5	23302896	KASSANDRA	DE FERNADEZ	(412)-0782744	LLAMAR EN CASO DE EMERGENCIA	17842117	5
6	23303011	KEILA	ROJAS	(414) 751-0991	LLAMAR EN CASO DE EMERGENCIA	16200660	7
7	20848648	CELINA	BALZA	(412) 784-5668	LLAMAR EN CASO DE EMERGENCIA	15620802	8
8	8026807	ARMINDA	ESPINOZA	(424) 773-7618	LLAMR EN CASO DE EMERGENCIA	18308368	1
9	19048401	MARIA	VEGA	(426) 377-4090	LLAMAR EN CASO DE EMERGENCIA	16445441	7
10	8024736	ISABEL	GUERRERO	(414) 732-9749	LLAMAR EN CASO DE EMERGENCIA	17340596	1
11	15175000	ALEXIS	GUEDEZ	(424) 775-4800	LLAMAR EN CASO DE EMERGENCIA	27777826	1
12	8032619	ROSA	ANGULO	(414) 079-6213	LLAMAR EN CASO DE EMERGENCIA	26052701	1
13	8027751	ALBA	DUGARTE	(416) 174-0231	LLAMAR EN CASO DE EMERGENCIA	16664398	1
14	9477580	AALEJANDRINA	ARAQUE	(274) 221-7646	LLAMAR EN CASO DE EMERGENCIA	20435049	1
15	9476025	RAMON	MORENO	(412) 099-3125	LLAMAR EN CASO DE EMERGENCIA	29520477	2
16	16201803	YACKSON	PICON	(424) 249-3348	LLAMAR EN CASO DE EMERGENCIA	18966872	7
17	7119116	MIRELLO	LOBO	(424) 770-3487	LLAMAR EN CASO DE EMERGENCIA	22887354	8
18	17842117	MISAEL	FERNANDEZ	(412) 062-3789	LLAMAR EN CASO DE EMERGENCIA	23302896	7
19	19046539	NANCY	RANGEL	(412) 763-2387	LLAMAR EN CASO DE EMERGENCIA	16908218	7
20	8010477	AURA	RONDON	(274) 245-5142	LLAMAR EN CASO DE EMERGENCIA	18123089	1
21	16445619	RONALD	DAVILA	(426) 131-8662	LLAMAR EN CASO DE EMERGENCIA	14267697	7
22	9477276	CARMEN	RAMIREZ	(412) 164-4300	LLAMAREN CASO DE EMERGENCIA	17129573	1
23	14805840	YELIMAR	GUILLEN	(424) 838-2337	LLAMAR EN CASO DE EMERGENCIA	20197663	3
24	18796909	KEYLA	SANTANA	(424) 737-9987	LLAMAR EN CASO DE EMERGENCIA	29794276	1
25	6701085	CESAR	GONZALEZ	(426) 235-0992	LLAMAR EN CASO DE EMERGENCIA	18310118	2
26	11460624	ROLANDO	CARRILLO	(426) 926-7288	LLAMAR EN CASO DE EMERGENCIA	12356337	7
27	14106046	MARIA	MALDONADO	(416) 078-3547	LLAMAR EN CASO DE EMERGENCIA	15620712	3
28	15516249	YUSMARY	BALZA	(424) 717-7720	LLAMAR EN CASO DE EMERGENCIA	17523387	7
29	12630765	ROSS	CASTRO	(424 828-5466)	LLAMAR EN CASO DE EMERGENCIA	15040226	8
30	18965308	JORGE	DUGARTE	(426) 271-8340	LLAMAR EN CASO DE EMERGENCIA	22657819	7
31	14016771	HENRRY	MONSALVE	(424) 751-8457	LLAMAR EN CASO DE EMERGENCIA	15621210	7
32	8028830	MARIA	PEñA	(274) 263-5483	LLAMAR EN CASO DE EMERGENCIA	20200220	1
33	12487720	CHERLY	GUERRERO	(416) 291-4690	LLAMAR EN CASO DE EMERGENCIAS	11913073	7
34	8024300	EDUARDO	BESEMBEL	(414) 744-0957	LLAMAR EN CASO DE EMERGENCIA	26931489	2
35	24349436	MARIBIT	RONDON	(416) 571-5246	LLAMAR EN CASO DE EMERGENCIA	21182738	7
36	13524039	NORIS	UZCATEGUI	(416) 379-3078	LLARMAR EN CASO DE EMERGENCIA	12780724	7
37	11952466	DORIS	UZCATEGUI	(414) 710-3139	LLAMAR EN CASO DE EMERGENCIAS	21183518	1
38	9200795	MIREYA	ZAMBRANO	(424) 747-7709	LLAMAR EN CASO DE EMERGENCIA	27433433	1
39	8039383	CARMEN	CUEVAS	(416) 070-6949	LLAMAR EN CASO DE EMERGENCIAS	19995073	1
40	12352907	YOLEIDA	MERCADO	(412) 352-9075	LLAMAR EN CASO DE EMERGENCIA	11954012	7
41	16664939	ANDRINA	LAZARONE	(414) 753-5368	TIA DEL COMPAñERO	26052741	4
42	20849245	Irene	Lobo	4247418901	Llamar en caso de emerengia	20847648	7
43	15755220	EDWIN	LOBO	(426) 603-3608	PADRE DEL JOVEN	31436014	2
44	14806959	Marco	Ramirez	4147470626	Compañero de habitacion	28205113	8
45	14100446	Jairo	Lobo	4147464661	Llamar en caso de emergencia	10100438	4
46	11952049	MARIO	MARQUINA	(412) 178-1156	LLAMAR EN CASO DE EMERGENCIA	31033723	2
47	15031296	DANI	ALVARADO	(412) 078-3178	LLAMAR EN CASO DE EMERGENCIA	31837357	2
48	14428070	JENNIFER	RAMIREZ	(424) 710-2874	LLAMAR EN CASO DE EMERGENCIA	32148040	1
49	13803858	LIZBETH	MONSALVE	(412) 121-1481	LLAMAR EN CASO DE EMERGENCIA	31149149	1
50	11954756	JOSE	PEñA	(422) 005-2775	LLAMAR EN CASO DE EMEREGENCIA	32488556	2
51	12351835	MARBELY	GUERRERO	(426) 272-8728	LLAMAR EN CASO DE EMERGENCIA	28202563	1
\.


--
-- Data for Name: parroquias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.parroquias (id, nombre_parroquia, municipios_id) FROM stdin;
360	HUACHAMACARE	25
361	MARAWAKA	25
362	MAVAkA	25
363	SIERRA PARIMA	25
364	CANAME	26
365	UCATA	26
366	YAPACANA	26
367	FERNANDO GIRON TOVAR	27
368	LUIS ALBERTO GOMEZ	27
369	PARHUEÑA	27
370	PLATANILLAL	27
371	GUAYAPO	28
372	MUNDUAPO	28
373	SAMARIAPO	28
374	SIPAPO	28
375	ALTO VENTUARI	29
376	BAJO VENTUARI	29
377	MEDIO VENTUARI	29
378	VICTORINO	30
379	CASIQUIARE	31
380	COCUY	31
381	SOLANO	31
382	ANACO	32
383	SAN JOAQUIN	32
384	BUENA VISTA	32
385	CAPITAL ARAGUA DE BARCELONA	33
386	CACHIPO	33
387	CAPITAL FERNANDO PEÑALVER	34
388	SAN MIGUEL 	34
389	SUCRE	34
390	SANTA BARBARA	35
391	CAPITAL FRANCISCO DEL CARMEN CARVAJAL	35
392	ATAPIRIRE	36
393	BOCA DEL PAO	36
394	EL PAO DE BARCELONA	36
395	CAPITAL FRANCISCO DE MIRANDA	36
396	MÚCURA	36
397	CHORRERÓN	37
398	CAPITAL GUANTA	37
399	MAMO	38
400	CAPITAL INDEPENDENCIA	38
401	CAPITAL PUERTO LA CRUZ	39
402	POZUELOS	39
403	CAPITAL JUAN MANUEL CAGIJAL	40
404	SAN PABLO	40
405	CAPITAL JOSE GREGORIO MONAGAS	41
406	PIAR	41
407	SANTA CLARA	41
408	SAN DIEGO DE CABRUTICA	41
409	UVERITO	41
410	ZUATA	41
411	EL CARITO	42
412	CAPITAL LIBERTAD	42
413	SANTA INES	42
414	CAPITAL MANUEL EZEQUIEL BRUZUAL	43
415	GUANAPE	43
416	SABANA DE UCHIRE	43
417	CAPITAL PEDRO MARÍA FRÉITES 	44
418	LIBERTADOR 	44
419	SANTA ROSA 	44
420	URICA 	44
421	CAPITAL PÍRITU 	45
422	SAN FRANCISCO 	45
423	SAN JOSÉ DE GUANIPA (EL TIGRITO) NO TIENE  PARROQUIA	46
424	BOCA DE CHAVEZ 	47
425	CAPITAL SAN JUAN DE CAPISTRANO 	47
426	PUEBLO NUEVO 	48
427	SANTA ANA 	48
428	EL CARMEN 	49
429	SAN CRISTÓBAL	49
430	BERGANTÍN	49
431	CAIGUA	49
432	EL PILAR	49
433	NARICUAL	49
434	EDMUNDO BARRIOS	50
435	MIGUEL OTERO SILVA	50
436	CAPITAL SIR ARTHUR MC GREGO 	51
437	TOMÁS ALFARO CALATRAVA 	51
438	CAPITAL DIEGO BAUTISTA URBANEJA	52
439	EL MORRO	52
440	URBANA ACHAGUAS	53
441	EL YAGUAL	53
442	GUACHARA	53
443	MUCURITAS	53
444	QUESERAS DEL MEDIO	53
445	BIRUACA	54
446	URBANA BRUZUAL	55
447	MANTECAL	55
448	QUINTERO	55
449	RINCON HONDO	55
450	SAN VICENTE	55
451	ARAMENDI	56
452	EL AMPARO	56
453	GUASDUALITO	56
454	SAN CAMILO	56
455	URDANETA	56
456	CODAZZI	57
457	CUNAVICHE	57
458	SAN JUAN DE PAYARA	57
459	ELORZA	58
460	LA TRINIDAD	58
461	EL RECREO	59
462	PEÑALVER	59
463	SAN FERNANDO	59
464	SAN RAFAEL DE ATAMAICA	59
465	SAN MATEO NO TIENE PARROQUIAS	60
466	CAMATAGUA	61
467	CARMEN DE CURA	61
468	FRANCISCO DE MIRANDA	62
469	MONS FELICIANO GONZÁLEZ	62
470	FRANCISCO LINARES ALCANTARA	62
471	ANDRES ELOY BLANCO	63
472	CHORONI	63
473	JOAQUIN CRESPO	63
474	JOSE CASANOVA GODOY	63
475	LAS DELICIAS	63
476	LOS TACARIGUAS	63
477	MADRE MARIA DE SAN JOSE	63
478	PEDRO JOSE OVALLES	63
479	SANTA CRUZ NO TIENE PARROQUIAS	64
480	CASTOR NIEVES RIOS	65
481	LAS GUACAMAYAS	65
482	JUAN VICENTE BOLIVAR	65
483	PAO DE ZARATE	65
484	ZUATA	65
485	EL CONSEJO NO TIENE PARROQUIA	66
486	LIBERTADOR	67
487	SAN MARTIN DE PORRES	67
488	CAÑA DE AZUCAR	68
489	MARIO BRICEÑO IRAGORRY (EL LIMÓN)	68
490	OCUMARE DE LA COSTA NO TIENE PARROQUIA	69
491	GUIRIPA	70
492	OLLAS DE CARAMACATE	70
493	SAN CASIMIRO	70
494	VALLE MORIN	70
495	SAN SEBASTIAN NO TIENE PARROQUIAS	71
496	ALFREDO PACHECO MIRANDA	72
497	AREVALO APONTE	72
498	CHUAO	72
499	SAMAN DE GUERE	72
500	SANTIAGO MARIÑO	72
501	SANTOS MICHELENA	73
502	TIARA	73
503	BELLA VISTA	74
504	SUCRE	74
505	LA COLONIA TOVAR NO TIENE PARROQUIA	75
506	URDANETA	76
507	LAS PEÑITAS	76
508	SAN FRANCISCO DE CARA	76
509	TAGUAY	76
510	AUGUSTO MIJARES	77
511	MAGDALENO	77
512	SAN FRANCISCO DE ASIS	77
513	VALLES DE TUCUTUNEMO	77
514	ZAMORA	77
515	EL CANTON 	78
516	PUERTO VIVAS 	78
517	SANTA CRUZ DE GUACAS 	78
518	ANDRES BELLO	79
519	NICOLAS PULIDO	79
520	TICOPORO	79
521	RODRIGUEZ DOMINGUEZ 	80
522	SABANETA 	80
523	ARISMENDI	81
524	GUADARRAMA	81
525	LA UNION	81
526	SAN ANTONIO	81
527	ALFREDO ARVELO LARRIVA	82
528	ALTO BARINAS	82
529	BARINAS	82
530	CORAZON DE JESUS	82
531	DOMINGA ORTIZ DE PAEZ	82
532	EL CARMEN	82
533	JUAN ANTONIO RODRIGUEZ DOMINGUEZ	82
534	MANUEL PALACIOS FAJARDO	82
535	RAMON IGNACIO MENDEZ	82
536	ROMULO BETANCOURT	82
537	SAN SILVESTRE	82
538	SANTA INES	82
539	SANTA LUCIA	82
540	TORUNOS	82
541	ALTAMIRA	83
542	BARINITAS	83
543	CALDERAS	83
544	BARRANCAS	84
545	EL SOCORRO	84
546	MASPARRITO	84
547	JOSE IGNACIO DEL PUMAR 	85
548	PEDRO BRICEÑO MENDEZ 	85
549	RAMON IGNACIO MENDEZ 	85
550	SANTA BARBARA	85
551	EL REAL 	86
552	LA LUZ 	86
553	LOS GUASIMITOS 	86
554	OBISPOS 	86
555	CIUDAD BOLIVIA 	87
556	IGNACIO BRICEÑO 	87
557	JOSE FELIX RIBAS 	87
558	PAEZ 	87
559	DOLORES 	88
560	LIBERTAD 	88
561	PALACIO FAJARDO 	88
562	SANTA ROSA 	88
563	SIMÓN RODRIGUEZ	88
564	CIUDAD DE NUTRIAS 	89
565	EL REGALO 	89
566	PUERTO DE NUTRIAS 	89
567	SANTA CATALINA 	89
568	SIMÓN BOLÍVAR	89
569	SANTA BARBARA 	90
570	BARCELONETA	90
571	SECCION CAPITAL ANGOSTURA	90
572	SAN FRANCISCO	90
573	CACHAMAY 	91
574	CHIRICA	91
575	DALLA COSTA	91
576	ONCE DE ABRIL	91
577	POZO VERDE	91
578	SIMON BOLIVAR	91
579	UNARE	91
580	UNIVERSIDAD	91
581	VISTA AL SOL	91
582	YOCOIMA 	91
583	CINCO DE JULIO 	91
584	ALTAGRACIA 	92
585	ASCENSION FARRERAS	92
586	SECCION CAPITAL CEDEÑO	92
587	GUANIAMO	92
588	LA URBANA	92
589	PIJIGUAOS 	92
590	EL CALLAO NO TIENE PARROQUIA	93
591	IKABARU 	94
592	SECCIÓN CAPITAL GRAN SABANA 	94
593	AGUA SALADA	95
594	CATEDRAL	95
595	JOSE ANTONIO PAEZ	95
596	LA SABANITA	95
597	MARHUANTA	95
598	ORINOCO	95
599	PANAPANA	95
600	VISTA HERMOSA	95
601	ZEA 	95
602	EL PALMAR NO TIENE PARROQUIA	96
603	ANDRES ELOY BLANCO	97
604	PEDRO COVA	97
605	SECCION CAPITAL PIAR	97
606	SECCION CAPITAL ROSCIO	98
607	SALÓM	98
608	DALLA COSTA	99
609	SAN ISIDRO	99
610	SECCION CAPITAL SIFONTES	99
611	ARIPAO	100
612	GUARATARO	100
613	LAS MAJADAS	100
614	SECCION CAPITAL SUCRE	100
615	MOITACO	100
616	BEJUMA	101
617	CANOABO	101
618	SIMON BOLIVAR	101
619	BELEN	102
620	GUIGUE	102
621	TACARIGUA	102
622	AGUAS CALIENTES	103
623	MARIARA	103
624	CIUDAD ALIANZA	104
625	GUACARA	104
626	YAGUA	104
627	MORON	105
628	URAMA	105
629	INDEPENDENCIA	106
630	TOCUYITO	106
631	LOS GUAYOS	107
632	MIRANDA	108
633	MONTALBAN	109
634	NAGUANAGUA	110
635	BARTOLOME SALOM	111
636	BORBURATA	111
637	DEMOCRACIA	111
638	FRATERNIDAD	111
639	GOAIGOAZA	111
640	JUAN JOSE FLORES	111
641	PATANEMO	111
642	UNION	111
643	URB SAN DIEGO	112
644	SAN JOAQUIN	113
645	CANDELARIA	114
646	CATEDRAL	114
647	EL SOCORRO	114
648	MIGUEL PEÑA	114
649	NEGRO PRIMERO	114
650	RAFAEL URDANETA	114
651	SAN BLAS	114
652	SAN JOSE	114
653	CAPITAL DE MUNICIPIO COJEDES	114
654	COJEDES	115
655	JUAN DE MATA SUAREZ	115
656	TINAQUILLO	116
657	EL BAUL	117
658	SUCRE	117
659	LA AGUADITA	118
660	MACAPO	118
661	EL PAO	119
662	EL AMPARO	120
663	LIBERTAD DE COJEDES	120
664	ROMULO GALLEGOS	121
665	JUAN ANGEL BRAVO	122
666	MANUEL MANRIQUE	122
667	SAN CARLOS DE AUSTRIA	122
668	GENERAL EN JEFE JOSE LAURENCIO SILVA	123
669	TINACO	123
670	ALMIRANTE LUIS BRION	124
671	FRANCISCO ANICETO LUGO	124
672	CURIAPO	124
673	MANUEL RENAUD	124
674	PADRE BARRAL	124
675	SANTOS DE ABELGAS	124
676	5 DE JULIO	125
677	IMATACA	125
678	JUAN BAUTISTA ARISMENDI	125
679	MANUEL PIAR	125
680	ROMULO GALLEGOS	125
681	LUIS BELTRAN PRIETO FIGUEROA	126
682	PEDERNALES	126
683	JOSE VIDAL MARCANO	127
684	JUAN MILLAN	127
685	LEONARDO RUIZ PINEDA	127
686	MARISCAL ANTONIO JOSE DE SUCRE	127
687	MONSEÑOR ARGIMIRO GARCIA	127
688	SAN JOSE	127
689	SAN RAFAEL	127
690	VIRGEN DEL VALLE	127
691	23 DE ENERO	128
692	ALTAGRACIA	128
693	ANTIMANO	128
694	CANDELARIA	128
695	CARICUAO	128
696	CATEDRAL	128
697	COCHE	128
698	EL JUNQUITO	128
699	EL PARAISO	128
700	EL RECREO	128
701	EL VALLE	128
702	LA PASTORA	128
703	LA VEGA	128
704	MACARAO	128
705	SAN AGUSTIN	128
706	SAN BERNARDINO	128
707	SAN JOSE	128
708	SAN JUAN	128
709	SAN PEDRO	128
710	SANTA ROSALIA	128
711	SANTA TERESA	128
712	SUCRE	128
713	CAPADARE	129
714	LA PASTORA	129
715	LIBERTADOR	129
716	SAN JUAN DE LOS CAYOS	129
717	ARACUA	130
718	LA PEÑA	130
719	SAN LUIS	130
720	BARIRO	131
721	BOROJO	131
722	CAPATARIDA	131
723	GUAJIRO	131
724	SEQUE	131
725	ZAZÁRIDA	131
726	YARACAL NO TIENE PARROQUIA	132
727	CARIRUBANA	133
728	NORTE	133
729	PUNTA CARDON	133
730	SANTA ANA	133
731	ACURIGUA	134
732	GUAIBACOA	134
733	LAS CALDERAS	134
734	LA VELA DE CORO	134
735	MACORUCA	134
736	DABAJURO NO TIENE PARROQUIA	135
737	AGUA CLARA	136
738	AVARIA	136
739	PEDREGAL	136
740	PIEDRA GRANDE	136
741	PURURECHE	136
742	ADAURE	137
743	ADICORA	137
744	BARAIVED	137
745	BUENA VISTA	137
746	EL HATO	137
747	EL VINCULO	137
748	JADACAQUIVA	137
749	MORUY	137
750	PUEBLO NUEVO	137
751	AGUA LARGA	138
752	CHURUGUARA	138
753	EL PAUJI	138
754	INDEPENDENCIA	138
755	MAPARARI	138
756	AGUA LINDA	139
757	ARAURIMA	139
758	JACURA	139
759	JUDIBANA	140
760	LOS TAQUES	140
761	CASIGUA	141
762	MENE DE MAUROA	141
763	SAN FELIX	141
764	GUZMAN GUILLERMO	142
765	MITARE	142
766	RIO SECO	142
767	SABANETA	142
768	SAN ANTONIO	142
769	SAN GABRIEL	142
770	SANTA ANA	142
771	BOCA DE TOCUYO	143
772	CHICHIRIVICHE	143
773	TOCUYO DE LA COSTA	143
774	PALMA SOLA NO TIENE PARROQUIA	144
775	CABURE	145
776	COLINA	145
777	CURIMAGUA	145
778	PIRITU	146
779	SAN JOSE DE LA COSTA	146
780	MIRIMIRE NO TIENE PARROQUIA	147
781	BOCA DE AROA	148
782	TUCACAS	148
783	PECAYA	149
784	LA CRUZ DE TARATARA	149
785	TOCÓPERO NO TIENE PARROQUIA	150
786	EL CHARAL	151
787	LAS VEGAS DEL TUY	151
788	STA.CRUZ DE BUCARAL	151
789	BRUZUAL	152
790	URUMACO	152
791	LA CIENAGA	153
792	LA SOLEDAD	153
793	PUEBLO CUMAREBO	153
794	PUERTO CUMAREBO	153
795	ZAZARIDA	153
796	CAMAGUAN	154
797	PUERTO MIRANDA	154
798	UVERITO	154
799	CHAGUARAMAS	155
800	EL SOCORRO	156
801	CAPITAL CALABOZO 	157
802	EL CALVARIO	157
803	EL RASTRO	157
804	GUARDATINAJAS	157
805	SAN RAFAEL DE LAYA	158
806	TUCUPIDO	158
807	ALTAGRACIA DE ORITUCO	159
808	LEZAMA	159
809	LIBERTAD DE ORITUCO	159
810	PASO REAL DE MACAIRA	159
811	SAN FRANCISCO DE MACAIRA	159
812	SAN RAFAEL DE ORITUCO	159
813	SOUBLETTE	159
814	CANTAGALLO	160
815	PARAPARA	160
816	SAN JUAN DE LOS MORROS	160
817	EL SOMBRERO	161
818	SOSA	161
819	CABRUTA	162
820	LAS MERCEDES	162
821	SANTA RITA DE MANAPIRE	162
822	ESPINO	163
823	VALLE DE LA PASCUA	163
824	PEDRO ZARAZA	164
825	SAN JOSE DE UNARE	164
826	ORTIZ	165
827	SAN FRANCISCO DE TIZNADOS	165
828	SAN JOSE DE TIZNADOS	165
829	SAN LORENZO DE TIZNADOS	165
830	CAZORLA	166
831	GUAYABAL	166
832	 SAN JOSÉ DE GUARIBE	167
833	ALTAMIRA	168
834	SANTA MARIA DE IPIRE	168
835	PIO TAMAYO	169
836	QUEBRADA HONDA DE GUACHE 	169
837	YACAMBÚ	169
838	FREITEZ	170
839	JOSE MARIA BLANCO	170
840	AGUEDO F. ALVARADO	171
841	BUENA VISTA	171
842	CATEDRAL	171
843	EL CUJI	171
844	JUAN DE VILLEGAS	171
845	JUAREZ	171
846	LA CONCEPCION	171
847	SANTA ROSA	171
848	TAMACA	171
849	UNION	171
850	CORONEL. MARIANO PERAZA	172
851	CUARA	172
852	DIEGO DE LOZADA	172
853	JOSE BERNARDO DORANTE	172
854	JUAN BAUTISTA RODRIGUEZ	172
855	PARAISO DE SAN JOSE	172
856	SAN MIGUEL	172
857	TINTORERO	172
858	ANZOATEGUI	173
859	BOLIVAR	173
860	GUARICO	173
861	HILARIO LUNA Y LUNA	173
862	HUMOCARO ALTO	173
863	HUMOCARO BAJO	173
864	LA CANDELARIA	173
865	MORAN	173
866	AGUA VIVA	174
867	CABUDARE	174
868	JOSÉ GREGORIO BASTIDAS	174
869	BURÍA	175
870	GUSTAVO VEGAS LEÓN	175
871	SARARE	175
872	ALTAGRACIA	176
873	ANTONIO DIAZ	176
874	CAMACARO	176
875	CASTAÑEDA	176
876	CECILIO ZUBILLAGA	176
877	CHIQUINQUIRA	176
878	EL BLANCO	176
879	ESPINOZA LOS MONTEROS	176
880	HERIBERTO ARROYO	176
881	LARA	176
882	LAS MERCEDES	176
883	MANUEL MORILLO	176
884	MONTAÑA VERDE	176
885	MONTES DE OCA	176
886	REYES VARGAS	176
887	TORRES	176
888	TRINIDAD SAMUEL	176
889	MOROTURO	177
890	SAN MIGUEL	177
891	SIQUISIQUE	177
892	XAGUAS	177
893	PRESIDENTE BETANCOURT	178
894	PRESIDENTE PÁEZ	178
895	PRESIDENTE RÓMULO GALLEGOS	178
896	GABRIEL PICÓN GONZÁLEZ	178
897	HÉCTOR AMABLE MORA	178
898	JOSÉ NUCETE SARDI	178
899	PULIDO MÉNDEZ	178
900	LA ZULIANITA NO TIENE PARROQUIA	179
901	ANTONIO PINTO SALINAS	180
902	MESA BOLÍVAR	180
903	MESA DE LAS PALMAS 	180
904	ARICAGUA	181
905	SAN ANTONIO	181
906	ARZOBISPO CHACÓN	182
907	CAPURÍ	182
908	CHACANTÁ	182
909	EL MOLINO	182
910	GUAIMARAL	182
911	MUCUCHACHÍ	182
912	MUCUTUY	182
920	CARACCIOLO PARRA OLMEDO	184
921	FLORENCIO RAMÍREZ	184
922	CARDENAL QUINTERO	185
923	LAS PIEDRAS	185
924	GUARAQUE	186
925	MESA DE QUINTERO	186
926	RÍO NEGRO	186
927	JULIO CÉSAR SALAS 	187
928	PALMIRA	187
929	JUSTO BRICEÑO	188
930	SAN CRISTÓBAL DE TORONDOY	188
931	ANTONIO SPINETTI DINI	189
932	ARIAS	189
933	CARACCIOLO PARRA PÉREZ	189
934	DOMINGO PEÑA	189
935	EL LLANO	189
936	GONZALO PICÓN FEBRES	189
937	JACINTO PLAZA	189
938	JUAN RODRÍGUEZ SUÁREZ	189
939	LASSO DE LA VEGA	189
940	MARIANO PICÓN SALAS	189
941	MILLA	189
942	OSUNA RODRÍGUEZ	189
943	SAGRARIO	189
944	EL MORRO	189
945	LOS NEVADOS	189
946	CAPITAL MIRANDA	190
947	ANDRÉS ELOY BLANCO	190
948	LA VENTA	190
949	PIÑANGO	190
950	CAPITAL OBISPO RAMOS DE LORA 	191
951	ELOY PAREDES	191
952	SAN RAFAEL DE ALCÁZAR	191
953	SANTA MARÍA DE CAPARO NO TIENE PARRROQUIA	192
954	PUEBLO LLANO NO TIENE PARROQUIA	193
955	CAPITAL RANGEL 	194
956	CACUTE	194
957	LA TOMA	194
958	MUCURUBÁ	194
959	SAN RAFAEL	194
960	CAPITAL RIVAS DÁVILA	195
961	GERÓNIMO MALDONADO	195
962	TABAY NO TIENE PARROQUIA	196
963	CAPITAL SUCRE	197
964	CHIGUARÁ	197
965	ESTÁNQUES	197
966	LA TRAMPA	197
967	PUEBLO NUEVO DEL SUR	197
915	JAJI	183
916	LA MESA	183
917	MATRIZ	183
918	MONTALBÁN	183
914	FERNÁNDEZ PEÑA	183
968	SAN JUAN	197
969	EL AMPARO	198
970	EL LLANO	198
971	SAN FRANCISCO	198
972	TOVAR	198
973	CAPITAL TULIO FEBRES CORDERO	199
974	INDEPENDENCIA	199
975	MARÍA DE LA CONCEPCIÓN PALACIOS BLANCO 	199
976	SANTA APOLONIA	199
977	CAPITAL ZEA 	200
978	CAÑO EL TIGRE	200
979	ARAGUITA	201
980	AREVALO GONZALEZ	201
981	CAPAYA	201
982	CAUCAGUA	201
983	EL CAFE	201
984	MARIZAPA	201
985	PANAQUIRE	201
986	RIBAS	201
987	SAN JOSE DE BARLOVENTO	202
988	CUMBO	202
989	NUESTRA SEÑORA DEL ROSARIO DE BARUTA 	203
990	EL CAFETAL	203
991	LAS MINAS DE BARUTA	203
992	CURIEPE	204
993	HIGUEROTE	204
994	TACARIGUA	204
995	MAMPORAL	205
996	CARRIZAL	206
997	CHACAO	207
998	CHARALLAVE	208
999	LAS BRISAS	208
1000	EL HATILLO	209
1001	ALTAGRACIA DE LA MONTAÑA	210
1002	CECILIO ACOSTA	210
1003	EL JARILLO	210
1004	LOS TEQUES	210
1005	PARACOTOS	210
1006	SAN PEDRO	210
1007	TACATA	210
1008	EL CARTANAL	211
1009	SANTA TERESA DEL TUY	211
1010	LA DEMOCRACIA	212
1011	OCUMARE DEL TUY	212
1012	SANTA BARBARA	212
1013	SAN ANTONIO DE LOS ALTOS	213
1014	EL GUAPO	214
1015	PAPARO	214
1016	RIO CHICO	214
1017	SAN FERNANDO DEL GUAPO	214
1018	TACARIGUA DE LA LAGUNA	214
1019	SANTA LUCIA	215
1020	CUPIRA	216
1021	MACHURUCUTO	216
1022	GUARENAS	217
1023	SAN FRANCISCO DE YARE	218
1024	SAN ANTONIO DE YARE	218
1025	CAUCAGUITA	219
1026	FILAS DE MARICHES	219
1027	LA DOLORITA	219
1028	LEONCIO MARTINEZ	219
1029	PETARE	219
1030	CÚA	220
1031	NUEVA CÚA	220
1032	BOLÍVAR	221
1033	GUATIRE	221
1034	CAPITAL ACOSTA	222
1035	SAN FRANCISCO	222
1036	AGUASAY NO TIENE PARROQUIA 	223
1037	CARIPITO NO TIENE PARROQUIA	224
1038	CAPITAL CARIPE	225
1039	EL GUÁCHARO	225
1040	LA GUANOTA	225
1041	SABANA DE PIEDRA	225
1042	SAN AGUSTÍN	225
1043	TERESÉN	225
1044	CAPITAL CEDEÑO	226
1045	AREO	226
1046	SAN FÉLIX	226
1047	VIENTO FRESCO	226
1048	CAPITAL EZEQUIEL ZAMORA	227
1049	EL TEJERO	227
1050	CAPITAL LIBERTADOR	228
1051	CHAGUARAMAS	228
1052	LAS ALHUACAS	228
1053	TABASCA	228
1054	CAPITAL MATURÍN	229
1055	ALTO DE LOS GODOS MATURÍN	229
1056	BOQUERÓN MATURÍN	229
1057	LAS COCUIZAS MATURÍN	229
1058	SAN SIMÓN MATURÍN	229
1059	SANTA CRUZ MATURÍN	229
1060	EL COROZO	229
1061	EL FURRIAL	229
1062	JUSEPÍN	229
1063	LA PICA	229
1064	SAN VICENTE	229
1065	CAPITAL PIAR	230
1066	APARICIO	230
1067	CHAGUARAMAL	230
1068	EL PINTO	230
1069	GUANAGUANA	230
1070	LA TOSCANA	230
1071	TAGUAYA	230
1072	CAPITAL PUNCERES	231
1073	CACHIPO	231
1074	SANTA BÁRBARA NO TIENE S	232
1075	CAPITAL SOTILLO	233
1076	LOS BARRANCOS DE FAJARDO	233
1077	URACOA NO TIENE PARROQUIAS	234
1078	CM.LA PLAZA DE PARAGUACHI	235
1079	LA ASUNCION	236
1080	SAN JUAN BAUTISTA	237
1081	ZABALA	237
1082	CAPITAL GARCIA	238
1083	FRANCISCO FAJARDO	238
1084	BOLIVAR	239
1085	GUEVARA	239
1086	MATASIETE	239
1087	SANTA ANA	239
1088	SUCRE	239
1089	AGUIRRE	240
1090	CAPITAL MANEIRO	240
1091	ADRIAN	241
1092	CAPITAL MARCANO	241
1093	PORLAMAR	242
1094	BOCA DEL RIO	243
1095	SAN FRANCISCO	243
1096	CAPITAL TUBORES	244
1097	LOS BARALES	244
1098	CAPITAL VILLALBA	245
1099	VICENTE FUENTES	245
1100	AGUA BLANCA NO TIENE PARROQUIA	246
1101	CAPITAL ARAURE	247
1102	RIO ACARIGUA	247
1103	CAPITAL ESTELLER	248
1104	UVERAL	248
1105	CAPITAL GUANARE	249
1106	CORDOBA	249
1107	SAN JOSE DE LA MONTAÑA	249
1108	SAN JUAN DE GUANAGUANARE	249
1109	VIRGEN DE LA COROMOTO	249
1110	CAPITAL GUANARITO	250
1111	TRINIDAD DE LA CAPILLA	250
1112	DIVINA PASTORA	250
1113	CAPITAL MONS. JOSÉ VICENTE DE UNDA	251
1114	PEÑA BLANCA	251
1115	CAPITAL OSPINO	252
1116	APARICIÓN	252
1117	LA ESTACIÓN	252
1118	CAPITAL PÁEZ	253
1119	PAYARA	253
1120	PIMPINELA	253
1121	RAMÓN PERAZA	253
1122	CAPITAL PAPELON	254
1123	CAÑO DELGADITO	254
1124	CAPITAL SAN GENARO DE BOCONOITO	255
1125	ANTOLÍN TOVAR	255
1126	CAPITAL SAN RAFAEL DE ONOTO	256
1127	SANTA FE	256
1128	THERMO MORLES	256
1129	CAPITAL SANTA ROSALÍA	257
1130	FLORIDA	257
1131	CAPITAL SUCRE	258
1132	CONCEPCIÓN	258
1133	SAN RAFAEL DE PALO ALZADO	258
1134	UVENCIO ANTONIO VELÁSQUEZ	258
1135	SAN JOSÉ DE SAGUAZ	258
1136	VILLA ROSA	258
1137	CAPITAL TURÉN	259
1138	CANELONES	259
1139	SANTA CRUZ	259
1140	SAN ISIDRO LABRADOR	259
1141	MARIÑO 	260
1142	RÓMULO GALLEGOS 	260
1143	SAN JOSÉ DE AEROCUAR	261
1144	TAVERA ACOSTA 	261
1145	RÍO CARIBE 	262
1146	ANTONIO JOSÉ DE SUCRE 	262
1147	EL MORRO DE PUERTO SANTO 	262
1148	PUERTO SANTO 	262
1149	SAN JUAN DE LAS GALDONAS 	262
1150	EL PILAR 	263
1151	EL RINCÓN 	263
1152	GENERAL FRANCISCO ANTONIO VÁSQUEZ 	263
1153	GUARAÚNOS 	263
1154	TUNAPUICITO 	263
1155	UNIÓN 	263
1156	BOLÍVAR 	264
1157	MACARAPANA 	264
1158	SANTA CATALINA 	264
1159	SANTA ROSA 	264
1160	SANTA TERESA 	264
1161	MARIGÜITAR NO TIENE PARROQUIA	265
1162	YAGUARAPARO 	266
1163	EL PAUJIL 	266
1164	LIBERTAD 	266
1165	ARAYA 	267
1166	CHACOPATA 	267
1167	MANICUARE 	267
1168	TUNAPUY 	268
1169	CAMPO ELÍAS 	268
1170	IRAPA 	269
1171	CAMPO CLARO 	269
1172	MARABAL 	269
1173	SAN ANTONIO DE IRAPA 	269
1174	SORO 	269
1175	SAN ANTONIO DEL GOLFO NO TIENE 	270
1176	CUMANACOA 	271
1177	ARENAS 	271
1178	ARICAGUA 	271
1179	COCOLLAR 	271
1180	SAN FERNANDO 	271
1181	SAN LORENZO 	271
1182	CARIACO 	272
1183	CATUARO 	272
1184	RENDÓN 	272
1185	SANTA CRUZ 	272
1186	SANTA MARÍA 	272
1187	ALTAGRACIA 	273
1188	AYACUCHO 	273
1189	SANTA INÉS 	273
1190	VALENTÍN VALIENTE 	273
1191	SAN JUAN 	273
1192	RAÚL LEONI 	273
1193	GRAN MARISCAL 	273
1194	GÜIRIA 	274
1195	BIDEAU 	274
1196	CRISTÓBAL COLÓN 	274
1197	PUNTA DE PIEDRAS 	274
1198	ANDRES BELLO NO TIENE PARROQUIA	275
1199	ANTONIO ROMULO COSTA NO TIENE PARROQUIA	276
1200	AYACUCHO 	277
1201	RIVAS BERTI 	277
1202	SAN PEDRO DEL RÍO 	277
1203	BOLÍVAR 	278
1204	JUAN VICENTE GÓMEZ 	278
1205	PALOTAL 	278
1206	ISAÍAS MEDINA ANGARITA 	278
1207	CÁRDENAS 	279
1208	LA FLORIDA 	279
1209	AMENODORO RANGEL LAMÚS 	279
1210	CÓRDOBA NO TIENE PARROQUIA	280
1211	FERNÁNDEZ FEO 	281
1212	ALBERTO ADRIANI 	281
1213	SANTO DOMINGO 	281
1214	SAN JOSÉ DE BOLÍVAR NO TIENE PARROQUIAS	282
1215	GARCÍA DE HEVIA 	283
1216	BOCA DE GRITA 	283
1217	JOSÉ ANTONIO PÁEZ 	283
1218	PALMIRA NO TIENE  NO TIENE PARROQUIAS	284
1219	INDEPENDENCIA 	285
1220	ROMÁN CÁRDENAS 	285
1221	JUAN GERMÁN ROSCIO 	285
1222	JÁUREGUI 	286
1223	EMILIO CONSTANTINO GUERRERO 	286
1224	MONSEÑOR MIGUEL ANTONIO SALAS 	286
1225	EL COBRE NO TIENE PARROQUIA	287
1226	JUNÍN 	288
1227	LA PETRÓLEA 	288
1228	QUINIMARÍ 	288
1229	BRAMÓN 	288
1230	LIBERTAD 	289
1231	CIPRIANO CASTRO 	289
1232	MANUEL FELIPE RUGELES 	289
1233	LIBERTADOR 	290
1234	DON EMETERIO OCHOA 	290
1235	SAN JOAQUÍN DE NAVAY 	290
1236	DORADAS 	290
1237	LOBATERA 	291
1238	CONSTITUCIÓN 	291
1239	MICHELENA NO TIENE PARROQUIA	292
1240	PANAMERICANO 	293
1241	LA PALMITA 	293
1242	PEDRO MARÍA UREÑA 	294
1243	NUEVA ARCADIA 	294
1244	DELICIAS NO TIENE PARROQUIA	295
1245	SAMUEL DARÍO MALDONADO 	296
1246	BOCONÓ 	296
1247	HERNÁNDEZ 	296
1248	SAN SEBASTIÁN 	297
1249	 SAN JUAN BAUTISTA 	297
1250	PEDRO MARÍA MORANTES 	297
1251	 LA CONCORDIA 	297
1252	 DR. FRANCISCO ROMERO LOBO 	297
1253	SEBORUCO NO TIENE PARROQUIA	298
1254	SAN SIMÓN NO TIENE PARROQUIA	299
1255	 SUCRE 	300
1256	 ELEAZAR LÓPEZ CONTRERAS 	300
1257	 SAN PABLO 	300
1258	SAN JOSECITO NO TIENE PARROQUIA	301
1259	 URIBANTE 	302
1260	 CÁRDENAS 	302
1261	 JUAN PABLO PEÑALOZA 	302
1262	 POTOSÍ 	302
1263	UMUQUENA NO TIENE PARROQUIA	303
1264	SANTA ISABEL 	304
1265	ARAGUANEY 	304
1266	EL JAGÜITO 	304
1267	LA ESPERANZA 	304
1268	BOCONÓ 	305
1269	EL CARMEN 	305
1270	MOSQUEY 	305
1271	AYACUCHO 	305
1272	BURBUSAY 	305
1273	GENERAL RIVAS 	305
1274	GUARAMACAL 	305
1275	VEGA DE GUARAMACAL 	305
1276	MONSEÑOR JÁUREGUI 	305
1277	RAFAEL RANGEL 	305
1278	SAN MIGUEL 	305
1279	SAN JOSÉ 	305
1280	SABANA GRANDE 	306
1281	CHEREGÜÉE	306
1282	GRANADOS 	306
1283	CHEJENDÉ 	307
1284	ARNOLDO GABALDÓN 	307
1285	BOLIVIA 	307
1286	CARRILLO 	307
1287	CEGARRA 	307
1288	MANUEL SALVADOR ULLOA 	307
1289	SAN JOSÉ 	307
1290	CARACHE 	308
1291	CUICAS 	308
1292	LA CONCEPCIÓN 	308
1293	PANAMERICANA 	308
1294	SANTA CRUZ 	308
1295	ESCUQUE 	309
1296	LA UNIÓN 	309
1297	SABANA LIBRE 	309
1298	SANTA RITA 	309
1299	EL SOCORRO 	310
1300	ANTONIO JOSÉ DE SUCRE 	310
1301	LOS CAPRICHOS 	310
1302	CAMPO ELÍAS 	311
1303	ARNOLDO GABALDÓN 	311
1304	SANTA APOLONIA 	312
1305	EL PROGRESO 	312
1306	TRES DE FEBRERO 	312
1307	LA CEIBA 	312
1308	EL DIVIDIVE 	313
1309	AGUA SANTA 	313
1310	AGUA CALIENTE 	313
1311	EL CENIZO 	313
1312	VALERITA 	313
1313	MONTE CARMELO 	314
1314	BUENA VISTA 	314
1315	SANTA MARÍA DEL HORCÓN 	314
1316	MOTATÁN 	315
1317	EL BAÑO 	315
1318	JALISCO 	315
1319	PAMPÁN 	316
1320	FLOR DE PATRIA 	316
1321	LA PAZ 	316
1322	SANTA ANA 	316
1323	PAMPANITO 	317
1324	LA CONCEPCIÓN 	317
1325	PAMPANITO II	317
1326	BETIJOQUE 	318
1327	LA PUEBLITA 	318
1328	LOS CEDROS 	318
1329	JOSÉ GREGORIO HERNÁNDEZ 	318
1330	CARVAJAL 	319
1331	ANTONIO NICOLÁS BRICEÑO 	319
1332	CAMPO ALEGRE 	319
1333	JOSÉ LEONARDO SUÁREZ 	319
1334	SABANA DE MENDOZA 	320
1335	EL PARAÍSO 	320
1336	JUNÍN 	320
1337	VALMORE RODRÍGUEZ 	320
1338	ANDRÉS LINARES 	321
1339	CHIQUINQUIRÁ 	321
1340	CRISTÓBAL MENDOZA 	321
1341	CRUZ CARRILLO 	321
1342	MATRÍZ 	321
1343	MONSEÑOR CARRILLO 	321
1344	TRES ESQUINAS 	321
1345	LA QUEBRADA 	322
1346	CABIMBÚ 	322
1347	JAJÓ 	322
1348	LA MESA 	322
1349	SANTIAGO 	322
1350	TUÑAME 	322
1351	JUAN IGNACIO MONTILLA 	323
1352	LA BEATRÍZ 	323
1353	MERCEDES DÍAZ 	323
1354	SAN LUIS 	323
1355	LA PUERTA 	323
1356	MENDOZA 	323
1357	CARABALLEDA	324
1358	CARAYACA	324
1359	CARLOS SOUBLETTE	324
1360	CARUAO	324
1361	CATIA LA MAR	324
1362	EL JUNKO	324
1363	LA GUAIRA	324
1364	MACUTO	324
1365	MAIQUETIA	324
1366	NAIGUATA	324
1367	URIMARE 1	324
1368	EL BATEY 	358
1369	ARISTIDES BASTIDAS NO TIENE PARROQUIAS	325
1370	BOLIVAR NO TIENE PARROQUIAS	326
1371	CAMPO ELIAS	327
1372	CAPITAL BRUZUAL	327
1373	COCOROTE NO TIENE PARROQUIAS	328
1374	INDEPENDENCIA NO TIENE PARROQUIAS	329
1375	JOSE ANTONIO PAEZ NO TIENE PARROQUIAS	330
1376	LA TRINIDAD NO TIENE NO TIENE PARROQUIAS	331
1377	MANUEL MONGE NO TIENE PARROQUIAS	332
1378	CAPITAL NIRGUA	333
1379	SALOM	333
1380	TEMERLA	333
1381	SAN ANDRES	334
1382	CAPITAL PEÑA	334
1383	ALBARICO	335
1384	CAPITAL SAN FELIPE	335
1385	SAN JAVIER	335
1386	SUCRE NO TIENE NO TIENE PARROQUIAS	336
1387	URACHICHE NO TIENE PAROQUIAS	337
1388	EL GUAYABO	338
1389	CAPITAL VEROES	338
1390	ISLA DE TOAS 	339
1391	MONAGAS 	339
1392	SAN TIMOTEO 	340
1393	GENERAL URDANETA 	340
1394	LIBERTADOR 	340
1395	MANUEL GUANIPA MATOS 	340
1396	MARCELINO BRICEÑO 	340
1397	PUEBLO NUEVO 	340
1398	AMBROSIO 	341
1399	CARMEN HERRERA 	341
1400	GERMÁN RÍOS LINARES 	341
1401	LA ROSA 	341
1402	JORGE HERNÁNDEZ 	341
1403	RÓMULO BETANCOURT 	341
1404	SAN BENITO 	341
1405	ARÍSTIDES CALVANI 	341
1406	PUNTA GORDA 	341
1407	ENCONTRADOS 	342
1408	UDÓN PÉREZ 	342
1409	SAN CARLOS DEL ZULIA 	343
1410	MORALITO 	343
1411	SANTA BÁRBARA 	343
1412	SANTA CRUZ DEL ZULIA 	343
1413	URRIBARRI 	343
1414	SIMÓN RODRÍGUEZ 	344
1415	CARLOS QUEVEDO 	344
1416	FRANCISCO JAVIER PULGAR 	344
1417	AGUSTÍN CODAZZI	344
1418	LA CONCEPCIÓN 	345
1419	JOSÉ RAMÓN YÉPEZ 	345
1420	MARIANO PARRA LEÓN 	345
1421	SAN JOSÉ 	345
1422	JESÚS MARÍA SEMPRÚN 	346
1423	BARÍ 	346
1424	LA CONCEPCIÓN 	347
1425	ANDRÉS BELLO 	347
1426	CHIQUINQUIRÁ 	347
1427	EL CARMELO 	347
1428	POTRERITOS 	347
1429	ALONSO DE OJEDA 	348
1430	LIBERTAD 	348
1431	CAMPO LARA 	348
1432	ELEAZAR LÓPEZ CONTRERAS 	348
1433	PARROQUIA VENEZUELA 	348
1434	EL DANTO	348
1435	LIBERTAD 	349
1436	BARTOLOMÉ DE LAS CASAS 	349
1437	RÍO NEGRO 	349
1438	SAN JOSÉ DE PERIJÁ 	349
1439	SAN RAFAEL	350
1440	TAMARE 	350
1441	LA SIERRITA 	350
1442	LAS PARCELAS 	350
1443	LUIS DE VICENTE 	350
1444	MONSEÑOR MARCOS SERGIO GODOY 	350
1445	RICAURTE 	350
1446	BOLÍVAR 	351
1447	CACIQUE MARA 	351
1448	CECILIO ACOSTA 	351
1449	CRISTO DE ARANZA 	351
1450	MANUEL DAGNINO 	351
1451	SAN ISIDRO 	351
1452	SANTA LUCÍA 	351
1453	FRANCISCO EUGENIO BUSTAMANTE 	351
1454	COQUIVACOA 	351
1455	OLEGARIO VILLALOBOS 	351
1456	VENANCIO PULGAR 	351
1457	ANTONIO BORJAS ROMERO 	351
1458	CARACCIOLO PARRA PÉREZ 	351
1459	CHIQUINQUIRÁ 	351
1460	IDELFONSO VÁSQUEZ 	351
1461	PARROQUIA JUANA DE ÁVILA 	351
1462	PARROQUIA RAÚL LEONI 	351
1463	PARROQUIA ALTAGRACIA 	352
1464	PARROQUIA ANA MARÍA CAMPOS 	352
1465	PARROQUIA FARÍA 	352
1466	PARROQUIA SAN ANTONIO 	352
1467	PARROQUIA SAN JOSÉ 	352
1468	JOSE ANTONIO CHAVEZ	352
1469	PARROQUIA SINAMAICA	353
1470	PARROQUIA ALTA GUAJIRA 	353
1471	PARROQUIA ELÍAS SÁNCHEZ RUBIO 	353
1472	PARROQUIA GUAJIRA 	353
1473	PARROQUIA EL ROSARIO 	354
1474	PARROQUIA DONALDO GARCÍA 	354
1475	PARROQUIA SIXTO ZAMBRANO 	354
1476	PARROQUIA SAN FRANCISCO 	355
1477	EL BAJO 	355
1478	DOMITILA FLORES 	355
1479	FRANCISCO OCHOA 	355
1480	MARCIAL HERNÁNDEZ 	355
1481	LOS CORTIJOS 	355
1482	JOSE DOMINGO RUS	355
1483	LUIS HURTADO HIGUERA	355
1484	SANTA RITA 	356
1485	EL MENE 	356
1486	JOSÉ CENOVIO URRIBARRI 	356
1487	PEDRO LUCAS URRIBARRI 	356
1488	PARROQUIA MANUEL MANRIQUE 	357
1489	RAFAEL MARÍA BARALT 	357
1490	RAFAEL URDANETA 	357
1491	BOBURES 	358
1492	GIBRALTAR 	358
1493	HERAS 	358
1494	PARROQUIA MONSEÑOR ARTURO CELESTINO ÁLVAREZ 	358
1495	RÓMULO GALLEGOS 	358
1496	LA VICTORIA 	359
1497	RAFAEL URDANETA 	359
1498	RAÚL CUENCA 	359
0	null	0
913	ACEQUIAS	183
919	SAN JOSÉ DEL SUR	183
\.


--
-- Data for Name: personal; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal (cedula, p_nombre, s_nombre, p_apellido, s_apelllido, telefono_celular, telefono_casa, correo_electronico, hijos, numero_hijos, nombre_sector, avenida, calle, casa, piso, apto, punto_referencia, fecha_creacion, parroquias_id, estado_civil_id, genero_id, grado_instruccion_id, organismos_id, cargos_id, rango_categoria_id, estatus_personal_id, grupo_guardia_id) FROM stdin;
18310118	YESSICA	ELIMAR	GONZALEZ	MERCADO	(426) 304-8917	(000) 000-0000	YESSICA_GONZALEZ_115@HOTMAIL.COM	t	3	CASERÍO MUCUNUTAN	ENTRADA DOS CAMINOS	EL ELECHAL	SIN NUMERO	0	00	CERCA DEL AMBULATORIO	2021-11-13 07:11:16	962	1	1	2	2	2	1	1	1
99999999	ADMIN	ADMIN	ADMIN	ADMIN	(000) 000-0000	(000) 000-0000	ADMIN@ADMIN.COM	f	0	VEN911	VEN911	VEN911	VEN911	0	0	VEN911 MERIDA	2021-11-08 09:40:30	914	1	2	4	5	4	4	1	4
18125565	TELMA	YOSELIN	ARAUJO	QUINTERO	(426) 173-1829	(000) 000-0000	ARAUJOTELMA93@GMAIL.COM	t	2	BARRIO RAÚL LEONI	PRINCIPAL	PRINCIPAL	22	0	00	PASOS ARRIBA DEL ESTADIO	2021-11-08 11:11:01	937	1	1	1	4	1	4	1	1
17842117	MISAEL	EDUARDO	FERNANDEZ	MONTILLA	(412) 062-3789	(000) 000-0000	MISAELFERNANDEZ1610@GMAIL.COM	t	3	URBANIZACIÓN BICENTENARIO	PRINCIPAL	PRINCIPAL	21	0	00	DESPUES DEL TANQUE DE AGUAS DE MERIDA	2021-11-08 12:11:55	942	2	2	1	1	2	2	1	1
16200660	JORGE	LUIS	UZCATEGUI	ALBARRAN	(416) 874-6785	(274) 221-3715	JORG3K3ILA@GMAIL.COM	t	1	URBANIZACIÓN ALFREDO LARA	PRINCIPAL	PRINCIPAL VIA EL SALADO	1-A	0	00	100 MTS ANTES DEL PUENTE	2021-11-08 12:11:36	915	4	2	3	5	3	3	1	1
15620802	JOSE	ANTONIO	SOSA	UZCATEGUI	(416) 470-5428	(274) 244-9759	JOSESOSAUZCATEGUI@GMAIL.COM	f	0	BARRIO SAN JOSÉ DE LAS FLORES	LOS PROCERES	PRIMERA ESCALERA	4-52	0	00	FRENTE A RESIDENCIAS ROSA E	2021-11-08 13:11:04	931	1	2	2	4	1	4	1	1
18308368	MARIA	VICTORIA	DAVILA	ESPINOZA	(412) 799-6849	(274) 872-0815	DAVILAMARIAVICTORIA@GMAIL.COM	t	1	BARRIO EL LLANITO	LOS PROCERES	CAIGUIRE	0-27	0	00	EL CAUCHO	2021-11-08 13:11:27	931	1	1	4	4	1	4	1	1
16445441	WILMER	DE JESUS	ALBARRAN	RIVERA	(426) 232-7453	(274) 996-3804	ALBARRAN_32@HOTMAIL.COM	t	2	SECTOR LOS CARACOLES	SIN NUMERO	13	114	0	00	ABASTO LOS PEñA	2021-11-08 15:11:23	968	4	2	2	2	2	1	1	1
17340596	GABRIEL		TORRES	GUERRERO	(412) 122-5093	(274) 244-1430	TORRESGUERREROGABRIEL01@GMAIL.COM	f	0	SECTOR LOS CHORROS DE MILLA	PRINCIPAL	PRINCIPAL	6-92	0	00	METROS ABAJO DEL HOTEL RIO MILLA	2021-11-10 10:11:44	941	1	2	1	4	1	4	1	3
27777826	NEIRI	COROMOTO	PEREZ	GUEDEZ	(424) 750-2075	(000) 000-0000	NEIRYPEREZ.16D@GMAIL.COM	t	1	SECTOR LOS CUROS	PRINCIPAL	SIN NUMERO	20	2	00	SECTOR SAN VICENTE	2021-11-10 11:11:07	942	1	1	2	4	1	4	1	3
26052701	YENNIFER	ANDREA	DUGARTE	ANGULO	(414) 975-7448	(274) 266-6273	YENNIFERANDREADUGARTEANGULO@GMAIL.COM	t	2	SECTOR LOMA DE MAITINES	LAS AMERICAS	PUENTA LA PEDREGOSA	111	0	00	MINI CC MIS RECUERDOS	2021-11-10 11:11:20	939	1	1	2	4	1	4	1	3
16664398	JOSE	RAMON	VELAZQUEZ	DUGARTE	(416) 669-8341	(000) 000-0000	JOSE12101983@GMAIL.COM	t	2	URBANIZACIÓN CAMPO DE ORO	PRINCIPAL	1	5-64	0	00	FRENTE A ANTIGUA FARMACIA SANTA MONICA	2021-11-10 11:11:38	934	1	2	3	5	3	3	1	3
12356337	YADIRA	ALEXANDRA	RODRIGUEZ	SANCHEZ	(416) 446-3276	(000) 000-0000	YRODRIGUEZ7644@GMAIL.COM	t	2	SECTOR LOMA DE MAITINES	LOS PROCERES	PRINCIPAL BAJO	67-54	1	00	SUBIENDO LAS ESCALERAS AFILADORAS MéRIDA	2021-11-15 09:11:18	939	4	1	1	2	2	2	1	1
20435049	MARIANA	ANDREINA	TORO	ARAQUE	(416) 675-5088	(274) 221-7646	PCMERIDAV.MTORO5049@GMAIL.COM	f	0	SECTOR LA VEGA	CENTENARIO	PRINCIPAL	60-B	1	00	PASO ARRIBA DE LA CAPILLA	2021-11-10 09:11:15	913	1	2	3	1	2	2	1	3
13499752	AURELIO		HERNANDEZ	RUIZ	(424) 777-0712	(000) 000-0000	ANGELYVALERIA15@GMAIL.COM	t	2	SECTOR LOS CUROS	SECTOR G7	CALLE 2	12	0	00	DETRAS DE LICEO ROMULO BETANCOURD	2021-11-08 12:11:56	942	1	2	1	2	2	2	1	1
29520477	ALEJANDRA		MORENO	PEñA	(412) 074-3972	(274) 283-0571	ALEJANDRAMP9@GMAIL.COM	f	0	SECTOR EL ROSAL	SIN NUMERO	ARAGUANEY	059-B	0	00	DIAGONAL A CASA COMUNITARIA EL ROSAL	2021-11-11 08:11:07	962	1	1	1	4	1	4	1	4
22887354	NEYDA	DEL CARMEN	HERNANDEZ	ACUñA	(424) 776-6573	(000) 000-0000	MAUANTONELA8899@GMAIL.COM	t	2	SECTOR LOS CUROS	PRINCIPAL	PRINCIPAL	34 EDIFICIO 3	0	00-01	MODULO CHICHUY	2021-11-11 09:11:25	942	2	1	3	4	1	4	1	4
23302896	KASSANDRA	MARIA	JEREZ	MARQUEZ	(412) 078-2744	(000) 000-0000	KASSANDRAJEREZ07@GMAIL.COM	t	2	SECTOR LOS CUROS	PRINCIPAL	PRINCIPAL	21	0	00	PASOS ARRIBA DEL TANQUE AGUAS DE MERIDA	2021-11-11 10:11:00	942	2	1	1	5	3	3	1	4
16908218	JULIO	JOSE	SANCHEZ	NIñO	(412) 061-5433	(000) 000-0000	SJULIO84@GMAIL.COM	t	4	CASERÍO LOS RURALES	SIN NUMERO	1	5-12	0	00	AL LADO POSADA LOS RURALES	2021-11-11 10:11:06	964	1	2	3	5	3	3	1	4
18123089	LUIS	ALBERTO	MORALES	RONDON	(424) 752-3860	(274) 245-5142	MORALESLUIS1687@GMAIL.COM	t	1	URBANIZACIÓN ALFREDO LARA	SINNUMERO	01 VEREDA 09	07	0	00	DIAGONAL AL PREESCOLAR 021	2021-11-11 11:11:34	915	1	2	3	1	2	4	1	4
14267697	THAIS	BIBIANA	BUSTAMANTE	GARRIDO	(426) 273-2210	(274) 271-2066	THAISB.0280@GMAIL.COM	t	2	URBANIZACIÓN EL CENTRAL	ANDRES BELLO	LA NEVADA	818-1	0	00	MUSEO DE CIENCIA	2021-11-13 06:11:51	938	2	1	3	5	3	3	1	1
17129573	NANCY	CAROLINA	VALERO	RAMIREZ	(412) 965-4950	(274) 251-4551	NANCYCAROLINAVALERO@GMAIL.COM	t	1	URBANIZACIÓN CARLOS GAINZA	PRINCIPAL EL ARENAL	PRINCIPAL URB LOS FRAILES	3	3	04	ENTRADA CARLOS GAINZA	2021-11-13 06:11:57	932	1	1	4	5	3	3	1	1
20197663	DAYANA	COROMOTO	GUILLEN	FLORES	(412) 765-8898	(274) 221-5931	DAYANAGRETTEL27@GMAIL.COM	t	1	BARRIO LOS ROSALES	CENTENARIO	PASAJE COLON	3	0	00	DIAGONAL A HERMACA	2021-11-13 07:11:20	913	1	1	3	4	1	4	1	1
29794276	KEYLIMAR	YOMARY	PEñALOZA	SANTANA	(426) 336-7739	(000) 000-0000	KEYLIMARSANTANA02@GMAIL.COM	f	0	SECTOR EL VALLE	PRINCIPAL	PRINCIPAL	32-B	2	00	FRENTE AL NOVICIADO	2021-11-13 07:11:53	936	1	1	1	4	1	4	1	1
15620712	GISELA		MALDONADO	AVENDAñO	(426) 776-2436	(274) 244-1759	GISEMALDO24@GMAIL.COM	f	0	SECTOR LOS CHORROS DE MILLA	PRINCIPAL UNION	01	1-75	0	00	AL LADO HOTEL RIO MILLA	2021-11-16 09:11:28	941	1	1	4	5	3	5	1	2
17523387	EDWIN	ANDRES	PINTO	ROJAS	(424) 717-7720	(274) 266-9991	RUTA02ENBICI@GMAIL.COM	t	1	SECTOR LA CHAMITA	BOLIVAR	LOS FRAILES	1-47	0	00	DIAGONAL AL PASAJE LOS GUAMOS	2021-11-16 09:11:56	937	1	2	1	5	3	5	1	2
15040226	LUIS	ADRIAN	MARCANO	CARABALLO	(426) 827-1296	(000) 000-0000	LUISADRIANMARCANOCARABALLO@GMAIL.COM	f	0	BARRIO SANTA ANA NORTE	LAS AMERICAS	VIA LA HECHICERA	RESISD DOMINGO SALAZAR 02	1	0202	FRENTE AL HOTEL CONVENCIONES	2021-11-16 09:11:09	931	1	2	4	4	1	5	1	2
22657819	LAURA	BEATRIZ	PEñA	ZERPA	(424) 778-9766	(000) 000-0000	JORGEMORRERO10@GMAIL.COM	t	2	SECTOR LA CHAMA	PRINCIPAL	URB EL GALERON CALLE 11	11-02	0	00	ESCUELA 16 DE SEPTIEMBRE ARRIBA A LA IZQ	2021-11-18 12:11:12	937	1	1	2	2	2	2	1	4
15621210	YUMAIRA	CAROLINA	ALBARRAN	DUQUE	(426) 256-9921	(000) 000-0000	ALBARRANDUQUE@GMAIL.COM	t	1	SECTOR EL ZAMURO	PRINCIPAL	SIN NUMERO	FINCA LOS POTRERITOS	0	00	FINCA LOS POTRERITOS	2021-11-24 13:11:25	932	2	1	4	1	2	3	1	3
20200220	MARIA	ANGELICA	PEñA	PEñA	(412) 074-4086	(274) 263-5483	ANGELREBELDE50@GMAIL.COM	f	0	SECTOR SANTA ELENA	16 SEPTIEMBRE	9	10-23	0	00	HOSPITAL UNIVERSITARIO	2021-12-03 11:12:58	934	1	1	1	5	3	5	1	5
26931489	ALEJANDRO	LUIS	BESEMBEL	RUIZ	(414) 729-5868	(274) 263-4496	ABESEMBEL@GMAIL.COM	f	0	SECTOR CENTRO EL LLANO	URDANETA		TIBISAY TORRE B	1	6	FRENTE A LEO CARS	2021-12-03 12:12:57	935	1	2	1	4	1	5	1	5
21182738	ALFREDO	ALEJANDRO	ROJAS	LOBO	(416) 571-5246	(000) 000-0000	ALFREDOALEJANDROROJASLOBO@GMAIL.COM	t	1	CONJUNTO RESIDENCIAL SAN ISIDRO	PRINCIPAL	PRIMAVERA	8	0	00	ABASTO MIEL DE LUNA	2021-12-03 12:12:28	939	2	2	3	4	1	5	1	5
12780724	ANGELO	IGNACIO	SANCHEZ	SUAREZ	(412) 655-3168	(000) 000-0000	ANGELONACHO@GMAIL.COM	t	4	SECTOR CARLOS SÁNCHEZ	PRINCIPAL	2	34	0	00	CUADRA ABAJO LICEO JOSE FELIX RIBAS	2021-12-03 12:12:30	914	2	2	3	4	1	5	1	5
21183518	JESSICA	IMALAY	BRAVO	UZCATEGUI	(412) 078-3193	(000) 000-0000	IMALAYBRAVO@GMAIL.COM	f	0	SECTOR LOS CUROS	SECTOR JOSE ANTONIO PAEZ	3 VEREDA 2	1-26	0	00	DETRAS DEL MERCADO	2021-12-05 11:12:59	942	1	1	3	5	3	5	1	7
27433433	ANDY	MANUEL	TERAN	ZAMBRANO	(424) 725-9608	(000) 000-0000	ANDYMANUELTZ1997@GMAIL.COM	f	0	URBANIZACIÓN CAMPO DE ORO	16 DE SEPTIEMBRE		00	0	00	FARMACIA LA 16	2021-12-05 11:12:43	934	1	2	1	4	1	5	1	7
19995073	ANTHONY	JESUS	CUEVAS	CUEVAS	(414) 358-2871	(274) 271-5861	ANTHONYCUEVAS126@GMAIL.COM	f	0	SECTOR LOS CUROS	PRINCIPAL	6	3	2	02-03	DETRAS INGLESIA CORAZON MARIA	2021-12-05 12:12:45	942	1	2	4	4	1	5	1	7
11954012	JESUS	REINALDO	SANCHEZ	ESCALONA	(412) 664-1838	(274) 221-0914	JESUSREINALDITO@GMAIL.COM	t	3	BARRIO AGUAS CALIENTES	PRINCIPAL	LARA	URB VILLA LARA TORRE 2	2	7	PASANDO PUENTE BELLA VISTA MANO IZQUIERD	2021-12-05 12:12:01	914	4	2	1	1	2	4	1	7
8042991	JOSE	ELPIDIO	SOSA	NIñO	(426) 274-0692	(274) 221-7858	SOSAJOSE_E@HOTMAIL.COM	t	2	SECTOR MANZANO ABAJO	URDANETA	LOS RUICES	SIN NUMERO	0	00	VIA PRINCIPAL MANZANO ALTO	2021-11-08 11:11:53	915	4	2	2	3	2	3	1	1
11913073	EDDY	RODOLFO	ZAMBRANO	PEñA	(416) 874-6792	(000) 000-0000	ERZP17@GMAIL.COM	t	2	CONJUNTO RESIDENCIAL CENTENARIO	CENTENARIO		5	4	41	ALA SUR CC CENTENARIO	2021-12-03 11:12:41	914	1	2	4	5	3	5	1	5
26052741	EDWIN	ALEXANDER	RIVERA	RENDON	(412) 076-8508	(274) 271-0036	EDWINALEXANDERRIVERARENDON@GMAIL.COM	f	0	SECTOR ENTABLITO L	VEREDA 03	VEREDE 03	30	0	00	PASOS ABAJO DEL REGISTRO CIVIL	2025-11-28 12:11:45	942	1	2	1	4	1	5	1	3
20847648	OSCAR	ANDRES	ALARCON	ROJAS	(424) 766-8846	(000) 000-0000	OSCARAKEVINA@HOTMAIL.COM	t	2	SECTOR EL PORTACHUELO	CALLE LOS JAZMINES	CALLE LOS JAZMINES	00	0	00	PASANDO EL REDUCTOR DE VELOCIDAD	2025-11-28 12:11:31	937	1	2	1	3	2	5	1	3
28205113	YORMAN	JESUS	VALERO	PEñA	(414) 753-1321	(000) 000-0000	YORMANVALERO04@GMAIL.COM	f	0	URBANIZACIÓN SANTA JUANA	PRINCIPAL	VEREDA 07	12	0	00	BAJANDO POR LA IGLESIA	2025-12-02 15:12:00	934	1	2	1	4	1	5	1	2
31436014	KEVIN	LEONARDO	LOBO	LOBO	(424) 760-3858	(000) 000-0000	LOBOKEVIN268@GMAIL.COM	f	0	SECTOR LOS CUROS	VEREDA 01	VEREDA 01	11	1	00	INFOCENTRO	2025-12-02 15:12:12	942	1	2	2	4	1	5	1	2
10100438	ERWIN	RICHARD	LOBO	MARTINEZ	(414) 592-6069	(274) 244-3866	RICHARDLOBO20000@GMAIL.COM	t	1	BARRIO EL LLANITO	LAS AMERICAS	RESIDENCIA ARAGUANEI	TORRE 06	1	03	COLEGIO ARZOBISPO SILVA	2025-12-02 15:12:03	931	3	2	1	1	2	4	1	2
31033723	KENETH	JEREMIAS	MARQUINA	ANTOINE	(414) 709-7448	(000) 000-0000	MARQUINAKENETH560@GMAIL.COM	f	0	SECTOR LOS CARACOLES	PRINCIPAL	RESIDENCIA EL CARDON	25	0	00	DETRAS DEL LICEO LA PORTUGUESA	2025-12-04 12:12:30	968	1	2	1	4	1	5	1	4
31837357	KEVIN	DANIEL	ALVARADO	RAMIREZ	(426) 460-6839	(274) 260-0321	DANIEL17ALVARADO2006@GMAIL.COM	f	0	SECTOR LA CHAMA	URBANICACION EL GALERON	11	1111	0	00	ULTIMA PARADA BUSETAS DEL CHAMA	2025-12-04 12:12:52	937	1	2	4	1	2	5	1	4
32148040	LEONELA	ALEJANDRA	UZCATEGUI	RAMIREZ	(414) 702-9248	(000) 000-0000	UZCATEGUILEONELA054@GMAIL.COM	f	0	URBANIZACIÓN PADRE DUQUE	CALLE 5B	5	74	0	00	CALLE 5	2025-12-04 15:12:33	918	1	1	1	4	1	5	1	4
31149149	ROGNIBETH	ADRIANA	BASTIDAS	PEREZ	(424) 714-7321	(274) 271-1722	ROGNIBASTIDAS@GMAIL.COM	f	0	SECTOR LOS CUROS	PRINCIPAL	URB LOS CUROS	43	2	04	1ER TANQUE DE AGUA	2025-12-04 15:12:42	942	1	1	1	1	2	5	1	4
18966872	WENNDY	NAIROBY	MOYA	FLOREZ	(412) 547-6218	(000) 000-0000	WENNDY.MOYA@GMAIL.COM	f	0	SECTOR MUCUMBO	SIN NUMERO	FINAL POMPILIO FLORES	SIN NUMERO	0	00	PASO ABAJO TALLER LATONERIA RAMON	2021-11-11 09:11:38	963	1	1	4	5	3	4	1	4
32488556	MIGUEL	ANGEL	PEñA	RODRIGUEZ	(416) 088-8082	(000) 000-0000	MP3659150@GMAIL.COM	f	0	BARRIO LA TRINIDAD	LOS PROCERES	SANTA ANA	04	0	00	AGENCIA MRW	2025-12-08 14:12:15	939	1	2	1	4	1	5	1	2
28202563	LOGNER	ALEJANDRO	QUINTERO	GUERRERO	(424) 737-6255	(000) 000-0000	LOGNERQUIN23@GMAIL.COM	f	0	SECTOR LA CHAMA	PRINCIPAL	PRINCIPAL	16	0	00	FRENTE A TOYOCENTER	2025-12-08 15:12:38	937	1	2	1	4	1	5	1	3
\.


--
-- Data for Name: personal_datos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_datos (id, personal_cedula_sup, personal_cedula_aux, personal_cedula_op1, personal_cedula_op2, personal_cedula_op3, personal_cedula_op4, personal_cedula_op5, personal_cedula_op6, personal_cedula_poli1, personal_cedula_poli2, personal_cedula_poli3, personal_cedula_bomb1, personal_cedula_bomb2, personal_cedula_bomb3, personal_cedula_pc1, personal_cedula_pc2, personal_cedula_pc3, personal_grupos_guardia_id) FROM stdin;
1	16200660	0	18125565	15620802	18308368	0	0	0	8042991	0	0	8042991	0	0	17842117	0	0	1
2	16664398	0	26052701	17340596	27777826	0	0	0	8042991	0	0	0	0	0	0	0	0	2
3	23302896	16908218	29520477	18966872	22887354	0	0	0	8042991	0	0	0	0	0	17842117	0	0	3
4	17129573	14267697	20197663	29794276	0	0	0	0	0	0	0	0	0	0	0	0	0	4
5	16200660	0	15620802	18125565	18308368	0	0	0	8042991	0	0	12356337	0	0	20435049	0	0	5
6	15620712	17523387	26052701	15040226	22887354	0	0	0	8042991	0	0	13499752	0	0	18123089	0	0	6
7	16664398	0	27777826	0	0	0	0	0	8042991	0	0	0	0	0	0	0	0	7
8	16908218	0	29520477	18966872	0	0	0	0	8042991	0	0	22657819	0	0	17842117	0	0	8
9	15620712	17523387	26052701	15040226	22887354	0	0	0	8042991	0	0	0	0	0	17842117	0	0	9
10	16664398	0	27777826	17340596	0	0	0	0	0	0	0	22657819	0	0	0	0	0	10
11	11913073	20200220	12780724	26931489	21182738	0	0	0	8042991	0	0	22657819	0	0	17842117	0	0	11
12	21183518	0	27433433	19995073	0	0	0	0	0	0	0	13499752	0	0	11954012	0	0	12
13	15620712	17523387	15040226	22887354	26052701	0	0	0	8042991	0	0	12356337	0	0	15621210	0	0	13
14	17129573	0	26052701	27777826	0	0	0	0	0	0	0	16445441	0	0	0	0	0	14
15	23302896	16908218	26931489	19995073	0	0	0	0	8042991	0	0	18310118	0	0	18123089	0	0	15
16	23302896	16908218	27433433	19995073	12780724	18966872	0	0	8042991	0	0	18310118	0	0	18123089	0	0	16
17	20200220	11913073	18125565	15620802	18308368	0	0	0	8042991	0	0	18310118	16445441	0	17842117	20435049	0	17
18	20200220	11913073	18125565	15620802	18308368	0	0	0	8042991	0	0	18310118	0	0	17842117	0	0	18
19	23302896	16908218	18125565	15620802	18308368	0	0	0	8042991	0	0	18310118	0	0	20435049	0	0	19
20	23302896	16908218	19995073	27433433	12780724	0	0	0	8042991	0	0	18310118	0	0	17842117	0	0	20
21	23302896	16908218	12780724	26931489	29794276	0	0	0	8042991	0	0	12356337	0	0	20435049	0	0	21
22	23302896	16908218	19995073	12780724	26931489	29794276	22887354	29520477	8042991	0	0	18310118	12356337	0	17842117	0	0	22
23	23302896	16908218	27777826	15040226	0	0	0	0	8042991	0	0	18310118	0	0	17842117	0	0	23
24	23302896	16908218	12780724	15040226	18966872	0	0	0	8042991	0	0	18310118	12356337	0	20435049	18123089	0	24
25	23302896	23302896	20197663	29520477	0	0	0	0	8042991	0	0	16445441	12356337	0	17842117	20435049	0	25
26	23302896	16908218	26931489	15040226	0	0	0	0	8042991	0	0	16445441	0	0	18123089	0	0	26
27	23302896	16908218	20197663	22887354	15620802	0	0	0	8042991	0	0	16445441	0	0	17842117	0	0	27
28	20200220	11913073	15620802	29520477	20197663	0	0	0	8042991	0	0	16445441	12356337	0	20435049	0	0	28
29	23302896	16908218	22887354	29520477	18308368	0	0	0	8042991	0	0	18310118	0	0	17842117	0	0	29
30	23302896	16908218	17340596	18966872	29520477	0	0	0	8042991	0	0	18310118	0	0	0	0	0	30
31	23302896	0	20197663	29520477	0	0	0	0	0	0	0	0	0	0	0	0	0	31
32	23302896	0	20197663	26052701	0	0	0	0	0	0	0	0	0	0	20435049	0	0	32
33	23302896	16908218	15620802	17340596	0	0	0	0	8042991	0	0	0	0	0	0	0	0	33
34	23302896	16908218	29794276	0	0	0	0	0	8042991	0	0	18310118	0	0	0	0	0	34
35	23302896	0	20197663	0	0	0	0	0	8042991	0	0	0	0	0	20435049	0	0	35
36	23302896	0	15040226	0	0	0	0	0	0	0	0	0	0	0	18123089	0	0	36
37	16908218	23302896	26931489	0	0	0	0	0	8042991	0	0	12356337	0	0	18123089	0	0	37
38	21183518	0	18308368	18966872	0	0	0	0	8042991	0	0	12356337	0	0	18123089	0	0	38
39	17129573	0	29794276	20197663	29520477	0	0	0	8042991	0	0	16445441	0	0	18123089	0	0	39
40	23302896	16908218	20197663	18966872	29794276	0	0	0	8042991	0	0	16445441	0	0	20435049	0	0	40
41	16200660	0	17340596	29520477	15040226	0	0	0	8042991	0	0	18310118	12356337	0	17842117	0	0	41
42	17129573	14267697	18125565	17340596	20197663	0	0	0	8042991	0	0	12356337	18310118	0	20435049	0	0	42
43	17129573	0	18125565	17340596	27433433	0	0	0	8042991	0	0	18310118	12356337	0	20435049	0	0	43
44	20200220	0	15040226	26931489	21182738	0	0	0	8042991	0	0	18310118	12356337	0	17842117	15621210	0	44
45	20200220	11913073	20197663	17340596	15040226	0	0	0	8042991	0	0	18310118	12356337	0	20435049	17842117	0	45
46	17129573	16200660	27777826	29794276	26052701	0	0	0	8042991	0	0	12356337	13499752	0	20435049	0	0	46
47	20200220	11913073	18125565	17340596	15040226	0	0	0	8042991	0	0	18310118	12356337	0	20435049	0	0	47
48	17129573	16200660	17340596	15040226	21182738	0	0	0	8042991	0	0	18310118	0	0	20435049	0	0	48
49	20200220	11913073	17340596	29520477	22887354	0	0	0	8042991	0	0	16445441	12356337	0	18123089	0	0	49
50	17129573	14267697	19995073	27433433	12780724	0	0	0	8042991	0	0	0	0	0	0	0	0	50
51	20200220	11913073	18308368	19995073	29794276	0	0	0	8042991	0	0	12356337	18310118	0	20435049	0	0	51
52	17129573	16200660	15040226	21182738	0	0	0	0	8042991	0	0	18310118	0	0	20435049	0	0	52
53	20200220	11913073	18125565	15040226	29520477	0	0	0	8042991	0	0	18310118	0	0	11954012	0	0	53
54	17129573	14267697	15040226	29794276	26052701	0	0	0	8042991	0	0	18310118	13499752	0	18123089	15621210	0	54
55	20200220	11913073	15040226	18125565	27433433	0	0	0	8042991	0	0	18310118	12356337	0	17842117	15621210	0	55
56	15620712	17523387	18125565	15620802	0	0	0	0	8042991	0	0	18310118	0	0	17842117	0	0	56
57	17129573	14267697	19995073	0	0	0	0	0	8042991	0	0	18310118	0	0	11954012	0	0	57
58	16664398	16664398	26052741	0	0	0	0	0	20847648	0	0	13499752	0	0	15621210	0	0	58
59	15620712	17523387	28205113	31436014	0	0	0	0	20847648	0	0	13499752	0	0	10100438	0	0	59
60	18966872	16908218	32148040	31033723	0	0	0	0	20847648	0	0	18310118	0	0	31149149	0	0	60
61	16664398	16664398	32488556	28202563	0	0	0	0	20847648	0	0	13499752	0	0	10100438	0	0	61
62	18966872	16908218	32148040	31033723	0	0	0	0	20847648	0	0	13499752	0	0	31149149	0	0	62
63	16664398	0	15620802	28202563	27433433	0	0	0	20847648	0	0	13499752	0	0	10100438	0	0	63
\.


--
-- Data for Name: personal_grupos_guardia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_grupos_guardia (id, grupos_guardia_id, fecha_asig, fecha_fin) FROM stdin;
1	1	2021-11-08 13:11:56	2021-11-08 15:11:55
2	3	2021-11-10 12:11:34	2021-11-10 11:11:22
3	4	2021-11-11 10:11:45	2021-11-11 11:11:07
4	1	2021-11-13 07:11:41	2021-11-13 09:11:20
5	1	2021-11-15 10:11:39	2021-11-16 06:11:35
6	2	2021-11-16 09:11:10	2021-11-17 08:11:42
7	3	2021-11-17 11:11:21	\N
8	4	2021-11-18 12:11:04	2021-11-19 08:11:58
9	2	2021-11-23 09:11:49	2021-11-24 08:11:24
10	3	2021-11-24 11:11:12	\N
11	5	2021-12-03 13:12:25	\N
12	7	2021-12-05 12:12:58	2021-12-06 05:12:59
13	2	2021-12-14 10:12:12	2021-12-15 07:12:37
14	1	2023-04-28 11:04:05	\N
15	4	2023-08-02 05:08:07	\N
16	4	2023-08-02 07:08:46	\N
17	5	2023-08-10 05:08:42	\N
18	5	2023-08-13 17:08:21	\N
19	4	2023-08-20 07:08:24	\N
20	4	2023-08-20 07:08:58	\N
21	4	2023-08-23 05:08:21	\N
22	4	2023-08-31 04:08:03	\N
23	4	2023-09-19 20:09:53	\N
24	4	2023-09-19 22:09:20	\N
25	4	2023-09-19 22:09:42	\N
26	4	2023-10-03 05:10:21	\N
27	4	2023-10-05 22:10:18	\N
28	5	2024-02-29 10:02:40	\N
29	4	2024-03-07 11:03:10	2024-03-07 15:03:32
30	4	2024-03-12 14:03:53	\N
31	4	2024-03-14 10:03:45	\N
32	4	2024-03-19 11:03:43	\N
33	4	2024-03-22 08:03:47	\N
34	4	2024-03-26 13:03:14	2024-03-26 15:03:26
35	4	2024-03-30 13:03:55	2024-03-30 15:03:48
36	4	2024-04-09 12:04:02	\N
37	4	2024-04-11 12:04:55	\N
38	7	2024-04-16 12:04:56	\N
39	1	2024-04-18 09:04:53	2024-04-18 15:04:04
40	4	2024-04-25 15:04:29	\N
41	1	2024-05-28 12:05:25	\N
42	1	2024-07-10 10:07:34	\N
43	1	2024-08-06 10:08:03	2024-08-13 15:08:17
44	5	2024-08-15 10:08:12	\N
45	5	2024-08-27 05:08:51	\N
46	1	2024-10-04 11:10:06	2024-10-15 11:10:01
47	5	2024-10-15 11:10:26	2024-10-18 14:10:54
48	1	2024-10-18 14:10:23	2024-10-18 14:10:57
49	5	2024-10-22 10:10:15	\N
50	1	2024-10-29 10:10:37	\N
51	5	2024-11-01 09:11:24	\N
52	1	2024-11-07 11:11:04	\N
53	5	2024-11-26 10:11:27	2024-11-26 14:11:37
54	1	2024-12-03 09:12:45	2024-12-03 15:12:56
55	5	2024-12-17 08:12:00	2024-12-17 17:12:08
56	2	2025-07-17 11:07:50	2025-07-17 15:07:38
57	1	2025-08-05 17:08:20	\N
58	3	2025-11-28 13:11:08	2025-11-28 14:11:39
59	2	2025-12-02 16:12:10	2025-12-02 16:12:16
60	4	2025-12-04 15:12:49	2025-12-04 16:12:28
61	3	2025-12-08 15:12:37	2025-12-08 16:12:55
62	4	2025-12-09 14:12:14	2025-12-09 15:12:20
63	3	2026-03-08 19:03:05	\N
\.


--
-- Data for Name: personal_guardias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_guardias (id, fecha_ingreso_g, fecha_salida_g, descripcion, observaciones_entrada_id, observaciones_salida_id, personal_cedula, guardias_id) FROM stdin;
1	\N	2021-11-10 12:11:40	SE RETIRA PORQUE VA A PRESENTAR UNA PRUEBA 	\N	6	17340596	10
2	2021-11-11 10:11:57	\N	Andreína Fernández realizo cambio de guardia con neyda Hernández	9	\N	22887354	\N
3	\N	2021-11-11 10:11:41	SE RETIRA LA OPERADORA POR MALESTAR GENERAL	\N	3	22887354	16
4	\N	2021-11-13 08:11:52	LA AUXILIAR DE SUPERVISION SE RETIRA DE LA GUARDIA, POR ORDEN MEDICA	\N	3	14267697	19
5	\N	2021-11-15 16:11:06	LA OPERADORA NO SE PRESENTA A LABORAR YA QUE ESTA DE VIAJE Y TIENE PERMISO POR PARTE DEL LICENCIADO JHAIR MORALES	\N	8	18125565	23
6	\N	2021-11-15 17:11:53	EL DESPACHADOR DE LA POLICIA  JOSE SOSA NIñO SE PRESENTO A LABORAR A LAS 9AM Y SE RETIRO A LAS 3-45 PM	\N	9	15620802	23
7	2021-11-16 09:11:46	\N	Siendo las 0936 hlv no se ha presentado al servicio, se desconoce los motivos	9	\N	15620802	\N
8	2021-11-16 09:11:35	\N	Siendo las 0938 hlv no se ha presentado al servicio, se desconoce los motivos	9	\N	18123089	\N
9	\N	2021-11-16 10:11:51	SE PRESENTA AL SERVICIO A LAS 0950HLV NOTIFICANDO QUE SE ENCONTRABA EN OTRO TRABAJO DONDE SU TRASLADO IMPIDIó LLEGAR A TIEMPO	\N	9	18123089	28
10	\N	2021-11-17 07:11:50	SOLICITA PERMISO PARA RETIRARSE TEMPRANO A LAS 0630 HLV	\N	8	18123089	28
11	2021-11-18 12:11:27	\N	Laborara el dia Sabado 20/11/21 en apoyo	6	\N	23302896	\N
12	2021-11-18 12:11:17	\N	No se presento a laborar motivado a que se encuentra en el odontologo reparando una pieza dental.	9	\N	8042991	\N
13	2021-11-23 09:11:40	\N	No ha reportado al servicio	9	\N	8042991	\N
14	2021-11-23 09:11:25	\N	Reporta su llegada tarde porque se encuentra en una Audiencia de Fiscalía	3	\N	17842117	\N
15	\N	2021-11-23 21:11:48	SOLICITó PERMISO PARA RETIRARSE DEL SERVICIO A LAS 1650 HLV POR EMERGENCIA MéDICA, SU ESPOSA SE ENCUENTRA MAL DE SALUD, AUTORIZADO POR LA LCDA ISABEL RANGEL DE RECURSOS HUMANOS 	\N	7	17523387	37
16	\N	2021-11-23 21:11:30	RECIBE EL SERVICIO A LAS 1300 HLV, SE ENCONTRABA EN UNA AUDIENCIA.	\N	8	17842117	37
17	\N	2021-12-03 13:12:51	ESTUDIO 	\N	4	20200220	41
18	\N	2021-12-05 14:12:35	SIENDO LAS 13:56HLV EL SUPERVISOR DE GUARDIA DEL DIA LUNES T.S.U. JORGE UZCATEGUI INFORMA QUE POR MOTIVOS DE SALUD NO PODRá ASISTIR EL DíA DE MAñANA, DE IGUAL MANERA NOTIFICA QUE EN SUPERVISIóN QUEDARA FRANKY VGOT 	\N	3	16200660	42
19	2021-12-14 10:12:33	\N	asistio al servicio médico por presentar sintomas de gripe, emitiendo reporao medico y solicitud de prueba covid	5	\N	26052701	\N
20	2021-12-14 10:12:43	\N	no se ha presentado al servicio se desconoce los motivos	9	\N	15620802	\N
21	2021-12-14 10:12:28	\N	Se encuentra de reposo médico	5	\N	12356337	\N
22	2024-03-22 08:03:18	\N	llamo notificando que hoy transporte, llega tarde	7	\N	18308368	\N
23	2024-10-04 11:10:34	\N	requiere realizar consulta odontologica	3	\N	15040226	\N
24	\N	2024-10-04 12:10:28	SE RETIRA SIENDO LAS HORA INDICADA PARA RECIBIR CLASES EN LA UNIVERSIDAD	\N	6	17340596	88
25	2025-12-02 16:12:34	\N	llega a la guardia con retraso	2	\N	31436014	\N
26	\N	2025-12-02 16:12:35	SALA A LAS 10:00 HLV SE INCORPORA A LAS 14:00HLV	\N	6	28205113	127
27	\N	2025-12-04 16:12:37	LA COMPAñERA PRESENTE FUERTE DOLOR APDOMINAL, LA CUAL DEBE SER ATENDIDA POR LOS MEDICOS DE LA URI, ENTREGANDO UN REPOSO POR 3 DIAS	\N	3	31149149	131
28	\N	2025-12-08 16:12:39	SE RETIRA A REALIZAR EXAMEN MEDICO, CON INCORPORARSE A LA GUARDIA NUEVAMENTE	\N	2	32488556	135
29	2025-12-09 14:12:26	\N	se encontraba en el odontologo	3	\N	32148040	\N
30	\N	2025-12-09 15:12:13	SE RETIRA CON PREVIA AUTORIZACION Y CONOCIMIENTO	\N	8	31149149	139
31	2026-03-08 19:03:34	\N	el joven se incorpora luego de las 10:00 HLV	8	\N	15040226	\N
\.


--
-- Data for Name: preguntas_usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.preguntas_usuario (id, pregunta_recuperacion_1, respuesta_recuperacion_1, pregunta_recuperacion_2, respuesta_recuperacion_2) FROM stdin;
1	NOMBRE DE LA INSTITUCION	VEN911	CIUDAD DE UBICACION	MERIDA
2	MI COLOR FAVORITO	TURQUESA	NOMBRE DE MI HIJA	SAMANTHA
3	COLOR FAVORITO	AZUL	NOMBRE DE MI NIETA	JAZMIN
4	MI COLOR FAVORITO	ROJO	NOMBRE DE MI MASCOTA	PELUCHE
5	MI COLOR FAVORITO	VERDE	NOMBRE DE MI HIJA	SOPHIA
6	NOMBRE DE HIJA	RUTH	COLOR FAVORITO	ARCOIRIS
7	MI DEPORTE FAVORITO	FUTBOLL	COLOR FAVORITO	MORADO
8	NOMBRE DE MI MASCOTA	TABBY	COLOR FAVORITO	MORADO
9	LUGAR FAVORITO	AEIOU	DEPORTE FAVORITO	AEIOU
10	HOBBY FAVORITO	PREHOSPITALARIA	NOMBRE MASCOTA	CANELA
11	NOMBRE DE MI HIJO	ALAN	MI BEBIDA FAVORITA	AGUA
12	COLOR FAVORITO	AZUL REY	HOBBY FAVORITO	CANTAR
13	NOMBRE DE MI HIJO	ROMAN	NOMBRE MASCOTA	PRINCESA
14	NOMBRE DEL PERRO	BRUNO	MI COLOR FAVORITO	AZUL
15	NOMBRE DE MI PERRO	CHIQUITO	MUSICA FAVORITA	ROCK
16	NOMBRE DE MI PERRO	WINKER	NOMBRE DE MI MAMA	VIDALINA
17	MI COLOR FAVORITO	ROSADO	NOMBRE DE MI HIJA	ANTONELA
18	NOMBRE DE MI PRIMERA HIJA	MARIANGEL	NOMBRE DE MI SEGUNDA HIJA	SOPHIA
19	COLOR FAVORITO	AZUL	APELLIDO MATERNO DE ESPOSA	VARELA
20	COLOR FAVORITO	AZUL	DEPORTE FAVORITO	VOLEIBOL
21	CUAL ES MI COLOR FAVORITO	AZUL	NOMBRE DE MI HIJO	CRISTHIAN
22	COLOR FAVORITO	AZUL	NOMBRE PRIMERA MASCOTA	CHOCOLATE
23	SEGUNDO NOMBRE DE MI HIJA	NAZARETH	NOMBRE DE MI PADRE	AZAEL
24	MI COLOR FAVORITO	DORADO	NOMBRE DE MI MADRE	KEYLA
25	NOMBRE DE MI NIETA	YULIETH	NOMBRE DE MI HIJA MENOR	LUISANA
26	NOMBRE DE MI HIJA	MARIA GABRIELA	COLOR FAVORITO	AZUL
27	MI POSTRE FAVORITO	CHOCOLATE	MI MASCOTA FAVORITA	LORO
28	MI DEPORTE FAVORITO	CICLISMO	MI COLOR FAVORITO	GRIS
29	COLOR FAVORITO	NEGRO	ANIMAL FAVORITO	GATO
30	NOMBRE DE MI HIJO	RICARDO	NOMBRE DE MI HIJA	NELLYANA
31	NOMBRE DE MI PERRA	LUNA	NOMBRE DE MI PERRA	LUNA
32	MI PRIMERA MASCOTA	BURBUJA	MI SEGUNDA MASCOTA	ORION
33	NOMBRE DE MI HIJA	LILIANA	NOMBRE DE MI HIJO	IVAN
34	ESTUDIO DE BACHILLERATO	LIBERTADOR	DIRECTOR DEL DEPARTAMENTO DE CALCULO	DERWIS
35	NOMBRE DE MI MASCOTA	TOSTAO	NOMBRE DE MI HIJO	MATHIAS
36	NOMBRE DE MI HIJA	ANGELI	NOMBRE DE MI HIJO	IGNACIO
37	NOMBRE DE MI PERRITA	MIEL	NOMBRE DE LA TORTUGA	MANCHITO
38	MI DEPORTE FAVORITO	FUTBOL	COLOR FAVORITO	ROJO
39	NOMBRE DE MI PERRO BRANDY	BRANDY	NOMBRE DE MI MADRE CARMEN	CARMEN
40	MI COLOR FAVORITO	GRIS	MI ANIMAL FAVORITO	PERRO
41	NPMBRE DE MI PERRO	ALBERTO	NPMBRE MASCOTA DEL VEN	VEN
42	NOMBRE DE HIJO	KEVIN	NOMBRE DE HIJA	KEILY
43	CULA ES MI COLOR FAVORITO	VERDE	PRIMER CARRO DE MI ABUELA	ACCENT
44	NOMBRE DE MI MADRE	YOMAIRA	CUMPLEAñOS SOBRINA	NOVIEMBRE
45	EQUIPO FUTBOL FAVORITO	BARCELONA	LUGAR DE NACIMIENTO DE MI MADRE	TACHIRA
46	NOMBRE DE MI PERRA	KIARA	NOMBRE DE MI HERMANO	PAUL
47	CUAL ES MI COLOR FAVORITO	AZUL	MI ANIMAL FAVORITO	PERRO
48	CUAL ES MI COLOR FAVORITO	AZUL	NOMBRE DE MI SEGUNDO HERMANO	ANTONY
49	NOMBRE DE MI HERMANA	NUBIA	NOMBRE DE MI ABUELA	AURELIA
50	NOMBRE DE MI MASCOTA	MARCELA	MI COLOR FAVORITO	VERDE
51	CUAL ES MI COMINDA FAVORITA	PASTICHO	NOMBRE DE MI PERRO	TOBY
\.


--
-- Data for Name: rango_categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.rango_categoria (id, nombre_rango) FROM stdin;
1	Cabo
2	Sargento
3	Supervisor
4	Oficial
5	No Aplica
\.


--
-- Data for Name: reporte_solicitudes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.reporte_solicitudes (id, numero_solicitud, fecha_solicitud, hora_solicitud, hora_cierre, nombre_solicitante, motivo_solicitud, direccion, detalles, procedimiento, fallecidos, lesionados, parroquia, sector, punto_referencia, operador, despachador, tiempo_respuesta, organismos, motos, num_motos, vehiculos, num_vehiculos, guardias_id, municipio) FROM stdin;
1	3855465	2021-11-08	11:05:31	11:32:12	BANCO BICENTENARIO	122	MERIDA CENTRO SECTOR GLORIAS PATRIAS AV 3 CON CALLE 33, EDIFICIO GLURIA PLANTA BAJA 	SE HA ACTIVADO LA ALARMA DE LA AGENCIA DEL BANCO BICENTENARIO 	SE LE PASO LA I9NFORMACION A LOA POLICIA DEL ESTADO MERIDA BOLIVARIONO DONDE ME ATENDIO EL O/J JOSE MESA OPERADOR DE GUARDIA INDICANDO QUE SE COMUNICARIA CON LOS ENCARGADOS DE LOS CUADRANTES DE PAS PARA QUE VALLAN Y VERIFIQUEN ESA SOLICITUD ENTRANTE CONTROL SIN NOVEDAD 	0	0	947	SECTOR GLORIAS PATRIAS		1296	1267	02:11:00	Bomberos Rescate	f	0	f	0	1	190
2	3853370	2021-11-03	14:45:38	20:22:08	ANA PEREZ	87	MERIDA AV 2 LORAS ESQUINA CON EL VIADUCTO CAMPO ELIAS 	INDICAN DE UN MASCULINO DE APROXI 20 QUIEN APARENTEMENTE SUFRIO PERDIDA DE CONSCIENCIA CAE DE SU PROPIA ALTURA OCACIONANDO LESION A NIVEL DEL CRANEO CON FUERTE HEMORRAGIA SOLICITAN APOYO DE PARAMEDICOS EN EL LUGAR 	AL SITIO LA UNIDAD B-073  CONDUCIDA  POR EL TENIENTE ADOLFO PE�A   AL MANDO DEL   PRIMER TENIENTE FERNADO RUIZ  QUIEN AL LLEGAR AL SITIO VERIFICO QUE SE TRATABA DE UN SERVICIO MEDICO PRE HOSPITALARIO  AL  CIUDADANO GABRIEL SOTO  MORA  DE 38  A�OS  CI  V.- 19.335.876 QUIEN PRESENTO TRAUMATISMO A NIVEL FACIAL HERIDA CONTUSA   ESPECIFICAMENTE ARCO SUPRAXILIAR DERECHO  REALIZANDOSE UNA ASEPCIA CUBRIENDOLA,  INMOVILIZADO  TRANSLADADO EN LA UNIDAD B-073  AL INSTITUTO VENEZOLANO SEGUROS SOCIALES DR TULIO CARNEVALI SALVATIERRA   RECIBIDA POR EL MEDICO DE GUARDIA   JESUS SILVA  MPPS 145946	0	0	947	VIADUCTO CAMPO EL�AS		1258	145	03:11:00	INPRADEM, PM Foraneo, Supervision	f	0	f	0	4	190
3	3855316	2021-11-08	01:57:44	08:24:43	ALFREDO ALTUVE	118	MERIDA SECTOR LOS PERIODISTAS DESPUES DEL AMBULATORIO PRIMER EDIFCIIO A MANO DERECHA TORRE 1 APRATAMENTO 02 PLANTA BAJA	SOLICITANTE INFORMA SOBRE MASCULINO DE 85 A�OS DE EDAD EL MISMO FALLECIO AL PARECER  DE CAUSA NATURAL SOLICITAN COMISION DEL CICPC EN EL SITIO 	SE REALIZA LLAMADO A LA DOCTORA CAROLINA BARRIOS DE HOMICIDIOS DEL CICPC LA CUAL COORDINA CON PERSONAL DE SENAMECF PARA QUE ASISTAN AL SITIO, YA QUE SE HABL� CON LA DOCTORA LENIS MENDOZA CI: 16.654.057 DEL CENTRO ASISTENCIAL DEL SECTOR LOS PERIODISTAS Y LA MISMA INDICA QUE SE TRATA DE UN CASO SOSPECHOSO DE COVID 19 Y TIENEN QUE CUMPLIR CON EL PROTOCOLO. LOS DATOS DEL OCCISO SON VICTORIANO ALTUVE DE 87 A�OS CI: V-7649309	1	0	946	URB. LOS PERIODISTAS		1273	1016	03:11:00	INPRADEM, PM Foraneo	f	0	f	0	2	190
4	3856322	2021-11-10	08:42:06	10:26:31	BANCO PROVINCIAL	122	MERIDA AV URDANETA CON VIADUCTO MIRANDA 	LLAMADA DE EMERGENCIA POR ACTIVACION  DE ALARMA DE LAS INSTALACIONES DEL BANCO 	SE LE PASO LA SOLICITUD AC LA P�LICIA DEL ESTADO BOLIVARIANO DE MERIDA AL CCP, UNO AL JEFE DE VAREA PARA ESTE MOMENTO S/BARTOLOME VIVAS INDICANDO QUE CCORDINA CON LOS CUADRANTE PAZ PARA QUE LE DEN REPUESTA 	0	0	947	SECTOR GLORIAS PATRIAS		1258	1267	12:11:00	Bomberos Rescate	f	0	f	0	10	190
5	3855990	2021-11-09	07:53:09	09:17:39	BANCO DEL SUR	122	EL VIGIA AV 16 EDIFICIO VERENAP	ALARMA CONTRA INCENDIO BANCO DEL SUR 	SE LE PASO LA INFORMACION A LA SALA CUPAZ, TOMA NOTA DEL REPORTE EL OPERADOR RONALD DIAZ, QUIEN DESPACHO AL CUADRANTE CORRESPONDIENTE	0	0	893	AV. BOLIVAR		1311	1016	10:11:00	Bomberos Servivida	f	0	f	0	11	178
6	3856261	2021-11-10	00:31:43	01:48:34	BANCO BICENTENARIO	122	MERIDA, CENTRO DE LA CIUDAD, BANCO BICENTENARIO, AGENCIA GLORIAS PATRIAS, ESDIFICIO GUIGLIA PLANTA BAJA. AVENIDA 3 CON CALLE 33	ALARMA ACTIVADA DE HURTO Y ASALTO.  	SE LE PASA LA INFORMACION A LA SALA CUPAZ, TOMA NOTA DEL REPORTE EL OPERADOR FRANCO PEREZ QUIEN DESPACHA AL CUADRANTE P-14 AL MANDO DEL SUPERVISOR HUGO RONDON EN LA UNIDAD 950, QUIEN VERIFICO LA ENTIDAD BANCARIA Y SE ENCUENTRA SIN NOVEDAD	0	0	947	AV. 3		2	1016	10:11:00	Transito	f	0	f	0	16	190
7	3856309	2021-11-10	08:21:22	10:24:27	FONDO COMUN	122	MERIDA, AV LAS AMERICAS CC PLAZA MAYOR	ALAMAR ACTIVADA DEL BANCO FONDO COMUN	SE LE PASO AL CCP, UNO DE  LA POLICIA DEL ESTADO BOLIVARIANO DE MERIDA AL JEFE DE CAREA PARA ELM MOMENTO S/BARTOLOME VIVAS INDICANDO QUE COORDINA CON LOS CUADRANTE DE PAZ DE ESE SECTOR ENCARGADO S/N	0	0	946	GARZON		1306	1267	11:11:00	Bomberos Rescate, Supervision	f	0	f	0	17	190
8	3857440	2021-11-13	06:19:43	08:14:39	GRACIELA ALTUVE	105	EJIDO SECTOR PAN DE AZUCAR PARTE ALTA MAS ARRIBA DE LA ESCULA. POR LA BODEGA DE NINA, CASA NUMERO 2 COLOR AZUL. SOLICITANTE HACE ESPERA EN VIA PUBLICA	SOLICITANTE INDICA FEMENINA DE TERCERA EDAD CON HIPOGLICEMIA, ASI MISMO MANIFIESTA ESTAR INCONSCIENTE AL MOMENTO SOLICITAN APOYO EN EL SITIO. NUMERO DE CONTACTO 04247038271	AL SITIO LA UNIDAD LINCE 83 AL MANDO DEL SARGENTO MAYOR EDIXON PUCCHINI  QUIEN REPORTA POSITIVO EL SERVICIO TRATANDOSE DE UN SERVICIO MEDICO PRE-HOSPITALARIO  A LA CIUDADANA CARMEN GUTIERREZ  DE 67  A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD V- 8018159 QUIEN PRESENTO HIPOGLICEMIA  ESTABILIZADA Y TRANSLADADA HASTA EL IAHULA EN LA UNIDAD ALFA 2 DE PROTECCION CIVIL CAMPO ELIAS AL MANDO DEL OFICIAL SUPERVISOR II YEISON RAMIREZ SE RETORNANDO SIN NOVEDAD 	0	0	914			1221	1041	08:11:00	PM Foraneo, Supervision	f	0	f	0	19	183
9	3857440	2021-11-13	06:19:43	08:14:39	GRACIELA ALTUVE	105	EJIDO SECTOR PAN DE AZUCAR PARTE ALTA MAS ARRIBA DE LA ESCULA. POR LA BODEGA DE NINA, CASA NUMERO 2 COLOR AZUL. SOLICITANTE HACE ESPERA EN VIA PUBLICA	SOLICITANTE INDICA FEMENINA DE TERCERA EDAD CON HIPOGLICEMIA, ASI MISMO MANIFIESTA ESTAR INCONSCIENTE AL MOMENTO SOLICITAN APOYO EN EL SITIO. NUMERO DE CONTACTO 04247038271	AL SITIO LA UNIDAD LINCE 83 AL MANDO DEL SARGENTO MAYOR EDIXON PUCCHINI  QUIEN REPORTA POSITIVO EL SERVICIO TRATANDOSE DE UN SERVICIO MEDICO PRE-HOSPITALARIO  A LA CIUDADANA CARMEN GUTIERREZ  DE 67  A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD V- 8018159 QUIEN PRESENTO HIPOGLICEMIA  ESTABILIZADA Y TRANSLADADA HASTA EL IAHULA EN LA UNIDAD ALFA 2 DE PROTECCION CIVIL CAMPO ELIAS AL MANDO DEL OFICIAL SUPERVISOR II YEISON RAMIREZ SE RETORNANDO SIN NOVEDAD 	0	0	914			1221	1041	09:11:00	PM Foraneo, Supervision	f	0	f	0	20	183
10	3858048	2021-11-15	08:30:32	10:44:42	BANCARIBE	122	AV 2 LORA GLORIAS PATRIAS, DETRAS DEL COMANDO DE LA POLICIA	ALARMA ACTIVADA BANCARIBE	SE LE PASO A SALA CUPAZ 	0	0	947	SECTOR GLORIAS PATRIAS		1311	1267	11:11:00	Bomberos Rescate	f	0	f	0	25	190
11	3857999	2021-11-15	00:21:38	01:47:20	MARIA BLANCO	85	MERIDA AV PRINCIPAL DE SANTA JUANA  POR LA PARTE DE ABAJO  DE LA CRUZ ROJA RESIDENCIAS LOS  ANDES BLOUE 23  APARTAMENTO O2 -O3	SOLICITANTE INFORMA SOBRE FEMENINA DE 89 A�OS LA CUAL PRESENTA HIPERTENSION DE IGUAL MANERA TAQUICARDIA SU FAMILIAR INDICA QUE SOLO SE QUEJA DE UNA FUERTE CEFALEA Y NO RESPONDE A NINGUN OTRO ESTIMULO POR LO CUAL SOLICITAN COMISION EN EL SITIO 	SIN DESPACHO	0	0	946	SANTA JUANA		1273	1160	11:11:00	PM Foraneo	f	0	f	0	26	190
12	3859477	2021-11-18	08:31:40	11:20:07	ALFREDO BRICEñO	119	ACUARIO, FRENTE AL CC LAS TAPIAS, POR DETRAS DEL MONUMENTO DE LA TRUCHA.	EL SOLICITANTE, TRABAJADOR DEL ACUARIO, INDICA QUE HAY UN SE�OR ACOSTADO EN EL SUELO, AL LADO DE LA ESTATUA DE LA TRUCHA DEL ACUARIO, ESTA INCONSIENTE Y SUS ROPAS SE ENCUENTRAN EN MAL ESTADO, EXPLICA QUE EL SUJETO NO RESPIRA, POR LO TANTO LO CONSIDERAN MUERTO. EL SUJETO TIENE CHAQUETA MARRON Y PANTALON AZUL.	AL SITIO LA UNIDAD LINCE 96 AL MANDO DE LA SAGENTO SEGUNDO EMELINE UZCATEGUI QUIEN REPORTA POSITIVO ELM SERVICIO TRATANDOSE DE UN ACTO DE PRESENCIA EN UNA CIUDADANO EN SITUACION  DE CALLE CON  CON FUERTE ENTOXICACION HETILICA DESCONOCIENDOSE DATOS QUIEN VESTIA DE CAMPALON AZUL CHAQUETA NEGRA Y BOLSO MARRON DANDO QUIEN SE ENCONTRABA EN SU RESPECTIVO DESCANDO  DANDO LAS RECOMENDACIONES AL CIUDADANO GERARDO GOMEZ DE 70 A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD V-8.009.561 QUIEN ES SUPERVISOR DEL ACUARIO RETORNANDO SIN NOVEDAD 	0	0		EL ACUARIO		1299	1041	01:11:00	Bomberos Rescate, PM Foraneo	t	0	f	0	32	190
13	3859474	2021-11-18	08:21:51	19:01:09	FLOR ANGELA CARVALLO		MERIDA AV LOS PROCERES VIA JAJI PASANDO PUENTE LA PEDREGOSA	SOLICITANTE INFORMA QUE  MOTORIZADO MASCULINO ACOMPA�ADO DE FEMINA PERDIERON EL CONTROL DE LA MOTO Y SE ENCUENTRAN TIRADOS EN LA VIA, EN UNA ZONA NO POBLADA. DESCONOCE MAYOR INFORMACION	AL SITIO LA UNIDAD ALFA 113  AL MANDO DEL TENIENTE WUILMER MOLINA QUIEN REPORTA POSITIVO EL SERVICIO TRATANDOSE DE UN ACCIDENTE DE TRANSITO TIPO COLISION ENTRE VEHICULO PRIMER VEHICULO TIPO MOTO DESCONOCIENDOSE DATOS YA QUE SE ENCONTRABA SOLO CHASI Y MOTOS CONDUCIDA POR EL CIUDADANO ROGER PE�A DE 27 A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD V-22.757754 QUIEN RESULTO ILESO SEGUNDO VEHICULO TIPO MOTO BERA  SOCIALISTA 150 PLACAS AB2ES25 CONDUCIDA POR EL CIUDADANO JESUS DAVILA DE 26 A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD V-233258 QUIEN RESULTO ILESO SIENDO SU ACOMPA�ANTE LA CIUDADANA LILIANA AVILA   DE 49 A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD V-12.571.365  QUIEN PRESENTO TRAUMATISMO EN LA EXTREMIDAD INFERIOR IZQUIERDA ESPECIFICAMENTE TIBIA Y PEERONE ESTABILIZADA Y TRANSLADADA HASTA EL IAHULA SIENDO RECIBIDA POR EL MDICO DE GUARDIAN JESUS PANTOJA MATRICULA DEL MINISTERIO DEL PODER POPULAR PARA LA SALUD N�133584 QUIEN SE ENCARDO DEL CASO 	0	1	917		MAS ARRIBA DEL HOTEL LAS LOMAS	1308	1041	07:11:00	PM Foraneo, Supervision	t	2	f	0	32	183
14	3859646	2021-11-18	14:05:20	19:14:57	MARIA RAMIREZ		MERIDA, AV LOS PROCERES , RESIDENCIAS ROSA E, EN FRENTE. CANAL SUBIENDO 	LA SOLICITANTE INDICA QUE HACE UNOS MINUTOS UN CAMION BLANCO ARROLLO UNA MOTO LA CUAL LLEVABA 2 PASAJEROS MASCULINOS Y PARA EL MOMENTO LOS MISMOS SE ENCUENTRAN TENDIDOS EN ELSUELO SIN PODER MOVILIZARSE. EL CAMION SE DIO A LA FUGA. SOLICITAN COMISIONES EN EL SITIO NOTA: NO POSEE MAYOR INFORMACION 	AL SITIO LA UNIDAD B-078AL MANDO DEL PRIMER TENIENTE RICARDO HERNANDEZ QUIEN REPORTA POSITIVO EL SERVICIO TRATANDOSE DE UN ACCIDENTE DE TRANSITO TIPO COLISION ENTRE DOS VEHICULO PRIMER VEHICULO TIPO MOTO LONCHI MODELO LOBER  250 COLOR AMARILLO PLACAS A8A93G CONDUCIDA POR EL CIUDADANO YONATAN MARQUEZ DESCONOCIENDOSE MAS DATOS YA QUE SE NEGO A APORTARLOS QUIEN PRESENTO ESCORIACIONES MULTIPLES Y TRAUMATISMO A NIVEL FACIAL ESTABILIZADO Y TRANSLADADO EN LA UNIDAD RESCATE 1 AL  HASTA EL SOR JUANA INES DE LA CRUZ SIENDO RECIBIDO SEGUNDO VEHICULO SE DESCONOCEN LOS DATOS YA QUE AL LLEGAR AL SITIO NO SE ENCONTRABA EN EL LUGAR  COMISIONES EN EL SITIO POLICIA NACIONAL BOLIVARIANA AL MANDO DEL OFICIAL AGREGADO JOSE PEREZ QUIEN SE ENCARGO DEL CASO 	0	0	946	RESIDENCIAS ROSA E		2	1041	07:11:00	Bomberos Rescate, Bomberos Servivida, Transito	t	1	f	0	32	190
15	3859915	2021-11-19	00:32:36	02:58:37	JHON NAVARRO		VIGIA, FRENTE AL YUNIOR MOLL AL LADO DEL TERMINAL DE PASAJEROS. EN LA VIA	SOLICITANTE INDICA ACCIDENTE VEHICULAR TIPO  CARRO CON  UNA MOTO. PARA EL MOMENTO MASCULINO LESIONADO EL CUAL SE ENCUENTRA INCONSCIENTE. SOLICITAN COMISION EN EL SITIO. NOTA NO SUMINISTRAN MAYOR INFORMACION	AL SITIO LA UNIDAD AMBULANCIA LA AMBULANCIA DE LA CAMARA MUNICIPAL DEL VIGIA CONDUCIDA POR EL CONCEJAL GERSON CACIQUE LA CUAL SE TRATABA DE UN ACCIDENTE DE TRANSITO TIPO COLICION ENTRE DOS VEHICULOS PRIMER VEHICULO TIPO MOTO BERA 150 COLOR AZUL A�O 2013  PLACAS A60095V CONDUCIDA POR EL CIUDADANO NESTOR DANIEL RIVAS D 21 A�OS DE EDAD  TITULAR DE LA CEDULA DE IDENTIDAD V-21.305.766 QUIEN PRESENTO POLITRAUMATISMO GENERALIZADO ESTABILIZADO Y TRANSLADADO HASTA EL HOSPITAL HUGO CHAVEZ DEL VIGIA RECIBIDA POR EL DOCTOR EDUARDO RODRIGUEZ DESCONOCIENDOSE MAS DATOS SEGUNDO VEHICULO TIPO FORD 450 MODELO SUPER DUTTY COLOR BLANCO  A�O 1996  PLACAS A96ASAE CONDUCIDA POR EL CIUDADANO GABRIEL ANTONIO CONDE CONDE  DE  29 A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD V-20.369.281 QUIEN RESULTO ILESO  COMISIONES EN EL SITIO POLICIA NACIONAL BOLIVARIANA EN LA UNIDAD UR003 AL MANDO DEL SUPERVISOR AGREGADO RONDON JOSE QUIEN SE ENCARGO DEL CASO 	0	1	893	SECTOR LA P�EZ		1308	1041	06:11:00	Bomberos Servivida, PM Foraneo, Supervision	t	1	t	1	31	178
16	3861875	2021-11-23	07:07:39	21:43:01	OFICIAL EN JEFE SANCHEZ JOSE		EJIDO JAJI (LA CHORRERA)	EL OFICIAL EN JEFE INFORMA QUE EN LA VIA A JAJI ESPECIFICAMENTE EN LA CHORRERA HAY UN DERRUMBE DONDE NO HAY PASO NI VEHICULAR NI PEATONAL DONDE SE REQUIERE QUE UNA COMICION SE DIRIJA AL SITIO 	HOY 23 /11/2021 SE RECIBE LLAMADA AL SISTEMA INTEGRADO DE ARTICULACION PARA LA ATENCION DE LAS EMERGENCIAS,VEN 9.1.1 DE LO CUAL  SE TRASMITE VIA LLAMADA TELEFONICA POR PARTE DEL TECNICO SAR Y OPC 3 DE PROTECCION CIVIL, KERVIN ZAMBRANO AL OSPC 1 VICTOR DUGARTE, EN HORAS DE LA TARDE EL OSPC 3 JEAN CARLOS BRICE�O INFORMA QUE AL LUGAR DE L�A NOVEDAD SE APERSONO.. EL ALCALDE DEL MUNICIPIO CAMPO ELIAS, SIMON FIGUEROA, JUNTO A EL PERSONAL DE LA ALCALDIA ( INGENIEROS) Y COMISION DE PROTECCION CIVIL CAMPO ELIAS..PARA RESTAURAR  EL PASO. LO CUAL A LA EVALUACION EN EL SITIO NO SE PRESENTA NINGUN DA�O MATERIAL NI DE INFRAESTRUCTURAS,,	0	0	917			1296	1253	09:11:00	Supervision	f	0	f	0	37	183
17	3862404	2021-11-24	06:49:20	08:25:11	JOSE CASTILLO	104	MERIDA SAN JACINTO ,SECTOR LOS SAMANES,  CERCA DE LA UNIDAD EDUCATIVA DE SAN JACINTO, CASA DE COLOR VERDE	EL SOLICITANTE INDICA QUE UN JOVEN MASCULINO PRESENTA UNA FUERTE FIEBRE DESDE AYER Y ADEMAS TIENE UNA CONDICION DE DISCAPACIDAD PARA CAMINAR. LOS PARIENTES DEL PACIENTE ESTARAN AFUERA PARA ESPERAR A LOS ORGANISMO DE SALUD. NO  APORTO MAS INFORMACION DE LA DIRECCION PORQUE FINALIZO LA LLAMADA. SE REQUIERE ASISTENCIA MEDICA	SE LE REALIZA EL LLAMADO V�A TELEF�NICA AL CUARTEL CENTRAL DE LOS BOMBEROS, TOMA NOTA DEL REPORTE LA BOMBERA PAOLA GUERRERO QUIEN SE ENCARGA DE COORDINAR UNA UNIDAD PARA EL SERVICIO, NOTA: AL MOMENTO DEL CIERRE SE DESCONOCE DETALLES DEL PROCEDIMIENTO 	0	0		SAN JACINTO	UNIDAD EDUCATIVA SAN JACINTO	1292	1016	01:11:00	INPRADEM	f	0	f	0	40	190
18	3866707	2021-12-03	12:26:47	12:43:22	GARCIA DUGLAS	49	TOVAR SECTOR EL A�IL,  CARRERA 1 CON CALLE 5.FRENTE DEL HOTEL DO�A ELVA	INFORMA EL SOLICITANTE QUE HAY UN MASCULINO BAJO EL  EFECTO DEL ALCOHO, SE ENCUENTRA EN LA PUERTA DEL HOTEL, MOLESTANDO A LOS CLIENTES (SOLICITAN APOYO DE LA POLICIA PARA RETIRAR AL SUJETO) 	SE LE INFORMO A LA POLICIA DEL ESTADO BOLIVARIANO DE MERIDA AL CCP,5 TOVAR A LA OFICIAL DE GUARDIA COMO JEFE DE AREA PARA ESTE MOMENTO DON  INDIACA VIA TELEFONIA QUE CCORDINA COMISION DE LOS CUADRANYE DEV PAZ DE ESAE SECTO PARA QUE LE DEN REPUESTA DE ESA SOLICITUD ENTRANTE CUMPLACE SIN NOVEDAD QUEDA EN ACCION DE RESPONSABILIDADAD DE ESE ORGANISMO SIN NOVEDAD POR PARTE DE ESTA SALA DE DESPACHO ATENTAMENTE EL S/J JOSE SOSA CUMPLACE 	0	0	973			1221	1267	01:12:00	Bomberos Servivida	f	0	f	0	41	199
19	3866970	2021-12-03	18:44:29	05:05:57	KARINA HERNANDEZ		CHIGUARA,  CALLE ROMAN EDUARDO SANDIA PASOS ARRIBA DE LA PLAZA SENTIDO SUBIENDO 	SOLICITANTE INDICA ACCIDENTE DE TRANSITO ENTRE DOS VEHICULOS TIPO MTOS AL PARECER DOS MASCULINOS LESIONADOS SOLICITAN APOYO EN EL SIITO.	HOY 03/12/2021 SE RECIBE LLAMADA AL SISTEMA  INTEGRAL DE ARTICULACION PARA  LA ATENCION DE EMERGENCIAS VEN 9.1.1 DE LO CUAL SE TRASMITE DE INMEDIATO, VIA RADIO TRONCALIZADO AL CAE EL ANIS LO CUAL ES RECIBIDA LA SOLICITUD POR EL OPC 2ROBERT GUTIERREZ. LO CUAL DE INMEDIATO DISPONE, ENVIAR AL LUGAR UN VOLUNTARIO CON FUNCIONARIO EN VEHICULO PARTICULAR,AL LLEGAR AL LUGAR LOS FAMILIARES DE LOS LESIONADOS YA HABIAN TRASLADADO. A UNO HACIA EL HOSPITAL Y OTRO LESIONADO SE RETIRO POR SUS MEDIOS A SU DOMICILIO, DEJANDO ASI LA TOMA DE DATOS PERSONALES DE LOS INVOLUCRADOS, Y LAS VERDADERAS LESIONES, SUFRIDAS,EL PERSONAL DE PROTECCION CIVIL SE RETIRA DEL LUGAR.	0	2	971			1221	1253	01:12:00	PM Foraneo, Supervision	t	1	f	0	42	198
20	3867446	2021-12-05	00:12:57	02:56:07	MARIA MORENO		MERIDA, BARRIO LA MILAGROSA FRENTE A LA LICORERIA 	LA SOLICITANTE INDICA QUE EN ESTA ENTIDAD SE ENCUENTRA VARIAS PERSONAS TOMANDO BEBIDAS ALCOHOLICAS Y OBSTACULIZANDO LA VIA PUBLICA CON VEHICULOS, SE SOLICITA EL APOYO DE LA POLICIA 	AL SITIO SE TRASLADO UNIDAD DE VIGILANCIA Y PATRULLAJE MOTORIZADO AL MANDO DEL SUPERVISOR JEFE IVAN MARQUEZ  QUIEN INDICO SITUACION SIN NOVEDAD PARA EL MOMENTO 	0	0	946	BARRIO LA MILAGROSA		1298	35	02:12:00	Bomberos Rescate	f	0	f	0	43	190
21	3871770	2021-12-14	11:36:58	14:29:19	KRISMAR QUINTWRO		MERIDA, AV URDANETA, CERCA DEL COLEGIO LA SALLE EN LA ESTACION DE GASOLINA MARIO CHARAL	LA SOLICITANTE INDICA QUE SE PRODUJO  COLISION DE VEHICULO CON MOTO. LA VICTIMA SE ENCUENTRA EN EL SUELO. EL OTRO VEHICULO SE DIO A LA FUGA. SOLICITA APOYO	SE LE PASA LA INFORMACION VIA TELEFONICA AL CUARTEL CENTRAL DE LOS BOMBEROS TOMA NOTA DEL REPORTE LA BOMBERA YENIFER SANCHEZ, QUIEN DESPACHA LA UNIDAD B-078 AL MANDO DEL SARGENTO MAYOR DE BOMBEROS LUIS ROJAS QUIEN ACUDIO AL LLAMADO EN COMPA�IA DEL CABO SEGUNDO DEIBY RAMIREZ Y EL BOMBERO OSCAR MORA QUIENES SE PRESENTARON EN LA AV. URDANETA ESPECIFICAMENTE AL FRENTE DE LA ESTACION DE SERVICIO PIE EL LLANO, VERIFICO QUE SE TRATABA DE UN ACCIDENTE DE TR�NSITO TIPO COLISION ENTRE VEHICULOS. PRIMER VEHICULO TIPO MOTO, MARCA SUZUKI, MODELO DR 650CC COLOR AZUL CON BLANCO, A�O 2008 PLACA AD4U74S CONDUCIDO POR EL CIUDADANO CRISTOFER ALEJANDRO ROJAS MARQUINAS DE 17 A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD 30.372.500 QUIEN PRESENTO TRAUMATISMO EN EL ARCO SUPERCILIAR IZQUIERDO, DEL SEGUNDO VEHICULO SE DESCONOCE LOS DATOS YA QUE EL MISMO NO SE ENCONTRABA EN EL SITIO. EN DICHO PROCEDIMIENTO SE REALIZO ACORDONAMIENTO DE  LA ESCENA, ESTABILIZACION DEL PACIENTE CON COLLARIN Y EXTRACCI�N CON TABLA R�GIDA ESPINAL REALIZANDO ASEPSIA EN LA HERIDA MENCIONADA Y FUE TRASLADADA HACIA IAHULA RECIBIDO POR LA M�DICO DE GUARDIA MARBEL JEREZ MATRICULA MPPPS NRO 59205	0	1	947	AV. URDANETA	COLEGIO LA SALLE	1292	1016	07:12:00	PM Foraneo	t	1	t	1	45	190
22	3871770	2021-12-14	11:36:58	14:29:19	KRISMAR QUINTWRO		MERIDA, AV URDANETA, CERCA DEL COLEGIO LA SALLE EN LA ESTACION DE GASOLINA MARIO CHARAL	LA SOLICITANTE INDICA QUE SE PRODUJO  COLISION DE VEHICULO CON MOTO. LA VICTIMA SE ENCUENTRA EN EL SUELO. EL OTRO VEHICULO SE DIO A LA FUGA. SOLICITA APOYO	SE LE PASA LA INFORMACION VIA TELEFONICA AL CUARTEL CENTRAL DE LOS BOMBEROS TOMA NOTA DEL REPORTE LA BOMBERA YENIFER SANCHEZ, QUIEN DESPACHA LA UNIDAD B-078 AL MANDO DEL SARGENTO MAYOR DE BOMBEROS LUIS ROJAS QUIEN ACUDIO AL LLAMADO EN COMPA�IA DEL CABO SEGUNDO DEIBY RAMIREZ Y EL BOMBERO OSCAR MORA QUIENES SE PRESENTARON EN LA AV. URDANETA ESPECIFICAMENTE AL FRENTE DE LA ESTACION DE SERVICIO PIE EL LLANO, VERIFICO QUE SE TRATABA DE UN ACCIDENTE DE TR�NSITO TIPO COLISION ENTRE VEHICULOS. PRIMER VEHICULO TIPO MOTO, MARCA SUZUKI, MODELO DR 650CC COLOR AZUL CON BLANCO, A�O 2008 PLACA AD4U74S CONDUCIDO POR EL CIUDADANO CRISTOFER ALEJANDRO ROJAS MARQUINAS DE 17 A�OS DE EDAD TITULAR DE LA CEDULA DE IDENTIDAD 30.372.500 QUIEN PRESENTO TRAUMATISMO EN EL ARCO SUPERCILIAR IZQUIERDO, DEL SEGUNDO VEHICULO SE DESCONOCE LOS DATOS YA QUE EL MISMO NO SE ENCONTRABA EN EL SITIO. EN DICHO PROCEDIMIENTO SE REALIZO ACORDONAMIENTO DE  LA ESCENA, ESTABILIZACION DEL PACIENTE CON COLLARIN Y EXTRACCI�N CON TABLA R�GIDA ESPINAL REALIZANDO ASEPSIA EN LA HERIDA MENCIONADA Y FUE TRASLADADA HACIA IAHULA RECIBIDO POR LA M�DICO DE GUARDIA MARBEL JEREZ MATRICULA MPPPS NRO 59205	0	1	947	AV. URDANETA	COLEGIO LA SALLE	1292	1016	07:12:00	PM Foraneo	t	1	t	1	45	190
\.


--
-- Data for Name: sectores; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sectores (id, nombre_sector, parroquias_id) FROM stdin;
142023	AV. BOLIVAR	893
142024	BARRIO 1RO DE MAYO	893
142026	BARRIO CAMPO ALEGRE	893
142027	BARRIO CARABOBO	893
142028	BARRIO EL CARMEN	893
142029	BARRIO EL PARAÍSO	893
142030	BARRIO INMACULADA	893
142031	BARRIO LA CONQUISTA	893
142032	BARRIO LA PEDECA	893
142033	BARRIO LA PLAYA	893
142034	BARRIO LA PLAYITA	893
142035	BARRIO LA VEGA L	893
142036	BARRIO LA VEGA LL	893
142037	BARRIO LA VICTORIA	893
142038	BARRIO LAS ACACIAS	893
142039	BARRIO LAS FLORES	893
142040	BARRIO LOS AÑITOS	893
142041	BARRIO RÓMULO GALLEGOS	893
142042	BARRIO SAN ISIDRO	893
142043	CALLE 1	893
142044	LA PEDECA	893
142045	LOS CANITOS	893
142046	LOS POZONES	893
142047	PARQUE CHAMA	893
142048	SECTOR BACHAQUERO	893
142049	SECTOR BANCADA DE LIMONES	893
142050	SECTOR BOLÍVAR	893
142051	SECTOR BUENA ESPERANZA	893
142052	SECTOR CAÑO BLANCO	893
142053	SECTOR CAÑO DEL BURRO	893
142054	SECTOR CAÑO MUERTO	893
142055	SECTOR CAÑO NEGRO	893
142056	SECTOR CAPITÁN	893
142057	SECTOR CASA DE TEJA	893
142058	SECTOR CERRO PELADO	893
142059	SECTOR CONCHA	893
142060	SECTOR CONQUISTA	893
142061	SECTOR EL ABANICO	893
142062	SECTOR EL BOSQUE	893
142063	SECTOR EL CARMEN	893
142064	SECTOR EL CASTILLO	893
142065	SECTOR EL GUÁIMARO	893
142066	SECTOR EL LABERINTO	893
142067	SECTOR EL MANGUITO	893
142068	SECTOR EL MILAGRO	893
142069	SECTOR EL MORALITO	893
142070	SECTOR EL NARANJAL	893
142071	SECTOR EL MANGUITO	893
142072	SECTOR EL TAPARO	893
142073	SECTOR EL TIGRE	893
142074	SECTOR EL TREINTA Y CINCO	893
142075	SECTOR EL VIGÍA	893
142076	SECTOR GUAIMARAL	893
142077	SECTOR JANEIRO	893
142078	SECTOR KILÓMETRO 6	893
142079	SECTOR KILÓMETRO 7	893
142080	SECTOR KILÓMETRO 13	893
142081	SECTOR KILÓMETRO 15	893
142082	SECTOR KILÓMETRO 16	893
142083	SECTOR KILÓMETRO 17	893
142084	SECTOR KILÓMETRO 18	893
142085	SECTOR KILÓMETRO 22	893
142086	SECTOR KILÓMETRO 24	893
142087	SECTOR KILÓMETRO 26	893
142088	SECTOR KILÓMETRO 27	893
142089	SECTOR KILÓMETRO 28	893
142090	SECTOR KILÓMETRO 35	893
142091	SECTOR KILÓMETRO 41	893
142092	SECTOR KILÓMETRO 49	893
142093	SECTOR LA CAÑA BRAVA	893
142094	SECTOR LA CORDILLERA	893
142095	SECTOR LA FORTUNA	893
142096	SECTOR LA MENSURA	893
142097	SECTOR LA PLAYA	893
142098	SECTOR LA RAYA	893
142099	SECTOR LA SOLITA	893
142100	SECTOR LAS BRISAS	893
142101	SECTOR LAS CASAS	893
142102	SECTOR LAS DELICIAS	893
142103	SECTOR LAS TALAS	893
142104	SECTOR LOS CAÑITOS	893
142105	SECTOR LOS MERCADOS	893
142106	SECTOR LOS POZONES	893
142107	SECTOR MEDIO CUARTO	893
142108	SECTOR MOZIOCO	893
142109	SECTOR ONÍA	893
142110	SECTOR PALMIRA	893
142111	SECTOR PUERTO CHAMA	893
142112	SECTOR PUERTO REAL	893
142113	SECTOR SAN ANTONIO	893
142114	SECTOR SAN JOSÉ	893
142115	SECTOR SANTA MARÍA	893
142116	SECTOR TAPARONES	893
142117	SECTOR TEOTISTE DE GALLEGOS	893
142118	SECTOR VERA DE AGUA	893
142119	URBANIZACIÓN BUBUQUI IV	893
142120	URBANIZACIÓN BUBUQUI V	893
142121	URBANIZACIÓN BUBUQUI VI	893
142122	URBANIZACIÓN BUENOS AÍRES	893
142123	URBANIZACIÓN CARABOBO	893
142124	URBANIZACIÓN DOMINGO ROJAS PÉREZ	893
142125	URBANIZACIÓN LA MOTOZA	893
142126	URBANIZACIÓN LAGO AZUL	893
142127	URBANIZACIÓN LOS PARQUES	893
142128	URBANIZACIÓN PARQUE CHAMA	893
142129	URBANIZACIÓN SANTA BÁRBARA	893
142130	AV. BOLÍVAR	894
142131	BARRIO 19 DE FEBRERO	894
142132	BARRIO BICENTENARIO	894
142133	BARRIO BOLÍVAR	894
142134	BARRIO EL BOSQUE	894
142135	BARRIO EL CARMEN	894
142136	BARRIO LA ESPERANZA	894
142137	BARRIO LA INMACULADA	894
142138	BARRIO LA PÁEZ	894
142140	BARRIO LA VICTORIA	894
142141	BARRIO LAS FLORES	894
142142	BARRIO LOS PINOS	894
142143	BARRIO SAN MARCOS	894
142144	BARRIO SUR AMÉRICA	894
142145	BARRIO VISTA ALEGRE	894
142146	SECTOR BACHAQUERO	894
142147	SECTOR BANCADA DE LIMONES	894
142148	SECTOR CAÑO DEL BURRO	894
142149	SECTOR CAÑO NEGRO	894
142150	SECTOR CARACOLÍ	894
142151	SECTOR CHIRIMOYO	894
142152	SECTOR COSTA DE ONÍA	894
142153	SECTOR EL ABANICO	894
142154	SECTOR EL CAIMÁN	894
142155	SECTOR EL CASTILLO	894
142156	SECTOR EL GUÁIMARO	894
142157	SECTOR EL LABERINTO	894
142139	BARRIO LA PEDREGOSA	894
142158	SECTOR EL MANGUITO	894
142159	SECTOR EL MILAGRO	894
142160	SECTOR EL MORALITO	894
142161	SECTOR EL TIGRE	894
142162	SECTOR EL TREINTA Y CINCO	894
142163	SECTOR EL UVITO	894
142164	SECTOR KILÓMETRO 13	894
142165	SECTOR KILÓMETRO 15	894
142166	SECTOR KILÓMETRO 16	894
142167	SECTOR KILÓMETRO 17	894
142168	SECTOR KILÓMETRO 18	894
142169	SECTOR KILÓMETRO 22	894
142170	SECTOR KILÓMETRO 24	894
142171	SECTOR KILÓMETRO 26	894
142172	SECTOR KILÓMETRO 27	894
142173	SECTOR KILÓMETRO 28	894
142174	SECTOR KILÓMETRO 35	894
142176	SECTOR LA CAÑA BRAVA	894
142177	SECTOR LA MENSURA	894
142178	SECTOR LA PÁEZ	894
142179	SECTOR LA PEDREGOSA (LOS BLOQUES)	894
142180	SECTOR LA RAYA	894
142181	SECTOR LA TRINIDAD	894
142182	SECTOR LAS INVACIONES	894
142183	SECTOR LAS TALAS	894
142184	SECTOR LOS ALBARICOS	894
142185	SECTOR LOS CAÑITOS	894
142186	SECTOR LOS HATICOS	894
142187	SECTOR LOS MERCADOS	894
142188	SECTOR LOS POZONES	894
142189	SECTOR ONÍA ABAJO	894
142190	SECTOR OSAMA ROJAS	894
142191	SECTOR PALMIRA	894
142192	SECTOR TUNANA	894
142193	SECTOR TUNANITA	894
142194	SECTOR VERA DE AGUA	894
142195	URBANIZACIÓN BUBUQUI I	894
142196	URBANIZACIÓN BUBUQUI II	894
142197	URBANIZACIÓN BUBUQUI III	894
142198	URBANIZACIÓN COUNTRY CLUB	894
142199	URBANIZACIÓN LA TRINIDAD	894
142200	URBANIZACIÓN LOS BLOQUES	894
142201	URBANIZACIÓN LOS CANEYES	894
142202	URBANIZACIÓN PÁEZ	894
142203	URBANIZACIÓN SANTA EDUVIGIS	894
142204	URBANIZACIÓN VISTA HERMOSA	894
142205	ZONA INDUSTRIAL	894
142025	BARRIO ALVARADO PÉREZ	893
142175	SECTOR KILÓMETRO 41	894
142206	BARRIO 1RO DE MAYO	895
142207	BARRIO 23 DE ENERO	895
142208	BARRIO 5 DE JULIO	895
142209	BARRIO AJURO BARRIO	895
142210	BARRIO ALBERTO PERNÍA	895
142211	BARRIO BUENOS AIRES	895
142212	BARRIO CAMPI ALEGRE	895
142213	BARRIO LA FLORIDA	895
142214	BARRIO LA VEGA I	895
142215	BARRIO LA VEGA II	895
142216	BARRIO LA VEGA III	895
142217	BARRIO LAS FLORES	895
142218	BARRIO PANAMERICANO	895
142219	BARRIO SAN JOSÉ	895
142220	BARRIO SUR AMÉRICA	895
142221	BARRIO VEGA DE CHAMA	895
142222	SECTOR CULEGRIA	895
142223	SECTOR EL QUINCE	895
142224	SECTOR INDUSTRIAL EL VIGÍA	895
142225	SECTOR KILÓMETRO 9	895
142226	SECTOR KILÓMETRO 15	895
142227	SECTOR LA CONQUISTA	895
142228	SECTOR LA CULEBRA	895
142229	SECTOR LOS CORRALES	895
142230	SECTOR LOS GUAYABONES	895
142231	SECTOR MOCACAY	895
142232	SECTOR ONÍA	895
142233	SECTOR SAN MARCOS	895
142234	URBANIZACIÓN DOMINGO ROA PÉREZ	895
142235	URBANIZACIÓN LA TRINIDAD	895
142236	URBANIZACIÓN LAS CUMBRES	895
142237	URBANIZACIÓN LOGO SUR	895
142238	CENTRO LA PALMITA	896
142239	SECTOR EL VIGÍA	896
142240	SECTOR LA HONDA	896
142241	SECTOR LA LAGUNITA	896
142242	SECTOR PATO QUEMADO	896
142243	BARRIO CAÑO SECO III	897
142244	BARRIO LAS CASITAS	897
142245	CASERÍO MUCUJEPE	897
142246	SECTOR CAÑO AMARILLO	897
142247	SECTOR CAÑO ARENAS	897
142248	SECTOR CAÑO BALSA	897
142249	SECTOR CAÑO BLANCO	897
142250	SECTOR CAÑO CAIMÁN	897
142251	SECTOR LAS ADJUNTAS	897
142252	SECTOR MESA ALTA	897
142253	BARRIO 17 DE JULIO	898
142254	BARRIO BOLÍVAR	898
142255	BARRIO EL TRINAL	898
142256	BARRIO LA FAMILIA	898
142257	BARRIO PROVIDENCIA	898
142258	BARRIO SINAMAICA	898
142259	CENTRO LOS NARANJOS	898
142260	SECTOR CANTARANA I	898
142261	SECTOR CANTARANA II	898
142262	SECTOR LAS PARCELAS	898
142263	SECTOR PARAÍSO I	898
142264	SECTOR PARAÍSO II	898
142265	BARRIO 12 DE OCTUBRE	899
142266	BARRIO ALTA VISTA	899
142267	BARRIO ALTAMIRA	899
142268	BARRIO LA BLANCA	899
142269	SECTOR BRISA CHAMA	899
142270	SECTOR CAÑO SECO I	899
142271	SECTOR CAÑO SECO II	899
142272	SECTOR CAÑO SECO III	899
142273	SECTOR CAÑO SECO IV	899
142274	SECTOR CAÑO SECO V	899
142275	SECTOR LA PORCELANA	899
142276	SECTOR VÍA PANAMERICANA	899
142277	URBANIZACIÓN PRADO HERMOSO	899
142278	LA AZULITA	900
142279	ALDEA QUEBRADA DEL ZORRO	901
142280	BARRIO ALBERTO RAVEL	901
142281	BARRIO HOSPITAL	901
142282	BARRIO LUCHA BOLIVARIANA	901
142283	BARRIO MARÍA ROSSI	901
142284	BARRIO PADRE NOGUERA	901
142285	BARRIO PUEBLO NUEVO	901
142286	BARRIO PUERTO RICO	901
142287	BARRIO ROMERO	901
142288	CASERÍO LOS PEPOS	901
142289	CASERÍO MESA BOLIVARIANA	901
142290	CASERÍO MESA DE LAS PALMAS	901
142291	CENTRO SANTA CRUZ DE MORA	901
142292	MESA DE LAS PALMAS	901
142293	SECTOR ALDEA	901
142294	SECTOR BUENAVENTURA	901
142295	SECTOR CAÑO GRANDE	901
142296	SECTOR EL BORDO	901
142297	SECTOR EL GUAMO	901
142298	SECTOR EL PORTÓN	901
142299	SECTOR EL QUEBRADÓN	901
142300	SECTOR EL TEMBLOR	901
142301	SECTOR GUAYABAL	901
142302	SECTOR LA ALDEA	901
142304	SECTOR LA LIBERTAD	901
142305	SECTOR LA MACANA	901
142306	SECTOR LA MESA DE SAN ISIDRO	901
142307	SECTOR LA MONTAÑUELA	901
142308	SECTOR LA PALMITA	901
142309	SECTOR LA PARADA	901
142310	SECTOR LA VEGA	901
142311	SECTOR LAS PALMAS	901
142312	SECTOR LOS LLANITOS DE LA MACANA	901
142313	SECTOR MATA DE LIMÓN	901
142314	SECTOR MESA DEL GUAMO	901
142315	SECTOR PAIVA	901
142316	SECTOR QUEBRADA NEGRA	901
142317	SECTOR SAN FELIPE	901
142318	SECTOR SAN ISIDRO ALTO	901
142319	SECTOR SAN RAFAEL	901
142320	SECTOR SANTA MARTA	901
142321	SECTOR SILBÉ	901
142322	SECTOR VILLA SOCORRO	901
142323	BARRIO LUCHA BOLIVARIANA	902
142324	CASERÍO MESA BOLIVARIANA	902
142325	SECTOR LA PALMITA	902
142326	SECTOR BUENAVENTURA	902
142327	ALDEA QUEBRADA DEL ZORRO	903
142328	CASERÍO LOS PEPOS	903
142329	CASERÍO MESA DE LAS PALMAS	903
142330	MESA DE LAS PALMAS	903
142331	SECTOR LAS PALMAS	903
142332	SECTOR SAN FELIPE	903
142333	CENTRO ARICAGUA	904
142334	SECTOR BOCOMBOQUITO	904
142335	SECTOR EL CAÑADÓN	904
142336	SECTOR EL CERRAJÓN	904
142337	SECTOR EL MAPORAL	904
142338	SECTOR LA BECERRA	904
142339	SECTOR LOS AZULES	904
142340	SECTOR SANTA CRUZ DEL QUEMADO	904
142341	CAPITAL DE PARROQUIA CAMPO ELÍAS	905
142342	SECTOR CAMPO ELÍAS	905
142343	SECTOR EL ALTILLO	905
142344	SECTOR EL AMPARO	905
142345	SECTOR EL RINCÓN	905
142346	SECTOR LA LOMITA	905
142347	SECTOR SAN ANTONIO	905
142348	SECTOR SAN RAFAEL	905
142349	CAPITAL DE PARROQUIA CANAGUÁ	906
142350	SECTOR CANAGUÁ	906
142351	SECTOR CANAGUÁ (LIBERTAD)	906
142352	SECTOR EL BAO	906
142353	SECTOR EL RINCÓN	906
142354	SECTOR EL VALLE DE LA VIRGEN	906
142355	SECTOR LA LAGUNA	906
142356	SECTOR LA PREFECTURA	906
142357	SECTOR LA VILLA	906
142358	SECTOR LOS NARANJOS	906
142359	SECTOR RÍO ARRIBA	906
142360	SECTOR VALLE DE LA CRUZ	906
142361	CENTRO CAPURÍ	907
142362	SECTOR LA MONTAÑA	907
142363	SECTOR QUEBRADA VIVAS	907
142364	CENTRO CHACANTÁ	908
142365	SECTOR EL COTUDO	908
142366	SECTOR EL PALMAR	908
142367	SECTOR MUCURANDÁ	908
142368	SECTOR PICO DE PIEDRA	908
142370	CENTRO EL MOLINO	909
142371	SECTOR EL MORTIÑO	909
142372	SECTOR EL PLAYÓN	909
142373	SECTOR EL QUEBRADÓN	909
142374	SECTOR EL RÍO	909
142375	SECTOR EL URAO	909
142376	SECTOR LA MONTAÑITAS	909
142377	SECTOR LAS ADJUNTAS	909
142378	SECTOR LAS MESITAS	909
142379	SECTOR SAISAYAL	909
142380	GUAIMARAL	910
142381	SECTOR EL RINCÓN	910
142382	SECTOR EL VIENTO	910
142383	SECTOR AGUA BLANCA	911
142384	SECTOR EL CARRIZAL	911
142385	SECTOR EL ENCOMENDADERO	911
142386	SECTOR EL GUALÍ	911
142387	SECTOR LA ENSILLADA	911
142388	SECTOR LAS BRUJAS	911
142389	SECTOR LAS LAGUNITA	911
142390	SECTOR MOTOCONE	911
142391	SECTOR OTOPÚN	911
142392	SECTOR PALO QUEMADO	911
142393	SECTOR PORTACHUELO	911
142394	SECTOR SABANETA	911
142395	SECTOR SANTA LUCÍA	911
142396	SECTOR SANTA ROSA	911
142397	SECTOR CAMPO ALEGRE	912
142398	SECTOR EL ACHOTE	912
142399	SECTOR EL ZULIA	912
142400	SECTOR LA PIEDROTA	912
142401	SECTOR LA PROVIDENCIA	912
142402	SECTOR LA VEGUILLA	912
142403	SECTOR MIJARÁ I	912
142404	SECTOR MUCURISA	912
142405	SECTOR MUCUTUICITO	912
142406	SECTOR SAN MIGUEL	912
142407	CASERÍO MUCUSÁS	913
142408	CASERÍO SAN PEDRO	913
142409	CENTRO ACEQUIAS	913
142410	BARRIO EL BUCARAL	914
142411	BARRIO EL MOLINO	914
142412	BARRIO EL POTRERITO	914
142413	BARRIO LA VEGA	914
142414	BARRIO LOS ROSALES	914
142415	BARRIO MESA SECA	914
142416	CONJUNTO RESIDENCIAL CENTENARIO	914
142417	CONJUNTO RESIDENCIAL MANUEL ELOY CALDERÓN	914
142418	CONJUNTO RESIDENCIAL MOLINOS	914
142419	CONJUNTO RESIDENCIAL SAN BENITO	914
142420	SECTOR EL MAQUEO	914
142421	SECTOR EL PORVENIR	914
142422	SECTOR EL VEGÓN	914
142423	SECTOR EL VERDE	914
142424	SECTOR ESCUQUE	914
142425	SECTOR GUAYABAL	914
142426	SECTOR HATO DE LOS PÉREZ	914
142427	SECTOR LA PICADORA	914
142428	SECTOR LA REYNOSA	914
142429	SECTOR LA VEGA	914
142430	SECTOR LAS MESITAS	914
142431	SECTOR LLANO GRANDE	914
142432	SECTOR LOMA INDÍGENA	914
142433	SECTOR LOS ÁRBOLES	914
142434	SECTOR LOS HIGUERONES	914
142435	SECTOR MESA GRANDE	914
142436	SECTOR PANTANILLO	914
142437	SECTOR RÍO NEGRO	914
142438	SECTOR SAN ONOFRE	914
142439	URBANIZACIÓN CENTENARIO	914
142440	URBANIZACIÓN DON LUIS	914
142441	URBANIZACIÓN LA MONTAÑITA	914
142442	URBANIZACIÓN LA VEGA	914
142443	URBANIZACIÓN LOS JARDINES	914
142444	URBANIZACIÓN OMAR SULBARÁN	914
142445	URBANIZACIÓN POZO AZUL	914
142446	URBANIZACIÓN POZO HONDO	914
142447	URBANIZACIÓN RIVERA DE LA MILAGROSA	914
142448	URBANIZACIÓN SULBARÁN	914
142449	URBANIZACIÓN VALMAR	914
142450	URBANIZACIÓN VIRGEN DE LAS NIEVES	914
142451	CASERÍO EL CAMPANARIO	915
142452	CASERÍO EL CHAMIZAL	915
142453	CASERÍO EL COROZO	915
142454	CASERÍO EL MACHO	915
142455	CASERÍO EL SAMBO	915
142456	CASERÍO EL SUÁREZ	915
142457	CASERÍO LA CARBONERA	915
142458	CASERÍO LA CEIBA	915
142459	CASERÍO LA CHORRERA	915
142460	CASERÍO LA CUCHILLA	915
142461	CASERÍO LA ISLA	915
142462	CASERÍO LA MARA	915
142463	CASERÍO LA MUCUBANGA	915
142464	CASERÍO LA PLAYA	915
142465	CASERÍO LA QUEBRADITA	915
142466	CASERÍO LAS BARRANCAS	915
142467	CASERÍO LAS CRUCES	915
142468	CASERÍO LOMA DEL PEDREGAL	915
142469	CASERÍO LOMAS DE LOS GAMOS	915
142470	CASERÍO LOMAS DEL CARMEN	915
142471	CASERÍO LOMAS DEL ROSARIO	915
142472	CASERÍO MIRAFLORES	915
142473	CASERÍO MIRAFLORES BAJO	915
142474	CASERÍO MISTAJA BAJO	915
142475	CASERÍO MUCUNDU BAJO	915
142476	CASERÍO PARAMITO	915
142477	CASERÍO PIEDRAS BLANCAS	915
142478	CASERÍO RANCHO ISABELA	915
142479	CASERÍO SAN RAFAEL DEL MACHO	915
142480	CASERÍO SAN USEBIO	915
142481	CASERÍO SIMÓN RODRÍGUEZ DE MACHO	915
142482	CASERÍO TUCUHE	915
142483	CASERÍOS LAS FLORES	915
142484	PUEBLO DE JAJÍ	915
142485	SECTOR CINARAOS	915
142486	SECTOR PALO NEGRO	915
142487	CENTRO LA MESA	916
142488	SECTOR AGUA DULCE	916
142489	SECTOR EL POZO	916
142490	SECTOR LA ENFADOSA	916
142491	SECTOR LA MESA	916
142492	SECTOR LA QUEBRADA	916
142493	SECTOR LA VEGA	916
142494	SECTOR LAS GONZÁLES	916
142495	SECTOR SULBARÁN	916
142496	URBANIZACIÓN ALDEA VALLE ENCANTADO	916
142497	BARRIO AGUAS CALIENTES	917
142498	BARRIO BELLA VISTA	917
142499	BARRIO EL PALMO	917
142500	BARRIO ESCONDIDO	917
142501	BARRIO JOSÉ ADELMO GUTIÉRREZ	917
142502	BARRIO LA FLORIDA	917
142503	BARRIO LA LAGUNA	917
142504	BARRIO LA RANCHERÍA	917
142505	BARRIO LOS WARAOS	917
142506	BARRIO MAZANITO	917
142507	BARRIO MESA TANQUE	917
142508	BARRIO SALADO MEDIO	917
142509	BARRIO SAN BUENAVENTURA	917
142510	BARRIO SAN MARTÍN	917
142511	BARRIO SAN RAFAEL	917
142512	BARRIO SANTA EDUVIGIS	917
142513	CASERÍO LAS VEGAS DE LAS GONZÁLEZ	917
142514	CONJUNTO RESIDENCIAL AGUA CLARA	917
142515	CONJUNTO RESIDENCIAL EL TIGRE	917
142516	CONJUNTO RESIDENCIAL LA CAMPIÑA	917
142517	CONJUNTO RESIDENCIAL LA CAMPIÑA A	917
142518	CONJUNTO RESIDENCIAL LA CAMPIÑA B	917
142519	CONJUNTO RESIDENCIAL MARTINICA	917
142520	CONJUNTO RESIDENCIAL PARQUE EL SALADO	917
142521	CONJUNTO RESIDENCIAL PIEDRAS BLANCAS	917
142522	SECTOR AGUA DULCE	917
142523	SECTOR AGUAS CALIENTES	917
142524	SECTOR ALTO GUAYABOS	917
142525	SECTOR CAÑA MURA	917
142526	SECTOR CARLOS SÁNCHEZ	917
142527	SECTOR CHAMICERO	917
142528	SECTOR EJIDO	917
142529	SECTOR EL CRUCETAL	917
142530	SECTOR EL MANZANO	917
142531	SECTOR EL MORAL	917
142532	SECTOR HACIENDA LA MILAGROSA	917
142533	SECTOR HACIENDA ZUMBA	917
142534	SECTOR JOSÉ DELMO GUTIÉRREZ	917
142535	SECTOR LA CALERA	917
142536	SECTOR LA CAMPIÑA	917
142537	SECTOR LA CAPILLA	917
142538	SECTOR LA CUEVA	917
142539	SECTOR LA MONTAÑA	917
142540	SECTOR LA PORTUGUESA	917
142541	SECTOR LOMA DE LA CALERA	917
142542	SECTOR LOMA DEL CASADERO	917
142543	SECTOR LOS GUAIMAROS	917
142544	SECTOR LOS GUTIÉRREZ	917
142545	SECTOR LOS OLIVOS	917
142546	SECTOR MANZANO ALTO	917
142547	SECTOR MESA DE TANQUE	917
142548	SECTOR POZO HONDO	917
142549	SECTOR SAN ISIDRO	917
142550	SECTOR SAN MIGUEL	917
142551	SECTOR SAN ONOFRE	917
142552	SECTOR SAN RAFAEL	917
142553	SECTOR ZUMBA	917
142554	URBANIZACIÓN ASOPRIETO	917
142555	URBANIZACIÓN BUENA VENTURA	917
142556	URBANIZACIÓN CAMPO ELÍAS	917
142557	URBANIZACIÓN CARLOS SÁNCHEZ	917
142558	URBANIZACIÓN DON VALENTÍN	917
142559	URBANIZACIÓN EL CAÑAMELAR	917
142560	URBANIZACIÓN EL PALMO	917
142561	URBANIZACIÓN HACIENDA SAN RAFAEL	917
142562	URBANIZACIÓN LA CAMPIÑA	917
142563	URBANIZACIÓN LA LAGUNA	917
142564	URBANIZACIÓN LA MONTAÑITA	917
142565	URBANIZACIÓN LAS VILLAS	917
142566	URBANIZACIÓN LOS OLIVOS	917
142567	URBANIZACIÓN LOS PINOS	917
142568	URBANIZACIÓN LOS VALENTINOS	917
142569	URBANIZACIÓN SANTA EDUVIGIS	917
142570	URBANIZACIÓN VILLA EL BRACHO	917
142571	BARRIO EL CARMEN	918
142572	BARRIO EL CHISPERO	918
142573	BARRIO EL COBRE	918
142574	BARRIO EL PORVENIR	918
142575	BARRIO LA MANSIÓN DE CRISTO	918
142576	BARRIO LAS CRUCES	918
142577	BARRIO PAN DE AZÚCAR	918
142578	CASERÍO BOCONOQUE	918
142579	CASERÍO EL ÁTICO	918
142580	CASERÍO EL POTRERO	918
142581	CASERÍO LA CAPELLANIA	918
142582	CASERÍO LA HIGUERA	918
142583	CASERÍO LA JOYA	918
142584	CASERÍO LA MESA	918
142585	CASERÍO LA VEGA DEL MOLINO	918
142586	CASERÍO MOCHERÉ	918
142587	CASERÍO MOCOTONÉ	918
142588	CASERÍO MUCUATORO	918
142589	CASERÍO MUCUMBÚ	918
142590	CASERÍO MUCUSURÚ	918
142591	CASERÍO MUCUTAN	918
142592	CASERÍO MUCUTEO	918
142593	CASERÍO SAN AGUSTÍN	918
142594	CASERÍO SANTA JUANA	918
142595	CENTRO MONTALBÁN	918
142596	CONJUNTO RESIDENCIAL ALTO EJIDO	918
142597	CONJUNTO RESIDENCIAL EL BAJO	918
142598	CONJUNTO RESIDENCIAL EL TEPUY	918
142599	CONJUNTO RESIDENCIAL EL TINAJERO	918
142600	CONJUNTO RESIDENCIAL LA MAZANERA	918
142601	CONJUNTO RESIDENCIAL LOS CEDROS	918
142602	CONJUNTO RESIDENCIAL LOS LIMONES	918
142603	CONJUNTO RESIDENCIAL VILLA LIBERTAD	918
142604	PARQUE RESIDENCIAL EL SALADO	918
142605	SECTOR ALFREDO LARA	918
142606	SECTOR CAÑA LOS GONZÁLEZ	918
142607	SECTOR CACUTE	918
142608	SECTOR EL BOTICARIO	918
142609	SECTOR EL CARRIZAL	918
142610	SECTOR EL GUAYACÁN	918
142611	SECTOR EL SALADO	918
142612	SECTOR LA LUGAREÑA	918
142613	SECTOR LAS CARMELITAS	918
142614	SECTOR LOMA DE LOS GARCÍA	918
142615	SECTOR LOMAS DE LOS ÁNGELES	918
142616	SECTOR LOS ÁNGELES	918
142617	SECTOR LOS CONEJOS	918
142618	SECTOR LOS MANTECOS	918
142619	SECTOR LOS VILCHEZ	918
142620	SECTOR MANZANO ABAJO	918
142621	SECTOR PANAMERICANA	918
142622	SECTOR PLAZUELA	918
142623	SECTOR SALADO ALTO	918
142624	SECTOR SAN RAFAEL	918
142625	SECTOR VILLA PARAÍSO	918
142626	URBANIZACIÓN ALDEA VALLE ENCANTADO	918
142627	URBANIZACIÓN ALFREDO LARA	918
142628	URBANIZACIÓN DON GONZÁLO	918
142629	URBANIZACIÓN EL CARMEN	918
142630	URBANIZACIÓN EL PILAR	918
142631	URBANIZACIÓN EL SALADO	918
142632	URBANIZACIÓN EL TRAPICHE	918
142633	URBANIZACIÓN PADRE DUQUE	918
142634	URBANIZACIÓN VILLA ESPERANZA	918
142635	URBANIZACIÓN VILLA MANZANO	918
142636	URBANIZACIÓN VILLA MARÍA EUGENIA	918
142637	VEREDA LOS PACHECOS	918
142638	CASERÍO BARBECHITO	919
142639	CASERÍO CUATRO ESQUINAS	919
142640	CASERÍO EL LLANO	919
142641	CASERÍO EL MORAL	919
142642	CASERÍO EL RINCÓN DEL TROMPILLO	919
142643	CASERÍO LA MESA	919
142644	CASERÍO LAS CANITAS	919
142645	CASERÍO LAS PANAS	919
142646	CASERÍO LAS TAPIAS	919
142647	CASERÍO LOS CEDROS	919
142648	CASERÍO MUCUAMBÍ	919
142649	CASERÍO MUCUMPIZ	919
142650	CASERÍO MUCUMPIZ BAJO	919
142651	CASERÍO MUCUSAN	919
142652	CASERÍO MUCUSÚN	919
142653	CASERÍO MUCUTIRIS	919
142654	CASERÍO LAS CANITAS	919
142655	CASERÍO SAN PABLO	919
142656	CASERÍO TOSTÓS	919
142657	CASERÍO VOLADERO	919
142658	CENTRO SAN JOSÉ	919
142659	SECTOR EL VOLCÁN	919
142661	BARRIO EDECIO LA RIVAS	921
142662	BARRIO PRIETO FIGUEROA	921
142663	BARRIO UNIÓN	921
142660	BARRIO CARMEN	921
142664	BARRIO ZONA NUEVA	921
142665	CASERÍO LA ROKOLINA	921
142666	CASERÍO MESA JULIA	921
142667	CASERÍO SANTA MARÍA	921
142668	CASERÍO TUCANITO	921
142669	CENTRO EL PINAR	921
142670	SECTOR EL CHARAL	921
142671	SECTOR EL PINAR DE TUCANÍ	921
142672	SECTOR RÍO FRÍO	921
142674	CENTRO TUCANÍ	920
142675	SECTOR ARAPUEY	920
142676	SECTOR AVE MARÍA	920
142677	SECTOR CARMELITAS	920
142678	SECTOR COGOLLAL	920
142679	SECTOR CUATRO	920
142680	SECTOR EL CHARAL	920
142681	SECTOR EL PEDREGAL	920
142682	SECTOR LA GRAN PARADA	920
142683	SECTOR LA PUEBLITA	920
142673	URBANIZACIÓN LA INMACULADA	921
142684	SECTOR LA VEGA	920
142685	SECTOR LAS HEROÍNAS	920
142686	SECTOR LAS MESITAS	920
142687	SECTOR LAS RINCÓN	920
142688	CENTRO LAS PIEDRAS	923
142689	SECTOR EL CANEY	923
142690	SECTOR EL GUAMO	923
142691	SECTOR LA CAMPANA	923
142692	SECTOR LA CUCHILLA	923
142693	SECTOR LA ENSILLADA	923
142694	SECTOR LA MESA	923
142695	SECTOR LA PRIMAVERA	923
142696	SECTOR LA QUINTA	923
142697	SECTOR LA RAYA	923
142698	SECTOR LAS CUADRAS	923
142699	SECTOR LAS MESAS	923
142700	SECTOR LAS PIEDRAS DE SANTO DOMINGO	923
142701	SECTOR LAS TAPIAS	923
142702	SECTOR LOS FRAILES	923
142703	SECTOR LOS HÁTICOS	923
142704	ALDEA LAERA	922
142705	ALDEA LIMONCITO CANEY	922
142706	ALDEA MITISUS	922
142707	BARRIO BIZUM	922
142708	BARRIO LA LAGUNA	922
142709	BARRIO MORUCO BAJO	922
142710	BARRIO MORUCO NORTE ALTO	922
142711	SECTOR ARACAY	922
142712	SECTOR CAMPO	922
142713	SECTOR EL BAHO	922
142714	GUARAQUE	924
142715	CENTRO MESA DE QUINTERO	925
142716	SECTOR EL MUNSAL	925
142717	SECTOR EL RINCÓN	925
142718	SECTOR MONTES DE OCA	925
142719	CENTRO RÍO NEGRO	926
142720	SECTOR AGUA CALIENTE	926
142721	SECTOR CAMPO SOLO	926
142722	SECTOR CANUTALES	926
142723	SECTOR EL AMPARO	926
142724	SECTOR EL DIVIDIVE	926
142725	SECTOR EL HATO	926
142726	SECTOR EL MORAL	926
142727	SECTOR EL SAI SAI	926
142728	SECTOR HUESCA	926
142729	SECTOR LAS ADJUNTAS	926
142730	SECTOR LAS VEGAS	926
142731	SECTOR PIE DE CUESTA	926
142732	SECTOR QUEBRADA ARRIBA	926
142733	SECTOR QUEBRADA SECA	926
142734	CENTRO ARAPUEY	927
142735	SECTOR AGUACIL	927
142736	SECTOR CASA DE TABLAS	927
142737	SECTOR DE 28 ENERO	927
142738	SECTOR EL ANTEOJO	927
142739	SECTOR EL CATORCE	927
142740	SECTOR EL QUINCE	927
142741	SECTOR LA DIFICULTAD	927
142742	SECTOR LA MORA DE POCÓ	927
142743	SECTOR LAS VERITAS	927
142744	SECTOR POCÓ	927
142745	SECTOR SAN MIGUEL	927
142746	SECTOR SAN RAFAEL	927
142747	CAPITAL DE PARROQUIA SAN JOSÉ DE PALMIRA	928
142749	SECTOR LA CUESTA	929
142750	SECTOR MUCUMPÍS	929
142751	SECTOR MUCURÓ	929
142752	SECTOR MUCUTUBÁN	929
142753	SECTOR SAN RAFAEL	929
142754	SECTOR TORONDOY	929
142755	CAPITAL DE PARROQUIA SAN CRISTÓBAL DE TORONDOY	930
142756	BARRIO 1RO DE MAYO	931
142757	BARRIO BELLA VISTA	931
142758	BARRIO EL LLANITO	931
142759	BARRIO LA CALORA	931
142760	BARRIO LA PROVIDENCIA	931
142761	BARRIO PRIMERA	931
142762	BARRIO SAN JOSÉ DE LAS FLORES	931
142763	BARRIO SAN JOSÉ FLORES ALTO	931
142764	BARRIO SAN JOSÉ FLORES BAJO	931
142765	BARRIO SAN JUAN BAUTISTA	931
142766	BARRIO SAN PEDRO	931
142767	BARRIO SANTA ANA NORTE	931
142768	BARRIO SANTA ANITA	931
142769	BARRIO SANTA ROSA	931
142770	BARRIO SANTO DOMINGO	931
142771	BARRIO SIMÓN BOLÍVAR	931
142772	BARRIO SUCRE	931
142773	BARRIO VISTA HERMOSA	931
142774	CONJUNTO RESIDENCIAL ALBARREGAS	931
142775	CONJUNTO RESIDENCIAL CAMPO NEBLINA	931
142776	CONJUNTO RESIDENCIAL DOMINGO SALAZAR	931
142777	CONJUNTO RESIDENCIAL EL GARZÓN	931
142778	CONJUNTO RESIDENCIAL LA RIVERA	931
142779	CONJUNTO RESIDENCIAL LAS HECHICERAS	931
142780	CONJUNTO RESIDENCIAL LAS MARÍAS	931
142781	CONJUNTO RESIDENCIAL LOS FRAILES	931
142782	CONJUNTO RESIDENCIAL MARÍA	931
142783	CONJUNTO RESIDENCIAL MARÍA GRACIELA	931
142784	CONJUNTO RESIDENCIAL SIMÓN BOLÍVAR LOS FRAILEJONES	931
142785	CONJUNTO RESIDENCIAL TATUY	931
142786	SECTOR DESARROLLO HABITACIONAL SANTA ANA	931
142787	SECTOR DESARROLLO HABITACIONAL SANTA ANA II	931
142788	SECTOR LA CRUZ VERDE	931
142789	SECTOR LA HECHICERA	931
142790	SECTOR LA LIRA	931
142791	SECTOR LAS QUEBRADITAS	931
142792	SECTOR LOMAS DE BELLA VISTA	931
142793	SECTOR LOS PRÓCERES	931
142794	SECTOR PUEBLO NUEVO	931
142795	SECTOR SANTA ANA	931
142796	URBANIZACIÓN ALTO PRADO	931
142797	URBANIZACIÓN CARDENAL QUINTERO	931
142798	URBANIZACIÓN DOECA	931
142799	URBANIZACIÓN EL CAMPITO	931
142800	URBANIZACIÓN LAS TERRAZAS	931
142801	URBANIZACIÓN MUCUCHÍES	931
142802	URBANIZACIÓN PARQUE MONTAÑA	931
142803	URBANIZACIÓN POMPEYA	931
142804	URBANIZACIÓN PUEBLO NUEVO	931
142805	URBANIZACIÓN SANTA ANA	931
142806	CENTRO ARIAS	932
142807	CONJUNTO RESIDENCIAL DON JESÚS	932
142808	CONJUNTO RESIDENCIAL VILLA SANTA	932
142809	PICO BOLÍVAR	932
142810	SECTOR BELÉN	932
142811	SECTOR EL PARAMITO	932
142812	SECTOR EL ZAMURO	932
142813	SECTOR LA JOYA	932
142814	SECTOR LOURDES	932
142815	URBANIZACIÓN CARLOS GAINZA	932
142816	URBANIZACIÓN LOS PERIODISTAS	932
142817	URBANIZACIÓN MARÍA ANITA MENDOZA	932
142818	BARRIO BELLA VISTA	933
142819	CONJUNTO RESIDENCIAL EL ROSARIO	933
142820	CONJUNTO RESIDENCIAL LUIS FARGIER	933
142821	CONJUNTO RESIDENCIAL VILLA SANTA BÁRBARA	933
142822	SECTOR BELENZATE	933
142823	SECTOR EL TEJAR	933
142824	SECTOR LA HACIENDA	933
142825	SECTOR LA JOYA	933
142826	SECTOR LOS PINOS	933
142827	SECTOR SAN ISIDRO	933
142828	SECTOR SANTA BÁRBARA ESTE	933
142829	SECTOR SANTA BÁRBARA OESTE	933
142830	URBANIZACIÓN HUMBOLDT	933
142831	URBANIZACIÓN LOS MOCOTÍES	933
142832	URBANIZACIÓN PIE DE MONTE	933
142833	SECTOR 16 DE SEPTIEMBRE	934
142834	SECTOR ANDRÉS BELLO	934
142835	SECTOR GLORIAS DE PATRIA	934
142836	SECTOR PASEO DE LAS FERIA	934
142837	SECTOR SAN JUAN	934
142838	SECTOR SANTA ELENA	934
142839	SECTOR URDANETA	934
142840	URBANIZACIÓN BUENA VISTA	934
142841	URBANIZACIÓN CAMPO DE ORO	934
142842	URBANIZACIÓN KENNEDY	934
142843	URBANIZACIÓN LAS DELICIAS	934
142844	URBANIZACIÓN LOS CORRALES	934
142845	URBANIZACIÓN LOS CORRALES I	934
142846	URBANIZACIÓN SAN ANTONIO	934
142847	URBANIZACIÓN SAN CRISTÓBAL	934
142848	URBANIZACIÓN SAN JUAN XII	934
142849	URBANIZACIÓN SANTA ELENA	934
142850	URBANIZACIÓN SANTA JUANA	934
142851	URBANIZACIÓN SANTA MÓNICA	934
142852	SECTOR CENTRO EL LLANO	935
142853	URBANIZACIÓN EL ENCANTO	935
142854	CENTRO GONZALO PICÓN FEBRES	936
142855	CONJUNTO RESIDENCIA VILLA SANTA	936
142856	CONJUNTO RESIDENCIAL EL ARENAL	936
142857	CONJUNTO RESIDENCIAL MARIANITA MENDOZA	936
142858	CONJUNTO RESIDENCIAL MUCUJUN	936
142859	CONJUNTO RESIDENCIAL VELLECITO	936
142860	CONJUNTO RESIDENCIAL VILLA SUIT	936
142861	SECTOR EL ARADO	936
142862	SECTOR EL PLAYÓN	936
142863	SECTOR EL VALLE	936
142864	SECTOR LA CAÑA	936
142865	SECTOR LA CARBONERA	936
142866	SECTOR LA CUCHILLA	936
142867	SECTOR LA CUESTA	936
142868	SECTOR LA VERGARA	936
142869	SECTOR LAS CUADRAS	936
142870	SECTOR LAS MERCEDES	936
142871	SECTOR MONTERREY	936
142872	SECTOR PLAYÓN ABAJO	936
142873	SECTOR PRADO VERDE	936
142874	SECTOR SAN BENITO	936
142875	SECTOR SAN JAVIER	936
142876	SECTOR VALLE ALTO	936
142877	SECTOR VALLE GRANDE	936
142878	SECTOR ZONA MILITAR	936
142879	URBANIZACIÓN DON PERUCHO	936
142880	URBANIZACIÓN LOS PINOS	936
142881	BARRIO EL CAMBIO	937
142882	BARRIO LA COLINA	937
142883	BARRIO LOS NARANJOS	937
142884	BARRIO NEGRO PRIMERO	937
142885	BARRIO NIÑO JESÚS	937
142886	BARRIO PUMA ROSA	937
142887	BARRIO RAÚL LEONI	937
142888	BARRIO SAN ANTONIO	937
142889	PROLONGACIÓN EL MORRO	937
142890	PROLONGACIÓN SAN JACINTO	937
142891	SECTOR EL PORTACHUELO	937
142892	SECTOR LA ASTILLERIA	937
142893	SECTOR LA CHAMA	937
142894	SECTOR LA CHAMITA	937
142895	SECTOR LOS BUCARES	937
142896	SECTOR SAN JACINTO	937
142897	SECTOR SANTA CATALINA	937
142898	URBANIZACIÓN CARABOBO	937
142899	URBANIZACIÓN CINCO ÁGUILAS	937
142900	BARRIO LA VEGA	938
142901	CONJUNTO RESIDENCIAL ANDRÉS BELLO	938
142902	CONJUNTO RESIDENCIAL CALICANTA	938
142903	CONJUNTO RESIDENCIAL CANDELARIA	938
142904	CONJUNTO RESIDENCIAL DOÑA CARMEN	938
142905	CONJUNTO RESIDENCIAL ESTANCIAS	938
142906	CONJUNTO RESIDENCIAL HABIZUN	938
142907	CONJUNTO RESIDENCIAL LA ALAMEDA	938
142908	CONJUNTO RESIDENCIAL LAS CAROLINAS	938
142909	CONJUNTO RESIDENCIAL LOS FRENOS	938
142910	CONJUNTO RESIDENCIAL MONTE ALTO	938
142911	CONJUNTO RESIDENCIAL PRADERAS	938
142912	CONJUNTO RESIDENCIAL RINCÓN	938
142913	CONJUNTO RESIDENCIAL VALLE ABAJO	938
142914	CONJUNTO RESIDENCIAL VILLA DEL CAMPO	938
142915	CONJUNTO RESIDENCIAL VILLA DEL CHAMA	938
142916	CONJUNTO RESIDENCIAL VILLA DEL RÍO	938
142917	CONJUNTO RESIDENCIAL YOCANEY	938
142918	URBANIZACIÓN ALTA CHAMA	938
142919	URBANIZACIÓN ALTAMIRA	938
142920	URBANIZACIÓN BARCELONA	938
142921	URBANIZACIÓN CARRIZAL	938
142922	URBANIZACIÓN CARRIZAL A	938
142923	URBANIZACIÓN CARRIZAL B	938
142924	URBANIZACIÓN DELICANTO	938
142925	URBANIZACIÓN EL CENTRAL	938
142926	URBANIZACIÓN EL MIRADOR	938
142927	URBANIZACIÓN LA MARA	938
142928	URBANIZACIÓN LA MARA ALTO CHAMA	938
142929	URBANIZACIÓN LA MONTAÑA A	938
142930	URBANIZACIÓN LA MONTAÑA B	938
142931	URBANIZACIÓN LA SABANA	938
142932	URBANIZACIÓN LAS ACACIAS	938
142933	URBANIZACIÓN LAS DELIAS	938
142934	URBANIZACIÓN LAS TAPIAS	938
142935	URBANIZACIÓN PEDRERA	938
142936	URBANIZACIÓN VALPARAÍSO	938
142937	URBANIZACIÓN VILLA DEL RÍO	938
142938	BARRIO LA TRINIDAD	939
142939	BARRIO NUEVA BOLIVIA	939
142940	BARRIO SAN ISIDRO	939
142941	CONJUNTO RESIDENCIAL ÁNGELES IV	939
142942	CONJUNTO RESIDENCIAL LA HORQUETA	939
142943	CONJUNTO RESIDENCIAL LAGUNILLA	939
142944	CONJUNTO RESIDENCIAL LOS COCOS	939
142945	CONJUNTO RESIDENCIAL LOS NARANJOS	939
142946	CONJUNTO RESIDENCIAL PIE DE MONTE	939
142947	CONJUNTO RESIDENCIAL QUEBRADITA LINDA	939
142948	CONJUNTO RESIDENCIAL ROCAYOSA	939
142949	CONJUNTO RESIDENCIAL SAN ISIDRO	939
142950	CONJUNTO RESIDENCIAL SAY SAY	939
142951	SECTOR EL ENCANTO	939
142952	SECTOR LA PEDREGOSA ALTA	939
142953	SECTOR LA PEDREGOSA BAJA	939
142954	SECTOR LOMA DE MAITINES	939
142955	SECTOR LOS PRÓCERES	939
142956	SECTOR PEDREGOSA SUR	939
142957	URBANIZACIÓN BELESANTE	939
142958	URBANIZACIÓN DON PEPE	939
142959	URBANIZACIÓN EL CASTOR	939
142960	URBANIZACIÓN LA FLORESTA	939
142961	URBANIZACIÓN LA HACIENDA	939
142962	URBANIZACIÓN LA LINDA	939
142963	URBANIZACIÓN LA PEDREGOSA	939
142964	URBANIZACIÓN LA TRINIDAD	939
142965	URBANIZACIÓN LAS ARDILLAS	939
142966	URBANIZACIÓN LOS CORTIJOS	939
142967	URBANIZACIÓN PIEDRAS GRANDES	939
142968	URBANIZACIÓN QUEBRADA LINDA	939
142969	URBANIZACIÓN RÍO ALTO	939
142970	URBANIZACIÓN VILLA DE SANTA ROSA	939
142971	ZONA INDUSTRIAL LOS ANDES	939
142972	BARRIO SANTA BÁRBARA	940
142973	BARRIO SANTA TERESA	940
142974	BARRIO SUCRE	940
142975	CONJUNTO RESIDENCIAL BUCARES	940
142976	CONJUNTO RESIDENCIAL CORDILLERA	940
142977	CONJUNTO RESIDENCIAL DON JOSÉ	940
142978	CONJUNTO RESIDENCIAL HACIA SIERRA	940
142979	CONJUNTO RESIDENCIAL LA ARBOLEDA	940
142980	CONJUNTO RESIDENCIAL LOGIMAR	940
142981	CONJUNTO RESIDENCIAL LUIS FARGIER	940
142982	CONJUNTO RESIDENCIAL MONSEÑOR CHACÓN	940
142983	CONJUNTO RESIDENCIAL PEDRO RINCÓN GUTIÉRREZ	940
142984	CONJUNTO RESIDENCIAL PUENTE DE HIERRO	940
142985	CONJUNTO RESIDENCIAL RÍO ARRIBA	940
142986	CONJUNTO RESIDENCIAL SANTA BÁRBARA	940
142987	CONJUNTO RESIDENCIAL VILLA JARDÍN	940
142988	SECTOR EL LLANITO	940
142989	SECTOR EL RODEO	940
142990	SECTOR EL TRAPICHE	940
142991	SECTOR HACIA SIERRA	940
142992	SECTOR INDEPENDENCIA	940
142993	SECTOR LA CAÑA	940
142994	SECTOR LA CRUZ VERDE	940
142995	SECTOR LOS SAUSALES	940
142996	SECTOR PIE DE TIRO	940
142997	SECTOR POMPEYA	940
142998	SECTOR SANTA BÁRBARA DEL ESTE	940
142999	SECTOR SANTA BÁRBARA OESTE	940
143000	URBANIZACIÓN LAS FLORES	940
143001	URBANIZACIÓN LOS PINOS	940
143002	URBANIZACIÓN LUMONTOY	940
143003	URBANIZACIÓN MARIANO PICÓN SALAS	940
143004	URBANIZACIÓN SAN JOSÉ	940
143005	URBANIZACIÓN VILLA VERÓNICA	940
143006	BARRIO EL RINCÓN	940
143007	BARRIO MONTE BELLO	940
143008	BARRIO PIE DE TIRO	940
143009	BARRIO 05 DE JULIO	941
143010	BARRIO ANDRÉS ELOY BLANCO	941
143011	BARRIO LA CALERA	941
143012	BARRIO LA CAMPIÑA	941
143013	BARRIO LA DEMOCRACIA	941
143014	BARRIO LA UNIÓN	941
143015	BARRIO SAN PEDRO	941
143016	CENTRO DE MILLA	941
143017	CONJUNTO RESIDENCIAL EL ROCÍO	941
143018	SECTOR AGUAS DE MÉRIDA	941
143019	SECTOR EL AMPARO	941
143020	SECTOR LA CRUZ VERDE	941
143021	SECTOR LA HECHICERA	941
143022	SECTOR LA MILAGROSA I	941
143023	SECTOR LA MILAGROSA II	941
143024	SECTOR LA PROVIDENCIA	941
143025	SECTOR LA QUEBRADITA	941
143026	SECTOR LOS CHORROS DE MILLA	941
143027	SECTOR LOS LLANITOS DE MONTERREY	941
143028	SECTOR LOS PINOS	941
143029	SECTOR MESA DE LA VIRGEN	941
143030	SECTOR MUCUJUN	941
143031	SECTOR PIE DE TIRO	941
143032	SECTOR POMPEYA	941
143033	SECTOR SAN BENITO	941
143034	SECTOR SANTA BÁRBARA DEL ESTE	941
143035	SECTOR SANTA BÁRBARA OESTE	941
143036	SECTOR SANTA ROSA	941
143037	SECTOR VUELTA DE LOLA	941
143038	URBANIZACIÓN LA ARBOLEDA	941
143039	URBANIZACIÓN LA COMPAÑIA	941
143040	URBANIZACIÓN LAS FLORES	941
143041	URBANIZACIÓN LOS PINOS	941
143042	URBANIZACIÓN LOS PINOS II	941
143043	URBANIZACIÓN LOS SAUZALES	941
143044	URBANIZACIÓN LUMONTOY	941
143045	URBANIZACIÓN MARIANO PICÓN SALAS	941
143046	URBANIZACIÓN SAN FRANCISCO	941
143047	URBANIZACIÓN SAN JOSÉ	941
143048	URBANIZACIÓN SANTA MARÍA NORTE	941
143049	URBANIZACIÓN SANTA MARÍA SUR	941
143050	URBANIZACIÓN TATUI	941
143051	URBANIZACIÓN VILLA VERÓNICA	941
143052	BARRIO SAN JOSÉ	942
143053	SECTOR AGUAS DE MÉRIDA	942
143054	SECTOR COSOBO	942
143055	SECTOR EL PARAÍSO	942
143056	SECTOR EL SALADO	942
143057	SECTOR ENTABLITO I	942
143058	SECTOR ENTABLITO II	942
143059	SECTOR ENTABLITO III	942
143060	SECTOR LA PARROQUIA	942
143061	SECTOR LOMAS DE LOS ÁNGELES	942
143062	SECTOR LOS CUROS	942
143063	SECTOR POLICIAL	942
143064	URBANIZACIÓN ALDEA VALLE ENCANTADO	942
143065	URBANIZACIÓN ALMA MATER	942
143066	URBANIZACIÓN ÁNGELES	942
143067	URBANIZACIÓN AZUL	942
143068	URBANIZACIÓN BELLA VISTA	942
143069	URBANIZACIÓN BICENTENARIO	942
143070	URBANIZACIÓN CAMPO CLARO	942
143071	URBANIZACIÓN CAMPO SOL	942
143072	URBANIZACIÓN LA MATA	942
143073	URBANIZACIÓN MIRADOR	942
143074	URBANIZACIÓN MONTAÑERA	942
143075	URBANIZACIÓN OZUNA	942
143076	URBANIZACIÓN PEDREGAL	942
143077	URBANIZACIÓN SAN VICENTE	942
143078	URBANIZACIÓN SERRANÍA CASA CLUB	942
143079	URBANIZACIÓN TERRAZAS EL SOL	942
143080	URBANIZACIÓN TRINITARIAS	942
143081	ZONA INDUSTRIAL LOS CUROS	942
143082	CENTRO DE MÉRIDA	943
143083	CONJUNTO RESIDENCIAL LA PRADERA	943
143084	SECTOR EL CAMPITO	943
143085	SECTOR LA PUEBLITA	943
143086	SECTOR LLANO GRANDE	943
143087	SECTOR LOMA DE PUEBLO	943
143088	SECTOR LOMAS DE LOS VIENTOS	943
143089	SECTOR MONTE BELLO	943
143090	SECTOR PLAZA LAS HEROÍNAS	943
143091	SECTOR VENGAS	943
143092	SECTOR VILLA LOS ÁNGELES	943
143093	URBANIZACIÓN ALTOS DE SANTA MARÍA	943
143094	URBANIZACIÓN BUGANVILLA	943
143095	URBANIZACIÓN DON PANCHO	943
143096	URBANIZACIÓN DOÑA IMITO	943
143097	URBANIZACIÓN JUAN XXIII	943
143098	URBANIZACIÓN LA LAGUNA	943
143099	URBANIZACIÓN LA RIBEREÑA	943
143100	URBANIZACIÓN POZO AZUL	943
143101	ZONA RENTAL LOS PRÓCERES	943
143102	ALDEA EL CUCUY	944
143103	ALDEA EL HATICO	944
143104	ALDEA EL HATO LOS PÉREZ	944
143105	ALDEA EL MONTE	944
143106	ALDEA EL QUINÓ	944
143107	ALDEA MIQUIRURÁ	944
143108	ALDEA MOCAS	944
143109	ALDEA MOCOSOS	944
143110	ALDEA MOCOTONÉ	944
143111	ALDEA MOSELANDE	944
143112	ALDEA MOSNANDÁ	944
143113	ALDEA MUCHACHAY	944
143114	ALDEA MUCURUTÁN	944
143115	ALDEA MUCUSÓS	944
143116	ALDEA MUCUTARAY	944
143117	ALDEA MUCUYBUCHE	944
143118	ALDEA TAPIECITA	944
143119	CENTRO EL MORRO	944
143120	LOS NEVADOS	945
143121	SECTOR EL HATO	945
143122	SECTOR LAS PLUMAS	945
143123	SECTOR LOS RESTROJOS	945
143124	SECTOR MUCUTÁN	945
143125	BARRIO PIÑANGO	946
143126	BARRIO SAN RAFAEL	946
143127	CASERÍO AGUA BLANCA	946
143128	CASERÍO CASA DE TEJAS	946
143129	CASERÍO EL SALADO	946
143130	CASERÍO LA LAJITA	946
143131	CASERÍO MESA CERRADA	946
143132	CASERÍO MESA DE MIJARÁ	946
143133	CASERÍO MUCUMBÁS	946
143134	CASERÍO PIEDRA GORDA	946
143135	CASERÍO POTRERITO	946
143136	CASERÍO PUENTE REAL	946
143137	CASERÍO PUERTO ESCONDIDO	946
143138	CASERÍO SANTA CRUZ DE MEJARÁ	946
143139	CENTRO TIMOTES	946
143140	SECTOR ALTO DE MUCUYUPU	946
143141	SECTOR BAILÓN	946
143142	SECTOR CHAMARÚ	946
143143	SECTOR EL GARABATO	946
143144	SECTOR EL HATICO	946
143145	SECTOR EL HATO	946
143146	SECTOR EL PARAMITO	946
143147	SECTOR EL RINCÓN	946
143148	SECTOR LA CAÑADA	946
143149	SECTOR LA CUICA	946
143150	SECTOR LA JOYA	946
143151	SECTOR LAS MESAS DE SAN JOSÉ	946
143152	SECTOR LAS PORQUERAS	946
143153	SECTOR LAS TARAYESITAS	946
143154	SECTOR LLANO ALTO	946
143155	SECTOR LLANO GRANDE	946
143156	SECTOR MESA CERRADA	946
143157	SECTOR MUCUSE	946
143158	SECTOR PIEDRA GORDA	946
143159	SECTOR SAN ANTONIO	946
143160	SECTOR SANTA CRUZ DE TAFALLEZ	946
143161	SECTOR TAFALLES	946
143162	URBANIZACIÓN CHIJÓS	946
143163	URBANIZACIÓN KENNEDY	946
143164	URBANIZACIÓN LOCA LUZ CARABALLO	946
143165	URBANIZACIÓN LOS LLANITOS	946
143166	URBANIZACIÓN TIMOTES	946
143167	SECTOR BUENA VISTA	947
143168	SECTOR EL CACHO	947
143169	SECTOR EL CEMENTERIO ARRIBA	947
143170	SECTOR EL RESBALÓN	947
143171	SECTOR HIERBA BUENA	947
143172	SECTOR LA ENSILLADA	947
143173	SECTOR MICHIRAQUE	947
143174	SECTOR MIRANDA	947
143175	SECTOR MUCUTUJOTE	947
143176	SECTOR MUFIQUE	947
143177	SECTOR TIFAFA	947
143178	SECTOR TUYUY ALTO	947
143179	SECTOR TUYUY BAJO	947
143180	CENTRO LA VENTA	948
143181	SECTOR AGUA LARGA	948
143182	SECTOR ALISAL	948
143183	SECTOR ALMORZADERO	948
143184	SECTOR CAÑA CERRADA	948
143185	SECTOR CHUMUPU	948
143186	SECTOR CRUZ CHIQUITA	948
143187	SECTOR EL CANEY	948
143188	SECTOR EL GAVILÁN	948
143189	SECTOR EL HATICO	948
143190	SECTOR EL MORRO	948
143191	SECTOR EL RINCÓN	948
143192	SECTOR LA CAVA	948
143193	SECTOR LAS CAÑADITAS	948
143194	SECTOR LOS BISCUYES	948
143196	SECTOR TURMERO	948
143195	SECTOR MITEQUE	948
143197	CENTRO PIÑANGO	949
143198	SECTOR ARICAGUA	949
143199	SECTOR BUENOS AIRES	949
143200	SECTOR CANANDO	949
143201	SECTOR EL ALMORZADERO	949
143202	SECTOR EL ARBOLITO	949
143203	SECTOR EL BAÑO	949
143204	SECTOR EL CUPIZ	949
143205	SECTOR EL FILO	949
143206	SECTOR EL FRAILE	949
143207	SECTOR EL GRITO	949
143208	SECTOR EL RECREO	949
143209	SECTOR LA CABRERA	949
143210	SECTOR LA CALAVERA	949
143211	SECTOR LA TIENDITA	949
143212	SECTOR LA VEGA	949
143213	SECTOR LAS PAILITAS	949
143214	SECTOR LAS PALMAS	949
143215	SECTOR LAS TAPIAS	949
143216	SECTOR LOS APOSENTOS	949
143217	SECTOR LOS CORRALES	949
143218	SECTOR LOS CORUBALES	949
143219	SECTOR LOS HOYOS	949
143220	SECTOR LOS MANZANOS	949
143221	SECTOR MISTEQUE	949
143222	SECTOR SAN ANTONIO	949
143223	SECTOR SANTA BÁRBARA	949
143224	SECTOR SANTA CRUZ DEL QUEMADO	949
143225	CENTRO SANTA ELENA DE ARENALES	950
143226	SECTOR CAÑO MORO	950
143227	SECTOR CAPAZÓN ABAJO	950
143228	SECTOR CAPAZÓN ARRIBA	950
143229	SECTOR COLINAS DEL ESTE	950
143230	SECTOR LA PUEBLITA	950
143231	SECTOR RÍO PERDIDO	950
143232	BARRIO CRISTO REY	951
143233	BARRIO INAVIS	951
143234	BARRIO LOS LAURELES	951
143235	BARRIO SAN JOSÉ	951
143236	CENTRO LOS GUAYABONES	951
143237	SECTOR AVISPERO	951
143238	SECTOR CAMPO RICO	951
143239	SECTOR CAÑO ARAUCO	951
143240	SECTOR CAÑO ARENOSO	951
143241	SECTOR CAÑO AVISPERO	951
143242	SECTOR CAÑO OBISPO	951
143243	SECTOR CAÑO SAPO	951
143244	SECTOR CAÑO TIGRE	951
143245	SECTOR CAÑO ZANCUDO	951
143246	SECTOR CAPAZÓN	951
143247	SECTOR GUAYABONES	951
143248	SECTOR SANTA MARÍA	951
143249	SECTOR ZUMBADOR	951
143250	CENTRO DE SAN RAFAEL DE ALCÁZAR	952
143251	SECTOR CAÑO AZUL	952
143252	SECTOR GUACHIZÓN	952
143253	SECTOR MATA DE COCO	952
143254	SECTOR SAN RAFAEL	952
143255	CENTRO DE SANTA MARÍA DE CAPARO	953
143256	SECTOR EL VEGÓN	953
143257	SECTOR LA FLORIDA	953
143258	CASERÍO AGUA REGADA	954
143259	CASERÍO ALTOS EL ARENAL	954
143260	CASERÍO CAJA DE AGUA	954
143261	CASERÍO CERRO SECO	954
143262	CASERÍO CHINO	954
143263	CASERÍO CHINO ABAJO	954
143264	CASERÍO CHINO ALTO	954
143265	CASERÍO EL ARBOLITO	954
143266	CASERÍO EL BAÑO	954
143267	CASERÍO EL CEDRO	954
143268	CASERÍO EL CONEJO	954
143269	CASERÍO EL DIABLO	954
143270	CASERÍO EL POTRERITO	954
143271	CASERÍO EL POZO	954
143272	CASERÍO EL VOLCÁN	954
143273	CASERÍO GUZMÁN	954
143274	CASERÍO LA BECERRA	954
143275	CASERÍO LA CAPELLANÍA	954
143276	CASERÍO LA CRUZ	954
143277	CASERÍO LA CULATA	954
143278	CASERÍO LA HIGUERA	954
143279	CASERÍO LA LAGUNA	954
143280	CASERÍO LA RANCHERA	954
143281	CASERÍO LA VEGA	954
143282	CASERÍO LAS AGUJAS	954
143283	CASERÍO LAS AGUJITAS	954
143284	CASERÍO LAS CUEVAS	954
143285	CASERÍO LAS CUEVAS DE LACA	954
143286	CASERÍO LAS MALVINAS	954
143287	CASERÍO LAYMATOS	954
143288	CASERÍO LLANO ALTO	954
143289	CASERÍO LLANO DE AMPARO	954
143290	CASERÍO LLANO GRANDE	954
143291	CASERÍO LOS ENCERRADOS	954
143292	CASERÍO LOS PINOS	954
143293	CASERÍO MESA DE CHINO	954
143294	CASERÍO MUPATE	954
143295	CASERÍO SOBRE CHINO	954
143296	CENTRO PUEBLO LLANO	954
143297	SECTOR AGUAS DE LAS FLORES	954
143298	SECTOR EL ARBOLITO	954
143299	SECTOR EL CANUTAL	954
143300	SECTOR LA CULATA	954
143301	SECTOR LA PADILLA	954
143302	SECTOR MIYOY	954
143303	SECTOR MUTUS	954
143304	URBANIZACIÓN ALTO MIYOI	954
143305	URBANIZACIÓN LA TRINIDAD	954
143306	URBANIZACIÓN LOURDES	954
143307	URBANIZACIÓN PRADOS DE MARÍA	954
143308	SECTOR EL ROYAL	955
143309	SECTOR EL VERGEL	955
143310	SECTOR GAVIDIA	955
143311	SECTOR MI CARACHE	955
143312	SECTOR MIFAFTI	955
143313	SECTOR MOCAO	955
143314	SECTOR SAN JUDAS TADEO	955
143315	SECTOR SAN RAFAEL	955
143316	URBANIZACIÓN CORPOANDES	955
143317	URBANIZACIÓN DOÑA LULA	955
143318	URBANIZACIÓN LA VEGA	955
143319	URBANIZACIÓN LAS COLINA	955
143320	URBANIZACIÓN SAN FRANCISCO	955
143321	URBANIZACIÓN SANTA EDUVIGIS	955
143322	CENTRO MUCUCHÍES	955
143323	SECTOR EL PICADERO	955
143324	SECTOR LOS ALEROS	956
143325	SECTOR LA TOMA	957
143326	CENTRO MUCURUBÁ	958
143327	SECTOR ESCAGÜEY	958
143328	SECTOR INDEPENDENCIA	958
143329	SECTOR LA RANCHERÍA	958
143330	SECTOR LA VARIANTE	958
143331	SECTOR APARTADEROS	959
143332	SECTOR CASA DE GOBIERNO	959
143333	SECTOR EL PEDREGAL	959
143334	SECTOR LA ASONADA	959
143335	SECTOR LLANO DEL HATO	959
143336	SECTOR PUERTO NUEVO	959
143337	SECTOR SAN ISIDRO	959
143338	ALDEA MARIÑO	960
143339	ALDEA SAN PABLO	960
143340	BARRIO LAS DELICIAS	960
143341	BARRIO MATADERO	960
143342	BARRIO QUEBRADA ARRIBA	960
143343	CENTRO BAILADORES	960
143344	SECTOR AGUA AZUL	960
143345	SECTOR AGUA CALIENTE	960
143346	SECTOR BARROTES	960
143347	SECTOR BELLO CAMPO	960
143348	SECTOR BODOQUE	960
143349	SECTOR BORDE SECO	960
143350	SECTOR BUENA VISTA	960
143351	SECTOR CAPACHO	960
143352	SECTOR CAPADOR	960
143353	SECTOR COLINAS DE BODOQUE	960
143354	SECTOR DE LOS ÁLVAREZ	960
143355	SECTOR DON LUIS BARÓN	960
143356	SECTOR EL CAMACURO	960
143357	SECTOR EL CHARCO	960
143358	SECTOR EL DIQUE	960
143359	SECTOR EL HATO	960
143360	SECTOR EL PRIMOR	960
143361	SECTOR EL PUENTE	960
143362	SECTOR EL RINCÓN	960
143363	SECTOR EL RINCÓN DE LAS COLINAS	960
143364	SECTOR EL RINCÓN DE LOS ÁLVAREZ	960
143365	SECTOR EL RINCONCITO	960
143366	SECTOR EL TEJAR	960
143367	SECTOR GUARAPAO	960
143368	SECTOR LA CAPELLANÍA	960
143369	SECTOR LA CEBADA	960
143370	SECTOR LA MARINA	960
143371	SECTOR LA MESA	960
143372	SECTOR LA MESA DE GUERRERO	960
143373	SECTOR LA ROSA	960
143374	SECTOR LA VEGA	960
143375	SECTOR LA VEGA DE BODOQUE	960
143376	SECTOR LA VEGA DE SAN PABLO	960
143377	SECTOR LLANO GRANDE	960
143378	SECTOR LOMA DE SAN PABLO	960
143379	SECTOR LOS BARBECHOS	960
143380	SECTOR LOS ESPINOS	960
143381	SECTOR LOS RASTROJOS	960
143382	SECTOR MESA DE ADRIÁN	960
143383	SECTOR MESA DE GUERRERO	960
143384	SECTOR MESA LA LAGUNA	960
143385	SECTOR MONTE ARRIBA	960
143386	SECTOR NIETO	960
143387	SECTOR OTRA BANDA	960
143388	SECTOR PÁRAMO DE MARIÑO	960
143389	SECTOR QUEBRADA CHINITA	960
143390	SECTOR QUEBRADA SECA	960
143391	SECTOR RINCÓN DE SAN PABLO	960
143392	SECTOR RINCONCITO	960
143393	SECTOR RÍO ARRIBA	960
143394	SECTOR SANTA ANA	960
143395	URBANIZACIÓN BAILADORES	960
143396	URBANIZACIÓN EFRAÍN MARET	960
143397	ALDEA LAS PLAYITAS	961
143398	BARRIO 23 DE ENERO	961
143399	CENTRO LA PLAYA	961
143400	SECTOR EL POTRERO	961
143401	SECTOR LA BARRANCA	961
143402	SECTOR LA LAGUNITA	961
143403	SECTOR LAS TAPIAS	961
143404	SECTOR LOS BARBADOS	961
143405	SECTOR MI PEQUEÑA VILLA	961
143406	SECTOR NARANJAL	961
143407	SECTOR RINCÓN DE LA LAGUNA	961
143408	SECTOR TAPÓN	961
143409	URBANIZACIÓN LAS DELICIAS	961
143410	CASERÍO AYACUCHO	962
143411	CASERÍO LOMAS DEL PUEBLO	962
143412	CASERÍO MUCUNUTAN	962
143413	CASERÍO MUCUY BAJA	962
143414	CENTRO TABAY	962
143415	SECTOR AGUA CALIENTE	962
143416	SECTOR CABAÑAS LUGAREÑA	962
143417	SECTOR CABAÑAS MUCURATAY	962
143418	SECTOR CAPILLA LAS MERCEDES	962
143419	SECTOR EL MESÓN	962
143420	SECTOR EL ROSAL	962
143421	SECTOR EL ZAMURO	962
143422	SECTOR LA CEIBITA	962
143423	SECTOR LA PERICA	962
143424	SECTOR LA PLAYA	962
143425	SECTOR LA PODEROSA	962
143426	SECTOR LA QUEBRADITA	962
143427	SECTOR LAS MARÍAS	962
143428	SECTOR LOS LLANOS DE TABAY	962
143429	SECTOR MUCUTAN	962
143430	SECTOR MUCUY BAJA	962
143431	SECTOR SAN JERÓNIMO	962
143432	SECTOR SAN RAFAEL DE TABAY	962
143433	SECTOR VISTA ALEGRE	962
143434	URBANIZACIÓN DON PEDRO	962
143435	SECTOR PUEBLO VIEJO	963
143436	SECTOR PUNTA DE MOLINO	963
143437	SECTOR QUINANOQUE	963
143438	SECTOR SAN BENITO	963
143439	SECTOR SAN JUAN	963
143440	SECTOR SAN MARTÍN	963
143441	SECTOR TRAPICHE RANCHO GRANDE	963
143442	BARRIO SAN MIGUEL	963
143443	CASERÍO LOS UVITOS	963
143444	CENTRO LAGUNILLA	963
143445	CONJUNTO RESIDENCIAL URAO	963
143446	SECTOR AGUA DE URAO	963
143447	SECTOR BELÉN	963
143448	SECTOR CALLEJÓN DE LA VIEJAS	963
143449	SECTOR CASA BONITA	963
143451	SECTOR EL COROZO SEGUNDA ENTRADA	963
143450	SECTOR CASES	963
143452	SECTOR EL MOLINO	963
143453	SECTOR LA ALEGRÍA	963
143454	SECTOR LA CALERA	963
143455	SECTOR LA CORDILLERA	963
143456	SECTOR LA HOYADA	963
143457	SECTOR LA HOYADA DE LOS CARACOLES	963
143458	SECTOR LA HUERTA	963
143459	SECTOR LA JOYA	963
143460	SECTOR LA PUNTA	963
143461	SECTOR LA TRINCHERAS	963
143462	SECTOR LA VUELTA	963
143463	SECTOR LLANO SECO	963
143464	SECTOR LOMA DE COROZO	963
143465	SECTOR LOMA DE PIEDRA	963
143466	SECTOR LOS ARAQUES	963
143467	SECTOR LOS AZULES	963
143468	SECTOR LOS AZULITOS	963
143469	SECTOR LOS CUROS	963
143470	SECTOR LOS LLANITOS	963
143471	SECTOR MOCOYÓN	963
143472	SECTOR MUCUMBO	963
143473	SECTOR MUCUMI	963
143474	SECTOR MUCUMI BAJO	963
143475	SECTOR PUEBLO NUEVO	963
143476	CASERÍO EL ANÍS	964
143477	CASERÍO EL TEJAR	964
143478	CASERÍO LA PLAYITA	964
143479	CASERÍO LOS RURALES	964
143480	CASERÍO PUEBLO NUEVO	964
143481	CASERÍO RICAUTE	964
143482	CASERÍO SAN ANTONIO	964
143483	CENTRO CHIGUARÁ	964
143484	SECTOR EL CACIQUE	964
143485	SECTOR EL FILO	964
143486	SECTOR EL VERDE	964
143487	SECTOR MONTOYA	964
143488	SECTOR SAN JUANITO	964
143489	CENTRO ESTÁNQUEZ	965
143490	SECTOR EL HATO	965
143491	SECTOR EL JOQUE	965
143492	SECTOR LAS LABRANZAS	965
143493	SECTOR MOCOCHOPO	965
143494	SECTOR QUIRORÁ	965
143495	SECTOR SAN ANTONIO	965
143496	SECTOR SAN PABLO	965
143497	SECTOR SAN PABLO ARRIBA	965
143498	CENTRO LA TRAMPA	966
143499	SECTOR EL CACIQUE	966
143500	SECTOR EL CAMBUR	966
143501	SECTOR LA SABANA	966
143502	CENTRO PUEBLO NUEVO DEL SUR	967
143503	SECTOR EL CAMBUR	967
143504	SECTOR EL HATICO	967
143505	SECTOR LA AGUADA	967
143506	SECTOR LA HORCAZ	967
143507	SECTOR LA LAGUNA	967
143508	SECTOR LA MAGDALENA	967
143509	SECTOR LA QUEBRADA	967
143510	SECTOR MACIGUAL	967
143511	SECTOR MUCUNDÓ	967
143512	SECTOR MUCUQUÍ	967
143513	SECTOR PUEBLO NUEVO	967
143514	SECTOR PUENTE REAL	967
143515	BARRIO EL COROZO	968
143516	BARRIO MUCUMI	968
143517	CENTRO SAN JUAN	968
143518	CONJUNTO RESIDENCIAL VILLA LIBERTAD	968
143519	SECTOR EL ESTANQUILLO	968
143520	SECTOR LOS CARACOLES	968
143521	URBANIZACIÓN EL CEMENTERIO	968
143522	URBANIZACIÓN ESTANQUILLO ALTO	968
143523	URBANIZACIÓN ESTANQUILLO BAJO	968
143524	URBANIZACIÓN ESTANQUILLO MEDIO	968
143525	URBANIZACIÓN INRREVI	968
143526	URBANIZACIÓN LA PUERTA	968
143527	URBANIZACIÓN LA VARIANTE	968
143528	URBANIZACIÓN PIEDRAS NEGRAS	968
143529	URBANIZACIÓN PUENTE CARABOBO	968
143530	CENTRO AMPARO	969
143531	BARRIO EL ROSAL	970
143532	BARRIO LOS LIMONES	970
143533	BARRIO LOS NARANJOS	970
143534	BARRIO SAN JOSÉ	970
143535	CASERÍO LA QUINTA	970
143536	CENTRO EL LLANO	970
143537	SECTOR BUSCATERA	970
143538	SECTOR CARRERA CUATRO	970
143539	SECTOR CHIMBORAZO	970
143540	SECTOR COLISEO	970
143541	SECTOR CRISTO REY	970
143542	SECTOR EL PEÑÓN	970
143543	SECTOR EL VERDE	970
143544	SECTOR EL VOLCÁN	970
143545	SECTOR GRANJA TACARICA	970
143546	SECTOR JESÚS OBRERO	970
143547	SECTOR LA COLINA	970
143548	SECTOR LA GALERA	970
143549	SECTOR LAS DELICIAS	970
143550	SECTOR LLANO ARRIBA	970
143551	SECTOR LOS BAMBÚES	970
143552	SECTOR MEDIA LAGUNA	970
143553	SECTOR NARANJAL	970
143554	SECTOR PLAYA ARRIBA	970
143555	SECTOR PLAYA CENTRO	970
143556	SECTOR QUEBRADA ARRIBA	970
143557	SECTOR REENCUENTRO	970
143558	SECTOR SANTA INÉS	970
143559	SECTOR TACARICA	970
143560	URBANIZACIÓN COLINAS DE DON TEO	970
143561	URBANIZACIÓN LOS EDUCADORES	970
143562	URBANIZACIÓN MOCUTÍES	970
143563	URBANIZACIÓN SIMÓN RODRÍGUEZ	970
143564	URBANIZACIÓN VISTA ALEGRE	970
143565	CENTRO SAN FRANCISCO	971
143566	SECTOR CARICUEVA	971
143567	BARRIO BICENTENARIO	972
143568	BARRIO BRISAS DE MOCOTIES	972
143569	BARRIO BUENOS AIRES	972
143570	BARRIO EL AÑIL	972
143571	BARRIO GUMERSINDO ROJAS	972
143572	BARRIO LA VICTORIA	972
143573	BARRIO LAS ACACIAS	972
143574	BARRIO SAN MARTÍN	972
143575	CASERÍO EL MAPOCAL	972
143576	CASERÍO LA GRUTA	972
143577	CENTRO TOVAR	972
143578	SECTOR BUENA VISTA	972
143579	SECTOR BUSCATERA	972
143580	SECTOR CUCUCHICA	972
143581	SECTOR EL CACIQUE	972
143582	SECTOR EL COROZO	972
143583	SECTOR EL PÁRAMITO	972
143584	SECTOR EL PÁRAMO	972
143585	SECTOR EL PEÑÓN	972
143586	SECTOR LA CASCADA	972
143587	SECTOR LOMAS DE LA VIRGEN	972
143588	SECTOR MOCOTIES	972
143589	SECTOR MONSEÑOR MORENO	972
143590	SECTOR PRIMERA	972
143591	SECTOR QUEBRADA BLANCO	972
143592	SECTOR SABANETA	972
143593	SECTOR SANTA BÁRBARA	972
143594	SECTOR SANTA ELENA	972
143595	SECTOR VILLA DIGNIDAD	972
143596	SECTOR WILFREDO OMAÑA	972
143597	URBANIZACIÓN ALBERTO CARNEVALLI	972
143598	URBANIZACIÓN JOSÉ MARÍA VARGAS	972
143599	URBANIZACIÓN LA ARBOLEDA	972
143600	URBANIZACIÓN LA VEGA	972
143601	URBANIZACIÓN RÓMULO GALLEGOS	972
143602	URBANIZACIÓN SANTA EDUVIGIS	972
143603	URBANIZACIÓN VARGAS	972
143604	SECTOR BOBURES	973
143605	SECTOR CAJA SECA	973
143606	SECTOR CAÑO DE AGUA	973
143607	SECTOR CANTALOTODO	973
143608	SECTOR CAPIÚ	973
143609	SECTOR CAPIÚ ABAJO	973
143610	SECTOR CAPIÚ ARRIBA	973
143611	SECTOR EL BANCO	973
143612	SECTOR EL BATEY	973
143613	SECTOR EL PALMICHOSO	973
143614	SECTOR GIBRALTAR	973
143615	SECTOR GUARAMACO	973
143616	SECTOR JUAN DE LOS RÍOS	973
143617	SECTOR LA ENCARNACIÓN	973
143618	SECTOR LA GUAIRA	973
143619	SECTOR LA TRINIDAD	973
143620	SECTOR LAS CARMELITAS	973
143621	SECTOR LAS DOLORES	973
143622	SECTOR MONTE ADENTRO	973
143623	SECTOR NUEVA BOLIVIA	973
143624	SECTOR PALO DE FLORES	973
143625	SECTOR PUERTO LAS MARÍAS	973
143626	SECTOR QUEBRADA DE PIEDRA	973
143627	SECTOR SAN MIGUEL	973
143628	SECTOR SAN RAFAEL	973
143629	SECTOR SANTA ANA	973
143630	SECTOR SANTA CLARA	973
143631	SECTOR SANTA CRUZ	973
143632	SECTOR AGUA AZUL	974
143633	SECTOR AGUA BLANCA	974
143634	SECTOR CAMPO ALEGRE	974
143635	SECTOR CAÑO JESÚS	974
143636	SECTOR EL PIONÍO	974
143637	SECTOR EL QUEBRADÓN	974
143638	SECTOR LA CULEBRA	974
143639	SECTOR MUYAPÁ	974
143640	SECTOR PALMARITO	974
143641	SECTOR SAN BENITO	974
143642	SECTOR SAN MATEO	974
143643	SECTOR SAN PEDRO	974
143644	CENTRO LAS VIRTUDES	975
143645	SECTOR BRISAS DEL VALLE	975
143646	SECTOR COLÓN	975
143647	CENTRO SANTA APOLONIA	976
143648	BARRIO CUBA	977
143649	CENTRO ZEA	977
143650	SECTOR CANTARANA	977
143651	SECTOR EL CALVARIO	977
143652	SECTOR EL CALVO	977
143653	SECTOR EL CEMENTERIO	977
143654	SECTOR EL CHUCO	977
143655	SECTOR EL PLAYÓN	977
143656	SECTOR EL PUENTE	977
143657	SECTOR LA BOMBA	977
143658	SECTOR LA PASARELA	977
143659	SECTOR LA QUEBRADA	977
143660	SECTOR PADRE ANGULO	977
143661	SECTOR PALMIRA	977
143662	SECTOR SAN JOSÉ	977
143663	SECTOR SAN LUIS	977
143664	SECTOR SAN MIGUEL	977
143665	SECTOR SAN PEDRO	977
143666	SECTOR SANTA ANA	977
143667	SECTOR SANTA ANA ALTA	977
143668	SECTOR SANTA BÁRBARA	977
143669	CENTRO CAÑO TIGRE	978
143670	SECTOR ANTONIO MORENO	978
143671	SECTOR CAMINO VIEJO EL IUTE KM. 1	978
143672	SECTOR CAÑO EL TIGRE PARTE BAJA	978
143673	SECTOR CASA BLANCA	978
143674	SECTOR EL BEJUQUERO	978
143675	SECTOR EL BOSQUE	978
143676	SECTOR LA LAPA	978
143677	SECTOR LA YEE	978
143678	SECTOR LAS MALVINAS	978
143679	SECTOR MESA DEL ESCALANTE	978
143680	URBANISMO I Y II (KM. 6)	978
143681	URBANIZACIÓN 12 DE OCTUBRE KM. 7	978
143682	URBANIZACIÓN ALBERTO ADRIÁN KM. 6	978
\.


--
-- Data for Name: solicitante; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.solicitante (id, p_nombre_sol, p_apellido_sol, telefono_celular_sol, motivo_solicitud_id, organismos_solicitud_id) FROM stdin;
4	JOSE 	PENIA	(042) 627-4069	1	5
3	JESUS 	RIVERA	(426) 326-5987	57	2
2	KASSANDRA MARIA	JEREZ MARQUEZ	(041) 207-8274	36	9
1	PEDRO	ARAUJO	(424) 785-4512	22	4
5	RAMON	VELAZQUEZ	(041) 666-9834	54	1
7	JESUS	RIVERA	(426) 326-5987	54	3
6	GABY	CONTRERAS 	(041) 207-8274	3	7
8	MARIA	GONZALEZ	(412) 000-0015	58	9
9	JOSE	MOLINA	(416) 978-4205	23	9
10	MARIA	PEREZ	(424) 785-4512	69	2
11	YESSICA	GONZALEZ	(426) 304-8917	72	1
12	GABY	CONTRERAS	(041) 275-5088	3	3
13	MARIA	CARRILLO	(416) 446-3276	115	2
14	JOSE 	ZERPA	(424) 778-9766	85	5
15	CAPITAN ORLANDO 	BARRETO	(426) 570-8010	87	2
16	NARIA	PEREZ	(274) 251-8457	83	3
17	MARIA	PEñA	(412) 074-4086	5	9
18	JESSICA 	BRAVO 	(412) 078-3193	65	9
19	CARLOS	SANCHEZ	(041) 379-2258	9	9
20	LUIS	LARES	(424) 456-7845	7	9
21	CARMEN	SOSA	(424) 758-5869	10	9
22	CARMEN	SOSA	(424) 758-5869	10	9
23	CARMEN	SOSA	(424) 758-5869	10	9
24	LUIS	MORENO	(416) 458-7585	12	9
25	LUIS	CATRO	(242) 585-8555	9	9
26	CARLOS	PEREZ	(416) 156-3636	21	9
27	PEDRO	JIMENEZ	(412) 587-4512	34	9
28	NULO	NULO	(424) 752-5858	121	9
32	LAURA	MENDEZ	(424) 753-5689	1	9
33	ROSA	MENDEZ	(424) 589-5478	2	9
34	ROSA	MENDEZ	(424) 589-5478	2	9
35	ROSA	MENDEZ	(424) 589-5478	2	9
36	ROSA	MENDEZ	(424) 589-5478	2	9
37	MARIO	DIAZ	(424) 785-4578	1	9
38	MARIO	DIAZ	(424) 785-4578	1	9
39	BERNANRDO	ARAQUE	(421) 589-8956	1	9
40	BERNANRDO	ARAQUE	(421) 589-8956	1	9
41	SAMUEL	SALAS	(412) 258-4512	1	9
42	SAMUEL	SALAS	(412) 258-4512	1	9
43	SAMUEL	SALAS	(412) 258-4512	1	9
44	CELIA	ZAMBRANO	(412) 588-8989	1	9
45	CELIA	ZAMBRANO	(412) 588-8989	1	9
46	LORENA	ARRIETA	(421) 584-5875	1	9
47	MARIA	SOSA	(416) 854-8525	1	9
48	GABRIEL	VIVAS	(424) 785-4121	1	9
49	LAURA	MENDEZ	(421) 457-8555	1	9
50	NANCY	MORA	(424) 457-1245	1	9
51	CARMEN	GOMEZ	(421) 252-6355	6	9
53	CAREMN	SOSA	(421) 258-2585	1	9
54	LUIS	MENDOZA	(421) 258-2585	1	9
55	MARIA	QUINTERO	(412) 258-4512	1	9
56	XIOMARA	DIAZ	(416) 258-6598	1	9
57	DARIO	DIAZ	(412) 458-4512	1	9
58	JORGE	RIOS	(416) 598-0215	1	9
59	CARMEN	PEREZ	(416) 052-5663	1	9
60	LAURA	SASA	(416) 259-8798	1	9
61	MARIA	MORENO	(416) 789-5545	1	9
62			(416) 253-6452	0	9
64			(416) 859-5689	0	0
31	CARLOS	PAEZ	(424) 753-7845	4	9
65	CARMEN	SOSA	(412) 159-5656	0	9
66	PEDRO	CANALES	(424) 785-4512	7	9
67			(416) 457-8455	0	0
68	DARIO	MEZA	(142) 583-6945	0	9
69	CARMEN	ZERPA	(424) 785-4125	28	0
70	JOSE	MORA	(412) 458-4582	1	0
71	DARIO	ZERPA	(421) 525-4554	7	9
72	CARLOS	ORTIZ	(412) 258-6965	1	0
73	GILBERT	GONZALEZ	(412) 258-4758	12	7
74	SARA	MADERA	(412) 258-4512	1	3
75	SARA	MADERA	(412) 258-3669	53	3
76	PEDRO	CAMEJO	(412) 745-1545	55	1
77			(424) 125-1472	0	0
78	LUIS	VACA	(424) 585-5666	31	4
79	MARCOS	PEREZ	(412) 258-6952	68	9
81			(274) 221-5452	0	0
82	CARLOS	PARRA	(416) 258-4212	63	3
80	LAURA	RODRIGUEZ	(424) 758-4141	50	2
85			(416) 587-4512	0	0
86	JOSE	MENDEZ	(424) 158-7441	65	9
83	CARLOS	PEREZ	(424) 752-4512	1	5
89	RAMON	LOBO	(416) 255-6232	68	6
84	CARMEN	SALAS	(412) 456-2578	76	1
87	ROSA	DIAZ	(416) 253-2322	50	8
88	LAURA	RIVAS	(412) 452-1210	57	3
90			(412) 256-3222	0	0
91	DIANA	CADENAS	(424) 857-5656	57	9
92			(424) 756-8965	0	0
93			(416) 552-4554	0	0
94	CARLOS	PARRA	(416) 582-5633	121	9
95			(412) 025-6363	0	0
96	MARIA	SOSA	(412) 253-2322	35	9
97	CARMEN	MARIA	(426) 541-5210	53	9
98			(416) 252-5252	0	0
99			(416) 589-6263	0	0
100	CARMEN	FLORES	(416) 256-3620	57	3
101			(416) 582-2022	0	0
102	MARIA	RANGEL	(424) 521-4544	12	9
103	LUIS	SALAS	(424) 512-1200	10	0
104			(242) 452-8520	0	0
105	CARLOS	MEJIAS	(424) 512-1210	46	9
106	MARIA	SANCHEZ	(416) 251-2121	0	9
108			(416) 231-5899	0	0
107	XIOMARA	DIAZ	(424) 753-8965	122	1
109			(424) 512-0101	0	0
111	JOSE 	MORA	(412) 525-3200	0	9
112	MARIAELA	CORRADO	(412) 525-2222	46	9
113	LUIS	MORENO	(416) 452-1210	0	9
114			(424) 589-6523	0	0
110	CARLOS	PEREZ	(424) 125-1411	81	9
115			(424) 458-1251	0	0
116	CARLOS	MESA	(416) 525-4588	121	2
117	MARIA	FLORES	(416) 256-2536	65	9
118	ZULEIMA	MARQUINA	(424) 785-1245	48	3
119	DANIELA	ALVAREZ	(412) 525-0000	0	0
120			(412) 452-1212	0	0
122	CARLOS	MESA	(412) 452-5252	57	3
121	JOSE	FLORES	(424) 154-8522	57	3
155	CARLOS	MORALES	(424) 582-5454	1	3
156	EDUARDO	SALAS	(412) 525-5255	7	9
157			(416) 256-2310	0	0
158	SAMUEL	SULBARAN	(416) 256-8565	0	9
160	MANUEL	ROJAS	(416) 541-4542	177	6
159	SEBASTIAN	MORENO	(416) 256-8989	170	3
161			(412) 156-2358	0	0
163	ANDRES	RIVAS	(424) 785-4578	0	9
162	CARMEN	MORENO	(416) 587-4578	122	9
164			(412) 235-6898	0	0
165	CARMEN	GUTIERREZ	(416) 589-4525	0	9
166	MARIANO	SALAS	(416) 258-6987	68	6
167			(424) 158-7845	0	0
168	CARMEN	MENDOZA	(416) 258-6589	0	0
169	DANIEL	VIVAS	(426) 758-7576	65	3
170			(416) 258-4578	0	0
171	SARA	MENDOZA	(414) 785-4512	132	6
172			(426) 563-5689	0	0
173	ANDRES	PEREZ	(426) 785-4598	170	7
174	LAURA	CARVAJAL	(424) 785-4578	44	9
175			(416) 258-3644	0	0
176			(426) 589-5622	0	0
177			(426) 589-5622	0	0
178			(426) 589-5622	0	0
179	JOSE	PAREDES	(414) 758-4110	0	9
180			(426) 525-2656	0	0
181			(414) 785-4578	0	0
182	BLANCA 	CORONADO	(416) 458-7898	0	9
183	CARMEN	MONCADA	(424) 587-4542	189	3
184			(416) 256-8956	123	0
185			(412) 258-6956	0	0
186	LUIS	MENDEZ	(424) 587-4512	170	9
187			(416) 568-9532	0	0
188	MARIA	ZAMBRANO	(414) 258-5623	0	0
189			(416) 256-8956	0	0
190			(416) 589-4512	0	0
191	CARMEN	ROJAS	(414) 478-4512	76	1
192	GILBERT	GONZALEZ	(424) 753-7979	208	9
193			(146) 258-3696	0	0
194	JUAN	RIVAS	(426) 589-6568	65	7
195	LUISSOSA		(146) 258-3698	123	0
196	LUES	MARCANO	(424) 785-2536	51	4
197	JUAN	HERNANDEZ	(416) 145-2585	68	8
198	ADRIANA	MORENO	(416) 589-2563	197	7
199	CARLOS	MENDEZ	(416) 145-8952	123	4
200	LAURA	DIAZ	(416) 589-5623	2	6
201	JUAN	MORA	(416) 589-4512	5	8
202	LUIS	SALAZAR	(425) 258-6969	123	4
203	MANUEL	ALBORNOZ	(416) 258-6523	65	0
204	MARIA	CACERES	(424) 785-4578	3	6
210			(042) 655-8855	0	0
211			(026) 559-8987	0	0
212			(042) 632-5545	0	0
209	JESUS	RIVAS	(042) 666-6546	128	5
205	JOSE JOSE	GONZALEZ 	(042) 625-5815	0	5
207	ANDRES JOSE	GONZALEZ	(042) 555-6656	15	5
213	ANDREA	RIVAS	(042) 424-2424	230	3
206	ANDRES JOSE	GONZALEZ	(042) 555-6656	15	5
208	LEONARDO	RIVAS	(042) 652-2354	68	3
214	ANDRES	MARQUEZ	(416) 258-9865	3	3
215	LUIS	SOSA	(416) 589-8564	132	5
216	CARLOS	ARAQUE	(416) 256-8956	139	3
217	JUAN	PEREZ	(412) 256-2565	0	9
218	JUAN	ZAMBRABNO	(424) 157-5869	0	9
219			(412) 076-8508	0	0
221	CARMEN	SOLORZANO	(416) 256-8956	3	5
222	MARIA	ZERPA	(412) 526-5233	0	9
223	ANTONIO 	SANCHEZ 	(412) 075-6385	197	7
224	ROSA	MORENO	(426) 452-1200	0	9
225	MARIA	ZERPA	(426) 452-2200	0	9
226			(416) 458-7812	0	0
220	ALEXANDER	PEñA	(412) 076-8508	68	1
227	ANTONIO 	SANCHEZ	(424) 757-8505	3	0
228			(041) 279-2452	0	7
229	MARIA	VARGAS	(412) 564-3254	0	0
230	KEILY	ALVARADO ARAQUE	(041) 279-2452	59	7
232	KEILY	ALVARADO ARAQUE	(041) 279-2452	0	0
231	KEILY	ALVARADO ARAQUE	(041) 279-2452	81	1
234	DANIEL	LOBO	(412) 568-5494	231	2
235			(426) 896-5233	0	0
237	BANCO BANESCO		(274) 225-2215	122	5
233	JOSE	ALTUVE	(424) 587-9655	4	5
236	KEILY	ALVARADO ARAQUE	(041) 279-2452	65	3
238	KEILY	ALVARADO ARAQUE	(041) 279-2452	0	9
239			(414) 563-2789	0	0
240	MARIA 	PEREZ	(412) 792-4528	44	9
241	JUAN 	GOMEZ	(414) 563-2784	177	2
242			(416) 254-1223	0	0
249	EMILIA 	GARRIDO	(424) 737-6255	114	7
244	MARIA	SOSA	(426) 589-5623	35	8
243	CARLOS	MENDEZ	(424) 785-1245	35	8
245	EMILIA	GUILLEN	(426) 254-9898	3	4
246			(424) 722-4832	0	0
247			(424) 737-6255	0	0
248	JOSE	MARQUEZ	(424) 722-2483	63	1
250	JOSE  	COLMENARES	(424) 722-4832	0	0
251	HECTOR 	LAVON	(424) 255-8366	9	5
252			(412) 654-5586	0	0
253			(042) 473-7625	0	0
254	SANDRA JIMENEZ		(426) 778-5494	0	8
257	MARIO	VAZQUES 	(422) 747-8635	68	8
259			(426) 885-1374	0	0
255	SUSANA  	PEREZ	(426) 487-6523	87	3
261	CARLA 	MONTOYA 	(416) 857-3214	0	0
258	ADRIAN	BAUTISTA 	(426) 558-9317	2	6
256	MARIA	PEREZ	(412) 792-4526	68	2
260	CARLOS 	COLMENARES	(426) 795-8335	5	8
262			(274) 256-3636	0	0
263	JUAN	GOMEZ	(424) 263-2323	0	9
\.


--
-- Data for Name: solicitud_atencion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.solicitud_atencion (id, detalles_solicitud, procedimiento_solicitud, num_fallecidos, num_lesionados, num_heridos, funcionario, amigo171, motos, vehiculos, solicitudes_id, direccion_solicitud, despachador_solicitud, operador_solicitud, num_motos, num_vehiculos) FROM stdin;
4	PERSONA ARMADA	POLO	-1	-1	-1	f	f	f	t	4	EJIDOSERCA DE EL LICEO ARIAS	13499752	8042991	1	0
3	INFOEMA DE INCENDIO DE VEGETACION	POLO	1	1	1	t	t	t	t	3	LOS CUROS	13499752	13499752	1	1
2	SE ESTA PROCESO UNA FIESTA CON BEBIDAS ALCOHOLICAS, Y CON MENORES DE EDAD 	AL SITIO SE PRECENTO LOS FUNCIONARIOS DE GUARTDA CABO 2 FRANCISCO PERES Y JOSE ARIA EN LA UNIDAD ALFA 3 DE LOS BOMBEROS	1	2	1	t	f	t	t	2	PARROQUIA OSUNA RORODRIGUEZ, PARTE ALTA BLOQUE 39 APARTAMENTO 00-01 	8042991	17842117	1	1
1	DETALLES DE LA SOLICITUD	SARGENTO PEñA EN LA UNIDAD MOROTIZA 0.90	0	1	2	t	f	t	t	1	DIRECCIóN EXACTA	17842117	16200660	1	4
5	INCENDIO DE ESTRUCTURA TIPO VIVIENDA CON PERSONAS ATRAPADAS.	 	0	0	0	f	t	f	f	5	BELEN, AV 8 ENTRE CALLE 7 Y 8	16664398	16664398	0	0
7	VIVIENDA DE DOS PLANTAS	 	0	0	0	t	t	f	f	7	LOS CUROS	13499752	27777826	0	0
6	SEGUN INDICA LA CIUDADANA QUE SE ESTA PRESENTANDO UN ROBO A PERSONAS DE LA FARMACIA.	AL SITIO SE DIRIJIO EL OFICIAL SANCHEZ JOSE, QUIEN INDICA QUE EL CIUDADANO ALVARO SOSO FUE ESPOSADO POR QUERER ROBAR LA FARMACIA 	0	1	0	f	f	f	f	6	AV LAS AMERICAS, FRENTE A FARMACIA LAS AMERICAS.	20435049	20435049	0	0
8	EL SOLICITANTE INFORMA QUE HA SIDO VíCTIMA DE HURTO HACIA SU COMERCIO 	SE REALIZA EL DESPACHO DE LA UNIDAD SAR 26 AL MANDIO DE LA OFICIAL OPC II JUAN SANCHEZ EL CUAL VERIFICAN LA SITUACION Y ES POSITIVA SE RESGUARDA LA ZONA.	0	1	0	f	f	t	f	8	MéRIDA CENTRO AVENIDA 2 CON CALLES 13 Y 14	18123089	23302896	1	0
9	CASA DE COLOR VERDE FRENTE AL PRESCOLAR	PARA EL MOMENTO LOS FUNCIONARIOS SE ENCUENTRAN EN EL SITO Y INFORMAN QUE HAY VARIAS PERSONAS DENTRO DE LA VIVIENDA	0	0	0	f	t	f	t	9	URBANIZACION LOS CUROS CALLE PRINCIPAL CASA 09 VERDA 07	23302896	18123089	0	1
10	SOLICITANTE INFORMA DE PERSONA ARROLLADA, TENDIDA SOBRE EL PAVIMENTO	 SE  REALIZO   UNA TOMA DE TENCION   DE 120/70MHG Y  SE LE RALIZO   ESTABILIZACION EN LA  EXTREMIDAD INFERIR DERECHA  	0	1	0	f	f	t	t	10	MERIDA, AV LOS PROCERES, CANAL DE DESCENSO	18310118	17129573	2	1
11	 RESCATE DE ANIMAL	SE DIRIGE AL LUGAR LINCE 74 AL MANDO DEL SGTO MAYOR NAVA, QUIEN AL LLEGAR AL SITIO PROCEDE AL RESCATE DEL CANINO	0	0	0	t	t	t	f	11	 AVENIDA LOS PRÓCERES   CASA NUMERO 2-76  CASA DE COLOR BLANCO 	17129573	18310118	1	0
12	UNOS SUJETOS ROBARON A UN CIUDADANO AL CUAL LO GOLPEARON Y ESTA HERIDO.	AL SITIO EL OFICIAL SOSA NIñO EN LA UNIDAD M487 QUIEN AL LLEGAR  AL SITIO EL CIUDADANO SE ENCONTRABA TENDIDO EN LA VIA SIENDO ATENDIDO POR FUNCIONARIOS BOMBERILES EN LA UNIDAD B072 AL MANDO DEL TENIENTE JOSE PEREZ  QUIEN INDICO QUE LE SEñOR SOLO PRESENTABA HERIDA LACERANTE A NIVEL FRONTAL, 	0	0	1	f	f	t	f	12	CENTENARIO EN EL CENTRO COMERCIAL FRENTE A GARIBALDI.	12356337	17842117	1	0
13	SOLICITANTE INDICA QUE REQUIERE UN TRASLADO DESDE  SU RESIDENCIA EN EL PUENTE LA PEDREGOSA LOMA LOS MAITINES PARTE BAJA CASA 87-98 HASTA EL HOSPITAL UNIVERSITARIO DE LOS ANDES PUNTO DE REFERENCIA CERCA A LA PANADERIA 	FUNCIONARIOS TUBIERON EN EL SITIO S/J ARIAS FRAN COMISION QUE ESTUBO EN EL SITIO HORUGA N1	1	1	2	f	f	f	t	13	AV LOS PROCERES PUENTE LA PEDREGOSA 	8042991	12356337	0	1
14	MASCULINO DE LA TERCERA EDAD CON UN POSIBLE ACV EN PROCESO 	AL SITIO LA UNIDAD DONDE SE VERIFICO QUE SE TRATABA DE UN CIUDADANO EN SITUACION DE CALLE DANDO LAS RECOMENDACIONES A LOS FUNCIONARIOA RETORNADO SIN NOVEDAD 	0	0	0	t	f	f	f	14	AV. LOS PROCERES A LA ALTURA DEL CAUCHO 	22657819	22657819	0	0
15	MACULINO CALLO DENTRO DE UNA PISCINA VACIA CON POSIBLE FRACTURA DE EXTREMIDADES INFERIORES 	 	0	0	0	t	f	f	f	15	AV2 LORAS METROS ABAJO DE LA PLAZA CHARLY CHAPLY CASA DE REJAS COLOR BLANCO PUNTO DE REFERENCIA METROS ANTES DE LA PIZZERIA SABOR DE LOS QUESOS 	22657819	22657819	0	0
16	HECHO VIAL CON MULTIPLE LECIONADOS 	SE DESPACHO LA UNIDAD ROJO 1 AL LLEGAR SITIO INDICARON QUE ES POSITIVO  . 	0	0	1	t	t	f	t	16	SANTA JUANA CALLE 3 , FRENTE A LA PANADERIA	15621210	15621210	0	1
17	MOTO MAL ESTACIONADA.	RECUPERADA	0	0	0	f	t	t	t	17	MéRIDA, AV. ANDRéS BELLO.	11913073	11913073	1	0
19	CIUDANA MAYOR SE CAE SE SU MISMA ALTURA	 	0	0	0	t	t	f	f	19	MUNICIPIO LIBRERTADOR MERIDA	11954012	11954012	0	0
18	LA SOLICITANTE INFORMA DE UN áRBOL DE GRAN TAMAñO EL CUAL SE ENCUENTRA OBSTRUYENDO EL PASO VEHICULAR, REQUIEREN PRESENCIA DE PROTECCIóN CIVIL EN EL SITIO 	SALE LA UNIDAD SAR 26 AL SITIO  AL LLEGAR  ES POSITIVO 	0	1	0	f	f	f	t	18	MERIDA, SECTOR PIE DEL LLANO, FRENTE AL COLEGIO LA SALLE 	11954012	21183518	0	1
20	DETALLES DEL EVENTO	PROCEDIMIENTO DE LA COMISION	0	0	0	f	f	f	t	20	DIRECCION DEL EVENTO	18310118	18308368	0	1
21	CAMINANDO ANDO	 	0	0	0	f	f	f	f	21	SANTA BARBARA	26931489	29520477	0	0
22	ESTAFA A TURISTAS	PRESENCIA DE COMISION POLICIAL EN EL SITIO, EN APOYO A LAS PERSONAS AFECTADAS	0	0	0	f	f	t	f	22	SANTA BARBARA	18123089	29520477	1	0
23	NO SE TIENE MAYOR INFORMACION	 	0	0	0	f	f	f	f	23	NO DIO MAYOR INFORMACION	20200220	20200220	0	0
24	NULO	 	0	0	0	f	f	f	f	24	NULO NO HAY MAYOR INFORMACION	20200220	20200220	0	0
26	SOLICITUD DE INFORMACIóN, ESTADO DEL CLIMA	 	0	0	0	f	f	f	f	26		20200220	20200220	0	0
27	SOLICITUD DE INFORMACION	 	0	0	0	f	f	f	f	27		20200220	20200220	0	0
28	LLAMADA DE INFORMACION	 	0	0	0	f	f	f	f	28		20200220	20200220	0	0
29		 	0	0	0	t	t	f	f	29		20200220	20200220	0	0
30		 	0	0	0	f	f	f	f	30		20200220	20200220	0	0
31		 	0	0	0	f	f	f	f	34		20200220	20200220	0	0
32	SOLICITUD DE INFORMACION	 	0	0	0	f	f	f	f	35		20200220	20200220	0	0
33		 	0	0	0	t	t	f	f	36		20200220	20200220	0	0
34		 	0	0	0	f	f	f	f	37		20200220	20200220	0	0
25	POSTEL ELECTRICO	LOS FUNCIONARIOS HICIERON PRESENCIA EN EL SITIO DEL EVENTO,EL HERIDO SOLO PRESENTA CONTUSIONES LEVES	0	0	1	f	f	t	t	25	ZONA LAS AMERICAS	11913073	20200220	2	1
35	LLAMADA DE SOLICITUDDE INFORMACION	 	0	0	0	f	f	f	f	38		20200220	11913073	0	0
36	PERSONAS SOSPECHOSAS, AGRESIVAS	 	0	0	0	f	f	f	f	39	AV. LAS FRANCIAS, CALLE LOS CAOBOS, 	20200220	11913073	0	0
37		 	0	0	0	f	f	f	f	40		20200220	11913073	0	0
38	SOLICITUD DE INFORMACIóN, TEMPERATURA ACTUAL	 	0	0	0	f	f	f	f	41		20200220	20200220	0	0
39	PESTE A MARIHUANA	 	0	0	0	f	f	f	f	42	CALLE EL CAJIGAL	26931489	26931489	0	0
40	ESTACIONAMIENTO	 	0	0	0	f	f	f	f	43	CALLE CUJI	26931489	26931489	0	0
41	DETALLES	 	0	0	0	f	f	f	f	44	DIRECCION	26931489	26931489	0	0
42	DETALLES DEL EVENTO	 	0	0	0	f	f	f	f	45	DIRECCION EVENTO	23302896	23302896	0	0
43	QUEDA PENDIENTE VERIFICAR EL FORMULARIO EN NAVEGADOR FIREFOX Y MOSTRAR EL NUMERO DE CUADRANTE EN EL FORMULARIO DEL CIERRE DE SOLICITUD	 	0	0	0	f	f	f	f	46	SE LOGRA MOSTRAR EL NUMERO DE TELEFONO DEL CUADRANTE AL MOMENTO DE SELECCIONAR EL SECTOR.	23302896	23302896	0	0
44	DETALLES DEL MOTIVO DE AL LLAMADA	 	0	0	0	f	f	f	f	47	DIRECCION CON AVENIDA, CALLE, PUNTO REFERENCIA, OTROS DETALLES DE UBICACION	23302896	23302896	0	0
45	DETALLES DEL EVENTO	 	0	0	0	f	f	f	f	48	DIRECCION DE LA EVENTUALIDAD	23302896	23302896	0	0
46	DETALLES DE LA EVENTUALIDAD	SE REALIZARON CAMBIOS  EN LA PLANTILLA, ADJUNTANDO Y MOSTRANDON EL NUMERO DEL CUADRANTE Y EL ORGANISMO. QUEDA PENDIENTE BUSCAR UN METODO MAS AMIGABLE	0	0	1	f	f	t	t	49	DIRECCION DE LA EVENTUALIDAD	23302896	23302896	2	2
47	DETALLAR QUE ESTA SUCEDIENDO O EN QUE ESTATUS SE ENCUENTRAN LOS INVOLUCRADOS	PROCEDE CON EL CIERRE DE SOLICITUD	0	0	0	f	f	f	t	50	DIRECCIóN DETALLADA DEL EVENTO O LUGAR DE LOS HECHOS	20200220	20200220	0	1
49		 	0	0	0	f	f	f	f	52		20200220	20200220	0	0
50	AVISPAS FURIOSAS	SIN UNIDADES DISPONIBLES	0	0	0	f	t	t	t	53	UBICACIóN DEL TATUCO DE AVISPA	20200220	20200220	0	0
48	DETALLES DEL EVENTO	AL LLEGAR AL LUGAR, YA NO SE ENCONTRABA EL VEHICULO	0	0	0	f	f	f	t	51	DIRECCION EXACTA	20200220	20200220	0	1
53		 	0	0	0	t	t	f	f	56		23302896	23302896	0	0
54	LA PRESONA SOLICITUD PASO VEHICULAR POR LOS TUNELES	 	0	0	0	f	f	f	f	57		23302896	23302896	0	0
51	DETALLES DE LA LLAMADA RECIBIDA	PROCEDIMIENTO EFECTUADO POR LOS FUNCIONARIOS EN EL LUGAR	0	0	0	f	f	t	f	54	AVENIDA, CALLE, SECTOR	23302896	23302896	1	0
57	DETALLES DE LA SOLICITUD	 	0	0	0	f	f	f	f	60	AVENIDA, CALLE, CASA	23302896	23302896	0	0
52	DETALLES DE LLAMADA DEL SOLICITANTE	LOS FUNCIONARIOS PROCEDIERON A RESCATAR UN PEQUEñO FELINO MASCULINO QUE SE ENCONTRABA ATRAPADO EN UNA CERCA.	0	0	0	f	f	t	f	55	AVENIDA, CALLE, VEREDA SECTOR	23302896	23302896	1	0
55	DETALLES DE LA LLAMADA	LA UNIDAD SE ENCONTRABA FUERA DE SERVICIO	0	0	0	f	f	f	f	58	AVENIDA, CALLE, VEREDA, EDIFICIO, CASA, LOCAL	23302896	23302896	0	0
56	DETALLES DE LA LLAMADA DE SOLICITUD	SIN UNIDADES DISPONIBLES	0	0	0	f	t	f	f	59	AVENIDA, CALLE, VEREDA, EDIFICIO, CASA, LOCAL	23302896	23302896	0	0
58		 	0	0	0	f	f	f	f	61		23302896	23302896	0	0
59	DETALLES DE LA LLAMADA, PROPARACION DEL FUEGO..	PROCEDIMIENTO REALIZADO POR LA UNIDAD EN LA CALLE	0	0	0	f	f	t	t	62	DIRECCIńO DEL EVENTO, AVENIDA, CLLE, VEREDA, EDIFICIO, CASA, LOCAL	23302896	23302896	2	1
60		 	0	0	0	t	t	f	f	63		23302896	23302896	0	0
61		 	0	0	0	t	t	f	f	64		23302896	23302896	0	0
62	SOLICITUD DE USO DE CANAL TROLEBUS CON SENTIDO EJIDO MERIDA, CON DIRECCIóN AL HOSPITAL UNIVERSITARIO	 	0	0	0	f	f	f	f	65	EJIDO, MERIDA	23302896	23302896	0	0
63		 	0	0	0	t	t	f	f	66		23302896	23302896	0	0
64	ALTA VELOCIDAD, A PIE	 	0	0	0	f	f	f	f	67	AVENIDA ANDRES BELLO	23302896	23302896	0	0
65	BOTE DE AGUS	 	0	0	0	f	f	f	f	68	CALLE LOS PALITOS	23302896	23302896	0	0
66		 	0	0	0	f	f	f	f	69		23302896	23302896	0	0
67		 	0	0	0	t	t	f	f	70		23302896	23302896	0	0
68	DETALLES	 	0	0	0	f	f	f	f	71	DIRECCION	23302896	23302896	0	0
69		 	0	0	0	t	t	f	f	72		23302896	23302896	0	0
70	DETALLES SOLICITANDO LA HORA	 	0	0	0	f	f	f	f	73	DIRECCION	23302896	23302896	0	0
71	DETALLES	 	0	0	0	f	f	f	f	74	DIRECCION	23302896	23302896	0	0
72		 	0	0	0	t	t	f	f	75		23302896	23302896	0	0
73	DETALLES	 	0	0	0	f	f	f	f	76	DIRECCION	23302896	23302896	0	0
74	SOLICITUD DE INFORMACIóN DEL ESTADO CLIMATICO	 	0	0	0	f	f	f	f	77		23302896	23302896	0	0
76		 	0	0	0	t	t	f	f	79		23302896	23302896	0	0
75	DETALLES	PROCEDIMEINTO DE LOS FUNCIONARIOS	0	0	0	f	f	f	f	78	DIRECCION	23302896	23302896	0	0
77		 	0	0	0	t	t	f	f	80		23302896	23302896	0	0
79	INFORMACION	 	0	0	0	f	f	f	f	82		23302896	23302896	0	0
80	INFORMACION	 	0	0	0	f	f	f	f	83		23302896	23302896	0	0
81		 	0	0	0	f	f	f	f	84		23302896	23302896	0	0
82		 	0	0	0	t	t	f	f	85		23302896	23302896	0	0
78	DETALLES	COMISION EN EL SITIO PODA Y DESPEJE DE LA VIA	0	0	0	f	f	t	t	81	DIRECCION	23302896	23302896	1	2
83		 	0	0	0	t	t	f	f	86		23302896	23302896	0	0
84	TRASLADO EN AMBULACIA	 	0	0	0	f	f	f	f	87	DESDE AVENIDA CENTENARIO HASTA AVENIDA 16 DE SEPTIEMBRE	23302896	23302896	0	0
85	SOLICITA INFORMACION DEL ESTADO DE LAS VIAS A NIVEL DE LOS TUNELES EN LA VARIANTE CHIGUARA	 	0	0	0	f	f	f	f	88		23302896	23302896	0	0
86	SE ENCUENTRAN URGANDO LOS DEPOSITOS DE BASURA	 	0	0	0	f	f	f	f	89	AVENIDA 8 CERCA DE LA PLAZA LAS HEROINAS	23302896	23302896	0	0
87	LA PERSONA LLAMA PARA SOLICITAR INFORMACIóN DEL ESTADO DEL CLIMA	 	0	0	0	f	f	f	f	90		23302896	23302896	0	0
88		 	0	0	0	f	f	f	f	91		26931489	26931489	0	0
90	DETALLES	 	0	0	0	f	f	f	f	93	DIRECCION	23302896	23302896	0	0
89	DETALLES DEL EVENTO	PROCEDIMEINTOS DE FUNCIONARIOS EN EL SITIO	0	0	0	f	f	t	t	92	DIRECCIóN DEL EVENTO	18123089	23302896	2	1
123	DETALLES	PROCEDIMIENTOS POR FUNCIONARIOS	0	0	0	f	f	t	t	126	DIRECCION	18123089	21183518	1	0
124	DETALLES	PROCEDIMIENTO DEL CIERRE	0	0	0	f	f	t	f	127	DIRECCION	17129573	17129573	2	0
125		 	0	0	0	f	f	f	f	128		17129573	17129573	0	0
126	SOLICITUD DE INFORMACIóN DE LAS VIAS AL PARAMO	 	0	0	0	f	f	f	f	129		17129573	17129573	0	0
128	EL VEHICULO, ESTA OBSTACULIZANDO EL PASO VEHICULAR HACE YA MAS DE 10 MINUTOS	 	0	0	0	f	f	f	f	131	AVENIDA FERNANDEZ PEñA, BAJANDO HACIA LA PLAZA, PASOS ARRIBA ESCUELA CAMPO ELIAS	17129573	17129573	0	0
127	BOTES DE AGUAS NEGRAS HACIA LA VIA	LLEGA COMISION AL SITIO SOLVENTANDO DERRAME DE AGUAS NEGRAS	0	0	0	f	f	f	t	130	VIA EL VALLE, METROS ARRIBA DE SANCOCHO EL MAS SABROSO	17129573	17129573	0	1
129		 	0	0	0	t	t	f	f	132		17340596	17340596	0	0
131	SOLICITA INFORMACION DE PASO VEHICULAR HACIA EL VIGIA	 	0	0	0	f	f	f	f	134		17340596	17340596	0	0
130	ACTIVACION DE ALARMA	COMISION POLICIAL AL SITIO	0	0	0	f	f	t	f	133	CALLE LA UNICA, ENTRE AVENIDAS 3 Y 4	17129573	17340596	1	0
132		 	0	0	0	f	f	f	f	135		20197663	20197663	0	0
133	LAL PERSONA SOLICITA INFORMACIóN SOBRE ABASTACIMIENTO DE COMBUSTIBLE EN LA ESTACIóN DE SERVICIOS BUGANVILLAS	 	0	0	0	f	f	f	f	136		20197663	20197663	0	0
134	COLISIóN VEHICULAR DE CAMION Y VEHICULOS 80 MUERTOS	PROCEDIMIENTO DE SOLICITUD EN EL LUGAR	80	0	0	f	f	t	t	137	AVENIDA LOS PROCERES FRENTE A IMPRADEM	17129573	20197663	2	3
135		 	0	0	0	f	f	f	f	138		17340596	17340596	0	0
136	LA PERSONA LLAMA CON MOTIVO A CONSULTA LA HORA	 	0	0	0	f	f	f	f	139		17340596	17340596	0	0
137	LA PERSONA INDICA QUE HAY DESPLAZAMIENTO DE ESPECIES ARBóREAS EN LA VíA	COMISIóN EN EL SITIO, ELIMINANDO OBSTáCULOS EN LA VIA	0	0	0	f	f	t	t	140	VIA EL VALLE DE LA CULATA	17129573	17340596	2	1
138		 	0	0	0	f	f	f	f	141		17340596	17340596	0	0
139		 	0	0	0	f	f	f	f	142		17340596	17340596	0	0
140		 	0	0	0	t	t	f	f	143		17340596	17340596	0	0
141	SE REALIZA LLAMADO A AGUAS DE MéRIDA PARA LA ATENCIóN DEL MOTIVO DE LLAMADA Y DERRAME DE AGUA HACIA LA VíA, GENERANDO POSIBLE PELIGRO EMINENTE DE DESLIZAMIENTO DE VEHICULOS EN MARCHA.	 	0	0	0	f	f	f	f	144	AVENIDA LOS PROCERES, METROS ABAJO DEL SEMAFORO DE LA CASA BLANCA	17340596	17340596	0	0
142	EL CIUDADANO LLAMO PREGUNTANDO, SI SE HABIE REESTABLECIDO EL PASO VEHICULAR A NIVEL DE LA AVENIDA LOS PROCERES	 	0	0	0	f	f	f	f	145	AVENIDA LOS PROCERES,	17340596	17340596	0	0
143		 	0	0	0	f	f	f	f	146		17340596	17340596	0	0
144	LA PERSONA LLAMO PREGUNTANDO SI LAS ESTACIONES DE SERVICIO SE ENCUENTRAN SURTIENDO COMBUSTIBLE A VEHICULOS	 	0	0	0	f	f	f	f	147	AVENIDA LOS PROCERES	17340596	17340596	0	0
145		 	0	0	0	f	f	f	f	148		17340596	17340596	0	0
146		 	0	0	0	f	f	f	f	149		17340596	17340596	0	0
147	LA PERSONA DESEA SABER SI HAY AGUA	 	0	0	0	f	f	f	f	150		17340596	17340596	0	0
148	DETALLES DE SOLICITUD	 	0	0	0	t	f	f	f	151	AVENIDA 2 CON CALLE 3	17340596	17340596	0	0
149		 	0	0	0	t	t	f	f	152		17340596	17340596	0	0
150		 	0	0	0	f	f	f	f	153		17340596	17340596	0	0
151	DERRAME DE AGUAS NEGRAS POR MEDIO DE ALCANTARILLA	 	0	0	0	f	f	f	f	154	AVENIDA LOS PROCERES	17340596	17340596	0	0
152		 	0	0	0	f	f	f	f	155		17340596	17340596	0	0
153	LA PERSONA QUE LLAMA SOLICITO LA HORA	 	0	0	0	f	f	f	f	156		17340596	17340596	0	0
154		 	0	0	0	f	f	f	f	157		17129573	17129573	0	0
155		 	0	0	0	f	f	f	f	158		17129573	17129573	0	0
156	DETALLES DEL EVENTO	PROCEDIMIENTO EFECTUADO POR FUNCIONARIOS EN EL SITIO	0	0	0	f	f	t	t	159	DIRECCION DEL EVENTO	17129573	17129573	2	1
157	ENDIDURA DEL SUELO ASFALTADO Y HUECOS 	RECOLECCION DE DATOS EN SITIO Y RECOPILACIóN FOTOGRáFICA	0	0	0	t	t	t	f	160	CALLE EL PORVENIR	20200220	20200220	1	0
158		 	0	0	0	t	t	f	f	161		17340596	17340596	0	0
159	DETALLES	PROCEDIMIENO	0	0	0	f	t	f	f	162	DIRECCION	17129573	17340596	0	0
160	DETALLES	PROCEDIMEINTO	0	0	0	f	f	f	f	163	DETALLE DIRECCION	17129573	17129573	0	0
161	LANZAMIENTO DE ESCOMBROS	 	0	0	0	t	t	f	f	164	DIRECCION EXACTA	17340596	17340596	0	0
162	DETALLES	PROCEDIMIENTO EN SITIO DE EMERGENCIA	0	0	0	f	f	t	f	165	DIRECCION EXACTA	20200220	20200220	1	0
163	DETALLES	PROCEDIMIENTO DE LA SOLICITUD	0	0	0	f	t	f	f	166	CALLE EL HAMBRE	12356337	20200220	0	0
164	DETALLES DEL EVENTO	PROCEDIMIENTOS APLICADO POR LOS FUNCIONARIOS EN SITIO	0	0	0	f	f	f	t	167	DIERECCIóN EXACTA DEL EVENTO	8042991	17129573	0	2
165	DETALLES DEL EVENTO	PROCEDIMIENTO APLICADO POR LOS FUNCIONARIOS EN SITIO.	0	1	0	f	f	t	f	168	DIRECCIńO EXACTA	8042991	17129573	2	0
166	DETALLES DEL ROBO	PROCEDIMIENTO REALIZADO POR LOS FUNCIONARIOS EN EL SITIO	0	1	0	f	f	t	f	169	DIRECCION DONDE OCURRIO EL EVENTO	8042991	17129573	2	0
167	DETALLES	PROCEDIMIENTO APLICADO POR FUNCIONARIOS	0	0	0	f	f	t	f	170	DIRECCION	8042991	17129573	2	0
168	LA PERSONA PREGUNTA POR ESTADO DE VIA HACIA EL PARAMO	 	0	0	0	f	f	f	f	171		20200220	20200220	0	0
169	DETALLES DE SOLICITUD	LLEGARON FUNCIONARIOS AL SITIO Y APLICARON EL PROCEDIMIENTO RESPECTIVO	0	0	1	f	f	t	t	172	DIRECCION EXACTA	8042991	20200220	2	1
175		 	0	0	0	t	t	f	f	178		15040226	15040226	0	0
176		 	0	0	0	t	t	f	f	179		15040226	15040226	0	0
177		 	0	0	0	t	t	f	f	180		15040226	15040226	0	0
174	ROBOSSS	SE PRESENTA COMISION EN SITIO PARA ATENCION DE ROBO A PANADERIA, LOS SUJETOS DE DIERON A LA FUGA, NO SE ENCONTRARON MáS EVIDENCIAS	0	0	0	t	t	t	f	177	CAPITOLIO 	8042991	15040226	2	0
170	GFEWFEWF	NO SE PROCEDE	0	0	0	f	f	f	f	173	MERIDA  LA PEDREGOZA CALLE 22	8042991	15040226	0	0
172	XXXXXX	PROCEDIMEINTO DE FUNCIONARIOS	0	0	0	f	f	t	t	175	CENTRO MERIDA 	8042991	15040226	1	1
178	CAIDA 	SE PRESENTA LA UNIDAD DE EMERGENCIA EN EL SITIO PARA PROCEDER CON LA ATENCION DE LA PERSONA Y REALIZAR EL TRASLADO AL CENTRO SISTENCIAL	0	1	0	f	f	t	t	181	MERIDA  CALLE 22 AV 55	8042991	15040226	1	1
171	XXXXXX	SE PROCEDE A REALIZAR LA ATENCION DE LA AGRESION FISICA	0	1	0	t	f	t	f	174	CENTRO MERIDA 	8042991	15040226	2	0
173	XXXXX	SE PRESENTA EN SITIO COMISION PNB, LLEVANDOSE LOS VEHICULOS AL ESTACIONAMIENTO JUDICIAL	0	2	2	f	t	f	t	176	LAS AMERICAS TERMINAL 	8042991	15040226	0	2
179	XXXX	COMISION EN EL SITIO	0	0	1	f	f	t	t	182	DIRECCION DEL EVENTO	8042991	17129573	2	1
180	DETALLES	PROCEDIMIENTO SOLICITUD	0	0	0	t	t	f	f	183	DIRECCION DEL EVENTO	8042991	17129573	0	0
181	DETALLES	PROCEDIMIENTOS	0	0	0	f	f	f	f	184	DIRECCION	8042991	20200220	0	0
182	NULL NULL NULL	 	0	0	0	f	f	f	f	185	NULL NULL NULL	15620712	15620712	0	0
183	NULL NULL NULL 	NULL NULL NULL 	0	0	0	f	f	f	f	186	NULL NULL NULL	8042991	15620712	0	0
184		 	0	0	0	f	f	f	f	187		26052741	26052741	0	0
186	LA PERSONA SOSPECHOSA BISTE DE BLUE JEAN Y SUETER NEGRO	SE DIRIGIO AL SITIO LA UNIDAD M-03 AL MANDO DE GUILVER GONZALEZ, INDICANDOCO QUE ES EFECTIVO EL PROCEDIMIENTO SOLICITADO 	0	0	0	f	f	t	f	189	PARQUE LAS EROINAS	20847648	26052741	1	0
187		 	0	0	0	f	f	f	f	190		16664398	16664398	0	0
188	EL SOLICITANTE SE COMUNICO PARA INFORMAR QUE EN LA ZONA NO HAY SUMINISTRO ELECTRICO DESDE LAS 14:00 	 	0	0	0	f	f	f	f	191	MERIDA- LA PEDREGOSA 	26052741	26052741	0	0
189	LA PERSONA LAMA SOLICITANDO INFORMACION, SI HAY GASOLINA EN LAS ESTACIONES DE SERVICIO	 	0	0	0	f	f	f	f	192		16664398	16664398	0	0
190		 	0	0	0	f	f	f	f	193		16664398	16664398	0	0
191		 	0	0	0	f	f	f	f	194		16664398	16664398	0	0
220	LA SOLICITANTE LLAMO PARA PEDIR AYUDAR POR UNA SEñORA QUE SE CAYó POR EL ATAQUE DE UN PERRO  	SIN DESPACHO NO FUERON EL ORGANISMO AL LUGAR 	0	0	0	f	f	f	f	223	LA PARROQUIA	31149149	31033723	0	0
226	LA SOLICITANTE LLAMO PARA PEDIR INFORMACIóN SOBRE EL AGUA EN EL SECTOR SANTA BARBARA 	 	0	0	0	f	f	f	f	229		31033723	31033723	0	0
185	EL SOLICITANTE INDICA DE UNA COLISIóN ENTRE DOS VEHICULOS TIPO CARRO, SE REQUIERE COMISIóN EN EL SITIO 	EN EL SITIO SE PRESENTA COMISIONES DE TRANSITO, POLICIA DE MéRIDA, BOMBEROS, SE PROCEDE AL LEVANTMIENTO DEL ACCIDENTE, PRESENTANDOSE DAñOS MATERIALES Y 01 HERIDO	0	0	1	t	f	t	t	188	MERIDA- AV. LOS PRóCERES, URBANIZACIóN SANTA ANA 	20847648	26052741	1	2
192	EL SOLICITANTE INDICA DE UN SUJETO DE APROXIMADAMENTE 22 AñOS DE EDAD DE COLOR DE PIEL OSCURA, VESTIMENTA SHORTH NEGRO Y FRANELA BLANCA EL CUAL SE LE ACERCO DE MANERA AGRESIVA Y PROCEDIó A ARREBATARLE EL TELEFONO MOVIL , EL SUJETO CORRIO POR EL CANAL DE BAJADA 	SE PROCEDE AL CIERRE DE LA SOLICITUD POR FALTA DE UNIDADES DE EMERGENCIAS	0	0	0	f	f	f	f	195	MERIDA- AV. LOS PRóCERES, FRENTE A EL CC PIE DE MONTE  	20847648	26052741	0	0
193		 	0	0	0	f	f	f	f	196		31436014	31436014	0	0
194	SOLICITANTE REQUIERE INFORMACION SOBRE PASO CON DIRECCIóN DE MERIDA HACIA EL VIGíA, ESPECíFICAMENTE EN LA ZONA DE LOS TúNELES, INDICáNDOLE QUE SE ENCUENTRAN CON NORMALIDAD	 	0	0	0	f	f	f	f	197		28205113	28205113	0	0
195	SOLICITANTE SOLICITA INFORMACION DEBIDO A QUE EN EL SECTOR QUE SE ENCUENTRA NI TIENE FLUIDO ELECTRICO 	 	0	0	0	f	f	f	f	198	EJIDO, AGUAS CALIENTES SECTOR SANTA EDUVIGES	31436014	31436014	0	0
197		 	0	0	0	f	f	f	f	200	EJIDO, AGUAS CALIENTES SECTOR SANTA EDUVIGES	31436014	31436014	0	0
196	LA SOLICITANTE INDICA SOBRE UNA ESPECIE ARBOREA LA CUAL ESTA OBSTACULIZANDO LA VIA Y NO PERMITE EL PASO FLUIDO DE LOS VEHíCULOS 	LA UNIDAD LLEGO AL SITIO SIENDO NEGATIVO EL LLAMADO	0	0	0	f	f	t	t	199	EJIDO, AGUAS CALIENTES SECTOR SANTA EDUVIGES	10100438	31436014	1	2
199	SOLICITANTE INFORMA SOBRE FEMENINA DE UNOS 60 AñOS LA MISMA SE ENCONTRABA TRANSITANDO LA ZONA, PARA EL MOMENTO CAYO DE SU PROPIA ALTURA, INDICA TENER MUCHO DOLOR EN LA EXTREMIDAD INFERIOR IZQUIERDA, REQUIERE DE COMISION LO MAS PRONTO POSIBLE	LA UNIDAD LLEGO AL SITIO Y PRESTO LOS PRIMEROS AUXILIOS A LA PERSONA, NO FUE NECESARIO EL TRASLADO AL IAHULA	0	1	0	f	f	t	f	202	MERIDA, SANTA JUANA, AV PRINCIPAL, DIAGONAL A LA IGLESIA	10100438	28205113	1	0
200		 	0	0	0	t	t	f	f	203		28205113	28205113	0	0
202	ACTIVACION DE ALARMA CONTRA ROBO Y HURTO DEL BANCO BANESCO	 	0	0	0	f	f	f	f	205	MERIDA, SECTOR GLORIAS PATRIAS, FRENTE A LA BRIGADA 22, BANCO BANESCO	28205113	28205113	0	0
198	SOLICITANTE INFORMA QUE LE HAN ROBADO EL VEHíCULO TIPO BICICLETA, ACOTA QUE LA MISMA SE ENCONTRABA PARADA EN LA ENTRADA DE SU VIVIENDA, ES DE COLOR AZUL Y RINES VERDES, REQUIERE DE COMISION LO MAS PRONTO POSIBLE 	LA UNIDAD REALIZA RECORRIDO EN LA ZONA LOGRANDO LA UBICACIóN DEL VEHíCULO HURTADO EN DONDE SE VERIFICA QUE SUFRIó ALGUNOS DAñOS	0	0	0	f	f	t	t	201	MERIDA, AV 5, ENTRE CALLES 24 Y 25	10100438	28205113	2	1
201	MOTORIZADO EL CUAL PRESENTA UN VUELCO SOBRE LA VIA Y TIENE UNA POSIBLE FX EN LA EXTREMIDAD INFERIOR DERECHA {TOBILLO}	LLEGA AL SITIO LA UNIDAD DE PROTECCIóN CIVIL PRESTANDO LOS PRIMEROS AUXILIOS AL CONDUCTOR DEL VEHíCULO TIPO MOTO, SIENDO ESTE INMOVILIZADO Y TRASLADADO INMEDIATAMENTE AL IAHULA	0	1	1	f	f	t	t	204	EJIDO, AGUAS CALIENTES SECTOR SANTA EDUVIGES	10100438	31436014	2	1
203	LA SOLICITANTE SE COMUNICA PARA SABER SI EN LA BOMBA DEL VIGIA SE ENCUENTRAN SUMINISTRANDOP COMBUSTIBLE A LOS VEHICULOS PARTICVULARES 	 	0	0	0	f	f	f	f	206	EJIDO, AGUAS CALIENTES SECTOR SANTA EDUVIGES	31436014	31436014	0	0
204		 	0	0	0	f	f	f	f	207		32148040	32148040	0	0
205	LA SOLICITANTE NECESITA INFORMACIóN SOBRE LAS VíAS	 	0	0	0	t	t	f	f	208		32148040	32148040	0	0
206	EL SOLICITANTE INFORMA DE UNA COLISION ENTRE DOS VEHICULOS TIPO MOTO 	SE PRESENTA EN EL SITIO LA COMISION DE LA POLICIA DEL ESTADO EL CUADRANTE DE PAZ NUMERO 16 Y COMISION MOTORIZADA DE PRETECCION CIVIL 	0	2	0	f	f	t	t	209	LOS CUROS ZONA INDUSTRIAL 	31149149	32148040	1	1
207		 	0	0	0	f	f	f	f	210		18966872	18966872	0	0
210	LA SOLICITANTE INFORMA QUE UNA PERSONA LA AGREDIó PARA ROBARLE SU CARTERA 	SE PROCEDE A ENVIAR UNA COMISIóN AL LUGAR DE LOS HECHOS 	0	0	0	f	f	f	t	213	EJIDO, EL PALMO	31149149	32148040	1	0
211		 	0	0	0	f	f	f	f	214		32488556	32488556	0	0
209	VEHICULO MOTO A ALTA VELOCIDAD	LLAMADA REPETIDA	0	0	0	f	f	f	f	212	VUELTA DE LOLA	31149149	18966872	0	0
208	MOTORIZADO A ALTA VELOCIDAD, SIN PRECAUCION ALGUNA	SE PRESENTA UNA COMISIóN DE TRANSITO EN EL SITIO REALIZANDO LLAMADO DE ATENCIóN AL CIUDADANO QUE CONDUCíA UN VEHíCULO TIPO MOTO A ALTA VELOCIDAD EN LA ZONA 	0	0	0	f	f	t	f	211	DIRECCION EXACTA DEL EVENTO, A NIVEL DE LA VUELTA DE LOLA	31149149	18966872	1	0
212		 	0	0	0	f	f	f	f	215		28202563	28202563	0	0
214	SOLICITANDE REQUIERE INFORMACION SOBRE SI ESTA ACTIVA LA ESTACION DE SERVICIO MARIO CHARAL	 	0	0	0	f	f	f	f	217	MERIDA, BOMBA MARIO CHARAL, SECTOR PIE DE LLANO	28202563	28202563	0	0
213	UN GORDITO LLAMADO STIVEN TIRO UN TUMBA RANCHO A UN PANAL DE ABEJAS Y SE ENCENTRAN AGRESIVAS , SOLICITAN APOYO 	SE REALIZA EL PROCEDIMIENTO DE LA UNIDAD DE EMERGENCIA EN EL LUGAR, LOGRANDO EXTERMINAR LOS INSECTOS (PANAL DE ABEJAS) CON éXITO 	0	0	0	f	f	t	f	216	MERIDA , AV 2 Y 3 , ENTRE CALLE 25 Y 24 	10100438	32488556	1	0
215	EL SOLICITANTE LLAMA PARA PEDIR INFORMACION RESPECTO AL PASO VEHICULAR DEL MERIDA HACIA EL PARAMO 	 	0	0	0	f	f	f	f	218		32488556	32488556	0	0
216	SOLICITANTE INDICA SOBRE UN SOBRE UNA FEMENINA DE APROXIMADAMENTE 60 AñOS QUIEN IBA CAMINANDO SOBRE EL ACERADO, FUE VICTIMA DE UN HURTO, EL ATACANTE VISTE DE CAMISA COLOR AZUL, JEANS NEGROS, ZAPATOS BLANCOS, GORRA COLOR AZUL EL CUAL SE DIRIGUE HACIA LA PARTE SUPERIOR DE LA PLAZA BOLIVAR 	 	0	0	0	f	f	f	f	219	MERIDA, SECTOR EL SAGRARIO, AV 3 FRENTE A LA PLAZA  BOLIVAR, A NIVEL DE LA GOBERNACION, AL LADO DE LA FARMACIA FENIX.	28202563	28202563	0	0
217		 	0	0	0	f	f	f	f	220	LLAMADA DE SABOTAJE 	31033723	31033723	0	0
218		 	0	0	0	f	f	f	f	221		32148040	32148040	0	0
219	LA SOLICITANTE LLAMó PARA SOLICITAR INFORMACIóN SOBRE EL PASO POR LAS VíAS EN LA VUELTA DE LOLA  	 	0	0	0	f	f	f	f	222		31033723	31033723	0	0
222	EL SOLICITANTE LLAMO DEBIDO A UNA COLISIóN DE VEHíCULO EN EL QUE TRANSITABA UNA MENOR DE EDAD  	REPETIDA DE LA SOLICITUD 123 	0	0	0	f	f	f	f	225	LOS CUROS PARTE ALTA 	31149149	31033723	0	0
224		 	0	0	0	f	f	f	f	227	LLAMADA DE SABOTAJE 	31033723	31033723	0	0
223	EL SOLICITANTE LLAMó POR UN ROBO A UN COMERCIO EN EL CENTRO COMERCIAL 	SE LE INFORMAR AL CUADRANTE CORRESPONDIENTE, ATENDIENDO EL OFICIAL MEGIAS MIGUEL ED INDICANDO QUE ENVIARA COMISIóN AL SITIO 	0	0	0	f	f	f	f	226	URBANIZACIóN ALTO CHAMA CENTRO COMERCIAL MILENIUM	31149149	31033723	0	0
225	EL SOLICITANTE LLAMó PARA INFORMAR QUE SU MOTO FUE ROBADA	NO SE PUDO ESTABLECER COMUNICACION CON EL CUADRANTE P-18	0	0	0	f	f	f	f	228	SECTOR EL CAMBIO 	31149149	31033723	0	0
221	LA SOLICITANTE INFORMA SOBRE UNA COLISIóN ENTRE UN VEHíCULO TIPO MOTO Y UN VEHíCULO TIPO CARRO, EN EL PADIMENTO SE ENCUENTRA UNA FEMENINA AFECTADA POR EL GOLPE, SE REQUIERE COMISIóN EN EL SITIO  	AL SITIO LA TENIENTE MERCEDES MARQUEZ EN LA UNIDAD LINCE 36 EN COMPAñíA DE CABO 1 LUIS SANCHEZ, NO VISUALIZARON NINGúN HECHO 	0	0	0	f	f	t	f	224	MéRIDA, PARROQUIA	31149149	32148040	1	0
227		 	0	0	0	f	f	f	f	230		16664398	16664398	0	0
228	EL SR SOLICITA CONOCER LA HORA	 	0	0	0	f	f	f	f	231		16664398	16664398	0	0
\.


--
-- Data for Name: solicitudes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.solicitudes (id, numero_sol, tiempo_apertura_sol, fecha_sol, hora_sol, hora_cierre_sol, tiempo_respuesta_sol, sector_sol, punto_referencia_sol, parroquias_id, solicitante_id, guardias_id, estatus_solicitud_id, fecha_creacion_sol, tiempo_respuesta) FROM stdin;
4	\N	14:11:02	2021-11-08	14:11:02	14:11:57	0	0	ESQUINA LA CONCORDIA	915	4	2	1	2021-11-08 14:11:23	00:00:00-04
3	\N	14:11:00	2021-11-08	14:11:00	14:11:48	0	BARRIO SAN ISIDRO	VIAS A JAJI	939	3	2	1	2021-11-08 14:11:39	00:00:00-04
2	\N	14:11:00	2021-11-08	14:11:00	14:11:49	0	URBANIZACIÓN BELLA VISTA	DESPUES DEL TANQUE DE AGUA DE MERIDA 	942	2	3	1	2021-11-08 14:11:36	00:00:00-04
1	\N	13:11:06	2021-11-08	13:11:06	14:11:37	1	BARRIO ANDRÉS ELOY BLANCO	HOTEL TIBISAY	941	1	4	2	2021-11-08 14:11:54	01:00:00-04
5	\N	12:11:54	2021-11-10	12:11:54	12:11:54	\N	SECTOR BELÉN	FARMACIA	932	5	10	5	2021-11-10 12:11:25	\N
7	\N	10:11:58	2021-11-10	10:11:58	10:11:58	\N	SECTOR ENTABLITO L	VIAS A JAJI	942	7	11	5	2021-11-10 10:11:13	\N
6	\N	10:11:10	2021-11-10	10:11:10	10:11:04	0	0	LA FARMACIA LAS AMERICAS 	931	6	12	1	2021-11-10 10:11:03	00:00:00-04
8	\N	10:11:19	2021-11-11	10:11:19	11:11:14	1	SECTOR PLAZA LAS HEROÍNAS	AL LADO DE LA LICORERIA 	943	8	17	1	2021-11-11 10:11:59	01:00:00-04
9	\N	11:11:46	2021-11-11	11:11:46	11:11:54	0	SECTOR ENTABLITO LL	FRENTE AL PREESCOLAR	942	9	16	1	2021-11-11 11:11:21	00:00:00-04
10	\N	08:11:24	2021-11-13	08:11:24	09:11:11	1	CARACCIOLO PARRA PÉREZ	ESTACION DE SERVICIO BUGANVILLES	933	10	20	1	2021-11-13 08:11:07	01:00:00-04
11	\N	08:11:40	2021-11-13	08:11:40	09:11:22	1	CONJUNTO RESIDENCIAL ANDRÉS BELLO	CERCA DE AUTO LAVADO EL TIO	938	11	19	1	2021-11-13 09:11:39	01:00:00-04
12	\N	10:11:40	2021-11-15	10:11:40	10:11:43	0	CONJUNTO RESIDENCIAL CENTENARIO	CENTRO COMERCIAL CENTENARIO	913	12	25	1	2021-11-15 10:11:52	00:00:00-04
13	\N	10:11:30	2021-11-15	10:11:30	11:11:04	1	SECTOR LOMA DE MAITINES	CERCA A LA PANADERIA PALADIUM 	939	13	26	1	2021-11-15 10:11:26	01:00:00-04
14	\N	12:11:51	2021-11-18	12:11:51	12:11:28	0	CARACCIOLO PARRA PÉREZ	EL CAUCHO 	933	14	32	1	2021-11-18 12:11:53	00:00:00-04
15	\N	23:11:06	2021-11-18	23:11:06	23:11:06	\N	0	METROS ANTES DE LA PIZZERIA SABOR DE LOS	941	15	32	5	2021-11-18 23:11:37	\N
16	\N	13:11:01	2021-11-24	13:11:01	13:11:28	0	SECTOR 16 DE SEPTIEMBRE	PANADERIA LOS HERMANOS	934	16	40	1	2021-11-24 13:11:51	00:00:00-04
17	\N	13:12:08	2021-12-03	13:12:08	13:12:13	0	CONJUNTO RESIDENCIAL ANDRÉS BELLO	CASA AMARILLA	938	17	41	1	2021-12-03 13:12:44	00:00:00-04
19	\N	14:12:40	2021-12-05	14:12:40	14:12:40	\N	CONJUNTO RESIDENCIA VILLA SANTA	SERCA DEL AEROPUERTO	936	19	43	5	2021-12-05 14:12:01	\N
18	\N	13:12:06	2021-12-05	13:12:06	14:12:17	1	SECTOR CENTRO EL LLANO	DIAGONAL A LA ESTACION DE SERVICIO CHARA	935	18	43	1	2021-12-05 13:12:56	01:00:00-04
20	\N	11:04:57	2023-04-28	11:04:57	11:04:20	0	ALDEA MITISUS	PUNTO DE REFERENCIA	922	20	47	1	2023-04-28 11:04:28	00:00:00-04
21	\N	07:08:42	2023-08-02	07:08:42	07:08:42	\N	BARRIO SANTA BÁRBARA	PUENTECITO	940	25	4	5	2023-08-02 07:08:10	\N
22	\N	07:08:13	2023-08-02	07:08:13	07:08:12	0	BARRIO SANTA BÁRBARA	PUENTECITO	940	26	49	1	2023-08-02 07:08:49	00:00:00-04
23	\N	05:08:39	2023-08-10	05:08:39	05:08:39	\N	CENTRO DE SANTA MARÍA DE CAPARO	SIN INFORMACION	953	27	50	5	2023-08-10 05:08:37	\N
24	\N	05:08:41	2023-08-10	05:08:41	05:08:41	\N	ALDEA MUCURUTÁN	SIN INFORMACION	944	28	50	6	2023-08-10 05:08:18	\N
26	\N	17:08:17	2023-08-13	17:08:17	17:08:17	\N	BARRIO LA PEDECA	ESTADO DEL CLIMA	893	32	51	7	2023-08-13 17:08:23	\N
27	\N	17:08:46	2023-08-13	17:08:46	17:08:46	\N	BARRIO LA PEDECA		893	46	51	7	2023-08-13 17:08:29	\N
28	\N	17:08:48	2023-08-13	17:08:48	17:08:48	\N	0		929	47	51	7	2023-08-13 18:08:39	\N
29	\N	18:08:45	2023-08-13	18:08:45	18:08:45	\N			893	53	51	7	2023-08-13 18:08:24	\N
30	\N	18:08:36	2023-08-13	18:08:36	18:08:36	\N	0		893	55	51	7	2023-08-13 18:08:21	\N
34	\N	18:08:24	2023-08-13	18:08:24	18:08:24	\N	0		0	60	51	7	2023-08-13 18:08:57	\N
35	\N	18:08:46	2023-08-13	18:08:46	18:08:46	\N	0		0	61	51	7	2023-08-13 18:08:26	\N
36	\N	18:08:37	2023-08-13	18:08:37	18:08:37	\N	0		0	62	51	6	2023-08-13 19:08:04	\N
37	\N	19:08:28	2023-08-13	19:08:28	19:08:28	\N	0		0	64	51	6	2023-08-13 19:08:45	\N
25	\N	17:08:54	2023-08-13	17:08:54	19:08:22	2	LA AZULITA	LA PLAZA	900	31	51	1	2023-08-13 17:08:46	02:00:00-04
38	\N	19:08:51	2023-08-13	19:08:51	19:08:51	\N	0		0	65	51	7	2023-08-13 19:08:36	\N
39	\N	19:08:39	2023-08-13	19:08:39	19:08:39	\N	SECTOR LA MILAGROSA L	BODEGA MI CASITA	941	66	51	5	2023-08-13 19:08:19	\N
40	\N	19:08:22	2023-08-13	19:08:22	19:08:22	\N	0		0	67	51	6	2023-08-13 19:08:42	\N
41	\N	19:08:01	2023-08-13	19:08:01	19:08:01	\N	0		0	68	51	7	2023-08-13 19:08:49	\N
42	\N	07:08:36	2023-08-20	07:08:36	07:08:36	\N	BARRIO LA CONQUISTA	ESTACIONAMIENTO	893	69	5	5	2023-08-20 07:08:11	\N
43	\N	07:08:36	2023-08-20	07:08:36	07:08:36	\N	BARRIO LA CONQUISTA	ESTACIONAMIENTO	893	70	5	5	2023-08-20 07:08:42	\N
44	\N	07:08:09	2023-08-20	07:08:09	07:08:09	\N	BARRIO LA CONQUISTA	ESTACIONAMIENTO	893	71	5	5	2023-08-20 07:08:57	\N
45	\N	07:08:42	2023-08-20	07:08:42	07:08:42	\N	BARRIO LA CONQUISTA	ESTACIONAMIENTO	893	72	52	5	2023-08-20 07:08:38	\N
46	\N	07:08:14	2023-08-20	07:08:14	07:08:14	\N	BARRIO LA PEDECA	NUMERO DE CUADRANTE	893	73	53	5	2023-08-20 07:08:28	\N
47	\N	05:08:26	2023-08-23	05:08:26	05:08:26	\N	BARRIO LA PEDECA	NUMERO DE CUADRANTE	893	74	54	5	2023-08-23 05:08:19	\N
48	\N	04:08:47	2023-08-31	04:08:47	04:08:47	\N	BARRIO LA CONQUISTA	NUMERO DE CUADRANTE	893	75	55	5	2023-08-31 04:08:12	\N
49	\N	20:09:27	2023-09-19	20:09:27	22:09:40	2	BARRIO LA CONQUISTA	KIOSCO DON PEPE	893	76	58	1	2023-09-19 20:09:16	02:00:00-04
50	\N	10:02:28	2024-02-29	10:02:28	10:02:52	0	142841	CANCHA TECHADA	934	79	61	1	2024-02-29 10:02:45	00:00:00-04
52	\N	12:02:13	2024-02-29	12:02:13	12:02:13	\N	0		893	81	61	6	2024-02-29 12:02:45	\N
53	\N	14:02:04	2024-02-29	14:02:04	14:02:23	0	143060	POLLERA RICO POLLO	942	82	61	3	2024-02-29 14:02:15	00:00:00-04
51	\N	10:02:50	2024-02-29	10:02:50	15:02:34	5	143021	LA MEJOR EMPANADA	941	80	61	2	2024-02-29 10:02:24	05:00:00-04
56	\N	11:03:29	2024-03-07	11:03:29	11:03:29	\N	0		893	85	62	6	2024-03-07 11:03:49	\N
57	\N	11:03:58	2024-03-07	11:03:58	11:03:58	\N	0		893	86	62	7	2024-03-07 11:03:08	\N
54	\N	11:03:13	2024-03-07	11:03:13	12:03:49	1	143060	EMPANADAS EL BUEN SABOR	942	83	62	2	2024-03-07 11:03:45	01:00:00-04
60	\N	13:03:46	2024-03-07	13:03:46	13:03:46	\N	143411	CAUCHERA DON PEPE	893	89	62	5	2024-03-07 13:03:00	\N
58	\N	11:03:21	2024-03-07	11:03:21	13:03:37	2	143026	HOTEL NOCHE AXUL	941	87	62	3	2024-03-07 12:03:16	02:00:00-04
59	\N	13:03:24	2024-03-07	13:03:24	13:03:18	0	143483		964	88	62	8	2024-03-07 13:03:30	00:00:00-04
55	\N	11:03:56	2024-03-07	11:03:56	13:03:01	2	142893	FERRETERIA PEDRO MARMOL	937	84	62	1	2024-03-07 11:03:18	02:00:00-04
61	\N	13:03:50	2024-03-07	13:03:50	13:03:50	\N	0		893	90	62	6	2024-03-07 13:03:17	\N
62	\N	14:03:32	2024-03-07	14:03:32	14:03:07	0	142828	EDIFICIO SENIAT	933	91	62	1	2024-03-07 14:03:44	00:00:00-04
63	\N	14:03:36	2024-03-12	14:03:36	14:03:36	\N	00		893	92	64	6	2024-03-12 14:03:04	\N
64	\N	14:03:07	2024-03-12	14:03:07	14:03:07	\N	00		893	93	64	6	2024-03-12 14:03:28	\N
65	\N	14:03:55	2024-03-12	14:03:55	14:03:55	\N	142467		893	94	64	5	2024-03-12 14:03:52	\N
66	\N	10:03:23	2024-03-14	10:03:23	10:03:23	\N	00		893	95	65	6	2024-03-14 10:03:38	\N
67	\N	10:03:40	2024-03-14	10:03:40	10:03:40	\N	142934	ACUARIO	893	96	65	5	2024-03-14 10:03:58	\N
68	\N	10:03:01	2024-03-14	10:03:01	10:03:01	\N	142956	FERRETERIA PEDRO MARMOL	893	97	65	7	2024-03-14 10:03:11	\N
69	\N	15:03:34	2024-03-14	15:03:34	15:03:34	\N	00		893	98	65	6	2024-03-14 15:03:00	\N
70	\N	11:03:09	2024-03-19	11:03:09	11:03:09	\N	00		893	99	66	6	2024-03-19 11:03:22	\N
71	\N	11:03:24	2024-03-19	11:03:24	11:03:24	\N	142508	LOS PINOS	893	100	66	5	2024-03-19 11:03:04	\N
72	\N	11:03:06	2024-03-19	11:03:06	11:03:06	\N	00		893	101	66	6	2024-03-19 11:03:32	\N
73	\N	11:03:36	2024-03-19	11:03:36	11:03:36	\N	00		893	102	66	7	2024-03-19 11:03:39	\N
74	\N	08:03:54	2024-03-22	08:03:54	08:03:54	\N	142633	CANCHA TECHADA	893	103	67	5	2024-03-22 08:03:06	\N
75	\N	13:03:33	2024-03-26	13:03:33	13:03:33	\N	00		893	104	68	6	2024-03-26 13:03:46	\N
76	\N	13:03:49	2024-03-26	13:03:49	13:03:49	\N	142530	LA CURVA	893	105	68	7	2024-03-26 13:03:16	\N
77	\N	13:03:19	2024-03-26	13:03:19	13:03:19	\N	00		893	106	68	7	2024-03-26 13:03:10	\N
79	\N	13:03:31	2024-03-26	13:03:31	13:03:31	\N	00		893	108	68	6	2024-03-26 13:03:49	\N
78	\N	13:03:13	2024-03-26	13:03:13	15:03:34	2	142779	LA CANCHA	931	107	68	1	2024-03-26 13:03:07	02:00:00-04
80	\N	13:03:21	2024-03-30	13:03:21	13:03:21	\N	00		893	109	70	6	2024-03-30 13:03:36	\N
82	\N	13:03:39	2024-03-30	13:03:39	13:03:39	\N	00		893	111	70	7	2024-03-30 13:03:21	\N
83	\N	13:03:23	2024-03-30	13:03:23	13:03:23	\N	142835	AVENIDA DON TULIO FEBRES	893	112	70	7	2024-03-30 13:03:18	\N
84	\N	14:03:51	2024-03-30	14:03:51	14:03:51	\N	142029		893	113	70	7	2024-03-30 14:03:22	\N
85	\N	15:03:33	2024-03-30	15:03:33	15:03:33	\N	00		893	114	70	6	2024-03-30 15:03:50	\N
81	\N	13:03:41	2024-03-30	13:03:41	15:03:23	2	142530	LA CANCHA	917	110	70	1	2024-03-30 13:03:36	02:00:00-04
86	\N	12:04:26	2024-04-09	12:04:26	12:04:26	\N	00		893	115	72	6	2024-04-09 12:04:40	\N
87	\N	12:04:42	2024-04-09	12:04:42	12:04:42	\N	142439		893	116	72	5	2024-04-09 12:04:06	\N
88	\N	12:04:11	2024-04-09	12:04:11	12:04:11	\N	143476		893	117	72	7	2024-04-09 12:04:11	\N
89	\N	12:04:14	2024-04-09	12:04:14	12:04:14	\N	143090	FRENTE AL MACDONALD	893	118	72	5	2024-04-09 12:04:42	\N
90	\N	12:04:45	2024-04-09	12:04:45	12:04:45	\N	00		893	119	72	7	2024-04-09 12:04:37	\N
91	\N	15:04:23	2024-04-11	15:04:23	15:04:23	\N	0		893	120	4	6	2024-04-11 15:04:56	\N
93	\N	12:04:10	2024-04-16	12:04:10	12:04:10	\N	142475	LA CURVA	893	122	4	5	2024-04-16 12:04:09	\N
92	\N	12:04:03	2024-04-16	12:04:03	12:04:04	0	142609	EL CAUCHO	918	121	76	1	2024-04-16 12:04:00	00:00:00-04
126	\N	12:04:10	2024-04-16	12:04:10	12:04:57	0	142279	LA CANCHA	901	155	76	1	2024-04-16 12:04:55	00:00:00-04
127	\N	15:04:34	2024-04-18	15:04:34	15:04:46	0	142823	ZAPATERIA LOS TRES ABUELOS	933	156	78	1	2024-04-18 15:04:42	00:00:00-04
128	\N	12:05:09	2024-05-28	12:05:09	12:05:09	\N	00		893	157	81	6	2024-05-28 12:05:40	\N
129	\N	12:05:42	2024-05-28	12:05:42	12:05:42	\N	143037	REDOMA 5 AGUILAS	893	158	81	7	2024-05-28 12:05:22	\N
131	\N	12:05:28	2024-05-28	12:05:28	12:05:28	\N	142528	PASOS ARRIBA ESCUELA BASICA CAMPO ELíAS	893	160	81	5	2024-05-28 12:05:54	\N
130	\N	12:05:26	2024-05-28	12:05:26	12:05:30	0	142863	RESTAURANT SANCOCHO EL MáS SABROSO	936	159	81	1	2024-05-28 12:05:36	00:00:00-04
132	\N	10:38:28	2024-07-10	10:38:28	10:38:28	\N	00		893	161	1	6	2024-07-10 10:07:49	\N
134	\N	10:41:01	2024-07-10	10:41:01	10:41:01	\N	143476		893	163	1	7	2024-07-10 10:07:09	\N
133	\N	10:47:42	2024-07-10	10:38:53	10:48:14	0	143082	BANCO BICENTENARIO	943	162	82	1	2024-07-10 10:07:59	00:08:00-04
135	\N	13:14:00	2024-07-10	13:14:00	13:14:00	\N	00		893	164	1	6	2024-07-10 13:07:51	\N
136	\N	13:14:55	2024-07-10	13:14:55	13:14:55	\N	142999	BOMBA BUGANVILLAS	893	165	1	7	2024-07-10 13:07:03	\N
137	\N	13:24:34	2024-07-10	13:18:25	13:25:32	0	142999	FRENTE A IMPRADEM	940	166	82	1	2024-07-10 13:07:40	00:06:00-04
138	\N	10:18:33	2024-08-06	10:18:33	10:18:33	\N	00		893	167	1	6	2024-08-06 10:08:55	\N
139	\N	11:51:22	2024-08-06	11:51:22	11:51:22	\N	00		893	168	1	7	2024-08-06 11:08:42	\N
140	\N	00:37:16	2024-08-06	11:52:47	13:10:01	1	142809	LA CASA DE LOS PASTELITOS	932	169	83	1	2024-08-06 11:08:23	01:15:00-04
141	\N	09:59:41	2024-08-13	09:59:41	09:59:41	\N	00		893	170	1	6	2024-08-13 10:08:04	\N
142	\N	10:00:07	2024-08-13	10:00:07	10:00:07	\N	142839	PARQUE DE LOS POETAS	893	171	1	5	2024-08-13 10:08:38	\N
143	\N	10:01:55	2024-08-13	10:01:55	10:01:55	\N	00		893	172	1	6	2024-08-13 10:08:24	\N
144	\N	10:02:26	2024-08-13	10:02:26	10:02:26	\N	142793	MATERIALES DE CONSTRUCCION EL AMIGO	893	173	1	5	2024-08-13 10:08:05	\N
145	\N	13:42:22	2024-08-13	13:42:22	13:42:22	\N	142955	LA CASA BLANCA	939	174	1	7	2024-08-13 13:08:49	\N
146	\N	13:46:46	2024-08-13	13:46:46	13:46:46	\N	00		0	178	1	6	2024-08-13 13:08:26	\N
147	\N	13:51:47	2024-08-13	13:51:47	13:51:47	\N	142989	ES EL TERMINAL	940	179	1	7	2024-08-13 13:08:04	\N
148	\N	10:28:39	2024-08-27	10:28:39	10:28:39	\N	00		0	180	5	6	2024-08-27 10:08:17	\N
149	\N	10:30:37	2024-08-27	10:30:37	10:30:37	\N	00		0	181	5	6	2024-08-27 10:08:34	\N
150	\N	10:31:37	2024-08-27	10:31:37	10:31:37	\N	00		0	182	5	7	2024-08-27 10:08:12	\N
151	\N	10:37:24	2024-08-27	10:37:24	10:37:24	\N	142359	LICORERIA DEL MARTES	906	183	5	5	2024-08-27 10:08:17	\N
152	\N	13:49:42	2024-09-24	13:49:42	13:49:42	\N	00		0	184	5	5	2024-09-24 13:09:58	\N
153	\N	12:04:39	2024-09-26	12:04:39	12:04:39	\N	00		0	185	5	6	2024-09-26 12:09:58	\N
154	\N	12:05:01	2024-09-26	12:05:01	12:05:01	\N	142955	EL BLOQUE AMARILLO	939	186	5	5	2024-09-26 12:09:21	\N
155	\N	11:18:14	2024-10-04	11:18:14	11:18:14	\N	00		0	187	5	6	2024-10-04 11:10:46	\N
156	\N	11:18:51	2024-10-04	11:18:51	11:18:51	\N	00		0	188	5	7	2024-10-04 11:10:52	\N
157	\N	11:51:43	2024-10-04	11:51:43	11:51:43	\N	00		893	189	88	6	2024-10-04 11:10:47	\N
158	\N	11:56:52	2024-10-04	11:56:52	11:56:52	\N	00		893	190	88	6	2024-10-04 11:10:07	\N
159	\N	00:04:10	2024-10-04	11:57:10	12:04:44	0	143037	EMPANADAS EL AMOR DE MAMA	941	191	88	1	2024-10-04 11:10:41	00:04:00-04
222	\N	14:59:23	2025-12-09	14:59:23	14:59:23	\N	143009	PANADERIA LAS DELICIAS 	941	254	140	7	2025-12-09 15:12:55	\N
160	\N	00:02:32	2024-10-15	14:31:47	14:35:10	0	142999	CANAL DE SALIDA A HA AVENIDA LAS AMERICA	940	192	92	1	2024-10-15 14:10:17	00:02:00-04
161	\N	14:22:40	2024-10-18	14:22:40	14:22:40	\N	00		0	193	1	6	2024-10-18 14:10:19	\N
162	\N	00:04:59	2024-10-18	14:23:26	14:29:27	0	142922	CANCHA	938	194	95	2	2024-10-18 14:10:10	00:05:00-04
163	\N	00:03:59	2024-10-18	14:29:41	14:34:18	0	142024		893	195	95	1	2024-10-18 14:10:26	00:04:00-04
164	\N	15:21:35	2024-10-21	15:21:35	15:21:35	\N	142630	UPTM	918	196	1	7	2024-10-21 15:10:38	\N
165	\N	00:29:51	2024-10-22	10:56:49	12:19:03	1	142024	EL BLOQUE AMARILLO	893	197	97	1	2024-10-22 10:10:49	01:20:00-04
166	\N	20:00:00	2024-10-22	12:19:12	12:51:32	0	142026	EL POSTAL ELECTRICO	893	198	99	1	2024-10-22 12:10:07	00:32:00-04
167	\N	00:56:48	2024-10-29	11:06:36	12:12:02	1	143060	LA AVIONETA	942	199	101	1	2024-10-29 11:10:32	01:05:00-04
168	\N	00:01:28	2024-10-29	12:16:35	12:18:06	0	143060	LA AVIONETA	942	200	101	1	2024-10-29 12:10:58	00:01:00-04
169	\N	00:01:35	2024-10-29	14:30:50	14:32:29	0	142832	LA BODEGA	933	201	101	1	2024-10-29 14:10:55	00:01:00-04
170	\N	00:12:08	2024-10-29	15:36:46	15:48:57	1	142194	CANAL DE SALIDA A HA AVENIDA LAS AMERICA	894	202	101	1	2024-10-29 15:10:44	00:00:00-04
171	\N	09:35:18	2024-11-01	09:35:18	09:35:18	\N	00		893	203	102	7	2024-11-01 09:11:56	\N
172	\N	00:02:42	2024-11-01	09:37:04	09:40:03	1	142685	PANADERIA	920	204	103	1	2024-11-01 09:11:33	00:00:00-04
178	\N	11:51:17	2024-11-26	11:51:17	11:51:17	\N	00		0	210	5	6	2024-11-26 11:11:28	\N
179	\N	11:51:32	2024-11-26	11:51:32	11:51:32	\N	00		0	211	5	6	2024-11-26 11:11:23	\N
180	\N	11:53:26	2024-11-26	11:53:26	11:53:26	\N	00		0	212	5	6	2024-11-26 11:11:38	\N
177	\N	00:03:41	2024-11-26	11:50:36	11:54:43	1	142024	CAPITOLIO CALLE 22	893	209	106	1	2024-11-26 11:11:15	00:00:00-04
173	\N	00:26:08	2024-11-26	11:36:19	12:02:46	1	142139	PUENTE LA PEDREGOZA 	894	205	106	8	2024-11-26 11:11:05	00:00:00-04
175	\N	00:13:52	2024-11-26	11:45:02	12:45:41	1	142093	XXXXXXXXXX	893	207	106	1	2024-11-26 11:11:18	00:00:00-04
181	\N	00:01:59	2024-11-26	12:05:01	13:03:48	1	142828	MEIRDAAA	933	213	106	1	2024-11-26 12:11:48	00:00:00-04
174	\N	01:01:57	2024-11-26	11:45:02	13:16:50	1	142093	XXXXXXXXXX	893	206	106	1	2024-11-26 11:11:18	00:00:00-04
176	\N	01:28:29	2024-11-26	11:49:24	13:18:02	1	142294	MERIDAAA	901	208	106	1	2024-11-26 11:11:32	00:00:00-04
182	\N	00:02:34	2024-12-03	09:49:34	10:13:08	1	142530	BODEGA TRES CARAMELOS	917	214	110	1	2024-12-03 09:12:34	00:00:00-04
183	\N	01:10:36	2024-12-03	13:18:40	14:29:18	1	142026	PUNTO REFERENCIA	893	215	110	3	2024-12-03 13:12:44	00:00:00-04
184	\N	00:05:37	2024-12-17	17:45:09	17:50:48	1	142024	CANAL DE SALIDA A HA AVENIDA LAS AMERICA	893	216	114	1	2024-12-17 17:12:06	00:00:00-04
185	\N	15:00:29	2025-07-17	15:00:29	15:00:29	\N	00		893	217	117	5	2025-07-17 15:07:23	\N
186	\N	00:01:15	2025-07-17	15:04:10	15:05:27	1	142793	MOTEL EL BRASERO	931	218	118	1	2025-07-17 15:07:16	00:00:00-04
187	\N	13:26:35	2025-11-28	13:26:35	13:26:35	\N	00		0	219	123	6	2025-11-28 13:11:52	\N
189	\N	00:01:21	2025-11-28	13:37:35	13:39:15	1	143090	PLAZA LAS EROINAS	943	221	124	1	2025-11-28 13:11:54	00:00:00-04
190	\N	14:32:53	2025-11-28	14:32:53	14:32:53	\N	00		893	222	123	7	2025-11-28 14:11:42	\N
191	\N	14:32:31	2025-11-28	14:32:31	14:32:31	\N	142953	PUENTE LA PEDREGOSA 	939	223	124	7	2025-11-28 14:11:12	\N
192	\N	14:38:39	2025-11-28	14:38:39	14:38:39	\N	00		893	224	123	7	2025-11-28 14:11:44	\N
193	\N	14:39:46	2025-11-28	14:39:46	14:39:46	\N	00		893	225	123	4	2025-11-28 14:11:22	\N
194	\N	14:40:25	2025-11-28	14:40:25	14:40:25	\N	00		893	226	123	6	2025-11-28 14:11:40	\N
188	\N	00:12:58	2025-11-28	13:28:01	13:41:01	1	142805	EN LA ENTRADA DE LA URBANIZACION 	931	220	124	1	2025-11-28 13:11:36	00:00:00-04
195	\N	00:09:20	2025-11-28	14:37:54	14:47:22	1	142793	CC PIE DE MONTE CANAL DE ASCENSO	931	227	124	2	2025-11-28 14:11:08	00:00:00-04
196	\N	16:18:41	2025-12-02	16:18:41	16:18:41	\N	00		0	228	128	6	2025-12-02 16:12:39	\N
197	\N	16:18:55	2025-12-02	16:18:55	16:18:55	\N	00		0	229	128	7	2025-12-02 16:12:43	\N
198	\N	16:20:47	2025-12-02	16:20:47	16:20:47	\N	00		0	230	128	7	2025-12-02 16:12:28	\N
200	\N	16:25:52	2025-12-02	16:25:52	16:25:52	\N	00		0	232	128	6	2025-12-02 16:12:10	\N
199	\N	00:03:19	2025-12-02	16:22:35	16:26:17	1	142569	IGLESIA	917	231	128	2	2025-12-02 16:12:46	00:00:00-04
202	\N	00:04:58	2025-12-02	16:26:32	16:31:39	1	142850	IGLESIA DE SANTA JUANA	934	234	128	1	2025-12-02 16:12:08	00:00:00-04
203	\N	16:34:30	2025-12-02	16:34:30	16:34:30	\N	00		0	235	128	6	2025-12-02 16:12:49	\N
205	\N	16:35:09	2025-12-02	16:35:09	16:35:09	\N	142835		934	237	128	5	2025-12-02 16:12:20	\N
201	\N	00:11:42	2025-12-02	16:21:51	16:33:59	1	143082		943	233	128	1	2025-12-02 16:12:25	00:00:00-04
204	\N	00:13:06	2025-12-02	16:28:05	16:41:37	1	142024	IGLESIA	893	236	128	1	2025-12-02 16:12:56	00:00:00-04
206	\N	16:41:30	2025-12-02	16:41:30	16:41:30	\N	143682	IGLESIA	978	238	128	7	2025-12-02 16:12:27	\N
207	\N	16:00:04	2025-12-04	16:00:04	16:00:04	\N	00		0	239	132	6	2025-12-04 16:12:27	\N
208	\N	16:01:39	2025-12-04	16:01:39	16:01:39	\N	143082	PLAZA BOLIVAR	943	240	132	7	2025-12-04 16:12:36	\N
209	\N	00:07:06	2025-12-04	16:06:40	16:13:56	1	143081	CORPOELEC 	942	241	132	1	2025-12-04 16:12:16	00:00:00-04
210	\N	16:18:17	2025-12-04	16:18:17	16:18:17	\N	00		893	242	131	6	2025-12-04 16:12:33	\N
212	\N	00:01:34	2025-12-04	16:20:41	16:23:54	1	143037	REDOMA 	941	244	132	4	2025-12-04 16:12:45	00:00:00-04
213	\N	00:06:25	2025-12-04	16:18:12	16:24:40	1	142499	FRENTE AL CLUB POLIDEPORTIVO	917	245	132	1	2025-12-04 16:12:05	00:00:00-04
211	\N	00:06:01	2025-12-04	16:18:36	16:24:55	1	143037	REDOMA	941	243	132	1	2025-12-04 16:12:37	00:00:00-04
214	\N	15:38:45	2025-12-08	15:38:45	15:38:45	\N	00		0	246	136	6	2025-12-08 15:12:01	\N
215	\N	15:39:09	2025-12-08	15:39:09	15:39:09	\N	00		0	247	136	6	2025-12-08 15:12:05	\N
217	\N	15:43:13	2025-12-08	15:43:13	15:43:13	\N	142839	ESQUINA COLEGIO LA SALLE	934	249	136	7	2025-12-08 15:12:28	\N
216	\N	00:07:45	2025-12-08	15:41:07	15:49:05	1	143082	CAFE EXPRESS	943	248	136	1	2025-12-08 15:12:31	00:00:00-04
218	\N	15:48:04	2025-12-08	15:48:04	15:48:04	\N	00		0	250	136	7	2025-12-08 15:12:50	\N
219	\N	15:53:28	2025-12-08	15:53:28	15:53:28	\N	143090	AL LADO DE LA FARMACIA FENIX 	943	251	136	7	2025-12-08 16:12:23	\N
220	\N	14:54:15	2025-12-09	14:54:15	14:54:15	\N	00		0	252	139	6	2025-12-09 14:12:19	\N
221	\N	15:02:30	2025-12-09	15:02:30	15:02:30	\N	00		0	253	140	6	2025-12-09 15:12:56	\N
225	\N	00:06:10	2025-12-09	15:07:42	15:14:21	1	143062	SEGUNDO TANQUE DE AGUA 	942	257	140	4	2025-12-09 15:12:34	00:00:00-04
227	\N	15:17:38	2025-12-09	15:17:38	15:17:38	\N	00		0	259	140	6	2025-12-09 15:12:16	\N
223	\N	00:11:57	2025-12-09	15:03:59	15:16:08	1	143060	LA PANADERIA EL TOQUE ANDINO 	942	255	140	3	2025-12-09 15:12:40	00:00:00-04
229	\N	15:23:46	2025-12-09	15:23:46	15:23:46	\N	142129		893	261	140	7	2025-12-09 15:12:15	\N
224	\N	00:23:35	2025-12-09	15:03:02	15:27:07	1	143060	AL FRENTE DE PASTELITOS LA PARROQUIA 	942	256	140	1	2025-12-09 15:12:20	00:00:00-04
226	\N	00:16:05	2025-12-09	15:13:36	15:29:43	1	142928	SEGUNDO PISO LOCAL 3 	938	258	140	1	2025-12-09 15:12:33	00:00:00-04
228	\N	00:13:49	2025-12-09	15:18:19	15:32:13	1	142881	ESCUELA BASICA OCTULIO PICON 	937	260	140	3	2025-12-09 15:12:44	00:00:00-04
230	\N	19:03:26	2026-03-08	19:03:26	19:03:26	\N	00		893	262	143	6	2026-03-08 19:03:59	\N
231	\N	19:04:06	2026-03-08	19:04:06	19:04:06	\N	00		893	263	143	7	2026-03-08 19:03:19	\N
\.


--
-- Data for Name: solicitudes_organismos_solicitud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.solicitudes_organismos_solicitud (solicitudes_id, organismos_solicitud_id) FROM stdin;
4	2
3	2
2	1
1	4
6	5
8	3
9	5
10	1
11	1
12	2
13	3
14	1
16	3
17	5
18	3
20	6
22	5
25	6
49	1
50	8
53	3
51	8
54	5
55	1
58	8
59	3
62	1
78	6
81	1
92	3
126	3
127	2
130	9
133	5
137	8
140	3
159	1
160	9
162	7
163	7
165	8
166	7
167	4
168	6
169	6
170	6
172	1
177	5
173	9
175	2
181	1
174	5
176	7
182	4
183	0
184	3
186	9
189	5
188	2
195	0
199	2
202	2
201	5
204	3
209	4
212	8
211	8
213	4
216	3
225	0
223	2
224	2
224	1
226	5
228	5
\.


--
-- Data for Name: tipo_parenstesco; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipo_parenstesco (id, tipo_par) FROM stdin;
1	Madre
2	Padre
4	Tio(a)
3	Hermano(a)
5	Hijo(a)
6	Sobrino(a)
7	Esposo(a)
8	Otros
\.


--
-- Data for Name: tipo_rol; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipo_rol (id, tipo_rol) FROM stdin;
1	Administrador
2	Supervisor
3	Despachador
4	Operador
\.


--
-- Data for Name: ubicacion_bienes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ubicacion_bienes (id, area_ubicacion) FROM stdin;
4	Coordinación
1	Area Operadores
2	Area Despachadores
3	Area Supervisión
\.


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (id, usuario, contrasena, tipo_rol_id, estado_usuario_id, personal_cedula, fecha_creacion, preguntas_usuario_id) FROM stdin;
2	TAraujo565	d28d16c3a39db0b14e024ef53579726f461fa6a7	4	1	18125565	2021-11-08 11:11:43	2
4	AHernandez	07af30afc63d24433b24057413524524dcf09ce3	3	1	13499752	2021-11-08 12:11:05	4
7	JSosa802	e2ce132a3a8762c91719e448edba8d3384d2e106	4	1	15620802	2021-11-08 13:11:18	7
8	MDavila368	ed28ed4ebcd69f605706891d05f6eea6202bc7f3	4	1	18308368	2021-11-08 13:11:00	8
34	ABesembel489	5f892e764e11fcb66c14e6f4e57546ffa137b471	4	1	26931489	2021-12-03 12:12:09	34
36	ASanchez724	ASanchez724	4	1	12780724	2021-12-03 12:45:20	36
5	MFernandez	58781590898523afa9eab7aad7df655c9f7351a3	3	1	17842117	2021-11-08 12:30:20	5
9	WAlbarran4	463d16dffb5cbc86c78dd0b772d1322fe0f64584	3	1	16445441	2021-11-08 15:11:59	9
10	GTorres596	140840a1f8b8e59ca65622b1391ffdfdea8f760c	4	1	17340596	2021-11-10 11:11:48	10
11	NPerez826	e84d979b400c8f943f3c4ceb0ad7ea4016779913	4	1	27777826	2021-11-10 11:11:01	11
12	YDugarte701	b1eb32109d3c20a7a66dbd789b4d74291a636f94	4	1	26052701	2021-11-10 11:11:32	12
14	MToro049	35ea734a527d24c68d6fbfdb9c795b0a11c63a3d	3	1	20435049	2021-11-10 13:50:10	14
15	AMoreno477	a151acf14f6bcd791b0f8a8f62650699ff2bcb33	4	1	29520477	2021-11-11 08:11:24	15
17	NHernandez228	b9fa63325b79ab759d3348392054070731d97749	4	1	22887354	2021-11-11 13:49:20	17
18	KJerez896	0932445a7c4cfbe3a8b489c79de48af200097a0c	2	1	23302896	2021-11-11 10:11:09	18
19	JSanchez218	ce85d76df33c877b6827a578a25fd1613ccb4882	2	1	16908218	2021-11-11 10:11:20	19
20	LMorales089	9439049ddce1adda0f549c10552163d3901c6f64	3	1	18123089	2021-11-11 11:11:01	20
21	TBustamante697	1c0d450fa93b1cd4aeb2dfb0388684c841549fdf	2	1	14267697	2021-11-13 06:11:54	21
22	NValero573	438f2efd29232a00843d6128149bf30e787ead4a	2	1	17129573	2021-11-13 07:11:06	22
23	DGuillen663	54f95a5cd610903de53885f696f59eca715cf55c	4	1	20197663	2021-11-13 07:11:38	23
24	KPenaloza276	8bfdbdac1e0ab346d63bae0c40987ac1cc7ee53c	4	1	29794276	2021-11-13 07:11:33	24
26	YRodriguez337	d2c8c878121ba7982adb9c9f591fb6e44085e139	3	1	12356337	2021-11-15 09:11:01	26
6	JUzcategui	ccc3a2ca3b75a9f568856e9b614fc55e2ec712f4	2	1	16200660	2021-11-08 12:50:15	6
37	JBravo518	7b751c6108fd3674334b6c94b193d84517014150	2	1	21183518	2021-12-05 11:12:59	37
38	ATeran433	ATeran433	4	1	27433433	2021-12-05 11:59:00	38
39	ACuevas073	65515d633e413a8e77273ecb836c9a74f02e95df	4	1	19995073	2021-12-05 12:12:19	39
40	JSanchez012	7ed7eb6f51ad108bcaa418d0d9f6c30591864c9e	3	1	11954012	2021-12-05 12:45:20	40
28	EPinto387	55a0338d0f0ba7534112fe39018bb9cd9f3ecc50	2	1	17523387	2021-11-16 09:11:14	28
30	LPena819	a4eb3b06ba54e6ad0164d518415a4db1319ad5ef	3	1	22657819	2021-11-18 12:11:55	30
31	YAlbarran210	83082452c421366b1816dc4d5d22e4e4365bef70	3	1	15621210	2021-11-24 13:11:03	31
32	MPena220	cd9ed55678fe011a90fda2e669e92cbe398d7b75	2	1	20200220	2021-12-03 11:12:46	32
35	ARojas738	ARojas738	4	2	21182738	2021-12-02 12:28:10	35
3	JSosa991	69cd8f7bc049e317752294ba9d6df13e7ef38ad3	3	1	8042991	2021-11-08 11:11:51	3
29	LMarcano226	66c11a156fd2c5b5a217e82aab31e6f1dcbe429a	4	1	15040226	2021-11-16 09:40:10	29
25	YGonzalez118	50872442ea967b75e1ca3ddac9ca919778236f16	3	2	18310118	2021-11-13 11:31:20	25
33	EZambrano073	c07eb5a8c0dc7bb81c217b67f11c3b7a5e95ffd7	2	2	11913073	2021-12-03 11:55:10	33
44	YValero113	6b78ac61f9adb08fe52f329c0ab494ad9267c3c9	4	1	28205113	2025-12-02 15:15:40	44
43	KLobo014	0899fd75bb81c842dc9023b03eafd5d03e3168d3	4	1	31436014	2025-12-02 15:12:40	43
49	RPerez149	d22b6471b6cbaaf5ba7aaa06cb5b8e8e5887d19c	3	1	31149149	2025-12-04 15:12:32	49
45	ELobo438	66eca5b51736c728b98602f53882cfa37fd06f36	3	1	10100438	2025-12-02 16:01:40	45
42	OAlarcon648	edce90ee3faca7f1550b8a913474470ad7dd99ab	3	1	20847648	2025-11-28 13:11:17	42
46	MKeneth723	aadecb5ae428541dea34297f13f079ebd6c293b1	4	1	31033723	2025-12-04 12:12:47	46
47	AKevin357	c07eb5a8c0dc7bb81c217b67f11c3b7a5e95ffd7	3	1	31837357	2025-12-04 12:12:23	47
41	ERivera741	a2c1c4025d4708d41ceafe6e7f65334586f23be7	4	1	26052741	2025-11-28 12:11:17	41
50	MPena556	1dd7a86126b02a06cfd047ea29f2156263ab5be3	4	1	32488556	2025-12-08 14:12:17	50
48	ULeonela040	e5d8e6dccb27266d49fae92bd3c901ab3c2a1aa8	4	1	32148040	2025-12-04 15:12:32	48
51	LQuintero563	49bd3c3c29668f19b89a5b1faef3bc2bc938efef	4	1	28202563	2025-12-08 15:12:57	51
16	WMoya872	22f9ac8639d5c768d17e5c02394e993164c30245	2	2	18966872	2021-11-11 09:11:37	16
27	GMaldonado712	f66e65ec2c01d1c2cfb3c056c9b424dd5c4041c5	2	2	15620712	2021-11-16 09:11:58	27
13	JVelazquez398	2f5c5fb0c358b2e2556bd3fd1eba9287cf8d26cf	2	1	16664398	2021-11-10 12:11:40	13
1	Admin1234	7c4a8d09ca3762af61e59520943dc26494f8941b	1	1	99999999	2021-11-08 09:45:20	1
\.


--
-- Name: bienes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bienes_id_seq', 6, true);


--
-- Name: bitacora_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bitacora_id_seq', 1692, true);


--
-- Name: cargos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cargos_id_seq', 1, true);


--
-- Name: control_bienes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.control_bienes_id_seq', 192, true);


--
-- Name: estadisticas_solicitud_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estadisticas_solicitud_id_seq', 30, true);


--
-- Name: estado_bien_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estado_bien_id_seq', 2, true);


--
-- Name: estado_civil_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estado_civil_id_seq', 6, true);


--
-- Name: estado_usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estado_usuario_id_seq', 2, true);


--
-- Name: estados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estados_id_seq', 25, true);


--
-- Name: estatus_personal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estatus_personal_id_seq', 8, true);


--
-- Name: estatus_solicitud_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estatus_solicitud_id_seq', 7, true);


--
-- Name: genero_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.genero_id_seq', 2, true);


--
-- Name: grado_instruccion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.grado_instruccion_id_seq', 1, false);


--
-- Name: grupos_guardia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.grupos_guardia_id_seq', 7, true);


--
-- Name: guardias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.guardias_id_seq', 143, true);


--
-- Name: municipios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.municipios_id_seq', 359, true);


--
-- Name: observaciones_entrada_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.observaciones_entrada_id_seq', 9, true);


--
-- Name: observaciones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.observaciones_id_seq', 48, true);


--
-- Name: observaciones_salida_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.observaciones_salida_id_seq', 9, true);


--
-- Name: organismos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.organismos_id_seq', 14, true);


--
-- Name: organismos_solicitud_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.organismos_solicitud_id_seq', 8, true);


--
-- Name: parantesco_personal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.parantesco_personal_id_seq', 51, true);


--
-- Name: parroquias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.parroquias_id_seq', 1498, true);


--
-- Name: personal_cedula_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_cedula_seq', 1, false);


--
-- Name: personal_datos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_datos_id_seq', 63, true);


--
-- Name: personal_grupos_guardia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_grupos_guardia_id_seq', 63, true);


--
-- Name: personal_guardias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_guardias_id_seq', 31, true);


--
-- Name: rango_categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.rango_categoria_id_seq', 1, false);


--
-- Name: reporte_solicitudes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.reporte_solicitudes_id_seq', 22, true);


--
-- Name: solicitante_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.solicitante_id_seq', 263, true);


--
-- Name: solicitud_atencion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.solicitud_atencion_id_seq', 228, true);


--
-- Name: solicitudes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.solicitudes_id_seq', 231, true);


--
-- Name: tipo_parenstesco_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipo_parenstesco_id_seq', 8, true);


--
-- Name: tipo_rol_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipo_rol_id_seq', 4, true);


--
-- Name: ubicacion_bienes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ubicacion_bienes_id_seq', 4, true);


--
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_seq', 51, true);


--
-- Name: bienes bienes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bienes
    ADD CONSTRAINT bienes_pkey PRIMARY KEY (id);


--
-- Name: bitacora bitacora_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacora
    ADD CONSTRAINT bitacora_pkey PRIMARY KEY (id);


--
-- Name: cargos cargos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cargos
    ADD CONSTRAINT cargos_pkey PRIMARY KEY (id);


--
-- Name: director director_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.director
    ADD CONSTRAINT director_pkey PRIMARY KEY (cedula_dir);


--
-- Name: estadisticas_solicitud estadisticas_solicitud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estadisticas_solicitud
    ADD CONSTRAINT estadisticas_solicitud_pkey PRIMARY KEY (id);


--
-- Name: estado_bien estado_bien_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado_bien
    ADD CONSTRAINT estado_bien_pkey PRIMARY KEY (id);


--
-- Name: estado_civil estado_civil_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado_civil
    ADD CONSTRAINT estado_civil_pkey PRIMARY KEY (id);


--
-- Name: estado_usuario estado_usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado_usuario
    ADD CONSTRAINT estado_usuario_pkey PRIMARY KEY (id);


--
-- Name: estados estados_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estados
    ADD CONSTRAINT estados_pkey PRIMARY KEY (id);


--
-- Name: estatus_personal estatus_personal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estatus_personal
    ADD CONSTRAINT estatus_personal_pkey PRIMARY KEY (id);


--
-- Name: estatus_solicitud estatus_solicitud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estatus_solicitud
    ADD CONSTRAINT estatus_solicitud_pkey PRIMARY KEY (id);


--
-- Name: genero genero_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.genero
    ADD CONSTRAINT genero_pkey PRIMARY KEY (id);


--
-- Name: grado_instruccion grado_instruccion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grado_instruccion
    ADD CONSTRAINT grado_instruccion_pkey PRIMARY KEY (id);


--
-- Name: grupos_guardia grupos_guardia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grupos_guardia
    ADD CONSTRAINT grupos_guardia_pkey PRIMARY KEY (id);


--
-- Name: guardias guardias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.guardias
    ADD CONSTRAINT guardias_pkey PRIMARY KEY (id);


--
-- Name: control_bienes id_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.control_bienes
    ADD CONSTRAINT id_pkey PRIMARY KEY (id);


--
-- Name: motivo_protocolo motivo_protocolo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.motivo_protocolo
    ADD CONSTRAINT motivo_protocolo_pkey PRIMARY KEY (id);


--
-- Name: motivo_solicitud_grupo motivo_solicitud_grupo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.motivo_solicitud_grupo
    ADD CONSTRAINT motivo_solicitud_grupo_pkey PRIMARY KEY (id);


--
-- Name: motivo_solicitud motivo_solicitud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.motivo_solicitud
    ADD CONSTRAINT motivo_solicitud_pkey PRIMARY KEY (id);


--
-- Name: municipios municipios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.municipios
    ADD CONSTRAINT municipios_pkey PRIMARY KEY (id);


--
-- Name: observaciones_entrada observaciones_entrada_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.observaciones_entrada
    ADD CONSTRAINT observaciones_entrada_pkey PRIMARY KEY (id);


--
-- Name: observaciones observaciones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.observaciones
    ADD CONSTRAINT observaciones_pkey PRIMARY KEY (id);


--
-- Name: observaciones_salida observaciones_salida_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.observaciones_salida
    ADD CONSTRAINT observaciones_salida_pkey PRIMARY KEY (id);


--
-- Name: organismos organismos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.organismos
    ADD CONSTRAINT organismos_pkey PRIMARY KEY (id);


--
-- Name: organismos_solicitud organismos_solicitud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.organismos_solicitud
    ADD CONSTRAINT organismos_solicitud_pkey PRIMARY KEY (id);


--
-- Name: parantesco_personal parantesco_personal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parantesco_personal
    ADD CONSTRAINT parantesco_personal_pkey PRIMARY KEY (id);


--
-- Name: parroquias parroquias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parroquias
    ADD CONSTRAINT parroquias_pkey PRIMARY KEY (id);


--
-- Name: personal_datos personal_datos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_datos
    ADD CONSTRAINT personal_datos_pkey PRIMARY KEY (id);


--
-- Name: personal_grupos_guardia personal_grupos_guardia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_grupos_guardia
    ADD CONSTRAINT personal_grupos_guardia_pkey PRIMARY KEY (id);


--
-- Name: personal_guardias personal_guardias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_guardias
    ADD CONSTRAINT personal_guardias_pkey PRIMARY KEY (id);


--
-- Name: personal personal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal
    ADD CONSTRAINT personal_pkey PRIMARY KEY (cedula);


--
-- Name: preguntas_usuario primary_id_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.preguntas_usuario
    ADD CONSTRAINT primary_id_key PRIMARY KEY (id);


--
-- Name: rango_categoria rango_categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rango_categoria
    ADD CONSTRAINT rango_categoria_pkey PRIMARY KEY (id);


--
-- Name: reporte_solicitudes reporte_solicitudes_id_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reporte_solicitudes
    ADD CONSTRAINT reporte_solicitudes_id_pkey PRIMARY KEY (id);


--
-- Name: sectores sectores_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sectores
    ADD CONSTRAINT sectores_pkey PRIMARY KEY (id);


--
-- Name: solicitante solicitante_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitante
    ADD CONSTRAINT solicitante_pkey PRIMARY KEY (id);


--
-- Name: solicitud_atencion solicitud_atencion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud_atencion
    ADD CONSTRAINT solicitud_atencion_pkey PRIMARY KEY (id);


--
-- Name: solicitudes solicitudes_numero_sol_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitudes
    ADD CONSTRAINT solicitudes_numero_sol_key UNIQUE (numero_sol);


--
-- Name: solicitudes_organismos_solicitud solicitudes_organismos_solicitud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitudes_organismos_solicitud
    ADD CONSTRAINT solicitudes_organismos_solicitud_pkey PRIMARY KEY (solicitudes_id, organismos_solicitud_id);


--
-- Name: solicitudes solicitudes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitudes
    ADD CONSTRAINT solicitudes_pkey PRIMARY KEY (id);


--
-- Name: tipo_parenstesco tipo_parenstesco_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_parenstesco
    ADD CONSTRAINT tipo_parenstesco_pkey PRIMARY KEY (id);


--
-- Name: tipo_rol tipo_rol_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_rol
    ADD CONSTRAINT tipo_rol_pkey PRIMARY KEY (id);


--
-- Name: ubicacion_bienes ubicacion_bienes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ubicacion_bienes
    ADD CONSTRAINT ubicacion_bienes_pkey PRIMARY KEY (id);


--
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);


--
-- Name: usuario usuario_usuario_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_usuario_key UNIQUE (usuario);


--
-- Name: personal_datos cedula_personal_sup_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_datos
    ADD CONSTRAINT cedula_personal_sup_fk FOREIGN KEY (personal_cedula_sup) REFERENCES public.personal(cedula);


--
-- Name: guardias contron_bienes_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.guardias
    ADD CONSTRAINT contron_bienes_fk FOREIGN KEY (control_bienes_id) REFERENCES public.control_bienes(id);


--
-- Name: solicitud_atencion despachador_cedula; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud_atencion
    ADD CONSTRAINT despachador_cedula FOREIGN KEY (despachador_solicitud) REFERENCES public.personal(cedula) NOT VALID;


--
-- Name: CONSTRAINT despachador_cedula ON solicitud_atencion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON CONSTRAINT despachador_cedula ON public.solicitud_atencion IS 'toma el numero de cedula de la personal desde la tabla personal';


--
-- Name: bienes fkbienes440242; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bienes
    ADD CONSTRAINT fkbienes440242 FOREIGN KEY (ubicacion_bienes_id) REFERENCES public.ubicacion_bienes(id);


--
-- Name: bienes fkbienes460860; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bienes
    ADD CONSTRAINT fkbienes460860 FOREIGN KEY (estado_bien_id) REFERENCES public.estado_bien(id);


--
-- Name: bienes fkbienes809471; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bienes
    ADD CONSTRAINT fkbienes809471 FOREIGN KEY (organismos_id) REFERENCES public.organismos(id);


--
-- Name: municipios fkmunicipios199919; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.municipios
    ADD CONSTRAINT fkmunicipios199919 FOREIGN KEY (estados_id) REFERENCES public.estados(id);


--
-- Name: parantesco_personal fkparantesco150034; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parantesco_personal
    ADD CONSTRAINT fkparantesco150034 FOREIGN KEY (personal_cedula) REFERENCES public.personal(cedula);


--
-- Name: parantesco_personal fkparantesco920174; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parantesco_personal
    ADD CONSTRAINT fkparantesco920174 FOREIGN KEY (tipo_parenstesco_id) REFERENCES public.tipo_parenstesco(id);


--
-- Name: parroquias fkparroquias576522; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parroquias
    ADD CONSTRAINT fkparroquias576522 FOREIGN KEY (municipios_id) REFERENCES public.municipios(id);


--
-- Name: personal fkpersonal173639; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal
    ADD CONSTRAINT fkpersonal173639 FOREIGN KEY (estado_civil_id) REFERENCES public.estado_civil(id);


--
-- Name: personal fkpersonal359812; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal
    ADD CONSTRAINT fkpersonal359812 FOREIGN KEY (estatus_personal_id) REFERENCES public.estatus_personal(id);


--
-- Name: personal fkpersonal40980; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal
    ADD CONSTRAINT fkpersonal40980 FOREIGN KEY (grado_instruccion_id) REFERENCES public.grado_instruccion(id);


--
-- Name: personal fkpersonal641578; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal
    ADD CONSTRAINT fkpersonal641578 FOREIGN KEY (rango_categoria_id) REFERENCES public.rango_categoria(id);


--
-- Name: personal fkpersonal773116; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal
    ADD CONSTRAINT fkpersonal773116 FOREIGN KEY (organismos_id) REFERENCES public.organismos(id);


--
-- Name: personal fkpersonal850807; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal
    ADD CONSTRAINT fkpersonal850807 FOREIGN KEY (cargos_id) REFERENCES public.cargos(id);


--
-- Name: personal fkpersonal967971; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal
    ADD CONSTRAINT fkpersonal967971 FOREIGN KEY (parroquias_id) REFERENCES public.parroquias(id);


--
-- Name: personal fkpersonal991409; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal
    ADD CONSTRAINT fkpersonal991409 FOREIGN KEY (genero_id) REFERENCES public.genero(id);


--
-- Name: personal_guardias fkpersonal_g462949; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_guardias
    ADD CONSTRAINT fkpersonal_g462949 FOREIGN KEY (guardias_id) REFERENCES public.guardias(id);


--
-- Name: personal_guardias fkpersonal_g521175; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_guardias
    ADD CONSTRAINT fkpersonal_g521175 FOREIGN KEY (observaciones_salida_id) REFERENCES public.observaciones_salida(id);


--
-- Name: personal_grupos_guardia fkpersonal_g856631; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_grupos_guardia
    ADD CONSTRAINT fkpersonal_g856631 FOREIGN KEY (grupos_guardia_id) REFERENCES public.grupos_guardia(id);


--
-- Name: personal_guardias fkpersonal_g866539; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_guardias
    ADD CONSTRAINT fkpersonal_g866539 FOREIGN KEY (observaciones_entrada_id) REFERENCES public.observaciones_entrada(id);


--
-- Name: personal_guardias fkpersonal_g983091; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_guardias
    ADD CONSTRAINT fkpersonal_g983091 FOREIGN KEY (personal_cedula) REFERENCES public.personal(cedula);


--
-- Name: solicitud_atencion fksolicitud_239713; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud_atencion
    ADD CONSTRAINT fksolicitud_239713 FOREIGN KEY (solicitudes_id) REFERENCES public.solicitudes(id);


--
-- Name: solicitudes fksolicitude111222; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitudes
    ADD CONSTRAINT fksolicitude111222 FOREIGN KEY (guardias_id) REFERENCES public.guardias(id);


--
-- Name: solicitudes_organismos_solicitud fksolicitude397271; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitudes_organismos_solicitud
    ADD CONSTRAINT fksolicitude397271 FOREIGN KEY (organismos_solicitud_id) REFERENCES public.organismos_solicitud(id);


--
-- Name: solicitudes_organismos_solicitud fksolicitude55451; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitudes_organismos_solicitud
    ADD CONSTRAINT fksolicitude55451 FOREIGN KEY (solicitudes_id) REFERENCES public.solicitudes(id);


--
-- Name: solicitudes fksolicitude831168; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitudes
    ADD CONSTRAINT fksolicitude831168 FOREIGN KEY (estatus_solicitud_id) REFERENCES public.estatus_solicitud(id);


--
-- Name: solicitudes fksolicitude895729; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitudes
    ADD CONSTRAINT fksolicitude895729 FOREIGN KEY (parroquias_id) REFERENCES public.parroquias(id);


--
-- Name: solicitudes fksolicitude969704; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitudes
    ADD CONSTRAINT fksolicitude969704 FOREIGN KEY (solicitante_id) REFERENCES public.solicitante(id);


--
-- Name: usuario fkusuario244494; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT fkusuario244494 FOREIGN KEY (tipo_rol_id) REFERENCES public.tipo_rol(id);


--
-- Name: usuario fkusuario351639; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT fkusuario351639 FOREIGN KEY (personal_cedula) REFERENCES public.personal(cedula);


--
-- Name: usuario fkusuario970613; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT fkusuario970613 FOREIGN KEY (estado_usuario_id) REFERENCES public.estado_usuario(id);


--
-- Name: guardias grupo_guardia_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.guardias
    ADD CONSTRAINT grupo_guardia_fk FOREIGN KEY (grupos_guardia_id) REFERENCES public.grupos_guardia(id);


--
-- Name: personal grupo_guardia_personal_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal
    ADD CONSTRAINT grupo_guardia_personal_id FOREIGN KEY (grupo_guardia_id) REFERENCES public.grupos_guardia(id);


--
-- Name: control_bienes grupo_personal_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.control_bienes
    ADD CONSTRAINT grupo_personal_fk FOREIGN KEY (grupo_personal_id) REFERENCES public.personal_grupos_guardia(id);


--
-- Name: observaciones guardias_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.observaciones
    ADD CONSTRAINT guardias_id_fk FOREIGN KEY (guardias_id) REFERENCES public.guardias(id);


--
-- Name: reporte_solicitudes guardias_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reporte_solicitudes
    ADD CONSTRAINT guardias_id_fk FOREIGN KEY (guardias_id) REFERENCES public.guardias(id);


--
-- Name: estadisticas_solicitud guardias_id_kf; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estadisticas_solicitud
    ADD CONSTRAINT guardias_id_kf FOREIGN KEY (guardia_id) REFERENCES public.guardias(id);


--
-- Name: motivo_protocolo motivo_descripcion; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.motivo_protocolo
    ADD CONSTRAINT motivo_descripcion FOREIGN KEY (motivo_id) REFERENCES public.motivo_solicitud(id) NOT VALID;


--
-- Name: motivo_solicitud motivo_solicitud_grupo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.motivo_solicitud
    ADD CONSTRAINT motivo_solicitud_grupo_fkey FOREIGN KEY (motivo_grupo_id) REFERENCES public.motivo_solicitud_grupo(id);


--
-- Name: solicitante motivo_solicitud_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitante
    ADD CONSTRAINT motivo_solicitud_id FOREIGN KEY (motivo_solicitud_id) REFERENCES public.motivo_solicitud(id);


--
-- Name: reporte_solicitudes municipio_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reporte_solicitudes
    ADD CONSTRAINT municipio_id FOREIGN KEY (municipio) REFERENCES public.municipios(id) NOT VALID;


--
-- Name: CONSTRAINT municipio_id ON reporte_solicitudes; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON CONSTRAINT municipio_id ON public.reporte_solicitudes IS 'contiene el id del municipio';


--
-- Name: solicitud_atencion operador_cedula; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitud_atencion
    ADD CONSTRAINT operador_cedula FOREIGN KEY (operador_solicitud) REFERENCES public.personal(cedula);


--
-- Name: observaciones organismos_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.observaciones
    ADD CONSTRAINT organismos_id_fk FOREIGN KEY (organismos_id) REFERENCES public.organismos(id);


--
-- Name: solicitante organismos_solicitud_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solicitante
    ADD CONSTRAINT organismos_solicitud_id_fk FOREIGN KEY (organismos_solicitud_id) REFERENCES public.organismos_solicitud(id);


--
-- Name: personal_datos personal_grupos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_datos
    ADD CONSTRAINT personal_grupos_fk FOREIGN KEY (personal_grupos_guardia_id) REFERENCES public.personal_grupos_guardia(id);


--
-- Name: usuario preguntas_usuario_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT preguntas_usuario_fk FOREIGN KEY (preguntas_usuario_id) REFERENCES public.preguntas_usuario(id) NOT VALID;


--
-- Name: sectores sectores_parroquias_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sectores
    ADD CONSTRAINT sectores_parroquias_id_fkey FOREIGN KEY (parroquias_id) REFERENCES public.parroquias(id);


--
-- Name: guardias usuario_entrada_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.guardias
    ADD CONSTRAINT usuario_entrada_fk FOREIGN KEY (usuario_entrada_id) REFERENCES public.personal(cedula);


--
-- Name: guardias usuario_salida_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.guardias
    ADD CONSTRAINT usuario_salida_fk FOREIGN KEY (usuario_salida_id) REFERENCES public.personal(cedula);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;


--
-- PostgreSQL database dump complete
--

\unrestrict cUYj2qqkrl9rwXQI6fPdj41bgFd7acaleI9iGhyYiKmRNGUIVYuZu45bYkNHKqx

