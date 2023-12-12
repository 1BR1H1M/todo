--
-- PostgreSQL database dump
--

-- Dumped from database version 12.4
-- Dumped by pg_dump version 12.4

-- Started on 2020-10-21 08:27:13 CDT

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 206 (class 1259 OID 16615)
-- Name: ajx_posts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ajx_posts (
    id_post integer NOT NULL,
    fc_post timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    act_post smallint DEFAULT '1'::smallint,
    nom_post character varying(512) DEFAULT ''::character varying,
    desc_post character varying(512) DEFAULT ''::character varying,
    slug_post character varying(120) DEFAULT 'none-s'::character varying,
    img_post character varying(256) DEFAULT 'files/posts/default.png'::character varying
);


ALTER TABLE public.ajx_posts OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16613)
-- Name: ajx_posts_id_post_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ajx_posts_id_post_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ajx_posts_id_post_seq OWNER TO postgres;

--
-- TOC entry 3949 (class 0 OID 0)
-- Dependencies: 205
-- Name: ajx_posts_id_post_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ajx_posts_id_post_seq OWNED BY public.ajx_posts.id_post;


--
-- TOC entry 202 (class 1259 OID 16507)
-- Name: ajx_posts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ajx_posts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ajx_posts_id_seq OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16585)
-- Name: files; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.files (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    type character varying(255) NOT NULL,
    ext character varying(30) DEFAULT 'png'::character varying NOT NULL,
    size integer DEFAULT 0,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.files OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16583)
-- Name: files_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.files_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.files_id_seq OWNER TO postgres;

--
-- TOC entry 3950 (class 0 OID 0)
-- Dependencies: 203
-- Name: files_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.files_id_seq OWNED BY public.files.id;


--
-- TOC entry 208 (class 1259 OID 16631)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id_user integer NOT NULL,
    nom_user character varying(100) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(512) DEFAULT ''::character varying NOT NULL,
    act_user integer DEFAULT 1,
    fc_user timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 16629)
-- Name: users_id_user_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_user_seq OWNER TO postgres;

--
-- TOC entry 3951 (class 0 OID 0)
-- Dependencies: 207
-- Name: users_id_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_user_seq OWNED BY public.users.id_user;


--
-- TOC entry 3796 (class 2604 OID 16618)
-- Name: ajx_posts id_post; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ajx_posts ALTER COLUMN id_post SET DEFAULT nextval('public.ajx_posts_id_post_seq'::regclass);


--
-- TOC entry 3792 (class 2604 OID 16588)
-- Name: files id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.files ALTER COLUMN id SET DEFAULT nextval('public.files_id_seq'::regclass);


--
-- TOC entry 3803 (class 2604 OID 16634)
-- Name: users id_user; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id_user SET DEFAULT nextval('public.users_id_user_seq'::regclass);


--
-- TOC entry 3941 (class 0 OID 16615)
-- Dependencies: 206
-- Data for Name: ajx_posts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ajx_posts (id_post, fc_post, act_post, nom_post, desc_post, slug_post, img_post) FROM stdin;
3	2020-08-07 20:40:41	0	Cambiando imagen del login de fedora		post-3	files/posts/default.png
4	2020-08-07 20:40:41	0	Cambiando íconos en fedora 20		post-4	files/posts/default.png
5	2020-08-07 20:40:41	0	Optimizar el peso de archivos pdf		post-5	files/posts/default.png
6	2020-08-07 20:40:41	0	Una consola elegante...		post-6	files/posts/default.png
7	2020-08-07 20:40:41	0	Instalar zshell en fedora		post-7	files/posts/default.png
8	2020-08-07 20:40:41	0	Hacer que una maquina virtual detecte USB fedora 20		post-8	files/posts/default.png
9	2020-08-07 20:40:41	0	Activar/desactivar SeLinux en fedora		post-9	files/posts/default.png
10	2020-08-07 20:40:41	0	Recuperar grub en elementary OS luna junto con windows 8		post-10	files/posts/default.png
11	2020-08-07 20:40:41	0	Cómo cambiar el idioma de las páginas MAN		post-11	files/posts/default.png
12	2020-08-07 20:40:41	1	Reducir peso de un archivo PDF en Linux		post-12	files/posts/default.png
13	2020-08-07 20:40:41	1	Convertir DEB a RPM con ALIEN (y viceversa)		post-13	files/posts/default.png
14	2020-08-07 20:40:41	1	Crear ventanas jdialoge tipo modal		post-14	files/posts/default.png
15	2020-08-07 20:40:41	1	Abrir desde un jframe un jdialog modal que se cierre después de un tiempo		post-15	files/posts/default.png
16	2020-08-07 20:40:41	1	Aplicaciónes indispensables en fedora gnome		post-16	files/posts/default.png
17	2020-08-07 20:40:41	1	Java - Hilos Thread JFrame		post-17	files/posts/default.png
18	2020-08-07 20:40:41	1	Mostrar icono de aplicaciones de windows en Gnome fedora 20		post-18	files/posts/default.png
19	2020-08-07 20:40:41	1	Recibir datos desde arduino utilizando una interfaz en java		post-19	files/posts/default.png
20	2020-08-07 20:40:41	1	Qué hacer después de instalar fedora 20 \\"Heisenbug\\" con escritorio gnome?		post-20	files/posts/default.png
21	2020-08-07 20:40:41	1	Cambiar el motor de línea de comándos en fedora - linux		post-21	files/posts/default.png
22	2020-08-07 20:40:41	1	Recuperar archivos de usb o hdd con foremost		post-22	files/posts/default.png
23	2020-08-07 20:40:41	1	Instalar MySQL Server y MysqlWorkbech en fedora 20 usando paquetes descargados		post-23	files/posts/default.png
24	2020-08-07 20:40:41	1	Cómo configurar gt-recordMyDesktop para grabar tu escritorio sin problemas Gtk		post-24	files/posts/default.png
25	2020-08-07 20:40:41	1	Cambiar la dirección MAC a la tarjeta de red de tu laptop con macchanger		post-25	files/posts/default.png
26	2020-08-07 20:40:41	1	Punteros en programas arduino		post-26	files/posts/default.png
27	2020-08-07 20:40:41	1	Instalación de processing en fedora		post-27	files/posts/default.png
28	2020-08-07 20:40:41	1	Agregar un JCalendar a la paleta de componentes de netbeans		post-28	files/posts/default.png
29	2020-08-07 20:40:41	1	Obtener fecha del sistema y colocarlo en un JDateChooser Java		post-29	files/posts/default.png
30	2020-08-07 20:40:41	1	Script que avisa el estado de la carga de la batería de la laptop linux		post-30	files/posts/default.png
31	2020-08-07 20:40:41	1	Crear instalador de aplicación programada en Visual Basic		post-31	files/posts/default.png
32	2020-08-07 20:40:41	1	Reproducir sonido en segundo plano usando hilos en java		post-32	files/posts/default.png
33	2020-08-07 20:40:41	1	Altas, Bajas, Consultas y Modificaciones desde aplicación java usando BD en mysql		post-33	files/posts/default.png
34	2020-08-07 20:40:41	1	Instalar PostgreSQL y pgAdmin III en fedora		post-34	files/posts/default.png
35	2020-08-07 20:40:41	1	Matrices dinámicas en C		post-35	files/posts/default.png
36	2020-08-07 20:40:41	1	Reproducir sonidos en java, usando player y de forma más simples.		post-36	files/posts/default.png
37	2020-08-07 20:40:41	1	Descargar una página web con wget		post-37	files/posts/default.png
38	2020-08-07 20:40:41	1	Instalación y uso de ClamAV		post-38	files/posts/default.png
39	2020-08-07 20:40:41	1	Kingsoft Office una alternativa a Microsoft Office		post-39	files/posts/default.png
40	2020-08-07 20:40:41	1	Cronómetro en java		post-40	files/posts/default.png
41	2020-08-07 20:40:41	1	Crear alias para facilitar tareas en comando de linux		post-41	files/posts/default.png
42	2020-08-07 20:40:41	1	Instalación guestadition de VirtualBox en Kali Linux		post-42	files/posts/default.png
43	2020-08-07 20:40:41	1	Instalar ZSH en kali Linux		post-43	files/posts/default.png
44	2020-08-07 20:40:41	1	Conocer información de nuestro sistema		post-44	files/posts/default.png
45	2020-08-07 20:40:41	1	Instalando temas de gnome shell		post-45	files/posts/default.png
46	2020-08-07 20:40:41	1	Instalar VirtualBox en fedora		post-46	files/posts/default.png
47	2020-08-07 20:40:41	1	Truco en Windows 8		post-47	files/posts/default.png
48	2020-08-07 20:40:41	1	Cómo elegir el mejor entorno de escritorio de Linux para ti		post-48	files/posts/default.png
49	2020-08-07 20:40:41	1	Graficar puntos en Gnuplot desde C		post-49	files/posts/default.png
50	2020-08-07 20:40:41	1	Funciones de membresía en c logíca difusa		post-50	files/posts/default.png
51	2020-08-07 20:40:41	1	Agregar referencias, glosario y acronimos en archivos Latex		post-51	files/posts/default.png
52	2020-08-07 20:40:41	1	Insertar código de programas en Latex		post-52	files/posts/default.png
53	2020-08-07 20:40:41	1	Sistema de control Takagi-Sugeno en C		post-53	files/posts/default.png
54	2020-10-05 13:04:18.668804	1	Un mundo malo	UN mundolo	un-mundo-malo	files/posts/V1t6-Baks.jpg
1	2020-08-07 20:40:41	0	Activar tecla retroceso para regresar a la carpeta anterior en nautilus		post-1	files/posts/cAjS-33PW.jpeg
2	2020-08-07 20:40:41	0	Extensión de gnome-shell que no te deben faltar		post-2	files/posts/mDRs-CiGD.png
55	2020-10-05 14:50:05.523921	1	Playera bordada, sin fish -+ ? un mundo malo ¿?	Único	playera-bordada-sin-fish	files/posts/o1r7-JfAR.jpg
\.


--
-- TOC entry 3939 (class 0 OID 16585)
-- Dependencies: 204
-- Data for Name: files; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.files (id, name, type, ext, size, created_at) FROM stdin;
1	CR_1161151_dbd0ef7b87b24db38c9c7d985dbc4902_final_inesperado.jpg	image/jpeg	jpg	77934	2020-10-05 11:58:16.836482
2	CR_1161151_dbd0ef7b87b24db38c9c7d985dbc4902_final_inesperado.jpg	image/jpeg	jpg	77934	2020-10-05 12:02:18.267004
3	CR_1161151_dbd0ef7b87b24db38c9c7d985dbc4902_final_inesperado.jpg	image/jpeg	jpg	77934	2020-10-05 12:05:13.716741
4	CR_1161151_dbd0ef7b87b24db38c9c7d985dbc4902_final_inesperado.jpg	image/jpeg	jpg	77934	2020-10-05 12:15:40.083872
\.


--
-- TOC entry 3952 (class 0 OID 0)
-- Dependencies: 205
-- Name: ajx_posts_id_post_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ajx_posts_id_post_seq', 55, true);


--
-- TOC entry 3953 (class 0 OID 0)
-- Dependencies: 202
-- Name: ajx_posts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ajx_posts_id_seq', 1, false);


--
-- TOC entry 3954 (class 0 OID 0)
-- Dependencies: 203
-- Name: files_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.files_id_seq', 4, true);


--
-- TOC entry 3955 (class 0 OID 0)
-- Dependencies: 207
-- Name: users_id_user_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_user_seq', 5, true);


--
-- TOC entry 3808 (class 2606 OID 16593)
-- Name: files files_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.files
    ADD CONSTRAINT files_pkey PRIMARY KEY (id);


--
-- TOC entry 3810 (class 2606 OID 16642)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_user);


-- Completed on 2020-10-21 08:27:14 CDT

--
-- PostgreSQL database dump complete
--

