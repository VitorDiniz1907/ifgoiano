
1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76
77
78
79
80
81
82
83
84
85
86
87
88
89
90
91
92
93
94
95
96
97
98
99
100
101
102
103
104
105
106
107
108
109
110
111
112
113
114
115
116
117
118
119
120
121
122
123
124
125
126
127
128
129
130
131
132
133
134
135
136
137
138
139
140
141
142
143
144
145
146
147
148
149
150
151
152
153
154
155
156
157
158
159
160
161
162
163
164
165
166
167
168
169
170
171
172
173
174
175
176
177
178
179
180
181
182
183
184
185
186
187
188
189
190
191
192
193
194
195
196
197
198
199
200
201
202
203
204
205
206
207
208
209
210
211
212
213
214
215
216
217
218
219
220
221
222
223
224
225
226
227
228
229
230
231
232
233
234
235
236
237
238
239
240
241
242
243
244
245
246
247
248
249
250
251
252
253
254
255
256
257
258
259
260
261
262
263
264
265
266
267
268
269
270
271
272
273
274
275
276
277
278
279
280
281
282
283
284
285
286
287
288
289
290
291
292
293
294
295
296
297
298
299
300
301
302
303
304
305
306
307
308
309
310
311
312
313
314
315
316
317
318
319
320
321
322
323
324
325
326
327
328
329
330
331
332
333
334
335
336
337
338
339
340
341
342
343
344
345
346
347
348
349
350
351
352
353
354
355
356
357
358
359
360
361
362
363
364
365
366
367
368
369
370
371
372
373
374
375
376
377
378
379
380
381
382
383
384
385
386
387
388
389
390
391
392
393
394
395
396
397
398
399
400
401
402
403
404
405
406
407
408
409
410
411
412
413
414
415
	
<?php
session_start();
require_once "conexao.class.php";
require_once "daoAtor.class.php";
require_once "daoPremio.class.php";
require_once "ator.class.php";
require_once "premio.class.php";
$con = Conexao::getConnection();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
 
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
 
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
 
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="imge/logo_dfilmes.Bv9ettdV9dsBUGw0pY" />
        <link href="estilo.css" rel="stylesheet" type="text/css"/>
        <meta charset="utf-8">
    </head>
 
    <body>
 
        <script>
            $(document).ready(function(){
                $('.collapsible').collapsible();
                
                $('select').material_select();
 
                $('#textarea1').val('New Text');
                $('#textarea1').trigger('autoresize');
 
                $('.datepicker').pickadate({
                    monthsFull: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    weekdaysFull: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
                    weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                    today: 'Hoje',
                    clear: 'Limpar',
                    close: 'Pronto',
                    labelMonthNext: 'Próximo mês',
                    labelMonthPrev: 'Mês anterior',
                    labelMonthSelect: 'Selecione um mês',
                    labelYearSelect: 'Selecione um ano',
                    selectMonths: true, 
                    selectYears: 15 
                });
                                 
            });
             
 
             
        </script>
 
        <!-- Navbar goes here -->
        <div class="row">
            <nav>
                <div class="nav-wrapper red accent-4">
                    <a href="#" class="brand-logo center">
                    <img class="brand-logo center" src="imge/logo_dfilmes.Bv9ettdV9dsBUGw0pY" width="90">
                    </a>
 
                    <ul>
                        <li>
                            <a href="index.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Início"> <i class="material-icons">home</i> </a>
 
                        </li>
                         
                        <li>
                            <a href="trailer.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Trailers"><i class="material-icons">movie_creation</i></a> 
                        </li>
                         
                        <li>
                            <a href="noticia.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Notícias"><i class="material-icons">storage</i></a> 
                        </li>
 
                        </ul>
 
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a href="myaccount.php"> <i class="material-icons lefth">account_box</i>  Minha Conta</a></li>
                            <li class="divider"></li>
                            <li><a href="insertFest.php"> <i class="material-icons lefth">art_track</i> Inserir Festivais/Premios</a></li>
                            <li><a href="insereAtor.php"> <i class="material-icons lefth">assignment_ind</i> Inserir Ator</a></li>
                            <li><a href="insereMusica.php"> <i class="material-icons lefth">music_note</i> Inserir Musica</a></li>
                            <li><a href="insereFilme.php"> <i class="material-icons lefth">stars</i> Inserir Filme</a></li>
                            <li><a href="insereNoticia.php"> <i class="material-icons lefth">dehaze</i> Inserir Notícia</a></li>
                            <li class="divider"></li>
                            <form method="POST">
                                <li><a> <i class="material-icons lefth">power_settings_new</i>  Sair </a></li>
                            </form>
                             
                        </ul>
 
                        <ul id="nav-mobile" class="right hide-on-med-and-down  ">
                            <?php
                                if (isset($_SESSION['nome'])) 
                                {                                   
                                    echo "<div class='nav-wrapper'>";
                                        echo "<ul class='right hide-on-med-and-down'>";
                                            echo "<li><a class='dropdown-button' href='#!' data-activates='dropdown1' style='width: 190px;'>".$_SESSION['nome']."<i class='material-icons right'>arrow_drop_down</i></a></li>";
                                        echo "</ul>";
                                    echo "</div>";
                                }
                                else
                                {
                                    echo"<li><a href='login.php' >Faça Login</a></li>";
                                    echo"<li class='black-text'>ou</li>";
                                    echo"<li><a href='cadastro.php'>Cadastre-se</a></li>";
                                }
                            ?>
                        </ul>
                </div>
            </nav>
        </div>
 
        <!-- Page Layout here -->
        <div class="row">
     
            <div class="col s12 m7 l9 "> <!-- Note that "m8 l9" was added -->
            <!-- Teal page content
     
                    This content will be:
                9-columns-wide on large screens,
                8-columns-wide on medium screens,
                12-columns-wide on small screens  -->
 
                <div class="row">
                    <div class="col s11 offset-s1 card-panel">
                             
                        <div class="row">
                            <div class="col s5 offset-s1 card-panel">
                                <h5 class="center">Inserir Ator</h5>
                                <div class="row" >
                                    <form class="col s12" method="POST" enctype="multipart/form-data">
                                         
                                        <div class="row" >
                                            <div class="col s12 input-field" >
                                                <input type="text" name="nome" required>
                                                <label for="nome">Nome</label>
                                            </div>
                                        </div>
 
                                        <div class="row">
                                            <div class="col s12 input-field">
                                                <input type="date" name="data">
                                            </div>
                                        </div>
 
                                        <div class="row">
                                            <div class="col s12 input-field">
                                                <input type="text" name="nacionalidade">
                                                <label for="nacionalidade">Nacionalidade</label>
                                            </div>
                                        </div>
 
                                        <div class="row">
                                            <div class="col s12 input-field">
                                                <input type="number" name="altura" step="0.01">
                                                <label for="altura">Altura</label>
                                            </div>
                                        </div>
 
                                        <div class="row">
                                            <div class="col s12 input-field">
                                                <textarea type="textarea1" class="materialize-textarea"  name="biografia"></textarea>
                                                <label for="biografia">Biografia</label>
                                            </div>
                                        </div>
 
                                        <!--<div class="file-field input-field">
                                                <div class="btn">
                                                    <span>File</span>
                                                    <input type="file">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                        </div>-->
 
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="file-field input-field">
                                                    <div class="btn">
                                                        <span>Foto</span>
                                                        <input type="file" name="file_img" required>
                                                    </div>
 
                                                    <div class="file-path-wrapper">
                                                         
                                                        <input class="file-path validate" name="file_img" id="file_img" required type="text">
                                                         
                                                        <div id="disp_tmp_path"></div>
                                                    </div>                                   
                                                </div>
                                            </div>
                                        </div>
 
 
                                        <div class="row">
                                            <div class="col s8 offset-2">
                                                <button type="submit" class="btn waves-effect" name="submit" >Inserir <i class="material-icons right">send</i> </button>
                                            </div>
                                        </div>
 
                                        <?php
                                            if (isset($_POST['submit'])){
 
                                                $fileTmp = $_FILES["file_img"]["tmp_name"];
                                                $fileName = $_FILES["file_img"]["name"];
                                                $fileType = $_FILES["file_img"]["type"];
                                                $filePath = "imgAtor/" . $fileName;
 
                                                move_uploaded_file($fileTmp, $filePath);
 
                                                 
                                                 
                                                // if(isset($_POST['altura'])){
                                                    // $altura = $_POST['altura'];
                                                    // $altura =  number_format($altura, 2, ',' , ' ');
                                                // }
 
                                                if(isset($_POST['data'])){
                                                    $data = $_POST['data'];
                                                    $newDate = date("Y-m-d", strtotime($data));
                                                }
 
                                                $con = Conexao::getConnection();
                                                $ator = new Ator();
 
                                                $ator->setNome($_POST['nome']);
                                                $ator->setNascimento($newDate);
                                                $ator->setNacionalidade($_POST['nacionalidade']);
                                                $ator->setAltura($_POST['altura']);
                                                $ator->setBiografia($_POST['biografia']);
                                                $ator->setFoto($filePath);
 
                                                $id = DaoAtor::save($ator);
                                                echo "<script>alert('Ator Inserido com Sucesso!!! ')</script>";
                                            }
                                        ?>
 
                                    </form>
                                </div>
                            </div>
                             
                            <div class="col s5 offset-s1 card-panel">
                                <h5 class="center">Inserir Premiações<h5>
                                <div class="row">
                                    <form class="col s12" method="POST">
                                        <div class="row">
                                            <div class="col s12 input-field">
                                                <select name="ator">
                                                    <option value="" disabled selected>Selecione o Ator</option>>
                                                    <?php
                                                     $resultado = DaoAtor::pesquisaTodos();
 
                                                     foreach ($resultado as $key => $value) {
                                                         echo "<option value='".$value->getIdAtor()."'>".$value->getNome()."</option>";
                                                     }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
 
                                        <div class="row">
                                            <div class="col s12 input-field">
                                                <select name="premio">
                                                    <option value="" disabled selected>Selecione o Prêmio - Festival</option>
                                                    <?php
                                                        $con = Conexao::getConnection();
 
                                                        $sql = "SELECT * FROM `premio` ORDER BY `nome_premio` ASC";
 
                                                        $result = mysqli_query($con,$sql);
                                                        if(mysqli_num_rows($result) > 0){
                                                            while($row = mysqli_fetch_assoc($result) ){
                                                                echo"<option value='".$row['id_premio']."'>".$row['nome_premio']."</option>";
                                                            }
                                                        }
                                                     
                                                    ?>
                                                </select>
                                            </div>
                                        </div> 
 
 
                                        <div class="row">
                                            <div class="col s3 offset-2">
                                                <button class="btn waves-effect" type="submit" name="submit_premio">Inserir <i class="material-icons right">send</i> </button>
                                            </div>
                                        </div>  
                                         
                                        <?php
                                        if(isset($_POST['submit_premio'])){
                                            $sql = "INSERT INTO `premio_ator`(`id_ator`, `id_premio`) VALUES (".$_POST['ator'].", ".$_POST['premio'].")";
 
                                            if(mysqli_query($con, $sql)){
                                                echo "<script>alert('Inserido com Sucesso!!!')</script>";
                                            }
                                            else{
                                                echo "<script>alert('Erro ao Inserir!!!')</script>";
                                            }
                                        }
                                        ?>
                                         
                                    </form>
                                </div>
                            </div>
                        </div>
 
 
                    </div>
                </div>
     
            </div>
 
            <div class="col s12 m4 l3 "> <!-- Note that "m4 l3" was added -->
                <!-- Grey navigation panel
         
                        This content will be:
                    3-columns-wide on large screens,
                    4-columns-wide on medium screens,
                    12-columns-wide on small screens  -->
 
                    <div class="row">
                        <div class="col s10 offset-s1 card-panel">
 
                            <div class="row">
                                <form class="col s12 input-field" method="POST" action="pesquisa.php">
                                    <input type="search" name="pesquisa"><i class="material-icons">close</i>
                                    <label for="pesquisa"><i class="material-icons">search</i> </label>
                                    <?php
                                        if (isset($_POST['pesquisa'])){
                                            $_SESSION['pesquisa'] = $_POST['pesquisa']; 
                                        }
                                    ?>
                                </form>
                            </div>
 
                            <ul class="collapsible popout" data-collapsible="accordion">
                                <li>
                                    <div class="collapsible-header">Ano de Lançamento</div>
                                    <div class="collapsible-body">
                                        <span>
                                            <ul>
                                                <li> <a href="#!">1990-2000</a></li>
                                                <li> <a href="#!">2001-2010</a></li>
                                                <li> <a href="#!">2011-2020</a></li>
                                            </ul>
                                        </span>
                                    </div>
                                    
                                </li>
                                <li>
                                    <div class="collapsible-header">Categoria</div>
                                    <div class="collapsible-body">
                                        <span>
                                            <ul>
                                                <?php
                                                    $con = Conexao::getConnection();
                                                    $sql = "SELECT `id_genero`, `nome_genero` FROM `genero` ORDER BY `nome_genero` ASC";
                                                    $result = mysqli_query($con,$sql);
 
                                                    if (mysqli_num_rows($result) > 0 ){
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            echo "<li> <a href='#!'>". $row['nome_genero']. "</a></li>";
                                                        }
                                                    }
                                                ?>
                                            </ul>
                                        </span>
                                    </div>
                                     
                                </li>
                                <li>
                                    <div class="collapsible-header">Festivais</div>
                                    <div class="collapsible-body">
                                        <span>
                                            <ul>
                                                <?php
                                                    $con = Conexao::getConnection();
                                                    $sql = "SELECT `id_festival`, `nome`, `pais` FROM `festival` ORDER BY `nome` ASC";
                                                    $result = mysqli_query($con,$sql);
 
                                                    if (mysqli_num_rows($result) > 0 ){
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            echo "<li> <a href='#!'>".$row['nome']. " - " . $row['pais'] ."</a></li>";
                                                        }
                                                    }
                                                ?>
                                            </ul>
                                        </span>
                                    </div>        
                                </li>
                            </ul>
                                     
                        </div>
                    </div>
         
            </div>
     
        </div>      
 
 
         
    </body>
</html>
