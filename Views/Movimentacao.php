<div class="container-fluid">
    <div class="row">
        <?php $this->carregarTemplate('Sidebar') ?>
        <div class="col d-flex flex-column">

            <div class="container-fluid d-flex mt-4 justify-content-end" style="gap: 15px;">
                <div class="btn bg-dark text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Adicionar
                </div>
                <div class="btn bg-dark text-white">Editar</div>
                <div class="btn bg-dark text-white">Excluir</div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Novo lançamento</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/controleFinanceiroPHP/movimentacao/lancarMovimentacao" method="post">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Valor</label>
                                            <input type="number" class="form-control" name="Valor" step="0.01">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Onde</label>
                                            <textarea class="form-control" name="Onde"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Data</label>
                                            <input type="date" class="form-control" name="Quando">
                                        </div>
                                    </div>
                                    <div class="mb-3 col">
                                        <div>
                                        <label for="pagamento" class="col-form-label">Pagamento</label>
                                        <select class="form-select" name="IdTipoPagamento">
                                            <option selected disabled value="">Selecione um método...</option>
                                            <?php foreach ($tipoPagamento as $pagamento): ?>
                                                <option value="<?= $pagamento['Id'] ?>"><?= $pagamento['Nome'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="pagamento" class="col-form-label">Categoria</label>
                                        <select class="form-select" name="Categoria">
                                            <option selected disabled value="">Selecione uma categoria...</option>
                                            <?php foreach ($categorias as $categoria): ?>
                                                <option value="<?= $categoria['Id'] ?>"><?= $categoria['Nome'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn bg-black text-white">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-4 mb-4 d-block flex-grow-1">

                <div class="card shadow h-100">
                    <div class="card-header py-3">
                        <h6 class="m-0 fw-bold text-black">Movimentação</h6>
                    </div>

                    <div class="card-body d-flex flex-column">

                        <div class="table-responsive flex-grow-1 overflow-auto">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" cellspacing="0">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 100px;">Id</th>
                                                    <th style="width: 100px;">Valor</th>
                                                    <th style="width: 200px;">Onde</th>
                                                    <th style="width: 100px;">Data</th>
                                                    <th style="width: 100px;">Pagamento</th>
                                                    <th style="width: 100px;">Direção</th>
                                                    <th style="width: 100px;">Categoria</th>
                                                    <th style="width:100px;">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($movimento as $m): ?>
                                                    <tr>

                                                        <td><?= $m['Id'] ?></td>
                                                        <td><?= $m['Valor'] ?></td>
                                                        <td><?= $m['Onde'] ?></td>
                                                        <td><?= $m['Quando'] ?></td>
                                                        <td><?= $m['Tipo_Pagamento'] ?></td>
                                                        <td><?= $m['Direcao'] ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <div>
                                                                    <input class="form-check-input mt-0" type="checkbox"
                                                                        value="">
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    });
</script>