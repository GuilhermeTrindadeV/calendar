<div class="modal fade" id="visualizar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Escreva  a sua mensagem</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body text-center">
                    <div class="viewEvent">
                        <dl class="row bg bg-light pt-3">
                            <dt class="col-sm-5 mb-3">Título: </dt>
                            <dd class="col-sm-7 mb-3" name="title" id="title"></dd>
                        </dl>
                        <dl class="row pt-3">
                            <dt class="col-sm-5 mb-3">Descrição: </dt>
                            <dd class="col-sm-7 mb-3" name="description" id="description"></dd>
                        </dl>
                        <dl class="row bg bg-light pt-3">
                            <dt class="col-sm-5 mb-3">Data de Início: </dt>
                            <dd class="col-sm-7 mb-3" name="start" id="start"></dd>
                        </dl>
                        <dl class="row pt-3">
                            <dt class="col-sm-5 mb-3">Data de Término: </dt>
                            <dd class="col-sm-7 mb-3" name="end" id="end"></dd>
                        </dl>

                        <div class="modal-footer">
                            <div class="col text-center mt-3">
                                <button class="btn btn-warning btn-sm" id="cancModal">Editar</button>
                            </div>
                        </div>
                    </div>

                    <div class="formEdit">
                        <form id="editEvent" method="POST" >
                            <span id="msg-edit"></span>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title" class="form-label">Título</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="description" class="form-label">Descrição</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="description" id="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="color" class="form-label">Cor</label>
                                        <select class="form-control" name="color" id="color">
                                            <option>Selecionar</option>
                                            <option style="color: #FFD700" value="#FFD700">Amarelo</option>
                                            <option style="color: #0071C5" value="#0071C5">Azul</option>
                                            <option style="color: #FF4500" value="#FF4500">Laranja</option>
                                            <option style="color: #8B4513" value="#8B4513">Marrom</option>
                                            <option style="color: #1C1C1C" value="#1C1C1C">Preto</option>
                                            <option style="color: #436EEE" value="#436EEE">Royal Blue</option>
                                            <option style="color: #A020F0" value="#A020F0">Roxo</option>
                                            <option style="color: #40E0D0" value="#40E0D0">Turquesa</option>
                                            <option style="color: #228B22" value="#228B22">Verde</option>
                                            <option style="color: #8B0000" value="#8B0000">Vermelho</option>
                                        </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="time"  class="form-label">Início</label>
                                    <input type="text" class="form-control" name="start" id="start" onkeypress="DataHora(event, this)">
                                    <small class="form-text text-muted">Ex. 25/08/1922 18:30:00</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="end" class="form-label">Fim</label>
                                    <input type="text" class="form-control" name="end" id="end" onkeypress="DataHora(event, this)">
                                    <small id="emailHelp" class="form-text text-muted">Ex. 29/08/1922 19:00:00</small>
                                </div>
                            </div>
                            <div class="text-center modal-footer">
                                <div class="btn-center mt-3">
                                    <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                                    <button type="button" class="btnVoltar btn btn-dark btn-sm" id="cancEdit">Voltar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>