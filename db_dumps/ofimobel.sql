--
-- PostgreSQL database dump
--

-- Dumped from database version 12.11 (Ubuntu 12.11-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.11 (Ubuntu 12.11-0ubuntu0.20.04.1)

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
-- Name: subtipo; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.subtipo AS ENUM (
    'Adquisicion',
    'Construccion',
    'Redencion Pasivo',
    'Ampliacion Vivienda',
    'Mejoramiento Vivienda'
);


ALTER TYPE public.subtipo OWNER TO postgres;

--
-- Name: tipo_credito; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.tipo_credito AS ENUM (
    'INDIVIDUAL',
    'MANCOMUNADO'
);


ALTER TYPE public.tipo_credito OWNER TO postgres;

--
-- Name: tipo_vivienda; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.tipo_vivienda AS ENUM (
    'VIVIENDA NUEVA',
    'VIVIENDA USADA',
    'REDENCION DE PASIVO'
);


ALTER TYPE public.tipo_vivienda OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: credito; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.credito (
    id integer NOT NULL,
    id_credito character varying(12),
    tipo_v public.tipo_vivienda,
    subt public.subtipo,
    tipo_c public.tipo_credito,
    autorizacion boolean,
    monto_credito double precision,
    CONSTRAINT credito_id_credito_check CHECK ((length((id_credito)::text) = 12)),
    CONSTRAINT credito_monto_credito_check CHECK ((monto_credito > (0)::double precision))
);


ALTER TABLE public.credito OWNER TO postgres;

--
-- Data for Name: credito; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.credito (id, id_credito, tipo_v, subt, tipo_c, autorizacion, monto_credito) FROM stdin;
1	221010073583	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	994293.78
2	221010076035	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	604718.39
3	221010076139	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	503104.7
4	221010076197	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	669168.09
5	221010078440	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	607575.39
6	221010078597	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	730805.24
7	221010080004	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1129115.03
8	221010081346	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1160992.5
9	221010082025	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1092883.99
10	221010082814	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	860771.19
11	221010084494	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1448759.05
12	221010084829	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	622377.83
13	221010084912	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1104979.99
14	221010085434	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	688007.85
15	221010085441	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	609801.39
16	221010087397	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	724299
17	221010087846	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	629573.65
18	221010088090	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	657519.09
19	221010088588	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	728664.24
20	221010091186	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	302516.48
21	221010091257	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	667577.88
22	221010092493	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1114919.69
23	221010092728	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	835412.28
24	221010093053	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	573196.18
25	221010093329	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	764382.24
26	221010093404	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	709144.71
27	221010093450	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	597109.7
28	221010095268	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	696468.2
29	221010095577	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1041861.78
30	221010095688	VIVIENDA USADA	Adquisicion	MANCOMUNADO	t	1433618.42
31	221010098261	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	534594.02
32	221010098900	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1164183.78
33	221010100085	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	503255.7
34	221010100177	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	669796.09
35	221010100215	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	740620.54
36	221010100639	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	863797.14
37	221010100884	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	740308.24
38	221010101259	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	624751.09
39	221010101504	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	766485.24
40	221010101820	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1165147.04
41	221010000666	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	1318312.05
42	221010001454	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	690603.64
43	221010004504	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	611067.39
44	221010004863	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1483350.05
45	221010004988	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	596159.76
46	221010005317	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	1285622.05
47	221010005849	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	564585.55
48	221010006578	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	619595.39
49	221010007197	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	613173.83
50	221010008037	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	534729.18
51	221010008225	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	1312527.05
52	221010008805	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	156198
53	221010010662	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1282942.05
54	221010011074	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	689161.64
55	221010011936	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	497214.47
56	221010011947	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	497316.47
57	221010015902	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	1306598.05
58	221010018327	REDENCION DE PASIVO	Redencion Pasivo	INDIVIDUAL	t	1344552.05
59	221010018772	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	751484.89
60	221010019234	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	427030.05
61	221010019247	VIVIENDA USADA	Ampliacion Vivienda	INDIVIDUAL	t	258331.8
62	221010019361	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1439894.05
63	221010023447	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	509685.05
64	221010023592	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1106590.38
65	221010023989	VIVIENDA NUEVA	Adquisicion	MANCOMUNADO	t	1018464.95
66	221010025761	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1369619.05
67	221010027232	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	619787.39
68	221010027498	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1200028.72
69	221010028715	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	1345715.05
70	221010029054	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1406388.05
71	221010029480	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	758211.89
72	221010029610	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1335837.05
73	221010029710	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	787310.89
74	221010030153	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1270184.05
75	221010031516	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1419163.05
76	221010037497	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	617168.92
77	221010038859	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	595064.76
78	221010039274	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1286643.37
79	221010039850	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	610497.83
80	221010040452	VIVIENDA NUEVA	Construccion	INDIVIDUAL	f	1347239.05
81	221010040682	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	631448.39
82	221010041235	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	662078.71
83	221010041998	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1284663.05
84	221010042148	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	493263.47
85	221010042828	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	624434.98
86	221010043323	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1229725.05
87	221010043597	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	621349.83
88	221010044039	VIVIENDA NUEVA	Construccion	INDIVIDUAL	f	1277475.34
89	221010044819	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1231422.05
90	221010044833	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1333631.05
91	221010045121	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1286172.34
92	221010046909	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1197775.76
93	221010048965	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	712084.28
94	221010050381	VIVIENDA USADA	Mejoramiento Vivienda	INDIVIDUAL	t	691304.37
95	221010051447	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	1225663.05
96	221010052611	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1121066.38
97	221010052938	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	397158.38
98	221010056089	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	634139.83
99	221010056289	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	501683.17
100	221010057249	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1121046.38
101	221010059355	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1273477.05
102	221010062047	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1371760.05
103	221010062398	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	1336234.76
104	221010062722	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1313312.05
105	221010064064	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	599860.92
106	221010064773	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1406839.05
107	221010067094	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	606259.83
108	221010067307	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1254710.05
109	221010067889	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	601131.76
110	221010068713	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1231276.37
111	221010069020	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	584562.55
112	221010069542	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1114844.69
113	221010072769	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1327612.05
114	221010073622	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	582559.34
115	221010074046	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1199559.72
116	221010075251	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	590815.57
117	221010076702	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	1307152.05
118	221010077899	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	609783.7
119	221010078661	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1201048.05
120	221010081140	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	599921.39
121	221010081320	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	555661.34
122	221010084220	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1190789.08
123	221010084533	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	685162.2
124	221010086005	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	591490.39
125	221010088368	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	603544.55
126	221010088796	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	1198900.39
127	221010089268	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	458928.73
128	221010089732	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1264885.05
129	221010090739	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	1327016.05
130	221010091867	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	693663.71
131	221010091898	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	704488.28
132	221010092979	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1301887.05
133	221010093451	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	710887.71
134	221010093519	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1286504.78
135	221010093841	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	727346.24
136	221010096448	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	694023.06
137	221010098716	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	496074.47
138	221010100341	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	671066
139	221010100868	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	637531.57
140	221010101641	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	481866.47
141	221010101706	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	696166.71
142	221010000631	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1272440.4
143	221010001210	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	636852.98
144	221010002136	VIVIENDA USADA	Adquisicion	MANCOMUNADO	t	1491164.33
145	221010003661	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	608975.39
146	221010004006	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1043657.73
147	221010005947	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	490754.47
148	221010009016	REDENCION DE PASIVO	Redencion Pasivo	INDIVIDUAL	t	335434.35
149	221010010229	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1484080.05
150	221010010346	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	819442.84
151	221010010674	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1045021.38
152	221010011809	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	870387.14
153	221010013486	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	906984.14
154	221010015002	VIVIENDA NUEVA	Adquisicion	MANCOMUNADO	t	1605934.48
155	221010015139	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1041996.04
156	221010015737	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	875209.14
157	221010019486	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	603934.39
158	221010020185	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	606142.39
159	221010021557	VIVIENDA NUEVA	Adquisicion	MANCOMUNADO	t	1214273.78
160	221010022359	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	853012.83
161	221010022831	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	873208.14
162	221010023690	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	605929.39
163	221010025473	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	463593.6
164	221010025524	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	910233.48
165	221010025873	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	604406.39
166	221010025942	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	608411.39
167	221010028367	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	602932.39
168	221010028521	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	604704.39
169	221010029336	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	866239.14
170	221010030193	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1003183.08
171	221010033445	REDENCION DE PASIVO	Redencion Pasivo	INDIVIDUAL	f	882128.14
172	221010033597	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1468157.05
173	221010033732	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1013377.69
174	221010035794	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	608962.39
175	221010036112	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	494752.47
176	221010036217	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	603739.39
177	221010036650	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	482895.41
178	221010036917	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	558856.39
179	221010037595	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1049868.99
180	221010037789	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1534048.02
181	221010039325	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	899953.09
182	221010040499	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	646495
183	221010042199	VIVIENDA NUEVA	Adquisicion	MANCOMUNADO	f	1247052.39
184	221010045864	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1277834.05
185	221010046687	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1204497.37
186	221010047082	VIVIENDA NUEVA	Construccion	INDIVIDUAL	f	661473.64
187	221010049452	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	893081.14
188	221010053822	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1315644.05
189	221010053883	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1127845.5
190	221010055470	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	495125.47
191	221010055783	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1351855.05
192	221010058199	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	931935.09
193	221010061324	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	1105594.78
194	221010061489	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	841595.19
195	221010062124	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	663656.71
196	221010062304	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	467714.18
197	221010062826	VIVIENDA NUEVA	Adquisicion	MANCOMUNADO	t	1482923.53
198	221010062856	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	607042.39
199	221010063094	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	828526.14
200	221010063528	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	612962.39
201	221010063829	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	485521.41
202	221010065229	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1081728.03
203	221010066551	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1156891.78
204	221010067938	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1111849.31
205	221010068885	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	639169.92
206	221010069902	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1470839.05
207	221010071249	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	597814.39
208	221010071838	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	492736.47
209	221010076975	VIVIENDA NUEVA	Construccion	MANCOMUNADO	f	1091958.14
210	221010079405	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	482505.41
211	221010079480	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	315212.35
212	221010080137	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	897794.79
213	221010081000	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	605398.39
214	221010081314	VIVIENDA NUEVA	Adquisicion	MANCOMUNADO	t	1848547.44
215	221010084183	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	619603.09
216	221010085074	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	286043.68
217	221010086851	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	880651.14
218	221010087587	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1105217.97
219	221010088722	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	898600.79
220	221010091907	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1502182.05
221	221010094662	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	595456.39
222	221010097636	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	604924.39
223	221010098235	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	580322.55
224	221010098498	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	595336.39
225	221010099690	VIVIENDA NUEVA	Construccion	INDIVIDUAL	f	603245.39
226	221010100097	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	1268270.05
227	221010101599	VIVIENDA USADA	Mejoramiento Vivienda	INDIVIDUAL	t	259161.31
228	221010101870	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	602932.39
229	221010000713	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	730762.39
230	221010001388	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	629196.57
231	221010001999	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	730535.39
232	221010002167	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	662712.98
233	221010004945	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	577753.47
234	221010005489	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	614816.02
235	221010006045	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	613102.83
236	221010006682	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	690181.7
237	221010006957	VIVIENDA USADA	Adquisicion	MANCOMUNADO	f	1646014.11
238	221010008075	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	516234.47
239	221010009587	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	520229.47
240	221010009824	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1386465.05
241	221010009890	VIVIENDA USADA	Ampliacion Vivienda	INDIVIDUAL	t	241832.25
242	221010010519	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	720451.39
243	221010011576	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	594397.39
244	221010012147	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	652367.39
245	221010015578	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	576338.55
246	221010016542	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	686343.39
247	221010017119	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	670689.39
248	221010017674	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1222012.05
249	221010018487	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	857580.14
250	221010019604	VIVIENDA NUEVA	Adquisicion	MANCOMUNADO	t	1369860.55
251	221010019627	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	512977.05
252	221010020462	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	687689.39
253	221010020900	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1229928.05
254	221010021891	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	739566.54
255	221010021959	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	474244.47
256	221010023235	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	655169
257	221010023431	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1234766.05
258	221010024217	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	627924.7
259	221010026594	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	603416.39
260	221010026634	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	644078.39
261	221010027502	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	861502.14
262	221010027597	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1251022.05
263	221010028940	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	643969.39
264	221010029208	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	884345.74
265	221010029894	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	540259.47
266	221010030710	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	727937.39
267	221010032212	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	532718.47
268	221010033022	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	562320.39
269	221010033506	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	1467717.05
270	221010033577	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	414114.25
271	221010033772	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	729778.39
272	221010034200	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	627980.98
273	221010034561	VIVIENDA NUEVA	Adquisicion	MANCOMUNADO	t	1613955.13
274	221010035571	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	1328145.05
275	221010037601	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	676731.55
276	221010037608	VIVIENDA USADA	Mejoramiento Vivienda	INDIVIDUAL	t	227983.31
277	221010038851	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	640435.39
278	221010039004	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	700480.89
279	221010039147	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1164458.72
280	221010039223	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	729713.39
281	221010039283	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1121017.38
282	221010040438	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	608133.39
283	221010041433	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	579692.47
284	221010041769	VIVIENDA NUEVA	Construccion	INDIVIDUAL	f	585695.39
285	221010042766	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	730987.39
286	221010043537	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	937373.09
287	221010044030	VIVIENDA USADA	Ampliacion Vivienda	INDIVIDUAL	t	348779.99
288	221010044190	VIVIENDA USADA	Ampliacion Vivienda	INDIVIDUAL	t	356242.8
289	221010046092	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1058092.03
290	221010047025	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	714657.7
291	221010049624	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1269227.76
292	221010050933	REDENCION DE PASIVO	Redencion Pasivo	INDIVIDUAL	f	1267105.05
293	221010051374	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	613753.39
294	221010053234	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	821586.83
295	221010055104	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	1329597.05
296	221010055495	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1116668.38
297	221010056456	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	630627.98
298	221010056907	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	583518.34
299	221010057228	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	731110.39
300	221010057975	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1027247.73
301	221010058327	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	611255
302	221010058566	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	584944.47
303	221010058796	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	740440.93
304	221010059292	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	651750.09
305	221010059516	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	726691.39
306	221010059957	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1214985.05
307	221010060312	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	585235.47
308	221010060770	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1131088.73
309	221010060816	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1187974.76
310	221010060982	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	686110.2
311	221010061036	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	1287811.05
312	221010061399	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	732629.39
313	221010062558	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	734589.39
314	221010063228	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	731111.39
315	221010063337	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1270919.05
316	221010064362	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	566469.34
317	221010065016	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	729503.39
318	221010066971	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1233703.05
319	221010067010	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	496426.41
320	221010067748	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	479636.47
321	221010067865	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	554860.34
322	221010068178	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	584381.47
323	221010069122	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	587740.47
324	221010069589	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	582384.47
325	221010069592	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	728458.39
326	221010069754	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	531336.47
327	221010069823	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	733655.39
328	221010069866	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	562454.34
329	221010071958	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	582836.47
330	221010072289	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1256642.05
331	221010072889	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	519386.47
332	221010072899	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	584788.47
333	221010074242	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	1141481.05
334	221010075080	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1292816.05
335	221010075314	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	565469.47
336	221010075328	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1081815.38
337	221010076300	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	641630.39
338	221010077043	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	726653.39
339	221010077250	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	1248219.05
340	221010078729	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	732049.39
341	221010079279	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	903381.79
342	221010079441	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	467403.6
343	221010079812	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1128778.99
344	221010080076	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	1226082.05
345	221010080404	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	1198587.05
346	221010081306	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	710010.71
347	221010082285	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	731473.39
348	221010082731	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1128629.99
349	221010084996	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1427614.05
350	221010085260	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	543770.47
351	221010086255	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	586788.39
352	221010086789	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	586417.47
353	221010087000	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1134209.97
354	221010087475	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	492844.47
355	221010088560	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	698207.39
356	221010089586	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	619769.98
357	221010089590	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	733249.39
358	221010089836	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	700093.39
359	221010090604	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	723099.39
360	221010091349	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	583362.17
361	221010092182	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	731220.39
362	221010093353	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	583120.39
363	221010093727	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	695751.85
364	221010093804	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	663474.39
365	221010093908	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	591919.47
366	221010094239	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	730752.39
367	221010099770	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	724817.39
368	221010099854	VIVIENDA NUEVA	Construccion	INDIVIDUAL	f	1336774.05
369	221010101310	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	643386.39
370	221010101499	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	624061.7
371	221010101647	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	730133.39
372	221010101736	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	676398.34
373	221010000218	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	602117.39
374	221010000326	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	586213.47
375	221010000538	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	635659.09
376	221010000604	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	650477.39
377	221010003216	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	616323.39
378	221010003729	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	729743.39
379	221010005273	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	485202.47
380	221010005484	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	508604.05
381	221010006296	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	588808.85
382	221010007034	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	726863.39
383	221010008782	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	1245276.05
384	221010009535	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	495800.47
385	221010010024	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	464719.73
386	221010010796	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1462948.05
387	221010012987	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	f	732310.39
388	221010013420	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1256424.05
389	221010016873	VIVIENDA NUEVA	Adquisicion	MANCOMUNADO	t	2410349.44
390	221010019013	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	724598.39
391	221010021444	VIVIENDA USADA	Adquisicion	INDIVIDUAL	f	572571.55
392	221010022857	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	629997.37
393	221010022971	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	1280498.05
394	221010023139	VIVIENDA USADA	Adquisicion	INDIVIDUAL	t	600954.39
395	221010024052	VIVIENDA NUEVA	Construccion	INDIVIDUAL	t	740329.19
396	221010025396	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	672151.71
397	221010027990	VIVIENDA NUEVA	Adquisicion	INDIVIDUAL	t	316856.16
\.


--
-- Name: credito credito_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.credito
    ADD CONSTRAINT credito_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

