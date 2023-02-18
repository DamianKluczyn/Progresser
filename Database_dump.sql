--
-- PostgreSQL database dump
--

-- Dumped from database version 14.6 (Ubuntu 14.6-1.pgdg20.04+1)
-- Dumped by pg_dump version 15.1

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

--
-- Name: heroku_ext; Type: SCHEMA; Schema: -; Owner: u9tqb5tpq9h8nk
--

CREATE SCHEMA heroku_ext;


ALTER SCHEMA heroku_ext OWNER TO u9tqb5tpq9h8nk;

--
-- Name: public; Type: SCHEMA; Schema: -; Owner: yrivnkdnsqmsre
--

-- *not* creating schema, since initdb creates it


ALTER SCHEMA public OWNER TO yrivnkdnsqmsre;

--
-- Name: pg_stat_statements; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pg_stat_statements WITH SCHEMA heroku_ext;


--
-- Name: EXTENSION pg_stat_statements; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pg_stat_statements IS 'track planning and execution statistics of all SQL statements executed';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: board; Type: TABLE; Schema: public; Owner: yrivnkdnsqmsre
--

CREATE TABLE public.board (
    id_board integer NOT NULL,
    title character varying(255) NOT NULL,
    background_img character varying(255),
    id_created_by integer NOT NULL
);


ALTER TABLE public.board OWNER TO yrivnkdnsqmsre;

--
-- Name: board_id_board_seq; Type: SEQUENCE; Schema: public; Owner: yrivnkdnsqmsre
--

CREATE SEQUENCE public.board_id_board_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.board_id_board_seq OWNER TO yrivnkdnsqmsre;

--
-- Name: board_id_board_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER SEQUENCE public.board_id_board_seq OWNED BY public.board.id_board;


--
-- Name: list; Type: TABLE; Schema: public; Owner: yrivnkdnsqmsre
--

CREATE TABLE public.list (
    id_list integer NOT NULL,
    list_name character varying(100) NOT NULL,
    "order" integer NOT NULL,
    "id_board_FK" integer NOT NULL
);


ALTER TABLE public.list OWNER TO yrivnkdnsqmsre;

--
-- Name: list_id_list_seq; Type: SEQUENCE; Schema: public; Owner: yrivnkdnsqmsre
--

CREATE SEQUENCE public.list_id_list_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.list_id_list_seq OWNER TO yrivnkdnsqmsre;

--
-- Name: list_id_list_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER SEQUENCE public.list_id_list_seq OWNED BY public.list.id_list;


--
-- Name: task; Type: TABLE; Schema: public; Owner: yrivnkdnsqmsre
--

CREATE TABLE public.task (
    id_task integer NOT NULL,
    id_list_fk integer NOT NULL,
    priority integer NOT NULL,
    difficulty integer NOT NULL,
    name character varying NOT NULL
);


ALTER TABLE public.task OWNER TO yrivnkdnsqmsre;

--
-- Name: task_id_task_seq; Type: SEQUENCE; Schema: public; Owner: yrivnkdnsqmsre
--

CREATE SEQUENCE public.task_id_task_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.task_id_task_seq OWNER TO yrivnkdnsqmsre;

--
-- Name: task_id_task_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER SEQUENCE public.task_id_task_seq OWNED BY public.task.id_task;


--
-- Name: user_board; Type: TABLE; Schema: public; Owner: yrivnkdnsqmsre
--

CREATE TABLE public.user_board (
    id_user_fk integer NOT NULL,
    id_board_fk integer
);


ALTER TABLE public.user_board OWNER TO yrivnkdnsqmsre;

--
-- Name: users; Type: TABLE; Schema: public; Owner: yrivnkdnsqmsre
--

CREATE TABLE public.users (
    id_user integer NOT NULL,
    email character varying(255),
    login character varying(100) NOT NULL,
    password character varying(255) NOT NULL,
    premium boolean DEFAULT false NOT NULL
);


ALTER TABLE public.users OWNER TO yrivnkdnsqmsre;

--
-- Name: users_id_user_seq; Type: SEQUENCE; Schema: public; Owner: yrivnkdnsqmsre
--

CREATE SEQUENCE public.users_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_user_seq OWNER TO yrivnkdnsqmsre;

--
-- Name: users_id_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER SEQUENCE public.users_id_user_seq OWNED BY public.users.id_user;


--
-- Name: board id_board; Type: DEFAULT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.board ALTER COLUMN id_board SET DEFAULT nextval('public.board_id_board_seq'::regclass);


--
-- Name: list id_list; Type: DEFAULT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.list ALTER COLUMN id_list SET DEFAULT nextval('public.list_id_list_seq'::regclass);


--
-- Name: task id_task; Type: DEFAULT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.task ALTER COLUMN id_task SET DEFAULT nextval('public.task_id_task_seq'::regclass);


--
-- Name: users id_user; Type: DEFAULT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.users ALTER COLUMN id_user SET DEFAULT nextval('public.users_id_user_seq'::regclass);


--
-- Data for Name: board; Type: TABLE DATA; Schema: public; Owner: yrivnkdnsqmsre
--

INSERT INTO public.board (id_board, title, background_img, id_created_by) VALUES (27, 'TEST2 BOARD ', '2.PNG', 8);
INSERT INTO public.board (id_board, title, background_img, id_created_by) VALUES (40, 'board1', '1.png', 7);
INSERT INTO public.board (id_board, title, background_img, id_created_by) VALUES (43, 'board2', '2.JPG', 7);


--
-- Data for Name: list; Type: TABLE DATA; Schema: public; Owner: yrivnkdnsqmsre
--

INSERT INTO public.list (id_list, list_name, "order", "id_board_FK") VALUES (2, 'test', 2, 27);
INSERT INTO public.list (id_list, list_name, "order", "id_board_FK") VALUES (1, 'test1', 1, 27);
INSERT INTO public.list (id_list, list_name, "order", "id_board_FK") VALUES (3, 'test3', 3, 27);


--
-- Data for Name: task; Type: TABLE DATA; Schema: public; Owner: yrivnkdnsqmsre
--

INSERT INTO public.task (id_task, id_list_fk, priority, difficulty, name) VALUES (1, 1, 1, 1, 'test_lista1');
INSERT INTO public.task (id_task, id_list_fk, priority, difficulty, name) VALUES (2, 1, 1, 1, 'test2_lista1');
INSERT INTO public.task (id_task, id_list_fk, priority, difficulty, name) VALUES (3, 2, 1, 2, 'test_lista2');
INSERT INTO public.task (id_task, id_list_fk, priority, difficulty, name) VALUES (4, 3, 2, 4, 'test_lista3');
INSERT INTO public.task (id_task, id_list_fk, priority, difficulty, name) VALUES (5, 3, 2, 2, 'testaa_lista1');
INSERT INTO public.task (id_task, id_list_fk, priority, difficulty, name) VALUES (6, 3, 3, 4, 'test1_lista1');
INSERT INTO public.task (id_task, id_list_fk, priority, difficulty, name) VALUES (7, 3, 3, 3, 'testaa_lista1');
INSERT INTO public.task (id_task, id_list_fk, priority, difficulty, name) VALUES (8, 1, 2, 1, 'testaa_lista2');
INSERT INTO public.task (id_task, id_list_fk, priority, difficulty, name) VALUES (9, 2, 3, 3, 'test_diff3_asap');
INSERT INTO public.task (id_task, id_list_fk, priority, difficulty, name) VALUES (10, 1, 1, 1, 'test1_diff1_low');
INSERT INTO public.task (id_task, id_list_fk, priority, difficulty, name) VALUES (11, 2, 2, 2, 'test_diff2_mid');
INSERT INTO public.task (id_task, id_list_fk, priority, difficulty, name) VALUES (12, 3, 1, 2, 'test3_diff2_low');


--
-- Data for Name: user_board; Type: TABLE DATA; Schema: public; Owner: yrivnkdnsqmsre
--

INSERT INTO public.user_board (id_user_fk, id_board_fk) VALUES (8, 27);
INSERT INTO public.user_board (id_user_fk, id_board_fk) VALUES (7, 43);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: yrivnkdnsqmsre
--

INSERT INTO public.users (id_user, email, login, password, premium) VALUES (7, 'test@test.sdf', 'test', '$2y$10$Az9pqq5R1VoSYPALzjzvRuwKrnb/AjW0nwB7Dtf8erOUUInLnTrYy', true);
INSERT INTO public.users (id_user, email, login, password, premium) VALUES (8, 'test2@test.pl', 'test2', '$2y$10$GUGd0b.V57kHTplggUwIe.FweRRtuw8uhqP8HGyAkM.CQnUBPgYBi', false);


--
-- Name: board_id_board_seq; Type: SEQUENCE SET; Schema: public; Owner: yrivnkdnsqmsre
--

SELECT pg_catalog.setval('public.board_id_board_seq', 43, true);


--
-- Name: list_id_list_seq; Type: SEQUENCE SET; Schema: public; Owner: yrivnkdnsqmsre
--

SELECT pg_catalog.setval('public.list_id_list_seq', 3, true);


--
-- Name: task_id_task_seq; Type: SEQUENCE SET; Schema: public; Owner: yrivnkdnsqmsre
--

SELECT pg_catalog.setval('public.task_id_task_seq', 12, true);


--
-- Name: users_id_user_seq; Type: SEQUENCE SET; Schema: public; Owner: yrivnkdnsqmsre
--

SELECT pg_catalog.setval('public.users_id_user_seq', 8, true);


--
-- Name: board board_id_board_key; Type: CONSTRAINT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.board
    ADD CONSTRAINT board_id_board_key UNIQUE (id_board);


--
-- Name: board board_pk; Type: CONSTRAINT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.board
    ADD CONSTRAINT board_pk PRIMARY KEY (id_board);


--
-- Name: list list_id_list_key; Type: CONSTRAINT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.list
    ADD CONSTRAINT list_id_list_key UNIQUE (id_list);


--
-- Name: list list_pk; Type: CONSTRAINT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.list
    ADD CONSTRAINT list_pk PRIMARY KEY (id_list);


--
-- Name: task task_id_task_key; Type: CONSTRAINT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.task
    ADD CONSTRAINT task_id_task_key UNIQUE (id_task);


--
-- Name: task task_pk; Type: CONSTRAINT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.task
    ADD CONSTRAINT task_pk PRIMARY KEY (id_task);


--
-- Name: users users_id_user_key; Type: CONSTRAINT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_id_user_key UNIQUE (id_user);


--
-- Name: users users_pk; Type: CONSTRAINT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pk PRIMARY KEY (id_user);


--
-- Name: user_board board_fk; Type: FK CONSTRAINT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.user_board
    ADD CONSTRAINT board_fk FOREIGN KEY (id_board_fk) REFERENCES public.board(id_board) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: task list_fk; Type: FK CONSTRAINT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.task
    ADD CONSTRAINT list_fk FOREIGN KEY (id_list_fk) REFERENCES public.list(id_list) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: list list_fk_board; Type: FK CONSTRAINT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.list
    ADD CONSTRAINT list_fk_board FOREIGN KEY ("id_board_FK") REFERENCES public.board(id_board) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: user_board user_fk; Type: FK CONSTRAINT; Schema: public; Owner: yrivnkdnsqmsre
--

ALTER TABLE ONLY public.user_board
    ADD CONSTRAINT user_fk FOREIGN KEY (id_user_fk) REFERENCES public.users(id_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: SCHEMA heroku_ext; Type: ACL; Schema: -; Owner: u9tqb5tpq9h8nk
--

GRANT USAGE ON SCHEMA heroku_ext TO yrivnkdnsqmsre;


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: yrivnkdnsqmsre
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: LANGUAGE plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO yrivnkdnsqmsre;


--
-- PostgreSQL database dump complete
--

