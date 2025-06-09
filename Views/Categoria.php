<div class="container-fluid min-vh-100">
    <div class="row">
        <?php $this->carregarTemplate('Sidebar') ?>
        <div class="col d-flex flex-column">

            <div class="container-fluid d-flex mt-4 justify-content-end" style="gap: 15px;">
                <div class="btn bg-dark text-white" data-bs-toggle="modal" data-bs-target="#adicionaModal">Adicionar
                </div>

            </div>

            <div class="modal fade" id="adicionaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar categoria</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/controleFinanceiroPHP/categoria/adicionaCategoria" method="post">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nome</label>
                                    <input type="text" class="form-control" name="Categoria" required>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn bg-black text-white">Salvar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edite a categoria</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/controleFinanceiroPHP/categoria/editaCategoria" method="post">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Id</label>
                                    <input type="number" class="form-control" name="Id" required>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nome</label>
                                    <input type="text" class="form-control" name="Categoria" required>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="container-fluid mt-4 mb-4 d-block flex-grow-1">

                <div class="card shadow h-100">
                    <div class="card-header py-3">
                        <h6 class="m-0 fw-bold text-black">Categorias</h6>
                    </div>

                    <div class="card-body d-flex flex-column">

                        <div class="table-responsive flex-grow-1 overflow-auto">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" cellspacing="0">
                                            <thead>
                                                <tr role="row" class="text-center">
                                                    <th style="width: 100px;">Id</th>
                                                    <th style="width: 100px;">Categoria</th>
                                                    <th style="width:100px;">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($categorias as $categoria): ?>
                                                    <tr class="text-center">

                                                        <td><?= $categoria->Id ?></td>
                                                        <td><?= $categoria->Nome ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <div class="d-flex">
                                                                    <button class="border-0 shadow-none bg-transparent"><i
                                                                            class="fa-solid fa-pencil"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editaModal"></i></button>
                                                                    <form
                                                                        action="/controleFinanceiroPHP/categoria/excluirCategoria"
                                                                        method="post">
                                                                        <button name="Id" value="<?=$categoria->Id?>" class="border-0 shadow-none bg-transparent"><i
                                                                                class="fa-solid fa-trash"></i></button>
                                                                    </form>
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