<?php
$pag = "usuarios";
?>

<a onclick="inserir()" type="button" class="btn btn-primary"><span class="fa fa-plus"></span> Usuário</a>

<div class="bs-example widget-shadow" style="padding:15px" id="listar">

</div>

<!-- Modal Perfil -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><span id="titulo_inserir"></span></h4>
				<button id="btn-fechar" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form">
			<div class="modal-body">
				

					<div class="row">
						<div class="col-md-6">							
								<label>Nome</label>
								<input type="text" class="form-control" id="nome" name="nome" placeholder="Seu Nome" required>							
						</div>

						<div class="col-md-6">							
								<label>Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>							
						</div>
					</div>


					<div class="row">
						<div class="col-md-6">							
								<label>Telefone</label>
								<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>							
						</div>

					</div>

                        <div class="col-md-6">							
								<label>Nivel</label>
								<select class="form-control" name="nivel" id="nivel">
                                    <option>Administrativo</option>
                                    <option>Grafica</option>
                                    <option>Professor</option>
                                </select>							
						</div>

						<div class="col-md-6">							
								<label>Unidade</label>
								<select class="form-control" name="unidade" id="unidade">
                                    <option>1</option>
                                    <option>2</option>
                                </select>

					    </div>

                    


					<div class="row">
						<div class="col-md-6">							
								<label>Foto</label>
								<input type="file" class="form-control" id="foto" name="foto" onchange="carregarImg()">							
						</div>

						<div class="col-md-6">								
							<img src="images/perfil/sem-foto.jpg"  width="80px" id="target">								
							
						</div>

						
					</div>

				

				<br>
				<small><div id="mensagem" align="center"></div></small>
			</div>
			<div class="modal-footer">       
				<button type="submit" class="btn btn-primary">Salvar</button>
			</div>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript">var pag = "<?=$pag?>"</script>
<script src="js/ajax.js"></script>

<script type="text/javascript">
	function carregarImgl() {
    var target = document.getElementById('target');
    var file = document.querySelector("#foto").files[0];
    
        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }
</script>