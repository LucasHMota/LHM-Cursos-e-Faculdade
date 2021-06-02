<?php
    $nome=$_POST['nome'];
    $idade=$_POST['idade'];
    $plano=$_POST['plano'];
    if(!empty($_GET['enviar']))
    {
       $soma=$_POST['soma']; 
       require_once('pdo-class-unimed.php');
       $conecta=Database::conexao();
       $textosql="INSERT INTO proposta(nome,idade,plano,total) VALUES ('$nome','$idade','$plano','$soma')";
       $conecta->exec($textosql);
       header("Location:salvar-dados.php");
       exit;
    }
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Faça sua consulta conosco</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        
        <script language="javascript" type="text/javascript">
        function validar()
        {
            var plano = document.getElementById("plano").innerHTML;
            var tipos = {
                Enfermaria:[
                    [18,193],
                    [23,221],
                    [28,255],
                    [38,337],
                    [53,616],
                    [110,800],
                ],
                Apartamento:[
                    [18,282],
                    [23,325],
                    [28,373],
                    [38,494],
                    [53,902],
                    [110,1200],
                ],
            };
            var idades = ["idade1","idade2","idade3","idade4","idade5"];
            var valor = 0;
            var soma = 0;
            var dependentes=[];
            var id=1;
            for(var i=0;i <idades.length;i++)
            {
                value = document.getElementById(idades[i]).value;
                for(var j=0;j <tipos[plano].length;j++)
                {
                    if(value <= tipos[plano][j][0] && value !== "")
                    {
                       soma += tipos[plano][j][1];
                       dependentes.push([id,value,plano,tipos[plano][j][1]]);
                       id++;
                       break;
                    }
                }
            }
            document.getElementById("resultados").style.display="block";
            soma=parseInt(document.getElementById("valor").value) + soma;
            dependentes.push(["","","Total",soma]);
            var tabela=document.getElementById("dependentes");
            var celula1,celula2,celula3,celula4,linha;
            for(var i=0;i <dependentes.length;i++)
            {
                linha = tabela.insertRow((1+i));
                celula1 = linha.insertCell(0);
                celula2 = linha.insertCell(1);
                celula3 = linha.insertCell(2);
                celula4 = linha.insertCell(3);
                celula1.innerHTML = dependentes[i][0];
                celula2.innerHTML = dependentes[i][1];
                celula3.innerHTML = dependentes[i][2];
                celula4.innerHTML = "R$"+dependentes[i][3] + (dependentes.length === (i+1) ? '<input name="soma" type="text" value="'+soma+'" style="display:none"/>' : "");
            }
            location.href="#dependentes";
        }
        </script>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">

							<!-- Logo -->
								<a href="planomedico.php" class="logo">
									<span class="symbol"><center><img src="unimed.png" width="500" height="250" alt="" /></span><span class="title"><center>Veja seu orçamento</span>
								</a>
						</div>
					</header>

				<!-- Main -->
					<div id="main">
						<div class="inner">
    <body>
    <section>
		    <div class="table-wrapper">
			<table>
			    <thead>
			    <tr>
			        <th>Nome completo</th>
			        <th>Idade</th>
                    <th>Categoria escolhida</th>
                    <th>Mensalidade do plano individual</th>
				</tr>
				</thead>
				    <tbody>
					<tr>
					    <td><?php echo"".$nome;?></td>
					    <td><?php echo"".$idade;?></td>
                        <td id="plano"><?php echo"".$plano;?></td>
                        <td><?php
                        require_once("categorias-classe.php");
                        $v=new categoria();
                        $resultado=$v->calculo_categoria_idade($idade,$plano);
                        echo "".$resultado.'<input id="valor" type="text" value="'.$resultado.'" style="display:none"/>';
                        ?>
                        </td>
					</tr>
					</tbody>
			</table>
    </section>
    <section>
        <br>
        <b><center>Preencha abaixo para adicionar dependentes ao seu plano de saúde</center></b>
        <b><center>(Limite para até 5 dependentes)</center></b>
                <b><center>!AVISO! Em caso de não possuir dependentes, favor <u>NÃO</u> preencher os dados abaixo. Basta clicar no botão "Calcular"</center><b>
                <div class="col-6 col-12-xsmall">
			        <input type="text" name="idade1" id="idade1" maxlength="2" placeholder="Idade do primeiro dependente"/>
                </div>
                <div class="col-6 col-12-xsmall">
			        <input type="text" name="idade2" id="idade2" maxlength="2" placeholder="Idade do segundo dependente"/>
                </div>
                <div class="col-6 col-12-xsmall">
			        <input type="text" name="idade3" id="idade3" maxlength="2" placeholder="Idade do terceiro dependente"/>
                </div>
                <div class="col-6 col-12-xsmall">
			        <input type="text" name="idade4" id="idade4" maxlength="2" placeholder="Idade do quarto dependente"/>
                </div>
                <div class="col-6 col-12-xsmall">
			        <input type="text" name="idade5" id="idade5" maxlength="2" placeholder="Idade do quinto dependente"/>
			    </div>
			    <ul class="actions">
				    <li><input type="button" onclick="return validar()" value="Calcular" class="primary"/></li>
					<li><input type="reset" value="Cancelar" /></li>
				</ul>
            <br><br><br><br>
            <section id="resultados" style="display: none">
            <form name=dependentes method="POST" action="?enviar=true">
			<table>
            <h2>veja os planos somados<h2>
			    <thead>
			    <tr>
			        <th>Nome completo</th>
			        <th>Idade</th>
                    <th>Categoria escolhida</th>
                    <th>Mensalidade do plano individual</th>
				</tr>
				</thead>
				    <tbody>
					<tr>
					    <td><?php echo"".$nome; echo '<input name="nome" type="text" value="'.$nome.'" style="display:none"/>'; ?></td>
					    <td><?php echo"".$idade; echo '<input name="idade" type="text" value="'.$idade.'" style="display:none"/>'; ?></td>
                        <td><?php echo"".$plano; echo '<input name="plano" type="text" value="'.$plano.'" style="display:none"/>'; ?></td>
                        <td><?php
                        require_once("categorias-classe.php");
                        $v=new categoria();
                        $resultado=$v->calculo_categoria_idade($idade,$plano);
                        echo "R$".$resultado;?></td>
                    </tr>                                      
                    </tbody>
                    
                    </table>
                    <table id="dependentes">
                    <thead>
			    <tr>
			        <th>Dependente(s)</th>
			        <th>Idade</th>
                    <th>Categoria escolhida</th>
                    <th>Mensalidade do plano individual</th>
				</tr>
				</thead>
                    </table>
                    <input type="submit" value="Cadastrar" class="primary"/>   
            </form>
            </section>
            
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>